<?php

Class FN_Flex_Video {

	public function __construct() {

		add_shortcode( 'fn_flex_video', array( $this, 'render' ) );

	}

	public function render( $atts, $content = null ) {

		$atts = shortcode_atts( array(
			'id'										=> null,
			'class'									=> null,
			'style'									=> null,
			'widescreen' 						=> null,
			'vimeo' 								=> null,
		), $atts, 'fn_flex_video' );

		// Remove whitespaces from starting and ending of shortcode attributes
		$atts = array_map( 'trim', $atts );
		$default_class = ' flex-video ';
		$class = '';

		if ( ! empty( $atts['id'] ) ) {
			$atts['id'] = ' id="' . $atts['id'] . '" ';
		} else {
			$atts['id'] = ' ';
		}

		if ( ! empty( $atts['style'] ) ) {
			$atts['style'] = ' style="' . $atts['style'] . '"';
		}

		if ( 'yes' === strtolower( $atts['widescreen'] ) ) {
			$class .= ' widescreen ';
		}

		if ( 'yes' === strtolower( $atts['vimeo'] ) ) {
			$class .= ' vimeo ';
		}

		if ( ! empty( $atts['class'] ) ) {
			$atts['class'] = $default_class . $class . $atts['class'];
		} else {
			$atts['class'] = $default_class . $class;
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

new FN_Flex_Video();
