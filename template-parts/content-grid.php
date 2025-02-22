<?php

/**
 * Template part for displaying blog navigation section.
 *
 * @package Real_Estate_Realista
 */

?>

<?php
$sticky = '';
if (is_sticky(get_the_ID())) {
    $sticky = 'sticky';
}
?>

<div class="col-sm-6" style="<?php echo wp_kses_post($helper_style); ?>">
    <div id="post-<?php the_ID(); ?>" <?php post_class($sticky . ' card-blog'); ?>>
        <div class="card-content">
            <div class="card-thumbnail">
                <?php
                if (has_post_thumbnail() && !post_password_required()) :
                ?>
                    <a href="<?php echo esc_url(get_permalink()); ?>" class="">
                        <figure class="entry-thumbnail entry-thumbnail-full">
                            <?php the_post_thumbnail(); ?>
                        </figure>
                        <?php
                        ?>
                    </a>
                <?php else : ?>
                    <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/no-photo.jpg'; ?>" alt="">
                <?php endif; ?>

                <a href="<?php echo esc_url(get_permalink()); ?>" class="hover_link"></a>
            </div>
            <div class="card-wrapper">

                <?php
                if (has_category()) {
                    echo '  <div class="card-labels">';
                    $categories = get_the_category();
                    foreach ($categories as $category) {
                        $cat_link = get_category_link($category->term_id);
                        $cat_name = $category->name;
                    ?>
                        <span class="label"><?php echo esc_html($cat_name); ?></span>
                    <?php break;
                    }
                    echo '</div>';
                }
                ?>

                <h2 class="card-title"><a href="<?php echo esc_url(get_permalink()); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                <?php
                $content = get_the_excerpt();
                $content = strip_tags(strip_shortcodes($content));
                ?>
                <?php if (!empty($content)) : ?>
                    <div class="card-text-box">
                        <?php
                        echo (wp_strip_all_tags(html_entity_decode(wp_trim_words(htmlentities(wpautop($content)), 10, '...'))));
                        ?>
                    </div>
                <?php endif; ?>
                <div class="card-btn-box"><a href="<?php echo esc_url(get_permalink()); ?>" class="card-view"><?php echo esc_html__('View', 'real-estate-realista'); ?></a></div>
            </div>
        </div>
        <?php if (false) : ?>
            <a href="<?php echo esc_url(get_permalink()); ?>" class="complete_hover_link"></a>
        <?php endif; ?>
    </div>
</div>