<?php

global $pagename, $wp_query;

// $pagename = get_query_var('pagename');  
if (!$pagename && $id > 0) {
	// If a static page is set as the front page, $pagename will not be set. Retrieve it from the queried object  
	$current_post = $wp_query->get_queried_object();
	$pagename = $current_post->post_name;
}

if (get_queried_object()) {
	$pagename = get_queried_object()->post_title;
}

if (is_day() || is_category() || is_month() || is_year() || is_author()) {
	$pagename = get_the_archive_title();
}

$page_heading = (!empty(get_theme_mod('page_heading_text'))) ? get_theme_mod('page_heading_text') : $pagename;
$sidebar_active = (is_active_sidebar('sidebar-1') && (get_theme_mod('show_page_sidebar', 'yes') == 'yes'));
$show_sidebar_class =  ($sidebar_active) ? 'col-lg-9 col-md-12 col-sm-12 col-12' : 'col-lg-12 col-md-12 col-sm-12 col-12';
get_header();

?>

<?php if(get_theme_mod('show_blog_in_grid')) :  ?>
	<?php get_template_part('template-parts/sections/section-blog-navs'); ?>
<?php else: ?>
	<?php if (get_theme_mod('show_page_heading', 'yes') == 'yes' && $page_heading) :  ?>
		<section class="blog-standart">
			<h1 class="blog-hd"><?php echo wp_kses_post($page_heading); ?></h1>
		</section><!--blog-standart end-->
	<?php endif; ?>
<?php endif; ?>


<section class="main-content" id="content">
	<div class="container">
		<div class="d-flex align-items-first flex-wrap flex-md-nowrap">
			<div class="side flex-grow-1 bd-highlight pr-2">
				<div class="blog-items">
					<?php
					if (have_posts()) :
						
						if(get_theme_mod('show_blog_in_grid')) {
							echo '<div class="row">';
							while (have_posts()) : the_post();
								get_template_part('template-parts/content-grid', get_post_type());
							endwhile;
							echo '</div>';
						} else {
							while (have_posts()) : the_post();
								get_template_part('template-parts/content', get_post_type());
							endwhile;
						}
					
						$total_pages = $wp_query->max_num_pages;

						if ($total_pages > 1) : ?>
							<div class="pagi_nation d-flex justify-content-center">
								<?php $args = array(
									'mid_size'  => 1,
									'prev_text' => '<i class="fa fa-angle-left"></i>',
									'next_text' => '<i class="fa fa-angle-right"></i>',
									'screen_reader_text' => __('Posts navigation', 'nexproperty'),
									'show_all' => true,
									'class'=> 'pagination ',
								) ?>
								<?php the_posts_pagination($args); ?>
							</div>
					<?php endif;
					else :
						get_template_part('template-parts/content', 'none');
					endif;
					?>
				</div><!--featur-prop-sec end-->
			</div>
			<?php
			if ($sidebar_active) : ?>
				<div class="side-wrapper pl-3">
					<div class="sidebar">
						<?php dynamic_sidebar('sidebar'); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section><!--standert-prop end-->

<?php
get_footer();
