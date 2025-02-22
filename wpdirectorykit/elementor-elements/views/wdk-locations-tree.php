<?php
/**
 * The template for Element Categories List.
 * This is the template that elementor element list, locations results
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
} 

?>
<?php
$results_page = wmvc_show_data('conf_link', $settings);
if(!is_array($results_page) && !empty($results_page)) {
    //$results_page = get_permalink($results_page);
} else {
    $results_page = wdk_get_option('wdk_results_page');
}

//get translation page
if(function_exists('PLL'))
{
    $results_page = pll_get_post($results_page);
}

$results_page = get_permalink($results_page);

$parent_id = null;
$hide_childs = false;
?>

<div class="wdk-element" id="wdk_el_<?php echo esc_html($id_element);?>">
    <div class="wdk-locations-tree wdk-locations-tree-custom" id="wdk-locations-tree">

        <div class="filters">
        <form action="<?php esc_url(wdk_server_current_url());?>#wdk-locations-tree">
            <div class="wdk-row">
                <?php
                    $field_id = 5;
                    $field_values = wdk_field_option ($field_id, 'values_list');
                    $values = array();
                    if(!empty($field_values)){
                        $values = explode(',', $field_values);
                    }

                    $field_value = false;
                    if(isset($_GET['el_location_field_purpose'])) {
                        $field_value = sanitize_text_field($_GET['el_location_field_purpose']);
                        $results_page = wdk_url_suffix($results_page,'field_5='.$field_value);
                    }
                ?>
                <?php if(!empty( $values )):?>
                    <?php foreach ($values as $key => $value):?>
                    <?php if(empty($value)) continue;?>
                    <input type="radio" name="el_location_field_purpose" id="<?php echo esc_html($id_element);?>_wdk_tab_field_<?php echo esc_attr($key);?>" value="<?php echo esc_attr($value);?>" <?php if($field_value == $value):?>checked="checked"<?php endif;?>>
                    <label for="<?php echo esc_html($id_element);?>_wdk_tab_field_<?php echo esc_attr($key);?>"><?php echo esc_html($value);?> 
                        <?php if(wmvc_show_data('tabs_count', $settings) == 'yes'):?>
                            <span class="tab_count"><?php echo esc_html(wmvc_show_data($value, $this->data['counts'][$field_id], 0));?></span>
                        <?php endif;?>
                    </label>
                    <?php endforeach;?>
                <?php endif;?>
            </div>
            <div class="wdk-row">
                <?php
                    global $Winter_MVC_WDK;
                    $Winter_MVC_WDK->model('category_m');
                    $Winter_MVC_WDK->model('listing_m');
                    $categories = $Winter_MVC_WDK->category_m->get_by(array('(level = 0)'=> NULL ));
                    $field_value = false;
                    if(isset($_GET['el_location_field_category'])) {
                        $field_value = sanitize_text_field($_GET['el_location_field_category']);
                        $results_page = wdk_url_suffix($results_page,'search_category='.$field_value);
                    }
                ?>
                <?php if(!empty( $categories )):?>
                    <?php foreach ($categories as $key => $category):?>
                    <input type="radio" name="el_location_field_category" id="<?php echo esc_html($id_element);?>_field_category_<?php echo esc_attr(wmvc_show_data('idcategory',$category));?>" value="<?php echo esc_attr(wmvc_show_data('idcategory',$category));?>" <?php if($field_value == wmvc_show_data('idcategory',$category)):?>checked="checked"<?php endif;?>>
                    <label for="<?php echo esc_attr($id_element);?>_field_category_<?php echo esc_attr(wmvc_show_data('idcategory',$category));?>"><?php echo esc_html(wmvc_show_data('category_title',$category));?>
                    </label>
                    <?php endforeach;?>
                <?php endif;?>
            </div>
                <input type="submit" class="wdk-hidden">
            </form>
        </div>

        <script>
            jQuery(document).ready(function($){
                $('.wdk-locations-tree-custom .filters input').on('input', function(){

                    $(this).closest('form').trigger('submit')
                })

                jQuery('.wdk-locations-tree-custom .filters label').on('click', function () {
                    if (jQuery('.wdk-locations-tree-custom .filters input[id="'+jQuery(this).attr('for')+'"]').prop('checked')) {
                        jQuery('.wdk-locations-tree-custom .filters input[id="'+jQuery(this).attr('for')+'"]').prop('checked', false);
                        $(this).closest('form').trigger('submit')
                        return false;
                    }
                });
            })
        </script>

            <?php

//dump($locations);
$listings_count = true;
if(isset($_GET['el_location_field_purpose']) || isset($_GET['el_location_field_purpose'])  ) {

    global $Winter_MVC_WDK;
    $Winter_MVC_WDK->model('location_m');
    $Winter_MVC_WDK->model('category_m');
    $Winter_MVC_WDK->model('listing_m');
    
     if(isset($_GET['el_location_field_purpose'])) {
         $custom_parameters['field_5'] = sanitize_text_field($_GET['el_location_field_purpose']);
     }
     if(isset($_GET['el_location_field_category'])) {
         $custom_parameters['category_id'] = sanitize_text_field($_GET['el_location_field_category']);
     }

    // dump($Winter_MVC_WDK->db->prefix.'wdk_listings_fields ON '.$Winter_MVC_WDK->listing_m->_table_name.'.post_id = '.$Winter_MVC_WDK->db->prefix.'wdk_listings_fields.post_id');
    /*
     $Winter_MVC_WDK->db->select($Winter_MVC_WDK->location_m->_table_name.'.idlocation, '.$Winter_MVC_WDK->location_m->_table_name.'.location_title, COUNT(DISTINCT '.$Winter_MVC_WDK->listing_m->_table_name.'.post_id) AS listings_counter, MAX('.$Winter_MVC_WDK->location_m->_table_name.'.level) as level');

     $Winter_MVC_WDK->db->join($Winter_MVC_WDK->location_m->_table_name.' AS location_table ON (CONCAT(",", location_table.parent_path, ",") LIKE CONCAT("%,", '.$Winter_MVC_WDK->location_m->_table_name.'.idlocation ,",%"))', TRUE, 'LEFT');
     $Winter_MVC_WDK->db->join($Winter_MVC_WDK->listing_m->_table_name.' ON (
         ('.$Winter_MVC_WDK->listing_m->_table_name.'.is_activated = 1 AND '.$Winter_MVC_WDK->listing_m->_table_name.'.is_approved = 1) AND
         ('.$Winter_MVC_WDK->listing_m->_table_name.'.location_id = '.$Winter_MVC_WDK->location_m->_table_name.'.idlocation
         OR '.$Winter_MVC_WDK->listing_m->_table_name.'.location_id = location_table.idlocation)

     )', TRUE, 'LEFT');
 
     //$Winter_MVC_WDK->db->join($Winter_MVC_WDK->db->prefix.'wdk_listings_fields ON '.$Winter_MVC_WDK->listing_m->_table_name.'.post_id = '.$Winter_MVC_WDK->db->prefix.'wdk_listings_fields.post_id');
     $Winter_MVC_WDK->db->from($Winter_MVC_WDK->location_m->_table_name);

     //$Winter_MVC_WDK->db->where($where);
     $Winter_MVC_WDK->db->limit(NULL);
     $Winter_MVC_WDK->db->offset(NULL);
     $Winter_MVC_WDK->db->group_by('idlocation');

     $Winter_MVC_WDK->db->order_by('wp_wdk_locations.order_index, wp_wdk_locations.idlocation');

     $query = $Winter_MVC_WDK->db->get();

    if ($Winter_MVC_WDK->db->num_rows() > 0) {
        $locations = $Winter_MVC_WDK->db->results();
    } else {
        $locations = array();
    }
    */


    $Winter_MVC_WDK->db->select('COUNT(DISTINCT '.$Winter_MVC_WDK->db->prefix.'wdk_listings.post_id) as total_count, location_id');
    $Winter_MVC_WDK->db->join($Winter_MVC_WDK->db->prefix.'wdk_listings_fields ON '.$Winter_MVC_WDK->listing_m->_table_name.'.post_id = '.$Winter_MVC_WDK->db->prefix.'wdk_listings_fields.post_id');

    $Winter_MVC_WDK->db->from($Winter_MVC_WDK->listing_m->_table_name);
    $where = [];

    if(isset($_GET['el_location_field_purpose'])) {
        $where['field_5_DROPDOWN'] = sanitize_text_field($_GET['el_location_field_purpose']);
    }
    if(isset($_GET['el_location_field_category'])) {
        $where['category_id'] = sanitize_text_field($_GET['el_location_field_category']);
    }

    $Winter_MVC_WDK->db->where($where);

    $Winter_MVC_WDK->db->group_by('location_id');

    $query = $Winter_MVC_WDK->db->get();

    if ($Winter_MVC_WDK->db->num_rows() > 0) {
        $_listings_count = $Winter_MVC_WDK->db->results();
    } else {
        $_listings_count = array();
    }
    $listings_count = array();
    if(!empty($_listings_count)) {
        foreach ($_listings_count as $key => $item) {
            if($item->location_id)
                $listings_count[$item->location_id] = $item->total_count;
        }
    }
 }
