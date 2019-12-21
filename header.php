<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head();?>
</head>
<body>
    
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto">La Bascule</h5>
    
            <?php
                $args = array(
                    'theme_location' => 'primaire',
                    // classe bootstrap à rentrer ci-dessous
                    'menu_class' => 'navbar nav',
                    'link_after' => '**',
                    'walker' => new wp_bootstrap_navwalker()
                );

                wp_nav_menu( $args ); ?>
</div>