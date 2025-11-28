<?php

add_filter('wpseo_schema_graph_pieces', 'do_add_zpc_schema', 11, 3);

function do_add_zpc_schema($pieces, $context)
{
    require_once __DIR__ . "/includes/schema-ids.php";

//    if (needsSchema($context->id)) {
  
if(false){      require_once __DIR__ . zpcSchemaFiles($context->id);
       // return add_zpc_schema($pieces, $context);
    }

//If we didn't touch anything return untouched data
    return $pieces;
}
