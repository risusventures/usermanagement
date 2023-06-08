
<html>
<head>

<title>
<?php foreach ($profile as $row ) {
} echo 'Company Name:'.$row['company_name'];?></title></head>
<body>	
<table style="margin:auto;width:100%;border-radius:10px;border:1px solid;"   id="printableArea" name="print">
<tr style="padding:10px">
<th style="border:1px solid;">Order No.</th>
<th style="border:1px solid;">Order Date.</th>
<th style="border:1px solid;">Company Name</th>
<th style="border:1px solid;">Total Amount</th>
<th style="border:1px solid;">Sub Total</th>
<th style="border:1px solid;">Tax</th>
</tr>
<?php 
foreach ($order as $key) {
?>
<tr style="padding:10px" height="50">
<td style="padding:10px;text-align:center;border:1px solid;"><?php echo $key['invoice_no'];?></td>
<td  style="padding:10px;text-align:center;border:1px solid;"><?php echo $key['invoice_date'];?></td>
<td  style="padding:10px;text-align:center;border:1px solid;"><?php echo $key['customer_company'];?></td>
<td  style="padding:10px;text-align:center;border:1px solid;"><?php echo $key['Total_amount'];?></td>
<td  style="padding:10px;text-align:center;border:1px solid;"><?php echo $key['sub_total'];?></td>
<td  style="padding:10px;text-align:center;border:1px solid;"><?php echo $key['tax'];?></td>
<td style="padding:10px;text-align:center;border:1px solid;"><?php echo $key['customer_name'];?></td>
</tr>
<?php }?>
</table>
<br><br><br><br>
<center><button id="printbutton" onclick="window.print();" />Print </button><center><br><br>


</body>	

</html>