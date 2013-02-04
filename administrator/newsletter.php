<?php
	require_once('../pi_classes/Admin.php');
	ob_start();
	session_start();
	if(empty($_SESSION['admin_id'])){
		header("location:login.php");
	}
	$objAddEmp=new Admin();	
	$objDelEmp=clone $objAddEmp;
	
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
		<div id="loading"></div>
		<form name="frmEmp" id="frmEmp" method="post" action="">
		<header>
			<h3 class="tabs_involved">Employee Management </h3>
		</header>
		<header>
			
			<div class="emp_tot_cnt">(<?php echo $total_pages?>) Results</div>
		</header>
		<div class="tab_container">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th><input type="checkbox" name="check_all" id="check_all" onclick="set_all_checked(this)" /></th> 
    				<th>Sr. No</th>
					<th>Title </th>
					<th>Created On </th>
					<th>Modified On </th>
    				<th>Distributed </th> 
    				<th>Edit</th> 
					<th>Delete</th> 
				</tr> 
				<?php $objnewsletter= new Admin();
					$objnewsletter1= new Admin();
					$abc = $objnewsletter->select_news_letter(); 
				  	//$all_rows = $objnewsletter->getAllRow();
					//$num = mysql_num_rows( $abc);
					//echo "this is new".$num;
					//print_r($all_rows);
					$cnt = 1;
					while($row=mysql_fetch_array($abc))
					{
		   				$rows[] = $row;
					}
					
					foreach($rows as $all_row){
						?> 
					<tr>
						<td> <?php echo $cnt; ?></td>	
						<td> <?php echo $all_row['subject']; ?></td>	
						<td> <?php echo $all_row['created_on']; ?></td>	
						<td> <?php echo $all_row['modified_on']; ?></td>
						<td> <a href="<?php echo AbstractDB::SITE_PATH;?>admin/send_newsletter.php?id=<?php echo $all_row['id']; ?>">Send</a></td>	
						<td> <a href="<?php echo AbstractDB::SITE_PATH;?>admin/addnewsletter.php?id=<?php echo $all_row['id']; ?>" >Edit</a></td>	
						<td> <a href="#">Delete</a></td>	
					<?php $cnt++; }
					
					?>
				
			</thead> 
			
			</table>
			<footer>
				<div style="float: left;padding: 5px;">
					<input type="hidden" value="<?=( $slno-1 )?>" name="totalcount" />
					
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