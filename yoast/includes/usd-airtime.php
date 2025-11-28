<?php

function add_zpc_schema($pieces, $context)
{

    $offer_data = [
        "@type" => "AggregateOffer",
        "offerCount" => "4",
        "lowPrice" => "5.00",
        "highPrice" => "500.00",
        "priceCurrency" => "USD",
        "vailability" => "http://schema.org/InStock",
        'url' => 'https://zimpricecheck.com/usdairtime/',
        "seller" => [
            "@type" => "Organization",
            " name" => "Zimpricecheck.com",

        ]];
    $product_data = [
        'name' => 'Econet, NetOne and Telecel USD Airtime',
        'sku' => '00010',
        'description' => 'You can buy USD bonus bundles for you or your loved ones and pay using PayPal/MasterCard/Visa no matter where you are in the world.',
        'image' => 'https://zimpricecheck.com/wp-content/uploads/2022/06/farmer_phone-1200x800.jpg',
        'offer' => $offer_data,

    ];

    $pieces[] = new ZPC_Product($context, $product_data);
    return $pieces;
}
