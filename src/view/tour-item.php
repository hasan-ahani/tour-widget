<?php
/**
 * @project     : public
 * @version     : 1.0
 * @author      : WPTool Team
 * @date        : 2022-06-29
 * @website     : https://wptool.co
 */
defined('ABSPATH') or exit();
$start_date = get_post_meta(get_the_ID(), 'start_date', true);
$end_date = get_post_meta(get_the_ID(), 'end_date', true);
$duration = get_post_meta(get_the_ID(), 'duration', true);

?>
<a href="<?php the_permalink();?>" class="tour-item" data-start-date='<?php echo $start_date ?>' data-end-date='<?php echo $end_date ?>' data-duration='<?php echo $duration ?>'>
    <div class="thumbnail">
        <?php the_post_thumbnail();?>
    </div>
    <div class="tour-name">
        <?php the_title();?>
    </div>
</a>

