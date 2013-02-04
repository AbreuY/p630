<?php
	require_once('../../pi_classes/commonSetting.php');
	require_once('../../pi_classes/Admin.php');
	ob_start();
	session_start();
	chkAdminLogin();
	$activity_id= base64_decode($_GET['act_id']);
	
	$objAddPhotoGallaryBody=new Admin();	
	$objDelPhotoGallary=clone $objAddPhotoGallaryBody;
	
	/*if($_POST['btnSubmit']=='Submit'){
		$objAddPhotoGallaryBody->addEmployeeDetails($_POST);
	}*/

	if(isset($_REQUEST['btnDeleteAll']))
	{
		for($i=0; $i<$_REQUEST['totalcount']; $i++)
		{
			if(isset($_REQUEST['chk_'.($i+1)]))
			{	
				$objDelPhotoGallary->deletePhotoGallaryImgDetails($_REQUEST['id'.($i+1)],$activity_id);
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
<title>Manage Admin details | Powered by <?php echo AbstractDB::SITE_TITLE;?></title>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>admin/css/layout.css" type="text/css" media="screen" />
<!--[if lt IE 9]>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>admin/css/ie.css" type="text/css" media="screen" />
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/html5.js"></script>
<![endif]-->
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery-1.7.1.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/hideshow.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.equalHeight.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){ 
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

/*function change_status(emp_id,status){
	Display_Load();
	jQuery.ajax({
		url: "ajax/ajax_request.php",
		type: "post",
		data:"action=chnage_emp_status&emp_id="+emp_id+"&status="+status,
		success:function(msg){
			window.location.href='<?php echo AbstractDB::SITE_PATH;?>admin/photogallary.php?page=<?php echo $_GET['page'];?>';
			Hide_Load();
		}
	})
}*/
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
</style>
</head>
<body>
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>	
	<section id="main" class="column">
		<?php if(isset($_SESSION['msg']['delete'])){ ?>
			<h4 class="alert_success">Record deleted successfully!</h4>
		<?php } 
		if(isset($_SESSION['msg']['delete'])){
			unset($_SESSION['msg']['delete']);
		}
		?>	
		<?php if(isset($_SESSION['msg']['added'])){ ?>
			<h4 class="alert_success">Record added successfully!</h4>
		<?php } 
		if(isset($_SESSION['msg']['added'])){
			unset($_SESSION['msg']['added']);
		}
		?>	
		<?php if(isset($_SESSION['msg']['updated'])){ ?>
			<h4 class="alert_success">Record updated successfully!</h4>
		<?php }
		if(isset($_SESSION['msg']['updated'])){
			unset($_SESSION['msg']['updated']);
		}
		?>	
		
		<article class="module width_full">
		<div id="loading"></div>
		<form name="frmPhotoGallaryImg" id="frmPhotoGallaryImg" method="post" action="">
		<?php
			$objPhotoGallaryDtl=new Admin();
			$objPhotoGallaryDtl->getPhotoGallaryImgDetails($activity_id);
			$objPhotoGallaryDtl->getAllRow();
			$targetpage = "photogallary.php"; 	
			$param="&act_id=".$_GET['act_id'];
			$limit = 2;
			$total_pages = $objPhotoGallaryDtl->numofrows();	
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
			if($lastpage > 1)
			{	
				$paginate .="<div class='paginate'>";
				// Previous
				if ($page > 1){
					$paginate.= "<a href='$targetpage?page=$prev$param&user_id=$user_id'>previous</a>";
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
							$paginate.= "<a href='$targetpage?page=$counter$param&user_id=$user_id'>$counter</a>";
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
								$paginate.= "<a href='$targetpage?page=$counter$param&user_id=$user_id'>$counter</a>";
							}					
						}
						$paginate.= "...";
						$paginate.= "<a href='$targetpage?page=$LastPagem1$param&user_id=$user_id'>$LastPagem1</a>";
						$paginate.= "<a href='$targetpage?page=$lastpage$param&user_id=$user_id'>$lastpage</a>";		
					}
					// Middle hide some front and some back
					elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
					{
						$paginate.= "<a href='$targetpage?page=1$param&user_id=$user_id'>1</a>";
						$paginate.= "<a href='$targetpage?page=2$param&user_id=$user_id'>2</a>";
						$paginate.= "...";
						for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
						{
							if ($counter == $page){
								$paginate.= "<span class='current'>$counter</span>";
							}else{
								$paginate.= "<a href='$targetpage?page=$counter$param&user_id=$user_id'>$counter</a>";
							}					
						}
						$paginate.= "...";
						$paginate.= "<a href='$targetpage?page=$LastPagem1$param&user_id=$user_id'>$LastPagem1</a>";
						$paginate.= "<a href='$targetpage?page=$lastpage$param&user_id=$user_id'>$lastpage</a>";		
					}
					// End only hide early pages
					else
					{
						$paginate.= "<a href='$targetpage?page=1$param&user_id=$user_id'>1</a>";
						$paginate.= "<a href='$targetpage?page=2$param&user_id=$user_id'>2</a>";
						$paginate.= "...";
						for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
						{
							if ($counter == $page){
								$paginate.= "<span class='current'>$counter</span>";
							}else{
								$paginate.= "<a href='$targetpage?page=$counter$param&user_id=$user_id'>$counter</a>";
							}					
						}
					}
				}
				// Next
				if ($page < $counter - 1){ 
					$paginate.= "<a href='$targetpage?page=$next$param&user_id=$user_id'>next</a>";
				}else{
					$paginate.= "<span class='disabled'>next</span>";
				}							
				$paginate.= "</div>";		
			}
		?>
		
		<?php include("../supplier_menu.php");?>
		 <header>
			<h3 class="tabs_involved">Activity Image Gallery Management for <font color="#0000FF"><?php 
					$objActivityName=new Admin();
					$objActivityName->getActivityNameById($_REQUEST['act_id']);				
					$objActivityName->getRow();
					echo $objActivityName->getField('activity_booker_name'); ?>
			</font> </h3>
		</header>
		<header>
			<div style="float: left;padding: 5px;">
				<a href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/list.php?user_id=<?php echo $_REQUEST['user_id'];?>" title="Back"><img src="../images/back_icon2.png" border="0" /></a>
				&nbsp;&nbsp;
				<input type="submit" name="btnDeleteAll" id="btnDeleteAll" value="Delete All" class="alt_btn" onclick="return delconfirm();" />
				&nbsp;&nbsp;
				<a href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/upload_photo_gallary_img.php?act_id=<?php echo base64_encode($activity_id);?>&user_id=<?php echo $_GET['user_id'];?>" title="Upload new image"> <img src="<?php echo AbstractDB::SITE_PATH;?>images/add_photo.jpg" border="0" /> Add new image </a>
				
				<a href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/videogallary.php?user_id=<?php echo $_REQUEST['user_id'];?>&act_id=<?php echo $_REQUEST['act_id'];?>" title="Add activity video"><img src="<?php echo AbstractDB::SITE_PATH;?>images/add_video.jpg" alt="Add activity video" title="Add activity video" />Next</a>
				
				
			</div>
		</header>
		<div class="tab_container">
			<table class="tablesorter" cellspacing="0" align="left"> 
			<thead> 
				<tr> 
   					<th><input type="checkbox" name="check_all" id="check_all" onclick="set_all_checked(this)" /></th> 
    				<th>Title <a href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/photogallary.php?page=<?php echo $_GET['page'];?>&sort=photo_name&type=DESC&act_id=<?php echo $_REQUEST['act_id'];?>&user_id=<?php echo $_REQUEST['user_id'];?>"><img src="<?php echo AbstractDB::SITE_PATH;?>admin/images/sort_up.gif" border="0" /></a><a href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/photogallary.php?page=<?php echo $_GET['page'];?>&sort=photo_name&type=ASC&act_id=<?php echo $_REQUEST['act_id'];?>&user_id=<?php echo $_REQUEST['user_id'];?>"><img src="<?php echo AbstractDB::SITE_PATH;?>admin/images/sort_down.gif" border="0" /></a></th>
					<th>Image</th>
					<th>Cover image</th>
					<th>Actions</th> 
				</tr> 
			</thead> 
			<tbody> 
					<?php
					if($total_pages>0){
					?>
					<tr> 
						<td colspan="8" align="center" style="padding:0px;padding-buttom:2px;">
						<div class="pagination_up">
							<?php echo $paginate;?>
						</div>
						</td>
					</tr>
					<?php
					$objPhotoGallaryDtl->getAllPhotoGallaryImgDtlPage($activity_id,$start, $limit,$_REQUEST['sort'],$_REQUEST['type']);
					$i=1;
					$slno=1;
					//print_r($objPhotoGallaryDtl);die();
					while($objPhotoGallaryDtl->getAllRow()){
						if($i%2){
							$bg_color="#E0E0E3";
						}else{
							$bg_color="#FFFFFF";
						}					
				?>
				<tr style='background-color:<?php echo $bg_color;?>;'> 
   					<td>
						<input type="checkbox" id="chk_<?=$slno?>" name="chk_<?=$slno?>" value="" onclick="check_for_all(this)" />
						<input type="hidden" name="id" id="id" value="<?php echo base64_encode($objPhotoGallaryDtl->getField('id'));?>" />
						<input type="hidden" name="id<?=$slno?>" id="id<?=$slno?>" value="<?php echo base64_encode($objPhotoGallaryDtl->getField('id'));?>" />
					</td> 
    				<td><?php echo stripslashes($objPhotoGallaryDtl->getField('photo_name'));?></td>					
					<td>
						<?php 
							if($objPhotoGallaryDtl->getField('image_path')!=''){
						?>
						<img src="<?php echo AbstractDB::SITE_PATH.'phpThumbnail/phpThumb.php?src=../upload/activity/thumbnail/'.$objPhotoGallaryDtl->getField('image_path').'&w=100&h=100'; ?>" border="0" />						
						<?php }else{ ?>
						No image uploaded.
						<?php } ?>
					</td>					
					<td>
					<?php if($objPhotoGallaryDtl->getField('default')){ echo "Yes"; }else{ echo "No";} ?>
					</td>					
    				<td>
						<a href="edit_upload_photo_gal.php?img_id=<?php echo base64_encode($objPhotoGallaryDtl->getField('id'));?>&act_id=<?php echo $_REQUEST['act_id'];?>&user_id=<?php echo $_REQUEST['user_id'];?>" title="Edit"><img src="../images/icn_edit.png" border="0" /> </a>						
					</td> 
				</tr>
				<?php
					$i++;
					$slno++;
					}//end of while
					}else{ 
				?>
				<tr>
					<td colspan="8" align="center">
						No image yet.
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