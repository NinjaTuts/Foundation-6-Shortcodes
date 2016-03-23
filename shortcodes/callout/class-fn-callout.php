<?php

Class FN_Callout {

	public function __construct() {

		add_shortcode( 'fn_callout', array( $this, 'render' ) );

	}

	public function render( $atts, $content = null ) {

		$atts = shortcode_atts( array(
			'id'												=> null,
			'class'											=> null,
			'style'											=> null,
			'type' 											=> null,
			'size' 											=> null,
			'closable' 									=> null,
			'closable_animation' 				=> null,
		), $atts, 'fn_callout' );

		// Remove whitespaces from starting and ending of shortcode attribtues
		$atts = array_map( 'trim', $atts );
		$default_class = ' callout ';
		$class = '';
		$close_btn_html = '';

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

		if ( 'yes' === strtolower( $atts['closable'] ) ) {
			$close_btn_html = '<button class="close-button" aria-label="Dismiss" type="button" data-close><span aria-hidden="true">&times;</span></button>';
			$atts['closable'] = ' data-closable';

			if ( ! empty( $atts['closable_animation'] ) ) {
				$atts['closable'] = ' data-closable="' . $atts['closable_animation'] . '"';
			}
		}


		if ( ! empty( $atts['class'] ) ) {
			$atts['class'] = $default_class . $class . $atts['class'];
		} else {
			$atts['class'] = $default_class . $class;
		}

		$atts = preg_replace( '/\s+/', ' ', $atts );
		$atts['class'] = trim( $atts['class'] );

		$html = sprintf( '<div%sclass="%s"%s%s>%s%s</div>',
			$atts['id'],
			$atts['class'],
			$atts['closable'],
			$atts['style'],
			$close_btn_html,
			do_shortcode( $content )
		);

		return $html;

	}

}

new FN_Callout();
