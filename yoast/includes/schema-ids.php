<?php

function zpcSchemaFiles(int $post_id)
{
    $post_id_array = [
        16276 => "/includes/liquid-home.php", //Liquid Home Bundles
        16165 => "/includes/telone-usd.php", //TelOne Bundles
        16373 => "/includes/usd-airtime.php", //USD Airtime
        2 => "/includes/telone-usd.php", //Whatever we are testing on Localhost
    ];
    if (array_key_exists($post_id, $post_id_array)) {
        return $post_id_array[$post_id];
    }
}
function needsSchema($post_id)
{

    $post_id_array = [
        16276 => "/includes/liquid-home.php",
        16165 => "/includes/telone.php",
        16373 => "/includes/usd-airtime.php",
        // 2 => "/includes/telone-usd.php",
    ];
    if (array_key_exists($post_id, $post_id_array)) {
        error_log("needs schema");
        return true;
    } else {
        return false;
    }

}
