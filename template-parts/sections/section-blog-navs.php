<?php
/**
 * Template part for displaying blog navigation section.
 *
 * @package Real_Estate_Realista
 */

?>

<section class="blog-breadcrumb">
    <div class="container">
        <div class="">
            <div class="d-flex align-items-center flex-wrap blog-b-wrapper">
                <div class="side flex-grow-1 bd-highlight">
                    <nav class="blog-categories-nav">
                        <a href="#" class="btn-link-nav"><?php echo esc_html__( 'Learning Center', 'real-estate-realista');?></a>
                        <span class="sep"></span>
                        <?php foreach (get_categories() as $key => $category):?>
                            <a href="<?php echo esc_url( get_category_link( $category->term_id ) );?>" class="btn-link-nav highlight"><?php echo esc_html( $category->name );?></a>
                        <?php endforeach;?>
                    </nav>
                </div>
                <div class="side bd-highlight">
                    <form method="get" class="blog-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <button type="submit"><i aria-hidden="true" class="fas fa-search"></i></button>
                        <input type="search"placeholder="<?php echo esc_attr_x( 'Search Learning Center', 'placeholder', 'real-estate-realista' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>