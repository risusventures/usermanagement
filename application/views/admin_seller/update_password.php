<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css" media="all">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no"/>
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/risus-03.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/risus-03.png" sizes="32x32">
    <title>Risus Ventures</title>
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/uikit/css/uikit.almost-flat.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/login_page.min.css"/>
    <?php include('analytics.php'); ?>

</head>
<body class="login_page" style="background-image:url('<?php echo base_url(); ?>assets/img/bg.jpg')">
<div class="login_page_wrapper">

    <?php if (isset($message1)) {
        echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
                                <a href="#" class="uk-alert-close uk-close"></a>' . $message1 . '</div>';
    } ?>
    <?php if (isset($message_display)) {
        echo '<div class="uk-alert uk-alert-success" data-uk-alert="">
                                <a href="#" class="uk-alert-close uk-close"></a>' . $message_display . '</div>';
    } ?>

    <?php if (isset($_GET['email'])) {
        echo '<div class="uk-alert uk-alert-success" data-uk-alert="">
                                <a href="#" class="uk-alert-close uk-close"></a>check your email for instructions, thank you</div>';
    } ?>
    <div class="md-card" id="login_card">
        <div class="md-card-content large-padding" id="login_form">
            <div class="login_heading">
                <div class="user_avatar"
                     style="background-image:url(<?php //echo base_url()?>assets/img/risus-03.png); height:165px; width:100%; background-color:white;">
                    <img src="<?php echo base_url() ?>assets/img/risus-03.png">

                </div>
            </div>
            <?php echo form_open(site_url() . '/update_password', array('id' => 'update_password', 'method' => 'post', 'role' => 'form')) // echo form_open(base_url('user_ctrl/login'),array('id'=>'login','method'=>'post','role'=>'form'))?>
            <div class="uk-form-row">
                <label for="login_password">Password</label>
                <input class="md-input" type="password" id="login_password" name="password"/>
            </div>
            <div class="uk-form-row">
                <label for="login_cpassword">Confirm Password</label>
                <input class="md-input" type="password" id="login_cpassword" name="cpassword"/>
            </div>
            <div class="uk-margin-medium-top">
                <a href="javascript:;"> <input type="submit" name="submit" value="Update Password"
                                               class="md-btn md-btn-primary md-btn-block md-btn-large"></a>
            </div>
            <?php echo form_close(); ?>

        </div>
    </div>

</div>

<!-- common functions -->
<!--<script src="<?php echo base_url() ?>assets/js/common.min.js"></script>-->
<!-- altair core functions -->
<!--<script src="<?php echo base_url() ?>assets/js/altair_admin_common.min.js"></script>-->

<!-- altair login page functions -->
<!--<script src="<?php echo base_url() ?>assets/js/pages/login.min.js"></script>-->

<!--<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','../www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-65191727-1', 'auto');
    ga('send', 'pageview');
</script>-->

<style>
    body {
        background: #fafafa;
    }

    .container {
        width: 800px;
        border: 1px solid #C4CDE0;
        border-radius: 2px;
        margin: 0 auto;
        height: 400px;
        background: #fff;
        padding-left: 10px;
    }

    .button {
        background: #090;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        padding: 3px 6px;
        text-decoration: none;
        cursor: pointer;
    }
</style>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
    function ajaxindicatorstart(text) {
        if (jQuery('body').find('#resultLoading').attr('id') != 'resultLoading') {
            jQuery('body').append('<div id="resultLoading" style="display:none"><div><img src="<?php echo base_url();?>assets/img/ajax-loader.gif"><div>' + text + '</div></div><div class="bg"></div></div>');
        }

        jQuery('#resultLoading').css({
            'width': '100%',
            'height': '100%',
            'position': 'fixed',
            'z-index': '10000000',
            'top': '0',
            'left': '0',
            'right': '0',
            'bottom': '0',
            'margin': 'auto'
        });

        jQuery('#resultLoading .bg').css({
            'background': '#000000',
            'opacity': '0.7',
            'width': '100%',
            'height': '100%',
            'position': 'absolute',
            'top': '0'
        });

        jQuery('#resultLoading>div:first').css({
            'width': '250px',
            'height': '75px',
            'text-align': 'center',
            'position': 'fixed',
            'top': '0',
            'left': '0',
            'right': '0',
            'bottom': '0',
            'margin': 'auto',
            'font-size': '16px',
            'z-index': '10',
            'color': '#ffffff'

        });

        jQuery('#resultLoading .bg').height('100%');
        jQuery('#resultLoading').fadeIn(300);
        jQuery('body').css('cursor', 'wait');
    }

    function ajaxindicatorstop() {
        jQuery('#resultLoading .bg').height('100%');
        jQuery('#resultLoading').fadeOut(300);
        jQuery('body').css('cursor', 'default');
    }

    function callAjax() {
        jQuery.ajax({
            type: "GET",
            url: "dashboard",
            cache: false,
            success: function (res) {
                jQuery('#ajaxcontent').html(res);
            }
        });
    }

    jQuery(document).ajaxStart(function () {
        //show ajax indicator
        ajaxindicatorstart('AdminLogin.. please wait..');
    }).ajaxStop(function () {
        //hide ajax indicator
        ajaxindicatorstop();
    });
</script>
</body>
</html>