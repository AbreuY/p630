<?php /* Smarty version Smarty-3.0.8, created on 2013-01-24 13:11:11
         compiled from "../templates/search/search_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22641510132efd28a68-83645233%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3676f55f68291f58b29cc5841e8d6531560ca70c' => 
    array (
      0 => '../templates/search/search_page.tpl',
      1 => 1359032028,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22641510132efd28a68-83645233',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('header1')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('title',"Search Advisor"); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('header2')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<!--/Start::Body/-->

<div id="WrapperOtr">
  <div id="Pageholder">
    	<div class="search_page_otr">
        	<div class="srch_otr">
        <div class="srch_in_one">
          <input width="140" type="text" name="searchword" id="mod-search-searchword" class="searchbox" size="20" value="Search..." onblur="if (this.value=='') this.value='Search...';" onfocus="if (this.value=='Search...') this.value='';">
          <input type="submit" name="Submit" class="go_btn" value="">
        </div>
      </div>
      
      <div class="front_product_otr">
      
      <div class="edit_menu_start">
              <ul>
                <li> <a class="edit_act_nav1 act_arow1" id="exper_but" href="javascript:void(0);"> Expertise <span>  </span></a> </li>
                <!--<li> <a href="#" class="act_arow2"> Industry</a></li>-->
                <li> <a href="javascript:void(0);" class="act_arow2" id="emp_but"> Employer</a></li>
                <li> <a href="javascript:void(0);" class="act_arow2" id="job_tit_but"> Job Title</a></li>
                <li> <a href="javascript:void(0);" class="act_arow2" id="edu_but"> Education</a></li>
              </ul>
              <div class="sort_by_search">
              <span>Sort : </span>
              	<select>
                	<option>Rating</option>
                    <option>Rating</option>
                    <option>Rating</option>
                    <option>Rating</option>
                </select>
              </div>
            </div>
         
         <!---------------------------------------------------------------------------------------------------------------------------------------->
            
<div id="wrapper_out" class="exper" style="display:none;">
  <div class="wrapper_inn">
  <a class="closeDrop" id="close_exper" href="javascript:void(0);"></a>
    <div class="filter_by_experties">Filter by Experties </div>
  <!--*-->
      <div class="list_sub">
      <h4>
          <div class="circle bgcolor">
          <span>1</span>
          </div>
      Select a
      <u>Category</u>
      :
      </h4>
      
      
      
      <!--<div id="expr">
          	<div id="level_1">
          	<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cat')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
?>
          		<?php echo $_smarty_tpl->tpl_vars['i']->value['cat_name'];?>
<br />
          	<?php }} ?>
            </div>
          </div>  -->
      
      
      <ul>
      <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cat')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
?>
          <li>
            <a href="#" onmouseover="" class="li">
            	<label class="label"><input name="" type="checkbox" value="" /></label>
            	<?php echo $_smarty_tpl->tpl_vars['i']->value['cat_name'];?>

            </a>
            </li>
      <?php }} ?>
      </ul>
      
      
      </div>
  <!--*-->
  
  <!--*-->
  <div class="list_sub">
  <h4>
  <div class="circle bgcolor">
  <span>2</span>
  </div>
  Choose a 
  <u>Skill:</u>
  :
  </h4>
  <ul>
  <li>
  <a href="#" class="li">
  <label class="label"><input name="" type="checkbox" value="" /></label>
   Technology, Media & Telecom
    </a>
    </li>
    
  <li>
  <a href="#" class="li">
  <label class="label"><input name="" type="checkbox" value="" /></label>
   Technology, Media & Telecom
    </a>
   <li>
  <a href="#" class="li">
  <label class="label"><input name="" type="checkbox" value="" /></label>
   Technology, Media & Telecom
    </a>
    </li>
  <li>
  <a href="#" class="li">
  <label class="label"><input name="" type="checkbox" value="" /></label>
   Technology, Media & Telecom
    </a>
    </li>
    <li>
  <a href="#" class="li">
  <label class="label"><input name="" type="checkbox" value="" /></label>
   Technology, Media & Telecom
    </a>
    </li>
    <li>
  <a href="#" class="li">
  <label class="label"><input name="" type="checkbox" value="" /></label>
   Technology, Media & Telecom
    </a>
    </li>
    <li>
  <a href="#" class="li">
  <label class="label"><input name="" type="checkbox" value="" /></label>
   Technology, Media & Telecom
    </a>
    </li>
    <li>
  <a href="#" class="li">
  <label class="label"><input name="" type="checkbox" value="" /></label>
   Technology, Media & Telecom
    </a>
    </li>
  </ul>
  
  
  </div>
  <!--*-->
  
  
  </div>
</div>
            
            
            
            
            
            
          
         
         <!---------------------------------------------------------------------------------------------------------------------------------------->
            
       <div class="advisor_part1">
      <h1>Advisors</h1>
        <div class="product_cat_main"> <a href="#">
          <div class="cat_profile_lt">
            <div class="cat_profile_otr">
              <div class="profile_lt"> <img src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/pro_img.png"> </div>
              <div class="profile_rt">
                <div class="profile_rt_titl">Shayna</div>
                <div class="profile_rt_position">Cocoa Sustainability Manager at Mars</div>
                <div class="profile_rt_rating">
                  <div id="17" style="cursor: default;" title="good"><img class="17" title="good" alt="1" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-on.png" id="17-1">&nbsp;<img class="17" title="good" alt="2" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-on.png" id="17-2">&nbsp;<img class="17" title="good" alt="3" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-on.png" id="17-3">&nbsp;<img class="17" title="good" alt="4" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-on.png" id="17-4">&nbsp;<img class="17" title="good" alt="5" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-off.png" id="17-5"> </div>
                </div>
              </div>
            </div>
            <div class="profile_time">
              <ul>
                <li>$ 100/hr<span>|</span></li>
                <li class="credit_img">2 credits<span>|</span></li>
                <li>3 consultations</li>
              </ul>
            </div>
            <div class="profile_head_otr">
              <div class="profile_head_one"> Business School Admissions : <span>Specialty : Determining the best program</span> </div>
              <div class="profile_head_two"> Massachusetts Institute of Technology
                -Sloan School of Management MBA </div>
            </div>
          </div>
          </a>  </div>
        <div class="product_cat_main"> <a href="#">
          <div class="cat_profile_lt">
            <div class="cat_profile_otr">
              <div class="profile_lt"> <img src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/pro_img.png"> </div>
              <div class="profile_rt">
                <div class="profile_rt_titl">Shayna</div>
                <div class="profile_rt_position">Cocoa Sustainability Manager at Mars</div>
                <div class="profile_rt_rating">
                  <div id="17" style="cursor: default;" title="good"><img class="17" title="good" alt="1" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-on.png" id="17-1">&nbsp;<img class="17" title="good" alt="2" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-on.png" id="17-2">&nbsp;<img class="17" title="good" alt="3" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-on.png" id="17-3">&nbsp;<img class="17" title="good" alt="4" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-on.png" id="17-4">&nbsp;<img class="17" title="good" alt="5" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-off.png" id="17-5"> </div>
                </div>
              </div>
            </div>
            <div class="profile_time">
              <ul>
                <li>$ 100/hr<span>|</span></li>
                <li class="credit_img">2 credits<span>|</span></li>
                <li>3 consultations</li>
              </ul>
            </div>
            <div class="profile_head_otr">
              <div class="profile_head_one"> Business School Admissions : <span>Specialty : Determining the best program</span> </div>
              <div class="profile_head_two"> Massachusetts Institute of Technology
                -Sloan School of Management MBA </div>
            </div>
          </div>
          </a>  </div>
          
          </div> 
          
          <div class="product_part1">
          	<h1>Products</h1>
            
            <div class="pro_div1"><a href="#"></a></div>
            <div class="pro_div1"><a href="#"></a></div>
            <div class="pro_div1"><a href="#"></a></div>
            <div class="pro_div1"><a href="#"></a></div>
          </div>
      </div>
        
        </div>
  </div>
</div>


<!--/End::Body/-->

<script type="text/javascript">
$(document).ready(function(e) {
    $('#close_exper').click(function(e) {
        $('.exper').hide();
    });
	$('#exper_but').click(function(e) {
        $('.exper').show();
    });
});
</script>


<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('footer')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>