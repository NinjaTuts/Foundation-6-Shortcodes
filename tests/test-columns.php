<?php

class FN_Columns_Test extends WP_UnitTestCase {

	/**
	 * Test whether [fn_col] shortcode exists or not
	 * @return void
	 */
	public function test_shortcodes_fn_col_exists() {

		$this->assertEquals( shortcode_exists( 'fn_col' ), true );

	}

	/**
	 * Test whether [fn_col] shortcode is executed or not
	 * @return void
	 */
	public function test_shortcodes_fn_col() {

		$content = '[fn_col]';
		$shortcode_content = do_shortcode( $content );
		$this->assertNotEquals( $content, $shortcode_content );

	}

	/**
	 * Test [fn_col] shortcode with the below attributes each as empty attribute
	 * - id: 									[fn_col id=""]
	 * - class:								[fn_col class=""]
	 * - style:								[fn_col style=""]
	 * - small:								[fn_col small=""]
	 * - medium:							[fn_col medium=""]
	 * - large:								[fn_col large=""]
	 * - small_centered:			[fn_col small_centered=""]
	 * - medium_centered:			[fn_col medium_centered=""]
	 * - large_centered:			[fn_col large_centered=""]
	 * @return void
	 */
	public function test_shortcodes_fn_col_empty_attributes() {

		$id = '';
		$content = sprintf( '[fn_col id="%s"]', $id );
		$shortcode_content = do_shortcode( $content );
		$this->assertNotContains( 'id=', $shortcode_content );

		$class = '';
		$content = sprintf( '[fn_col class="%s"]', $class );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="small-12 columns"></div>', $shortcode_content );

		$style = '';
		$content = sprintf( '[fn_col style="%s"]', $style );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="small-12 columns"></div>', $shortcode_content );

		$small = '';
		$content = sprintf( '[fn_col small="%s"]', $small );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="small-12 columns"></div>', $shortcode_content );

		$medium = '';
		$content = sprintf( '[fn_col medium="%s"]', $medium );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="small-12 columns"></div>', $shortcode_content );

		$large = '';
		$content = sprintf( '[fn_col large="%s"]', $large );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="small-12 columns"></div>', $shortcode_content );

		$small_centered = '';
		$content = sprintf( '[fn_col small_centered="%s"]', $small_centered );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="small-12 columns"></div>', $shortcode_content );

		$medium_centered = '';
		$content = sprintf( '[fn_col medium_centered="%s"]', $medium_centered );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="small-12 columns"></div>', $shortcode_content );

		$large_centered = '';
		$content = sprintf( '[fn_col large_centered="%s"]', $large_centered );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="small-12 columns"></div>', $shortcode_content );

	}

	/**
	 * Test [fn_col] shortcode with id attribute
	 * - id:	[fn_col id="js-some-id"]
	 * @return void
	 */
	public function test_shortcodes_fn_col_id() {

		$id = 'js-some-id';
		$content = sprintf( '[fn_col id="%s"]', $id );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<div id="%s" class="small-12 columns"></div>', $id ), $shortcode_content );

	}

	/**
	 * Test [fn_col] shortcode with class attribute
	 * - class:	[fn_col class="some-class some-other-class"]	
	 * @return void
	 */
	public function test_shortcodes_fn_col_class() {

		$class = 'some-class some-other-class';
		$content = sprintf( '[fn_col class="%s"]', $class );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<div class="small-12 columns %s"></div>', $class ), $shortcode_content );

	}

	/**
	 * Test [fn_col] shortcode with style attribute
	 * - style:	[fn_col style="margin: 0; padding: 100px;"]
	 * @return void
	 */
	public function test_shortcodes_fn_col_style() {

		$style = 'margin: 0; padding: 100px;';
		$content = sprintf( '[fn_col style="%s"]', $style );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<div class="small-12 columns" style="%s"></div>', $style ), $shortcode_content );

	}

	/**
	 * Test [fn_col] shortcode with small attribute
	 * - small:	[fn_col small="10"]
	 * @return void
	 */
	public function test_shortcodes_fn_col_small() {

		$small = 10;
		$content = sprintf( '[fn_col small="%s"]', $small );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<div class="small-%s columns"></div>', $small ), $shortcode_content );

	}

	/**
	 * Test [fn_col] shortcode with medium attribute
	 * - medium:	[fn_col medium="10"]
	 * @return void
	 */
	public function test_shortcodes_fn_col_medium() {

		$medium = 12;
		$content = sprintf( '[fn_col medium="%s"]', $medium );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<div class="small-12 medium-%s columns"></div>', $medium ), $shortcode_content );

	}

	/**
	 * Test [fn_col] shortcode with large attribute
	 * - large:	[fn_col large="10"]
	 * @return void
	 */
	public function test_shortcodes_fn_col_large() {

		$large = 2;
		$content = sprintf( '[fn_col large="%s"]', $large );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<div class="small-12 large-%s columns"></div>', $large ), $shortcode_content );

	}

	/**
	 * Test [fn_col] shortcode with small_centered attribute
	 * - small_centered:	[fn_col small_centered="yes"]
	 * @return void
	 */
	public function test_shortcodes_fn_col_small_centered() {

		$small_centered = 'yes';
		$content = sprintf( '[fn_col small_centered="%s"]', $small_centered );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="small-12 small-centered columns"></div>', $shortcode_content );

	}

