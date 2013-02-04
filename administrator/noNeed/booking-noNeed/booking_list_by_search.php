<?php
	require_once ('../../pi_classes/AdminBooking.php');
	require_once ('../../pi_classes/Admin.php');
	ob_start();
	session_start();
	if(empty($_SESSION['admin_id'])){
		header("location:../login.php");
	}
	$objAdminBooking=new AdminBooking();
	if(isset($_REQUEST['btnSearch'])=="Search")	
	{
		$_SESSION['booking_search']=$_REQUEST;
	}
	if(isset($_SESSION['booking_search']))
	{
		$valid=0;
		if($_SESSION['booking_search']['from_schedule_date']!="" or $_SESSION['booking_search']['to_schedule_date']!="" or $_SESSION['booking_search']['reference_id']!="" or $_SESSION['booking_search']['activity_name']!="" or $_SESSION['booking_search']['first_name']!="" or $_SESSION['booking_search']['last_name']!="" or $_SESSION['booking_search']['customer_email']!="")
		{
				$valid=1;
		}
		else
		{
				$valid=0;
		}	
		if($valid==1)	
		{
			$objAdminBooking->getAdminBookingBySearch($_SESSION['booking_search']);
		}
	}
	$_REQUEST['type']="search";
	$targetpage = "booking_list_by_search.php"; 	
	$limit = 2;
	$total_pages = $objAdminBooking->numofrows();	
	$stages = 12;
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
<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>calender/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>calender/js/ui.datepicker.js"></script>
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.all.css" rel="stylesheet" />
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.theme.css" rel="stylesheet" />
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.core.css" rel="stylesheet" />
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.datepicker.css" rel="stylesheet" />
<script type="text/javascript">
jQuery(document).ready(function(){	
	jQuery("#from_schedule_date").datepicker();
	jQuery("#to_schedule_date").datepicker();
	jQuery("#frmSearchBooking").validate({
		errorElement:'div',
		rules: {
			customer_email:{
				email:true
						}
		},
		message : {
			customer_email: {
				email: "Please enter the valid email"
							} 
					}
	});
});
</script>
<script type="text/javascript">
$(document).ready(function(){ 
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
		
		<article class="module width_full">
		<div id="loading"></div>
        <?php include("../booking_menu.php");?>	
        
		   <form name="frmSearchBooking" id="frmSearchBooking" method="post">
            <fieldset title="Search Activity" >
               <legend>
               <h3>Advance Search</h3>
               </legend>
               <div class="module_content">
                <fieldset style="width:48%; float:left; margin-right: 3%;">
                   <label>From Date</label>
                   <input type="text" name="from_schedule_date" id="from_schedule_date" value="<?php echo $_SESSION['booking_search']['from_schedule_date'];?>" style="width:92%;" />
                 </fieldset>
                <fieldset style="width:48%; float:left;">
                   <label>To Date</label>
                   <input type="text" name="to_schedule_date" id="to_schedule_date" value="<?php echo $_SESSION['booking_search']['to_schedule_date'];?>" style="width:92%;" />
                 </fieldset>
                
                <fieldset style="width:48%; float:left; margin-right: 3%;">
                   <label>Reference Id</label>
                   <input type="text" name="reference_id" id="reference_id" value="<?php echo $_SESSION['booking_search']['reference_id'];?>" style="width:92%;" />
                 </fieldset>
                 
                <fieldset style="width:48%; float:left;">
                   <label>Activity Name</label>
                   <input type="text" name="activity_name" id="activity_name" value="<?php echo $_SESSION['booking_search']['activity_name'];?>" style="width:92%;" />
                 </fieldset>
                 
                  <fieldset style="width:48%; float:left; margin-right: 3%;">
                   <label>First Name</label>
                   <input type="text" name="first_name" id="first_name" value="<?php echo $_SESSION['booking_search']['first_name'];?>" style="width:92%;" />
                 </fieldset>
                 
                 <fieldset style="width:48%; float:left;">
                   <label>Last Name</label>
                   <input type="text" name="last_name" id="last_name" value="<?php echo $_SESSION['booking_search']['last_name'];?>" style="width:92%;" />
                 </fieldset>
                 
                 
                  <fieldset style="width:48%; float:left; margin-right: 3%;">
                   <label>Customer Email</label>
                   <input type="text" name="customer_email" id="customer_email" value="<?php echo $_SESSION['booking_search']['customer_email'];?>" style="width:92%;" />
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
		<form name="frmContinent" id="frmContinent" method="post" action="">
		<?php
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
					$paginate.= "<a href='$targetpage?$str&page=$prev'>previous</a>";
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
							$paginate.= "<a href='$targetpage?$str&page=$counter'>$counter</a>";
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
								$paginate.= "<a href='$targetpage?$str&page=$counter'>$counter</a>";
							}					
						}
						$paginate.= "...";
						$paginate.= "<a href='$targetpage?$str&page=$LastPagem1'>$LastPagem1</a>";
						$paginate.= "<a href='$targetpage?$str&page=$lastpage'>$lastpage</a>";		
					}
					// Middle hide some front and some back
					elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
					{
						$paginate.= "<a href='$targetpage?$str&page=1'>1</a>";
						$paginate.= "<a href='$targetpage?$str&page=2'>2</a>";
						$paginate.= "...";
						for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
						{
							if ($counter == $page){
								$paginate.= "<span class='current'>$counter</span>";
							}else{
								$paginate.= "<a href='$targetpage?$str&page=$counter'>$counter</a>";
							}					
						}
						$paginate.= "...";
						$paginate.= "<a href='$targetpage?$str&page=$LastPagem1'>$LastPagem1</a>";
						$paginate.= "<a href='$targetpage?$str&page=$lastpage'>$lastpage</a>";		
					}
					// End only hide early pages
					else
					{
						$paginate.= "<a href='$targetpage?$str&page=1'>1</a>";
						$paginate.= "<a href='$targetpage?$str&page=2'>2</a>";
						$paginate.= "...";
						for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
						{
							if ($counter == $page){
								$paginate.= "<span class='current'>$counter</span>";
							}else{
								$paginate.= "<a href='$targetpage?$str&page=$counter'>$counter</a>";
							}					
						}
					}
				}
				// Next
				if ($page < $counter - 1){ 
					$paginate.= "<a href='$targetpage?$str&page=$next'>next</a>";
				}else{
					$paginate.= "<span class='disabled'>next</span>";
				}							
				$paginate.= "</div>";		
			}
		?>
		<header>
			<h3 class="tabs_involved">Booking Management</h3>
		</header>
		
		
			
		<div class="tab_container">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
    				<th>Booking Ref ID <a href="<?php echo AbstractDB::SITE_PATH;?>admin/booking/booking_list_by_search.php?page=<?php echo $_GET['page'];?>&sort=refence_id&type=search&type1=DESC"><img src="../images/sort_up.gif" border="0" /></a><a href="<?php echo AbstractDB::SITE_PATH;?>admin/booking/booking_list_by_search.php?page=<?php echo $_GET['page'];?>&sort=refence_id&type=search&type1=ASC"><img src="../images/sort_down.gif" border="0" /></a></th>
					<th>Booking Date <a href="<?php echo AbstractDB::SITE_PATH;?>admin/booking/booking_list_by_search.php?page=<?php echo $_GET['page'];?>&sort=booking_date&type=search&type1=DESC"><img src="../images/sort_up.gif" border="0" /></a><a href="<?php echo AbstractDB::SITE_PATH;?>admin/booking/booking_list_by_search.php?page=<?php echo $_GET['page'];?>&sort=booking_date&type=search&type1=ASC"><img src="../images/sort_down.gif" border="0" /></a></th>			
					<th>Schedule Date<a href="<?php echo AbstractDB::SITE_PATH;?>admin/booking/booking_list_by_search.php?page=<?php echo $_GET['page'];?>&sort=schedule_date&type=search&type1=DESC"><img src="../images/sort_up.gif" border="0" /></a><a href="<?php echo AbstractDB::SITE_PATH;?>admin/booking/booking_list_by_search.php?page=<?php echo $_GET['page'];?>&sort=schedule_date&type=search&type1=ASC"><img src="../images/sort_down.gif" border="0" /></a></th>			
					<th>Activity Name <a href="<?php echo AbstractDB::SITE_PATH;?>admin/booking/booking_list_by_search.php?page=<?php echo $_GET['page'];?>&sort=activity_booker_name&type1=DESC"><img src="../images/sort_up.gif" border="0" /></a><a href="<?php echo AbstractDB::SITE_PATH;?>admin/booking/booking_list_by_search.php?page=<?php echo $_GET['page'];?>&sort=activity_booker_name&type=search&type1=ASC"><img src="../images/sort_down.gif" border="0" /></a></th>
					
					<th>Supplier</th>
					<th>Customer Name </th>
					<th>Customer Email </th>
					<th>Action</th>
					
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
					if($valid==1)	
					{
						$objAdminBooking->getAdminBookingBySearchPage($start, $limit,$_REQUEST['sort'],$_REQUEST['type1'],$_SESSION['booking_search']);
					}
								
					$i=1;
					$slno=1;
					while($objAdminBooking->getAllRow()){
						if($i%2){
							$bg_color="#E0E0E3";
						}else{
							$bg_color="#FFFFFF";
						}					
				?>
				<tr style='background-color:<?php echo $bg_color;?>;'> 
    				<td><?php echo $objAdminBooking->getField('refence_id');?></td>
					<td><?php echo $objAdminBooking->getField('booking_date');?></td>
    				<td><?php echo $objAdminBooking->getField('schedule_date');?></td>
					<td><?php echo $objAdminBooking->getField('activity_booker_name');?>, <?php echo $objAdminBooking->getField('country_name');?>, <?php echo $objAdminBooking->getField('city_name');?></td>
    				<td><?php echo $objAdminBooking->getField('company_name');?></td>
					<td><?php echo $objAdminBooking->getField('first_name')." ".$objAdminBooking->getField('last_name');?></td>
					 
    				<td><?php echo $objAdminBooking->getField('email');?></td>
					
    				<td>
                    
                    <?php
						
						$today = date("Y-m-d");
						$tommorow=date("Y-m-d",strtotime("+1 day",strtotime($today)));
						$schedule_date=$objAdminBooking->getField('schedule_date');
							if($schedule_date==$today)
							{
								$type="today";	
							}
							elseif($schedule_date==$tommorow)
							{
								$type="tomorrow";	
							}
							elseif($schedule_date<$today)
							{
								$type="past";	
							}
							elseif($schedule_date>$tommorow)
							{
								$type="future";
							}
					
					?>
						<a href="<?php echo AbstractDB::SITE_PATH;?>admin/booking/booking_detail.php?type=<?php echo $type;?>&booking_id=<?php echo base64_encode($objAdminBooking->getField('booking_id'));?>" title="Edit"><img src="../images/icon-view.png" width="25px" height="25px" border="0" /></a> 
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