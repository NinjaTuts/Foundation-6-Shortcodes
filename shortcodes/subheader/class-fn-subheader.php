<?php

Class FN_Subheader {

	public function __construct() {

		add_shortcode( 'fn_subheader', array( $this, 'render' ) );

	}

	public function render( $atts, $content = null ) {

		$atts = shortcode_atts( array(
			'id'										=> null,
			'class'									=> null,
			'style'									=> null,
			'type'									=> null
		), $atts, 'fn_subheader' );

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

		if ( ! empty( $atts['type'] ) &&  $atts['type'] >= 1 && $atts['type'] <= 6 ) {
			$atts['type'] = 'h' . $atts['type'];
		} else {
			$atts['type'] = 'h1';
		}
		
		$html = sprintf( '<%s%sclass="subheader%s"%s>%s</%s>',
			$atts['type'],
			$atts['id'],
			$atts['class'],
			$atts['style'],
			do_shortcode( $content ),
			$atts['type']
		);

		return $html;

	}

}

new FN_Subheader();
