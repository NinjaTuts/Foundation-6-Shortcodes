<?php

class FN_Orbit_Test extends WP_UnitTestCase {

	private	$btn_html;
	private $container_html;
	private $orbit_html;
	private $nav_html;

	public function __construct() {

		$this->btn_html = '<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span> &#9664;&#xFE0E;</button><button class="orbit-next"><span class="show-for-sr">Next Slide</span> &#9654;&#xFE0E;</button>';
		$this->container_html = '<ul class="orbit-container"></ul>';
		$this->nav_html = '<nav class="orbit-bullets"></nav>';
		$this->orbit_html = sprintf( '<div class="orbit" role="region" data-orbit>%s</div>', $this->container_html );

	}

	/**
	 * Test whether [fn_orbit] shortcode exists or not
	 * @return void
	 */
	public function test_shortcodes_fn_orbit_exists() {

		$this->assertEquals( shortcode_exists( 'fn_orbit' ), true );

	}

	/**
	 * Test whether [fn_orbit] shortcode is executed or not
	 * @return void
	 */
	public function test_shortcodes_fn_orbit() {

		$content = '[fn_orbit]';
		$shortcode_content = do_shortcode( $content );
		$this->assertNotEquals( $content, $shortcode_content );

	}

	/**
	 * Test [fn_orbit] shortcode with the below attributes each as empty attribute
	 * - id: 							[fn_orbit id=""]
	 * - class:						[fn_orbit class=""]
	 * - style:						[fn_orbit style=""]
	 * - label:						[fn_orbit label=""]
	 * - arrows:					[fn_orbit arrows=""]
	 * - bullets:					[fn_orbit bullets=""]
	 * - animation:				[fn_orbit animation=""]
	 * @return void
	 */
	public function test_shortcodes_fn_orbit_empty_attributes() {

		$id = '';
		$content = sprintf( '[fn_orbit id="%s"]', $id );
		$shortcode_content = do_shortcode( $content );
		$this->assertNotContains( 'id=', $shortcode_content );

		$class = '';
		$content = sprintf( '[fn_orbit class="%s"]', $class );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( $this->orbit_html, $shortcode_content );

		$style = '';
		$content = sprintf( '[fn_orbit style="%s"]', $style );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( $this->orbit_html, $shortcode_content );

		$label = '';
		$content = sprintf( '[fn_orbit label="%s"]', $label );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( $this->orbit_html, $shortcode_content );

		$arrows = '';
		$content = sprintf( '[fn_orbit arrows="%s"]', $arrows );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( $this->orbit_html, $shortcode_content );

		$bullets = '';
		$content = sprintf( '[fn_orbit bullets="%s"]', $bullets );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( $this->orbit_html, $shortcode_content );

		$animation = '';
		$content = sprintf( '[fn_orbit animation="%s"]', $animation );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals( $this->orbit_html, $shortcode_content );

	}

	/**
	 * Test [fn_orbit] shortcode with id attribute
	 * - id:	[fn_orbit id="js-some-id"]
	 * @return void
	 */
	public function test_shortcodes_fn_orbit_id() {

		$id = 'js-some-id';
		$content = sprintf( '[fn_orbit id="%s"]', $id );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals(
			sprintf(
				'<div id="%s" class="orbit" role="region" data-orbit>%s</div>',
				$id,
				$this->container_html
			),
			$shortcode_content
		);

	}

	/**
	 * Test [fn_orbit] shortcode with class attribute
	 * - class:	[fn_orbit class="some-class some-other-class"]	
	 * @return void
	 */
	public function test_shortcodes_fn_orbit_class() {

		$class = 'some-class some-other-class';
		$content = sprintf( '[fn_orbit class="%s"]', $class );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals(
			sprintf(
				'<div class="orbit %s" role="region" data-orbit>%s</div>',
				$class,
				$this->container_html
			),
			$shortcode_content
		);

	}

	/**
	 * Test [fn_orbit] shortcode with style attribute
	 * - style:	[fn_orbit style="margin: 0; padding: 100px;"]
	 * @return void
	 */
	public function test_shortcodes_fn_orbit_style() {

		$style = 'margin: 0; padding: 100px;';
		$content = sprintf( '[fn_orbit style="%s"]', $style );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals(
			sprintf(
				'<div class="orbit" role="region" data-orbit style="%s">%s</div>',
				$style,
				$this->container_html
			),
			$shortcode_content
		);

	}

	/**
	 * Test [fn_orbit] shortcode with label attribute
	 * - label:	[fn_orbit label="Some Label"]
	 * @return void
	 */
	public function test_shortcodes_fn_orbit_label() {

		$label = 'Some Label';
		$content = sprintf( '[fn_orbit label="%s"]', $label );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals(
			sprintf(
				'<div class="orbit" aria-label="%s" role="region" data-orbit>%s</div>',
				$label,
				$this->container_html
			),
			$shortcode_content
		);

	}

	/**
	 * Test [fn_orbit] shortcode with arrows attribute
	 * - arrows:	[fn_orbit arrows="yes"]
	 * @return void
	 */
	// public function test_shortcodes_fn_orbit_arrows() {

	// 	$arrows = 'yes';
	// 	$content = sprintf( '[fn_orbit arrows="%s"]', $arrows );
	// 	$shortcode_content = do_shortcode( $content );
	// 	$this->assertEquals(
	// 		sprintf(
	// 			'<div class="orbit" role="region" data-orbit><ul class="orbit-container">%s</ul></div>',
	// 			$this->btn_html
	// 		),
	// 		$shortcode_content
	// 	);

	// }

	/**
	 * Test [fn_orbit] shortcode with bullets attribute
	 * - bullets:	[fn_orbit bullets="yes"]
	 * @return void
	 */
	public function test_shortcodes_fn_orbit_bullets() {

		$bullets = 'yes';
		$content = sprintf( '[fn_orbit bullets="%s"]', $bullets );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals(
			sprintf(
				'<div class="orbit" role="region" data-orbit><ul class="orbit-container"></ul>%s</div>',
				$this->nav_html
			),
			$shortcode_content
		);

	}

	/**
	 * Test [fn_orbit] shortcode with animation attribute
	 * - animation:	[fn_orbit animation="no"]
	 * @return void
	 */
	public function test_shortcodes_fn_orbit_animation() {

		$animation = 'no';
		$content = sprintf( '[fn_orbit animation="%s"]', $animation );
		$shortcode_content = do_shortcode( $content );
		$this->assertEquals(
			sprintf(
				'<div class="orbit" role="region" data-orbit data-use-m-u-i="false">%s</div>',
				$this->container_html
			),
			$shortcode_content
		);

	}

}
