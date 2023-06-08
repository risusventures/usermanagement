

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title> <?php foreach ($order_sheet as $row) { echo 'Payment Order No.'.$row['invoice_no'];}?></title>
</head>
<body yahoo=fix scroll="auto" style="padding:0; margin:0; FONT-SIZE: 12px; FONT-FAMILY: Arial, Helvetica, sans-serif; cursor:auto; background:#F3F3F3;background-color:white;">
<TABLE class="rtable mainTable" cellSpacing=0 cellPadding=0 width="100%" bgColor=#f3f3f3>

<TR>
<TD vAlign=top>
<TABLE style="MARGIN: 0px auto; WIDTH: 1100px" class=rtable border=0 cellSpacing=0 cellPadding=0 width=600 align=center>
<TR>
<TD style="BORDER-BOTTOM: medium none; BORDER-LEFT: medium none; PADDING-BOTTOM: 0px; BACKGROUND-COLOR: #feffff; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; BORDER-TOP: medium none; BORDER-RIGHT: medium none; PADDING-TOP: 0px">
<TABLE style="WIDTH: 100%" class=rtable cellSpacing=0 cellPadding=0 align=left>
<TR style="HEIGHT: 20px">
<TD style="BORDER-BOTTOM: medium none; TEXT-ALIGN: center; BORDER-LEFT: medium none; PADDING-BOTTOM: 0px; BACKGROUND-COLOR: #feffff; PADDING-LEFT: 35px; WIDTH: 100%; PADDING-RIGHT: 35px; VERTICAL-ALIGN: middle; BORDER-TOP: medium none; BORDER-RIGHT: medium none; PADDING-TOP: 20px">
<P style="LINE-HEIGHT: 155%;    background-color: rgba(169, 169, 169, 0.14); MARGIN-TOP: 0px;  sans-serif; MARGIN-BOTTOM: 1em; COLOR: #000000; FONT-SIZE: 24px; mso-line-height-rule: exactly;font-family:verdana;" align=center><STRONG>Order Sheet</STRONG></P></TD></TR></TABLE></TD></TR>
<TR>
<TD style="BORDER-BOTTOM: medium none; BORDER-LEFT: medium none; PADDING-BOTTOM: 0px; BACKGROUND-COLOR: #feffff; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; BORDER-TOP: medium none; BORDER-RIGHT: medium none; PADDING-TOP: 0px">
<TABLE style="WIDTH: 100%" class=rtable cellSpacing=0 cellPadding=0 align=left>
<TR style="HEIGHT: 273px">
<TD style="BORDER-BOTTOM: medium none; TEXT-ALIGN: center; BORDER-LEFT: medium none; PADDING-BOTTOM: 0px; BACKGROUND-COLOR: #feffff; PADDING-LEFT: 35px; WIDTH: 100%; PADDING-RIGHT: 35px; VERTICAL-ALIGN: middle; BORDER-TOP: medium none; BORDER-RIGHT: medium none; PADDING-TOP: 0px">
<TABLE style="BORDER-BOTTOM: transparent 1px solid; BORDER-LEFT: transparent 1px solid; WIDTH: 49%; BORDER-TOP: transparent 1px solid; BORDER-RIGHT: transparent 1px solid" class=rtable cellSpacing=0 cellPadding=0 align=left>
<TR>
<TD style="PADDING-BOTTOM: 4px; PADDING-LEFT: 4px; PADDING-RIGHT: 4px; PADDING-TOP: 4px">
<DIV style="mso-table-lspace: 0; mso-table-rspace: 0">
<P style="LINE-HEIGHT: 155%; BACKGROUND-COLOR: transparent; MARGIN-TOP: 0px; FONT-FAMILY: Arial, Helvetica, sans-serif; MARGIN-BOTTOM: 1em; COLOR: #000000; FONT-SIZE: 13px; mso-line-height-rule: exactly" align=left>
  <STRONG>From:<br></STRONG>
  <?php foreach ($profile as $value) {?>
  <b>Company :</b><?php echo $value['company_name'];?>
  <br><b>Address :</b><?php echo $value['address'];?>
  <br><b>Tel-Numbe :</b><?php echo $value['tele_number'];?>
  <br><b>Mobile-Number :</b><?php echo $value['mobile_number'];?>
  <br><b>Fax-Number :</b><?php echo $value['fax_number'];?>
  <br><b>Email :</b><?php echo $value['email'];?>
  <br><b>Website :</b><?php echo $value['website'];?>
  <?php }?>
  <br><br><b>Payment Order No.<?php foreach($order_sheet as $row){}echo $row['invoice_no'];?>

