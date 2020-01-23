<?php

require plugin_dir_path( __FILE__ ) . 'src/products.php';
require plugin_dir_path( __FILE__ ) . 'src/query.php';
require plugin_dir_path( __FILE__ ) . 'src/productFormHandler.php';
require plugin_dir_path( __FILE__ ) . 'src/formHelpers.php';

function init_missionControl() {

    $stylesheet = plugin_dir_path( __FILE__ ) . '/resources/style/global.css';

    $javascript = plugin_dir_path( __FILE__ ) . '/resources/js/global.js';

    echo '<link rel="stylesheet" type="text/css" href="' . $stylesheet . '">';

    echo '<script type="text/javascript" src="' . $javascript . '">';

}

//add_action( 'init', 'init_missionControl' );

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

add_action('rest_api_init', function () {
        register_rest_route( 'v1', 'createproduct/querytest',array(
            'methods'  => 'GET',
            'callback' => 'queryTrigger'
        ));
        register_rest_route( 'v1', 'createproduct/apitest',array(
            'methods'  => 'POST',
            'callback' => 'postTest'
        ));
  });
