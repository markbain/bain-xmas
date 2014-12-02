<?php
/**
 * Helper functions for use in other areas of the theme
 *
 * @package _mbbasetheme
 */

/**
 * Add capabilities for a custom post type
 *
 * @return void
 */
function mb_add_capabilities( $posttype ) {
	// gets the author role
	$role = get_role( 'administrator' );

	// adds all capabilities for a given post type to the administrator role
	$role->add_cap( 'edit_' . $posttype . 's' );
	$role->add_cap( 'edit_others_' . $posttype . 's' );
	$role->add_cap( 'publish_' . $posttype . 's' );
	$role->add_cap( 'read_private_' . $posttype . 's' );
	$role->add_cap( 'delete_' . $posttype . 's' );
	$role->add_cap( 'delete_private_' . $posttype . 's' );
	$role->add_cap( 'delete_published_' . $posttype . 's' );
	$role->add_cap( 'delete_others_' . $posttype . 's' );
	$role->add_cap( 'edit_private_' . $posttype . 's' );
	$role->add_cap( 'edit_published_' . $posttype . 's' );
}

add_filter( 'nav_menu_css_class', 'je_portfolio_menu_item_classes', 10, 2 );
/**
 * Add css classes to Portfolio CPT menu item, remove from Blog item
 *
 * Enables menu classes for CPTs.
 * Pretty fragile, as it depends on the item titles for each menu item, change as required
 * 
 * @param array  $classes CSS classes for the menu item
 * @param object $item    WP_Post object for current menu item
 * 
 * @link         http://www.josheaton.org/
 * @author       Josh Eaton <josh@josheaton.org>
 * @copyright    Copyright (c) 2013, Josh Eaton
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */
function je_portfolio_menu_item_classes( $classes, $item )
{
  switch ( get_query_var('post_type') ) {
    // Only run on portfolio post type
    case 'portfolio_item':
      // Remove current_page_parent from Blog menu item
      if( $item->title == 'Blog' ) {
        $classes = array_diff( $classes, array( 'current_page_parent' ) );
      }
      // Add current_page_parent class to the portfolio menu item
      if ( $item->title == 'Books' ) {
        $classes[] = 'current_page_parent';
      }
    break;
  }
 
  return $classes;
}
