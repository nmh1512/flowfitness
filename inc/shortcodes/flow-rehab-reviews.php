<?php

if (!function_exists('flow_fitness_rehab_reviews_shortcode')) {
    function flow_fitness_rehab_reviews_shortcode($atts)
    {
        $atts = shortcode_atts(
            array(
                'tag' => 'Community',
                'title' => 'Lắng nghe hành trình Rehab tại Flow Fitness',
                'assessment_label' => 'Scientific Wellness',
                'assessment_title' => 'Khoa học trong từng<br><em>chuyển động</em>',
                'assessment_text' => 'Mọi lộ trình tại Flow đều bắt đầu bằng việc lắng nghe cơ thể qua các bài kiểm tra chức năng chuyên sâu. Coach và khách hàng sẽ cùng nhau tìm ra nút thắt để giải quyết triệt để vấn đề.',
                'assessment_img' => get_stylesheet_directory_uri() . '/assets/rehab_hero.png',
                'btn_text' => 'Tư vấn lộ trình riêng',
                'btn_url' => '#',
            ),
            $atts,
            'flow_rehab_reviews'
        );

        // Define testimonials data (matching the second image horizontal layout style)
        $testimonials = array(
            array(
                'image'  => get_stylesheet_directory_uri() . '/assets/client_1.png',
                'quote'  => 'Sau 3 tháng kiên trì Rehab cùng Coach, những cơn đau lưng kinh niên của mình đã biến mất hoàn toàn. Không chỉ là tập luyện, đó là sự thấu hiểu cơ thể.',
                'name'   => 'Huyền Trâm',
                'role'   => 'Content Creator'
            ),
            array(
                'image'  => get_stylesheet_directory_uri() . '/assets/client_2.png',
                'quote'  => 'Kho dịch vụ chuyên sâu, không gian yên tĩnh và đội ngũ chuyên môn cực kỳ cao. Rất đáng trải nghiệm.',
                'name'   => 'Minh Hoàng',
                'role'   => 'Software Engineer'
            ),
            array(
                'image'  => get_stylesheet_directory_uri() . '/assets/rehab_hero.png', // Fallback image if there's only 2
                'quote'  => 'Flow giúp mình lấy lại sự tự tin sau chấn thương thể thao. Các bài test chức năng hàng tuần giúp mình thấy rõ tiến bộ.',
                'name'   => 'Quốc Anh',
                'role'   => 'Vận động viên'
            )
        );

        ob_start();
        ?>
        <!-- Swiper CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        
        <div class="flow-rehab-reviews-wrapper">
            <div class="circle-blur" style="top: 10%; right: -10%;"></div>
            <div class="circle-blur" style="bottom: 20%; left: -5%;"></div>

            <div class="container reveal-container " style="padding-top: 0;">
                
                <!-- ROW 1 (Header) -->
                <header class="header reveal">
                    <span class="vertical-tag">
                        <?php echo esc_html($atts['tag']); ?>
                    </span>
                    <h2>
                        <?php echo wp_kses_post($atts['title']); ?>
                    </h2>
                </header>

                <!-- ROW 2 (Assessment Box / Original Row 1 that was missing) -->
                <section class="assessment-box reveal reveal-left">
                    <div class="assessment-image"
                        style="background-image: url('<?php echo esc_url($atts['assessment_img']); ?>');">
                        <div class="data-tag tag-1">Functional Test: 85% Score</div>
                        <div class="data-tag tag-2">Alignment: Corrected</div>
                    </div>
                    <div class="assessment-content">
                        <span class="label">
                            <?php echo esc_html($atts['assessment_label']); ?>
                        </span>
                        <h3>
                            <?php echo wp_kses_post($atts['assessment_title']); ?>
                        </h3>
                        <p>
                            <?php echo esc_html($atts['assessment_text']); ?>
                        </p>
                        <div>
                            <a href="<?php echo esc_url($atts['btn_url']); ?>" class="btn-outline">
                                <?php echo esc_html($atts['btn_text']); ?>
                            </a>
                        </div>
                    </div>
                </section>

                <!-- ROW 3 (Swiper Slider / The new horizontal layout) -->
                <div class="slider-wrapper reveal reveal-right" style="position: relative;">
                    <div class="swiper flow-rehab-swiper" style="width: 100%;">
                        <div class="swiper-wrapper">
                        <?php foreach ($testimonials as $item): ?>
                            <div class="swiper-slide" style="height: auto;">
                                <div class="testi-card horizontal">
                                    <div class="featured-img" style="background-image: url('<?php echo esc_url($item['image']); ?>');"></div>
                                    <div class="featured-body">
                                        <div class="quote-icon">“</div>
                                        <p class="testi-text"><?php echo esc_html($item['quote']); ?></p>
                                        <div class="testi-author">
                                            <div class="author-info">
                                                <h4><?php echo esc_html($item['name']); ?></h4>
                                                <span><?php echo esc_html($item['role']); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        
                        <!-- CTA Slide -->
                        <div class="swiper-slide" style="height: auto;">
                            <div class="testi-card cta-card" style="background-color: #A55646; color: #FFFFFF; border: none; height: 100%; display: flex; align-items: center; justify-content: center; text-align: center;">
                                <div class="featured-body" style="width: 100%;">
                                    <div class="quote-icon" style="color: #FFFFFF; opacity: 0.4;">“</div>
                                    <p class="testi-text" style="color: #FFFFFF;">Hành trình thay đổi bắt đầu từ một quyết định đúng đắn. Hãy để Flow đồng hành cùng bạn.</p>
                                    <div class="testi-author" style="justify-content: center; border-top: 1px solid rgba(255,255,255,0.2);">
                                        <div class="author-info">
                                            <h4 style="color: #FFFFFF;">Join the Community</h4>
                                            <span style="color: #F7EBD6;">300+ Members</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pagination is optional, we will include it just in case -->
                    <div class="swiper-pagination"></div>
                </div>
                
                <!-- Navigation Buttons outside Swiper to prevent clipping when overflow hidden -->
                <div class="swiper-button-next rehab-next"></div>
                <div class="swiper-button-prev rehab-prev"></div>
            </div>
                
            </div>
        </div>

        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script>
            (function () {
                const initRehab = () => {
                    // Reveal animations
                    const observerOptions = { threshold: 0.1, rootMargin: '0px 0px -50px 0px' };
                    const observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                entry.target.classList.add('active');
                            }
                        });
                    }, observerOptions);
                    document.querySelectorAll('.flow-rehab-reviews-wrapper .reveal').forEach(el => observer.observe(el));

                    // Swiper Initialization
                    if (typeof Swiper !== 'undefined') {
                        new Swiper('.flow-rehab-swiper', {
                            slidesPerView: 1,
                            spaceBetween: 30,
                            loop: true,
                            observer: true,
                            observeParents: true,
                            breakpoints: {
                                1024: {
                                    slidesPerView: 2,
                                    spaceBetween: 30,
                                }
                            },
                            autoplay: {
                                delay: 5000,
                                disableOnInteraction: false,
                            },
                            pagination: {
                                el: '.flow-rehab-swiper .swiper-pagination',
                                clickable: true,
                            },
                            navigation: {
                                nextEl: '.rehab-next',
                                prevEl: '.rehab-prev',
                            },
                        });
                    }
                };

                // Wait a bit to ensure Swiper script is loaded from CDN
                if (document.readyState === 'complete') {
                    setTimeout(initRehab, 500);
                } else {
                    window.addEventListener('load', () => setTimeout(initRehab, 100));
                }
            })();
        </script>
        <?php
        return ob_get_clean();
    }
}
add_shortcode('flow_rehab_reviews', 'flow_fitness_rehab_reviews_shortcode');
