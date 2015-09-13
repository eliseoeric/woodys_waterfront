<?php 

function menu_mb( $meta_boxes ) {
	$prefix = "_WW_";

	$menu_items = new_cmb2_box(
		array(
            'id'         => 'menu_items',
            'title'      => 'Menu Section Items',
            'object_types'      => array ( 'menu_block' ),
            // 'show_on'    => array ( 'key' => 'template', 'value' => 'template-link_farm' ),
            'context'    => 'normal',
            'priority'   => 'high',
            'show_names' => true,
        )
	);

	$menu_item_group = $menu_items->add_field(
		array(
			'id'          => $prefix . 'menu_items',
	        'type'        => 'group',
	        'description' => __( 'Add menu item', 'Waterfront' ),
	        'options'     => array(
	            'group_title'   => __( 'Item {#}', 'Waterfront' ), // since version 1.1.4, {#} gets replaced by row number
	            'add_button'    => __( 'Add Another Item', 'Waterfront' ),
	            'remove_button' => __( 'Remove Item', 'Waterfront' ),
	            'sortable'      => true, // beta
	        ),
		)
	);

	$menu_items->add_group_field(
        $menu_item_group,
        array(
            'name' => 'Item Name',
            'desc' => '',
            'id'   => 'item_name',
            'type' => 'text',
        )
    );

    $menu_items->add_group_field(
        $menu_item_group,
        array(
            'name' => 'Item Description',
            'desc' => '',
            'id'   => 'item_description',
            'type' => 'text',
        )
    );

    $menu_items->add_group_field(
        $menu_item_group,
        array(
            'name' => 'Item Price',
            'desc' => '',
            'id'   => 'item_price',
            'type' => 'text',
        )
    );
}