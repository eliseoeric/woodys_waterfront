<?php 

function page_mb ( $meta_boxes ) {
    $prefix = "_WW_";

    $page_options = new_cmb2_box(
        array(
            'id'         => 'page_options',
            'title'      => 'Page Options',
            'object_types'      => array( 'page' ),
            // 'show_on'    => array ( 'key' => 'template', 'value' => 'template-link_farm' ),
            'context'    => 'normal',
            'priority'   => 'high',
            'show_names' => true,
        )
    );

    $page_options->add_field(
        array(
            'id' => $prefix . 'header_class',
            'name' => 'Page header class',
            'description' => 'Add any clases you would like added to the .page_header here.',
            'type' => 'text'
        )
    );

    $page_options->add_field(
        array(
            'id' => $prefix . 'content_class',
            'name' => 'Content class',
            'description' => 'Add any clases you would like added to the .entry-content here.',
            'type' => 'text'
        )
    );

}