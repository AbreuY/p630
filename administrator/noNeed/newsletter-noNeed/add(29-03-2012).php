<?php
require_once("../../pi_classes/commonSetting.php");

chkAdminLogin($_SESSION['adminID']);

require_once("../../pi_classes/class.newsletter.php");
include_once("../../fckeditor/fckeditor.php");

$adminname=$_SESSION['admin_name'];
$adminid=$_SESSION['admin_Id'];
$user=new newsletter();

//For uploading image

extract($_GET);
extract($_POST);
	
if(isset($_GET['edit_id']) || $_GET['edit_id']!='')
{
	$news_id=$_GET['edit_id'];
	$result=$user->getRecordById($news_id);
	$num_chk=$user->getCount();
}


if($_POST['btnSubmit']!="")
{
	if($_POST['edit_id']!='')
	{		
		$set_fields="`title`='".$title."', `content`='".$content."', `modified_on`='".date("Y-m-d")."'";

		$where_field="`id`=".$_POST['edit_id'];
		$rs=$user->updateRecord($set_fields, $where_field);
		$_SESSION['msg']="<span class='success'>Newsletter updated successfully!</span>";	
	}
	else
	{
		//echo "<pre>"; print_r($_POST); exit;
		$fields="`title`,`content`, `created_on`, `modified_on`";
		$values="'".$title."', '".$content."', '".date("Y-m-d")."', '".date("Y-m-d")."'";
		$cnf=$user->insertRecord($fields,$values);			
	
		$_SESSION['msg']="<span class='success'>Newsletter added successfully!</span>";	
	}
//	exit;
	header("location:list.php");
}

include_once("../header1.php");
?>

<script type="text/javascript" language="javascript">

$(document).ready(function(){
	//alert("Hello");
	jQuery("#frmRegister").validate({
		 errorElement:'div',
		 rules: {	 
			title:{
				required: true,
				minlength: 2,
				maxlength: 80
			}
		},
		messages: {
			title:{
				required: "Please enter title",
				minlength: jQuery.format("Please enter at least {0} characters"),
				maxlength: jQuery.format("Please enter at most {0} characters")
			}
		},
		// set this class to error-labels to indicate valid fields
		success: function(label) {
		// set &nbsp; as text for IE
			label.hide();
		}
	});

});

</script>

<? include_once("../header2.php"); ?>
<table cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
    <TD class="admintopcaption" ><? if(isset($_GET['edit_id']) || $_GET['edit_id']!='')
{ echo "Edit"; }else{ echo "Add"; }?> Newsletter</TD>
</TR>
<TR>
    <TD  class="adminpanelheader"><!--Update User - Registered: 2009-11-04--></TD>

</TR>
</TABLE>
<FORM name="frmRegister" id="frmRegister" action="" method="POST" enctype="multipart/form-data">

	<input type="hidden" name="edit_id" value="<?php echo $_GET['edit_id']; ?>">
	<? if($msg != ''){ ?>
	<div align="center"><? echo $msg; ?></div>
	<? } ?>
	<br><br>

<table cellpadding="5px" width="100%">
	
			<tr>
				<td valign="top" width="10%">Title : </td>
				<td>
					<input type="text" dir="ltr" class="FETextInput" name="title" value="<? echo $user->getField('title'); ?>" size="80"  maxlength="255">
				</td>
			</tr>
			
					
	
		
	<tr>		
		<td valign="top" width="10%">Content : </td>
		<td>
		<?php
			if($num_chk) { $content = $user->getField('content'); }	
			$sBasePath = "../../fckeditor/";
			$oFCKeditor = new FCKeditor("content");
			$oFCKeditor->BasePath = $sBasePath;
			$oFCKeditor->ToolbarSet ="Default";
			$oFCKeditor->Value = $content;
			$oFCKeditor->Width=600;
			$oFCKeditor->Height=300;
			$oFCKeditor->Create();
		?>
		</td>
	</tr>

		
	<tr>
	<td>&nbsp;</td>
	<td>
		<input type="SUBMIT" value="Submit" name="btnSubmit" class="btn3">
	</td>
	</tr>	
	</table>
	
</FORM>
<? include_once("../footer.php"); ?>