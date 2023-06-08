<?php  error_reporting(0);
defined('BASEPATH') OR exit('No direct Script Access Allowed..');

class Ajax extends CI_Controller{
            public function __construct() {
            parent::__construct();
            $this->load->model(array('product_model','profile_model','search_model'));
            $this->load->library(array('form_validation','session','upload','email'));
            $this->load->helper(array('url','html','form'));
            $this->load->library('calendar');
        }
       
        public function customer_messageid(){
            echo '<pre>'; print_r($_REQUEST); echo '</pre>'; 
        }
        public function getorderdetails(){
             $id= $_REQUEST['pid'];
             $html=$this->product_model->getorderhtml($id,1);
             echo $html; die;
        }
        public function deleteimage(){
             $id= $_REQUEST['id'];
             $this->db->query("delete from orders_images where id='$id'");
             echo 1; die;
        }
        public function customercontact(){
            
           
            
           
            $pid= $_REQUEST['pid'];
            $cid= $_REQUEST['cid'];
            $ee = "select * from customers_contacts where cid='$cid'";
            $customers_contacts=$this->db->query($ee)->result_array();
            $pro_assidnedhtml= "";
            $pro_assidnedhtml.=" <h4>Customer Contact</h4> ";
            if(!empty($customers_contacts)){
                foreach($customers_contacts as $name){
                    
                $pro_assidnedhtml.="<div class='checkbox'><label><input type='checkbox'  name='customers_contacts[]' class='customers_contacts customers_contacts{$name['id']}' value='{$name['id']}'>{$name['name']} ( {$name['email']} ) </label></div>";
                    
                }
            }
             echo $pro_assidnedhtml; die();       
        }

        public function getproducts(){
           
           $pid= $_REQUEST['pid'];
           $cid= $_REQUEST['cid'];
           $ee = "select * from customers_principal_assigned where pid='$pid' and cid='$cid'";
           $customer_product=$this->db->query($ee)->result_array();
       //  echo '<pre>'; print_r($customer_product); echo '</pre>';
            $pro_assidnedhtml= "";
         
          
               
                    
                    
                    $pro_assidnedhtml.=" <h4>Products</h4> 
                 <table class='order-list table table-bordered table-hover veg_item'>
                    <thead>
                        <tr>
                            <th width='5%'></th>
                            <th width='20%'>Product Name</th>
                            <th width='25%'>PO Number</th>
                            <th width='10%'>Price</th>
                            <th width='5%'>Currency</th>
                            <th width='15%'>Quantity</th>
                            <th width='22%'>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>";
                     if(!empty($customer_product)) {  foreach( $customer_product as $productdata) {
                         $productid=$productdata['product_id'];
                          $pname = "SELECT * FROM `principal_products` WHERE `id`= '$productid' ";
                         $product_name =$this->db->query($pname)->row_array();
                        $pro_assidnedhtml.="<tr>
                        <td style=' text-align:center;vertical-align: middle;'>
                            <input type='checkbox' id='checkeddd{$product_name['id']}' onclick='generatetotal()' class='checkboxes' name='selectedproducts[{$product_name['id']}]' value='{$product_name['id']}'>
                                 
                        </td>
                            <td>
                              <input type='hidden' name='commission[{$product_name['id']}]' id='' class='form-control changesNo'  style='width: 100%;' value='{$productdata['commission']}' readonly>
                                <input type='text' name='name[{$product_name['id']}]' id='' class='form-control changesNo'  style='width: 100%;' value='$product_name[product_name]' readonly>
                                 
                            </td>
                            <td>
                            <input type='text' name='po[{$product_name['id']}]' id='po{$product_name['id']}' class='form-control po'  style='width: 100%;' value=''>
                            </td>
                            <td><input type='text' name='price[{$product_name['id']}]' id='price{$product_name['id']}' class='form-control changesNo'  style='width: 100%;' value='{$productdata['price']}'></td>
                                 <td><input type='text' name='currency[{$product_name['id']}]' id='currency$product_name[id]' class='form-control changesNo'  style='width: 100%;' value='{$productdata['currency']}' readonly></td>
                            
                           <td> <input type='number' min='0' name='cunt[{$product_name['id']}]' id='cunt$product_name[id]' class='form-control changesNo'  onkeyup='calc({$product_name['id']})' onchange='calc({$product_name['id']})' style='width: 100%;' value=''>
                         
                            </td>
                           <td> <input type='text'  name='subprice[{$product_name['id']}]' id='subprice$product_name[id]' class='form-control changesNo'  style='width: 100%;'  value=''>   </td>
                        </tr>";
                      }  }else{
                          $pro_assidnedhtml.="<tr><td colspan='6'>No product Found</td></tr>";
                      }
                    $pro_assidnedhtml.="</tbody>
       
        <tfoot>
        <tr>

        <td colspan='2' style=' text-align:  right;vertical-align: middle;'>
               Money accept from Customer
            </td>
            <td>
            <input type='text' name='acceptmoney'  id='acceptmoney' class='form-control'  style='width: 100%;'  value=''>
            </td>

            <td colspan='3' style=' text-align:  right;vertical-align: middle;'>
               Total 
            </td>
            <td>
            <input type='text' name='totalprice' readonly='readonly' id='totalprice' class='form-control changesNo'  style='width: 100%;'  value=''>
            </td>
        </tr>
    </tfoot>
    </table>
    "; 
                    
                
           
               
           
          echo $pro_assidnedhtml; die();       
         
           
        }
        
