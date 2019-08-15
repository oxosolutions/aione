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