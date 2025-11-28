<?php
// error_log("We are inside options!");
// Check if ACF function exists for versions prior to 5.x
if (!function_exists('zp_vuejs_options')) {
    function zp_vuejs_options()
    {
        $args = array(
            'opt_name' => 'theme_options',
            'display_name' => 'Theme Options',
            'menu_title' => 'Theme Options',
            'page_slug' => 'theme-options',
            'dev_mode' => false,
            'menu_type' => 'submenu',
            'menu_parent' => 'themes.php',
            'allow_sub_menu' => true,
            'menu_icon' => 'dashicons-admin-generic',
            'page_priority' => 60,
            'page_parent' => 'themes.php',
            'page_permissions' => 'manage_options',
            'page_icon' => 'icon-themes',
            'last_tab' => '',
            'save_defaults' => true,
            'default_show' => false,
            'default_mark' => '',
            'show_import_export' => true,
            'ajax_save' => true,
            'disable_save_warn' => false,
            'compiler' => true,
            'update_notice' => true,
            'customizer' => false,
            'output' => true,
            'output_tag' => true,
            'database' => 'options',
            'transient_time' => 0,
            'network_sites' => true,
            'hide_reset' => false,
            'admin_bar' => true,
            'admin_bar_icon' => 'dashicons-admin-generic',
            'admin_bar_priority' => 50,
        );

        return $args;
    }
}

// require_once plugin_dir_path(__FILE__) . 'options/web-app-options.php';
if (!function_exists('zp_vuejs_options')) {
    function zp_vuejs_options_page()
    {
        if (class_exists('Redux')) {
            Redux::setArgs('theme_options', zp_vuejs_options());
            Redux::setSections('theme_options', array(
                array(
                    'title' => 'General',
                    'id' => 'general',
                    'icon' => 'el el-cogs',
                    'fields' => array(
                        array(
                            'title' => 'Site Title',
                            'id' => 'site_title',
                            'type' => 'text',
                        ),
                        array(
                            'title' => 'Footer Text',
                            'id' => 'footer_text',
                            'type' => 'textarea',
                        ),
                    ),
                ),
            ));
        }
    }
    add_action('redux/loaded', 'zp_vuejs_options_page');
}
