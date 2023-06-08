<style>
    table, th, td {
   border: 1px solid black;
}
table {
    border-collapse: collapse;
}
</style>
<div id="wrap" style="width:800px;margin:auto;border:1px solid;padding: 20px; ">


    
    <div class="row-fluid" style="clear: both; padding-top: 24px;">
        <div  style="float:left; width:40%">
            <img src="<?php echo base_url();?>assets/img/risus-03.png" alt="" style="height: 128px;position: absolute;top: 6px;"/>
        </div>
        <div  style="float:right;margin-top:0px;line-height:19px;width:40%">
             <h3 class="invocs" style="font-size:40px;    margin-top: 40px; float: right;
  "><?php echo  'Invoice'; ?> </h3>
        </div>
    </div>
    
<div class="invoc"style="text-align:center; width:100%">
       
    </div>
<div class="row-fluid" style="clear: both; padding-top: 24px;">

  <div  style="float:left; width:40%">

        <?php foreach ($profile as $value) {
    echo '<div class="span6">';
    echo '<h4>'.$value['company_name'].'</h4>';
    echo '<p>Address : '.$value['address'].'</p>';
    echo '<p>Number : '.$value['tele_number'].$value['mobile_number'].'</p>';
    echo '<p>Email <span style="margin-left:15px;">: '.$value['email'].'</span>';
    echo '</div>'; }?>

      <p style="margin: 0 0 5px;">  <?php  /*$qrcode;*/ ?></p><br>
  <?php foreach ($invoice_product as $row){ 
    //  echo '<pre>';print_r($row);echo'</pre>';
     $customer_profile = $row['cid'];
     $query = $this->db->query("select * from customers where customer_id = $customer_profile");
    $customer_contacts = $query->row_array();
    
  ?>
  <p style="font-weight:bold;margin: 0 0 5px;">Event Date : <?php echo $row['orderdate'];?></p>
  
   <p style="font-weight:bold;margin: 0 0 5px;">Event Venue : <?php echo $row['event_venue'];?></p>
    </div>

 
   <div  style="float:right;margin-top:0px;line-height:19px;width:40%">
   <h4 style=""><?php echo  strtoupper($customer_contacts['customer_person']);?></h4>
   <p style="margin: 0 0 5px;">Address : <?php echo  $customer_contacts['customer_address'];?></p>
   <p style="margin: 0 0 5px;">Number : <?php echo  $customer_contacts['customer_phone'];?></p>
   <p style="margin: 0 0 5px;">Email<span style="margin-left:15px;"> : <?php echo  $customer_contacts['customer_email'];?></span></p><br><br><br>
   
  
    <p style="font-weight:bold;margin: 0 0 5px;">Invoice No.: <?php echo $row['invoice_no'];?></p>
    <p style="font-weight:bold;margin: 0 0 5px;">Order No.: <?php echo $row['order_no'];?></p>
    <?php }?>
    </div>
</div>
<div style="clear: both;"></div>
<p style="margin: 0 0 5px;">&nbsp;</p>
<div class="row-fluid">
<div class="span6">

</div>
<div class="span6">
<?php 
//echo '<pre>'; print_r($invoice_product); die;
?>

   </div>
   <p>&nbsp;</p>
 <div style="clear: both;"></div>

    <table class="table table-bordered table-hover table-striped" style="margin-bottom: 5px;width:100%;    font-size: 15px;">
    <thead>
    <tr style="border-bottom: 1px solid black">
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
             <tr style="border-bottom: 1px solid black">
                <td style="text-align:center; width:40px; vertical-align:middle;"><?php echo $i;?></td>
                <td style="vertical-align:middle;"><?php echo $row1['p_name'];?></td>
                <td style="width: 100px; text-align:center; vertical-align:middle;"><?php echo $row1['p_quntity'];?></td>
                     
                <td style="width: 100px; text-align:right; vertical-align:middle;"><?php echo $row1['p_price'] . " " .  $row1['currency'] ?></td>
                <td style="width: 100px; text-align:right; vertical-align:middle;"><?php echo $row1['p_subtotal'] . " " . $row1['currency']?></td>
               
            </tr>
    <?php $i=$i+1;  }} ?>
   <!---nonveg-->    



     <!--<?php  //echo '<pre>';print_r($invoice_product['commssion']); echo'</pre>'; ?>-->
     <tr style="border-bottom: 1px solid black">

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
<p style="margin: 0 0 5px;">&nbsp;</p>

</div>
</div>
</div>
<?php //  die; ?>