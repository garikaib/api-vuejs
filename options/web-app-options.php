<?php
if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
        'key' => 'group_1',
        'title' => 'Universal Fields',
        'fields' => array(
            array(
                'key' => 'field_1',
                'label' => 'Site Title',
                'name' => 'site_title',
                'type' => 'text',
            ),
            array(
                'key' => 'field_2',
                'label' => 'Footer Text',
                'name' => 'footer_text',
                'type' => 'textarea',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-options',
                ),
            ),
        ),
    ));
}
