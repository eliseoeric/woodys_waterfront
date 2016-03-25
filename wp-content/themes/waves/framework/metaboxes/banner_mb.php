<?php 

function banner_mb( $meta_boxes ) {
	$prefix = "_WW_";

    $banners = array(
        'promo-gc-blue' => 'Promo Gift Cert Blue',
        'promo-hh-blue' => 'Promo Happy Hour Blue',
        'promo-hh-green' => 'Promo Happy Hour Green',
        'review-two-column' => 'Review Columns (2)',
        'sidebar-blue' => 'Blue Sidebar'
    );

	$banner_config = new_cmb2_box(
		array(
            'id'         => 'banner_config',
            'title'      => 'Banner Config',
            'object_types'      => array( 'page' ),
            // 'show_on'    => 
            //     array( 
            //         'key' => 'template', 
            //         'value' => 'template-location', 
            //         'key' => 'template', 
            //         'value' => 'template-events',
            //         'key' => 'template',
            //         'value' => 'template-reviews'
            //     ),
            'context'    => 'normal',
            'priority'   => 'high',
            'show_names' => true,
        )
	);

    $banner_config->add_field( array(
        'name'             => 'Banner',
        'desc'             => 'Select an banner to display',
        'id'               => $prefix . 'banner_type',
        'type'             => 'select',
        'show_option_none' => true,
        'default'          => '',
        'options'          => $banners,
    ) );
	
}