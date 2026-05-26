<?php

if ( ! function_exists( 'flow_fitness_confidence_shortcode' ) ) {
	function flow_fitness_confidence_shortcode( $atts ) {
		$upload_url = trailingslashit( content_url( 'uploads/2019/06' ) );

		$atts = shortcode_atts(
			array(
				'eyebrow'       => 'FLOW FITNESS',
				'title'         => 'Ai phù hợp với FLOW',
				'image_primary' => $upload_url . '3I5A3532-650x650.jpg',
				'image_top'     => $upload_url . '502378252_122121786698815631_4991985360912236272_n-1170x650.jpg',
				'feature_1_title' => 'Người muốn giảm mỡ',
				'feature_1_text'  => 'Muốn giảm mỡ an toàn, cải thiện vóc dáng và xây dựng thói quen vận động bền vững.',
				'feature_2_title' => 'Người muốn tăng cơ',
				'feature_2_text'  => 'Cần tăng sức mạnh, phát triển cơ bắp và theo dõi tiến trình tập luyện rõ ràng.',
				'feature_3_title' => 'Người mới bắt đầu',
				'feature_3_text'  => 'Chưa biết bắt đầu từ đâu và cần coach hướng dẫn kỹ thuật, cường độ, lịch tập phù hợp.',
				'feature_4_title' => 'Người bận rộn',
				'feature_4_text'  => 'Có ít thời gian nhưng muốn tập hiệu quả với lịch trình linh hoạt và giáo án cá nhân hóa.',
			),
			$atts,
			'flow_confidence'
		);

		$features = array(
			array(
				'icon'  => 'flaticon-fitness',
				'title' => $atts['feature_1_title'],
				'text'  => $atts['feature_1_text'],
			),
			array(
				'icon'  => 'flaticon-stationary-bike',
				'title' => $atts['feature_2_title'],
				'text'  => $atts['feature_2_text'],
			),
			array(
				'icon'  => 'flaticon-diamond',
				'title' => $atts['feature_3_title'],
				'text'  => $atts['feature_3_text'],
			),
			array(
				'icon'  => 'flaticon-clock',
				'title' => $atts['feature_4_title'],
				'text'  => $atts['feature_4_text'],
			),
		);

		ob_start();
		?>
		<section class="flow-confidence">
			<div class="flow-confidence__media" aria-hidden="true">
				<div class="flow-confidence__photo flow-confidence__photo--primary" style="background-image: url('<?php echo esc_url( $atts['image_primary'] ); ?>');"></div>
				<div class="flow-confidence__photo flow-confidence__photo--top" style="background-image: url('<?php echo esc_url( $atts['image_top'] ); ?>');"></div>
			</div>

			<div class="flow-confidence__content">
				<h2><?php echo esc_html( $atts['title'] ); ?></h2>

				<div class="flow-confidence__features">
					<?php foreach ( $features as $feature ) : ?>
						<div class="flow-confidence__feature">
							<div class="flow-confidence__icon">
								<i class="<?php echo esc_attr( sanitize_html_class( $feature['icon'] ) ); ?>"></i>
							</div>
							<div class="flow-confidence__feature-text">
								<h3><?php echo esc_html( $feature['title'] ); ?></h3>
								<p><?php echo esc_html( $feature['text'] ); ?></p>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
		<?php
		return ob_get_clean();
	}
}
add_shortcode( 'flow_confidence', 'flow_fitness_confidence_shortcode' );
