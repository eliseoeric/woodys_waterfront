<?php 

function location_mb( $meta_boxes ) {
	$prefix = "_WW_";

	$secondary_content = new_cmb2_box(
		array(
            'id'         => 'location_content',
            'title'      => 'Content',
            'object_types'      => array( 'page' ),
            'show_on'    => 
                array( 
                    'key' => 'page-template',
                    'value' => array('template-location.php','template-events.php','template-reviews.php')
                ),
            'context'    => 'normal',
            'priority'   => 'high',
            'show_names' => true,
        )
	);

    $secondary_content->add_field( array(
        'name' => 'Content',
        'desc' => 'Extra content that is below the hero',
        'id' => $prefix . 'extra_content',
        'type' => 'wysiwyg',
        'options' => array()    
    ) );
	
}