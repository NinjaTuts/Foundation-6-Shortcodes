<?php

Class FN_Accordion {

	public function __construct() {

		add_shortcode( 'fn_accordion', array( $this, 'render_parent' ) );
		add_shortcode( 'fn_toggle', array( $this, 'render_child' ) );

	}

	public function render_parent( $atts, $content = null ) {

		$atts = shortcode_atts( array(
			'id'										=> null,
			'class'									=> null,
			'style'									=> null,
			'multi_expand' 					=> null,
			'all_close' 						=> null,
		), $atts, 'fn_accordion' );


		// Remove whitespaces from starting and ending of shortcode attributes
		$atts = array_map( 'trim', $atts );

		if ( ! empty( $atts['id'] ) ) {
			$atts['id'] = ' id="' . $atts['id'] . '" ';
		} else {
			$atts['id'] = ' ';
		}

		if ( ! empty( $atts['style'] ) ) {
			$atts['style'] = ' style="' . $atts['style'] . '"';
		}

		if ( 'yes' === strtolower( $atts['multi_expand'] ) ) {
			$atts['multi_expand'] = ' data-multi-expand="true" ';
		} else {
			$atts['multi_expand'] = '';
		}

		if ( 'yes' === strtolower( $atts['all_close'] ) ) {
			$atts['all_close'] = ' data-allow-all-closed="true" ';
		} else {
			$atts['all_close'] = '';
		}

		if ( ! empty( $atts['class'] ) ) {
			$atts['class'] = 'accordion ' . $atts['class'];
		} else {
			$atts['class'] = 'accordion';
		}

		$atts = preg_replace( '/\s+/', ' ', $atts );
		$atts['class'] = trim( $atts['class'] );

		$html = sprintf( '<ul%sclass="%s"%s%s data-accordion%s>%s</ul>',
			$atts['id'],
			$atts['class'],
			$atts['multi_expand'],
			$atts['all_close'],
			$atts['style'],
			do_shortcode( $content ) 
		);

		return $html;

	}

	public function render_child( $atts, $content = null ) {

		$atts = shortcode_atts( array(
			'id'										=> null,
			'class'									=> null,
			'style'									=> null,
			'title' 								=> null,
			'is_active' 						=> null,
		), $atts, 'fn_toggle' );

		// Remove whitespaces from starting and ending of shortcode attributes
		$atts = array_map( 'trim', $atts );
		$default_class = ' accordion-item ';
		$class = '';

		if ( ! empty( $atts['id'] ) ) {
			$atts['id'] = ' id="' . $atts['id'] . '" ';
		} else {
			$atts['id'] = ' ';
		}

		if ( ! empty( $atts['style'] ) ) {
			$atts['style'] = ' style="' . $atts['style'] . '"';
		}

		// Return if no title is specified
		if ( empty( $atts['title'] ) ) {
			return;
		}

		if ( 'yes' === strtolower( $atts['is_active'] ) ) {
			$class .= ' is-active ';
		}

		if ( ! empty( $atts['class'] ) ) {
			$atts['class'] = $default_class . $class . $atts['class'];
		} else {
			$atts['class'] = $default_class . $class;
		}

		$atts = preg_replace( '/\s+/', ' ', $atts );
		$atts['class'] = trim( $atts['class'] );

		$anchor_tag = sprintf( '<a href="#" class="accordion-title">%s</a>', $atts['title'] );
		$accordion_content = sprintf( '<div class="accordion-content" data-tab-content>%s</div>', do_shortcode( $content ) );

		$html = sprintf( '<li%sclass="%s" data-accordion-item%s>%s</li>',
			$atts['id'],
			$atts['class'],
			$atts['style'],
			$anchor_tag . $accordion_content
		);

		return $html;

	}

}

new FN_Accordion();
