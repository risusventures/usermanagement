<!doctype html>
 <html lang="en">
<head>
    <meta charset="UTF-8">
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/finacbook_icon.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/finacbook_icon.png" sizes="32x32">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/weather-icons/css/weather-icons.min.css" media="all">
        <!-- metrics graphics (charts) -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/metrics-graphics/dist/metricsgraphics.css">
        <!-- chartist -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/chartist/dist/chartist.min.css">

    <!-- uikit -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/uikit/css/uikit.almost-flat.min.css" media="all">

    <!-- flag icons -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/icons/flags/flags.min.css" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/jquery.comiseo.daterangepicker.css" />
        <!-- fullcalendar -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/fullcalendar/dist/fullcalendar.min.css">
    <!-- altair admin -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.min.css" media="all">
    <?php include('analytics.php');?>
    <script id="script_e1">
    $(function() {$("#e1").daterangepicker();
     });
    </script>
        <script src="<?php echo base_url();?>assets/js/common.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/uikit_custom.min.js"></script>
<style>
#preloader  {
     position: absolute;
     top: 0;
     left: 0;
     right: 0;
     bottom: 0;
     background-color: #fefefe;
     z-index: 99;
    height: 100%;
 }
#status  {
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
    jQuery(window).load(function() {
        // will first fade out the loading animation
    jQuery("#status").fadeOut();
        // will fade out the whole DIV that covers the website.
    jQuery("#preloader").delay(1000).fadeOut("slow");
})
</script>
</head>

<body class=" sidebar_main_open sidebar_main_swipe" style="background-color:white;" >
    <!-- main header -->
