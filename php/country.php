<?php
/**
 * List of countries in europe, divided in subregions
 * @return array Countries in subregions
 * @version 1.0 - 2010-08-02
 */
function countries() {
	return array(
		'Eastern Europe' => array(
			'Belarus',
			'Bulgaria',
			'Czech Republic',
			'Hungary',
			'Moldova',
			'Poland',
			'Romania',
			'Russia',
			'Slovakia',
			'Ukraine'
		),
		'Northern Europe' => array(
			'Denmark',
			'Estonia',
			'Faroe Islands',
			'Finland',
			'Guernsey',
			'Iceland',
			'Republic of Ireland',
			'Isle of Man',
			'Jersey',
			'Latvia',
			'Lithuania',
			'Norway',
			'Svalbard and Jan Mayen Islands',
			'Sweden',
			'United Kingdom',
			'Åland Islands'
		),
		'Southern Europe' => array(
			'Albania',
			'Andorra',
			'Bosnia-Herzegovina',
			'Croatia',
			'Gibraltar',
			'Greece',
			'Italy',
			'Malta',
			'Montenegro',
			'Portugal',
			'Macedonia',
			'San Marino',
			'Serbia',
			'Slovenia',
			'Spain',
			'Turkey',
			'Vatican City'
		),
		'Western Europe' => array(
			'Austria',
			'Belgium',
			'France',
			'Germany',
			'Liechtenstein',
			'Luxembourg',
			'Monaco',
			'Netherlands',
			'Switzerland'
		)
	);
}

/**
 * Get what subregion a country lies
 * @param string $country Country
 * @return string|boolean Return subregion-name or false
 * @version 1.0 - 2010-08-02
 */
function get_subregion($country) {
	$countries = countries();
	foreach($countries AS $k => $v) {
		if (in_array($country, $v)) {
			return $k;
		}
	}
	return false;
}

/**
 * List of subregions
 * @return array Subregions
 * @version 1.0 - 2010-08-02
 */
function get_subregions() {
	$countries = countries();
	$regions = array();
	foreach($countries AS $k => $v) {
		$regions[] = $k;
	}
	
	return $regions;
}

?>