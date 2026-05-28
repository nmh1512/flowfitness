<?php

if ( ! class_exists( 'FlowFitnessElementorFaq' ) && class_exists( '\Elementor\Widget_Base' ) ) {
	class FlowFitnessElementorFaq extends \Elementor\Widget_Base {

		public function get_name() {
			return 'flow_faq';
		}

		public function get_title() {
			return esc_html__( 'Flow FAQ', 'powerlift' );
		}

		public function get_icon() {
			return 'eicon-help-o powerlift-elementor-custom-icon';
		}

		public function get_categories() {
			return array( 'mikado' );
		}

		protected function register_controls() {
			$this->start_controls_section(
				'general',
				array(
					'label' => esc_html__( 'General', 'powerlift' ),
					'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
				)
			);

			$this->add_control(
				'custom_class',
				array(
					'label'       => esc_html__( 'Custom CSS Class', 'powerlift' ),
					'type'        => \Elementor\Controls_Manager::TEXT,
					'description' => esc_html__( 'Add a class name for custom styling.', 'powerlift' ),
				)
			);

			$this->add_control(
				'eyebrow',
				array(
					'label'   => esc_html__( 'Eyebrow', 'powerlift' ),
					'type'    => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'FAQ', 'powerlift' ),
				)
			);

			$this->add_control(
				'title',
				array(
					'label'   => esc_html__( 'Title', 'powerlift' ),
					'type'    => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Câu hỏi thường gặp', 'powerlift' ),
				)
			);

			$this->add_control(
				'title_tag',
				array(
					'label'   => esc_html__( 'Title Tag', 'powerlift' ),
					'type'    => \Elementor\Controls_Manager::SELECT,
					'options' => array(
						'h1' => 'h1',
						'h2' => 'h2',
						'h3' => 'h3',
						'h4' => 'h4',
					),
					'default' => 'h2',
				)
			);

			$this->add_control(
				'intro',
				array(
					'label'   => esc_html__( 'Intro Text', 'powerlift' ),
					'type'    => \Elementor\Controls_Manager::TEXTAREA,
					'default' => '',
				)
			);

			$this->add_control(
				'open_first',
				array(
					'label'        => esc_html__( 'Open First Item', 'powerlift' ),
					'type'         => \Elementor\Controls_Manager::SWITCHER,
					'label_on'     => esc_html__( 'Yes', 'powerlift' ),
					'label_off'    => esc_html__( 'No', 'powerlift' ),
					'return_value' => 'yes',
					'default'      => 'yes',
				)
			);

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'question',
				array(
					'label'       => esc_html__( 'Question', 'powerlift' ),
					'type'        => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
					'default'     => esc_html__( 'FAQ question', 'powerlift' ),
				)
			);

			$repeater->add_control(
				'answer',
				array(
					'label'   => esc_html__( 'Answer', 'powerlift' ),
					'type'    => \Elementor\Controls_Manager::WYSIWYG,
					'default' => esc_html__( 'FAQ answer content.', 'powerlift' ),
				)
			);

			$this->add_control(
				'items',
				array(
					'label'       => esc_html__( 'FAQ Items', 'powerlift' ),
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $repeater->get_controls(),
					'title_field' => '{{{ question }}}',
					'default'     => array(
						array(
							'question' => esc_html__( 'Flow Fitness phù hợp với ai?', 'powerlift' ),
							'answer'   => esc_html__( 'Flow phù hợp với người muốn giảm mỡ, tăng cơ, bắt đầu tập đúng cách hoặc cần coach theo sát để giữ kỷ luật.', 'powerlift' ),
						),
						array(
							'question' => esc_html__( 'Có cần kinh nghiệm tập gym trước không?', 'powerlift' ),
							'answer'   => esc_html__( 'Không cần. Coach sẽ đánh giá thể trạng, khả năng vận động và xây dựng lộ trình theo mục tiêu hiện tại của bạn.', 'powerlift' ),
						),
						array(
							'question' => esc_html__( 'Lịch tập có linh hoạt không?', 'powerlift' ),
							'answer'   => esc_html__( 'Lịch tập được sắp xếp theo thời gian của bạn và mục tiêu cần đạt, phù hợp cả với người bạn ron.', 'powerlift' ),
						),
					),
				)
			);

			$this->end_controls_section();
		}

		public function render() {
			$params       = $this->get_settings_for_display();
			$title_tag    = ! empty( $params['title_tag'] ) ? tag_escape( $params['title_tag'] ) : 'h2';
			$holder_class = array( 'flow-faq' );

			if ( ! empty( $params['custom_class'] ) ) {
				$holder_class = array_merge(
					$holder_class,
					array_filter( array_map( 'sanitize_html_class', preg_split( '/\s+/', $params['custom_class'] ) ) )
				);
			}
			?>
			<section class="<?php echo esc_attr( implode( ' ', $holder_class ) ); ?>">
				<?php if ( ! empty( $params['eyebrow'] ) || ! empty( $params['title'] ) || ! empty( $params['intro'] ) ) : ?>
					<div class="flow-faq__head">
						<?php if ( ! empty( $params['title'] ) ) : ?>
							<<?php echo esc_attr( $title_tag ); ?>><?php echo esc_html( $params['title'] ); ?></<?php echo esc_attr( $title_tag ); ?>>
						<?php endif; ?>

						<?php if ( ! empty( $params['intro'] ) ) : ?>
							<p><?php echo esc_html( $params['intro'] ); ?></p>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<div class="flow-faq__items">
					<?php foreach ( $params['items'] as $index => $item ) : ?>
						<details class="flow-faq__item" <?php echo 0 === $index && 'yes' === $params['open_first'] ? 'open' : ''; ?>>
							<summary class="flow-faq__question">
								<span class="flow-faq__number"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
								<span class="flow-faq__question-text"><?php echo esc_html( $item['question'] ); ?></span>
								<span class="flow-faq__mark" aria-hidden="true"></span>
							</summary>
							<div class="flow-faq__answer">
								<?php echo wp_kses_post( $item['answer'] ); ?>
							</div>
						</details>
					<?php endforeach; ?>
				</div>
			</section>
			<?php
		}
	}

	\Elementor\Plugin::instance()->widgets_manager->register( new FlowFitnessElementorFaq() );
}
