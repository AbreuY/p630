<?php
	require_once('../../pi_classes/Admin.php');
	ob_start();
	session_start();
	if(empty($_SESSION['admin_id'])){
		header("location:login.php");
	}
	$objAddEmp=new Admin();	
	$objDelEmp=clone $objAddEmp;
	if($_POST['btnSubmit']=='Submit'){
		$objAddEmp=$objAddEmp->addobjActivityImgDtlDetails($_POST);
	}
	if(isset($_SESSION['msg']['added']) && $_REQUEST['page']!=''){
		unset($_SESSION['msg']['added']);
	}	
	if(isset($_SESSION['msg']['delete']) && $_REQUEST['page']!=''){
		unset($_SESSION['msg']['delete']);
		}
	if($_REQUEST['action']=='delete'){
		$cnf=$objDelEmp->deleteobjActivityImgDtlDetails($_REQUEST['emp_id']);
		if($cnf){
			$_SESSION['msg']['delete']='deleted';
		}
	}
	if(isset($_REQUEST['btnDeleteAll']))
	{
		for($i=0; $i<$_REQUEST['totalcount']; $i++)
		{
			if(isset($_REQUEST['chk_'.($i+1)]))
			{	
				$objDelEmp->deleteActivityTimeShcedule($_REQUEST['emp_id'.($i+1)]);
				$deleted = true;	
			}
		}
		if($deleted){
			$_SESSION['msg']['delete']='deleted';
		}
	}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/password_strength_plugin.js"  language="javascript" type="text/javascript"></script>
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

function change_supplier_delete_status(time_sched_id,status){
	Display_Load();
	jQuery.ajax({
		url: "../ajax/ajax_request.php",
		type: "post",
		data:"action=change_supplier_delete_status_of_timescedule&time_sched_id="+time_sched_id+"&status="+status,
		success:function(msg){
			window.location.href='<?php echo AbstractDB::SITE_PATH;?>admin/activity/time_schedule.php?user_id='+jQuery('#user_id').val()+'&act_id='+jQuery('#act_id').val()+'&page=<?php echo $_GET['page'];?>'
			Hide_Load();
		}
	});
}
function change_admin_delete_status(time_sched_id,status){
	Display_Load();
	jQuery.ajax({
		url: "../ajax/ajax_request.php",
		type: "post",
		data:"action=change_admin_delete_status_of_timescedule&time_sched_id="+time_sched_id+"&status="+status,
		success:function(msg){
			window.location.href='<?php echo AbstractDB::SITE_PATH;?>admin/activity/time_schedule.php?user_id='+jQuery('#user_id').val()+'&act_id='+jQuery('#act_id').val()+'&page=<?php echo $_GET['page'];?>'
			Hide_Load();
		}
	});
}

