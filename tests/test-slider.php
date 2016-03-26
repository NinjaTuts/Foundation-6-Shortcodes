<?php

class FN_Slider_Test extends WP_UnitTestCase {

	/**
	 * Store the Slider Inner HTML
	 */
	private $slider_inner_html;

	/**
	 * Constructor
	 */
	public function __construct() {

		$this->slider_inner_html = '<span class="slider-handle" data-slider-handle role="slider"></span><span class="slider-fill" data-slider-fill></span><input type="hidden">';

	}

	/**
	 * Test whether [fn_slider] shortcode exists or not
	 * @return void
	 */
	public function test_shortcodes_fn_slider_exists() {

		$this->assertEquals( shortcode_exists( 'fn_slider' ), true );

	}

	/**
	 * Test whether [fn_slider] shortcode is executed or not
	 * @return void
	 */
	public function test_shortcodes_fn_slider() {

		$content = '[fn_slider]';
		$shortcode_content = do_shortcode( $content );
		$this->assertNotEquals( $content, $shortcode_content );

	}

	/**
	 * Test [fn_slider] shortcode with the below attributes each as empty attribute
	 * - id: 						[fn_slider id=""]
	 * - class:					[fn_slider class=""]
	 * - style:					[fn_slider style=""]
	 * - vertical:			[fn_slider vertical=""]
	 * - disabled:			[fn_slider disabled=""]
	 * - start:					[fn_slider start=""]
	 * - end:						[fn_slider end=""]
	 * @return void
	 */
	public function test_shortcodes_fn_slider_empty_attributes() {

		$id = '';
		$content = sprintf( '[fn_slider id="%s"]', $id );
		$shortcode_content = do_shortcode( $content );
		$this->assertNotContains( 'id=', $shortcode_content );

		$class = '';
		$content = sprintf( '[fn_slider class="%s"]', $class );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals(
			sprintf( '<div class="slider" data-slider data-initial-start="1" data-end="5">%s</div>',
				$this->slider_inner_html
			), 
			$shortcode_content 
		);

		$style = '';
		$content = sprintf( '[fn_slider style="%s"]', $style );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals(
			sprintf( '<div class="slider" data-slider data-initial-start="1" data-end="5">%s</div>',
				$this->slider_inner_html
			), 
			$shortcode_content 
		);

		$vertical = '';
		$content = sprintf( '[fn_slider vertical="%s"]', $vertical );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals(
			sprintf( '<div class="slider" data-slider data-initial-start="1" data-end="5">%s</div>',
				$this->slider_inner_html
			), 
			$shortcode_content 
		);

		$disabled = '';
		$content = sprintf( '[fn_slider disabled="%s"]', $disabled );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals(
			sprintf( '<div class="slider" data-slider data-initial-start="1" data-end="5">%s</div>',
				$this->slider_inner_html
			), 
			$shortcode_content 
		);

		$start = '';
		$content = sprintf( '[fn_slider start="%s"]', $start );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals(
			sprintf( '<div class="slider" data-slider data-initial-start="1" data-end="5">%s</div>',
				$this->slider_inner_html
			), 
			$shortcode_content 
		);

		$end = '';
		$content = sprintf( '[fn_slider end="%s"]', $end );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals(
			sprintf( '<div class="slider" data-slider data-initial-start="1" data-end="5">%s</div>',
				$this->slider_inner_html
			), 
			$shortcode_content 
		);

	}

	/**
	 * Test [fn_slider] shortcode with id attribute
	 * - id:	[fn_slider id="js-some-id"]
	 * @return void
	 */
	public function test_shortcodes_fn_slider_id() {

		$id = 'js-some-id';
		$content = sprintf( '[fn_slider id="%s"]', $id );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals(
			sprintf( '<div id="%s" class="slider" data-slider data-initial-start="1" data-end="5">%s</div>',
				$id,
				$this->slider_inner_html
			), 
			$shortcode_content 
		);

	}

	/**
	 * Test [fn_slider] shortcode with class attribute
	 * - class:	[fn_slider class="some-class some-other-class"]	
	 * @return void
	 */
	public function test_shortcodes_fn_slider_class() {

		$class = 'some-class some-other-class';
		$content = sprintf( '[fn_slider class="%s"]', $class );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals(
			sprintf( '<div class="slider %s" data-slider data-initial-start="1" data-end="5">%s</div>',
				$class,
				$this->slider_inner_html
			), 
			$shortcode_content 
		);

	}

	/**
	 * Test [fn_slider] shortcode with style attribute
	 * - style:	[fn_slider style="margin: 0; padding: 100px;"]
	 * @return void
	 */
	public function test_shortcodes_fn_slider_style() {

		$style = 'margin: 0; padding: 100px;';
		$content = sprintf( '[fn_slider style="%s"]', $style );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals(
			sprintf( '<div class="slider" data-slider data-initial-start="1" data-end="5" style="%s">%s</div>',
				$style,
				$this->slider_inner_html
			), 
			$shortcode_content 
		);

	}

	/**
	 * Test [fn_slider] shortcode with vertical attribute
	 * - vertical:	[fn_slider vertical="yes"]
	 * @return void
	 */
	public function test_shortcodes_fn_slider_vertical() {

		$vertical = 'yes';
		$content = sprintf( '[fn_slider vertical="%s"]', $vertical );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals(
			sprintf( '<div class="slider vertical" data-slider data-initial-start="1" data-end="5" data-vertical="true" >%s</div>',
				$this->slider_inner_html
			), 
			$shortcode_content 
		);

	}


	/**
	 * Test [fn_slider] shortcode with disabled attribute
	 * - disabled:	[fn_slider disabled="yes"]
	 * @return void
	 */
	public function test_shortcodes_fn_slider_disabled() {

		$disabled = 'yes';
		$content = sprintf( '[fn_slider disabled="%s"]', $disabled );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals(
			sprintf( '<div class="slider disabled" data-slider data-initial-start="1" data-end="5">%s</div>',
				$this->slider_inner_html
			), 
			$shortcode_content 
		);

	}

	/**
	 * Test [fn_slider] shortcode with start attribute
	 * - start:	[fn_slider start="5"]
	 * @return void
	 */
	public function test_shortcodes_fn_slider_start() {

		$start = 5;
		$content = sprintf( '[fn_slider start="%s"]', $start );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals(
			sprintf( '<div class="slider" data-slider data-initial-start="%s" data-end="5">%s</div>',
				$start,
				$this->slider_inner_html
			), 
			$shortcode_content 
		);

	}

	/**
	 * Test [fn_slider] shortcode with end attribute
	 * - end:	[fn_slider end="5"]
	 * @return void
	 */
	public function test_shortcodes_fn_slider_end() {

		$end = 5;
		$content = sprintf( '[fn_slider end="%s"]', $end );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals(
			sprintf( '<div class="slider" data-slider data-initial-start="1" data-end="%s">%s</div>',
				$end,
				$this->slider_inner_html
			), 
			$shortcode_content 
		);

	}

}
