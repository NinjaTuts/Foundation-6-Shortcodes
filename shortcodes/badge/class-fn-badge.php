<?php

Class FN_Badge {

	public function __construct() {

		add_shortcode( 'fn_badge', array( $this, 'render' ) );

	}

	public function render( $atts, $content = null ) {

		$atts = shortcode_atts( array(
			'id'										=> null,
			'class'									=> null,
			'style'									=> null,
			'type' 								=> null,
		), $atts, 'fn_badge' );

		// Remove whitespaces from starting and ending of shortcode attribtues
		$atts = array_map( 'trim', $atts );
		$default_class = ' badge ';
		$class = '';

		if ( ! empty( $atts['id'] ) ) {
			$atts['id'] = ' id="' . $atts['id'] . '" ';
		} else {
			$atts['id'] = ' ';
		}

		if ( ! empty( $atts['style'] ) ) {
			$atts['style'] = ' style="' . $atts['style'] . '"';
		}

		if ( ! empty( $atts['type'] ) ) {
			$class .= ' ' . strtolower( $atts['type'] ) . ' ';
		}

		if ( ! empty( $atts['class'] ) ) {
			$atts['class'] = $class . $default_class . $atts['class'];
		} else {
			$atts['class'] = $class . $default_class;
		}

		$atts = preg_replace( '/\s+/', ' ', $atts );
		$atts['class'] = trim( $atts['class'] );

		$html = sprintf( '<span%sclass="%s"%s>%s</span>',
			$atts['id'],
			$atts['class'],
			$atts['style'],
			do_shortcode( $content ) 
		);

		return $html;

	}

}

new FN_Badge();
