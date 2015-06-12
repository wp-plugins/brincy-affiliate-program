<?php
/*

**************************************************************************

Plugin Name:  Brincy Affiliate Program
Plugin URI:   https://www.brincy.com/affiliates/
Description:  Make money with your website using brincy.
Version:      1.0.1
Author:       damland
Author URI:   https://www.brincy.com/members/brincy/
Text Domain:  brincy-affiliates
Domain Path:  /lang/

**************************************************************************

	Copyright 2015  Brincy  (email : damturbo@yahoo.com)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as 
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

**************************************************************************/

define("BRINCY_PLUGIN_URL", plugin_dir_url( __FILE__ ));
define("BRINCY_FULL_DIR", plugin_dir_path( __FILE__ ));
define("BRINCY_TEXT_DOMAIN", "brincy-affiliates");

/* Plugin Localize */
function brincy_load_plugin_textdomain() {
	load_plugin_textdomain(BRINCY_TEXT_DOMAIN, false, dirname(plugin_basename( __FILE__ )).'/lang/');
}
add_action('plugins_loaded', 'brincy_load_plugin_textdomain');

include_once BRINCY_FULL_DIR."banners.php";

/* Add Links to Plugins Management Page */
function brincy_action_links($links){
	$links[] = '<a href="'.get_admin_url(null, 'options-general.php?page='.BRINCY_TEXT_DOMAIN.'-banners').'">'.__("Banners", BRINCY_TEXT_DOMAIN).'</a>';
	return $links;
}
add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'brincy_action_links');

function brincy_enqueue_styles_frontend(){
	wp_enqueue_style(BRINCY_TEXT_DOMAIN, BRINCY_PLUGIN_URL.'style.css');
}
function brincy_enqueue_styles_admin(){
	wp_enqueue_style(BRINCY_TEXT_DOMAIN, BRINCY_PLUGIN_URL.'style.css');
}
//add_action('wp_enqueue_scripts', 'brincy_enqueue_styles_frontend');
add_action('admin_enqueue_scripts', 'brincy_enqueue_styles_admin');

function brincy_banners($atts, $content = null){
	// Attributes
	extract( shortcode_atts(
		array(
			'type' => '',
			'width' => '',
			'refid' => '',
		), $atts )
	);
	// Code
	switch ($type) {
		case 'girls':
			$girln=mt_rand(1,3);
			if (!isset($girln)) { $girln = "1"; }
			if ($width=="medium") {$dbheight="300px";$dbwidth="300px";}
			elseif ($width=="big") {$dbheight="600px";$dbwidth="600px";}
			elseif ($width=="small") {$dbheight="150px";$dbwidth="150px";}
			elseif ($width=="") {$dbheight="100%";$dbwidth="100%";}
			else  {$dbheight=$width.'px';$dbwidth=$width.'px';}
			return '<iframe style="height:'.$dbheight.' !important;width:'.$dbwidth.' !important;" id="brincygirls" name="brincygirls" src="https://www.brincy.link/ap/girls/girl'.$girln.'.php?refid='.$refid.'" marginheight="0" marginwidth="0" frameborder="no" scrolling="no" allowtransparency="true"></iframe>';
		break;
		case 'roulette':
			if ($width=="medium") {$dbheight="290px";$dbwidth="900px";}
			elseif ($width=="big") {$dbheight="413px";$dbwidth="1280px";}
			elseif ($width=="small") {$dbheight="479px";$dbwidth="400px";}
			elseif ($width=="") {$dbheight="100%";$dbwidth="100%";}
			else  {
if ($width <= "350") { $dbheight = '425px'; $dbwidth = '350px';  }
else if ($width <= "400") { $dbheight = '479px'; $dbwidth = $width.'px'; }
else if ($width <= "450") { $dbheight = '533px'; $dbwidth = $width.'px'; }
else if ($width <= "500") { $dbheight = '587px'; $dbwidth = $width.'px'; }
else if ($width <= "550") { $dbheight = '639px'; $dbwidth = $width.'px'; }
else if ($width <= "600") { $dbheight = '693px'; $dbwidth = $width.'px'; }
else if ($width <= "650") { $dbheight = '747px'; $dbwidth = $width.'px'; }
else if ($width <= "700") { $dbheight = '801px'; $dbwidth = $width.'px'; }
else if ($width <= "760") { $dbheight = '816px'; $dbwidth = $width.'px'; }
else if ($width <= "800") { $dbheight = '258px'; $dbwidth = $width.'px'; }
else if ($width <= "900") { $dbheight = '290px'; $dbwidth = $width.'px'; }
else if ($width <= "1024") { $dbheight = '330px'; $dbwidth = $width.'px'; }
else if ($width <= "1280") { $dbheight = '413px'; $dbwidth = $width.'px'; }
else if ($width >= "1281") { $dbheight = '413px'; $dbwidth = '1280px'; }
else { $dbheight = '290px'; $dbwidth = '900px'; }
				  }
			return '<iframe style="height:'.$dbheight.' !important;width:'.$dbwidth.' !important;" id="brincyroulette" name="brincyroulette" src ="https://www.brincy.link/ap/roulette/?refid='.$refid.'" marginheight="0" marginwidth="0" frameborder="no" scrolling="no" allowtransparency="true"></iframe>';
		break;
		default:
			if ($width=="medium") {$dbheight="250px";$dbwidth="300px";}
			elseif ($width=="big") {$dbheight="180px";$dbwidth="728px";}
			elseif ($width=="small") {$dbheight="120px";$dbwidth="468px";}
			elseif ($width=="") {$dbheight="100%";$dbwidth="100%";}
			else  {$dbheight=$width.'px';$dbwidth=$width.'px';}
			return '<iframe style="height:'.$dbheight.' !important;width:'.$dbwidth.' !important;" id="brincymap" name="brincymap" src ="https://www.brincy.link/ap/map/?refid='.$refid.'" marginheight="0" marginwidth="0" frameborder="no" scrolling="no" allowtransparency="true"></iframe>';
		break;
	}
}
add_shortcode('brincy', 'brincy_banners');
