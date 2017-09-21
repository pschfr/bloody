<?php
	function add_cmb2_metaboxes() {
		$cmb = new_cmb2_box(array(
			'id'           => 'gallery_metaboxes',
			'title'        => 'Gallery Images',
			'object_types' => array('gallery'), // Post type
			'context'      => 'normal'
		));

		$cmb->add_field(array(
			'name' => 'Gallery Images',
			'desc' => 'Images to be included in the gallery',
			'id' => 'gallery_images',
			'type' => 'file_list'
		));
	}

	add_action('cmb2_admin_init','add_cmb2_metaboxes');
?>
