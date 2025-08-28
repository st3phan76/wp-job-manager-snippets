<?php

/**
 * Name: Remove admin fields
 * Author: st3phan76 (https://github.com/st3phan76)
 * License: GPL 2 or later
 *
 * Removes admin fields from jobs
 * requires plugin WP Job Manager.
 * Use the filters and place them in your child-theme's functions.php file or your custom plugin file.
 */
 
 function remove_job_manager_admin_fields( $fields ) {
	
	// exclude as needed
	unset( $fields['_job_location'] );
	unset( $fields['_company_name'] );
	unset( $fields['_company_website'] );
	unset( $fields['_company_tagline'] );
	unset( $fields['_company_twitter'] );
	unset( $fields['_company_video'] );
	unset( $fields['_featured'] );
    return $fields;
}
add_filter( 'job_manager_job_listing_data_fields', 'remove_job_manager_admin_fields' );