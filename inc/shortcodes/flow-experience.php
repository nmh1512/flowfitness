<?php

if ( ! function_exists( 'flow_fitness_experience_shortcode' ) ) {
	function flow_fitness_experience_shortcode( $atts ) {
		$atts = shortcode_atts(
			array(
				'eyebrow' => 'FLOW EXPERIENCE',
				'title'   => 'Personal Training được thiết kế cho từng cá nhân',
				'text'    => 'Mô hình huấn luyện 1:1 giúp bạn bắt đầu an toàn, được theo sát tiến trình và cải thiện thể trạng một cách bền vững.',
			),
			$atts,
			'flow_experience'
		);

		$items = array(
			array(
				'number' => '01',
				'label'  => 'Vị trí',
				'title'  => 'Studio tại Đà Nẵng',
				'text'   => 'Không gian tập luyện riêng tư, đầy đủ thiết bị và thuận tiện cho lịch tập cá nhân.',
				'icon'   => 'flaticon-location',
			),
			array(
				'number' => '02',
				'label'  => 'Hình thức',
				'title'  => 'Personal Training 1:1',
				'text'   => 'Giáo án cá nhân hóa theo thể trạng, mục tiêu, thói quen sinh hoạt và khả năng hiện tại.',
				'icon'   => 'flaticon-fitness',
			),
			array(
				'number' => '03',
				'label'  => 'Phương pháp',
				'title'  => 'Coach theo sát tiến trình',
				'text'   => 'Theo dõi kỹ thuật, cường độ và sự thay đổi cơ thể để điều chỉnh lộ trình phù hợp.',
				'icon'   => 'flaticon-graph',
			),
			array(
				'number' => '04',
				'label'  => 'Cam kết',
				'title'  => 'Đánh giá thể trạng trước khi tập',
				'text'   => 'Kiểm tra nền tảng vận động, posture và thể lực trước khi xây dựng chương trình tập.',
				'icon'   => 'flaticon-checked',
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
