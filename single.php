<?php


$tags = get_the_tag_list();
$sidebar_active = ( is_active_sidebar( 'sidebar-1' ) && ( get_theme_mod( 'show_page_sidebar', 'yes' ) == 'yes' ) );
$show_sidebar_class =  ( $sidebar_active ) ? 'col-lg-9 col-md-12 col-sm-12 col-12' : 'col-lg-12 col-md-12 col-sm-12 col-12';

get_header();
?>

		<section class="blog-standart">
			<h1 class="blog-hd"><?php the_title(); ?></h1>
		</section><!--blog-standart end-->

		<section class="main-content" id="content">
			<div class="container">
				<div class="row">
					<div class="<?php echo esc_attr( $show_sidebar_class ); ?>">
						<div class="blog-items">
						<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', get_post_type() );
							if( get_theme_mod( 'show_author_info' ) == 'yes' ) {
								get_template_part( 'template-parts/authorinfo', get_post_type() );
							}
							if ( is_single() ) {
								get_template_part( 'template-parts/navigation' );
							}
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>
						</div><!--featur-prop-sec end-->
					</div>
					<?php 
					if( $sidebar_active ) : ?>
						<div class="col-lg-3 col-md-12 col-sm-12 col-12">
							<div class="sidebar">
								<?php dynamic_sidebar( 'sidebar-1' ); ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section><!--standert-prop end-->

<?php
get_footer();
