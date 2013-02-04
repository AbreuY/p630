<?php
#RequiresFiles:
	require_once("../../pi_classes/commonSetting.php");
	require_once("../../pi_classes/class.cms.php");
#Redirect:
	chkAdminLogin();
#Objects:
	$cmsobj=new cms();
	$cmsUpdtobj=clone $cmsobj;
#Action:
	$cms_page = urldecode(base64_decode($_GET['cms_id']));	
	$cmsobj->getCMSContents($cms_page);
	$num_chk = $cmsobj->getRow();
	if($_POST['btnSubmit']=="Update")
	{
		$_SESSION['admin_cms_updated']='updated';
		$content  = $_POST["content"];
		$cmsUpdtobj->updateCMSContents(base64_decode($_POST['cms_id']),$content);	
		header("Location:manage_cms.php");
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
<script type="text/javascript" src="<?=AbstractDB::SITE_PATH?>/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
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
	<form name="frmRegister" id="frmRegister" method="post">
	<input type="hidden" name="cms_id" id="cms_id" value="<?php echo $_GET['cms_id'];?>" />
	<article class="module width_full" style="width:95%">
		<div id="loading"></div>	
<header><h3><? if(isset($_GET['cms_id']) || $_GET['cms_id']!='')
{ echo "Edit"; }else{ echo "Add"; }?> CMS Page</h3></header>

<header>
	<div style="float: left;padding: 5px 0 0 20px;">
		<a href="<?php echo AbstractDB::SITE_PATH;?>administrator/manage_cms.php" title="Go back"><img src="images/back_icon2.png" border="0" /></a>
	</div>
</header>
	<div class="module_content">
							<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>Page Name :<sup style="color:#FF0000;font-weight:bold;">*</sup>
                             <?php echo htmlentities($cmsobj->getField('page_name')); ?></label>
								
		</fieldset>
							<div class="clear"></div>					
							<fieldset style="width:100%; float:left;">
							<label style="float:none;">Message Content</label>
							<textarea name="content" id="content" rows="25" cols="100" class="mceEditor" style="margin-left: 10px;">
                            <?php echo stripcslashes($cmsobj->getField('content'));?></textarea>	
							<br /><br />
							</fieldset>
							<div class="clear"></div>
	</div>
	<footer>
	<div class="submit_link" style="float:left; margin-left:20px;">
		<input type="submit" value="Update" name="btnSubmit" id="btnSubmit" class="btn3 alt_btn">		
	</div>
	</footer>
</article>
</form>
</section>
</body>
</html>