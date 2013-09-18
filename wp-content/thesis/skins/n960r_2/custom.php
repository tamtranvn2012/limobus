<?php
/*
	This file is for skin specific customizations. Be careful not to change your skin's skin.php file as that will be upgraded in the future and your work will be lost.
	If you are more comfortable with PHP, we recommend using the super powerful Thesis Box system to create elements that you can interact with in the Thesis HTML Editor.
*/
add_action( 'init', function() {
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure( '/%postname%/' );
} );

function addMyRewrite() {
    add_rewrite_tag('%bus_id_para%', '([^&]+)');
    add_rewrite_rule('bus-details/(.*)/?', 'index.php?pagename=bus-details&bus_id_para=$matches[1]', 'top');
    //flush_rewrite_rules();
}
add_action('init', 'addMyRewrite');

function my_wpcf7_save($cfdata) {

	$formtitle = $cfdata->title;
	$formdata = $cfdata->posted_data;	

	$uploads = wp_upload_dir();


 

		// access data from the submitted form

		$formfield = $formdata['post'];

 

		// create a new post

	$my_post = array(
	  'post_title'    => $formdata['emails'],
	  'post_content'  => 'tran thien thanh',
	  'post_status'   => 'publish',
	  'post_type'     => 'send_mail',
	  'post_author'   => 1,
	  );
		 

		$newpostid = wp_insert_post($my_post);

		// add meta data for the new post

		add_post_meta($newpostid, 'servicetype', $formdata['serviceType']);
		add_post_meta($newpostid, 'passengers', $formdata['passengers']);
		add_post_meta($newpostid, 'contactformdatepicker', $formdata['contactformdatepicker']);
		add_post_meta($newpostid, 'timefrom', $formdata['timefrom']);
		add_post_meta($newpostid, 'pick', $formdata['pick']);
		add_post_meta($newpostid, 'destination', $formdata['destination']);
		add_post_meta($newpostid, 'emailadd', $formdata['emails']);
		add_post_meta($newpostid, 'phones', $formdata['phones']);
		
		$str='File contact';
		//gui mail
		$attachments = array( WP_CONTENT_DIR . '/uploads/a.xls',WP_CONTENT_DIR . '/uploads/start.jpg' );
		$headers = 'From: Price4limo <kurotsmile2@gmail.com>' . "\r\n";
		wp_mail($formdata['emails'], 'Price4limo', $str, $headers, $attachments );
		
	
}

add_action('wpcf7_before_send_mail', 'my_wpcf7_save',1);