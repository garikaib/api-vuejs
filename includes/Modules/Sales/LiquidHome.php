<?php
namespace ZimPriceCheck\Modules\Sales;

use ZimPriceCheck\Core\AbstractModule;

if (!defined('ABSPATH')) {
    exit;
}

class LiquidHome extends AbstractModule
{
    public function __construct()
    {
        parent::__construct();
        add_filter('wpseo_schema_graph_pieces', array($this, 'add_liquid_bundle_schema'), 11, 3);
        add_filter('yoast_seo_development_mode', '__return_true');
    }

    public function register_shortcodes()
    {
        add_shortcode('lt-sales', array($this, 'render_shortcode'));
    }

    public function enqueue_scripts()
    {
        $plugin_url = plugin_dir_url(dirname(dirname(dirname(__DIR__))) . '/api-vuejs.php') . 'assets/liquid-home/';

        wp_register_script('zpc_lt_cart_js', $plugin_url . 'assets/index.e8991a10.js', array(), '1.0.0', true);
        wp_enqueue_script('zpc_lt_cart_js');

        wp_register_style('zpc_lt_cart_css', $plugin_url . 'assets/index.75190164.css', array(), '1.0.0');
        wp_enqueue_style('zpc_lt_cart_css');
    }

    public function render_shortcode($atts)
    {
        $this->enqueue_scripts();
        return '<div id="lt-sales"></div>';
    }

    public function get_module_scripts()
    {
        return array('zpc_lt_cart_js');
    }

    public function add_liquid_bundle_schema($pieces, $context)
    {
        if ($context->id === 16276 && class_exists('ZPC_Product')) {
            $offer_data = [
                '@type' => 'AggregateOffer',
                'offerCount' => '5',
                'lowPrice' => '6.88',
                'highPrice' => '150.00',
                'priceCurrency' => 'USD',
                'availability' => 'http://schema.org/InStock',
                'url' => 'https://zimpricecheck.com/buy-liquid-home-bundles-using-paypal-visa-or-mastercard/',
                'seller' => [
                    '@type' => 'Organization',
                    'name' => 'Zimpricecheck.com',
                ],
            ];

            $product_data = [
                'name' => 'Liquid Home Bundles',
                'sku' => '0004',
                'description' => 'Liquid Home is the largest internet provider in Zimbabwe. They provide Wibronix and Fibronix connections to both home and business customers. Here you can buy their bundles and pay using PayPal/Visa/MasterCard nomatter where you are in the world.',
                'image' => 'https://zimpricecheck.com/wp-content/uploads/2022/11/lit_banner-1.jpeg',
                'offer' => $offer_data,
            ];

            $pieces[] = new \ZPC_Product($context, $product_data);
        }

        return $pieces;
    }
}
