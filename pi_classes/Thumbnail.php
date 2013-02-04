<?php
session_start();
require_once dirname(__FILE__) . '/AbstractDB.php';

class Thumbnail extends AbstractDB
{
	private
		$result;

	public
		$new_width,
		$new_height,
		$newfilename,
		$source_path,
		$destination_path,
		$ext;
		
	public function __construct()
	{
		parent::__construct();
		$this->result = NULL;
		$this->new_width= NULL;
		$this->new_height= NULL;
		$this->newfilename= NULL;
		$this->source_path= NULL;
		$this->destination_path= NULL;
		$this->ext= NULL;
		return true;
	}

	public function createThumbImage()					
	{
		if($this->ext=='jpg' || $this->ext=='jpeg' || $this->ext=='JPG' || $this->ext=='JPEG')
		{	
			$size = getimagesize($this->source_path);
			if($size[0]>=$this->new_width || $size[1]>=$this->new_height)
			{
				$ratio = $size[0]/$this->new_width;
				$height = $size[1]/$ratio;
				if($this->height>$this->new_height)
				{
					while($height>($this->new_height+1))
					{
						$height=$height-1;
					}
				}
				$this->new_height = floor($height);
						
			$vaildupload = $this->thumb_jpeg($this->newfilename,$this->new_height,$this->new_width,$this->source_path,$this->destination_path);
			}
			else
			{
				copy($this->source_path,$this->destination_path.$this->newfilename);
			}	
		}
		elseif($this->ext=='gif' || $this->ext=='png' || $this->ext=='GIF' || $this->ext=='PNG')
		{
			$size = getimagesize($this->source_path);
			if($size[0]>=$this->new_width || $size[1]>=$this->new_height)
			{
				$ratio = $size[0]/$this->new_width;
				$height = $size[1]/$ratio;
				if($this->height>$this->new_height)
				{
					while($height>($this->new_height+1))
					{
						$height=$height-1;
					}
				}
				$this->new_height = floor($height);
						
				$this->resampimagejpg();
			}
			else
			{
			$C=	copy($this->source_path,$this->destination_path.$this->newfilename);
			}	
								
		}
	}
				
	public function thumb_jpeg()
	{		
		$destimg=imagecreatetruecolor($this->new_width,$this->new_height) or die("Problem In Creating image");
		$srcimg=ImageCreateFromJPEG($this->source_path) or die("Problem In opening Source Image");
		$imageheight= ImageSX($srcimg);
		ImageCopyResized($destimg,$srcimg,0,0,0,0,$this->new_width,$this->new_height,ImageSX($srcimg),ImageSY($srcimg)) or die("Problem In resizing");
		ImageJPEG($destimg,$this->destination_path.$this->newfilename) or die("Problem In saving");
		return true;
	}
	
	public function resampimagejpg()
	{
	    $fw = $this->new_width;
		$fh = $this->new_height;
		
		$is = getimagesize($this->source_path);
		if($fw==$this->new_width)
		{
		  $iw=$fw;
		  $ih=$fh;
		  $t = 1;
		}
		 
		if ( $t == 1 )
		{
			if($this->ext == 'jpg' || $this->ext == 'jpeg' || $this->ext == 'JPEG' || $this->ext == 'JPG')
			{
			   $img_src = imagecreatefromjpeg($this->source_path );
		   }
		   elseif($this->ext=="gif" || $this->ext=="GIF")
		   {
			 $img_src = imagecreatefromgif($this->source_path);
		   }
		   elseif($this->ext =="png" || $this->ext =="PNG")
		   {
			 $img_src = imagecreatefrompng($this->source_path);
		   }
		   
			$img_dst = imagecreatetruecolor( $iw, $ih );
			imagecopyresampled( $img_dst, $img_src, 0, 0, 0, 0, $iw, $ih, $is[0], $is[1] );
			
			if($this->ext == 'jpg' || $this->ext == 'jpeg' || $this->ext == 'JPEG' || $this->ext == 'JPG')
			{
			  imagejpeg( $img_dst, $this->destination_path.$this->newfilename, 100 );
		   }
		   elseif($this->ext=="gif" || $this->ext=="GIF")
		   {
			 imagegif( $img_dst, $this->destination_path.$this->newfilename, 9);
		   }
		   elseif($this->ext =="png" || $this->ext =="PNG")
		   {
			 imagepng($img_dst, $this->destination_path.$this->newfilename, 9 );
		   }
			
		}
		else if ( $t == 2 )
		{
			copy($this->source_path, $this->destination_path.$this->newfilename );
		}
	
	}	

}
?>