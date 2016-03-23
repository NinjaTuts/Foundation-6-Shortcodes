<?php

class FN_Toggle_Test extends WP_UnitTestCase {

	/**
	 * Store the toggle html
	 */
	private $toggle_html;
	/**
	 * Store the Accordion Title
	 */
	private $title;

	public function __construct() {

		$this->toggle_html = '<li class="accordion-item" data-accordion-item><a href="#" class="accordion-title">%s</a><div class="accordion-content" data-tab-content></div></li>';
		$this->title = "Accordion Title";

	}

	/**
	 * Test whether [fn_toggle] shortcode exists or not
	 * @return void
	 */
	public function test_shortcodes_fn_toggle_exists() {

		$this->assertEquals( shortcode_exists( 'fn_toggle' ), true );

	}

	/**
	 * Test whether [fn_toggle] shortcode is executed or not
	 * @return void
	 */
	public function test_shortcodes_fn_toggle() {

		$content = '[fn_toggle]';
		$shortcode_content = do_shortcode( $content );
		$this->assertNotEquals( $content, $shortcode_content );

	}

	/**
	 * Test [fn_toggle] shortcode without title attribute
	 * @return void
	 */
	public function test_shortcodes_fn_toggle_without_title() {

		$content = '[fn_toggle]';
		$shortcode_content = do_shortcode( $content );
		$this->assertEmpty( $shortcode_content );

	}

	/**
	 * Test [fn_toggle] shortcode with the below attributes each as empty attribute
	 * - title, id: 							[fn_toggle title="" id=""]
	 * - title, class:						[fn_toggle title="" class=""]
	 * - title, style:						[fn_toggle title="" style=""]
	 * - title:										[fn_toggle title=""]
	 * - title, is_active:				[fn_toggle title="" is_active=""]
	 * @return void
	 */
	public function test_shortcodes_fn_toggle_empty_attributes() {

		$id = '';
		$content = sprintf( '[fn_toggle title="%s" id="%s"]', $this->title, $id );
		$shortcode_content = do_shortcode( $content );
		$this->assertNotContains( 'id=', $shortcode_content );

		$class = '';
		$content = sprintf( '[fn_toggle title="%s" class="%s"]', $this->title, $class );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( $this->toggle_html, $this->title ), $shortcode_content );

		$style = '';
		$content = sprintf( '[fn_toggle title="%s" style="%s"]', $this->title, $style );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( $this->toggle_html, $this->title ), $shortcode_content );

		$title = '';
		$content = sprintf( '[fn_toggle title="%s"]', $title );
		$shortcode_content = do_shortcode( $content );
		$this->assertEmpty( $shortcode_content );

		$is_active = '';
		$content = sprintf( '[fn_toggle title="%s" is_active="%s"]', $this->title, $is_active );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( $this->toggle_html, $this->title ), $shortcode_content );

	}

	/**
	 * Test [fn_toggle] shortcode with id attribute
	 * - title, id:	[fn_toggle title="" id="js-some-id"]
	 * @return void
	 */
	public function test_shortcodes_fn_toggle_id() {

		$id = 'js-some-id';
		$content = sprintf( '[fn_toggle title="%s" id="%s"]', $this->title, $id );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( 
			sprintf( '<li id="%s" class="accordion-item" data-accordion-item><a href="#" class="accordion-title">%s</a><div class="accordion-content" data-tab-content></div></li>', 
				$id,
				$this->title
			), 
			$shortcode_content 
		);
	}

	/**
	 * Test [fn_toggle] shortcode with class attribute
	 * - title, class:	[fn_toggle title="" class="some-class some-other-class"]	
	 * @return void
	 */
	public function test_shortcodes_fn_toggle_class() {

		$class = 'some-class some-other-class';
		$content = sprintf( '[fn_toggle title="%s" class="%s"]', $this->title, $class );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( 
			sprintf( '<li class="accordion-item %s" data-accordion-item><a href="#" class="accordion-title">%s</a><div class="accordion-content" data-tab-content></div></li>', 
				$class,
				$this->title
			), 
			$shortcode_content 
		);

	}

	/**
	 * Test [fn_toggle] shortcode with style attribute
	 * - title, style:	[fn_toggle title="" style="margin: 0; padding: 100px;"]
	 * @return void
	 */
	public function test_shortcodes_fn_toggle_style() {

		$style = 'margin: 0; padding: 100px;';
		$content = sprintf( '[fn_toggle title="%s" style="%s"]', $this->title, $style );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( 
			sprintf( '<li class="accordion-item" data-accordion-item style="%s"><a href="#" class="accordion-title">%s</a><div class="accordion-content" data-tab-content></div></li>', 
				$style,
				$this->title
			), 
			$shortcode_content 
		);

	}

	/**
	 * Test [fn_toggle] shortcode with title attribute
	 * - title:	[fn_toggle title="yes"]
	 * @return void
	 */
	public function test_shortcodes_fn_toggle_title() {

		$content = sprintf( '[fn_toggle title="%s"]', $this->title );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( 
			sprintf( '<li class="accordion-item" data-accordion-item><a href="#" class="accordion-title">%s</a><div class="accordion-content" data-tab-content></div></li>', 
				$this->title
			), 
			$shortcode_content 
		);

	}

	/**
	 * Test [fn_toggle] shortcode with is_active attribute
	 * - is_active:	[fn_toggle is_active="yes"]
	 * @return void
	 */
	public function test_shortcodes_fn_toggle_is_active() {

		$is_active = 'yes';
		$content = sprintf( '[fn_toggle title="%s" is_active="%s"]', $this->title, $is_active );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( 
			sprintf( '<li class="accordion-item is-active" data-accordion-item><a href="#" class="accordion-title">%s</a><div class="accordion-content" data-tab-content></div></li>', 
				$this->title
			), 
			$shortcode_content 
		);

	}

}
