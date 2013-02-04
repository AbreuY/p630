<?php
require_once("../pi_classes/commonSetting.php");

	//chkAdminLogin($_SESSION['adminID']);
	
//echo urlencode(base64_encode("What Are BidBundles"));
	require_once("../pi_classes/paging.php");	
	require_once("../pi_classes/class.auction.php");
	$Obj=new Auction();
	$Obj_ins= clone $Obj;
	
	$pro_del=array();


	//echo "<pre>"; print_r($pro_del); exit;

	include_once("header1.php");
?>


<?php include_once("header2.php"); ?>

<table cellspacing="0" cellpadding="0" border="0" width="100%">
<TR>
    <TD class="admintopcaption" >Wish List</TD>
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
		<td align="center" style="color:#0033FF;">
			<?php echo $msg; ?>
		</td>
	</tr>
	<?php
	}
	?>

	
	<tr>
		<td>
		 <?php
			
			$Obj->getUserWishList($_GET['uid']);
			
			$recordcount = $Obj->getCount();
		
			$query='';
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
			
				$Obj->getUserWishList($_GET['uid'],$query);
				
				if($recordcount > $limit){
					if($page == 1){
						echo "Previous";
					}
					else{
					
						echo "<a href=\"?uid=".$_GET['uid']."&page=" . ($page - 1) ."\">Previous</a>";
					}
					for ($i = 1; $i <= $pager->numPages; $i++){
						echo "  "." ";
						if ($i == $pager->page)
						{
							echo "<strong>$i</strong>";
						}
						else{
							echo "<a href=\"?uid=".$_GET['uid']."&page=$i\"> $i </a>";
						} 
					}
					echo "  "." ";
					if ($page == $pager->numPages){
						echo "Next";
						}
					else{
						echo "<a href=\"?uid=".$_GET['uid']."&page=" . ($page + 1) ."\">Next</a>";
					}
					
				}	
			} // End of PAging
			$cnt=$offset;	?>
		</td>	
	</tr>
	
	<tr>
	<td>	
		<table cellspacing="1" cellpadding="2" border="0" width="100%" class="worktable">
		 <tbody>
		 
		 <tr>
			 <td width="40" class="workcap">Sr No.</td>
			 <td width="200" class="workcap">Product Title</td>
			 <td width="200" class="workcap">Image</td>
 			 <td width="40" class="workcap">Start Date</td>
  			 <td width="40" class="workcap">End Date</td>
			 <td width="40" class="workcap">Price</td>
			 <td width="40" class="workcap">Start Price</td>

		 </tr>
		<?php
			while($Obj->getRow())
			{
				 $pid=$Obj->getField('id');
				 //$ObjDetail->getAuctionDetails($pid,DEFAULT_LANG_ID);
				 //$ObjDetail->getRow();
				 $product_image=$Obj->getField('img_path');
				 $cnt++;							
			?>
		 <tr>
			 <td width="40" class="worktd"><?php echo $cnt; ?></td>
			 <td width="100" class="worktd"><?php echo $Obj->getField('product_title'); ?></td> 	
			 <td width="80" class="worktd">			 
				<img src="../upload/product/thumbnail/<?php echo $product_image; ?>" width="60px" />
			 </td> 		
 			 <td width="100" class="worktd"><?php echo $Obj->getField('start_date'); ?></td> 			
 			 <td width="100" class="worktd"><?php echo $Obj->getField('end_date'); ?></td> 			
 			 <td width="100" class="worktd"><?php echo $Obj->getField('product_price');?></td> 			
 			 <td width="100" class="worktd"><?php echo $Obj->getField('start_price');?></td> 			
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

<?php include_once("footer.php"); ?>