<?php
/*
Plugin Name: BTN Chat
Description: Chat with site users and visitors
*/

if (!session_id()) session_start();

global $oc_db_version;
global $oc_tables;
global $oc_session_key;
global $oc_transient_key;
global $oc_settings;
global $oc_enabled;
global $oc_user_fields;
global $oc_last_message_id;
global $oc_online_users;

$oc_last_message_id = 0;		
$oc_db_version = "1.0";
$oc_session_key = 'oc_data';
$oc_transient_key = 'oc_data_clean';
$oc_tables = array(
	'visitors' => 'oc_visitors',
	'chats' => 'oc_chats',
	'messages' => 'oc_messages'
	);

$status_array = array('Available', 'Busy / Offline To Customer');

include_once('online-chat-user-functions.php');
include_once('online-chat-functions.php');
include_once('online-chat-admin.php');
include_once('online-chat-options.php');
include_once('online-chat-manager.php');

add_action('admin_enqueue_scripts', 'oc_load_scripts');
add_action('wp_enqueue_scripts', 'oc_load_scripts');

function oc_footer_function() {
    ?>
		<script type="text/javascript">

			jQuery(document).ready(function() {
			    jQuery('#datepicker_oc_from').datepicker({
			        dateFormat : 'yy-mm-dd',
			        
			        onClose: function( selectedDate ) {
						jQuery( "#datepicker_oc_to" ).datepicker( "option", "minDate", selectedDate );
					}

			    });
			    jQuery('#datepicker_oc_to').datepicker({
			        dateFormat : 'yy-mm-dd',			        
			        onClose: function( selectedDate ) {
						jQuery( "#datepicker_oc_from" ).datepicker( "option", "maxDate", selectedDate );
					}

			    });
			});

		</script>

    <?php
}
add_action('admin_footer', 'oc_footer_function', 100);

function oc_load_scripts() {
	global $oc_enabled,$oc_user_fields,$oc_last_message_id, $status_array;

	if(oc_should_render()){
		wp_register_script('OcEasing', plugins_url( 'js/libs/jquery.easing.1.3.js' , __FILE__ ), array('jquery'));
	    wp_register_script('OcJs', plugins_url( 'js/online-chat.js' , __FILE__ ),array('jquery','OcEasing'));
	    wp_register_script('OcJs2', plugins_url( 'js/libs/jquery.titlealert.js' , __FILE__ ),array('jquery'));
	    wp_register_script('OcJs3', plugins_url( 'js/libs/notification.js' , __FILE__ ),array('jquery'));
	    wp_register_style('OcCss', plugins_url( 'css/online-chat.css' , __FILE__ ));
	    wp_enqueue_script('jquery');
	    wp_enqueue_script( 'OcEasing' );
	    wp_enqueue_script( 'OcJs' );
	    wp_enqueue_script( 'OcJs2' );
	    wp_enqueue_script( 'OcJs3' );
	    wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
	    $online_users = oc_get_online_chat_users();
	    $messages = oc_get_user_messages();
	    $ajax = array( 
	    	'users' => $online_users,
	    	'options' => oc_get_user_options(),
	    	'messages' => ($messages) ? $messages : array(),
	    	'settings' => array(
	    		'time' => current_time('timestamp'),
	    		'inactive_limit' => oc_get_option('user_idle'),
	    		'enable_sounds' => oc_get_option('enable_sounds'),
	    		'uri' => plugin_dir_url(__FILE__),
	    		'enabled' => $oc_enabled,
	    		'logged_in' => is_user_logged_in(),
	    		'ajaxurl' => admin_url( 'admin-ajax.php' ),
	    		'interval' => intval(oc_get_option('ping_interval')) * 100,
	    		'ping_limit' => oc_get_option('ping_timeout'),
	    		'fields' => $oc_user_fields,
	    		'last_message_id' => $oc_last_message_id,
	    		'chatting_prefix' => __('Chating with: ', 'online-chat'),
	    		'online_text' => __('Type you message', 'online-chat'),
	    		'offline_text' => __('User is offline', 'online-chat'),
	    		'status_list' => $status_array,
	    		'admin_bar' => is_admin_bar_showing()
	    		
	    	),
	    	
	    );
	
	    wp_localize_script( 'OcJs', 'OcAjax', $ajax );
	    if(!current_user_can('oc_can_chat') && !is_admin_bar_showing()){
	    	wp_enqueue_style('OcCss');
	    } else {
	    	oc_admin_styles();
	    }
	    
    }
}

add_action( 'init','oc_init',1);

if (!function_exists('oc_init')) {
	function oc_init(){
		global $oc_enabled,$oc_transient_key;
		
	 	$oc_enabled = oc_is_enabled();
	 	if( !( $our_data = get_transient($oc_transient_key) ) ) {	
			oc_clean_user_messages();
		    set_transient($oc_transient_key, time(), (60 * 60 * 24) );
		}
    }
}


//register_activation_hook(__FILE__,'oc_install');

function oc_install(){
	global $oc_tables, $wpdb, $oc_db_version, $oc_role_caps;
	
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	
	$usersSql = "CREATE TABLE " . $wpdb->prefix . $oc_tables['visitors'] . " (
	  id mediumint(9) NOT NULL AUTO_INCREMENT,
	  session_hash VARCHAR(255) NOT NULL,
	  created datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
	  last_activity datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,	  
	  ip VARCHAR(55) NOT NULL,
	  user_agent VARCHAR(255) NOT NULL,
	  country VARCHAR(10) DEFAULT '' NOT NULL,
	  name tinytext NOT NULL,
	  email VARCHAR(55) DEFAULT '' NOT NULL,
	  nasabah VARCHAR(55) DEFAULT '' NOT NULL,
	  meta LONGTEXT DEFAULT '' NOT NULL,
	  save_visitor tinyint(1) NOT NULL default '0',
	  UNIQUE KEY id (id)
	);";
	
	dbDelta($usersSql);
		
	$messagesSql = "CREATE TABLE " . $wpdb->prefix . $oc_tables['messages'] . " (
	  id mediumint(9) NOT NULL AUTO_INCREMENT,
	  sender_id mediumint(9) NOT NULL,
	  sender_is_visitor tinyint(1) NOT NULL default '0',
	  recipient_id mediumint(9) NOT NULL,
	  recipient_is_visitor tinyint(1) NOT NULL default '0',
	  is_read tinyint(1) NOT NULL default '0',
	  send_time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
	  message text NOT NULL,
	  UNIQUE KEY id (id)
	);";
	
	dbDelta($messagesSql);
	
	add_option("oc_db_version", $oc_db_version);
	$role = get_role('administrator');
	$role->add_cap('oc_can_chat');
}
?>