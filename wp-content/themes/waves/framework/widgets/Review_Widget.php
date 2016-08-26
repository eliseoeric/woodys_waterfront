<?php

class Review_Widget extends WP_Widget {

	public function __construct()
	{
	    parent::__construct(
		    'review_widget', //Base Id
		    __( 'Review Widget', 'waves' ),
		    array( 'description' => 'Displays random review posts' )
	    );

	}

	public function widget( $args, $instance ) {
		extract( $args );

		//get the posts
		$query_args = array(
			'post_type' => 'review',
			'order_by' => 'rand',
			'posts_per_page' => $instance['post_per_page']
		);

		$reviews = new WP_Query( $query_args );

		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		foreach($reviews->posts as $post) {
			$rating = get_post_meta( $post->ID, '_WW_review_rating', true );

			echo "<div class='review review__block cl-white bg-teal' style='width:100%;'>
				<header class='review__header'>
					<h6 class='mg-b-0'>{$post->post_title}</h6>";

			echo show_review_rating( $rating );

			echo"</header>
				<div class='review_body'>
					{$post->post_content}
				</div>
			</div>";
		}

		echo "<p class='mg-t-15'>Had a great time at Woody's? Let us know!</p>";
		echo "<p><a href='/reviews' class='button full-width'>Leave Review</a></p>";
		echo $args['after_widget'];

	}



	public function form( $instance ) {
		$title = esc_attr( $instance['title'] );
		$post_per_page = esc_attr( $instance['post_per_page'] );
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>"/>
		</p>


		<p>
			<label for="<?php echo $this->get_field_id('post_per_page'); ?>"><?php _e('Posts to Display:'); ?></label>
			<input type="number" class="tiny-text" step="1" min="1" value="<?php echo $post_per_page ?>" name="<?php echo $this->get_field_name('post_per_page'); ?>" id="<?php echo $this->get_field_id('post_per_page'); ?>"/>
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['post_per_page'] = strip_tags( $new_instance['post_per_page'] );

		return $instance;
	}
}