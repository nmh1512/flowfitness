<?php

if ( ! function_exists( 'flow_fitness_experience_shortcode' ) ) {
	function flow_fitness_experience_shortcode( $atts ) {
		$atts = shortcode_atts(
			array(
				'eyebrow' => 'FLOW EXPERIENCE',
				'title'   => 'Personal Training được thiết kế cho từng cá nhân',
				'text'    => 'Mô hình huấn luyện 1:1 giúp bạn bắt đầu an toàn, được theo sát tiến trình và cải thiện thể trạng một cách bền vững.',
				'item_1_label' => 'Vị trí',
				'item_1_title' => 'Studio tại Đà Nẵng',
				'item_1_text'  => 'Không gian tập luyện riêng tư, đầy đủ thiết bị và thuận tiện cho lịch tập cá nhân.',
				'item_1_icon'  => 'flaticon-location',
				'item_2_label' => 'Hình thức',
				'item_2_title' => 'Personal Training 1:1',
				'item_2_text'  => 'Giáo án cá nhân hóa theo thể trạng, mục tiêu, thói quen sinh hoạt và khả năng hiện tại.',
				'item_2_icon'  => 'flaticon-fitness',
				'item_3_label' => 'Phương pháp',
				'item_3_title' => 'Coach theo sát tiến trình',
				'item_3_text'  => 'Theo dõi kỹ thuật, cường độ và sự thay đổi cơ thể để điều chỉnh lộ trình phù hợp.',
				'item_3_icon'  => 'flaticon-graph',
				'item_4_label' => 'Cam kết',
				'item_4_title' => 'Đánh giá thể trạng trước khi tập',
				'item_4_text'  => 'Kiểm tra nền tảng vận động, posture và thể lực trước khi xây dựng chương trình tập.',
				'item_4_icon'  => 'flaticon-checked',
			),
			$atts,
			'flow_experience'
		);

		$items = array(
			array(
				'number' => '01',
				'label'  => $atts['item_1_label'],
				'title'  => $atts['item_1_title'],
				'text'   => $atts['item_1_text'],
				'icon'   => $atts['item_1_icon'],
			),
			array(
				'number' => '02',
				'label'  => $atts['item_2_label'],
				'title'  => $atts['item_2_title'],
				'text'   => $atts['item_2_text'],
				'icon'   => $atts['item_2_icon'],
			),
			array(
				'number' => '03',
				'label'  => $atts['item_3_label'],
				'title'  => $atts['item_3_title'],
				'text'   => $atts['item_3_text'],
				'icon'   => $atts['item_3_icon'],
			),
			array(
				'number' => '04',
				'label'  => $atts['item_4_label'],
				'title'  => $atts['item_4_title'],
				'text'   => $atts['item_4_text'],
				'icon'   => $atts['item_4_icon'],
			),
		);

		ob_start();
		?>
		<div class="mkdf-flow-exp-inner">
			<div class="flw-exp__grid">
				<?php foreach ( $items as $item ) : ?>
					<article class="flw-exp__card">
						<span class="flw-exp__number"><?php echo esc_html( $item['number'] ); ?></span>
						<div class="flw-exp__icon"><i class="<?php echo esc_attr( sanitize_html_class( $item['icon'] ) ); ?>"></i></div>
						<span class="flw-exp__label"><?php echo esc_html( $item['label'] ); ?></span>
						<h3><?php echo esc_html( $item['title'] ); ?></h3>
						<p><?php echo esc_html( $item['text'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}
}
add_shortcode( 'flow_experience', 'flow_fitness_experience_shortcode' );
