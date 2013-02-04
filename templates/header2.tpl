</head>
<!--/End::Header1/-->
<body>
<!--/Start::Header2/-->
<header>
  <div id="hederOtr">
    <div class="logo"> <a href="{$site_path}home"><img src="{$site_path}front_media/images/logo.png" alt="logo-image" title="guru bul"></a></div>
    <div class="header_rt">
      <div class="top_navi">
        <ul>
          <li><a href="{$site_path}about-us" class="navi_act" id="abouthead">About us </a></li>
          <li><a href="{$site_path}guideline" id="guidehead">guideline </a></li>
		  {if $smarty.session.user_id ne '' or $smarty.session.advisor_id ne ''}
         	 {if $smarty.session.user_id neq ''}
          <li><a href="{$site_path}user-dashboard" id="loginhead">{$userDetailsArr['username']}'s Dashboard</a></li>
              {elseif $smarty.session.advisor_id  neq ''}
           <li><a href="{$site_path}advisor-dashboard" id="loginhead">{$advisorDetailsArr['first_name']}'s Dashboard</a></li>
           	  {/if}         
          <li style="background:none; padding-right:0;"><a href="{$site_path}log_in/logout.php" id="loginhead">log Out</a></li>
          {/if}	           
          {if $smarty.session.advisor_id  eq '' and $smarty.session.user_id eq '' and $smarty.session.advisor_id_IA eq ''}
          <li><a href="{$site_path}login" id="loginhead">login</a></li>
          <li style="background:none; padding-right:0;"><a href="{$site_path}register" id="reghead">register</a></li>
          {/if}
          {if $smarty.session.advisor_id_IA ne ''}
          <li><a href="{$site_path}active-account/profile-info/{$advisorDetailsArr['cd']}" id="loginhead">
          {$advisorDetailsArr['first_name']}'s Dashboard</a></li>
          <li style="background:none; padding-right:0;"><a href="{$site_path}log_in/logout.php" id="loginhead">log Out</a></li>
          {/if}
        </ul>
      </div>
      <div class="srch_otr">
        <div class="srch_in_one">
          <input width="140" type="text" onFocus="if (this.value=='Search...') this.value='';" onBlur="if (this.value=='') this.value='Search...';" value="Search..." size="20" class="searchbox" id="mod-search-searchword" name="searchword">
          <input type="submit" value="" class="go_btn" name="Submit">
        </div>
      </div>
    </div>
  </div>
</header>
<!--/End::Header2/-->