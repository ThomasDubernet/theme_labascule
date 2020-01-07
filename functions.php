<?php
define('LABASC_VERSION', '1.0.5');
require_once('wp_bootstrap_navwalker.php');

// chargement côté front-end
function labasc_scripts() {
    // chargement des styles
    wp_enqueue_style( 'labasc_bootstrap-core', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), LABASC_VERSION , 'all' );
    wp_enqueue_style( 'labasc_custom', get_template_directory_uri() . '/style.css', array('labasc_bootstrap-core'), LABASC_VERSION , 'all' );
    
    // chargement des scripts
    wp_enqueue_script( 'labasc_bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), LABASC_VERSION , true );
    wp_enqueue_script( 'labasc_index_script', get_template_directory_uri() . '/js/index.js', array('jquery', 'labasc_bootstrap-js'), LABASC_VERSION , true );
}
add_action('wp_enqueue_scripts', 'labasc_scripts');


// Fonction pour activer bootstrap sur la partie admin
// function labasc_admin_scripts() {
//     wp_enqueue_style( 'labasc_bootstrap-admin-core', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), LABASC_VERSION  );
// }
// add_action('admin_init', 'labasc_admin_scripts');


// Utilitaires
// function labasc_setup() {

//     // support des vignettes (image à la une dans articles wp)
//     add_theme_support( 'post-thumbnails' );

//     // enlève le générateur de version
//     remove_action('wp_head', 'wp_generator');

//     // enlève les guillemets à la française
//     // remove_filter('the_content', 'wptexturize');

//     // support du titre
//     add_theme_support('title-tag');
// }

// add_action('after_setup_theme', 'labasc_setup');

register_nav_menus(
    array(
        'primaire' => __('menu primaire', 'test')
    )
);


// Fonction qui rassemble les widgets

function labascule_sidebar_registration() {

    // Arguments used in all register_sidebar() calls.
    $shared_args = array(
        'before_title' => '<h2 class="widget-title subheading heading-size-3">',
        'after_title' => '</h2>',
        'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
        'after_widget' => '</div></div>',
    );

    // Footer #1.
    register_sidebar(
            array_merge(
                    $shared_args,
                    array(
                        'name' => __('Pied de page #1', 'twentytwenty'),
                        'id' => 'footer-1',
                        'description' => __('Widgets in this area will be displayed in the first column in the footer.', 'twentytwenty'),
                    )
            )
    );

    // Footer #2.
    register_sidebar(
            array_merge(
                    $shared_args,
                    array(
                        'name' => __('Pied de page #2', 'twentytwenty'),
                        'id' => 'footer-2',
                        'description' => __('Widgets in this area will be displayed in the second column in the footer.', 'twentytwenty'),
                    )
            )
    );
    // Footer #3.
    register_sidebar(
            array_merge(
                    $shared_args,
                    array(
                        'name' => __('Pied de page #3', 'twentytwenty'),
                        'id' => 'footer-3',
                        'description' => __('Widgets in this area will be displayed in the second column in the footer.', 'twentytwenty'),
                    )
            )
    );
    // Footer #4.
    register_sidebar(
            array_merge(
                    $shared_args,
                    array(
                        'name' => __('Pied de page #4', 'twentytwenty'),
                        'id' => 'footer-4',
                        'description' => __('Widgets in this area will be displayed in the second column in the footer.', 'twentytwenty'),
                    )
            )
    );
    // Top bar right.
    register_sidebar(
            array_merge(
                    $shared_args,
                    array(
                        'name' => __('Top bar right'),
                        'id' => 'topbar-right',
                        'description' => __('Le contenu sera placé à droite dans la Top Bar'),
                    )
            )
    );
    // topbar left.
    register_sidebar(
            array_merge(
                    $shared_args,
                    array(
                        'name' => __('Top bar left'),
                        'id' => 'topbar-left',
                        'description' => __('Le contenu sera placé à gauche dans la Top Bar'),
                    )
            )
    );
    // header droite du logo
    register_sidebar(
            array_merge(
                    $shared_args,
                    array(
                        'name' => 'header: à droite du logo',
                        'id' => 'action-widget',
                        'before_widget' => '<div class="lba-widget">',
                        'after_widget' => '</div>',
                        'before_title' => '<h2 class="lba-title">',
                        'after_title' => '</h2>',
                    )
            )
    );
    // header droite du logo
    register_sidebar(
            array_merge(
                    $shared_args,
                    array(
                        'name' => 'header: à droite du menu',
                        'id' => 'don-widget',
                        'before_widget' => '<div class="lbb-widget">',
                        'after_widget' => '</div>',
                        'before_title' => '<h2 class="lbb-title">',
                        'after_title' => '</h2>',
                    )
            )
    );
}

