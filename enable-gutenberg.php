<?php

/**
 * Name: Enable Gutenberg for job listing in dashboard
 * Author: st3phan76 (https://github.com/st3phan76)
 * License: GPL 2 or later
 *
 * Removes template lock and enables Gutenberg editor for job listings.
 * requires plugin WP Job Manager.
 * Use the filter and place the code in your child-theme's functions.php file or your custom plugin file.
 */
 
 
add_filter( 'block_editor_settings_all', function( $settings, $editor_context ) {
    if ( isset( $editor_context->post ) && 'job_listing' === $editor_context->post->post_type ) {
        $settings['templateLock'] = false;
    }
    return $settings;
}, 10, 2 );