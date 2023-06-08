<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css" media="all">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no"/>
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/finacbook_icon.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/finacbook_icon.png" sizes="32x32">
    <title>FinacBooks</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/uikit/css/uikit.almost-flat.min.css"
          media="all">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/icons/flags/flags.min.css" media="all">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.min.css" media="all">
    <script src="<?php echo base_url(); ?>assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="<?php echo base_url(); ?>assets/js/uikit_custom.min.js"></script>
    <style>
        #preloader {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #fefefe;
            z-index: 99;
            height: 100%;
        }

        #status {
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
        jQuery(window).load(function () {
            // will first fade out the loading animation
            jQuery("#status").fadeOut();
            // will fade out the whole DIV that covers the website.
            jQuery("#preloader").delay(1000).fadeOut("slow");
        })
    </script>
    <?php include('analytics.php'); ?>
</head>
<body class=" sidebar_main_open sidebar_main_swipe">
<?php include('header.php'); ?>
<?php include('header_top.php'); ?>
<div id="page_content" style="margin-left:0px;">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Upload Csv File</h3>
        <div class="md-card">
            <?php if ($_GET['message'] == upload) {
                echo '<div class="uk-alert uk-alert-success" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>Upload file Successfully......</div>';
            } ?>
            <div class="md-card-content">
                <h3 class="heading_a">
                    <a href="<?php echo base_url(); ?>images/down.csv" target="_blank" class="md-btn md-btn-primary"
                       style="background-color:green">Demo Csv File </a>
                </h3>
                <br>
                <?php echo form_open(site_url('seller/csv'), array('id' => 'contactform', 'name' => 'contactform', 'onsubmit' => 'return validateentry();', 'class' => 'uk-form-stacked', 'enctype' => 'multipart/form-data')); ?>
                <div class="uk-grid">
                    <div class="uk-width-1-1">
                        <div id="file_upload-drop" class="uk-file-upload">
                            <p class="uk-text">Drop file to upload</p>
                            <p class="uk-text-muted uk-text-small uk-margin-small-bottom">or</p>
                            <a class="uk-form-file md-btn">Select CSV File<input id="file_upload-select" type="file"
                                                                                 name="file"
                                                                                 onchange="check_upload(this)"></a>
                        </div>
                        <div id="file_upload-progressbar" class="uk-progress uk-hidden">
                            <div class="uk-progress-bar" style="width:0">0%</div>
                        </div>
                        <br>
                        <input type="Submit" class="md-btn md-btn-primary" onclick="return verify_upload()">
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>

    </div>
</div>
<div id="preloader">
    <div id="status"></div>
</div>
<script>
    WebFontConfig = {
        google: {
            families: [
                'Source+Code+Pro:400,700:latin',
                'Roboto:400,300,500,700,400italic:latin'
            ]
        }
    };
    (function () {
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
<!-- altair common functions/helpers -->
<script src="<?php echo base_url(); ?>assets/js/altair_admin_common.min.js"></script>
<!-- page specific plugins -->
<!--  forms_file_upload functions -->
<script src="<?php echo base_url(); ?>assets/js/pages/forms_file_upload.min.js"></script>

<script>
    $(function () {
        // enable hires images
        altair_helpers.retina_images();
        // fastClick (touch devices)
        if (Modernizr.touch) {
            FastClick.attach(document.body);
        }
    });
</script>
<script type="text/javascript">
    function check_upload(upload_field) {
        var re_text = /\.csv/i;
        var filename = upload_field.value;
        if (filename.search(re_text) == -1) {
            alert("File does not have (.csv) extension");
            upload_field.value = '';
            return false;
        }
        return true;
    }
</script>
<script type="text/javascript">
    function verify_upload() {
        if (document.contactform.file.value == "") {
            alert("Please select a file");
            return false;
        }
        return true;
    }
</script>


</body>
</html>