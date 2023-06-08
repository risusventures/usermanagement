<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no"/>
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/favicon-32x32.png" sizes="32x32">
    <title>Seller Panel</title>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/uikit/css/uikit.almost-flat.min.css" media="all">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/icons/flags/flags.min.css" media="all">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/main.min.css" media="all">
</head>
<body class=" sidebar_main_open sidebar_main_swipe">
    <?php include('header.php');?><!-- main header end -->
    <!-- main sidebar -->
   <?php include('aside.php');?>
    <div id="page_content">
        <div id="page_content_inner">
            <h3 class="heading_b uk-margin-bottom">message</h3>
            <div class="md-card">             
                <div class="md-card-content large-padding">
                    <form id="form_validation" name="contactform" id="contactform" action="<?php echo base_url()?>notification_ctrl/add_notification" class="uk-form-stacked" action="" method="post">
                    <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                    <label for="fullname"><span class="req">*</span></label>

<?php echo smiley_js(); ?>
                                  <form name="blog">
                   <textarea name="message" id="comments" cols="40" rows="4"></textarea>
            </form>                         
        <p>Click to insert a smiley!</p>

<?php echo $smiley_table; ?>
                                </div>
                            </div>
                        <div class="uk-grid">
                            <div class="uk-width-1-1">
                                <button type="submit" class="md-btn md-btn-primary">Submit</button>
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
    <script>
    // load parsley config (altair_admin_common.js)
    altair_forms.parsley_validation_config();
    </script>
    <script src="<?php echo base_url()?>assets/bower_components/parsleyjs/dist/parsley.min.js"></script>
    <!--  forms validation functions -->
    <script src="<?php echo base_url()?>assets/js/pages/forms_validation.min.js"></script>
</body>
</html>