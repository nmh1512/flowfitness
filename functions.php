<?php
/*** Child Theme Function  ***/

if ( ! function_exists( 'powerlift_mikado_child_theme_enqueue_scripts' ) ) {
    function powerlift_mikado_child_theme_enqueue_scripts() {
        $parent_style = 'powerlift-mikado-default-style';
        
        wp_enqueue_style( 'powerlift-mikado-child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ) );
        wp_enqueue_style( 'powerlift-child-flaticon', get_stylesheet_directory_uri() . '/assets/css/flaticon.css', array( 'powerlift-mikado-child-style' ) );
    }
    
    add_action( 'wp_enqueue_scripts', 'powerlift_mikado_child_theme_enqueue_scripts' );
}

add_filter( 'template_include', 'powerlift_child_template_include', 99 );
function powerlift_child_template_include( $template ) {
    if ( is_singular( 'portfolio-item' ) ) {
        $new = get_stylesheet_directory() . '/single-portfolio-item.php';
        if ( file_exists( $new ) ) {
            return $new;
        }
    }
    return $template;
}

add_filter( 'elementor/editor/allowed_post_types', function( $post_types ) {
    $post_types[] = 'portfolio-item';
    return $post_types;
}, 10 );

add_filter( 'elementor_pro/utils/get_public_post_types', function( $post_types ) {
    $post_types[] = 'portfolio-item';
    return $post_types;
}, 10 );

function flow_fitness_custom_services( $atts ) {
    // Shortcode attributes
    $atts = shortcode_atts(
        array(
            'holder_classes' => 'masonry', // Add any default classes if needed
            'item_type' => 'portfolio-item', // Default item type
            'pagination_type' => 'default', // Default pagination type
            // Add other parameters as needed
        ),
        $atts,
        'flow_fitness_custom_services_shortcode'
    );

    // Prepare the holder data (you can customize this as needed)
    $holder_data = ''; // Add any data attributes if needed

    // Query for portfolio items
    $query_args = array(
        'post_type' => 'page',
        // 'posts_per_page' => 4, // Adjust as needed
        'post__in' => array(4686, 4693, 4698, 4700), // Replace with your actual page IDs
    	'orderby'        => 'ID', // Keeps order as in the array above
    	'order'          => 'ASC',      // or 'DESC'
    );
    $query_results = new WP_Query( $query_args );

    // Start output buffering
    ob_start();
    ?>
    <div class="mkdf-portfolio-list-holder mkdf-grid-list mkdf-grid-masonry-list mkdf-pl-masonry mkdf-four-columns mkdf-no-space mkdf-disable-bottom-space mkdf-pl-gallery-overlay mkdf-fixed-masonry-items   mkdf-pl-pag-no-pagination     " data-type="masonry" data-number-of-columns="four" data-space-between-items="no" data-number-of-items="-1" data-image-proportions="data-custom-image-width=" data-custom-image-height="data-enable-fixed-proportions=yes" data-enable-image-shadow="no" data-category="cardio" data-orderby="date" data-order="ASC" data-item-style="gallery-overlay" data-content-top-margin="data-content-bottom-margin=" data-enable-title="yes" data-enable-category="yes" data-enable-count-images="data-enable-excerpt=no" data-excerpt-length="data-pagination-type=no-pagination" data-load-more-top-margin="data-filter=no" data-filter-order-by="data-filter-text-transform=" data-filter-bottom-margin="data-enable-article-animation=no" data-portfolio-slider-on="no" data-enable-loop="yes" data-enable-autoplay="yes" data-slider-speed="5000" data-slider-speed-animation="600" data-enable-navigation="yes" data-enable-pagination="yes" data-max-num-pages="0" data-next-page="2">
        <div class="mkdf-pl-inner mkdf-outer-space mkdf-masonry-list-wrapper clearfix">
            <div class="mkdf-masonry-grid-sizer"></div>
            <div class="mkdf-masonry-grid-gutter"></div>
            <?php 
                if($query_results->have_posts()):
                    while ( $query_results->have_posts() ) : $query_results->the_post();
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                    ?>
                    <article class="mkdf-pl-item mkdf-item-space mkdf-masonry-size-large-width portfolio-item type-portfolio-item status-publish has-post-thumbnail hentry portfolio-category-cardio portfolio-tag-conditioning">
                        <div class="mkdf-pl-item-inner">
                            <div class="mkdf-pli-image">
								<?php 
								if ( $image ) :
								?>
									<div class="mkdf-pli-image-background" 
										 style="background-image: url('<?php echo esc_url( $image[0] ); ?>');">
									</div>
								<?php endif; ?>
                            </div>
                            <div class="mkdf-pli-text-holder">
                                <div class="mkdf-pli-text-wrapper">
                                    <div class="mkdf-pli-text">
                                        <div class="mkdf-pli-text-inner">
                                            <?php
                                                echo get_template_part( 'portfolio-templates/portfolio-list/title' );
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a itemprop="url" class="mkdf-pli-link mkdf-block-drag-link" href="<?php echo esc_url(get_permalink()); ?>"></a>
                        </div>
                    </article>
            <?php
                    endwhile;
                else:
                    echo powerlift_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-list', 'parts/posts-not-found');
                endif;

                wp_reset_postdata();
            ?>
        </div>
    </div>
    <?php

    // Return the output
    return ob_get_clean();
}


add_shortcode( 'flow_fitness_custom_services_shortcode', 'flow_fitness_custom_services' );

if ( ! function_exists( 'flow_fitness_register_elementor_widgets' ) ) {
    function flow_fitness_register_elementor_widgets() {
        require_once get_stylesheet_directory() . '/inc/elementor/flow-faq.php';
    }

    add_action( 'elementor/widgets/register', 'flow_fitness_register_elementor_widgets' );
}

require_once get_stylesheet_directory() . '/inc/shortcodes/flow-experience.php';
require_once get_stylesheet_directory() . '/inc/shortcodes/flow-confidence.php';
require_once get_stylesheet_directory() . '/inc/shortcodes/flow-why-choose.php';
require_once get_stylesheet_directory() . '/inc/shortcodes/flow-rehab-reviews.php';
require_once get_stylesheet_directory() . '/inc/shortcodes/flow-diagnostic-check.php';
require_once get_stylesheet_directory() . '/inc/shortcodes/flow-diagonal-features.php';
require_once get_stylesheet_directory() . '/inc/post-types/flow-review-cpt.php';