    <!--/Succ Messages/-->
   
  <div id="user_interface_msg" class = "succes_msg">
    	{$msg}
    <span id="msg_close">
    <img id="msg_close" src="{$site_path}front_media/images/close.png" alt="Close"/>
   </span>
   </div>
   
   
   <!--/Error Messages/-->
   
   
   <div id="user_interface_msg" class = "error_msg">
    	{$msg}
    <span id="msg_close">
    <img id="msg_close" src="{$site_path}front_media/images/close.png" alt="Close"/>
   </span>
   </div>
   
   
   
 <?php  
   $_SESSION['msg'] = '<div id="user_interface_msg" class="succes_msg"> Email with your login details has been sent successfully.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							</div>';
							
   $_SESSION['msg'] = '<div id="user_interface_msg" class="error_msg"> Wrong email address and passowrd as an service seeker !
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							</div>';								
 ?>							