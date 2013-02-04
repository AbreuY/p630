<?php
	require_once('../../pi_classes/AdminBooking.php');
	ob_start();
	
	session_start();
	if(empty($_SESSION['admin_id'])){
		header("location:login.php");
	}
	if(isset($_SESSION['act_details']))
		unset($_SESSION['act_details']);
	if(isset($_SESSION['submit_type']))
		unset($_SESSION['submit_type']);			
	$objAddEmp=new AdminBooking();	
	$objDelEmp=clone $objAddEmp;
	$objActivityDtl=clone $objAddEmp;
	
	
		$activity_ids=$objActivityDtl->getAllActivity_ids();
		$activity_string="";
		foreach($activity_ids as $activity)
		{
			$activity_string=$activity_string.$activity['activity_id'].",";
		}
		$len=(strlen($activity_string)-1);
		$activity_string=substr($activity_string,0,$len);

	
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
	/*if(isset($_REQUEST['btnDeleteAll']))
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
	}*/
	
	if(isset($_REQUEST['all']))
	{
		if(isset($_SESSION['search'])){
		
			unset($_SESSION['search']);
		}
		if(isset($_SESSION['srch_activity_name'])){
			unset($_SESSION['srch_activity_name']);
		}
		if(isset($_REQUEST['srch_company_name'])){
			unset($_REQUEST['srch_company_name']);
		}
		
		if(isset($_SESSION['srch_country_name'])){
			unset($_SESSION['srch_country_name']);
		}
		
		if(isset($_SESSION['srch_city_name'])){
			unset($_SESSION['srch_city_name']);
		}
		
		if(isset($_SESSION['srch_date'])){
			unset($_SESSION['srch_date']);
		}
	}
		
	if(isset($_REQUEST['btnSearch']))	
	{
		$_SESSION['search']=$_REQUEST['btnSearch'];
		$_SESSION['srch_activity_name']=$_REQUEST['srch_activity_name'];
		$_SESSION['srch_company_name']=$_REQUEST['srch_company_name'];
		$_SESSION['srch_country_name']=$_REQUEST['srch_country_name'];
		$_SESSION['srch_city_name']=$_REQUEST['srch_city_name'];
		$_SESSION['srch_date']=$_REQUEST['srch_date'];
	}
	
		
	
	
	if(isset($_SESSION['search']))
	{
		if($_SESSION['srch_activity_name'] || $_SESSION['srch_company_name'] || $_SESSION['srch_country_name'] || $_SESSION['srch_city_name'] || $_SESSION['srch_date']){
			$objActivityDtl->getAllSearchActivityDtl($_SESSION['srch_activity_name'],$_SESSION['srch_company_name'],$_SESSION['srch_country_name'],$_SESSION['srch_city_name'],$_SESSION['srch_date'],$activity_string);
		}
	}
	else {
			$objActivityDtl->getAllActivityDtl($activity_string);
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
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/html5.js"></script>
<![endif]-->
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery-1.7.1.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/hideshow.js" language="javascript" type="text/javascript"></script>
<!--<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery.tablesorter.min.js" language="javascript" type="text/javascript"></script>-->
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery.equalHeight.js"></script>

<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>calender/js/ui.core.js"></script> 
<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>calender/js/ui.datepicker.js"></script>	
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.all.css" rel="stylesheet" /> 
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.theme.css" rel="stylesheet" /> 
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.core.css" rel="stylesheet" /> 
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.datepicker.css" rel="stylesheet" /> 

<script type="text/javascript">
$(document).ready(function(){ 
	//$(".tablesorter").tablesorter(); 
	jQuery("#srch_date").datepicker({minDate:0 ,maxDate: '+10Y +10D',changeMonth: true,changeYear: true, dateFormat:'d-m-yy'});
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
		
		
		<?php if(isset($_SESSION['msg']['booking_success'])){ ?>
			<h4 class="alert_success"><?php echo $_SESSION['msg']['booking_success']; ?></h4>
		<?php
			unset($_SESSION['msg']['booking_success']);
		} ?>       
		<article class="module width_full">
		<div id="loading"></div>
        <form name="frmSearchActivity" id="frmSearchActivity" method="post">
        <fieldset title="Search Activity">
        <legend><h3>Search Activity:</h3></legend>
        <div class="module_content">
            <fieldset style="width:48%; float:left; margin-right: 3%;">
                <label>Activity Name</label>
                <input type="text" name="srch_activity_name" id="srch_activity_name" value="<?php echo $_SESSION['srch_activity_name'];?>" style="width:92%;" />
            </fieldset>
            <fieldset style="width:48%; float:left;">
                <label>Comapny Name</label>
                <input type="text" name="srch_company_name" id="srch_company_name" value="<?php echo $_SESSION['srch_company_name'];?>" style="width:92%;" />
            </fieldset>
            
             <fieldset style="width:48%; float:left; margin-right: 3%;">
                <label>Country Name</label>
                <input type="text" name="srch_country_name" id="srch_country_name" value="<?php echo $_SESSION['srch_country_name'];?>"  style="width:92%;" />
            </fieldset>
            <fieldset style="width:48%; float:left;">
                <label>City Name</label>
                <input type="text" name="srch_city_name" id="srch_city_name" value="<?php echo $_SESSION['srch_city_name'];?>"  style="width:92%;" />
            </fieldset>
			
			<fieldset style="width:48%; float:left;">
                <label>Date</label>
                <input type="text" name="srch_date" id="srch_date" readonly="readonly" value="<?php echo $_SESSION['srch_date'];?>" style="width:92%;" />
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
		<form name="frmEmp" id="frmEmp" method="post" action="">
		<?php
			$targetpage = "manage_booking.php"; 	
			$limit = 10	;
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
			<h3 class="tabs_involved">Activity Details </h3>
		</header>
        
		<div class="tab_container">
			<table class="tablesorter" cellspacing="0" align="left"> 
			<thead> 
				<tr> 
    				<th>Activity Name <a href="<?php echo AbstractDB::SITE_PATH;?>administrator/booking/manage_booking.php?page=<?php echo $_GET['page'];?>&sort=activity_booker_name&type=DESC"><img src="../images/sort_up.gif" border="0" /></a><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/booking/manage_booking.php?page=<?php echo $_GET['page'];?>&sort=activity_booker_name&type=ASC"><img src="../images/sort_down.gif" border="0" /></a></th>
					<th>Image</th>
    				<th>Status</th>
                    <th>Country</th>
                    <th>City</th> 
					<th>Company Name</th> 
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
					if($_SESSION['srch_activity_name'] ||$_SESSION['srch_company_name']|| $_SESSION['srch_country_name']||$_SESSION['srch_city_name'] || $_SESSION['srch_date']){
						$objActivityDtl->getAllSearchActivityDtlPage($start, $limit,$_REQUEST['sort'],$_REQUEST['type'],$_SESSION['srch_activity_name'],$_SESSION['srch_company_name'],$_SESSION['srch_country_name'],$_SESSION['srch_city_name'],$_SESSION['srch_date'],$activity_string);
					}else{
						$objActivityDtl->getAllActivityDtlPage($start, $limit,$_REQUEST['sort'],$_REQUEST['type'],$activity_string);
					}
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
    				<td><?php echo $objActivityDtl->getField('activity_booker_name');?></td>
					
					<td>
					<?php 
							$objActivityImgDtl=clone $objActivityDtl;
							$objActivityImgDtl->getDefaultImg($objActivityDtl->getField('activity_id'));
							$objActivityImgDtl->getAllRow();
							if($objActivityImgDtl->getField('image_path')!=''){
						?>
						<img src="<?php echo AbstractDB::SITE_PATH.'phpThumbnail/phpThumb.php?src=../upload/activity/thumbnail/'.$objActivityImgDtl->getField('image_path').'&w=100&h=100'; ?>" border="0" />
                        <?php }else{ ?>
						No image uploaded.</td> 
						<?php } ?>
						</td> 
						
					<td><?php if($objActivityDtl->getField('active')=='yes'){ echo "Active";}else{ echo "Inactive";}?></td> 
                    <td><?php echo $objActivityDtl->getField('country_name');?></td>
                    <td><?php echo $objActivityDtl->getField('city_name');?></td>
					<td><?php echo $objActivityDtl->getField('company_name');?></td>
    				<td>
						<a href="javascript:void(0);" onclick="window.open('<?php echo AbstractDB::SITE_PATH?>activity-details/<?php echo base64_encode($objActivityDtl->getField('activity_id')) ;?>/<?php echo stripslashes(strtolower(str_replace(" ","-",$objActivityDtl->getField('activity_booker_name')))) ;?>','voucherwindow','scrollbars=1,resizable=1,width=1000,height=800'); return false;" title="View activity details"><img src="../images/icon_view.png" border="0" /></a> &nbsp;
						<a href="<?php echo AbstractDB::SITE_PATH;?>administrator/booking/booking.php?act_id=<?php echo  base64_encode($objActivityDtl->getField('activity_id'));?>" title="View avaibility"><img src="<?php echo AbstractDB::SITE_PATH;?>administrator/images/booking.jpg" height="30" width="30" border="0" /></a>&nbsp;
						 
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
						No activty found.
					</td>
				</tr>
				<?php } ?>
			</tbody> 
			</table>
             <div class="clear"></div>
			<footer>
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