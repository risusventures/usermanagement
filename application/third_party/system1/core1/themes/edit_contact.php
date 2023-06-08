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
</head>
<body class=" sidebar_main_open sidebar_main_swipe">
  <?php include('header.php');?>
   <?php include('header_top.php');?>
    <div id="page_content" style="margin-left:0px;">
        <div id="page_content_inner">
            <h3 class="heading_b uk-margin-bottom">Edit Business Profile</h3>
            <div class="md-card">
                <div class="md-card-content large-padding">
             <div class="md-card-content large-padding">
                 <?php $message=$_GET['message'];
            if($message){ echo '<div class="uk-alert uk-alert-info" data-uk-alert="">
                                <a href="#" class="uk-alert-close uk-close"></a>
                             Added Contact Profile Successfully....
                            </div>';}?>
					<form id="form_validation" name="contactform" id="contactform" onsubmit="return validateentry();" class="uk-form-stacked" action="<?php echo base_url();?>profile/update_contact" method="post" enctype="multipart/form-data">
                        <?php foreach ($records as $key) {?>
                    <input type="hidden" name="uid" value="<?php echo $key['cp_id'];?>">
                     <div  class="uk-grid" data-uk-grid-margin style="float:left;">
                     <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }" style="padding-right:10px;">
                                <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="<?php echo base_url();?>assets/file_icon/profile_image/<?php echo $key['image'];?>" alt="user avatar"/>
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <p>Upload Logo</p>
                                    <div class="user_avatar_controls">
                                    <span class="btn-file">
                                    <span class="fileinput-new"><i class="material-icons">&#xE2C6;</i></span>
                                    <span class="fileinput-exists"><i class="material-icons">&#xE86A;</i></span>
                 <input type="file" name="image" id="user_edit_avatar_control" onchange="check_upload(this)" value="<?php echo $key['image'];?>">
                                        </span>
                                        <a href="#" class="btn-file fileinput-exists" data-dismiss="fileinput"><i class="material-icons">&#xE5CD;</i></a>
                                    </div>
                                </div>
                            </div></div>  
                        <div class="uk-grid " data-uk-grid-margin>
                            <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                 <label for="fullname">Contact Person Name<span class="req">*</span></label>
                                 <input type="text" name="contact_name"  class="md-input" value="<?php echo $key['contact_name'];?>" />
                                </div>
                            </div>
                                <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                     <label for="fullname">CEO Name<span class="req">*</span></label>
                                     <input type="text" name="ceo_name" class="md-input" value="<?php echo $key['ceo_name'];?>" />
                                </div>
                            </div>
                            <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                     <label for="email">Email<span class="req">*</span></label>
                                    <input type="text" name="email"   class="md-input"  value="<?php echo $key['email'];?>" />
                                </div>
                            </div>
                        </div>

                       <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                <label for="fullname">Bussiness Name<span class="req">*</span></label>
                                <input type="text" name="company_name" class="md-input"  value="<?php echo $key['company_name'];?>"/>
                                </div>
                            </div>

                               <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                    <label for="fullname">Bussines Address<span class="req">*</span></label>
                                    <input type="text" name="address"  class="md-input" value="<?php echo $key['address'];?>"/>
                                </div>
                            </div>

                               <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                   <label for="fullname">City<span class="req">*</span></label>
                                    <input type="text" name="city"  class="md-input" value="<?php echo $key['city'];?>"/>
                                </div>
                            </div>		
                </div>
<div class="uk-grid" data-uk-grid-margin="">
<div class="uk-width-medium-1-3">
<div class="parsley-row">

<label for="fullname">State<span class="req">*</span></label>
<input type="text" name="state"  class="md-input" value="<?php echo $key['state'];?>"/>
</span>
</div>
</div>
<div class="uk-width-medium-1-3">
<div class="parsley-row">
<label for="fullname">Postal Code<span class="req">*</span></label>
<input type="number" name="postal_code" class="md-input"  value="<?php echo $key['postal_code'];?>"/>
<span class="md-input-bar"></span>
</div>
</div>
<div class="uk-width-medium-1-3">
<div class="parsley-row">
<label for="fullname">Mobile Number<span class="req">*</span></label>
<input type="number" name="mobile_number"  class="md-input" value="<?php echo $key['mobile_number'];?>"/>
<span class="md-input-bar"></span>
</div>
</div>
</div>

<div class="uk-grid" data-uk-grid-margin="">
<div class="uk-width-medium-1-2">
<div class="parsley-row">
<label for="fullname">Fax Number<span class="req">*</span></label>
<input type="number" name="fax_number"  class="md-input" value="<?php echo $key['fax_number'];?>"/>
</span>
</div>
</div>
<div class="uk-width-medium-1-2">
<div class="parsley-row">
<label for="fullname">Website<span class="req">*</span></label>
<input type="text" name="website" class="md-input" value="<?php echo $key['website'];?>" />
<span class="md-input-bar"></span></div>
</div>
</div>
 <?php }?>                  <div class="uk-grid">
                            <div class="uk-width-1-1" style=margin:auto;>
                          <center><button type="submit" class="md-btn md-btn-primary" name="submit" onclick="return verify_upload()">Submit</button></center>
                            </div>
                        </div>

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
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','../www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-65191727-1', 'auto');
        ga('send', 'pageview');
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
if(document.forms.contactform.contact_name.value=="")
{
 alert("Please provide your Contact Person Name.");
 document.forms.contactform.contact_name.focus();
 return false;
}
if(document.forms.contactform.ceo_name.value=="")
{
 alert("Please provide your CEO Name.");
 document.forms.contactform.ceo_name.focus();
 return false;
}

var emailentry=document.forms.contactform.email.value;
at=emailentry.indexOf("@");
period=emailentry.lastIndexOf(".");
if(at < 1 || ( period - at < 2 )) 
{
   alert("Please enter correct email in the format of 'yourmail@yourwebsite.com'")
   document.forms.contactform.email.focus();
   return false;
}

if(document.forms.contactform.company_name.value=="")
{
 alert("Please provide your Bussiness Name.");
 document.forms.contactform.company_name.focus();
 return false;
}

if(document.forms.contactform.address.value=="")
{
 alert("Please provide your Bussiness Address.");
 document.forms.contactform.address.focus();
 return false;
}

if(document.forms.contactform.city.value=="")
{
 alert("Please provide your City.");
 document.forms.contactform.city.focus();
 return false;
}
if(document.forms.contactform.state.value=="")
{
 alert("Please provide your State.");
 document.forms.contactform.state.focus();
 return false;
}

if(document.forms.contactform.mobile_number.value=="")
{
 alert("Please provide a phone number in the format 9827736565.");
 document.forms.contactform.mobile_number.focus();
 return false;
}
else if(document.forms.contactform.mobile_number.value.length < 10)
{
    alert("Please provide the phone number in the format of 9827736565.");
    document.forms.contactform.mobile_number.focus();
        return false;
}
    else
    {
    var validnumber=validatephonenumber();
    if(validnumber==false)
    {
    return false;
    }}


}

</script>
<script type="text/javascript">
function check_upload(upload_field)
{    
    var re_text = /\.jpg|\.png|\.gif/i;    
    var filename = upload_field.value;
    // Checking file type
    if (filename.search(re_text) == -1)    
    {        
    alert("File does not have (jpg / gif / png) extension");    
    upload_field.value = '';
    return false;    
    }
    return true;
}   
 


</body>
</html>


