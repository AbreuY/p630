<fieldset>
  <div id="supplier_dashbord">
    <div class="tabs">
      <ul>
        <li <?php if($pageName=="personalInfo"){ ?> class="active"<?php } ?>>
        	<a href="edit_advisor.php?advisorId=<?=$_GET['advisorId'];?>">Personal Information</a></li>
        <li <?php if($pageName=="educationInfo"){?> class="active"<?php } ?>>
        	<a href="edit_advisor_education.php?advisorId=<?=$_GET['advisorId'];?>">Education</a></li>
        <li <?php if($pageName=="workExperienceInfo"){ ?> class="active"<?php } ?>>
        	<a href="edit_advisor_experience.php?advisorId=<?=$_GET['advisorId'];?>"> Work Experience</a></li>
        <li <?php if($pageName=="myExpertiseInfo"){ ?> class="active"<?php } ?>>
       		<a href="edit_advisor_expertise.php?advisorId=<?=$_GET['advisorId'];?>"> My Expertise</a></li>
        <li <?php if($pageName=="myPitchInfo"){ ?> class="active"<?php } ?>>
        	<a href="edit_advisor_pitch.php?advisorId=<?=$_GET['advisorId'];?>" >My Pitch</a></li>
      </ul>
    </div>
  </div>
</fieldset>
