
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>	<?php foreach ($payment as $row) { echo 'Payment Order No.'.$row['invoice_no'];}?></title>
<link rel="shortcut icon" href="">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="http://sim.tecdiary.my/themes/default/assets/style/bootstrap2.css" rel="stylesheet">
<link href="http://sim.tecdiary.my/themes/default/assets/style/style.css" rel="stylesheet">
<link href="http://sim.tecdiary.my/themes/default/assets/style/rwd-table.css" rel="stylesheet">
<script type="text/javascript" src="http://sim.tecdiary.my/themes/default/assets/js/jquery.js"></script>
<style type="text/css">
html, body { height: 100%; padding:0; margin: 0; }
#wrap { padding: 20px; }
td, th { padding: 3px 6px; }
.word_text { text-transform: capitalize; }
@media print {
    .page-break { height: 40px; }
    .page-break { page-break-before: always; }
}
</style>
</head>

<body>
<div id="wrap" style="width:600px;margin:auto;border:1px solid;">
<center><img src="<?php echo base_url();?>assets/img/full_logo.png" alt="My Company Name" /></center><br>
<div class="row-fluid">    
<div class="span6">
    
    <h3>From,</h3>
	<?php foreach ($profile as $row) {?>
	<h5><?php echo $row['company_name'];?></h5><?php echo $row['address'];?>,<br /><?php echo $row['city']?> , <?php echo $row['state'];?> , <?php echo $row['postal_code'];?><br />Tel: <?php echo $row['tele_number'];?> , <?php echo $row['mobile_number']; ?><br />Email: <?php echo $row['email'];}?><br />  
	</div>
  
   <div class="span6">
   <h3>To,</h3>
   	<?php foreach ($payment as $row) {
   echo '<h5>'.$row['customer_company'].'</h5><p>Address: '.$row['customer_address'].'</p><p>Tele:'.$row['customer_phone'].'</p><p>Email:'.$row['customer_email'].'</p>';

	}?>
    </div> 
</div>
<div style="clear: both;"></div>
<p>&nbsp;</p>
<div class="row-fluid"> 
<div class="span6">     
<h3 class="inv">Order No.<?php echo $row['invoice_no']?></h3>
</div>
<div class="span6">

<p style="font-weight:bold;">Mode Of Payment:<?php echo $row['mode_of_payment'];?></p>

<p style="font-weight:bold;">Payment Date: <?php echo $row['invoice_date'];?></p>
    
   </div>
   <p>&nbsp;</p>
 <div style="clear: both;"></div>   
    <table class="table table-bordered table-hover table-striped" style="margin-bottom: 5px;">
    <thead> 
		</thead> 
		<tbody>     
                <tr>
                <td style="width: 100px; text-align:right; vertical-align:middle;"><h4>Payment</h4></td>
                 
                <td style="width: 100px; text-align:right; vertical-align:middle;"><h4>Rs.<?php echo $row['invoice_paid_amount'];?></h4></td> 
            </tr> 
    </tbody> 
    </table> 
<div class="row-fluid"> 
<div class="span4 pull-right"> 
<p>&nbsp;</p>
<p style="border-bottom: 1px solid #666;">&nbsp;</p>
<p>Signature &amp; Stamp</p>
</div>
<div class="clearfix"></div>
</div>
</div>
 
   
</body>
</html>