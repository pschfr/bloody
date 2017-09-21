<?php
	// Registers Custom Post Type for Galleries
	function gallery_cpt() {
		$labels = array(
			'name'                  => 'Galleries',
			'singular_name'         => 'Gallery',
			'menu_name'             => 'Galleries',
			'name_admin_bar'        => 'Gallery',
			'archives'              => 'Gallery Archives',
			'attributes'            => 'Gallery Attributes',
			'parent_item_colon'     => 'Parent Gallery:',
			'all_items'             => 'All Galleries',
			'add_new_item'          => 'Add New Gallery',
			'add_new'               => 'Add New',
			'new_item'              => 'New Gallery',
			'edit_item'             => 'Edit Gallery',
			'update_item'           => 'Update Gallery',
			'view_item'             => 'View Gallery',
			'view_items'            => 'View Galleries',
			'search_items'          => 'Search Gallery',
			'not_found'             => 'Not found',
			'not_found_in_trash'    => 'Not found in Trash',
			'featured_image'        => 'Featured Image',
			'set_featured_image'    => 'Set featured image',
			'remove_featured_image' => 'Remove featured image',
			'use_featured_image'    => 'Use as featured image',
			'insert_into_item'      => 'Insert into item',
			'uploaded_to_this_item' => 'Uploaded to this item',
			'items_list'            => 'Items list',
			'items_list_navigation' => 'Items list navigation',
			'filter_items_list'     => 'Filter items list',
		);
		$args = array(
			'label'                 => 'Gallery',
			'description'           => 'A collection of images.',
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'revisions', ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-format-gallery',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type('gallery', $args);
	}
	add_action('init', 'gallery_cpt', 0);
?>
