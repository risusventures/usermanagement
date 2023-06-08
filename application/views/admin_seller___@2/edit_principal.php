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
    <?php 
   // echo '<pre>'; print_r($edit_principal); echo '</pre>';
    ?>
    <div id="page_content" style="margin-left:0px;">
        <div id="page_content_inner">
            <h3 class="heading_b uk-margin-bottom"><u>Update Principal</u></h3>
            <div class="md-card">
                <div class="md-card-content large-padding">
                             <?php if($_GET['message']==already)
             { echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
                    <a href="#" class="uk-alert-close uk-close"></a>You are already registered</div>';}?>
                            <?php if($_GET['message']==1)
             { echo '<div class="uk-alert uk-alert-success" data-uk-alert="">
                    <a href="#" class="uk-alert-close uk-close"></a>Added Principal Successfully......</div>';}?>
						<?php echo form_open(base_url('Principal/update_Principal'),array('id'=>'saveprincipal','name'=>'saveprincipal','onsubmit'=>'return validateentry();','class'=>'uk-form-stacked','enctype'=>'multipart/form-data'));?>
                        <input type="hidden" name="uid" class="md-input label-fixed" value="<?php echo $edit_principal['pri']['Principal_id'];?>" data-parsley-id="4">
                    <div class="uk-grid " data-uk-grid-margin>
                           
                                <div class="uk-width-1-3">
                                <div class="parsley-row">
                                    <label for="fullname">Name<span class="req">*</span></label>
                                    <input type="text" required="required" name="Principal_person"  class="md-input" value="<?php echo $edit_principal['pri']['Principal_person'] ?>" />
                                </div>
                            </div>
                         <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                    <label for="short">Short Name<span class="req">*</span></label>
                                    <input type="text" name="short_name" class="md-input"  value="<?php echo $edit_principal['pri']['short_name'] ?>"/>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-3" style="display:none;">
                                <div class="parsley-row">
                                    <label for="email">Email Address<span class="req">*</span></label>
                                    <input type="text" name="Principal_email" class="md-input"  value="<?php echo $edit_principal['pri']['Principal_email'] ?>"/>
                                </div>
                            </div>
                            <div class="uk-width-1-3">
                                <div class="parsley-row">
                                    <label for="fullname">Phone<span class="req">*</span></label>
                                    <input type="number" required="required" name="Principal_phone"  class="md-input" value="<?php echo $edit_principal['pri']['Principal_phone'] ?>"/>
                                </div>
                            </div>
                        </div>

                                     <div class="uk-grid " data-uk-grid-margin>
                            
                                <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                    <label for="fullname">Address<span class="req">*</span></label>
                                    <input type="text" required="required" name="Principal_address"  class="md-input" value="<?php echo $edit_principal['pri']['Principal_address'] ?>" />
                                </div>
                            </div>
                            <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                    <label for="email">City<span class="req">*</span></label>
                                    <input type="text" required="required" name="Principal_city" class="md-input"  value="<?php echo $edit_principal['pri']['Principal_city'] ?>"/>
                                </div>
                            </div>
                               <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                    <label for="fullname">Country<span class="req">*</span></label>
                                    <input type="text" required="required" name="Principal_country"  class="md-input" value="<?php echo $edit_principal['pri']['Principal_country'] ?>" />
                                </div>
                            </div>
                        </div>
                                     <div class="uk-grid " data-uk-grid-margin>
                            
                             
                            <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                    <label for="email">Postal Code<span class="req">*</span></label>
                                    <input type="text"  name="Principal_postal_code" class="md-input"  value="<?php echo $edit_principal['pri']['Principal_postal_code'] ?>"/>
                                </div>
                            </div>
                        </div>
                    
                    
                    
                    
                    <div id="reapeat1" style="margin-top: 20px">
                        
                        <?php if(!empty($edit_principal['principal_contacts'])){
                                foreach($edit_principal['principal_contacts'] as $kk=>$va){
                                    //echo '<pre>'; print_r($va); echo '</pre>';
                                    ?> 
                                    <div id="principal_contacts_<?php echo $va['id']; ?>" class="uk-grid " data-uk-grid-margin>                           
                            <div class="uk-width-1-3">
                                  <h2>Contact Person</h2>
                                    <label for="email">Contact Person<span class="req">*</span></label>
                                    <input type="hidden"  name="contactper[id][]" class="md-input"  value="<?php echo $va['id']; ?>"/>
                                    <input type="text"  name="contactper[contactper][]" class="md-input"  value="<?php echo $va['name']; ?>"/>
                            </div>
                       
                             <div class="uk-width-1-3">
                                  <h2>Email</h2>
                                    <label for="email">Email<span class="req">*</span></label>
                                    <input type="text"  name="contactper[email][]" class="md-input" style="padding-top: 25px;" value="<?php echo $va['email']; ?>"/>
                                </div>
                                        <a href="javascript:void(0)" onclick="principal_contacts('<?php echo $va['id'];  ?>')" ><i class="material-icons" title="Delete" style="font-size:28px;color:#1976D2;">close</i></a>
                            </div>
                                    <?php }
                        }else{ ?> 
                            
                            <div class="uk-grid " data-uk-grid-margin>                           
                            <div class="uk-width-1-3">
                                  <h2>Contact Person</h2>
                                    <label for="email">Contact Person<span class="req">*</span></label>
                                    <input type="text"  name="contactper[contactper][]" class="md-input"  value=""/>
                            </div>
                       
                             <div class="uk-width-1-3">
                                  <h2>Email</h2>
                                    <label for="email">Email<span class="req">*</span></label>
                                    <input type="text"  name="contactper[email][]" class="md-input" style="padding-top: 25px;" value=""/>
                                </div>
                            </div>
                        
                            <?php } ?>
                        
                        
                    </div>
                      <div class="uk-grid" style="margin-top: 20px">
                            <div class="uk-width-1-1">
                                <button type="button" class="md-btn md-btn-success" onclick="add_more()" name="add" >Add More</button>
                            </div>
                            
                    </div>
                    
                    
                    
                    
                    
                    
                    <div id="reapeat" style="margin-top: 20px">
                        <h2>Add Products</h2>
                        
                         <?php if(!empty($edit_principal['principal_products'])){ 
                             
                             foreach($edit_principal['principal_products'] as $k=>$vvv){ ?> 
                        <div id="principal_products_<?php echo $vvv['id']; ?>" class="uk-grid " data-uk-grid-margin >
                             <div class="uk-width-1-3">
                                 
                                    <label for="email">Product Name<span class="req">*</span></label>
                                    <input type="hidden"  name="products[id][]" class="md-input"  value="<?php echo $vvv['id']?>"/>
                                    <input type="text"  name="products[name][]" class="md-input"  value="<?php echo $vvv['product_name']?>"/>
                                </div>
                        
                             <div class="uk-width-1-3" style="display:none">
                                    <label for="email">Product Price<span class="req">*</span></label>
                                    <input type="text"  name="products[price][]" class="md-input" style="padding-top: 25px;" value="<?php echo $vvv['product_price']?>"/>
                                </div>
                            
                            <a href="javascript:void(0)" onclick="principal_products('<?php echo $vvv['id'];  ?>')" ><i class="material-icons" title="Delete" style="font-size:28px;color:#1976D2;">close</i></a>
                        </div>
                                 
                        <?php }
                             
                         }else{ ?>
                        
                        <div class="uk-grid " data-uk-grid-margin>
                             <div class="uk-width-1-3">
                                 
                                    <label for="email">Product Name<span class="req">*</span></label>
                                    <input type="text"  name="products[name][]" class="md-input"  value=""/>
                                </div>
                        
                             <div class="uk-width-1-3" style="display:none">
                                    <label for="email">Product Price<span class="req">*</span></label>
                                    <input type="text"  name="products[price][]" style="padding-top: 25px;" class="md-input"  value="0"/>
                                </div>
                        </div>
                         <?php } ?>
                    </div>
                      <div class="uk-grid" style="margin-top: 20px">
                            <div class="uk-width-1-1">
                                <button type="button" class="md-btn md-btn-success" onclick="add_product()" name="add" >Add Product</button>
                            </div>
                            
                    </div>
                        <div class="uk-grid" style="margin-top: 20px">
                            <div class="uk-width-1-1">
                                <button type="submit" class="md-btn md-btn-primary" name="submit" onclick="return verify_upload()">Update</button>
                            </div>
                            
                        </div>

                    <?php echo form_close();?>
                </div>
        </div>
            
            
                
            
  <!--------repeater--->           
            
            
            
            
            
    </div>
         <div id="preloader">
 <div id="status"></div>
</div>
       <script>
        function add_more(){
            var hml='<div class="uk-grid " data-uk-grid-margin> <div class="uk-width-1-3"><label for="email">Contact Person<span class="req">*</span></label><input type="text"  name="contactper[contactper][]" class="md-input"  value=""/></div><div class="uk-width-1-3"><label for="email">Email<span class="req">*</span></label><input type="text"  name="contactper[email][]" class="md-input"  value=""/></div></div>'
                            
                jQuery("#reapeat1").append(hml);  
        }
        </script> 
         
        <script>
        function add_product(){
            var hml='<div class="uk-grid " data-uk-grid-margin> <div class="uk-width-1-3"><label for="email">Product Name<span class="req">*</span></label><input type="text"  name="products[name][]" class="md-input"  value=""/></div><div class="uk-width-1-3" style="display:none"><label for="email">Product Price<span class="req">*</span></label><input type="text"  name="products[price][]" class="md-input"  value="0"/></div></div>'
                            
                jQuery("#reapeat").append(hml);                    
                                    
                                
                        
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
    
function principal_contacts(id){    
    $.ajax({
            type: 'GET',
         
            url: '<?php echo base_url('Principal/del_contacts?id=')?>'+id,
            
            success: function (response) {   
                $("#principal_contacts_"+id).remove();
            }
        });
}
function principal_products(id){
    
     $.ajax({
            type: 'GET',
           
            url: '<?php echo base_url('Principal/del_products?id=')?>'+id,
           
            success: function (response) {   
                $("#principal_products_"+id).remove();
            }
        });
    
}
    
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