//Display Loading Image
function Display_Load()
{
	$("#loading").fadeIn(900,0);
	$("#loading").html("<img src='../images/bigLoader.gif' />");
}
//Hide Loading Image
function Hide_Load()
{
	$("#loading").fadeOut('slow');
}



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
		<?php if(isset($_SESSION['msg']['delete'])){ ?>
			<h4 class="alert_success">Record deleted successfully!</h4>
		<?php
			unset($_SESSION['msg']['delete']);
		} ?>
		<?php if(isset($_SESSION['msg']['added'])){ ?>
			<h4 class="alert_success">Record added successfully!</h4>
		<?php 
		unset($_SESSION['msg']['added']);
		} ?>	
		<?php if(isset($_SESSION['msg']['updated'])){ ?>
			<h4 class="alert_success">Record updated successfully!</h4>
		<?php 
			unset($_SESSION['msg']['updated']);
		} ?>	
		
		<article class="module width_full">
		<div id="loading"></div>
		<form name="frmEmp" id="frmEmp" method="post" action="">
		<?php
			$objActivityTimeSchedule=new Admin();
			$objActivityTimeSchedule->getActivityTimeSchedule($_REQUEST['act_id']);
			$objActivityTimeSchedule->getAllRow();
			
			$targetpage = "time_schedule.php"; 	
			$limit = 5;
			$total_pages = $objActivityTimeSchedule->numofrows();	
			$stages = 2;
			$page = mysql_escape_string($_GET['page']);
			if($page){
				$start = ($page - 1) * $limit; 
			}else{
				$start = 0;	
			}					
			// Initial page num setup
			if ($page == 0){$page = 1;}
			$prev = $page - 1;	
			$next = $page + 1;							
			$lastpage = ceil($total_pages/$limit);		
			$LastPagem1 = $lastpage - 1;
			$paginate = '';
			$user_id=$_REQUEST['user_id'];
			$act_id=$_REQUEST['act_id'];
			
			if($lastpage > 1)
			{	
				$paginate .="<div class='paginate'>";
				// Previous
				if ($page > 1){
					$paginate.= "<a href='$targetpage?user_id=$user_id&act_id=$act_id&page=$prev'>previous</a>";
				}else{
					$paginate.= "<span class='disabled'>previous</span>";
				}
				// Pages	
				if ($lastpage < 3 + ($stages * 2))	// Not enough pages to breaking it up
				{	
					for ($counter = 1; $counter <= $lastpage; $counter++)
					{
						if ($counter == $page){
							$paginate.= "<span class='current'>$counter</span>";
						}else{
							$paginate.= "<a href='$targetpage?user_id=$user_id&act_id=$act_id&page=$counter'>$counter</a>";
						}					
					}
				}
				elseif($lastpage > 3 + ($stages * 2))	// Enough pages to hide a few?
				{
					// Beginning only hide later pages
					if($page < 1 + ($stages * 2))		
					{
						for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
						{
							if ($counter == $page){
								$paginate.= "<span class='current'>$counter</span>";
							}else{
								$paginate.= "<a href='$targetpage?user_id=$user_id&act_id=$act_id&page=$counter'>$counter</a>";
							}					
						}
						$paginate.= "...";
						$paginate.= "<a href='$targetpage?user_id=$user_id&act_id=$act_id&page=$LastPagem1'>$LastPagem1</a>";
						$paginate.= "<a href='$targetpage?user_id=$user_id&act_id=$act_id&page=$lastpage'>$lastpage</a>";		
					}
					// Middle hide some front and some back
					elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
					{
						$paginate.= "<a href='$targetpage?user_id=$user_id&act_id=$act_id&page=1'>1</a>";
						$paginate.= "<a href='$targetpage?user_id=$user_id&act_id=$act_id&page=2'>2</a>";
						$paginate.= "...";
						for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
						{
							if ($counter == $page){
								$paginate.= "<span class='current'>$counter</span>";
							}else{
								$paginate.= "<a href='$targetpage?user_id=$user_id&act_id=$act_id&page=$counter'>$counter</a>";
							}					
						}
						$paginate.= "...";
						$paginate.= "<a href='$targetpage?user_id=$user_id&act_id=$act_id&page=$LastPagem1'>$LastPagem1</a>";
						$paginate.= "<a href='$targetpage?user_id=$user_id&act_id=$act_id&page=$lastpage'>$lastpage</a>";		
					}
					// End only hide early pages
					else
					{
						$paginate.= "<a href='$targetpage?user_id=$user_id&act_id=$act_id&page=1'>1</a>";
						$paginate.= "<a href='$targetpage?user_id=$user_id&act_id=$act_id&page=2'>2</a>";
						$paginate.= "...";
						for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
						{
							if ($counter == $page){
								$paginate.= "<span class='current'>$counter</span>";
							}else{
								$paginate.= "<a href='$targetpage?user_id=$user_id&act_id=$act_id&page=$counter'>$counter</a>";
							}					
						}
					}
				}
				// Next
				if ($page < $counter - 1){ 
					$paginate.= "<a href='$targetpage?user_id=$user_id&act_id=$act_id&page=$next'>next</a>";
				}else{
					$paginate.= "<span class='disabled'>next</span>";
				}							
				$paginate.= "</div>";		
			}
		?>
		<?php include("../supplier_menu.php");?>
		<?php include("../activity_menu.php")?>
		<header>
			<h3 class="tabs_involved">Activity Time Schedule for
			<font color="#0000FF"><?php 
					$objActivityName=Clone $objActivityTimeSchedule;
					$objActivityName->getActivityNameById($_REQUEST['act_id']);				
					$objActivityName->getRow();
					echo $objActivityName->getField('activity_booker_name'); ?>
			</font>
			</h3>
		</header>
		<header>
			<div style="float: left;padding: 5px;">
			<a href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/list.php?user_id=<?php echo $_REQUEST['user_id'];?>" title="Back"><img src="../images/back_icon2.png" border="0" /></a> &nbsp;
				<input type="submit" name="btnDeleteAll" id="btnDeleteAll" value="Delete All" class="alt_btn" onclick="return delconfirm();" />&nbsp;&nbsp;
				<a href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/add_time_schedule.php?user_id=<?php echo $_REQUEST['user_id'];?>&act_id=<?php echo $_REQUEST['act_id'];?>" title="Add activity time shcedule"><img src="<?php echo AbstractDB::SITE_PATH;?>images/watch_icon.jpg" title="Add activity time shcedule" />Add activity time shcedule</a>
				
				
				<a href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/activity_sub_category.php?user_id=<?php echo $_REQUEST['user_id'];?>&act_id=<?php echo $_REQUEST['act_id'];?>" title="Add activity sub category"><img src="<?php echo AbstractDB::SITE_PATH;?>images/gray-add-to-list-icon.png" alt="Add sub categories to activity" title="Add sub categories to activity" />Next</a>
				
				
			</div>
		</header>
		<div class="tab_container">
			<table class="tablesorter" cellspacing="0" align="left"> 
			<thead> 
				<tr> 
   					<th><input type="checkbox" name="check_all" id="check_all" onclick="set_all_checked(this)" /></th> 
    			<!--	<th>Time Schedule <a href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/time_schedule.php?user_id=<?php echo $_REQUEST['user_id'];?>&act_id=<?php echo $_REQUEST['act_id'];?>&page=<?php echo $_GET['page'];?>&sort=holiday&type=DESC"><img src="../images/sort_up.gif" border="0" /></a><a href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/time_schedule.php?user_id=<?php echo $_REQUEST['user_id'];?>&act_id=<?php echo $_REQUEST['act_id'];?>&page=<?php echo $_GET['page'];?>&sort=holiday&type=ASC"><img src="../images/sort_down.gif" border="0" /></a></th> -->
    				<th>Time Schedule</th>	
					<th>Supplier Deleted</th> 
					<th>Admin Deleted</th> 
					<th>Actions</th> 
				</tr> 
			</thead> 
			<tbody> 
					<?php
						
					if($total_pages>0){
					?>
					<tr> 
						<td colspan="5" align="center" style="padding:0px;padding-buttom:2px;">
						<div class="pagination_up">
							<?php echo $paginate;?>
						</div>
						</td>
					</tr>	
					<?php
				
						$objActivityTimeSchedule->getActivityTimeSchedulePage($start, $limit,$_REQUEST['act_id']);
					$i=1;
					$slno=1;
					while($objActivityTimeSchedule->getAllRow()){
						if($i%2){
							$bg_color="#E0E0E3";
						}else{
							$bg_color="#FFFFFF";
						}					
				?>
				<tr style='background-color:<?php echo $bg_color;?>;'> 
   					<td>
						<input type="checkbox" id="chk_<?=$slno?>" name="chk_<?=$slno?>" value="" onclick="check_for_all(this)" />
						<input type="hidden" name="emp_id" id="emp_id" value="<?php echo $objActivityTimeSchedule->getField('time_schedule_id');?>" />
						<input type="hidden" name="emp_id<?=$slno?>" id="emp_id<?=$slno?>" value="<?php echo $objActivityTimeSchedule->getField('time_schedule_id');?>" />
						<input type="hidden" name="user_id" id="user_id" value="<?php echo $_REQUEST['user_id'];?>" />
						<input type="hidden" name="act_id" id="act_id" value="<?php echo $_REQUEST['act_id'];?>" />
					</td> 
					
    				<td><?php echo $objActivityTimeSchedule->getField('hour').":".$objActivityTimeSchedule->getField('minute')." ".$objActivityTimeSchedule->getField('schedule_at') ;?></td>
					<td><a href="javascript:void(0);" onclick="change_supplier_delete_status('<?php echo base64_encode($objActivityTimeSchedule->getField('time_schedule_id'));?>','<?php echo $objActivityTimeSchedule->getField('supplier_deleted');?>');"> <?php if($objActivityTimeSchedule->getField('supplier_deleted')=='No'){ echo "Not Deleted";}else{ echo "Deleted";}?></a></td>
				    
					<td><a href="javascript:void(0);" onclick="change_admin_delete_status('<?php echo base64_encode($objActivityTimeSchedule->getField('time_schedule_id'));?>','<?php echo $objActivityTimeSchedule->getField('admin_deleted');?>');"> <?php if($objActivityTimeSchedule->getField('admin_deleted')=='No'){ echo "Not Deleted";}else{ echo "Deleted";}?></a></td>
														
    				<td><a href="<?php echo ABstractDB::SITE_PATH;?>admin/activity/edit_time_schedule.php?user_id=<?php echo $_REQUEST['user_id'];?>&act_id=<?php echo base64_encode($objActivityTimeSchedule->getField('activity_id'));?>&time_schedule_id=<?php echo base64_encode($objActivityTimeSchedule->getField('time_schedule_id'));?>" title="Edit"><img src="../images/icn_edit.png" border="0" /></a>
					</td>  
					
						
					
				</tr>
				<?php
					$i++;
					$slno++;
				}//end of while
					}else{ 
				?>
				<tr>
					<td colspan="5" align="center">
						No time schedule added yet.
					</td>
				</tr>
				<?php } ?>
			</tbody> 
			</table>
			<footer>
				<div style="float: left;padding: 5px;">
					<input type="hidden" value="<?=($slno-1)?>" name="totalcount" />
					<input type="submit" name="btnDeleteAll" id="btnDeleteAll" value="Delete All" class="alt_btn" onclick="return delconfirm();" />
				</div>
				<div class="pagination_down">
					<?php echo $paginate;?>
				</div>	
			</footer>
		</div><!-- end of .tab_container -->		
		</form>
		</article><!-- end of content manager article -->		
		<div class="spacer"></div>
	</section>
</body>
</html>