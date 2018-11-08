<?php
/**
 * Plugin Name: WebP Express
 * Plugin URI: https://github.com/rosell-dk/webp-express
 * Description: Serve autogenerated WebP images instead of jpeg/png to browsers that supports WebP. Works on anything (media library images, galleries, theme images etc).
 * Version: 0.6.2
 * Author: Bjørn Rosell
 * Author URI: https://www.bitwise-it.dk
 * License: GPL2
 */

/*
Note: Perhaps create a plugin page on my website?, ie https://www.bitwise-it.dk/software/wordpress/webp-express
*/

define('WEBPEXPRESS_PLUGIN', __FILE__);
define('WEBPEXPRESS_PLUGIN_DIR', __DIR__);

if (is_admin()) {
    include __DIR__ . '/lib/admin.php';
}

//add_action( 'wp_ajax_foobar', 'my_ajax_foobar_handler' );


function webp_express_process_post() {
    // strip query string
    $requestUriNoQS = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

    if (!preg_match('/webp-express-server$/', $requestUriNoQS)) {
        return;
    }
    //include __DIR__ . '/lib/wpc.php';
    include __DIR__ . '/web-service/wpc.php';
    die();
}
add_action( 'init', 'webp_express_process_post' );

//add_action( 'template_redirect', 'webp_express_template_redirect' );
