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
				'icon'   => '<svg viewBox="0 0 24 24"><path d="M12 21s7-5.1 7-12a7 7 0 1 0-14 0c0 6.9 7 12 7 12Z"/><circle cx="12" cy="9" r="2.5"/></svg>',
			),
			array(
				'number' => '02',
				'label'  => 'Hình thức',
				'title'  => 'Personal Training 1:1',
				'text'   => 'Giáo án cá nhân hóa theo thể trạng, mục tiêu, thói quen sinh hoạt và khả năng hiện tại.',
				'icon'   => '<svg viewBox="0 0 24 24"><path d="M8 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z"/><path d="M2.5 21a5.5 5.5 0 0 1 11 0"/><path d="M17 8h4"/><path d="M19 6v4"/><path d="M16.5 15.5h5"/><path d="M16.5 19h5"/></svg>',
			),
			array(
				'number' => '03',
				'label'  => 'Phương pháp',
				'title'  => 'Coach theo sát tiến trình',
				'text'   => 'Theo dõi kỹ thuật, cường độ và sự thay đổi cơ thể để điều chỉnh lộ trình phù hợp.',
				'icon'   => '<svg viewBox="0 0 24 24"><path d="M4 19V5"/><path d="M4 19h16"/><path d="M7 15l3-3 3 2 5-6"/><path d="M17 8h1.5V9.5"/></svg>',
			),
			array(
				'number' => '04',
				'label'  => 'Cam kết',
				'title'  => 'Đánh giá thể trạng trước khi tập',
				'text'   => 'Kiểm tra nền tảng vận động, posture và thể lực trước khi xây dựng chương trình tập.',
				'icon'   => '<svg viewBox="0 0 24 24"><path d="M9 3h6l1 2h3v16H5V5h3l1-2Z"/><path d="M9 9h6"/><path d="M9 13h6"/><path d="M9 17h4"/></svg>',
			),
		);

		ob_start();
		?>
		<div class="mkdf-flow-exp-inner">
			<div class="flw-exp__grid">
				<?php foreach ( $items as $item ) : ?>
					<article class="flw-exp__card">
						<span class="flw-exp__number"><?php echo esc_html( $item['number'] ); ?></span>
						<div class="flw-exp__icon"><?php echo $item['icon']; ?></div>
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
