<?php

if ( ! function_exists( 'flow_fitness_diagonal_features_shortcode' ) ) {
	function flow_fitness_diagonal_features_shortcode( $atts ) {
		$images_url = trailingslashit( get_stylesheet_directory_uri() . '/assets/images' );

		$atts = shortcode_atts(
			array(
				'arrow_image'      => $images_url . 'arrow-right-1.webp',
				'item_1_icon'      => 'flaticon-paper-plane',
				'item_1_label'     => 'Bước 01',
				'item_1_title'     => 'Để lại nhu cầu',
				'item_1_text'      => 'Chia sẻ mục tiêu, thời gian tập và điều bạn đang cần Flow hỗ trợ.',
				'item_2_icon'      => 'flaticon-target',
				'item_2_label'     => 'Bước 02',
				'item_2_title'     => 'Tư vấn mục tiêu và tình trạng hiện tại',
				'item_2_text'      => 'Coach trao đổi để hiểu thói quen, nền tảng vận động và vấn đề bạn đang gặp.',
				'item_3_icon'      => 'flaticon-checked',
				'item_3_label'     => 'Bước 03',
				'item_3_title'     => 'Đánh giá thể trạng / khả năng vận động',
				'item_3_text'      => 'Kiểm tra các chỉ số cơ bản, kỹ thuật chuyển động và mức độ phù hợp khi tập.',
				'item_4_icon'      => 'flaticon-plan',
				'item_4_label'     => 'Bước 04',
				'item_4_title'     => 'Xây lộ trình + báo giá phù hợp',
				'item_4_text'      => 'Flow đề xuất giáo án, lịch tập và gói đồng hành theo nhu cầu thực tế.',
			),
			$atts,
			'flow_diagonal_features'
		);

		$items = array(
			array(
				'number' => '01',
				'icon'   => $atts['item_1_icon'],
				'label'  => $atts['item_1_label'],
				'title'  => $atts['item_1_title'],
				'text'   => $atts['item_1_text'],
			),
			array(
				'number' => '02',
				'icon'   => $atts['item_2_icon'],
				'label'  => $atts['item_2_label'],
				'title'  => $atts['item_2_title'],
				'text'   => $atts['item_2_text'],
			),
			array(
				'number' => '03',
				'icon'   => $atts['item_3_icon'],
				'label'  => $atts['item_3_label'],
				'title'  => $atts['item_3_title'],
				'text'   => $atts['item_3_text'],
			),
			array(
				'number' => '04',
				'icon'   => $atts['item_4_icon'],
				'label'  => $atts['item_4_label'],
				'title'  => $atts['item_4_title'],
				'text'   => $atts['item_4_text'],
			),
		);

		ob_start();
		?>
		<section class="flow-diagonal-features">
			<div class="flow-diagonal-features__inner">
				<?php foreach ( $items as $item ) : ?>
					<article class="flow-diagonal-features__item">
						<span class="flow-diagonal-features__number"><?php echo esc_html( $item['number'] ); ?></span>
						<div class="flow-diagonal-features__icon">
							<i class="<?php echo esc_attr( sanitize_html_class( $item['icon'] ) ); ?>"></i>
						</div>
						<span class="flow-diagonal-features__label"><?php echo esc_html( $item['label'] ); ?></span>
						<h3><?php echo esc_html( $item['title'] ); ?></h3>
						<p><?php echo esc_html( $item['text'] ); ?></p>
					</article>
					<?php if ( $item !== end( $items ) ) : ?>
						<img class="flow-diagonal-features__arrow" src="<?php echo esc_url( $atts['arrow_image'] ); ?>" alt="" aria-hidden="true">
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</section>
		<?php
		return ob_get_clean();
	}
}
add_shortcode( 'flow_diagonal_features', 'flow_fitness_diagonal_features_shortcode' );
