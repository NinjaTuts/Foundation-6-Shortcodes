<?php

class FN_Badge_Test extends WP_UnitTestCase {

	/**
	 * Test whether [fn_badge] shortcode exists or not
	 * @return void
	 */
	public function test_shortcodes_fn_badge_exists() {

		$this->assertEquals( shortcode_exists( 'fn_badge' ), true );

	}

	/**
	 * Test whether [fn_badge] shortcode is executed or not
	 * @return void
	 */
	public function test_shortcodes_fn_badge() {

		$content = '[fn_badge]';
		$shortcode_content = do_shortcode( $content );
		$this->assertNotEquals( $content, $shortcode_content );

	}

	/**
	 * Test [fn_badge] shortcode with the below attributes each as empty attribute
	 * - id: 			[fn_badge id=""]
	 * - class:		[fn_badge class=""]
	 * - style:		[fn_badge style=""]
	 * - type:		[fn_badge type=""]
	 * @return void
	 */
	public function test_shortcodes_fn_badge_empty_attributes() {

		$id = '';
		$content = sprintf( '[fn_badge id="%s"]', $id );
		$shortcode_content = do_shortcode( $content );
		$this->assertNotContains( 'id=', $shortcode_content );

		$class = '';
		$content = sprintf( '[fn_badge class="%s"]', $class );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<span class="badge"></span>', $shortcode_content );

		$style = '';
		$content = sprintf( '[fn_badge style="%s"]', $style );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<span class="badge"></span>', $shortcode_content );

		$type = '';
		$content = sprintf( '[fn_badge type="%s"]', $type );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<span class="badge"></span>', $shortcode_content );

	}

	/**
	 * Test [fn_badge] shortcode with id attribute
	 * - id:	[fn_badge id="js-some-id"]
	 * @return void
	 */
	public function test_shortcodes_fn_badge_id() {

		$id = 'js-some-id';
		$content = sprintf( '[fn_badge id="%s"]', $id );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<span id="%s" class="badge"></span>', $id ), $shortcode_content );

	}

	/**
	 * Test [fn_badge] shortcode with class attribute
	 * - class:	[fn_badge class="some-class some-other-class"]	
	 * @return void
	 */
	public function test_shortcodes_fn_badge_class() {

		$class = 'some-class some-other-class';
		$content = sprintf( '[fn_badge class="%s"]', $class );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<span class="badge %s"></span>', $class ), $shortcode_content );

	}

	/**
	 * Test [fn_badge] shortcode with style attribute
	 * - style:	[fn_badge style="margin: 0; padding: 100px;"]
	 * @return void
	 */
	public function test_shortcodes_fn_badge_style() {

		$style = 'margin: 0; padding: 100px;';
		$content = sprintf( '[fn_badge style="%s"]', $style );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<span class="badge" style="%s"></span>', $style ), $shortcode_content );

	}

	/**
	 * Test [fn_badge] shortcode with type attribute
	 * - type:	[fn_badge type="success"]
	 * @return void
	 */
	public function test_shortcodes_fn_badge_type() {

		$type = 'success';
		$content = sprintf( '[fn_badge type="%s"]', $type );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<span class="%s badge"></span>', $type ), $shortcode_content );

	}

	/**
	 * Test [fn_badge] shortcode with content
	 * [fn_badge]A[/fn_bagde]
	 * @return void
	 */
	public function test_shortcodes_fn_badge_content() {

		$inner_content = 'A';
		$content = sprintf( '[fn_badge]%s[/fn_badge]', $inner_content );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<span class="badge">%s</span>', $inner_content ), $shortcode_content );

	}

}
