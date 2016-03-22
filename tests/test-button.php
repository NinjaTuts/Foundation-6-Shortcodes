<?php

class F6_Button extends WP_UnitTestCase {

	/**
	 * Test whether [fn_btn] shortcode exists or not
	 * @return void
	 */
	public function test_shortcodes_fn_btn_exists() {

		$this->assertEquals( shortcode_exists( 'fn_btn' ), true );

	}

	/**
	 * Test whether [fn_btn] shortcode is executed or not
	 * @return void
	 */
	public function test_shortcodes_fn_btn() {

		$content = '[fn_btn]';
		$shortcode_content = do_shortcode( $content );
		$this->assertNotEquals( $content, $shortcode_content );

	}

	/**
	 * Test [fn_btn] shortcode with the below attributes each as empty attribute
	 * - id: 					[fn_btn id=""]
	 * - class:				[fn_btn class=""]
	 * - style:				[fn_btn style=""]
	 * - link:				[fn_btn link=""]
	 * - target:			[fn_btn target=""]
	 * - size:				[fn_btn size=""]
	 * - expanded:		[fn_btn expanded=""]
	 * - type:				[fn_btn type=""]
	 * - disabled:		[fn_btn disabled=""]
	 * - hollow:			[fn_btn hollow=""]
	 * @return void
	 */
	public function test_shortcodes_fn_btn_empty_attributes() {

		$id = '';
		$content = sprintf( '[fn_btn id="%s"]', $id );
		$shortcode_content = do_shortcode( $content );
		$this->assertNotContains( 'id=', $shortcode_content );

		$class = '';
		$content = sprintf( '[fn_btn class="%s"]', $class );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<a href="javascript: void(0);" class="button"></a>', $shortcode_content );

		$style = '';
		$content = sprintf( '[fn_btn style="%s"]', $style );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<a href="javascript: void(0);" class="button"></a>', $shortcode_content );

		$link = '';
		$content = sprintf( '[fn_btn link="%s"]', $link );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<a href="javascript: void(0);" class="button"></a>', $shortcode_content );

		$target = '';
		$content = sprintf( '[fn_btn target="%s"]', $target );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<a href="javascript: void(0);" class="button"></a>', $shortcode_content );

		$size = '';
		$content = sprintf( '[fn_btn size="%s"]', $size );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<a href="javascript: void(0);" class="button"></a>', $shortcode_content );

		$type = '';
		$content = sprintf( '[fn_btn type="%s"]', $type );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<a href="javascript: void(0);" class="button"></a>', $shortcode_content );

		$expanded = '';
		$content = sprintf( '[fn_btn expanded="%s"]', $expanded );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<a href="javascript: void(0);" class="button"></a>', $shortcode_content );

		$disabled = '';
		$content = sprintf( '[fn_btn disabled="%s"]', $disabled );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<a href="javascript: void(0);" class="button"></a>', $shortcode_content );

		$hollow = '';
		$content = sprintf( '[fn_btn hollow="%s"]', $hollow );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<a href="javascript: void(0);" class="button"></a>', $shortcode_content );

	}

	/**
	 * Test [fn_btn] shortcode with id attribute
	 * - id:	[fn_btn id="js-some-id"]
	 * @return void
	 */
	public function test_shortcodes_fn_btn_id() {

		$id = 'js-some-id';
		$content = sprintf( '[fn_btn id="%s"]', $id );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<a href="javascript: void(0);" id="%s" class="button"></a>', $id ), $shortcode_content );

	}

	/**
	 * Test [fn_btn] shortcode with class attribute
	 * - class:	[fn_btn class="some-class some-other-class"]	
	 * @return void
	 */
	public function test_shortcodes_fn_btn_class() {

		$class = 'some-class some-other-class';
		$content = sprintf( '[fn_btn class="%s"]', $class );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<a href="javascript: void(0);" class="%s button"></a>', $class ), $shortcode_content );

	}

	/**
	 * Test [fn_btn] shortcode with style attribute
	 * - style:	[fn_btn style="margin: 0; padding: 100px;"]
	 * @return void
	 */
	public function test_shortcodes_fn_btn_style() {

		$style = 'margin: 0; padding: 100px;';
		$content = sprintf( '[fn_btn style="%s"]', $style );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<a href="javascript: void(0);" class="button" style="%s"></a>', $style ), $shortcode_content );

	}

	/**
	 * Test [fn_btn] shortcode with link attribute
	 * - link:	[fn_btn link="//www.google.com"]
	 * @return void
	 */
	public function test_shortcodes_fn_btn_link() {

		$link = '//www.google.com';
		$content = sprintf( '[fn_btn link="%s"]', $link );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<a href="%s" class="button"></a>', $link ), $shortcode_content );

	}

	/**
	 * Test [fn_btn] shortcode with target attribute
	 * - target:	[fn_btn target="_blank"]
	 * @return void
	 */
	public function test_shortcodes_fn_btn_target() {

		$target = '_blank';
		$content = sprintf( '[fn_btn target="%s"]', $target );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<a href="javascript: void(0);" target="%s" class="button"></a>', $target ), $shortcode_content );

	}

	/**
	 * Test [fn_btn] shortcode with size attribute
	 * - size:	[fn_btn size="tiny"]
	 * @return void
	 */
	public function test_shortcodes_fn_btn_size() {

		$size = 'tiny';
		$content = sprintf( '[fn_btn size="%s"]', $size );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<a href="javascript: void(0);" class="%s button"></a>', $size ), $shortcode_content );

	}

	/**
	 * Test [fn_btn] shortcode with expanded attribute
	 * - expanded:	[fn_btn expanded="yes"]
	 * @return void
	 */
	public function test_shortcodes_fn_btn_expanded() {

		$expanded = 'yes';
		$content = sprintf( '[fn_btn expanded="%s"]', $expanded );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<a href="javascript: void(0);" class="expanded button"></a>', $shortcode_content );

	}

	/**
	 * Test [fn_btn] shortcode with type attribute
	 * - type:	[fn_btn type="warning"]
	 * @return void
	 */
	public function test_shortcodes_fn_btn_type() {

		$type = 'warning';
		$content = sprintf( '[fn_btn type="%s"]', $type );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<a href="javascript: void(0);" class="%s button"></a>', $type ), $shortcode_content );

	}

	/**
	 * Test [fn_btn] shortcode with hollow attribute
	 * - hollow:	[fn_btn hollow="yes"]
	 * @return void
	 */
	public function test_shortcodes_fn_btn_hollow() {

		$hollow = 'yes';
		$content = sprintf( '[fn_btn hollow="%s"]', $hollow );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<a href="javascript: void(0);" class="hollow button"></a>', $shortcode_content );

	}

}
