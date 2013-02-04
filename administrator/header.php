<?php
?>
	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/"><?php echo AbstractDB::SITE_TITLE;?> Admin</a></h1>
			<h2 class="section_title">Dashboard</h2>
			<div class="btn_view_site">
				<a href="<?php echo AbstractDB::SITE_PATH;?>administrator/logout.php">Logout</a>				
			</div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p><?php echo $_SESSION['username'];?> <a href="javascript:void(0);"> <?php if(($unreadCountOfCust+$unreadCountOfSupp)>0){ echo $unreadCountOfCust+$unreadCountOfSupp." Messages";}?></a></p>
			<!--<a class="logout_user" href="logout.php" title="Logout">Logout</a>-->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/"><?php echo AbstractDB::SITE_TITLE;?> Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Dashboard</a></article>
		</div>
	</section><!-- end of secondary bar -->
    
<script type="text/javascript">
jQuery(document).ready(function(e) {
	jQuery('#ui-datepicker-div').css('display','none');
});
 </script>