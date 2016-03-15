<?php

Class FN6S_Row {

	public function __construct() {

		add_shortcode( 'f6_row', array( $this, 'render' ) );

	}

	public function render( $atts, $content = null ) {

		$atts = shortcode_atts( array(
			'id'										=> null,
			'class'									=> null,
			'style'									=> null,
			'align_center' 					=> 'no',
			'align_right' 					=> 'no',
			'align_justify' 				=> 'no',
			'align_spaced' 					=> 'no',
			'align_top'							=> 'no',
			'align_middle'					=> 'no',
			'align_bottom'					=> 'no',
			'align_stretch'					=> 'no',
			'equalizer'							=> 'no',
		), $atts, 'f6_row' );

		// Remove whitespaces from starting and ending of shortcode attribtues
		$atts = array_map( 'trim', $atts );

		if ( ! empty( $atts['id'] ) ) {
			$atts['id'] = ' id="' . $atts['id'] . '" ';
		}

		if ( ! empty( $atts['class'] ) ) {
			$atts['class'] = ' ' . $atts['class'];
		}

		if ( ! empty( $atts['style'] ) ) {
			$atts['style'] = ' style="' . $atts['style'] . '"';
		}

		// $fullwidth = ( $fullwidth === 'yes' ) ? ' fullwidth' : '';

		// // Horizontal Alignment
		// $align_center = ( $align_center === 'yes' ) ? ' align-center' : '';
		// $align_right = ( $align_right === 'yes' ) ? ' align-right' : '';
		// $align_justify = ( $align_justify === 'yes' ) ? ' align-justify' : '';
		// $align_spaced = ( $align_spaced === 'yes' ) ? ' align-spaced' : '';

		// // Vertical Alignment
		// $align_top = ( $align_top === 'yes' ) ? ' align-top' : '';
		// $align_middle = ( $align_middle === 'yes' ) ? ' align-middle' : '';
		// $align_bottom = ( $align_bottom === 'yes' ) ? ' align-bottom' : '';
		// $align_stretch = ( $align_stretch === 'yes' ) ? ' align-stretch' : '';

		// $equalizer = ( $equalizer === 'yes' ) ? ' data-equalizer' : '';

		// $class .= $fullwidth . $align_center . $align_right . $align_justify . $align_spaced . $align_top . $align_middle . $align_bottom . $align_stretch;
		// $class = preg_replace('/\s+/', ' ', $class);

		// $html  = '<div' . $atts['id'] . ' class="row' . $class .'"' . $equalizer . '>';
		// $html .= do_shortcode( $content );
		// $html .= '</div>';

		$html = sprintf( '<div%sclass="row%s"%s>%s</div>', $atts['id'], $atts['class'], $atts['style'], do_shortcode( $content ) );

		return $html;

	}

}

new FN6S_Row();
