<?php $pages = 'manage_category'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css" media="all">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no"/>
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/risus-03.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/risus-03.png" sizes="32x32">
    <title>Order Report - Risus Ventures</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/uikit/css/uikit.almost-flat.min.css"
          media="all">
    <!-- flag icons -->
    <link rel="stylesheet"
          href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/content/jquery/tutorials/bootstrap/tutorial-3/10/css/mdb.min.css"
          media="all">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
          href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/content/jquery/tutorials/bootstrap/tutorial-3/10/css/style.css"
          media="all">
    <link rel="stylesheet"
          href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/content/jquery/tutorials/bootstrap/tutorial-3/10/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/icons/flags/flags.min.css" media="all">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.min.css" media="all">
    <link rel="stylesheet"
          href="<?php echo base_url(); ?>assets/bower_components/kendo-ui/styles/kendo.common-material.min.css"/>
    <link rel="stylesheet"
          href="<?php echo base_url(); ?>assets/bower_components/kendo-ui/styles/kendo.material.min.css"/>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <script src="<?php echo base_url() ?>assets/js/pages/plugins_datatables.min.js"></script>
    <?php include('analytics.php'); ?>
    <script></script>


    <script src="<?php echo base_url(); ?>assets/js/common.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/uikit_custom.min.js"></script>


    <style>
        .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
            font-size: 13px;
            padding: 15px !important;
        }


        .uk-table thead th {
            color: #1976d2 !important;
        }

        .tablesorter-altair .tablesorter-headerAsc .tablesorter-header-inner::after {
            color: #1976d2 !important;
        }

        .tablesorter-altair .tablesorter-header-inner::after {
            color: #1976d2 !important;
        }

        #preloader {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #fefefe;
            z-index: 99;
            height: 100%;
        }

        #status {
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
        jQuery(window).load(function () {
            // will first fade out the loading animation
            jQuery("#status").fadeOut();
            // will fade out the whole DIV that covers the website.
            jQuery("#preloader").delay(1000).fadeOut("slow");
        })
    </script>
</head>
<body class=" sidebar_main_open sidebar_main_swipe">
<?php include('header.php'); ?>
<?php include('header_top.php'); ?>

 <?php
 
 
  
 
 
							$where ='';
							
							if(!empty($_GET)){
								
								if($_GET['customed']!='' || $_GET['yearduration']!='' || $_GET['duration']!=''){
								$where .=' where ';
								
								if(!empty($_GET['customed'])){
									$where .= " customers.customer_id='".$_GET['customed']."' ";
								}
								
								if($_GET['customed']!='0' && $_GET['yearduration']!=''){
									$where .=' and ';
								}
								
								if($_GET['customed']!='0' && $_GET['yearduration']==''&& $_GET['duration']!=''){
								
								}
								else{
								
									if(!empty($_GET['yearduration'])){
										
										$where .= " YEAR(orders_products.orderdate) = '".$_GET['yearduration']."' and ";
										 
									}
									
										if(!empty($_GET['duration'])){
										if($_GET['duration']=='q1'){
											$where .= " ( MONTH(orders_products.orderdate) = 1 OR MONTH(orders_products.orderdate) = 2 
											OR MONTH(orders_products.orderdate) = 3 ) ";
										}
										
										if($_GET['duration']=='q2'){
											$where .= " ( MONTH(orders_products.orderdate) = 4 OR MONTH(orders_products.orderdate) = 5 
											OR MONTH(orders_products.orderdate) = 6 ) ";
										}
										
										if($_GET['duration']=='q3'){
											$where .= " ( MONTH(orders_products.orderdate) = 7 OR  MONTH(orders_products.orderdate) = 8 
											OR MONTH(orders_products.orderdate) = 9 ) ";
										}
										
										if($_GET['duration']=='q4'){
											$where .= " ( MONTH(orders_products.orderdate) = 10 OR  MONTH(orders_products.orderdate) = 11 
											OR MONTH(orders_products.orderdate) = 12 ) ";
										}
										
										
									}
								}
								
								
								
								
								}
								
							}
							
                            $_product_curency = $_product_quantitydata = $_product_namedata = $pric_name_whole_data = $pric_name = array();
                            $productname = array();
                         $q = "SELECT
    orders.*,
    orders.id AS orderId,
    Principal.*,
    Principal.short_name AS principal_short_name,
    customers.*,
    customers.short_name AS customer_short_name,
    principal_contacts.*,
    GROUP_CONCAT(
        orders_products.id,
        '--info--',
        orders_products.order_id,
        '--info--',
        orders_products.product_id,
        '--info--',
        orders_products.p_name,
        '--info--',
        orders_products.p_quntity,
        '--info--',
        orders_products.p_price,
        '--info--',
        orders_products.p_subtotal,
        '--info--',
        orders_products.p_commision,
        '--info--',
        orders_products.po,
        '--info--',
        orders_products.currency,
        '--info--',
        orders_products.orderdate,
        '--info--',
        orders_products.created_date SEPARATOR ';--order--;'
    ) AS orders_products
