<?php


function oc_is_enabled(){
	global $oc_session_key;
	
	if(!current_user_can('oc_can_chat')){
	
		if(oc_get_option('visitors_enabled') && !empty($_SESSION[$oc_session_key]['id'])){
			return TRUE;
		} else {
			return FALSE;
		}
		
	} else {
		return TRUE;
	}
}

function oc_should_render(){
	$visitors_enabled = oc_get_option('visitors_enabled');
	
	if(current_user_can('oc_can_chat') || $visitors_enabled){
		return TRUE;
	} else {
		return FALSE;
	}
}

function oc_end_chat(){

}

function oc_get_online_chat_users(){
	global $wpdb,$oc_tables, $oc_online_users;
			$all_users = array();			
			$is_user = current_user_can('oc_can_chat');
			$status_limit = $is_user ? 3 : 2;			
			$online_users = oc_get_online_users(); //get_users(array('role' => 'chamameOperator'));//oc_get_online_users();
			$include = array();
			$current_user_id = get_current_user_id();			
			foreach($online_users as $k=>$v){				
				if($v > (current_time('timestamp') - (15 * 60)) && $current_user_id != $k){
					array_push($include,$k);
				}
			}
			
			$args = array(
				'fields' => array(
						'ID', 'display_name'
				),
				'include' => $include,
				//'role' => 'chamameOperator'
			);
			
			$users = (!empty($include))? get_users($args) : $include;
			//print_r($users);
			if(!empty($users)){
				$user_array = array();
				foreach ($users as $k => &$user){
					 if(!user_can( $user->ID, 'oc_can_chat' )){
					 	unset($users[$k]);
					 } else {
					 	$user_status = get_user_meta( $user->ID, 'oc_user_status', true );
					 	$user_status = (!empty($user_status)) ? intval($user_status) : 0;
					 	
					 	if($user_status < $status_limit){
					 		if(function_exists('get_cupp_meta')){
					 			$imgURL = '<img class="content" src="'.get_cupp_meta($user->ID, array('284','367')).'"/>';
					 		}else{
					 			$imgURL = get_avatar($user->ID, 113);
					 		}
						 	$user_data = array(
										'id' => intval($user->ID),
										'status' => intval($user_status),
										'last_activity' => $online_users[$user->ID],
										'display_name' => $user->display_name,
										'gravatar' => $imgURL,
										'is_visitor' => FALSE
									
									);
							$user_array[] = $user_data;
						 } else {
						 	unset($users[$k]);
						 }			 
					 }
				
				
				}
				$all_users = $user_array;
				
			}

			if($is_user && oc_get_option('visitors_enabled')){
				
				$visitor_timeout = intval(oc_get_option('visitor_timeout'));
				
				$visitors_table = $wpdb->prefix . $oc_tables['visitors'];
				$messages_table = $wpdb->prefix . $oc_tables['messages'];
				$session_expire_time = time() - (session_cache_expire() * 60);
				$visitor_timeout_time = time() - ($visitor_timeout * 60);
				$idle_time = ($visitor_timeout) ? $visitor_timeout_time : $session_expire_time;
				$idle_limit = date( 'Y-m-d H:i:s', $idle_time );
				$query = "SELECT {$visitors_table}.* , m.send_time AS last_message_time, m.id AS message_id
				  	FROM {$visitors_table}
				  	LEFT JOIN (
				  		SELECT m_1.*
				  		FROM {$messages_table} as m_1
				  		LEFT JOIN {$messages_table} AS m_2
				  			ON m_1.sender_id = m_2.sender_id AND m_1.sender_is_visitor ='1' AND m_2.sender_is_visitor = '1' AND m_1.send_time < m_2.send_time
				  			WHERE m_2.sender_id IS NULL) AS m
				  	ON ( {$visitors_table}.id = m.sender_id AND m.sender_is_visitor = '1' )
				  	WHERE {$visitors_table}.session_hash != '' AND {$visitors_table}.last_activity > '{$idle_limit}'
				  	";				  			 
		 
				$results =  $wpdb->get_results($wpdb->prepare($query,''));
				if($results){
					foreach($results as $visitor){
						$display_name = (!empty($visitor->name)) ? $visitor->name : (!empty($visitor->email)) ? $visitor->name : $visitor->ip;

						$visitor_data = array(
										'id' => intval($visitor->id),
										'ip' =>  $visitor->ip,
										'last_activity' => strtotime($visitor->last_activity),
										'country' =>  $visitor->country,
										'display_name' => $display_name,
										'gravatar' => get_avatar($visitor->email, 113),
										'is_visitor' => TRUE
									
									);
							$all_users[] = $visitor_data;	
					}
				}
			}
			$oc_online_users = $all_users;
			return $all_users;

}

