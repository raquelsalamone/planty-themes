<?php
/**
 * The Header for our theme.
 *
 * @package OceanWP WordPress theme
 */
?>

<!DOCTYPE html>
<html class="<?php echo esc_attr(oceanwp_html_classes()); ?>" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php oceanwp_schema_markup('html'); ?>>
    <?php wp_body_open(); ?>
    <?php do_action('ocean_before_outer_wrap'); ?>
    <div id="outer-wrap" class="site clr">
        <a class="skip-link screen-reader-text" href="#main"><?php echo esc_html(oceanwp_theme_strings('owp-string-header-skip-link', false)); ?></a>

        <!-- Code du header -->
        <header id="header-class" class="site-header">
            <div class="site-branding">
                <div class="logo">
                    <?php the_custom_logo(); ?>
                </div>

                <nav id="site-navigation" class="main-navigation">
                    <?php
                    // Affiche le menu principal
                    wp_nav_menu(array(
                        'theme_location' => 'menu-principal', // Utilise le nom enregistré dans functions.php
                        'menu_id'        => 'primary-menu',
                    ));
                    ?>

                    <ul class="nav-links">
                        <li><a href="<?php echo esc_url(home_url('/index.php/nous-rencontrer/')); ?>">Nous rencontrer</a></li>

                        <?php
                        // Vérifie si l'utilisateur est connecté
                        if (is_user_logged_in()) {
                            // Ajoute le lien vers une page spécifique pour les utilisateurs connectés
                            echo '<li><a href="' . esc_url(home_url()) . '">Admin</a></li>';
                        }
                        ?>
                        <!-- button commander -->
                        <li>
                            <button class="commander">
                                <a href="<?php echo esc_url(home_url('/planty/commander/')); ?>">Commander</a>
                            </button>
                        </li>
                    </ul>
                </nav>
                <?php
                /*
                // Vérifie si l'utilisateur est connecté
                if ( is_user_logged_in() ) {
                    // Ajoute le lien vers une page spécifique pour les utilisateurs connectés
                    echo '<li><a href="' . esc_url(home_url('http://localhost/planty/wp-admin/')) . '">Admin</a></li>';
                } else {
                    // Message de débogage - s'affiche si l'utilisateur n'est pas connecté
                    echo '<li>User not logged in</li>';
                }
                */
                ?>

                <!-- Ajoutez d'autres éléments du header ici si nécessaire -->

            </div><!-- Fermer la div de site-branding -->
        </header>
    </div><!-- Fermer la div de outer-wrap -->
</body>
</html>
