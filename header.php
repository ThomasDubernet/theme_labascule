<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

    <head>

        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" >

        <link rel="profile" href="https://gmpg.org/xfn/11">

        <?php wp_head(); ?>

    </head>

    <body <?php body_class(); ?>>
        <div id="wrapper" class="hfeed">
            <header id="header">
                <?php $has_topbar_left = is_active_sidebar('topbar-left'); ?>
                <?php $has_topbar_right = is_active_sidebar('topbar-right'); ?>
                <?php if ($has_topbar_left || $has_topbar_right) { ?>
                    <div class="top-bar">
                        <?php if ($has_topbar_left) { ?>

                            <div class="float-left">
                                <?php dynamic_sidebar('topbar-left'); ?>
                            </div>
                            <?php
                        }
                        if ($has_topbar_right) {
                            ?>
                            <div class="float-right">
                                <?php dynamic_sidebar('topbar-right'); ?>
                            </div>

                        <?php } ?>
                    </div>
                <?php }
                ?>
                <div id="branding">
                    <div id="site-title">
                        <?php
                        if (is_front_page() || is_home() || is_front_page() && is_home()) {
                            echo '<h1>';
                        }
                        ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_html(get_bloginfo('name')); ?>" rel="home"><?php echo esc_html(get_bloginfo('name')); ?></a>
                        <?php
                        if (is_front_page() || is_home() || is_front_page() && is_home()) {
                            echo '</h1>';
                        }
                        ?>
                    </div>
                    <div id="site-description"><?php bloginfo('description'); ?></div>
                </div>
                <nav id="menu">
                    <?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
                </nav>
            </header>
            <div id="container">
