<?php

/**
 * Name: Disable Promotion
 * Author: st3phan76 (https://github.com/st3phan76)
 * License: GPL 2 or later
 *
 * Disables the promotion-feature for jobs.
 * requires plugin WP Job Manager.
 * Use the action and filters and place them in your child-theme's functions.php file or your custom plugin file.
 */
 
add_action( 'init', function() {
  if ( class_exists( 'WP_Job_Manager_Promoted_Jobs_Admin' ) ) {
    remove_filter( 'manage_edit-job_listing_columns', [
      WP_Job_Manager_Promoted_Jobs_Admin::instance(),
      'promoted_jobs_columns',
    ] );
  }
} );