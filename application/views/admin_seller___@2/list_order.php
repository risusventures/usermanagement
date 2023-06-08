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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- uikit -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/uikit/css/uikit.almost-flat.min.css" media="all">

    <!-- flag icons -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/icons/flags/flags.min.css" media="all">

    <!-- altair admin -->
         <script src="<?php echo base_url();?>assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="<?php echo base_url();?>assets/js/uikit_custom.min.js"></script>
   
      <!---date picker--->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
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
            .tablesorter-altair .tablesorter-headerAsc .tablesorter-header-inner::after{ color:#1976d2 !important;}         
    .tablesorter-altair .tablesorter-header-inner::after{color:#1976d2 !important;}  
/*#preloader  {
     position: absolute;
     top: 0;
     left: 0;
     right: 0;
     bottom: 0;
     background-color: #fefefe;
     z-index: 99;
    height: 100%;
 }*/
#page_content_inner {
    padding: 30px 24px 100px !important;
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
<body class=" sidebar_main_open sidebar_main_swipe" style="background-color:white;">
<?php include('header.php');?>
<?php include('header_top.php');?>
    <div id="page_content" style="margin-left:0px;">
        <div id="page_content_inner">
            <h3 class="heading_a uk-margin-bottom"><u>View order</u></h3>
            <div class="md-card">
			     <?php if($_GET['message']==already)
       { echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
         <a href="#" class="uk-alert-close uk-close"></a>You are already registered</div>';}?>     
            <?php if($_GET['message']==success)
             { echo '<div class="uk-alert uk-alert-success" data-uk-alert="">
                    <a href="#" class="uk-alert-close uk-close"></a>Added Order Successfully......</div>';}?>
                 <?php if($_GET['message']==1)
    { echo '<div class="uk-alert uk-alert-info" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>Order Update  Successfully......</div>';}?>
                    <?php if($_GET['orders']==deleted)
    { echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>Order successfully deleted.........</div>';}?>
               <!---datepicker--->
           
                    <div class="md-card">
                        <?php echo form_open(base_url('exportorder'),array('method'=>'GET'));?>
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                    <div class="col-md-12"><p><input class="raw" id="e1" name="recort_filter"><input type="submit" value="Reports" style="height:30px;background-color: #1976D2;border: none;color: white;" /></p>
                                </div>
                            </div><?php echo form_close();?>
                          <h3 class="md-card-toolbar-heading-text">
                                Order
                            </h3>
                        </div>
                      
                    </div>
             
                                    <!---datepicker--->  
                
               <br><br>
				   <div class="uk-overflow-container uk-margin-bottom" style="margin: 10px;">
                       <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="ts_pager_filter" style="border: 2px solid whitesmoke !important;">
                            <thead>
                            <tr>
                           
                                <th  style="color:#1976d2"><b>S.No.</b></th>
                                <th  style="color:#1976d2"><b>Principal Name</b></th>
                                <th  style="color:#1976d2"><b>Customer Name</b></th>
                                <th  style="color:#1976d2"><b>Invoice No</b></th>
                                <th  style="color:#1976d2"><b>Total USD</b></th>
                                <th  style="color:#1976d2"><b>Total EUR</b></th>
                                <th  style="color:#1976d2"><b>Order date</b></th>
                                <th  style="color:#1976d2"><b>Order no.</b></th>
                                <th style="color:#1976d2"><b>PO</b></th>
                                <th style="color:#1976d2"><b>Money Accepted</b></th>
                                <th class="filter-false remove sorter-false uk-text-center"  style="color:#1976d2"><b>Actions</b></th>
                            </tr>
                            </thead>
              
                            <tbody>
                     <?php  $i=1;

                        
                     
                     foreach ($list_order as $order) {
                         
                         $principalname = $order['pid'];
                         $customername = $order['cid'];
                         $principalcontact = $order['p_c_id'];
                         $orderid=$order['id'];
                         $query =$this->db->query("select * from Principal where Principal_id= '$principalname' ");
                         $query1 =$this->db->query("select * from customers where customer_id = '$customername' ");
                         $query3 =$this->db->query("select * from principal_contacts where id = '$principalcontact' and  pid = '$principalname' ");
                         $query4 =$this->db->query("select po from orders_products where order_id = '$orderid' ");
                         $data1=$query->row_array();
                         $data2=$query1->row_array();
                         $data3=$query3->row_array();
                         $data4=$query4->result_array();
                         $po=array();
                         $eeeeepo='';
//                         if(!empty($data4)){
//                             foreach($data4 as $ed){
//                                $po[]= $ed['po'];
//                             }
//                         }
//                         if(!empty($po)){
//                             $eeeeepo=implode(',',$po);
//                         }
                         //echo'<pre>';print_r($po);echo'</pre>';
                         ?>  
                     <tr>
		     <td><?php echo $i++;?></td>
                     <td><?php echo $data1['Principal_person']; ?></td>
                     <td><?php echo $data2['customer_person'];?></td>    
                     <td><?php echo $order['invoice_no'];?></td>
                     <td><?php echo $order['totalusd'];?></td>
                     <td><?php echo $order['totaleur'];?></td>
                     <td><?php echo $order['orderdate'];?></td>
                     <td><?php echo $order['order_no'];?></td>     
                     <td><?php// echo $eeeeepo;?>  <?php if(!empty($data4)){foreach($data4 as $ed){echo $ed['po'];?> <br> <?php }  }?>    </td>
                     <td><?php echo $order['acceptmoney'];?></td>
                     <td>
 <a href="<?php echo base_url('seller/updateorder'); ?>?id=<?php echo $order['id']; ?>" Title="Edit" ><i class="material-icons" style="font-size:28px;color:#1976D2;">edit</i></a>
<!--  <a href=""  data-uk-modal="{target:'#modal_header_footer1_<?php echo $order['id']; ?>'}" title="view" ><i class="material-icons" style="font-size:28px;color:#1976D2;">remove_red_eye</i></a>-->

  <!---- view  model start -->
  <div class="uk-modal" id="modal_header_footer1_<?php echo $order['id']; ?>" aria-hidden="true" style="display: none; overflow-y: auto;"> 
		                 
<input type="hidden" name="uid" class="md-input label-fixed" value="<?php echo $customer['customer_id'];?>" data-parsley-id="4">				  
				  <div class="uk-modal-dialog" style="top: 88px;">
                            <div class="uk-modal-header"><h3 class="uk-modal-title">order Detail</h3></div>
                            <hr style="border:2px solid #e0e0e0;"></hr>
                            <p>
							<div class="md-card">
                <div class="md-card-content large-padding">

                        <div class="uk-grid " data-uk-grid-margin="">

 
<div class="uk-width-medium-1-2">
<div class="parsley-row">
<div class="md-input-wrapper md-input-filled"><label for="fullname">Principal Name<span class="req">*</span></label><input type="text" name="customer_person" class="md-input label-fixed" value="<?php echo $data1['Principal_person']; ?>" data-parsley-id="6" disabled><span class="md-input-bar"></span></div>   
                               </div>
                            </div>
                            
                            <div class="uk-width-medium-1-2">
<div class="parsley-row">
<div class="md-input-wrapper md-input-filled"><label for="fullname">Customer name<span class="req">*</span></label><input type="text"  name="customer_phone" class="md-input label-fixed" value="<?php echo $data2['customer_person'];?>" data-parsley-id="10" disabled><span class="md-input-bar"></span></div>    
                                </div>
                            </div>
                            
                        </div>

<div class="uk-grid " data-uk-grid-margin="">
<div class="uk-width-medium-1-2">
<div class="parsley-row">
 <div class="md-input-wrapper md-input-filled"><label for="fullname">Order No.<span class="req">*</span></label><input type="text" name="customer_address" class="md-input label-fixed" value="<?php echo $order['order_no'];?>" data-parsley-id="12" disabled><span class="md-input-bar"></span></div> </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="parsley-row">
             <div class="md-input-wrapper md-input-filled"><label for="email">Order Date<span class="req">*</span></label><input type="text" readonly name="customer_city" class="md-input label-fixed" value="<?php echo $order['orderdate'];?>" data-parsley-id="14" disabled ><span class="md-input-bar"></span></div>
                                    
                                </div>
                            </div>
                        </div>

          <div class="uk-grid " data-uk-grid-margin="">

							  <div class="uk-width-medium-1-2">
                                <div class="parsley-row">
                                    <div class="md-input-wrapper md-input-filled"><label for="email">Invoice No.<span class="req">*</span></label><input type="text" name="customer_postal_code" class="md-input label-fixed" value="<?php echo $order['invoice_no'];?>" data-parsley-id="20" disabled><span class="md-input-bar"></span></div>
                                    
                                </div>
                            </div>
              <div class="uk-width-medium-1-2">
                                <div class="parsley-row">
                                    <div class="md-input-wrapper md-input-filled"><label for="email">Status<span class="req">*</span></label><input type="text" name="customer_postal_code" class="md-input label-fixed" value="<?php echo $order['status'];?>" data-parsley-id="20" disabled><span class="md-input-bar"></span></div>
                                    
                                </div>
                            </div>
                        </div>
						
						<div class="uk-grid" data-uk-grid-margin="">
						      <div class="uk-width-medium-1-1">
                                <div class="parsley-row">
                                    <div class="md-input-wrapper md-input-filled"><label for="fullname">Remark<span class="req">*</span></label><br><textarea rows="4" cols="50" name="remark" disabled><?php echo $order['remark'];?></textarea><span class="md-input-bar"></span></div>   
                                </div>
                            </div>
							   
						</div>
                    <div class="uk-grid" data-uk-grid-margin="">
						      <div class="uk-width-medium-1-1">
                                <div class="parsley-row">
                                    <div class="md-input-wrapper md-input-filled"><label for="fullname">INCO Terms<span class="req">*</span></label><br><textarea rows="4" cols="50" name="remark" disabled><?php echo $order['inco_term'];?></textarea><span class="md-input-bar"></span></div>   
                                </div>
                            </div>
							   
						</div>
                    <div class="uk-grid" data-uk-grid-margin="">
						      <div class="uk-width-medium-1-1">
                                <div class="parsley-row">
                                    <div class="md-input-wrapper md-input-filled"><label for="fullname">Delivery Terms<span class="req">*</span></label><br><textarea rows="4" cols="50" name="remark" disabled><?php echo $order['delivery_terms'];?></textarea><span class="md-input-bar"></span></div>   
                                </div>
                            </div>
							   
						</div>
                     <?php
$abcd= $order['id'];
 $query = $this->db->query("select * from orders_products where order_id = $abcd");
 $customer_contacts = $query->result_array();
 if(!empty($customer_contacts)){
     $a=1;foreach($customer_contacts as $contact){

         ?>   
                    
                    
                    
                                                                   <?php echo '<b><h4>Order Products:' .$a++. '</h4></b><br>'; ?>
         <div class="uk-grid " data-uk-grid-margin="">
                             <div class="uk-width-medium-1-4">
                                 <div class="parsley-row">
                                    <div class="md-input-wrapper md-input-filled"><label for="fullname">Product Name<span class="req">*</span></label><input type="text" name="customer_country" disabled class="md-input label-fixed" value="<?php echo $contact['p_name'];?>" data-parsley-id="18"><span class="md-input-bar"></span></div>   
                                </div>
                             </div>
                            <div class="uk-width-medium-1-4">
                                <div class="parsley-row">
                                    <div class="md-input-wrapper md-input-filled"><label for="email">Product Price<span class="req">*</span></label><input type="text" name="Principal_postal_code" class="md-input label-fixed" disabled value="<?php echo $contact['p_price'];?>" data-parsley-id="20"><span class="md-input-bar"></span></div>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-4">
                                <div class="parsley-row">
                                    <div class="md-input-wrapper md-input-filled"><label for="email">Quntity<span class="req">*</span></label><input type="text"  class="md-input label-fixed" disabled value="<?php echo $contact['p_quntity'];?>" data-parsley-id="20"><span class="md-input-bar"></span></div>
                                </div>
                            </div>
                       <div class="uk-width-medium-1-5">
                                <div class="parsley-row">
                                    <div class="md-input-wrapper md-input-filled"><label for="email">Sub Total<span class="req">*</span></label><input type="text"  class="md-input label-fixed" disabled value="<?php echo $contact['p_subtotal'];?>" data-parsley-id="20"><span class="md-input-bar"></span></div>
                               
                       
                              
                                    <div class="md-input-wrapper md-input-filled">
                                        <label for="email">Currency<span class="req">*</span></label>
                                        <input type="text"  class="md-input label-fixed" disabled value="<?php echo $contact['currency'];?>" data-parsley-id="20"><span class="md-input-bar"></span>
                                    </div>
                                     </div>
                               
                        </div>
                       
                        </div>
<br>
                                                            
         <?php }                                                   
 }?>                                                 
              
<br>

                   <div class="uk-grid " data-uk-grid-margin="">
                   <div class="uk-width-medium-1-3">
                       <div class="parsley-row">
                                    <div class="md-input-wrapper md-input-filled"><label for="fullname">Total (EUR+USD)<span class="req"></span></label><span style="margin-left:2px;">
                                        <input type="text" name="Principal_postal_code" class="md-input label-fixed" disabled value="<?php echo $order['total'];?>" data-parsley-id="20">
                                        </span>
                                    </div>   
                                </div>
                   </div>
                       <div class="uk-width-medium-1-3">
                       <div class="parsley-row">
                                    <div class="md-input-wrapper md-input-filled"><label for="fullname">Total USD<span class="req"></span></label><span style="margin-left:2px;">
                                        <input  class="md-input label-fixed" disabled value="<?php echo $order['totalusd'];?>" data-parsley-id="20">
                                        </span>
                                    </div>   
                                </div>
                   </div>
                       <div class="uk-width-medium-1-3">
                       <div class="parsley-row">
                                    <div class="md-input-wrapper md-input-filled"><label for="fullname">Total EURO<span class="req"></span></label><span style="margin-left:2px;">
                                        <input  class="md-input label-fixed" disabled value="<?php echo $order['totaleur'];?>" data-parsley-id="20">
                                        </span>
                                    </div>   
                                </div>
                   </div>
                   </div><br>
                         <?php 
 $orders_images = $this->db->query("select * from orders_images where order_id = $abcd")->result_array();
 if(!empty($orders_images)) {
     $lllll=1;
     foreach($orders_images as $ed){
         ?>
            <div class="uk-grid " data-uk-grid-margin="">
                <div class="uk-width-medium-1-4">Image <?php echo $lllll; ?></div>
                <div class="uk-width-medium-1-4">
                    <a href="<?php echo base_url(); ?>images/<?php echo $ed['name'];?>" target="_blank" > <img style="width: 200px;" src="<?php echo base_url(); ?>images/<?php echo $ed['name'];?>" /></a>
                </div>
            </div>
         <?php
         
   $lllll++;  }
 }
?>
                   
                </div>
                                                            
                                                            
                                                      
                                                            
                                                        </div>
							</p>
                                                        
                                                        

                                                        
                                                        
                            <div class="uk-modal-footer uk-text-right">
                            <button type="button" class="md-btn md-btn-flat uk-modal-close" style="background-color:#1976D2;">Close</button><!--<button type="submit" class="md-btn md-btn-flat md-btn-flat-primary" style="background-color:#1976D2;color:white" onClick="return ConfirmDialog1()">Submit</button>-->
                            </div>
                            </div>
							
                
                        </div>
  
  
  <!---- view  model end-->
 <a href="<?php echo base_url()?>seller/delete_order/<?php echo $order['id'];?>" onclick="return ConfirmDialog()" title="Delete" onclick="return ConfirmDialog()"><i class="material-icons" style="font-size:28px;color:#1976D2;"></i></a> &nbsp;
<a href="<?php echo base_url()?>printOrder/<?php echo $order['id'];?>" title="Print Invoice"><i class="fa fa-print" style="font-size:28px;color:#1976D2;"></i></a>
<a href="" title="Quickview" data-uk-modal="{target:'#modal_header_footer2_<?php echo $order['id']; ?>'}"><i class="fa fa-eye" style="font-size:28px;color:#1976D2;"></i></a>

<!--<a href="mailto:" target="_blank" title="Email"><i class="material-icons" style="font-size:28px;color:#1976D2;">email</i></a>-->

<!--<a href="<?php echo base_url()?>seller/pdf_invoice/<?php echo $order['id'];?>" target="_blank" title="PDF" ><i class="fa fa-file-pdf-o" style="font-size:28px;color:#1976D2;"></i></a>-->

<!---- view  model start -->
  <div class="uk-modal" id="modal_header_footer2_<?php echo $order['id']; ?>" aria-hidden="true" style="display: none; overflow-y: auto;"> 
		                 
<input type="hidden" name="uid" class="md-input label-fixed" value="<?php echo $customer['customer_id'];?>" data-parsley-id="4">				  
				  <div class="uk-modal-dialog" style="top: 88px;">
                            <div class="uk-modal-header"><h3 class="uk-modal-title">order Detail</h3></div>
                            <hr style="border:2px solid #e0e0e0;"></hr>
                            <p>
                                <?php 
                            //    echo '<pre>'; print_r($data1); echo '</pre>'; 
                                ?>
							<div class="md-card"style="font-size: 12px;" >
            <div class="md-card-content large-padding">
                    <div class="uk-grid " data-uk-grid-margin="">  
                          <div class="uk-width-medium-1-2">
                           <div class="parsley-row">
                                <div class="md-input-wrapper md-input-filled">MSG ID : &nbsp;&nbsp;<?php echo $data1['short_name'].'/0000'.$order['order_no'] //echo $order['order_no'];?></div>    
                            </div>
                            </div>
                            
                     </div>
                <div class="uk-grid " data-uk-grid-margin="" style="margin-top: 0px;">
                       <div class="uk-width-medium-1-2">
                          <div class="parsley-row">
                            <div class="md-input-wrapper md-input-filled">Date : &nbsp;&nbsp;<?php echo date(" d-M-Y ")?></div>    
                          </div>
                       </div>
                     </div>
                
                
                
                <div class="uk-grid " data-uk-grid-margin="" style="margin-top: 0px;">
                       <div class="uk-width-medium-1-2">
                          <div class="parsley-row">
                            <div class="md-input-wrapper md-input-filled"><?php echo $data1['Principal_person']; ?></div>    
                          </div>
                       </div>
                      </div>
                <br><br>
                <div class="uk-grid " data-uk-grid-margin="" style="margin-top: 0px;">
                       <div class="uk-width-medium-1-2">
                          <div class="parsley-row">
                            <div class="md-input-wrapper md-input-filled">Dear <?php echo $data3['name']; ?>, </div>    
                          </div>
                       </div>
                      </div>
                <div class="uk-grid " data-uk-grid-margin="" style="margin-top: 0px;">
                       <div class="uk-width-medium-1-2">
                          <div class="parsley-row">
                            <div class="md-input-wrapper md-input-filled"><?php echo $order['remark'];?></div>    
                          </div>
                       </div>
                      </div>
                     <br><br>
                    <div class="uk-grid " data-uk-grid-margin="" style="margin-top: 0px;">
                       <div class="uk-width-medium-1-2">
                          <div class="parsley-row">
                              <div class="md-input-wrapper md-input-filled"><u>Customer</u> : &nbsp;&nbsp; <?php echo $data2['customer_person']; ?></div>    
                          </div>
                       </div>
                      </div>
                  
                    <div class="uk-grid " data-uk-grid-margin="" style="margin-top: 0px;">
                        <div class="uk-width-medium-1-2">
                            <div class="parsley-row">
                                     <div class="md-input-wrapper md-input-filled"><u>Product</u> :&nbsp;&nbsp;&nbsp;
                                <?php
                                $abcd= $order['id'];
                                $query = $this->db->query("select * from orders_products where order_id = $abcd");
                                $customer_contacts = $query->result_array();
                                if(!empty($customer_contacts)){
                                $a=1;foreach($customer_contacts as $contact){
                                ?>  
                               <?php echo $contact['p_name'];?>&nbsp;&nbsp;<?php //echo $contact['p_quntity'];?> =&nbsp; <?php echo $contact['p_quntity'];?><?php //echo $contact['p_subtotal'];?>&nbsp;&nbsp;<?php //echo $contact['currency'];?><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;           
                               <?php }?>
                                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <?php }?>    
                                  
                                     </div>
                           </div>
                        </div>
                    </div>
                      
                      <?php
                       $data4=$query4->result_array();
                         $po=array();
                         $eeeeepo='';
                         if(!empty($data4)){
                             foreach($data4 as $ed){
                                $po[]= $ed['po'];
                                
                             }
                         }
                         if(!empty($po)){
                             $eeeeepo=implode(',',$po);
                         }
                         //echo'<pre>';print_r($po);echo'</pre>';
                         ?>  
                                          <div class="uk-grid " data-uk-grid-margin="" style="margin-top: 0px;">
                       <div class="uk-width-medium-1-2">
                          <div class="parsley-row">
                              <div class="md-input-wrapper md-input-filled"><u>PO Number</u> : &nbsp;&nbsp; <?php echo $eeeeepo;?></div>    
                          </div>
                       </div>
                      </div>
                       <div class="uk-grid " data-uk-grid-margin="" style="margin-top: 0px;">
                       <div class="uk-width-medium-1-2">
                          <div class="parsley-row">
                              <div class="md-input-wrapper md-input-filled"><u>Shipment</u> : &nbsp;&nbsp;<?php echo $order['orderdate'];?></div>    
                          </div>
                       </div>
                      </div>
                      <div class="uk-grid " data-uk-grid-margin="" style="margin-top: 0px;">
                       <div class="uk-width-medium-1-2">
                          <div class="parsley-row">
                              <div class="md-input-wrapper md-input-filled"><u>Payment terms</u> : &nbsp;&nbsp; <?php echo $order['payment_term'];?></div>    
                          </div>
                       </div>
                      </div>
                      <div class="uk-grid " data-uk-grid-margin="" style="margin-top: 0px;">
                       <div class="uk-width-medium-1-2">
                          <div class="parsley-row">
                              <div class="md-input-wrapper md-input-filled"><u>Destination</u> : &nbsp;&nbsp;<?php echo $order['destination'];?></div>    
                          </div>
                       </div>
                      </div>
           <br><br>
        </div>             
       </div>
	</p>                            
                            <div class="uk-modal-footer uk-text-right">
                            <button type="button" class="md-btn md-btn-flat uk-modal-close" style="background-color:#1976D2;">Close</button><!--<button type="submit" class="md-btn md-btn-flat md-btn-flat-primary" style="background-color:#1976D2;color:white" onClick="return ConfirmDialog1()">Submit</button>-->
                            </div>
                            </div>
							
                
                        </div>
  
  
  <!---- view  model end-->




<!--<form action="" method="post">
    <input type="submit" value="Send Email" />
    <input type="hidden" name="button_pressed" value="1" />
    <a href="<?php echo base_url()?>seller/mailOrder" target="_blank" data-uk-tooltip="{pos:'bottom'}" title=" <?php if($order[status]!='Quotation'){ echo 'Send Email';}else{echo 'Quotation With Payment';}?>"><i class="material-icons" style="font-size:28px;color:#1976D2;">mail</i></a>
</form>-->

                       </td>
                            </tr>
                            <?php }$i++;?>
                            </tbody>
                        </table>
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
           
<div class="md-fab-wrapper">
    <a class="md-fab md-fab-accent" href="http://www.risusventures.com/usermanagement/placeOrder" id="recordAdd"  Title="Add New Order">
        <i class="material-icons"></i>
    </a>
</div>
            <div id="preloader">
 <div id="status"></div>
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
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
   <script src="<?php echo base_url();?>assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
    
<script type="text/javascript">

function ConfirmDialog(){
var x=confirm('Do You Want Delete This Record..');
if(x){
return true;
}else{
return false;
 }
}

function abcd(){
    alert();
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
<script type="text/javascript">
            // When the document is ready
                       $('#datepicker2').datepicker({
    format: 'dd/mm/yyyy',

    autoclose: true,
})
        </script>
 <script type="text/javascript">
            // When the document is ready
           
            
            $('#datepicker1').datepicker({
    format: 'dd/mm/yyyy',

    autoclose: true,
})
        </script>



  <!-- date picker -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/2.3.1/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.comiseo.daterangepicker.js"></script>
            
            <!-- date picker -->
            
          
 
</body>

</html>