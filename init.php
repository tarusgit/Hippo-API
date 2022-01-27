<?php
/*
Plugin Name: Hippo Wordpress Plugin
Plugin URI: 
Description: Basically through this plugin create a frontend Hippo form through shortcode which is [add_hippo_form] and send all data
 through api and get output. 
Version: 1.0
Author: Hippo
Author URI: 
*/
register_activation_hook( __FILE__, 'hippo_form_install' );
function hippo_form_install(){
	
	$add_form = array(
      'post_title'    => wp_strip_all_tags( 'Hippo Form' ),
      'post_content'  => '[add_hippo_form]',
      'post_status'   => 'publish',
      'post_author'   => 1,
      'post_type'     => 'page',
    );

    wp_insert_post($add_form);
	$thank_you = array(
      'post_title'    => wp_strip_all_tags( 'Hippo Thankyou' ),
      'post_content'  => '[hippo_thank_you]',
      'post_status'   => 'publish',
      'post_author'   => 1,
      'post_type'     => 'page',
    );

    wp_insert_post( $thank_you );
}
function delete_plugin_pages(){

	global $wpdb; 

	$pageone = get_page_by_title('PHippo Form');

	wp_delete_post ($pageone->ID, true);

	$pagetwo = get_page_by_title('Hippo Thankyou');

	wp_delete_post ($pagetwo->ID, true);

}
	
register_deactivation_hook(__FILE__, 'delete_plugin_pages');
add_action( 'init', 'process_post' );

function process_post() {
	
	ob_start();
	
	add_shortcode('add_hippo_form', 'add_hippo_form_function');
	
	add_shortcode('hippo_thank_you', 'hippo_thank_you_function');
	
	return ob_get_clean();
}
function add_hippo_form_function()
{
	ob_start();
	
	include( plugin_dir_path( __FILE__ ) . 'hippo_form.php');	
	
	return ob_get_clean();
}
function hippo_thank_you_function()
{
	ob_start();
	
	include( plugin_dir_path( __FILE__ ) . 'hippo_form_thankyou.php');	
	
	return ob_get_clean();
}
add_action( 'admin_menu', 'hippo_api_setting' );
function hippo_api_setting() {
	add_menu_page( 'Hippo APi Settings', 'Hippo APi Setting', 'manage_options', 'api_settings', 'hippoform_settings', 'dashicons-upload', 112 );
}
function hippoform_settings(){
    if(isset($_POST['hippo_api'])){  
        $hippo_auto_token =$_POST['hippo_auto_token'];
        $hippo_api_url =$_POST['hippo_api_url'];
        $hippo_thank_you_page =$_POST['hippo_thank_you_page'];
        update_option( 'hippo_auto_token',$hippo_auto_token ); 
        update_option( 'hippo_api_url',$hippo_api_url ); 
        update_option( 'hippo_thank_you_page',$hippo_thank_you_page ); 
	}	
	
?>
    <div class="user_referral">   
        <h2>Hippo Auth Setting</h2>      
        <form method="post"> 
	        <div class="alignleft actions" style="width: 750px;">		
				<div class="field_wrapper">
					<table>
						<th>Auth Token</th>
					   <tr>
							<td>
								<input type="text" name="hippo_auto_token" style="width: 1050px;" value="<?php echo get_option( 'hippo_auto_token'); ?>">
							</td>
						</tr>
						<th>API URL</th>
						<tr>
							<td>
								<input type="text" name="hippo_api_url" style="width: 1050px;" value="<?php echo get_option( 'hippo_api_url'); ?>">
							</td>
						</tr>
						<th>Thank you Page Url</th>
						<tr>
							<td>
								<input type="text" name="hippo_thank_you_page" style="width: 1050px;" value="<?php echo get_option( 'hippo_thank_you_page'); ?>">
							</td>
						</tr>
					</table>
				</div>	
				<br>
				<input type="submit" name="hippo_api" id="filterdate" class="button" value="Submit">
		    </div>	
		</form>		
    </div>
<?php	
}
