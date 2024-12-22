
jQuery(document).ready(function(){  
	if(OcAjax){
		jQuery('#oc-chat-container').onlineChat(OcAjax);
    
    jQuery(window).resize();		
    if(jQuery('#chatbox').length > 0){
      jQuery('#chat_text button').click(function(){
        jQuery('#oc-message-send').trigger('click');
        jQuery('#chat_text input').val('').trigger('keyup').focus();  
      })
      jQuery('#chat_text input').keyup(function(e){
        if (e.keyCode == 13) {
          jQuery('#chat_text button').trigger('click');
        }else{
          jQuery('#oc-chat-input').val(jQuery(this).val());
        }
      })
    }  
	}

});
jQuery(window).resize(function(){
  if(jQuery('#chatbox').length > 0){
    jQuery('#chatbox').height((jQuery('#wpfooter').offset().top-150)+'px')
  }
})

function timeConverter(UNIX_timestamp){
  var a = new Date(UNIX_timestamp*1000);
  var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
  var year = a.getFullYear();
  var month = months[a.getMonth()];
  var date = a.getDate();
  var hour = a.getHours();
  var ampm = hour >= 12 ? 'PM' : 'AM';
  var min = a.getMinutes();
  var sec = a.getSeconds();
  var time = date + ' ' + month + ' ' + year + ' ' + hour + '.' + min + ' '+ampm  ;
  return time;
}