function oc_add_guest_client($fields = array()){
	global $wpdb,$oc_tables, $oc_session_key, $oc_user_fields;
		$validFields = array();
		
		foreach($oc_user_fields as $v){
			if($v['required'] && empty($fields[$v['name']])){
				return FALSE;
			}
			
			if(!empty($fields[$v['name']]) && !is_array($fields[$v['name']])){
				if($v['name'] === 'email' && !is_email($fields[$v['name']])){
					return FALSE;
				}
				
				
				$validFields[$v['name']] = wp_kses($fields[$v['name']], array());
			}
		
		}
		
		$name = '';
		$email = '';
		$nasabah = '';
		$meta = array();
		
		foreach($validFields as $k => $v){
			if($k === 'name') {
				$name = $v;
			} elseif ($k === 'email') {
				$email = $v;
			} elseif ($k === 'nasabah') {
				$nasabah = $v;
			} else {
				$meta[$k] = $v;
			}
		}
		unset($validFields);
		$meta = (!empty($meta)) ? serialize($meta) : '';
		$ip = $_SERVER['REMOTE_ADDR'];
		
		$country = trim(file_get_contents('http://api.wipmania.com/'.$ip));
		$country = (strlen($country) == 2 && $country !== 'XX') ? $country : '';
		
		$visitor_hash = oc_random_hash($ip);
		$data = array( 
			'created' => current_time('mysql'),
			'last_activity' => current_time('mysql'), 
			'session_hash' => $visitor_hash,
			'ip' => $ip,
			'country' => $country,
			'user_agent' => $_SERVER['HTTP_USER_AGENT'],
			'name' => $name,
			'nasabah' => $nasabah,
			'email' => $email,
			'meta' => $meta
		);
		
		$rows_affected = $wpdb->insert(  $wpdb->prefix . $oc_tables['visitors'], $data );
		
		if($rows_affected){
			$session_data = array(
				'id' => $wpdb->insert_id,
				'created' => current_time('timestamp'),
				'last_activity' => current_time('timestamp'),
				'ip' => $ip,
				'session_hash' => $visitor_hash,
				'options' => array(
					'gravatar' => get_avatar($email,113),
					'name' => (!empty($name)) ? $name : $ip,
					'email' => $email,
					'nasabah' => $nasabah,
					'is_visitor' => TRUE,
					'visible' => TRUE
				)
			);
			
			$_SESSION[$oc_session_key] = $session_data;
		}
		
		return ($rows_affected) ? $session_data['options'] : FALSE;
}

function oc_session_validate() {
	global $wpdb,$oc_session_key,$oc_tables;
	
	if(current_user_can('oc_can_chat')){
		return TRUE;
	}
	$visitors_table = $wpdb->prefix . $oc_tables['visitors'];
	if(empty($_SESSION[$oc_session_key]['id']) || empty($_SESSION[$oc_session_key]['session_hash'])){
		return FALSE;
	}
	$ip = $_SERVER['REMOTE_ADDR'];
	$id = intval($_SESSION[$oc_session_key]['id']);
	$hash = $_SESSION[$oc_session_key]['session_hash'];
	$valid =  $wpdb->update($visitors_table, 
		array('last_activity' => current_time('mysql')),
		array('id' => $id,'session_hash' => $hash, 'ip' => $ip)
		);
	
	if($valid){
		if(time() - $_SESSION[$oc_session_key]['created'] > 1800){
			session_regenerate_id(true);
			$_SESSION[$oc_session_key]['created'] = time();
		}
		$_SESSION[$oc_session_key]['last_activity'] = current_time('timestamp');
		return TRUE;
	} else {
		unset($_SESSION[$oc_session_key]);
		return FALSE;
	}	
}

