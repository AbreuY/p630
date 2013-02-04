<?php
ob_start();
session_start();
require_once("../../pi_classes/commonSetting.php");
require_once('../../pi_classes/Admin.php');
//chkAdminLogin($_SESSION['adminID']);

require_once("../../pi_classes/class.newsletter.php");
require_once("../../pi_classes/paging.php");

$adminname=$_SESSION['admin_name'];
$adminid=$_SESSION['admin_Id'];

$admin=new newsletter();
$objEmpDtl=new Admin();


if(isset($_GET['delete_id']))
{
	$cat_id=$_GET['delete_id'];

	$whereCnd="`id`=".$cat_id;
	$res=$admin->deleteRecord($whereCnd);	
	$_SESSION['msg']="<span class='success'>Newsletter deleted successfully!</span>";	
	header("location:".$_SERVER['HTTP_REFERER']);
}
///print_r($_REQUEST);
if(isset($_REQUEST['btnDeleteAll']))
	{
		//print_r($_REQUEST);
		//die();
		for($i=0; $i<$_REQUEST['totalcount']; $i++)
		{
			if(isset($_REQUEST['chk_'.($i+1)]))
			{	
				$objEmpDtl->deleteNewsDetails($_REQUEST['emp_id'.($i+1)]);
				//echo "delted ";
				$deleted = true;	
			}
		}
		if($deleted){
			$_SESSION['msg']['delete']='deleted';
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IN ADMIN PANEL | Powered by <?php echo AbstractDB::SITE_TITLE;?></title>
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



<script type="text/javascript">
function confirmDelete(deleteid)
{
	//alert(deleteid);
	if (confirm("Are you sure you want to delete newsletter?"))
	{
		window.location="list.php?delete_id="+deleteid;
	}
}

$(document).ready(function(){ 
	//$(".tablesorter").tablesorter(); 
	
	// display error/success/alert messgae
	jQuery('.alert_error').mouseover(function(){
		jQuery(this).css('cursor','pointer').click(function(){
			jQuery(this).hide();
		});
	});	
	jQuery('.alert_error').slideDown('slow').delay(3000).slideUp('slow');
	
	jQuery('.alert_info').mouseover(function(){
		jQuery(this).css('cursor','pointer').click(function(){
			jQuery(this).hide();
		});
	});	
	jQuery('.alert_info').slideDown('slow').delay(3000).slideUp('slow');
	
	jQuery('.alert_success').mouseover(function(){
		jQuery(this).css('cursor','pointer').click(function(){
			jQuery(this).hide();
		});
	});	
	jQuery('.alert_success').slideDown('slow').delay(3000).slideUp('slow');
	// display error/success/alert messgae
	
	
	
});

function checkAll(chk){
	for (i = 0; i < chk.length; i++){
		if(jQuery('#check_all').is(':checked')){
			chk[i].checked = true;
		}else{
			chk[i].checked = false;
		}
	}
}

function set_all_checked(obj) 
{	
	var chk	=	null;
	if(obj.checked) 
	{
		for(var i=1; chk=document.getElementById('chk_'+i); i++){	
			chk.checked	=	true;
		}
	}
	else 
	{
		for(var i=1; chk=document.getElementById('chk_'+i); i++){
			chk.checked	=	false;
		}
	}
}

function check_for_all(obj)
{
	var check_all	=	document.getElementById('check_all');
	if(!obj.checked) {
		check_all.checked	=	false;
		return;
	}
	var flag	=	true;
	for(var i=1; chk=document.getElementById('chk_'+i); i++) {
		if(!chk.checked) {
			flag	=	false;
			break;
		}
	}
	check_all.checked	=	flag;
}
function delconfirm()
{
	var status=confirm("Are you sure to delete the record");
	if(status)
	{
		return true;
	}
	else
	{
		return false;
	}
}

</script>
</head>
<body>
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>	
	
	<section id="main" class="column">
		<?php if(isset($_SESSION['msg1'])){ ?>
			<h4 class="alert_success"><?php echo $_SESSION['msg1']; ?></h4>
		<?php 
		unset($_SESSION['msg1']);
		} ?>
		
		<?php if(isset($_SESSION['sent_newsletter_msg'])){ ?>
			<h4 class="alert_success"><?php echo $_SESSION['sent_newsletter_msg']; ?></h4>
		<?php 
			unset($_SESSION['sent_newsletter_msg']);
		} ?>	
		<div class="module_content module width_full ">
			<form name="frmnews" id="frmnews" method="post" action="">
			<header><h3>Newsletter Management</h3></header>
			<header>
			<div style="float: left;padding: 5px;">
				<input type="submit" name="btnDeleteAll" id="btnDeleteAll" value="Delete All" class="alt_btn" onclick="return delconfirm();" />
			</div>
			<div style="float: right;padding: 5px;">
				<a class="admin-btn" href="add.php" style="border: 0px none; font-family: Arial; font-size: 12px;">Add Newsletter</a></td>
			</div>
		</header>	
			
<div class="tab_container">

	<table cellspacing="0" cellpadding="0" border="0" width="100%" class="tablesorter">
		<tbody>
		 <?php
		 		if(empty($_REQUEST['sort'])) $_REQUEST['sort'] = "content";
				if(empty($_REQUEST['type'])) $_REQUEST['type'] = "ASC";
			
			$admin->getRecordList();
			$recordcount = $admin->getCount();
			$query="1";
			if($recordcount > 0)
			{
				$total	= $recordcount;
				$page 	= $_GET['page'];
				$limit 	= 5;
				$pager  = Pager::getPagerData($total, $limit, $page);
				$offset = $pager->offset;
				$limit  = $pager->limit;
				$page   = $pager->page;
				$query 	= $query . " order by ".$_REQUEST['sort']." ".$_REQUEST['type']." limit ".$offset.",". $limit ;
				$admin->getRecordList('',$query);
					
				if($recordcount > $limit){
					echo '<div class="pagination_up">';
					echo '<div class="paginate">';
					if($page == 1){
						echo '<span class="disabled">previous</span>';
					}
					else{
						echo "<a href=\"?page=" . ($page - 1) ."\">Previous</a>";
					}
					for ($i = 1; $i <= $pager->numPages; $i++){
						echo "  "." ";
						if ($i == $pager->page)
						{
							echo "<span class='current'>$i</span>";
						}
						else{
							echo "<a href=\"?page=$i\"> $i </a>";
						} 
					}
					echo "  "." ";
					if ($page == $pager->numPages){
						echo '<span class="disabled">Next</span>';
						}
					else{
						echo "<a href=\"?page=" . ($page + 1) ."\">Next</a>";
					}
					
				}	
				echo '</div>';
				echo '</div>';
			} // End of PAging
			$cnt=$offset;		
		?>
		
		 <thead> 
				<tr> 
   					<th><input type="checkbox" name="check_all" id="check_all" onclick="set_all_checked(this)" /></th>
    				<th> Sr No. </th>
					<th>Subject <a href="<?php echo AbstractDB::SITE_PATH;?>admin/newsletter/list.php?page=<?php echo $_GET['page'];?>&sort=title&type=DESC"><img src="../images/sort_up.gif"></a><a href="<?php echo AbstractDB::SITE_PATH;?>admin/newsletter/list.php?page=<?php echo $_GET['page'];?>&sort=title&type=ASC"><img src="../images/sort_down.gif"></a></th>
					<th>Content <a href="<?php echo AbstractDB::SITE_PATH;?>admin/newsletter/list.php?page=<?php echo $_GET['page'];?>&sort=content&type=DESC"><img src="../images/sort_up.gif"></a><a href="<?php echo AbstractDB::SITE_PATH;?>admin/newsletter/list.php?page=<?php echo $_GET['page'];?>&sort=content&type=ASC"><img src="../images/sort_down.gif"></a></th>
					<th>Created On <a href="<?php echo AbstractDB::SITE_PATH;?>admin/newsletter/list.php?page=<?php echo $_GET['page'];?>&sort=created_on&type=DESC"><img src="../images/sort_up.gif"></a><a href="<?php echo AbstractDB::SITE_PATH;?>admin/newsletter/list.php?page=<?php echo $_GET['page'];?>&sort=created_on&type=ASC"><img src="../images/sort_down.gif"></a></th>
    				<th>Modified On <a href="<?php echo AbstractDB::SITE_PATH;?>admin/newsletter/list.php?page=<?php echo $_GET['page'];?>&sort=modified_on&type=DESC"><img src="../images/sort_up.gif"></a><a href="<?php echo AbstractDB::SITE_PATH;?>admin/newsletter/list.php?page=<?php echo $_GET['page'];?>&sort=modified_on&type=ASC"><img src="../images/sort_down.gif"></a></th> 
					<th>Actions</th>
				</tr> 
			</thead> 
		 
		<?php $i=1;
			$slno=1;
			while($admin->getRow())
			{
				if($i%2){
							$bg_color="#E0E0E3";
							
						}else{
							$bg_color="#FFFFFF";
						}	
				 $news_id=$admin->getField('id');
				 $title=$admin->getField('title');
				 $content=$admin->getField('content');
				 $created_on=$admin->getField('created_on');
				 $modified_on=$admin->getField('modified_on');
				
				 $cnt++;
				 $i++;	
				 					
		?>
		 <tr style='background-color:<?php echo $bg_color;?>;'>
			<td class="" align="left">
			<input type="checkbox" id="chk_<?=$slno?>" name="chk_<?=$slno?>" value="" onclick="check_for_all(this)" /></td>
			<input type="hidden" name="emp_id" id="emp_id" value="<?php echo $news_id;?>" />
			<input type="hidden" name="emp_id<?=$slno?>" id="emp_id<?=$slno?>" value="<?php echo $news_id;?>" />
					
				<td><?php 
					echo strip_tags($cnt);
				?>	</td>	
				</td>
				<td class=""  align="left">
					<?php echo $title; ?>	
				</td>
				<td class=""  align="left">
					<?php 
					/*
						if(strlen($content) > 100)
						{
							echo substr($content,0,100)."...";
						}
						else
						{
						
					*/		echo $content; 
					//	}
					?>	
				</td>
				<td class=""  align="left">
					<?php echo $created_on; ?>	
				</td>
				<td class=""  align="left">
					<?php echo $modified_on; ?>	
				</td>
		
			 <td width="70" class="" style="text-align:center">
					<a title="edit" style="font-family: Arial; font-size: 12px; border: 0px none;" href="add.php?edit_id=<?php echo $news_id; ?>"><img src="../images/icn_edit.png"></a>
					<a  title="Send" style="font-family: Arial; font-size: 12px; border: 0px none;" href="send-newsletter.php?news_id=<?php echo $news_id; ?>"><img border="0" height="16px" src="../images/Send Icon.gif"></a>
			 </td>
		</tr>
		<?php $slno++; } 
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
		</td>
	</tr>
</table>

<footer>
<div style="float: left;padding: 5px;">
					<input type="hidden" value="<?=($slno-1)?>" name="totalcount" />
					<input type="submit" name="btnDeleteAll" id="btnDeleteAll" value="Delete All" class="alt_btn" onclick="return delconfirm();" />
				</div>

<?php 
if($recordcount > $limit){
					echo '<div class="pagination_up">';
					echo '<div class="paginate">';
					if($page == 1){
						echo '<span class="disabled">previous</span>';
					}
					else{
						echo "<a href=\"?page=" . ($page - 1) ."\">Previous</a>";
					}
					for ($i = 1; $i <= $pager->numPages; $i++){
						echo "  "." ";
						if ($i == $pager->page)
						{
							echo "<span class='current'>$i</span>";
						}
						else{
							echo "<a href=\"?page=$i\"> $i </a>";
						} 
					}
					echo "  "." ";
					if ($page == $pager->numPages){
						echo '<span class="disabled">Next</span>';
						}
					else{
						echo "<a href=\"?page=" . ($page + 1) ."\">Next</a>";
					}
					
				}	
				echo '</div>';
				echo '</div>';
			// End of PAging
			$cnt=$offset; ?>
			</form>
			</footer>	
</div>
</div>
</section>

</body>
</html>