</P></DIV></TD></TR></TABLE>
<TABLE style="BORDER-BOTTOM: transparent 1px solid;width:50%;float:right; BORDER-LEFT: transparent 1px solid; BORDER-TOP: transparent 1px solid; BORDER-RIGHT: transparent 1px solid" class=rtable cellSpacing=0 cellPadding=0 align=right>
<TR>
<TD style="PADDING-BOTTOM: 4px; PADDING-LEFT: 4px; PADDING-RIGHT: 4px; PADDING-TOP: 4px">
<DIV style="mso-table-lspace: 0; mso-table-rspace: 0">
<P style="LINE-HEIGHT: 155%; BACKGROUND-COLOR: transparent; MARGIN-TOP: 0px; FONT-FAMILY: Arial, Helvetica, sans-serif; MARGIN-BOTTOM: 1em; COLOR: #000000; FONT-SIZE: 13px; mso-line-height-rule: exactly;float:right;" align=left>
<STRONG>To:<BR></STRONG><?php echo $row['customer_company'];?>
<BR><b>Address</b> : <?php echo $row['customer_address'];?>
  <BR><b>Phone</b> : <?php echo $row['customer_phone'];?>, 
<BR><b>Email</b> : <?php echo $row['customer_email'];?>
<BR>
<br>
<br>
<br>
<br>
<b>Order Date</b> : <?php echo $row['invoice_date'];?>
</P></DIV>
</TD>
</TR></TABLE></TD></TR></TABLE></TD>
</TR>
<TR>
<TD style="BORDER-BOTTOM: medium none; BORDER-LEFT: medium none; PADDING-BOTTOM: 0px; BACKGROUND-COLOR: #feffff; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; BORDER-TOP: medium none; BORDER-RIGHT: medium none; PADDING-TOP: 0px">
<br><br>  
<TABLE style="WIDTH: 100%" class=rtable cellSpacing=0 cellPadding=0 align=left>
<TR style="HEIGHT: 1px">
<TD style="BORDER-BOTTOM: medium none; TEXT-ALIGN: center; BORDER-LEFT: medium none; PADDING-BOTTOM: 10px; BACKGROUND-COLOR: #feffff; PADDING-LEFT: 15px; WIDTH: 100%; PADDING-RIGHT: 15px; VERTICAL-ALIGN: middle; BORDER-TOP: medium none; BORDER-RIGHT: medium none; PADDING-TOP: 10px">
<TABLE style="MARGIN-TOP: 0px; MARGIN-BOTTOM: 0px" class=rtable border=0 width="100%">
<TR>
<TD style="BORDER-BOTTOM: medium none; BORDER-LEFT: medium none; PADDING-BOTTOM: 0px; LINE-HEIGHT: 1px; BACKGROUND: none transparent scroll repeat 0% 0%; HEIGHT: 1px; FONT-SIZE: 1px; BORDER-TOP: #999999 1px solid; BORDER-RIGHT: medium none; PADDING-TOP: 0px; mso-line-height-rule: exactly">&#160;</TD></TR></TABLE></TD></TR></TABLE></TD></TR>
<TR>
<TD style="BORDER-BOTTOM: medium none; BORDER-LEFT: medium none; PADDING-BOTTOM: 0px; BACKGROUND-COLOR: #feffff; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; BORDER-TOP: medium none; BORDER-RIGHT: medium none; PADDING-TOP: 0px">
<TABLE style="WIDTH: 100%" class=rtable cellSpacing=0 cellPadding=0 align=left>


