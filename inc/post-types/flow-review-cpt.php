<?php
// Đăng ký Custom Post Type 'flow_review'
function flow_fitness_register_review_cpt() {
    $labels = array(
        'name'                  => _x( 'Reviews', 'Post Type General Name', 'powerlift-child' ),
        'singular_name'         => _x( 'Review', 'Post Type Singular Name', 'powerlift-child' ),
        'menu_name'             => __( 'Reviews', 'powerlift-child' ),
        'name_admin_bar'        => __( 'Review', 'powerlift-child' ),
        'archives'              => __( 'Review Archives', 'powerlift-child' ),
        'attributes'            => __( 'Review Attributes', 'powerlift-child' ),
        'parent_item_colon'     => __( 'Parent Review:', 'powerlift-child' ),
        'all_items'             => __( 'All Reviews', 'powerlift-child' ),
        'add_new_item'          => __( 'Add New Review', 'powerlift-child' ),
        'add_new'               => __( 'Add New', 'powerlift-child' ),
        'new_item'              => __( 'New Review', 'powerlift-child' ),
        'edit_item'             => __( 'Edit Review', 'powerlift-child' ),
        'update_item'           => __( 'Update Review', 'powerlift-child' ),
        'view_item'             => __( 'View Review', 'powerlift-child' ),
        'view_items'            => __( 'View Reviews', 'powerlift-child' ),
        'search_items'          => __( 'Search Review', 'powerlift-child' ),
        'not_found'             => __( 'Not found', 'powerlift-child' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'powerlift-child' ),
        'featured_image'        => __( 'Featured Image (Ảnh khách hàng)', 'powerlift-child' ),
        'set_featured_image'    => __( 'Set featured image', 'powerlift-child' ),
        'remove_featured_image' => __( 'Remove featured image', 'powerlift-child' ),
        'use_featured_image'    => __( 'Use as featured image', 'powerlift-child' ),
        'insert_into_item'      => __( 'Insert into review', 'powerlift-child' ),
        'uploaded_to_this_item' => __( 'Uploaded to this review', 'powerlift-child' ),
        'items_list'            => __( 'Reviews list', 'powerlift-child' ),
        'items_list_navigation' => __( 'Reviews list navigation', 'powerlift-child' ),
        'filter_items_list'     => __( 'Filter reviews list', 'powerlift-child' ),
    );
    $args = array(
        'label'                 => __( 'Review', 'powerlift-child' ),
        'description'           => __( 'Customer Reviews', 'powerlift-child' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
        'hierarchical'          => false,
        'public'                => false, // Không có trang chi tiết frontend
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-testimonial',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => false,
        'capability_type'       => 'page',
    );
    register_post_type( 'flow_review', $args );
}
add_action( 'init', 'flow_fitness_register_review_cpt', 0 );

// Thêm Meta Box cho Role (Vai trò / Nghề nghiệp)
function flow_fitness_add_review_meta_box() {
    add_meta_box(
        'flow_review_details',
        __( 'Thông tin bổ sung', 'powerlift-child' ),
        'flow_fitness_review_meta_box_callback',
        'flow_review',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'flow_fitness_add_review_meta_box' );

function flow_fitness_review_meta_box_callback( $post ) {
    wp_nonce_field( 'flow_fitness_save_review_meta', 'flow_fitness_review_meta_nonce' );
    $role = get_post_meta( $post->ID, '_flow_review_role', true );
    ?>
    <p>
        <label for="flow_review_role"><strong><?php _e( 'Vai trò / Nghề nghiệp:', 'powerlift-child' ); ?></strong></label><br/>
        <input type="text" id="flow_review_role" name="flow_review_role" value="<?php echo esc_attr( $role ); ?>" style="width:100%; max-width: 400px; margin-top: 5px;" placeholder="VD: Content Creator" />
    </p>
    <?php
}

function flow_fitness_save_review_meta( $post_id ) {
    if ( ! isset( $_POST['flow_fitness_review_meta_nonce'] ) ) {
        return;
    }
    if ( ! wp_verify_nonce( $_POST['flow_fitness_review_meta_nonce'], 'flow_fitness_save_review_meta' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    if ( isset( $_POST['flow_review_role'] ) ) {
        update_post_meta( $post_id, '_flow_review_role', sanitize_text_field( $_POST['flow_review_role'] ) );
    }
}
add_action( 'save_post', 'flow_fitness_save_review_meta' );
