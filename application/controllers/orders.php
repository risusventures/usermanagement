<?php error_reporting(0);
defined('BASEPATH') OR exit('No direct Script Access Allowed..');

class orders extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('product_model', 'profile_model', 'search_model'));
        $this->load->library(array('form_validation', 'session', 'upload', 'email'));
        $this->load->helper(array('url', 'html', 'form'));
        $this->load->library('calendar');
    }

    public function addorder()
    {

        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['user_email'] = $session_data['user_email'];
            $data['user_id'] = $session_data['user_id'];
            $data['records4'] = $this->profile_model->company_profile($data['user_id']);
            $this->load->view('admin_seller/placeorder_new', $data);
            die();
        } else {
            redirect('user_ctrl/login', 'refresh');
        }
    }

    public function saveorder()
    {
        echo '<pre>';
        echo amit;
        echo '</pre>';


//        if($this->session->userdata('logged_in')){
//       $session_data = $this->session->userdata('logged_in');
//       $data['user_email'] = $session_data['user_email'];
//       $data['user_id'] = $session_data['user_id'];
//      $data['records4'] = $this->profile_model->company_profile($data['user_id']);
////      $data['list_principal'] = $this->product_model->list_order_model($data['user_id']);
//       
//
//       $this->load->view('admin_seller/placeorder_new',$data);
//       
//  }
//  
//  
//  else{
//       redirect('user_ctrl/login', 'refresh');
//  }


    }


}

?>