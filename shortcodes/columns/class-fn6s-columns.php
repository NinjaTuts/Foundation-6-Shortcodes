<?php

Class FN6S_Columns {

	public function __construct() {

		add_shortcode( 'fn_col', array( $this, 'render' ) );

	}

	public function render( $atts, $content = null ) {

		$atts = shortcode_atts( array(
			'id'										=> null,
			'class'									=> null,
			'style'									=> null,
			'small'									=> null,
			'medium'								=> null,
			'large'									=> null,
			'small_centered'				=> null,
			'medium_centered'				=> null,
			'large_centered'				=> null,
		), $atts, 'fn_col' );

		$atts = array_map( 'trim', $atts );

		if ( ! empty( $atts['id'] ) ) {
			$atts['id'] = ' id="' . $atts['id'] . '" ';
		} else {
			$atts['id'] = ' ';
		}

		if ( ! empty( $atts['style'] ) ) {
			$atts['style'] = ' style="' . $atts['style'] . '"';
		}

		// Columns in different breakpoints
		$class = 'small-12';

		if ( ! empty( $atts['small'] ) && $atts['small'] >= 1 && $atts['small'] <= 12 ) {
			$class = 'small-' . $atts['small'];
		}

		if ( ! empty( $atts['medium'] ) && $atts['medium'] >= 1 && $atts['medium'] <= 12 ) {
			$class .= ' medium-' . $atts['medium'];
		}

		if ( ! empty( $atts['large'] ) && $atts['large'] >= 1 && $atts['large'] <= 12 ) {
			$class .= ' large-' . $atts['large'];
		}

		if ( 'yes' === strtolower( $atts['small_centered'] ) ) {
			$class .= ' small-centered';
		}

		if ( 'yes' === strtolower( $atts['medium_centered'] ) ) {
			$class .= ' medium-centered';
		}

		if ( 'no' === strtolower( $atts['medium_centered'] ) ) {
			$class .= ' medium-uncentered';
		}

		if ( 'yes' === strtolower( $atts['large_centered'] ) ) {
			$class .= ' large-centered';
		}

		if ( 'no' === strtolower( $atts['large_centered'] ) ) {
			$class .= ' large-uncentered';
		}

		if ( ! empty( $atts['class'] ) ) {
			$atts['class'] = $class . ' columns ' . $atts['class'];
		} else {
			$atts['class'] = $class . ' columns';
		}

		$html = sprintf( '<div%sclass="%s"%s>%s</div>',
			$atts['id'],
			$atts['class'],
			$atts['style'],
			do_shortcode( $content ) 
		);

		return $html;

	}

}

new FN6S_Columns();
