<?php  error_reporting(0);
defined('BASEPATH') OR exit('No direct Script Access Allowed..');

class Principal extends CI_Controller{
            public function __construct() {
            parent::__construct();
            $this->load->model(array('product_model','profile_model','search_model'));
            $this->load->library(array('form_validation','session','upload','email'));
            $this->load->helper(array('url','html','form'));
            $this->load->library('calendar');
  }
  

   public function del_products(){
       
      $id=$_REQUEST['id'];
      $this->db->query("delete from principal_products where id='$id'");
      echo 1; die;
  }
  public function del_contacts(){
      
      $id=$_REQUEST['id'];
      $this->db->query("delete from principal_contacts where id='$id'");
      echo 1; die;
  }

  public function order(){
  if($this->session->userdata('logged_in')){
  $session_data = $this->session->userdata('logged_in');
  $data['user_email'] = $session_data['user_email'];
  $data['user_id'] = $session_data['user_id'];
  $data['records4'] = $this->profile_model->company_profile($data['user_id']);
  $data['records'] =$this->product_model->order_model($data['user_id']);
  $data['company_detail'] = $this->product_model->company_profile_order($data['user_id']);
  $data['list_customer'] = $this->product_model->list_customer_model($data['user_id']);
  $data['list_item'] = $this->product_model->list_items($data['user_id']);
  $data['item_veg'] = $this->product_model->item_veg($data['user_id']);
   $data['item_non_veg'] = $this->product_model->item_non_veg($data['user_id']);
   $data['desert_items'] = $this->product_model->desert_item_list($data['user_id']);
     $data['drink_items'] = $this->product_model->drink_item_list($data['user_id']);
   
  $this->load->view('admin_seller/order', $data);
  }else{
  redirect('user_ctrl/login', 'refresh');
  }
}

  public function add_order(){
  if($this->session->userdata('logged_in')){
   $session_data = $this->session->userdata('logged_in');
   $data['user_email'] = $session_data['user_email'];
   $data['user_number'] = $session_data['user_number'];
   $data['user_id']= $session_data['user_id'];
   $party_date=$this->input->post('party_date');
    
   $query = $this->db->query("select * from invoice where status='Quotation' order by id desc");
   $get_invoice_id = $query->result_array();
   $get_id =  $get_invoice_id[0]['invoice_no'];
   // $num_of_ids =  substr($get_id,4,7)+1;
$num_of_ids =  $get_id+1;

    //Number of "ids" to generate.
    $i = 0; //Loop counter.
   $n = 0; //"id" number piece.
   $l = date('Y'); //"id" letter piece.

while ($i <= $num_of_ids) { 
    $id = sprintf("%03d", $n); //Create "id". Sprintf pads the number to make it 4 digits.
    $numbers[] = $id; //Print out the id.

    if ($n == 9999) { //Once the number reaches 9999, increase the letter by one and reset number to 0.
        $n = 0;
        $l++;
    }

    $i++; $n++; 
}

$newID = end($numbers);

extract($data);
$temp=count($this->input->post('itemName'));
$itemName =$this->input->post('itemName');
$invoice_date=implode(" , ", $this->input->post('invoice_date'));
$price =$this->input->post('price');
$quantity= $this->input->post('quantity');
$amount=$this->input->post('total');
$party_date=$this->input->post('party_date');
$note=$this->input->post('note');
$total_amount=$this->input->post('total_amount');
$veg1=implode(",", $this->input->post('veg'));
$tax =$this->input->post('tax');
$tax_ammount =$this->input->post('tax_amount');

/*if($veg1!=null){ $veg=implode(",", $this->input->post('veg'));}else{ $veg='0'; }
$non_veg1=implode(",", $this->input->post('non_veg'));
if($non_veg1!=null){ $non_veg=implode(",", $this->input->post('non_veg'));}else{ $non_veg='0'; }*/


$cold= $this->input->post('cold_total_item');
$coldproduct = $this->input->post('coldproduct1');
if($coldproduct!=null){
for($i=1; $i<=$cold;$i++){
    $data = array(
  'productName' => $this->input->post('coldproduct'.+$i),
   'invoice_no' =>$newID,
   'buyPrice'   =>$this->input->post('coldprice'.+$i),
   'quantity'   =>$this->input->post('coldqty'.+$i),
   'amount'     =>$this->input->post('coldlinetotal'.+$i),
   'seller_id'  =>$user_id,
   'filter'=>'3'
         );
   $this->db->insert('order_sheet',$data);
  }
}else{
for($i=1; $i<=$cold;$i++){
    $data = array(
  'productName' => $this->input->post('coldproduct'.+$i),
   'invoice_no' =>$newID,
   'buyPrice'   =>$this->input->post('coldprice'.+$i),
   'quantity'   =>$this->input->post('coldqty'.+$i),
   'amount'     =>$this->input->post('coldlinetotal'.+$i),
   'seller_id'  =>$user_id,
   'filter'=>'3'
         );
   $this->db->insert('order_sheet',$data);
  }

}
$desert= $this->input->post('desert_total_item');
$desertproduct= $this->input->post('desertproduct1');
if($desertproduct!=null){
for($i=1; $i<=$desert;$i++){
    $data = array(
  'productName' => $this->input->post('desertproduct'.+$i),
   'invoice_no' =>$newID,
   'buyPrice'   =>$this->input->post('desertprice'.+$i),
   'quantity'   =>$this->input->post('desertqty'.+$i),
   'amount'     =>$this->input->post('desertlinetotal'.+$i),
   'seller_id'  =>$user_id,
   'filter'=>'4'
         );
   $this->db->insert('order_sheet',$data);
  } }else
{
for($i=1; $i<=$desert;$i++){
    $data = array(
  'productName' => $this->input->post('desertproduct'.+$i),
   'invoice_no' =>$newID,
   'buyPrice'   =>$this->input->post('desertprice'.+$i),
   'quantity'   =>$this->input->post('desertqty'.+$i),
   'amount'     =>$this->input->post('desertlinetotal'.+$i),
   'seller_id'  =>$user_id,
   'filter'=>'4'
         );
   $this->db->insert('order_sheet',$data);
  }
}


$nonveg = $this->input->post('non_veg_total_item');
$nonvegproduct= $this->input->post('nonvegproduct1');
if($nonvegproduct!=null){
for($i=1; $i<=$nonveg;$i++){
    $data = array(
  'productName' => $this->input->post('nonvegproduct'.+$i),
   'invoice_no' =>$newID,
   'buyPrice'   =>$this->input->post('nonvegprice'.+$i),
   'quantity'   =>$this->input->post('nonvegqty'.+$i),
   'amount'     =>$this->input->post('nonveglinetotal'.+$i),
   'seller_id'  =>$user_id,
   'filter'=>'2'
         );
   $this->db->insert('order_sheet',$data);
  }
}else{
for($i=1; $i<=$nonveg;$i++){
    $data = array(
  'productName' => $this->input->post('nonvegproduct'.+$i),
   'invoice_no' =>$newID,
   'buyPrice'   =>$this->input->post('nonvegprice'.+$i),
   'quantity'   =>$this->input->post('nonvegqty'.+$i),
   'amount'     =>$this->input->post('nonveglinetotal'.+$i),
   'seller_id'  =>$user_id,
   'filter'=>'2'
         );
   $this->db->insert('order_sheet',$data);
  }
}

$veg = $this->input->post('veg_total_item');
$vegproduct= $this->input->post('vegproduct1');
if($vegproduct!=null){
for($i=1; $i<=$veg;$i++){
    $data = array(
  'productName' => $this->input->post('vegproduct'.+$i),
   'invoice_no' =>$newID,
   'buyPrice'   =>$this->input->post('vegprice'.+$i),
   'quantity'   =>$this->input->post('vegqty'.+$i),
   'amount'     =>$this->input->post('veglinetotal'.+$i),
   'seller_id'  =>$user_id,
   'filter'=>'1'
         );
   $this->db->insert('order_sheet',$data);
  }
  }else{
for($i=1; $i<=$veg;$i++){
    $data = array(
  'productName' => $this->input->post('vegproduct'.+$i),
   'invoice_no' =>$newID,
   'buyPrice'   =>$this->input->post('vegprice'.+$i),
   'quantity'   =>$this->input->post('vegqty'.+$i),
   'amount'     =>$this->input->post('veglinetotal'.+$i),
   'seller_id'  =>$user_id,
   'filter'=>'1'
         );
   $this->db->insert('order_sheet',$data);
  }

}
  
  
  $other = $this->input->post('other_total_item');
$otherproduct= $this->input->post('otherproduct1');
if($otherproduct!=null){
for($i=1; $i<=$other;$i++){
    $data = array(
  'productName' => $this->input->post('otherproduct'.+$i),
   'invoice_no' =>$newID,
   'buyPrice'   =>$this->input->post('otherprice'.+$i),
   'quantity'   =>$this->input->post('otherqty'.+$i),
   'amount'     =>$this->input->post('otherlinetotal'.+$i),
   'seller_id'  =>$user_id,
   'filter'=>'5'
         );
   $this->db->insert('order_sheet',$data);
  }
  }else {
for($i=1; $i<=$other;$i++){
    $data = array(
  'productName' => $this->input->post('otherproduct'.+$i),
   'invoice_no' =>$newID,
   'buyPrice'   =>$this->input->post('otherprice'.+$i),
   'quantity'   =>$this->input->post('otherqty'.+$i),
   'amount'     =>$this->input->post('otherlinetotal'.+$i),
   'seller_id'  =>$user_id,
   'filter'=>'5'
         );
   $this->db->insert('order_sheet',$data);
  }
}

for($i=0; $i<$temp;$i++){
   $data = array(
  'productName' => $itemName[$i],
   'invoice_no' =>$newID,
   'buyPrice'   =>$price[$i],
   'quantity'   =>$quantity[$i],
   'amount'     =>$amount[$i],
   'seller_id'  =>$user_id
         );
   $this->db->insert('order_sheet',$data);
  }
  

  
  
     $data2 = array(
        'seller_id'  =>$user_id,
        'invoice_no' =>$newID,
        'customer_id'    =>$this->input->post('seller_company_name'),
        'invoice_date'    =>$invoice_date,
        'status'         =>pending,
        'tax' =>$tax,
        'tax_amount'=>$tax_ammount,
        'Total_Amount'    =>$total_amount,
        'add_date'       =>date("d.m.y"),
        'note'=>$note,
        'event_venue'             =>$this->input->post('event_venue'),
        'event_time'             =>$this->input->post('event_time'),
        'num_guest'             =>$this->input->post('num_guest'),
        'party_date'=>$party_date
      );

    if($this->product_model->add_order_model($data2) == TRUE){
      $data['user_email']= $session_data['user_email'];
      $data['user_id'] = $session_data['user_id'];
      $data['records4'] = $this->profile_model->company_profile($data['user_id']);
      $this->load->view('admin_seller/order',$data);
      //redirect('manageOrder?ab=1');
$url = 'manageOrder?ab=1';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
       }
          }else{
  redirect('user_ctrl/login', 'refresh');
  }
}


public function edit_order($id){
   if($this->session->userdata('logged_in')){
   $session_data = $this->session->userdata('logged_in');
   $data1['user_email'] = $session_data['user_email'];
   $data1['user_number'] = $session_data['user_number'];
   $data1['user_id']= $session_data['user_id'];
   $data1['records4'] = $this->profile_model->company_profile($data1['user_id']);
   $data1['company_detail'] = $this->product_model->company_profile_order($data1['user_id']);
   $data1['order_sheet'] = $this->product_model->view_invoice_model($id);
   $data1['invoice_paid_amount'] =$this->product_model->invoice_paid_model($id);
   $data1['records'] =$this->product_model->order_model($data1['user_id']);
   $data1['list_item'] = $this->product_model->list_items($data['user_id']);
   $data1['item_veg'] = $this->product_model->item_veg($data['user_id']);
   $data1['item_non_veg'] = $this->product_model->item_non_veg($data['user_id']);
   $data1['invoice_veg'] = $this->product_model->invoice_veg($id);
    $data1['desert_items'] = $this->product_model->desert_item_list($data['user_id']);
    $data1['drink_items'] = $this->product_model->drink_item_list($data['user_id']);
   $this->load->view('admin_seller/edit_order',$data1);
}else{
  redirect('user_ctrl/login', 'refresh');
  }
}


public function update_order(){
  if($this->session->userdata('logged_in')){
   $session_data = $this->session->userdata('logged_in');
   $data['user_email'] = $session_data['user_email'];
   $data['user_number'] = $session_data['user_number'];
   $data['user_id']= $session_data['user_id'];


extract($data);
$temp=count($this->input->post('itemName'));

$id=$this->input->post('update_id');
//$var = (array)$update_id;
$itemName =$this->input->post('itemName');
$invoice_date=implode(" , ", $this->input->post('invoice_date'));
$party_date=$this->input->post('party_date');
$price =$this->input->post('price');
$quantity= $this->input->post('quantity');
$amount=$this->input->post('total');
$total_amount=$this->input->post('total_amount');
$veg1=implode(",", $this->input->post('veg'));
$note=$this->input->post('note');
$tax =$this->input->post('tax');
$tax_ammount =$this->input->post('tax_amount');
if($temp!='0'){
for($i=0; $i<$temp;$i++){
   
  $data = array(
  'seller_id' =>$user_id,
  'invoice_no' =>$id,
  'productName' => $itemName[$i],
   'buyPrice'   =>$price[$i],
   'quantity'   =>$quantity[$i],
   'amount'     =>$amount[$i]
     );
   $items[] = $data;
    $this->product_model->update_order_model($id,$items);
  }
  }
else
{
$this->db->delete('order_sheet', array('invoice_no' => $id,'filter' =>'0'));
}
  $cold= $_POST['cold_total_item'][0];
  $cold_pro = $this->input->post('coldproduct1');

  for($i=1; $i<=$cold;$i++){
    $data = array(
  'productName' => $this->input->post('coldproduct'.+$i),
   'invoice_no' =>$id,
   'buyPrice'   =>$this->input->post('coldprice'.+$i),
   'quantity'   =>$this->input->post('coldqty'.+$i),
   'amount'     =>$this->input->post('coldlinetotal'.+$i),
   'seller_id'  =>$user_id,
   'filter'=>'3'
         );
    $cold_items[] = $data;
    $this->product_model->update_order_model_cold($id,$cold_items);
  }


$desert=$_POST['desert_total_item'][0];
$desert_pro = $this->input->post('desertproduct1');

for($i=1; $i<=$desert;$i++){
    $data = array(
  'productName' => $this->input->post('desertproduct'.+$i),
   'invoice_no' =>$id,
   'buyPrice'   =>$this->input->post('desertprice'.+$i),
   'quantity'   =>$this->input->post('desertqty'.+$i),
   'amount'     =>$this->input->post('desertlinetotal'.+$i),
   'seller_id'  =>$user_id,
   'filter'=>'4'
         );
    $desert_items[] = $data;
    $this->product_model->update_order_model_desert($id,$desert_items);
  }


$other=$_POST['other_total_item'][0];
$other_pro = $this->input->post('otherproduct1');

for($i=1; $i<=$other;$i++){
    $data = array(
  'productName' => $this->input->post('otherproduct'.+$i),
   'invoice_no' =>$id,
   'buyPrice'   =>$this->input->post('otherprice'.+$i),
   'quantity'   =>$this->input->post('otherqty'.+$i),
   'amount'     =>$this->input->post('otherlinetotal'.+$i),
   'seller_id'  =>$user_id,
   'filter'=>'5'
         );
    $other_items[] = $data;
    $this->product_model->update_order_model_other($id,$other_items);
  }



$nonveg =$_POST['non_veg_total_item'][0];
$nonveg_pro = $this->input->post('nonvegproduct1');


for($i=1; $i<=$nonveg;$i++){
    $data = array(
  'productName' => $this->input->post('nonvegproduct'.+$i),
   'invoice_no' =>$id,
   'buyPrice'   =>$this->input->post('nonvegprice'.+$i),
   'quantity'   =>$this->input->post('nonvegqty'.+$i),
   'amount'     =>$this->input->post('nonveglinetotal'.+$i),
   'seller_id'  =>$user_id,
   'filter'=>'2'
         );
 $non_veg_items[] = $data;
    $this->product_model->update_order_model_non_veg($id,$non_veg_items);
  }
  


$veg = $_POST['veg_total_item'][0];
$veg_pro = $this->input->post('vegproduct1');

for($i=1; $i<=$veg;$i++){
    $data = array(
  'productName' => $this->input->post('vegproduct'.+$i),
   'invoice_no' =>$id,
   'buyPrice'   =>$this->input->post('vegprice'.+$i),
   'quantity'   =>$this->input->post('vegqty'.+$i),
   'amount'     =>$this->input->post('veglinetotal'.+$i),
   'seller_id'  =>$user_id,
   'filter'=>'1'
         );
   $veg_items[] = $data;
    $this->product_model->update_order_model_veg($id,$veg_items);
  }
 
  
           $data2 = array(
        'seller_id'  =>$user_id,
        'invoice_no' =>$id,
        'customer_id'    =>$this->input->post('seller_company_id'),
        'invoice_date'    =>$invoice_date,
        'status'         =>pending,
        'Total_Amount'    =>$total_amount,
        'tax'=>$tax,
        'tax_amount' =>$tax_ammount, 
        'add_date'       =>date("d.m.y"),
        'note'=>$note,
        'event_venue'             =>$this->input->post('event_venue'),
        'event_time'             =>$this->input->post('event_time'),
        'num_guest'             =>$this->input->post('num_guest'),
        'party_date'=>$party_date
      );
  $this->db->where('invoice_no',$id);
  $this->db->update('invoice',$data2); 
//redirect('manageOrder?updated=success');  
$url = 'manageOrder?updated=success';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';	  

  }else{
  redirect('user_ctrl/login', 'refresh');
  }
}










