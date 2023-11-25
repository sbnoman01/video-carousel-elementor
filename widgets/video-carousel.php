<?php
class video_Carousel extends \Elementor\Widget_Base {

	public function get_name() {
		return 'video_carousel_slider';
	}

	public function get_title() {
		return esc_html__( 'Video Carousel', 'wpnoman' );
	}

    protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'wpnoman' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'video_link',
			[
				'label' => esc_html__( 'Youtube Link', 'wpnoman' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://youtube.com', 'wpnoman' ),
				'options' => [ 'url' ],
				'default' => [
					'url' => 'https://www.youtube.com/watch?v=MLpWrANjFbI',
				],
				'label_block' => true,
			]
		);
        $repeater->add_control(
			'video_poster',
			[
				'label' => esc_html__( 'Choose Thumbnail', 'wpnoman' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'Repeater List', 'wpnoman' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__( 'Title #1', 'wpnoman' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'wpnoman' ),
					],
					[
						'list_title' => esc_html__( 'Title #2', 'wpnoman' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'wpnoman' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();


	}

	public function get_icon() {
		return 'eicon-slider-video';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'video', 'carousel' ];
	}

	protected function render() {
        $settings = $this->get_settings_for_display();
        
		?>

		<div class="owl-carousel wpn-video-car video-section ">
            <?php
            
                foreach( $settings['list'] as $item ):
                    //print_r(\Elementor\Utils::get_placeholder_image_src());

                    ?>
                        <div class="item">
                            <a href="<?php echo $item['video_link']['url'] ?>" class="mediabox">
                                <img src="<?php echo esc_url( $item['video_poster']['url'] ); ?>">
                            </a>
                        </div>
                    <?php
                endforeach;
            ?>
            
        </div>

		<?php
	}
}