<?php include('header.php');?>
<?php include('header_top.php');?>
  <!-- main header end -->
    <div id="page_content" style="margin-left:0px;">
        <div id="page_content_inner">
                  <?php if($_GET['message']==1)
    { echo '<div class="uk-alert uk-alert-info" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>Company Profile Updated  Successfully......</div>';}?>
            <!-- statistics (small charts) -->
            <div class="uk-grid uk-grid-width-large-1-3 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler hierarchical_show" data-uk-sortable data-uk-grid-margin>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><i class="material-icons" style="font-size:27px;">shopping_cart</i></div>
                            <span class="uk-text-muted uk-text-small">Total order</span>
                            <h2 class="uk-margin-remove"><?php echo $invoice[0]['invoice']; ?></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><i class="uk-icon-thumbs-up" style="font-size:27px;"></i></div>
                            <span class="uk-text-muted uk-text-small">Total Paid</span>
                            <h2 class="uk-margin-remove"><?php echo $invoice[0]['paid_count']; ?></h2>
                        </div>
                    </div>
                </div>
                 <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><i class="uk-icon-justify uk-icon-github" style="font-size:27px;"></i></div>
                            <span class="uk-text-muted uk-text-small">Total pending</span>
                            <h2 class="uk-margin-remove"><?php echo $invoice[0]['pending_count'];?></h2>
                        </div>
                    </div>
                </div>
                <!--  <div>
                  <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><i class="uk-icon-tachometer" style="font-size:27px;"></i></div>
                            <span class="uk-text-muted uk-text-small">Total Due</span>
                            <h2 class="uk-margin-remove"><?php echo $invoice[0]['due_count'];?></h2>
                        </div>
                    </div>
                </div>
                 
                  <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><i class="material-icons" style="font-size:27px;">&#xE850;</i></div>
                            <span class="uk-text-muted uk-text-small">Total Advance</span>
                            <h2 class="uk-margin-remove"><?php if(($invoice['total'])< ($data[0]['total_paid'])){$advance = $invoice['total']-$data[0]['total_paid']; echo $advance;}else{ echo '0';} ?></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><i class="uk-close uk-close-alt" style="opacity:0px;box-shadow:#727272"></i></div>
                            <span class="uk-text-muted uk-text-small">Total Canceled</span>
                            <h2 class="uk-margin-remove" id="peity_live_text"><?php echo $invoice[0]['canceled_count'];?></h2>
                        </div>
                    </div>
                </div>--->
            </div>

            <!-- large chart -->
            <div class="uk-grid">

                <div class="uk-width-1-1">
                    <div class="md-card">
                        <?php echo form_open(base_url('dashboard'),array('method'=>'GET'));?>
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                    <div class="col-md-4"><p><input class="raw" id="e1" name="chart_filter"><input type="submit" value="Filter" style="height:30px;" /></p>
                                </div>
                            </div><?php echo form_close();?>
                            <h3 class="md-card-toolbar-heading-text">
                                Sales
                            </h3>
                        </div>
                        <div class="md-card-content">
                            <div class="mGraph-wrapper">
                                 <div id="chartdiv" style="width: 100%; height: 400px; background-color: #FFFFFF;" ></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- circular charts -->

            <!-- tasks -->


            <!-- info cards -->
           <!--- <div class="uk-grid uk-grid-medium uk-grid-width-medium-1-2 uk-grid-width-large-1-3" data-uk-grid-margin data-uk-grid-match="{target:'.md-card-content'}">
             
               
                <div>
                    <div class="md-card">
                        <div class="md-card-content" style="padding:22px;">
                           <ul class="md-list">
                        <li>
                        <div class="md-list-content">
                        <span class="uk-text-small uk-text-muted">
                        <div class="uk-grid uk-grid-width-small-1-2 uk-grid-width-large-1-1 uk-grid-width-xlarge-1-1 uk-text-center uk-sortable sortable-handler" id="dashboard_sortable_cards" data-uk-sortable="" data-uk-grid-margin="">
                        <div>
                        <div class="md-card md-card-hover " style="background-color:#f88529">
                        <a href="<?php echo base_url();?>Sales" style="text-decoration:none;">
                        <div class="md-card-content uk-flex uk-flex-center uk-flex-middle" style="min-height: 82px;">
                        <span style="font-size:35px;color:white"><b style="font-size:17px;"><i class="material-icons" style="font-size:27px;color:white"></i><br>Sales</b></span>
                        </div></a>
                        </div>
                        </div>
                        <div class="">
                        <div class="md-card md-card-hover" style="background-color: rgba(0, 128, 0, 0.68);">
                        <a href="<?php echo base_url();?>addOrder" style="text-decoration:none;">
                        <div class="md-card-content uk-flex uk-flex-center uk-flex-middle" style="min-height: 82px;">
                        <span style="font-size:35px;color:white;"><b style="font-size: 17px;"><i class="material-icons" style="font-size:27px;color:white">shopping_cart</i><br>Add Order</b></span>
                        </div></a>
                        </div>
                        </div>
                        <div class="uk-grid-margin">
                        <div class="md-card md-card-hover" style="background-color:#1976D2;">
                        <a href="<?php echo base_url();?>addCustomer" style="text-decoration:none;">
                        <div class="md-card-content uk-flex uk-flex-center uk-flex-middle" style="min-height: 82px;">
                        <span style="font-size:35px;color:white;"><b style="font-size:17px;"><i class="material-icons" style="font-size:27px;color:white">group</i><br>Add Customer</b></span>
                        </div></a>
                        </div>
                        </div>
                        <div class="uk-grid-margin">
                        <div class="md-card md-card-hover" style="background-color:#52B9E9;">
                        <a href="<?php echo base_url();?>changePassword" style="text-decoration:none;">
                        <div class="md-card-content uk-flex uk-flex-center uk-flex-middle" style="min-height: 82px; background-color: rebeccapurple;">
                        <span style="font-size:35px;color:white"><b style="font-size:17px;"><i class="material-icons" style="font-size:27px;color:white"></i><br> Change Password</b></span>
                        </div></a>
                        </div>
                        </div>
                        <div class="uk-grid-margin">
                        <div class="md-card md-card-hover " style="background-color:#333021">
                        <a href="<?php echo base_url();?>manageCustomers" style="text-decoration:none;">
                        <div class="md-card-content uk-flex uk-flex-center uk-flex-middle" style="min-height: 82px;">
                        <span style="font-size:35px;color:white"><b style="font-size:17px;">
                        <i class="material-icons" style="font-size:27px;color:white">view_list</i><br>View Customers</b></span>
                        </div></a>
                        </div>
                        </div>
                        <div class="uk-grid-margin">
                        <div class="md-card md-card-hover" style="background-color:#8B1267;">
                        <a href="<?php echo base_url();?>manageOrder" style="text-decoration:none;">
                        <div class="md-card-content uk-flex uk-flex-center uk-flex-middle" style="min-height: 82px;">
                        <span style="font-size:35px;color:white;"><b style="font-size: 17px;">
                        <i class="material-icons" style="font-size:27px;color:white">view_list</i><br>View Orders</b></span>
                        </div></a>
                        </div>
                        </div>
                        </div>
                        </span>
                        </div>
                        </li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div><?php foreach ($invoice as $invoice) {?>-->
        <div class="uk-grid uk-grid-width-small-1-2 uk-grid-width-large-1-5 uk-grid-width-xlarge-1-5 uk-text-center uk-sortable sortable-handler" id="dashboard_sortable_cards" data-uk-sortable="" data-uk-grid-margin="">
            <div>
            <div class="md-card md-card-hover md-card-overlay" style="background-color:#f88529">
            <a href="<?php echo base_url();?>manageOrder"><div class="md-card-content uk-flex uk-flex-center uk-flex-middle">
            <span style="font-size:35px;color:white"><h2 style="color:white"><?php echo $invoice['invoice'];?></h2><b style="font-size: 26px;">Orders</b></span>
            </div>
            <div class="md-card-overlay-content">
            <div class="uk-clearfix md-card-overlay-header">
            </div>
            </div>
            </a>
            </div>
            </div>
            <div class="">
            <div class="md-card md-card-hover md-card-overlay" style="background-color: rgb(255, 102, 0);;">
            <a href="<?php echo base_url();?>manageOrder">
            <div class="md-card-content uk-flex uk-flex-center uk-flex-middle">
            <span style="font-size:35px;color:white;"><h2 style="color:white" class="uk-icon-gbp">&nbsp;<?php if($invoice['total']){ $total_amount = $invoice['total']; echo number_format($total_amount,2);}else { echo number_format(0,2);}?></h2><br><b style="font-size: 26px;">Total Amount</b></span>
            </div>
            <div class="md-card-overlay-content">
            <div class="uk-clearfix md-card-overlay-header">
            </div>
            </div>
            </a>
            </div>
            </div>
            <?php
  $query=$this->db->query("select sum(invoice_paid_amount) as total_paid from payment where seller_id='$user_id' ");
  $data=$query->result_array();?>
            <div class="">
            <div class="md-card md-card-hover md-card-overlay" style="background-color:#b0de09;">
            <a href="<?php echo base_url();?>manageOrder">
            <div class="md-card-content uk-flex uk-flex-center uk-flex-middle">
            <span style="font-size:35px;color:white;"><h2 style="color:white" class="uk-icon-gbp">&nbsp;<?php if($data[0]['total_paid']){echo number_format($data[0]['total_paid']);}else{ echo number_format(0,2);}?></h2><br><b style="font-size: 26px;">Total Paid</b></span>
            </div>
            <div class="md-card-overlay-content">
            <div class="uk-clearfix md-card-overlay-header">
            </div>
            </div>
            </a>
            </div>
            </div>
    
            <div class="">
            <div class="md-card md-card-hover md-card-overlay" style="background-color:#52B9E9;">
            <a href="<?php echo base_url();?>manageOrder">
            <div class="md-card-content uk-flex uk-flex-center uk-flex-middle" style="background-color:#fcd202">
            <span style="font-size:35px;color:white"><h2 style="color:white" class="uk-icon-gbp">&nbsp;<?php if($invoice['pending']){echo number_format($invoice['pending'],2);}else { echo number_format(0,2);}?></h2><br><b style="font-size: 26px;"> Total Quotation</b></span>
            </div>
            <div class="md-card-overlay-content">
            <div class="uk-clearfix md-card-overlay-header">
            </div>
            </div>
            </a>
            </div>
            </div>
            
            <div class="uk-grid-margin">
            <div class="md-card md-card-hover md-card-overlay" style="background-color: red;">
            <a href="<?php echo base_url();?>manageCustomers">
            <div class="md-card-content uk-flex uk-flex-center uk-flex-middle" style="background-color:#039BE5;">
            <span style="color:white"><h2 style="color:white"><?php if($total_customers[0]['customers']){echo $total_customers[0]['customers'];}else { echo '0';}?></h2><b style="font-size: 26px;">Total Customers</b></span>
            </div>
            <div class="md-card-overlay-content">
            <div class="uk-clearfix md-card-overlay-header">
            </div>
            </div>
            </a>
            </div>
            </div>
      
            </div><?php }?>
               <div class="md-card">
                <div class="md-card-content">
                   <div id="calendar_selectable"></div>
                </div>
            </div>
   </div>

       </div>

                 <div id="preloader">
    <div id="status"></div>
