<?php

Class FN6S_Button {

	public function __construct() {

		add_shortcode( 'fn_button', array( $this, 'render' ) );

	}

	public function render( $atts, $content = null ) {

		$atts = shortcode_atts( array(
			'id'										=> null,
			'class'									=> null,
			'style'									=> null,
		), $atts, 'fn_button' );

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


		$html = sprintf( '<div%sclass="row%s"%s>%s</div>',
			$atts['id'],
			$atts['class'],
			$atts['style'],
			do_shortcode( $content ) 
		);

		return $html;

	}

}

// new FN6S_Button();
