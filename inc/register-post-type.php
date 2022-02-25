<?php

    function jobapps_register_post_type() {
        $labels = array(
            'name'                  => _x( 'İş Başvuruları', 'Post type general name', 'basvuru' ),
            'singular_name'         => _x( 'İş Başvurusu', 'Post type singular name', 'basvuru' ),
            'menu_name'             => _x( 'İş Başvuruları', 'Admin Menu text', 'basvuru' ),
            'name_admin_bar'        => _x( 'İş Başvurusu', 'Add New on Toolbar', 'basvuru' ),
            'add_new'               => __( 'Yeni İş Başvurusu Ekle', 'basvuru' ),
            'add_new_item'          => __( 'Yeni İş Başvurusu Ekle', 'basvuru' ),
            'new_item'              => __( 'Yeni İş Başvurusu Ekle', 'basvuru' ),
            'edit_item'             => __( 'İş Başvurusunu Düzenle', 'basvuru' ),
            'view_item'             => __( 'İş Başvurusunu Görüntüle', 'basvuru' ),
            'all_items'             => __( 'Tüm İş Başvuruları', 'basvuru' ),
            'search_items'          => __( 'İş Başvurularında Ara', 'basvuru' ),
            'parent_item_colon'     => __( 'Üst İş Başvuruları:', 'basvuru' ),
            'not_found'             => __( 'İş Başvurusu Bulunamadı.', 'basvuru' ),
            'not_found_in_trash'    => __( 'Çöpte İş Başvurusu Yok.', 'basvuru' ),
            'featured_image'        => _x( 'İş Başvurusu Önizleme Resmi', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'basvuru' ),
            'set_featured_image'    => _x( 'Önizleme Resmi Ayarla', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'basvuru' ),
            'remove_featured_image' => _x( 'Önizleme Resmini Sil', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'basvuru' ),
            'use_featured_image'    => _x( 'Bunu Önizleme Resmi Olarak Kullan', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'basvuru' ),
            'archives'              => _x( 'İş Başvurusı Arşivi', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'basvuru' ),
            'insert_into_item'      => _x( 'Insert into recipe', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'basvuru' ),
            'uploaded_to_this_item' => _x( 'Uploaded to this recipe', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'basvuru' ),
            'filter_items_list'     => _x( 'Filter recipes list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'basvuru' ),
            'items_list_navigation' => _x( 'İş Başvuruları Liste Yönlendirmesi', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'basvuru' ),
            'items_list'            => _x( 'İş Başvurusu Listesi', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'basvuru' ),
        );     
        $args = array(
            'labels'             => $labels,
            'description'        => 'İş Başvurusu custom post type.',
            'public'             => false,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'basvuru' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 1,
            'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
            //'taxonomies'         => array( 'category', 'post_tag' ),
            'show_in_rest'       => true

        );
          
        register_post_type( 'basvuru', $args );
    }
    add_action( 'init', 'jobapps_register_post_type' );

    function disable_create_basvuru() {
        global $wp_post_types;
        $wp_post_types['basvuru']->cap->create_posts = 'do_not_allow';
        //$wp_post_types['page']->cap->create_posts = 'do_not_allow';
        //$wp_post_types['my-post-type']->cap->create_posts = 'do_not_allow';
    }
    add_action('init','disable_create_basvuru');