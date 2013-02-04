<?php
	 $currentFile = $_SERVER["PHP_SELF"];
    $parts = Explode('/', $currentFile);
    $filename=$parts[count($parts) - 1];
		if($filename=="activity_pricing_list.php" || $filename=="edit_activity_pricing.php")
		{
			$active_page="Edit Pricing";
		}
		elseif($filename=="activity_pricing.php")
		{
			$active_page="Add Pricing";
		}
?>
		<fieldset>
		<div id="supplier_dashbord" style="width:auto;float:right;height:auto;">
					<div class="tabs">
							<ul>
								<li <?php if($active_page=="Add Pricing") { ?> class="active"<?php } ?>><a href="<?php echo AbstractDB::SITE_PATH; ?>admin/activity/activity_pricing.php?user_id=<?php echo $_REQUEST['user_id']; ?>">Add Pricing</a></li>
								<!--<li <?php if($active_page=="Edit Pricing") { ?> class="active"<?php } ?>><a href="<?php echo AbstractDB::SITE_PATH; ?>admin/activity/activity_pricing_list.php?user_id=<?php echo $_REQUEST['user_id'];?>">Edit Pricing</a></li>-->
							</ul>
					</div>
			</div>
		</fieldset>