        public function getprincipalcontact(){
            $all_response=array();
            $all_response['status']="true";
            $all= $data=array();
            if(isset($_REQUEST['pid'])) {
                $gg=$_REQUEST['pid'];
                $all[]=$gg;
               
                //echo '<pre>';print_r($principal_short);echo '<pre>';
                foreach($all as $pid){
                $res=array();
                $ee="select * from principal_contacts where pid='$pid'";
                $principal_contacts=$this->db->query($ee)->result_array();
                
                
                $principal_contactshtml="";
                if(!empty($principal_contacts)) {
                    $principal_contactshtml.="<h4>Principal Contacts</h4><select class='form-control' id='principal_contacts' name='principal_contacts' required>";
                    foreach($principal_contacts as $contacts){
                        $principal_contactshtml.="<option value='{$contacts['id']}'>{$contacts['name']}</option>";
//                        $principal_contactshtml.="<div class='checkbox'><label><input type='hidden' class='principal_contacts_email principal_contacts_email{$contacts['id']} ' /><input type='checkbox' name='principal_contacts[]' class='principal_contacts principal_contacts{$contacts['id']}' value='{$contacts['id']}'>{$contacts['name']} </label></div>";
                        
                    }
                    $principal_contactshtml.="</select>";
                }
             
                $res['principal_contactshtml']=$principal_contactshtml;
                
                $customers_principal_assigned_html="";
                
                $ee="select * from customers_principal_assigned where pid='$pid' group by cid";
                $customers_principal_assigned=$this->db->query($ee)->result_array();
                if(!empty($customers_principal_assigned)){
                    $customers_principal_assigned_html.=" <h4>Assign Customers</h4>  <select class='form-control' onchange='showproducts()' id='customers_principal_assigned' name='customers_principal_assigned' required>";
                    $customers_principal_assigned_html.="<option value=''>Please select Customer</option>";
                    foreach($customers_principal_assigned as $c_p_a){
                        $c="select * from customers where customer_id='{$c_p_a['cid']}'";
                        $customerdata=$this->db->query($c)->row_array();     
                         $customers_principal_assigned_html.="<option value='{$c_p_a['cid']}'>{$customerdata['customer_person']}</option>";
//                        $customers_principal_assigned_html.="<div class='checkbox'><label><input type='checkbox' onclick='get_products({$customerdata['customer_person']})' name='principal_contacts' class='customers_principal_assigned customers_principal_assigned{$c_p_a['cid']}' value='{$c_p_a['id']}'>{$customerdata['customer_person']} </label></div>";
                        
                    }
                     $customers_principal_assigned_html.="</select>";
                     
                }
                $eee="select * from Principal where Principal_id='$pid'";
                $principal_short=$this->db->query($eee)->row_array();
                $customers_principal_sname_html.="<p>Principal MSG ID : {$principal_short['short_name']}</p>";
                $res['customers_principal_assigned_html']=$customers_principal_assigned_html;
                $res['pid']=$pid;
                $res['customers_principal_sname_html']=$customers_principal_sname_html;
                $data[]=$res;                
                }
                
            }
            $all_response['data']=$data;
            echo json_encode($all_response); die;
            
        }
  
}
  ?>