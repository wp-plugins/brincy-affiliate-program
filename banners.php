<?php
function brincy_register_options_page() {
	add_submenu_page('options-general.php',__('Brincy Affiliates', BRINCY_TEXT_DOMAIN), __('Brincy Affiliates', BRINCY_TEXT_DOMAIN), 'manage_options', BRINCY_TEXT_DOMAIN.'-banners', 'brincy_banners_page');
}
add_action('admin_menu', 'brincy_register_options_page');

function brincy_banners_page() {
?>
<div id="brincy-affiliates">
	<h2><?php _e("Brincy Affiliate Program", BRINCY_TEXT_DOMAIN); ?></h2>
	<div class="brincy-page">
		<?php settings_fields('brincy_options'); ?>
		<h3><?php _e("Shortcode Usage", BRINCY_TEXT_DOMAIN); ?></h3>
		<p><?php _e("You may add following short code to your post or using the Text widget as sidebar.", BRINCY_TEXT_DOMAIN); ?></p>
		<div>
						<div class="shortcode_quoteby">
						<div class="shortcode_quotebyauthor">Map</div>
						<center>
						<?php echo do_shortcode( '[brincy type="map" refid="0" width="medium"]' ); ?><br />
						<textarea class="webmastercode">[brincy type="map" refid="YOURID" width="medium"]</textarea><br />
						</center></div>
			<div class="padding-bottom"></div>
						<div class="shortcode_quoteby">
						<div class="shortcode_quotebyauthor">Girls</div>
						<center>
						<?php echo do_shortcode( '[brincy type="girls" refid="0" width="300"]' ); ?><br />
						<textarea class="webmastercode">[brincy type="girls" refid="YOURID" width="300"]</textarea><br />
						</center></div>
			<div class="padding-bottom"></div>
						<div class="shortcode_quoteby">
						<div class="shortcode_quotebyauthor">Roulette</div>
						<center>
						<?php echo do_shortcode( '[brincy type="roulette" refid="0" width="small"]' ); ?><br />
						<textarea class="webmastercode">[brincy type="roulette" refid="YOURID" width="small"]</textarea><br />
						</center></div>
		</div>
	</div>
</div>
<?php
}
?>