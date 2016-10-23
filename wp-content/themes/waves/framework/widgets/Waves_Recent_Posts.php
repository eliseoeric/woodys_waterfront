<?php 

class Waves_Recent_Posts extends WP_Widget {
	public function __construct() 
	{
		parent::construct(
				'waves_recent_posts',
			__( 'Recent Posts', 'waves' ),
			array( 'description' => 'Display latest posts.' )
		);	
	}	

	public function widget( $args, $instance ) 
	{

	}

	public function form( $instance ) 
	{
		
	}
}