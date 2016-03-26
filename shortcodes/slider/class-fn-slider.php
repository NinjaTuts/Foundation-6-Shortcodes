<?php

Class FN_Slider {

	public function __construct() {

		add_shortcode( 'fn_slider', array( $this, 'render' ) );

	}

	public function render( $atts, $content = null ) {

		$atts = shortcode_atts( array(
			'id'										=> null,
			'class'									=> null,
			'style'									=> null,
			'vertical'							=> null,
			'disabled'							=> null,
			'start' 								=> null,
			'end' 									=> null,
		), $atts, 'fn_slider' );

		// Remove whitespaces from starting and ending of shortcode attribtues
		$atts = array_map( 'trim', $atts );
		$default_class = ' slider ';
		$data_vertical = '';
		$class = '';

		if ( ! empty( $atts['id'] ) ) {
			$atts['id'] = ' id="' . $atts['id'] . '" ';
		} else {
			$atts['id'] = ' ';
		}

		if ( ! empty( $atts['style'] ) ) {
			$atts['style'] = ' style="' . $atts['style'] . '"';
		}

		if ( 'yes' === strtolower( $atts['vertical'] ) ) {
			$class .= ' vertical ';
			$data_vertical = ' data-vertical="true" ';
		}

		if ( 'yes' === strtolower( $atts['disabled'] ) ) {
			$class .= ' disabled ';
		}

		if ( empty( $atts['start'] ) ) {
			$atts['start'] = 1;
		}

		if ( empty( $atts['end'] ) ) {
			$atts['end'] = 5;
		}

		if ( ! empty( $atts['class'] ) ) {
			$atts['class'] = $default_class . $class . $atts['class'];
		} else {
			$atts['class'] = $default_class . $class;
		}

		$atts = preg_replace( '/\s+/', ' ', $atts );
		$atts['class'] = trim( $atts['class'] );

		$slider_handle = '<span class="slider-handle" data-slider-handle role="slider" tabindex="1"></span>';
		$slider_fill = '<span class="slider-fill" data-slider-fill></span>';
		$slider_input = '<input type="hidden">';

		$slider_inner_html = $slider_handle . $slider_fill . $slider_input;

		$html = sprintf( '<div%sclass="%s" data-slider data-initial-start="%s" data-end="%s"%s%s>%s</div>',
			$atts['id'],
			$atts['class'],
			$atts['start'],
			$atts['end'],
			$data_vertical,
			$atts['style'],
			$slider_inner_html
		);

		return $html;

	}

}

new FN_Slider();
