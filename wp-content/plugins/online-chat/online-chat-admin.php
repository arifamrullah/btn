<?php

function oc_admin_bar_init() {
	if (!current_user_can('oc_can_chat') || !is_admin_bar_showing() )
		return;
 
	add_action('admin_bar_menu', 'oc_admin_bar_links', 500);
}


add_action('admin_bar_init', 'oc_admin_bar_init');

function oc_admin_bar_links() {
	global $wp_admin_bar;
 
	ob_start();
	$return = include 'inc/oc-admin-template.php';
	$chat_output = ob_get_clean();
	
 	$wp_admin_bar->add_menu(
 		array(
			'title' => '<span class="ab-icon"></span><span class="ab-label">Online Chat</span>',
			'href' => false,
			'id' => 'oc-admin-chat-title',
			'href' => false,
			'meta' => array(
				'html' => $chat_output,
				'class' => 'oc-title'
			)
		));

 	$wp_admin_bar->add_menu(
 		array(
			'title' => '<div style="float:left;margin-right:10px;color:#fff">Chat Status</div><div id="visible-user" style="float:left"></div>',
			'href' => false,
			'id' => 'oc-admin-visible',
			'href' => false,			
		));
		
}


add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { 
	global $status_array;
	$status = get_user_meta( $user->ID,'oc_user_status', true);
	$status = (!empty($status)) ? $status : 0;
	
	if(user_can($user->ID,'oc_can_chat')){
	?>

	<h3>Online Chat Settings</h3>	
	<table class="form-table">

		<tr>
			<th><label for="oc_status">Online Status</label>
				
			
			</th>

			<td>
				<fieldset>
					<legend class="screen-reader-text"><span>Status</span></legend>
					<label for="oc_user_status">
					<?php
						foreach($status_array as $k=>$v){
							echo "<input type='radio' name='oc_user_status' value='$k' ".checked( $k, $status, false )."/> $v<br />";
						
						}
					?>
					</label><br>
				</fieldset>
				<?php if(current_user_can('manage_options')):?>
				<a href='admin.php?page=oc_chat_manager&oc_user=<?php echo $user->ID;?>&oc_is_visitor=false&oc_profile=<?php echo $user->ID;?>'>View Chat Threads</a>
				<?php endif;?>
			</td>
		</tr>
	</table>
<?php 
	}
}

add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;
	
	update_user_meta( $user_id, 'oc_user_status', $_POST['oc_user_status'] );
}

add_action( 'admin_menu', 'chat_page' );
function chat_page(){
    add_menu_page( 'Chat', 'Chat',  'oc_can_chat', 'chat', 'chat_now', plugins_url('online-chat/css/images/oc-icon.png') , 3 );
}

function chat_now(){
	if(!empty($_GET['forcekill'])){
		global $wpdb,$oc_tables;
		$current_user = wp_get_current_user();		
		$visitors_table = $wpdb->prefix . $oc_tables['visitors'];
		$valid =  $wpdb->update($visitors_table, 
			array('session_hash' => ''),
			array('with_agent' => $current_user->ID)
			);
		//if($valid ){
			echo "<script>window.location = './admin.php?page=chat'; </script>";
		//}	
	}
    ?>
    	<style>
    	#chatbox{position:absolute;height:100%;width:98%;}
    	#chat_cont{position:relative;}
    	#chat_cont_wrapper{position:absolute;height:100%;width:100%;border:1px solid #ccc;overflow: auto;display: none}
    	#chat_text{position:absolute;width:100%;bottom:-50px;left:0px;display: none}
    	#chat_text input{width:100%;height:40px;border:1px solid #ccc;padding-right:85px;}
    	#chat_text button{width:80px;height:40px;background:#003380;color:#fff;font-weight: bold;border:0px;position:absolute;right:0px;bottom:0px;}
    	#chat_text button:hover{}
    	#nasabah_info{position: absolute;right:20px;top:20px;}    	
    	</style>    	
    	<div id="forcekillchat" style="float:right;padding:15px;display:none">
			Customer telah membuka percakapan | <a href="./admin.php?page=chat&forcekill=1" class="button  forcekill">Tutup Chat</a>
		</div>
		<script>
			jQuery('.forcekill').click(function(e){
				e.preventDefault();
				var doconfirm = confirm('Apakah anda yakin akan menutup paksa percakapan ini ?');
				if(doconfirm){

					window.location = jQuery(this).attr('href');
				}
			})
		</script>
    	<h3>Online Chat</h3>
    	<div id="nasabah_info"></div>
    	

    	<div id="chatbox">
    		<div id="overlay">Menunggu Klien ...</div>
    		<div id="chat_cont_wrapper">
    			<ul id="chat_cont"></ul>
    		</div>
    		<div id="chat_text">
    			<input type="text">
    			<button>Send</button>
    		</div>
    	</div>
	
    <?php
}