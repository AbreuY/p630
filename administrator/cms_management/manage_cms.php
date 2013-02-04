<?php
#RequiresFiles:
	require_once("../../pi_classes/commonSetting.php");
	require_once("../../pi_classes/class.cms.php");
#Redirect:
	chkAdminLogin($_SESSION['admin_id']);
#objects:
	$cmsobj=new cms();

#Action:
$whereCnd="`lang_id`=1 ORDER BY `page_name`";
$cmsobj->getRecordList("",$whereCnd);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Global Variable| Powered by <?php echo AbstractDB::SITE_TITLE;?></title>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>administrator/css/layout.css" type="text/css" media="screen" />
<!--[if lt IE 9]>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>administrator/css/ie.css" type="text/css" media="screen" />
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/html5.js"></script>
<![endif]-->
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery-1.7.1.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/hideshow.js" language="javascript" type="text/javascript"></script>
<!--<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery.tablesorter.min.js" language="javascript" type="text/javascript"></script>-->
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery.equalHeight.js"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery.validate.js" language="javascript" type="text/javascript"></script>
</head>
<body>
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>	
	<section id="main" class="column">	
	<div class="module_content module width_full ">
<header><h3>CMS Management</h3></header>
<div class="tab_container">
<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td>
<?php echo $succ; ?>
<?php if(isset($_SESSION['admin_cms_updated'])){ ?>
			<h4 class="alert_success">Record updated successfully!</h4>
		<?php 
			unset($_SESSION['admin_cms_updated']);
		} ?>
</span>
</td>
</tr>
</table>
<br>


<TABLE cellspacing="1"  cellpadding=2 border="0" width="100%" class="tablesorter">
	<thead>
	<TR>
		<th >Page Title</th>
		<th style="text-align: center;">Edit</th>
	</TR>
	</thead>
	<?php $i=1; while($cmsobj->getRow())
	{
		$page_name=$cmsobj->getField('page_name');
		$url_page_name=str_replace(" ","_",$cmsobj->getField('page_name'));
		if($i%2){
			$bg_color="#E0E0E3";
		}else{
			$bg_color="#FFFFFF";
		}
		$i++;	
	?>
	<TR style='background-color:<?php echo $bg_color;?>;'>
		<TD class="worktd" width="250">
		<?php echo ucfirst(str_replace("-"," ",($page_name))); ?>
		</TD>
		
		<TD class="worktd"  align="center" width="70">
			<A  HREF="add_cmc.php?cms_id=<?php echo urlencode(base64_encode($page_name)); ?>" title="edit" style="font-family:Arial; font-size:12px; border:0px;" >
			<img src="<?=site_path;?>administrator/images/icn_edit.png" alt="edit" border="0" />
			</a>
			</TD>
	</TR>
	<?php 
		}
	?>

</table>

</div>
</div>
</section>
</body>
</html>