function oc_boolean($value) {
   if ($value && strtolower($value) !== "false") {
      return true;
   } else {
      return false;
   }
}

function oc_post_message($to, $message, $to_visitor = FALSE){
	global $wpdb,$oc_tables, $oc_session_key, $oc_enabled;
		
		if(!$oc_enabled){return FALSE;}
		
		if(!oc_session_validate()){ return FALSE;}
		
		oc_update_users_status_now();
		
		$messages_table = $wpdb->prefix . $oc_tables['messages'];
		$from_visitor = TRUE;
		
		if ( $user = get_current_user_id() ) {
			$from_visitor = FALSE;
		} else {			
			$user = $_SESSION[$oc_session_key]['id']; 
		}
		
		$data = array(
			'sender_id' => intval($user),
			'sender_is_visitor' => (bool) $from_visitor,
			'send_time' => current_time('mysql'),
			'recipient_id' => intval($to),
			'recipient_is_visitor' => (bool) $to_visitor,
			'is_read' => FALSE,
			'message' => $message
		);
		$rows_affected = $wpdb->insert($messages_table, $data);
		
		return $rows_affected ? $wpdb->insert_id : FALSE;
}

function oc_clean_user_messages(){
	global $wpdb,$oc_tables, $oc_session_key, $oc_enabled;
		$clean_limit = intval(oc_get_option('clean_messages'));
		$clean_visitors = oc_get_option('visitor_clean');

		if($clean_limit){
			$time_limit = date( 'Y-m-d H:i:s', ( time() - ($clean_limit * 60 * 60) ) );
				
			$messages_table = $wpdb->prefix . $oc_tables['messages'];
			$visitors_table = $wpdb->prefix . $oc_tables['visitors'];
		
			$query = "
				DELETE ctb
				FROM {$messages_table} ctb
				LEFT JOIN {$visitors_table} stb
					ON ( stb.id = ctb.sender_id AND ctb.sender_is_visitor = '1')
				LEFT JOIN {$visitors_table} rtb
					ON ( rtb.id = ctb.recipient_id AND ctb.recipient_is_visitor = '1')
				WHERE (COALESCE(stb.save_visitor,0) < '1' AND COALESCE(rtb.save_visitor,0) < '1')
				AND send_time < '{$time_limit}'";
			
			$wpdb->query($wpdb->prepare($query,''));
			
			if($clean_visitors){
				$query = "
					DELETE FROM {$visitors_table}
					WHERE save_visitor != '1'
					AND last_activity < '{$time_limit}'";			
				
				$wpdb->query($wpdb->prepare($query,''));
			}
		}
}

