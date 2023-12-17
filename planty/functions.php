<?php
// charge les feuilles de stylles du thème parent et enfant
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    // Chargement du style.css du thème parent
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

    // Chargement du theme-enfant personnalisé
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/assets/css/theme.css', array(), false, 'all');
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/assets/css/theme.css', array('parent-style'), '1.0', 'all');
}

// Ajouter un lien au menu principal
function add_custom_link_to_menu($items, $args)
{
    // Vérifie si l'utilisateur est connecté et si le menu est le menu-principal
    if (is_user_logged_in() && $args->theme_location == 'menu-principal') {
        // Ajoute un lien personnalisé, vers la page d'administration
       /* $admin_link = '<li class="menu-item"><a href="' . esc_url(home_url('/planty/wp-admin/')) . '">Admin</a></li>';
        $items .= $admin_link;*/
    }

    return $items;
}
add_filter('wp_nav_menu_items', 'add_custom_link_to_menu', 10, 2);
