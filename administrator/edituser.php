<?php
require_once("../pi_classes/commonSetting.php");

//chkAdminLogin($_SESSION['adminID']);

require_once("../pi_classes/class.users.php");
$ipObj=new users();

require_once("../pi_classes/class.country.php");
$countryObj=new country();

//require_once("../pi_classes/class.state.php");
//$stateObj=new state();


$month = array (
        '01' => 'January',
        '02' => 'February',
        '03' => 'March',
        '04' => 'April',
        '05' => 'May',
        '06' => 'June',
        '07' => 'July',
        '08' => 'August',
        '09' => 'September',
        '10' => 'October',
        '11' => 'November',
        '12' => 'December'
    );


$y1=date('Y')-10;
$year=array();
for($m=0;$m<60;$m++){
	$year[]=$y1-$m;	
}	
	



if(isset($_GET['edit_id']) || $_GET['edit_id']!='')
{
	$edit_id=$_GET['edit_id'];
	$result=$ipObj->getRecordById($edit_id);
	$edit_country_id=$ipObj->getField('country');
	//$edit_state_id=$ipObj->getField('state_id');
	$prev_image_name=$ipObj->getField('photo');
	
	// Get Country list
	$countryObj->getRecordList();
	$countryCnt = $countryObj->getCount();
	
	//from country id get state list
//	$stateObj->getStateByCountryId($edit_country_id);
//	$stateCnt = $stateObj->numofrows();
}


if($_POST['btnSubmit']!='') 
{
	extract($_POST);
//	echo "<pre>"; print_r($_POST); exit;
	$dob=$year."-".$month."-".$day;
	$set_fields="`title`='".$select_title."', `firstname` = '".$firstname."',`lastname` = '".$lastname."', `country`='".$country."', `DOB`='".$dob."'";
	$where_field="`userid`=".$_POST['edit_id'];

	$ipObj->updateRecord($set_fields, $where_field);
	$_SESSION['msg']="<span class='success'>User updated successfully!</span>";
	//header("Location:edituser.php?edit_id=".$_POST['edit_id']);
	header("Location:".$_SERVER['HTTP_REFERER']);
}

