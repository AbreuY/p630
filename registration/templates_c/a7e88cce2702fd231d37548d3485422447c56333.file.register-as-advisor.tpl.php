<?php /* Smarty version Smarty-3.0.8, created on 2012-12-08 11:31:38
         compiled from "../templates/registration/register-as-advisor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13150c3251a193d94-56406589%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7e88cce2702fd231d37548d3485422447c56333' => 
    array (
      0 => '../templates/registration/register-as-advisor.tpl',
      1 => 1354965830,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13150c3251a193d94-56406589',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('header1')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('title','Register'); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('header2')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<!--/Start::Body/-->
<div id="WrapperOtr">
  <div id="Pageholder">
    <div class="registration_as_advisor">
      <h1>Register as Advisor</h1>
      <div class="line_divider"></div>
      
      <div class="registration_advisor_inner">
      
        <div class="login_box">
          
          <div class="adviosr_heading">Name</div>
          <div class="fld_otr">
            <label for="login"> First Name</label>
            <input type="text" name="text">
          </div>
          <div class="fld_otr">
            <label for="login"> Last Name</label>
            <input type="text" name="text">
          </div>
          
          <div class="fld_otr">
            <label for="login"> Email address</label>
            <input type="text" name="text">
          </div>
          
          <div class="fld_otr">
            <label for="login">Password</label>
            <input type="password" name="text">
          </div>
          
          <div class="fld_otr">
            <label for="login"> Confirm Password</label>
            <input type="password" name="text">
          </div>
          
          <!--<fieldset>
          	<legend>Experience</legend>
            <div class="fld_otr">
            <label for="login"> Bank code</label>
            <input type="text" name="text">
          </div>
          
          </fieldset>-->
          <div class="adviosr_heading2">Experience</div>
          <div class="fld_otr">
            <label for="login"> Employer</label>
            <input type="text" name="text">
          </div>
          
          <div class="fld_otr">
            <label for="login"> Tile/Position</label>
            <input type="text" name="text">
          </div>
          
          <div class="fld_otr">
            <label for="login"> Dates</label>
            <select  name="name" >
                <option value="Male">Jan</option>
                <option value="Female">Feb</option>
                </select>
				<input width="140" type="text" onFocus="if (this.value=='YYYY') this.value='';" onBlur="if (this.value=='') this.value='YYYY';" value="YYYY" size="20" class="date_inpt" id="mod-search-searchword" name="searchword">            
            <font>TO</font>
            <select  name="name" >
                <option value="Male">Jan</option>
                <option value="Female">Feb</option>
                </select>
                <input width="140" type="text" onFocus="if (this.value=='YYYY') this.value='';" onBlur="if (this.value=='') this.value='YYYY';" value="YYYY" size="20" class="date_inpt" id="mod-search-searchword" name="searchword">
            
          </div>
          
          <div class="fld_otr_btn">
            <div class="login_btn">
              <input type="submit" name="text" value="Add another job">
               </div>
          </div>
          
          <div class="adviosr_heading2">Education</div>
          <div class="fld_otr">
            <label for="login"> University</label>
            <input type="text" name="text">
          </div>
          
          <div class="fld_otr">
            <label for="login"> Degree</label>
            <input type="text" name="text">
          </div>
          
          <div class="fld_otr_btn">
            <div class="login_btn">
              <input type="submit" name="text" value="Add another school">
               </div>
          </div>
          
          <div class="adviosr_heading2">Qualifications</div>
          <div class="fld_otr">
            <span> Briefly, what areas would you be able to advise on and Why? </span>
            <textarea></textarea>
          </div>
          
          <div class="fld_otr">
            <span> Captcha</span>
           	<div class="cptcha_img"> <img src="images/captcha.png" ></div>
           <input width="140" type="text" name="searchword" id="mod-search-searchword" class="cpt_cls" size="20" value="Type the words here.." onBlur="if (this.value=='') this.value='Type the words here..';" onFocus="if (this.value=='Type the words here..') this.value='';">
          </div>
          
          <div class="fld_otr0">
                            <div class="check_forgot_box">
                            <input type="checkbox" name="text">
                             <span>I agree the terms and conditions</span>
                            
                            </div>
                        </div>
          
          <div class="fld_otr0">
            <div class="login_btn">
              <input type="submit" name="text" value="Apply as advisor">
               </div>
          </div>
        </div>
        <div class="drop_shadwo2"></div>
      </div>
      
      
    </div>
  </div>
</div>
<!--/End::Body/-->
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('footer')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>