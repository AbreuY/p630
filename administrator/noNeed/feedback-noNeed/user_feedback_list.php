<?php
	require_once('../../pi_classes/Admin.php');
	ob_start();
	session_start();
	if(empty($_SESSION['admin_id'])){
		header("location:login.php");
	}
	if(isset($_SESSION['act_details']))
		unset($_SESSION['act_details']);
	if(isset($_SESSION['submit_type']))
		unset($_SESSION['submit_type']);			
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
				$objDelEmp->deleteRatingDetails($_REQUEST['emp_id'.($i+1)]);
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
	$("#loading").html("<img src='../images/bigLoader.gif' />");
}
//Hide Loading Image
function Hide_Load()
{
	$("#loading").fadeOut('slow');
};


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
<script type="text/javascript">
function change_feedback_active_status(rating_id,status,user_id){
	Display_Load();
	jQuery.ajax({
		url: "<?php echo AbstractDB::SITE_PATH;?>admin/ajax/ajax_request.php",
		type:"post",
		data:"action=change_rating_status&rating_id="+rating_id+"&status="+status,
		success:function(msg)
		{
			Hide_Load();
			window.location.href='<?php echo AbstractDB::SITE_PATH;?>admin/feedback/user_feedback_list.php?page=<?php echo $_GET['page'];?>&user_id='+user_id;
		}
	});
	

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
		<?php if(isset($_SESSION['msg']['rating_update'])){ ?>
			<h4 class="alert_success">Rating updated successfully.</h4>
		<?php
			unset($_SESSION['msg']['rating_update']);
		} ?>
		
		
		<article class="module width_full">
		<div id="loading"></div>
		<form name="frmEmp" id="frmEmp" method="post" action="">
		<?php
			$objActi=new Admin();
			$objActi->getPrefer($_GET['user_id']);
			$objActi->getAllRow();
			$asgift = $objActi->getField('asgift');
								
			$objActivityDtl=clone $objActi;
			$objActivityDtl=new Admin();
			/* Getting all activities of supplier*/
			$objActivityDtl->getAllActivityIdOfSupplier($_GET['user_id']);
			$arrActivityIds=array();
			while($objActivityDtl->getRow())
			{
				$arrActivityIds[]=$objActivityDtl->getField('activity_id');
			}
			#Making the string of activity ids
				$activity_ids=implode(',',$arrActivityIds);
		
			/* Getting the feedback list of for activity */
			$objFeedbackDtlList=clone $objActivityDtl;
			$objFeedbackDtlList->getFeedbackDtlForActivities($activity_ids);
			$targetpage = "user_feedback_list.php"; 	
			$limit = 10;
			$total_pages = $objFeedbackDtlList->numofrows();	
			$stages = 12;
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
			$user_id=$_GET['user_id'];
			if($lastpage > 1)
			{	
				$paginate .="<div class='paginate'>";
				// Previous
				if ($page > 1){
					$paginate.= "<a href='$targetpage?page=$prev&user_id=$user_id'>previous</a>";
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
							$paginate.= "<a href='$targetpage?page=$counter&user_id=$user_id'>$counter</a>";
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
								$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
							}					
						}
						$paginate.= "...";
						$paginate.= "<a href='$targetpage?page=$LastPagem1&user_id=>$LastPagem1</a>";
						$paginate.= "<a href='$targetpage?page=$lastpage&user_id=$user_id'>$lastpage</a>";		
					}
					// Middle hide some front and some back
					elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
					{
						$paginate.= "<a href='$targetpage?page=1&user_id=$user_id'>1</a>";
						$paginate.= "<a href='$targetpage?page=2&user_id=$user_id'>2</a>";
						$paginate.= "...";
						for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
						{
							if ($counter == $page){
								$paginate.= "<span class='current'>$counter</span>";
							}else{
								$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
							}					
						}
						$paginate.= "...";
						$paginate.= "<a href='$targetpage?page=$LastPagem1&user_id=$user_id'>$LastPagem1</a>";
						$paginate.= "<a href='$targetpage?page=$lastpage&user_id=$user_id'>$lastpage</a>";		
					}
					// End only hide early pages
					else
					{
						$paginate.= "<a href='$targetpage?page=1&user_id=$user_id'>1</a>";
						$paginate.= "<a href='$targetpage?page=2&user_id=$user_id'>2</a>";
						$paginate.= "...";
						for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
						{
							if ($counter == $page){
								$paginate.= "<span class='current'>$counter</span>";
							}else{
								$paginate.= "<a href='$targetpage?page=$counter&user_id=$user_id'>$counter</a>";
							}					
						}
					}
				}
				// Next
				if ($page < $counter - 1){ 
					$paginate.= "<a href='$targetpage?page=$next&user_id=$user_id'>next</a>";
				}else{
					$paginate.= "<span class='disabled'>next</span>";
				}							
				$paginate.= "</div>";		
			}
		?>
		<?php include("../supplier_menu.php");?>
		<?php /*include("../activity_menu.php") */?>
		<header>
			<h3 class="tabs_involved">FeedBack Management</h3>
		</header>
		<header>
			<div style="float: left;padding: 5px;">
				&nbsp;&nbsp;
				<input type="submit" name="btnDeleteAll" id="btnDeleteAll" value="Delete All" class="alt_btn" onclick="return delconfirm();" />
			</div>
		</header>
		<div class="tab_container">
			<table class="tablesorter" cellspacing="0" align="left"> 
			<thead> 
				<tr> 
   					<th><input type="checkbox" name="check_all" id="check_all" onclick="set_all_checked(this)" /></th> 
    				<th>Booking Reference id<a href="<?php echo AbstractDB::SITE_PATH;?>admin/feedback/user_feedback_list.php?page=<?php echo $_GET['page'];?>&sort=booking_id&type=DESC&user_id=<?php echo $_GET['user_id'];?>"><img src="../images/sort_up.gif" border="0" /></a><a href="<?php echo AbstractDB::SITE_PATH;?>admin/feedback/user_feedback_list.php?page=<?php echo $_GET['page'];?>&sort=booking_id&type=ASC&user_id=<?php echo $_GET['user_id'];?>"><img src="../images/sort_down.gif" border="0" /></a></th>
					<th>Activity Name <a href="<?php echo AbstractDB::SITE_PATH;?>admin/feedback/user_feedback_list.php?page=<?php echo $_GET['page'];?>&sort=activity_booker_name&type=DESC&user_id=<?php echo $_GET['user_id'];?>"><img src="../images/sort_up.gif" border="0" /></a><a href="<?php echo AbstractDB::SITE_PATH;?>admin/feedback/user_feedback_list.php?page=<?php echo $_GET['page'];?>&sort=activity_booker_name&type=ASC&user_id=<?php echo $_GET['user_id'];?>"><img src="../images/sort_down.gif" border="0" /></a></th>
    				<th>User Email</th> 
					<th>Average Rating <a href="<?php echo AbstractDB::SITE_PATH;?>admin/feedback/user_feedback_list.php?page=<?php echo $_GET['page'];?>&sort=average_rating&type=DESC&user_id=<?php echo $_GET['user_id'];?>"><img src="../images/sort_up.gif" border="0" /></a><a href="<?php echo AbstractDB::SITE_PATH;?>admin/feedback/user_feedback_list.php?page=<?php echo $_GET['page'];?>&sort=average_rating&type=ASC&user_id=<?php echo $_GET['user_id'];?>"><img src="../images/sort_down.gif" border="0" /></a> </th>
					<th>Status</th> 
					<!--<th>Schedule Date</th>-->
					<th>Added Date <a href="<?php echo AbstractDB::SITE_PATH;?>admin/feedback/user_feedback_list.php?page=<?php echo $_GET['page'];?>&sort=added_date&type=DESC&user_id=<?php echo $_GET['user_id'];?>"><img src="../images/sort_up.gif" border="0" /></a><a href="<?php echo AbstractDB::SITE_PATH;?>admin/feedback/user_feedback_list.php?page=<?php echo $_GET['page'];?>&sort=added_date&type=ASC&user_id=<?php echo $_GET['user_id'];?>"><img src="../images/sort_down.gif" border="0" /></a></th> 
					<th>Actions</th> 
				</tr> 
			</thead> 
			<tbody> 
					<?php
					if($total_pages>0){
					?>
					<tr> 
						<td colspan="9" align="center" style="padding:0px;padding-buttom:2px;">
						<div class="pagination_up">
							<?php echo $paginate;?>
						</div>
						</td>
					</tr>	
					<?php
					$objFeedbackDtlList->getFeedbackDtlForActivitiesPage($start, $limit,$_REQUEST['sort'],$_REQUEST['type'],$activity_ids);
					$i=1;
					$slno=1;
					while($objFeedbackDtlList->getAllRow()){
						if($i%2){
							$bg_color="#E0E0E3";
						}else{
							$bg_color="#FFFFFF";
						}					
				?>
				<tr style='background-color:<?php echo $bg_color;?>;'> 
   					<td>
						<input type="checkbox" id="chk_<?=$slno?>" name="chk_<?=$slno?>" value="" onclick="check_for_all(this)" />
						<input type="hidden" name="emp_id" id="emp_id" value="<?php echo $objFeedbackDtlList->getField('rating_id');?>" />
						<input type="hidden" name="emp_id<?=$slno?>" id="emp_id<?=$slno?>" value="<?php echo $objFeedbackDtlList->getField('rating_id');?>" />
					</td> 
    				<td><?php echo $objFeedbackDtlList->getField('refence_id');?></td>
					<td><?php echo $objFeedbackDtlList->getField('activity_booker_name');?></td> 
					<td><a href="mailto:<?php echo $objFeedbackDtlList->getField('email');?>"><?php echo $objFeedbackDtlList->getField('email');?></a></td> 
					<td><?php echo number_format($objFeedbackDtlList->getField('average_rating'),2);?></td>
					<td>
						<a href="javascript:void(0);" onclick="change_feedback_active_status('<?php echo $objFeedbackDtlList->getField('rating_id');?>','<?php echo $objFeedbackDtlList->getField('status');?>','<?php echo $_REQUEST['user_id'];?>');"><?php if($objFeedbackDtlList->getField('status')=='0'){ echo "Inactive";}else{ echo "Active";}?></a>
					</td>
				<!--	<td><?php echo $objFeedbackDtlList->getField('schedule_date');?></td>-->
					<td><?php echo $objFeedbackDtlList->getField('added_date');?></td>
    				<td>
						 <a href="<?php echo AbstractDB::SITE_PATH?>admin/feedback/user_feedback_detail.php?rating_id=<?php echo base64_encode($objFeedbackDtlList->getField('rating_id'));?>&user_id=<?php echo $_REQUEST['user_id'];?>" title="Edit the Feedback"><img src="../images/icn_edit.png" border="0" /></a> 
					</td> 
				</tr>
				<?php
					$i++;
					$slno++;
					}//end of while
					}else{ 
				?>
				<tr>
					<td colspan="9" align="center">
						No Feedback Added to any activity yet.
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
            <div class="clear"></div>
		</div><!-- end of .tab_container -->		
		</form>
		</article><!-- end of content manager article -->		
		<div class="spacer"></div>
	</section>
</body>
</html>