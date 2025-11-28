
<?
function add_zpc_schema($pieces, $context)
{
        $offer_data = [
            "@type" => "AggregateOffer",
            "offerCount" => "5",
            "lowPrice" => "6.88",
            "highPrice" => "150.00",
            "priceCurrency" => "USD",
            "vailability" => "http://schema.org/InStock",
            'url' => 'https://zimpricecheck.com/buy-liquid-home-bundles-using-paypal-visa-or-mastercard/',
            "seller" => [
                "@type" => "Organization",
                " name" => "Zimpricecheck.com",

            ]];
        $product_data = [
            'name' => 'Liquid Home Bundles',
            'sku' => '0004',
            'description' => 'Liquid Home is the largest internet provider in Zimbabwe.They provide Wibronix and Fibronix connections to both Home and Business customers. Here you can buy their bundles and pay using PayPal/Visa/MasterCard nomatter where you are in the world.',
            'image' => 'https://zimpricecheck.com/wp-content/uploads/2022/11/lit_banner-1.jpeg',
            'offer' => $offer_data,

        ];

        $pieces[] = new ZPC_Product($context, $product_data);


    return $pieces;
}
