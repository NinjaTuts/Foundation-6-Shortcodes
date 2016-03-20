<?php

class F6_Subheader extends WP_UnitTestCase {

	/**
	 * Test whether [fn_subheader] shortcode exists or not
	 * @return void
	 */
	public function test_shortcodes_fn_subheader_exists() {

		$this->assertEquals( shortcode_exists( 'fn_subheader' ), true );

	}

	/**
	 * Test whether [fn_subheader] shortcode is executed or not
	 * @return void
	 */
	public function test_shortcodes_fn_subheader() {

		$content = '[fn_subheader]';
		$shortcode_content = do_shortcode( $content );
		$this->assertNotEquals( $content, $shortcode_content );

	}

	/**
	 * Test [fn_subheader] shortcode with the below attributes each as empty attribute
	 * - id: 			[fn_subheader id=""]
	 * - class:		[fn_subheader class=""]
	 * - style:		[fn_subheader style=""]
	 * - type:		[fn_subheader type=""]
	 * @return void
	 */
	public function test_shortcodes_fn_subheader_empty_attributes() {

		$id = '';
		$content = sprintf( '[fn_subheader id="%s"]', $id );
		$shortcode_content = do_shortcode( $content );
		$this->assertNotContains( 'id=', $shortcode_content );

		$class = '';
		$content = sprintf( '[fn_subheader class="%s"]', $class );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<h1 class="subheader"></h1>', $shortcode_content );

		$style = '';
		$content = sprintf( '[fn_subheader style="%s"]', $style );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<h1 class="subheader"></h1>', $shortcode_content );

		$type = '';
		$content = sprintf( '[fn_subheader type="%s"]', $type );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<h1 class="subheader"></h1>', $shortcode_content );

	}

	/**
	 * Test [fn_subheader] shortcode with id attribute
	 * - id:	[fn_subheader id="js-some-id"]
	 * @return void
	 */
	public function test_shortcodes_fn_subheader_id() {

		$id = 'js-some-id';
		$content = sprintf( '[fn_subheader id="%s"]', $id );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<h1 id="%s" class="subheader"></h1>', $id ), $shortcode_content );

	}

	/**
	 * Test [fn_subheader] shortcode with class attribute
	 * - class:	[fn_subheader class="some-class some-other-class"]	
	 * @return void
	 */
	public function test_shortcodes_fn_subheader_class() {

		$class = 'some-class some-other-class';
		$content = sprintf( '[fn_subheader class="%s"]', $class );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<h1 class="subheader %s"></h1>', $class ), $shortcode_content );

	}

	/**
	 * Test [fn_subheader] shortcode with style attribute
	 * - style:	[fn_subheader style="margin: 0; padding: 100px;"]
	 * @return void
	 */
	public function test_shortcodes_fn_subheader_style() {

		$style = 'margin: 0; padding: 100px;';
		$content = sprintf( '[fn_subheader style="%s"]', $style );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<h1 class="subheader" style="%s"></h1>', $style ), $shortcode_content );

	}

	/**
	 * Test [fn_subheader] shortcode with type attribute
	 * - type:	[fn_subheader type="3"]
	 * @return void
	 */
	public function test_shortcodes_fn_subheader_type() {

		$type = 3;
		$content = sprintf( '[fn_subheader type="%s"]', $type );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<h%s class="subheader"></h%s>', $type, $type ), $shortcode_content );

	}

}