add_action('widgets_init', 'labascule_sidebar_registration');

function labascule_register_widget() {
    register_widget('add_btn_widget');
}

add_action('widgets_init', 'labascule_register_widget');

class add_btn_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
// widget ID
                'add_btn_widget',
// widget name
                __('Bouton theme la bascule', ' labascule'),
// widget description
                array('description' => __('** encours de dev ***', 'labascule_widget'),)
        );
    }

    public function widget($args, $instance) {
        $target = isset($instance['target']) ? $instance['target'] : '';
        $url = isset($instance['url']) ? $instance['url'] : '';
        $text = isset($instance['text']) ? $instance['text'] : '';
        $icon = isset($instance['icon']) ? $instance['icon'] : '';
        $color = isset($instance['color']) ? $instance['color'] : '';
        $margin = '0';

        if ($text) {
            $margin = '7';
        }

        echo $args['before_widget'];
//sortie
        echo '<div class="v-actions">
        <a href="' . esc_url($url) . '" target="_' . esc_attr($target) . '" class="v-button" style="background-color: ' . esc_attr($color) . '; padding: 5px 11px; border-radius: 20px; border: solid 2px #fff; color: white; box-shadow: 0px 3px 6px #00000029;"><i aria-hidden="true" class="fa ' . esc_attr($icon) . '" style="color: #fff;"></i><span style="margin-left: ' . esc_attr($margin) . 'px";>' . esc_attr($text) . '</span></a></div>';
        echo $args['after_widget'];
    }

    public function form($instance) {

        // Parse arguments
        extract(wp_parse_args((array) $instance, array(
            'target' => esc_html__('Blank', 'labascule_widget'),
            'url' => '',
            'text' => '',
            'icon' => '',
            'color' => '',
        )));

        $target = strip_tags($instance['target']);
        $url = strip_tags($instance['url']);
        $text = strip_tags($instance['text']);
        $icon = strip_tags($instance['icon']);
        $color = strip_tags($instance['color']);
        ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('target')); ?>"><?php esc_html_e('Link Target:', 'labascule_widget'); ?></label>
            <select class='widefat' name="<?php echo esc_attr($this->get_field_name('target')); ?>" id="<?php echo esc_attr($this->get_field_id('target')); ?>">
                <option value="blank" <?php selected($target, 'blank') ?>><?php esc_html_e('Blank', 'labascule_widget'); ?></option>
                <option value="self" <?php selected($target, 'self') ?>><?php esc_html_e('Self', 'labascule_widget'); ?></option>
            </select>
        </p>

        <div class="custom_links_wrap">
            <div class="custom_links" style="padding-bottom:30px">
                <p>
                    <label for="<?php echo esc_attr($this->get_field_id('text')); ?>">
                        Texte du lien
                    </label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('text')); ?>" name="<?php echo esc_attr($this->get_field_name('text')); ?>" type="text" value="<?php echo esc_attr($text); ?>" />
                </p>
                <p>
                    <label for="<?php echo esc_attr($this->get_field_id('url')); ?>">
                        Url
                    </label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('url')); ?>" name="<?php echo esc_attr($this->get_field_name('url')); ?>" type="text" value="<?php echo esc_attr($url); ?>" />
                </p>
                <p>
                    <label for="<?php echo esc_attr($this->get_field_id('icon')); ?>">
                        Icon
                    </label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('icon')); ?>" name="<?php echo esc_attr($this->get_field_name('icon')); ?>" type="text" value="<?php echo esc_attr($icon); ?>" />
                </p>
                <p>
                    <label for="<?php echo esc_attr($this->get_field_id('color')); ?>">
                        Code couleur
                    </label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('color')); ?>" name="<?php echo esc_attr($this->get_field_name('color')); ?>" type="text" value="<?php echo esc_attr($color); ?>" />
                </p>

            </div>
        </div>.
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['text'] = (!empty($new_instance['text']) ) ? strip_tags($new_instance['text']) : '';
        $instance['url'] = (!empty($new_instance['url']) ) ? strip_tags($new_instance['url']) : '';
        $instance['target'] = (!empty($new_instance['target']) ) ? strip_tags($new_instance['target']) : '';
        $instance['icon'] = (!empty($new_instance['icon']) ) ? strip_tags($new_instance['icon']) : '';
        $instance['color'] = (!empty($new_instance['color']) ) ? strip_tags($new_instance['color']) : '';
        return $instance;
    }

}

