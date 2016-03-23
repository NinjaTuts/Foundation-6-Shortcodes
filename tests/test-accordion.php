<?php

class FN_Accordion_Test extends WP_UnitTestCase {

	/**
	 * Test whether [fn_accordion] shortcode exists or not
	 * @return void
	 */
	public function test_shortcodes_fn_accordion_exists() {

		$this->assertEquals( shortcode_exists( 'fn_accordion' ), true );

	}

	/**
	 * Test whether [fn_accordion] shortcode is executed or not
	 * @return void
	 */
	public function test_shortcodes_fn_accordion() {

		$content = '[fn_accordion]';
		$shortcode_content = do_shortcode( $content );
		$this->assertNotEquals( $content, $shortcode_content );

	}

	/**
	 * Test [fn_accordion] shortcode with the below attributes each as empty attribute
	 * - id: 							[fn_accordion id=""]
	 * - class:						[fn_accordion class=""]
	 * - style:						[fn_accordion style=""]
	 * - multi_expand:		[fn_accordion multi_expand=""]
	 * - all_close:				[fn_accordion all_close=""]
	 * @return void
	 */
	public function test_shortcodes_fn_accordion_empty_attributes() {

		$id = '';
		$content = sprintf( '[fn_accordion id="%s"]', $id );
		$shortcode_content = do_shortcode( $content );
		$this->assertNotContains( 'id=', $shortcode_content );

		$class = '';
		$content = sprintf( '[fn_accordion class="%s"]', $class );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<ul class="accordion" data-accordion></ul>', $shortcode_content );

		$style = '';
		$content = sprintf( '[fn_accordion style="%s"]', $style );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<ul class="accordion" data-accordion></ul>', $shortcode_content );

		$multi_expand = '';
		$content = sprintf( '[fn_accordion multi_expand="%s"]', $multi_expand );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<ul class="accordion" data-accordion></ul>', $shortcode_content );

		$all_close = '';
		$content = sprintf( '[fn_accordion all_close="%s"]', $all_close );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<ul class="accordion" data-accordion></ul>', $shortcode_content );

	}

	/**
	 * Test [fn_accordion] shortcode with id attribute
	 * - id:	[fn_accordion id="js-some-id"]
	 * @return void
	 */
	public function test_shortcodes_fn_accordion_id() {

		$id = 'js-some-id';
		$content = sprintf( '[fn_accordion id="%s"]', $id );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<ul id="%s" class="accordion" data-accordion></ul>', $id ), $shortcode_content );

	}

	/**
	 * Test [fn_accordion] shortcode with class attribute
	 * - class:	[fn_accordion class="some-class some-other-class"]	
	 * @return void
	 */
	public function test_shortcodes_fn_accordion_class() {

		$class = 'some-class some-other-class';
		$content = sprintf( '[fn_accordion class="%s"]', $class );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<ul class="accordion %s" data-accordion></ul>', $class ), $shortcode_content );

	}

	/**
	 * Test [fn_accordion] shortcode with style attribute
	 * - style:	[fn_accordion style="margin: 0; padding: 100px;"]
	 * @return void
	 */
	public function test_shortcodes_fn_accordion_style() {

		$style = 'margin: 0; padding: 100px;';
		$content = sprintf( '[fn_accordion style="%s"]', $style );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<ul class="accordion" data-accordion style="%s"></ul>', $style ), $shortcode_content );

	}

	/**
	 * Test [fn_accordion] shortcode with multi_expand attribute
	 * - multi_expand:	[fn_accordion multi_expand="yes"]
	 * @return void
	 */
	public function test_shortcodes_fn_accordion_multi_expand() {

		$multi_expand = 'yes';
		$content = sprintf( '[fn_accordion multi_expand="%s"]', $multi_expand );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<ul class="accordion" data-multi-expand="true"  data-accordion></ul>', $shortcode_content );

	}

	/**
	 * Test [fn_accordion] shortcode with all_close attribute
	 * - all_close:	[fn_accordion all_close="yes"]
	 * @return void
	 */
	public function test_shortcodes_fn_accordion_all_close() {

		$all_close = 'yes';
		$content = sprintf( '[fn_accordion all_close="%s"]', $all_close );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<ul class="accordion" data-allow-all-closed="true"  data-accordion></ul>', $shortcode_content );

	}

}
