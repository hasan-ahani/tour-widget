<?php
namespace Hasanart\TourWidget;
/**
 * @project     : public
 * @version     : 1.0
 * @author      : WPTool Team
 * @date        : 2022-06-29
 * @website     : https://wptool.co
 */
defined('ABSPATH') or exit();

class Loader
{

    public function load()
    {
        add_action( 'elementor/widgets/register', array($this, 'register_widgets') );

        add_action( 'wp_enqueue_scripts', array($this , 'enqueue') );
    }

    /**
     * @param \Elementor\Widgets_Manager $widgets_manager
     */
    public function register_widgets($widgets_manager)
    {
        $widgets_manager->register(new Widget());
    }

    public function enqueue()
    {

        wp_register_script( 'tour-widget-script', TOUR_WIDGET_URL . 'assets/js/main.js', [ 'elementor-frontend' ], '1.0.0', true );
        wp_register_style( 'tour-widget-stylesheet',  TOUR_WIDGET_URL . 'assets/css/style.css' );
    }

}
