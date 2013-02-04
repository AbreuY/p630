<?php
require_once("../../pi_classes/commonSetting.php");

chkAdminLogin($_SESSION['adminID']);

require_once("../../pi_classes/class.newsletter.php");
require_once("../../pi_classes/paging.php");

$adminname=$_SESSION['admin_name'];
$adminid=$_SESSION['admin_Id'];

$admin=new newsletter();


if(isset($_GET['delete_id']))
{
	$cat_id=$_GET['delete_id'];

	$whereCnd="`id`=".$cat_id;
	$res=$admin->deleteRecord($whereCnd);	
	$_SESSION['msg']="<span class='success'>Newsletter deleted successfully!</span>";	
	header("location:".$_SERVER['HTTP_REFERER']);
}
include_once("../header1.php");
?>
<title>Product Category</title>

<script type="text/javascript">
function confirmDelete(deleteid)
{
	//alert(deleteid);
	if (confirm("Are you sure you want to delete newsletter?"))
	{
		window.location="list.php?delete_id="+deleteid;
	}
}
</script>

<?php include_once("../header2.php"); ?>

<table cellspacing="0" cellpadding="0" border="0" width="100%">
<TR>
    <TD class="admintopcaption" >Newsletter Management</TD>
</TR>
</TABLE>
<br/>
<br/>

<table cellspacing="0" cellpadding="10" border="0"  width="100%">
<tr>
<td>

	<table cellspacing="0" cellpadding="0" border="0" width="100%">
	<tbody>
	<?php 
	if($msg != ''){
	?>
	<tr>
		<td align="center">
			<?php echo $msg; ?>
		</td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td align="right">
		<table cellspacing="0" cellpadding="1" class="worklink">
			 <tbody>
				<tr>				
				 <td><a href="add.php" style="border: 0px none; font-family: Arial; font-size: 12px;">Add Newsletter</a></td>
				</tr>
			 </tbody>
		</table><br/>
		</td>
	</tr>
	
	<tr>
		<td>
		 <?php
			$admin->getRecordList();
			$recordcount = $admin->getCount();
			$query="1";
			if($recordcount > 0)
			{
				$total	= $recordcount;
				$page 	= $_GET['page'];
				$limit 	= 10;
				$pager  = Pager::getPagerData($total, $limit, $page);
				$offset = $pager->offset;
				$limit  = $pager->limit;
				$page   = $pager->page;
				$query 	= $query . " limit $offset, $limit";
				$admin->getRecordList('',$query);
					
				if($recordcount > $limit){
					if($page == 1){
						echo "Previous";
					}
					else{
						echo "<a href=\"?page=" . ($page - 1) ."\">Previous</a>";
					}
					for ($i = 1; $i <= $pager->numPages; $i++){
						echo "  "." ";
						if ($i == $pager->page)
						{
							echo "<strong>$i</strong>";
						}
						else{
							echo "<a href=\"?page=$i\"> $i </a>";
						} 
					}
					echo "  "." ";
					if ($page == $pager->numPages){
						echo "Next";
						}
					else{
						echo "<a href=\"?page=" . ($page + 1) ."\">Next</a>";
					}
					
				}	
			} // End of PAging
			$cnt=$offset;		
		?>
		</td>	
	</tr>
	
	<tr>
	<td>	
		<table cellspacing="1" cellpadding="2" border="0" width="100%" class="worktable">
		 <tbody>
		 
		 <tr>	 
			<td width="5%" class="workcap">Sr No.</td>
			<td width="20%" class="workcap">Subject</td>
			<td class="workcap">Content</td>
			<td width="11%" class="workcap">Created On</td>
			<td width="11%" class="workcap">Modified On</td>						
			<td width="10%" class="workcap" colspan="3" align="center">Action</td>
			
		 </tr>
		<?php
			while($admin->getRow())
			{
				 $news_id=$admin->getField('id');
				 $title=$admin->getField('title');
				 $content=$admin->getField('content');
				 $created_on=$admin->getField('created_on');
				 $modified_on=$admin->getField('modified_on');
				
				 $cnt++;							
		?>
		 <tr>
			<td class="worktd" align="left">
				<?php 
					echo strip_tags($cnt);
				?>	
				</td>
				<td class="worktd"  align="left">
					<?php echo $title; ?>	
				</td>
				<td class="worktd"  align="left">
					<?php 
						if(strlen($content) > 100)
						{
							echo substr($content,0,100)."...";
						}
						else
						{
							echo $content; 
						}
					?>	
				</td>
				<td class="worktd"  align="left">
					<?php echo $created_on; ?>	
				</td>
				<td class="worktd"  align="left">
					<?php echo $modified_on; ?>	
				</td>
		
			 <td width="70" class="worktd">
				<table cellspacing="0" cellpadding="1" class="worklink">
				 <tbody><tr>
					 <td valign="top"><a style="font-family: Arial; font-size: 12px; border: 0px none;" href="add.php?edit_id=<?php echo $news_id; ?>"><img border="0" src="../images/icons/edit.png"></a></td>
					 <td><a style="border: 0px none; font-family: Arial; font-size: 12px;" href="add.php?edit_id=<?php echo $news_id; ?>">Edit</a></td>
					 </tr>
				 </tbody>
				</table>
			 </td>
		 
			<td  width="70" class="worktd">
				<table cellspacing="0" cellpadding="1" class="worklink">
				 <tbody><tr>
					<td valign="top"><a style="font-family: Arial; font-size: 12px; border: 0px none;" href="javascript:void(0)"><img border="0"  onclick="return confirmDelete(<?php echo $pid; ?>)" src="../images/icons/delete.png"></a></td>
					<td><a style="border: 0px none; font-family: Arial; font-size: 12px;" onclick="return confirmDelete(<?php echo $news_id; ?>)" href="javascript:void(0)">Delete</a></td>
				 </tr></tbody>
				</table>
			</td>
			
			 <td width="70" class="worktd">
				<table cellspacing="0" cellpadding="1" class="worklink">
				 <tbody><tr>
					 <td valign="top"><a style="font-family: Arial; font-size: 12px; border: 0px none;" href="send-newsletter.php?news_id=<?php echo $news_id; ?>"><img border="0" height="16px" src="../images/Send Icon.gif"></a></td>
					 <td><a style="border: 0px none; font-family: Arial; font-size: 12px;" href="send-newsletter.php?news_id=<?php echo $news_id; ?>">Send</a></td>
					 </tr>
				 </tbody>
				</table>
			 </td>
		</tr>
		<?php } 
		if($recordcount==0)
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
		
	</td>
	</tr>
	</tbody>
	</table>


</td>
</tr>
</table>

<?php include_once("../footer.php"); ?>
