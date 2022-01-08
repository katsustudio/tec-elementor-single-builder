<?php
$main_p = get_post(get_the_ID());
if(did_action('elementor/loaded'))
{
    if(Elementor\Plugin::$instance->editor->is_edit_mode() || Elementor\Plugin::$instance->preview->is_preview_mode()) the_content();
    do_action('tec_esb_content', $main_p);
}