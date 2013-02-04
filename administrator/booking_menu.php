<fieldset>
	<div id="supplier_dashbord">
			<div class="tabs">
					<ul>
						<li <?php if($_REQUEST['type']=="current" || $_REQUEST['type']=="today" || $_REQUEST['type']=="tommorow" || $_REQUEST['type']=="future") { ?> class="active"<?php } ?>><a href="<?php echo AbstractDB::SITE_PATH; ?>admin/booking/booking_list.php?type=current&booking_day=today">Current Bookings</a></li>
						<li <?php if($_REQUEST['type']=="past") { ?> class="active"<?php } ?>><a href="<?php echo AbstractDB::SITE_PATH; ?>admin/booking/booking_list.php?type=past">Past Bookings</a></li>
						<li <?php if($_REQUEST['type']=="cancel") { ?> class="active"<?php } ?>> <a href="<?php echo AbstractDB::SITE_PATH; ?>admin/booking/booking_list.php?type=cancel">Cancelled Bookings</a></li>
						<li<?php if($_REQUEST['type']=="search") { ?> class="active"<?php } ?> > <a href="<?php echo AbstractDB::SITE_PATH; ?>admin/booking/booking_list_by_search.php?type=search">Advanced Search</a></li>
					</ul>
			</div>
	</div>
</fieldset>
