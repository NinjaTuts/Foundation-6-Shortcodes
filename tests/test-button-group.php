<?php

class FN_Button_Group_Test extends WP_UnitTestCase {

	/**
	 * Test whether [fn_btn_group] shortcode exists or not
	 * @return void
	 */
	public function test_shortcodes_fn_btn_group_exists() {

		$this->assertEquals( shortcode_exists( 'fn_btn_group' ), true );

	}

	/**
	 * Test whether [fn_btn_group] shortcode is executed or not
	 * @return void
	 */
	public function test_shortcodes_fn_btn_group() {

		$content = '[fn_btn_group]';
		$shortcode_content = do_shortcode( $content );
		$this->assertNotEquals( $content, $shortcode_content );

	}

	/**
	 * Test [fn_btn_group] shortcode with the below attributes each as empty attribute
	 * - id: 					[fn_btn_group id=""]
	 * - class:				[fn_btn_group class=""]
	 * - style:				[fn_btn_group style=""]
	 * - size:				[fn_btn_group size=""]
	 * - type:				[fn_btn_group type=""]
	 * - expanded:		[fn_btn_group expanded=""]
	 * @return void
	 */
	public function test_shortcodes_fn_btn_group_empty_attributes() {

		$id = '';
		$content = sprintf( '[fn_btn_group id="%s"]', $id );
		$shortcode_content = do_shortcode( $content );
		$this->assertNotContains( 'id=', $shortcode_content );

		$class = '';
		$content = sprintf( '[fn_btn_group class="%s"]', $class );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="button-group"></div>', $shortcode_content );

		$style = '';
		$content = sprintf( '[fn_btn_group style="%s"]', $style );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="button-group"></div>', $shortcode_content );

		$size = '';
		$content = sprintf( '[fn_btn_group size="%s"]', $size );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="button-group"></div>', $shortcode_content );

		$type = '';
		$content = sprintf( '[fn_btn_group type="%s"]', $type );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="button-group"></div>', $shortcode_content );

		$expanded = '';
		$content = sprintf( '[fn_btn_group expanded="%s"]', $expanded );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="button-group"></div>', $shortcode_content );

	}

	/**
	 * Test [fn_btn_group] shortcode with id attribute
	 * - id:	[fn_btn_group id="js-some-id"]
	 * @return void
	 */
	public function test_shortcodes_fn_btn_group_id() {

		$id = 'js-some-id';
		$content = sprintf( '[fn_btn_group id="%s"]', $id );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<div id="%s" class="button-group"></div>', $id ), $shortcode_content );

	}

	/**
	 * Test [fn_btn_group] shortcode with class attribute
	 * - class:	[fn_btn_group class="some-class some-other-class"]	
	 * @return void
	 */
	public function test_shortcodes_fn_btn_group_class() {

		$class = 'some-class some-other-class';
		$content = sprintf( '[fn_btn_group class="%s"]', $class );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<div class="button-group %s"></div>', $class ), $shortcode_content );

	}

	/**
	 * Test [fn_btn_group] shortcode with style attribute
	 * - style:	[fn_btn_group style="margin: 0; padding: 100px;"]
	 * @return void
	 */
	public function test_shortcodes_fn_btn_group_style() {

		$style = 'margin: 0; padding: 100px;';
		$content = sprintf( '[fn_btn_group style="%s"]', $style );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<div class="button-group" style="%s"></div>', $style ), $shortcode_content );

	}

	/**
	 * Test [fn_btn_group] shortcode with size attribute
	 * - size:	[fn_btn_group size="tiny"]
	 * @return void
	 */
	public function test_shortcodes_fn_btn_group_size() {

		$size = 'tiny';
		$content = sprintf( '[fn_btn_group size="%s"]', $size );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<div class="%s button-group"></div>', $size ), $shortcode_content );

	}

	/**
	 * Test [fn_btn_group] shortcode with type attribute
	 * - type:	[fn_btn_group type="secondary"]
	 * @return void
	 */
	public function test_shortcodes_fn_btn_group_type() {

		$type = 'secondary';
		$content = sprintf( '[fn_btn_group type="%s"]', $type );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<div class="%s button-group"></div>', $type ), $shortcode_content );

	}

	/**
	 * Test [fn_btn_group] shortcode with expanded attribute
	 * - expanded:	[fn_btn_group expanded="yes"]
	 * @return void
	 */
	public function test_shortcodes_fn_btn_group_expanded() {

		$expanded = 'yes';
		$content = sprintf( '[fn_btn_group expanded="%s"]', $expanded );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="expanded button-group"></div>', $shortcode_content );

	}

}