 public function view_order(){
 if($this->session->userdata('logged_in')){
       $session_data = $this->session->userdata('logged_in');
       $data['user_email'] = $session_data['user_email'];
       $data['user_id'] = $session_data['user_id'];
       $data['records4'] = $this->profile_model->company_profile($data['user_id']);
       $data['order'] = $this->product_model->list_order_model($data['user_id']);
       //$data['order_1'] = $this->product_model->list_order_model($data['user_id']);
       //$data['payment'] = $this->product_model->payment_view($data['user_id']);
       //$data['list_customer'] = $this->product_model->list_customer_model($data['user_id']);
       //$data['company_detail'] = $this->product_model->company_profile_order($data['user_id']);
       $this->load->view('admin_seller/list_order',$data);

  }else{
       redirect('user_ctrl/login', 'refresh');
  }
}

/* public function view_invoice(){
 if($this->session->userdata('logged_in')){
       $session_data = $this->session->userdata('logged_in');
       $data['user_email'] = $session_data['user_email'];
       $data['user_id'] = $session_data['user_id'];
       $data['records4'] = $this->profile_model->company_profile($data['user_id']);
       $this->load->view('admin_seller/list_order',$data);
  }else{
       redirect('user_ctrl/login', 'refresh');
  }
}
*/

 public function add_payment(){
 if($this->session->userdata('logged_in')){
   $session_data = $this->session->userdata('logged_in');
   $data['user_email'] = $session_data['user_email'];
   $data['user_number'] = $session_data['user_number'];
   $data['user_id']= $session_data['user_id'];
   $this->form_validation->set_rules('payment_date', '', 'required');
   $this->form_validation->set_rules('payment_paid', '', 'required');
   $this->form_validation->set_rules('payment_note', ' ', 'required');
   $payment_id=$this->input->post('payment_id');
   $customer_id=$this->input->post('customer_id');
   //$total_amount = $this->input->post('total_amount');
   $payment_paid = $this->input->post('payment_paid');
   $invoice_number = $this->input->post('invoice_number');
   $year = strlen($invoice_number);
  if($year=='3'){
     $query = $this->db->query("select MAX(invoice_no)  as max_value from invoice where status='Due' OR status='Paid' OR status='Partial' order by id desc limit 0,1");
   $get_invoice_id = $query->result_array();

  $countrecrd = count($get_invoice_id);
  // $get_id =  $get_invoice_id[0]['invoice_no'];

  $get_id = $get_invoice_id[0]['max_value'];

   $num_of_ids =  substr($get_id,4,7)+1;

//$num_of_ids =  $countrecrd+1;
    //Number of "ids" to generate.
    $i = 0; //Loop counter.
   $n = 0; //"id" number piece.
   $l = date('Y'); //"id" letter piece.

while ($i <= $num_of_ids) { 
    $id = $l.sprintf("%03d", $n); //Create "id". Sprintf pads the number to make it 4 digits.
    $numbers[] = $id; //Print out the id.

    if ($n == 9999) { //Once the number reaches 9999, increase the letter by one and reset number to 0.
        $n = 0;
        $l++;
    }

    $i++; $n++; 
}

$newID = end($numbers);

}else{


$newID = $invoice_number; 

}



   extract($data);
            if ($this->form_validation->run() == FALSE){
                $this->load->view('admin_seller/list_order');
            }
            else{
                 $data = array(
                 'invoice_id'     =>$payment_id,
                 'customer_id'    =>$customer_id,
                 'invoice_date'       =>$this->input->post('payment_date'),
                 'invoice_paid_amount'=>$this->input->post('payment_paid'),
                 'note'      =>$this->input->post('payment_note'),
                 'seller_id' =>$user_id,
                 'mode_of_payment'=>$this->input->post('mode_of_payment')
				 //'total_amount' =>$total_amount
                );
    if($this->product_model->add_payment_model($data) == TRUE){
      $data['records4'] = $this->profile_model->company_profile($data['user_id']);
      $data['message'] = '';
      
   $data_update = array('invoice_no'=>$newID);
     $this->db->where('invoice_no',$invoice_number); 
     $this->db->update('invoice',$data_update);
     $this->db->where('invoice_no',$invoice_number); 
     $this->db->update('order_sheet',$data_update);



      $this->load->view('admin_seller/list_order',$data);
      //redirect('manageOrder?payment=success');
     $url = 'manageOrder?payment=success';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
       }
       else{ //redirect('manageOrder?payment=error');
     $url = 'manageOrder?payment=error';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';

}

         }
        }else{
  redirect('user_ctrl/login', 'refresh');
  }

      }


public function delete_payment($id){
  if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');
    $data['user_id'] = $session_data['user_id'];
    $data['user_email'] = $session_data['user_email'];
    $data['records4'] = $this->profile_model->company_profile($data['user_id']);
  $delete=$this->product_model->delete_payment_model($id);
  if($delete == TRUE){
   // redirect('seller/view_order?payment=deleted');
$url = 'seller/view_order?payment=deleted';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
}
  }else{
   redirect('user_ctrl/login', 'refresh');
  }
}

