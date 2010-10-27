<?php 
/**
 * Nonce class
 *
 * Used to prevent CSRF attacks
 * 
 * @author Han Lin Yap < http://zencodez.net/ >
 * @copyright 2010 zencodez.net
 * @license http://creativecommons.org/licenses/by-sa/3.0/
 * @package nonce
 * @version 1.1 - 2010-10-27
 */
class Nonce {
	public static $life = 86400; // 24 hours
	public static $salt = 'Nonce';

	function create($action = false, $uid = false, $offset=0) {
		return substr(hash_hmac('md5', ( self::tick() - $offset ) . $action . $uid, self::$salt ), -12, 10);
	}
	
	function verify($nonce, $action = false, $uid = false) {
		// Nonce generated 0-12 hours ago
		if ( self::create($action, $uid) == $nonce )
			return 1;
		// Nonce generated 12-24 hours ago
		if ( self::create($action, $uid, 1) == $nonce )
			return 2;
		// Invalid nonce
		return false;
	}

	function tick() {
		return ceil(time() / ( self::$life / 2 ));
	}
}
?>