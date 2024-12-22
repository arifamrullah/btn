<?php

global $oc_role_caps;
$oc_role_caps = array('oc_can_chat');

$oc_user_fields = array(
    			
    			array(
    				'name' => 'name',
    				'label' => 'Nama Lengkap',
    				'type' => 'text',
    				'required' => true
    			
    			),
    			array(
    				'name' => 'email',
    				'label' => 'Email',
    				'type' => 'text',
    				'required' => true
    			),
    			array(
    				'name' => 'nasabah',
    				'label' => 'Apakah Nasabah',
    				'type' => 'hidden',
    				'required' => true
    			)
    		);


function oc_get_option($option=NULL){
	
	$defaults = array(
		'clean_messages' => 24,
		'user_idle' => 10,
		'ping_interval' => 3,
		'ping_timeout' => 600,
		'visitors_enabled' => TRUE,
		'visitor_fields' => array('name'=> 1,'email' => 0,'nasabah' => 1),
		'visitor_timeout' => 10,
		'visitor_clean' => TRUE,
		'enable_sounds' => TRUE
	
	);
	$options = get_option('oc_options');
	return (isset($options[$option])) ? $options[$option] : $defaults[$option];
	
}

add_action( 'init', 'oc_get_visitor_fields' );
function oc_get_visitor_fields(){
	global $oc_user_fields;
	$required_fields = oc_get_option('visitor_fields');
	foreach($oc_user_fields as &$field){
		if(!empty($required_fields[$field['name']])){
			$field['required'] = true;
		} else {
			$field['required'] = false;
		}
	}
}


add_action( 'admin_notices', 'oc_admin_notices' );

function oc_admin_notices(){


	if (phpversion() < 5) {
		echo "<div id='notice' class='updated fade'><p>You must have PHP 5 to use the Online Chat Plugin</p></div>\n";
	
	}

}

add_action('admin_menu', 'oc_admin_menu');
function oc_admin_menu() {
	add_options_page('Online Chat Options', 'Online Chat', 'manage_options', 'oc-chat-options', 'oc_options_page');
}

function oc_options_page() {
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	echo '<div class="wrap">';
	echo '<h2>Online Chat Plugin Settings</h2>';
	echo '<p>You must fill out the required settings for the plugin to function correctly.</p>';
	echo '<form method="post" action="options.php"> ';
	
	settings_fields('oc_options');
	do_settings_sections('oc-chat-options');
	
	echo '<p class="submit">';
	echo '<input type="submit" class="button-primary" value="' . esc_attr('Save Changes') . '" />';
	echo '</p>';
	echo '</form>';
	echo '</div>';
}


add_action('admin_init', 'oc_admin_init');

function oc_admin_init(){
	register_setting( 'oc_options','oc_options', 'oc_options_validate' );
	
	add_settings_section('oc_permissions', 'Permissions', 'oc_permissions_text', 'oc-chat-options');
	add_settings_field('oc_user_permissions', 'Role Permissions', 'oc_user_permissions', 'oc-chat-options','oc_permissions');
	
	add_settings_section('oc_visitors', 'Visitors', 'oc_visitors_text', 'oc-chat-options');
	add_settings_field('oc_visitors_enabled', 'Visitor Chat', 'oc_visitors_enabled', 'oc-chat-options','oc_visitors');
	add_settings_field('oc_visitor_fields', 'Visitor Required Fields', 'oc_visitor_fields', 'oc-chat-options','oc_visitors');
	add_settings_field('oc_visitor_timeout', 'Visitor Timeout', 'oc_visitor_timeout', 'oc-chat-options','oc_visitors');
	add_settings_field('oc_visitor_clean', 'Visitor Clean', 'oc_visitor_clean', 'oc-chat-options','oc_visitors');
	
	add_settings_section('oc_settings', 'Chat Settings', 'oc_settings_text', 'oc-chat-options');
	add_settings_field('oc_ping_interval', 'Ping Interval', 'oc_ping_interval', 'oc-chat-options','oc_settings');
	add_settings_field('oc_ping_timeout', 'Ping Timeout', 'oc_ping_timeout', 'oc-chat-options','oc_settings');
	add_settings_field('oc_user_idle', 'Idle', 'oc_user_idle', 'oc-chat-options','oc_settings');
	add_settings_field('oc_enable_sounds', 'Enable Chat Sounds', 'oc_enable_sounds', 'oc-chat-options','oc_settings');
	add_settings_field('oc_clean_messages', 'Clean Messages', 'oc_clean_messages', 'oc-chat-options','oc_settings');
}

function oc_permissions_text() {
	echo '<p>Set which roles will have access to the online chat functionality.</p>';
}

function oc_settings_text() {
	echo '<p>Various chat options</p>';
}

function oc_visitors_text() {
	echo '<p>Enable and set options for non-logged in users of your site.</p>';
}

function oc_enable_sounds() {
	$option = oc_get_option('enable_sounds');
	//pre($options);
	$checked = checked(!empty($option), true, false);
	echo "<input id='oc_enable_sounds' type='checkbox' name='oc_options[enable_sounds]' value='1' {$checked}/> ".__("Enabled","online-chat")."<br/>";	

}

