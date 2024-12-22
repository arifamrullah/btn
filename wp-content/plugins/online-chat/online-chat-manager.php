<?php

	//Set Up Class
	if (!class_exists("OChatManager")) {		

    	class OChatManager {
			var $messages_table;
			var $visitors_table;
			var $visitor_page;
			var $current_visitor;
			var $current_user_info;
			var $section;
			var $paged;
			function __construct() {
				$this->_init();
			}
			
			function _init(){
				global $oc_tables,$wpdb;
					$this->messages_table = $wpdb->prefix . $oc_tables['messages'];
					$this->visitors_table = $wpdb->prefix . $oc_tables['visitors'];
					$this->visitor_page = (!empty($_GET['visitor_page']))?$_GET['visitor_page'] : 1;
					$this->section = (!empty($_GET['oc_section']))?$_GET['oc_section'] : FALSE;
					$this->current_is_visitor = (isset($_GET['oc_is_visitor']))? oc_boolean($_GET['oc_is_visitor']) : 0;
					$this->current_user = (!empty($_GET['oc_user']))? intval($_GET['oc_user']) : 0;
					$this->paged = (!empty($_GET['paged']))? intval($_GET['paged']) : 1;
			}
        	function OChatManager() {
        		
				}
			
			function Manager(){
				switch	($this->section){
					case('messages'):
						break;
					default:
						$this->Visitors();	
				}
			}
			function UserPage() {
				if (!current_user_can('manage_options'))  {
						wp_die( __('You do not have sufficient permissions to access this page.') );
					}
				wp_referer_field(1);
					if ( !empty($_POST) && check_admin_referer('oc_update_vistor_save','oc_save_nonce') )
					{
						if(!empty($_POST['oc_delete_messages'])){
							$this->_deleteMessages($_POST['oc_delete_messages']);
						}
					
					}
				$user = $this->_getUser($this->current_user,$this->current_is_visitor);
				$threads = $this->_getMessages($this->current_user,$this->current_is_visitor);
				$backlink = (!empty($_GET['oc_profile']))? intval($_GET['oc_profile']) : 0;
				$backlink = ($backlink) ? 'user-edit.php?user_id='.$backlink : '?page=oc_chat_manager';
				?>
				<script type="text/javascript">
					jQuery(document).ready(function(){
						
						jQuery('h3.oc-thread-title').each(function(){
							var $selectAll = jQuery('<a class="oc-admin-select-thread">').html('Select All');
							$selectAll.on('click',function(){
								var $inputs = jQuery(this).parent().next('.oc-admin-chat-thread').find('input');
								$inputs.prop("checked", "checked")
							});
							jQuery(this).append($selectAll);
						});
					
					});
				</script>
				<div class="wrap">
					<div id="icon-oc-chat" class="icon32"></div>
					<h2><?php _e('Chat History:','online-chat');?> <?php echo $user->display_name;?><a href="<?php echo $backlink;?>" class="add-new-h2">Back</a></h2>
					<form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
					<?php wp_nonce_field('oc_update_vistor_save','oc_save_nonce'); ?>
				<?php
				if($threads){
				
					foreach($threads as $thread){
						echo "<h3 class='oc-thread-title'>Chat with: {$thread['user']['display_name']}</h3>";
						if(!empty($thread['messages'])){
							echo "<dl class='oc-admin-chat-thread clear'>\n";
							foreach($thread['messages'] as $message){
								
								$sender = ($message['direction'] === "in")? $thread['user']['display_name'] : $user->display_name;
								$send_img = ($message['direction'] === "in")? $thread['user']['gravatar'] : $user->gravatar;
								$time = date('l jS \of F Y h:i:s A',$message['send_time']);
								echo "<dt class='{$message['direction']}'>";
								echo "<input type='checkbox' name='oc_delete_messages[]' value='{$message['id']}'/>$send_img $sender</dt>";
								echo "<dd><h5>{$time}</h5>{$message['message']}</dd>";
							
							}
							echo "</dl>\n";
						}
						echo "<input id='oc-update-form-submit' class='button-secondary' type='submit' name='Save' value='Delete Selected'/>";
					}
				
				} else {
					echo "<div id='notice' class='updated fade'><p>".__('No chat history available.','online-chat')."</p></div>\n";
				}
				?>
					</form>
				</div>				
				<?php
				
			
			}
			function Visitors() {
					if (!current_user_can('manage_options'))  {
						wp_die( __('You do not have sufficient permissions to access this page.') );
					}
					if($this->current_user){
						$this->UserPage();
						return 0;
					}
					
					wp_referer_field(1);
					if ( !empty($_POST) && check_admin_referer('oc_update_vistor_save','oc_save_nonce') )
					{
						$action_visitors = (!empty($_POST['oc_post'])) ? $_POST['oc_post'] : array();
						$page_visitors = (!empty($_POST['oc_visitors'])) ? $_POST['oc_visitors'] : array();
						$action = (!empty($_POST['oc_action'])) ? $_POST['oc_action'] : FALSE;
						if($action){
							foreach($page_visitors as $visitor){
								if(in_array($visitor,$action_visitors)){
									if($action === 'save') {
										$this->_saveVisitor($visitor);
									} elseif($action === 'delete'){
										$this->_deleteUserChats($visitor);
										$this->_deleteVisitor($visitor);
									}
								} else {
									if($action === 'save') {
										$this->_saveVisitor($visitor, FALSE);
									} 
								}
							}
						}
					}
					$ppp = 25;
					$visitors = $this->_getVisitors($this->paged, $ppp);
					$total = $this->_totalVisitors();
					$total_pages = ceil($total / $ppp);
					$prev_page = (($this->paged - 1) > 0) ? ($this->paged - 1) : 1;
					$next_page = (($this->paged + 1) > $total_pages) ? $total_pages : ($this->paged + 1);
					
					?>
					<div class="wrap">
					<div id="icon-oc-chat" class="icon32"></div>
					<h2>Online Chats History</h2>
					
					<form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
					<?php wp_nonce_field('oc_update_vistor_save','oc_save_nonce'); ?>
					<p>This is the list of most recent chat visitors, click on the <strong>id</strong> to view the chat history.</p>
					
					<label class="screen-reader-text" for="post-search-input">Cari:</label>
					<input id="post-search-input" name="ss"  type="search">
					<select name="by" style="position:relative;top:-1px">
						<option>- Berdasarkan -</option>
						<option value="agent">Nama Agen</option>
						<option value="visitor">Nama Visitor</option>
					</select>
					<label>  Tanggal Dari: </label>
					<input type="text" id="datepicker_oc_from" name="MyDate_from" value=""/>
					<label> Sampai: </label>
					<input type="text" id="datepicker_oc_to" name="MyDate_to" value=""/>
					<input id="search-submit" class="button" value="Cari" type="submit">
					<br /><br />
					<table class="widefat">
						<thead>
						    <tr>
						    	<th scope="col" id="cb" class="manage-column column-cb check-column" style=""><input type="checkbox"></th>
						    	
						        <th><b>Nasabah?</b></th>
						        <th><b>Nama Visitor</b></th>
						        <th><b>Nama Agen</b></th>
						        <th><b>Tanggal Chat</b></th>														       
						        <th><b>Action</b></th>																  
						    </tr>
						</thead>
						
						<tbody>
							<?php
								if($visitors){
									$checkedIcon = plugins_url("online-chat/css/images/check.png");
									foreach($visitors as $visitor){
										$created = date('Y-m-d',strtotime($visitor->created));
										$nasabah = $visitor->nasabah == 1 ? 'Ya' : 'Bukan';
										$time = time() - strtotime($visitor->last_activity);
										$time = $this->timeDiff($time);
										$avatar = get_avatar($visitor->email, 16);
										$country = strtolower($visitor->country);
										$country_icon = plugins_url("online-chat/css/images/countries/{$country}.png");
										$agent = '';
										if(!empty($visitor->with_agent)){
											$agent = $this->_getAgent($visitor->with_agent);
											
										}
										$checked = ($visitor->save_visitor) ? "<img src='$checkedIcon'/>" : ''; 
								   		echo "<tr>\n";
								   		echo "<th scope='row' class='check-column'><input type='checkbox' name='oc_post[]' value='{$visitor->id}'><input type='hidden' name='oc_visitors[]' value='{$visitor->id}'/></th>";								   		
								     	
								     	echo "<td>{$nasabah}</td>\n";
								     	echo "<td class='username'>{$avatar} <strong>{$visitor->name}</strong><br/></td>\n";
								     	if(!empty($agent)){
								     		echo "<td class='username'><strong>{$agent[0]->display_name} ({$agent[0]->user_login})</strong><br/></td>\n";
								     	}else{
								     		echo "<td class='username'></td>\n";
								     	}
								     	// echo "<td>{$time}</td>\n";
								     	echo "<td>{$created}</td>\n";
								     	//echo "<td>{$visitor->email}</td>\n";								     	
								     	echo "<td><a href='{$_SERVER['REQUEST_URI']}&oc_user={$visitor->id}&oc_is_visitor=true'>Details</a></td>\n";
								     	
								   		echo "</tr>\n";
							  		}
							  	} else {
							  	
							  		echo '<tr><td colspan="8">No visitors history</td></tr>';
							  	}
						   ?>
						</tbody>
					</table>
						
				
					<div class="tablenav bottom">

							<div class="alignleft actions">
								<select name="oc_action">
									<option value="-1" selected="selected">Bulk Actions</option>									
									<option value="delete">Delete Visitor and Chats</option>
								</select>
							<input id='oc-update-form-submit' class='button-secondary' type='submit' name='Save' value='<?php _e('Update','online-chat'); ?>'/>
							</div>
							
					<div class="tablenav-pages"><span class="displaying-num"><?php echo $total;?> visitors</span>
					<span class="pagination-links">
						<a class="first-page <?php if($this->paged == 1) echo "disabled";?>" title="Go to the first page" href="<?php echo $_SERVER['PHP_SELF'].'?page=oc_chat_manager'; ?>">«</a>
						<a class="prev-page <?php if($this->paged == 1) echo "disabled";?>" title="Go to the previous page" href="<?php echo $_SERVER['PHP_SELF'].'?page=oc_chat_manager&paged='.$prev_page; ?>">‹</a>
					<span class="paging-input"><?php echo $this->paged;?> of <span class="total-pages"><?php echo $total_pages; ?></span></span>
					<a class="next-page <?php if($this->paged == $total_pages) echo "disabled";?>" title="Go to the next page" href="<?php echo $_SERVER['PHP_SELF'].'?page=oc_chat_manager&paged='.$next_page; ?>">›</a>
					<a class="last-page <?php if($this->paged == $total_pages) echo "disabled";?>" title="Go to the last page" href="<?php echo $_SERVER['PHP_SELF'].'?page=oc_chat_manager&paged='.$total_pages; ?>">»</a></span></div>
							<br class="clear">
						</div>
						</form>
					</div>
					<?php
					return 0;
				}
	
			function ConfigureMenu() {
				$menu = add_menu_page("Online Chat", "Online Chats History", 'manage_options', 'oc_chat_manager', array($this,'Manager'), plugins_url('online-chat/css/images/oc-icon.png'));
				add_action( "admin_print_styles-{$menu}", 'oc_admin_styles' );
			}
			function _saveVisitor($id,$value = 1){
				global $wpdb;
				
				 $id = intval($id);
				 $value = intval($value);
				 return $wpdb->update($this->visitors_table, array('save_visitor' =>  $value), array('id' => $id));
			}
			function _deleteVisitor($id){
				global $wpdb;
				 $id = intval($id);
				 return $wpdb->query("
					DELETE FROM {$this->visitors_table} 
					WHERE id = '{$id}'"
				);
			}
			function _deleteMessages($array){
				global $wpdb;
				if(!is_array($array)) return;
				$flat = implode(', ',$array);
				 return $wpdb->query("
					DELETE FROM {$this->messages_table} 
					WHERE id IN({$flat})"
				);
			}
			
			function _deleteUserChats($id, $is_visitor = 1){
				global $wpdb;
				$id = intval($id);
				$is_visitor = intval($is_visitor);
				return $wpdb->query("
					DELETE FROM {$this->messages_table} 
					WHERE (sender_id = '{$id}' AND sender_is_visitor = '{$is_visitor}')
						OR (recipient_id = '{$id}' AND recipient_is_visitor = '{$is_visitor}')"
				);
			}
			function _totalVisitors(){
				global $wpdb;
				$findinres = 'WHERE 1=1 ';				
				if(!empty($_POST['ss']) && $_POST['by']  == 'agent'){
					$userid = $wpdb->get_results("SELECT id FROM $wpdb->users WHERE display_name LIKE '%".$_POST['ss']."%' ");
					foreach($userid as $uid){
						$dds = $this->_getMessages($uid->id,FALSE);
						foreach($dds as $dd){
							$findin[$dd['user']['id']] = $dd['user']['id'];
						}
					}

					if(!empty($findin)){
						$finddata = '('.implode(',',$findin).')';
						$findinres .= 'AND id IN '.$finddata.' ';
						
					}else{
						return false;	
					}
					
				}else if(!empty($_POST['ss'])  && $_POST['by']  == 'visitor'){
					$findinres .= 'AND name LIKE "%'.$_POST['ss'].'%"';
				}

				if(!empty($_POST['MyDate_from']) && !empty($_POST['MyDate_to'])){
					$findinres .= ' AND date(created) >= "'.$_POST['MyDate_from'].'" AND date(created) <= "'.$_POST['MyDate_to'].'" ';	
				}
				return $wpdb->get_row($wpdb->prepare("SELECT COUNT(*) as count FROM {$this->visitors_table} {$findinres} AND with_agent > 0",''))->count;
			}
			function _getMessages($id=NULL,$is_visitor=1){
				global $wpdb,$oc_last_message_id;
				if(!$id) return FALSE;
				
				$is_visitor = intval($is_visitor);
				
				$query = "SELECT {$this->messages_table}.*, 
				  visitor_sender.id AS visitor_sender_id, visitor_sender.ip AS visitor_sender_ip, visitor_sender.name AS visitor_sender_name, visitor_sender.email AS visitor_sender_email, visitor_sender.country AS visitor_sender_country,
				  visitor_recipient.id AS visitor_recipient_id,  visitor_recipient.ip AS visitor_recipient_ip, visitor_recipient.name AS visitor_recipient_name, visitor_recipient.email AS visitor_recipient_email, visitor_recipient.country AS visitor_recipient_country,
				  user_sender.ID AS user_sender_id, user_sender.display_name AS user_sender_display_name, user_sender.user_email AS user_sender_email,
				  user_recipient.ID AS user_recipient_id, user_recipient.display_name AS user_recipient_display_name, user_recipient.user_email AS user_recipient_email
				  FROM {$this->messages_table}
				  LEFT JOIN {$this->visitors_table} as visitor_sender
				  	ON ( sender_id = visitor_sender.id AND sender_is_visitor = '1' )
				  LEFT JOIN {$this->visitors_table} visitor_recipient
				  	ON ( recipient_id = visitor_recipient.id AND recipient_is_visitor = '1' )
				  LEFT JOIN {$wpdb->prefix}users user_sender
				  	ON ( sender_id = user_sender.ID AND sender_is_visitor = '0' )
				  LEFT JOIN {$wpdb->prefix}users user_recipient
				  	ON ( recipient_id = user_recipient.ID AND recipient_is_visitor = '0' )
				  WHERE (( sender_id = '{$id}' AND sender_is_visitor = '{$is_visitor}' )
					 		OR ( recipient_id = '{$id}' AND recipient_is_visitor = '{$is_visitor}' ))";
				
				$results = $wpdb->get_results($wpdb->prepare($query,''));
				if($results){
						$threads = array();
						$adminKey = 0;
						
						foreach($results as $chat){
							
							$messageDirection = 'in';
							
							if(intval($chat->sender_id) == $id && intval($chat->sender_is_visitor) == $is_visitor){
								$other_is_visitor = $chat->recipient_is_visitor;
								$other_id = ($other_is_visitor)? $chat->recipient_id : $chat->user_recipient_id;
								$other_ip = ($other_is_visitor)? $chat->visitor_recipient_ip : NULL;
								$other_country = ($other_is_visitor) ? $chat->visitor_recipient_country : NULL;								
								$other_email = ($other_is_visitor) ? $chat->visitor_recipient_email: $chat->user_recipient_email;
								$other_name = ($other_is_visitor) ? $chat->visitor_recipient_name: $chat->user_recipient_display_name;
								$messageDirection = 'out';
							} else {
								$other_is_visitor = $chat->sender_is_visitor;
								$other_id = ($other_is_visitor)? $chat->sender_id : $chat->user_sender_id;
								$other_ip = ($other_is_visitor)? $chat->visitor_sender_ip : NULL;
								$other_country = ($other_is_visitor) ? $chat->visitor_sender_country : NULL;
								$other_email = ($other_is_visitor) ? $chat->visitor_sender_email: $chat->user_sender_email;
								$other_name = ($other_is_visitor) ? $chat->visitor_sender_name: $chat->user_sender_display_name;
							}
			
								$other_data = array(
									'id' => intval($other_id),
									'ip' => $other_ip,
									'country' => $other_country,
									'display_name' => $other_name,
									'email' => $other_email,
									'gravatar' => get_avatar($other_email, 40),
									'is_visitor' => $other_is_visitor
								);
								
							$threads[$other_is_visitor][$other_id]['user'] = $other_data;
								
							$thread = array(
								'id' => intval($chat->id),
								'direction' => stripslashes($messageDirection),
								'message' => stripslashes($chat->message),
								'send_time' => strtotime($chat->send_time)
							);
							
							$threads[$other_is_visitor][$other_id]['messages'][] = $thread;
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
			function _getAgent($id){
				global $wpdb;
				$userid = $wpdb->get_results("SELECT display_name,user_login FROM $wpdb->users WHERE id='$id'");

				return $userid;
			}
			function _getVisitors($page = 1,$ppp = 25){
				global $wpdb;
				$ppp = intval($ppp);
				$page = (intval($page) > 0) ? intval($page) : 1;
				$offset = ($page-1) * $ppp;				
				$findin = '';
				$findinres = 'WHERE 1=1 ';				
				if(!empty($_POST['ss']) && $_POST['by']  == 'agent'){
					$userid = $wpdb->get_results("SELECT id FROM $wpdb->users WHERE display_name LIKE '%".$_POST['ss']."%' ");
					foreach($userid as $uid){
						$dds = $this->_getMessages($uid->id,FALSE);
						foreach($dds as $dd){
							$findin[$dd['user']['id']] = $dd['user']['id'];
						}
					}

					if(!empty($findin)){
						$finddata = '('.implode(',',$findin).')';
						$findinres .= 'AND id IN '.$finddata.' ';
						
					}else{
						return false;	
					}
					
				}else if(!empty($_POST['ss'])  && $_POST['by']  == 'visitor'){
					$findinres .= 'AND name LIKE "%'.$_POST['ss'].'%"';
				}

				if(!empty($_POST['MyDate_from']) && !empty($_POST['MyDate_to'])){
					$findinres .= ' AND date(created) >= "'.$_POST['MyDate_from'].'" AND date(created) <= "'.$_POST['MyDate_to'].'" ';	
				}
				//print_r("SELECT * FROM {$this->visitors_table} {$findinres} ORDER BY id DESC LIMIT {$ppp} OFFSET {$offset}");
								
				return $wpdb->get_results("SELECT * FROM {$this->visitors_table} {$findinres} AND with_agent > 0 ORDER BY id DESC LIMIT {$ppp} OFFSET {$offset} ");
				
			}
			function _getUsers(){
			
			
			
			}
			
			function _getUser($id=NULL,$is_visitor=TRUE){
				global $wpdb;
				$id=intval($id);
				
				if($is_visitor){
					$result = $wpdb->get_row("SELECT * FROM {$this->visitors_table} WHERE id ='{$id}'");
					if($result){
						$result->display_name = ($result->name) ? $result->name : $result->ip;
						$result->gravatar = get_avatar($result->email, 40);
					}
					return $result;
				} else {
					$user = get_userdata($id);
					if($user){
						$new = new stdClass();
						$new->id = $user->ID;
						$new->display_name = $user->data->display_name; 
						$new->email = $user->data->user_email;
						$new->gravatar = get_avatar($user->ID, 40);
						$new->is_visitor = 0;
						$user = $new;
					} 
					return $user;
				}
				
			}
			function timeDiff($s){ 
			    $m=0;$hr=0;$d=0;$td="now"; 
			    if($s>59) { 
			        $m = (int)($s/60); 
			        $s = $s-($m*60);  
			        $td = "$m min"; 
			    } 
			    if($m>59){ 
			        $hr = (int)($m/60); 
			        $m = $m-($hr*60); 
			        $td = "$hr hr"; if($hr>1) $td .= "s"; 
			        if($m>0) $td .= ", $m min"; 
			    } 
			    if($hr>23){ 
			        $d = (int)($hr/24); 
			        $hr = $hr-($d*24);  
			        $td = "$d day"; if($d>1) $td .= "s"; 
			        if($d<3){ 
			            if($hr>0) $td .= ", $hr hr"; if($hr>1) $td .= "s"; 
			        } 
			    } 
			    	return $td; 
			}

       	}
   }

   if (class_exists("OChatManager")) {
          $oc_chat_manager = new OChatManager();
   }

	if(isset($oc_chat_manager)){

		add_action('admin_menu', array($oc_chat_manager,'ConfigureMenu'));
	}
	
	function oc_admin_styles() {
	    	wp_register_style('OcAdminCss', plugins_url( 'css/online-chat-admin.css' , __FILE__ ));
	    	wp_enqueue_style('OcAdminCss');
	}