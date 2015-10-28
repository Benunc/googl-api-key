<?php
/* The Settings Page 
	This file creates an options/settings page
	in the wp-admin area of your WordPress site
	for specifying your goo.gl API key
	
	This file is for use with the Goo.gl API Key plugin found at
	http://wordpress.org/plugins/googl-api-key/
*/

defined( 'ABSPATH' ) or die( "No script kiddies please!" );
add_action( 'admin_menu', 'googlapi_add_admin_menu' );
add_action( 'admin_init', 'googlapi_settings_init' );


function googlapi_add_admin_menu() {

	add_options_page( 'Goo.gl API', 'Goo.gl API', 'manage_options', 'googlapi', 'googlapi_options_page' );

}


function googlapi_settings_exist() {

	if ( false == get_option( 'googlapi' ) ) {

		add_option( 'googlapi' );

	}

}


function googlapi_settings_init() {

	add_settings_section(

		'googlapi_page_section',

		__( '', 'googl-api-key' ),

		'googlapi__settings_section_callback',

		'googlapi_page'
	);

	add_settings_field(

		'googlapi_api_key',

		__( 'Please enter your API Key', 'googl-api-key' ),

		'googlapi__text_field_0_render',

		'googlapi_page',

		'googlapi_page_section'
	);

	register_setting( 'googlapi_page', 'googlapi' );

}


function googlapi__text_field_0_render() {

	$options = get_option( 'googlapi' ); ?>

	<input type='text' class='text' name='googlapi' value='<?php echo $options; ?>'>

	<?php

}


function googlapi__settings_section_callback() {

	echo sprintf( __( 'You can get your API key by following <a href="%s">these directions</a>.', 'googl-api-key' ), esc_url( 'https://developers.google.com/url-shortener/v1/getting_started?hl=en' ) );

}


function googlapi_options_page() {

	?>
	<form action='options.php' method='post'>
		<div class="wrap">

			<h2><?php _e( 'Goo.gl API Settings', 'googl-api-key' ); ?></h2>
			<hr/>
			<div id="googlapi_admin" class="metabox-holder has-right-sidebar">
				<div class="inner-sidebar">
					<div id="normal-sortables" class="meta-box-sortables ui-sortable">
						<div class="postbox">
							<div class="inside">
								<h3 class="hndle ui-sortable-handle"><?php _e( 'About the Author', 'googl-api-key' ); ?> </h3>

								<div id="googlapi_signup">
									<form
										action="//benandjacq.us1.list-manage.com/subscribe/post?u=8f88921110b81f81744101f4d&amp;id=bd909b5f89"
										method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
										class="validate" target="_blank" novalidate>
										<div id="mc_embed_signup_scroll">
											<p> <?php echo sprintf( __( 'This plugin is developed by <a href="%s">Ben Meredith</a>. I am a freelance developer specializing in <a href="%s">outrunning and outsmarting hackers</a>.', 'googl-api-key' ), esc_url( 'http://benandjacq.com' ), esc_url( 'http://benandjacq.com/wordpress-maintenance-plans' ) ); ?></p>
											<h4><?php _e( 'Sign up to receive my FREE web strategy guide', 'googl-api-key' ); ?></h4>

											<p><input type="email" value="" name="EMAIL" class="widefat" id="mce-EMAIL"
											          placeholder="<?php _ex( 'Your Email Address', 'placeholder text for input field', 'googl-api-key' ); ?>">
												<small><?php _e( 'No Spam. One-click unsubscribe in every message', 'googl-api-key' ); ?></small>
											</p>
											<div style="position: absolute; left: -5000px;"><input type="text"
											                                                       name="b_8f88921110b81f81744101f4d_bd909b5f89"
											                                                       tabindex="-1"
											                                                       value="">
											</div>
											<p class="clear"><input type="submit" value="Subscribe" name="subscribe"
											                        id="mc-embedded-subscribe" class="button-secondary">
											</p>

										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="meta-box-sortables">
						<div class="postbox">
							<div class="inside">
								<p><?php
									$url3  = 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=HDSGWRJYFQQNJ';
									$link3 = sprintf( __( 'The best way you can support this and other plugins is to <a href=%s>donate</a>', 'googl-api-key' ), esc_url( $url3 ) );
									echo $link3; ?> .
									<?php
									$url4  = 'https://wordpress.org/support/view/plugin-reviews/googlapi';
									$link4 = sprintf( __( 'The second best way is to <a href=%s>leave an honest review.</a>', 'googl-api-key' ), esc_url( $url4 ) );
									echo $link4; ?></p>

								<p><?php
									_e( 'Did this plugin save you enough time to be worth some money?', 'googl-api-key' ); ?></p>

								<p>
									<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=HDSGWRJYFQQNJ"
									   target="_blank"><?php _e( 'Click here to buy me a Coke to say thanks.', 'googl-api-key' ); ?></a>
								</p>
							</div>
						</div>
					</div>
				</div>
				<div id="post-body" class="has-sidebar">
					<div id="post-body-content" class="has-sidebar-content">
						<div id="normal-sortables" class="meta-box-sortables">
							<div class="postbox">
								<div class="inside">
									<h2 class="hndle"><?php _e( 'Settings', 'googl-api-key' ); ?></h2>

									<p><?php
										settings_fields( 'googlapi_page' );
										do_settings_sections( 'googlapi_page' );
										?></p>

									<p><input type="submit" class="button-primary"
									          value="<?php _e( 'Save Changes', 'googl-api-key' ); ?>"/>
									</p><?php
									$forum_link = 'https://wordpress.org/support/plugin/googl-api-key'
									?>
									<p> <?php $forum_link_text = sprintf( __( 'If you are having any difficulty, please post your issue in the <a href=%s>support forum</a>, where I actively help!', 'googl-api-key' ), esc_url( $forum_link ) );
										echo $forum_link_text; ?>
									</p>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	<?php

}

