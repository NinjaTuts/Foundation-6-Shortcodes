<?php

Class FN_Row {

	public function __construct() {

		add_shortcode( 'fn_row', array( $this, 'render' ) );

	}

	public function render( $atts, $content = null ) {

		$atts = shortcode_atts( array(
			'id'										=> null,
			'class'									=> null,
			'style'									=> null,
			'fluid' 								=> null,
		), $atts, 'fn_row' );

		// Remove whitespaces from starting and ending of shortcode attributes
		$atts = array_map( 'trim', $atts );
		$class = ' row ';

		if ( ! empty( $atts['id'] ) ) {
			$atts['id'] = ' id="' . $atts['id'] . '" ';
		} else {
			$atts['id'] = ' ';
		}

		if ( ! empty( $atts['style'] ) ) {
			$atts['style'] = ' style="' . $atts['style'] . '"';
		}

		if ( 'yes' === strtolower( $atts['fluid'] ) ) {
			$class .= ' expanded ';
		}

		if ( ! empty( $atts['class'] ) ) {
			$atts['class'] = $class . ' ' . $atts['class'];
		} else {
			$atts['class'] = $class;
		}

		$atts = preg_replace( '/\s+/', ' ', $atts );
		$atts['class'] = trim( $atts['class'] );

		$html = sprintf( '<div%sclass="%s"%s>%s</div>',
			$atts['id'],
			$atts['class'],
			$atts['style'],
			do_shortcode( $content ) 
		);

		return $html;

	}

}

new FN_Row();
