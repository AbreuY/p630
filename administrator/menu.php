<aside id="sidebar" class="column">
		<!--<form class="quick_search">
			<input type="text" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>-->
		<hr/>
		
		<h3> Global Site Setting </h3>	
		<ul class="toggle">
			<li class="icn_folder"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/global_setting/list.php"> Manage Global Setting </a></li>
		</ul>
		
		<h3>Admin Management</h3>
		<ul class="toggle">
			<li class="icn_add_user"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/admin_management/add_employee.php">Add New Admin</a></li>
			<li class="icn_folder"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/admin_management/manage_employee_details.php">
            View Admin Details</a></li>
		</ul>
		
		<h3>User And Advisor Management</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/user_management/manage_users.php">Manage Users</a></li>
			<li class="icn_folder"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/user_management/manage_advisor.php?all=yes">Manage Advisor</a>
            </li>
		</ul>
        
		<h3> Category Management</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/category_management/add.php">Add Category</a></li>
            <li class="icn_folder"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/category_management/list.php">Manage Category</a></li>
<!--            <li class="icn_folder"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/category_management/steplist.php">Manage By New Way Category</a></li>-->
        </ul>
        
        <h3> Product Management</h3>
		<ul class="toggle">
            <li class="icn_folder"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/product_management/list.php">Manage Product</a></li>
        </ul>
        
        <h3> File Management</h3>
		<ul class="toggle">
            <li class="icn_folder"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/file_management/list.php">Manage Product Files	</a></li>
        </ul>
        
        
        <h3> Search Page Display Management</h3>
		<ul class="toggle">
            <li class="icn_folder"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/emp_management/list.php">Manage Employers on Search Page	</a></li>
  										<li class="icn_folder"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/job_management/list.php">Manage Job titles on Search Page	</a></li>      
															<li class="icn_folder"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/edu_management/list.php">Manage Universities on Search Page	</a></li>      
        	        
        </ul>
        
        <!--<h3>Booking Management</h3>
		<ul class="toggle">
			<li class="icn_add_user"><a href="<?php//echo AbstractDB::SITE_PATH;?>administrator/booking/manage_booking.php?all=yes">Add New Booking</a></li>
			<li class="icn_folder"><a href="<?php//echo AbstractDB::SITE_PATH; ?>administrator/booking/booking_list.php?type=current&booking_day=today">Manage Booking</a></li>
		</ul>-->
		
		<!--<h3>Acitivity Management</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="<?php//echo AbstractDB::SITE_PATH;?>administrator/activity/list.php">Manage Activity</a></li>
			<li class="icn_add"><a href="<?php//echo AbstractDB::SITE_PATH;?>administrator/activity/add.php"> Add Activity </a></li>
		</ul>-->

			<!--<h3> Sub Category Management</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="<?php//echo AbstractDB::SITE_PATH;?>administrator/subcat/list.php">Manage Sub Category</a></li>
			<li class="icn_folder"><a href="<?php//echo AbstractDB::SITE_PATH;?>administrator/subcat/add.php">Add Sub Category</a></li>
		</ul>-->
		
		<!-- <h3> Sub Category Management</h3>
		<ul class="toggle">
			<li class="icn_add_user"><a href="<?php//echo AbstractDB::SITE_PATH;?>administrator/subcategory/list.php">  Manage Sub Category </a></li>
		</ul> -->
		
		<!--<h3>Continent Management</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="<?php//echo AbstractDB::SITE_PATH;?>administrator/continent/list.php">Manage continent</a></li>
			<li class="icn_add"><a href="<?php//echo AbstractDB::SITE_PATH;?>administrator/continent/add.php">Add continent </a></li>
		</ul>-->
        
		<!--<h3>Country Management</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/country/list.php">Manage Country </a></li>
			<li class="icn_add"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/country/add.php">Add Country </a></li>
			<li class="icn_folder"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/country/list_for_activity.php">Manage Country for Activity </a></li>
			<li class="icn_add"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/country/add_for_activity.php">Add Country for Activity</a></li>
		</ul>-->
		
		<!--<h3>City Management</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/city/list.php">Manage City </a></li>
			<li class="icn_add"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/city/add.php">Add City </a></li>
			<li class="icn_folder"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/city/list_for_activity.php">Manage City for Activity </a></li>
			<li class="icn_add"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/city/add_for_activity.php">Add City for Activity</a></li>
		</ul>-->
		
		<!--<h3> Contact Person Management</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/manage_contact_person.php"> Manage Contact Person </a></li>
			<li class="icn_add"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/add_contact_person.php"> Add Contact Person </a></li>
		</ul>
		
		<h3> Contact Messege Management</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/manage_contact_message.php"> Manage Contact Message </a></li>
		</ul>-->
		
		<h3> CMS Details Management</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/cms_management/manage_cms.php">Manage CMS Pages </a></li>
			<!--<li class="icn_folder"><a href="<?php//echo AbstractDB::SITE_PATH;?>administrator/cms_management/manage_box.php">Manage CMS Boxes </a></li>-->
		</ul>
		
	<!--	<h3> Promotion Code Management</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/promocode/view_promo_code.php">Manage Promotion Code</a></li>
			<li class="icn_folder"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/promocode/add_promo_code.php">Add Promotion Code</a></li>
		</ul>
		
		<h3> Gift Voucher Management</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/gift_voucher/view_gift_voucher.php?search_type=all">Manage Gift Voucher</a></li>
			<li class="icn_folder"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/gift_voucher/view_voucher.php">Manage Voucher</a></li>
			<li class="icn_folder"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/gift_voucher/add_new_voucher_amount.php">Add Voucher</a></li>
		</ul>
		
		<h3> Feedback Management</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/feedback/feedback_category_list.php">Manage Feedback Category</a></li>
			<li class="icn_add"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/feedback/add_feedback_category.php">Add FeedBack Category</a></li>
		</ul>
		
		<h3> Message Management</h3>
		<ul class="toggle">
			<li class="icn_add"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/messages/send_message.php">Add Message</a></li>
			<li class="icn_folder"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/messages/inbox_list.php">Inbox Messages From Customer <?php if($unreadCountOfCust>0){ echo "(".$unreadCountOfCust.")";}?></a></li>
			<li class="icn_folder"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/messages/sent_list.php">Sent Messages To Customer</a></li>
			<li class="icn_folder"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/messages/inbox_list_supplier.php">Inbox Messages From Supplier <?php if($unreadCountOfSupp>0){ echo "(".$unreadCountOfSupp.")";}?></a></li>
			<li class="icn_folder"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/messages/sent_list_supplier.php">Sent Messages To supplier</a></li>
		</ul>-->
		
		<h3> Email Template Management</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/email_template/list.php">Manage Email Template</a></li>
		</ul>
		
		<!--<h3> News Letter Management </h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/newsletter/list.php">Veiw All Newsletter </a></li>
			<li class="icn_add"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/newsletter/add.php">Add Newsletter </a></li>
		</ul>		
		
		<h3> Advertisement Management</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/advertisement/add_list.php">Veiw All Advertise</a></li>
			<li class="icn_add"><a href="<?php echo AbstractDB::SITE_PATH;?>administrator/advertisement/add_advertise.php">Add Advertise</a></li>
		</ul>	-->	
		
		<footer>
			<hr />
			<p><strong>Copyright &copy; <?php echo date("Y")." ".AbstractDB::SITE_TITLE; ?> </strong></p>
			<p>Theme by <a href="http://www.panaceatek.com" target="_black">Panacea</a></p>
		</footer>
	</aside><!-- end of sidebar -->