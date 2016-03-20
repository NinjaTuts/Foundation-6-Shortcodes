<?php

class F6_Lead extends WP_UnitTestCase {

	/**
	 * Test whether [fn_lead] shortcode exists or not
	 * @return void
	 */
	public function test_shortcodes_fn_lead_exists() {

		$this->assertEquals( shortcode_exists( 'fn_lead' ), true );

	}

	/**
	 * Test whether [fn_lead] shortcode is executed or not
	 * @return void
	 */
	public function test_shortcodes_fn_lead() {

		$content = '[fn_lead]';
		$shortcode_content = do_shortcode( $content );
		$this->assertNotEquals( $content, $shortcode_content );

	}

	/**
	 * Test [fn_lead] shortcode with the below attributes each as empty attribute
	 * - id: 			[fn_lead id=""]
	 * - class:		[fn_lead class=""]
	 * - style:		[fn_lead style=""]
	 * @return void
	 */
	public function test_shortcodes_fn_lead_empty_attributes() {

		$id = '';
		$content = sprintf( '[fn_lead id="%s"]', $id );
		$shortcode_content = do_shortcode( $content );
		$this->assertNotContains( 'id=', $shortcode_content );

		$class = '';
		$content = sprintf( '[fn_lead class="%s"]', $class );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<p class="lead"></p>', $shortcode_content );

		$style = '';
		$content = sprintf( '[fn_lead style="%s"]', $style );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<p class="lead"></p>', $shortcode_content );

	}

	/**
	 * Test [fn_lead] shortcode with id attribute
	 * - id:	[fn_lead id="js-some-id"]
	 * @return void
	 */
	public function test_shortcodes_fn_lead_id() {

		$id = 'js-some-id';
		$content = sprintf( '[fn_lead id="%s"]', $id );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<p id="%s" class="lead"></p>', $id ), $shortcode_content );

	}

	/**
	 * Test [fn_lead] shortcode with class attribute
	 * - class:	[fn_lead class="some-class some-other-class"]	
	 * @return void
	 */
	public function test_shortcodes_fn_lead_class() {

		$class = 'some-class some-other-class';
		$content = sprintf( '[fn_lead class="%s"]', $class );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<p class="lead %s"></p>', $class ), $shortcode_content );

	}

	/**
	 * Test [fn_lead] shortcode with style attribute
	 * - style:	[fn_lead style="margin: 0; padding: 100px;"]
	 * @return void
	 */
	public function test_shortcodes_fn_lead_style() {

		$style = 'margin: 0; padding: 100px;';
		$content = sprintf( '[fn_lead style="%s"]', $style );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<p class="lead" style="%s"></p>', $style ), $shortcode_content );

	}

}
