<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/risus-03.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/risus-03.png" sizes="32x32">

    <title>Risus Ventures</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
 <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- uikit -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/uikit/css/uikit.almost-flat.min.css" media="all">

    <!-- flag icons -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/icons/flags/flags.min.css" media="all">

    <!-- altair admin -->
         <script src="<?php echo base_url();?>assets/js/common.min.js"></script>
    
      <!---date picker
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>--->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/jquery.comiseo.daterangepicker.css" >
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.min.css" media="all">
     <script id="script_e1">
    $(function() {$("#e1").daterangepicker();
     });
    </script>
        <script src="<?php echo base_url();?>assets/js/common.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/uikit_custom.min.js"></script>
    <!-- datepicker-->
    
    
    
    
<style>
.uk-table thead th {
                color: #1976d2 !important;
            }
.tablesorter-altair .tablesorter-headerAsc .tablesorter-header-inner::after{ color:#1976d2 !important;}         
.tablesorter-altair .tablesorter-header-inner::after{color:#1976d2 !important;}  
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
<body class=" sidebar_main_open sidebar_main_swipe" style="background-color:white;">
<?php include('header.php');?>
<?php include('header_top.php');?>
    <div id="page_content" style="margin-left:0px;">
        <div id="page_content_inner">
            <h3 class="heading_a uk-margin-bottom"><u>Order Report</u></h3>
                <div class="md-card uk-margin-large-bottom1">
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
                            <form action="" method="GET" style="display: none">
                            <div class="panel panel-default">
                                <div class="panel-heading">Search Range</div>
                                <div class="panel-body">
                                    <div class="col-md-4">
                                        <div class="uk-form">
                                            <label>From date</label>
                                           <input type="text" id="orderdate" name="from_date" data-uk-datepicker="{format:'YYYY-MM-DD'}" value="<?php echo $from_date; ?>">

                                       </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="uk-form">
                                             <label>To date</label>
                                           <input type="text" id="orderdate" name="to_date" data-uk-datepicker="{format:'YYYY-MM-DD'}" value="<?php echo $to_date; ?>">

                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="uk-form">
                                            <input type="submit" class="btn btn-default" value="Search" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                            
                            
                            
                            
                            <?php
                            
                        $_product_curency=  $_product_quantitydata= $_product_namedata=$pric_name_whole_data= $pric_name=array();
                          $productname=array();
                            
                        //    $q="SELECT * FROM `orders` where orderdate>='$from_date' and orderdate<='$to_date'";
                          $q="SELECT * FROM `orders`";
                            
                            $orders= $this->db->query($q)->result_array();    
                           // echo '<pre>'; print_r($orders); echo '</pre>';
                            ?>
                            <div class="uk-overflow-container uk-margin-bottom">
                                <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="ts_pager_filter" style="border: 2px solid whitesmoke !important;">
                                    <thead>
                            <tr>
                               <th>S No.</th>
                                <th>Oder No.</th>
                                <th>Principal Name</th>
<!--                                <th>Principal Contact</th>-->
                                <th>PO Number</th>
                                <th>Customer Name</th>
                                <th>Product Name</th>
                                <th>Product Quantity</th>
                                <th>Subtotal</th>
                                <th>Currency</th>
                                <th>Commission</th>
                                <th>Total USD</th>
                                <th>Total EUR</th>
                               
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if(!empty($orders)){
                                    $i=1;
                                    foreach($orders as $single_order){
                                        $oid=$single_order['id'];
                                        $pid=$single_order['pid'];
                                        $cid=$single_order['cid'];
                                        $p_c_id=$single_order['p_c_id'];                                        
                                        $pricipaldata=$this->db->query("select * from Principal where Principal_id='$pid'")->row_array();
                                        $customersdata=$this->db->query("select * from customers where customer_id ='$cid'")->row_array();
                                        $principal_contactsdata=$this->db->query("select * from principal_contacts where id ='$p_c_id'")->row_array();
                                        $orderProducts=$this->db->query("select * from orders_products where order_id ='$oid'")->result_array();
                                        
                                        $pric_name[$pid]=$pricipaldata['Principal_person'];
                                        
                                        if(!empty($orderProducts)){
                                            foreach($orderProducts as $sp){
                                              $currency=$sp['currency'];
                                              $p_name=$sp['p_name'];
                                              $p_quntity=$sp['p_quntity'];
                                              $p_commision=$sp['p_commision'];
                                              $p_po=$sp['po'];
                                              $p_subtotal=$sp['p_subtotal'];
                                              $pric_name_whole_data[$pid][$currency][] =$sp['p_subtotal'];
                                              $_product_namedata[$sp['product_id']][]=$sp['p_subtotal'];
                                              $_product_quantitydata[$sp['product_id']][]=$sp['p_quntity'];
                                              $productname[$sp['product_id']]=$p_name;
                                              $_product_curency[$sp['product_id']]=$currency;
                                            ?>
                                <tr>
                                    <td>
                                        <?php echo $i++; ?>
                                    </td>
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
                                        <?php echo $p_po;?>
                                    </td>
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
                                        <?php echo $p_commision ; ?>
                                    </td>
                                     <td>
                                        <?php echo $single_order['totalusd'];?>
                                    </td>
                                     <td>
                                        <?php echo $single_order['totaleur'];?>
                                    </td>
                                </tr>
                                            <?php
                                            }  }                                        
                                    }
                                }
                                ?>
                            </tbody>
                                </table>
                                
                                
                                <?php 
                               // echo '<pre>'; print_r($pric_name_whole_data); echo '</pre>'; 
                               $_product_namedata=array();  $pric_name_whole_data=array();
                                if(!empty($pric_name_whole_data)) {
                                        ?>
                               
                                <div class="panel-heading"><b>Principal Collection</b> </div>
                                <div class="panel-body">
                                    <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" style="border: 2px solid whitesmoke !important;">
                                        <thead>
                                            <th>Principal Name</th>
                                            <th>Currency</th>
                                            <th>Amount</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                        foreach($pric_name_whole_data as $pkey=>$dd) {
                                            foreach($dd as $currency=>$pricearray){
                                                ?>
                                            <tr>
                                        <td><?php echo $pric_name[$pkey]; ?></td>
                                        <td><?php echo $currency; ?></td>
                                        <td><?php echo array_sum($pricearray); ?></td>
                                            </tr>
                                       
                                                <?php
                                            }
                                            
                                             }
                                        ?>
                                        </tbody>
                                        
                                    </table>
                                       
                                
                            </div>
                                        <?php
                                }
                                ?>
                                
                                
                                <?php 
                                // echo '<pre>'; print_r($_product_namedata); echo '</pre>'; 
                                // echo '<pre>'; print_r($_product_quantitydata); echo '</pre>'; 
                               
                                        if(!empty($_product_namedata)) {
                                            ?>
                                 <div class="panel panel-default" style="display: block;float: left;margin-top: 20px;width: 100%;">
                                     <div class="panel-heading"><b>Product Data</b> </div>
                                <div class="panel-body">
                                    <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" style="border: 2px solid whitesmoke !important;">
                                        <thead>
                                            <th>Product Name</th>
                                            <th>quantity</th>
                                            <th>Amount</th>
                                            <th>Currency</th>
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
                            
                            
                            
                            
                            
                        </div>
                    </div>
                </div>
        </div>
    </div>
  
   <!-- common functions -->
    <!-- altair common functions/helpers -->
    <script src="<?php echo base_url();?>assets/js/altair_admin_common.min.js"></script>

    <!-- page specific plugins -->
    <!-- tablesorter -->
     <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.min.css" media="all">
   <script src="<?php echo base_url();?>assets/bower_components/tablesorter/dist/js/jquery.tablesorter.min.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/tablesorter/dist/js/extras/jquery.tablesorter.pager.min.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/tablesorter/dist/js/jquery.tablesorter.widgets.min.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/tablesorter/dist/js/widgets/widget-alignChar.min.js"></script>

    <!--  tablesorter functions -->
    <script src="<?php echo base_url();?>assets/js/pages/plugins_tablesorter.min.js"></script>
    
    
  
    
    
<script type="text/javascript">

function ConfirmDialog(){
var x=confirm('Do You Want Delete This Record..');
if(x){
return true;
}else{
return false;
 }
}
</script>
<script type="text/javascript">
function ConfirmDialog1() {
  var x=confirm("Are you sure to Update record?")
  if (x) {
    return true;
  } else {
    return false;
  }
}


</script>



    <!-- date picker -->
            <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.js"></script>
            <script src="https://cdn.jsdelivr.net/momentjs/2.3.1/moment.min.js"></script>
            <script src="<?php echo base_url();?>assets/js/jquery.comiseo.daterangepicker.js"></script>
            
            <!-- date picker -->

<script type="text/javascript">
function validateentry()
{
if(document.forms.contactform.customer_company.value=="")
{
 alert("Please provide your Company Name.");
 document.forms.contactform.customer_company.focus();
 return false;
}
if(document.forms.contactform.customer_person.value=="")
{
 alert("Please provide your Contact Person Name.");
 document.forms.contactform.customer_person.focus();
 return false;
}
if(document.forms.contactform.customer_email.value=="")
{
 alert("Please provide your Customer Email.");
 document.forms.contactform.customer_email.focus();
 return false;
}
if(document.forms.contactform.customer_phone.value=="")
{
 alert("Please  Select Your Customer Mobile Number.");
 document.forms.contactform.customer_phone.focus();
 return false;
}

if(document.forms.contactform.customer_address.value=="")
{
 alert("Please  Select Your Customer Address.");
 document.forms.contactform.customer_address.focus();
 return false;
}
if(document.forms.contactform.customer_city.value=="")
{
 alert("Please  Select Your Customer City.");
 document.forms.contactform.customer_city.focus();
 return false;
}
if(document.forms.contactform.customer_state.value=="")
{
 alert("Please  Select Your Customer State.");
 document.forms.contactform.customer_state.focus();
 return false;
}
if(document.forms.contactform.customer_country.value=="")
{
 alert("Please  Select Your Customer Country.");
 document.forms.contactform.customer_country.focus();
 return false;
}
if(document.forms.contactform.customer_postal_code.value=="")
{
 alert("Please  Select Your Customer Postal Code.");
 document.forms.contactform.customer_postal_code.focus();
 return false;
}
}
</script>


			
 
</body>

</html>
