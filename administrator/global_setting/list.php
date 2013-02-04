<?php
#RequireFile:
require_once("../../pi_classes/commonSetting.php");
require_once("../../pi_classes/Admin.php");
chkAdminLogin();		
$adminname = $_SESSION['admin_name'];
$adminid   = $_SESSION['admin_Id'];
#Object:
$admin=new Admin();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Global Setting| Powered by <?php echo AbstractDB::SITE_TITLE;?></title>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>administrator/css/layout.css" type="text/css" media="screen" />
<!--[if lt IE 9]>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>administrator/css/ie.css" type="text/css" media="screen" />
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/html5.js"></script>
<![endif]-->
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery-1.7.1.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/hideshow.js" language="javascript" type="text/javascript"></script>
<!--<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery.tablesorter.min.js" language="javascript" type="text/javascript"></script>-->
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery.equalHeight.js"></script>
</head>
<body>
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>	
	<section id="main" class="column">
		<?php if(isset($_SESSION['msg']['delete'])){ ?>
			<h4 class="alert_success">Record deleted successfully!</h4>
		<?php unset($_SESSION['msg']['delete']); } ?>	
		<?php if(isset($_SESSION['msg']['added'])){ ?>
			<h4 class="alert_success">Record added successfully!</h4>
		<?php unset($_SESSION['msg']['added']); } ?>	
		<?php if(isset($_SESSION['msg']['updated'])){ ?>
			<h4 class="alert_success">Record updated successfully!</h4>
		<?php 
			unset($_SESSION['msg']['updated']);
		} ?>	
		
		<article class="module width_full">
		<form name="frmGlobbalSetting" id="frmGlobbalSetting" method="post" action="">
		<?php
			$admin->getGlobalSettingList();
			$recordcount = $admin->getCount();
		?>
		<header>
			<h3 class="tabs_involved">Global Setting Management </h3>
		</header>
		<div class="tab_container">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr>   		
					<th>#</th>
    				<th>Parameter Name</th>
					<th>Parameter Value</th>
					<th>Actions</th> 
				</tr> 
			</thead> 
			<tbody> 
					<?php
					if($recordcount>0){
					$query="1";							
					$i=1;
					$slno=1;
					while($admin->getRow())
					{
						 $id=$admin->getField('id');
						 $name=$admin->getField('name');
						 $value=$admin->getField('value');						
						 $cnt++;
						if($i%2){
							$bg_color="#E0E0E3";
						}else{
							$bg_color="#FFFFFF";
						}					
				?>
				<tr style='background-color:<?php echo $bg_color;?>;'> 
   					<td  class="worktd"><?php echo $cnt; ?></td>
					<td  class="worktd"><?php echo $name; ?></td> 		
					<td  class="worktd"><?php echo $value; ?></td> 	
					<td  class="worktd">
						<a style="font-family: Arial; font-size: 12px; border: 0px none;" href="add.php?edit_id=<?php echo $id; ?>" title="edit"><img src="../images/icn_edit.png" border="0" /></a>
					</td>
				</tr>
				<?php
					$i++;
					$slno++;
					}//end of while
					}else{ 
				?>
				<tr>
					<td colspan="4" align="center">
						No record found.
					</td>
				</tr>
				<?php } ?>
			</tbody> 
			</table>
			<footer>		
					
			</footer>
		</div><!-- end of .tab_container -->		
		</form>
		</article><!-- end of content manager article -->		
		<div class="spacer"></div>
	</section>
</body>
</html>