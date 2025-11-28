
<?php
function add_zpc_schema($pieces, $context)
{
    $offer_data = [
        "@type" => "AggregateOffer",
        "offerCount" => "4",
        "lowPrice" => "13.99",
        "highPrice" => "69.99",
        "priceCurrency" => "USD",
        "vailability" => "http://schema.org/InStock",
        'url' => 'https://zimpricecheck.com/buy-telone-usd-bundles-using-paypal-visa-or-mastercard/',
        "seller" => [
            "@type" => "Organization",
            " name" => "Zimpricecheck.com",

        ]];
    $product_data = [
        'name' => 'TelOne USD Bonus Bundles',
        'sku' => '0005',
        'description' => 'TelOne USD Bonus Bundles come with generous data offerings and are much cheaper than ZWL bonus bundles. You can buy USD bonus bundles for you or your loved ones and pay using PayPal/MasterCard/Visa no matter where you are in the world.',
        'image' => 'https://zimpricecheck.com/wp-content/uploads/2020/10/telone_logo.jpg',
        'offer' => $offer_data,

    ];

    $pieces[] = new ZPC_Product($context, $product_data);

    return $pieces;
}

add_filter('yoast_seo_development_mode', '__return_true');
