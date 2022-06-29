<?php
/**
    Plugin Name: tour
    Plugin URI: http://tour.ir
    Description: A brief description of the Plugin.
    Version: 1.0
    Author: Hasan Ahani
    Author URI: http://tour.ir
    License: A "Slug" license name e.g. GPL2
 */
defined('ABSPATH') or exit();


define( 'TOUR_WIDGET_URL', plugin_dir_url( __FILE__ ) );

require 'vendor/autoload.php';
$loader = new \Hasanart\TourWidget\Loader();
$loader->load();



