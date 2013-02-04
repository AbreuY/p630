<?php
require_once("../pi_classes/commonSetting.php");
chkAdminLogin($_SESSION['admin_id']);
require_once("../pi_classes/class.cms.php");
$boxobj=new cms();
ob_start();
session_start();
$boxobj->getBoxcontent();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Global Variable| Powered by <?php echo AbstractDB::SITE_TITLE;?></title>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>admin/css/layout.css" type="text/css" media="screen" />
<!--[if lt IE 9]>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>admin/css/ie.css" type="text/css" media="screen" />
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/html5.js"></script>
<![endif]-->
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery-1.7.1.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/hideshow.js" language="javascript" type="text/javascript"></script>
<!--<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.tablesorter.min.js" language="javascript" type="text/javascript"></script>-->
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.equalHeight.js"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.validate.js" language="javascript" type="text/javascript"></script>
</head>
<body>
	<?php include("header.php");?>	
	<?php include("menu.php");?>	
<section id="main" class="column">	
<div class="module_content module width_full ">
<header><h3>Ad Box Content</h3></header>
<div class="tab_container">
<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td>
<?php echo $succ; ?>
<?php if(isset($_SESSION['admin_cms_updated']))
		{ ?>
			<h4 class="alert_success">Record updated successfully!</h4>
		<?php 
			unset($_SESSION['admin_cms_updated']);
		} ?>
</span>
</td>
</tr>
</table>
<br>
<table cellspacing="1"  cellpadding=2 border="0" width="100%" class="tablesorter">
	<thead>
	<tr>
		<th >Box Title</th>
		<th style="text-align: center;">Edit</th>
	</tr>
	</thead>
	<?php $i=1; 
	while($boxobj->getRow())
		{
			$box_name=$boxobj->getField('box_name');
			$url_box_name=str_replace(" ","_",$boxobj->getField('box_name'));
			if($i%2)
			{
				$bg_color="#E0E0E3";
			}
		else{
				$bg_color="#FFFFFF";
			}
			$i++;	
		?>
		<tr style='background-color:<?php echo $bg_color;?>;'>
			<td class="worktd" width="250">
			<?php echo ucfirst(str_replace("-"," ",($box_name))); ?>
			</td>
			
			<td class="worktd"  align="center" width="70">
				<A  HREF="add_box.php?box_id=<?php echo urlencode(base64_encode($box_name)); ?>" title="edit" style="font-family:Arial; font-size:12px; border:0px;" >
				<img src="images/icn_edit.png" alt="edit" border="0" />
				</a>
				</td>
		</tr>
		<?php 
		}
	?>
</table>

</div>
</div>
</section>
</body>
</html>
