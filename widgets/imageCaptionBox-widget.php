<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_imageCaptionBox_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve imageCaptionBox widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'imageCaptionBox';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve imageCaptionBox widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'IImage Caption Box', 'elementor-imageCaptionBox-widget' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve imageCaptionBox widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-code';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the imageCaptionBox widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the imageCaptionBox widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'imageCaptionBox', 'url', 'link', 'title', 'description' ];
	}

	/**
	 * Register imageCaptionBox widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elementor-imageCaptionBox-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'elementor-imageCaptionBox-widget' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'logo',
			[
				'label' => esc_html__( 'Choose logo', 'elementor-imageCaptionBox-widget' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'elementor-imageCaptionBox-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => esc_html__( 'Caption Title', 'elementor-imageCaptionBox-widget' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'elementor-imageCaptionBox-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => esc_html__( 'Caption Description', 'elementor-imageCaptionBox-widget' ),
			]
		);
		$this->add_control(
			'url',
			[
				'label' => esc_html__( 'URL', 'elementor-imageCaptionBox-widget' ),
				'type' => \Elementor\Controls_Manager::URL,
				'input_type' => 'url',
				'placeholder' => esc_html__( 'URL', 'elementor-imageCaptionBox-widget' ),
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render imageCaptionBox widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		$html = wp_oEmbed_get( $settings['url'] );
		$img = wp_oEmbed_get($settings['image']) ? $settings['image'] : 'https://images.pexels.com/photos/275033/pexels-photo-275033.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500';
		$title = wp_oEmbed_get($settings['title']) ? $settings['title'] : 'Title';
		$description = wp_oEmbed_get($settings['description']) ? $settings['description'] : 'Description goes here.';
		$logo = wp_oEmbed_get($settings['logo']) ? $settings['logo'] : 'https://www.ksdr1.net/wp-content/uploads/2018/10/Google-Play-Logo.png';
		$url = wp_oEmbed_get($settings['url']) ? $settings['url'] : '#';

		echo '<div class="oEmbed-elementor-widget">';
		echo '<style>.image-box{height:250px;background-image:url('.$img.');background-size:cover;position:relative}.m-0{margin:0}.img-box-caption{background:rgba(0,0,0,.5);bottom:0;position:absolute;width:100%;padding:10px 20px;display:inline-flex}.img-box-caption h3{white-space:nowrap;overflow:hidden;text-overflow:ellipsis;font-family:Raleway,sans-serif;font-size:1rem;line-height:1.2;font-weight:700;color:#fff}.img-box-caption p{white-space:nowrap;overflow:hidden;text-overflow:ellipsis;font-family:Raleway,sans-serif;font-size:1rem;line-height:1.2;font-weight:700;color:#fff}.img-box-caption .sub-text{font-size:.8rem;font-weight:100}.link,.text{width:50%}.link img{float:right}</style><div class="image-box" ><div class="img-box-caption"><div class="text"><h3 class="m-0">'.$title.'</h3><p class="m-0"><span class="sub-text">'.$description.'</span></p></div><div class="link"><a href="'.$url.'"><img src="'.$logo.'" style="width: 102px;" /></a></div></div></div>';
		echo '</div>';

	}

}