function oc_clean_messages() {
	
	$clean = oc_get_option('clean_messages');
	echo "<input id='oc_clean_messages' name='oc_options[clean_messages]' size='5' type='text' value='{$clean}' />";
	echo "<span class='description'>In hours, if set to a number other than 0, the server will delete messages once a day that are older than the set number of hours have passed. (24  hr minimum)</span>";
}

function oc_visitor_timeout() {
	
	$interval = oc_get_option('visitor_timeout');
	echo  "<select id='oc_visitor_timeout' name='oc_options[visitor_timeout]'>";
	for($i=0;$i<21;$i++){
		echo "<option value='$i' ".selected($interval, $i).">$i</option>";
	}
	echo "</select>";
	echo "<span class='description'>Visitors idle longer than this will not appear in the chat list.</span>";
}

function oc_user_idle() {
	
	$interval = oc_get_option('user_idle');
	echo  "<select id='oc_user_idle' name='oc_options[user_idle]'>";
	for($i=0;$i<21;$i++){
		echo "<option value='$i' ".selected($interval, $i).">$i</option>";
	}
	echo "</select>";
	echo "<span class='description'>How long in minutes until a user is marked as idle since their last sent message</span>";
}

function oc_ping_timeout() {
	
	$timeout = oc_get_option('ping_timeout');
	echo "<input id='oc_ping_timeout' name='oc_options[ping_timeout]' size='5' type='text' value='{$timeout}' />";
	echo "<span class='description'>Set to a number if you would like the users browser to stop checking the server after a certain amount of pings (0 for unlimited)</span>";
}

function oc_ping_interval() {
	
	$interval = oc_get_option('ping_interval');
	echo  "<select name='oc_options[ping_interval]'>";
	for($i=1;$i<21;$i++){
		echo "<option value='$i' ".selected($interval, $i).">$i</option>";
	
	}
	echo "</select>";
	echo "<span class='description'>How often will the chat ping the sever for updates (in seconds) </span>";
}

function oc_visitors_enabled() {
	$options = get_option('oc_options');
	//pre($options);
	$checked = checked(!empty($options['visitors_enabled']), true, false);
	echo "<input type='checkbox' name='oc_options[visitors_enabled]' value='1' {$checked}/> ".__("Enabled","online-chat")."<br/>";	
	echo "<span class='description'>Enable or disable to allow users acces to the chat function</span>";
}

function oc_visitor_clean() {
	$option = oc_get_option('visitor_clean');
	//pre($options);
	$checked = checked(!empty($option), true, false);
	echo "<input id='oc_visitor_clean' type='checkbox' name='oc_options[visitor_clean]' value='1' {$checked}/> ".__("Enabled","online-chat")."<br/>";	
	echo "<span class='description'>If enabled, expired visitors will be purged from the db when the system cleans messages, (you can override this in the chat section be selecting the save option on a specific visitor)</span>";
}


function oc_visitor_fields() {
	global $oc_user_fields;
	$options = get_option('oc_options');
	
	foreach($oc_user_fields as $field){
		$checked = checked( !empty($options['visitor_fields'][$field['name']]), true, false );
		echo "<input type='checkbox' name='oc_options[visitor_fields][{$field['name']}]' value='1' {$checked}/> ".__($field['label'],"online-chat")."<br/>";
	
	}
	echo "<span class='description'>If visitor chat is enabled these fields will be required by the visitor to activate a chat session</span>";
}


function oc_user_permissions() {
	global $oc_role_caps;
	
	$roles = get_editable_roles();
	foreach($oc_role_caps as $key){
		foreach($roles as $k => $v){
			$checked = checked( !empty($v['capabilities'][$key]), true, false );
			echo "<input type='checkbox' name='oc_options[{$key}][{$k}]' value='1' {$checked}/> {$v['name']}<br/>";			
		}
	}
	
}

function oc_options_validate($input) {
	global $oc_role_caps;
	$roles = get_editable_roles();

	foreach($oc_role_caps as $key){
		foreach($roles as $k => $v){
			$role = get_role($k);
			
			if(!empty($input[$key][$k])){
				$role->add_cap($key);
			} else {
				$role->remove_cap($key);
			}
		
		}
		unset($input[$key]);
	}
	$newinput = $input;
	$newinput['visitor_fields'] = (!empty($input['visitor_fields'])) ? $input['visitor_fields'] : array();
	$newinput['visitor_timeout'] = intval($input['visitor_timeout']);
	$newinput['ping_interval'] = (intval($input['ping_interval']) == 0) ? 1 : intval($input['ping_interval']);
	$newinput['ping_timeout'] = intval($input['ping_timeout']);
	$newinput['clean_messages'] = intval($input['clean_messages']);
	$newinput['user_idle'] = intval($input['user_idle']);
	$newinput['visitors_enabled'] = (!empty($input['visitors_enabled'])) ? $input['visitors_enabled'] : FALSE;
	$newinput['visitor_clean'] = (!empty($input['visitor_clean'])) ? $input['visitor_clean'] : FALSE;
	$newinput['enable_sounds'] = (!empty($input['enable_sounds'])) ? TRUE : FALSE;
	return $newinput;
}