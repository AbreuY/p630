<?php
#RequiresFiles:
require_once('../../pi_classes/commonSetting.php');
require_once('../../pi_classes/Admin.php');
#Redirect:
	if(empty($_SESSION['admin_id'])){
		header("location:".site_path."administrator/login.php");
	}
	
#Objects:
	$objAddEmp=new Admin();	
	#clone:
	$objDelSupp=clone $objAddEmp;
	
#Action:	
	if($_POST['btnSubmit']=='Submit'){
		$objAddEmp=$objAddEmp->updateAdvisorDetails($_POST);
	}
	if(isset($_SESSION['msg']['delete'])){
		unset($_SESSION['msg']['delete']);
	}
	if(isset($_SESSION['msg']['added']) && $_REQUEST['page']!=''){
		unset($_SESSION['msg']['added']);
	}
	if($_REQUEST['action']=='delete'){
		$cnf=$objDelSupp->deleteAdvisorDetails($_REQUEST['emp_id']);
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
				$objDelSupp->deleteAdvisorDetails($_REQUEST['advisor_id'.($i+1)]);
				$objDelSupp->deleteAdvisorOtherDetails($_REQUEST['advisor_id'.($i+1)]);
				
				$deleted = true;	
			}
		}
		if($deleted){
			$_SESSION['msg']['delete']='deleted';
		}
	}
	
		if(isset($_REQUEST['all']))
		{
			if(isset($_SESSION['srch_email']))
			{
				unset($_SESSION['srch_email']);
			}
			if(isset($_SESSION['srch_company_name']))
			{
				unset($_SESSION['srch_company_name']);
			}
			if(isset($_SESSION['srch_country_name']))
			{
				unset($_SESSION['srch_country_name']);
			}
			if(isset($_SESSION['srch_city_name']))
			{
				unset($_SESSION['srch_city_name']);
			}
			if(isset($_SESSION['search']))
			{
				unset($_SESSION['search']);
			}
		}	
		
		if(isset($_REQUEST["btnSearch"]))
		{
				$_SESSION['search']=$_REQUEST['btnSearch'];
				$_SESSION['srch_email']=$_REQUEST['srch_email'];
				$_SESSION['srch_company_name']=$_REQUEST['srch_company_name'];
				$_SESSION['srch_country_name']=$_REQUEST['srch_country_name'];
				$_SESSION['srch_city_name']=$_REQUEST['srch_city_name'];
		}
		
	$objUserDtl=new Admin();
	
	if(isset($_SESSION['search']))
	{
			if($_SESSION['srch_email']||$_SESSION['srch_company_name']|| $_SESSION['srch_country_name']||$_SESSION['srch_city_name']){
				$objUserDtl->getAllSearchSupplierDtl("","","S",$_SESSION['srch_email'],$_SESSION['srch_company_name'],
													$_SESSION['srch_country_name'],$_SESSION['srch_city_name']);
			}
	}
	else
	{		
		$objUserDtl->getAllAdvisorDtl("","");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IN ADMIN PANEL | Powered by <?php echo AbstractDB::SITE_TITLE;?></title>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>administrator/css/layout.css" type="text/css" media="screen" />
<!--[if lt IE 9]>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>administrator/css/ie.css" type="text/css" media="screen" />
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery-1.7.1.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/hideshow.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery.equalHeight.js"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery.validate.js" language="javascript" type="text/javascript"></script>
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
        <header>
			<h3 class="tabs_involved">Advisor Management </h3>
		</header>
		<div id="loading"></div>
        <div class="clear"></div>
        <!-- <header>
			<h3 class="tabs_involved">Search Advisor</h3>
		</header>-->
        <form name="frmSearchActivity" id="frmSearchActivity" method="post">
        <fieldset title="Search Activity"  style="display:none;">
        <!--<legend><h3>Search Advisor:</h3></legend>-->
        <div class="module_content">
            <fieldset style="width:48%; float:left; margin-right: 3%;">
                <label>Comapny Name</label>
                <input type="text" name="srch_company_name" id="srch_company_name" value="<?php echo $_SESSION['srch_company_name'];?>" style="width:92%;" />
            </fieldset>
            <fieldset style="width:48%; float:left;">
                <label>Supplier Email</label>
                <input type="text" name="srch_email" id="srch_email" value="<?php echo $_SESSION['srch_email'];?>" style="width:92%;" />
            </fieldset>
            
             <fieldset style="width:48%; float:left; margin-right: 3%;">
                <label>Country Name</label>
                <input type="text" name="srch_country_name" id="srch_country_name" value="<?php echo $_SESSION['srch_country_name'];?>" style="width:92%;" />
            </fieldset>
			
            <fieldset style="width:48%; float:left;">
                <label>City Name</label>
                <input type="text" name="srch_city_name" id="srch_city_name" value="<?php echo $_SESSION['srch_city_name'];?>" style="width:92%;" />
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
        <div class="clear"></div>
		<form name="frmUser" id="frmUser" method="post" action="">
		<?php
			$targetpage = "manage_advisor.php"; 	
			$limit = 10;
			$total_pages = $objUserDtl->numofrows();	
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
			<!--<h3 class="tabs_involved">Management </h3>-->
		</header>
		<header>
			<div style="float: left;padding: 5px;">
				<input type="submit" name="btnDeleteAll" id="btnDeleteAll" value="Delete All" class="alt_btn" onclick="return delconfirm();" />
				&nbsp;&nbsp; <a href="<?php echo AbstractDB::SITE_PATH;?>administrator/user_management/manage_advisor.php?all=yes">All Supplier</a>
			</div>
		</header>
		<div class="tab_container">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th><input type="checkbox" name="check_all" id="check_all" onclick="set_all_checked(this)" /></th> 
    				<th>First Name
                    <a href="<?php echo AbstractDB::SITE_PATH;?>administrator/user_management/manage_advisor.php?page=<?php echo $_GET['page'];?>&sort=first_name&type=DESC"><img src="../images/sort_up.gif" border="0" /></a>
                    <a href="<?php echo AbstractDB::SITE_PATH;?>administrator/user_management/manage_advisor.php?page=<?php//echo $_GET['page'];?>&sort=first_name&type=ASC"><img src="../images/sort_down.gif" border="0" /></a>
                    </th>
					<th>Last Name
                    <a href="<?php echo AbstractDB::SITE_PATH;?>administrator/user_management/manage_advisor.php?page=<?php//echo $_GET['page'];?>&sort=last_name&type=DESC"><img src="../images/sort_up.gif" border="0" /></a>
                    <a href="<?php echo AbstractDB::SITE_PATH;?>administrator/user_management/manage_advisor.php?page=<?php//echo $_GET['page'];?>&sort=last_name&type=ASC"><img src="../images/sort_down.gif" border="0" /></a>
                    </th>
					<th>Email <a href="<?php echo AbstractDB::SITE_PATH;?>administrator/user_management/manage_advisor.php?page=<?php echo $_GET['page'];?>&sort=email&type=DESC"><img src="../images/sort_up.gif" border="0" /></a>
                    <a href="<?php echo AbstractDB::SITE_PATH;?>administrator/user_management/manage_advisor.php?page=<?php echo $_GET['page'];?>&sort=email&type=ASC"><img src="../images/sort_down.gif" border="0" /></a>
                    </th>
                    <th>Request Type</th>
    				<th>Created On <a href="<?php echo AbstractDB::SITE_PATH;?>administrator/user_management/manage_advisor.php?page=<?php echo $_GET['page'];?>&sort=created_date&type=DESC"><img src="../images/sort_up.gif" border="0" /></a>
                    <a href="<?php echo AbstractDB::SITE_PATH;?>administrator/user_management/manage_advisor.php?page=<?php echo $_GET['page'];?>&sort=created_date&type=ASC"><img src="../images/sort_down.gif" border="0" /></a>
                    </th> 
    				<th>Acc. Status</th> 
       				<th>Adv. Verified</th> 
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
					if($_SESSION['srch_email'] ||$_SESSION['srch_company_name']|| $_SESSION['srch_country_name']||$_SESSION['srch_city_name']){
						$objUserDtl->getAllSearchSupplierDtlPage($start, $limit,$_REQUEST['sort'],$_REQUEST['type'],'S',$_SESSION['srch_email'],$_SESSION['srch_company_name'],$_SESSION['srch_country_name'],$_SESSION['srch_city_name']);
					}else{	
						$objUserDtl->getAllAdvisorDtlPage($start, $limit,$_REQUEST['sort'],$_REQUEST['type']);
					}
					$i=1;
					$slno=1;
					while($objUserDtl->getAllRow()){
						if($i%2){
							$bg_color="#E0E0E3";
						}else{
							$bg_color="#FFFFFF";
						}					
				?>
				<tr style='background-color:<?php echo $bg_color;?>;'> 
   					<td> 	
						<input type="checkbox" id="chk_<?=$slno?>" name="chk_<?=$slno?>" value="" onclick="check_for_all(this)" />
						<input type="hidden" name="advisor_id" id="advisor_id" value="<?php echo base64_encode($objUserDtl->getField('advisor_id'));?>" />
						<input type="hidden" name="advisor_id<?=$slno?>" id="advisor_id<?=$slno?>" 
                        value="<?php echo base64_encode($objUserDtl->getField('advisor_id'));?>" />
					</td> 
    				<td><?php echo $objUserDtl->getField('first_name');?></td>
					<td><?php echo $objUserDtl->getField('last_name');?></td> 	 	
					<td><a href="mailto:<?php echo $objUserDtl->getField('email');?>"><?php echo $objUserDtl->getField('email');?></a> </td>
					<td><b>
                    	<?php
						if($objUserDtl->getField('linkedin_profile_id')){
							/*$tmpAr = explode('.',$objUserDtl->getField('linkedin_profile_id'));
							if($tmpAr[0]!="http://www"){ $tmpPath = "http://"; }else{ $tmpPath = ""; }*/

							#chk:
							$tmpAr = str_replace('http://','',$objUserDtl->getField('linkedin_profile_id'));
							$tmpPath = "http://";
						?>
							<!--<a href="<?//=$tmpPath.$objUserDtl->getField('linkedin_profile_id');?>" title="View Advisor Linkedin Profile" target="_blank">
                            Linkedin Profile</a>-->
                            <a href="<?=$tmpPath.$tmpAr;?>" title="View Advisor Linkedin Profile" target="_blank">
                            Linkedin Profile</a>
						<?php }else{	echo "Normal";								}
						?></b>	
                    </td>
                    <td><?php echo date("jS F Y, g:i a",strtotime($objUserDtl->getField('created_date')));?> </td> 
					<td> <a href="javascript:void(0);" onclick="change_status('<?php echo base64_encode($objUserDtl->getField('advisor_id'));?>','<?php echo $objUserDtl->getField('advisor_status');?>');"> <?php echo $objUserDtl->getField('advisor_status');?></td> 
					<td> <a href="javascript:void(0);" onclick="change_advisor_verify_status('<?php echo base64_encode($objUserDtl->getField('advisor_id'));?>','<?php echo $objUserDtl->getField('verified');?>');"> <?php echo $objUserDtl->getField('verified');?></td> 
    				<td>
						<?php
						if($objUserDtl->getField('linkedin_profile_id')&&(strcmp($objUserDtl->getField('advisor_status'),'Inactive')==0)){
						?>	
						<a href="<?=$tmpPath.$tmpAr;?>" title="View Advisor Linkedin Profile" target="_blank">
                        <img src="../images/icn_folder.png" border="0" /></a>
						<?php
						}else{
						?>
                        <a href="edit_advisor.php?advisorId=<?php echo base64_encode($objUserDtl->getField('advisor_id'));?>" title="View Advisor details">
                        <img src="../images/icn_folder.png" border="0" /></a>
						<?php
						}
						?>
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
						Advisor not found.
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
<!--/JS/-->    
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery("#frmSearchActivity").validate({
		errorElement:'div',
		rules:{
				srch_email:{
						email:true,
					}	
			  },
		message:{
				srch_email:{
					email:"Please enter the valid email."
				}
		}
	});
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
	$("#loading").html("<img src='../images/bigLoader.gif' border='0' />");
}
//Hide Loading Image
function Hide_Load()
{
	$("#loading").fadeOut('slow');
};
function change_status(emp_id,status){
	Display_Load();
	jQuery.ajax({
		url: "../ajax/ajax_request.php",
		type: "post",
		data:"action=chnage_advisor_status&emp_id="+emp_id+"&status="+status,
		success:function(msg){
			window.location.href='<?php echo AbstractDB::SITE_PATH;?>administrator/user_management/manage_advisor.php?page=<?php echo $_GET['page'];?>';
			Hide_Load();
		}
	})
}
function change_advisor_verify_status(advisorId,status){
	Display_Load();
	jQuery.ajax({
		url: "../ajax/ajax_request.php",
		type: "post",
		data:"action=chnage_advisor_verify_status&advisorId="+advisorId+"&status="+status,
		success:function(msg){
			window.location.href='<?php echo AbstractDB::SITE_PATH;?>administrator/user_management/manage_advisor.php?page=<?php echo $_GET['page'];?>';
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
		for(var i=1; chk=document.getElementById('chk_'+i);i++){	
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
	if(status){
		return true;
	}else{
		return false;
	}
}
</script>
</body>
</html>