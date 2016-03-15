<?php

Class FN6S_Row {

	public function __construct() {

		add_shortcode( 'fn_row', array( $this, 'render' ) );

	}

	public function render( $atts, $content = null ) {

		$atts = shortcode_atts( array(
			'id'										=> null,
			'class'									=> null,
			'style'									=> null,
			'fluid' 								=> null,
			'align_center' 					=> 'no',
			'align_right' 					=> 'no',
			'align_justify' 				=> 'no',
			'align_spaced' 					=> 'no',
			'align_top'							=> 'no',
			'align_middle'					=> 'no',
			'align_bottom'					=> 'no',
			'align_stretch'					=> 'no',
			'equalizer'							=> 'no',
		), $atts, 'fn_row' );

		// Remove whitespaces from starting and ending of shortcode attribtues
		$atts = array_map( 'trim', $atts );

		if ( ! empty( $atts['id'] ) ) {
			$atts['id'] = ' id="' . $atts['id'] . '" ';
		} else {
			$atts['id'] = ' ';
		}

		if ( ! empty( $atts['class'] ) ) {
			$atts['class'] = ' ' . $atts['class'];
		}

		if ( ! empty( $atts['style'] ) ) {
			$atts['style'] = ' style="' . $atts['style'] . '"';
		}

		if ( 'yes' === strtolower( $atts['fluid'] ) ) {
			$atts['class'] .= ' expanded';
		}

		$html = sprintf( '<div%sclass="row%s"%s>%s</div>',
			$atts['id'],
			$atts['class'],
			$atts['style'],
			do_shortcode( $content ) 
		);

		return $html;

	}

}

new FN6S_Row();
