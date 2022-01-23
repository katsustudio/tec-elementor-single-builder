<?php
/** no direct access **/
defined('TECSINGLE') or die();

$post_type = TecEsb()->post_types['tec']->post_type;
$settings =  TecEsb()->tec_settings;

$builder_args = array(
    'post_type' => $post_type,
    'posts_per_page' => -1
);
$builder_query = new WP_Query($builder_args);

$event_args = array(
    'post_type' => 'tribe_events',
    'posts_per_page' => -1
);
$event_query = new WP_Query($event_args);
?>
<div class="tec-wrap">
    <div class="tec-dashboard-header">
        <div class="tec-dashboard-header-text">
            <h2><?php echo esc_html__( 'TEC Elementor Single Builder', 'tec-elementor-single-builder' ); ?></h2>
            <span><?php echo esc_html__( 'Version', 'tec-elementor-single-builder' ); ?> <?php echo esc_html(TecEsb()->version);?></span>
        </div>
        <div class="tec-dashboard-header-logo">
            <img src="<?php echo esc_html(TecEsb()->assets); ?>/tec-logo.png" />
        </div>
    </div>
    <div class="tec-dashboard-content">
        <div class="tec-dashboard-content-box">
            <h3 class="tec-dashboard-content-box-title">
                <?php echo esc_html__( 'Settings', 'tec-elementor-single-builder' ); ?>
            </h3>
            <div class="tec-dashboard-content-box-content">
                <form id="tec_settings_form">
                    <div class="tec-loading-full"></div>
                    <div class="tec-form-row">
                        <label for="builder_id"><?php echo esc_html__('Select builder to display event:',  'tec-elementor-single-builder'); ?></label>
                        <select id="builder_id" name="tec[builder_id]">
                            <option <?php if( isset($settings['builder_id']) && $settings['builder_id'] == 'none' ) echo esc_html__('selected="selected"'); ?>  value="none"><?php echo esc_html__('None' , 'tec-elementor-single-builder'); ?></option>
                            <?php if ($builder_query->have_posts() ) : while ( $builder_query->have_posts() ) : $builder_query->the_post(); ?>
                                <option <?php if( $settings['builder_id'] == get_the_ID() ) echo esc_html__('selected="selected"'); ?> value="<?php echo get_the_ID(); ?>"><?php echo get_the_title(); ?></option>
                            <?php endwhile; wp_reset_postdata(); endif; ?>
                        </select>
                    </div>

                    <div class="tec-form-row">
                        <label for="event_id"><?php echo esc_html__('Select Event data to display in elementor edit page:',  'tec-elementor-single-builder'); ?></label>
                        <select id="event_id" name="tec[event_id]">
                            <option <?php if( isset($settings['event_id']) && $settings['event_id'] == 'none' ) echo esc_html__('selected="selected"'); ?>  value="none"><?php echo esc_html__('None' , 'tec-elementor-single-builder'); ?></option>
                            <?php if ($event_query->have_posts() ) : while ( $event_query->have_posts() ) : $event_query->the_post(); ?>
                                <option <?php if( $settings['event_id'] == get_the_ID() ) echo esc_html__('selected="selected"'); ?> value="<?php echo get_the_ID(); ?>"><?php echo get_the_title(); ?></option>
                            <?php endwhile; wp_reset_postdata(); endif; ?>
                        </select>
                    </div>

                    <div class="tec-options-fields">
                        <?php wp_nonce_field('tec_settings_data', 'tec_settings_nonce'); ?>
                        <button id="tec_settings_form_button" class="button button-primary tec-button-primary" type="submit"><div class="tec-loader"></div><span><?php _e('Save Changes', 'tec'); ?></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery("#tec_settings_form").on("submit", function(event) {
        event.preventDefault();
        var settings = jQuery("#tec_settings_form").serialize();
        jQuery.ajax( {
            type: "POST",
            url: ajaxurl,
            data: "action=tec_save_settings&"+settings,
            dataType: 'json',
            beforeSend: function () {
                jQuery('.tec-loader').show();
                jQuery('#tec_settings_form_button').addClass('loading');
                jQuery('.tec-loading-full').css('opacity', '0.5');
                jQuery('.tec-loading-full').css('z-index', '99');
            },
            success: function(data)
            {
                // Remove the loading Class to the button
                //alert('Your settings saved')
                jQuery('.tec-loader').hide();
                jQuery('#tec_settings_form_button').removeClass('loading');
                jQuery('.tec-loading-full').css('opacity', '0');
                jQuery('.tec-loading-full').css('z-index', '0');
                jQuery('.tec-options-fields').append('<svg class="tec-checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="tec-checkmark-circle" cx="26" cy="26" r="25" fill="none" /><path class="tec-checkmark-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" /></svg>');
                setTimeout(() => {
                    jQuery('.tec-checkmark').remove()
                }, 2000);

            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                // Remove the loading Class to the button
                alert('Alert')
                jQuery('.tec-loader').hide();
                jQuery('#tec_settings_form_button').removeClass('loading');
                jQuery('.tec-loading-full').css('opacity', '0');
                jQuery('.tec-loading-full').css('z-index', '0');
            }
        });
    })
</script>