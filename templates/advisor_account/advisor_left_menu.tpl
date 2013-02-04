<div class="dash_user_left">
        	<ul>
            	<li> <a href="{$site_path}advisor-dashboard" class="{$abt_active1}">Dashboard</a></li>
                <li> <a href="{$site_path}my-profile/edit-advisor-profile" class="{$abt_active2}">My Profile</a></li>
                <li> <a href="{$site_path}session-pending" class="{$abt_active3}">Session/Messages</a></li>
                <li> <a href="{$site_path}manage-files-photo" class="{$abt_active4}">Manages Files</a></li>
                <li> <a href="{$site_path}create-product" class="{$abt_active5}">Create Product</a></li>
                <li> <a href="{$site_path}view-products" class="{$abt_active6}">View Products</a></li>
                <li> <a href="{$site_path}advisor-communication" class="{$abt_active7}">
                Communication {if $new_adv neq 0}<div class="circle bgcolor" style="float:right;"><span>{$new_adv}</span></div>{/if}</a></li>
                <li> <a href="{$site_path}promote-profile" class="{$abt_active8}">Promote Profile</a></li>
                <li> <a href="{$site_path}advisor-guidelines" class="{$abt_active9}">Guidelines</a></li>
                <li> <a href="{$site_path}change-pass" class="{$abt_active10}">Change Password</a></li>
                <li> <a href="{$site_path}view-advisor-profile/{$smarty.session.advisor_id}" target="_blank" class="{$abt_active11}">View Profile</a></li>
                <li> <a href="{$site_path}log_in/logout.php" class="{$abt_active12}">Logout</a></li>
            </ul>
        </div>