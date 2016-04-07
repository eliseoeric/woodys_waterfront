<?php 

function review_mb( $meta_boxes ) {
	$prefix = "_WW_";

	$review_config = new_cmb2_box(
		array(
            'id'         => 'review_details',
            'title'      => 'Review Details',
            'object_types'      => array( 'review' ),
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

    $review_config->add_field( array(
        'name'         => 'Full Name',
        'desc'         => 'Name of the reviewer',
        'id'           => $prefix . 'review_fullName',
        'type'         => 'text'
    ) );

    $review_config->add_field( array(
        'name'          =>  'Date',
        'desc'          =>  'When was the review posted?',
        'id'            =>  $prefix . 'review_date',
        'type'          =>  'text_date_timestamp'
    ) );

    $review_config->add_field( array(
        'name'          =>  'Rating',
        'desc'          =>  'Choose the review rating',
        'id'            =>  $prefix . 'review_rating',
        'type'          =>  'select',
        'options'          => array(
            'one' => __( 'One Star', 'waves' ),
            'two'   => __( 'Two Stars', 'waves' ),
            'three'     => __( 'Three Stars', 'waves' ),
            'four'     => __( 'Four Stars', 'waves' ),
            'five'     => __( 'Five Stars', 'waves' ),
        ),
    ) );

    $review_config->add_field( array(
        'name'          =>  'Link',
        'desc'          =>  'Link to the actual review',
        'id'            =>  $prefix . 'review_link',
        'type'          =>  'text_url'
    ) );

    $review_config->add_field( array(
        'name'          =>  'Source',
        'desc'          =>  'Choose the review source',
        'id'            =>  $prefix . 'review_source',
        'type'          =>  'select',
        'options'          => array(
            'TripAdvisor' => __( 'TripAdvisor', 'waves' ),
            'Google+'   => __( 'Google+', 'waves' ),
            'Facebook'     => __( 'Facebook', 'waves' ),
            'Yelp'     => __( 'Yelp', 'waves' ),
            'Zomato'     => __( 'Zomoato', 'waves' ),
            'Reviews'     => __( 'Reviews', 'waves' ),
            'Other'     => __( 'Other', 'waves' ),
        ),
    ) );

}