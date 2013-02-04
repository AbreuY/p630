<?php 
require_once dirname(__FILE__) . '/AbstractDB.php';
class Photo extends AbstractDB
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
		return false;
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
	
	public function addUserAlbum($arr){
		$sql="INSERT INTO ".parent::SUFFIX."user_album(`id`,`user_id`,`album_name`,`status`,`add_date`)VALUES('','".$_SESSION['user_id']."','".addslashes($arr['album_name'])."','1','".date("Y-m-d H:i:s")."')";
		$this->result=$this->query($sql);				
	}
	
	public function updateUserAlbum($arr){
		$sql="UPDATE ".parent::SUFFIX."user_album set `album_name`='".addslashes($arr['album_name'])."' where `id`='".$arr['album_id']."'";
		$this->result=$this->query($sql);		
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
	
	public function getUserAlbum($user_id){
		$sql="select a.* from ".parent::SUFFIX."user_album a where a.user_id='".$user_id."'";
		$this->result=$this->query($sql);
	}
	
	public function getAlbumDafulatPhoto($album_id){
		$sql="select p.image_path from ".parent::SUFFIX."user_photo p where p.user_id='".$_SESSION['user_id']."' and p.album_id='".$album_id."' and `default`='1'";
		$this->result=$this->query($sql);
	}
	
	public function addUserPhoto($arr,$image_path){
		if($arr['default']=='on'){
			$cover=1;
			$sql1="UPDATE `".parent::SUFFIX."user_photo` SET `default`='0' where user_id='".$_SESSION['user_id']."' and `album_id`='".$arr['album_id']."'";
			$this->result=$this->query($sql1);			
			$sql="INSERT INTO ".parent::SUFFIX."user_photo(`id`,`user_id`,`album_id`,`photo_name`,`image_path`,`default`,`add_date`)VALUES('','".$_SESSION['user_id']."','".$arr['album_id']."','".addslashes($arr['photo_name'])."','".$image_path."','".$cover."','".date("Y-m-d H:i:s")."')";
			$this->result=$this->query($sql);
			$id= mysql_insert_id($this->mysql);			
			$sql2="UPDATE `".parent::SUFFIX."user_photo` SET `default`='1' where id='".$id."'";
			$this->result=$this->query($sql2);			
		}else{
			$cover=0;
			$sql="INSERT INTO ".parent::SUFFIX."user_photo(`id`,`user_id`,`album_id`,`photo_name`,`image_path`,`default`,`add_date`)VALUES('','".$_SESSION['user_id']."','".$arr['album_id']."','".addslashes($arr['photo_name'])."','".$image_path."','".$cover."','".date("Y-m-d H:i:s")."')";
			$this->result=$this->query($sql);			
			$id= mysql_insert_id($this->mysql);
			$sql3="select * from ".parent::SUFFIX."user_photo where user_id='".$_SESSION['user_id']."' and `album_id`='".$arr['album_id']."' order by id DESC limit 1";
			$rs=mysql_query($sql3);
			$num=mysql_num_rows($rs);
			if($num==1){
				$sql2="UPDATE `".parent::SUFFIX."user_photo` SET `default`='1' where user_id='".$_SESSION['user_id']."' and `album_id`='".$arr['album_id']."'";
				mysql_query($sql2);
			}
		}
	}
	
	public function getUserAlbumPhotos($user_id,$album_id){
		$sql="select * from ".parent::SUFFIX."user_photo where user_id='".$user_id."' and album_id='".$album_id."'";
		$this->result=$this->query($sql);
	}
	
	public function deleteUserAlbum($album_id){
		/* GETTING ALL THE ALBUM PHOTO DETAIL*/
		$arrPhotoToDelete=array();
		$sql1="select * from `".parent::SUFFIX."user_photo` where `album_id`='".$album_id."'";
		$this->result=$this->query($sql1);
		while($temp=$this->getAllRow())
		{
			$arrPhotoToDelete[]=$temp;
		}
		/* DELTTING EACH PHOTO*/
		foreach($arrPhotoToDelete as $Photo)
		{
					if(file_exists(dirname(__FILE__)."/../upload/photo/".$Photo['image_path'])){
						unlink(dirname(__FILE__)."/../upload/photo/".$Photo['image_path']);
					}
					if(file_exists(dirname(__FILE__)."/../upload/photo/thumbnail/".$Photo['image_path'])){
						unlink(dirname(__FILE__)."/../upload/photo/thumbnail/".$Photo['image_path']);
					}
					$sql="delete from ".parent::SUFFIX."user_photo where id='".$Photo['id']."'";
					$this->result=$this->query($sql);
		}
		/* DELETING THE PHOTO ALBUM */
		$sql="delete from ".parent::SUFFIX."user_album where id='".$album_id."'";
		$this->result=$this->query($sql);
		return $this->result;
	}
	
	public function deleteUserPhoto($photo_id,$album_id,$image_path){
		$sql3="select * from ".parent::SUFFIX."user_photo where `id`='".$photo_id."' and `default`='1'";
		$rs=mysql_query($sql3);
		$num=mysql_num_rows($rs);
		if($num==1){
			$sql3="select * from `".parent::SUFFIX."user_photo` where `album_id`='".$album_id."' and `default` NOT IN(1) order by id DESC limit 1";
			$rs=mysql_query($sql3);
			$row=mysql_fetch_assoc($rs);
			$num=mysql_num_rows($rs);
			$sql2="UPDATE `".parent::SUFFIX."user_photo` SET `default`='1' where id='".$row['id']."'";
			$rs=mysql_query($sql2);
			if(file_exists(dirname(__FILE__)."/../upload/photo/".$image_path)){
				unlink(dirname(__FILE__)."/../upload/photo/".$image_path);
			}
			if(file_exists(dirname(__FILE__)."/../upload/photo/thumbnail/".$image_path)){
				unlink(dirname(__FILE__)."/../upload/photo/thumbnail/".$image_path);
			}
			$sql="delete from ".parent::SUFFIX."user_photo where id='".$photo_id."'";
			$this->result=$this->query($sql);
			return $this->result;
		}
		else{
			if(file_exists(dirname(__FILE__)."/../upload/photo/".$image_path)){
				unlink(dirname(__FILE__)."/../upload/photo/".$image_path);
			}
			if(file_exists(dirname(__FILE__)."/../upload/photo/thumbnail/".$image_path)){
				unlink(dirname(__FILE__)."/../upload/photo/thumbnail/".$image_path);
			}
			$sql="delete from ".parent::SUFFIX."user_photo where id='".$photo_id."'";
			$this->result=$this->query($sql);
			return $this->result;
		}	
	}
	
	public function getPhotoDtlById($photo_id){
		$sql="select * from ".parent::SUFFIX."user_photo where id='".$photo_id."'";
		$this->result=$this->query($sql);
	}
	
	public function updateUserPhoto($arr,$image_path){
		if($arr['default']=='on'){
			$cover=1;
			$sql1="UPDATE `".parent::SUFFIX."user_photo` SET `default`='0' where user_id='".$_SESSION['user_id']."' and `album_id`='".$arr['album_id']."'";
			$this->result=$this->query($sql1);			
			$sql2="UPDATE `".parent::SUFFIX."user_photo` SET `photo_name`='".addslashes($arr['photo_name'])."', `image_path`='".$image_path."', `default`='1' where id='".$arr['photo_id']."'";
			$this->result=$this->query($sql2);			
		}else{
			$sql2="UPDATE `".parent::SUFFIX."user_photo` SET `photo_name`='".addslashes($arr['photo_name'])."', `image_path`='".$image_path."' where id='".$arr['photo_id']."'";
			$this->result=$this->query($sql2);
		}
	}
	
	public function getActivityPhotos($activity_id){
		$sql="select * from ".parent::SUFFIX."activity_photo where `activity_id`='".$activity_id."'";
		$this->result=$this->query($sql);
	}
	
	public function getUserAlbumDtl($album_id){
		$sql="select * from ".parent::SUFFIX."user_album  where id='".$album_id."'";	
		$this->result=$this->query($sql);
	}
	
	public function getHolidayForDoctorForAppointment($activity_id)
	{
		$sql="select * from `".parent::SUFFIX."activity_holiday` WHERE `activity_id`='".$activity_id."'";
		$this->result=$this->query($sql);
	}
}
?>