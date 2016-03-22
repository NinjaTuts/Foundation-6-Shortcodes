<?php

class FN_Flex_Video_Test extends WP_UnitTestCase {

	/**
	 * Test whether [fn_flex_video] shortcode exists or not
	 * @return void
	 */
	public function test_shortcodes_fn_flex_video_exists() {

		$this->assertEquals( shortcode_exists( 'fn_flex_video' ), true );

	}

	/**
	 * Test whether [fn_flex_video] shortcode is executed or not
	 * @return void
	 */
	public function test_shortcodes_fn_flex_video() {

		$content = '[fn_flex_video]';
		$shortcode_content = do_shortcode( $content );
		$this->assertNotEquals( $content, $shortcode_content );

	}

	/**
	 * Test [fn_flex_video] shortcode with the below attributes each as empty attribute
	 * - id: 						[fn_flex_video id=""]
	 * - class:					[fn_flex_video class=""]
	 * - style:					[fn_flex_video style=""]
	 * - widescreen:		[fn_flex_video widescreen=""]
	 * - vimeo:					[fn_flex_video vimeo=""]
	 * @return void
	 */
	public function test_shortcodes_fn_flex_video_empty_attributes() {

		$id = '';
		$content = sprintf( '[fn_flex_video id="%s"]', $id );
		$shortcode_content = do_shortcode( $content );
		$this->assertNotContains( 'id=', $shortcode_content );

		$class = '';
		$content = sprintf( '[fn_flex_video class="%s"]', $class );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="flex-video"></div>', $shortcode_content );

		$style = '';
		$content = sprintf( '[fn_flex_video style="%s"]', $style );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="flex-video"></div>', $shortcode_content );

		$widescreen = '';
		$content = sprintf( '[fn_flex_video widescreen="%s"]', $widescreen );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="flex-video"></div>', $shortcode_content );

		$vimeo = '';
		$content = sprintf( '[fn_flex_video vimeo="%s"]', $vimeo );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="flex-video"></div>', $shortcode_content );

	}

	/**
	 * Test [fn_flex_video] shortcode with id attribute
	 * - id:	[fn_flex_video id="js-some-id"]
	 * @return void
	 */
	public function test_shortcodes_fn_flex_video_id() {

		$id = 'js-some-id';
		$content = sprintf( '[fn_flex_video id="%s"]', $id );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<div id="%s" class="flex-video"></div>', $id ), $shortcode_content );

	}

	/**
	 * Test [fn_flex_video] shortcode with class attribute
	 * - class:	[fn_flex_video class="some-class some-other-class"]	
	 * @return void
	 */
	public function test_shortcodes_fn_flex_video_class() {

		$class = 'some-class some-other-class';
		$content = sprintf( '[fn_flex_video class="%s"]', $class );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<div class="flex-video %s"></div>', $class ), $shortcode_content );

	}

	/**
	 * Test [fn_flex_video] shortcode with style attribute
	 * - style:	[fn_flex_video style="margin: 0; padding: 100px;"]
	 * @return void
	 */
	public function test_shortcodes_fn_flex_video_style() {

		$style = 'margin: 0; padding: 100px;';
		$content = sprintf( '[fn_flex_video style="%s"]', $style );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<div class="flex-video" style="%s"></div>', $style ), $shortcode_content );

	}

	/**
	 * Test [fn_flex_video] shortcode with widescreen attribute
	 * - widescreen:	[fn_flex_video widescreen="yes"]
	 * @return void
	 */
	public function test_shortcodes_fn_flex_video_widescreen() {

		$widescreen = 'yes';
		$content = sprintf( '[fn_flex_video widescreen="%s"]', $widescreen );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="flex-video widescreen"></div>' , $shortcode_content );

	}

	/**
	 * Test [fn_flex_video] shortcode with vimeo attribute
	 * - vimeo:	[fn_flex_video vimeo="yes"]
	 * @return void
	 */
	public function test_shortcodes_fn_flex_video_vimeo() {

		$vimeo = 'yes';
		$content = sprintf( '[fn_flex_video vimeo="%s"]', $vimeo );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( '<div class="flex-video vimeo"></div>' , $shortcode_content );

	}

	/**
	 * Test [fn_flex_video] shortcode with content
	 * [fn_flex_video]SOME IFRAME EMBED[/fn_bagde]
	 * @return void
	 */
	public function test_shortcodes_fn_flex_video_content() {

		$inner_content = '<iframe width="420" height="315" src="https://www.youtube.com/embed/aiBt44rrslw" frameborder="0" allowfullscreen></iframe>';
		$content = sprintf( '[fn_flex_video]%s[/fn_flex_video]', $inner_content );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( sprintf( '<div class="flex-video">%s</div>', $inner_content ), $shortcode_content );

	}

}
