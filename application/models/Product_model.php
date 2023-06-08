<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class product_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->database();
    }

    public function edit_contact_user($isd, $abcd)
    {
        $id = $isd['id'];
        $query = $this->db->query("select * from users where user_id ='$id'");
        $data = $query->result_array();
        return $data;
    }

    public function edit_contact_user_profile($isd, $abcd)
    {
        $id = $isd['id'];
        $query = $this->db->query("select * from company_profile where seller_id ='$id'");
        $data = $query->result_array();
        return $data;
    }

    public function update_contact_model($userdata, $id, $data, $data3)
    {
        $id = $userdata['uid'];


        $query = $this->db->query("select * from company_profile where seller_id ='$id'");
        $data2 = $query->row_array();
        if (empty($data2)) {
            $this->db->insert('company_profile', $data);
        } else {
            $this->db->where('seller_id', $id);
            $this->db->update('company_profile', $data);
        }
        $this->db->set('menu', $data3);
        $this->db->set('roleid', $data3);
        $this->db->where('user_id', $id);
        $this->db->update('users', $data3);
    }


    public function add_user_model_new($data, $menu)
    {

        $email = $this->input->post('user_email');
        $phone = $this->input->post('user_number');

        $query = $this->db->query("SELECT * FROM users WHERE user_email = '$email' AND user_number = '$phone'");
        $queryResult = $query->result_array();
        $foundRows = count($queryResult);
        //echo '<pre>'; print_r($foundRows); echo '<pre>';
        if ($foundRows >= 1) {
            return false;
        } else {
            $this->db->insert('users', $data);
            return TRUE;
        }
    }

    public function user_details()
    {
        return $this->db->query("select * from users order by user_id desc")->result_array();
    }

    public function getorderemailidsdatanew($id)
    {


        return $this->db->query("select * from business where del='0' order by id desc")->result_array();
    }

    public function getlistallemails($id)
    {
        return $this->db->query("select * from business where order_id='{$id}' order by id desc")->result_array();
    }

    public function getorderemailidsdata($id)
    {
        //  return $this->db->query("select * from order_emailid where seller_id='{$id}' order by id desc")->result_array();

        return $this->db->query("select * from business where id='{$id}' and del='0' order by id desc")->row_array();
    }

    public function savebusinessupdate($data, $alldata, $images)
    {
        $insert = array();
        if (isset($alldata['oid'])) {
            $insert['order_id'] = $alldata['oid'];
        } else {
            $insert['order_id'] = 0;
        }
        $insert['pid'] = $alldata['pid'];
        $insert['pidcid'] = $alldata['pidcid'];
        $insert['cid'] = $alldata['cid'];
        $insert['cidcid'] = $alldata['cidcid'];
        $insert['messageid'] = $alldata['messageid'];
        $insert['messages'] = $alldata['message'];
        $insert['type'] = $alldata['quanty'];
        $insert['createddate'] = @date("Y-m-d H:i:s");
        $insert['seller_id'] = $data['user_id'];
        $dddssss = explode('/', $alldata['messageid']);
        if (count($dddssss) > 1) {
            $insert['msgid'] = $dddssss[1];
        }
        $_id = $alldata['pid'];
        $this->db->where('id', $_id);
        $query = $this->db->update('business', $insert);
        return TRUE;
    }

    public function savebusiness($data, $alldata, $images)
    {

        // echo '<pre>'; print_r($data); print_r($alldata); print_r($images);  die;

        $insert = array();
        if (isset($alldata['oid'])) {
            $insert['order_id'] = $alldata['oid'];
        } else {
            $insert['order_id'] = 0;
        }
        $insert['pid'] = $alldata['pid'];
        $insert['pidcid'] = $alldata['pidcid'];
        $insert['cid'] = $alldata['cid'];
        $insert['cidcid'] = $alldata['cidcid'];
        $insert['messageid'] = $alldata['messageid'];
        $insert['messages'] = $alldata['message'];
        $insert['type'] = $alldata['quanty'];
        $insert['createddate'] = @date("Y-m-d H:i:s");
        $insert['seller_id'] = $data['user_id'];
        $dddssss = explode('/', $alldata['messageid']);
        if (count($dddssss) > 1) {
            $insert['msgid'] = $dddssss[1];
        }


        $this->db->insert('business', $insert);
        $businessid = $this->db->insert_id();

        $body = $alldata['message'];
        $counn = $this->db->query("select * from order_emailid where order_id='{$insert['order_id']}'")->row_array();
        if (empty($counn)) {
            $ooo = array();
            $ooo['order_id'] = $insert['order_id'];
            $ooo['seller_id'] = $data['user_id'];
            $this->db->insert('order_emailid', $ooo);
        }

        $upnameimage = array();

        if (isset($images['filename']['name']) && !empty($images['filename']['name'])) {
            $_FILES['filename']['name'] = $images['filename']['name'];
            $_FILES['filename']['type'] = $images['filename']['type'];
            $_FILES['filename']['tmp_name'] = $images['filename']['tmp_name'];
            $_FILES['filename']['error'] = $images['filename']['error'];
            $_FILES['filename']['size'] = $images['filename']['size'];

            $name = $_FILES['filename']['name'];
            $type = $_FILES['filename']['type'];
            $tmp_name = $_FILES['filename']['tmp_name'];
            $error = $_FILES['filename']['error'];
            $size = $_FILES['filename']['size'];
            $exp = explode('.', $name);
            $image = end($exp);
            $imageName = '';
            if ($error == 0) {
                $ran = $this->generateRandomString(5);
//                $imageName = $ran . time() . $i . "." . $image;
                // echo '/httpdocs/usermanagement/uploads/orders/'.$imageName; echo '<br>';
                //  echo $tmp_name;
                if (move_uploaded_file($tmp_name, "images/" . $name)) {
                    $upnameimage['filename'] = $name;
                }
            }
        }
        if (!empty($upnameimage)) {
            $this->db->where('id', $businessid);
            $query = $this->db->update('business', $upnameimage);
        }

        /*
        $insert['type']="adasdasd";
     if($insert['type']=="send") {
                     $subject="Order Info ".$data['order_name'];
                     $eol = PHP_EOL;
                     $separator = md5(time());
                     $adminmeail="Risusventures@support.com";
                     ///////////HEADERS INFORMATION////////////
                     // main header (multipart mandatory) message
                     $headers = "From: Risusventures. <" .$adminmeail. ">" . $eol;

                      $invites=explode(",",$alldata['email']);
                      $fisrt=$invites[0];
                      unset($invites[0]);
                     foreach($invites as $ss){
                         $ss=trim($ss);
                         $headers.= "Bcc: ". $ss."".$eol;
                     }
                     $headers .= "MIME-Version: 1.0" . $eol;
                     $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol . $eol;
                     $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
                     $headers .= "This is a MIME encoded message." . $eol . $eol;

                     // message
                     $headers .= "--" . $separator . $eol;
                     $headers .= "Content-Type: text/html; charset=\"UTF-8\"" . $eol;
                     $headers .= "Content-Transfer-Encoding: 8bit" . $eol . $eol;
                     $headers .= $eol . $eol;



                    $eee= @mail($fisrt,$subject,$body,$headers);


     }*/


        return TRUE;
    }

    public function getorderhtml($orderid, $action)
    {

        $orderdetail = $this->edit_order_model_manual($orderid);

        if (!empty($orderdetail['order'])) {


            $orderdata = $orderdetail['order'];

            $html = "";
            $html .= "<h2>Order Details</h2>";
            $html .= " <div class='form-controls'><label>Subtotal: </label>  {$orderdata['sub_total']} </div>";
            $html .= " <div class='form-controls'><label>Commssion: </label>  {$orderdata['commssion']} </div>";
            $html .= " <div class='form-controls'><label>Total: </label>  {$orderdata['total']} </div>";


            $pid = $orderdetail['order']['pid'];
            $cid = $orderdetail['order']['cid'];
            $customers_contacts = $orderdetail['order']['customers_contacts'];


            $customers_contacts = explode(',', $customers_contacts);
            $customers_contacts = array_filter($customers_contacts);


            $PrincipalData = $this->db->query("select * from Principal where Principal_id='$pid' ")->row_array();
            $CustomersData = $this->db->query("select * from customers where customer_id='$cid' ")->row_array();
            if (!empty($customers_contacts)) {
                $customers_contacts = implode(',', $customers_contacts);
                $Customers_contactsData = $this->db->query("select * from customers_contacts where id in ($customers_contacts) ")->result_array();
            } else {

            }

            $html .= "<input type='hidden' id='oid' name='oid' value='{$orderdata['id']}'/>";
            $html .= "<h2>Principal Details</h2>";
            $html .= "<div class='col-md-12 row'> <div class='form-controls'><label>Principal Name: </label><div class='form-controls'>{$PrincipalData['Principal_person']}</div></div> </div> <br>";
            $html .= "<div class='col-md-12 row'> <div class='form-controls'><label>Customers Name: </label><div class='form-controls'>{$CustomersData['customer_person']}</div></div> </div> ";
            $html .= "<div class='col-md-12 row'> <div class='form-controls'><label>Customer Contacts: </label> </div> ";

            if (!empty($Customers_contactsData)) {
                $kkk = 1;
                foreach ($Customers_contactsData as $ccc) {
                    $html .= " <div class='form-controls'>$kkk ) <label>Email: </label>  {$ccc['email']} </div>";

                    $kkk++;
                }
            }


        } else {
            $html .= " <div class='form-controls'>Order not found</div>";
        }
        return $html;
    }

    public function addproduct_model($data)
    {
        $this->db->insert('add_products', $data);
        return TRUE;
    }

    public function view_product_model($id)
    {
        $query = $this->db->query("select * from add_products INNER JOIN category ON add_products.product_group=category.ci_id where id='$id'");
        return $query;
    }

    public function delete_product_id($id)
    {
        if ($sql = $this->db->query("delete from add_products where id='$id'")) {
            return true;
        }
    }

    public function edit_product_model($id)
    {
        $query = $this->db->query("select * from add_products where id='$id'");
        return $query;
    }

    public function update_product_model($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('add_products', $data);
    }

    public function customers_principal_assigned($cid)
    {
        $data = $this->db->query("select * from customers_principal_assigned where cid='$cid' ");

        $query = $data->result_array();
        return $query;
    }

    public function show_category_model($user_id)
    {
        $query = $this->db->query("select * from category  ");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function manageproduct_model($id)
    {
        $session_data = $this->session->userdata('logged_in');
        $data['user_id'] = $session_data['user_id'];
        extract($data);
        if ($id == NULL) {
            $data = $this->db->query("select * from add_products  ");
//$query = $this->db->query("select * from add_products");
            $query = $data->result_array();
            return $query;
        } else {
            $data = $this->db->query("select * from add_products where product_group='" . $id . "'");
            $query = $data->result_array();
            return $query;
        }
    }

    public function category_product($id)
    {
        $query = $this->db->query("select * from category where seller_id='$id' ");
        $data = $query->result_array();
        return $data;
    }

    public function bussiness_model($data)
    {
        $this->db->insert('bussiness_profile', $data);
        return TRUE;
    }

    public function about_model($data)
    {
        $this->db->insert('about_profile', $data);
        return TRUE;
    }

    public function managecategory_model($user_id)
    {
        // $sql=$this->db->get("category");
        $sql = $this->db->query("select * from category   order by ci_id DESC  ");
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function delete_category_model($id)
    {
        //$this->db->where('ci_id',$id);
        //$sql = $this->db->delete('category');
        if ($this->db->delete('category', array('ci_id' => $id)) && $this->db->delete('add_products', array('product_group' => $id))) {
            return true;
        }
    }

    public function edit_category_id($id)
    {
        $query = $this->db->query("select * from category where ci_id='$id'");
        $data = $query->result_array();
        return $data;
    }

    public function update_category_model($id, $data)
    {
        $this->db->where('ci_id', $id);
        $this->db->update('category', $data);
    }


    /*public function insert_file_csv($records){
    $data=$this->db->insert('order_sheet',$records);
    return true;
    }*/
    public function insert_file_csv($data)
    {
        if ($data['productName']) {
            $m_id = $data['seller_id'];
            foreach ($data["productName"] as $d) {
                $content[] = array(
                    'productName' => $d['productName'],
                    'seller_id' => $m_id
                );
            }
            if ($this->db->insert_batch('order_sheet', $content)) {
                return TRUE;
            }
        } else {
            return false;
        }
    }


    public function order_model($user_id)
    {
        $query = $this->db->query("select * from order_sheet ");
        $data = $query->result_array();
        return $data;
    }

    public function add_order_model($data2)
    {
        $query2 = $this->db->insert('invoice', $data2);
        return true;
    }

    /*
    public function list_order_model($user_id){
    $query = $this->db->query("select * from invoice left join customers on invoice.customer_id=customers.customer_id where invoice.seller_id='$user_id' order by id desc ");
    $data = $query->result_array();
    return $data;
    }*/

    public function payment_view($user_id)
    {
        $query = $this->db->query("select * from payment ");
        $data = $query->result_array();
        return $data;
    }

    public function add_payment_model($data)
    {
        extract($data);
        $invoice_id = $invoice_id;
        $payment = $this->db->query("select sum(invoice_paid_amount) as total_payment from payment where invoice_id='$invoice_id'");
        $result_payment = $payment->result_array();
        $total_amount = $this->db->query("select sum(Total_amount) as total_amount from invoice where id='$invoice_id'");
        $result_total_amount = $total_amount->result_array();
        if (($result_total_amount[0]['total_amount'] == $result_payment[0]['total_payment']) || ($result_total_amount[0]['total_amount'] > $result_payment[0])) {
            return false;
        } else {
            $query = $this->db->insert('payment', $data);
            return true;
        }


    }


    public function print_payment_model($id)
    {
        $query = $this->db->query("select * from invoice left join payment on invoice.id=payment.invoice_id  left join customers on customers.customer_id=invoice.customer_id where payment_id='$id' ");
        $data = $query->result_array();
        return $data;
    }


    public function company_profile_order($user_id)
    {
        $query = $this->db->query("select * from company_profile ");
        $data = $query->result_array();
        return $data;
    }

    public function view_invoice_model($id)
    {
        /*$sql= "select * from invoice left join order_sheet on order_sheet.invoice_no=invoice.invoice_no
         left join customers on customers.customer_id=invoice.customer_id
         left join payment on payment.invoice_id=invoice.id
         where id='$id'";*/

        $sql = "select invoice.event_venue,invoice.event_time,invoice.num_guest,invoice.party_date,customers.customer_id,customers.customer_person,invoice.id,invoice.sales_person,invoice.status,invoice.note,invoice.invoice_no,invoice.tax,invoice.tax_amount,invoice.invoice_date,invoice.party_date,invoice.sub_total,invoice.Total_amount,invoice.veg_item,invoice.non_veg_item,customers.customer_company,customers.customer_address,customers.customer_phone,customers.customer_email,order_sheet.productName,order_sheet.quantity,order_sheet.buyPrice,order_sheet.amount,order_sheet.filter,invoice.packing_forwarding from invoice left join order_sheet on order_sheet.invoice_no=invoice.invoice_no
 left join customers on customers.customer_id=invoice.customer_id
 where id='$id'";
        $query = $this->db->query($sql);
        $data = $query->result_array();
        return $data;
    }

    public function invoice_veg($id)
    {
        $query = $this->db->query("select * from invoice where id='$id' ");
        $data = $query->result_array();
        return $data;
    }


    public function delete_invoice_model($id)
    {

        if ($query = $this->db->query("delete from order_sheet where invoice_no='$id'") && $query = $this->db->query("delete from invoice where invoice_no='$id'")) {
            return true;
        }

    }

    public function invoice_paid_model($id)
    {
        $sql = "select invoice_paid_amount from payment where invoice_id='$id'";
        $query = $this->db->query($sql);
        $data = $query->result_array();
        return $data;
    }


    public function profile($seller_id)
    {
        $query = $this->db->query("select * from company_profile where seller_id='$seller_id'  order by cp_id DESC limit 1");
        $data = $query->result_array();
        return $data;
    }

    public function customer_profile($id)
    {
        $query = $this->db->query("select * from customers where customer_id='$id'");
        $data = $query->result_array();
        return $data;
    }

    public function customer_product_profile($id)
    {
        $query = $this->db->query("select * from orders where id='$id'");
        $data = $query->result_array();
        return $data;
    }


    public function delete_payment_model($id)
    {
        if ($sql = $this->db->query("delete from payment where payment_id='$id'")) {
            return true;
        }
    }

    public function getProduct($page)
    {
        $offset = 6 * $page;
        $limit = 6;
        $sql = "select * from add_products where seller_id='151' limit $offset ,$limit";
        $result = $this->db->query($sql)->result();
        return $result;
    }


    public function update_customer_order_new($data, $alldata, $images)
    {


        $acceptmoney = '0';
        if (isset($alldata['acceptmoney'])) {
            $acceptmoney = $alldata['acceptmoney'];
	}
        $folder = getcwd() . "/alldata";

        $image_prefix = "alldata";

        $q1 = "select Principal_person from Principal where Principal_id ='{$alldata['principal_id']}'";
        $query = $this->db->query($q1);
        $pppppdata = $query->row_array();
        if (!empty($pppppdata)) {
            $folder .= "/A " . $alldata['principal_id'] . " " . addslashes($pppppdata['Principal_person']);
            $image_prefix .= "/A " . $alldata['principal_id'] . " " . addslashes($pppppdata['Principal_person']);
        }

        $yearsss = date("Y", strtotime($alldata['orderdate']));
        $folder .= "/" . $yearsss;
        $image_prefix .= "/" . $yearsss;

        $q1 = "select * from customers where customer_id ='{$alldata['customers_principal_assigned']}'";
        $query = $this->db->query($q1);
        $customersdata = $query->row_array();
        if (!empty($customersdata)) {
            $folder .= "/" . addslashes($customersdata['customer_person']);
            $image_prefix .= "/" . addslashes($customersdata['customer_person']);
        }
        $folder .= "/Db " . date("Y-m");
        $image_prefix .= "/Db " . date("Y-m");
        //echo '<pre>'; print_r($folder); echo '</pre>';

        mkdir($folder, 0777, true);


        unset($data['seller_id']);

        $customers_contacts = $alldata['customers_contacts'];
		
		if(is_array($customers_contacts))
		{
		$customers_contacts = "," . implode(',', $customers_contacts) . ",";
		}
		else if (is_string($customers_contacts))
		{
		$customers_contacts = implode(' ', (array)$customers_contacts);
		}
		
		
        $data['customers_contacts'] = $customers_contacts;

        $orderId = $alldata['orderid'];
        $this->db->where('id', $orderId);
        $data['total'] = $data['discunt'] = $data['sub_total'] = 0;


        $data['payment_term'] = $alldata['payment_term'];
        $data['po_number'] = $alldata['po_number'];
        $data['destination'] = $alldata['destination'];
        $data['acceptmoney'] = $acceptmoney;
		$data['paymentexpecteddate'] = $alldata['paymentexpecteddate'];
        $query = $this->db->update('orders', $data);


        $this->db->query("delete from orders_products where order_id='$orderId'");


        $usd_sum = $eur_sum = 0;
        $total_subtotal = 0;
        $total_commssion = 0;
        if (isset($alldata['selectedproducts']) && !empty($alldata['selectedproducts'])) {
            foreach ($alldata['selectedproducts'] as $productid => $val) {
                if (isset($alldata['commission'][$productid])) {
                    $commission = $alldata['commission'][$productid];
                } else {
                    $commission = 0;
                }

                $name = $alldata['name'][$productid];
                $price = $alldata['price'][$productid];
                $cunt = $alldata['cunt'][$productid];
                $currency = $alldata['currency'][$productid];
                $subprice = $alldata['subprice'][$productid];
                $po = $alldata['po'][$productid];
                // $subprice=$price*$cunt;
                $total_subtotal = $total_subtotal + $subprice;
                $total_commssion = $total_commssion + $commission;

                if ($currency == "usd") {
                    $usd_sum = $usd_sum + $subprice;
                } else if ($currency == "eur") {
                    $eur_sum = $eur_sum + $subprice;
                }


                $single_person = array();
                $single_person['order_id'] = $orderId;
                $single_person['product_id'] = $productid;
                $single_person['p_quntity'] = $cunt;
                $single_person['p_name'] = $name;
                $single_person['p_price'] = $price;
                $single_person['p_subtotal'] = $subprice;
                $single_person['p_commision'] = $commission;
                $single_person['po'] = $po;
                $single_person['currency'] = $currency;
                $single_person['orderdate'] = $data['orderdate'];
				$single_person['paymentexpecteddate'] = $data['paymentexpecteddate'];
                $single_person['created_date'] = date("Y-m-d H:i:s");
                $query = $this->db->insert('orders_products', $single_person);

            }
        }
        $newdata = array();
        $newdata['total'] = $total_subtotal;
        $newdata['sub_total'] = $total_subtotal;
        $newdata['totalusd'] = $usd_sum;
        $newdata['totaleur'] = $eur_sum;
        $newdata['commssion'] = $total_commssion;

        $this->db->where('id', $orderId);
        $query = $this->db->update('orders', $newdata);


        $dataInfo = array();
        $files = $images;
        $cpt = count($images['attachments']['name']);
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES['attachments']['name'] = $files['attachments']['name'][$i];
            $_FILES['attachments']['type'] = $files['attachments']['type'][$i];
            $_FILES['attachments']['tmp_name'] = $files['attachments']['tmp_name'][$i];
            $_FILES['attachments']['error'] = $files['attachments']['error'][$i];
            $_FILES['attachments']['size'] = $files['attachments']['size'][$i];


            $name = date("Y-m-d_H:i:s__") . $_FILES['attachments']['name'];
            $type = $_FILES['attachments']['type'];
            $tmp_name = $_FILES['attachments']['tmp_name'];
            $error = $_FILES['attachments']['error'];
            $size = $_FILES['attachments']['size'];


            $exp = explode('.', $name);
            $image = end($exp);
            $imageName = '';
            if ($error == 0) {
//                $ran=$this->generateRandomString(5);
//                $imageName=$ran.time().$i.".".$image;
                $imageName = $name;
                // echo '/httpdocs/usermanagement/uploads/orders/'.$imageName; echo '<br>';
                //  echo $tmp_name;
		if (move_uploaded_file($tmp_name, "$folder/" . $imageName)) {
			// echo '<script>console.log(file moved Arvind - "'.$imageName.'")</script>';
                    $dataInfo[] = $image_prefix . "/" . $imageName;
                }
            }

        }
        if (!empty($dataInfo)) {
            foreach ($dataInfo as $image) {
                $i = array();
                $i['order_id'] = $orderId;
                $i['name'] = $image;
                $this->db->insert('orders_images', $i);
            }
        }


        return true;
    }

    private function set_upload_options()
    {
        //upload an image options
        $config = array();
        $config['upload_path'] = './uploads/orders/';
        $config['allowed_types'] = 'gif|jpg|png|PNG|JPG|jpeg|JPEG|GIF';
        $config['max_size'] = '0';
        $config['overwrite'] = FALSE;

        return $config;
    }

    public function add_customer_order_new($data, $alldata, $images)
    {

        $acceptmoney = '0';
        if (isset($alldata['acceptmoney'])) {
            $acceptmoney = $alldata['acceptmoney'];
        }

        $folder = getcwd() . "/alldata";
        $image_prefix = "alldata";
        $q1 = "select Principal_person from Principal where Principal_id ='{$alldata['principal_id']}'";
        $query = $this->db->query($q1);
        $pppppdata = $query->row_array();
        if (!empty($pppppdata)) {
            $folder .= "/A " . $alldata['principal_id'] . " " . addslashes($pppppdata['Principal_person']);
            $image_prefix .= "/A " . $alldata['principal_id'] . " " . addslashes($pppppdata['Principal_person']);
        }

        $yearsss = date("Y", strtotime($alldata['orderdate']));
        $folder .= "/" . $yearsss;
        $image_prefix .= "/" . $yearsss;

        $q1 = "select * from customers where customer_id ='{$alldata['customers_principal_assigned']}'";
        $query = $this->db->query($q1);
        $customersdata = $query->row_array();
        if (!empty($customersdata)) {
            $folder .= "/" . addslashes($customersdata['customer_person']);

            $image_prefix .= "/" . addslashes($customersdata['customer_person']);
        }
        $folder .= "/Db " . date("Y-m");
        $image_prefix .= "/Db " . date("Y-m");


        mkdir($folder, 0777, true);


        $customers_contacts = $alldata['customers_contacts'];
		
		if(is_array($customers_contacts))
		{
		$customers_contacts = "," . implode(',', $customers_contacts) . ",";
		}
		else if (is_string($customers_contacts))
		{
		$customers_contacts = implode(' ', (array)$customers_contacts);
		}
		
        
        $data['customers_contacts'] = $customers_contacts;
        $data['total'] = $data['discunt'] = $data['sub_total'] = 0;

        $data['datecretaed'] = $alldata['datecretaed'];
        $data['payment_term'] = $alldata['payment_term'];
        $data['po_number'] = $alldata['po_number'];
        $data['destination'] = $alldata['destination'];
        $data['acceptmoney'] = $acceptmoney;
		$data['paymentexpecteddate'] = $alldata['paymentexpecteddate'];

        $query = $this->db->insert('orders', $data);
        $orderId = $this->db->insert_id();

        $usd_sum = $eur_sum = 0;

        $total_subtotal = 0;
        $total_commssion = 0;
        if (isset($alldata['selectedproducts']) && !empty($alldata['selectedproducts'])) {
            foreach ($alldata['selectedproducts'] as $productid => $val) {
                if (isset($alldata['commission'][$productid])) {
                    $commission = $alldata['commission'][$productid];
                } else {
                    $commission = 0;
                }

                $name = $alldata['name'][$productid];
                $price = $alldata['price'][$productid];
                $cunt = $alldata['cunt'][$productid];
                $currency = $alldata['currency'][$productid];
                $subprice = $alldata['subprice'][$productid];
                $po = $alldata['po'][$productid];


                // $subprice=$price*$cunt;

                $total_subtotal = $total_subtotal + $subprice;
                $total_commssion = $total_commssion + $commission;

                if ($currency == "usd") {
                    $usd_sum = $usd_sum + $subprice;
                } else if ($currency == "eur") {
                    $eur_sum = $eur_sum + $subprice;
                }


                $single_person = array();
                $single_person['order_id'] = $orderId;
                $single_person['product_id'] = $productid;
                $single_person['p_quntity'] = $cunt;
                $single_person['p_name'] = $name;
                $single_person['p_price'] = $price;
                $single_person['p_subtotal'] = $subprice;
                $single_person['p_commision'] = $commission;
                $single_person['po'] = $po;
                $single_person['currency'] = $currency;
                $single_person['orderdate'] = $data['orderdate'];
				$single_person['paymentexpecteddate'] = $data['paymentexpecteddate'];
                $single_person['created_date'] = date("Y-m-d H:i:s");
                $query = $this->db->insert('orders_products', $single_person);

            }
        }
        $newdata = array();
        $newdata['total'] = $total_subtotal;
        $newdata['sub_total'] = $total_subtotal;
        $newdata['totalusd'] = $usd_sum;
        $newdata['totaleur'] = $eur_sum;
        $newdata['commssion'] = $total_commssion;

        $this->db->where('id', $orderId);
        $query = $this->db->update('orders', $newdata);


        $dataInfo = array();
        $files = $images;
        $cpt = count($images['attachments']['name']);
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES['attachments']['name'] = $files['attachments']['name'][$i];
            $_FILES['attachments']['type'] = $files['attachments']['type'][$i];
            $_FILES['attachments']['tmp_name'] = $files['attachments']['tmp_name'][$i];
            $_FILES['attachments']['error'] = $files['attachments']['error'][$i];
            $_FILES['attachments']['size'] = $files['attachments']['size'][$i];


            $name = $_FILES['attachments']['name'];
            $type = $_FILES['attachments']['type'];
            $tmp_name = $_FILES['attachments']['tmp_name'];
            $error = $_FILES['attachments']['error'];
            $size = $_FILES['attachments']['size'];


            $exp = explode('.', $name);
            $image = end($exp);
            $imageName = '';
            if ($error == 0) {
                $ran = $this->generateRandomString(10);
//                $imageName=$ran.time().$i.".".$image;
                $imageName = date("Y-m-d_H:i:s__") . $name;
                // echo '/httpdocs/usermanagement/uploads/orders/'.$imageName; echo '<br>';
                //  echo $tmp_name;
                echo $imageName;
                if (move_uploaded_file($tmp_name, "$folder/" . $imageName)) {
                    //$dataInfo[]=$imageName;
                    $dataInfo[] = $image_prefix . "/" . $imageName;
                }
            }

        }
        if (!empty($dataInfo)) {
            foreach ($dataInfo as $image) {
                $i = array();
                $i['order_id'] = $orderId;
                $i['name'] = $image;
                $this->db->insert('orders_images', $i);
            }
        }

        return true;
    }

    public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function add_principal_model_new($data, $alldata)
    {

        if (isset($alldata['contactper'])) {
            $contactper_all = $alldata['contactper'];
        } else {
            $contactper_all = array();
        }

        if (isset($alldata['products'])) {
            $products_all = $alldata['products'];
        } else {
            $products_all = array();
        }


        $query = $this->db->insert('Principal', $data);
        $pid = $this->db->insert_id();
        if (!empty($contactper_all)) {
            for ($kk = 0; $kk < count($contactper_all['contactper']); $kk++) {
                $name = $contactper_all['contactper'][$kk];
                $email = $contactper_all['email'][$kk];
                if (!empty($name) && !empty($email)) {
                    $single_person = array();
                    $single_person['pid'] = $pid;
                    $single_person['name'] = $name;
                    $single_person['email'] = $email;
                    $single_person['created_date'] = date("Y-m-d H:i:s");
                    $query = $this->db->insert('principal_contacts', $single_person);
                }
            }
        }


        if (!empty($products_all)) {
            for ($kk = 0; $kk < count($products_all['name']); $kk++) {
                $name = $products_all['name'][$kk];
                $price = $products_all['price'][$kk];
                if (!empty($name)) {
                    $single_person = array();
                    $single_person['pid'] = $pid;
                    $single_person['product_name'] = $name;
                    $single_person['product_price'] = $price;
                    $single_person['created_date'] = date("Y-m-d H:i:s");
                    $query = $this->db->insert('principal_products', $single_person);
                }
            }
        }
        return true;
    }


    public function add_principal_model($data)
    {

        $email = $data['Principal_email'];
        $phone = $data['Principal_phone'];
        $query = $this->db->query("SELECT * FROM Principal WHERE Principal_email = '$email' AND Principal_phone= '$phone' ");
        $queryResult = $query->result_array();
        $foundRows = count($queryResult);
        if ($foundRows >= 1) {
            return false;
        } else {
            $query = $this->db->insert('Principal', $data);
            return true;
        }
    }


    public function add_customer_model_new($data, $alldata)
    {
//$query = $this->db->insert('customers',$data);
//return true;

        $data['customer_state'] = $alldata['customer_state'];
        if (isset($alldata['contactper'])) {
            $contactper_all = $alldata['contactper'];
        } else {
            $contactper_all = array();
        }


        $query = $this->db->insert('customers', $data);
        $cid = $this->db->insert_id();
        if (!empty($contactper_all)) {
            for ($kk = 0; $kk < count($contactper_all['contactper']); $kk++) {
                $name = $contactper_all['contactper'][$kk];
                $email = $contactper_all['email'][$kk];
                if (!empty($name) && !empty($email)) {
                    $single_person = array();
                    $single_person['cid'] = $cid;
                    $single_person['name'] = $name;
                    $single_person['email'] = $email;
                    $single_person['created_date'] = date("Y-m-d H:i:s");
                    $query = $this->db->insert('customers_contacts', $single_person);
                }
            }
        }

        if (isset($alldata['pcheck'])) {
            $Allcommission = $alldata['commission'];
            $price = $alldata['price'];
            $Allcurrency = $alldata['currency'];
            foreach ($price as $pid => $values) {
                foreach ($values as $product_id => $price) {
                    if (!empty($price)) {
                        $commision = $Allcommission[$pid][$product_id];
                        $currency = $Allcurrency[$pid][$product_id];
                        if (empty($commision)) {
                            $commision = 0;
                        }
                        $data_new = array();
                        $data_new['cid'] = $cid;
                        $data_new['pid'] = $pid;
                        $data_new['product_id'] = $product_id;
                        $data_new['commission'] = $commision;
                        $data_new['price'] = $price;
                        $data_new['currency'] = $currency;
                        $this->db->insert('customers_principal_assigned', $data_new);
                    }
                }
            }
        }

        return true;
    }


    public function add_customer_model_old($data)
    {
//$query = $this->db->insert('customers',$data);
//return true;
        print_r($_REQUEST);
        echo '</pre>';
        die();

        $email = $this->input->post('customer_email');
        $phone = $this->input->post('customer_phone');
        $query = $this->db->query("SELECT * FROM customers WHERE customer_email = '$email' AND customer_phone= '$phone' ");
        $queryResult = $query->result_array();
        $foundRows = count($queryResult);
        if ($foundRows >= 1) {
            return false;
        } else {
            $query = $this->db->insert('customers', $data);
            return true;
        }

    }

    public function list_order_model($user_id)
    {
        $ee = "select * from orders  order by id desc";

        $query = $this->db->query($ee);
//$query=$this->db->query("select * from customers left join invoice on customers.customer_id=invoice.customer_id where customers.seller_id='$user_id' limit 1");
        $data = $query->result_array();
        return $data;
    }

    public function list_order_export_model($user_id)
    {
        $ee = "select * from orders  order by id desc";

        $query = $this->db->query($ee);
//$query=$this->db->query("select * from customers left join invoice on customers.customer_id=invoice.customer_id where customers.seller_id='$user_id' limit 1");
        $data = $query->result_array();
        return $data;
    }

    public function list_order_export_model_filter($user_id, $start_date, $end_date)
    {
        $ee = "select * from orders where `orderdate` >= '$start_date' AND `orderdate` <= '$end_date' order by id desc";

        $query = $this->db->query($ee);
//$query=$this->db->query("select * from customers left join invoice on customers.customer_id=invoice.customer_id where customers.seller_id='$user_id' limit 1");
        $data = $query->result_array();
        return $data;
    }

    public function list_order_model_new($user_id)
    {
        $ee = "SELECT
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
LEFT JOIN orders_products ON orders_products.order_id = orders.id
GROUP BY
    orders.id
ORDER BY
    orders.id DESC";

        $query = $this->db->query($ee);
//$query=$this->db->query("select * from customers left join invoice on customers.customer_id=invoice.customer_id where customers.seller_id='$user_id' limit 1");
        $data = $query->result_array();
        return $data;
    }

	public function list_principle_model($user_id)
    {
        $ee = "SELECT
    Principal.*,
    GROUP_CONCAT(
        DISTINCT principal_contacts.name,
        '-',
        principal_contacts.email SEPARATOR ', '
    ) AS principal_contacts_details,
    GROUP_CONCAT(
        DISTINCT principal_products.product_name SEPARATOR ', '
    ) AS principal_products
FROM
    Principal
LEFT JOIN principal_contacts ON principal_contacts.pid = Principal.Principal_id
LEFT JOIN principal_products ON principal_products.pid = Principal.Principal_id
GROUP BY Principal_id";

        $query = $this->db->query($ee);
//$query=$this->db->query("select * from customers left join invoice on customers.customer_id=invoice.customer_id where customers.seller_id='$user_id' limit 1");
        $data = $query->result_array();
        return $data;
    }

    public function list_customer_model($user_id)
    {
        $ee = "SELECT
    customers.*,
    GROUP_CONCAT(
        DISTINCT customers_contacts.name,
        '-',
        customers_contacts.email SEPARATOR ', '
    ) AS customers_contacts,
    GROUP_CONCAT(
        DISTINCT Principal.Principal_person,
        '-',
        principal_products.product_name,
        '-',
        customers_principal_assigned.price,
        '-',
        customers_principal_assigned.commission,
        '-',
        customers_principal_assigned.currency SEPARATOR '; '
    ) AS customers_principals
FROM
    customers
LEFT JOIN customers_contacts ON customers_contacts.cid = customers.customer_id
LEFT JOIN customers_principal_assigned ON customers_principal_assigned.cid = customers.customer_id
LEFT JOIN Principal ON Principal.Principal_id = customers_principal_assigned.pid
LEFT JOIN principal_products ON principal_products.id = customers_principal_assigned.product_id
GROUP BY customers.customer_id ORDER BY customers.customer_person ASC";
        $query = $this->db->query($ee);
//$query=$this->db->query("select * from customers left join invoice on customers.customer_id=invoice.customer_id where customers.seller_id='$user_id' limit 1");
        $data = $query->result_array();
        return $data;
    }

    public function list_customer_model_filter($user_id, $start_date, $end_date)
    {
        $query = $this->db->query("select * from customers where `add_on` >= '$start_date' AND `add_on` <= '$end_date' order by `customer_id` DESC");
//$query=$this->db->query("select * from customers left join invoice on customers.customer_id=invoice.customer_id where customers.seller_id='$user_id' limit 1");
        $data = $query->result_array();
        return $data;
    }

    public function list_principal_model_filter($user_id, $start_date, $end_date)
    {
        $query = $this->db->query("select * from Principal where `add_on` >= '$start_date' AND `add_on` <= '$end_date' order by `Principal_id` DESC ");
//$query=$this->db->query("select * from customers left join invoice on customers.customer_id=invoice.customer_id where customers.seller_id='$user_id' limit 1");
        $data = $query->result_array();
        return $data;
    }


    public function list_principal_model($user_id)
    {
        $query = $this->db->query("select * from Principal  order by Principal_id desc");
//$query=$this->db->query("select * from customers left join invoice on customers.customer_id=invoice.customer_id where customers.seller_id='$user_id' limit 1");
        $data = $query->result_array();
        return $data;
    }

    public function delete_order_model_new($id)
    {


        $query = $this->db->query("delete from orders where id='$id'");
        $query = $this->db->query("delete from orders_products where order_id='$id'");

        return true;
    }

    public function delete_principal_model($id)
    {


        $query = $this->db->query("delete from Principal where Principal_id='$id'");
        $query = $this->db->query("delete from principal_contacts where pid='$id'");
        $query = $this->db->query("delete from principal_products where pid='$id'");

        return true;
    }

    public function delete_business_model($id)
    {
        $query = $this->db->query("update business set del='1' where id='$id'");
        return true;
    }

    public function delete_customer_model($id)
    {
        $query = $this->db->query("delete from customers where customer_id='$id'");
        $query = $this->db->query("delete from customers_contacts where cid='$id'");
        $query = $this->db->query("delete from customers_principal_assigned where cid='$id' ");
        return true;
    }

    public function delete_user_model($id)
    {
        $query = $this->db->query("delete from company_profile where seller_id='$id'");
        $query = $this->db->query("delete from users where user_id ='$id'");

        return true;
    }

    public function edit_principal_model($id)
    {
        $result = array();
        $query = $this->db->query("select * from Principal where Principal_id='$id'");
        $data = $query->row_array();
        $result['pri'] = $data;
        $result['principal_products'] = $this->db->query("select * from principal_products where pid='$id'")->result_array();
        $result['principal_contacts'] = $this->db->query("select * from principal_contacts where pid='$id'")->result_array();
        return $result;
    }

    public function edit_order_model_manual($id)
    {
        $result = array();
        $query = $this->db->query("select * from orders where id='$id' or order_no='$id'");
        $data = $query->row_array();
        $result['order'] = $data;
        $result['order_product'] = $this->db->query("select * from orders_products where order_id='{$data['id']}'")->result_array();
        return $result;
    }

    public function edit_order_model($id)
    {
        $result = array();
        $query = $this->db->query("select * from orders where id=" . $id);
        $data = $query->row_array();
        $result['order'] = $data;
        $result['order_product'] = $this->db->query("select * from orders_products where order_id=".$id)->result_array();
        return $result;
    }

    public function edit_customer_model($id)
    {
        $result = array();
        $query = $this->db->query("select * from customers where customer_id='$id'");
        $data = $query->row_array();
        $result['cust'] = $data;
        $result['customers_contacts'] = $this->db->query("select * from customers_contacts where cid='$id'")->result_array();
        return $result;
    }

    public function edit_customerold_model($id)
    {
        $query = $this->db->query("select * from customers where customer_id='$id'");
        $data = $query->result_array();
        return $data;
    }

    public function view_principal_model($id)
    {
        $query = $this->db->query("select * from customers where customer_id='$id'");
        $data = $query->result_array();
        return $data;
    }

    public function update_principal_model($id, $data, $abcd)
    {
        $this->db->where('Principal_id', $id);
        $this->db->update('Principal', $data);
        if (isset($abcd['contactper'])) {
            $contactper_all = $abcd['contactper'];

        } else {
            $contactper_all = array();
        }
        if (isset($abcd['products'])) {
            $products_all = $abcd['products'];
        } else {
            $products_all = array();
        }


        if (!empty($contactper_all)) {
            for ($kk = 0; $kk < count($contactper_all['contactper']); $kk++) {
                if (isset($contactper_all['id'][$kk])) {
                    // update case

                    $_id = $contactper_all['id'][$kk];
                    $name = $contactper_all['contactper'][$kk];
                    $email = $contactper_all['email'][$kk];

                    if (!empty($name) && !empty($email)) {
                        $single_person = array();
                        $single_person['name'] = $name;
                        $single_person['email'] = $email;
                        $this->db->where('id', $_id);
                        $query = $this->db->update('principal_contacts', $single_person);
                    }

                } else {
                    // new case
                    $name = $contactper_all['contactper'][$kk];
                    $email = $contactper_all['email'][$kk];
                    $single_person = array();
                    $single_person['pid'] = $id;
                    $single_person['name'] = $name;
                    $single_person['email'] = $email;
                    $single_person['created_date'] = date("Y-m-d H:i:s");
                    $query = $this->db->insert('principal_contacts', $single_person);
                }
            }
        }


        if (!empty($products_all)) {
            for ($kk = 0; $kk < count($products_all['name']); $kk++) {
                $name = $products_all['name'][$kk];
                $price = $products_all['price'][$kk];
                if (isset($products_all['id'][$kk])) {

                    if (!empty($name)) {
                        $single_person = array();
                        $single_person['product_name'] = $name;
                        $single_person['product_price'] = $price;
                        $this->db->where('id', $products_all['id'][$kk]);
                        $query = $this->db->update('principal_products', $single_person);

                    }
                } else {

                    if (!empty($name)) {
                        $single_person = array();
                        $single_person['pid'] = $id;
                        $single_person['product_name'] = $name;
                        $single_person['product_price'] = $price;
                        $single_person['created_date'] = date("Y-m-d H:i:s");
                        $query = $this->db->insert('principal_products', $single_person);
                    }

                }


            }
        }


        return true;

    }


    public function update_customer_model($id, $data, $abcd)
    {

        $data['customer_state'] = $abcd['customer_state'];
        $cid = $id;
        $this->db->where('customer_id', $id);
        $this->db->update('customers', $data);

        if (isset($abcd['contactper'])) {
            $contactper_all = $abcd['contactper'];
        } else {
            $contactper_all = array();
        }
        if (!empty($contactper_all)) {
            for ($kk = 0; $kk < count($contactper_all['contactper']); $kk++) {
                if (isset($contactper_all['id'][$kk])) {
                    // update case

                    $_id = $contactper_all['id'][$kk];
                    $name = $contactper_all['contactper'][$kk];
                    $email = $contactper_all['email'][$kk];

                    if (!empty($name) && !empty($email)) {
                        $single_person = array();
                        $single_person['name'] = $name;
                        $single_person['email'] = $email;
                        $this->db->where('id', $_id);
                        $query = $this->db->update('customers_contacts', $single_person);
                    }

                } else {
                    // new case
                    $name = $contactper_all['contactper'][$kk];
                    $email = $contactper_all['email'][$kk];
                    $single_person = array();
                    $single_person['cid'] = $id;
                    $single_person['name'] = $name;
                    $single_person['email'] = $email;
                    $single_person['created_date'] = date("Y-m-d H:i:s");
                    $query = $this->db->insert('customers_contacts', $single_person);
                }
            }
        }


        if (isset($abcd['pcheck'])) {


            $allpriceall = $priceid = $abcd['price'];


            $allcommission = $commission = $abcd['commission'];
            $commissionid = $abcd['commissionid'];
            $allcurrency = $abcd['currency'];
            foreach ($priceid as $pid => $values) {
                foreach ($values as $product_id => $price) {
                    if (!empty($price)) {

                        if (isset($commissionid[$pid][$product_id]) && !empty($commissionid[$pid][$product_id])) {
                            $idd = $commissionid[$pid][$product_id];

                            $commision = $allcommission[$pid][$product_id];
                            $currency = $allcurrency[$pid][$product_id];

                            $data_new = array();
                            $data_new['cid'] = $cid;
                            $data_new['pid'] = $pid;
                            $data_new['product_id'] = $product_id;
                            $data_new['commission'] = $commision;
                            $data_new['currency'] = $currency;
                            $data_new['price'] = $price;
                            // echo "customers_principal_assigned update";
                            $this->db->where('id', $idd);
                            $this->db->update('customers_principal_assigned', $data_new);

                        } else {

                            $data_new = array();
                            $commision = $allcommission[$pid][$product_id];
                            $currency = $allcurrency[$pid][$product_id];
                            $data_new['cid'] = $cid;
                            $data_new['pid'] = $pid;
                            $data_new['product_id'] = $product_id;
                            $data_new['commission'] = $commision;
                            $data_new['currency'] = $currency;
                            $data_new['price'] = $price;
                            $this->db->insert('customers_principal_assigned', $data_new);

                        }


                    } else {
                        if (isset($allpriceall[$pid][$product_id]) && !empty($allpriceall[$pid][$product_id])) {
                            $idd = $allpriceall[$pid][$product_id];
                            $this->db->delete('customers_principal_assigned', array('id' => $idd));
                        }
                    }
                }
            }
        }


        return true;


    }

    public function invoice_status_model($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('invoice', $data);
    }

    public function detail_customer_model($id, $user_id)
    {
        $query = $this->db->query("select  customers.customer_id,customers.customer_company, customers.customer_email, customers.customer_phone, (SELECT count(invoice.customer_id) FROM invoice WHERE customer_id='$id' ) as customer_count ,(SELECT sum(invoice.Total_amount) FROM invoice WHERE customer_id='$id' ) as total_Sales_customers ,(select count(invoice.status) from invoice where customer_id='$id' and status='paid') as customer_paid,(select count(invoice.status) from invoice where customer_id='$id'and status='pending') as customer_pending ,(select count(invoice.status) from invoice where customer_id='$id' and status='due') as customer_due ,(select count(invoice.status) from invoice where customer_id='$id' and status='canceled') as customer_canceled,invoice.invoice_no,invoice.id,invoice.invoice_date,invoice.Total_amount,invoice.status,invoice.id,invoice.sub_total,invoice.tax,invoice.sales_person from customers left join invoice on customers.customer_id=invoice.customer_id
  where customers.customer_id='$id' and customers.seller_id='$user_id'");
        $data = $query->result_array();
        return $data;
    }

    public function customer_paid_amount($id, $user_id)
    {
        $paid = $this->db->query("SELECT  SUM(invoice_paid_amount) as total_customer_paid FROM payment WHERE seller_id = '$user_id'  and customer_id='$id' ");
        $paid_amount_customer = $paid->result_array();
        return $paid_amount_customer;
    }


    public function add_tracking_model($data)
    {
        $query = $this->db->insert('order_tracking', $data);
        return true;
    }


    public function order_track_model($id)
    {
        $query = $this->db->query("delete from order_tracking where order_id='$id'");
        return true;
    }

    public function result_order_model($data)
    {
        extract($data);
        if ($month_report == '3' || $month_report == '6' || $month_report == '12') {
            $query = $this->db->query("select invoice.invoice_no,invoice.invoice_date,customers.customer_company,invoice.Total_amount ,invoice.status,invoice.sales_person from invoice left join customers  on  invoice.customer_id = customers.customer_id where on_date >= now()-interval '$month_report' month and invoice.seller_id='$user_id' and status='$status' ");
            $data = $query->result_array();
        } elseif ($month_report == 'current') {
            $query = $this->db->query("select invoice.invoice_no,invoice.invoice_date,customers.customer_company,invoice.Total_amount ,invoice.status,invoice.sales_person from invoice left join customers  on  invoice.customer_id = customers.customer_id where MONTH(on_date) = MONTH(CURDATE()) and invoice.seller_id='$user_id' and status='$status' ");
            $data = $query->result_array();
        } else {
            $query = $this->db->query("select invoice.invoice_no,invoice.invoice_date,customers.customer_company,invoice.Total_amount ,invoice.status,invoice.sales_person from invoice left join customers  on  invoice.customer_id = customers.customer_id where on_date between date_sub(now(),INTERVAL 1 WEEK) and now() and invoice.seller_id='$user_id' and status='$status' ");
            $data = $query->result_array();
        }
        return $data;
    }


    public function update_order_model($id, $items = array())
    {
        if ($this->db->delete('order_sheet', array('invoice_no' => $id, 'filter' => '0'))) {

            if ($this->db->insert_batch('order_sheet', $items)) {
                return true;
            }
        }
        return false;
    }

    public function update_order_model_cold($id, $cold_items = array())
    {

        if ($this->db->delete('order_sheet', array('invoice_no' => $id, 'filter' => '3'))) {

            if ($this->db->insert_batch('order_sheet', $cold_items)) {
                return true;
            }
        } else {
            $this->db->insert_batch('order_sheet', $cold_items);
            return true;
        }
        return false;
    }

    public function update_order_model_desert($id, $desert_items = array())
    {

        if ($this->db->delete('order_sheet', array('invoice_no' => $id, 'filter' => '4'))) {

            if ($this->db->insert_batch('order_sheet', $desert_items)) {
                return true;
            }
        }
        return false;
    }

    public function update_order_model_other($id, $other_items = array())
    {

        if ($this->db->delete('order_sheet', array('invoice_no' => $id, 'filter' => '5'))) {

            if ($this->db->insert_batch('order_sheet', $other_items)) {
                return true;
            }
        }
        return false;
    }

    public function update_order_model_non_veg($id, $non_veg_items = array())
    {
        if ($this->db->delete('order_sheet', array('invoice_no' => $id, 'filter' => '2'))) {

            if ($this->db->insert_batch('order_sheet', $non_veg_items)) {
                return true;
            }
        }
        return false;
    }

    public function update_order_model_veg($id, $veg_items = array())
    {
        if ($this->db->delete('order_sheet', array('invoice_no' => $id, 'filter' => '1'))) {

            if ($this->db->insert_batch('order_sheet', $veg_items)) {
                return true;
            }
        }
        return false;
    }

    public function list_items($id)
    {
        $query = $this->db->query("select * from item_list");
        $data = $query->result_array();
        return $data;
    }

    public function item_veg($id)
    {
        $query = $this->db->query("select * from item_veg");
        $data = $query->result_array();
        return $data;
    }

    public function item_non_veg($id)
    {
        $query = $this->db->query("select * from item_non_veg");
        $data = $query->result_array();
        return $data;
    }

    public function item_list($id)
    {
        $query = $this->db->query("select * from item_list");
        $data = $query->result_array();
        return $data;
    }

    public function delete_item_model($id)
    {
        $query = $this->db->query("delete from item_list where id='$id'");
        return true;
    }

    public function add_item_model($data, $item)
    {
        $query = $this->db->query("SELECT * FROM item_list WHERE item_name = '$item' ");
        $queryResult = $query->result_array();
        $foundRows = count($queryResult);
        if ($foundRows >= 1) {
            return false;
        } else {
            $query = $this->db->insert('item_list', $data);
            return true;
        }
    }


    public function delete_item_veg_model($id)
    {
        $query = $this->db->query("delete from item_veg where veg_id='$id'");
        return true;
    }

    public function add_item_veg_model($data, $item)
    {
        $query = $this->db->query("SELECT * FROM item_veg WHERE veg_id = '$item' ");
        $queryResult = $query->result_array();
        $foundRows = count($queryResult);
        if ($foundRows >= 1) {
            return false;
        } else {
            $query = $this->db->insert('item_veg', $data);
            return true;
        }
    }


    public function delete_item_non_veg_model($id)
    {
        $query = $this->db->query("delete from item_non_veg where non_veg_id='$id'");
        return true;
    }


    public function add_item_non_veg_model($data, $item)
    {
        $query = $this->db->query("SELECT * FROM item_non_veg WHERE non_veg_id = '$item' ");
        $queryResult = $query->result_array();
        $foundRows = count($queryResult);
        if ($foundRows >= 1) {
            return false;
        } else {
            $query = $this->db->insert('item_non_veg', $data);
            return true;
        }
    }

    public function drink_item_list($id)
    {
        $query = $this->db->query("select * from drink_item_list");
        $data = $query->result_array();
        return $data;
    }

    public function delete_drinkitem_model($id)
    {
        $query = $this->db->query("delete from drink_item_list where id='$id'");
        return true;
    }

    public function add_drinkitem_model($data, $item)
    {
        $query = $this->db->query("SELECT * FROM drink_item_list WHERE item_name = '$item' ");
        $queryResult = $query->result_array();
        $foundRows = count($queryResult);
        if ($foundRows >= 1) {
            return false;
        } else {
            $query = $this->db->insert('drink_item_list ', $data);
            return true;
        }
    }

    public function desert_item_list($id)
    {
        $query = $this->db->query("select * from desserts_item_list");
        $data = $query->result_array();
        return $data;
    }

    public function delete_desertitem_model($id)
    {
        $query = $this->db->query("delete from desserts_item_list where id='$id'");
        return true;
    }

    public function add_desertitem_model($data, $item)
    {
        $query = $this->db->query("SELECT * FROM desserts_item_list WHERE item_name = '$item' ");
        $queryResult = $query->result_array();
        $foundRows = count($queryResult);
        if ($foundRows >= 1) {
            return false;
        } else {
            $query = $this->db->insert('desserts_item_list', $data);
            return true;
        }
    }

} ?>