</div>



    <!-- common functions -->
   <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.js"></script>
   <script src="https://cdn.jsdelivr.net/momentjs/2.3.1/moment.min.js"></script>
   <script src="<?php echo base_url();?>assets/js/jquery.comiseo.daterangepicker.js"></script>
   <script src="<?php echo base_url();?>assets/js/altair_admin_common.min.js"></script>
       <!-- <script src="<?php echo base_url();?>assets/bower_components/d3/d3.min.js"></script>
        <script src="<?php echo base_url();?>assets/bower_components/chartist/dist/chartist.min.js"></script>
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="<?php echo base_url();?>assets/bower_components/maplace.js/src/maplace-0.1.3.js"></script>
        <script src="<?php echo base_url();?>assets/bower_components/peity/jquery.peity.min.js"></script>
        <script src="<?php echo base_url();?>assets/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
        <script src="<?php echo base_url();?>assets/bower_components/countUp.js/countUp.min.js"></script>
        <script src="<?php echo base_url();?>assets/bower_components/handlebars/handlebars.min.js"></script>
        <script src="<?php echo base_url();?>assets/assets/js/custom/handlebars_helpers.min.js"></script>
        <script src="<?php echo base_url();?>assets/bower_components/clndr/src/clndr.js"></script>
        <script src="<?php echo base_url();?>assets/bower_components/fitvids/jquery.fitvids.js"></script> --->
        <script src="<?php echo base_url();?>assets/assets/js/pages/dashboard.min.js"></script>
        <script type="text/javascript" src="http://www.amcharts.com/lib/3/amcharts.js"></script>
        <script type="text/javascript" src="http://www.amcharts.com/lib/3/serial.js"></script>
            <!-- fullcalendar -->
       <script src="<?php echo base_url();?>assets/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
        <script>
        $(function(){altair_fullcalendar.calendar_selectable()}),altair_fullcalendar={calendar_selectable:function(){var t=$("#calendar_selectable"),a=$('<div id="calendar_colors_wrapper"></div>'),e=altair_helpers.color_picker(a).prop("outerHTML");t.length&&t.fullCalendar({header:{left:"title today",center:"",right:"month,agendaWeek,agendaDay,listWeek prev,next"},buttonIcons:{prev:"md-left-single-arrow",next:"md-right-single-arrow",prevYear:"md-left-double-arrow",nextYear:"md-right-double-arrow"},buttonText:{today:" ",month:" ",week:" ",day:" "},aspectRatio:2.1,defaultDate:moment(),selectable:!0,selectHelper:!0,select:function(a,r){UIkit.modal.prompt('<h3 class="heading_b uk-margin-medium-bottom">New Event</h3><div class="uk-margin-medium-bottom" id="calendar_colors">Event Color:'+e+"</div>Event Title:","",function(e){if(""!==$.trim(e)){var o,d=$("#calendar_colors_wrapper").find("input").val();o={title:e,start:a,end:r,color:d||""},t.fullCalendar("renderEvent",o,!0),t.fullCalendar("unselect")}},{labels:{Ok:"Add Event"}})},editable:!0,eventLimit:!0,timeFormat:"(HH)(:mm)",events:[<?php  $myArray = array();foreach($calender_record as $record){ $days1 = explode("/",$record['invoice_date']);  $days = $days1[0]; $months=$days1[1]; $years=$days1[2]; $id= $record['id']; $day = $days-1; $myArray[] = "{ title:'".$record['customer_person']."',url:'http://www.catermanage.co.uk/printOrder/".$id."',start:moment().startOf('month').add($day,'days').format('$years-$months-$days')}";}echo implode( ', ', $myArray );?>]})}};
