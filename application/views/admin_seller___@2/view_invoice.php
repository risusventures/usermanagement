<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

    <title>Risus Ventures</title>
<link rel="shortcut icon" href="http://sim.tecdiary.my/themes/default/assets/img/favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="http://sim.tecdiary.my/themes/default/assets/style/bootstrap2.css" rel="stylesheet">
<link href="http://sim.tecdiary.my/themes/default/assets/style/style.css" rel="stylesheet">
<link href="http://sim.tecdiary.my/themes/default/assets/style/rwd-table.css" rel="stylesheet">
<script type="text/javascript" src="http://sim.tecdiary.my/themes/default/assets/js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="http://cdn.webrupee.com/font">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
html, body { height: 100%; padding:0; margin: 0; }
#wrap { padding: 20px; }
td, th { padding: 3px 6px; }
.word_text { text-transform: capitalize; }
@media print {
    .page-break { height: 40px; }
    .page-break { page-break-before: always; }
}
p{
    margin: 0 0 5px;
}
</style>
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

<body>
<div id="wrap" style="width:800px;margin:auto;border:1px solid;">
<?php if($order_sheet[0]['status']=='Paid'){
echo '<img src="'.base_url().'assets/img/paid.png" alt="paid" style="float:right;margin-bottom: -79px;margin-top: -20px;"/>';
}elseif($order_sheet[0]['status']=='Pending'){
echo '<img src="'.base_url().'assets/img/pending.png" alt="paid" style="float:right;margin-bottom: -79px;margin-top: -20px;"/>';
}
elseif($order_sheet[0]['status']=='Due'){
echo '<img src="'.base_url().'assets/img/due.png" alt="paid" style="float:right;margin-bottom: -79px;margin-top: -20px;"/>';
}
elseif($order_sheet[0]['status']=='canceled'){
echo '<img src="'.base_url().'assets/img/canceled.png" alt="paid" style="float:right;margin-bottom: -79px;margin-top: -20px;"/>';
}

?>
    <div class="row-fluid">
<div style="float: left;"><img src="<?php echo base_url();?>assets/img/risus-03.png" alt="" style="height: 128px;position: absolute;top: 6px;"/></div>
<div style="float: right; position: relative; right: 323px; top: -35px;"><!--<img src="<?php echo base_url();?>assets/img/full_logo.png" alt="" />--><h3 style="font-size:40px;    margin-top: 40px;
    margin-left: 30px;"><?php if($order_sheet[0]['status']=='Quotation'){ echo  'Quotation'; }else { echo  'Invoice'; } ?> </h3></div><br>
    </div>

<div class="row-fluid" style="clear: both;padding-top: 24px;">

  <div class="span6" style="float:left;">

        <?php foreach ($profile as $value) {
    echo '<div class="span6">';
    echo '<h4>'.$value['company_name'].'</h4>';
    echo '<p>Address : '.$value['address'].'</p>';
    echo '<p>Number : '.$value['tele_number'].$value['mobile_number'].'</p>';
    echo '<p>Email <span style="margin-left:15px;">: '.$value['email'].'</span>';
    echo '</div>'; }?>

  <p>  <?php  /*$qrcode;*/ ?></p><br>
  <?php foreach ($invoice_product as $row){ 
    //  echo '<pre>';print_r($row);echo'</pre>';
     $customer_profile = $row['cid'];
     $query = $this->db->query("select * from customers where customer_id = $customer_profile");
    $customer_contacts = $query->row_array();
    
  ?>
  <p style="font-weight:bold;">Event Date : <?php echo $row['orderdate'];?></p>
  
   <p style="font-weight:bold;">Event Venue : <?php echo $row['event_venue'];?></p>
    </div>

 
   <div class="span6" style="float:right;margin-top:0px;line-height:19px;">
   <h4 style=""><?php echo  strtoupper($customer_contacts['customer_person']);?></h4>
   <p>Address : <?php echo  $customer_contacts['customer_address'];?></p>
   <p>Number : <?php echo  $customer_contacts['customer_phone'];?></p>
   <p>Email<span style="margin-left:15px;"> : <?php echo  $customer_contacts['customer_email'];?></span></p><br><br><br>
   
  
    <p style="font-weight:bold;">Invoice No.: <?php echo $row['invoice_no'];?></p>
    <p style="font-weight:bold;">Order No.: <?php echo $row['order_no'];?></p>
    <?php }?>
    </div>
</div>
<div style="clear: both;"></div>
<p>&nbsp;</p>
<div class="row-fluid">
<div class="span6">