	/**
	 * Test [fn_col] shortcode with medium_centered attribute
	 * - medium_centered:	[fn_col medium_centered="yes"]
	 * @return void
	 */
	public function test_shortcodes_fn_col_medium_centered() {

		$medium_centered = 'yes';
		$content = sprintf( '[fn_col medium_centered="%s"]', $medium_centered );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="small-12 medium-centered columns"></div>', $shortcode_content );

	}

	/**
	 * Test [fn_col] shortcode with medium_centered attribute
	 * - medium_centered:	[fn_col medium_centered="yes"]
	 * @return void
	 */
	public function test_shortcodes_fn_col_large_centered() {

		$large_centered = 'yes';
		$content = sprintf( '[fn_col large_centered="%s"]', $large_centered );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="small-12 large-centered columns"></div>', $shortcode_content );

	}

	/**
	 * Test [fn_col] shortcode with small and medium attributes
	 * - small, medium:	[fn_col small="10" medium="5"]
	 * @return void
	 */
	public function test_shortcodes_fn_col_small_medium() {

		$small = 10;
		$medium = 5;
		$content = sprintf( '[fn_col small="%s" medium="%s"]', $small, $medium );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<div class="small-%s medium-%s columns"></div>', $small, $medium ), $shortcode_content );

	}

	/**
	 * Test [fn_col] shortcode with small and large attributes
	 * - small, large:	[fn_col small="10" large="5"]
	 * @return void
	 */
	public function test_shortcodes_fn_col_small_large() {

		$small = 10;
		$large = 5;
		$content = sprintf( '[fn_col small="%s" large="%s"]', $small, $large );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<div class="small-%s large-%s columns"></div>', $small, $large ), $shortcode_content );

	}

	/**
	 * Test [fn_col] shortcode with medium and large attributes
	 * - medium, large:	[fn_col medium="10" large="5"]
	 * @return void
	 */
	public function test_shortcodes_fn_col_medium_large() {

		$medium = 10;
		$large = 5;
		$content = sprintf( '[fn_col medium="%s" large="%s"]', $medium, $large );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<div class="small-12 medium-%s large-%s columns"></div>', $medium, $large ), $shortcode_content );

	}

	/**
	 * Test [fn_col] shortcode with small, medium and large attributes
	 * - small, medium, large:	[fn_col small="4" medium="10" large="5"]
	 * @return void
	 */
	public function test_shortcodes_fn_col_small_medium_large() {

		$small = 4;
		$medium = 10;
		$large = 5;
		$content = sprintf( '[fn_col small="%s" medium="%s" large="%s"]', $small, $medium, $large );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<div class="small-%s medium-%s large-%s columns"></div>', $small, $medium, $large ), $shortcode_content );

	}

	/**
	 * Test [fn_col] shortcode with small_centered and medium_centered attributes
	 * - small_centered, medium_centered:	[fn_col small_centered="yes" medium_centered="yes"]
	 * @return void
	 */
	public function test_shortcodes_fn_col_small_centered_medium_centered() {

		$small_centered = 'yes';
		$medium_centered = 'yes';
		$content = sprintf( '[fn_col small_centered="%s" medium_centered="%s"]', $small_centered, $medium_centered );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="small-12 small-centered medium-centered columns"></div>', $shortcode_content );

	}

	/**
	 * Test [fn_col] shortcode with small_centered and large_centered attributes
	 * - small_centered, large_centered:	[fn_col small_centered="yes" large_centered="yes"]
	 * @return void
	 */
	public function test_shortcodes_fn_col_small_centered_large_centered() {

		$small_centered = 'yes';
		$large_centered = 'yes';
		$content = sprintf( '[fn_col small_centered="%s" large_centered="%s"]', $small_centered, $large_centered );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="small-12 small-centered large-centered columns"></div>', $shortcode_content );

	}

	/**
	 * Test [fn_col] shortcode with medium_centered and large_centered attributes
	 * - medium_centered, large_centered:	[fn_col medium_centered="yes" large_centered="yes"]
	 * @return void
	 */
	public function test_shortcodes_fn_col_medium_centered_large_centered() {

		$medium_centered = 'yes';
		$large_centered = 'yes';
		$content = sprintf( '[fn_col medium_centered="%s" large_centered="%s"]', $medium_centered, $large_centered );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="small-12 medium-centered large-centered columns"></div>', $shortcode_content );

	}

	/**
	 * Test [fn_col] shortcode with small_centered, medium_centered and large_centered attributes
	 * - small_centered, medium_centered, large_centered:	[fn_col small_centered="yes" medium_centered="yes" large_centered="yes"]
	 * @return void
	 */
	public function test_shortcodes_fn_col_small_centered_medium_centered_large_centered() {

		$small_centered = 'yes';
		$medium_centered = 'yes';
		$large_centered = 'yes';
		$content = sprintf( '[fn_col small_centered="%s" medium_centered="%s" large_centered="%s"]',
			$small_centered,
			$medium_centered,
			$large_centered 
		);
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="small-12 small-centered medium-centered large-centered columns"></div>', $shortcode_content );

	}

}
