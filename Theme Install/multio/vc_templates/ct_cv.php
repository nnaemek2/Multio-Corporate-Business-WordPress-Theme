<?php
extract(shortcode_atts(array(
    'cv_item' => '',
    'label_color' => '',
    'content_color' => '',
    'button_text' => '',
    'button_link' => '',
    'animation' => '',
    'el_class' => '',
), $atts));
$link = vc_build_link($button_link);
$a_href = '';
$a_target = '';
if ( strlen( $link['url'] ) > 0 ) {
    $a_href = $link['url'];
    $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
}
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
$cv = (array) vc_param_group_parse_atts($cv_item);
if(!empty($cv)) : ?>
    <div class="ct-cv <?php echo esc_attr( $el_class.' '.$animation_classes ); ?>">
        <ul class="ct-cv-list">
            <?php foreach ($cv as $key => $value) {
                $label = isset($value['label']) ? $value['label'] : '';
                $content = isset($value['content']) ? $value['content'] : '';
                ?>
                <li style="<?php if(!empty($content_color)) { echo 'color:'.esc_attr($content_color).';'; } ?>">
                    <label style="<?php if(!empty($label_color)) { echo 'color:'.esc_attr($label_color).';'; } ?>"><?php echo esc_attr($label); ?></label>
                    <?php echo esc_attr($content); ?>
                </li>
            <?php } ?>
        </ul>
        <?php if(!empty($button_text)) : ?>
            <a class="btn btn-default" href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>"><?php echo esc_attr($button_text); ?></a>
        <?php endif; ?>
    </div>
<?php endif;?>