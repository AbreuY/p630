<?php 
require_once("../pi_classes/commonSetting.php");
require_once("../pi_classes/Admin.php");

#Object:
$objAdmin = new Admin();

#Variables:
$advisorId      = base64_decode($_POST["advisorId"]);
$languageName	= strtolower($_POST["languageName"]);
$action      	= $_POST["action"];
$defaultLagIdArr   = array('17','54','22','25','30','16'); 
	 
if(strcmp($action,'add_advisor_language')==0){
	#SearchMentionLanguageIdFromLangName:
	 $setColoumFields = "*";
	 $tableName 	  = "language";
	 $whereField 	  = "lang_name LIKE '%".$languageName."%' ";
	 $objAdmin->GET_ANYRECORD_FROM_TABLE($setColoumFields,$tableName,$whereField);
	 $numRowGet = $objAdmin->numofrows();
	 $rs = $objAdmin->getAllRow();
	 $langId = $rs['lang_id'];
	 
	 if(in_array($langId,$defaultLagIdArr)==0){

	 #FindLangIdAlreadyExists:
		 #clone:
		 $objFindLang	= clone $objAdmin;
			 $setColoumFields = "*";
			 $tableName 	  = "advisor_language";
			 $whereField 	  = "lang_id not in $defaultLagId and advisor_id='".$advisorId."' ";
			 $objFindLang->GET_ANYRECORD_FROM_TABLE($setColoumFields,$tableName,$whereField);
			 echo $numRowFind = $objFindLang->numofrows();
	 }else{
		 $numRowFind = 1;
	 }
	
	if($numRowFind==0){
		 if($numRowGet>0){
			#InsertLanguageFoundIdInAdvisorLangInfoTbl:
				#clone:
				$objLang	= clone $objAdmin;
					$tableName = "advisor_language"; 
					$fields = "`advisor_id`,`lang_id`,`flag_more_lang`";
					$values = "'".$advisorId."','".$langId."','1'";
				$selectedLangInsrtId  = $objLang->INSERT_ANYRECORD_IN_TABLE($tableName,$fields,$values);	
		 }
	}
}
?>
				<?php
                $iter2 = 1;
                #GetAllSelectedLangInfo:
                     #clone:
                     $objAdvisorLang	= clone $objAdmin;
                     $setColoumFields = "";	 $tableName = "";	 $whereField = "";
                     $setColoumFields = "adv.*,lng.lang_name,lng.lang_id";
                     $tableName 	  = "advisor_language AS adv INNER JOIN ".SUFFIX."language AS lng on adv.lang_id = lng.lang_id ";
                     $whereField 	  = "adv.advisor_id='".$advisorId."' and adv.flag_more_lang = '1' ";
                     $objAdvisorLang->GET_ANYRECORD_FROM_TABLE($setColoumFields,$tableName,$whereField);
                     $foundNumRow = $objAdvisorLang->numofrows();
                     if($foundNumRow>0){
                ?>
                            <?php while($langInfo = $objAdvisorLang->getAllRow()){?>  		
                              <div class="check_arrow">
                               <input name="language[]" type="checkbox" checked="checked" value="<?=$langInfo['lang_id'].",1";?>" class="language" /> 
                                <label><?=$langInfo['lang_name'];?></label> 
                               </div>
                            <?php }#endWhile.?>   
               <?php }#endIf.?>