function oc_get_user_messages($last_id = NULL, $archive = FALSE){
	global $wpdb,$oc_tables, $oc_session_key, $oc_enabled, $oc_online_users, $oc_last_message_id;
	
	if(!$oc_enabled){
		return FALSE;
	}
		$messages_table = $wpdb->prefix . $oc_tables['messages'];
		$visitors_table = $wpdb->prefix . $oc_tables['visitors'];
		$is_visitor = TRUE;
		if ( $user = get_current_user_id() ) {
			$is_visitor = FALSE;
		} else {
			$user = $_SESSION[$oc_session_key]['id'];
		}
		
		$query = "SELECT {$messages_table}.*, 
				  visitor_sender.id AS visitor_sender_id, visitor_sender.ip AS visitor_sender_ip, visitor_sender.name AS visitor_sender_name, visitor_sender.email AS visitor_sender_email, visitor_sender.country AS visitor_sender_country,
				  visitor_recipient.id AS visitor_recipient_id,  visitor_recipient.ip AS visitor_recipient_ip, visitor_recipient.name AS visitor_recipient_name, visitor_recipient.email AS visitor_recipient_email, visitor_recipient.country AS visitor_recipient_country
				  FROM {$messages_table}
				  LEFT JOIN {$visitors_table} as visitor_sender
				  	ON ( sender_id = visitor_sender.id AND sender_is_visitor = '1' )
				  LEFT JOIN {$visitors_table} visitor_recipient
				  	ON ( recipient_id = visitor_recipient.id AND recipient_is_visitor = '1' )";
				  			 
		if($last_id){
			$last_id = intval($last_id);
			$query .= "WHERE (( sender_id = '{$user}' AND sender_is_visitor = '{$is_visitor}' )
					 		OR ( recipient_id = '{$user}' AND recipient_is_visitor = '{$is_visitor}' ))
						AND {$messages_table}.id > {$last_id} ";
		} else {
			$query .= "WHERE ( sender_id = '{$user}' AND sender_is_visitor = '{$is_visitor}' )
					 	OR ( recipient_id = '{$user}' AND recipient_is_visitor = '{$is_visitor}' ) ";
		}
					 
		$query .="ORDER BY id ASC";
			 
		$results =  $wpdb->get_results($wpdb->prepare($query,''));
		
		if($results){
			$threads = array();
			$adminKey = 0;
			
			foreach($results as $chat){
				
				$messageDirection = 'in';
				
				if(intval($chat->sender_id) == $user && $chat->sender_is_visitor == $is_visitor){
					$other_id = $chat->recipient_id;
					$other_is_visitor = $chat->recipient_is_visitor;
					$other_ip = $chat->visitor_recipient_ip;
					$other_country = $chat->visitor_recipient_country;
					$uniqueString = $chat->recipient_id.'-'.$chat->recipient_is_visitor;
					$messageDirection = 'out';
					$other_email = $chat->visitor_recipient_email;
					$other_name = $chat->visitor_recipient_name;
				} else {
					$other_id = $chat->sender_id;
					$other_is_visitor = $chat->sender_is_visitor;
					$uniqueString = $chat->visitor_sender_id.'-'.$chat->sender_is_visitor;
					$other_ip = $chat->visitor_sender_ip;
					$other_country = $chat->visitor_sender_country;
					$other_email = $chat->visitor_sender_email;
					$other_name = $chat->visitor_sender_name;
				}
				
				if(!empty($oc_online_users)){
					$load_message = FALSE;
					foreach($oc_online_users as $online_user){
						if($online_user['id'] == $other_id && $online_user['is_visitor'] == $other_is_visitor){
							$load_message = TRUE;
							break;
						}
					}
					if(!$load_message){
						continue;
					}
				} else {
					break;				
				}

				if($other_is_visitor){
					if(empty($threads[$other_is_visitor][$other_id]['user'])){
						$visitor_data = array(
							'id' => intval($other_id),
							'ip' => $other_ip,
							'country' => $other_country,
							'display_name' => $other_name,
							'email' => $other_email,
							'gravatar' => get_avatar($other_email, 113),
							'is_visitor' => TRUE
						);
						
						$threads[$other_is_visitor][$other_id]['user'] = $visitor_data;
					
					}
				
				}
				
				$thread = array(
					'id' => intval($chat->id),
					'direction' => stripslashes($messageDirection),
					'message' => stripslashes($chat->message),
					'send_time' => strtotime($chat->send_time)
				);
				
				$threads[$other_is_visitor][$other_id]['messages'][] = $thread;
			}
			
			if(!empty($threads[$adminKey])){

				$args = array(
					'include' => array_keys($threads[$adminKey]),
					'fields' => array(
						'ID', 'display_name'
					)
				);
			
				$users = get_users($args);
			
				if(!empty($users)){
					
					foreach($threads[$adminKey] as $k=>$v){
					
						foreach ($users as $user){
							if($user->ID == $k){
								if(function_exists('get_cupp_meta')){
						 			$imgURL = '<img class="content" src="'.get_cupp_meta($user->ID, array('113','113')).'"/>';
						 		}else{
						 			$imgURL = get_avatar($user->ID, 113);
						 		}
								$user_data = array(
									'id' => intval($user->ID),
									'display_name' => $user->display_name,
									'gravatar' => $imgURL,
									'is_visitor' => FALSE
								
								);
								$threads[$adminKey][$k]['user'] = $user_data;
							}
						 
						}
					
					}
				}
			}
			$flat = array();
			foreach($threads as $v){
				$flat = array_merge($flat,$v);
			}
			$last = end($results);
			$oc_last_message_id = intval($last->id);
			
			$results = $flat;
			
		}
		$wpdb->flush();
		return $results;
	
}

