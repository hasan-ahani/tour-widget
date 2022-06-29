<?php

namespace Hasanart\TourWidget;
use Elementor\Widget_Base;
use WP_Query;

/**
 * @package     : Hasanart\TourWidget
 * @project     : public
 * @version     : 1.0
 * @author      : WPTool Team
 * @date        : 2022-06-29
 * @website     : https://wptool.co
 */
defined('ABSPATH') or exit();

class Widget extends Widget_Base
{

    public function get_script_depends() {
        return [ 'tour-widget-script' ];
    }

    public function get_style_depends() {
        return [ 'tour-widget-stylesheet' ];
    }

    public function get_name()
    {
        return 'لیست تور ها';
    }

    public function get_title() {
        return 'لیست تور ها';
    }

    public function get_icon() {
        return 'eicon-carousel';
    }

    public function get_categories() {
        return [ 'general' ];
    }


    protected function register_controls()
    {


        $this->start_controls_section(
            'content_section',
            [
                'label' => 'نمایش',
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );



        $this->add_control(
            'button_show',
            [
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label' => 'دکمه مشاهده بیشتر',
            ]
        );

        $this->add_control(
            'button_text',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label' => 'متن دکمه مشاهده بیشتر',
                'default'   => '',
                'condition' => [
                    'button_show' => 'yes'
                ],
                'placeholder' => 'متن دکمه مشاهده بیشتر را وارد کنید',
            ]
        );

        $this->add_control(
            'button_link',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label' => 'لینک مشاهده بیشتر',
                'default'   => '',
                'condition' => [
                    'button_show' => 'yes'
                ],
                'placeholder' => 'لینک را وارد کنید',
            ]
        );

        $repeater = new \Elementor\Repeater();


        $repeater->add_control(
            'tab_title', [
                'label' => 'عنوان',
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'tab_id', [
                'label' => 'شناسه(لاتین)',
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'category_ids',
            [
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label'         => 'شناسه دسته بندی ها(جدا سازی با کاما)',

            ]
        );

        $repeater->add_control(
            'orderby',
            [
                'type'          => \Elementor\Controls_Manager::SELECT,
                'label'         => 'ترتیب بر اساس',
                'label_block'   => true,
                'default'       => 'date',
                'options'       => [
                    'title'     => 'عنوان',
                    'date'      => 'تاریخ انتشار',
                    'modified'  => 'تاریخ تغییر',
                ]
            ]
        );
        $repeater->add_control(
            'order',
            [
                'type'          => \Elementor\Controls_Manager::SELECT,
                'label'         => 'نوع ترتیب',
                'multiple'      => true,
                'default'       => 'desc',
                'options'       => [
                    'desc' => 'نزولی',
                    'asc' => 'صعودی',
                ]
            ]
        );


        $repeater->add_control(
            'per_page',
            [
                'type' => \Elementor\Controls_Manager::NUMBER,
                'label' => 'تعداد تور ها',
                'default' => 8,
            ]
        );

        $this->add_control(
            'tabs',
            [
                'label' => 'تب تور ها',
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tab_title' => 'تور داخلی',
                        'tab_id' => 'tour-local'
                    ],
                ],
                'title_field' => '{{{ tab_title }}}',
            ]
        );


        $this->end_controls_section();
    }

    protected function render(  ) {
        $per_page       = $this->get_settings_for_display( 'per_page' );
        $tabs          = $this->get_settings_for_display( 'tabs' );
        ?>
        <div class="tour-widget">
            <div class="tab-box">
                <ul class="tabs">
                    <?php
                    foreach ($tabs as $key =>  $tab):
                        ?>
                        <li class="<?php echo $key == 0 ? 'active' : null;?>" data-tab="#<?php echo $tab['tab_id']; ?>">
                            <?php
                            echo $tab['tab_title'];
                            ?>
                        </li>
                    <?php
                    endforeach;
                    ?>
                </ul>
                <a class="view-all" href="#">مشاهد همه</a>
            </div>
            <div class="tab-contents">
                <?php
                foreach ($tabs as $key => $tab):
                    ?>

                    <div id="<?php echo $tab['tab_id'] ?>" class="tab-content <?php echo $key == 0 ? 'active' : null;?>">

                        <?php
                        $query = new WP_Query([
                            'post_type' => ['post'],
                            'cat' => explode(',' , $tab['category_ids']),
                            'posts_per_page' => $tab['per_page']
                        ]);

                        if ($query->have_posts()):
                            while ($query->have_posts()) :
                                $query->the_post();
                                include 'view/tour-item.php';
                            endwhile;

                        endif;
                        ?>

                    </div>
                <?php

                endforeach;
                ?>


            </div>
            <div class="tour-widget-detail">
                <div class="cart-item-detail">
                    <img src="" >
                    <div class="cart-detail-content">
                        <strong></strong>
                        <div class="detail start_date">
                            تاریخ رفت: <span></span>
                        </div>
                        <div class="detail end_date">
                            تاریخ برگشت: <span></span>
                        </div>
                        <div class="detail duration">
                            مدت اقامت: <span></span>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <?php

    }
}
