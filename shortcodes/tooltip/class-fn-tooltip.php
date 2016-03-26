<?php

Class FN_Tooltip {

	public function __construct() {

		add_shortcode( 'fn_tooltip', array( $this, 'render' ) );

	}

	public function render( $atts, $content = null ) {

		$atts = shortcode_atts( array(
			'id'												=> null,
			'class'											=> null,
			'style'											=> null,
			'position' 									=> null,
			'title' 										=> null,
		), $atts, 'fn_tooltip' );

		// Remove whitespaces from starting and ending of shortcode attribtues
		$atts = array_map( 'trim', $atts );
		$default_class = ' has-tip ';
		$class = '';

		if ( empty( $atts['title'] ) || empty( $content ) ) {
			return;
		}

		if ( ! empty( $atts['id'] ) ) {
			$atts['id'] = ' id="' . $atts['id'] . '" ';
		} else {
			$atts['id'] = ' ';
		}

		if ( ! empty( $atts['style'] ) ) {
			$atts['style'] = ' style="' . $atts['style'] . '"';
		}

		if ( ! empty( $atts['position'] ) ) {
			$class .= ' ' . strtolower( $atts['position'] ) . ' ';
		}

		if ( ! empty( $atts['class'] ) ) {
			$atts['class'] = $default_class . $class . $atts['class'];
		} else {
			$atts['class'] = $default_class . $class;
		}

		$atts = preg_replace( '/\s+/', ' ', $atts );
		$atts['class'] = trim( $atts['class'] );

		$html = sprintf( '<span%sclass="%s" title="%s" data-tooltip aria-haspopup="true"%s>%s</span>',
			$atts['id'],
			$atts['class'],
			$atts['title'],
			$atts['style'],
			do_shortcode( $content ) 
		);

		return $html;

	}

}

new FN_Tooltip();
