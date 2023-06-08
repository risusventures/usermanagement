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
        <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/weather-icons/css/weather-icons.min.css" media="all">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/metrics-graphics/dist/metricsgraphics.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/chartist/dist/chartist.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/uikit/css/uikit.almost-flat.min.css" media="all">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/icons/flags/flags.min.css" media="all">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/main.min.css" media="all">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
	<?php include('analytics.php');?> 
</head>

<body class=" sidebar_main_open sidebar_main_swipe">
    <?php include('header.php');?><!-- main header end -->
   <?php include('aside.php');?>
    <div id="page_content">
        <div id="page_content_inner">
                          <?php if($_GET['message']==1)
    { echo '<div class="uk-alert uk-alert-info" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>Company Profile Updated  Successfully......</div>';}?>
            <div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler hierarchical_show" data-uk-sortable data-uk-grid-margin>
                <div>
                    <div class="md-card">  
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_visitors peity_data">5,3,9,6,5,9,7</span></div>
                            <span class="uk-text-muted uk-text-small">Total Category</span>
                            
                            <h2 class="uk-margin-remove"><span class="countUpMe"><?php echo $records[0]['cat']; ?></span></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_sale peity_data">5,3,9,6,5,9,7,3,5,2</span></div>
                            <span class="uk-text-muted uk-text-small">Products</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe"><?php echo $records1[0]['pro']; ?></span></h2>
                        </div>
                    </div>
                </div>
                <div>

                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_orders peity_data">64/100</span></div>
                            <span class="uk-text-muted uk-text-small">Orders Completed</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript>64</noscript></span>%</h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_live peity_data">5,3,9,6,5,9,7,3,5,2,5,3,9,6,5,9,7,3,5,2</span></div>
                            <span class="uk-text-muted uk-text-small">Visitors (live)</span>
                            <h2 class="uk-margin-remove" id="peity_live_text">46</h2>
                        </div>
                    </div>
                </div>
            </div>

            <!-- large chart -->
            <div class="uk-grid">

                <div class="uk-width-1-1">
                    <div class="md-card">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <i class="md-icon material-icons md-card-fullscreen-activate">&#xE5D0;</i>
                            </div>
                            <h3 class="md-card-toolbar-heading-text">
                            Company Profile
                            </h3>
                        </div>
                        <div class="md-card-content">
                            <div class="mGraph-wrapper">
                                <div id="mGraph_sale" class="mGraph"><?php include('company_profile.php');?></div>
                            </div>
                            <div class="md-card-fullscreen-content">
                                <div class="uk-overflow-container">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- circular charts -->
            <?php foreach ($invoice as $invoice) {?>
         <div class="uk-grid uk-grid-width-small-1-2 uk-grid-width-large-1-3 uk-grid-width-xlarge-1-5 uk-text-center uk-sortable sortable-handler" id="dashboard_sortable_cards" data-uk-sortable="" data-uk-grid-margin="">
           
                <div>
                   <div class="md-card md-card-hover md-card-overlay" style="background-color:#f88529">
                        <div class="md-card-content uk-flex uk-flex-center uk-flex-middle">
                         <span style="font-size:35px;color:white"><h2><?php echo $invoice['invoice'];?></h2><b style="font-size: 26px;">Orders</b></span>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                <div class="md-card md-card-hover md-card-overlay" style="background-color: rgba(0, 128, 0, 0.68);">
                        <div class="md-card-content uk-flex uk-flex-center uk-flex-middle">
                         <span style="font-size:35px;color:white;"><h2>RS.<?php if($invoice['total']){echo $invoice['total'];}else { echo '0';}?>/-</h2><b style="font-size: 26px;">Total Amount</b></span>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                            </div>
                        </div>
                    </div>
                </div>
                <div>

                           <div class="md-card md-card-hover md-card-overlay" style="background-color:#1976D2;">
                        <div class="md-card-content uk-flex uk-flex-center uk-flex-middle">
                         <span style="font-size:35px;color:white;"><h2>Rs.<?php if($invoice['paid']){echo $invoice['paid'];}else{ echo '0';}?></h2><b style="font-size: 26px;">Paid</b></span>
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
                         <span style="font-size:35px;color:white"><h2>Rs.<?php if($invoice['pending']){echo $invoice['pending'];}else { echo '0';}?></h2><b style="font-size: 26px;">Pending</b></span>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                            </div>
                        </div>
                    </div>
                </div>
				  <div>

                           <div class="md-card md-card-hover md-card-overlay" style="background-color:#fa3031;">
                        <div class="md-card-content uk-flex uk-flex-center uk-flex-middle">
                         <span style="font-size:35px;color:white;"><h2><?php if($invoice['canceled']){echo $invoice['canceled'];}else{ echo '0';}?></h2><b style="font-size: 26px;">Canceled</b></span>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
   <?php }?>
            <!-- tasks -->
         

            <!-- info cards -->
        </div>
    </div>

    <!-- secondary sidebar -->
   <!-- secondary sidebar end -->

    <!-- google web fonts -->
   
    <script src="<?php echo base_url()?>assets/js/common.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/uikit_custom.min.js"></script>
    <!-- altair common functions/helpers -->
    <script src="<?php echo base_url()?>assets/js/altair_admin_common.min.js"></script>

    <!-- page specific plugins -->
        <!-- d3 -->
		<script src="<?php echo base_url()?>assets/js/autocomplete.js1"></script>
        <script src="<?php echo base_url()?>assets/bower_components/d3/d3.min.js"></script>
        <!-- metrics graphics (charts) -->
        <script src="<?php echo base_url()?>assets/bower_components/metrics-graphics/dist/metricsgraphics.min.js"></script>
        <!-- chartist (charts) -->
        <script src="<?php echo base_url()?>assets/bower_components/chartist/dist/chartist.min.js"></script>
        <script src="<?php echo base_url()?>assets/bower_components/c3js-chart/c3.min.js"></script>
        <script src="<?php echo base_url()?>assets/bower_components/chartist/dist/chartist.min.js"></script>

    <!--  charts functions -->
        <script src="<?php echo base_url()?>assets/js/pages/plugins_charts.min.js"></script>
        <!-- maplace (google maps) -->
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="<?php echo base_url()?>assets/bower_components/maplace.js/src/maplace-0.1.3.js"></script>
        <!-- peity (small charts) -->
        <script src="<?php echo base_url()?>assets/bower_components/peity/jquery.peity.min.js"></script>
        <!-- easy-pie-chart (circular statistics) -->
        <script src="<?php echo base_url()?>assets/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
        <!-- countUp -->
        <script src="<?php echo base_url()?>assets/bower_components/countUp.js/countUp.min.js"></script>
        <!-- handlebars.js -->
        <script src="<?php echo base_url()?>assets/bower_components/handlebars/handlebars.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/custom/handlebars_helpers.min.js"></script>
        <!-- CLNDR -->
        <script src="<?php echo base_url()?>assets/bower_components/clndr/src/clndr.js"></script>
        <!-- fitvids -->
        <script src="<?php echo base_url()?>assets/bower_components/fitvids/jquery.fitvids.js"></script>

        <!--  dashbord functions -->
        <script src="<?php echo base_url()?>assets/js/pages/dashboard.min.js"></script>
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

 