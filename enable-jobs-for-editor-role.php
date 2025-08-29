<?php

/**
 * Name: Enable jobs for editor role
 * Author: st3phan76 (https://github.com/st3phan76)
 * License: GPL 2 or later
 *
 * Set up job management for editor role
 * Place the code in your child-theme's functions.php file or your custom plugin file.
 */

function custom_grant_job_caps_to_editors() {
    $role = get_role('editor');
    if (!$role) return;

    $caps = [
        'edit_job_listings',
        'edit_others_job_listings',
        'publish_job_listings',
        'read_job_listing',
        'read_private_job_listings',
        'delete_job_listings',
        'delete_others_job_listings',
        'delete_published_job_listings',
        'delete_private_job_listings',
        'edit_published_job_listings',
    ];

    foreach ($caps as $cap) {
        $role->add_cap($cap);
    }
}
add_action('admin_init', 'custom_grant_job_caps_to_editors');