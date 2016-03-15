<?php

Class FN6S_Columns {

	public function __construct() {

		add_shortcode( 'f6_col', array( $this, 'render' ) );

	}

	public function render( $atts, $content = '' ) {

		extract( shortcode_atts(
			array(
				'id'							=> '',
				'class'						=> '',
				'small'						=> 12,
				'medium'					=> 12,
				'large'						=> 12,
				'align_top'				=> 'no',
				'align_middle'		=> 'no',
				'align_bottom'		=> 'no',
				'align_stretch'		=> 'no',
				'equalizer'				=> 'no'
			), $atts )
		);

		$id = ( $id ) ? ' id="' . $id . '"' : '';

		// Columns in different breakpoints
		$small = ( $small !== 12 ) ? 'small-' . $small : 'small-12';
		$medium = ( $medium !== 12 ) ? ' medium-' . $medium : '';
		$large = ( $large !== 12 ) ? ' large-' . $large : '';

		$class = ( $class ) ? ' ' . $class : '';

		// Vertical Alignment
		$align_top = ( $align_top === 'yes' ) ? ' align-top' : '';
		$align_middle = ( $align_middle === 'yes' ) ? ' align-middle' : '';
		$align_bottom = ( $align_bottom === 'yes' ) ? ' align-bottom' : '';
		$align_stretch = ( $align_stretch === 'yes' ) ? ' align-stretch' : '';

		$equalizer = ( $equalizer === 'yes' ) ? ' data-equalizer-watch' : '';

		$size_classes = $small . $medium . $large;
		$alignment_classes =  $align_top . $align_middle . $align_bottom . $align_stretch;

		$class = $size_classes . $alignment_classes . ' columns' . $class;
		$class = preg_replace('/\s+/', ' ', trim( $class) ); // Remove unnecessary whitespaces

		$html  = '<div' . $id . ' class="' . $class . '"' . $equalizer . '>';
		$html .= do_shortcode( $content );
		$html .= '</div>';

		return $html;

	}

}

new FN6S_Columns();
