<?php
require_once("../../pi_classes/commonSetting.php");
require_once("../../pi_classes/Admin.php");

/* Getting the all supplier List*/
$custObj=new Admin();
$arrSearch = array();
$custObj->getRecordListofUser();
$userCnt = $custObj->getCount();
$arrUser=array();
$allFields=true;
if($userCnt>0)
{
	while($temp=$custObj->getAllRow($allFields))
	{
		$arrSearch[$temp['email']." (".$temp['first_name']." ".$temp['last_name'].")"]=$temp['email'];
	}
}
$q = strtolower($_GET["term"]);
if (!$q) return;
function array_to_json( $array ){

    if( !is_array( $array ) ){
        return false;
    }

    $associative = count( array_diff( array_keys($array), array_keys( array_keys( $array )) ));
    if( $associative ){

        $construct = array();
        foreach( $array as $key => $value ){

            // We first copy each key/value pair into a staging array,
            // formatting each key and value properly as we go.

            // Format the key:
            if( is_numeric($key) ){
                $key = "key_$key";
            }
            $key = "\"".addslashes($key)."\"";

            // Format the value:
            if( is_array( $value )){
                $value = array_to_json( $value );
            } else if( !is_numeric( $value ) || is_string( $value ) ){
                $value = "\"".addslashes($value)."\"";
            }

            // Add to staging array:
            $construct[] = "$key: $value";
        }

        // Then we collapse the staging array into the JSON form:
        $result = "{ " . implode( ", ", $construct ) . " }";

    } else { // If the array is a vector (not associative):

        $construct = array();
        foreach( $array as $value ){

            // Format the value:
            if( is_array( $value )){
                $value = array_to_json( $value );
            } else if( !is_numeric( $value ) || is_string( $value ) ){
                $value = "'".addslashes($value)."'";
            }

            // Add to staging array:
            $construct[] = $value;
        }

        // Then we collapse the staging array into the JSON form:
        $result = "[ " . implode( ", ", $construct ) . " ]";
    }

    return $result;
}

$result = array();
foreach ($arrSearch as $key=>$value) {
	if (strpos(strtolower($key), $q) !== false) {
		array_push($result, array("id"=>$value, "label"=>$key, "value" => strip_tags($value)));
	}
	if (count($result) > 11)
		break;
}
echo array_to_json($result);

?>