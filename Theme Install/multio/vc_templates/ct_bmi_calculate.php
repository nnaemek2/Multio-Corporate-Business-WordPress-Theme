<?php
extract(shortcode_atts(array(
    'el_title' => '',
    'animation' => '',
    'el_class' => '',
), $atts));
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
$random_index = rand(0,100000);
wp_enqueue_script('ct-bmi-calculate', get_template_directory_uri() . '/assets/js/ct-bmi-calculate.js', array( 'jquery' ), 'all', true);
?>
<div class="ct-bmi-calculate <?php echo esc_attr($el_class.' '.$animation_classes); ?>">
    <?php if(!empty($el_title)) { ?>
        <h3 class="el-title">
            <?php echo wp_kses_post($el_title); ?>
        </h3>
    <?php } ?>
    <div class="bmi-form-wrap">
        <div class="radio-types">
            <div class="select-type ct-radio-type">
                <label for="imperial-select-<?php echo esc_attr($random_index);?>"><?php esc_html_e('US', 'multio') ?></label>
                <input id="imperial-select-<?php echo esc_attr($random_index);?>" class="type-select bmi-radio" type="radio" name="bmi-select" value='us' checked="checked">
                <span class="ct-radio-icon"></span>
            </div>
            <div class="select-type ct-radio-type">
                <label for="metric-select-<?php echo esc_attr($random_index);?>"><?php esc_html_e('or Metric', 'multio') ?></label>
                <input id="metric-select-<?php echo esc_attr($random_index);?>" class="type-select bmi-radio" type="radio" name="bmi-select" value='int'>
                <span class="ct-radio-icon"></span>
            </div>
        </div>
        <form class="i-form">
            <div class="wrap-input">
                <label class="label-before"><?php esc_html_e('Enter your weight :', 'multio')?></label>
                <input type="number" step="0.01" min="1" class="weight" value="" required>
                <label class="label-after"><?php esc_html_e('Lbs', 'multio')?></label>
            </div>
            <div class="wrap-input">
                <label class="label-before"><?php esc_html_e('Enter your height :', 'multio')?></label>
                <input type="number" step="0.01" min="1" class="ft" value="" required>
                <label class="label-after"><?php esc_html_e('Feet', 'multio')?></label>
                <input type="number" step="0.01" min="1" class="inc" value="" required>
                <label class="label-after"><?php esc_html_e('Inches', 'multio')?></label>
            </div>
            <input type="submit" class="ct-bmi-calc2" value="<?php esc_html_e('Calculate Now', 'multio'); ?>">
        </form>
        <form class="m-form">
            <div class="wrap-input">
                <label class="label-before"><?php esc_html_e('Enter your weight :', 'multio')?></label>
                <input type="number" step="0.01" min="1" class="weight" value="" required>
                <label class="label-after"><?php esc_html_e('Kilogram', 'multio')?></label>
            </div>
            <div class="wrap-input">
                <label class="label-before"><?php esc_html_e('Enter your height :', 'multio')?></label>
                <input type="number" step="0.01" min="1" class="height" value="" required>
                <label class="label-after"><?php esc_html_e('Centimetre', 'multio')?></label>
            </div>
            <input type="submit" class="ct-bmi-calc1" value="Calculate Now">
        </form>
        <?php
        $data_chart = esc_html__('Underweight', 'multio').','.esc_html__('Normal', 'multio').','.esc_html__('Overweight', 'multio').','.esc_html__('Obese', 'multio');
        ?>
        <div class="ct-bmi-result" data-chart="<?php echo esc_attr($data_chart);?>">
            <?php esc_html_e('Your BMI is:', 'multio');?><span class="bmi-result"></span>, <?php esc_html_e('and weight status is:', 'multio');?><span class="bmi-status"></span>
        </div>
    </div>
</div>