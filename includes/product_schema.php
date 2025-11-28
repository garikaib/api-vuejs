<?php
/**
 * Schema
 *
 * @package VenuesLive
 */

use Yoast\WP\SEO\Generators\Schema\Abstract_Schema_Piece;

/**
 * Class Review.
 */
class ZPC_Product extends Abstract_Schema_Piece
{
    /**
     * A value object with context variables.
     *
     * @var WPSEO_Schema_Context
     */
    public $context;

    private $product_data;

    /**
     * Identifier for custom schema node.
     *
     * @var string
     */
    public $identifier = 'zpc_product_schema';

    /**
     * Review constructor.
     *
     * @param WPSEO_Schema_Context $context Value object with context variables.
     */
    public function __construct(\WPSEO_Schema_Context$context, array $data = [])
    {
        $this->context = $context;
        $this->product_data = $data;
    }

    /**
     * Determines whether or not a piece should be added to the graph.
     *
     * @return bool
     */
    public function is_needed()
    {
        //Tests are done elsewhere for now we just need true
        return true;
    }

    /**
     * Add review piece of the graph.
     *
     * @return mixed
     */
    public function generate()
    {

        $data = [];

        $the_post_id = $this->context->id; // This will contain post Id.

        $event_schema = [
            '@type' => 'Product',
            'name' => $this->product_data["name"] ?? "Zimpricecheck Product",
            'sku' => $this->product_data['sku'] ?? "0001",
            'description' => $this->product_data['description'] ?? "Cheap bundles and airtime available",
            'image' => [$this->product_data['image']],
            'url' => get_the_permalink($the_post_id),
            'aggregateRating' => [
                "@type" => "AggregateRating",
                "ratingValue" => "5",
                "reviewCount" => "5",
            ],
            'offer' => $this->product_data['offer'],
        ];

        $data[] = $event_schema;

        return $data;

    }

}
