<?php
	require_once("../../pi_classes/commonSetting.php");
	require_once('../../pi_classes/Admin.php');
	chkAdminLogin();
	$objAddCountry=new Admin();	
	$objDelEmp=clone $objAddCountry;
	if(isset($_SESSION['msg']['delete'])){
		unset($_SESSION['msg']['delete']);
	}
	if(isset($_SESSION['msg']['added']) && $_REQUEST['page']!=''){
		unset($_SESSION['msg']['added']);
	}	
	if(isset($_REQUEST['btnDeleteAll']))
	{
		for($i=0; $i<$_REQUEST['totalcount']; $i++)
		{
			if(isset($_REQUEST['chk_'.($i+1)]))
			{	
				$objDelEmp->deleteCountryCityTipdDetails($_REQUEST['tips_id'.($i+1)]);
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
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/html5.js"></script>
<![endif]-->
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery-1.7.1.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/hideshow.js" language="javascript" type="text/javascript"></script>
<!--<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.tablesorter.min.js" language="javascript" type="text/javascript"></script>-->
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.equalHeight.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){ 
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
function updateTipsStatus(tips_id,status)
{

	Display_Load();
	jQuery.ajax({
		url: "../ajax/ajax_request.php",
		type: "post",
		data:"action=chnage_tips_status&tips_id="+tips_id+"&status="+status,
		success:function(msg){
			id=<?php echo $_GET['id'];?>;
			window.location.href='<?php echo AbstractDB::SITE_PATH;?>admin/city/manage_tips.php?page=<?php echo $_GET['page'];?>&id='+id;
			
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
};

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
			unset($_SESSION['msg']['deleted']);
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
		<form name="from_country_tips" id="from_country_tips" method="post" action="">
		<?php
			$objTipsDtl=new Admin();
			$objTipsDtl->getCountryCityTips($_REQUEST['id'],'City');
			$targetpage = "manage_tips.php?id=".$_REQUEST['id']; 	
			$limit = 20;
			$total_pages = $objTipsDtl->numofrows();	
			$stages = 23;
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
			if($lastpage > 1)
			{	
				$paginate .="<div class='paginate'>";
				// Previous
				if ($page > 1){
					$paginate.= "<a href='$targetpage?page=$prev'>previous</a>";
				}else{
					$paginate.= "<span class='disabled'>previous</span>";
				}
				// Pages	
				if ($lastpage < 13 + ($stages * 2))	// Not enough pages to breaking it up
				{	
					for ($counter = 1; $counter <= $lastpage; $counter++)
					{
						if ($counter == $page){
							$paginate.= "<span class='current'>$counter</span>";
						}else{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
				}
				elseif($lastpage > 13 + ($stages * 2))	// Enough pages to hide a few?
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
						$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
						$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
					}
					// Middle hide some front and some back
					elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
					{
						$paginate.= "<a href='$targetpage?page=1'>1</a>";
						$paginate.= "<a href='$targetpage?page=2'>2</a>";
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
						$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
						$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
					}
					// End only hide early pages
					else
					{
						$paginate.= "<a href='$targetpage?page=1'>1</a>";
						$paginate.= "<a href='$targetpage?page=2'>2</a>";
						$paginate.= "...";
						for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
						{
							if ($counter == $page){
								$paginate.= "<span class='current'>$counter</span>";
							}else{
								$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
							}					
						}
					}
				}
				// Next
				if ($page < $counter - 1){ 
					$paginate.= "<a href='$targetpage?page=$next'>next</a>";
				}else{
					$paginate.= "<span class='disabled'>next</span>";
				}							
				$paginate.= "</div>";		
			}
		?>
		<header>
			<h3 class="tabs_involved">City Tips Management </h3>
		</header>
		<header>
			<div style="float: left;padding: 5px;">
				<a href="<?php echo AbstractDB::SITE_PATH;?>admin/city/list_for_activity.php" title="Back"> <img src="../images/back_icon2.png" border="0" /></a>
				&nbsp;&nbsp;
				<input type="submit" name="btnDeleteAll" id="btnDeleteAll" value="Delete All" class="alt_btn" onclick="return delconfirm();" />
				&nbsp;&nbsp;
				<a href="add_tips.php?id=<?php echo $_REQUEST['id'];?>" title="Add Tips"> <img src="../images/upload.png" border="0" /> Add New Tips </a>
			</div>
		</header>
		<div class="tab_container">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th><input type="checkbox" name="check_all" id="check_all" onclick="set_all_checked(this)" /></th> 
    				<th>Tips ID <a href="<?php echo AbstractDB::SITE_PATH;?>admin/city/manage_tips.php?page=<?php echo $_GET['page'];?>&sort=id&type=DESC"><img src="../images/sort_up.gif" border="0" /></a><a href="<?php echo AbstractDB::SITE_PATH;?>admin/city/manage_tips.php?page=<?php echo $_GET['page'];?>&sort=id&type=ASC"><img src="../images/sort_down.gif" border="0"/></a></th>
					<th>City Name <a href="<?php echo AbstractDB::SITE_PATH;?>admin/city/manage_tips.php?page=<?php echo $_GET['page'];?>&sort=city_name &type=DESC"><img src="../images/sort_up.gif" border="0"/></a><a href="<?php echo AbstractDB::SITE_PATH;?>admin/city/manage_tips.php?page=<?php echo $_GET['page'];?>&sort=city_name&type=ASC"><img src="../images/sort_down.gif" border="0"/></a></th>
                    <th>Status</th>
					<th>Tips Content</th>
					<th> Action </th>
				</tr> 
			</thead> 
			<tbody> 
					<?php
					if($total_pages>0){
					?>
					<tr> 
						<td colspan="6" align="center" style="padding:0px;padding-buttom:2px;">
						<div class="pagination_up">
							<?php echo $paginate;?>
						</div>
						</td>
					</tr>	
					<?php
					$objTipsDtl->getCountryCityTipsPage($start, $limit,$_REQUEST['sort'],$_REQUEST['type'],$_REQUEST['id'],'City');
					$i=1;
					$slno=1;
					while($objTipsDtl->getAllRow()){
						if($i%2){
							$bg_color="#E0E0E3";
						}else{
							$bg_color="#FFFFFF";
						}					
				?>
				<tr style='background-color:<?php echo $bg_color;?>;'> 
   					<td>
						<input type="checkbox" id="chk_<?=$slno?>" name="chk_<?=$slno?>" value="" onclick="check_for_all(this)" />
						<input type="hidden" name="tips_id" id="tips_id" value="<?php echo $objTipsDtl->getField('id');?>" />
						<input type="hidden" name="tips_id<?=$slno?>" id="tips_id<?=$slno?>" value="<?php echo $objTipsDtl->getField('id');?>" />
					</td> 
    				<td><?php echo $objTipsDtl->getField('id');?></td>
					<td><?php echo stripslashes($objTipsDtl->getField('city_name'));?></td>
                    <?php
						  $status=$objTipsDtl->getField('tips_status');
		  				  $tips_id=$objTipsDtl->getField('id');
					 ?>
                    <td><a href="javascript:void(0)" onclick="updateTipsStatus(<?php echo $tips_id;?>,'<?php echo $status;?>');" ><?php echo stripslashes($objTipsDtl->getField('tips_status'));?></a></td>
					<td><?php echo stripslashes($objTipsDtl->getField('tips_content'));?></td>
    				<td>
						<a href="add_tips.php?id=<?php echo $objTipsDtl->getField('country_city_id');?>&tips_id=<?php echo $objTipsDtl->getField('id');?>" title="Edit"><img src="../images/icn_edit.png"  border="0" /></a>
					</td> 
				</tr>
				<?php
					$i++;
					$slno++;
					}//end of while
					}else{ 
				?>
				<tr>
					<td colspan="6" align="center">
						No record found.
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