FROM
    orders
LEFT JOIN Principal ON Principal.Principal_id = orders.pid
LEFT JOIN customers ON customers.customer_id = orders.cid
LEFT JOIN principal_contacts ON principal_contacts.id = orders.p_c_id AND principal_contacts.pid = orders.pid
LEFT JOIN orders_products ON orders_products.order_id = orders.id " .$where. "
GROUP BY
    orders.id
ORDER BY
    orders.id ASC ";
                            $orders = $this->db->query($q)->result_array();

                            ?>
<div id="page_content" style="margin-left:0px;">
    <div id="page_content_inner">
		<h4 class="heading_a uk-margin-bottom" style="margin-bottom: 30px;">Order Reports 
			<!--<button class="md-btn" data-uk-modal="{target:'#modal_header_footer'}">Open</button>-->
			<form >
			<select name="duration" id="duration" class="form-control" style="width:25%;float:left;    margin: 5px;">
											<option value="">--Select Quarter--</option>
											<option <?php if(!empty($_GET['duration'])){ if($_GET['duration']=='q1'){echo 'selected'; } }?> value="q1">Q1</option>
											<option <?php if(!empty($_GET['duration'])){ if($_GET['duration']=='q2'){echo 'selected'; } }?> value="q2">Q2</option>
											<option <?php if(!empty($_GET['duration'])){ if($_GET['duration']=='q3'){echo 'selected'; } }?> value="q3">Q3</option>
											<option <?php if(!empty($_GET['duration'])){ if($_GET['duration']=='q4'){echo 'selected'; } }?> value="q4">Q4</option>
										</select>
										<select name="yearduration" id="yearduration" class="form-control" style="width:25%;float:left;    margin: 5px;">
											<option value="">--Select Year--</option>
											
											<?php 
											for($c=2019; $c<=date('Y'); $c++){
												?>
												<option <?php if(!empty($_GET['yearduration'])){ if($_GET['yearduration']==$c){echo 'selected'; } }?> value="<?=$c?>"><?=$c?></option>
												<?php
											}
											?>
										</select>
										<select name="customed" id="customed" class="form-control" style="width:25%;float:left;    margin: 5px;">
											<?php $person = $this->db->query("select * from customers")->result_array(); ?>
											<option value="0">All Companies</option>
											<?php foreach($person as $per){?>
											<option value="<?php echo $per['customer_id'];?>" <?php if(!empty($_GET['customed'])){ if($_GET['customed']==$per['customer_id']){echo 'selected'; } }?>><?php echo $per['customer_person'];?></option>
											<?php } ?>
										</select>
			<button type="submit" class="md-btn" style="margin-top:3px;">Submit</button>
			<a href="reportnew" class="md-btn" style="margin-top:3px;background:#b6b7b9;">Reset</a>
			
			</form>
			

