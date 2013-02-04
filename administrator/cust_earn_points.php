<?php
	require_once('../pi_classes/Admin.php');
	ob_start();
	session_start();
	if(empty($_SESSION['admin_id'])){
		header("location:login.php");
	}
	$objAddEmp=new Admin();	
	$objDelEmp=clone $objAddEmp;
	if($_POST['btnSubmit']=='Update')
	{
		$objUpdateUserEarnPoints=clone $objAddEmp;
		$objUpdateUserEarnPoints->updateUserEarnPoints($_POST);
			$_SESSION['msg']['earn_points_update']="Customer earn points updated successfully.";
			header('location:'.AbstractDB::SITE_PATH.'admin/manage_users.php');
			
		/*echo "<pre>";
			print_r($_POST);
		  echo "</pre>";*/
	}
	
	if(isset($_REQUEST['btnDeleteAll']))
	{
		for($i=0; $i<$_REQUEST['totalcount']; $i++)
		{
			if(isset($_REQUEST['chk_'.($i+1)]))
			{	
				//print_r($_REQUEST);
				$objDelEmp->deleteEarnPointDtl($_REQUEST['earn_id'.($i+1)]);
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
	
	jQuery('#btnCancel').click(function(){
		location.href="manage_users.php";
	});
});

//Display Loading Image
function Display_Load()
{
	$("#loading").fadeIn(900,0);
	$("#loading").html("<img src='images/bigLoader.gif' border='0' />");
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
		data:"action=chnage_user_status&emp_id="+emp_id+"&status="+status,
		success:function(msg){
			window.location.href='<?php echo AbstractDB::SITE_PATH;?>admin/manage_users.php?page=<?php echo $_GET['page'];?>';
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
</style>
</head>
<body>
	<?php include("header.php");?>	
	<?php include("menu.php");?>	
	<section id="main" class="column"> 
		<?php if(isset($_SESSION['msg']['delete'])){ ?>
			<h4 class="alert_success">Record deleted successfully!</h4>
		<?php
				unset($_SESSION['msg']['delete']);
			 } ?>	
		<?php if(isset($_SESSION['msg']['updated'])){ ?>
			<h4 class="alert_success">Record updated successfully!</h4>
		<?php 
			unset($_SESSION['msg']['updated']);
		} ?>	
		
		<article class="module width_full">
		<div id="loading"></div>
		<form name="frm_cust_earn_points" id="frm_cust_earn_points" method="post" action="">
		<?php
			$objCustEarnPointDtl=new Admin();
			$objCustEarnPointDtl->getCustEarnPoints(base64_decode($_GET['user_id']));
			$targetpage = "cust_earn_points.php"; 	
			$user_id=$_GET['user_id'];
			$limit = 5;
			$total_pages = $objCustEarnPointDtl->numofrows();	
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
								$paginate.= "<a href='$targetpage?page=$counter&user_id=$user_id'>$counter</a>";
							}					
						}
						$paginate.= "...";
						$paginate.= "<a href='$targetpage?page=$LastPagem1&user_id=$user_id'>$LastPagem1</a>";
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
								$paginate.= "<a href='$targetpage?page=$counter&user_id=$user_id'>$counter</a>";
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
		
		<header>
			<h3 class="tabs_involved">User Earn Point Management</h3>
		</header>
		<header>
			<div style="float: left;padding: 5px 0 0 20px;">
					<a href="<?php echo AbstractDB::SITE_PATH;?>admin/manage_users.php" title="Go back"><img src="images/back_icon2.png" /></a>
			</div>
		</header>	
			
		<header>
			<div style="float: left;padding: 5px;">
				<input type="submit" name="btnDeleteAll" id="btnDeleteAll" value="Delete All" class="alt_btn" onclick="return delconfirm();" />
			</div>
		</header>
		
		
		<div class="tab_container">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th><input type="checkbox" name="check_all" id="check_all" onclick="set_all_checked(this)" /></th> 
    				<th>Earn By<a href="<?php echo AbstractDB::SITE_PATH;?>admin/cust_earn_points.php?user_id=<?php echo $user_id;?>&page=<?php echo $_GET['page'];?>&sort=type&type=DESC"><img src="images/sort_up.gif" border="0" /></a><a href="<?php echo AbstractDB::SITE_PATH;?>admin/cust_earn_points.php?user_id=<?php echo $user_id;?>&page=<?php echo $_GET['page'];?>&sort=type&type=ASC"><img src="images/sort_down.gif" border="0" /></a></th>
					<th>Booking Reference Id<a href="<?php echo AbstractDB::SITE_PATH;?>admin/cust_earn_points.php?user_id=<?php echo $user_id;?>&page=<?php echo $_GET['page'];?>&sort=booking_id&type=DESC"><img src="images/sort_up.gif" border="0" /></a><a href="<?php echo AbstractDB::SITE_PATH;?>admin/cust_earn_points.php?user_id=<?php echo $user_id;?>&page=<?php echo $_GET['page'];?>&sort=booking_id&type=ASC"><img src="images/sort_down.gif" border="0" /></a></th>
					<th>Points</th>
    				<th>Status</th> 
    				<th>Date <a href="<?php echo AbstractDB::SITE_PATH;?>admin/cust_earn_points.php?user_id=<?php echo $user_id;?>&page=<?php echo $_GET['page'];?>&sort=date&type=DESC"><img src="images/sort_up.gif" border="0" /></a><a href="<?php echo AbstractDB::SITE_PATH;?>admin/cust_earn_points.php?user_id=<?php echo $user_id;?>&page=<?php echo $_GET['page'];?>&sort=date&type=ASC"><img src="images/sort_down.gif" border="0" /></a></th> 
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
						$objCustEarnPointDtlPage=clone $objCustEarnPointDtl;
						$objCustEarnPointDtlPage->getCustEarnPointsPage($start, $limit,$_REQUEST['sort'],$_REQUEST['type'],base64_decode($_GET['user_id']));
					$i=1;
					$slno=1;
					while($objCustEarnPointDtlPage->getRow()){
						if($i%2){
							$bg_color="#E0E0E3";
						}else{
							$bg_color="#FFFFFF";
						}					
				?>
				<tr style='background-color:<?php echo $bg_color;?>;'> 
   					<td>
						<input type="checkbox" id="chk_<?=$slno?>" name="chk_<?=$slno?>" value="" onclick="check_for_all(this)" />
						<input type="hidden" name="earn_id" id="earn_id" value="<?php echo base64_encode($objCustEarnPointDtlPage->getField('earn_id'));?>" />
						<input type="hidden" name="earn_id<?=$slno?>" id="earn_id<?=$slno?>" value="<?php echo base64_encode($objCustEarnPointDtlPage->getField('earn_id'));?>" />
					</td> 
    				<td><?php echo $objCustEarnPointDtlPage->getField('type');?></td>
					<td><?php echo $objCustEarnPointDtlPage->getField('refence_id');?></td>
					<td>
						<input type="text" style="width:50px;" name="earn_points[<?php echo $objCustEarnPointDtlPage->getField('earn_id')?>][points]" value="<?php echo $objCustEarnPointDtlPage->getField('number_of_points'); ?>" />
						</td>
					<td> 
					
					<input type="radio" name="earn_points[<?php echo $objCustEarnPointDtlPage->getField('earn_id')?>][status]" <?php if($objCustEarnPointDtlPage->getField('status')=='Active'){?> checked="checked" <?php }?> value="Active" />Active
					<input type="radio" name="earn_points[<?php echo $objCustEarnPointDtlPage->getField('earn_id')?>][status]" <?php if($objCustEarnPointDtlPage->getField('status')=='Deactive'){?> checked="checked" <?php }?> value="Deactive" />Deactive
					<input type="radio" name="earn_points[<?php echo $objCustEarnPointDtlPage->getField('earn_id')?>][status]" <?php if($objCustEarnPointDtlPage->getField('status')=='Redeemed'){?> checked="checked" <?php }?> value="Redeemed" />Redeemed
					
					<!--<a href="javascript:void(0);" onclick="change_status('<?php echo base64_encode($objCustEarnPointDtlPage->getField('earn_id'));?>','<?php echo $objCustEarnPointDtlPage->getField('status');?>');"> <?php echo $objCustEarnPointDtlPage->getField('status');?></a>-->
					
					</td>
					
					<td><?php echo $objCustEarnPointDtlPage->getField('date');?> </td>
    				 
					 </tr>
				<?php
					$i++;
					$slno++;
					}//end of while
					}else{ 
				?>
				<tr>
					<td colspan="6" align="center">
						User not get any point yet.
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
			<footer>	
				<div class="submit_link">
					<input type="submit" name="btnSubmit" id="btnSubmit" value="Update" class="alt_btn">
					<input type="reset" name="btnReset" id="btnReset" value="Reset">
					<input type="button" name="btnCancel" id="btnCancel" value="Cancel" class="btn_cancel" onclick="fn_cancel_click();">
				</div>	
			</footer>
			
				
			
		</div><!-- end of .tab_container -->		
		</form>
		</article><!-- end of content manager article -->		
		<div class="spacer"></div>
	</section>
</body>
</html>