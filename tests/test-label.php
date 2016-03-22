<?php

class FN_Label_Test extends WP_UnitTestCase {

	/**
	 * Test whether [fn_label] shortcode exists or not
	 * @return void
	 */
	public function test_shortcodes_fn_label_exists() {

		$this->assertEquals( shortcode_exists( 'fn_label' ), true );

	}

	/**
	 * Test whether [fn_label] shortcode is executed or not
	 * @return void
	 */
	public function test_shortcodes_fn_label() {

		$content = '[fn_label]';
		$shortcode_content = do_shortcode( $content );
		$this->assertNotEquals( $content, $shortcode_content );

	}

	/**
	 * Test [fn_label] shortcode with the below attributes each as empty attribute
	 * - id: 			[fn_label id=""]
	 * - class:		[fn_label class=""]
	 * - style:		[fn_label style=""]
	 * - type:		[fn_label type=""]
	 * @return void
	 */
	public function test_shortcodes_fn_label_empty_attributes() {

		$id = '';
		$content = sprintf( '[fn_label id="%s"]', $id );
		$shortcode_content = do_shortcode( $content );
		$this->assertNotContains( 'id=', $shortcode_content );

		$class = '';
		$content = sprintf( '[fn_label class="%s"]', $class );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<span class="label"></span>', $shortcode_content );

		$style = '';
		$content = sprintf( '[fn_label style="%s"]', $style );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<span class="label"></span>', $shortcode_content );

		$type = '';
		$content = sprintf( '[fn_label type="%s"]', $type );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<span class="label"></span>', $shortcode_content );

	}

	/**
	 * Test [fn_label] shortcode with id attribute
	 * - id:	[fn_label id="js-some-id"]
	 * @return void
	 */
	public function test_shortcodes_fn_label_id() {

		$id = 'js-some-id';
		$content = sprintf( '[fn_label id="%s"]', $id );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<span id="%s" class="label"></span>', $id ), $shortcode_content );

	}

	/**
	 * Test [fn_label] shortcode with class attribute
	 * - class:	[fn_label class="some-class some-other-class"]	
	 * @return void
	 */
	public function test_shortcodes_fn_label_class() {

		$class = 'some-class some-other-class';
		$content = sprintf( '[fn_label class="%s"]', $class );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<span class="label %s"></span>', $class ), $shortcode_content );

	}

	/**
	 * Test [fn_label] shortcode with style attribute
	 * - style:	[fn_label style="margin: 0; padding: 100px;"]
	 * @return void
	 */
	public function test_shortcodes_fn_label_style() {

		$style = 'margin: 0; padding: 100px;';
		$content = sprintf( '[fn_label style="%s"]', $style );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<span class="label" style="%s"></span>', $style ), $shortcode_content );

	}

	/**
	 * Test [fn_label] shortcode with type attribute
	 * - type:	[fn_label type="success"]
	 * @return void
	 */
	public function test_shortcodes_fn_label_type() {

		$type = 'success';
		$content = sprintf( '[fn_label type="%s"]', $type );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<span class="%s label"></span>', $type ), $shortcode_content );

	}

	/**
	 * Test [fn_label] shortcode with content
	 * [fn_label]A[/fn_bagde]
	 * @return void
	 */
	public function test_shortcodes_fn_label_content() {

		$inner_content = 'A';
		$content = sprintf( '[fn_label]%s[/fn_label]', $inner_content );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<span class="label">%s</span>', $inner_content ), $shortcode_content );

	}

}
