<?php

class FN_Callout_Test extends WP_UnitTestCase {

	private	$close_btn_html;

	public function __construct() {

		$this->close_btn_html = '<button class="close-button" aria-label="Dismiss" type="button" data-close><span aria-hidden="true">&times;</span></button>';

	}

	/**
	 * Test whether [fn_callout] shortcode exists or not
	 * @return void
	 */
	public function test_shortcodes_fn_callout_exists() {

		$this->assertEquals( shortcode_exists( 'fn_callout' ), true );

	}

	/**
	 * Test whether [fn_callout] shortcode is executed or not
	 * @return void
	 */
	public function test_shortcodes_fn_callout() {

		$content = '[fn_callout]';
		$shortcode_content = do_shortcode( $content );
		$this->assertNotEquals( $content, $shortcode_content );

	}

	/**
	 * Test [fn_callout] shortcode with the below attributes each as empty attribute
	 * - id: 										[fn_callout id=""]
	 * - class:									[fn_callout class=""]
	 * - style:									[fn_callout style=""]
	 * - type:									[fn_callout type=""]
	 * - size:									[fn_callout size=""]
	 * - closable:							[fn_callout closable=""]
	 * - closable_animation:		[fn_callout closable_animation=""]
	 * @return void
	 */
	public function test_shortcodes_fn_callout_empty_attributes() {

		$id = '';
		$content = sprintf( '[fn_callout id="%s"]', $id );
		$shortcode_content = do_shortcode( $content );
		$this->assertNotContains( 'id=', $shortcode_content );

		$class = '';
		$content = sprintf( '[fn_callout class="%s"]', $class );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="callout"></div>', $shortcode_content );

		$style = '';
		$content = sprintf( '[fn_callout style="%s"]', $style );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="callout"></div>', $shortcode_content );

		$type = '';
		$content = sprintf( '[fn_callout type="%s"]', $type );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="callout"></div>', $shortcode_content );

		$size = '';
		$content = sprintf( '[fn_callout size="%s"]', $size );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="callout"></div>', $shortcode_content );

		$closable = '';
		$content = sprintf( '[fn_callout closable="%s"]', $closable );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="callout"></div>', $shortcode_content );

		$closable_animation = '';
		$content = sprintf( '[fn_callout closable_animation="%s"]', $closable_animation );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="callout"></div>', $shortcode_content );

	}

	/**
	 * Test [fn_callout] shortcode with id attribute
	 * - id:	[fn_callout id="js-some-id"]
	 * @return void
	 */
	public function test_shortcodes_fn_callout_id() {

		$id = 'js-some-id';
		$content = sprintf( '[fn_callout id="%s"]', $id );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<div id="%s" class="callout"></div>', $id ), $shortcode_content );

	}

	/**
	 * Test [fn_callout] shortcode with class attribute
	 * - class:	[fn_callout class="some-class some-other-class"]	
	 * @return void
	 */
	public function test_shortcodes_fn_callout_class() {

		$class = 'some-class some-other-class';
		$content = sprintf( '[fn_callout class="%s"]', $class );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<div class="callout %s"></div>', $class ), $shortcode_content );

	}

	/**
	 * Test [fn_callout] shortcode with style attribute
	 * - style:	[fn_callout style="margin: 0; padding: 100px;"]
	 * @return void
	 */
	public function test_shortcodes_fn_callout_style() {

		$style = 'margin: 0; padding: 100px;';
		$content = sprintf( '[fn_callout style="%s"]', $style );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<div class="callout" style="%s"></div>', $style ), $shortcode_content );

	}

	/**
	 * Test [fn_callout] shortcode with type attribute
	 * - type:	[fn_callout type="success"]
	 * @return void
	 */
	public function test_shortcodes_fn_callout_type() {

		$type = 'success';
		$content = sprintf( '[fn_callout type="%s"]', $type );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<div class="callout %s"></div>', $type ), $shortcode_content );

	}

	/**
	 * Test [fn_callout] shortcode with size attribute
	 * - size:	[fn_callout size="success"]
	 * @return void
	 */
	public function test_shortcodes_fn_callout_size() {

		$size = 'large';
		$content = sprintf( '[fn_callout size="%s"]', $size );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<div class="callout %s"></div>', $size ), $shortcode_content );

	}

	/**
	 * Test [fn_callout] shortcode with closable attribute
	 * - closable:	[fn_callout closable="yes"]
	 * @return void
	 */
	public function test_shortcodes_fn_callout_closable() {

		$closable = 'yes';
		$content = sprintf( '[fn_callout closable="%s"]', $closable );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<div class="callout" data-closable>%s</div>', $this->close_btn_html ), $shortcode_content );

	}

	/**
	 * Test [fn_callout] shortcode with closable_animation attribute
	 * - closable:	[fn_callout closable="yes"]
	 * - closable_animation:	[fn_callout closable_animation="slide-out-right"]
	 * @return void
	 */
	public function test_shortcodes_fn_callout_closable_animation() {

		$closable = 'yes';
		$closable_animation = 'slide-out-right';
		$content = sprintf( '[fn_callout closable="%s" closable_animation="%s"]', $closable, $closable_animation );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals(
			sprintf( '<div class="callout" data-closable="%s">%s</div>',
				$closable_animation,
				$this->close_btn_html 
			),
			$shortcode_content
		);

	}

	/**
	 * Test [fn_callout] shortcode with content
	 * [fn_callout]<p>Lorem Ipsum</p>[/fn_bagde]
	 * @return void
	 */
	public function test_shortcodes_fn_callout_content() {

		$inner_content = '<p>Lorem Ipsum</p>';
		$content = sprintf( '[fn_callout]%s[/fn_callout]', $inner_content );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<div class="callout">%s</div>', $inner_content ), $shortcode_content );

	}

}