<TR style="HEIGHT: 10px">
<TD style="BORDER-BOTTOM: medium none; TEXT-ALIGN: center; BORDER-LEFT: medium none; PADDING-BOTTOM: 0px; BACKGROUND-COLOR: #feffff; PADDING-LEFT: 35px; WIDTH: 100%; PADDING-RIGHT: 35px; VERTICAL-ALIGN: middle; BORDER-TOP: medium none; BORDER-RIGHT: medium none; PADDING-TOP: 0px">

<table style="width:100%;">
<tr style="height:40px;border:1px solid;background-color:darkgray">
<th style="border:1px solid;">S.No.</th>
<th style="border:1px solid;">Product Name</th>
<th style="border:1px solid;">Quantity</th>
<th style="border:1px solid;">Unit Price</th>
<th style="border:1px solid;">Sub Total</th>
</tr>
<?php $i=1; foreach ($order_sheet as $row) {

  ?>
<tr style="height:40px;border:1px solid;background-color:azure;">
<td style="border:1px solid;"><?php echo $i;?></td>
<td style="border:1px solid;"><?php echo $row['productName'];?></td>
<td style="border:1px solid;"><?php echo $row['quantity'];?></td>
<td style="border:1px solid;"><?php echo $row['buyPrice'];?></td>
<td style="border:1px solid;"><?php echo $row['amount'];?></td>

</tr>
<?php $i=$i+1; }?>
</table>

<?php foreach ($invoice_paid_amount as $key ) {
      $total_paid+= $key['invoice_paid_amount'];
    }  $total = $total_paid;

  ?>
<br>
<table width="100%" >
  <tr style="height:40px;background-color: aliceblue;">
    <th width="862" scope="col"><b style="float:right;margin-right:10px;">Tax</b></th>
    <th width="132" scope="col"><?php echo $row['tax'];?>%</th>
  </tr>
  <tr style="height:40px;background-color: aliceblue;">
    <td><b style="float:right;margin-right:10px;">Tax Amount</b></td>
    <td><b ><?php if( $row['tax_amount']){ echo 'Rs.'.$row['tax_amount'];}else{ echo 'Rs.0';}?></b></td>
  </tr>
  <tr style="height:40px;background-color: aliceblue;">
    <td><b style="float:right;margin-right:10px;">Paid Amount</b></td>
    <td><?php if( $total){ echo 'Rs.'.$total;}else{ echo 'Rs.0';}?></td>
  </tr>
  <tr style="height:40px;background-color: aliceblue;">
    <td><b style="float:right;margin-right:10px;">Grand Total</b></td>
    <td><?php $grand_total = $row['Total_amount']-$total; echo 'Rs.'.$grand_total.'/-';?></td>
  </tr >
  <tr style="height:40px;background-color: aliceblue;">
    <td><b style="float:right;margin-right:10px;">Status</b></td>
    <td><?php echo $row['status'];?></td>
  </tr >
  <tr style="height:40px">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</TD></TR>
</TABLE></TD></TR>