public function print_payment($id){
   if($this->session->userdata('logged_in')){
       $session_data = $this->session->userdata('logged_in');
       $data['user_email'] = $session_data['user_email'];
       $data['user_id'] = $session_data['user_id'];
       $data['records4'] = $this->profile_model->company_profile($data['user_id']);
       $data['payment'] = $this->product_model->print_payment_model($id);
       $data['profile'] = $this->product_model->profile($data['user_id']);
       $this->load->view('admin_seller/print_payment',$data);
  }else{
       redirect('user_ctrl/login', 'refresh');
  }
}

public function print_invoice($id){
   if($this->session->userdata('logged_in')){
       $session_data = $this->session->userdata('logged_in');
       $data['user_email'] = $session_data['user_email'];
       $data['user_id'] = $session_data['user_id'];
       $data['records4'] = $this->profile_model->company_profile($data['user_id']);
       $data['order_sheet'] = $this->product_model->view_invoice_model($id);
       $data['invoice_veg'] = $this->product_model->invoice_veg($id);
       $data['invoice_paid_amount'] =$this->product_model->invoice_paid_model($id);
       $data['profile'] = $this->product_model->profile($data['user_id']);
       $data['non_items'] = $this->product_model->item_non_veg($data['user_id']);
       $data['veg_items'] = $this->product_model->item_veg($data['user_id']);
          $this->load->library('ciqrcode');

extract($data);
foreach($order_sheet as $row){}
$q_code =  $row['invoice_no'];
$params['data'] = $q_code;
$params['level'] = 'H';
$params['size'] = 5;
$params['savename'] = FCPATH.'tes.png';
$this->ciqrcode->generate($params);
$data['qrcode'] =  '<img src="'.base_url().'tes.png" />';
       $this->load->view('admin_seller/view_invoice',$data);
//this->barcode();
  }else{
       redirect('user_ctrl/login', 'refresh');
  }
}

 public function barcode(){
  $this->load->view('admin_seller/barcode');   
 }

 public function delete_invoice($id){
 if($this->session->userdata('logged_in')){
       $session_data = $this->session->userdata('logged_in');
       $data['user_email'] = $session_data['user_email'];
       $data['user_id'] = $session_data['user_id'];
       $data['records4'] = $this->profile_model->company_profile($data['user_id']);
       $delete = $this->product_model->delete_invoice_model($id);
     if($delete ==true){
   // redirect('seller/view_order?order=deleted');
    $url = 'seller/view_order?order=deleted';
   echo'<script>window.location.href = "'.base_url().$url.'";</script>';
    
     }
  }else{
       redirect('user_ctrl/login', 'refresh');
  }
}


 public function upload_csv(){
 if($this->session->userdata('logged_in')){
       $session_data = $this->session->userdata('logged_in');
       $data['user_email'] = $session_data['user_email'];
       $data['user_id'] = $session_data['user_id'];
       $data['records4'] = $this->profile_model->company_profile($data['user_id']);
       $this->load->view('admin_seller/upload_csv',$data);
  }else{
       redirect('user_ctrl/login', 'refresh');
  }
}


 public function getProduct(){
        $page =  $_GET['page'];
        $this->load->model('product_model');
        $countries = $this->product_model->getProduct($page);
     foreach($countries as $row){
        echo " <div data-product-name='A est similique.'> <div class='md-card md-card-hover-img'>";
        echo "<div class='md-card-head uk-text-center uk-position-relative'>";
        echo "<img class='md-card-head-img' src='<?php echo base_url();?>upload/<?php echo $row->image;?>'  style='padding:10px;'alt=''/></div>";
        echo "<div class='md-card-content'><h4 class='heading_c uk-margin-bottom'><a style='text-transform:capitalize'> <?php echo $row->product_name;?></a>";
        echo "<span class='sub-heading' style=''><strong>Rs.</strong><span><?php echo $row->price;?></span><strong>/</strong><?php echo $row->per;?></span></h4>";
        echo "<a href='<?php echo site_url()?>seller/view_product/<?php echo $row->id;?>'> <button class='md-btn' data-uk-modal='{target:'#modal_large'}'>Read More</button></a> ";
        echo "<div class='md-card-head-menu' data-uk-dropdown='{pos:'bottom-right'}' aria-haspopup='true' aria-expanded='false'> ";
        echo " <i class='md-icon material-icons'></i>";
        echo "<div class='uk-dropdown uk-dropdown-small uk-dropdown-bottom' style='min-width: 160px; top: 32px; left: -128px;'>";
        echo "<div class='uk-dropdown uk-dropdown-small uk-dropdown-bottom' style='min-width: 160px; top: 32px; left: -128px;'>";
        echo "<ul class='uk-nav'><li><a href=''>Edit</a></li><li><a href='' onclick='return ConfirmDialog()'>Remove</a></li>";
        echo " </ul> </div> </div> </div></div></div>";
        }

        exit;
    }



 public function csv(){
    if(isset($this->session->userdata['logged_in'])){
      $session_data = $this->session->userdata('logged_in');
      $data['user_email'] = $session_data['user_email'];
      $data['user_id'] = $session_data['user_id'];
      $csv_file = $_FILES['file']['tmp_name'];
      $this->load->library('Csvreader','upload');
      $result = $this->csvreader->parse_file($csv_file);//path to csv file
      $data= array(
      'productName'=> $result,
      'seller_id'  =>  $data['user_id']
      );
      $result1 = $this->product_model->insert_file_csv($data);
      if($result1 == TRUE){
      redirect('uploadCsv?message=upload');
      }
  }else{
        redirect('user_ctrl/login','refresh');
      }
  }

 

  public function add_Principal(){
    
  if($this->session->userdata('logged_in')){
       $session_data = $this->session->userdata('logged_in');
       $data['user_email'] = $session_data['user_email'];
       $data['user_id'] = $session_data['user_id'];
      $data['records4'] = $this->profile_model->company_profile($data['user_id']);
       $this->load->view('admin_seller/add_principle',$data);
      
  }else{
       redirect('user_ctrl/login', 'refresh');
  }
}


public function saveprincipal(){
    
    
    if($this->session->userdata('logged_in')){
   $session_data = $this->session->userdata('logged_in');
//   $data['user_email'] = $session_data['user_email'];
   $data['user_number'] = $session_data['user_number'];
   $data['user_id']= $session_data['user_id'];
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('Principal_email', '', 'required');
   
        
  
        extract($data);
        $data = array(
       'Principal_person'=>$this->input->post('Principal_person'),
//       'Principal_email'=>$this->input->post('Principal_email'),
       'short_name'=>$this->input->post('short_name'),
       'Principal_phone'=>$this->input->post('Principal_phone'),
       'Principal_address'=>$this->input->post('Principal_address'),
       'Principal_city' =>$this->input->post('Principal_city'),
       'Principal_country'=>$this->input->post('Principal_country'),
       'Principal_postal_code'=>$this->input->post('Principal_postal_code'),
       'seller_id' => $session_data['user_id'],
        
            );
       
        
    if($this->product_model->add_principal_model_new($data,$_REQUEST) == TRUE){
       $data['records4'] = $this->profile_model->company_profile($data['user_id']);
       $data['message'] = '<h5 style="text-align:center;">Contact Profile Inserted Successfully <img src="http://localhost/ci_panel/assets/img/valid.png"></h5>';
     //redirect('addPrincipal?message=1');
     
     $url=  site_url('addPrincipal?message=1');
     redirect($url);
     exit;
//       $url = 'addPrincipal?message=1';
//echo'<script>window.location.href = "'.base_url().$url.'";</script>';


    }
    else{
        
        $url=  site_url('addPrincipal?message=already');
        redirect($url);
        exit;
    //redirect('addPrincipal?message=already');
// $url = 'addPrincipal?message=already';
//echo'<script>window.location.href = "'.base_url().$url.'";</script>';
    }
  
  }else{
       redirect('user_ctrl/login', 'refresh');
  }
}



public function editprincipal(){
    
    
    if($this->session->userdata('logged_in')){
   $session_data = $this->session->userdata('logged_in');
//   $data['user_email'] = $session_data['user_email'];
   $data['user_number'] = $session_data['user_number'];
   $data['user_id']= $session_data['user_id'];
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('Principal_email', '', 'required');
   
        
  
        extract($data);
        $data = array(
       'Principal_person'=>$this->input->post('Principal_person'),
//       'Principal_email'=>$this->input->post('Principal_email'),
       'Principal_phone'=>$this->input->post('Principal_phone'),
       'Principal_address'=>$this->input->post('Principal_address'),
       'Principal_city' =>$this->input->post('Principal_city'),
       'Principal_country'=>$this->input->post('Principal_country'),
       'Principal_postal_code'=>$this->input->post('Principal_postal_code'),
       'seller_id' => $session_data['user_id'],
        
            );
       
        
    if($this->product_model->add_principal_model_new($data,$_REQUEST) == TRUE){
       $data['records4'] = $this->profile_model->company_profile($data['user_id']);
       $data['message'] = '<h5 style="text-align:center;">Contact Profile Inserted Successfully <img src="http://localhost/ci_panel/assets/img/valid.png"></h5>';
     //redirect('addPrincipal?message=1');
     
     $url=  site_url('editPrincipal?message=1');
     redirect($url);
     exit;
//       $url = 'addPrincipal?message=1';
//echo'<script>window.location.href = "'.base_url().$url.'";</script>';


    }
    else{
        
        $url=  site_url('editPrincipal?message=already');
        redirect($url);
        exit;
    //redirect('addPrincipal?message=already');
// $url = 'addPrincipal?message=already';
//echo'<script>window.location.href = "'.base_url().$url.'";</script>';
    }
  
  }else{
       redirect('user_ctrl/login', 'refresh');
  }
}


