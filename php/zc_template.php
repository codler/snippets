<?php
/**
 * Template - start
 * @version 1.0 (20 mars 2010)
 */
function zcTplFor() {
	ob_start();
}

/**
 * Template - read
 * @version 1.0 (27 april 2010)
 */
function zcTplForRead($s) {
	return $s;
}

/**
 * Template - end
 * @param array $arr Multidimention array in "db-format"
 * @version 1.2 (30 june 2010)
 * @uses zcTplForEnd_mapping()
 */
function zcTplForEnd($arr) {
	
	$content = ob_get_contents();
	ob_end_clean();
	if (count($arr)>0) {
		echo str_replace(array_map("zcTplForEnd_mapping",array_keys($arr)), array_values($arr), $content);
	} else {
		echo $content;
	}
}

/**
 * Template - array_map()
 * Add text before and after in a array.
 * @param mixed $x
 * @return string Replaceble text in template file.
 * @version 1.0 (26 april 2010)
 */
function zcTplForEnd_mapping($x) { return "[".$x."]"; };

/**
 * Template - load file
 * @param string $file File to load
 * @param array $vars Load template file with variables
 * @version 1.0 - 2010-08-02
 * @uses zcTplFor()
 * @uses zcTplForEnd()
 */
function zcTplLoad($file, $vars) {
	zcTplFor();
	extract($vars);
	require $file;
	zcTplForEnd($vars);
}
?>