?>

        <div class="wdk-row">
            <?php if(!empty($locations) && !empty($listings_count)):?>
                <div class="wdk-col">
                    <div class="location-block">
                        <?php 
                        $count_key = 0;
                        
                        foreach ($locations as $key => $value):?>
                            <?php
                                if(isset($_GET['el_location_field_purpose']) || isset($_GET['el_location_field_purpose'])  ) {

                                    $value->listings_counter = 0;
                                    if(isset($listings_count[wmvc_show_data('idlocation', $value, false)]))
                                        $value->listings_counter = $listings_count[wmvc_show_data('idlocation', $value, false)];
                                    /*
                                    $columns = array('ID', 'location_id', 'category_id', 'post_title', 'post_date', 'search', 'order_by','is_featured', 'address');
                                    $external_columns = array('location_id', 'category_id', 'post_title');
                                    
                                        $custom_parameters = array();
                                        $custom_parameters['search_location'] = wmvc_show_data('idlocation', $value, false);
                                        if(isset($_GET['el_location_field_purpose'])) {
                                            $custom_parameters['field_5'] = sanitize_text_field($_GET['el_location_field_purpose']);
                                        }
                                        if(isset($_GET['el_location_field_category'])) {
                                            $custom_parameters['search_category'] = sanitize_text_field($_GET['el_location_field_category']);
                                        }
    
                                        wdk_prepare_search_query_GET($columns, 'location_m', $external_columns, $custom_parameters, TRUE);
                                        $value->listings_counter = $Winter_MVC_WDK->listing_m->total(array('is_activated' => 1,'is_approved'=>1));*/
                                }
                               


                                $columns = array('ID', 'location_id', 'category_id', 'post_title', 'post_date', 'search', 'order_by','is_featured', 'address');
                                $external_columns = array('location_id', 'category_id', 'post_title');
                                
                                    $custom_parameters = array();
                                    $custom_parameters['search_location'] = wmvc_show_data('idlocation', $value, false);
                                    if(isset($_GET['el_location_field_purpose'])) {
                                        $custom_parameters['field_5'] = sanitize_text_field($_GET['el_location_field_purpose']);
                                    }
                                    if(isset($_GET['el_location_field_category'])) {
                                        $custom_parameters['search_category'] = sanitize_text_field($_GET['el_location_field_category']);
                                    }

                                    //wdk_prepare_search_query_GET($columns, 'location_m', $external_columns, $custom_parameters, TRUE);
                                    //$value->listings_counter = $Winter_MVC_WDK->listing_m->total(array('is_activated' => 1,'is_approved'=>1));

                            ?> 
                            <?php 
                                if(wmvc_show_data('disable_empty_listings', $settings) == 'yes') {
                                    if(empty($value->listings_counter)) {
                                        $parent_id = wmvc_show_data('idlocation', $value);
                                        $hide_childs = true;
                                        continue;
                                    }
                                }
                            ?>
                            <?php if(wmvc_show_data('parent_id', $value) == 0):?>
                            <?php
                                $hide_childs = false;
                            ?>
                            <?php if($count_key != 0):?>
                                    </ul>
                                </div>
                            </div>
                            <div class="wdk-col">
                                <div class="location-block">
                            <?php endif;?>
                                    <h3 class="title <?php if(wmvc_show_data('show_icon', $settings) == 'yes' && wmvc_show_data('layout_image_type', $settings) == 'image'):?> image_top <?php endif;?>">
                                        <span class="wdk-count"><?php echo wmvc_show_data('listings_counter', $value, 0);?></span> 
                                      
                                        <?php if(false && wmvc_show_data('show_icon', $settings) == 'yes'):?>
                                            <?php if(wmvc_show_data('layout_image_type', $settings) == 'icon'):?>
                                                <a href="<?php echo esc_url(wdk_url_suffix($results_page,'search_location='.wmvc_show_data('idlocation', $value)));?>#results">
                                                    <img src="<?php echo esc_url(wdk_image_src($value, 'full',NULL,'icon_id', 'icon_path'));?>" alt="<?php echo wmvc_show_data('location_title', $value);?>" class="wdk-icon">
                                                </a>
                                            <?php elseif(wmvc_show_data('layout_image_type', $settings) == 'image'):?>
                                                <a class="wdk-d-block" href="<?php echo esc_url(wdk_url_suffix($results_page,'search_location='.wmvc_show_data('idlocation', $value)));?>#results">
                                                    <img src="<?php echo esc_url(wdk_image_src($value, 'full',NULL,'image_id','image_path'));?>" alt="<?php echo wmvc_show_data('location_title', $value);?>" class="wdk-image">
                                                </a>
                                            <?php elseif(wmvc_show_data('layout_image_type', $settings) == 'font_icon'):?>
                                                <span class="wdk-font-icon" style="background-color: <?php echo esc_attr(wmvc_show_data('location_color', $value));?>;"><i class="<?php echo esc_attr(wmvc_show_data('font_icon_code', $value));?>"></i></span>
                                            <?php endif;?>
                                        <?php endif;?>
                                        <a href="<?php echo esc_url(wdk_url_suffix($results_page,'search_location='.wmvc_show_data('idlocation', $value)));?>#results">
                                            <?php echo wmvc_show_data('location_title', $value);?>
                                        </a>
                                    </h3>
                                    <ul class="wdk-locations">
                            <?php else:?>
                                <?php if($hide_childs && $parent_id == wmvc_show_data('parent_id', $value)) continue;?>
                                <li class="wdk-item"> 
                                    <a href="<?php echo esc_url(wdk_url_suffix($results_page, 'search_location='.wmvc_show_data('idlocation', $value)));?>#results"  class="wdk-link">
                                        <span class="wdk-title"><?php echo wmvc_show_data('location_title', $value);?></span>
                                        <span class="wdk-count"><?php echo wmvc_show_data('listings_counter', $value, 0);?></span>
                                        <span><img style="position: relative;top: -4px;margin-right: 5px;" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icon-arrow.png" alt=""></span>
                                    </a>
                                </li>
                            <?php endif;?>
                        <?php 
                            $count_key++;
                            endforeach;?>
                        </ul>
                    </div>
                </div>
            <?php else:?>
                <div class="wdk-col wdk-col-full wdk-col-full-always">
                    <p class="wdk_alert wdk_alert-danger"><?php echo esc_html__('Locations not found', 'real-estate-realista');?></p>
                </div>
            <?php endif;?>
        </div>
    </div>
</div>