public function list_Principal(){
 if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');
    $data['user_email'] = $session_data['user_email'];
    $data['user_id'] = $session_data['user_id'];
    $data['records4'] = $this->profile_model->company_profile($data['user_id']);
    $data['list_principal'] = $this->product_model->list_principle_model($data['user_id']);
    $data['month_year'] = $_GET['month_year'];
    $data['principal_filters'] = $this->profile_model->total_principle_filter($data);
    
    //echo '<pre>'; print_r($data); echo '</pre>'; die;
    
    $this->load->view('admin_seller/list_principle',$data);
  }else{
       redirect('user_ctrl/login', 'refresh');
  }
}

public function customer(){
    if($this->session->userdata('logged_in')){
   $session_data = $this->session->userdata('logged_in');
   $data['user_email'] = $session_data['user_email'];
   $data['user_number'] = $session_data['user_number'];
   $data['user_id']= $session_data['user_id'];
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('customer_email', '', 'required');
    if($this->form_validation->run() == FALSE){
        $this->load->view('admin_seller/add_customer',$data);
}else{
        extract($data);
        $data = array(
       'customer_person'    => $this->input->post('customer_person'),
       'customer_email'=> $this->input->post('customer_email'),
       'customer_phone'     => $this->input->post('customer_phone'),
       'customer_address'       =>  $this->input->post('customer_address'),
       'customer_city'      =>  $this->input->post('customer_city'),
       'customer_country'=>  $this->input->post('customer_country'),
       'customer_postal_code'=>$this->input->post('customer_postal_code'),
       'seller_id' => $user_id );
    if($this->product_model->add_customer_model($data) == TRUE){
       $data['records4'] = $this->profile_model->company_profile($data['user_id']);
       $data['message'] = '<h5 style="text-align:center;">Contact Profile Inserted Successfully <img src="http://localhost/ci_panel/assets/img/valid.png"></h5>';
     //redirect('addCustomer?message=1');
       $url = 'addCustomer?message=1';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
    }
    else{
    //redirect('addCustomer?message=already');
 $url = 'addCustomer?message=already';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
    }
  }
  }else{
       redirect('user_ctrl/login', 'refresh');
  }
}

public function principal_submit(){
    if($this->session->userdata('logged_in')){
   $session_data = $this->session->userdata('logged_in');
   $data['user_email'] = $session_data['user_email'];
   $data['user_number'] = $session_data['user_number'];
   $data['user_id']= $session_data['user_id'];
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('Principal_company', '', 'required');
        $this->form_validation->set_rules('Principal_person', '', 'required');
        $this->form_validation->set_rules('Principal_email', '', 'required');
        $this->form_validation->set_rules('Principal_phone', '', 'required');
        $this->form_validation->set_rules('Principal_address', '', 'required');
        $this->form_validation->set_rules('Principal_city', '', 'required');
        $this->form_validation->set_rules('Principal_state', '', 'required');
        $this->form_validation->set_rules('Principal_country', '', 'required');
        $this->form_validation->set_rules('Principal_postal_code', 'Fax Number', '');
    if($this->form_validation->run() == FALSE){
        $this->load->view('admin_seller/add_principal');
}else{
    
   
        extract($data);
       
        
        $data = array(
       'Principal_company'=> $this->input->post('Principal_company'),
       'Principal_person'    => $this->input->post('Principal_person'),
       'Principal_email'=> $this->input->post('Principal_email'),
       'Principal_phone'     => $this->input->post('Principal_phone'),
       'Principal_address'       =>  $this->input->post('Principal_address'),
       'Principal_city'      =>  $this->input->post('Principal_city'),
       'Principal_state'=>  $this->input->post('Principal_state'),
       'Principal_country'=>  $this->input->post('Principal_country'),
       'Principal_postal_code'=>$this->input->post('Principal_postal_code'),
       'seller_id' => $user_id );
    if($this->product_model->add_principal_model($data) == TRUE){
       $data['records4'] = $this->profile_model->company_profile($data['user_id']);
       $data['message'] = '<h5 style="text-align:center;">Contact Profile Inserted Successfully <img src="http://localhost/ci_panel/assets/img/valid.png"></h5>';
     //redirect('managePrincipal?message=success');
     $url = 'managePrincipal?message=success';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
    }
    else{
    //redirect('manageCustomers?message=already');
 $url = 'managePrincipal?message=already';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
    }
  }
  }else{
       redirect('user_ctrl/login', 'refresh');
  }
}


public function customer_submit(){
    if($this->session->userdata('logged_in')){
   $session_data = $this->session->userdata('logged_in');
   $data['user_email'] = $session_data['user_email'];
   $data['user_number'] = $session_data['user_number'];
   $data['user_id']= $session_data['user_id'];
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('customer_company', '', 'required');
        $this->form_validation->set_rules('customer_person', '', 'required');
        $this->form_validation->set_rules('customer_email', '', 'required');
        $this->form_validation->set_rules('customer_phone', '', 'required');
        $this->form_validation->set_rules('customer_address', '', 'required');
        $this->form_validation->set_rules('customer_city', '', 'required');
        $this->form_validation->set_rules('customer_state', '', 'required');
        $this->form_validation->set_rules('customer_country', '', 'required');
        $this->form_validation->set_rules('customer_postal_code', 'Fax Number', '');
    if($this->form_validation->run() == FALSE){
        $this->load->view('admin_seller/add_customer');
}else{
    
   
        extract($data);
       
        
        $data = array(
       'customer_company'=> $this->input->post('customer_company'),
       'customer_person'    => $this->input->post('customer_person'),
       'customer_email'=> $this->input->post('customer_email'),
       'customer_phone'     => $this->input->post('customer_phone'),
       'customer_address'       =>  $this->input->post('customer_address'),
       'customer_city'      =>  $this->input->post('customer_city'),
       'customer_state'=>  $this->input->post('customer_state'),
       'customer_country'=>  $this->input->post('customer_country'),
       'customer_postal_code'=>$this->input->post('customer_postal_code'),
       'seller_id' => $user_id );
    if($this->product_model->add_customer_model($data) == TRUE){
       $data['records4'] = $this->profile_model->company_profile($data['user_id']);
       $data['message'] = '<h5 style="text-align:center;">Contact Profile Inserted Successfully <img src="http://localhost/ci_panel/assets/img/valid.png"></h5>';
     //redirect('manageCustomers?message=success');
     $url = 'manageCustomers?message=success';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
    }
    else{
    //redirect('manageCustomers?message=already');
 $url = 'manageCustomers?message=already';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
    }
  }
  }else{
       redirect('user_ctrl/login', 'refresh');
  }
}




 public function list_customers(){
 if($this->session->userdata('logged_in')){
       $session_data = $this->session->userdata('logged_in');
       $data['user_email'] = $session_data['user_email'];
       $data['user_id'] = $session_data['user_id'];
      $data['records4'] = $this->profile_model->company_profile($data['user_id']);
      $data['list_customer'] = $this->product_model->list_customer_model($data['user_id']);
      $data['month_year'] = $_GET['month_year'];
      $data['customers_filters'] = $this->profile_model->total_customers_filter($data);
       $this->load->view('admin_seller/list_customers',$data);
  }else{
       redirect('user_ctrl/login', 'refresh');
  }
}


 public function profile_filter($id){
 if($this->session->userdata('logged_in')){
       $session_data = $this->session->userdata('logged_in');
       $data['user_email'] = $session_data['user_email'];
       $data['user_id'] = $session_data['user_id'];
      $data['records4'] = $this->profile_model->company_profile($data['user_id']);
      $data['list_customer'] = $this->product_model->list_customer_model($data['user_id']);
       $data['month_year'] = $_GET['month_year'];
       $data['profile_filters'] = $this->profile_model->profile_customer_model($data);
       $data['detail_customer'] =$this->product_model->detail_customer_model($id,$data['user_id']);
	   $data['amount_detail'] =$this->product_model->customer_paid_amount($id,$data['user_id']);
       $this->load->view('admin_seller/detail_customer',$data);
  }else{
       redirect('user_ctrl/login', 'refresh');
  }
}


public function delete_principal($id){
  if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');
    $data['user_id'] = $session_data['user_id'];
    $data['user_email'] = $session_data['user_email'];
    $data['records4'] = $this->profile_model->company_profile($data['user_id']);
  $delete=$this->product_model->delete_principal_model($id);
  if($delete == TRUE){
     $url=  site_url('managePrincipal?customer=deleted');
     redirect($url);
     exit;

}
  }else{
   redirect('user_ctrl/login', 'refresh');
  }
}


public function delete_principal_old($id){
  if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');
    $data['user_id'] = $session_data['user_id'];
    $data['user_email'] = $session_data['user_email'];
    $data['records4'] = $this->profile_model->company_profile($data['user_id']);
  $delete=$this->product_model->delete_principal_model($id);
  if($delete == TRUE){
     $url=  site_url('managePrincipal?customer=deleted');
     redirect($url);
     exit;

}
  }else{
   redirect('user_ctrl/login', 'refresh');
  }
}



public function delete_customer($id){
  if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');
    $data['user_id'] = $session_data['user_id'];
    $data['user_email'] = $session_data['user_email'];
    $data['records4'] = $this->profile_model->company_profile($data['user_id']);
  $delete=$this->product_model->delete_customer_model($id);
  if($delete == TRUE){
           
     $url=  site_url('manageCustomers?message=1');
     redirect($url);
     exit;
   // redirect('manageCustomers?customer=deleted');
$url = 'manageCustomers?customer=deleted';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
}
  }else{
   redirect('user_ctrl/login', 'refresh');
  }
}


/*
public function edit_principal(){
  if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');
    $data['user_id'] = $session_data['user_id'];
    $data['user_email'] = $session_data['user_email'];
    $data['records4'] = $this->profile_model->company_profile($data['user_id']);
    $data['edit_principal']=$this->product_model->edit_principal_model($_REQUEST['id']);
  $this->load->view('admin_seller/edit_principal',$data);
  }else{
   redirect('user_ctrl/login', 'refresh');
  }
}*/

