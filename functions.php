<?php

add_action( 'wp_enqueue_scripts', 'nonprofiter_enqueue_styles' );
function nonprofiter_enqueue_styles() {
    $parenthandle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version')
); // this only works if you have Version in the style header
}


remove_role( 'subscriber' );
remove_role( 'editor' );
remove_role( 'contributor' );
remove_role( 'author' );


add_role('staff_leader', __(
    'Staff Leader'),
    array(
        'read'            => true, // Allows a user to read
        'create_posts'      => true, // Allows user to create new posts
        'edit_posts'        => true, // Allows user to edit their own posts
        'edit_others_posts' => true, // Allows user to edit others posts too
        'publish_posts' => true, // Allows the user to publish posts
        'manage_categories' => true, // Allows user to manage post categories
        )
 );
 add_role('volunteer_leader', __(
    'Volunteer Leader'),
    array(
        'read'            => true, // Allows a user to read
        'create_posts'      => true, // Allows user to create new posts
        'edit_posts'        => true, // Allows user to edit their own posts
        'edit_others_posts' => true, // Allows user to edit others posts too
        'publish_posts' => true, // Allows the user to publish posts
        'manage_categories' => true, // Allows user to manage post categories
        )
 );

add_role('board_member', __(
    'Board Member'),
    array(
        'read'            => true, // Allows a user to read
        )
 );

 add_role('volunteer', __(
    'Volunteer'),
    array(
        'read'            => true, // Allows a user to read
        )
 );

