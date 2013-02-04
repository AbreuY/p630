<?php

#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');

#Objects
	$objUser = new User();
		
extract($_POST);
//echo"<pre>";print_r($_POST);die;

$mon = array();
$tue = array();
$wed = array();
$thur = array();
$fri = array();
$sat = array();
$sun = array();

#GetData~~~advisor~~~Availibility:
	#clone:
	$objAvail = clone $objUser;
	$objAvail->retrieve_data_from_table("advisor_availability", " where `advisor_id` = ".$aid);
	for($i=0;$TempAv =  $objAvail->getAllRow();$i++){
		$AvailArr[] = $TempAv;
		$mon[] = $TempAv['monday'];
		$mon[] = $TempAv['monday'];
		$tue[] = $TempAv['tuesday'];
		$tue[] = $TempAv['tuesday'];
		$wed[] = $TempAv['wednesday'];
		$wed[] = $TempAv['wednesday'];
		$thur[] = $TempAv['thursday'];
		$thur[] = $TempAv['thursday'];
		$fri[] = $TempAv['friday'];
		$fri[] = $TempAv['friday'];
		$sat[] = $TempAv['saturday'];
		$sat[] = $TempAv['saturday'];
		$sun[] = $TempAv['sunday'];
		$sun[] = $TempAv['sunday'];
	}
$master_org = array_merge($mon,$tue,$wed,$thur, $fri, $sat, $sun);
$offset = $offset * 2;
$atz = $atz * 2;

$new_off = $offset - $atz;

$master = array();
for($j=0;$j<336;$j++){
	$new = $j+$new_off;
	if($new<0){
		$new = 336 + $new;
	}
	elseif($new>335){
		$new = $new - 336;
	}
	$master[$new] = $master_org[$j];
}
//echo"<pre>";print_r($master);die;


echo "<tr>
        <th></th>
        <th colspan='12'>AM</th>
        <th><img src='".site_path."front_media/images/clock.png' alt='12 PM'></th>
        <th colspan='11'>PM</th>
      </tr>";
	  
	  
	 echo "<tr class='shadlue_bg'>
        <th></th>
        <th class='verticaltext'>12<br>
          <span class='daytime'>AM</span></th>
        <th class='verticaltext'>1</th>
        <th class='verticaltext'>2</th>
        <th class='verticaltext'>3</th>
        <th class='verticaltext'>4</th>
        <th class='verticaltext'>5</th>
        <th class='verticaltext'>6</th>
        <th class='verticaltext'>7</th>
        <th class='verticaltext'>8</th>
        <th class='verticaltext'>9</th>
        <th class='verticaltext'>10</th>
        <th class='verticaltext'>11</th>
        <th class='verticaltext'>12<br>
          <span class='daytime'>PM</span></th>
        <th class='verticaltext'>1</th>
        <th class='verticaltext'>2</th>
        <th class='verticaltext'>3</th>
        <th class='verticaltext'>4</th>
        <th class='verticaltext'>5</th>
        <th class='verticaltext'>6</th>
        <th class='verticaltext'>7</th>
        <th class='verticaltext'>8</th>
        <th class='verticaltext'>9</th>
        <th class='verticaltext'>10</th>
        <th class='verticaltext'>11</th>
      </tr>";


  for($i=0;$i<7;$i++){
      if($i == 0){
      	$day ="MONDAY";
	  }
      elseif($i == 1){
      	$day ="TUESDAY";
	  }
	   elseif($i == 2){
      	$day ="WEDNESDAY";
	  }
	   elseif($i == 3){
      	$day ="THURSDAY";
	  }
	   elseif($i == 4){
      	$day ="FRIDAY";
	  }
	   elseif($i == 5){
      	$day ="SATURDAY";
	  }
	   elseif($i == 6){
      	$day ="SUNDAY";
	  }
      echo "<tr id='day_01'>";
       echo "<th align='left' style='padding-right: 10px;' class='week_name'>".$day."</th>";
        for($k=($i*48);$k<(($i*48)+48);$k=($k+2)){
        echo "<td><div ";
		if($master[$k] == "No"){
			echo " class='left_para'"; 
		}
		else{
			echo " class='left_para tile_bg'";
		}
		echo " >&nbsp;</div>";
		
         echo "<div ";
		if($master[$k+1] == "No"){
			 echo " class='right_para' ";
		}
		else{
			echo " class='right_para tile_bg' ";
		}
		echo " >&nbsp;</div></td>";
         } 
      echo"</tr>";
     }

?>