public function updatePrincipal(){
        
        if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');
    $data['user_id'] = $session_data['user_id'];
    $data['user_email'] = $session_data['user_email'];
    $data['records4'] = $this->profile_model->company_profile($data['user_id']);
    $data['edit_principal']=$this->product_model->edit_principal_model($_REQUEST['id']);
        
    $this->load->view('admin_seller/edit_principal',$data);
  
}else{
   redirect('user_ctrl/login', 'refresh');
  }
}


public function update_Principal(){
  if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');
    $data['user_id'] = $session_data['user_id'];
    $data['user_email'] = $session_data['user_email'];
    $data['records4'] = $this->profile_model->company_profile($data['user_id']);
   $id=$this->input->post('uid');
    $data = array(
        
       'Principal_company'=> $this->input->post('Principal_company'),
       'Principal_person'    => $this->input->post('Principal_person'),
        'short_name'    => $this->input->post('short_name'),
       'Principal_email'=> $this->input->post('Principal_email'),
       'Principal_phone'     => $this->input->post('Principal_phone'),
       'Principal_address'       =>  $this->input->post('Principal_address'),
       'Principal_city'      =>  $this->input->post('Principal_city'),
       'Principal_state'=>  $this->input->post('Principal_state'),
       'Principal_country'=>  $this->input->post('Principal_country'),
       'Principal_postal_code'=>$this->input->post('Principal_postal_code'),
       );
  $data['edit_principal']=$this->product_model->update_principal_model($id,$data,$_REQUEST);
   
  //redirect('manageCustomers?message=1');
  $url = 'managePrincipal?message=1';
  $fullurl=base_url().$url;
  redirect($fullurl);

  }else{
   redirect('user_ctrl/login', 'refresh');
  }
}
public function view_Principal(){
  if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');
    $data['user_id'] = $session_data['user_id'];
    $data['user_email'] = $session_data['user_email'];
    $data['records4'] = $this->profile_model->company_profile($data['user_id']);
   $id=$this->input->post('uid');
    
  $data['edit_principal']=$this->product_model->update_principal_model($id,$data);
  //redirect('manageCustomers?message=1');
  
  
$url = 'managePrincipal?message=1';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
  }else{
   redirect('user_ctrl/login', 'refresh');
  }
}
public function edit_customer($id){
  if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');
    $data['user_id'] = $session_data['user_id'];
    $data['user_email'] = $session_data['user_email'];
    $data['records4'] = $this->profile_model->company_profile($data['user_id']);
  $data['edit_customer']=$this->product_model->edit_customer_model($id);
  $this->load->view('admin_seller/edit_customer',$data);
  }else{
   redirect('user_ctrl/login', 'refresh');
  }
}
public function update_customer(){
  if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');
    $data['user_id'] = $session_data['user_id'];
    $data['user_email'] = $session_data['user_email'];
    $data['records4'] = $this->profile_model->company_profile($data['user_id']);
   $id=$this->input->post('uid');
    $data = array(
       'customer_company'=> $this->input->post('customer_company'),
       'customer_person'    => $this->input->post('customer_person'),
       'customer_email'=> $this->input->post('customer_email'),
       'customer_phone'     => $this->input->post('customer_phone'),
       'customer_address'       =>  $this->input->post('customer_address'),
       'customer_city'      =>  $this->input->post('customer_city'),
       'customer_state'=>  $this->input->post('customer_state'),
       'customer_country'=>  $this->input->post('customer_country'),
       'customer_postal_code'=>$this->input->post('customer_postal_code')
       );
  $data['edit_customer']=$this->product_model->update_customer_model($id,$data);
  //redirect('manageCustomers?message=1');
$url = 'manageCustomers?message=1';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
  }else{
   redirect('user_ctrl/login', 'refresh');
  }
}

public function load_customer($id){
  if($this->session->userdata('logged_in')){
    $id=$id;
    $session_data = $this->session->userdata('logged_in');
    $data['user_id'] = $session_data['user_id'];
    $data['user_email'] = $session_data['user_email'];
    //$data['records4'] = $this->profile_model->company_profile($data['user_id']);
    $query = $this->db->query("select * from customers where customer_id='$id'");
    $data['customer']=$query->result_array();
    extract($data);
   echo $customer[0]['customer_email']."||".$customer[0]['customer_address'];
}else{
   redirect('user_ctrl/login', 'refresh');
  }
}

public function invoice_status($id){
  if($this->session->userdata('logged_in')){
    $id=$id;
    $session_data = $this->session->userdata('logged_in');
    $data['user_id'] = $session_data['user_id'];
    $data['user_email'] = $session_data['user_email'];
    $data['records4'] = $this->profile_model->company_profile($data['user_id']);
    $data=array(
    'status' => $this->input->post('status')
    );
   $data['status'] = $this->product_model->invoice_status_model($id,$data);
  //redirect('seller/view_order');
$url = 'seller/view_order';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
   }else{
   redirect('user_ctrl/login', 'refresh');
  }
}

public function update_payment($id){
  if($this->session->userdata('logged_in')){
    $id=$_POST['id'];
    $session_data = $this->session->userdata('logged_in');
    $data['user_id'] = $session_data['user_id'];
    $data['user_email'] = $session_data['user_email'];
    $data['records4'] = $this->profile_model->company_profile($data['user_id']);
    $invoice_paid=$this->input->post('firstname');
    $note     =$this->input->post('lastname');
    $date     =$this->input->post('date');
    $data=array(
    'invoice_paid_amount'=>$invoice_paid,
    'note'            =>$note,
    'invoice_date' =>$date
    );
  $this->db->where('payment_id',$id);
  $this->db->update('payment',$data);
  }else{
   redirect('user_ctrl/login', 'refresh');
  }
}

public function order_list_print(){
 if($this->session->userdata('logged_in')){
       $session_data = $this->session->userdata('logged_in');
       $data['user_email'] = $session_data['user_email'];
       $data['user_id'] = $session_data['user_id'];
       $data['records4'] = $this->profile_model->company_profile($data['user_id']);
       $data['order'] = $this->product_model->list_order_model($data['user_id']);
       $data['profile'] = $this->product_model->profile($data['user_id']);
       $this->load->view('admin_seller/list_order_print',$data);
  }else{
       redirect('user_ctrl/login', 'refresh');
  }
}


public function detail_customer($id){
if($this->session->userdata('logged_in')){
       $session_data = $this->session->userdata('logged_in');
       $data['user_email'] = $session_data['user_email'];
       $data['user_id'] = $session_data['user_id'];
       $data['records4'] = $this->profile_model->company_profile($data['user_id']);
       $data['detail_customer'] =$this->product_model->detail_customer_model($id,$data['user_id']);
       $data['amount_detail'] =$this->product_model-> customer_paid_amount($id,$data['user_id']);
       $this->load->view('admin_seller/detail_customer',$data);
  }else{
       redirect('user_ctrl/login', 'refresh');
  }
}


public function update_customer_ajax($id){
  if($this->session->userdata('logged_in')){
    $id=$_POST['id'];
    $session_data = $this->session->userdata('logged_in');
    $data['user_id'] = $session_data['user_id'];
    $data['user_email'] = $session_data['user_email'];
    $data['records4'] = $this->profile_model->company_profile($data['user_id']);
    $customer_person=$this->input->post('firstname');
    $customer_company=$this->input->post('lastname');
    $customer_phone=$this->input->post('phone');
    $customer_email=$this->input->post('email');
    $customer_city=$this->input->post('city');
    $customer_country=$this->input->post('country');
    $data=array(
    'customer_person'=>$customer_person,
    'customer_company'=>$customer_company,
    'customer_phone' =>$customer_phone,
    'customer_email' =>$customer_email,
    'customer_city'  =>$customer_city,
    'customer_country'=>$customer_country
    );
  $this->db->where('customer_id',$id);
  $this->db->update('customers',$data);
  }else{
   redirect('user_ctrl/login', 'refresh');
  }
}

public function sales(){
if($this->session->userdata('logged_in')){
       $session_data = $this->session->userdata('logged_in');
       $data['user_email'] = $session_data['user_email'];
       $data['user_id'] = $session_data['user_id'];
       $data['records4'] = $this->profile_model->company_profile($data['user_id']);
       extract($data);
       $start_date =$this->input->post('start_date');
       $end_date =$this->input->post('end_date');
      /* $query= $this->db->query("select year(add_date) as year, monthname(add_date) as month,  SUM(Total_amount) as subtotal, count(*) as orders,(select  sum(Total_amount) from invoice where status='paid') as paid,
       (select SUM(Total_amount) from invoice where status='pending') as pending
       FROM invoice Where seller_id='$user_id' and  add_date  BETWEEN '$start_date' AND '$end_date'  Group BY YEAR(add_date),MONTH(add_date),week(add_date)");*/
      $query = $this->db->query("SELECT SUM(Total_amount) as subtotal, count(*) as orders,(select sum(Total_amount) from invoice where status='paid' and seller_id='$user_id' and add_date BETWEEN '$start_date' AND '$end_date') as paid,(select sum(Total_amount) from invoice where status='pending' and seller_id='$user_id' and add_date BETWEEN '$start_date' AND '$end_date') as pending FROM invoice WHERE seller_id='$user_id' and add_date BETWEEN '$start_date' AND '$end_date'");
       $data['sales']=$query->result_array();
       $this->load->view('admin_seller/daily_Sales',$data);
  }else{
       redirect('user_ctrl/login', 'refresh');
  }
}

 public function add_tracking(){
 if($this->session->userdata('logged_in')){
   $session_data = $this->session->userdata('logged_in');
   $data['user_email'] = $session_data['user_email'];
   $data['user_number'] = $session_data['user_number'];
   $data['user_id']= $session_data['user_id'];
   $this->form_validation->set_rules('dod', '', 'required');
   $this->form_validation->set_rules('transport_name', '', 'required');
   $this->form_validation->set_rules('contact_person', ' ', 'required');
   $this->form_validation->set_rules('mobile_number', '', 'required');
   $this->form_validation->set_rules('email', '', 'required');
   $this->form_validation->set_rules('lr_number', ' ', 'required');
   $invoice_id=$this->input->post('invoice_id');
   $customer_id=$this->input->post('customer_id');
   extract($data);
            if ($this->form_validation->run() == FALSE){
                $this->load->view('admin_seller/list_order');
            }
            else{
                 $data = array(
                 'dispatch_date'     =>$this->input->post('dod'),
                 'transport_name'    =>$this->input->post('transport_name'),
                 'contact_person'    =>$this->input->post('contact_person'),
                 'mobile_number'     =>$this->input->post('mobile_number'),
                 'email'             =>$this->input->post('email'),
                 'LR_number'         =>$this->input->post('lr_number'),
                 'invoice_id'        =>$invoice_id,
                 'customer_id'       =>$customer_id,
                 'seller_id' =>$user_id,

                );
    if($this->product_model->add_tracking_model($data) == TRUE){
      $data['records4'] = $this->profile_model->company_profile($data['user_id']);
      $data['message'] = '';
      $this->load->view('admin_seller/list_order',$data);
      redirect('manageOrder?Order=success');
       }

         }
        }else{
  redirect('user_ctrl/login', 'refresh');
  }

      }


