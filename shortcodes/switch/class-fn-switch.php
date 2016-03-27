<?php

Class FN_Switch {

	public function __construct() {

		add_shortcode( 'fn_switch', array( $this, 'render' ) );

	}

	public function render( $atts, $content = null ) {

		$atts = shortcode_atts( array(
			'id'										=> null,
			'class'									=> null,
			'style'									=> null,
			'type'									=> null,
			'size'									=> null,
			'label'									=> null,
			'on_label'							=> null,
			'off_label'							=> null,
			'sr_label'							=> null,
		), $atts, 'fn_switch' );

		// Remove whitespaces from starting and ending of shortcode attributes
		$atts = array_map( 'trim', $atts );
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
			$atts['class'] = $class . 'switch ' . $atts['class'] . ' ';
		} else {
			$atts['class'] = $class ? $class . ' switch ' : ' switch ';
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

// new FN_Switch();
