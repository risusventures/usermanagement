<?php error_reporting(0);?>
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
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/uikit/css/uikit.almost-flat.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/login_page.min.css" />
	<?php include('analytics.php');?> 
</head>
<body class="login_page" style="background-image:url('<?php echo base_url();?>assets/img/bg.jpg')">
    <div class="login_page_wrapper">
                            <?php if($_GET['emailsent']==success)
        {  echo '<div class="uk-alert uk-alert-success" data-uk-alert="">
        <a href="#" class="uk-alert-close uk-close"></a>You are Successfully Registered! Please confirm the mail sent to your Email-ID</div>';}?>
		                     <?php if($_GET['email']==1)
        {  echo '<div class="uk-alert uk-alert-success" data-uk-alert="">
        <a href="#" class="uk-alert-close uk-close"></a>Your Email Address is successfully verified! Please login to access your account!</div>';}?>
			         <?php if($_GET['email']==2)
        {  echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
        <a href="#" class="uk-alert-close uk-close"></a>Sorry! There is error verifying your Email Address!</div>';}?>

		
        <div class="md-card" id="login_card">
            <div class="md-card-content large-padding" id="login_form">
                <div class="login_heading">
                <h3>Create an Account</h3>
                </div>
				<?php echo form_open(base_url('user_ctrl/register'),array('id'=>'login','method'=>'post'))?>
                        <div class="uk-form-row">
                        <label for="login_username">Mobile Number</label>
                        <input class="md-input" type="text" id="login_username" name="number" />
                             <?php if(form_error('number')!=null)
        {  echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">'.form_error('number').'</div>';}?>

                    </div>
                    <div class="uk-form-row">
                        <label for="login_username">Email</label>
                        <input class="md-input" type="text" id="login_username" name="email" />
            <?php if(form_error('email')!=null)
        {  echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">'.form_error('email').'</div>';}?>
                    </div>
                    <div class="uk-form-row">
                        <label for="login_password">Password</label>
                        <input class="md-input" type="password" id="login_password" name="password" />
           <?php if(form_error('password')!=null)
        {  echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">'.form_error('password').'</div>';}?>
                    </div>
                    <div class="uk-margin-medium-top">
                        <input type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large" value="Register" >
                    </div>
                       <div class="uk-margin-top uk-text-center">
            <a href="<?php echo base_url()?>" id="">Login account</a>
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