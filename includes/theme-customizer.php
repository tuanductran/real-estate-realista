<?php

add_action('customize_register', function ($wp_customize) {
    /********************
     Define generic controls
     *********************/

    $wp_customize->add_setting('show_blog_in_grid', array(
        'sanitize_callback' => 'real_estate_realista_sanitize_checkbox',
        'default' => false // set default value to false
    ));

    $wp_customize->add_control('show_blog_in_grid', array(
        'type' => 'checkbox',
        'section' => 'nexproperty_sectionblog_page',
        'label' => esc_html__('Show Posts in Grid', 'real-estate-realista'),
    ));
});

function real_estate_realista_sanitize_checkbox($checked) {
    return (isset($checked) && $checked === true) ? true : false;
}