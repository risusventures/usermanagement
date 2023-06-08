<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no"/>
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/finacbook_icon.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/finacbook_icon.png" sizes="32x32">
    <title>FinacBooks</title>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/uikit/css/uikit.almost-flat.min.css" media="all">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/icons/flags/flags.min.css" media="all">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/main.min.css" media="all">
    <script src="<?php echo base_url()?>assets/js/common.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/custom/uikit_fileinput.min.js"></script>
	<?php include('analytics.php');?> 
</head>
<body class=" sidebar_main_open sidebar_main_swipe">
  <?php include('header.php');?>
   <?php include('header_top.php');?>
    <div id="page_content" style="margin-left:0px;">
        <div id="page_content_inner">
            <h3 class="heading_b uk-margin-bottom"> Edit Customer</h3>
            <div class="md-card">
                <div class="md-card-content large-padding">
                    <form id="form_validation"   name="contactform" id="contactform" onsubmit="return validateentry();"  class="uk-form-stacked" action="<?php echo base_url();?>seller/update_customer" enctype="multipart/form-data" Method="post">
                        <?php foreach ($edit_customer as $row) {?>
                         <input type="hidden" name="uid" value="<?php echo $row['customer_id'];?>"> 
                        <div class="uk-grid " data-uk-grid-margin>
                            <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                    <label for="fullname">Company Name<span class="req">*</span></label>
                                    <input type="text" name="customer_company"  class="md-input" value="<?php echo $row['customer_company'];?>"/>
                                </div>
                            </div>
                                <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                    <label for="fullname">Contact Person<span class="req">*</span></label>
                                    <input type="text" name="customer_person"  class="md-input" value="<?php echo $row['customer_person'];?>" />
                                </div>
                            </div>
                            <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                    <label for="email">Email Address<span class="req">*</span></label>
                                    <input type="text" name="customer_email" class="md-input"  value="<?php echo $row['customer_email'];?>"/>
                                </div>
                            </div>
                        </div>


                                     <div class="uk-grid " data-uk-grid-margin>
                            <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                    <label for="fullname">Phone<span class="req">*</span></label>
                                    <input type="text" name="customer_phone"  class="md-input" value="<?php echo $row['customer_phone'];?>"/>
                                </div>
                            </div>
                                <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                    <label for="fullname">Address<span class="req">*</span></label>
                                    <input type="text" name="customer_address"  class="md-input" value="<?php echo $row['customer_address'];?>" />
                                </div>
                            </div>
                            <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                    <label for="email">City<span class="req">*</span></label>
                                    <input type="text" name="customer_city" class="md-input"  value="<?php echo $row['customer_city'];?>"/>
                                </div>
                            </div>
                        </div>



                                     <div class="uk-grid " data-uk-grid-margin>
                            <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                    <label for="fullname">State<span class="req">*</span></label>
                                    <input type="text" name="customer_state"  class="md-input" value="<?php echo $row['customer_state'];?>"/>
                                </div>
                            </div>
                                <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                    <label for="fullname">Country<span class="req">*</span></label>
                                    <input type="text" name="customer_country"  class="md-input" value="<?php echo $row['customer_country'];?>" />
                                </div>
                            </div>
                            <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                    <label for="email">Postal Code<span class="req">*</span></label>
                                    <input type="text" name="customer_postal_code" class="md-input"  value="<?php echo $row['customer_postal_code'];?>"/>
                                </div>
                            </div>
                        </div>

                
                        <div class="uk-grid">
                            <div class="uk-width-1-1">
                                <button type="submit" onclick="return ConfirmDialog()" class="md-btn md-btn-primary" name="submit" onclick="return verify_upload()">Submit</button>
                            </div>
                        </div>
                 <?php }?>
                    </form>
                </div>
        </div>
    </div>

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

    <!-- page specific plugins -->
    <!-- parsley (validation) -->
    <script src="<?php echo base_url()?>assets/bower_components/parsleyjs/dist/parsley.min.js"></script>

    <!--  forms validation functions -->
    <script src="<?php echo base_url()?>assets/js/pages/forms_validation.min.js"></script>
    <script>
        $(function() {
            // enable hires images
            altair_helpers.retina_images();
            // fastClick (touch devices)
            if(Modernizr.touch) {
                FastClick.attach(document.body);
            }
        });
    </script>
  
    <script>
        $(function() {
            // enable hires images
            altair_helpers.retina_images();
            // fastClick (touch devices)
            if(Modernizr.touch) {
                FastClick.attach(document.body);
            }
        });
    </script>
<script type="text/javascript">
function validateentry()
{
if(document.forms.contactform.customer_company.value=="")
{
 alert("Please provide your Company Name.");
 document.forms.contactform.customer_company.focus();
 return false;
}
if(document.forms.contactform.customer_person.value=="")
{
 alert("Please provide your Contact Person Name.");
 document.forms.contactform.customer_person.focus();
 return false;
}
if(document.forms.contactform.customer_email.value=="")
{
 alert("Please provide your Customer Email.");
 document.forms.contactform.customer_email.focus();
 return false;
}
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

    <script type="text/javascript">
function ConfirmDialog() {
  var x=confirm("Are you sure to Update record?")
  if (x) {
    return true;
  } else {
    return false;
  }
}


</script>

</body>
</html>


