#!/usr/bin/env python
#! -*- coding: utf-8 -*-
"""
* Nonce class
*
* Used to prevent CSRF attacks
*
* @author Han Lin Yap < http://zencodez.net/ >
* @copyright 2010 zencodez.net
* @license http://creativecommons.org/licenses/by-sa/3.0/
* @package nonce
* @version 1.1 - 2010-12-12
"""
import hmac
import math
import time

class Nonce:
    life = 86400 # 24 hours
    salt = 'Nonce'

    @staticmethod
    def create(action = False, uid = False, offset=0):
        h = hmac.new(Nonce.salt, str( Nonce.tick() - offset ) + str(action) + str(uid))
        return h.hexdigest()[-12:-12+10]

    @staticmethod
    def verify(nonce, action = False, uid = False):
        # Nonce generated 0-12 hours ago
        if Nonce.create(action, uid) == nonce:
            return 1
        # Nonce generated 12-24 hours ago
        if Nonce.create(action, uid, 1) == nonce:
            return 2
        # Invalid nonce
        return False

    @staticmethod
    def tick():
        return int(math.ceil(time.time() / ( Nonce.life / 2 )))
