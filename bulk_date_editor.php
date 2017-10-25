<?php

/**
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 *
 * @wordpress-plugin
 * Plugin Name:       Bulk date editor
 * Plugin URI:        http://github.com/trueqap/bulk_date_editor
 * Description:       Do you want to edit the date by one click?
 * Version:           1.0.0
 * Author:            Trueqap
 * Author URI:        http://github.com/trueqap
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bulk_date_editor
 * Domain Path:       /languages
 */

function bulk_date_js() {
wp_enqueue_script('bulk_date_js', plugin_dir_url( __FILE__ ) . '/js/bulk_date.js', array('jquery'), false, true);
}

function bulk_edit_posts($action, $result){
    if ('bulk-posts' == $action && $_GET['mm']!='00' && isset($_GET['jj']) && isset($_GET['aa']) && isset($_GET['hh']) && isset($_GET['mn']) ) {
        $date = $_GET['aa'].'-'.$_GET['mm'].'-'.$_GET['jj'].' '.$_GET['hh'].':'.$_GET['mn'].':00';
        $post_date = date("Y-m-d H:i:s", strtotime($date));
        $post_date_gmt = gmdate("Y-m-d H:i:s",strtotime($date));
        $post_status = (strtotime($post_date) > strtotime(date("Y-m-d H:i:s")))? 'future' : 'publish';

        $post_IDs = array_map('intval', (array) $_GET['post']);
        foreach ($post_IDs as $post_ID) {
            $post_data = array( 'ID' => $post_ID, 'post_date' => $post_date, 'post_date_gmt' => $post_date_gmt, 'post_status' => $post_status, 'edit_date' => true );
            //wp_insert_post( $post_data );
            wp_update_post( $post_data );
        }

    }
}
add_action('check_admin_referer', 'bulk_edit_posts', 10, 2);
add_action('admin_init', 'bulk_date_js');
