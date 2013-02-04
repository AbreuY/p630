<?php
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');
#Require:: for pagination:
require_once("../pi_classes/paging.php");

#CheckUserLogin:
checkAdvisorSession($_SESSION['advisor_id']);

#Objects:
$objUser = new User();
	
	#Action::For Gather a info abt no. of communication details of advisor.
	$table_name = "communication";
	$whereCnd = " where `to` = '".$_SESSION['advisor_id']."' and `from_type` = '0' and `del_adv` = '0' order by `date_updated` DESC";
	$objUser->retrieve_data_from_table($table_name, $whereCnd);
	$recordcount = $objUser->numofrows();
	#Start::Paging code:-
	if($recordcount > 0)
	{
		$total	= $recordcount;
		$page 	= $_GET['page'];
		$limit 	= 5;
		$pager  = Pager::getPagerData($total, $limit, $page);
		$offset = $pager->offset;
		$limit  = $pager->limit;
		$page   = $pager->page;
		
		#Define Pager:
		$pagination = ''; 
		if($recordcount > $limit){
			if($page == 1){
				$pagination.="<a href='javascript:void(0)'>Previous</a>";
			}
			else{
				$pagination.= "<a href=\"".site_path."advisor-communication/" . ($page - 1) ."\">Previous</a>";
			}
			for ($i = 1; $i <= $pager->numPages; $i++){
				$pagination.= "  "." ";
				if ($i == $pager->page)
				{
					$pagination.= "<a href='' style='border: 1px solid #0392B6;'>$i</a>";
				}
				else{
					$pagination.= "<a href=\"".site_path."advisor-communication/$i\"> $i </a>";
				} 
			}
			$pagination.= "  "." ";
			if ($page == $pager->numPages)
			{
				$pagination.= "<a href='javascript:void(0)'>Next</a>";
			}
			else
			{
				$pagination.= "<a href=\"".site_path."advisor-communication/" . ($page + 1) ."\">Next</a>";
			}			
		}
		
		#Define Limit & Offset in Query.
		$table_name = "communication";
		$whereCnd = " where `to` = '".$_SESSION['advisor_id']."' and `from_type` = '0' and `del_adv` = '0' order by `date_updated` DESC limit $offset, $limit";
		$objUser->retrieve_data_from_table($table_name, $whereCnd);
		while($tempRow = $objUser->getAllRow()){
			
			#clone:
			$objUsrImg = clone $objUser;
			$objUsrImg->retrieve_data_from_table("user_details", " where `user_id` = ".$tempRow['from']);
			$tempRowImg = $objUsrImg->getAllRow();
			
			if(!$objUsrImg->numofrows()){
				continue;
			}
			
			$tempRow['uname'] = $tempRowImg['username'];
			$tempRow['img'] = $tempRowImg['image_path'];
			
			if(empty($tempRow['img'])){
				$tempRow['img'] = "user-comment.png";
			}
			$tempRow['date_updated'] = date("dS M Y | g:iA", strtotime($tempRow['date_updated']));
			
			$communication[] = $tempRow;
		}
		#Other Step:
		$smarty->assign('communication', $communication);
		
	}#End::Paging code.
	$smarty->assign("pagination",$pagination);
	
	
	#View:
	$smarty->display('../templates/advisor_account/advisor_communication.tpl');
?>
