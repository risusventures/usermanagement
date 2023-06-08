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
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/kendo-ui/styles/kendo.common-material.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/kendo-ui/styles/kendo.material.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/uikit/css/uikit.almost-flat.min.css" media="all">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/icons/flags/flags.min.css" media="all">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.min.css" media="all">
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
	<?php include('analytics.php');?> 
</head>
<body class=" sidebar_main_open sidebar_main_swipe">
  <?php include('header.php');?>
  <?php include('header_top.php');?>
    <div id="page_content" style="margin-left:0px;">
        <div id="page_content_inner">
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <h4 class="heading_a uk-margin-bottom">Daily Sales</h4>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-large-1-1">
                              <div class="md-card-content">
							<?php echo  form_open(base_url('seller/sales'))?>
                            <h3 class="heading_a"></h3>
                            <div class="uk-grid" data-uk-grid-margin="">
                                <div class="uk-width-large-1-2 uk-width-medium-1-1">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                        <div class="md-input-wrapper"><label for="uk_dp_start">Start Date</label><input class="md-input" type="text" id="uk_dp_start" name="start_date" required><span class="md-input-bar"></span></div>
                                        
                                    </div>
                                </div>
                                <div class="uk-width-large-1-2 uk-width-medium-1-1">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                        <div class="md-input-wrapper"><label for="uk_dp_end">End Date</label><input class="md-input" type="text" id="uk_dp_end" name="end_date" required><span class="md-input-bar"></span></div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div><br><br><br>  
<div class="uk-width-medium-1-4"><input type="submit" class="md-btn md-btn-primary" href="#" value="Search Sales" name="submit"></div><br><br>
<?php if(isset($_POST['submit'])){
    if($sales){
foreach ($sales as $key) { ?>       
<div class="uk-grid uk-grid-width-small-1-2 uk-grid-width-large-1-3 uk-grid-width-xlarge-1-4 uk-text-center uk-sortable sortable-handler" id="dashboard_sortable_cards" data-uk-sortable="" data-uk-grid-margin="">
           
                <div>
                   <div class="md-card md-card-hover md-card-overlay" style="background-color:#f88529">
                        <div class="md-card-content uk-flex uk-flex-center uk-flex-middle">
                         <span style="font-size:35px;color:white"><h2 style="color:white"><?php if($key['orders']==null){ echo '0';}else{ echo $key['orders'];}?></h2><b style="font-size: 26px;">Orders</b></span>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                <div class="md-card md-card-hover md-card-overlay"  style="background-color: rgba(0, 128, 0, 0.68);">
                        <div class="md-card-content uk-flex uk-flex-center uk-flex-middle">
                         <span style="font-size:35px;color:white;"><h2 style="color:white">RS.<?php if($key['subtotal']==null){ echo '0';}else{ echo $key['subtotal'];}?>/-</h2><b style="font-size: 26px;">Total Amount</b></span>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                            </div>
                        </div>
                    </div>
                </div>
                <div>

                           <div class="md-card md-card-hover md-card-overlay"  style="background-color:#1976D2;">
                        <div class="md-card-content uk-flex uk-flex-center uk-flex-middle">
                         <span style="font-size:35px;color:white;"><h2 style="color:white">Rs.<?php if($key['paid']==null){ echo '0';}else { echo $key['paid'];}?></h2><b style="font-size: 26px;">Paid</b></span>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                 <div class="md-card md-card-hover md-card-overlay" style="background-color:#52B9E9;">
                        <div class="md-card-content uk-flex uk-flex-center uk-flex-middle" style="background-color: rebeccapurple">
                         <span style="font-size:35px;color:white"><h2 style="color:white">Rs.<?php if($key['pending']==null){ echo '0';} else { echo $key['pending'];} ?></h2><b style="font-size: 26px;">Pending</b></span>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }}else{echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
                                <a href="#" class="uk-alert-close uk-close"></a>
                             Not Found Sales Report....
                            </div>';}}?>
                          </div>
                            </div>
                         <?php echo form_close();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php print_r($data);?>
   <script src="<?php echo base_url();?>assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="<?php echo base_url();?>assets/js/uikit_custom.min.js"></script>
    <!-- altair common functions/helpers -->
    <script src="<?php echo base_url();?>assets/js/altair_admin_common.min.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/ion.rangeslider/js/ion.rangeSlider.min.js"></script>
    <!-- htmleditor (codeMirror) -->
    <script src="<?php echo base_url();?>assets/js/uikit_htmleditor_custom.min.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.js"></script>
    <script src="<?php echo base_url();?>assets/js/pages/forms_advanced.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-ui.min.js"></script>

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