<?php
	require_once('../../pi_classes/Admin.php');
	ob_start();
	session_start();
	if(empty($_SESSION['admin_id'])){
		header("location:login.php");
	}
	$objAddEmp=new Admin();	
	$objDelEmp=clone $objAddEmp;
	if(isset($_SESSION['msg']['delete']))
	{
			unset($_SESSION['msg']['delete']);
	}
	if(isset($_SESSION['msg']['added'])){
		unset($_SESSION['msg']['added']);
	}
	/*if($_REQUEST['action']=='delete'){
		$cnf=$objDelEmp->deleteUserDetails($_REQUEST['emp_id']);
		if($cnf){
			$_SESSION['msg']['delete']='deleted';
		}
	}*/
	
	if(isset($_REQUEST['search_type']))
	{
		
		if(isset($_SESSION['srch_voucher_code']))
		{
			unset($_SESSION['srch_voucher_code']);
		}
		
	}
	
	if(isset($_REQUEST["btnSearch"]))
	{
			$_SESSION['search']=$_REQUEST['btnSearch'];
			$_SESSION['srch_voucher_code']=$_REQUEST['srch_voucher_code'];
	}
	
	$objGiftVoucherDtl=new Admin();
	
	if(isset($_SESSION['srch_voucher_code']))
	{
		if($_SESSION['srch_voucher_code'])
		{
			$objGiftVoucherDtl->getAllSearchVocuherDtlByCode($_SESSION['srch_voucher_code']);
		}
	}
	else
	{		
		$objGiftVoucherDtl->getGiftVoucherDtl();
	}
	

	if(isset($_REQUEST['btnDeleteAll']))
	{
		for($i=0; $i<$_REQUEST['totalcount']; $i++)
		{
			if(isset($_REQUEST['chk_'.($i+1)]))
			{	
				$objDelEmp->deletePomoCodeDetails($_REQUEST['chk_'.($i+1)]);
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
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>	
	<section id="main" class="column">
		<?php if(isset($_SESSION['msg']['delete'])){ ?>
			<h4 class="alert_success">Record deleted successfully!</h4>
		<?php } ?>	
		<?php if(isset($_SESSION['msg']['added'])){ ?>
			<h4 class="alert_success">Record added successfully!</h4>
		<?php } ?>	
		<?php if(isset($_SESSION['msg']['updated'])){ ?>
			<h4 class="alert_success">Record updated successfully!</h4>
		<?php 
			unset($_SESSION['msg']['updated']);
		} ?>	
		
		<article class="module width_full">
		<div id="loading"></div>
		
		<form name="frmSearchActivity" id="frmSearchActivity" method="post">
        <fieldset title="Search Vocuher" style="width:95%;margin-left:3%">
        <legend><h3>Search Redeemed Voucher:</h3></legend>
        <div class="module_content">
            <fieldset style="width:48%; float:left; margin-right: 3%;">
                <label>Enter Voucher Code</label>
                <input type="text" name="srch_voucher_code" id="srch_voucher_code" value="<?php echo $_SESSION['srch_voucher_code'];?>" style="width:92%;" />
            </fieldset>
			  
            <div class="clear"></div>
            <div class="submit_link">
                <input type="submit" name="btnSearch" id="btnSearch" value="Search" class="alt_btn">
                <input type="reset" name="btnReset" id="btnReset" value="Reset" class="btn_cancel">
            </div>
        </div>
        <div class="clear"></div>        
        </fieldset>
        </form>
		
		
		
		<form name="frmGiftVoucher" id="frmGiftVoucher" method="post" action="">
		<?php
			
			$targetpage = AbstractDB::SITE_PATH."admin/gift_voucher/view_gift_voucher.php"; 	
			$limit = 15;
			$total_pages = $objGiftVoucherDtl->numofrows();	
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
					$paginate.= "<a href='$targetpage?page=$prev'>previous</a>";
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
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
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
			<h3 class="tabs_involved">Gift Vouhcer Management</h3>
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
    				<th>Voucher Code<a href="<?php echo AbstractDB::SITE_PATH;?>admin/gift_voucher/view_gift_voucher.php?page=<?php echo $_GET['page'];?>&sort=gift_voucher_id&type=DESC"><img src="../images/sort_up.gif" border="0" /></a><a href="<?php echo AbstractDB::SITE_PATH;?>admin/gift_voucher/view_gift_voucher.php?page=<?php echo $_GET['page'];?>&sort=gift_voucher_id&type=ASC"><img src="../images/sort_down.gif" border="0" /></a></th>
					<th>Booking Reference Id <a href="<?php echo AbstractDB::SITE_PATH;?>admin/gift_voucher/view_gift_voucher.php?page=<?php echo $_GET['page'];?>&sort=refence_id&type=DESC"><img src="../images/sort_up.gif" border="0" /></a><a href="<?php echo AbstractDB::SITE_PATH;?>admin/gift_voucher/view_gift_voucher.php?page=<?php echo $_GET['page'];?>&sort=refence_id&type=ASC"><img src="../images/sort_down.gif" border="0" /></a></th>
					<th>Gift From</th>
    				<th>Gift To</th> 
    				<th>Voucher Amount</th> 
					<th>Expiry Date</th> 
					<th>Status</th> 
					<th>Action</th> 
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
					
						if(isset($_SESSION['srch_voucher_code']))
						{
							$objGiftVoucherDtl->getAllSearchVocuherDtlByCodePage($start, $limit,$_REQUEST['sort'],$_REQUEST['type'],$_SESSION['srch_voucher_code']);
							
						}
						else
						{	
							$objGiftVoucherDtl->getGiftVoucherDtlPage($start, $limit,$_REQUEST['sort'],$_REQUEST['type']);
						}
					
						
					$i=1;
					$slno=1;
					while($objGiftVoucherDtl->getAllRow()){
						if($i%2){
							$bg_color="#E0E0E3";
						}else{
							$bg_color="#FFFFFF";
						}					
				?>
				<tr style='background-color:<?php echo $bg_color;?>;'> 
   					<td>
					<input type="checkbox" id="chk_<?=$slno?>" name="chk_<?=$slno?>" value="<?php echo $objGiftVoucherDtl->getField('gift_voucher_id');?>" onclick="check_for_all(this)" />
					</td> 
    				<td><?php echo $objGiftVoucherDtl->getField('gift_voucher_code');?></td>
					<td><?php echo $objGiftVoucherDtl->getField('refence_id');?></td>
    				<td><?php echo $objGiftVoucherDtl->getField('gift_from');?></td> 
					<td><?php echo $objGiftVoucherDtl->getField('gift_to');?> </td> 
					<td>NZD$<?php echo $objGiftVoucherDtl->getField('total_price');?></td> 
					<td><?php echo date("d-m-Y",strtotime($objGiftVoucherDtl->getField('expiry_date')));?> </td> 
					<td><?php echo str_replace("_"," ",$objGiftVoucherDtl->getField('status'));?></td> 
    				<td>
						<a href="view_voucher_detail.php?voucher_id=<?php echo base64_encode($objGiftVoucherDtl->getField('gift_voucher_id'));?>" title="Edit"><img src="../images/icn_edit.png" border="0" alt="Show Voucher Deatail" title="Show Voucher Deatail" /></a>
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
						No Gift Voucher Found.
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