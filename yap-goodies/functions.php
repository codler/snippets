<?php
/**
 * Useful functions - Yap goodies
 * 
 * @author			Han Lin Yap
 * @website			http://www.zencodez.net/
 * @created			7th April 2010
 * @last-modified	3rd June 2010
 * @version			1.3
 * @package 		yap-goodies
 */
/*
 * ----------------------------------------
 * Change log:
v1.3 - 3rd June 2010
added css_gradient and css_radius
v1.2 - 13th May 2010
update INDEX info and a new method, date_sv.
v1.1 - 8 may 2010
update INDEX info
v1.0 - 7th april 2010
last edit

 * --- INDEX ---
 * date_sv($buffer)
 * redirect($u ,$t=0)
 * zcTplFor()
 * zcTplForRead($s)
 * zcTplForEnd($arr)
 * zcTplForEnd_mapping($x)
 * getFlash($f, $keep=false)
 * setFlash($f,$value,$class=false)
 * addClass($innerHTML,$className)
*/

/**
 * Cross-browser css gradient
 * @param hex top color
 * @param hex bottom color
 * @version 1.0 (3 June 2010)
 */
function css_gradient($start, $end) {
	echo "background-image: -webkit-gradient(linear,left bottom,left top,color-stop(0, " . $end . "),color-stop(1, " . $start . ")); /* Safari & Chrome */";
	echo "background-image: -moz-linear-gradient(top," . $start . "," . $end . "); /* Firefox 3.6 */";
	echo "filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='" . $start . "', endColorstr='" . $end . "'); /* IE6 & IE7 */";
	echo "-ms-filter: \"progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='" . $start . "', endColorstr='" . $end . "')\"; /* IE8 */";
}

/**
 * Cross-browser css round corner
 * @param int pixel of round corner
 * @version 1.0 (3 June 2010)
 */
function css_radius($pixel) {
	echo "-webkit-border-radius: " . $pixel . "px;";
	echo "-moz-border-radius: " . $pixel . "px;";
	echo "border-radius: " . $pixel . "px;";
}

/**
 * Translate date text to proper language (swedish)
 * @param string $buffer Text to replace
 * @version 1.0 (13th May 2010)
 */
function date_sv($buffer) {
	$date_eng = array(
		// Months
		"January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December",
		// Days
		"Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"
	);
	$date_sv = array(
		// Months
		"Januari", "Februari", "Mars", "April", "Maj", "Juni", "Juli", "Augusti", "September", "Oktober", "November", "December",
		// Days
		"Måndag", "Tisdag", "Onsdag", "Torsdag", "Fredag", "Lördag", "Söndag"
	);

  return str_replace($date_eng, $date_sv, $buffer);
}

/**
 * Redirect page
 * added time
 * @param string $u URL to redirect to
 * @param integer $t Delay time
 * @version 1.1 (24 april 2010)
 */
function redirect($u ,$t=0) {
	if (!headers_sent()&&$t==0) {
		header("Location: ".$u);
		die();
	}
	echo '<meta http-equiv="Refresh" content="' . $t . '; url='.$u.'" />';
	if ($t==0) {
		echo '<a href="'.$u.'">Click here if the page don\'t redirect</a>';
		die();
	}
}

// 1.0 (20 mars 2010)
// template
function zcTplFor() {
	ob_start();
}

// 1.0 (27 april 2010)
// template
function zcTplForRead($s) {
	return $s;
}

// 1.1 (26 april 2010)
// template
function zcTplForEnd($arr) {
	
	$content = ob_get_contents();
	ob_end_clean();
	if (!$arr) return false;
	
	if (sizeof($arr)>0) {	
		foreach ($arr AS $row) {
			echo str_replace(array_map("zcTplForEnd_mapping",array_keys($row)), array_values($row), $content);
		}
	}
}

// 1.0 (26 april 2010)
// Add text before and after in a array.
function zcTplForEnd_mapping($x) { return "[key=".$x."]"; };

// 1.0 (20 mars 2010)
// message
function getFlash($f, $keep=false) {
	if (!isset($_SESSION['flash_'.$f])) return false;
	
	$value = $_SESSION['flash_'.$f];
	if (!$keep)
		unset($_SESSION['flash_'.$f]);
	
	return $value;
}

// 1.0 (20 mars 2010)
// message
function setFlash($f,$value,$class=false) {
	if (isset($_SESSION['flash_'.$f])) {
		$_SESSION['flash_'.$f] .= ($class) ? addClass($value, $class) : $value;
	} else {
		$_SESSION['flash_'.$f] = ($class) ? addClass($value, $class) : $value;
	}
}

// 1.0 (7 may 2010)
function addClass($innerHTML,$className) {
	return "<span class=\"".$className."\">".$innerHTML."</span>";
}
?>