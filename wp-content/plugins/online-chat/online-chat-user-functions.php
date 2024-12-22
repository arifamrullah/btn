<?php


add_action('wp', 'oc_update_online_users_status');
add_action('admin_init', 'oc_update_online_users_status');
add_action('clear_auth_cookie', 'oc_update_user_logout');

function oc_update_user_logout(){
	global $oc_session_key;
	
	$current_user = get_current_user_id();
	
	if(($logged_in_users = get_transient('oc_users_online')) === false) $logged_in_users = array();
	
	if(isset($logged_in_users[$current_user])){
		unset($logged_in_users[$current_user]);
		set_transient('oc_users_online', $logged_in_users, 30 * 60);
	}
	if(!empty($_SESSION[$oc_session_key])){
		unset($_SESSION[$oc_session_key]);
	}
}


function oc_update_online_users_status(){

  if(is_user_logged_in()){
	
    // get the online users list
    if(($logged_in_users = get_transient('oc_users_online')) === false) $logged_in_users = array();

    $current_user = wp_get_current_user();
    $current_user = $current_user->ID;  
    $current_time = current_time('timestamp');

    if(!isset($logged_in_users[$current_user]) || ($logged_in_users[$current_user] < ($current_time - (15 * 60)))){
      
      $logged_in_users[$current_user] = $current_time;
      set_transient('oc_users_online', $logged_in_users, 30 * 60);
    }

  }
}

function oc_update_users_status_now(){
	if(is_user_logged_in()){
	
    // get the online users list
    if(($logged_in_users = get_transient('oc_users_online')) === false) $logged_in_users = array();

    $current_user = wp_get_current_user();
    $current_user = $current_user->ID;  
    $current_time = current_time('timestamp');
    $logged_in_users[$current_user] = $current_time;
     set_transient('oc_users_online', $logged_in_users, 30 * 60);
  }

}

function oc_is_user_online($user_id) {

  // get the online users list
  $logged_in_users = get_transient('oc_users_online');
  //
  // online, if (s)he is in the list and last activity was less than 15 minutes ago
  return isset($logged_in_users[$user_id]) && ($logged_in_users[$user_id] > (current_time('timestamp') - (15 * 60)));
}

function oc_get_online_users() {
	if(($logged_in_users = get_transient('oc_users_online')) === false) $logged_in_users = array();
	return $logged_in_users;

}


function oc_user_last_activity($user_id){
	$logged_in_users = get_transient('oc_users_online');
	return isset($logged_in_users[$user_id]);
}