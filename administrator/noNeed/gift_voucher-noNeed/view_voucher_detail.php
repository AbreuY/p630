<?php
	require_once('../../pi_classes/Admin.php');
	ob_start();
	session_start();
	if(empty($_SESSION['admin_id'])){
		header("location:login.php");
	}
	$objGiftVoucherDtl=new Admin();	
	$objGiftVoucherDtl->getGiftVoucherDtlByid(base64_decode($_REQUEST['voucher_id']));
	$objGiftVoucherDtl->getAllRow();
	
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
		
		<article class="module width_full">
		<div id="loading"></div>
		
		<form name="frmGiftVoucher" id="frmGiftVoucher" method="post" action="">
		
		<header>
			<h3 class="tabs_involved">Gift Vouhcer Management </h3>
		</header>
		
		<fieldset title="Search Vocuher" style="width:95%;margin-left:3%">
		<span style="margin-left:10px">
		
		<a href="<?php echo AbstractDB::SITE_PATH;?>admin/gift_voucher/view_gift_voucher.php?search_type=all" title="Go back"><img src="<?php echo AbstractDB::SITE_PATH;?>admin/images/back_icon2.png" border="0" /></a>
		
		</span>
        <legend><h3>Gift Voucher Detail</h3></legend>
        <div class="module_content">
            <fieldset style="width:48%; float:left; margin-right: 3%;">
                <label>Voucher Code</label>
					<span style="margin-left:20px">
					<?Php echo $objGiftVoucherDtl->getField('gift_voucher_code'); ?>
					</span>
            </fieldset>
			
			<fieldset style="width:48%; float:left;">
                <label>Voucher Purechased By</label>
					<span style="margin-left:20px">
						<?Php echo $objGiftVoucherDtl->getField('first_name')." ".$objGiftVoucherDtl->getField('last_name'); ?>
					</span>
            </fieldset>
			
			<fieldset style="width:48%; float:left; margin-right: 3%;">
                <label>Voucher Booking Referense id</label>
					<span style="margin-left:20px">
						<?Php echo $objGiftVoucherDtl->getField('refence_id'); ?>				
					</span>
            </fieldset>
			
			<fieldset style="width:48%; float:left;">
                <label>Voucher Amount</label>
					<span style="margin-left:20px">
						<?Php echo "NZD $ ".$objGiftVoucherDtl->getField('voucher_amount'); 
									$total_amount=$objGiftVoucherDtl->getField('voucher_amount'); 
							?>				
					</span>
            </fieldset>
			
			<fieldset style="width:48%; float:left; margin-right: 3%;">
                <label>Gift From</label>
				<span style="margin-left:20px">
					<?Php echo $objGiftVoucherDtl->getField('gift_from'); ?>				
				</span>
            </fieldset>
			
			<fieldset style="width:48%; float:left;">
                <label>Gift to</label>
				<span style="margin-left:20px">
					<?Php echo $objGiftVoucherDtl->getField('gift_to'); ?>				
				</span>	
            </fieldset>
			
			
			<fieldset style="width:48%; float:left; margin-right: 3%;">
                <label>Message on the Gift</label>
					<textarea readonly="readonly" style="width:380px;height:100px"><?Php echo $objGiftVoucherDtl->getField('message_on_voucher'); ?></textarea>
            </fieldset>
			
			<fieldset style="width:48%; float:left;">
                <label>Expiry Date</label>
					<span style="margin-left:20px">
						<?Php echo $objGiftVoucherDtl->getField('expiry_date'); ?>				
					</span>
            </fieldset>
			
			<fieldset style="width:48%; float:left;">
                <label>Status</label>
				<span style="margin-left:20px">
					<?Php echo str_replace("_"," ",$objGiftVoucherDtl->getField('status')); ?>
				</span>
            </fieldset>
			<div class="clear"></div>
            
        </div>
        <div class="clear"></div>        
        </fieldset>
		
		
			<fieldset title="Search Vocuher" style="width:95%;margin-left:3%">
			<legend><h3>Gift Voucher Redeemed Datail.</h3></legend>
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th>Booking Reference Id</th>
					<th>Vocucher Redeemed By</th>
					<th>Redeemed Amount</th> 
					<th>Redeemed Date</th> 
				</tr> 
			</thead> 
			<tbody> 
					
					<?php
						$objVoucherRedeemed=clone $objGiftVoucherDtl; 
						$objVoucherRedeemed->getGiftVoucherRedeemedDtl(base64_decode($_REQUEST['voucher_id']));
					$i=1;
					$slno=1;
					if($objVoucherRedeemed->numofrows())
					{
					$total_redeemed_amount=0;
					while($objVoucherRedeemed->getAllRow()){
						if($i%2){
							$bg_color="#E0E0E3";
						}else{
							$bg_color="#FFFFFF";
						}					
				?>
				<tr style='background-color:<?php echo $bg_color;?>;'> 
   					<td><?php echo $objVoucherRedeemed->getField('refence_id');?></td>
					<td><?php echo $objVoucherRedeemed->getField('first_name')." ".$objVoucherRedeemed->getField('last_name');?></td>
					<td><?php echo "NZD $ ".$objVoucherRedeemed->getField('redeemed_amount');
						$total_redeemed_amount=$total_redeemed_amount+$objVoucherRedeemed->getField('redeemed_amount');
					?></td>
					<td><?php echo $objVoucherRedeemed->getField('redeemed_date');?></td>

				</tr>
				<?php
					$i++;
					$slno++;
					}//end of while
					}else{ 
				?>
				<tr>
					<td colspan="3" align="center">
						No Gift Voucher Redeemed.
					</td>
				</tr>
				<?php } ?>
			</tbody> 
			</table>
	</fieldset>
	<!-- end of .tab_container -->	
		
			
		<fieldset title="Search Vocuher" style="width:95%;margin-left:3%">
			<fieldset style="width:45%; float:left;margin-left:3%">
                <label>Total Redeemed amout</label>
				<span style="margin-left:20px">
					<?Php
						if($total_redeemed_amount>0)
						{
							 echo "NZD $ ".$total_redeemed_amount; 
						}
						else
						{
							echo "Not Redeemed";
						}	 
						?>
				</span>
            </fieldset>
			
			<fieldset style="width:45%; float:left;margin-left:3%">
                <label>Remainging Amout</label>
				<span style="margin-left:20px">
					<?Php
						$remaining_amount=$total_amount-$total_redeemed_amount;
						echo "NZD $ ".$remaining_amount; 
						
						?>
				</span>
            </fieldset>
		</fieldset>	
		
			
		</form>
		</article><!-- end of content manager article -->		
		<div class="spacer"></div>
	</section>
</body>
</html>