public function order_track(){
  $track_id=$_GET['code'];
if($this->session->userdata('logged_in')){
       $session_data = $this->session->userdata('logged_in');
       $data['user_email'] = $session_data['user_email'];
       $data['user_id'] = $session_data['user_id'];
       $data['track_id'] =$track_id;
       $data['records4'] = $this->profile_model->company_profile($data['user_id']);
       $this->load->view('admin_seller/order_track',$data);
  }else{
       redirect('user_ctrl/login', 'refresh');
  }
}

public function order_track_delete($id){
if($this->session->userdata('logged_in')){
       $session_data = $this->session->userdata('logged_in');
       $data['user_email'] = $session_data['user_email'];
       $data['user_id'] = $session_data['user_id'];
       $data['records4'] = $this->profile_model->company_profile($data['user_id']);
      $delete=$this->product_model->order_track_model($id);
  if($delete == TRUE){
    redirect('seller/view_order?order_track=deleted');
}
  }else{
       redirect('user_ctrl/login', 'refresh');
  }
}


public function export_order(){
if($this->session->userdata('logged_in')){
       $session_data = $this->session->userdata('logged_in');
       $data['user_email'] = $session_data['user_email'];
       $data['user_id'] = $session_data['user_id'];
       $data['track_id'] =$track_id;
       $data['records4'] = $this->profile_model->company_profile($data['user_id']);
        $data['order'] = $this->product_model->list_order_model($data['user_id']);
       $this->load->view('admin_seller/export_table',$data);
  }else{
       redirect('user_ctrl/login', 'refresh');
  }
}


public function export_customers(){
if($this->session->userdata('logged_in')){
       $session_data = $this->session->userdata('logged_in');
       $data['user_email'] = $session_data['user_email'];
       $data['user_id'] = $session_data['user_id'];
       $data['track_id'] =$track_id;
       $data['records4'] = $this->profile_model->company_profile($data['user_id']);
       $data['list_customers'] = $this->product_model->list_customer_model($data['user_id']);
       $this->load->view('admin_seller/export_customers',$data);
  }else{
       redirect('user_ctrl/login', 'refresh');
  }
}

public function export_principal(){
if($this->session->userdata('logged_in')){
       $session_data = $this->session->userdata('logged_in');
       $data['user_email'] = $session_data['user_email'];
       $data['user_id'] = $session_data['user_id'];
       $data['track_id'] =$track_id;
       $data['records4'] = $this->profile_model->company_profile($data['user_id']);
        $filter_chart = $_GET['recort_filter'];
          if(empty($filter_chart)){
              $abc['start']=date("Y")."-01-01";
              $abc['end']=date("Y")."-12-31";
          }else{
               $abc = (array)json_decode($filter_chart);
          }
     
     $start_date = $abc['start'];
     $end_date = $abc['end'];
//      echo'<pre>'; print_r($start_date); echo'</pre>';
//       echo'<pre>'; print_r($end_date); echo'</pre>';
       $data['list_principal'] = $this->product_model->list_principal_model_filter($data['user_id'],$start_date,$end_date);
      // $filter_chart = $this->input->post('recort_filter');
      
       
       $this->load->view('admin_seller/export_principal',$data);
  }else{
       redirect('user_ctrl/login', 'refresh');
  }
}




public function password(){
if($this->session->userdata('logged_in')){
       $session_data = $this->session->userdata('logged_in');
       $data['user_email'] = $session_data['user_email'];
       $data['user_id'] = $session_data['user_id'];
       $data['track_id'] =$track_id;
       $data['records4'] = $this->profile_model->company_profile($data['user_id']);
       $this->load->view('admin_seller/change_password',$data);
  }else{
       redirect('user_ctrl/login', 'refresh');
  }
}


public function change_password()
{
if($this->session->userdata('logged_in')){
       $session_data = $this->session->userdata('logged_in');
       $data['user_email'] = $session_data['user_email'];
       $data['user_id'] = $session_data['user_id'];
       $data['track_id'] =$track_id;
extract($data);
$todo=$this->input->post('todo');
$old_password=$this->input->post('old_password');
$password=$this->input->post('newpassword');
$password2=$this->input->post('re-password');
if(isset($todo) and $todo=="change-password"){
$status = "OK";
$msg="";

$count=$this->db->query("select user_password from users where user_id=$user_id");
$query=$count->result_array();


if($query[0]['user_password']<>($old_password)){
$msg=$msg."Your old password  is not matching as per our record.<BR>";
if($msg){
//redirect('changePassword?wrong=1');
$url = 'changePassword?wrong=1';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
}
}

if ( strlen($password) < 3 or strlen($password) > 8 ){
$msg=$msg."Password must be more than 3 char legth and maximum 8 char lenght<BR>";
if($msg){
//redirect('changePassword?wrong=2');
$url = 'changePassword?wrong=2';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
}

}

if ( $password <> $password2 ){
$msg=$msg."Both passwords are not matching<BR>";
if($msg){
//redirect('changePassword?wrong=3');
$url = 'changePassword?wrong=3';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
}
}

if($status<>"OK"){
echo "<font face='Verdana' size='2' color=red>$msg</font><br><center><input type='button' value='Retry' onClick='history.go(-1)'></center>";
}else{ // if all validations are passed.
$password=($password); // Encrypt the password before storing
if($sql=$this->db->query("update users set user_password='$password' where user_id='$user_id'")){
if($sql){
 //redirect('changePassword?success=password');
$url = 'changePassword?success=password';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
  }else{echo "<font face='Verdana' size='2' color=red><center>Sorry <br> Failed to change password Contact Site Admin</font></center>";
  }
 }
 }
}
}else{
       redirect('user_ctrl/login', 'refresh');
  }
}


function result_order(){
    if($this->session->userdata('logged_in')){
        $session_data = $this->session->userdata('logged_in');
        $data['user_email'] = $session_data['user_email'];
        $data['user_id'] = $session_data['user_id'];
        $data['records4'] = $this->profile_model->company_profile($data['user_id']);
        $data['status'] = $this->input->post('status');
        $data['month_report']= $this->input->post('month_report');
        $data['order_filter'] = $this->product_model->result_order_model($data);
        $this->load->view('admin_seller/result_order',$data);

    }else{ redirect('user_ctrl/login','refresh');}
}

function cancel_status($id){
    if($this->session->userdata('logged_in')){
        $session_data = $this->session->userdata('logged_in');
        $data['user_email'] = $session_data['user_email'];
        $data['user_id'] = $session_data['user_id'];
        $data['records4'] = $this->profile_model->company_profile($data['user_id']);
        $status_message = 'canceled';
        $data = array('status'=>$status_message);
        $this->db->where('id',$id);
        $this->db->update('invoice',$data);
        redirect('manageOrder');

    }else{ redirect('user_ctrl/login','refresh');}
}

 function sales_report(){
	 $filter_chart = $_GET['chart_filter'];
    if($this->session->userdata('logged_in')){
        $session_data = $this->session->userdata('logged_in');
        $data['user_email'] = $session_data['user_email'];
        $data['user_id'] = $session_data['user_id'];
        $data['records4'] = $this->profile_model->company_profile($data['user_id']);
        $abc = (array)json_decode($filter_chart);
        $start_date = $abc['start'];
        $end_date = $abc['end'];
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
        extract($data);
    if($start_date && $end_date){
    $query =$this->db->query("select invoice.id,invoice.invoice_no,invoice.invoice_date,customers.customer_company,invoice.Total_amount,invoice.status,invoice.sales_person from invoice left join customers on invoice.customer_id=customers.customer_id WHERE invoice.seller_id = '$user_id' and on_date >= DATE('$start_date 00:00:00') AND on_date <= DATE('$end_date 00:00:00') order by id desc");
    $data['records'] =$query->result_array();
	$b =$query->result_array();
	
	$query =$this->db->query("select sum(Total_amount) as total_amount from invoice left join customers on invoice.customer_id=customers.customer_id WHERE invoice.seller_id = '$user_id' and on_date >= DATE('$start_date 00:00:00') AND on_date <= DATE('$end_date 00:00:00')");
    $data['total_sales'] =$query->result_array();
    
	foreach($b as $invoice_id){ $invoice=$invoice_id['id'];}
	
	$query =$this->db->query("select sum(invoice_paid_amount) as paid_amount from payment WHERE seller_id ='$user_id' and invoice_id='$invoice' ");
    $data['total_paid'] =$query->result_array();
	

	
	$query =$this->db->query("select sum(Total_amount) as pending_amount from invoice WHERE seller_id ='$user_id' and status='Pending' and on_date >= DATE('$start_date 00:00:00') AND on_date <= DATE('$end_date 00:00:00')");
    $data['total_pending'] =$query->result_array();
	
	$query =$this->db->query("select sum(Total_amount) as canceled_amount from invoice WHERE seller_id ='$user_id' and status='canceled' and on_date >= DATE('$start_date 00:00:00') AND on_date <= DATE('$end_date 00:00:00') ");
    $data['total_canceled'] =$query->result_array();
    }else{
    $query =$this->db->query("select * from invoice left join customers on invoice.customer_id=customers.customer_id WHERE invoice.seller_id = '$user_id' and YEAR(`on_date`) = YEAR(CURDATE()) order by id desc");
    $data['records'] =$query->result_array();
	$ab =$query->result_array();
    $query =$this->db->query("select sum(Total_amount) as total_amount from invoice left join customers on invoice.customer_id=customers.customer_id WHERE invoice.seller_id = '$user_id'");
    $data['total_sales'] =$query->result_array();
    $query =$this->db->query("select sum(invoice_paid_amount) as paid_amount from payment WHERE seller_id ='$user_id' ");
    $data['total_paid'] =$query->result_array();
	$c =$query->result_array();
	foreach($c as $invoice_paid){ $paid=$invoice_paid['paid_amount'];}
    $query =$this->db->query("select sum(Total_amount) as pending_amount from invoice WHERE seller_id ='$user_id' and status='Pending'");
    $data['total_pending'] =$query->result_array();
    $query =$this->db->query("select sum(Total_amount) as canceled_amount from invoice WHERE seller_id ='$user_id' and status='canceled'");
    $data['total_canceled'] =$query->result_array();
		
    }
     $this->load->view('admin_seller/sales_report',$data);
    }else{ redirect('user_ctrl/login','refresh');}
}



