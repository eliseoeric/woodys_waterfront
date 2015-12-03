<?php 

function acts_mb( $meta_boxes ) {
	$prefix = "_WW_";

	$entertainers = new_cmb2_box(
		array(
            'id'         => 'entertainers',
            'title'      => 'Entertainers',
            'object_types'      => array ( 'page' ),
            'show_on'    => array ( 'key' => 'page-template', 'value' => 'template-events.php' ),
            'context'    => 'normal',
            'priority'   => 'high',
            'show_names' => true,
        )
	);

	$entertainers_group = $entertainers->add_field(
		array(
			'id'          => $prefix . 'entertainers',
	        'type'        => 'group',
	        'description' => __( 'Add Entertainer', 'Waterfront' ),
	        'options'     => array(
	            'group_title'   => __( 'Entertainer {#}', 'Waterfront' ), // since version 1.1.4, {#} gets replaced by row number
	            'add_button'    => __( 'Add Another Entertainer', 'Waterfront' ),
	            'remove_button' => __( 'Remove Entertainer', 'Waterfront' ),
	            'sortable'      => true, // beta
	        ),
		)
	);

	$entertainers->add_group_field(
        $entertainers_group,
        array(
            'name' => 'Entertainer Name',
            'desc' => '',
            'id'   => 'entertainer_name',
            'type' => 'text',
        )
    );

    $entertainers->add_group_field(
        $entertainers_group,
        array(
            'name' => 'Entertainer Schedule',
            'desc' => '',
            'id'   => 'entertainer_schedule',
            'type' => 'text',
        )
    );

    $entertainers->add_group_field(
        $entertainers_group,
        array(
            'name' => 'Entertainer Photo',
            'desc' => '',
            'id'   => 'entertainer_attachment',
            'type' => 'file',
        )
    );

    $entertainers->add_group_field(
        $entertainers_group,
        array(
            'name' => 'Entertainer Website',
            'desc' => '',
            'id'   => 'entertainer_url',
            'type' => 'text_url',
        )
    );


    $entertainers->add_group_field(
        $entertainers_group,
        array(
            'name' => 'Entertainer Description',
            'desc' => '',
            'id'   => 'entertainer_description',
            'type' => 'wysiwyg',
        )
    );
}