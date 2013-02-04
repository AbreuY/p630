<?php
require_once("../../pi_classes/commonSetting.php");
require_once("../../pi_classes/class.newsletter.php");
chkAdminLogin();

$adminname=$_SESSION['admin_name'];
$adminid=$_SESSION['admin_Id'];
$user=new newsletter();

//For uploading image

extract($_GET);
extract($_POST);
	
if(isset($_GET['edit_id']) || $_GET['edit_id']!='')
{
	$news_id=$_GET['edit_id'];
	$result=$user->getRecordById($news_id);
	$num_chk=$user->getCount();
}

if($_POST['btnSubmit']!="")
{
	if($_POST['edit_id']!='')
	{		
	
		$title = addslashes($title);
		$content = addslashes($content);	
	
		$set_fields="`title`='".$title."', `content`='".$content."', `modified_on`='".date("Y-m-d")."'";
		$where_field="`id`=".$_POST['edit_id'];
		
			
		
		$rs=$user->updateRecord($set_fields, $where_field);
		$_SESSION['msg1']="<span class='success'>Newsletter updated successfully!</span>";	
	}
	else
	{
		//echo "<pre>"; print_r($_POST); exit;
		$title = addslashes($title);
		//$content = addslashes($content);			
		$content = addslashes($content);	
		$fields="`title`,`content`, `created_on`, `modified_on`";
		$values="'".$title."', '".$content."', '".date("Y-m-d")."', '".date("Y-m-d")."'";
		$cnf=$user->insertRecord($fields,$values);			
	
		$_SESSION['msg1']="<span class='success'>Newsletter added successfully!</span>";	
	}
//	exit;
	header("location:list.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Add Newsletter </title>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>admin/css/layout.css" type="text/css" media="screen" />
<!--[if lt IE 9]>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>admin/css/ie.css" type="text/css" media="screen" />
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery-1.7.1.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/hideshow.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.validate.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
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
        content_css : "css/example.css",

        // Drop lists for link/image/media/template dialogs
        template_external_list_url : "js/template_list.js",
        external_link_list_url : "js/link_list.js",
        external_image_list_url : "js/image_list.js",
        media_external_list_url : "js/media_list.js",

        // Replace values for the template plugin
        template_replace_values : {
                username : "Some User",
                staffid : "991234"
        }
});
</script>

<script type="text/javascript" language="javascript">

$(document).ready(function(){
	//alert("Hello");
	jQuery("#frmRegister").validate({
		 errorElement:'div',
		 rules: {	 
			title:{
				required: true,
				minlength: 2,
				maxlength: 80
			}
		},
		messages: {
			title:{
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

</script>
<style>
#loading { 
width: 70%; 
text-align:center;
padding-top:40px;
position: absolute;
}
</style>
</head>
<body>
<?php include("../header.php");?>	
	<?php include("../menu.php");?>	
<section id="main" class="column">	
<form name="frmRegister" id="frmRegister" action="" method="POST" enctype="multipart/form-data">
	<article class="module width_full">
<header><h3>Add New Newsletter </h3></header>
<header>
	<div style="float: left;padding: 5px 0 0 20px;">
		<a href="<?php echo AbstractDB::SITE_PATH;?>admin/newsletter/list.php" title="Go back"><img src="../images/back_icon2.png" border="0" /></a>
	</div>
</header>
<div class="module_content">
						<fieldset>
							<span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
						</fieldset>


						<input name="mail_page_id" id="mail_page_id" type="hidden" value="<? echo $_REQUEST['mail_page_id'];?>">	
						
							<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>Title<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="title" value="<? echo htmlentities($user->getField('title')); ?>" style="width:92%;">
							<!--
					<input type="text" dir="ltr" class="FETextInput" name="title" value="<? //echo $user->getField('title'); ?>" size="80"  maxlength="255">
				-->
						</fieldset>
						<div class="clear"></div>					
						
						<fieldset style="width:100%; float:left;">
							<label style="float:none;">Message Content</label>
							<br />
							<textarea name="content" id="content" rows="30" cols="100" class="mceEditor" style="margin-left: 10px;"><?php echo htmlentities($user->getField('content')); ?></textarea>	<br /><br />
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
<div class="spacer"></div>
	</section>
</body>
</html>