function oc_random_hash($string){
	$hash = '';
	while (strlen($hash) < 32)	{
			$hash .= mt_rand(0, mt_getrandmax());
		}
	$hash .= $string;
	$hash = md5(uniqid($hash, TRUE));
	return $hash;
}

add_action('wp_footer', 'oc_render');

function oc_render() {
	global $oc_enabled;
	if(oc_should_render() && !is_admin_bar_showing()){
		include_once('inc/oc-template.php');
	}
}
add_action('wp_footer', 'oc_render');

add_action('wp_ajax_my_action', 'oc_callback');
add_action('wp_ajax_nopriv_my_action', 'oc_callback');

add_action('wp_ajax_my_action2', 'oc_callback2');
add_action('wp_ajax_nopriv_my_action2', 'oc_callback2');

function oc_callback2() {
	global $oc_last_message_id;
	global $wpdb,$oc_tables,$oc_session_key;	
	if(array_key_exists('oc_open_chat',$_POST)){				
		$options = $_POST['oc_open_chat'];		
		if($options['active_is_visitor'] == 'false'){
			$visitors_table = $wpdb->prefix . $oc_tables['visitors'];

	    	$ip = $_SERVER['REMOTE_ADDR'];
			$id = intval($_SESSION[$oc_session_key]['id']);
			$hash = $_SESSION[$oc_session_key]['session_hash'];
			$check_1 = $wpdb->get_results( 'SELECT * FROM '.$visitors_table.' WHERE session_hash != ""  AND with_agent = "'.$options['active'].'" LIMIT 1', OBJECT );
			if(empty($check_1)){				
				// $rows_affected = $wpdb->insert(  $wpdb->prefix . $oc_tables['visitors'], $data );				
				$check_3 = $wpdb->get_results( 'SELECT * FROM '.$visitors_table.' WHERE session_hash = "" AND id = '.$id.'  LIMIT 1', OBJECT );
				if(empty($check_3)){									
					oc_add_guest_client();
					$hash = $_SESSION[$oc_session_key]['session_hash'];
					$id = intval($_SESSION[$oc_session_key]['id']);
				}
				$valid =  $wpdb->update($visitors_table, 
				 	array('chat_open' => date('Y-m-d H:i:s'),'with_agent' => $options['active']),
				 	array('id' => $id,'session_hash' => $hash, 'ip' => $ip)	
				 	);
				// }else{
				// 	echo 'already_with_agent';
				// }
				$_SESSION['oc_data']['options']['active'] = $options['active'];
				$_SESSION['oc_data']['options']['active_is_visitor'] = $options['active_is_visitor'];
			}else{
				$check_2 = $wpdb->get_results( 'SELECT * FROM '.$visitors_table.' WHERE  AND session_hash = "'.$hash.'"  AND with_agent = "'.$options['active'].'" LIMIT 1', OBJECT );
				if(empty($check_2)){
					echo 'agent_is_busy';
					// $valid =  $wpdb->update($visitors_table, 
					//  	array('chat_open' => date('Y-m-d H:i:s'),'with_agent' => $options['active']),
					//  	array('id' => $id,'session_hash' => $hash, 'ip' => $ip)
					//  	);
				}else{
					echo 'already_with_agent';
					$_SESSION['oc_data']['options']['active'] = $options['active'];
					$_SESSION['oc_data']['options']['active_is_visitor'] = $options['active_is_visitor'];
				}
			}
			// print_r($check_1);
		}
		
		// $valid =  $wpdb->update($visitors_table, 
		// 	array('last_activity' => '0000-00-00 00:00:00'),
		// 	array('id' => $id,'session_hash' => $hash, 'ip' => $ip)
		// 	);
		// // print_r($_SESSION['oc_data']);		
		// // unset($_SESSION['oc_data']);
		// unset($_SESSION['oc_data']['options']['active']);
		// unset($_SESSION['oc_data']['options']['active_is_visitor']);
    	die();
	}
}
function oc_callback() {
	global $oc_last_message_id;
	global $wpdb,$oc_tables,$oc_session_key;
	
	
	if(array_key_exists('oc_options',$_POST)){				
		$options = $_POST['oc_options'];
		oc_set_session($options,'options');		
		die();
	}
    if(array_key_exists('oc_message',$_POST)){
    	$incoming = $_POST['oc_message'];
    	$last_id = $incoming['last_message_id'];
    	$is_visitor = oc_boolean($incoming['is_visitor']);    	
    	if($inserted = oc_post_message($incoming['recipient'], $incoming['message'], $is_visitor)){
    		$inserted_data = array(
    			'messages' => oc_get_user_messages($last_id),
    			'users' => oc_get_online_chat_users(),
    			'settings' => array(
    				'last_message_id' => $oc_last_message_id,
    				'inserted_message_id' => $inserted,
    				'test' => $is_visitor,
    				'time' => time()
    			)
    		);
    		echo json_encode($inserted_data);
    	}
    	die();
    }
    
    if(array_key_exists('oc_ping',$_POST)){
    	$last_id = (!empty($_POST['oc_ping']))? $_POST['oc_ping'] : NULL;
    	$online_users = oc_get_online_chat_users();    	    	
    	$ping = array(
    		'messages' => oc_get_user_messages($last_id),
    		'users' => $online_users,
    		'settings' => array(
    			'last_message_id' => $oc_last_message_id,
    			'time' => current_time('timestamp')
    		),

    	
    	);
    	$visitors_table = $wpdb->prefix . $oc_tables['visitors'];
    		
    	if($_SESSION['oc_data']['options']['is_visitor'] == false){    		
    		$user = get_user_by( 'email',  $_SESSION['oc_data']['options']['email']);    		    		
    		$check_2 = $wpdb->get_results( 'SELECT * FROM '.$visitors_table.' WHERE with_agent = "'.$user->data->ID.'" AND session_hash != "" LIMIT 1', OBJECT );    		
    		// print_r('SELECT * FROM '.$visitors_table.' WHERE with_agent = "'.$user->data->ID.'" LIMIT 1');
    		if(!empty($check_2)){
    			$ping['chat_opened'] =  $check_2[0]->id;
    			$ping['dont_force'] = !empty($_SESSION['oc_data']['dont_force']) ? $_SESSION['oc_data']['dont_force'] : 0; 
    		}else{
    			$ping['chat_opened'] =  0;
    			$ping['dont_force'] = !empty($_SESSION['oc_data']['dont_force']) ? $_SESSION['oc_data']['dont_force'] : 0;
    		}    		
    	}else if($_SESSION['oc_data']['options']['is_visitor'] == true){
    		//check session hash
    		$check_2 = $wpdb->get_results( 'SELECT * FROM '.$visitors_table.' WHERE id = "'.$_SESSION['oc_data']['id'].'" AND session_hash != "" LIMIT 1', OBJECT );    		
    		if(empty($check_2)){
    			$ping['is_active'] =  0;    			
    		}else{
    			$ping['is_active'] =  1;
    		}    		
    	}
    	//
    	
    	//$check_2 = $wpdb->get_results( 'SELECT * FROM '.$visitors_table.' WHERE with_agent = "'.$options['active'].'" LIMIT 1', OBJECT );
    	
    	echo json_encode($ping);
    	die();
    }
    
    if(array_key_exists('oc_start',$_POST)){
    	
    	$visitors_enabled = oc_get_option('visitors_enabled');
    	
    	if(!$visitors_enabled){
    		die();
    	}
    	$new_session = $_POST['oc_start'];
    	$fields = (!empty($new_session['fields'])) ? $new_session['fields'] : array();
    	
    	$success = oc_add_guest_client($fields);
    	
    	echo json_encode($success);
    	die();
    }
    
    if(array_key_exists('oc_actions',$_POST)){
    	if(current_user_can('oc_can_chat')){
	    	$actions = $_POST['oc_actions'];
	    	$user_id = get_current_user_id();
	    	if(isset($actions['status'])){
	    		if($actions['status'] == 0){
	    			unset($_SESSION['oc_data']['dont_force']);
	    		}else{ 
		    		if(!empty($actions['dont_force'])){
		    			$_SESSION['oc_data']['dont_force'] = $actions['dont_force'];
		    		}
	    		}
				update_user_meta( $user_id, 'oc_user_status', intval($actions['status']) );
				echo intval($actions['status']);
	    	}
    	}
    	die();
    }

   

    if(array_key_exists('oc_end_chat',$_POST)){
    	global $wpdb,$oc_tables,$oc_session_key;
    	$visitors_table = $wpdb->prefix . $oc_tables['visitors'];

    	$ip = $_SERVER['REMOTE_ADDR'];
		$id = intval($_SESSION[$oc_session_key]['id']);
		$hash = $_SESSION[$oc_session_key]['session_hash'];
		$valid =  $wpdb->update($visitors_table, 
			array('session_hash' => ''),
			array('id' => $id,'session_hash' => $hash, 'ip' => $ip)
			);

		// print_r($_SESSION['oc_data']);		
		// unset($_SESSION['oc_data']);
		unset($_SESSION['oc_data']['options']['active']);
		unset($_SESSION['oc_data']['options']['active_is_visitor']);
		if($_SESSION['oc_data']['options']['is_visitor'] == true){    		
			oc_add_guest_client($_SESSION['oc_data']['options']);				
		}
				
    	die();
    }
}
function oc_get_user_options(){
	global $current_user;
	
	if(!is_user_logged_in()){
		return oc_get_session('options');
	} else {
		$options = oc_get_session('options');
		if(empty($options['name']) || $options['email'] != $current_user->user_email){						
			if(function_exists('get_cupp_meta')){
	 			$imgURL = '<img class="content" src="'.get_cupp_meta($current_user->ID, array('284','367')).'"/>';
	 		}else{
	 			$imgURL = get_avatar($user->ID, 113);
	 		}
			oc_set_session(array(
				'name' => $current_user->display_name,
				'email' => $current_user->user_email,
				'gravatar' => $imgURL,
				'is_visitor' => FALSE
			),'options');
			$options = oc_get_session('options');
		}
		
		$status = get_user_meta(  $current_user->ID,'oc_user_status', true);
		$status = (!empty($status)) ? intval($status) : 0;
		$options['user_status'] = $status;
		return $options;
	}

}


function oc_set_session($array=null,$section=null){
	global $oc_session_key,$oc_enabled;
	
	if(!$oc_enabled){return FALSE;}
	
	if(!$array || !$section) return;
	
	if(count($array) == 1){
		$k = key($array);
		$_SESSION[$oc_session_key][$section][$k] = $array[$k];
	} else {
		foreach($array as $k =>$v){
			$_SESSION[$oc_session_key][$section][$k] = $v;
		}
		
	}
}
function oc_get_session($option=NULL){
	global $oc_session_key,$oc_enabled;
	
	if(!$oc_enabled){
		return FALSE;
	}
	
	if(empty($_SESSION[$oc_session_key])){
		
		$options = array(
			'visible' => !is_user_logged_in()			
		);
		$_SESSION[$oc_session_key]['options'] = $options;
	}
	
	if($option){
		if(!empty($_SESSION[$oc_session_key][$option])) {
			return $_SESSION[$oc_session_key][$option];
		} else {
			return FALSE;
		}
	}
	
	return $_SESSION[$oc_session_key];
}

