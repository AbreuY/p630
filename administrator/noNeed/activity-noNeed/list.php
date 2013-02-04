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
				$objDelEmp->deleteActivityDetails($_REQUEST['emp_id'.($i+1)]);
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

function change_status(activity_id,status,user_id){
	Display_Load();
	jQuery.ajax({
		url: "../ajax/ajax_request.php",
		type: "post",
		data:"action=chnage_activity_status&activity_id="+activity_id+"&status="+status,
		success:function(msg){
			window.location.href='<?php echo AbstractDB::SITE_PATH;?>admin/activity/list.php?page=<?php echo $_GET['page'];?>&user_id='+user_id;
			Hide_Load();
		}
	})
}

function change_supplier_delete_status(activity_id,status,user_id){
	Display_Load();
	jQuery.ajax({
		url: "../ajax/ajax_request.php",
		type: "post",
		data:"action=change_supplier_delete_status&activity_id="+activity_id+"&status="+status,
		success:function(msg){
			window.location.href='<?php echo AbstractDB::SITE_PATH;?>admin/activity/list.php?page=<?php echo $_GET['page'];?>&user_id='+user_id;
			Hide_Load();
		}
	})
}

function change_admin_delete_status(activity_id,status,user_id){
	Display_Load();
	jQuery.ajax({
		url: "../ajax/ajax_request.php",
		type: "post",
		data:"action=change_admin_delete_status&activity_id="+activity_id+"&status="+status,
		success:function(msg){
			window.location.href='<?php echo AbstractDB::SITE_PATH;?>admin/activity/list.php?page=<?php echo $_GET['page'];?>&user_id='+user_id;
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
<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>js/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>css/highslide.css" />
<script type="text/javascript">	
	hs.graphicsDir = '<?php echo AbstractDB::SITE_PATH;?>highslide_graphics/';
	hs.outlineType = 'rounded-white';
	hs.wrapperClassName = 'draggable-header';
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
		
		<?php if(isset($_SESSION['msg']['activity_requirement_added']))
		{ 
		?>
			<h4 class="alert_success">Activity specific requirement added successfully.</h4>
		<?php 
			unset($_SESSION['msg']['activity_requirement_added']);
		} ?>
		
		
		<?php if(isset($_SESSION['msg']['activity_requirement_updated']))
		{ 
		?>
			<h4 class="alert_success">Activity specific requirement updated successfully.</h4>
		<?php 
			unset($_SESSION['msg']['activity_requirement_updated']);
		} ?>
		
		
		<?php if(isset($_SESSION['msg']['Activity_detail_updated'])){ ?>
			<h4 class="alert_success"><?php echo $_SESSION['msg']['Activity_detail_updated']; ?></h4>
		<?php
			unset($_SESSION['msg']['Activity_detail_updated']);
		} ?>
		<?php if(isset($_SESSION['msg']['activity_added'])){ ?>
			<h4 class="alert_success"><?php echo $_SESSION['msg']['activity_added']; ?></h4>
		<?php
			unset($_SESSION['msg']['activity_added']);
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
			$objActivityDtl->getAllActivityDtl($_GET['user_id']);
			$targetpage = "list.php"; 	
			$limit = 10;
			$total_pages = $objActivityDtl->numofrows();	
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
			<h3 class="tabs_involved">Activity Management </h3>
		</header>
		<header>
			<div style="float: left;padding: 5px;">
				&nbsp;&nbsp;
				<input type="submit" name="btnDeleteAll" id="btnDeleteAll" value="Delete All" class="alt_btn" onclick="return delconfirm();" />
				&nbsp;&nbsp;
				<a href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/edit_activity.php?type=new&user_id=<?php echo $_GET['user_id'];?>" title="Upload new image"> <img src="<?php echo AbstractDB::SITE_PATH;?>images/gray-add-to-list-icon.png" border="0" /> Add New Activity </a>
				
			</div>
		</header>
		<div class="tab_container">
			<table class="tablesorter" cellspacing="0" align="left"> 
			<thead> 
				<tr> 
   					<th><input type="checkbox" name="check_all" id="check_all" onclick="set_all_checked(this)" /></th> 
    				<th>Activity Name <a href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/list.php?page=<?php echo $_GET['page'];?>&sort=activity_booker_name&type=DESC&user_id=<?php echo $_GET['user_id'];?>"><img src="../images/sort_up.gif" border="0" /></a><a href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/list.php?page=<?php echo $_GET['page'];?>&sort=activity_booker_name&type=ASC&user_id=<?php echo $_GET['user_id'];?>"><img src="../images/sort_down.gif" border="0" /></a></th>
					<th>Image</th>
    				<th>Status</th> 
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
						<td colspan="7" align="center" style="padding:0px;padding-buttom:2px;">
						<div class="pagination_up">
							<?php echo $paginate;?>
						</div>
						</td>
					</tr>	
					<?php
					$objActivityDtl->getAllActivityDtlPage($start, $limit,$_REQUEST['sort'],$_REQUEST['type'],$_REQUEST['user_id']);
					$i=1;
					$slno=1;
					while($objActivityDtl->getAllRow()){
						if($i%2){
							$bg_color="#E0E0E3";
						}else{
							$bg_color="#FFFFFF";
						}					
				?>
				<tr style='background-color:<?php echo $bg_color;?>;'> 
   					<td>
						<input type="checkbox" id="chk_<?=$slno?>" name="chk_<?=$slno?>" value="" onclick="check_for_all(this)" />
						<input type="hidden" name="emp_id" id="emp_id" value="<?php echo $objActivityDtl->getField('activity_id');?>" />
						<input type="hidden" name="emp_id<?=$slno?>" id="emp_id<?=$slno?>" value="<?php echo $objActivityDtl->getField('activity_id');?>" />
					</td> 
    				<td><?php echo $objActivityDtl->getField('activity_booker_name');?></td>
					
					<td>
					<?php 
							$objActivityImgDtl=clone $objActivityDtl;
							$objActivityImgDtl->getDefaultImg($objActivityDtl->getField('activity_id'));
							$objActivityImgDtl->getAllRow();
							if($objActivityImgDtl->getField('image_path')!=''){
						?>
						<img src="<?php echo AbstractDB::SITE_PATH.'phpThumbnail/phpThumb.php?src=../upload/activity/thumbnail/'.$objActivityImgDtl->getField('image_path').'&w=100&h=100'; ?>" border="0" />
						</td> 
						<?php }else{ ?>
						No image uploaded.</td> 
						<?php } ?>
						
					<td><a href="javascript:void(0);" onclick="change_status('<?php echo base64_encode($objActivityDtl->getField('activity_id'));?>','<?php echo $objActivityDtl->getField('active');?>','<?php echo base64_encode($objActivityDtl->getField('user_id'));?>');"> <?php if($objActivityDtl->getField('active')=='yes'){ echo "Active";}else{ echo "Inactive";}?></a>
					</td> 
					<td><a href="javascript:void(0);" onclick="change_supplier_delete_status('<?php echo base64_encode($objActivityDtl->getField('activity_id'));?>','<?php echo $objActivityDtl->getField('supplier_deleted');?>','<?php echo base64_encode($objActivityDtl->getField('user_id'));?>');"> <?php if($objActivityDtl->getField('supplier_deleted')=='No'){ echo "Not Deleted";}else{ echo "Deleted";}?></a>						
					</td>
					<td><a href="javascript:void(0);" onclick="change_admin_delete_status('<?php echo base64_encode($objActivityDtl->getField('activity_id'));?>','<?php echo $objActivityDtl->getField('admin_deleted');?>','<?php echo base64_encode($objActivityDtl->getField('user_id'));?>');"> <?php if($objActivityDtl->getField('admin_deleted')=='No'){ echo "Not Deleted";}else{ echo "Deleted";}?></a>						
					</td>
    				<td>
						<a href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/time_schedule.php?act_id=<?php echo  base64_encode($objActivityDtl->getField('activity_id'));?>&user_id=<?php echo $_REQUEST['user_id'];?>" title="Update time schedule"><img src="<?php echo AbstractDB::SITE_PATH;?>images/watch_icon.jpg" title="Update time shcedule" width="20" height="20" /></a>
						
						<a href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/activity_sub_category.php?act_id=<?php echo  base64_encode($objActivityDtl->getField('activity_id'));?>&user_id=<?php echo $_REQUEST['user_id'];?>" title="Add sub categories to activity"><img src="<?php echo AbstractDB::SITE_PATH;?>images/gray-add-to-list-icon.png" alt="Add sub categories to activity" title="Add sub categories to activity" width="20" height="20" />
						</a> 
						
						<a href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/activity_pricing.php?act_id=<?php echo  base64_encode($objActivityDtl->getField('activity_id'));?>&user_id=<?php echo $_REQUEST['user_id'];?>" title="Add price to activity"><img src="<?php echo AbstractDB::SITE_PATH;?>images/icon_price.png" alt="Add price to activity" title="Add price to activity" width="20" height="20" />
						</a> 
						
						<a href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/photogallary.php?act_id=<?php echo  base64_encode($objActivityDtl->getField('activity_id'));?>&user_id=<?php echo  base64_encode($objActivityDtl->getField('user_id'));?>" title="View image gallery details"><img src="<?php echo AbstractDB::SITE_PATH;?>images/add_photo.jpg" border="0" width="20" height="20" /></a>
						 <a href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/videogallary.php?act_id=<?php echo  base64_encode($objActivityDtl->getField('activity_id'));?>&user_id=<?php echo  base64_encode($objActivityDtl->getField('user_id'));?>" title="View video gallery details"><img src="<?php echo AbstractDB::SITE_PATH;?>images/add_video.jpg" border="0" width="20" height="20" /></a> 
						 	
						<a href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/viewholiday.php?act_id=<?php echo  base64_encode($objActivityDtl->getField('activity_id'));?>&user_id=<?php echo $_REQUEST['user_id'];?>" title="Update holiday details"><img src="<?php echo AbstractDB::SITE_PATH;?>images/holiday_header_icon.png" title="Update holiday" /></a>
						<?php 
									#cheacking the activity requirment added or not
									$objActReqOrNot=new Admin();
										$objActReqOrNot->getActivityRequirement($objActivityDtl->getField('activity_id'));
										 $count=$objActReqOrNot->numofrows();
						if($count>0)
						{				
						?>
							<a href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/edit_activity_requirement.php?act_id=<?php echo  base64_encode($objActivityDtl->getField('activity_id'));?>&user_id=<?php echo $_REQUEST['user_id'];?>" title="Edit Activity Requirement"><img src="<?php echo AbstractDB::SITE_PATH;?>images/requirement.png" width="20px" width="20px" title="Edit Activity Requirement" /></a>
						<?php					
						}
						else
						{
						?>
						<a href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/activity_requirement.php?act_id=<?php echo  base64_encode($objActivityDtl->getField('activity_id'));?>&user_id=<?php echo $_REQUEST['user_id'];?>" title="Add Activity Requirement"><img src="<?php echo AbstractDB::SITE_PATH;?>images/requirement.png" width="20px" width="20px" title="Add Activity Requirement" /></a>
						<?php
						}
						?>						
							
						
						<a href="<?php echo AbstractDB::SITE_PATH?>admin/activity/edit_activity.php?activity_id=<?php echo base64_encode($objActivityDtl->getField('activity_id'));?>&user_id=<?php echo base64_encode($objActivityDtl->getField('user_id'));?>" title="Edit"><img src="../images/icn_edit.png" border="0"  width="20" height="20"/></a>

						<?php 
						if($asgift == 'Yes')
						{ ?>
                  <a href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/gift_cat.php?act_id=<?php echo  $objActivityDtl->getField('activity_id');?>" onclick="return hs.htmlExpand(this,{objectType: 'iframe'})" class="gift_voucher_otr">
					<img src="../../images/icon-gift.png" width="20" height="20" />
                  </a>
                        <?php } ?>
                        
                        
						&nbsp;
						<!-- <a href="add.php?act_id=<?php echo $objActivityDtl->getField('activity_id');?>&action=delete" title="Trash"><img src="../images/icn_trash.png" /></a>	-->				
					</td> 
				</tr>
				<?php
					$i++;
					$slno++;
					}//end of while
					}else{ 
				?>
				<tr>
					<td colspan="7" align="center">
						No activity Added yet.
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