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
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/risus-03.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/risus-03.png" sizes="32x32">
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
    <link rel="stylesheet" href="<?php echo base_url();?>assets/jquery.comiseo.daterangepicker.css" >
        <!-- fullcalendar -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/fullcalendar/dist/fullcalendar.min.css">
    <!-- altair admin -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.min.css" media="all">
    
    
    
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/pie.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>



    <?php include('analytics.php');?>
    <script id="script_e1">
    $(function() {$("#e1").daterangepicker();
     });
    </script>
        <script src="<?php echo base_url();?>assets/js/common.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/uikit_custom.min.js"></script>
<style>
    .tablesorter-altair .tablesorter-headerAsc .tablesorter-header-inner::after{ color:#1976d2 !important;}         
    .tablesorter-altair .tablesorter-header-inner::after{color:#1976d2 !important;} 
    th {
       color: #1976d2 !important;
    }
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
            
            
            <h4 class="heading_a uk-margin-bottom"><u>Order Report</u></h4>
                <div class="md-card uk-margin-large-bottom1">
                    
                    
                    
                    
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
                               
                                 <div id="chartdiv" style="width:100%; height:400px; background-color:#FFFFFF;" ></div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
                    
                    
                    
                    
                    <div class="md-card-content">
                        <div class="md-cardsss">
                            <?php 
                          if(isset($_GET['from_date']) && !empty($_GET['from_date'])){
                              $from_date=$_GET['from_date'];
                          }else{
                              $from_date=@date('Y-m-01');
                          }
                          
                          if(isset($_GET['to_date']) && !empty($_GET['to_date'])){
                              $to_date=$_GET['to_date'];
                          }else{
                              $to_date=@date("Y-m-d");
                          }
                          
                        
                          
                          ?>
                          
                            
                            
                            <?php
                            
                            ?>
                            
                            <?php
                            
                        $_product_curency=  $_product_quantitydata= $_product_namedata=$pric_name_whole_data= $pric_name=array();
                        $productname=array();
                        $yea=date("Y");
                        $q="SELECT * FROM `orders` where datecretaed LIKE '%$yea%'";
                            
                            $orders= $this->db->query($q)->result_array();    
                           // echo '<pre>'; print_r($orders); echo '</pre>';
                            ?>
                             <div class="uk-overflow-container uk-margin-bottom" style="margin: 10px;">
                        <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="ts_pager_filter" style="border: 2px solid whitesmoke !important;"> 
                                    <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Oder No.</th>
                                <th>Principal Name</th>
                            <!--<th>Principal Contact</th>-->
                                <th>Customer Name</th>
                                <th>Product Name</th>
                                <th>Product Quantity</th>
                            <th>Subtotal</th>
                                <th>Currency</th>
                                <th>Total USD</th>
                                <th>Total Eur</th>
                                <th>Date Added</th>
                               
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                if(!empty($orders)){
                                    foreach($orders as $single_order){
                                        $oid=$single_order['id'];
                                        $pid=$single_order['pid'];
                                        $cid=$single_order['cid'];
                                        $datecretaed=$single_order['datecretaed'];
                                        $p_c_id=$single_order['p_c_id'];                                        
                                        $pricipaldata=$this->db->query("select * from Principal where Principal_id='$pid'")->row_array();
                                        $customersdata=$this->db->query("select * from customers where customer_id ='$cid'")->row_array();
                                        $principal_contactsdata=$this->db->query("select * from principal_contacts where id ='$p_c_id'")->row_array();
                                        $orderProducts=$this->db->query("select * from orders_products where order_id ='$oid' ")->result_array();
                                        
                                        $pric_name[$pid]=$pricipaldata['Principal_person'];
                                       // echo '<pre>';print_r($orderProducts); echo'</pre>';
                                        if(!empty($orderProducts)){
                                            foreach($orderProducts as $sp){
                                              $currency=$sp['currency'];
                                              $p_name=$sp['p_name'];
                                              $p_quntity=$sp['p_quntity'];
                                              $p_subtotal=$sp['p_subtotal'];
                                              $pric_name_whole_data[$pid][$currency][] =$sp['p_subtotal'];
                                              $_product_namedata[$sp['product_id']][]=$sp['p_subtotal'];
                                              $_product_quantitydata[$sp['product_id']][]=$sp['p_quntity'];
                                              $productname[$sp['product_id']]=$p_name;
                                              $_product_curency[$sp['product_id']]=$currency;
                                            ?>
                                <tr>
                                    <td><?php echo $i++;?></td>
                                    <td>
                                        <?php echo $single_order['order_no'];?>
                                    </td>
                                    <td>
                                        <?php echo $pricipaldata['Principal_person'];?>
                                    </td>
<!--                                    <td>
                                        <?php //echo $principal_contactsdata['name'];?>
                                    </td>-->
                                   <td>
                                        <?php echo $customersdata['customer_person'];?>
                                    </td>
                                    <td>
                                        <?php echo $p_name;?>
                                    </td>
                                    <td>
                                        <?php echo $p_quntity;?>
                                    </td>
                                     <td>
                                        <?php echo $p_subtotal;?>
                                    </td>
                                     <td>
                                        <?php echo $currency;?>
                                    </td>
                                     <td>
                                        <?php echo $single_order['totalusd'];?>
                                    </td>
                                     <td>
                                        <?php echo $single_order['totaleur'];?>
                                    </td>
                                    <td><?php echo $datecretaed;  ?></td>
                                </tr>
                                            <?php
                                            }  }                                        
                                    }
                                }
                                ?>
                            </tbody>
                                </table>
                                <ul class="uk-pagination ts_pager">
                        <li data-uk-tooltip title="Select Page">
                            <select class="ts_gotoPage ts_selectize"></select>
                        </li>
                        <li class="first"><a href="javascript:void(0)"><i class="uk-icon-angle-double-left"></i></a></li>
                        <li class="prev"><a href="javascript:void(0)"><i class="uk-icon-angle-left"></i></a></li>
                        <li><span class="pagedisplay"></span></li>
                        <li class="next"><a href="javascript:void(0)"><i class="uk-icon-angle-right"></i></a></li>
                        <li class="last"><a href="javascript:void(0)"><i class="uk-icon-angle-double-right"></i></a></li>
                        <li data-uk-tooltip title="Page Size">
                            <select class="pagesize ts_selectize">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                            </select>
                        </li>
                    </ul>
                                
                                <?php 
                               // echo '<pre>'; print_r($pric_name_whole_data); echo '</pre>'; 
                                if(!empty($pric_name_whole_data)) {
                                        ?>
                                <div class="panel panel-default" style="float: left;margin-top: 20px;width: 100%;">
                                    <div class="panel-heading"><h3>Principal Collection</h3> </div>
                                <div class="panel-body">
                                    <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair"  style="border: 1px solid #e0e0e0;">
                                        <thead>
                                        <th  style="color:#1976d2"><b>Principal Name</b></th>
                                        <th  style="color:#1976d2"><b>Amount</b></th>
                                        <th  style="color:#1976d2"><b>Currency</b></th>
                                        
                                        </thead>
                                        <tbody>
                                            <?php
                                        foreach($pric_name_whole_data as $pkey=>$dd) {
                                            foreach($dd as $currency=>$pricearray){
                                                ?>
                                            <tr>
                                        <td><?php echo $pric_name[$pkey]; ?></td>
                                        <td><?php echo array_sum($pricearray); ?></td>
                                        <td><?php echo $currency; ?></td>
                                            </tr>
                                       
                                                <?php
                                            }
                                            
                                             }
                                        ?>
                                        </tbody>
                                        
                                    </table>
                                       
                                </div>
                            </div>
                                        <?php
                                }
                                ?>
                                
                                
                                <?php 
                                // echo '<pre>'; print_r($_product_namedata); echo '</pre>'; 
                                // echo '<pre>'; print_r($_product_quantitydata); echo '</pre>'; 
                                        if(!empty($_product_namedata)) {
                                            ?>
                                 <div class="panel panel-default" style="float: left;margin-top: 20px;width: 100%;">
                                     <div class="panel-heading"><h3>Product Data</h3> </div>
                                <div class="panel-body">
                                    <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair"  style="border: 1px solid #e0e0e0;">
                                        <thead>
                                        <th  style="color:#1976d2"><b>Product Name</b></th>
                                        <th  style="color:#1976d2"><b>quantity</b></th>
                                        <th  style="color:#1976d2"><b>Amount</b></th>
                                        <th  style="color:#1976d2"><b>Currency</b></th>
                                        </thead>
                                        <tbody>
                                            <?php
                                        foreach($_product_namedata as $pkey=>$dd) {
                                           
                                                ?>
                                            <tr>
                                                <td><?php echo $productname[$pkey]; ?></td>
                                                <td><?php echo array_sum($_product_quantitydata[$pkey]); ?></td>
                                                <td><?php echo array_sum($dd); ?></td>
                                                <td><?php echo $_product_curency[$pkey]; ?></td>
                                            </tr>
                                       
                                            <?php
                                            
                                             }
                                        ?>
                                        </tbody>
                                        
                                    </table>
                                       
                                </div>
                            </div>
                                  <?php 
                                        }
                                ?>
                            
                            </div>
                                
                            
                            
                            
                            
                            
                            
                            
                        </div>
                        
                        
                        
                        
                    </div>
                </div>
        </div>
    </div>

   <script src="<?php echo base_url();?>assets/bower_components/tablesorter/dist/js/jquery.tablesorter.min.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/tablesorter/dist/js/extras/jquery.tablesorter.pager.min.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/tablesorter/dist/js/jquery.tablesorter.widgets.min.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/tablesorter/dist/js/widgets/widget-alignChar.min.js"></script>

    <!--  tablesorter functions -->
    <script src="<?php echo base_url();?>assets/js/pages/plugins_tablesorter.min.js"></script>
  
  
  
    <!-- common functions -->
   <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.js"></script>
   <script src="https://cdn.jsdelivr.net/momentjs/2.3.1/moment.min.js"></script>
   <script src="<?php echo base_url();?>assets/js/jquery.comiseo.daterangepicker.js"></script>
   <script src="<?php echo base_url();?>assets/js/altair_admin_common.min.js"></script>
      
        <!--<script src="<?php echo base_url();?>assets/assets/js/pages/dashboard.min.js"></script>
        <script src="<?php echo base_url();?>assets/assets/js/pages/com.js"></script>-->
        <script type="text/javascript" src="http://www.amcharts.com/lib/3/amcharts.js"></script>
        <script type="text/javascript" src="http://www.amcharts.com/lib/3/serial.js"></script>
            <!-- fullcalendar -->
       <script src="<?php echo base_url();?>assets/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
        <script>
        $(function(){altair_fullcalendar.calendar_selectable()}),altair_fullcalendar={calendar_selectable:function(){var t=$("#calendar_selectable"),a=$('<div id="calendar_colors_wrapper"></div>'),e=altair_helpers.color_picker(a).prop("outerHTML");t.length&&t.fullCalendar({header:{left:"title today",center:"",right:"month,agendaWeek,agendaDay,listWeek prev,next"},buttonIcons:{prev:"md-left-single-arrow",next:"md-right-single-arrow",prevYear:"md-left-double-arrow",nextYear:"md-right-double-arrow"},buttonText:{today:" ",month:" ",week:" ",day:" "},aspectRatio:2.1,defaultDate:moment(),selectable:!0,selectHelper:!0,select:function(a,r){UIkit.modal.prompt('<h3 class="heading_b uk-margin-medium-bottom">New Event</h3><div class="uk-margin-medium-bottom" id="calendar_colors">Event Color:'+e+"</div>Event Title:","",function(e){if(""!==$.trim(e)){var o,d=$("#calendar_colors_wrapper").find("input").val();o={title:e,start:a,end:r,color:d||""},t.fullCalendar("renderEvent",o,!0),t.fullCalendar("unselect")}},{labels:{Ok:"Add Event"}})},editable:!0,eventLimit:!0,timeFormat:"(HH)(:mm)",events:[<?php  $myArray = array();foreach($calender_record as $record){ $days1 = explode("/",$record['invoice_date']);  $days = $days1[0]; $months=$days1[1]; $years=$days1[2]; $id= $record['id']; $day = $days-1; $myArray[] = "{ title:'".$record['customer_person']."',url:'http://www.catermanage.co.uk/palmbeach/printOrder/".$id."',start:moment().startOf('month').add($day,'days').format('$years-$months-$days')}";}echo implode( ', ', $myArray );?>]})}};
</script>
    <!--  calendar functions -->
<?php  //$myArray = array();foreach($calender_record as $record){ echo  $newDate = date("d-m-Y", strtotime($record['party_date'])); $day = substr($record['party_date'], strrpos($record['party_date'], "-") + 1); $myArray[] = "{ title:'".$record['customer_person']."',start:new Date($.now() + 13824000000)}";}echo implode( ', ', $myArray );?>


<!-- amCharts javascript code -->
        <script type="text/javascript">
           
            
            
            AmCharts.makeChart("chartdiv",
                {
                    "type": "serial",
                    "categoryField": "month",
                    "hideCredits":true,
                    
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
                            "title": " Total Principal",
                            "type": "column",
                            "valueField": "total_pri"
                            
                        },
                        {
                            "balloonText": "[[title]] of [[category]]:[[value]]",
                            "fillAlphas": 1,
                            "id": "AmGraph-2",
                            "title": "Total Order",
                            "type": "column",
                            "valueField": "total_order"
                        },
                        {
                            "balloonText": "[[title]] of [[category]]:[[value]]",
                            "fillAlphas": 1,
                            "id": "AmGraph-3",
                            "title": "Total Order Quantity",
                            "type": "column",
                            "valueField": "total_quntity"
                        },
                            {
                            "balloonText": "[[title]] of [[category]]:[[value]]",
                            "fillAlphas": 1,
                            "id": "AmGraph-4",
                            "title": "Total Amount(USD)",
                            "type": "column",
                            "valueField": "total_usd"
                        },
                        {
                            "balloonText": "[[title]] of [[category]]:[[value]]",
                            "fillAlphas": 1,
                            "id": "AmGraph-5",
                            "title": "Total Amount(EUR)",
                            "type": "column",
                            "valueField": "total_eur"
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