public function sales_person_report()
{
    if($this->session->userdata('logged_in')){
        $session_data = $this->session->userdata('logged_in');
        $data['user_email'] = $session_data['user_email'];
        $data['user_id'] = $session_data['user_id'];
        $data['records4'] = $this->profile_model->company_profile($data['user_id']);
        $this->load->view('admin_seller/sales_person_report',$data);
    }else{ redirect('user_ctrl/login','refresh');}
	
}



public function customer_sales_report()
{     $filter_chart = $_GET['chart_filter'];
      $customer_company_name = $_GET['customer_company_name'];
    if($this->session->userdata('logged_in')){
        $session_data = $this->session->userdata('logged_in');
        $data['user_email'] = $session_data['user_email'];
        $data['user_id'] = $session_data['user_id'];
		extract($data);
		$abc = (array)json_decode($filter_chart);
		$start_date = $abc['start'];
        $end_date = $abc['end'];
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$query = $this->db->query("select * from customers where seller_id='$user_id' and customer_id='$customer_company_name'");
		$data['customer_records'] = $query->result_array();
        $data['records4'] = $this->profile_model->company_profile($data['user_id']);
		$data['list_customer'] = $this->product_model->list_customer_model($data['user_id']);
	if($start_date && $end_date && $customer_company_name){
    $query =$this->db->query("select invoice.id,invoice.invoice_no,invoice.invoice_date,customers.customer_company,invoice.Total_amount,invoice.status,invoice.sales_person from invoice left join customers on invoice.customer_id=customers.customer_id WHERE invoice.seller_id = '$user_id' and on_date >= DATE('$start_date 00:00:00') AND on_date <= DATE('$end_date 00:00:00') and invoice.customer_id='$customer_company_name' order by id desc");
    $data['records'] =$query->result_array();
	$b =$query->result_array();
	
	$query =$this->db->query("select sum(Total_amount) as total_amount from invoice left join customers on invoice.customer_id=customers.customer_id WHERE invoice.seller_id = '$user_id' and on_date >= DATE('$start_date 00:00:00') AND on_date <= DATE('$end_date 00:00:00') and invoice.customer_id='$customer_company_name'");
    $data['total_sales'] =$query->result_array();
    
	foreach($b as $invoice_id){ $invoice=$invoice_id['id'];}
	
	$query =$this->db->query("select sum(invoice_paid_amount) as paid_amount from payment WHERE seller_id ='$user_id' and invoice_id='$invoice' and customer_id='$customer_company_name' ");
    $data['total_paid'] =$query->result_array();
	
	$query =$this->db->query("select sum(Total_amount) as pending_amount from invoice WHERE seller_id ='$user_id' and status='Pending' and on_date >= DATE('$start_date 00:00:00') AND on_date <= DATE('$end_date 00:00:00') and customer_id='$customer_company_name'");
    $data['total_pending'] =$query->result_array();
	
	$query =$this->db->query("select sum(Total_amount) as canceled_amount from invoice WHERE seller_id ='$user_id' and status='canceled' and on_date >= DATE('$start_date 00:00:00') AND on_date <= DATE('$end_date 00:00:00') and customer_id='$customer_company_name' ");
    $data['total_canceled'] =$query->result_array();
    }else{
    $query =$this->db->query("select * from invoice left join customers on invoice.customer_id=customers.customer_id WHERE invoice.seller_id = '$user_id' and YEAR(`on_date`) = YEAR(CURDATE()) order by id desc");
    $data['records'] =$query->result_array();
	$ab =$query->result_array();
    $query =$this->db->query("select sum(Total_amount) as total_amount from invoice left join customers on invoice.customer_id=customers.customer_id WHERE invoice.seller_id = '$user_id'");
    $data['total_sales'] =$query->result_array();
    $query =$this->db->query("select sum(invoice_paid_amount) as paid_amount from payment WHERE seller_id ='$user_id' ");
    $data['total_paid'] =$query->result_array();
	$c =$query->result_array();
	foreach($c as $invoice_paid){ $paid=$invoice_paid['paid_amount'];}
    $query =$this->db->query("select sum(Total_amount) as pending_amount from invoice WHERE seller_id ='$user_id' and status='Pending'");
    $data['total_pending'] =$query->result_array();
    $query =$this->db->query("select sum(Total_amount) as canceled_amount from invoice WHERE seller_id ='$user_id' and status='canceled'");
    $data['total_canceled'] =$query->result_array();
		
    }
        $this->load->view('admin_seller/customer_Sales_report',$data);
    }else{ redirect('user_ctrl/login','refresh');}
	
}



function order_mail(){
    if($this->session->userdata('logged_in')){
        $session_data = $this->session->userdata('logged_in');
        $data['user_email'] = $session_data['user_email'];
        $data['user_id'] = $session_data['user_id'];
        $data['records4'] = $this->profile_model->company_profile($data['user_id']);
         $order_user_email = 'support@morelifelondon.com';
    $email_data=array(
    'email_to' =>$order_user_email,
    'email_from' =>'FinacBooks <postmaster@finacbooks.com>',
    'email_reply' =>'info@finacbooks.com',
    'email_subject' =>'Order Sheet',
    'email_body' =>'Dear User'
    );
    $this->sent_order($email_data);
    }else{ redirect('user_ctrl/login','refresh');}
}


public function sent_order($email_data){
$config = array();
                $config['api_key'] = "key-8d87a9e13ae46f1a857ed46bc4d34e2e";
                $config['api_url'] = "https://api.mailgun.net/v3/mg.finacbooks.com/messages";
                $message = array();
                $message['from'] =$email_data['email_from'];
                $message['to'] = $email_data['email_to'];
                $message['h:Reply-To'] =$email_data['email_reply'];
                $message['subject'] = $email_data['email_subject'];
                $body = $this->load->view('admin_seller/view_invoice');
               //$message['html'] = file_get_contents($body);
                $message['html'] = '';
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $config['api_url']);
                curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                curl_setopt($ch, CURLOPT_USERPWD, "api:{$config['api_key']}");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS,$message);
                $result = curl_exec($ch);
                curl_close($ch);
                redirect('manageOrder');

}


function load_sales_person($person){
	$searchTerm = $_GET['person'];
    if($this->session->userdata('logged_in')){
        $session_data = $this->session->userdata('logged_in');
        $data['user_email'] = $session_data['user_email'];
        $data['user_id'] = $session_data['user_id'];
        $data['records4'] = $this->profile_model->company_profile($data['user_id']);
		$this->db->order_by('id','DESC');
		$this->db->like("sales_person",$searchTerm);
		$this->db->where("seller_id",161);
		$query= $this->db->get('invoice');
		 if($query->num_rows() > 0){
      foreach ($query->result_array() as $row){
        $row_set[] = htmlentities(stripslashes($row['sales_person'])); //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
    }else{ redirect('user_ctrl/login','refresh');}
}




function list_users(){
    if($this->session->userdata('logged_in')){
        $session_data = $this->session->userdata('logged_in');
        $data['user_email'] = $session_data['user_email'];
        $data['user_id'] = $session_data['user_id'];
        $data['records4'] = $this->profile_model->company_profile($data['user_id']);
        $this->load->view('admin_seller/list_users',$data);
    }else{ redirect('user_ctrl/login','refresh');}
}


function error(){
    $session_data = $this->session->userdata('logged_in');
    $data['user_email'] = $session_data['user_email'];
    $data['user_id'] = $session_data['user_id'];
    $data['records4'] = $this->profile_model->company_profile($data['user_id']);
    $this->load->view('admin_seller/error',$data);
}

function items(){
    $session_data = $this->session->userdata('logged_in');
    $data['user_email'] = $session_data['user_email'];
    $data['user_id'] = $session_data['user_id'];
    $data['items'] = $this->product_model->item_list($data['user_id']);
    $data['records4'] = $this->profile_model->company_profile($data['user_id']);
    $this->load->view('admin_seller/items',$data);
}


public function update_item(){
  if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');
    $data['user_id'] = $session_data['user_id'];
    $data['user_email'] = $session_data['user_email'];
    //$data['records4'] = $this->profile_model->company_profile($data['user_id']);
    $id=$this->input->post('uid');
    $data = array(
       'item_name'=> $this->input->post('item_name')
       );
  $this->db->where('id',$id);
  $this->db->update('item_list',$data);
 // redirect('seller/items?message=1');
$url = 'seller/items?message=1';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
  }else{
   redirect('user_ctrl/login', 'refresh');
  }
}


public function delete_item($id){
  if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');
    $data['user_id'] = $session_data['user_id'];
    $data['user_email'] = $session_data['user_email'];
    $data['records4'] = $this->profile_model->company_profile($data['user_id']);
    $delete=$this->product_model->delete_item_model($id);
  if($delete == TRUE){
    //redirect('seller/items?customer=deleted');
$url = 'seller/items?customer=deleted';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
}
  }else{
   redirect('user_ctrl/login', 'refresh');
  }
}


public function item_submit(){
    if($this->session->userdata('logged_in')){
   $session_data = $this->session->userdata('logged_in');
   $data['user_email'] = $session_data['user_email'];
   $data['user_number'] = $session_data['user_number'];
   $data['user_id']= $session_data['user_id'];
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('item_name', '', 'required');
    if($this->form_validation->run() == FALSE){
        $this->load->view('admin_seller/items',$data);
}else{
        $item = $this->input->post('item_name');
        $data = array(
       'item_name'=> $this->input->post('item_name'));
    if($this->product_model->add_item_model($data,$item) == TRUE){
       $data['records4'] = $this->profile_model->company_profile($data['user_id']);
       $data['message'] = '<h5 style="text-align:center;">Contact Profile Inserted Successfully <img src="http://localhost/ci_panel/assets/img/valid.png"></h5>';
     //redirect('seller/items?message=success');
$url = 'seller/items?message=success';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
    }
    else{
    //redirect('seller/items?message=already');
$url = 'seller/items?message=already';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
    }
  }
  }else{
       redirect('user_ctrl/login', 'refresh');
  }
}



function veg_items(){
    $session_data = $this->session->userdata('logged_in');
    $data['user_email'] = $session_data['user_email'];
    $data['user_id'] = $session_data['user_id'];
    $data['items'] = $this->product_model->item_veg($data['user_id']);
    $data['records4'] = $this->profile_model->company_profile($data['user_id']);
    $this->load->view('admin_seller/veg_item',$data);
}


