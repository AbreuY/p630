<?php
/* ############################################################ Diwakar1.0 ################################################################### */

	require_once('../../pi_classes/Admin.php');
	ob_start();
	session_start();
	$objActi=new Admin();
	
	if(isset($_POST['addtocart']))
	{		
			$objActi->addtogift($_POST);	
			echo '<script type="text/javascript">parent.window.hs.close();</script>';
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gift-Cats</title>
<style type="text/css">
.blue_btn {
    background: -moz-linear-gradient(#088BAC, #0E9DC0) repeat scroll 0 0 transparent;
 border: medium none;
    border-radius: 5px 5px 5px 5px;
    box-shadow: 0 2px 3px #666666;
    color: #FFFFFF;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    height: 32px;
    line-height: 32px;
    margin-left: 130px;
    padding: 0 10px;
    position: relative;
    text-shadow: 0.1em 0.1em 0.05em #13617F;
    width: 140px;
}
</style>
</head>

<body style="color: #0994B3;font-family: arial; font-size:20px;">
<?php
	$objActi->getGiftcat();
	$obj = clone $objActi;
	$obj->getSelectedgifts($_GET['act_id']);
	while($obj->getAllRow())
	{
		$sel[] = $obj->getField('gift_type_id');
	}
?>
<form method="post" name="giftform" id="giftform" action="" >
<input type="hidden" value="<?php echo $_GET['act_id']; ?>" name="act_id" />
<table>	
<tr><td colspan="2" bgcolor="#30B0C8" width="300px"><b style=" color:#FFF;">&nbsp;Gift Category</b></td><td bgcolor="#30B0C8"><b style="color:#FFF;">&nbsp;Select&nbsp;&nbsp;</b></td></tr>
<tr><td></td><td></td><td></td></tr>
<?php
	while($objActi->getAllRow())
	{
		$id = $objActi->getField('gift_type_id');
?><tr><td><img src="../../images/gift-gray.png"  /></td><td>
<?php	echo $objActi->getField('gift_type_name'); ?>
</td><td>
<input type="checkbox" name="cat[]" value="<?php echo $id; ?>" <?php if (in_array($id, $sel)) {echo 'checked="checked"';} ?> />
</td></tr> 
<?php	
	}
?>
</table>
<input type="submit" name="addtocart" value="Done" class="blue_btn" />
</form>
</body>
</html>