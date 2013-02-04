<?php
session_start();
require_once("../../pi_classes/commonSetting.php");

//chkAdminLogin($_SESSION['adminID']);

//echo urlencode(base64_encode("What Are BidBundles"));
require_once("../../pi_classes/paging.php");
require_once("../../pi_classes/class.category.php");
$Obj=new category();
$ObjDetail=clone $Obj;
$ObjParentCat=clone $Obj;
//$whereCnd="`lang_id`=1 ORDER BY `page_name`";
//$cmsobj->getRecordList("",$whereCnd);
//$cmsobj->getCount();
	
if(isset($_GET['delete_id']))
{
	$del_id=$_GET['delete_id'];

//
	$res=$Obj->deleteRecordById($del_id);
	$_SESSION['msg']="<span class='success'>Deleted record successfully!</span>";	
	header("location:".$_SERVER['HTTP_REFERER']);
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
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.equalHeight.js"></script>
<script type="text/javascript">
function confirmDelete(deleteid)
{
	//alert(deleteid);
	if (confirm("Are you sure you want to delete product subcategory?"))
	{
		window.location="list.php?delete_id="+deleteid;
	}
}
</script>
<script type="text/javascript">
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

//Display Loading Image
function Display_Load()
{
	$("#loading").fadeIn(900,0);
	$("#loading").html("<img src='images/bigLoader.gif' />");
}
//Hide Loading Image
function Hide_Load()
{
	$("#loading").fadeOut('slow');
};

function change_status(emp_id,status){
	Display_Load();
	jQuery.ajax({
		url: "ajax/ajax_request.php",
		type: "post",
		data:"action=chnage_emp_status&emp_id="+emp_id+"&status="+status,
		success:function(msg){
			window.location.href='<?php echo AbstractDB::SITE_PATH;?>admin/manage_employee_details.php?page=<?php echo $_GET['page'];?>';
			Hide_Load();
		}
	})
}
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
<style>
#loading { 
width: 70%; 
text-align:center;
padding-top:40px;
position: absolute;
}
.paginate {
  font-family: Arial,Helvetica,sans-serif;
  margin: 3px;
  padding: 3px;
  text-align:center;
}
</style>
</head>
<body>
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>
	<section id="main" class="column">
		<?php if(isset($_SESSION['msg']['delete'])){ ?>
			<h4 class="alert_success">Record deleted successfully!</h4>
		<?php	unset($_SESSION['msg']); 
			} ?>	
				
		<article class="module width_full">
		<?php
		if($_SESSION['msg1']){ ?>
			<h4 class="alert_success"><?php echo $_SESSION['msg1']; ?></h4> <?php 
			unset($_SESSION['msg1']);
		} ?>
		<div id="loading"></div>
		
		<header>
			<h3 class="tabs_involved">Product Sub Category Management </h3>
		</header>
		<header>
			 <h3><a  class="alt_btn admin-btn " href="add.php" style="border: 0px none; width:150px; font-family: Arial; font-size: 12px;">Add Subcategory</a></h3>
		</header>	
		
		<header>
		 <?php
			$whereCnd="`parent_id`!=0 ORDER BY `parent_id`";
			$Obj->getRecordList("*",$whereCnd);
			
			$recordcount = $Obj->getCount();
			$query=$whereCnd;
			if($recordcount > 0)
			{
				$total	= $recordcount;
				$page 	= $_GET['page'];
				$limit 	= 10;
				$pager  = Pager::getPagerData($total, $limit, $page);
				$offset = $pager->offset;
				$limit  = $pager->limit;
				$page   = $pager->page;
				$query 	= $query . " limit $offset, $limit";
				$Obj->getRecordList('',$query);
					
				if($recordcount > $limit){
					echo '<div class="paginate">';
					if($page == 1){
						echo "<span class='disabled'>Previous</span>";
					}
					else{
						echo "<a href=\"?page=" . ($page - 1) ."\">Previous</a>";
					}
					for ($i = 1; $i <= $pager->numPages; $i++){
						echo "  "." ";
						if ($i == $pager->page)
						{
							echo "<span class='current'><strong>$i</strong></span>";
						}
						else{
							echo "<a href=\"?page=$i\"> $i </a>";
						} 
					}
					echo "  "." ";
					if ($page == $pager->numPages){
						echo "<span class='disabled'>Next</span>";
						}
					else{
						echo "<a href=\"?page=" . ($page + 1) ."\">Next</a>";
					}
					
				}
				echo '</div>';	
			} // End of PAging
			$cnt=$offset;	?>
		</header>
	<table class="tablesorter" cellspacing="0" cellpadding="0" border="0" width="100%">
	<tbody>
	<? 
		if($msg != ''){
	?>
	<tr>
		<td align="center">
			<? echo $msg; ?>
		</td>
	</tr>
	<?
	}
	?>
		
	
		 <tbody>
		 
		 <tr>
			 <td width="40" class="workcap">Sr No.</td>
			 <td width="200" class="workcap">Subcategory Name</td>
			 <td width="200" class="workcap">Category Name</td>
			 <td width="40" class="workcap">Edit</td>
			 <td width="40" class="workcap">Delete</td>
		 </tr>
		<?
			
			while($Obj->getRow())
			{
				 $cat_id=$Obj->getField('cat_id');
				 $parent_cat_id=$Obj->getField('parent_id');
				
				 $whereCnd="`cat_id`=".$cat_id." and lang_id=".DEFAULT_LANG_ID;
				// $pk_name=array();
				 $ObjDetail->getLanguageSpecificRecordList("*",$whereCnd);
				 $ObjDetail->getRow();
				 $cat_name=$ObjDetail->getField('cat_name');

				// Get Parent Category Name
				 //$ObjParentCat->getRecordById($parent_cat_id);
				 $whereCnd="`cat_id`=".$parent_cat_id." and lang_id=".DEFAULT_LANG_ID;
				 $ObjParentCat->getLanguageSpecificRecordList("*",$whereCnd);
				 $ObjParentCat->getRow();
				 $parent_cat_name=$ObjParentCat->getField('cat_name');
					if($cnt%2){
						$bg_color="#E0E0E3";
					}else{
						$bg_color="#FFFFFF";
					}
				
				 $cnt++;							
			?>
		 <tr style='background-color:<?php echo $bg_color;?>;'>
			 <td width="40" class="worktd"><? echo $cnt; ?></td>
			 <td width="100" class="worktd"><? echo $cat_name; ?></td> 		
			  <td width="150" class="worktd"><? echo $parent_cat_name; ?></td>	
			 <td width="70" class="worktd">
				<a title="Edit" style="font-family: Arial; font-size: 12px; border: 0px none;" href="add.php?edit_id=<? echo $cat_id; ?>"><img src="../images/icn_edit.png"></a></td>
			 
		 	<td  width="70" class="worktd">
				<a  title="Trash" style="font-family: Arial; font-size: 12px; border: 0px none;" href="javascript:void(0)"><img border="0" onclick="return confirmDelete(<? echo $cat_id; ?>)" src="../images/icn_trash.png"></a>
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

</body>
</html>