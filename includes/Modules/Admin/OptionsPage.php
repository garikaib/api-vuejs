<?php
namespace Zimpricecheck\Modules\Admin;

use Zimpricecheck\Core\AbstractModule;
use Redux;

if (!defined('ABSPATH')) {
    exit;
}

class OptionsPage extends AbstractModule
{
    public function register_shortcodes()
    {
        // No shortcodes for this module
    }

    public function enqueue_scripts()
    {
        // No frontend scripts
    }

    public function __construct()
    {
        parent::__construct();
        add_action('redux/loaded', array($this, 'register_options'));
    }

    public function get_options_args()
    {
        return array(
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
    }

    public function register_options()
    {
        if (class_exists('Redux')) {
            Redux::setArgs('theme_options', $this->get_options_args());
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
}
