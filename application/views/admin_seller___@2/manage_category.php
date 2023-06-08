<?php $pages='manage_category';?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no"/>
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/finacbook_icon.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/finacbook_icon.png" sizes="32x32">
    <title>FinacBooks</title>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/uikit/css/uikit.almost-flat.min.css" media="all">
    <!-- flag icons -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/icons/flags/flags.min.css" media="all">
    <!-- altair admin -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/main.min.css" media="all">
    <script src="<?php echo base_url()?>assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="<?php echo base_url()?>assets/js/uikit_custom.min.js"></script>
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
	<?php include('analytics.php');?> 
</head>
<body class=" sidebar_main_open sidebar_main_swipe">
<?php include('header.php');?>
<?php include('header_top.php');?>
<div id="page_content" style="margin-left:0px;">
<div id="page_content_inner">
<h4 class="heading_a uk-margin-bottom">Product Categories</h4>
<div class="md-card uk-margin-medium-bottom">
<div class="md-card-content">
<?php $message=$_GET['message'];
if($message){ echo '<div class="uk-alert uk-alert-info" data-uk-alert=""><a href="#" class="uk-alert-close uk-close"></a>
Your   Category  Update Successfully....</div>';}?>   
   <?php $message=$_GET['delete'];
           if($message){ echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
                                <a href="#" class="uk-alert-close uk-close"></a>
                             Your  Category Deleted Successfully....
                            </div>';}?>  
<form id="form1" runat="server"> 
<div id="printablediv" style="width: 100%;height:auto;">  
<table id="dt_tableTools" id="printablediv"  class="uk-table" cellspacing="0" width="100%">
<thead>
    <tr><th>Category Name</th>
        <th>Total Product</th>
          <th>Images</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
</thead>
    <tbody>
<?php foreach ($records as $row ) {  $ci_id=$row->ci_id;?>   
<tr>  
    <td><a href="<?php echo base_url()?>productsCategory/<?php echo $row->ci_id;?>" style="font-size:15px;text-transform: capitalize;"><?php echo $row->product_category;?></a></td>
    <td><span class="uk-badge uk-badge-muted" style="background:none;color:black;font-size:15px;">
                    <?php   
                    $subquery=$this->db->query("select  *  from add_products where product_group='$ci_id' "); 
                    $total=$subquery->num_rows();					
                    echo $total; ?>
                    </span></td>   
                        <td><img src="<?php echo base_url();?>upload/<?php if($row->category_image){ echo $row->category_image;}else{ echo 'cat.jpg';}?>" style="height:70px;width:70px;"></td>
                            <td><span class="switchery switchery-default" style="border-color: rgba(0, 150, 136, 0.498039); box-shadow: rgba(0, 150, 136, 0.498039) 0px 0px 0px 7px inset; transition: border 0.4s, box-shadow 0.4s, background-color 1.2s; background-color: rgba(0, 150, 136, 0.498039);"><small style="left: 18px; transition: background-color 0.4s, left 0.2s; background-color: rgb(0, 150, 136);"></small></span></td>
                            <td><a href="<?php echo base_url()?>productsCategory/<?php echo $row->ci_id;?>" data-uk-tooltip="{pos:'bottom'}" title="View All Products"><i class="material-icons md-24">&#xE8F4;</i></a>
                            <a href="<?php echo base_url()?>editCategory/<?php echo $row->ci_id;?>" data-uk-tooltip="{pos:'bottom'}" title="Edit Category"><i class="material-icons">create</i></a>
                            <a href="<?php echo base_url()?>seller/delete_category_id/<?php echo $row->ci_id;?>" onclick="return ConfirmDialog()" data-uk-tooltip="{pos:'bottom'}" title="delete"><i class="material-icons md-24">&#xE872;</i></a>
                           <a href="<?php echo base_url()?>addproductsCategory/<?php echo $row->ci_id;?>" data-uk-tooltip="{pos:'bottom'}" title="Add Product"><i class="material-icons md-24" >note_add</i></a>
                            </td> 
                          </tr>
                          <?php }?>
                        </tbody>   
                    </table>
                    <div>
                </div>
            </div>
      <center>
      </center>
     </form>
        </div>
    </div>
       <div id="preloader">
 <div id="status"></div>
</div>


    <!-- common functions -->
    <!-- altair common functions/helpers -->
    <script src="<?php echo base_url()?>assets/js/altair_admin_common.min.js"></script>

    <!-- page specific plugins -->
    <!-- datatables -->
    <script src="<?php echo base_url()?>assets/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <!-- datatables colVis-->
    <script src="<?php echo base_url()?>assets/bower_components/datatables-colvis/js/dataTables.colVis.js"></script>
    <!-- datatables tableTools-->
    <script src="<?php echo base_url()?>assets/bower_components/datatables-tabletools/js/dataTables.tableTools.js"></script>
    <!-- datatables custom integration -->
    <script src="<?php echo base_url()?>assets/js/custom/datatables_uikit.min.js"></script>

    <!--  datatables functions -->
    <script src="<?php echo base_url()?>assets/js/pages/plugins_datatables.min.js"></script>


<script type="text/javascript">

function ConfirmDialog()
{

var x=confirm('Do You Want Delete Record..');
if(x)

{
    return true;
}
else
{

return false;
}
}
</script>

</body>


</html>