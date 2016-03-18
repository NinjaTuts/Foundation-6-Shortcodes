<?php

Class FN6S_Button_Group {

	public function __construct() {

		add_shortcode( 'fn_btn_group', array( $this, 'render' ) );

	}

	public function render( $atts, $content = null ) {

		$atts = shortcode_atts( array(
			'id'										=> null,
			'class'									=> null,
			'style'									=> null,
			'size'									=> null,
			'type'									=> null,
			'expanded'							=> null,
		), $atts, 'fn_btn_group' );

		// Remove whitespaces from starting and ending of shortcode attribtues
		$atts = array_map( 'trim', $atts );
		$class = '';

		if ( ! empty( $atts['id'] ) ) {
			$atts['id'] = ' id="' . $atts['id'] . '" ';
		} else {
			$atts['id'] = ' ';
		}

		if ( ! empty( $atts['style'] ) ) {
			$atts['style'] = ' style="' . $atts['style'] . '" ';
		}

		if ( ! empty( $atts['size'] ) ) {
			$class .= ' ' . strtolower( $atts['size'] ) . ' ';
		}

		if ( ! empty( $atts['type'] ) ) {
			$class .= ' ' . strtolower( $atts['type'] ) . ' ';
		}

		if ( 'yes' === strtolower( $atts['expanded'] ) ) {
			$class .= ' expanded ';
		}

		if ( ! empty( $atts['class'] ) ) {
			$atts['class'] = $class . 'button-group ' . $atts['class'] . ' ';
		} else {
			$atts['class'] = $class ? $class . ' button-group ' : ' button-group ';
		}

		$atts = preg_replace('/\s+/', ' ', $atts);
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

new FN6S_Button_Group();
