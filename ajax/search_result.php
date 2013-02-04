<?php
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');



extract($_POST);
//$test = $_POST;

if($txt == "Search..." || $txt == " "){
	$txt = "";
}

$expr_arr = json_decode($expr);	//---- TO DO
$emp_arr = json_decode($emp);
$edu_arr = json_decode($edu);
$job_arr = json_decode($job);
$txt_str = $txt;
$txt_arr = explode(" ", $txt_str);


/*echo"<pre>";
print_r($expr_arr);
print_r($emp_arr);
print_r($edu_arr);
print_r($job_arr);*/


//$master_adv_arr = array();
//$master_pro_arr = array();


if(!empty($expr_arr)){
	$expr_str = implode(", ", $expr_arr);
	$objExp = new User();
	$table = "advisor_expertise";
	$where = " where area_service_id in (".$expr_str.") or expertise_cat_id in (".$expr_str.")";
	$objExp->retrieve_data_from_table($table,$where);
	while($temp = $objExp->getAllRow()){
		$adv_id_exp[] = $temp['advisor_id'];
	}
	
	$objCatPro = clone $objExp;
	$table = "product_category";
	$where = " where `cat_id` in (".$expr_str.")";
	$objCatPro->retrieve_data_from_table($table,$where);
	while($temp = $objCatPro->getAllRow()){
		$pro_id_cat[] = $temp['product_id'];
	}

}

if(!empty($emp_arr)){
	for($i=0;$i<count($emp_arr);$i++){
		$emp_arr[$i] = "'%".$emp_arr[$i]."%'";
	}
	$emp_str = implode(" OR employer LIKE ", $emp_arr);
	$objEmp = new User();
	$table = "advisor_experience";
	$where = " where employer LIKE ".$emp_str;
	$objEmp->retrieve_data_from_table($table,$where);
	while($temp = $objEmp->getAllRow()){
		$adv_id_emp[] = $temp['advisor_id'];
	}
}

if(!empty($edu_arr)){
	
	for($i=0;$i<count($edu_arr);$i++){
		$edu_arr[$i] = "'%".$edu_arr[$i]."%'";
	}
	$edu_str = implode(" OR school LIKE ", $edu_arr);
	$objEdu = new User();
	$table = "advisor_education";
	$where = " where school LIKE ".$edu_str;
	$objEdu->retrieve_data_from_table($table,$where);
	while($temp = $objEdu->getAllRow()){
		$adv_id_edu[] = $temp['advisor_id'];
	}
}

if(!empty($job_arr)){
	
	for($i=0;$i<count($job_arr);$i++){
		$job_arr[$i] = "'%".$job_arr[$i]."%'";
	}
	$job_str = implode(" OR title LIKE ", $job_arr);
	$objJob = new User();
	$table = "advisor_experience";
	$where = " where title LIKE ".$job_str;
	$objJob->retrieve_data_from_table($table,$where);
	while($temp = $objJob->getAllRow()){
		$adv_id_job[] = $temp['advisor_id'];
	}
}

if(!empty($txt_arr)){
	
	for($i=0;$i<count($txt_arr);$i++){
		$txt_arr[$i] = "'%".$txt_arr[$i]."%'";
	}
	$txt_str = implode(" OR title LIKE ", $txt_arr);
	$objTxt = new User();
	$table = "advisor_experience";
	$where = " where title LIKE ".$txt_str;
	$objTxt->retrieve_data_from_table($table,$where);
	while($temp = $objTxt->getAllRow()){
		$adv_id_txt[] = $temp['advisor_id'];
	}
	
	$txt_str = implode(" OR school LIKE ", $txt_arr);
	$table = "advisor_education";
	$where = " where school LIKE ".$txt_str;
	$objTxt->retrieve_data_from_table($table,$where);
	while($temp = $objTxt->getAllRow()){
		if(!in_array($temp['advisor_id'])){
			$adv_id_txt[] = $temp['advisor_id'];
		}
	}
	
	$txt_str = implode(" OR employer LIKE ", $txt_arr);
	$objTxt = new User();
	$table = "advisor_experience";
	$where = " where employer LIKE ".$txt_str;
	$objTxt->retrieve_data_from_table($table,$where);
	while($temp = $objTxt->getAllRow()){
		if(!in_array($temp['advisor_id'], $adv_id_txt)){
			$adv_id_txt[] = $temp['advisor_id'];
		}
	}
	
	$txt_str = implode(" OR first_name LIKE ", $txt_arr);
	$objTxt = new User();
	$table = "advisor_details";
	$where = " where first_name LIKE ".$txt_str;
	$objTxt->retrieve_data_from_table($table,$where);
	while($temp = $objTxt->getAllRow()){
		if(!in_array($temp['advisor_id'], $adv_id_txt)){
			$adv_id_txt[] = $temp['advisor_id'];
		}
	}
	
	$txt_str = implode(" OR last_name LIKE ", $txt_arr);
	$objTxt = new User();
	$table = "advisor_details";
	$where = " where last_name LIKE ".$txt_str;
	$objTxt->retrieve_data_from_table($table,$where);
	while($temp = $objTxt->getAllRow()){
		if(!in_array($temp['advisor_id'], $adv_id_txt)){
			$adv_id_txt[] = $temp['advisor_id'];
		}
	}
	
	$txt_str = implode(" OR degree LIKE ", $txt_arr);
	$objTxt = new User();
	$table = "advisor_education";
	$where = " where degree LIKE ".$txt_str;
	$objTxt->retrieve_data_from_table($table,$where);
	while($temp = $objTxt->getAllRow()){
		if(!in_array($temp['advisor_id'], $adv_id_txt)){
			$adv_id_txt[] = $temp['advisor_id'];
		}
	}
	
}



