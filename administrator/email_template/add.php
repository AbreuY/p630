<?php
#RequiresFiles:
require_once("../../pi_classes/commonSetting.php");
require_once("../../pi_classes/class.email_template.php");
#Redirect:
chkAdminLogin();
#Objects:
$user	=	new email_template();
#Action:	
if(isset($_GET['mail_page_id']) || $_GET['mail_page_id']!='')
{
	$news_id=$_GET['mail_page_id'];
	$user->getRecordById($news_id);
	$user->getRow();
}
#Action:	
if($_POST['btnSubmit']!="")
{
	if($_POST['mail_page_id']!='')
	{		
		$mail_subject = addslashes($_POST['mail_subject']);
		$mail_description = addslashes(base64_encode($_POST['content']));			
		$set_fields="`mail_subject`='".$mail_subject."', `mail_description`='".$mail_description."'";
		$where_field="`mail_page_id`='".$_POST['mail_page_id']."'";
		$rs=$user->updateRecord($set_fields, $where_field);
		$_SESSION['msg']['updated']="Updated";	
	}
	header("location:list.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Email Template| Powered by <?php echo AbstractDB::SITE_TITLE;?></title>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>administrator/css/layout.css" type="text/css" media="screen" />
<!--[if lt IE 9]>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>administrator/css/ie.css" type="text/css" media="screen" />
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/html5.js"></script>
<![endif]-->
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery-1.7.1.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/hideshow.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery.equalHeight.js"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery.validate.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH?>/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
        // General options
        mode : "textareas",
        theme : "advanced",
        plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

        // Theme options
        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,

        // Skin options
        skin : "o2k7",
        skin_variant : "silver",

        // Example content CSS (should be your site CSS)
        //content_css : "css/example.css",

        // Drop lists for link/image/media/template dialogs
        template_external_list_url : "<?php echo AbstractDB::SITE_PATH;?>js/template_list.js",
        external_link_list_url : "<?php echo AbstractDB::SITE_PATH;?>js/link_list.js",
        external_image_list_url : "<?php echo AbstractDB::SITE_PATH;?>js/image_list.js",
        media_external_list_url : "<?php echo AbstractDB::SITE_PATH;?>js/media_list.js",

        // Replace values for the template plugin
        template_replace_values : {
                username : "Some User",
                staffid : "991234"
        }
});
</script>
<script type="text/javascript" language="javascript">
jQuery(document).ready(function(){	
	jQuery("#frmRegister").validate({
		 errorElement:'div',
		 rules: {	 
			temp_subject:{
				required: true,
				minlength: 2,
				maxlength: 100
			}
		},
		messages: {
			temp_subject:{
				required: "Please enter title",
				minlength: jQuery.format("Please enter at least {0} characters"),
				maxlength: jQuery.format("Please enter at most {0} characters")
			}
		},
		// set this class to error-labels to indicate valid fields
		success: function(label) {
		// set &nbsp; as text for IE
			label.hide();
		}
	});

});
function insertText(obj) {
	newtext = obj.value;
	//alert(newtext);
	tinyMCE.execCommand("mceInsertContent",false,newtext);
}
</script>
</head>
<body>
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>	
	<section id="main" class="column">	
	<form name="frmRegister" id="frmRegister" action="" method="POST" enctype="multipart/form-data">
	<article class="module width_full">
<header><h3><? if(isset($_GET['mail_page_id']) || $_GET['mail_page_id']!='')
{ echo "Edit"; }else{ echo "Add"; }?> Email Template</h3></header>
<header>
	<div style="float: left;padding: 5px 0 0 20px;">
		<a href="<?php echo AbstractDB::SITE_PATH;?>administrator/email_template/list.php" title="Go back"><img src="../images/back_icon2.png" border="0" /></a>
	</div>
</header>
<header><h4>Please do not edit values with |VALUE| format. These values are replaced with dynamic values, at the time of email sending</h4></header>
<div class="module_content">
						<input name="mail_page_id" id="mail_page_id" type="hidden" value="<?php echo $_REQUEST['mail_page_id'];?>">	
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>Subject<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="mail_subject" id="mail_subject" value="<?php echo htmlentities($user->getField('mail_subject')); ?>" style="width:92%;" />
						</fieldset>
						<div class="clear"></div>					
						
						<fieldset style="width:100%; float:left;">
							<label style="float:none;">Message Content</label>
							<textarea name="content" id="content" rows="30" cols="100" class="mceEditor" style="margin-left: 10px;"><?php echo stripslashes(base64_decode($user->getField('mail_description')));?></textarea>
							
							<br /><br />
							<strong>Double click to insert (If you want to add the field at your mail body then follow the following patterns.ie for name use %%name%%)</strong><br/>
							<select  class="combobox"  multiple ondblclick="insertText(this)" style="min-height:150px;">
								
								<option value="%%email%%">Email->%%email%%</option>
								<option value="%%username%%">Username->%%username%%</option>
								<option value="%%password%%">Password->%%password%%</option>
                                <option value="%%first_name%%">First name->%%first_name%%</option> 
								<option value="%%last_name%%">Last name->%%last_name%%</option> 
                                <!--
                                <option value="%%contact_name%%">Contact name->%%contact_name%%</option> 
								
                                
								<option value="%%link%%">Link->%%link%%</option>
                                <option value="%%confirm_link%%">Confirm Link->%%confirm_link%%</option>
                                <option value="%%decline_link%%">Decline Link->%%decline_link%%</option>
                                <option value="%%book_detail%%">Book Detail->%%book_detail%%</option>
                                <option value="%%suggested_category%%">Suggested Category->%%suggested_category%%</option>
                                
                                <option value="%%activity_name%%">Activity Name->%%activity_name%%</option>
                                <option value="%%amount_in_local_currency%%">Amount In Local Currency->%%amount_in_local_currency%%</option>
                                <option value="%%amount_in_paid_currency%%">Amount In Paid Currency->%%amount_in_paid_currency%%</option>
                                <option value="%%deposite_in_local_currency%%">Deposite In Local Currency->%%deposite_in_local_currency%%</option>
                                <option value="%%deposite_in_paid_currency%%">Deposite In Paid Currency->%%deposite_in_paid_currency%%</option>
                                <option value="%%balance_in_local_currency%%">Balance In Local Currency->%%balance_in_local_currency%%</option>
                                <option value="%%balance_in_paid_currency%%">Balance In Paid Currency->%%balance_in_paid_currency%%</option>-->
                                
							</select>
						</fieldset>
						<div class="clear"></div>
</div>
		<footer>
		<div class="submit_link" style="float:left; margin-left:20px;">
			<input type="submit" value="Submit" name="btnSubmit" class="btn3 alt_btn">		
		</div>
		</footer>
	</article>
</form>
</section>
</body>
</html>