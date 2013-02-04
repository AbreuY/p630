<?php
require_once dirname(__FILE__) . '/AbstractDB.php';
class Video extends AbstractDB
{
	private
		$result;		
	public
		$qry_result;
		
	public function __construct()
	{
		parent::__construct();
		$this->result = NULL;
		return true;
	}
	
	public function getRow()
	{
		if($this->row = mysql_fetch_assoc($this->result))
		   {
				return true;
	       }	
		return false;
	}
	
	public function getAllRow()
	{
		if($this->row = mysql_fetch_assoc($this->result))
		   {
				return $this->row;
	       }	
	}
	public function numrows()
	{
		return mysql_num_rows($this->result);
	}
	public function numofrows()
	{
		$num=mysql_num_rows($this->result);
		return $num;
	}
	
	public function addUserVideo($arr){
		if($arr['on_dashboard']=='on'){
			$cover=1;
			$sql1="UPDATE `".parent::SUFFIX."user_video` SET on_dashboard='0' where user_id='".$_SESSION['user_id']."'";
			$this->result=$this->query($sql1);			
			$sql="INSERT INTO ".parent::SUFFIX."user_video(`id`,`user_id`,`video_name`,`video_url`,`on_dashboard`,`add_date`)VALUES('','".$_SESSION['user_id']."','".addslashes($arr['video_name'])."','".addslashes($arr['video_url'])."','".$cover."','".date("Y-m-d H:i:s")."')";
			$this->result=$this->query($sql);
			$id= mysql_insert_id($this->mysql);			
			$sql2="UPDATE `".parent::SUFFIX."user_video` SET on_dashboard='1' where id='".$id."'";
			$this->result=$this->query($sql2);			
		}else{
			$cover=0;
			$sql="INSERT INTO ".parent::SUFFIX."user_video(`id`,`user_id`,`video_name`,`video_url`,`on_dashboard`,`add_date`)VALUES('','".$_SESSION['user_id']."','".addslashes($arr['video_name'])."','".addslashes($arr['video_url'])."','".$cover."','".date("Y-m-d H:i:s")."')";
			$this->result=$this->query($sql);			
			$id= mysql_insert_id($this->mysql);
			$sql3="select * from ".parent::SUFFIX."user_video  where user_id='".$_SESSION['user_id']."'";
			$rs=mysql_query($sql3);
			$num=mysql_num_rows($rs);
			if($num==1){
				$sql2="UPDATE `".parent::SUFFIX."user_video` SET on_dashboard='1' user_id='".$_SESSION['user_id']."'";
				$this->result=$this->query($sql2);
			}
		}		
	}
	
	public function getUserVideo($user_id){
		$sql="select * from ".parent::SUFFIX."user_video where user_id='".$user_id."'";
		$this->result=$this->query($sql);
	}
	
	public function getActivityVideos($activity_id){
		$sql="select * from ".parent::SUFFIX."activity_video where `activity_id`='".$activity_id."'";
		$this->result=$this->query($sql);
	}
	
	public function editUserVideo($arr){
		if($arr['on_dashboard']=='on'){
		$sql1="update `".parent::SUFFIX."user_video` set on_dashboard='0' where `user_id`='".$_SESSION['user_id']."'";
		$this->result=$this->query($sql1);
		
		$sql="update `".parent::SUFFIX."user_video` set `video_name`='".addslashes($arr['video_name'])."', `video_url`='".addslashes($arr['video_url'])."', `on_dashboard`='1' where `id`='".$arr['video_id']."'";
		$this->result=$this->query($sql);
		}else{
		$sql="update `".parent::SUFFIX."user_video` set `video_name`='".addslashes($arr['video_name'])."', `video_url`='".addslashes($arr['video_url'])."' where `id`='".$arr['video_id']."'";
		$this->result=$this->query($sql);
		}

	}
	public function getUserVideoDtlById($vedio_id){
		$sql="select * from ".parent::SUFFIX."user_video where id='".$vedio_id."'";
		$this->result=$this->query($sql);
	}
	
	public function getActDtlPageTabRating($activity_id){
		$sql="select rat.*,u.first_name,u.last_name,u.gender, cnt.country_name from ".parent::SUFFIX."rating as rat left join ".parent::SUFFIX."user_details u on rat.user_id=u.user_id left join ".parent::SUFFIX."country as cnt on u.country=cnt.country_id  where rat.activity_id='".$activity_id."' and rat.status='1'";	
		$this->result=$this->query($sql);
	}
	
	public function getActDtlPageRating($activity_id){
		$sql="select rat.*,usr.*,cntry.`country_name` from `".parent::SUFFIX."rating` as rat left join `".parent::SUFFIX."user_details` as usr on rat.`user_id`=usr.`user_id` left join `".parent::SUFFIX."country` as cntry on cntry.`country_id`=usr.`country` where rat.`activity_id`='".$activity_id."' and rat.`status`='1'";	
		$this->result=$this->query($sql);
	}
	
	public function getActivityRatingDtl($activity_id){
		$sql="select rat.*,u.first_name,u.last_name,u.gender, cnt.country_name from ".parent::SUFFIX."rating as rat left join ".parent::SUFFIX."user_details u on rat.user_id=u.user_id left join ".parent::SUFFIX."country as cnt on u.country=cnt.country_id  where rat.activity_id='".$activity_id."' and rat.status='1'";	
		$this->result=$this->query($sql);
	}
	
	public function getActivityRatingDtlPage($activity_id,$order,$limit,$offset){
		if($order=='newest'){
			$order=" order by  rat.added_date DESC ";
		}else if($order=='oldest'){
			$order=" order by  rat.added_date ASC ";
		}else if($order=='nationality'){
			$order=" order by  cnt.country_name DESC";
		}else if($order=='gender'){
			$order=" order by  u.gender DESC ";
		}else{
			$order=" order by  rat.added_date DESC ";
		}
		
		$sql="select rat.*,u.first_name,u.last_name,u.gender, cnt.country_name from ".parent::SUFFIX."rating as rat left join ".parent::SUFFIX."user_details u on rat.user_id=u.user_id left join ".parent::SUFFIX."country as cnt on u.country=cnt.country_id  where rat.activity_id='".$activity_id."' and rat.status='1' ".$order." limit ".$offset.",". $limit;	
		$this->result=$this->query($sql);
	}


	public function getActDtlPageRatingBySort($activity_id,$order){
		if($order=='newest'){
			$order=" order by  rat.added_date DESC ";
		}else if($order=='oldest'){
			$order=" order by  rat.added_date ASC ";
		}else if($order=='nationality'){
			$order=" order by  cnt.country_name DESC";
		}else if($order=='gender'){
			$order=" order by  u.gender DESC ";
		}else{
			$order=" order by  rat.added_date DESC ";
		}
		
		$sql="select rat.*,u.first_name,u.last_name,u.gender, cnt.country_name from ".parent::SUFFIX."rating as rat left join ".parent::SUFFIX."user_details u on rat.user_id=u.user_id left join ".parent::SUFFIX."country as cnt on u.country=cnt.country_id  where rat.activity_id='".$activity_id."' and rat.status='1' ".$order;	
		$this->result=$this->query($sql);
	}

}
?>