if(!empty($expr_arr)){
	$adv_id_arr[]  = $adv_id_exp;
}

if(!empty($emp_arr)){
	$adv_id_arr[]  = $adv_id_emp;
}
if(!empty($edu_arr)){
	$adv_id_arr[]  = $adv_id_edu;
}
if(!empty($job_arr)){
	$adv_id_arr[]  = $adv_id_job;
}

if(!empty($txt_arr)){
	$adv_id_arr[]  = $adv_id_txt;
}

//echo "adv_id_emp===>";print_r($adv_id_emp);echo"<br>";
//echo "adv_id_job===>";print_r($adv_id_job);echo"<br>";
//echo "adv_id_edu===>";print_r($adv_id_edu);echo"<br>";
//echo "adv_id_txt===>";print_r($adv_id_txt);echo"<br>";

for($i=0;$i<count($adv_id_arr);$i++){
	if($i == 0){
		$out = $adv_id_arr[$i];
	}
	else{
		$out = array_intersect($out, $adv_id_arr[$i]);
	}
		
}

if(!empty($out)){

$objAdv = new User();
$objAdvWE = clone $objAdv;
$objAdvExpr = clone $objAdv;
$objAdvEdu = clone $objAdv;
$objAdvCat = clone $objAdv;
$objPro = clone $objAdv;
$adv_tab = "advisor_details";
$pro_tab = "product";




	$out_str = implode(", ", $out);
	
	$where = " where `advisor_status` = 'Active' and `verified` = 'Yes' and `advisor_id` in (".$out_str.")";
	$objAdv->retrieve_data_from_table($adv_tab, $where);
	while($tempAdv = $objAdv->getAllRow()){
	$tempAdv['priceEmailConsulte'] = floor($tempAdv['priceEmailConsulte']);
	$tempAdv['priceWebConsulte'] = floor($tempAdv['priceWebConsulte']);
	$var_image_advisor = trim($tempAdv['image_path']);
	#@~:
	if($var_image_advisor==""){
		$tempAdv['image_path'] = "user-comment.png";
	}

	#Action:: For Take a advisor_experience from Data base:
	$objAdvWE->retrieve_data_from_table("advisor_experience"," where `advisor_id` ='".$tempAdv['advisor_id']."' order by `time_period_to` DESC limit 1");
	$workExp = $objAdvWE->getAllRow();
	$tempAdv['title'] = $workExp['title'];
	$tempAdv['employer'] = $workExp['employer'];
	
	#Action:: For Take a advisor_expertise from Data base:	
	$objAdvExpr->retrieve_data_from_table("advisor_expertise"," where `advisor_id` ='".$tempAdv['advisor_id']."' order by RAND() limit 1");
	$expr = $objAdvExpr->getAllRow();

	if(!empty($expr)){
		#Action:: For Take a category from Data base for expertise_cat_id:	
		$objAdvCat->retrieve_data_from_table("category"," where `cat_id` =".$expr['expertise_cat_id']);
		$cat = $objAdvCat->getAllRow();
		#@~:
		$tempAdv['cat_name'] = $cat['cat_name'];
		
		#Action:: For Take a advisor_expertise from Data base for area_service_id:	
		$objAdvCat->retrieve_data_from_table("category"," where `cat_id` =".$expr['area_service_id']);
		$cat1 = $objAdvCat->getAllRow();
		#@~:
		$tempAdv['area_name'] = $cat1['cat_name'];
	}
	
	#Action:: For Take a advisor_education from Data base by advisor_id:	
	$objAdvEdu->retrieve_data_from_table("advisor_education"," where `advisor_id` ='".$tempAdv['advisor_id']."' order by `graduation_year` DESC limit 1");
	$edu = $objAdvEdu->getAllRow();
	#@~:
	$tempAdv['school'] = $edu['school'];
	$tempAdv['degree'] = $edu['degree'];
	

	
	
	#@~:Final Arr:
	$adv[] = $tempAdv;
	}
	
	$where = " where `status` = 'active' and `advisor_id` in(".$out_str.")";
	$objPro->retrieve_data_from_table($pro_tab, $where);
	while($tempPro = $objPro->getAllRow()){
			$pro_id_from_adv[] = $tempPro['advisor_id'];
			$pro[] = $tempPro;
	 }

}

