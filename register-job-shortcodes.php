<?php

/**
 * Name: Register Job Shortcodes
 * Author: st3phan76 (https://github.com/st3phan76)
 * License: GPL 2 or later
 *
 * Get job-fields by job-id (GET) and register them in shortcodes like [wpjm-job-title], [wpjm-job-type], ...
 * requires plugin WP Job Manager.
 * Use the shortcodes anywhere you want.
 */

add_action('init', function () {

	// set up shortcodes
    $shortcodes = [
        'job_id'       => 'wpjm-job-id',
        'job_title'    => 'wpjm-job-title',
        'job_type'     => 'wpjm-job-type',
        'job_published'=> 'wpjm-job-published',
        'job_expires'  => 'wpjm-job-expires',
    ];

	// fetch entries by job-id
    foreach ($shortcodes as $key => $shortcode) {
        add_shortcode($shortcode, function () use ($key) {
            $job_id = isset($_GET['job_id']) ? absint($_GET['job_id']) : 0;
            if (!$job_id || get_post_type($job_id) !== 'job_listing') {
                return '';
            }

			// save job data in shortcodes
            switch ($key) {
                case 'job_id':
                    return $job_id;

                case 'job_title':
                    return get_the_title($job_id);

                case 'job_type':
                    $terms = wp_get_post_terms($job_id, 'job_listing_type');
                    return (!is_wp_error($terms) && !empty($terms)) ? esc_html($terms[0]->name) : '';

                case 'job_published':
                    return get_the_date('d.m.Y', $job_id);

                case 'job_expires':
                    $expiry_raw = get_post_meta($job_id, '_job_expires', true);
                    return $expiry_raw ? date_i18n('d.m.Y', strtotime($expiry_raw)) : 'no deadline';
            }
            return '';
        });
    }
});