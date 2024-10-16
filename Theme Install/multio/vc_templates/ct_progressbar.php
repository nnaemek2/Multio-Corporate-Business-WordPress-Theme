<?php 
extract(shortcode_atts(array(
    'ct_progressbar_list' => '',
    'title_color' => '',
    'value_color' => '',
    'bg_color' => '',
    'el_class' => '',
), $atts));
$html_id = cmsHtmlID('ct-progress');
$ct_progressbar = array();
$ct_progressbar = (array) vc_param_group_parse_atts($ct_progressbar_list);
if(!empty($ct_progressbar)) : ?>
    <div id="<?php echo esc_attr($html_id);?>" class="ct-progress-layout1 <?php echo esc_attr( $el_class); ?>">
        <?php foreach ($ct_progressbar as $key => $value) {
            $item_title = isset($value['item_title']) ? $value['item_title'] : '';
            $value_number = isset($value['value']) ? $value['value'] : '';
            ?>
            <div class="ct-progress-item">
                <?php if($item_title):?>
                    <h3 class="ct-progress-title" style="<?php if(!empty($title_color)) { echo 'color:'.esc_attr($title_color).';'; } ?>">
                        <?php echo apply_filters('the_title',$item_title);?>
                    </h3>
                <?php endif;?>
                <div class="ct-progress-holder">
                    <div class="ct-progress progress" style="<?php if(!empty($bg_color)) { echo 'background-color:'.esc_attr($bg_color).';'; } ?>">
                        <div class="progress-bar" role="progressbar" data-valuetransitiongoal="<?php echo esc_attr($value_number); ?>">
                            <i></i>
                            <span  style="<?php if(!empty($value_color)) { echo 'color:'.esc_attr($value_color).';'; } ?>">
                                <?php echo esc_attr($value_number).'%';?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php endif; ?>