if(!empty($pro_id_cat)){
	$objProDis = new User();
	$pro_tab = "product";
	$pro_id_cat_str = implode(", ", $pro_id_cat);
	$w1 = " where `status` = 'active' and `product_id` in (".$pro_id_cat_str.")";
	if(!empty($pro_id_from_adv)){
		$tempstr = implode(",", $pro_id_from_adv);
		$where2 = " and `product_id` not in (".$tempstr.")";
	}else{ $w2 = ""; }
	
	$where = $w1.$w2;
	$objProDis->retrieve_data_from_table($pro_tab, $where);
	while($tempPro = $objProDis->getAllRow()){
			$pro[] = $tempPro;
	 }
}
//-------------------------------------------------------DISPLAY RESULTS--------------------------------------------------------------------------------------

//echo "<pre>";
//print_r($out);

    echo '<div class="advisor_part1"><h1>Advisors</h1>';
	
	foreach($adv as $i){
		echo "<div class='product_cat_main'> <a href='".site_path."view-advisor-profile/".$i['advisor_id']."'>
          <div class='cat_profile_lt'>
            <div class='cat_profile_otr'>
              <div class='profile_lt'> <img src='".site_path."front_media/images/advisor_images/180X180px/".$i['image_path']."'> </div>
              <div class='profile_rt'>
                <div class='profile_rt_titl'>".$i['first_name']."</div>
                <div class='profile_rt_position'>".$i['title']." at ".$i['employer']."</div>
                <div class='profile_rt_rating'>
                  <div id='17' style='cursor: default;' title='good'><img class='17' title='good' alt='1' src='".site_path."front_media/images/star-on.png' id='17-1'>&nbsp;<img class='17' title='good' alt='2' src='".site_path."front_media/images/star-on.png' id='17-2'>&nbsp;<img class='17' title='good' alt='3' src='".site_path."front_media/images/star-on.png' id='17-3'>&nbsp;<img class='17' title='good' alt='4' src='".site_path."front_media/images/star-on.png' id='17-4'>&nbsp;<img class='17' title='good' alt='5' src='".site_path."front_media/images/star-off.png' id='17-5'> </div>
                </div>
              </div>
            </div>
            <div class='profile_time'>
              <ul>
                <li>$".$i['priceEmailConsulte']."/hr<span>|</span></li>
                <li>$".$i['priceWebConsulte']."<span>|</span></li><!-- class='credit_img' -->
                <li>3 consultatDummy</li>
              </ul>
            </div>
            <div class='profile_head_otr'>
              <div class='profile_head_one'> ".$i['area_name']."  <span>".$i['cat_name']."</span> </div>
              <div class='profile_head_two'> ".$i['school']." - ".$i['degree']." </div>
            </div>
          </div>
          </a>  </div>";
	}
	if(!empty($adv)){
		echo "No Advisors here using different filters.";
	}
      
	 echo "</div>  <div class='product_part1'><h1>Products</h1>";
	 foreach($pro as $i){
		 echo "<a href='".site_path."product-details/".$i['product_id']."'><div class='product_one_video'><div class='pro_head'> ".$i['name']." </div>";
                    if($i['combination'] == 'video'){ echo "<img src='".site_path."front_media/images/video-icon.png'  />"; }
                    if($i['combination'] == 'videoppt'){ echo "<img src='".site_path."front_media/images/ppt.png'  />"; }
                    if($i['combination'] == 'audioppt'){ echo "<img src='".site_path."front_media/images/audio.png'  />"; }
                echo "</div></a>";
	}
	echo "</div>";


//---------------------------------------------------------------------------------------------------------------------------------------------


?>