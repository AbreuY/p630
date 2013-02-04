<?php
#RequiresFiles:
require_once("../../pi_classes/commonSetting.php");
require_once("../../pi_classes/class.email_template.php");
#Rediect:
chkAdminLogin();
#Objects:
$admin		 =	new email_template();
#clone:
$objEmailTpl =  clone $admin;
#Action:
if(isset($_REQUEST['btnDeleteAll']))
{
	for($i=0; $i<$_REQUEST['totalcount']; $i++)
	{
		if(isset($_REQUEST['chk_'.($i+1)]))
		{	
			$objEmailTpl->deleteEmailTemplate($_REQUEST['email_tmp'.($i+1)]);
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
<title>Product Category| Powered by <?php echo AbstractDB::SITE_TITLE;?></title>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>administrator/css/layout.css" type="text/css" media="screen" />
<!--[if lt IE 9]>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>administrator/css/ie.css" type="text/css" media="screen" />
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/html5.js"></script>
<![endif]-->
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery-1.7.1.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/hideshow.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery.equalHeight.js"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery.validate.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function(){ 
	jQuery('.alert_success').mouseover(function(){
		jQuery(this).css('cursor','pointer').click(function(){
			jQuery(this).hide();
		});
	});	
	jQuery('.alert_success').slideDown('slow').delay(3000).slideUp('slow');
	// display error/success/alert messgae
});

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
</head>
<body>
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>	
	<section id="main" class="column">
	<?php if(isset($_SESSION['msg']['updated'])){ ?>
			<h4 class="alert_success">Email template updated successfully!</h4>
		<?php 
		unset($_SESSION['msg']['updated']);
		} 
	if(isset($_SESSION['msg']['delete'])){
	?>
		<h4 class="alert_success">Email template deleted successfully!</h4>
	<?php
		unset($_SESSION['msg']['delete']);
	}	
	?>	
	<article class="module width_full">
	<form name="frmEmp" id="frmEmp" method="post" action="">
	<header><h3>Email Template Management</h3></header>.
	<header>
			<div style="float: left;padding: 5px;">
				<input type="submit" name="btnDeleteAll" id="btnDeleteAll" value="Delete All" class="alt_btn" onclick="return delconfirm();" />
			</div>
		</header>
<div class="tab_container">
<?php
	
			$admin->getRecordList();
			$targetpage = "list.php"; 	
			$limit = 15;
			$total_pages = $admin->numofrows();	
			$stages = 12;
			$page = mysql_escape_string($_GET['page']);
			if($page){
				$start = ($page - 1) * $limit; 
				if($_GET['page']==1){
					$sr_num=$page; 
				}else
				{
					$sr_num=(($page) * $limit)-1; 
				}
			}else{
				$start = 0;	
				$sr_num=1;
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
<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
	
			
	
			<th><input type="checkbox" name="check_all" id="check_all" onclick="set_all_checked(this)" /></th> 
			<th>Sr No.</td>
			<th>Template Name <a href="<?php echo AbstractDB::SITE_PATH;?>administrator/email_template/list.php?page=<?php echo $_GET['page'];?>&sort=temp_name&type=DESC"><img src="<?php echo AbstractDB::SITE_PATH;?>administrator/images/sort_up.gif" border="0" /></a><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/email_template/list.php?page=<?php echo $_GET['page'];?>&sort=temp_name&type=ASC"><img src="<?php echo AbstractDB::SITE_PATH;?>administrator/images/sort_down.gif" border="0" /></a></td>
			<th>Template Subject <a href="<?php echo AbstractDB::SITE_PATH;?>administrator/email_template/list.php?page=<?php echo $_GET['page'];?>&sort=temp_subject&type=DESC"><img src="<?php echo AbstractDB::SITE_PATH;?>administrator/images/sort_up.gif" border="0" /></a><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/email_template/list.php?page=<?php echo $_GET['page'];?>&sort=temp_subject&type=ASC"><img src="<?php echo AbstractDB::SITE_PATH;?>administrator/images/sort_down.gif" border="0" /></a></td>
			<th align="center">Action</td>			
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
			$admin->getRecordListPage($start, $limit,$_REQUEST['sort'],$_REQUEST['type']);
			$i=1;
			$slno=1;
			while($admin->getRow())
			{
				$news_id=$admin->getField('mail_id');
				$temp_name=$admin->getField('mail_page_id');
				$temp_subject=$admin->getField('mail_subject');
				if($i%2){
					$bg_color="#E0E0E3";
				}else{
					$bg_color="#FFFFFF";
				}
				 $cnt++;							
		?>
		 <tr style='background-color:<?php echo $bg_color;?>;'>
				<td>
					<input type="checkbox" id="chk_<?=$slno?>" name="chk_<?=$slno?>" value="" onclick="check_for_all(this)" />
					<input type="hidden" name="email_tmp" id="email_tmp" value="<?php echo base64_encode($admin->getField('mail_id'));?>" />
					<input type="hidden" name="email_tmp<?=$slno?>" id="email_tmp<?=$slno?>" value="<?php echo base64_encode($admin->getField('mail_id'));?>" />
				</td> 
				<td>
				<?php 
					echo $sr_num;
				?>	
				</td>
				<td>
					<?php echo $temp_name; ?>	
				</td>
				<td>
					<?php 
						echo $temp_subject;
						//if(strlen($content) > 100)
//						{
//							echo substr($content,0,100)."...";
//						}
//						else
//						{
//							echo $content; 
//						}
					?>	
				</td>
				
		
			 <td width="70" class="worktd">
				<a style="font-family: Arial; font-size: 12px; border: 0px none;" href="add.php?mail_page_id=<?php echo $temp_name; ?>"><img src="../images/icn_edit.png" border="0" /></a>
			 </td>			 
		</tr>
		<?php $i++; $slno++; $sr_num++;}
}		
		if($total_pages==0)
		{
			?>
			<tr>
				<td align="center" colspan="6">
					No record found.
				</td>
			</tr>
			
		<?php
		}
		?>
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
		</article><!-- end of content manager article -->		
		<div class="spacer"></div>
	</section>
	</form>
</body>
</html>