(function( $ ){
	
  var $titleBar, $audio, $chatBox, $userBox, $chatWrapper, $chatInput, $chatInputWrapper, $chatSend, $chatList, $userList, $backBtn, $userForm, settings, data, activeChatId, activeChatType, chatMessages, onlineUsers, pinging = false, pingComplete = true, messageComplete = true, boxWidth, chatIsOpen, pingCount = 0, lastMessageId, chatRendered = false, titleText, closedTitleText, serverTime;
  var $chatElements = {
  		container: {},
  		titleBar: {},
  		titleText: {},
  		chatBox: {},
  		userBox: {},
  		chatWrapper: {},
  		chatInput: {},
  		chatInputWrapper: {},
  		chatContent:{},
  		chatSend: {},
  		chatList: {},
  		chatListWrapper: {},
  		userList: {},
  		backBtn: {},
  		userForm: {},
  		adminTitleBar: {}
  }
  var methods = {
    init : function( options ) {
    
		if(chatRendered){
			return false;
		}
    	chatRendered = true;
    	data = $.extend( {
    		'settings' : {},
    		'messages' : [],
      		'options'         : { 
      								'visible': 0,
      								'active': 0
 								}
    	}, options);
    	
    	$chatElements.container = $(this);
    	
    	boxWidth = $chatElements.container.width();
    	chatMessages = data.messages;
    	
    	activeChatId = parseInt(data.options.active);
    	activeChatType = _parseBoolean(data.options.active_is_visitor);
    	
    	chatIsOpen = data.options.visible;
    	onlineUsers = data.users;
    	serverTime = data.settings.time;
    	lastMessageId = data.settings.last_message_id;
    	$chatElements.chatBox = $('#oc-chat-box');
  		$chatElements.userBox = $('#oc-user-box');
	    $chatElements.chatInput = $('<input/>').attr({ type: 'text', id: 'oc-chat-input', name: 'message', tabindex: '-1' });
	    $chatElements.titleBar = $('#oc-title');
	    $chatElements.backBtn = $('#oc-back-btn');
	    $chatElements.chatWrapper = $('#oc-chat-wrapper');
	    $chatElements.chatContent = $('#oc-chat-content');
	    $chatElements.userList = $('#oc-user-list');
	    $chatElements.chatList = $('#oc-message-list');
	    $chatElements.chatListWrapper = $('#oc-chat-message-list-wrapper');
	    $chatElements.chatSend = $('#oc-message-send');
	    $chatElements.titleText = $('#oc-title-text');
	    titleText = $chatElements.titleText.text();
	    
	    if(!!document.createElement('audio').canPlayType &&  _parseBoolean(data.settings.enable_sounds)) {

		 	$audio = $('<audio/>').html('<source src="' + data.settings.uri + 'assets/sounds/alert.ogg" type="audio/ogg"></source><source src="' + data.settings.uri + 'assets/sounds/alert.mp3" type="audio/mpeg"></source>');
		 	$audio.insertAfter($chatElements.container);
		 	$audio.on('play', function(){
		 		this.play();
		 	});
			
		}
		
	    if(_parseBoolean(data.settings.admin_bar)){
	        $chatElements.adminTitleBar = $('#wp-admin-bar-oc-admin-chat-title .ab-item');
	        $chatElements.adminTitleBar.on('click',function(e){
	        	e.stopPropagation();
	        	e.preventDefault();
	    		if($chatElements.container.hasClass('open')){
	    			methods.hide();
	    			 $chatElements.adminTitleBar.parent().removeClass('hover');
	    		} else {
	    			methods.show();
	    			$chatElements.adminTitleBar.parent().addClass('hover');
	    		}
	    		
	    	});
	    	
	    	$chatElements.container.on('click',function(e){
	    		e.stopPropagation();
	    	});
	    	
	    	$('html').on('click',function(e){
	    		if($chatElements.container.hasClass('open')){
	    			methods.hide();
	    			$chatElements.adminTitleBar.parent().removeClass('hover');
	    		}
	    	});
			if(data.options.visible > 0){
				$chatElements.adminTitleBar.parent().addClass('hover');
			
			
			}
    	} else {
    	 
    		$chatElements.titleBar.on('click',function(e){
    			e.stopPropagation();
	    		if($chatElements.container.hasClass('open')){
	    			methods.hide();
	    		} else {
	    			methods.show();
	    		}
	    		
	    	});
    	}
    	
    		  $chatElements.backBtn.on('click',function(e){
	    		$(this).addClass('disabled');
	    		e.stopPropagation();
	    		methods.closeChat();
	    		
	    	});
    	
    	
    	_buildUsers();
    	
    	$('#oc-chat-input-wrapper').prepend($chatElements.chatInput);

    	
    	
    	
    	$chatElements.chatInput.keypress(function(e){
    		
    			e.stopPropagation()
      			if(e.which == 13){
       				methods.send();
       		}
      	});
    	$chatElements.chatSend.on('click',function(e){
    		e.stopPropagation()
    		methods.send();
    	
    	});
    	
    	_buildForm();
    	
    	if(data.settings.logged_in){

    		$userActions = $('#oc-user-actions');
    		$userStatus = $('<select/>');
    		var $userWrapper = $('#oc-user-list-wrapper');
    		var statuses = '';
    		var activeStatus=''
    		for(var i=0;i<data.settings.status_list.length;i++){
    			activeStatus = (data.options.user_status == i) ? 'selected="selected"' : '';
    			statuses += '<option value="' + i + '" ' + activeStatus +'>' + data.settings.status_list[i] + '</option>';
    		}
    		
            $userStatus.html(statuses);
    		$userStatus.on('change keyup',function(e){
    			var newStatus = $(this).val();
    			_post({
					'oc_actions': { status: newStatus + ''}
				});
    		});
    		
    		$userWrapper.height($userWrapper.height()-$userActions.height());
    		$userActions.append($userStatus);
    	}
    	
    	
    	if(!data.settings.enabled){
    		
    	} else {
    		if(activeChatId > 0){
    			 
    				$chatElements.backBtn.attr('class','');
    			
    			if(_buildThread(activeChatId,activeChatType)){
    				_scrollChatDown();
    				$('#' + _getUserHtmlId(activeChatId,activeChatType)).addClass('opened');
    				$chatElements.chatWrapper.css({'left' : - (2 * boxWidth)});
    			} else {
    				$chatElements.chatWrapper.css({'left' : - boxWidth});
    			}
    			
    		} else {
    			$chatElements.chatWrapper.css({'left' : - boxWidth});
    		}
    		
    		pinging = setTimeout(_startPing, data.settings.interval);

    	}
    	
    	
    	if(data.options.visible > 0){

    		$chatElements.chatContent.show();
    		$chatElements.container.addClass('open');
    	} else {

    		closedTitleText = $chatElements.titleText.text();
    		$chatElements.titleText.text(titleText);
    		$chatElements.chatContent.hide();
    		$chatElements.titleBar.children('div').hide();
    	}
    	

    },
    openChat : function() {
    	var valid = _buildThread(activeChatId,activeChatType);            
    	if(!valid) {
    		return false;
    	
    	}

    	_scrollChatDown();
    	$chatElements.backBtn.attr('class','');
    	$chatElements.chatWrapper.animate({
    		'left' : -(2 * boxWidth)
    	},{
    		easing: 'easeInCirc',
    		duration: 100
    	});    

    	_post({
					'oc_options': { 
						active: activeChatId,
						active_is_visitor: activeChatId
					}
				});
      _post({
          'oc_actions': { status: 1 + ''}
        });

      console.log(activeChatId,activeChatId);
      // var messageData = {
      //     'oc_message': { 
      //           'last_message_id' : lastMessageId,
      //           'recipient': thisChatId,
      //           'is_visitor': thisChatType,
      //           'message': message
      //         }
      //     }
      
      // messageComplete = false;
      // _post( messageData ,function(response){
    },
    closeChat : function() {
    	//_saveThreadHtml();
    	$chatElements.userList.children('li').removeClass('opened').removeClass('notify');
    	$chatElements.titleText.text(titleText);
    	activeChatId = 0;
    	$chatElements.chatWrapper.animate({
    		'left' : - boxWidth
    	
    	},{
    		easing: 'easeOutCirc',
    		duration: 100
    	});      
    	_post({
					'oc_options': { active: 0 }
				});
      _post({
          'oc_actions': { status: 0 + ''}
        });      
    },
    endChat : function() {      
      _post({
          'oc_end_chat': { active: 0 }
        },function(){          
          window.localStorage.clear();          
          location.reload();
        });
        
    },
    show : function( ) {
      $chatElements.titleText.text(closedTitleText);
     
      if(_parseBoolean(data.settings.admin_bar)){
	    	$chatElements.adminTitleBar.parent().removeClass('notify');
      
      } 
      
      $chatElements.titleBar.attr('class','').children('div').show();
      $chatElements.chatContent.slideDown(200,'easeInCirc',function(){
      		 $chatElements.container.addClass('open');
      		_post({
					'oc_options': { visible: 1 }
				});
      });
    },
    hide : function( ) {
    	closedTitleText = $chatElements.titleText.text();
    	$chatElements.titleText.text(titleText);
    
       $chatElements.titleBar.children('div').hide();
       $chatElements.chatContent.slideUp(200,'easeOutCirc', function(){
  			$chatElements.container.removeClass('open');
			_post({
				'oc_options': {visible: 0}
			});
      });
    },
    send : function(){
    	var input = $chatElements.chatInput.val();
    	if(input != ''){
    		$chatElements.chatInput.val('');
    		_newMessage(input,'out');
    	}
    },
    getMessages: function(){
    	pingComplete = false;
    	_post({
					'oc_ping': lastMessageId
				},function(response){					
          // console.log(response,data);
					pingComplete = true;
					if(!response) {return false;}
					onlineUsers = response.users;					
					serverTime = response.settings.time;
					_updateUsers();
          //
					if(response.settings.last_message_id > 0){
					  
						_updateMessageCount(response.messages);
						_buildThread();
						lastMessageId = response.settings.last_message_id;
					}
				    
				    
				});

    },
    stopPing: function() {
    	if(pinging){
    		clearInterval(pinging);
    	}

    },
    updateOptions: function() {
    	_post({
					'oc_options': { visible: 1,
									active: activeChatId
								}
				});
    }
    
    
  };

    function supports_html5_storage() {
      try {
        return 'localStorage' in window && window['localStorage'] !== null;
      } catch (e) {
        return false;
      }
    }

   function _startPing() {

    	pinging = setInterval(function(){
    			if(data.settings.ping_limit > 0 && pingCount == data.settings.ping_limit){
    				methods.stopPing();
    			} else {
    				if(pingComplete && messageComplete){
    					pingCount++;
    					methods.getMessages();
    				}
    			}
    		}, data.settings.interval);
    		
    }
  	function _newMessage(message){
        console.log(activeChatId,thisChatType);
        var send_time = timeConverter(data.settings.time);        
        var newhtml = '<li  class="out">' + 
                    '<h4><div class="ava-standing pull-left">' +
                    data.options.gravatar;                     
             newhtml += '</div><span>'+data.options.name+'</span> '+send_time+'</h4>' ;                                                                    
             newhtml += '<p>' +
                    message +
                    '</p>' +                
                    '</li>';
    	var $newMessage = newhtml;
    	$chatElements.chatList.append($newMessage);
      $('#chat_cont_wrapper,#chat_text').show();
      $('#chatbox #overlay').hide();
    	$('#chat_cont').append($newMessage);
    	_scrollChatDown();
    	
    	var thisChatId = activeChatId;
    	var thisChatType = activeChatType;

    	var messageData = {
					'oc_message': { 
								'last_message_id' : lastMessageId,
								'recipient': thisChatId,
								'is_visitor': thisChatType,
								'message': message
							}
					}
      
		  messageComplete = false;
    	_post( messageData ,function(response){
    				
    				
					if(!response){
						$($newMessage).remove();
						messageComplete = true;
						return false;
					}
					
					var messageId = 'oc-chat-message-' + response.settings.inserted_message_id;
    				
    				if($('#' + messageId).length > 0){
    					$($newMessage).remove();
    					return false;
    				}
                    
					$($newMessage).attr({
						'id': messageId,
						'class': 'out'
					});
					window.localStorage.setItem('data-'+response.settings.inserted_message_id,true);
					var messageObj = {
						'direction' : 'out',
						'id' : response.settings.inserted_message_id,
						'message' : message,
						'send_time' : response.settings.time
					}
					var newThread = true;
					for(var j=0;j<chatMessages.length;j++){
	    				if(parseInt(chatMessages[j].user.id) == thisChatId && _parseBoolean(chatMessages[j].user.is_visitor) == thisChatType){
	    					chatMessages[j].messages.push(messageObj);
	    					newThread = false;
	    				}
					}
					if(newThread){

						var $userData = $('#' + _getUserHtmlId(thisChatId,thisChatType));
						$userData.addClass('active');

						var threadObj = {
								messages : [ messageObj ],
								user : {}
							}
							
						for(var i=0;i<onlineUsers.length;i++){
						
							if(onlineUsers[i].id == thisChatId && onlineUsers[i].is_visitor === thisChatType){
								threadObj.user = onlineUsers[i];						
								break;
							}
						
						}
						
						chatMessages.push(threadObj);
						
					}
					
    					
						lastMessageId = response.settings.last_message_id;
						messageComplete = true;
				});
    }

  	function _scrollChatDown(){      
  		$chatElements.chatListWrapper.scrollTop($chatElements.chatListWrapper[0].scrollHeight);      
      if($('#chat_cont_wrapper').length > 0){
        $('#chat_cont_wrapper').scrollTop($('#chat_cont_wrapper')[0].scrollHeight);
      }
  	}
  	
  	function _updateMessageCount(newMessages){
  		var userId,userType,htmlId,$link, newCount, oldCount, needsNotify = false;
  	 
  		for(var i=0;i<newMessages.length;i++){
  			userID = parseInt(newMessages[i].user['id']);
    		userType = _parseBoolean(newMessages[i].user['is_visitor']);
    		htmlId =  _getUserHtmlId(userID,userType);
        
    		var $link = $('#' + htmlId);
    		
    		if($link.length > 0){
    			oldCount = parseInt($link.data('messages'));
    			
    			if(oldCount == 0){            
    				$link.addClass('active');
    			}
    			
    			newCount = oldCount + newMessages[i].messages.length;

	    		if(oldCount < newCount){
	    			needsNotify = true;
	    			$link.addClass('notify');
            
            //console.log(newMessages[i]);
            if(!window.localStorage.getItem('data-'+newMessages[i].messages[0].id)){
              window.localStorage.setItem('data-'+newMessages[i].messages[0].id,true);              
  	    			if($audio){
  	    				$audio.trigger('play');
  	    			}            
              var chck = Notification.permission;
              $.titleAlert('New Message From '+newMessages[i].user['display_name'], {
                  requireBlur:true,
                  stopOnFocus:true,
                  interval:500
              });
              if( chck !== 'granted'){
                Notification.requestPermission();
              }else if(chck === 'denied' || chck === 'unknown'){
                window.focus();  
              }            
              var noot = new Notification( newMessages[i].user['display_name'], {
                body: newMessages[i].messages[0].message,             
                tag: newMessages[i].messages[0].id,
                icon: $(newMessages[i].user['gravatar']).attr('src')
              });
              noot.onclick = function(){
                if($('#toplevel_page_chat').length > 0){

                  if($('#chatbox').length < 1){                  
                    window.location = $('#toplevel_page_chat a').attr('href');
                  }
                }
                window.focus();              
              }
            }
	    		}
    			$link.data('messages', newCount);
    		}
    		var newThread = true;
    		for(var j=0;j<chatMessages.length;j++){
    			if(parseInt(chatMessages[j].user.id) == userID && _parseBoolean(chatMessages[j].user.is_visitor) == userType){
    				newThread = false;
    				for(var k=0;k<newMessages[i].messages.length;k++){
    				
    				
    				chatMessages[j].messages.push(newMessages[i].messages[k]);
    				}
    			}
    		}
    		if(newThread){
    			needsNotify = true;
    			chatMessages.push(newMessages[i]);
    		}
    		
    		if(needsNotify) {
	    		//if(!$chatElements.container.hasClass('open')){
					if(_parseBoolean(data.settings.admin_bar)){
						//$chatElements.adminTitleBar.parent().addClass('notify');
            //console.log(data[0].user.id);
            // if($('#toplevel_page_chat .wp-menu-name .pending-count') > 0){
            //   $('#toplevel_page_chat .wp-menu-name .pending-count').html(parseInt($('#toplevel_page_chat .wp-menu-name .pending-count'))+1);
            // }else{
            //   $('#toplevel_page_chat .wp-menu-name').find('.awaiting-mod').remove();
            //   $('#toplevel_page_chat .wp-menu-name').append('<span class="awaiting-mod"><span class="pending-count">0</span></span>');
            // }

            if($('#chatbox').length < 1){                  

              $('#toplevel_page_chat').addClass('notify');

            }
            $('#oc-user-list .notify').trigger('click');
            _post({
              'oc_actions': { status: 1 + ''}
            });
					} else {
						$chatElements.titleBar.addClass('notify');
            $('.cs-box .popup').html(newMessages[i].messages[0].message);
            
					}
		    					
		    	//} 
	    	}		
  		}
  	}
    
  	function _parseBoolean(str) {
  		return /^true$/i.test(str);
	}

	function _post(content, callback){
	  var postData = $.extend({action: 'my_action'},content);
      $.ajax({
      	type: 'POST',
      	url: data.settings.ajaxurl,
      	data: postData,
      	success: callback,
      	dataType: 'json'
      	
      });
    }
    function _getUserHtmlId(id,type){
    	var htmlId;
    	if(!type){
    		htmlId = 'oc-user-' + id;
    	} else {
    		htmlId = 'oc-visitor-' + id;
    	}
    	return htmlId;
    }
    
    function _setUserStatus($el,object){
		var stillActive = (data.settings.inactive_limit > (serverTime - object.last_activity)/60);
		var linkClass;
		
		if(object.status != undefined && object.status == 1){
			linkClass = 'online busy';
		} else if(!stillActive) {
			linkClass = 'online away';
		} else {
			linkClass = 'online';
		}
			
		if($el){
			if($el.hasClass('opened')){
				linkClass += " opened";

			}
			if($el.hasClass('active')){
				linkClass += " active";
			}
			if($el.hasClass('notify')){
				linkClass += " notify";
			}
			if($el[0].className != linkClass){
				$el[0].className = linkClass;
			}
		}
		return linkClass;
	}
    function _updateUsers(){
		  if(jQuery('#op_ol .online').length < 1){
        if(jQuery('.no-agent').length > 0){
          jQuery('.no-agent').show();
        }
      }else{
        if(jQuery('.no-agent').length > 0){
          jQuery('.no-agent').hide();
        }
      }
    	$chatElements.userList.children('li').addClass('remove');
    	var $newUser,$link,userType,userID,htmlId,country,statt;
    	for(var i=0;i<onlineUsers.length;i++){

    		userID = parseInt(onlineUsers[i]['id']);
    		userType = onlineUsers[i]['is_visitor'];
    		htmlId =  _getUserHtmlId(userID,userType);
    		$link = $('#' + htmlId);        
        
    		if($link.length){          
    			$link.removeClass('remove');
          //console.log($link);          
    			statt = _setUserStatus($link,onlineUsers[i]);
          //console.log(statt);
    			if($link.hasClass('opened')){
    					$('#oc-offline-user-notice').hide();
    			}
          
    		} else {
    		
	    		if(onlineUsers[i]['country'] != undefined && onlineUsers[i]['country']){
	    			country = '<img class="oc_country" src="' + data.settings.uri + 'css/images/countries/' + onlineUsers[i]['country'].toLowerCase() + '.png"/>';
	    		} else {
	    			country = '';
	    		}
          
				$newUser = $('<li/>')
	    			.attr({
	    				'id' : _getUserHtmlId(onlineUsers[i]['id'],onlineUsers[i]['is_visitor']),
	    				'data-id' : onlineUsers[i]['id'],
	    				'data-visitor' : onlineUsers[i]['is_visitor'],
	    				'data-messages' : 0
	    			})
	    			.html(onlineUsers[i]['gravatar'] + '<span>' + onlineUsers[i]['display_name'] + '</span>' + country);
	    			statt = _setUserStatus($newUser,onlineUsers[i]);
	    			$chatElements.userList.append($newUser);

	    			$newUser.on('click', activateOpenChat);

    		}
        if(!userType){

          
            if(statt == 'online' || statt == 'online away' || statt == 'online active' || statt == 'online away active'){
              if($('#on-'+htmlId).length > 0){
                $('#on-'+htmlId+' .status').html('<span class="online"></span> Available');
                $('#on-'+htmlId+' .caption .btn')
                  .attr('href','/chat')
                  .attr('data-id',userID)
                  .addClass('btn-online')
                  .html('<i class="fa fa-comments-o"></i> Online')
                $('#on-'+htmlId)
                  .attr('href','javascript:;')
                  .attr('data-id',userID)
                  .addClass('btn-online')
              }
            }else{
              $('#on-'+htmlId+' .status').html('<span class="offline"></span> Unavailable');
              $('#on-'+htmlId+' .caption .btn')
                .removeAttr('href','/chat')
                .removeAttr('data-id',userID)
                .removeClass('btn-online')
                .text('Not Available')
              $('#on-'+htmlId)
                  .attr('href','javascript:;')
                  .removeAttr('data-id',userID)
                  .removeClass('btn-online')
            }
          }
    		
    	}

    	$chatElements.userList.children('li.remove').each(function(){
    		
    		 var $this = $(this);
    		 
    		 if($this.hasClass('active')){          
    		 	$this.removeClass('remove').removeClass('online');
          //$('#oc-message-list').append('<li class="infomessage in"> '+$this.text()+' has been left the chat</li>')
          if(!$this.hasClass('online')){
            if($('#chat_cont').length > 0){
              $('#chat_cont_wrapper,#chat_text').hide();
              $('#chatbox .overlay').show();
              $('#chat_cont').html('');
            }
            if($this.data('visitor') == false){
              $('#oc-offline-user-notice').show();                      
              if(!window.localStorage.getItem('data-'+$this.attr('id'))){
                window.localStorage.setItem('data-'+$this.attr('id'),true);
                
                var chck = Notification.permission;
                if( chck !== 'granted'){
                  Notification.requestPermission();
                }else if(chck === 'denied' || chck === 'unknown'){
                  window.focus();  
                }
                var noot = new Notification( 'Informasi', {
                  body: $this.text()+' keluar dari chat'            
                });
                
                noot.onclick = function(){
                  window.focus();                
                }                              
              }
              _post({
                  'oc_actions': { status: 0 + ''}
                }); 
              $('#oc-chat-container').onlineChat('endChat');
            }else{   
              $('#oc-offline-user-notice').show();                      
              if(!window.localStorage.getItem('data-'+$this.attr('id'))){
                window.localStorage.setItem('data-'+$this.attr('id'),true);
                //console.log($this.attr('id'));       
                
                var chck = Notification.permission;
                if( chck !== 'granted'){
                  Notification.requestPermission();
                }else if(chck === 'denied' || chck === 'unknown'){
                  window.focus();  
                }
                var noot = new Notification( 'Info', {
                  body: $this.text()+' keluar dari chat'            
                });
                noot.onclick = function(){
                  window.focus();                
                }
                
              }
              $('#oc-chat-container').onlineChat('endChat');
              _post({
                'oc_actions': { status: 0 + ''}
              }); 
              methods.closeChat();
              $this.remove();

            }
          }
          
    		 	return;
    		 }
    		 
    		 if($this.data('id') === activeChatId && $this.data('visitor') === activeChatType){
    		 	methods.closeChat();
    		 }
    		 
    		 $this.off('click').remove();
    	});
      if($('#op_ol .online').length < 1){
        if($('.no-agent').length > 0){
          $('.no-agent').show();
        }
      }else{
        if($('.no-agent').length > 0){
          $('.no-agent').hide();
        }
      }
    	if($chatElements.userList.children('li').length < 1){

    		$('#oc-no-users-online-notice').show();
        
    	} else {
    		$('#oc-no-users-online-notice').hide();
        
    	}
    }
    function activateOpenChat(){
    		var $this = $(this);

    		 $this.removeClass('notify').addClass('opened');
    		 activeChatId = $this.data('id');
    		 activeChatType = _parseBoolean($this.data('visitor'));
         _post({
            'oc_actions': { status: 1 + ''}
          }); 
    		 methods.openChat();
    }
    
    function _buildUsers(){
    	var html = '';
    	var country = '';
    	var displayName;
    	for(var i=0;i<chatMessages.length;i++){
    	
    		if(chatMessages[i].user['country'] != undefined && chatMessages[i].user['country']){
    			country = '<img class="oc_country" src="' + data.settings.uri + 'css/images/countries/' + chatMessages[i].user['country'].toLowerCase() + '.png"/>';
    		} else {
    			country = '';
    		}
    		
    		var userID = parseInt(chatMessages[i].user['id']);
    		var userType = chatMessages[i].user['is_visitor'];
    		var htmlId =  _getUserHtmlId(userID,userType);
    		var messageCount = chatMessages[i].messages.length;

    		displayName = (chatMessages[i].user['display_name']) ? chatMessages[i].user['display_name'] : chatMessages[i].user['ip'];
    		
    		html += '<li id="' + htmlId + '" class="active" data-id="'+ userID +'" data-visitor="' + userType + '" data-messages="' + messageCount + '">' + chatMessages[i].user['gravatar'] + '<span>' + displayName + '</span>' + country + '</li>';
    		
    	}
    	$chatElements.userList.html(html);
    	
    	html = '';
    	for(var i=0;i<onlineUsers.length;i++){
    		if(onlineUsers[i]['country'] != undefined && onlineUsers[i]['country']){
    			country = '<img class="oc_country" src="' + data.settings.uri + 'css/images/countries/' + onlineUsers[i]['country'].toLowerCase() + '.png"/>';
    		} else {
    			country = '';
    		}
    		var userID = parseInt(onlineUsers[i]['id']);
    		var userType = onlineUsers[i]['is_visitor'];
    		var htmlId =  _getUserHtmlId(userID,userType);
    		displayName = (onlineUsers[i]['display_name']) ? onlineUsers[i]['display_name'] : onlineUsers[i]['ip'];
    		var $existing = $('#' + htmlId);
    		if($existing.length){
    			$existing.addClass('online');
    			_setUserStatus($existing,onlineUsers[i])
    		} else {
    		var userClass = _setUserStatus(0,onlineUsers[i]);
    		
    		html += '<li id="' + htmlId + '" class="'+ userClass +'" data-id="'+ userID +'" data-visitor="' + userType + '" data-messages="0" >' + onlineUsers[i]['gravatar'] + '<span>' + displayName + '</span>' + country + '</li>';
    		
    		}
    		
    		
    	}
    	var newHtml = $chatElements.userList.html() + html;
    	$chatElements.userList.html(newHtml);

      if($('#op_ol .online').length < 1){
        if($('.no-agent').length > 0){
          $('.no-agent').show();
        }
      }else{
        if($('.no-agent').length > 0){
          $('.no-agent').hide();
        }
      }
    	if($chatElements.userList.children('li').length < 1){
        
    		$('#oc-no-users-online-notice').show();
    	} else {
    		$chatElements.userList.children('li.online, li.active').on('click',activateOpenChat);
        
    	}
    	
    
    }
    
    function _buildThread(id,type){
        if($chatElements.chatListWrapper[0] != undefined){
   	 var needScroll = ($chatElements.chatListWrapper[0].scrollHeight - $chatElements.chatListWrapper[0].scrollTop <= $chatElements.chatListWrapper.height());
   	 var htmlId =  _getUserHtmlId(activeChatId,activeChatType);

   	 var $activeUser = $('#' + htmlId);
       var csname = '';
       var clname = '';
   	 if($activeUser.length < 1){
   	 	return false;
   	 } else {
   	 	$chatElements.titleText.text(data.settings.chatting_prefix + $activeUser.children('span').text());
          var clname = data.options.name;
   	    var csname = $activeUser.children('span').text();
   	 }
   	 if(!$activeUser.hasClass('online')){
   	 	$('#oc-offline-user-notice').show();
   	 	
   	 } else {
   	 	$('#oc-offline-user-notice').hide();

   	 }

       $('.custname').html(csname);          
       $('.cs-box .custname').html(csname+'<span class="titlecust">Customer Service</span>');     
       
       var utype = 'Non Nasabah';
       if($('input[name=radio1]').val() == 1){
        utype = 'Nasabah';
       }
       $('.clname').html(clname+'<br />'+utype); 

       
   	 var chatHtml;
      	if(chatMessages.length > 0){
          //$('.ava-standing').html(chatMessages[0].user.gravatar);    
          var messagein = 'Selamat datang di layanan BTN Virtual Branch. Ada yang bisa kami bantu?';
      		for(var i=0; i<chatMessages.length;i++){
      			if(chatMessages[i].user.id == activeChatId && chatMessages[i].user.is_visitor == activeChatType){

      							var html = '';
      							var gravatar;
      							if(chatMessages[i].html != undefined){
      								html = chatMessages[i].html;
      							}
      										
      							for(var j=0;j<chatMessages[i].messages.length;j++){
      								if(chatMessages[i].messages[j].rendered == undefined || chatMessages[i].messages[j].rendered == false){
      									if(chatMessages[i].messages[j].direction === 'in'){
                          messagein = chatMessages[i].messages[j].message;
                        }
      									if(html.indexOf('#oc-chat-message-' + chatMessages[i].messages[j].id,0) >= 0){

      										chatMessages[i].messages[j].rendered = true;
      									
      									
      									} else {
                          var send_time = timeConverter(chatMessages[i].messages[j].send_time);
                          
                          
      										gravatar = (chatMessages[i].messages[j].direction === 'in') ? chatMessages[i].user.gravatar : data.options.gravatar;
      								html += '<li id="oc-chat-message-' + chatMessages[i].messages[j].id +'" class="' + chatMessages[i].messages[j].direction + '">' + 
                                              '<h4><div class="ava-standing pull-left">' +
                                              gravatar ;
                                              if(chatMessages[i].messages[j].direction === 'in'){
                                       html += '</div><span>'+csname+'</span> '+send_time+'</h4>' ;
                                              }else{
                                       html += '</div><span>'+clname+'</span> '+send_time+'</h4>' ;                                                
                                              }
                                       html +=       '<p>' +
                                              chatMessages[i].messages[j].message +
                                              '</p>' +
                                          
                                          '</li>';
      								chatMessages[i].messages[j].rendered = true;
      									
      									}
      								
      								}
      							}
  								
      							$chatElements.chatList.html(html);
                    if($('#chat_cont').length > 0){
                      if(data.users.length > 0){
                        //$('#nasabah_info').html('Anda Sedang Chatting dengan <b>'+data.users[0].display_name+'</b>');                    
                      }
                      $('#chat_cont_wrapper,#chat_text').show();
                      $('#chatbox #overlay').hide();
                      $('#chat_cont').html(html);
                    }
      							chatMessages[i].html = html;
      							//if(needScroll){
      								_scrollChatDown();
      							//}
                    $('.cs-box .popup').html(messagein);
      							return true;
      			}
      		}
      	}
      	
      	//$chatElements.chatList.html('');
      	return true;    
      }
    }
    
    function validateEmail(email) { 
    	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    	return re.test(email);
	}
	
	function _buildForm(){
    	$chatElements.userForm = $('#oc-user-form-fields');
    	var input = '';
    	
    	for(var i=0;i < data.settings.fields.length;i++){
            if(data.settings.fields[i].required == true){            
        		switch(data.settings.fields[i].type){                
        			case 'text':
                        input += '<div class="form-group">';
                        input += '      <label for="" class="col-sm-5 control-label">'+data.settings.fields[i].label+'</label>';
                        input += '      <div class="col-sm-7">';
                        input += '         <input id="oc-user-field-' + data.settings.fields[i].name + '" name="'+data.settings.fields[i].name+'" class="form-control" type="text" placeholder="'+data.settings.fields[i].label+'" data-required="' + data.settings.fields[i].required + '" />';
                        input += '      </div>';
                        input += '   </div>';
                    break;                
                    case 'hidden':
                        input += '         <input id="oc-user-field-' + data.settings.fields[i].name + '" name="'+data.settings.fields[i].name+'" class="form-control" type="hidden"  data-required="' + data.settings.fields[i].required + '" />';                    
                    break;
        			default:

        				//input += '<input id="oc-user-field-' + data.settings.fields[i].name + '" name="' + data.settings.fields[i].name + '" type="text" placeholder="' + data.settings.fields[i].label + '" data-required="' + data.settings.fields[i].required + '"/>';
        		}
            }
    	}
    	
    	$chatElements.userForm.html(input);
    	$('#oc-user-session-start').on('click', function(e){
    		e.preventDefault();
    		
    		if($(this).hasClass('sending')){
    			return false;
    		}
    		
        $('#forminitloading').show();
        $('#formchatinit').hide();
    		var formValidated = true,
    			userData = {};
    		var $fields = $chatElements.userForm.find('input');
    		
    		for(var i=0;i < $fields.length ;i++){
    			var $field = $($fields[i]);
    			if($field.data('required') && !$field.val()){
    				$field.addClass('warning');
    				formValidated = false;
    			} else {
    				if($field.val() && $field.attr('name') == 'email' && !validateEmail($field.val())){
    					$field.addClass('warning');
    					formValidated = false;
    				} else {
    					userData[$field.attr('name')] = $field.val();
    					$field.attr('class','');
    				}
    			}
    			
    		
    		}    		
    		if(formValidated){
    			$(this).attr('disabled','disabled').addClass('sending');

    			_post({
					'oc_start': {
						'fields' : userData
					}
				},function(response){
					$('#oc-user-session-start').prop('disabled',false).removeClass('sending');

					if(response){
						$chatElements.chatWrapper.animate({
				    		'left' : - boxWidth
				    	},{
				    		easing: 'easeInCirc',
				    		duration: 100
				    	});
					    data.options = response;
                        pinging = setTimeout(_startPing, data.settings.interval);
                        $('#pilih-status').modal('hide');
					}else{
              $('#forminitloading').hide();
              $('#formchatinit').show();
              $('#nasabah-box #err-message').html('Maaf sistem sedang di perbaiki, silakan coba lagi nanti');
          }
					
				
				});
    		}else{
          $('#forminitloading').hide();
          $('#formchatinit').show();
          $('#nasabah-box #err-message').html('Nama Tidak boleh kosong').addClass('error');
        }
    	});
    }
    
  $.fn.onlineChat = function( method ) {
    if ( methods[method] ) {
      return methods[ method ].apply( this, Array.prototype.slice.call( arguments, 1 ));
    } else if ( typeof method === 'object' || ! method ) {
      return methods.init.apply( this, arguments );
    } else {
      $.error( 'Method ' +  method + ' does not exist in Online Chat' );
    }    
  
  };

})( jQuery );