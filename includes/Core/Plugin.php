<?php
namespace ZimPriceCheck\Core;

if (!defined('ABSPATH')) {
    exit;
}

class Plugin
{
    /**
     * @var Plugin Instance of the class.
     */
    private static $instance = null;

    /**
     * @var AbstractModule[] List of active modules.
     */
    private $modules = array();

    /**
     * Get the instance of the class.
     */
    public static function get_instance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Constructor.
     */
    private function __construct()
    {
        require_once __DIR__ . '/Autoloader.php';
        Autoloader::register();
        $this->load_modules();
        $this->init_hooks();
    }

    /**
     * Load all modules.
     */
    private function load_modules()
    {
        $this->modules[] = new \ZimPriceCheck\Modules\OmariCalculator();
        $this->modules[] = new \ZimPriceCheck\Modules\FxCalculator();
    }

    /**
     * Initialize hooks.
     */
    private function init_hooks()
    {
        add_filter('script_loader_tag', array($this, 'add_module_attribute'), 10, 3);
        
        foreach ($this->modules as $module) {
            $module->register_shortcodes();
        }
    }

    /**
     * Add type="module" to scripts that need it.
     */
    public function add_module_attribute($tag, $handle, $src)
    {
        $module_scripts = array();
        foreach ($this->modules as $module) {
            $module_scripts = array_merge($module_scripts, $module->get_module_scripts());
        }

        if (in_array($handle, $module_scripts, true)) {
            $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
        }
        return $tag;
    }
}
