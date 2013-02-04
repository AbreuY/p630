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
		
	$objPaidBooking=new Admin();	
	if(isset($_REQUEST['btnPayAll']))
	{
		for($i=0; $i<$_REQUEST['totalcount']; $i++)
		{
			if(isset($_REQUEST['chk_'.($i+1)]))
			{	
				$objPaidBooking->makePayment($_REQUEST['booking_id'.($i+1)],$_GET['user_id']);
				$paid = true;
			}
		}
		
		if($paid){
			$_SESSION['msg']['paid']='Paid Successefully';
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
function payconfirm()
{
	var status=confirm("Are you sure to you want to pay for all booking selected");
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
		<?php if(isset($_SESSION['msg']['rating_update'])){ ?>
			<h4 class="alert_success">Rating updated successfully.</h4>
		<?php
			unset($_SESSION['msg']['rating_update']);
		} ?>
		
		
		<article class="module width_full">
		<div id="loading"></div>
		<form name="frmEmp" id="frmEmp" method="post" action="">
		<?php
			
			$objGetPayDtl=new Admin();
			/* Getting all Payment detail of supplier*/
			$objGetPayDtl->getAllPaymentDtlOfSupplier($_GET['user_id']);
			$targetpage = "supplier_payment_detail.php"; 	
			$limit = 10;
			$total_pages = $objGetPayDtl->numofrows();	
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
		<header>
			<h3 class="tabs_involved">Payment Management</h3>
		</header>
		
        <div class="tab_container">
			<table class="tablesorter" cellspacing="0" align="left"> 
			<thead> 
				<tr> 
   					<th><input type="checkbox" name="check_all" id="check_all" onclick="set_all_checked(this)" /></th> 
    				<th>Booking Reference id<a href="<?php echo AbstractDB::SITE_PATH;?>admin/payment/supplier_payment_detail.php?page=<?php echo $_GET['page'];?>&sort=booking_id&type=DESC&user_id=<?php echo $_GET['user_id'];?>"><img src="../images/sort_up.gif" border="0" /></a><a href="<?php echo AbstractDB::SITE_PATH;?>admin/payment/supplier_payment_detail.php?page=<?php echo $_GET['page'];?>&sort=booking_id&type=ASC&user_id=<?php echo $_GET['user_id'];?>"><img src="../images/sort_down.gif" border="0" /></a></th>
                    <th>Total Commision</th>
                    <th>Total Paid to Supplier</th>
                    <th>Booking Date</th>
					<th>Paid Date</th>
                    <th>Status</th>
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
					$paid_amount=0;
					$unpaid_amount=0;
					
					$objGetPayDtl->getAllPaymentDtlOfSupplierPage($start, $limit,$_REQUEST['sort'],$_REQUEST['type'],$_GET['user_id']);
					$i=1;
					$slno=1;
					while($objGetPayDtl->getAllRow()){
						if($i%2){
							$bg_color="#E0E0E3";
						}else{
							$bg_color="#FFFFFF";
						}					
				?>
				<tr style='background-color:<?php echo $bg_color;?>;'> 
   					<td>
					<?php 
						if($objGetPayDtl->getField('paid_status')=='Unpaid')
						{
							$unpaid_amount+=$objGetPayDtl->getField('paid_to_supplier_in_NZD');
						?>
							<input type="checkbox" id="chk_<?=$slno?>" name="chk_<?=$slno?>" value="" onclick="check_for_all(this)" />	
						<?php 
						}
						else
						{
							$paid_amount+=$objGetPayDtl->getField('paid_to_supplier_in_NZD');
						}
					?>
						<input type="hidden" name="booking_id<?=$slno?>" id="booking_id<?=$slno?>" value="<?php echo $objGetPayDtl->getField('booking_id');?>" />
                 <input type="hidden" name="price_id<?=$slno?>" id="price_id<?=$slno?>" value="<?php echo $objGetPayDtl->getField('paid_to_supplier_in_NZD');?>" />
					</td>
                    <td><?php echo $objGetPayDtl->getField('refence_id');?></td>
    				<td><?php echo "$".$objGetPayDtl->getField('commision_in_NZD')." NZD";?></td>
                    <td><?php echo "$".$objGetPayDtl->getField('paid_to_supplier_in_NZD')." NZD";?></td>
                    <td><?php echo $objGetPayDtl->getField('booking_date');?></td>
                    <td><?php if($objGetPayDtl->getField('paid_date')==''){echo "Not Specified";}else{echo $objGetPayDtl->getField('paid_date');}?></td>
                    <td><?php echo $objGetPayDtl->getField('paid_status');?></td>
	                <td><a href="<?php echo AbstractDB::SITE_PATH;?>admin/payment/payment_detail.php?user_id=<?php echo $_GET['user_id'];?>&booking_id=<?php echo  $objGetPayDtl->getField('booking_id');?>" onclick="return hs.htmlExpand(this,{objectType: 'iframe',width: 900,headingText: 'Booking Detail'})" class="payment_detail"><img src="../images/icon-view.png" style="width:20px;height:20px" border="0" /></a>  </td> 
				</tr>
				<?php
						if($objGetPayDtl->getField('paid_status')=='Unpaid')
						{	
							$slno++;
						}
						$i++;
					}
					?>
					<tr><td colspan="8">Total Paid : <?php echo "$".$paid_amount." NZD" ?></td></tr>
                    <tr><td colspan="8">Total UnPaid : <?php echo "$".$unpaid_amount." NZD" ?> </td></tr>
					<?php
					//end of while
					}else{ 
				?>
				<tr>
					<td colspan="8" align="center">
						No booking added yet.
					</td>
				</tr>
				<?php } ?>
			</tbody> 
			</table>
			<footer>
				<div style="float: left;padding: 5px;">
					<input type="hidden" value="<?=($slno-1)?>" name="totalcount" />
					<input type="submit" name="btnPayAll" id="btnPayAll" value="Make A Payment" class="alt_btn" onclick="return payconfirm();" />
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