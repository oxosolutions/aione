<?php

if ( !function_exists( 'clean_class' ) ) {

	function clean_class( $string ) {

	    $string = str_replace( ' ', '-', $string ); // Replaces all spaces with hyphens.
	    $string = preg_replace( '/[^A-Za-z0-9\-]/', '', $string ); // Removes special chars.
	    $string = preg_replace( '/-+/', '-', $string ); // Replaces multiple hyphens with single one.
	    $string = trim( $string, '-' ); // Remove first or last -
	    $string = strtolower( $string ); // lowercase

	    return $string;
	}

}


if ( !function_exists( 'aione_data_table' ) ) {

	function aione_data_table( $headers, $data, $id = 'aione-', $class = 'compact', $count = 'yes', $search = 'yes', $sort = 'yes' ) {

		$columns = array();
		foreach ( $headers as $key => $header ) {
			$columns[] = clean_class( $header );
		}

		$output = "";

		$output .= '<div class="aione-search aione-table" >';

		if( $count == 'yes' ){
			$output .= '<div class="count-records">';
			$output .= 'Showing';
			$output .= '<span class="filtered-records">';
			$output .= '</span>';
			$output .= '<span class="total-records">';
			$output .= ' '. count( $data );
			$output .= '</span>';
			$output .= ' records';
			$output .= '</div>';
		}

		if( $search == 'yes' ){
			$output .= '<div class="field">';
			$output .= '<input autofocus type="text" class="aione-search-input" data-search="' . implode(' ', $columns) . '" placeholder="Search">';
			$output .= '</div>';
		}

		$output .= '<div class="clear"></div>';
		$output .= '<table class="' . $class . '">';
		$output .= '<thead>';
		$output .= '<tr>';
		foreach ($headers as $key => $header) {
			$output .= '<th class="aione-sort-button" data-sort="' . $columns[$key] . '">' . $header . '</th>';
		}
		$output .= '</tr>';
		$output .= '</thead>';
		$output .= '<tbody class="aione-search-list">';
		if (!empty($data)) {
			foreach ($data as $record_key => $record) {
				$output .= '<tr>';
				foreach ($record as $key => $value) {
					$output .= '<td class="' . $columns[$key] . '">' . $value . '</td>';
				}
				$output .= '</tr>';
			}
		}
		$output .= '</tbody>';
		$output .= '</table>';
		$output .= '</div>';

		return $output;
	}
}


/************************************************************
*	@function generate_filename
*	@access	public
*	@since	1.0.0.0
*	@author	SGS Sandhu(sgssandhu.com)
*	@perm length		[integer	optional	default	40]
*	@perm timestamp		[true/false	optional	default	true]
*	@return filename [string]
************************************************************/
function generate_filename($length = 30, $timestamp = true){	

	//Check if non integer value is provided for first argument
	if(!is_int($length)){
		$length = intval($length);
	}
	
	//inialize filename variable as empty string
	$filename = '';
	
	//prepend timestamp in filename
	if($timestamp){
		$datetime = date('Ymdhis');
		$microtime = substr(explode(".", explode(" ", microtime())[0])[1], 0, 6);
		$filename .= $datetime.$microtime;
	}
	
	//Check if filename length is achieved or exceeded
	if( strlen($filename) > $length){
		$filename = substr($filename, 0, $length);
	} else {
		$random_string_length = $length - strlen($filename);
		for($i = 0; $i < $random_string_length; $i++){
			$filename .= mt_rand(1,9);
		}
	}
	
	//Return generated filename
	return $filename;
} //end function generate_filename()