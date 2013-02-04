<?php
/* ############################################################ Diwakar1.0 ################################################################### */
require_once('../../pi_classes/Admin.php');
	$objPayDtl=new Admin();
	$objPayDtl->getPaymentDtl($_REQUEST['booking_id'],$_REQUEST['user_id']);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gift-Cats</title>
<style type="text/css">
.cell
{
	background:#30B0C8;
	width:500px;
	color:#FFFFFF;
	font-size:15px;
}
</style>
</head>
<body>
<form method="post" name="payment_form" id="payment_form" action="" >
<table>	
<tr>
    <td class="cell">Activity Name</td>
    <td class="cell">Subactivity Name</td>
    <td class="cell">Percentage Commision</td>
    <td class="cell">Commision</td>
    <td class="cell">Paid to supplier</td>
</tr>
<?php
$total_comminsion=0;
$total_to_pay=0;

while($objPayDtl->getRow())
{
	$objgetCurr=clone $objPayDtl;
	$objgetCurr->getCurrSymbol($objPayDtl->getField('activity_currency'));
	$objgetCurr->getAllRow();
	$currecy_symbol=$objgetCurr->getField('currency_symbol');
	
	$total_comminsion+=$objPayDtl->getField('commision_in_NZD');
	$total_to_pay+=$objPayDtl->getField('paid_to_supplier_in_NZD');
?>
  <tr>
    <td><?php echo $objPayDtl->getField('activity_name'); ?></td>
    <td><?php echo $objPayDtl->getField('sub_activity_name'); ?></td>
    <td><?php echo $objPayDtl->getField('commission_in_percentage')."%"; ?></td>
    <td><?php echo $currecy_symbol.$objPayDtl->getField('commision_in_ACT')." ".$objPayDtl->getField('activity_currency'); ?> / <?php echo "$".$objPayDtl->getField('commision_in_NZD')."NZD"; ?></td>
    <td><?php echo $currecy_symbol.$objPayDtl->getField('paid_to_supplier_in_ACT')." ".$objPayDtl->getField('activity_currency'); ?> / <?php echo "$".$objPayDtl->getField('paid_to_supplier_in_NZD')."NZD"; ?></td>
 </tr>
    <?php
}
?>
<tr>
    <td></td>
    <td></td>
    <td><font color="#FF0000">Total</font></td>
    <td><font color="#FF0000"><?php echo "$".$total_comminsion."NZD" ?></font></td>
    <td><font color="#FF0000"><?php echo "$".$total_to_pay."NZD" ?></font></td>
 </tr>

</table>
</form>
</body>
</html>