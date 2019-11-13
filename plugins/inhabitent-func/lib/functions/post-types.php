<?php

/**
 * POST TYPES
 *
 * @link  http://codex.wordpress.org/Function_Reference/register_post_type
 */

// Add your custom post types here...
// Register Custom Post Type
// Register Custom Post Type
function post_products()
{

    $labels = array(
        'name'                  => 'Products',
        'singular_name'         => 'Product',
        'menu_name'             => 'Post Products',
        'name_admin_bar'        => 'Product',
        'archives'              => 'Item Archives',
        'attributes'            => 'Item Attributes',
        'parent_item_colon'     => 'Parent Product:',
        'all_items'             => 'All Products',
        'add_new_item'          => 'Add New Product',
        'add_new'               => 'New Product',
        'new_item'              => 'New Item',
        'edit_item'             => 'Edit Product',
        'update_item'           => 'Update Product',
        'view_item'             => 'View Product',
        'view_items'            => 'View Items',
        'search_items'          => 'Search products',
        'not_found'             => 'No products found',
        'not_found_in_trash'    => 'No products found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'insert_into_item'      => 'Insert into item',
        'uploaded_to_this_item' => 'Uploaded to this item',
        'items_list'            => 'Items list',
        'items_list_navigation' => 'Items list navigation',
        'filter_items_list'     => 'Filter items list',
    );
    $args = array(
        'label'                 => 'Product',
        'description'           => 'Product information pages.',
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'post-formats'),
        // 'taxonomies'            => array('category', 'products_type'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type('product', $args);
}
add_action('init', 'post_products', 0);
