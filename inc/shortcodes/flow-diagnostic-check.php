<?php

if (!function_exists('flow_fitness_diagnostic_check_shortcode')) {
    function flow_fitness_diagnostic_check_shortcode($atts)
    {
        $atts = shortcode_atts(
            array(
                'tag' => 'Flow Diagnostic',
                'title' => 'Bạn đang gặp tình trạng nào?',
                'btn_text' => 'Tư vấn giải pháp ngay',
                'btn_url' => '#'
            ),
            $atts,
            'flow_diagnostic_check'
        );

        $insights = array(
            array(
                'text' => 'Tập gym ngày đầu bị đau cơ kéo dài',
                'icon' => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>'
            ),
            array(
                'text' => 'Căng cơ sau khi tập',
                'icon' => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6.5 6.5l11 11"></path><path d="M21 16v5h-5"></path><path d="M8 3H3v5"></path><path d="M14.5 9.5L9.5 14.5"></path></svg>'
            ),
            array(
                'text' => 'Đau lưng dưới khi squat/deadlift',
                'icon' => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 11V6a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v0"></path><path d="M14 10V4a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v2"></path><path d="M10 10.5V6a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v8"></path><path d="M18 8a2 2 0 1 1 4 0v6a8 8 0 0 1-8 8h-2c-2.8 0-4.5-.86-5.99-2.34l-3.6-3.6a2 2 0 0 1 2.83-2.82L7 15"></path></svg>'
            ),
            array(
                'text' => 'Đau lưng trên, cổ vai gáy khi tập',
                'icon' => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>'
            ),
            array(
                'text' => 'Tập xong đau nhức nhiều hơn bình thường',
                'icon' => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>'
            ),
            array(
                'text' => 'Nghi ngờ mình đang tập sai cách',
                'icon' => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>'
            ),
            array(
                'text' => 'Nghỉ tập vài hôm rồi tập lại vẫn đau',
                'icon' => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path><polyline points="3 3 3 8 8 8"></polyline><polyline points="12 7 12 12 16 14"></polyline></svg>'
            ),
            array(
                'text' => 'Muốn tập tiếp nhưng sợ chấn thương nặng hơn',
                'icon' => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>'
            )
        );

        ob_start();
        ?>
        <div class="flow-diagnostic-wrapper" style="padding-top: 0">
            <div class="">
                <header class="header">
                    <span class="vertical-tag">
                        <?php echo esc_html($atts['tag']); ?>
                    </span>
                    <h2>
                        <?php echo wp_kses_post($atts['title']); ?>
                    </h2>
                </header>

                <div class="insight-grid">
                    <?php foreach ($insights as $index => $item): ?>
                        <!-- <div class="insight-card" onclick="toggleDiagnosticSelect(this, <?php echo $index; ?>)"> -->
                        <div class="insight-card" >
                            <div class="icon"><?php echo $item['icon']; ?></div>
                            <div class="keyword"><?php echo esc_html($item['text']); ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="action-area" id="diagnosticActionArea">
                    <a href="<?php echo esc_url($atts['btn_url']); ?>" class="flow-diag-btn">
                        <?php echo esc_html($atts['btn_text']); ?>
                    </a>
                </div>
            </div>
        </div>

        <script>
            function toggleDiagnosticSelect(card = null, index = null, autoOpen = false) {
                
                const selectedCards = document.querySelectorAll('.flow-diagnostic-wrapper .insight-card.selected');
                const actionArea = document.getElementById('diagnosticActionArea');
                if(autoOpen){
                    actionArea.classList.add('active');
                    return
                }
                if (actionArea) {
                    if (selectedCards.length > 0) {
                        actionArea.classList.add('active');
                    } else {
                        actionArea.classList.remove('active');
                    }
                }
            }
            toggleDiagnosticSelect(null, null, true);
        </script>
        <?php
        return ob_get_clean();
    }
}
add_shortcode('flow_diagnostic_check', 'flow_fitness_diagnostic_check_shortcode');