</h4>
		
       <div class="uk-modal" id="modal_header_footer">
                                <div class="uk-modal-dialog">
									<button type="button" class="uk-modal-close uk-close"></button>
                                    <div class="uk-modal-header">
                                        <select name="duration" id="duration" class="form-control" style="width:40%;float:left;    margin: 5px;">
											<option value="q1">Q1</option>
											<option value="q2">Q2</option>
											<option value="q3">Q3</option>
											<option value="q4">Q4</option>
										</select>
										<select name="yearduration" id="yearduration" class="form-control" style="width:40%;float:left;    margin: 5px;">
											<?php 
											for($c=2019; $c<=date('Y'); $c++){
												echo '<option sdd="d" value="'.$c.'">s'.$c.'</option>';
											}
											?>
											
										</select>
										<select name="customed" id="customed" class="form-control" style="width:40%;float:left;    margin: 5px;">
											<?php $person = $this->db->query("select * from customers")->result_array(); ?>
											<option value="0">All Companies</option>
											<?php foreach($person as $per){?>
											<option value="<?php echo $per['customer_id'];?>"><?php echo $per['customer_person'];?></option>
											<?php } ?>
										</select>
										<b id="getresults" class="md-btn" onclick='getfilterdata()' style="margin: 1px;">result</b>
                                    </div>
	
									
									
									<div class="customerdatares"></div>
									
									
									<button style="display:none" id="exlbtn" onclick="exportTableToExcel('order1')" class="md-btn">Export Excel File</button>
                                  
                                </div>
		    
                            </div>
                         


		
        <div class="md-card uk-margin-medium-bottom">
            <div class="uk-width-large-1-1">


                <main>
                    <section class="mb-5">


                        <!--Card-->
                        <div class="card card-cascade narrower">


                            <!--Card header-->
                            <div class="view view-cascade py-3 gradient-card-header info-color-dark mx-4 d-flex justify-content-between align-items-center">


                                <a href="" class="white-text mx-3"> View Report </a>

                                <div>

                                    
								<button class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light"
                                            href="#" data-uk-tooltip="{pos:'bottom'}" title="XLS"
                                            onclick="$('#order').tableExport({type:'excel',escape:'false'});">
                                        <i class="fa fa-download mt-0"></i>
                                    </button>
                                </div>

                            </div>
                            <!--/Card header-->

                           
                            <div class="card-body card-body-cascade">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-sm" id="order" style="border: 2px solid whitesmoke !important;">
                                        <thead>
                                        <tr>
                                            <th><strong>S. No.</strong></th>
                                            <th><strong>Order No.</strong></th>
											<th><strong>Year</strong></th>
                                            <th><strong>Qtr</strong></th>
                                            <th><strong>Principal Name</strong></th>
                                            <th><strong>PO Number</strong></th>
                                            <th><strong>Customer Name</strong></th>
                                            <th><strong>P Name</strong></th>
                                            <th><strong>P Qty</strong></th>
                                            <th><strong>Subtotal</strong></th>
                                            <th><strong>Currency</strong></th>
                                            <th><strong>Commission</strong></th>
                                            <!--<th><strong>Total USD</strong></th>
                                            <th><strong>Total EUR</strong></th>-->

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if (!empty($orders)) {
                                            $i = 1;
											$totalPrice = array();
                                            foreach ($orders as $single_order) {
                                                $oid = $single_order['id'];
                                                $pid = $single_order['pid'];
                                                $cid = $single_order['cid'];
                                                $p_c_id = $single_order['p_c_id'];
                                                $orderdate = $single_order['orderdate'];
                                                $pricipaldata = $this->db->query("select * from Principal where Principal_id='$pid'")->row_array();
                                                $customersdata = $this->db->query("select * from customers where customer_id ='$cid'")->row_array();
                                                $principal_contactsdata = $this->db->query("select * from principal_contacts where id ='$p_c_id'")->row_array();
                                                $orderProducts = $this->db->query("select * from orders_products where order_id ='$oid'")->result_array();
//$orderAdjustedAmount = $this->db->query("select * from orders where order_id ='$oid'")->result_array();
												//echo '<pre>';
												//acceptmoney
												//print_r($orderAdjustedAmount);
												//exit;

                                                $pric_name[$pid] = $single_order['Principal_person'];

                                                $orderProducts = explode(';--order--;', $single_order['orders_products']);
                                                if (!empty($orderProducts)) {
												
                                                    foreach ($orderProducts as $sp) {
                                                        $sp = explode('--info--', $sp);
                                                      // echo '<pre>'; print_r($sp);
													  if(array_key_exists(4,$sp)){
														$currency = $sp[9];
                                                        $p_name = $sp[3];
                                                        $p_quntity = $sp[4];
                                                        $p_commision = $sp[7];
                                                        $p_po = $sp[8];
														
														
                                                        $p_subtotal = $sp[6];
														 $totalPrice[] =  $sp[6];
													  }
                                                        $pric_name_whole_data[$pid][$currency][] = $p_subtotal;
						
														if(!empty($sp['product_id'])){
                                                        $_product_namedata[$sp['product_id']][] = $p_subtotal;
														$_product_quantitydata[$sp['product_id']][] = $p_quntity;
                                                        $productname[$sp['product_id']] = $p_name;
                                                        $_product_curency[$sp['product_id']] = $currency;
														}
                                                        
														 
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $i++; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $single_order['order_no'] . " / " . $orderdate; ?>
                                                            </td>
															 <td>
                                                                <?php $parts = explode('-', $orderdate); echo $parts[0];?>
                                                            </td>
                                                            <td>
                                                                <?php
																if(!empty($orderdate)){
                                                                $month = explode('-', $orderdate)[1];
                                                                switch ($month) {
                                                                    case '01':
                                                                        echo "Q1";
                                                                        break;
                                                                    case '02':
                                                                        echo "Q1";
                                                                        break;
                                                                    case '03':
                                                                        echo "Q1";
                                                                        break;
                                                                    case '04':
                                                                        echo "Q2";
                                                                        break;
                                                                    case '05':
                                                                        echo "Q2";
                                                                        break;
                                                                    case '06':
                                                                        echo "Q2";
                                                                        break;
                                                                    case '07':
                                                                        echo "Q3";
                                                                        break;
                                                                    case '08':
                                                                        echo "Q3";
                                                                        break;
                                                                    case '09':
                                                                        echo "Q3";
                                                                        break;
                                                                    case '10':
                                                                        echo "Q4";
                                                                        break;
                                                                    case '11':
                                                                        echo "Q4";
                                                                        break;
                                                                    case '12':
                                                                        echo "Q4";
                                                                        break;
                                                                }
																}
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $single_order['Principal_person']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $p_po; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $single_order['customer_person']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $p_name; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $p_quntity; ?>
                                                            </td>
                                                            <td>
                                                                <?php if(!empty($single_order['acceptmoney'])){ echo $single_order['acceptmoney']; }else{echo $p_subtotal;}
															if(!empty($single_order['acceptmoney'])){ $p_subtotal =  $single_order['acceptmoney']; }	?>
                                                            </td>

                                                            <td style="text-transform: uppercase;">
                                                                <?php echo $currency; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $comii = ((float)$p_commision * (float)$p_subtotal) / 100; ?>
                                                            </td>
                                                            <!---<td>
																<?php 
                                                                 echo $single_order['totalusd'];?> 
                                                            </td>
                                                            <td>
                                                                <?php echo $single_order['totaleur']; ?>
                                                            </td>--->
                                                        </tr>
                                                        <?php
                                                    }
												
                                                }
                                            }
                                        }
											
										if(!empty($totalPrice)){
										print'<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td  align="right"><b>Total Price :</b></td><td>';
										print_r(array_sum($totalPrice));
										print'</td><td></td><td></td></tr>';
										}
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
								<?php // echo '<pre>'; print_r($totalPrice);?>
                                <!--Bottom Table UI-->
                                <div class="d-flex justify-content-between" style="float:right;">

                                    <!--Name-->
                                    <div class="select-wrapper mdb-select colorful-select dropdown-primary mt-2 hidden-md-down"
                                         style="display:none;"><span class="caret">▼</span><input type="text"
                                                                                                  class="select-dropdown"
                                                                                                  readonly="true"
                                                                                                  data-activates="select-options-da569603-de11-4dd2-9709-70349bed66c1"
                                                                                                  value="">
                                        <ul id="select-options-da569603-de11-4dd2-9709-70349bed66c1"
                                            class="dropdown-content select-dropdown w-100"
                                            style="width: 181px; position: absolute; top: -159px; left: 0px; opacity: 1; display: none;">
                                            <li class="disabled "><span class="filtrable">  Rows number</span></li>
                                            <li class="active"><span class="filtrable">  10 rows</span></li>
                                            <li class=" "><span class="filtrable">  25 rows</span></li>
                                            <li class=" "><span class="filtrable">  50 rows</span></li>
                                            <li class=" "><span class="filtrable">  100 rows</span></li>
                                        </ul>
                                        <select class="mdb-select colorful-select dropdown-primary mt-2 hidden-md-down initialized">
                                            <option value="" disabled="">Rows number</option>
                                            <option value="1" selected="">10 rows</option>
                                            <option value="2">25 rows</option>
                                            <option value="3">50 rows</option>
                                            <option value="4">100 rows</option>
                                        </select></div>

                                    

                                </div>
                                <!--Bottom Table UI-->

                            </div>
                            <!--/.Card content-->

                        </div>
                        <!--/.Card-->

                    </section>

                </main>


                <!-- common functions -->
                <script src="<?php echo base_url() ?>assets/js/common.min.js"></script>
                <!-- uikit functions -->
                <script src="<?php echo base_url() ?>assets/js/uikit_custom.min.js"></script>
                <!-- altair common functions/helpers -->
                <script src="<?php echo base_url() ?>assets/js/altair_admin_common.min.js"></script>

                <!-- page specific plugins -->
                <!-- datatables -->
                <script src="<?php echo base_url() ?>assets/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
                <!-- datatables colVis-->
                <script src="<?php echo base_url() ?>assets/bower_components/datatables-colvis/js/dataTables.colVis.js"></script>
                <!-- datatables tableTools-->
                <script src="<?php echo base_url() ?>assets/bower_components/datatables-tabletools/js/dataTables.tableTools.js"></script>
                <!-- datatables custom integration -->
                <script src="<?php echo base_url() ?>assets/js/custom/datatables_uikit.min.js"></script>
                <!-- kendo UI -->
                <script src="<?php echo base_url() ?>assets/js/kendoui_custom.min.js"></script>

                <!--  kendoui functions -->
                <script src="<?php echo base_url() ?>assets/js/pages/kendoui.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/tableExport.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery.base64.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/html2canvas.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/jspdf/libs/sprintf.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/jspdf/jspdf.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/jspdf/libs/base64.js"></script>
                <script type="text/javascript"
                        src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

                <script>
                    $(function () {
                        // enable hires images
                        altair_helpers.retina_images();
                        // fastClick (touch devices)
                        if (Modernizr.touch) {
                            FastClick.attach(document.body);
                        }
                    });
                </script>
				
				<script>
				 function getfilterdata() {
        var duration = $('#duration').val();
		var yearduration = $('#yearduration').val();
        var customed = $('#customed').val();


        jQuery.ajax({
            type: "POST",
            url: 'http://risusventures.com/usermanagement2/latestwork/kunal/seller/reportsfilter',
            data: {'duration': duration,'yearduration': yearduration,'cid':customed},
            // dataType: "json",
            success: function (data) {
				//jQuery(".customercontactdiv").removeClass('hide');
                jQuery(".customerdatares").html(data);
				$("#exlbtn").css("display", "block");
            }
        });
}
					

function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
</script>
</body>
</html>