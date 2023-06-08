
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
       <?php if($_GET['wrong']==1)
    { echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a> Your old password  is not matching.........</div>';}?>
      <?php if($_GET['wrong']==2)
    { echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>Password must be more than 3 char legth and maximum 8 char lenght</div>';}?>

       <?php if($_GET['wrong']==3)
    { echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>Both passwords are not matching</div>';}?>

      <?php if($_GET['success']==password)
    { echo '<div class="uk-alert uk-alert-success" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a><center>Thanks <br> Your password changed successfully. Please keep changing your password for better security</font></center></div>';}?>

        <div class="md-card">
            <div class="md-card-content">
                <h3 class="heading_a">Change Password</h3>
                <div class="uk-grid" data-uk-grid-margin="">
                     <div class="uk-width-medium-1-1 uk-row-first">
                        <form method="post" autocomplete="off" id="password_form" name="" action="<?php echo base_url();?>seller/change_password">
                        
                        <input type="hidden" name="todo" value="change-password" class="md-input ng-pristine ng-untouched ng-valid ng-isolate-scope md-input-processed" ng-model="form.input_b" md-input="" name="old_password">
                        
                        <div class="uk-form-row">
                            <div class="md-input-wrapper"><label>Old Passsword</label><input type="password" class="md-input ng-pristine ng-untouched ng-valid ng-isolate-scope md-input-processed" ng-model="form.input_b" md-input="" name="old_password"><span class="md-input-bar"></span></div> 
                        </div>
                          <div class="uk-form-row">
                            <div class="md-input-wrapper"><label>New  Passsword</label><input type="password" class="md-input ng-pristine ng-untouched ng-valid ng-isolate-scope md-input-processed" ng-model="form.input_b" md-input="" name="newpassword"><span class="md-input-bar"></span></div> 
                        </div>
                          <div class="uk-form-row">
                            <div class="md-input-wrapper"><label>Confirm Passsword</label><input type="password" class="md-input ng-pristine ng-untouched ng-valid ng-isolate-scope md-input-processed" ng-model="form.input_b" md-input="" name="re-password"><span class="md-input-bar"></span></div> 
                        </div>
                        <div class="uk-form-row">
                      <center><div class="uk-width-medium-1-4">
                        <input type="submit" class="md-btn md-btn-primary md-btn-block md-btn-wave-light waves-effect waves-button waves-light" value="Save Password">
                        </div></center> 
                        </div>
                    </div>
                </div>
         </form>

            </div>
        </div>

    </div>
    </div>

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

</body>
</html>

