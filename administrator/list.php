<?php
session_start();
require_once("../../pi_classes/commonSetting.php");
//chkAdminLogin($_SESSION['adminID']);
require_once("../../pi_classes/class.email_template.php");
require_once("../../pi_classes/paging.php");

$adminname=$_SESSION['admin_name'];
$adminid=$_SESSION['admin_Id'];
$admin=new email_template();
//echo "test";
//print_r($_REQUEST['page']);
if(isset($_SESSION['msg1']) && $_REQUEST['page']!=''){
		unset($_SESSION['msg1']);
	}

include_once("../header1.php");
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product Category| Powered by <?php echo AbstractDB::SITE_TITLE;?></title>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>admin/css/layout.css" type="text/css" media="screen" />
<!--[if lt IE 9]>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>admin/css/ie.css" type="text/css" media="screen" />
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery-1.7.1.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/hideshow.js" language="javascript" type="text/javascript"></script>
<!--<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.tablesorter.min.js" language="javascript" type="text/javascript"></script>-->
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.equalHeight.js"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.validate.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript" src="<?=AbstractDB::SITE_PATH?>admin/js/ajaxupload.3.5.js" ></script>
<script>
$(document).ready(function(){ 
	jQuery('.alert_success').mouseover(function(){
		jQuery(this).css('cursor','pointer').click(function(){
			jQuery(this).hide();
		});
	});	
	jQuery('.alert_success').slideDown('slow').delay(3000).slideUp('slow');
	// display error/success/alert messgae
});
</script>
<?php include_once("../header2.php"); ?>
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
	<?php if(isset($_SESSION['msg1'])){ ?>
			<h4 class="alert_success">Email template updated successfully!</h4>
		<?php 
		unset($_SESSION['msg1']);
		} ?>	
	<div class="module_content module width_full ">
<header><h3>Email Template Management</h3></header>
<div class="tab_container">
<table cellspacing="0" cellpadding="10" border="0"  width="100%" class="tablesorter">
<tr>
<td>

	<table cellspacing="0" cellpadding="0" border="0" width="100%">
	<tbody>
	<?php 
	if($msg != ''){
	?>
	<tr>
		<td align="center">
			<?php echo $msg; ?>
		</td>
	</tr>
	<?php
	}
			$admin->getRecordList();
			$recordcount = $admin->getCount();
			$query="1";
			if($recordcount > 0)
			{
				$total	= $recordcount;
				$page 	= $_GET['page'];
				$limit 	= 20;
				$pager  = Pager::getPagerData($total, $limit, $page);
				$offset = $pager->offset;
				$limit  = $pager->limit;
				$page   = $pager->page;
				$query 	= $query . " limit $offset, $limit";
				$admin->getRecordList('',$query);
					
				if($recordcount > $limit){
					if($page == 1){
						echo "Previous";
					}
					else{
						echo "<a href=\"?page=" . ($page - 1) ."\">Previous</a>";
					}
					for ($i = 1; $i <= $pager->numPages; $i++){
						echo "  "." ";
						if ($i == $pager->page)
						{
							echo "<strong>$i</strong>";
						}
						else{
							echo "<a href=\"?page=$i\"> $i </a>";
						} 
					}
					echo "  "." ";
					if ($page == $pager->numPages){
						echo "Next";
						}
					else{
						echo "<a href=\"?page=" . ($page + 1) ."\">Next</a>";
					}
					
				}	
			} // End of PAging
			$cnt=$offset;		
		?>
		
	
	<tr>
	<td>	
		<table cellspacing="1" cellpadding="2" border="0" width="100%" class="worktable">
		 <tbody>
		 <thead>
		 <tr>	 
			<th width="5%" class="">Sr No.</td>
			<th width="20%" class="">Template Name</td>
			<th class="">Template Subject</td>
			<!--<td width="11%" class="workcap">Created On</td>
			<td width="11%" class="workcap">Modified On</td>	-->					
			<th width="10%" class="" colspan="3" align="center">Action</td>
			
		 </tr>
		 </thead>
		<?php
			while($admin->getRow())
			{
				 $news_id=$admin->getField('id');
				 $temp_name=$admin->getField('temp_name');
				 $temp_subject=$admin->getField('temp_subject');
				// $temp_message=$admin->getField('temp_message');
				// $created_on=$admin->getField('created_on');
				// $modified_on=$admin->getField('modified_on');
				
				 $cnt++;							
		?>
		 <tr>
			<td class="worktd" align="left">
				<?php 
					echo strip_tags($cnt);
				?>	
				</td>
				<td class="worktd"  align="left">
					<?php echo $temp_name; ?>	
				</td>
				<td class="worktd"  align="left">
					<?php 
						echo $temp_subject;
						//if(strlen($content) > 100)
//						{
//							echo substr($content,0,100)."...";
//						}
//						else
//						{
//							echo $content; 
//						}
					?>	
				</td>
				
		
			 <td width="70" class="worktd">
				<a style="font-family: Arial; font-size: 12px; border: 0px none;" href="add.php?edit_id=<?php echo $news_id; ?>" title="edit"><img src="../images/icn_edit.png"></a>
			 </td>
		 
			
			
			 
		</tr>
		<?php } 
		if($recordcount==0)
		{
			?>
			<tr>
				<td align="center" colspan="6">
					No record found.
				</td>
			</tr>
			
		<?php
		}
		?>
		</tbody>
		</table>
		
	</td>
	</tr>
	</tbody>
	</table>


</td>
</tr>
</table>
</div>
</div>
</section>

<?php include_once("../footer.php"); ?>