<TR>
<TD style="BORDER-BOTTOM: medium none; BORDER-LEFT: medium none; PADDING-BOTTOM: 0px; BACKGROUND-COLOR: #feffff; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; BORDER-TOP: medium none; BORDER-RIGHT: medium none; PADDING-TOP: 0px">
<TABLE style="WIDTH: 100%" class=rtable cellSpacing=0 cellPadding=0 align=left>
<TR style="HEIGHT: 10px">
<TD style="BORDER-BOTTOM: medium none; TEXT-ALIGN: center; BORDER-LEFT: medium none; PADDING-BOTTOM: 0px; BACKGROUND-COLOR: #feffff; PADDING-LEFT: 35px; WIDTH: 100%; PADDING-RIGHT: 35px; VERTICAL-ALIGN: middle; BORDER-TOP: medium none; BORDER-RIGHT: medium none; PADDING-TOP: 0px">
<TABLE style="BORDER-BOTTOM: transparent 1px solid; BORDER-LEFT: transparent 1px solid; WIDTH: 49%; BORDER-TOP: transparent 1px solid; BORDER-RIGHT: transparent 1px solid" class=rtable cellSpacing=0 cellPadding=0 align=left>
<TR>
<TD style="PADDING-BOTTOM: 4px; PADDING-LEFT: 4px; PADDING-RIGHT: 4px; PADDING-TOP: 4px">
<DIV style="mso-table-lspace: 0; mso-table-rspace: 0">
<br><br>
<p style="border-bottom:2px solid;"></p>  
<P style="LINE-HEIGHT: 155%; BACKGROUND-COLOR: transparent; MARGIN-TOP: 0px; FONT-FAMILY: Arial, Helvetica, sans-serif; MARGIN-BOTTOM: 1em; COLOR: #000000; FONT-SIZE: 18px; mso-line-height-rule: exactly" align=left><STRONG style="font-size:18px;"><center>Signature</center> </STRONG></P></DIV></TD>
</TR></TABLE>
<TABLE style="BORDER-BOTTOM: transparent 1px solid; BORDER-LEFT: transparent 1px solid; WIDTH: 49%; BORDER-TOP: transparent 1px solid; BORDER-RIGHT: transparent 1px solid" class=rtable cellSpacing=0 cellPadding=0 align=right>
<TR>
<TD style="PADDING-BOTTOM: 4px; PADDING-LEFT: 4px; PADDING-RIGHT: 4px; PADDING-TOP: 4px">
<DIV style="mso-table-lspace: 0; mso-table-rspace: 0">
<P style="LINE-HEIGHT: 155%; BACKGROUND-COLOR: transparent; MARGIN-TOP: 0px; FONT-FAMILY: Arial, Helvetica, sans-serif; MARGIN-BOTTOM: 1em; COLOR: #000000; FONT-SIZE: 18px; mso-line-height-rule: exactly" align=right></P></DIV></TD></TR></TABLE></TD></TR>
</TABLE></TD></TR>
<TR>  
<TD style="BORDER-BOTTOM: medium none; BORDER-LEFT: medium none; PADDING-BOTTOM: 0px; BACKGROUND-COLOR: #feffff; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; BORDER-TOP: medium none; BORDER-RIGHT: medium none; PADDING-TOP: 0px">
<TABLE style="WIDTH: 100%" class=rtable cellSpacing=0 cellPadding=0 align=left>
<TR style="HEIGHT: 1px">
  
<TD style="BORDER-BOTTOM: medium none; TEXT-ALIGN: center; BORDER-LEFT: medium none; PADDING-BOTTOM: 0px; BACKGROUND-COLOR: #feffff; PADDING-LEFT: 15px; WIDTH: 100%; PADDING-RIGHT: 15px; VERTICAL-ALIGN: middle; BORDER-TOP: medium none; BORDER-RIGHT: medium none; PADDING-TOP: 0px">
<TABLE style="MARGIN-TOP: 0px; MARGIN-BOTTOM: 0px" class=rtable border=0 width="100%">
<TR>  
<TD style="BORDER-BOTTOM: medium none; BORDER-LEFT: medium none; PADDING-BOTTOM: 0px; LINE-HEIGHT: 1px; BACKGROUND: none transparent scroll repeat 0% 0%; HEIGHT: 1px; FONT-SIZE: 1px; BORDER-TOP: #999999 1px solid; BORDER-RIGHT: medium none; PADDING-TOP: 0px; mso-line-height-rule: exactly">&#160;</TD></TR></TABLE></TD></TR></TABLE></TD></TR></TABLE></TD></TR>
<TR>
<TD style="LINE-HEIGHT: 0; HEIGHT: 8px; FONT-SIZE: 0px">&#160;</TD>
</TR></TABLE>
</body>
</html>