</script>
    <!--  calendar functions -->
<?php  //$myArray = array();foreach($calender_record as $record){ echo  $newDate = date("d-m-Y", strtotime($record['party_date'])); $day = substr($record['party_date'], strrpos($record['party_date'], "-") + 1); $myArray[] = "{ title:'".$record['customer_person']."',start:new Date($.now() + 13824000000)}";}echo implode( ', ', $myArray );?>


<!-- amCharts javascript code -->
        <script type="text/javascript">
            AmCharts.makeChart("chartdiv",
                {
                    "type": "serial",
                    "categoryField": "month",
                    "colors": [
        "#F60",
        "#FCD202",
        "#B0DE09",
        "#0D8ECF",
        "#FA3031",
        "#727272",
        "#CC0000",
        "#00CC00",
        "#0000CC",
        "#DDDDDD",
        "#999999",
        "#333333",
        "#990000"
    ],
                    "startDuration": 1,
                    "categoryAxis": {
                        "gridPosition": "start"
                    },
                    "trendLines": [],
                    "graphs": [
                        {
                            "balloonText": "[[title]] of [[category]]:[[value]]",
                            "fillAlphas": 1,
                            "id": "AmGraph-1",
                            "title": "Total Ammount",
                            "type": "column",
                            "valueField": "total_sales"
                        },
                        {
                            "balloonText": "[[title]] of [[category]]:[[value]]",
                            "fillAlphas": 1,
                            "id": "AmGraph-2",
                            "title": "Total Quotation",
                            "type": "column",
                            "valueField": "total_pending"
                        },
                            {
                            "balloonText": "[[title]] of [[category]]:[[value]]",
                            "fillAlphas": 1,
                            "id": "AmGraph-3",
                            "title": "Total Paid",
                            "type": "column",
                            "valueField": "total_paid"
                        }
                    ],
                    "guides": [],
                    "valueAxes": [
                        {
                            "id": "ValueAxis-1",
                            "title": "Amount"
                        }
                    ],
                    "allLabels": [],
                    "balloon": {},
                    "legend": {
                        "enabled": true,
                        "useGraphSettings": true
                    },
                    "titles": [
                        {
                            "alpha": 0.97,
                            "id": "15",
                            "size": 21,
                            "text": ""
                        }
                    ],
                    "dataProvider": [
                           <?php echo $filter_chart_record;?>
                    ]
                }
            );
        </script>

</body>
</html>