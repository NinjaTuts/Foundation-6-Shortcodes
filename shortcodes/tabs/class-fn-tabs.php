<?php

Class FN_Tabs {

	public function __construct() {

		add_shortcode( 'fn_tabs', array( $this, 'render_parent' ) );
		add_shortcode( 'fn_tab', array( $this, 'render_child' ) );

	}

	public function render_parent( $atts, $content = null ) {

		$atts = shortcode_atts( array(
			'id'										=> null,
			'class'									=> null,
			'style'									=> null,
			'vertical' 							=> null,
		), $atts, 'fn_tabs' );


		// Remove whitespaces from starting and ending of shortcode attribtues
		$atts = array_map( 'trim', $atts );
		$default_class = ' tabs ';
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
		}

		if ( ! empty( $atts['class'] ) ) {
			$atts['class'] = $default_class . $class . $atts['class'];
		} else {
			$atts['class'] = $default_class . $class;
		}

		$atts = preg_replace( '/\s+/', ' ', $atts );
		$atts['class'] = trim( $atts['class'] );

		$html = sprintf( '<ul%sclass="%s" data-tabs%s>%s</ul>',
			$atts['id'],
			$atts['class'],
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
		), $atts, 'fn_tab' );

		// Remove whitespaces from starting and ending of shortcode attribtues
		$atts = array_map( 'trim', $atts );
		$default_class = ' tabs-title ';
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

		$anchor_tag = sprintf( '<a href="#" aria-selected="true">%s</a>', $atts['title'] );
		$accordion_content = sprintf( '<div class="accordion-s" data-tab-s>%s</div>', do_shortcode( $content ) );

		$html = sprintf( '<li%sclass="%s" data-accordion-item%s>%s</li>',
			$atts['id'],
			$atts['class'],
			$atts['style'],
			$anchor_tag . $accordion_content
		);

		return $html;

	}

}

// new FN_Tabs();
