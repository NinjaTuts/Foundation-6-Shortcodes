<?php

Class FN_Orbit {

	private $slide_count;
	private $btn_html;

	public function __construct() {

		$this->slide_count = 0;
		$this->btn_html = '<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span> &#9664;&#xFE0E;</button><button class="orbit-next"><span class="show-for-sr">Next Slide</span> &#9654;&#xFE0E;</button>';

		add_shortcode( 'fn_orbit', array( $this, 'render_parent' ) );
		add_shortcode( 'fn_slide', array( $this, 'render_child' ) );

	}

	public function render_parent( $atts, $content = null ) {

		// Reset slide count to 0
		$this->slide_count = 0;

		$atts = shortcode_atts( array(
			'id'										=> null,
			'class'									=> null,
			'style'									=> null,
			'label' 								=> null,
			'arrows' 								=> null,
			'bullets' 							=> null,
			'animation' 						=> null,
		), $atts, 'fn_orbit' );


		// Remove whitespaces from starting and ending of shortcode attributes
		$atts = array_map( 'trim', $atts );
		$default_class = ' orbit ';
		$class = '';
		$bullets = '';
		$nav = '';

		if ( ! empty( $atts['id'] ) ) {
			$atts['id'] = ' id="' . $atts['id'] . '" ';
		} else {
			$atts['id'] = ' ';
		}

		if ( ! empty( $atts['style'] ) ) {
			$atts['style'] = ' style="' . $atts['style'] . '"';
		}

		if ( ! empty( $atts['label'] ) ) {
			$atts['label'] = ' aria-label="' . $atts['label'] . '" ';
		} else {
			$atts['label'] = ' ';
		}

		if ( 'yes' !== strtolower( $atts['arrows'] ) ) {
			$this->btn_html = '';
		}

		if ( 'no' === strtolower( $atts['animation'] ) ) {
			$atts['animation'] = ' data-use-m-u-i="false"';
		} else {
			$atts['animation'] = '';
		}

		if ( ! empty( $atts['class'] ) ) {
			$atts['class'] = $default_class . $class . $atts['class'];
		} else {
			$atts['class'] = $default_class . $class;
		}

		$inner_html = sprintf( '<ul class="orbit-container">%s%s</ul>',
			$this->btn_html,
			do_shortcode( $content )
		);

		if ( 'yes' === strtolower( $atts['bullets'] ) ) {

			// Generate bullets based on [fn_slide] count
			for ( $i = 0; $i < $this->slide_count; $i++ ) {

				if( 0 === $i ) {
					$is_active = ' class="is-active" ';
				} else {
					$is_active = ' ';
				}

				$bullets .= sprintf( '<button%sdata-slide="%s"></button>',
					$is_active,
					$i
				); 

			}

			$nav = sprintf( '<nav class="orbit-bullets">%s</nav>', $bullets );

		}

		$atts = preg_replace( '/\s+/', ' ', $atts );
		$atts['class'] = trim( $atts['class'] );

		$html = sprintf( '<div%sclass="%s"%srole="region" data-orbit%s%s>%s%s</div>',
			$atts['id'],
			$atts['class'],
			$atts['label'],
			$atts['animation'],
			$atts['style'],
			$inner_html,
			$nav
		);

		return $html;

	}

	public function render_child( $atts, $content = null ) {

		$atts = shortcode_atts( array(
			'id'										=> null,
			'class'									=> null,
			'style'									=> null,
		), $atts, 'fn_slide' );

		// Remove whitespaces from starting and ending of shortcode attributes
		$atts = array_map( 'trim', $atts );
		$default_class = ' orbit-slide ';
		$class = '';

		if ( ! empty( $atts['id'] ) ) {
			$atts['id'] = ' id="' . $atts['id'] . '" ';
		} else {
			$atts['id'] = ' ';
		}

		if ( ! empty( $atts['style'] ) ) {
			$atts['style'] = ' style="' . $atts['style'] . '"';
		}

		if ( ! empty( $atts['class'] ) ) {
			$atts['class'] = $default_class . $class . $atts['class'];
		} else {
			$atts['class'] = $default_class . $class;
		}

		$atts = preg_replace( '/\s+/', ' ', $atts );
		$atts['class'] = trim( $atts['class'] );

		$html = sprintf( '<li%sclass="%s"%s>%s</li>',
			$atts['id'],
			$atts['class'],
			$atts['style'],
			do_shortcode( $content )
		);

		// Count the number of [fn_slider] shortcodes inside [fn_orbit] shortcode
		$this->slide_count++;

		return $html;

	}

}

new FN_Orbit();
