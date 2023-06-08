<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no"/>
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/risus-03.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/risus-03.png" sizes="32x32">
    <title>Risus Ventures</title>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/uikit/css/uikit.almost-flat.min.css" media="all">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/icons/flags/flags.min.css" media="all">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/main.min.css" media="all">
    <script src="<?php echo base_url()?>assets/js/common.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/custom/uikit_fileinput.min.js"></script>
    <style>
#preloader  {
     position: absolute;
     top: 0;
     left: 0;
     right: 0;
     bottom: 0;
     background-color: #fefefe;
     z-index: 99;
    height: 100%;
 }
#status  {
     width: 200px;
     height: 200px;
     position: absolute;
     left: 50%;
     top: 50%;
     background-image: url(http://www.finacbooks.com/assets/img/ajax-loader.gif);
     background-repeat: no-repeat;
     background-position: center;
    margin: -100px 0 0 -100px;
 }
 
</style>


<script>// makes sure the whole site is loaded
    jQuery(window).load(function() {
        // will first fade out the loading animation
    jQuery("#status").fadeOut();
        // will fade out the whole DIV that covers the website.
    jQuery("#preloader").delay(1000).fadeOut("slow");
})
</script>
<?php include('analytics.php');?> 
</head>
<body class=" sidebar_main_open sidebar_main_swipe">
  <?php include('header.php');?>
   <?php include('header_top.php');?>
    <div id="page_content" style="margin-left:0px;">
        <div id="page_content_inner">
            <h3 class="heading_b uk-margin-bottom"><u>Add New User</u></h3>
            <div class="md-card">
                <div class="md-card-content large-padding">
                             <?php if($_GET['message']==already)
             { echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
                    <a href="#" class="uk-alert-close uk-close"></a>User already registered</div>';}?>
                            <?php if($_GET['message']==1)
             { echo '<div class="uk-alert uk-alert-success" data-uk-alert="">
                    <a href="#" class="uk-alert-close uk-close"></a>User Added Successfully......</div>';}?>
						<?php echo form_open(base_url('seller/saveuser'),array('id'=>'saveprincipal','name'=>'saveprincipal','onsubmit'=>'return validateentry();','class'=>'uk-form-stacked','enctype'=>'multipart/form-data'));?>
                        <div class="uk-grid " data-uk-grid-margin>
                           
                                <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                    <label for="fullname">User Phone Number<span class="req">*</span></label>
                                    <input type="number" required="required" name="user_number"  class="md-input" value="" />
                                </div>
                            </div>
                            <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                    <label for="email">Email Address<span class="req">*</span></label>
                                    <input type="text" name="user_email" class="md-input"  value=""/>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                    <label for="fullname">Enter Password<span class="req">*</span></label>
                                    <input type="password" required="required" name="user_password"  class="md-input" value=""/>
                                </div>
                            </div>
                        </div>
                    <div class="uk-grid " data-uk-grid-margin>
                        <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                    <select id="val_select" required data-md-selectize name="roleid">
                                        <option value="0">Select User Role</option>
                                         <option value="1">Admin User</option>
                                         <option value="2">Sub User</option>
                                        
                                    </select>
                                </div></div>
                    </div>
                    
                    <h3>Assign Permission</h3>
                    <div class="uk-grid " data-uk-grid-margin>
                        <div class="uk-width-medium-1-6">
                                <div class="parsley-row">
                                    <h4>Dashboard</h4><br>
                                    <input type="checkbox" name="menu[]" value="dashboard">Dashboard
                               </div>
                        </div>
                        <div class="uk-width-medium-1-6">
                                <div class="parsley-row">
                                    <h4>Principal</h4><br>
                                    <input type="checkbox" id="myCheck" name="menu[]" value="add_Pri">Add Principal<br>
                                    <input type="checkbox" id="myCheck" name="menu[]"  value="manage_Pri">Manage Principal
                               </div>
                        </div>
                        
                        <div class="uk-width-medium-1-6">
                                <div class="parsley-row">
                                    <h4>Customers</h4><br>
                                    <input type="checkbox" id="myCheck" name="menu[]" value="add_cust">Add Customer<br>
                                    <input type="checkbox" id="myCheck" name="menu[]"  value="manage_customers">Manage Customers
                               </div>
                        </div>
                        <div class="uk-width-medium-1-6">
                                <div class="parsley-row">
                                    <h4>Order</h4><br>
                                    <input type="checkbox" id="myCheck1" name="menu[]" value="add_order">Add Order<br>
                                    <input type="checkbox" id="myCheck1" name="menu[]" value="manage_orders">Manage Orders<br>
                               </div>
                        </div>
                        <div class="uk-width-medium-1-6">
                                <div class="parsley-row">
                                    <h4>Reports</h4><br>
                                    <input type="checkbox" id="myCheck1" name="menu[]" value="orders_report">Orders Report<br>
                                    <input type="checkbox" id="myCheck1" name="menu[]" value="sales_report">Sales Report
                               </div>
                        </div>
                        <div class="uk-width-medium-1-6">
                                <div class="parsley-row">
                                    <h4>Sub Users</h4><br>
                                    <input type="checkbox" id="myCheck2" name="menu[]" value="add_sub">Add Sub user<br>
                                    <input type="checkbox" id="myCheck2" name="menu[]" value="list_user">List Sub user
                               </div>
                        </div>
                    </div>
                    
                    
                    
                    
                        <div class="uk-grid" style="margin-top: 20px">
                            <div class="uk-width-1-1">
                                <button type="submit" class="md-btn md-btn-primary" name="submit" onclick="return verify_upload()">Submit</button>
                            </div>
                            
                        </div>

                    <?php echo form_close();?>
                </div>
        </div>
            
            
                
            
  <!--------repeater--->           
            
            
            
            
            
    </div>
    </div>
         <div id="preloader">
 <div id="status"></div>
</div>
   <script>
function myFunction() {
    var checkBox = document.getElementById("myCheck");
    var text = document.getElementById("text");
     var text2 = document.getElementById("text2");
    if (checkBox.checked == true){
        text.style.display = "block";
        text2.style.display = "block";
    } else {
       text.style.display = "none";
       text2.style.display = "none";
    }
}
</script>
    
         
    <!-- google web fonts -->
    <script>
        WebFontConfig = {
            google: {
                families: [
                    'Source+Code+Pro:400,700:latin',
                    'Roboto:400,300,500,700,400italic:latin'
                ]
            }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>

    <!-- common functions -->
    <script src="<?php echo base_url()?>assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="<?php echo base_url()?>assets/js/uikit_custom.min.js"></script>
    <!-- altair common functions/helpers -->
    <script src="<?php echo base_url()?>assets/js/altair_admin_common.min.js"></script>
<!--    <script src="<?php echo base_url()?>assets/js/pages/jquery.repeater1.js"></script>
    <script src="<?php echo base_url()?>assets/js/pages/repeater1.min.js"></script>-->
    <!-- page specific plugins -->
    <!-- parsley (validation) -->
<script src="<?php echo base_url()?>assets/bower_components/parsleyjs/dist/parsley.min.js"></script>

    <!--  forms validation functions -->
<!--    <script src="<?php echo base_url()?>assets/js/pages/forms_validation.min.js"></script>-->




<script type="text/javascript">
function validateentry()
{

if(document.forms.contactform.Principal_person.value=="")
{
 alert("Please provide your Contact Person Name.");
 document.forms.contactform.Principal_person.focus();
 return false;
}
//if(document.forms.contactform.Principal_email.value=="")
//{
// alert("Please provide your Principal Email.");
// document.forms.contactform.Principal_email.focus();
// return false;
//}
if(document.forms.contactform.Principle_phone.value=="")
{
 alert("Please  Select Your Principal Mobile Number.");
 document.forms.contactform.Principal_phone.focus();
 return false;
}

if(document.forms.contactform.Principal_address.value=="")
{
 alert("Please  Select Your Principal Address.");
 document.forms.contactform.Principal_address.focus();
 return false;
}
if(document.forms.contactform.Principal_city.value=="")
{
 alert("Please  Select Your Principal City.");
 document.forms.contactform.Principal_city.focus();
 return false;
}
if(document.forms.contactform.Principal_state.value=="")
{
 alert("Please  Select Your Principal State.");
 document.forms.contactform.Principal_state.focus();
 return false;
}
if(document.forms.contactform.Principal_country.value=="")
{
 alert("Please  Select Your Principal Country.");
 document.forms.contactform.Principal_country.focus();
 return false;
}
if(document.forms.contactform.Principal_postal_code.value=="")
{
 alert("Please  Select Your Principal Postal Code.");
 document.forms.contactform.Principal_postal_code.focus();
 return false;
}
}
</script>


</body>
</html>


