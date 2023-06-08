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
        .uk-width-medium-1-3, .uk-width-medium-2-6{margin-top: 10px}
        .ptable{width: 100%; margin-top: 10px;}
        .ptable th{text-align: left; width: 33%}
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
            <h3 class="heading_b uk-margin-bottom"><u>Add New Customer</u></h3>
            <div class="md-card">
                <div class="md-card-content large-padding">
                             <?php if($_GET['message']==already)
             { echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
                    <a href="#" class="uk-alert-close uk-close"></a>You are already registered</div>';}?>
                            <?php if($_GET['message']==1)
             { echo '<div class="uk-alert uk-alert-success" data-uk-alert="">
                    <a href="#" class="uk-alert-close uk-close"></a>Added Customer Successfully......</div>';}?>
						<?php echo form_open(base_url('seller/customer'),array('id'=>'contactform','name'=>'contactform','onsubmit'=>'return validateentry();','class'=>'uk-form-stacked','enctype'=>'multipart/form-data'));?>
                        <div class="uk-grid " data-uk-grid-margin>
                           
                                <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                    <label for="fullname">Company Name<span class="req">*</span></label>
                                    <input type="text" name="customer_person"  class="md-input" value="" />
                                </div>
                            </div>
                            <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                    <label for="short">Short Name<span class="req">*</span></label>
                                    <input type="text" name="short_name" class="md-input"  value=""/>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                    <label for="fullname">Phone<span class="req">*</span></label>
                                    <input type="text" name="customer_phone"  class="md-input" value=""/>
                                </div>
                            </div>
                        </div>

                                     <div class="uk-grid " data-uk-grid-margin>
                            
                                <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                    <label for="fullname">Address<span class="req">*</span></label>
                                    <input type="text" name="customer_address"  class="md-input" value="" />
                                </div>
                            </div>
                            <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                    <label for="email">State<span class="req">*</span></label>
                                    <input type="text" name="customer_state" class="md-input"  value=""/>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                    <label for="email">City<span class="req">*</span></label>
                                    <input type="text" name="customer_city" class="md-input"  value=""/>
                                </div>
                            </div>
                               <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                    <label for="fullname">Country<span class="req">*</span></label>
                                    <input type="text" name="customer_country"  class="md-input" value="" />
                                </div>
                            </div>
                       </div>
                                     <div class="uk-grid " data-uk-grid-margin>
                            
                             
                            <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                    <label for="email">Postal Code<span class="req">*</span></label>
                                    <input type="text" name="customer_postal_code" class="md-input"  value=""/>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                    <label for="email">GST<span class="req">*</span></label>
                                    <input type="text" name="gst" class="md-input"  value=""/>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                    <label for="email">IEC<span class="req">*</span></label>
                                    <input type="text" name="iec" class="md-input"  value=""/>
                                </div>
                            </div>
                                         
                             </div>
                      
                    <div  id="reapeat1" style="margin-top: 20px">
                        
                        <div   class="uk-grid "  data-uk-grid-margin>
                           
                             <div class="uk-width-medium-1-3">
                                 <div class="parsley-row">

                                    <label for="email">Contact Person<span class="req">*</span></label>
                                    <input type="text"  name="contactper[contactper][]" class="md-input"  value=""/>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                    <label for="email">Email<span class="req">*</span></label>
                                    <input type="text"  name="contactper[email][]" class="md-input"  value=""/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="uk-grid" style="margin-top: 20px">
                            <div class="uk-width-1-1">
                                <button type="button" class="md-btn md-btn-success" onclick="add_more()" name="add" >Add More</button>
                            </div>
                            
                    </div>
                    
                    
                    
                    
                    
                    <div class="uk-grid " data-uk-grid-margin>
                         <div class="uk-width-medium-1-1">
                                <div class="parsley-row">
                                    <b><p>Please Select Principal </p></b>
                                    <?php 
                                    foreach ($list_principal as $principal) { 
                                        ?>
                                     <div class="checkbox">
                                        <label><input type="checkbox" name="pcheck[]"  class="pcheck" onclick="showprincple()"  id="mytable<?php echo $principal['Principal_id'];?>" value="<?php echo $principal['Principal_id'] ?>"><?php echo $principal['Principal_person'];?></label>
                                        </div>
                                    <?php                                        
                                    }
                                  
                                    ?>
                        <?php foreach ($list_principal as $principal) { 
                                    $principalid = $principal['Principal_id'];
                                    $query = $this->db->query("select * from principal_products where pid = '$principalid' ");
                                    $data =$query->result_array();
//                                       echo '<pre>';print_r($data);echo '</pre>'; 
                                     
                                     ?>
                                    
                                    
                                   
                                   
                                    
                                    <table class="ptable"  style="display:none" id="table<?php echo $principalid;?>">
                                         <caption style=" font-size: 20px;font-weight: bold;text-align: left;"><?php echo $principal['Principal_person'];?></caption>
                                         <thead>
                                            <tr>
                                                <th>Products</th>
                                                <th>Price</th>
                                                <th>Commission %</th>
                                                <th>Currency</th>
                                             </tr>
                                            </thead>
                                            <tbody>
    
                                    <?php
                                              if (!empty($data)){  foreach ($data as $singalproducts){
                                                ?>
                                              
                                              <tr>
                                                    <td><?php echo $singalproducts ['product_name']; ?></td>
                                                    <td><input type="text" name="price[<?php echo $principalid ?>][<?php echo $singalproducts['id'] ?>]"  value=""  ></td>
                                                    <td><input type="text" name="commission[<?php echo $principalid ?>][<?php echo $singalproducts['id'] ?>]" value="" >
                                                    
                                                    </td>
                                                    
                                                     <td>
                                                         <select name="currency[<?php echo $principalid ?>][<?php echo $singalproducts['id'] ?>]">
                                                             <option value="usd">USD</option>
                                                             <option value="eur">EURO</option>
                                                         </select>                                                         
                                                    
                                                    </td>
                                                </tr>
                                                 
                                               
                                   <?php
    
                                              } 
                                              }else {?>
                                                  <tr><td colspan="3">No Product Added</td></tr>
                                            <?php }
                                             
                     
                                        
                                        ?>
                                     </tbody>
                                              </table>
                                    
                                     
                                    
                           <?php  }         ?> 

                                    
                                   
                                    
                                </div>
                         </div>
                       
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>
                    <div class="uk-grid " data-uk-grid-margin>
                         
                    </div>
                        <div class="uk-grid">
                            <div class="uk-width-1-1">
                                <button type="submit" class="md-btn md-btn-primary" name="submit" onclick="return verify_upload()">Submit</button>
                            </div>
                        </div>
                   

                    <?php echo form_close();?>
                </div>
        </div>
    </div>
         <div id="preloader">
 <div id="status"></div>
</div>
    <!-- google web fonts -->
    
     <script>
        function add_more(){
            var hml='<div class="uk-grid " data-uk-grid-margin > <div class="uk-width-medium-1-3"> <div class="parsley-row"><label for="email">Contact Person<span class="req">*</span></label><input type="text"  name="contactper[contactper][]" class="md-input"  value=""/></div></div><div class="uk-width-medium-1-3"> <div class="parsley-row"><label for="email">Email<span class="req">*</span></label><input type="text"  name="contactper[email][]" class="md-input"  value=""/></div></div></div>'
                            
                jQuery("#reapeat1").append(hml);  
        }
        </script> 
     <script>
         function showprincple() 
         { 
             $(".ptable").hide();
            var amenatie = $('input:checkbox:checked.pcheck').map(function () {
           return this.value;
         }).get();
          console.log(amenatie)
         for (i = 0; i < amenatie.length; i++) { 
             var dd=amenatie[i];
             $("#table"+dd).show();
         }

    
        }
    

</script>          
    

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

    <!-- common functions 
    <script src="<?php echo base_url()?>assets/js/common.min.js"></script>-->
    <!-- uikit functions -->
    <script src="<?php echo base_url()?>assets/js/uikit_custom.min.js"></script>
    <!-- altair common functions/helpers -->
    <script src="<?php echo base_url()?>assets/js/altair_admin_common.min.js"></script>

    <!-- page specific plugins -->
    <!-- parsley (validation) -->
    <script src="<?php echo base_url()?>assets/bower_components/parsleyjs/dist/parsley.min.js"></script>

    <!--  forms validation functions
    <script src="<?php echo base_url()?>assets/js/pages/forms_validation.min.js"></script> -->



<script type="text/javascript">
function validateentry()
{

if(document.forms.contactform.customer_person.value=="")
{
 alert("Please provide your Contact Person Name.");
 document.forms.contactform.customer_person.focus();
 return false;
}
//if(document.forms.contactform.customer_email.value=="")
//{
// alert("Please provide your Customer Email.");
// document.forms.contactform.customer_email.focus();
// return false;
//}
if(document.forms.contactform.customer_phone.value=="")
{
 alert("Please  Select Your Customer Mobile Number.");
 document.forms.contactform.customer_phone.focus();
 return false;
}

if(document.forms.contactform.customer_address.value=="")
{
 alert("Please  Select Your Customer Address.");
 document.forms.contactform.customer_address.focus();
 return false;
}
if(document.forms.contactform.customer_city.value=="")
{
 alert("Please  Select Your Customer City.");
 document.forms.contactform.customer_city.focus();
 return false;
}
if(document.forms.contactform.customer_state.value=="")
{
 alert("Please  Select Your Customer State.");
 document.forms.contactform.customer_state.focus();
 return false;
}
if(document.forms.contactform.customer_country.value=="")
{
 alert("Please  Select Your Customer Country.");
 document.forms.contactform.customer_country.focus();
 return false;
}
if(document.forms.contactform.customer_postal_code.value=="")
{
 alert("Please  Select Your Customer Postal Code.");
 document.forms.contactform.customer_postal_code.focus();
 return false;
}
}
</script>


</body>
</html>


