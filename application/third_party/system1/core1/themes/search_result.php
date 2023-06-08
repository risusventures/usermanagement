<?php $pages='manage_products';?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/favicon-32x32.png" sizes="32x32">
    <title>Seller Panel</title>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/uikit/css/uikit.almost-flat.min.css" media="all">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/icons/flags/flags.min.css" media="all">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/main.min.css" media="all">
	<?php include('analytics.php');?> 
</head>
<body class=" sidebar_main_open sidebar_main_swipe" style="background-color:white;">
    <?php include('header.php');?>
    <?php include('header_top.php');?>
    <div id="page_content" style="margin-left:0px;">
        <div id="page_content_inner">
            <h3 class="heading_a uk-margin-bottom">Manage products</h3>
            <ul id="products_sort" class="uk-subnav uk-subnav-pill">
                <li data-uk-sort="product-name:asc"><a href="#">Ascending</a></li>
                <li data-uk-sort="product-name:desc"><a href="#">Descending</a></li>
            </ul>
           <?php $message=$_GET['message'];
           if($message){ echo '<div class="uk-alert uk-alert-info" data-uk-alert="">
                                <a href="#" class="uk-alert-close uk-close"></a>
                             Update Product Successfully....
                            </div>';}?>
              <?php $message=$_GET['delete'];
           if($message){ echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
                                <a href="#" class="uk-alert-close uk-close"></a>
                             Your  Product Deleted Successfully....
                            </div>';}?>                
            <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-6 hierarchical_show" data-uk-grid="{gutter: 20, controls: '#products_sort'}">
          <?php foreach($records as $row){?>
                <div data-product-name="A est similique.">
                    <div class="md-card md-card-hover-img">
                        <div class="md-card-head uk-text-center uk-position-relative">
                            <img class="md-card-head-img" src="<?php echo base_url();?>upload/<?php echo $records[0]['image'];?>"  style="padding:10px;"alt=""/>
                        </div>
                        <div class="md-card-content">
                            <h4 class="heading_c uk-margin-bottom">
                         <a style="text-transform:capitalize">  <?php echo  $records[0]['product_name'];?></a>
                                <span class="   sub-heading" style=""><strong>Rs.</strong><span><?php echo $records[0]['price'];?></span><strong>/</strong><?php echo $records[0]['per'];?></span>
                            </h4>
                            <p></p>
                           <a href="<?php echo site_url()?>seller/view_product/<?php echo  $records[0]['id'];?>"> <button class="md-btn" data-uk-modal="{target:'#modal_large'}">Read More</button></a> <div class="md-card-head-menu" data-uk-dropdown="{pos:'bottom-right'}" aria-haspopup="true" aria-expanded="false">
                                <i class="md-icon material-icons">?</i>
                                <div class="uk-dropdown uk-dropdown-small uk-dropdown-bottom" style="min-width: 160px; top: 32px; left: -128px;">
                                    <ul class="uk-nav">
                                        <li><a href="<?php echo base_url()?>seller/edit_product_id/<?php echo  $records[0]['id'];?>">Edit</a></li>
                                        <li><a href="<?php echo base_url()?>seller/delete_product_id/<?php echo  $records[0]['id'];?>" onClick="return ConfirmDialog()">Remove</a></li>

                                    </ul>
                                </div>
                            </div>
                  
                        </div>
                    </div>
                </div>                  
<?php }
?>
  
            </div>
        </div>
    </div>

    <!-- google web fonts -->
   

    <!-- common functions -->
    <script src="<?php echo base_url()?>assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="<?php echo base_url()?>assets/js/uikit_custom.min.js"></script>
    <!-- altair common functions/helpers -->
    <script src="<?php echo base_url()?>assets/js/altair_admin_common.min.js"></script>


    <script type="text/javascript">
function ConfirmDialog() {
  var x=confirm("Are you sure to delete record?")
  if (x) {
    return true;
  } else {
    return false;
  }
}
</script>



</body>
</html>