<?php
extract(shortcode_atts(array(
    'el_title' => '',
    'table_td' => '',

    'animation' => '',
    'el_class' => '',
), $atts));
$table_td = (array) vc_param_group_parse_atts($table_td);
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
if(!empty($table_td)) : ?>
    <div class="ct-table <?php echo esc_attr($el_class.' '.$animation_classes); ?>">
    	<div class="ct-table-inner">
    		<?php if(!empty($el_title)) { ?>
                <h4 class="ct-table-title">
                    <?php echo esc_attr($el_title); ?>
                </h4>
            <?php } ?>
            <div class="ct-table-content">
                <?php foreach ($table_td as $key => $value) {
                    $table_content = isset($value['table_content']) ? $value['table_content'] : '';
                    ?>
                    <div class="ct-table-column">
                        <?php echo wp_kses_post( $table_content ); ?>
                    </div>
                <?php } ?>
            </div>
    	</div>
    </div>
<?php endif; ?>