include_once("header1.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product Category| Powered by <?php echo AbstractDB::SITE_TITLE;?></title>
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
<script type="text/javascript" src="<?=AbstractDB::SITE_PATH?>admin/js/ajaxupload.3.5.js" ></script>
<script type="text/javascript" language="javascript">

$(document).ready(function(){
//alert("Hello");
$.validator.addMethod("onlyLetter", function(value, element) {
	var str11 = /([0-9])/;
	var str21 = /([A-Za-z]+)/;
	if(str11.test(value))
			return false;
	if(!(str21.test(value)))
		return false;
		return true;
},"Please enter characters only.");

	//alert("Hello");
	 jQuery("#frmRegister").validate({
  	 errorElement:'div',
	 rules: {	 
			select_title:{
				required: true	
			},
			firstname:{
				required: true	
			},
			lastname:{
				required: true	
			},
			country:{
				required: true	
			},
			day:{
				required: true	
			},
			month:{
				required: true	
			},
			year:{
				required: true	
			}				
		},

		messages: {
			select_title:{
				required: "Please select title"	
			},
			firstname:{
				required: "Please enter first name"	
			},
			lastname:{
				required: "Please enter surname"	
			},
			country:{
				required: "Please select country"
			},
			day:{
				required: "Please select day"	
			},
			month:{
				required: "Please select month"	
			},
			year:{
				required: "Please select year"	
			}	
		}
		
		});

});


function confirmDelete(deleteid)
{
	//alert(deleteid);
	if (confirm("Are you sure you want to delete user?"))
	{
		window.location="?delete_id="+deleteid;
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
	<?php include("/header.php");?>	
	<?php include("/menu.php");?>	
	<section id="main" class="column">	
	<div class="module_content module width_full ">
<header><h3>Edit User</h3></header>
<header>
	<div style="float: left;padding: 5px 0 0 20px;">
		<a href="<?php echo AbstractDB::SITE_PATH;?>admin/manage_users.php" title="Go back"><img src="./images/back_icon2.png" /></a>
	</div>
</header>
<? include_once("../header2.php"); ?>
<? include_once("header2.php"); ?>

<FORM name="frmRegister" id="frmRegister" action="" method="POST" enctype="multipart/form-data">

	<input type="hidden" name="edit_id" value="<? echo $ipObj->getField('userid');?>">
	<? if($msg != ''){ ?>
	<div align="center"><? echo $msg; ?></div>
	<? } ?>
	
	<?
		$title=$ipObj->getField('title');
	?>
<table cellpadding="5px">
	<tr>
	<td><span class="FEFieldTitle" style="width: 60">Select Title</span></td>
	<td>
		<select class="FETextInput" name="select_title" id="select_title">
			<option value="">Select Title</option>
			<option <? if(strcmp($title,"Mr")==0){ ?> selected="selected" <? } ?>>Mr</option>
			<option <? if(strcmp($title,"Miss")==0){ ?> selected="selected" <? } ?>>Miss</option>
			<option <? if(strcmp($title,"Ms")==0){ ?> selected="selected" <? } ?>>Ms</option>
			<option <? if(strcmp($title,"Mrs")==0){ ?> selected="selected" <? } ?>>Mrs</option>
		</select>
	</td>
	</tr>

	<tr>
		<td><span class="FEFieldTitle" style="width: 60">First name </span></td>
		<td>		
			<input type="text" dir="ltr" class="FETextInput" name="firstname" id="firstname"  value="<? echo $ipObj->getField('firstname');?>" size="80"  maxlength="255">
		</td>
	</tr>

	<tr>
	<td><span class="FEFieldTitle"  style="width: 60">Surname </span></td>	
	<td>
		<input type="text" dir="ltr" class="FETextInput" name="lastname" id="lastname"  value="<? echo $ipObj->getField('lastname');?>" size="80"  maxlength="255">
	</td>
	</tr>
	
	<tr>
	<td><span class="FEFieldTitle"  style="width: 60">E-mail address </span></td>
	<td>
		<input type="text" dir="ltr" disabled="disabled" class="FETextInput" name="email" id="email" value="<? echo $ipObj->getField('email');?>" size="80" maxlength="255">
	</td>
	</tr>

	<tr>
	<td><span class="FEFieldTitle">Country </span></td>
	<td>
		<select class="FETextInput" name="country" id="country" >
			<option value="">-Select Country-</option>
			<?								
			if($countryCnt>0)
			{
				while($countryObj->getRow())
				{		
					$country_id=$countryObj->getField('country_id');					
			?>
				<option value="<? echo $country_id; ?>" <? if($edit_country_id==$country_id){?> selected="selected" <? } ?>><? echo $countryObj->getField('country_name'); ?></option>
			<?
				}
			}
			?>
		</select>
	</td>
	</tr>
	<? 
		$dateArray=array(); 
		$dateArray=explode("-",$ipObj->getField('DOB'));	
	?>
	<tr>
		<td>Date Of Birth</td>
		<td>
		<table>
		<tr>
			<td>
				<select class="FETextInput" name="day" id="day" >
					<? for($i=1; $i<=31; $i++){
						if($i<10)
						{
							$day="0".$i;
						}
						else
						{
							$day=$i;
						}
						?>
					<option value="<?=$day?>" <? if($dateArray[2]==$day){?> selected="selected" <? } ?>><?=$day?></option>
					<? } ?>
				</select>
			</td>
			<td>
				<select class="FETextInput" name="month" id="month" >

					<? foreach($month as $key=>$value){ ?>
					<option value="<?=$key?>" <? if($dateArray[1]==$key){?> selected="selected" <? } ?>><?=$value?></option>
					<? } ?>
				</select>
			</td>
			<td>
				<select class="FETextInput" name="year" id="year" >
				<? for($i=0; $i<=count($year); $i++){?>
					<option value="<?=$year[$i]?>" <? if($dateArray[0]==$year[$i]){?> selected="selected" <? } ?>><?=$year[$i]?></option>
				<? } ?>
				</select>
			</td>
		</tr>
		</table>
		</td>	
	</tr>
	
	
	<tr>
	<td><span class="FEFieldTitle" style="width: 60">Registered on </span></td>
	<td>
		<input type="text" dir="ltr" disabled="disabled" class="FETextInput" name="regdate" id="regdate"  value="<? echo $ipObj->getField('created_date');?>" size="80"  maxlength="255">
	</td>
	</tr>
	
	<tr>
	<td>&nbsp;</td>
	<td>
		<input type="SUBMIT" value="Update" name="btnSubmit" class="btn3">
	</td>
	</tr>	
	</table>
	
</FORM>
</div>
</section>
<? include_once("footer.php"); ?>