</div>
<div class="span6">


   </div>
   <p>&nbsp;</p>
 <div style="clear: both;"></div>

    <table class="table table-bordered table-hover table-striped" style="margin-bottom: 5px;width:100%;    font-size: 15px;">
    <thead>
    <tr>
        <th style="text-align:center; vertical-align:middle;">S.No.</th>
        <th style="vertical-align:middle;">Product Name</th>
        <th style="text-align:center; vertical-align:middle;">Quantity</th>
        
        <th style="text-align:center; vertical-align:middle;">Unit Price</th>
        <th style="text-align:center; vertical-align:middle;">Subtotal</th>
        
     
    </tr>
    </thead>
    <tbody>
        
    <?php $i=1; foreach ($invoice_product as $row) {
    $oderid= $row['id'];
    $query = $this->db->query("select * from orders_products where order_id = $oderid");
    $customer_contacts = $query->result_array();
    foreach ($customer_contacts as $row1){
   // echo '<pre>';print_r($row1);echo'</pre>';
    
    ?>
             <tr>
                <td style="text-align:center; width:40px; vertical-align:middle;"><?php echo $i;?></td>
                <td style="vertical-align:middle;"><?php echo $row1['p_name'];?></td>
                <td style="width: 100px; text-align:center; vertical-align:middle;"><?php echo $row1['p_quntity'];?></td>
                     
                <td style="width: 100px; text-align:right; vertical-align:middle;"><?php echo $row1['p_price'] . " " .  $row1['currency'] ?></td>
                <td style="width: 100px; text-align:right; vertical-align:middle;"><?php echo $row1['p_subtotal'] . " " . $row1['currency']?></td>
               
            </tr>
    <?php $i=$i+1;  }} ?>
   <!---nonveg-->    


 
  
   <tr></tr>   
     <tr></tr>
     <!--<?php  //echo '<pre>';print_r($invoice_product['commssion']); echo'</pre>'; ?>-->
     <tr>

<td class="word_text" colspan="2"></td>
<td colspan="2" style="text-align:right; font-weight:bold;">Grand Total</td>
<td style="text-align:right; font-weight:bold;">
   <?php if(!empty($invoice_product[0]['totalusd'])){ echo $invoice_product[0]['totalusd'].' USD'; echo '<br>';}   ?>
<?php if(!empty($invoice_product[0]['totaleur'])){ echo $invoice_product[0]['totaleur'].' EUR'; echo '<br>';}   ?>
     
    </td>
</tr>
    </tbody>

    </table>
<div style="clear: both;"></div>
<div class="row-fluid">
<?php foreach ($invoice_product as $row){ 
    //  echo '<pre>';print_r($row);echo'</pre>';
     $customer_profile = $row['cid'];
     $query = $this->db->query("select * from customers where customer_id = $customer_profile");
    $customer_contacts = $query->row_array();
    
  ?>
<div>
<h6  style="background-color:rgba(193, 193, 193, 0.4);padding: 10px 0px 10px 10px;"><b  style="font-weight: bold;font-size:18px;">Note</b></h6>
<b style="font-weight: bold;"><?php echo $row['remark'];?></b>
</div>
    <?php }?>
    <br>
<div class="span4 pull-left" style=" margin-top: 15px;
">

<p>Signature &amp; Stamp</p>
</div>
<?php if($_GET['without']!='payment'){?>
<div class="span4 pull-left">

<p>&nbsp;</p>
<h6  style="background-color:rgba(193, 193, 193, 0.4);padding: 10px 0px 10px 10px;"><b  style="font-weight: bold;font-size:18px;">Terms & Conditions</b></h6>
<ul style="font-size:10px;">
<li>Quotations are valid for 8 weeks. All bookings are subject to minimum guest numbers.</li> 
<li>A non-refundable deposit of 25% is required to secure Catering for the date of your event.</li>
<li>Deposit will be deducted from the total event costs, final funds should be cleared 3 days prior to the event</li>
<li>Service staff price is based on 6 hours, additional hours are charged at £8.50 per hour per person</li>
<li>Delivery charges are based on the post code and guest numbers</li>
<li>Final guest numbers must be confirmed no later than 3 working days prior to the event</li>
<li>In booking cancellations, your deposit will be retained and the following charges will be incurred</li>
<li>Cancellation received within 7 working days of event – 50% of total event cost, within 3 working days of event – 100% of the total event cost</li>
<li>We shall incur no liability if performance of the contract is prevented or hindered by any case whatsoever beyond our control and shall not be liable for any loss or damage resulting there from suffered by customer.</li>
</ul>
</div>
<?php }?>
<div style="clear: both;"></div>
<p>&nbsp;</p>

</div>
</div>
</div>

</body>
<script>

    window.print();

</script>
</html>