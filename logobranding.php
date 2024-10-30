<?php
/*
Plugin Name: Logo Branding Tool
Plugin URI:  http://www.martinglover.co.uk/?page_id=183
Description: Plugin to change your Wordpress login page logo to allow you to add branding to your site.
Author: Martin Glover
Version: 1.0
Author URI: http://www.martinglover.co.uk

Copyright 2010 Martin Glover  http://www.martinglover.co.uk

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA


*/ 

// Addition To Options List
add_action('admin_menu', 'logo_branding');

function logo_branding() {
    // Adds Options Submenu:
    add_options_page('Logo Branding Tool', 'Logo Branding Tool', 8, 'loginlogo', 'login_logo');

add_option('imgurl', '');
}

add_action('login_head','add_img_url');

function add_img_url() { ?>
<?php $imgurl = get_option('imgurl'); ?>
<style type="text/css">
h1 a { background: url(<?php echo $imgurl; ?>) no-repeat center center; margin-bottom: 20px; padding: 0px; height: 100px; width: 300px; }
</style>
<? }

function login_logo() { ?>
<style type="text/css">

</style>
<div class="wrap">
	<form method="post" action="options.php" id="dans-options">
		<?php wp_nonce_field('update-options') ?>
		
		<h2>Logo Branding Tool</h2>
		<p>This plugin allows you to change the logo that appears on your WordPress login page.</p>
		<p><a href="http://www.andthenhost.com" title="Low Cost Wordpress Webhosting" target="_blank">Get cheaper WordPress hosting today from only 1.49 per month</a></p>
	  <p><strong>Maximum Dimensions:</strong> 300px by 100px</p>
		<p><a href="http://www.martinglover.co.uk" target="_blank"><img src="http://www.martinglover.co.uk/dimensions.gif" alt="logo dimensions" lowsrc="http://www.martinglover.co.uk" /></a></p>
		
	  <h3>Step One: Upload your image to your media store</h3>
	  <iframe id="uploading" name="uploading" style="border:1px solid #ccc;" src="media-upload.php?style=inline"></iframe>
		
		<h3>Step Two: Paste the Link URL to the image in the box below</h3>
		<input type="text" name="imgurl" value="<?php echo get_option('imgurl'); ?>" style="padding:4px; font-size:1em;" size="50" />
		
		<h3>Step Three: Click 'Update Logo'</h3>		
		
		<input type="hidden" name="action" value="update" />
		<input type="hidden" name="page_options" value="imgurl" />
		<div style="clear:both;padding-top:0px;"></div>
		<p class="submit"><input type="submit" name="Submit" value="<?php _e('Update Logo') ?>" /></p>
		<div style="clear:both;padding-top:20px;"></div>
	</form>
</div>

<? } ?>