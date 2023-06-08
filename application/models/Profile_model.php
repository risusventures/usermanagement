<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function contact_model($data)
    {
        $user_id = $data['seller_id'];
        $query = $this->db->query("select * from company_profile where seller_id='$user_id'");
        $foundRows = $query->num_rows();
        if ($foundRows >= 1) {

            return false;
        } else {
            mkdir('./assets/Users/' . 'S_' . $user_id, 0777, true);
            $query = $this->db->insert('company_profile', $data);
            return true;
        }
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

    public function total_category($user_id)
    {
        $query = $this->db->query("select count(product_category) as cat from category where seller_id='$user_id'");
        $data = $query->result_array();
        return $data;
    }

    public function total_product($user_id)
    {
        $query = $this->db->query("select count(product_group) as pro from add_products where seller_id='$user_id'");
        $data = $query->result_array();
        return $data;
    }

    public function bussiness_profile($user_id)
    {
        $query = $this->db->query("select * from bussiness_profile where seller_id='$user_id' ORDER BY id DESC");
        $data = $query->result_array();
        return $data;
    }


    public function about_profile($user_id)
    {
        $query = $this->db->query("select * from about_profile where seller_id='$user_id' ORDER BY id DESC");
        $data = $query->result_array();
        return $data;
    }


    public function company_profile($user_id)
    {
        $query = $this->db->query("select * from company_profile where seller_id='$user_id' ORDER BY cp_id DESC");
        $data = $query->result_array();
        return $data;
    }

    public function edit_profile($id)
    {
        $query = $this->db->query("select * from company_profile where cp_id='$id' ");
        $data = $query->result_array();
        return $data;
    }

    public function edit_bussiness_profile($id)
    {
        $query = $this->db->query("select * from bussiness_profile where id='$id' ");
        $data = $query->result_array();
        return $data;
    }


    public function edit_contact_profile($id)
    {

        $query = $this->db->query("select * from company_profile where cp_id='$id' ");
        $data = $query->result_array();
        return $data;
    }


    public function update_contact_model($id, $data)
    {

        $this->db->where('cp_id', $id);
        $this->db->update('company_profile', $data);
    }

    public function dashboard_count_invoice($user_id)
    {
        $query = $this->db->query("select count(id) as invoice,sum(Total_amount) as total,(select sum(Total_amount)  from invoice where status='paid' and seller_id='$user_id') as paid,(select sum(Total_amount)  from invoice where status='due' and seller_id='$user_id') as due,(select sum(Total_amount)  from invoice where status='Quotation' and seller_id='$user_id') as pending ,(select count(status)  from invoice where status='canceled' and seller_id='$user_id') as canceled,(select sum(Total_amount)  from invoice where status='canceled' and seller_id='$user_id') as total_canceled,(select count(status) from invoice where status='paid' and seller_id='$user_id') as paid_count,(select count(status) from invoice where status='due' and seller_id='$user_id') as due_count,(select count(status) from invoice where status='pending' and seller_id='$user_id') as pending_count,(select count(status) from invoice where status='canceled' and seller_id='$user_id') as canceled_count from invoice where seller_id='$user_id'");
        $data = $query->result_array();
        return $data;
    }

    public function profile_detail_account($user_id)
    {
        $query = $this->db->query("select * from users where user_id='$user_id'");
        $data = $query->result_array();
        return $data;
    }

    public function list_order_model($user_id)
    {
        $query = $this->db->query("select * from invoice left join customers on invoice.customer_id=customers.customer_id where invoice.seller_id='$user_id' order by id desc limit 5");
        $data = $query->result_array();
        return $data;
    }

    public function chart($user_id)
    {
        $query = $this->db->query("select max(Total_amount) as max_value from invoice where seller_id='$user_id'");
        $data = $query->result_array();
        return $data;
    }

    public function chart_record($user_id)
    {
        $query = $this->db->query("SELECT date_format( add_date, '%b' ) as month, SUM( Total_amount ) as total_sales FROM invoice WHERE seller_id = '$user_id' AND add_date >= date_sub( now( ) , INTERVAL 12 MONTH ) GROUP BY date_format( add_date, '%b' ) ORDER BY date_format( add_date, '%m' ) ASC");
        $a = $query->result_array();
        $data = json_encode($a);
        return $data;
    }

    public function total_customers($user_id)
    {
        $query = $this->db->query("select count(customer_id) as customers from customers where seller_id='$user_id'");
        $customers = $query->result_array();
        return $customers;
    }

    public function calender_record($user_id)
    {
        $query = $this->db->query("select * from invoice left join customers on invoice.customer_id=customers.customer_id where invoice.seller_id='$user_id'");
        $customers = $query->result_array();
        return $customers;
    }

    public function details_principle_filter($data)
    {
        extract($data);
        $query = $this->db->query("SELECT count(Principal_id) as total_customers from Principal where  seller_id='$id' and `add_on`  LIKE '%$month_year-%' ");
        $customers_filter = $query->result_array();
        return $customers_filter;
    }

    public function total_principle_filter($data)
    {
        extract($data);
        $query = $this->db->query("SELECT count(Principal_id) as total_customers from Principal where  seller_id='$user_id' and `add_on`  LIKE '%$month_year-%' ");
        $customers_filter = $query->result_array();
        return $customers_filter;
    }


    public function total_customers_filter($data)
    {
        extract($data);
        $query = $this->db->query("SELECT count(customer_id) as total_customers from customers where  seller_id='$user_id' and `add_on`  LIKE '%$month_year-%' ");
        $customers_filter = $query->result_array();
        return $customers_filter;

    }

    public function profile_customer_model($data)
    {
        extract($data);
        $query = $this->db->query("SELECT * from customers where  seller_id='$user_id' and `add_on`  LIKE '%$month_year-%' ");
        $customers_filter = $query->result_array();
        return $profile_filter;
    }


    public function filter_chart_records($user_id, $start_date, $end_date)
    {
        if ($user_id && $end_date) {
            $chart = $this->db->query("select month as m,month_id as id from chart_month ");
            $b = $chart->result_array();
            $i = 1;
            foreach ($b as $c) {
                $id = $c['id'];
                $q = "SELECT date_format( datecretaed, '%m' ) as month, COUNT(DISTINCT pid) as total_pri FROM orders WHERE datecretaed >= DATE('$start_date 00:00:00') AND datecretaed <= DATE('$end_date 00:00:00') and `datecretaed` LIKE '%-$id-%'  AND datecretaed >= date_sub( now( ) , INTERVAL 12 MONTH ) GROUP BY date_format( datecretaed, '%b' ) ORDER BY date_format( datecretaed, '%m' ) ASC";

                $query = $this->db->query($q);


                $total_principal = $query->result_array();
                $q1 = "SELECT date_format( created_date, '%m' ) as month, product_id as product_id, p_name as p_name,p_quntity as p_quntity FROM orders_products WHERE created_date >= DATE('$start_date 00:00:00') AND created_date <= DATE('$end_date 00:00:00') and `created_date` LIKE '%-$id-%'  AND created_date >= date_sub( now( ) , INTERVAL 12 MONTH ) GROUP BY date_format( created_date, '%b' ) ORDER BY date_format( created_date, '%m' ) ASC";

                $principal_detail = $this->db->query($q1);


                $detail_principal = $principal_detail->result_array();
                $order = $this->db->query("SELECT date_format( created_date, '%m' ) as month, COUNT(*) as total_order FROM orders WHERE datecretaed >= DATE('$start_date 00:00:00') AND datecretaed <= DATE('$end_date 00:00:00') and `datecretaed` LIKE '%-$id-%'  AND datecretaed >= date_sub( now( ) , INTERVAL 12 MONTH ) GROUP BY date_format( datecretaed, '%b' ) ORDER BY date_format( datecretaed, '%m' ) ASC");
                $total_order = $order->result_array();
                $quntity = $this->db->query("SELECT date_format( created_date, '%m' ) as month, SUM(p_quntity) as total_quntity FROM orders_products WHERE created_date >= DATE('$start_date 00:00:00') AND created_date <= DATE('$end_date 00:00:00') and `created_date` LIKE '%-$id-%'  AND created_date >= date_sub( now( ) , INTERVAL 12 MONTH ) GROUP BY date_format( created_date, '%b' ) ORDER BY date_format( created_date, '%m' ) ASC");
                $p_quntity = $quntity->result_array();
                $usd = $this->db->query("SELECT date_format(datecretaed, '%m' ) as month, SUM(totalusd) as total_usd FROM orders WHERE datecretaed >= DATE('$start_date 00:00:00') AND datecretaed <= DATE('$end_date 00:00:00') and`datecretaed` LIKE '%-$id-%'  AND datecretaed >= date_sub( now( ) , INTERVAL 12 MONTH ) GROUP BY date_format( datecretaed, '%b' ) ORDER BY date_format( datecretaed, '%m' ) ASC");
                $usd_amount = $usd->result_array();
                $eur = $this->db->query("SELECT date_format(datecretaed, '%m' ) as month, SUM(totaleur) as total_eur FROM orders WHERE datecretaed >= DATE('$start_date 00:00:00') AND datecretaed <= DATE('$end_date 00:00:00') and`datecretaed` LIKE '%-$id-%'  AND datecretaed >= date_sub( now( ) , INTERVAL 12 MONTH ) GROUP BY date_format( datecretaed, '%b' ) ORDER BY date_format( datecretaed, '%m' ) ASC");
                $eur_amount = $eur->result_array();
                $total = count($b);
                $str .= "{";
                $str .= '"month":"' . $c['m'] . '",';
                $str .= '"total_pri":"' . $total_principal[0]['total_pri'] . '",';
                $str .= '"total_order":"' . $total_order[0]['total_order'] . '",';
                $str .= '"total_quntity":"' . $p_quntity[0]['total_quntity'] . '",';
                $str .= '"total_usd":"' . $usd_amount[0]['total_usd'] . '",';
                $str .= '"total_eur":"' . $eur_amount[0]['total_eur'] . '",';
//$str .= '"detail_principal":"'.$detail_principal[0]['product_id'].'",';
                $str .= '}';
                if ($total > $i) {
                    $str .= ",";
                }
                $i++;
            }
            return $str;
        }


    }


    public function filter_princip_order_records($user_id, $start_date, $end_date)
    {
        if ($user_id && $end_date) {
            $chart = $this->db->query("select month as m,month_id as id from chart_month ");
            $b = $chart->result_array();
//echo '<pre>';print_r($b);echo'</pre>';
            $i = 1;
            foreach ($b as $c) {
                $id = $c['id'];

                $principal_detail = $this->db->query("SELECT date_format( created_date, '%m' ) as month, product_id as product_id, p_name as p_name,p_quntity as p_quntity FROM orders_products WHERE created_date >= DATE('$start_date 00:00:00') AND created_date <= DATE('$end_date 00:00:00') and `created_date` LIKE '%-$id-%'  AND created_date >= date_sub( now( ) , INTERVAL 12 MONTH ) GROUP BY date_format( created_date, '%b' ) ORDER BY date_format( created_date, '%m' ) ASC");
                $detail_principal = $principal_detail->result_array();


                $total = count($b);
                $str .= "{";
                $str .= '"month":"' . $c['m'] . '",';

                foreach ($detail_principal as $detail_principalss) {
                    $str .= '"detail_principal":"' . $detail_principalss['product_id'] . '",';
                }

                $str .= '}';
                if ($total > $i) {
                    $str .= ",";
                }
                $i++;
            }

//echo '<pre>';print_r($str);echo'</pre>';
            return $str;
        }


    }


    public function filter_chart_records_old($user_id, $start_date, $end_date)
    {
        if ($user_id && $end_date) {
            $chart = $this->db->query("select month as m,month_id as id from chart_month ");
            $b = $chart->result_array();
            $i = 1;
            foreach ($b as $c) {
                $id = $c['id'];
                $query = $this->db->query("SELECT date_format( on_date, '%m' ) as month, SUM( Total_amount) as total_sales FROM invoice WHERE seller_id = '$user_id' and on_date >= DATE('$start_date 00:00:00') AND on_date <= DATE('$end_date 00:00:00') and `on_date` LIKE '%-$id-%'  AND on_date >= date_sub( now( ) , INTERVAL 12 MONTH ) GROUP BY date_format( on_date, '%b' ) ORDER BY date_format( on_date, '%m' ) ASC");
                $amount = $query->result_array();
                $paid = $this->db->query("SELECT date_format( add_on, '%m' ) as month, SUM(invoice_paid_amount) as total_paid FROM payment WHERE seller_id = '$user_id' and add_on >= DATE('$start_date 00:00:00') AND add_on <= DATE('$end_date 00:00:00') and `add_on` LIKE '%-$id-%'  AND add_on >= date_sub( now( ) , INTERVAL 12 MONTH ) GROUP BY date_format( add_on, '%b' ) ORDER BY date_format( add_on, '%m' ) ASC");
                $paid_amount = $paid->result_array();
                $pending = $this->db->query("SELECT date_format(on_date, '%m' ) as month, SUM(Total_amount) as total_pending FROM invoice WHERE status='Quotation' and seller_id = '$user_id'  and on_date >= DATE('$start_date 00:00:00') AND on_date <= DATE('$end_date 00:00:00') and`on_date` LIKE '%-$id-%'  AND on_date >= date_sub( now( ) , INTERVAL 12 MONTH ) GROUP BY date_format( on_date, '%b' ) ORDER BY date_format( on_date, '%m' ) ASC");
                $pending_amount = $pending->result_array();
                if ($amount[0]['total_sales'] > $paid_amount[0]['total_paid']) {
                    $due_amount = $amount[0]['total_sales'] - $paid_amount[0]['total_paid'];
                } else {
                    $due_amount = 0;
                }
                $aa = $amount[0]['total_sales'];
                $bb = $paid_amount[0]['total_paid'];
                if ($aa < $bb) {
                    $advance_amount = $bb - $aa;
                } else {
                    $advance_amount = 0;
                }

                $canceled = $this->db->query("SELECT date_format(on_date, '%m' ) as month, SUM(Total_amount) as total_canceled FROM invoice WHERE status='canceled' and seller_id = '$user_id' and on_date >= DATE('$start_date 00:00:00') AND on_date <= DATE('$end_date 00:00:00') and `on_date` LIKE '%-$id-%'  AND on_date >= date_sub( now( ) , INTERVAL 12 MONTH ) GROUP BY date_format( on_date, '%b' ) ORDER BY date_format( on_date, '%m' ) ASC");
                $canceled_amount = $canceled->result_array();

                $total = count($b);
                $str .= "{";
                $str .= '"month":"' . $c['m'] . '",';
                $str .= '"total_sales":"' . $amount[0]['total_sales'] . '",';
                $str .= '"total_paid":"' . $paid_amount[0]['total_paid'] . '",';
                $str .= '"total_pending":"' . $pending_amount[0]['total_pending'] . '",';
                $str .= '"total_advance":"' . $advance_amount . '",';
                $str .= '"total_due":"' . $due_amount . '",';
                $str .= '"total_canceled":"' . $canceled_amount[0]['total_canceled'] . '"';
                $str .= '}';
                if ($total > $i) {
                    $str .= ",";
                }
                $i++;
            }
            return $str;
        } else {
            $chart = $this->db->query("select month as m,month_id as id from chart_month ");
            $b = $chart->result_array();
            $i = 1;
            foreach ($b as $c) {
                $id = $c['id'];
                $query = $this->db->query("SELECT date_format( on_date, '%m' ) as month, SUM( Total_amount) as total_sales FROM invoice WHERE seller_id = '$user_id' and `on_date` LIKE '%-$id-%'  AND on_date >= date_sub( now( ) , INTERVAL 12 MONTH ) GROUP BY date_format( on_date, '%b' ) ORDER BY date_format( on_date, '%m' ) ASC");
                $amount = $query->result_array();
                $paid = $this->db->query("SELECT date_format( add_on, '%m' ) as month, SUM(invoice_paid_amount) as total_paid FROM payment WHERE seller_id = '$user_id' and `add_on` LIKE '%-$id-%'  AND add_on >= date_sub( now( ) , INTERVAL 12 MONTH ) GROUP BY date_format( add_on, '%b' ) ORDER BY date_format( add_on, '%m' ) ASC");
                $paid_amount = $paid->result_array();
                $pending = $this->db->query("SELECT date_format(on_date, '%m' ) as month, SUM(Total_amount) as total_pending FROM invoice WHERE status='Quotation' and seller_id = '$user_id'  and `on_date` LIKE '%-$id-%'  AND on_date >= date_sub( now( ) , INTERVAL 12 MONTH ) GROUP BY date_format( on_date, '%b' ) ORDER BY date_format( on_date, '%m' ) ASC");
                $pending_amount = $pending->result_array();
                if ($amount[0]['total_sales'] > $paid_amount[0]['total_paid']) {
                    $due_amount = $amount[0]['total_sales'] - $paid_amount[0]['total_paid'];
                } else {
                    $due_amount = 0;
                }
                $aa = $amount[0]['total_sales'];
                $bb = $paid_amount[0]['total_paid'];
                if ($aa < $bb) {
                    $advance_amount = $bb - $aa;
                } else {
                    $advance_amount = 0;
                }

                $canceled = $this->db->query("SELECT date_format(on_date, '%m' ) as month, SUM(Total_amount) as total_canceled FROM invoice WHERE status='canceled' and seller_id = '$user_id' and `on_date` LIKE '%-$id-%'  AND on_date >= date_sub( now( ) , INTERVAL 12 MONTH ) GROUP BY date_format( on_date, '%b' ) ORDER BY date_format( on_date, '%m' ) ASC");
                $canceled_amount = $canceled->result_array();
                $total = count($b);
                $str .= "{";
                $str .= '"month":"' . $c['m'] . '",';
                $str .= '"total_sales":"' . $amount[0]['total_sales'] . '",';
                $str .= '"total_paid":"' . $paid_amount[0]['total_paid'] . '",';
                $str .= '"total_pending":"' . $pending_amount[0]['total_pending'] . '",';
                $str .= '"total_advance":"' . $advance_amount . '",';
                $str .= '"total_due":"' . $due_amount . '",';
                $str .= '"total_canceled":"' . $canceled_amount[0]['total_canceled'] . '"';
                $str .= '}';
                if ($total > $i) {
                    $str .= ",";
                }
                $i++;
            }
            return $str;
        }

    }


} ?>