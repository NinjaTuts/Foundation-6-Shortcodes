<?php

class FN_Tooltip_Test extends WP_UnitTestCase {

	private $title;
	private $content;

	public function __construct() {

		$this->title = 'Tooltip Title Goes Here';
		$this->content = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque asperiores veniam consequuntur aliquid similique, suscipit!';

	}

	/**
	 * Test whether [fn_tooltip] shortcode exists or not
	 * @return void
	 */
	public function test_shortcodes_fn_tooltip_exists() {

		$this->assertEquals( shortcode_exists( 'fn_tooltip' ), true );

	}

	/**
	 * Test whether [fn_tooltip] shortcode is executed or not
	 * @return void
	 */
	public function test_shortcodes_fn_tooltip() {

		$content = '[fn_tooltip]';
		$shortcode_content = do_shortcode( $content );
		$this->assertNotEquals( $content, $shortcode_content );

	}

	/**
	 * Test [fn_tooltip] shortcode without content and title attribute
	 * @return void
	 */
	public function test_shortcodes_fn_tooltip_without_title_and_content() {

		$content = '[fn_tooltip]';
		$shortcode_content = do_shortcode( $content );
		$this->assertEmpty( $shortcode_content );

	}

	/**
	 * Test [fn_tooltip] shortcode with the below attributes each as empty attribute
	 * - title, id: 					[fn_tooltip title="" id=""]
	 * - title, class:				[fn_tooltip title="" class=""]
	 * - title, style:				[fn_tooltip title="" style=""]
	 * - title, position:			[fn_tooltip title="" position=""]
	 * - title:								[fn_tooltip title=""]
	 * - content:							[fn_tooltip][/fn_tooltip]
	 * @return void
	 */
	public function test_shortcodes_fn_tooltip_empty_attributes() {

		$id = '';
		$content = sprintf( '[fn_tooltip title="%s" id="%s"]%s[/fn_tooltip]', $this->title, $id, $this->content );
		$shortcode_content = do_shortcode( $content );
		$this->assertNotContains( 'id=', $shortcode_content );

		$class = '';
		$content = sprintf( '[fn_tooltip title="%s" class="%s"]%s[/fn_tooltip]', $this->title, $class, $this->content );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals(
			sprintf( '<span class="has-tip" title="%s" data-tooltip aria-haspopup="true">%s</span>', 
				$this->title,
				$this->content
			),
			$shortcode_content
		);

		$style = '';
		$content = sprintf( '[fn_tooltip title="%s" style="%s"]%s[/fn_tooltip]', $this->title, $style, $this->content );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals(
			sprintf( '<span class="has-tip" title="%s" data-tooltip aria-haspopup="true">%s</span>', 
				$this->title,
				$this->content
			),
			$shortcode_content
		);

		$position = '';
		$content = sprintf( '[fn_tooltip title="%s" position="%s"]%s[/fn_tooltip]', $this->title, $position, $this->content );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals(
			sprintf( '<span class="has-tip" title="%s" data-tooltip aria-haspopup="true">%s</span>', 
				$this->title,
				$this->content
			),
			$shortcode_content
		);

		$title = '';
		$content = sprintf( '[fn_tooltip title="%s"]%s[/fn_tooltip]', $title, $this->content );
		$shortcode_content = do_shortcode( $content );
		$this->assertEmpty( $shortcode_content );

		$content = '';
		$content = sprintf( '[fn_tooltip]%s[/fn_tooltip]', $content );
		$shortcode_content = do_shortcode( $content );
		$this->assertEmpty( $shortcode_content );

	}

	/**
	 * Test [fn_tooltip] shortcode with id attribute
	 * - title, id:	[fn_tooltip title="" id="js-some-id"]
	 * @return void
	 */
	public function test_shortcodes_fn_tooltip_id() {

		$id = 'js-some-id';
		$content = sprintf( '[fn_tooltip title="%s" id="%s"]%s[/fn_tooltip]', $this->title, $id, $this->content );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals(
			sprintf( '<span id="%s" class="has-tip" title="%s" data-tooltip aria-haspopup="true">%s</span>', 
				$id,
				$this->title,
				$this->content
			),
			$shortcode_content
		);

	}

	/**
	 * Test [fn_tooltip] shortcode with class attribute
	 * - title, class:	[fn_tooltip title="" class="some-class some-other-class"]	
	 * @return void
	 */
	public function test_shortcodes_fn_tooltip_class() {

		$class = 'some-class some-other-class';
		$content = sprintf( '[fn_tooltip title="%s" class="%s"]%s[/fn_tooltip]', $this->title, $class, $this->content );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals(
			sprintf( '<span class="has-tip %s" title="%s" data-tooltip aria-haspopup="true">%s</span>', 
				$class,
				$this->title,
				$this->content
			),
			$shortcode_content
		);

	}

	/**
	 * Test [fn_tooltip] shortcode with style attribute
	 * - title, style:	[fn_tooltip title="" style="margin: 0; padding: 100px;"]
	 * @return void
	 */
	public function test_shortcodes_fn_tooltip_style() {

		$style = 'margin: 0; padding: 100px;';
		$content = sprintf( '[fn_tooltip title="%s" style="%s"]%s[/fn_tooltip]', $this->title, $style, $this->content );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals(
			sprintf( '<span class="has-tip" title="%s" data-tooltip aria-haspopup="true" style="%s">%s</span>', 
				$this->title,
				$style,
				$this->content
			),
			$shortcode_content
		);

	}

	/**
	 * Test [fn_tooltip] shortcode with position attribute
	 * - title, position:	[fn_tooltip title="" position="yes"]
	 * @return void
	 */
	public function test_shortcodes_fn_tooltip_position() {

		$position = 'left';
		$content = sprintf( '[fn_tooltip title="%s" position="%s"]%s[/fn_tooltip]', $this->title, $position, $this->content );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals(
			sprintf( '<span class="has-tip %s" title="%s" data-tooltip aria-haspopup="true">%s</span>',
				$position,
				$this->title,
				$this->content
			),
			$shortcode_content
		);

	}

	/**
	 * Test [fn_tooltip] shortcode with position attribute
	 * - title, position:	[fn_tooltip title="" position="yes"]
	 * @return void
	 */
	public function test_shortcodes_fn_tooltip_title() {

		$content = sprintf( '[fn_tooltip title="%s"]%s[/fn_tooltip]', $this->title, $this->content );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals(
			sprintf( '<span class="has-tip" title="%s" data-tooltip aria-haspopup="true">%s</span>',
				$this->title,
				$this->content
			),
			$shortcode_content
		);

	}

}
