<?php

if ( ! function_exists( 'flow_fitness_why_choose_shortcode' ) ) {
	function flow_fitness_why_choose_shortcode( $atts ) {
		$atts = shortcode_atts(
			array(
				'title' => 'Vì sao chọn Flow?',
			),
			$atts,
			'flow_why_choose'
		);

		$items = array(
			array(
				'icon'      => 'flaticon-fitness',
				'title'     => 'Huấn luyện 1:1',
				'text'      => 'Theo thể trạng cá nhân, mục tiêu và khả năng vận động hiện tại của từng học viên.',
				'watermark' => '1:1',
				'tone'      => 'dark',
			),
			array(
				'icon'      => 'flaticon-plan',
				'title'     => 'Không tập đại trà',
				'text'      => 'Mỗi người có một lộ trình rõ ràng, được điều chỉnh theo tiến độ thực tế.',
				'watermark' => 'PLAN',
				'tone'      => 'light',
			),
			array(
				'icon'      => 'flaticon-people',
				'title'     => 'Coach đa chuyên môn',
				'text'      => 'Đội ngũ coach hỗ trợ về kỹ thuật, sức mạnh, dinh dưỡng và thói quen tập luyện.',
				'watermark' => 'TEAM',
				'tone'      => 'accent',
			),
			array(
				'icon'      => 'flaticon-graph',
				'title'     => 'Theo dõi tiến trình',
				'text'      => 'Đo lường thay đổi để tối ưu giáo án, cường độ và kết quả theo từng giai đoạn.',
				'watermark' => 'FLOW',
				'tone'      => 'cream',
			),
		);

		ob_start();
		?>
		<section class="flow-why">
			<div class="flow-why__head">
				<h2><?php echo esc_html( $atts['title'] ); ?></h2>
			</div>

			<div class="flow-why__grid">
				<?php foreach ( $items as $item ) : ?>
					<article class="flow-why__item flow-why__item--<?php echo esc_attr( sanitize_html_class( $item['tone'] ) ); ?>">
						<span class="flow-why__watermark"><?php echo esc_html( $item['watermark'] ); ?></span>
						<div class="flow-why__icon">
							<i class="<?php echo esc_attr( sanitize_html_class( $item['icon'] ) ); ?>"></i>
						</div>
						<h3><?php echo esc_html( $item['title'] ); ?></h3>
						<p><?php echo esc_html( $item['text'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</section>
		<?php
		return ob_get_clean();
	}
}
add_shortcode( 'flow_why_choose', 'flow_fitness_why_choose_shortcode' );