//widget icones sociales

class Labascule_Social_Widget extends WP_Widget {

    public function __construct() {

        parent::__construct(
                // widget ID
                'labascule_social',
                // widget name
                __('Icones sociales la bascule', ' labascule'),
                // widget description
                array('description' => __('** encours de dev ***', 'labascule'),)
        );
    }

    public function widget($args, $instance) {

        // Define vars
        $url_twitter = isset($instance['url_twitter']) ? $instance['url_twitter'] : '';
        $url_facebook = isset($instance['url_facebook']) ? $instance['url_facebook'] : '';
        $url_instagram = isset($instance['url_instagram']) ? $instance['url_instagram'] : '';
        $email = isset($instance['email']) ? $instance['email'] : '';
        $margin = isset($instance['margin']) ? $instance['margin'] : '18px';
        $target = isset($instance['target']) ? $instance['target'] : '';
        $size = isset($instance['size']) ? $instance['size'] : '20px';

        // Inline style
        $add_style = '';
        $add_style .= 'margin:' . esc_attr($margin) . ';width:' . esc_attr($size) . ';';



        if ($url_facebook || $url_instagram || $url_twitter || $email) {
            
        // Before widget hook
        echo $args['before_widget'];

            // Display url
            if ($url_twitter) {
                echo '<div class="twitter-icon front-icon" style="width: '.$size.'; height: '.$size.'; margin-right: '.$margin.';">';
                echo '<a href="' . $url_twitter . '" target="_' . esc_attr($target) . '">';
                echo '<span class="icon" style="width: '.$size.'; height: '.$size.';"></span></a>';
                echo '</div>';
            }

            if ($url_facebook) {
                echo '<div class="facebook-icon front-icon" style="width: '.$size.'; height: '.$size.'; margin-right: '.$margin.';">';
                echo '<a href="' . $url_facebook . '" target="_' . esc_attr($target) . '">';
                echo '<span class="icon" style="width: '.$size.'; height: '.$size.';"></span></a>';
                echo '</div>';
            }

            if ($url_instagram) {
                echo '<div class="instagram-icon front-icon" style="width: '.$size.'; height: '.$size.'; margin-right: '.$margin.';">';
                echo '<a href="' . $url_instagram . '" target="_' . esc_attr($target) . '">';
                echo '<span class="icon" style="width: '.$size.'; height: '.$size.';"></span></a>';
                echo '</div>';
            }

            if ($email) {
                echo '<div class="email-icon front-icon" style="width: '.$size.'; height: '.$size.'; margin-right: '.$margin.';">';
                echo '<a href="' . $email . '" target="_' . esc_attr($target) . '">';
                echo '<span class="icon" style="width: '.$size.'; height: '.$size.';"></span></a>';
                echo '</div>';
            }
            ?>  </ul>

            <?php
            // After widget
            echo $args['after_widget'];
        }
    }

