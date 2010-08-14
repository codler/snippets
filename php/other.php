<?php
/**
 * Group together each matched $equality in $orig
 * @param array $orig
 * @param function $equality
 * @return array 
 */
function array_gather(array $orig, $equality) {
    $result = array();
    foreach ($orig as $elem) {
        foreach ($result as &$relem) {
            if ($equality($elem, reset($relem))) {
                $relem[] = $elem;
                continue 2;
             }
        }
        $result[] = array($elem);
    }
    return $result;
}

/**
 * Automatic round a value to the nearest possible.
 * Eg.
 * 15 becomes 20
 * 546 becomes 500
 * 4006 becomes 4000
 * @param integer $value
 * @return integer Rounded value
 * @version 1.0 - 2010-08-02
 */
function round_auto($value) {
	$ten = 1;
	$round = 1;
	do {
		if (pow(10,$ten) > $value / 10) {
			$round = pow(10,$ten-1);
			break;
		}
	} while($ten++);
	
	return ceil($value / $round) * $round;
}

/**
 * Sort a multidimention assoc array by field
 * Useful to sort a returned data array from a {@link db::query() }
 * @param string $field
 * @param array $data
 * @return void
 * @version 1.0 - 2010-08-02
 */
function sort_by_field($field, & $data) {
	$sort_func = create_function('$a,$b', 'if ($a["' . $field . '"] == $b["' . $field . '"]) {return 0;} 
			return ($a["' . $field . '"] < $b["' . $field . '"]) ? -1 : 1;');
		
	uasort($data, $sort_func);
}
?>