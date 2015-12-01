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
                    'key' => 'template', 
                    'value' => 'template-location', 
                    'key' => 'template', 
                    'value' => 'template-events',
                    'key' => 'template',
                    'value' => 'template-reviews'
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