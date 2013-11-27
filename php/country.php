<?php

/**
 * List of countries in europe, divided in subregions
 * @return array Countries in subregions
 * @version 1.0 - 2010-08-02
 */
function countries() {

return array(
		'Australia and New Zealand' => array(
			'Australia',
			'New Zealand'
		),
		'Caribbean' => array(
			'Antigua and Barbuda',
			'Bahamas',
			'Barbados',
			'Cuba',
			'Dominica',
			'Dominican Republic',
			'Grenada',
			'Haiti',
			'Jamaica',
			'Saint Vincent and the Grenadines',
			'St Kitts and Nevis',
			'St Lucia',
			'Trinidad and Tobago'
		),
		'Central America' => array(
			'Belize',
			'Costa Rica',
			'El Salvador',
			'Guatemala',
			'Honduras',
			'Mexico',
			'Nicaragua',
			'Panama'
		),
		'Central Asia' => array(
			'Kazakhstan',
			'Kyrgyzstan',
			'Tajikistan',
			'Turkmenistan',
			'Uzbekistan'
		),
		'Eastern Africa' => array(
			'Burundi',
			'Comoros',
			'Djibouti',
			'Eritrea',
			'Ethiopia',
			'Kenya',
			'Madagascar',
			'Malawi',
			'Mauritius',
			'Mozambique',
			'Rwanda',
			'Seychelles',
			'Somalia',
			'South Sudan',
			'Tanzania',
			'Uganda',
			'Zambia',
			'Zimbabwe',
			'Zambia',
			'Zimbabwe'

		),
		'Eastern Asia' => array(
			'China',
			'Japan',
			'Korea North',
			'Korea South',
			'Mongolia',
			'Korea South',
			'Taiwan'
		),
		'Melanesia' => array(
			'Fiji',
			'Papua New Guinea',
			'Solomon Islands',
			'Vanuatu'
		),
		'Micronesia' => array(
			'Kiribati',
			'Micronesia',
			'Nauru',
			'Palau'
		),
		'Middle Africa' => array(
			'Angola',
			'Cameroon',
			'Central African Rep',
			'Chad',
			'Congo (Republic)',
			'Congo (Democratic Republic)',
			'Equatorial Guinea',
			'Gabon',
			'Sao Tome and Principe',

		),


		'Northern Africa' => array(
			'Algeria',
			'Egypt',
			'Libya',
			'Morocco',
			'Sudan',
			'Tunisia'
		),
		'Northern America' => array(
			'Canada',
			'United States of America'

		),
		'Polinesia' => array(
			'Marshall Islands',
			'Samoa',
			'Tonga',
			'Tuvalu'
		),
		'South America' => array(
			'Bolivia',
			'Brazil',
			'Chile',
			'Colombia',
			'Ecuador',
			'Guyana',
			'Paraguay',
			'Peru',
			'Suriname',
			'Uruguay',
			'Venezuela'
		),
		'Southern Africa' => array(
			'Botswana',
			'Lesotho',
			'Namibia',
			'South Africa',
			'Swaziland'
		),
		'Southern Asia' => array(
			'Afghanistan',
			'Bangladesh',
			'Bhutan',
			'India',
			'Iran',
			'Maldives',
			'Nepal',
			'Pakistan',
			'Sri Lanka'
		),
		'Southern Eastern Asia' => array(
			'Brunei',
			'Cambodia',
			'East Timor',
			'Indonesia',
			'Laos',
			'Malaysia',
			'Myanmar, (Burma)',
			'Philippines',
			'Singapore',
			'Thailand',
			'Vietnam'
		),
		'Western Africa' => array(
			'Benin',
			'Burkina Faso',
			'Cape Verde',
			'Gambia',
			'Ghana',
			'Guinea',
			'Guinea-Bissau',
			'Ivory Coast',
			'Liberia',
			'Mali',
			'Mauritania',
			'Niger',
			'Nigeria',
			'Senegal',
			'Sierra Leone',
			'Togo'
		),
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
		'Western Asia' => array(
			'Armenia',
			'Azerbaijan',
			'Bahrain',
			'Cyprus',
			'Georgia',
			'Iraq',
			'Israel',
			'Jordan',
			'Kuwait',
			'Lebanon',
			'Oman',
			'Palestine',
			'Qatar',
			'Saudi Arabia',
			'Syria',
			'Turkey',
			'United Arab Emirates',
			'Yemen'
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
			'Kosovo',
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