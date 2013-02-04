<?php
	require_once('../pi_classes/Admin.php');
	ob_start();
	session_start();
	if(empty($_SESSION['admin_id'])){
		header("location:login.php");
	}
	$objAddEmp=new Admin();	
	$objDelEmp=clone $objAddEmp;
	$url = $objAddEmp->curPageURL();
	
	$url = explode('?',$url);
	$url = explode('=',$url[1]);
	$cms_id = $url[1];
	 $abc = $objAddEmp->select_news_letter_id($cms_id );
	 $objAddEmp->getAllRow();
	 $content=$objAddEmp -> getField('content');
	 if(isset($_POST['submit'])){
	$subject=$_POST['sub-txt'];
	
		for ($i=0; $i < count($_POST['selectedcontact']); $i++){
			$to = $_POST['selectedcontact'][$i];
			$txt=$content;
			$name = 'datta@panaceatek.com';
			$headers  = 'From: '.$name. "\r\n";
			$headers .= "MIME-version: 1.0\n";
			$headers .= "Content-type: text/html; charset=UTF-8\n";
			$bool=mail($to,$subject,$txt,$headers); ?>
			<div id="progressbar"></div> <?php
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
<!--<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.tablesorter.min.js" language="javascript" type="text/javascript"></script>-->
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.equalHeight.js"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.validate.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/password_strength_plugin.js"  language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.blockUI.js"  language="javascript" type="text/javascript"></script>
<script>
  	$(document).ready(function() {
    	$('#blockButton2').click(function() {
        $('body').block({ message: '<h1><img src="http://192.168.2.29/p568/admin/images/busy.gif" /> Processing...</h1>', css: { border: '3px solid #a00' } });
    });
    $('#unblockButton').click(function() {
        $('body').unblock();
    });
  	});
</script>
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
	$("#loading").html("<img src='images/bigLoader.gif' />");
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
		<article class="module width_full">
		<?php $objNewLetter= new Admin();
				$objNewLetter->select_news_letter_id($cms_id); 
				$objNewLetter->getAllRow(); ?>
		<div id="loading"></div>
		<form name="sendMail" id="sendMail" method="post" action="">
			<header>
				<h3 class="tabs_involved">Send News Letter</h3>
			</header>
			<h4 style="text-align: right; float: right; margin-top: 5px; margin-right: 175px;"><?php echo "Title:  ".$objNewLetter->getField('subject');?></h4>
			<label for="email-txt" style="font-weight:bold;"> Enter Subject for Email </label>
			<input type="text" name="sub-txt" id="sub-txt" style=" width:400px"/>
			<div class="tab_container">
			<table cellspacing="0" class="tablesorter"> 
				<thead> 
					<tr>
						<th><input type="checkbox" onclick="set_all_checked(this)" id="check_all" name="check_all"></th> 
						<th>Email</th> 
						<th>  Subscribe </th> 
					</tr>
				
				</thead>
				
  
				<?php 
					$objnewsletter= new Admin();
					$abc = $objnewsletter->select_subscribe_user();
					$cnt = 1;
					while($row=mysql_fetch_array($abc))
					{
		   				$rows[] = $row;
					}
					$counter1 = count($rows);
					//print_r($counter1);
					//die();
					foreach($rows as $all_row){
						?> 
						
  						
						
					<tr><td>
						<input type="checkbox" name="selectedcontact[]" id="id" value="<?php echo $all_row['email'];?>" title="Email"/>
						<input type="hidden" value="MTg=" id="emp_id" name="emp_id">
						<input type="hidden" value="MTg=" id="emp_id1" name="emp_id1">
						 <?php echo $cnt; ?></td>	
						<td> <?php echo $all_row['email']; ?></td>	
						<td> Subscribe </td>	
						
					<?php $cnt++; }
						$cnt = $cnt - 1;
						
					?> 
					<input type="hidden" name="count" id="count" value="<?php echo $cnt; ?>"/>
				</tr>
				</table>
			</div>
		
		
		<div class="tab_container">
			<footer>
				<div style="float: left;padding: 5px;">
					<input type="hidden" value="<?=( $slno-1 )?>" name="totalcount" />
				</div>
				<div class="pagination_down">
					<?php echo $paginate;?>
				</div>
				<input type="submit" name="submit" value="Send" id="blockButton2"/>	
			</footer>
				
		</div><!-- end of .tab_container -->	
		
		</form>
		</article><!-- end of content manager article -->		
		<div class="spacer"></div>
	</section>
</body>
</html>