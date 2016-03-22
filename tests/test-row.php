<?php

class FN_Row_Test extends WP_UnitTestCase {

	/**
	 * Test whether [fn_row] shortcode exists or not
	 * @return void
	 */
	public function test_shortcodes_fn_row_exists() {

		$this->assertEquals( shortcode_exists( 'fn_row' ), true );

	}

	/**
	 * Test whether [fn_row] shortcode is executed or not
	 * @return void
	 */
	public function test_shortcodes_fn_row() {

		$content = '[fn_row]';
		$shortcode_content = do_shortcode( $content );
		$this->assertNotEquals( $content, $shortcode_content );

	}

	/**
	 * Test [fn_row] shortcode with the below attributes each as empty attribute
	 * - id: 			[fn_row id=""]
	 * - class:		[fn_row class=""]
	 * - style:		[fn_row style=""]
	 * - fluid:		[fn_row fluid=""]
	 * @return void
	 */
	public function test_shortcodes_fn_row_empty_attributes() {

		$id = '';
		$content = sprintf( '[fn_row id="%s"]', $id );
		$shortcode_content = do_shortcode( $content );
		$this->assertNotContains( 'id=', $shortcode_content );

		$class = '';
		$content = sprintf( '[fn_row class="%s"]', $class );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="row"></div>', $shortcode_content );

		$style = '';
		$content = sprintf( '[fn_row style="%s"]', $style );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="row"></div>', $shortcode_content );

		$fluid = '';
		$content = sprintf( '[fn_row fluid="%s"]', $fluid );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="row"></div>', $shortcode_content );

	}

	/**
	 * Test [fn_row] shortcode with id attribute
	 * - id:	[fn_row id="js-some-id"]
	 * @return void
	 */
	public function test_shortcodes_fn_row_id() {

		$id = 'js-some-id';
		$content = sprintf( '[fn_row id="%s"]', $id );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<div id="%s" class="row"></div>', $id ), $shortcode_content );

	}

	/**
	 * Test [fn_row] shortcode with class attribute
	 * - class:	[fn_row class="some-class some-other-class"]	
	 * @return void
	 */
	public function test_shortcodes_fn_row_class() {

		$class = 'some-class some-other-class';
		$content = sprintf( '[fn_row class="%s"]', $class );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<div class="row %s"></div>', $class ), $shortcode_content );

	}

	/**
	 * Test [fn_row] shortcode with style attribute
	 * - style:	[fn_row style="margin: 0; padding: 100px;"]
	 * @return void
	 */
	public function test_shortcodes_fn_row_style() {

		$style = 'margin: 0; padding: 100px;';
		$content = sprintf( '[fn_row style="%s"]', $style );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<div class="row" style="%s"></div>', $style ), $shortcode_content );

	}

	/**
	 * Test [fn_row] shortcode with fluid attribute
	 * - fluid:	[fn_row fluid="yes"]
	 * @return void
	 */
	public function test_shortcodes_fn_row_fluid() {

		$fluid = 'yes';
		$content = sprintf( '[fn_row fluid="%s"]', $fluid );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="row expanded"></div>', $shortcode_content );

	}

	/**
	 * Test [fn_row] shortcode with id and class attribute
	 * - id:	[fn_row id="js-some-id"]
	 * - class:	[fn_row class="some-class"]
	 * @return void
	 */
	public function test_shortcodes_fn_row_id_class() {

		$id = 'js-some-id';
		$class = 'some-class';
		$content = sprintf( '[fn_row id="%s" class="%s"]', $id, $class );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<div id="%s" class="row some-class"></div>', $id ), $shortcode_content );

	}

}