    public function update($new_instance, $old_instance) {
        // Sanitize data
        $instance = $old_instance;
        $instance['url_twitter'] = !empty($new_instance['url_twitter']) ? strip_tags($new_instance['url_twitter']) : null;
        $instance['url_facebook'] = !empty($new_instance['url_facebook']) ? strip_tags($new_instance['url_facebook']) : null;
        $instance['url_instagram'] = !empty($new_instance['url_instagram']) ? strip_tags($new_instance['url_instagram']) : null;
        $instance['email'] = !empty($new_instance['email']) ? strip_tags($new_instance['email']) : null;
        $instance['margin'] = !empty($new_instance['margin']) ? strip_tags($new_instance['margin']) : '18px';
        $instance['target'] = !empty($new_instance['target']) ? strip_tags($new_instance['target']) : 'blank';
        $instance['size'] = !empty($new_instance['size']) ? strip_tags($new_instance['size']) : '20px';
        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     * @since 1.0.0
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance) {

        $instance = wp_parse_args((array) $instance, array(
            'url' => esc_attr__(''),
            'margin' => esc_html__('18px'),
            'target' => 'blank',
            'size' => esc_html__('20px'),
        ));
        ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('size')); ?>"><?php esc_html_e('Dimensions en pixel', 'labascule'); ?>:</label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('size')); ?>" name="<?php echo esc_attr($this->get_field_name('size')); ?>" type="text" value="<?php echo esc_attr($instance['size']); ?>" />
            <small><?php esc_html_e('Example:', 'labascule'); ?> 20px</small>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('margin')); ?>"><?php esc_html_e('Marge de gauche', 'labascule'); ?>:</label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('margin')); ?>" name="<?php echo esc_attr($this->get_field_name('margin')); ?>" type="text" value="<?php echo esc_attr($instance['margin']); ?>" />
            <small><?php esc_html_e('Exemple:', 'labascule'); ?> 18px</small>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('target')); ?>"><?php esc_html_e('Ouvrir le lien', 'labascule'); ?>:</label>
            <br />
            <select class="labascule-widget-select" name="<?php echo esc_attr($this->get_field_name('target')); ?>" id="<?php echo esc_attr($this->get_field_id('target')); ?>">
                <option value="blank" <?php selected($instance['target'], 'blank') ?>><?php esc_html_e('Ouvrir dans une autre fenêtre', 'labascule'); ?></option>
                <option value="self" <?php selected($instance['target'], 'self') ?>><?php esc_html_e('Ouvrir dans la même fenêtre', 'labascule'); ?></option>
            </select>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('url_twitter')); ?>" style="font-weight: bold;"><?php esc_html_e('Twitter'); ?>:</label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('url_twitter')); ?>" name="<?php echo esc_attr($this->get_field_name('url_twitter')); ?>" type="text" value="<?php echo esc_attr($instance['url_twitter']); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('url_facebook')); ?>" style="font-weight: bold;"><?php esc_html_e('Facebook'); ?>:</label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('url')); ?>" name="<?php echo esc_attr($this->get_field_name('url_facebook')); ?>" type="text" value="<?php echo esc_attr($instance['url_facebook']); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('url_instagram')); ?>" style="font-weight: bold;"><?php esc_html_e('Instagram'); ?>:</label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('url')); ?>" name="<?php echo esc_attr($this->get_field_name('url_instagram')); ?>" type="text" value="<?php echo esc_attr($instance['url_instagram']); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email')); ?>"  style="font-weight: bold;"><?php esc_html_e('Email'); ?>:</label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_attr($instance['email']); ?>" />
        </p>


        <?php
    }

}

register_widget('Labascule_Social_Widget');