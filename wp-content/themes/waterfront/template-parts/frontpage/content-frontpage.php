<?php
/**
 * The template used for displaying front page content in front-page.php
 *
 * @package waterfront
 */

?>

<section id="" <?php post_class(); ?>>
	<div class="row full_width wrapper double frontpage__main_content">
		<div class="four push_seven columns entry-content">
			<header class="entry-header">
				<?php the_title( '<h3 class="cl-blue entry-title">', '</h3>' ); ?>
			</header><!-- .entry-header -->
			<?php the_content(); ?>
		</div>
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'waterfront' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
	
	<div class="wrapper bg-blue">
		<div class="row">
			<div class="three columns ">
					<img src="<?php echo get_template_directory_uri() . '/img/happy_hour.png'; ?>" alt="Woody's Waterfront Entrance">
					
			</div>
			<div class="nine columns">
				<h2 class="cl-white mg-t-30">Woody's Waterfront Half Priced Happ Hour</h2>
				<h3 class="cl-white">Monday - Friday 2pm 6pm Entertainment Nightly </h3>
			</div>
		</div>	
	</div>

	<div class="wrapper">
		<div class="row">
			<div class="four columns push_four mg-b-50">
				<h3>Woody's Waterfront stuff</h3>
				<p>We feature some of the hottest talent on the beach. Woody's is pleased to provide live entertainment nightly Wednesday through Sunday, every Sunday 3:30pm 7:30pm Carl's Piano Music. Beautiful Waterfront Views!</p>
				<p>From our waterfront deck, you can watch the dolphins play; enjoy the sight of parasailers and jet skiers; watch the boats returning throughout the Pass with the days catch; or simply relax as the sun sets over the Gulf of Mexico. It's a common sight to watch bright schools of fish swimming within a few feet of your table! "We're so close to the water, your burger will get wet"!</p>
			</div>
		</div>
		<div class="row">
			<div class="three columns pd-l-10 pd-r-10 jazz-img">
				<figure class="effect-jazz">
					<img src="<?php echo get_template_directory_uri() . '/img/IMG_3535.jpg'; ?>" alt="Woody's Waterfront Entrance">
					<figcaption>
						<!-- <h2 class="">Woody's <span>Waterfront</span></h2> -->
						<p>So close to the water your burger gets wet</p>
						<a href="#">View more</a>
					</figcaption>			
				</figure>
				<p>I don't like you sucking around bothering our citizens, Lebowski. I—the royal we, man, you know, the editorial. Regrettably, it's true, standards have fallen in adult entertainment.</p>
			</div>

			<div class="three columns pd-l-10 pd-r-10 jazz-img">
				<figure class="effect-jazz">
					<img src="<?php echo get_template_directory_uri() . '/img/IMG_3511.jpg'; ?>" alt="Woody's Waterfront Entrance">
					<figcaption>
						<!-- <h2 class="">Woody's <span>Waterfront</span></h2> -->
						<p>So close to the water your burger gets wet</p>
						<a href="#">View more</a>
					</figcaption>			
				</figure>
				<p>You might want to watch out the front window there, Larry. I mean I had an M16, Jacko, not an Abrams fucking tank. Mind if I smoke a jay? I got information—new shit has come to light and—shit, man! She kidnapped herself! That is our most modestly priced receptacle.</p>
			</div>

			<div class="three columns pd-l-10 pd-r-10 jazz-img">
				<figure class="effect-jazz">
					<img src="<?php echo get_template_directory_uri() . '/img/IMG_3523.jpg'; ?>" alt="Woody's Waterfront Entrance">
					<figcaption>
						<!-- <h2 class="">Woody's <span>Waterfront</span></h2> -->
						<p>So close to the water your burger gets wet</p>
						<a href="#">View more</a>
					</figcaption>			
				</figure>
				<p>It's video, Dude. …which would place him high in the runnin' for laziest worldwide—but sometimes there's a man… sometimes there's a man. That wasn't her toe. Vee don't care. Vee still vant zat money or vee fuck you up.</p>
			</div>

			<div class="three columns pd-l-10 pd-r-10 jazz-img">
				<figure class="effect-jazz">
					<img src="<?php echo get_template_directory_uri() . '/img/IMG_3504.jpg'; ?>" alt="Woody's Waterfront Entrance">
					<figcaption>
						<!-- <h2 class="">Woody's <span>Waterfront</span></h2> -->
						<p>So close to the water your burger gets wet</p>
						<a href="#">View more</a>
					</figcaption>			
				</figure>
				<p>Any further harm visited upon Bunny, shall be visited tenfold upon your head. Who's in pyjamas, Walter? All right, Plan B. </p>
			</div>
		</div>
	</div>
</section><!-- #post-## -->
