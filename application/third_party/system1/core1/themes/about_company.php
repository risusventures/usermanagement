<!doctype html>
<?php $pages='about';?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/finacbook_icon.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/finacbook_icon.png" sizes="32x32">
    <title>FinacBooks</title> <link rel="stylesheet"
href="<?php echo base_url()?>assets/bower_components/uikit/css/uikit.almost-flat.min.css" media="all">
<link rel="stylesheet" href="<?php echo base_url()?>assets/icons/flags/flags.min.css" media="all">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/main.min.css" media="all">
<script src="<?php echo base_url()?>assets/js/pages/forms_file_upload.min.js"></script><?php include('analytics.php');?> </head> <body
class=" sidebar_main_open sidebar_main_swipe">    
<!-- main header end -->
<?php include('header.php');?>    <!-- main sidebar -->
   <?php include('aside.php');?>
    <div id="page_content">
        <div id="page_content_inner">
            <h3 class="heading_b uk-margin-bottom">About Us</h3>
            <div class="md-card">
                <div class="md-card-content large-padding">
                                 <?php if(isset($message))
             { echo '<div class="uk-alert uk-alert-success" data-uk-alert="">
                    <a href="#" class="uk-alert-close uk-close"></a>Create About Company Profile Successfully......</div>';}?>
                    <form novalidate="" id="form_validation" class="uk-form-stacked" method="post" action="<?php echo base_url()?>profile/create_about">
                        <div class="uk-grid" data-uk-grid-margin="">
                            <div class="uk-width-medium-1-1">
                                <div class="parsley-row">
                                    <div class="md-input-wrapper"><label for="fullname">About Us Heading<span class="req">*</span></label><input  name="about_company" class="md-input" type="text"><span class="md-input-bar"></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="uk-grid">
                            <div class="uk-width-1-1">
                                <div class="parsley-row">
                                    <div class="md-input-wrapper "><label for="message">Description </label><textarea name="about_description" data-parsley-id="32" style="overflow-x: hidden; word-wrap: break-word; height: 217px;" class="md-input"  cols="10" rows="8"   ></textarea><span class="md-input"></span></div>
        
                                <div id="parsley-id-32" class="parsley-errors-list"></div></div>
                            </div>
                        </div>
                        <div class="uk-grid">
                            <div class="uk-width-1-1">
                                <button type="submit" name="submit" class="md-btn md-btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
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
    <script>
    altair_forms.parsley_validation_config();
    </script>
    <script src="<?php echo base_url()?>assets/bower_components/parsleyjs/dist/parsley.min.js"></script>
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
      <script src="<?php echo base_url()?>assets/js/pages/forms_file_upload.min.js"></script>
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