<?php
#RequiresFiles:
	require_once('../../pi_classes/commonSetting.php');
	require_once('../../pi_classes/Admin.php');
#Redirect:
		chkAdminLogin();
#Objects:
	$objAdmin = new Admin();

#Action:
	#GetAdvisorWorkedExperience:
	$objAdvExp = clone $objAdmin;
	#prameter:
	$setColoumFields = "*";
	$tableName 		 = "advisor_experience";
	$whereField 	 = "`advisor_id` = '".base64_decode($_GET['advisorId'])."' ";
	$objAdvExp->GET_ANYRECORD_FROM_TABLE($setColoumFields,$tableName,$whereField);
	$numOfAdvExp 	 = $objAdvExp->numofrows();
 	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IN ADMIN PANEL | Powered by <?php echo AbstractDB::SITE_TITLE;?></title>

<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>administrator/css/layout.css" type="text/css" media="screen" />

<!--[if lt IE 9]>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>administrator/css/ie.css" type="text/css" media="screen" />
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery-1.7.1.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/hideshow.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery.validate.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery.livequery.js"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/password_strength_plugin.js"  language="javascript" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>calender/js/ui.core.js"></script> 
<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>calender/js/ui.datepicker.js"></script>	
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.all.css" rel="stylesheet" /> 
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.theme.css" rel="stylesheet" /> 
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.core.css" rel="stylesheet" /> 
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.datepicker.css" rel="stylesheet" /> 
<!--/Start::JToolTip/-->
<!--<link type="text/css" href="<?php//echo AbstractDB::SITE_PATH;?>front_media/js/jqrytooltip/css/global.css" rel="stylesheet" /> 
<script type="text/javascript" src="<?php//echo AbstractDB::SITE_PATH;?>front_media/js/jqrytooltip/js/jtip.js"></script>	-->
<!--/End::JToolTip./-->
</head>
<body>
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>	
	<section id="main" class="column">	
	    <?php if(isset($_SESSION['msg']['delete'])){ ?>
		<h4 class="alert_success">Record deleted successfully!</h4>
		<?php unset($_SESSION['msg']['delete']); } ?>	
		<?php if(isset($_SESSION['msg']['added'])){ ?>
			<h4 class="alert_success">Record added successfully!</h4>
		<?php unset($_SESSION['msg']['added']); } ?>	
		<?php if(isset($_SESSION['msg']['updated'])){ ?>
			<h4 class="alert_success">Record updated successfully!</h4>
		<?php 
			unset($_SESSION['msg']['updated']);
		} ?>		
		<form name="frmEditAdvisorWrkExprnce" id="frmEditAdvisorWrkExprnce" method="post" action="edit_advisor_action.php" >
		<input type="hidden" name="advisor_id" id="advisor_id" value="<?php echo base64_decode($_REQUEST['advisorId']);?>" />
		<article class="module width_full">
			<?php 
				$pageName = "workExperienceInfo";
				include("../supplier_menu.php");
			?>
			<header>
				<div style="float: left;padding: 5px 0 0 20px;">
					<a href="<?php echo AbstractDB::SITE_PATH;?>administrator/user_management/manage_advisor.php" title="Go back">
                    <img src="../images/back_icon2.png" border="0" /></a>
				</div>
			</header>
				<div class="module_content">
						<fieldset>
							<span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
						</fieldset>
                  	<div class="JobExperience">
					 <?php 
					 $lp = "1"; 
					 while($advExpRow = $objAdvExp->getAllRow()){ ?>  
					 <?php if($lp>=2){?>
                     <div class="edu1 dynamicMod"><fieldset><a href="#" title="Remove" class="removeMod">Remove</a>
					 <?php }else{?>
                     <div class="edu1">
                     <?php }?>
                        <fieldset>
                            <fieldset style="width:48%; float:left; margin-right: 3%;">
                                <label>Employer<sup style="color:#FF0000;font-weight:bold;">*</sup>
                                <!--<span class="formInfo"><a href="<?//=site_path?>front_media/js/jqrytooltip/adv_wrk_exp/employer.htm?width=375" 
                                class="jTip" id="one" name="Employer:">?</a>
                                </span>--></label>
                                <input type="text" name="employerField[]" id="employerField<?=$lpB;?>"  value="<?=$advExpRow['employer'];?>" style="width:92%;"/>
                            </fieldset>
                            <fieldset style="width:48%; float:left;"> 	 
                                <label>Title<sup style="color:#FF0000;font-weight:bold;"></sup>
                                <!--<span class="formInfo"><a href="<?//=site_path?>front_media/js/jqrytooltip/adv_wrk_exp/title.htm?width=375" 
                                class="jTip" id="two" name="Titel:">?</a></span>--></label>
                                <input type="text" name="titleField[]" id="titleField<?=$lpB;?>" value="<?=$advExpRow['title'];?>" style="width:92%;" />
                            </fieldset>
                            <fieldset style="width:48%; float:left; margin-right:3%;">
                            <label>Office country<sup style="color:#FF0000;font-weight:bold;"></sup><!--In which country was/is your office?--></label>
                                <?php
                                    #clone:
                                    $objCountry = clone $objAdmin;	
                                    $objCountry->getAllCountry();
                                ?>
                                <select name="officeCountry[]" id="officeCountry<?=$lpB;?>" style="width:92%;">
                                    <?php while($fieldsCountry = $objCountry->getAllRow()){?>
                                    <option value="<?=$fieldsCountry['id'];?>" <? if($advExpRow['office_country_id']==$fieldsCountry['id']){?> 
                                    selected="selected" <? }?> >
                                    <?= ucwords($fieldsCountry['country_name']);?>
                                    </option>
                                    <?php }?>
                                </select>
                            </fieldset>
                            
                           <!-- <fieldset style="width:48%; float:left; ">
                            <label>State/Province<sup style="color:#FF0000;font-weight:bold;"></sup></label>
                                <select name="stateProvinceId[]" id="stateProvinceId<?=$lpB;?>" style="width:20%;">
                                <option value="">Select--<?=$advExpRow['state_province_id'];?></option>
                                <option value="2" selected="">AK</option>
                                <option value="1">AL</option>
                                <option value="5">AR</option>
                                <option value="3">AS</option>
                                <option value="4">AZ</option>
                                <option value="6">CA</option>
                                <option value="7">CO</option>
                                <option value="8">CT</option>
                                <option value="10">DC</option>
                                <option value="9">DE</option>
                                <option value="12">FL</option>
                                <option value="11">FM</option>
                                <option value="13">GA</option>
                                <option value="14">GU</option>
                                <option value="15">HI</option>
                                <option value="19">IA</option>
                                <option value="16">ID</option>
                                <option value="17">IL</option>
                                <option value="18">IN</option>
                                <option value="20">KS</option>
                                <option value="21">KY</option>
                                <option value="22">LA</option>
                                <option value="26">MA</option>
                                <option value="25">MD</option>
                                <option value="23">ME</option>
                                <option value="24">MH</option>
                                <option value="27">MI</option>
                                <option value="28">MN</option>
                                <option value="30">MO</option>
                                <option value="40">MP</option>
                                <option value="29">MS</option>
                                <option value="31">MT</option>
                                <option value="38">NC</option><option value="39">ND</option><option value="32">NE</option><option value="34">NH</option><option value="35">NJ</option><option value="36">NM</option><option value="33">NV</option><option value="37">NY</option><option value="41">OH</option><option value="42">OK</option><option value="43">OR</option><option value="45">PA</option><option value="46">PR</option><option value="44">PW</option><option value="47">RI</option><option value="48">SC</option><option value="49">SD</option><option value="50">TN</option><option value="51">TX</option><option value="52">UT</option><option value="55">VA</option><option value="54">VI</option><option value="53">VT</option><option value="56">WA</option><option value="58">WI</option><option value="57">WV</option><option value="59">WY</option></select>
                            </fieldset>-->
                         
                            <fieldset style="width:48%; float:left;"><!-- margin-right: 3%;-->
                                <label>Office city<sup style="color:#FF0000;font-weight:bold;"></sup><!--In which city was/is your office?--></label>
                                <input type="text" name="officeCity[]" id="officeCity<?=$lpB;?>" value="<?=$advExpRow['office_city'];?>" style="width:92%;"/>
                            </fieldset>
                            <div class="clear"></div>
                            <!--<fieldset style="width:48%; float:left;margin-right: 3%;">
                                <label>Industry<sup style="color:#FF0000;font-weight:bold;"></sup></label><?=$advExpRow['industry_id'];?>
                                <select name="industryField[]" id="industryField<?=$lpB;?>" style="width:92%;" >
                                <option value="">Select</option>
                                <option value="1">Accounting</option>
                                <option value="2">Airlines/Aviation</option>
                                <option value="3">Alternative Dispute Resolution</option>
                                <option value="4">Alternative Medicine</option>
                                <option value="5">Animation</option>
                                <option value="6">Apparel &amp; Fashion</option>
                                <option value="7">Architecture &amp; Planning</option>
                                <option value="8">Arts and Crafts</option>
                                <option value="9">Automotive</option>
                                <option value="10">Aviation &amp; Aerospace</option>
                                <option value="11">Banking</option>
                                <option value="12">Biotechnology</option>
                                <option value="13">Broadcast Media</option>
                                <option value="14">Building Materials</option>
                                <option value="15">Business Supplies and Equipment</option>
                                <option value="16">Capital Markets</option>
                                <option value="17">Chemicals</option>
                                <option value="18">Civic &amp; Social Organization</option>
                                <option value="19">Civil Engineering</option>
                                <option value="20">Commercial Real Estate</option>
                                <option value="21">Computer &amp; Network Security</option>
                                <option value="22">Computer Games</option>
                                <option value="23">Computer Hardware</option>
                                <option value="24">Computer Networking</option>
                                <option value="25">Computer Software</option>
                                <option value="26">Construction</option>
                                <option value="27">Consumer Electronics</option>
                                <option value="28">Consumer Goods</option>
                                <option value="29">Consumer Services</option><option value="30">Cosmetics</option><option value="31">Dairy</option><option value="32">Defense &amp; Space</option><option value="33">Design</option><option value="34">Education Management</option><option value="35">E-Learning</option><option value="36">Electrical/Electronic Manufacturing</option><option value="37">Entertainment</option><option value="38">Environmental Services</option><option value="39">Events Services</option><option value="40">Executive Office</option><option value="41">Facilities Services</option><option value="42">Farming</option><option value="43">Financial Services</option><option value="44">Fine Art</option><option value="45">Fishery</option><option value="46">Food &amp; Beverages</option><option value="47">Food Production</option><option value="48">Fund-Raising</option><option value="49">Furniture</option><option value="50">Gambling &amp; Casinos</option><option value="51">Glass, Ceramics &amp; Concrete</option><option value="52">Government Administration</option><option value="53">Government Relations</option><option value="54">Graphic Design</option><option value="55">Health, Wellness and Fitness</option><option value="56">Higher Education</option><option value="57">Hospital &amp; Health Care</option><option value="58">Hospitality</option><option value="59">Human Resources</option><option value="60">Import and Export</option><option value="61">Individual &amp; Family Services</option><option value="62">Industrial Automation</option><option value="63">Information Services</option><option value="64">Information Technology and Services</option><option value="65">Insurance</option><option value="66">International Affairs</option><option value="67">International Trade and Development</option><option value="68">Internet</option><option value="69">Investment Banking</option><option value="70">Investment Management</option><option value="71">Judiciary</option><option value="72">Law Enforcement</option><option value="73">Law Practice</option><option value="74">Legal Services</option><option value="75">Legislative Office</option><option value="76">Leisure, Travel &amp; Tourism</option><option value="77">Libraries</option><option value="78">Logistics and Supply Chain</option><option value="79">Luxury Goods &amp; Jewelry</option><option value="80">Machinery</option><option value="81">Management Consulting</option><option value="82">Maritime</option><option value="83">Marketing and Advertising</option><option value="84">Market Research</option><option value="85">Mechanical or Industrial Engineering</option><option value="86">Media Production</option><option value="87">Medical Devices</option><option value="88">Medical Practice</option><option value="89">Mental Health Care</option><option value="90">Military</option><option value="91">Mining &amp; Metals</option><option value="92">Motion Pictures and Film</option><option value="93">Museums and Institutions</option><option value="94">Music</option><option value="95">Nanotechnology</option><option value="96">Newspapers</option><option value="97">Non-Profit Organization Management</option><option value="98">Oil &amp; Energy</option><option value="99">Online Media</option><option value="100">Outsourcing/Offshoring</option><option value="101">Package/Freight Delivery</option><option value="102">Packaging and Containers</option><option value="103">Paper &amp; Forest Products</option><option value="104">Performing Arts</option><option value="105">Pharmaceuticals</option><option value="106">Philanthropy</option><option value="107">Photography</option><option value="108">Plastics</option><option value="109">Political Organization</option><option value="110">Primary/Secondary Education</option><option value="111">Printing</option><option value="112">Professional Training &amp; Coaching</option><option value="113">Program Development</option><option value="114">Public Policy</option><option value="115">Public Relations and Communications</option><option value="116">Public Safety</option><option value="117">Publishing</option><option value="118">Railroad Manufacture</option><option value="119">Ranching</option><option value="120">Real Estate</option><option value="121">Recreational Facilities and Services</option><option value="122">Religious Institutions</option><option value="123">Renewables &amp; Environment</option><option value="124">Research</option><option value="125">Restaurants</option><option value="126">Retail</option><option value="127">Security and Investigations</option><option value="128">Semiconductors</option><option value="129">Shipbuilding</option><option value="130">Sporting Goods</option><option value="131">Sports</option><option value="132">Staffing and Recruiting</option><option value="133">Supermarkets</option><option value="134">Telecommunications</option><option value="135">Textiles</option><option value="136">Think Tanks</option><option value="137">Tobacco</option><option value="138">Translation and Localization</option><option value="139">Transportation/Trucking/Railroad</option><option value="140">Utilities</option><option value="141">Venture Capital &amp; Private Equity</option><option value="142">Veterinary</option><option value="143">Warehousing</option><option value="144">Wholesale</option><option value="145">Wine and Spirits</option><option value="146">Wireless</option><option value="147">Writing and Editing</option><option value="148">Consulting</option><option value="149">Finance </option><option value="150">Marketing, Retail &amp; Brand Management</option><option value="151">Entrepreneurship / Start ups</option><option value="152">Government &amp; Non Profit</option><option value="153">Health &amp; Medicine</option><option value="154">Media, Arts &amp; Entertainment </option><option value="155">Energy &amp; Industrials</option><option value="156">Technology</option><option value="157">Legal</option><option value="158">Human Resources</option><option value="159">Other</option></select>
                            </fieldset>-->
                            
                            <!--<fieldset style="width:48%; float:left; margin-right: 3%;">
                                <label>Time period<sup style="color:#FF0000;font-weight:bold;"></sup></label>
                                <input type="checkbox" name="timePeriodType[]" value="Work" id="timePeriodWork<?=$lpB;?>" 
                                <? if($advExpRow['time_period_type']=='Work'){?> checked="checked" <? }?> />
                                <strong>I currently work here</strong>
                                <input type="checkbox" name="timePeriodType[]" value="Internship" id="timePeriodInternship<?=$lpB;?>" 
                                <? if($advExpRow['time_period_type']=='Internship'){?> checked="checked" <? }?>/>
                                <strong>Internship</strong>
                            </fieldset>-->
                            <?php
                                $tempYear = array();
                                $frmCrntYear = date('Y')+1;
                                for($frmDt=63;$frmDt>0;$frmDt--){
                                     $tempYear[] = $frmCrntYear - number_format($frmDt);
                                     $frmYear = $tempYear;	 
                                }
                                krsort($frmYear);
                            ?>
                            <fieldset style="width:48%; float:left;">
                                <label>Year<sup style="color:#FF0000;font-weight:bold;"></sup></label>
                                <strong>From</strong>
                                <select name="timePeriodFrom[]" id="timePeriodFrom<?=$lpB;?>" style="width:35%;">
                                <?php
                                for($yearfm=count($frmYear)-1;$yearfm>=0;$yearfm--){
                                ?>
                                <option value="<?=$frmYear[$yearfm];?>" <? if($advExpRow['time_period_from']==$frmYear[$yearfm]){?> selected="selected" <? }?> >
                                <?=$frmYear[$yearfm];?></option>
                                <?php
                                }
                                ?>
                                </select>
                                <strong>to</strong>
                                <select name="timePeriodTo[]" id="timePeriodTo<?=$lpB;?>" style="width:35%;">
                                    <?php
                                    for($yearfm=count($frmYear)-1;$yearfm>=0;$yearfm--){
                                    ?>
                                    <option value="<?=$frmYear[$yearfm];?>" 
                                    <? if($advExpRow['time_period_to']==$frmYear[$yearfm]){?> selected="selected" <? }?> >
                                    <?=$frmYear[$yearfm];?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </fieldset>
                            <fieldset style="width:48%; float:left;">
                                <label>Description<sup style="color:#FF0000;font-weight:bold;"></sup></label>
                                <textarea name="description[]" id="description<?=$lp;?>" style="width:92%;" rows="5" cols="15"><?=$advExpRow['description'];?></textarea>
                            </fieldset>
                            <div class="clear"></div>
                            <!--<span style="float:right;"><input type="button" name="removeJob" id="removeMod" value="remove" /></span>-->
                       </fieldset>
                   <?php if($lp==2){?>
	                 </div>                   
					 <?php }else{?>
                     </fieldset></div>
                     <?php }?>
                   <div class="clear"></div>                   
                   <? $lp++;}#whileEnd.?>                 
							<input type="button" name="addJob" id="addJob" value="Add another job" />
				</div>  
                </div>
				<div class="clear"></div>
			<footer>
				<div class="submit_link">
					<input type="submit" name="btnAdvExpSubmit" id="btnAdvExpSubmit" value="Save" class="alt_btn">
					<input type="button" name="btnCancel" id="btnCancel" value="Cancel" class="btn_cancel">
				</div>
			</footer>
		</article><!-- end of post new article -->
		</form>
        <input type="hidden" name="noOfExperience" id="noOfExperience" value="<?=$numOfAdvExp?>">
		<div class="spacer"></div>
	</section>
<!--/JS/-->    
<div id="javaScript">
<script type="text/javascript">
jQuery(document).ready(function() { 
	//Cancel Button Code:
	jQuery('#btnCancel').click(function(){
		location.href="manage_advisor.php";
	});
});
</script>
<!--/Start::AddExperians./-->
<script type="text/javascript">
	$('.removeMod').livequery('click',function(event){
        $(this).parent().remove();
		$("#noOfExperience").val($("#noOfExperience").val()-1); 
        event.preventDefault();
    });
    $('#addJob').click(function(event){
		var itemEmp = document.getElementById("noOfExperience").value = parseInt($("#noOfExperience").val()) + 1;
		//event.preventDefault();
        if(itemEmp<5){
            $varRootEdu = $(this).parent('.JobExperience');
			//alert($varRootEdu);
            $eduBlock = $('.edu1:first',$varRootEdu).html();
            itemEmp++;            
            //$eduBlock.replace('id','',true);
            $eduBlock =$eduBlock.replace(/id="employerField"/gi, 'id="employerField'+itemEmp+'"');
            $eduBlock =$eduBlock.replace(/id="titleField"/gi, 'id="titleField'+itemEmp+'"');
            $eduBlock =$eduBlock.replace(/id="officeCountry"/gi, 'id="officeCountry'+itemEmp+'"');
            $eduBlock =$eduBlock.replace(/id="graduationYear"/gi, 'id="graduationYear'+itemEmp+'"');
            $eduBlock =$eduBlock.replace(/id="officeCity"/gi, 'id="officeCity'+itemEmp+'"');
            $eduBlock =$eduBlock.replace(/id="industryField"/gi, 'id="industryField'+itemEmp+'"');
            $eduBlock =$eduBlock.replace(/id="timePeriodWork"/gi, 'id="timePeriodWork'+itemEmp+'"');
            $eduBlock =$eduBlock.replace(/id="timePeriodInternship"/gi, 'id="timePeriodInternship'+itemEmp+'"');
            $eduBlock =$eduBlock.replace(/id="timePeriodFrom"/gi, 'id="timePeriodFrom'+itemEmp+'"');
            $eduBlock =$eduBlock.replace(/id="timePeriodTo"/gi, 'id="timePeriodTo'+itemEmp+'"');
            $eduBlock =$eduBlock.replace(/id="description"/gi, 'id="description'+itemEmp+'"');																											
            $eduBlock= '<div class="edu1 dynamicMod"><fieldset><a href="#" title="Remove" class="removeMod">Remove</a>'+ $eduBlock+'</fieldset></div>';
            $($eduBlock).insertBefore(this);
        }else{
            alert('You reached maximum!!!');
        }
    });  
</script>
<!--/End::AddExperians./-->
</div>      
</body>
</html>