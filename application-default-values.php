<?php

/**
 * Name: Application default value
 * Author: st3phan76 (https://github.com/st3phan76)
 * License: GPL 2 or later
 *
 * Set up default value for application redirect (url)
 * requires plugin WP Job Manager.
 * Place the code in your child-theme's functions.php file or your custom plugin file.
 */
 
  function custom_modify_wpjm_fields( $fields ) {
    if ( isset( $fields['_application'] ) ) {
        
		// set path
        $fields['_application']['value'] = home_url( '/my_page/' );
		//$fields['_company_name']['value'] = 'JORADO Maschinenbau GmbH' );

        // optional: hide field in dashboard
        /* $fields['_application']['type'] = 'hidden'; */
    }
    
	return $fields;
}
add_filter( 'job_manager_job_listing_data_fields', 'custom_modify_wpjm_fields', 100 );