public function update_veg_item(){
  if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');
    $data['user_id'] = $session_data['user_id'];
    $data['user_email'] = $session_data['user_email'];
    //$data['records4'] = $this->profile_model->company_profile($data['user_id']);
    $id=$this->input->post('uid');
    $data = array(
       'veg_name'=> $this->input->post('item_name'),
        'veg_ammount'=> $this->input->post('item_ammount')
       );
  $this->db->where('veg_id',$id);
  $this->db->update('item_veg',$data);
  //redirect('seller/veg_items?message=1');
$url = 'seller/veg_items?message=1';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
  }else{
   redirect('user_ctrl/login', 'refresh');
  }
}

  public function delete_veg_item($id){
 if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');
    $data['user_id'] = $session_data['user_id'];
    $data['user_email'] = $session_data['user_email'];
    $data['records4'] = $this->profile_model->company_profile($data['user_id']);
    $delete=$this->product_model->delete_item_veg_model($id);
  if($delete == TRUE){
   // redirect('seller/veg_items?customer=deleted');
$url = 'seller/veg_items?customer=deleted';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
}
  }else{
   redirect('user_ctrl/login', 'refresh');
  }
}

public function item_veg_submit(){
    if($this->session->userdata('logged_in')){
   $session_data = $this->session->userdata('logged_in');
   $data['user_email'] = $session_data['user_email'];
   $data['user_number'] = $session_data['user_number'];
   $data['user_id']= $session_data['user_id'];
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('item_name', '', 'required');
    if($this->form_validation->run() == FALSE){
        $this->load->view('admin_seller/veg_item',$data);
}else{
        $item = $this->input->post('item_name');
        $data = array(
       'veg_name'=> $this->input->post('item_name'),
       'veg_ammount'=> $this->input->post('item_ammount')
       
       );
    if($this->product_model->add_item_veg_model($data,$item) == TRUE){
       $data['records4'] = $this->profile_model->company_profile($data['user_id']);
       $data['message'] = '<h5 style="text-align:center;">Contact Profile Inserted Successfully <img src="http://localhost/ci_panel/assets/img/valid.png"></h5>';
     //redirect('seller/veg_items?message=success');
$url = 'seller/veg_items?message=success';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
    }
    else{
   // redirect('seller/veg_items?message=already');
$url = 'seller/veg_items?message=already';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
    }
  }
  }else{
       redirect('user_ctrl/login', 'refresh');
  }
}


function non_veg_items(){
    $session_data = $this->session->userdata('logged_in');
    $data['user_email'] = $session_data['user_email'];
    $data['user_id'] = $session_data['user_id'];
    $data['items'] = $this->product_model->item_non_veg($data['user_id']);
    $data['records4'] = $this->profile_model->company_profile($data['user_id']);
    $this->load->view('admin_seller/non_veg_item',$data);
}


public function update_non_veg_item(){
  if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');
    $data['user_id'] = $session_data['user_id'];
    $data['user_email'] = $session_data['user_email'];
    //$data['records4'] = $this->profile_model->company_profile($data['user_id']);
    $id=$this->input->post('uid');
    $data = array(
       'non_veg_name'=> $this->input->post('item_name'),
        'non_veg_ammount'=> $this->input->post('item_ammount')
       );
  $this->db->where('non_veg_id',$id);
  $this->db->update('item_non_veg',$data);
  //redirect('seller/non_veg_items?message=1');
$url = 'seller/non_veg_items?message=1';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
  }else{
   redirect('user_ctrl/login', 'refresh');
  }
}

  public function delete_non_veg_item($id){
 if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');
    $data['user_id'] = $session_data['user_id'];
    $data['user_email'] = $session_data['user_email'];
    $data['records4'] = $this->profile_model->company_profile($data['user_id']);
    $delete=$this->product_model->delete_item_non_veg_model($id);
  if($delete == TRUE){
    //redirect('seller/non_veg_items?customer=deleted');
$url = 'seller/non_veg_items?customer=deleted';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
}
  }else{
   redirect('user_ctrl/login', 'refresh');
  }
}




public function item_non_veg_submit(){
    if($this->session->userdata('logged_in')){
   $session_data = $this->session->userdata('logged_in');
   $data['user_email'] = $session_data['user_email'];
   $data['user_number'] = $session_data['user_number'];
   $data['user_id']= $session_data['user_id'];
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('item_name', '', 'required');
    if($this->form_validation->run() == FALSE){
        $this->load->view('admin_seller/veg_item',$data);
}else{
        $item = $this->input->post('item_name');
        $data = array(
       'non_veg_name'=> $this->input->post('item_name'),
       'non_veg_ammount'=> $this->input->post('item_ammount')
       );
    if($this->product_model->add_item_non_veg_model($data,$item) == TRUE){
       $data['records4'] = $this->profile_model->company_profile($data['user_id']);
       $data['message'] = '<h5 style="text-align:center;">Contact Profile Inserted Successfully <img src="http://localhost/ci_panel/assets/img/valid.png"></h5>';
     //redirect('seller/non_veg_items?message=success');
$url = 'seller/non_veg_items?message=success';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
    }
    else{
    //redirect('seller/non_veg_items?message=already');
$url = 'seller/non_veg_items?message=already';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
    }
  }
  }else{
       redirect('user_ctrl/login', 'refresh');
  }
}


function drinkitems(){
    $session_data = $this->session->userdata('logged_in');
    $data['user_email'] = $session_data['user_email'];
    $data['user_id'] = $session_data['user_id'];
    $data['drink_items'] = $this->product_model->drink_item_list($data['user_id']);
    $data['records4'] = $this->profile_model->company_profile($data['user_id']);
    $this->load->view('admin_seller/drink_items',$data);
}


public function update_drinkitem(){
  if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');
    $data['user_id'] = $session_data['user_id'];
    $data['user_email'] = $session_data['user_email'];
    //$data['records4'] = $this->profile_model->company_profile($data['user_id']);
    $id=$this->input->post('uid');
    $data = array(
       'item_name'=> $this->input->post('item_name')
       );
  $this->db->where('id',$id);
  $this->db->update('drink_item_list',$data);
 // redirect('seller/items?message=1');
$url = 'seller/drinkitems?message=1';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
  }else{
   redirect('user_ctrl/login', 'refresh');
  }
}


public function delete_drinkitem($id){
  if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');
    $data['user_id'] = $session_data['user_id'];
    $data['user_email'] = $session_data['user_email'];
    $data['records4'] = $this->profile_model->company_profile($data['user_id']);
    $delete=$this->product_model->delete_drinkitem_model($id);
  if($delete == TRUE){
    //redirect('seller/drinkitems?customer=deleted');
$url = 'seller/items?customer=deleted';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
}
  }else{
   redirect('user_ctrl/login', 'refresh');
  }
}


public function drinkitem_submit(){
    if($this->session->userdata('logged_in')){
   $session_data = $this->session->userdata('logged_in');
   $data['user_email'] = $session_data['user_email'];
   $data['user_number'] = $session_data['user_number'];
   $data['user_id']= $session_data['user_id'];
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('item_name', '', 'required');
    if($this->form_validation->run() == FALSE){
        $this->load->view('admin_seller/items',$data);
}else{
        $item = $this->input->post('item_name');
        $data = array(
       'item_name'=> $this->input->post('item_name'));
    if($this->product_model->add_drinkitem_model($data,$item) == TRUE){
       $data['records4'] = $this->profile_model->company_profile($data['user_id']);
       $data['message'] = '<h5 style="text-align:center;">Contact Profile Inserted Successfully <img src="http://localhost/ci_panel/assets/img/valid.png"></h5>';
     //redirect('drinkitems/drinkitems?message=success');
$url = 'seller/items?message=success';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
    }
    else{
    //redirect('seller/items?message=already');
$url = 'seller/items?message=already';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
    }
  }
  }else{
       redirect('user_ctrl/login', 'refresh');
  }
}


function desertitems(){
    $session_data = $this->session->userdata('logged_in');
    $data['user_email'] = $session_data['user_email'];
    $data['user_id'] = $session_data['user_id'];
    $data['desert_items'] = $this->product_model->desert_item_list($data['user_id']);
    $data['records4'] = $this->profile_model->company_profile($data['user_id']);
    $this->load->view('admin_seller/deserts_items',$data);
}

public function update_desertitem(){
  if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');
    $data['user_id'] = $session_data['user_id'];
    $data['user_email'] = $session_data['user_email'];
    //$data['records4'] = $this->profile_model->company_profile($data['user_id']);
    $id=$this->input->post('uid');
    $data = array(
       'item_name'=> $this->input->post('item_name')
       );
  $this->db->where('id',$id);
  $this->db->update('desserts_item_list',$data);
 // redirect('seller/items?message=1');
$url = 'seller/desertitems?message=1';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
  }else{
   redirect('user_ctrl/login', 'refresh');
  }
}



public function delete_desertitem($id){
  if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');
    $data['user_id'] = $session_data['user_id'];
    $data['user_email'] = $session_data['user_email'];
    $data['records4'] = $this->profile_model->company_profile($data['user_id']);
    $delete=$this->product_model->delete_desertitem_model($id);
  if($delete == TRUE){
    //redirect('seller/desertitems?customer=deleted');
$url = 'seller/items?customer=deleted';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
}
  }else{
   redirect('user_ctrl/login', 'refresh');
  }
}


public function desertitem_submit(){
    if($this->session->userdata('logged_in')){
   $session_data = $this->session->userdata('logged_in');
   $data['user_email'] = $session_data['user_email'];
   $data['user_number'] = $session_data['user_number'];
   $data['user_id']= $session_data['user_id'];
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('item_name', '', 'required');
    if($this->form_validation->run() == FALSE){
        $this->load->view('admin_seller/deserts_items',$data);
}else{
        $item = $this->input->post('item_name');
        $data = array(
       'item_name'=> $this->input->post('item_name'));
    if($this->product_model->add_desertitem_model($data,$item) == TRUE){
       $data['records4'] = $this->profile_model->company_profile($data['user_id']);
       $data['message'] = '<h5 style="text-align:center;">Contact Profile Inserted Successfully <img src="http://localhost/ci_panel/assets/img/valid.png"></h5>';
     //redirect('drinkitems/drinkitems?message=success');
$url = 'seller/desertitems?message=success';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
    }
    else{
    //redirect('seller/items?message=already');
$url = 'seller/items?message=already';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
    }
  }
  }else{
       redirect('user_ctrl/login', 'refresh');
  }
}


}?>