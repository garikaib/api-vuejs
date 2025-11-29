<?php
namespace ZimPriceCheck\Core;

if (!defined('ABSPATH')) {
    exit;
}

abstract class AbstractModule
{
    /**
     * Constructor.
     * Automatically registers hooks if needed, but usually we want to control this from the Plugin class.
     */
    public function __construct()
    {
        // Optional: Auto-register if we want self-contained modules
    }

    /**
     * Register shortcodes for the module.
     */
    abstract public function register_shortcodes();

    /**
     * Enqueue scripts and styles for the module.
     * This should be called only when necessary (e.g. inside shortcode callback).
     */
    abstract public function enqueue_scripts();

    /**
     * Get a list of script handles that should be loaded as modules (type="module").
     *
     * @return array
     */
    public function get_module_scripts()
    {
        return array();
    }
}
