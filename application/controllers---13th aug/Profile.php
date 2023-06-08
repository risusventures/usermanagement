<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

      public function __construct() {
						parent::__construct();
						$this->load->model(array('profile_model','notification_model','search_model'));
						$this->load->library(array('form_validation','session','email'));
						$this->load->helper(array('url','html','form'));
	    }

/*public function dashboard(){

if($this->session->userdata('logged_in')){
     $session_data = $this->session->userdata('logged_in');
     $data['user_email'] = $session_data['user_email'];
     $data['user_number'] =$session_data['user_number'];
     $data['user_id'] = $session_data['user_id'];
     $data['records'] = $this->profile_model->total_category($data['user_id']);
     $data['records1'] = $this->profile_model->total_product($data['user_id']);
     $data['records2'] = $this->profile_model->bussiness_profile($data['user_id']);
     $data['records3'] = $this->profile_model->about_profile($data['user_id']);
     $data['records4'] = $this->profile_model->company_profile($data['user_id']);
     $data['invoice']  =$this->profile_model->dashboard_count_invoice($data['user_id']);
     $data['account_detail']  =$this->profile_model->profile_detail_account($data['user_id']);
     $this->load->view('admin_seller/dashboard', $data);
}else{
redirect('user_ctrl/login', 'refresh');
     }  
  }*/

  
  
  
  
public function contactprofile(){
if($this->session->userdata('logged_in')){
     $session_data = $this->session->userdata('logged_in');
     $data['user_email'] = $session_data['user_email'];
     $data['user_number']= $session_data['user_number'];
     $data['user_id'] =$session_data['user_id'];
    $data['records4'] = $this->profile_model->company_profile($data['user_id']);
     $this->load->view('admin_seller/contact_profile', $data);
}else{
     //If no session, redirect to login page
     redirect('user_ctrl/login', 'refresh');
   }      
}

public function create_contact(){
   if($this->session->userdata('logged_in')){
     $session_data = $this->session->userdata('logged_in');
     $data['user_email'] = $session_data['user_email'];
     $data['user_number'] =$session_data['user_number'];
     $data['user_id'] =$session_data['user_id'];
	 $data['records4'] = $this->profile_model->company_profile($data['user_id']);
	    	$this->form_validation->set_error_delimiters('<div class="error">', '</div>');	
        $this->form_validation->set_rules('contact_name', 'Contact Name', 'required');
        $this->form_validation->set_rules('ceo_name', 'CEO Name', 'required');
        $this->form_validation->set_rules('company_name', 'Company Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('state', 'state', 'required');
        $this->form_validation->set_rules('postal_code', 'Postal', '');
        $this->form_validation->set_rules('mobile_number', 'Mobile', '');
        $this->form_validation->set_rules('fax_number', 'Fax Number', '');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('website', 'Website', '');
		 list($width,$height) = getimagesize($_FILES['image']['tmp_name']);
        //Upload Location
        $folder = "./assets/file_icon/profile_image/";
   
        //Thumbnail Dimension
        $width2="300";
        $height2=round(($height/$width)*$width2);
        
        //Thumbnail Location
        $thumb_loc = "./assets/file_icon/profile_image/thum/";
          
        //New File Name
        $new_name = $_FILES['image']['name'];

          //call thumbnail creation function and store thumbnail name
          $upload_img = $this->thumb('image',$folder,$new_name,TRUE,$thumb_loc,$width2,$height2);
    if($this->form_validation->run() == FALSE){
       $this->load->view('admin_seller/contact_profile');
}else{  
        extract($data);
        $data = array(
       'contact_name'=> $this->input->post('contact_name'),
       'ceo_name'    => $this->input->post('ceo_name'),
       'company_name'=> $this->input->post('company_name'),
       'address'     => $this->input->post('address'),
       'city'       =>  $this->input->post('city'),
       'state'      =>  $this->input->post('state'),
       'postal_code'=>  $this->input->post('postal_code'),
       'mobile_number'=>$this->input->post('mobile_number'),
       'fax_number'  => $this->input->post('fax_number'),
       'email'       => $this->input->post('email'),
       'website'        =>$this->input->post('website'),
	   'image'          =>$upload_img,
       'seller_id' => $user_id );
  if($this->profile_model->contact_model($data) ==TRUE){
       $data['user_email'] = $session_data['user_email'];
       $data['message'] = '<h5 style="text-align:center;">Contact Profile Inserted Successfully <img src="http://localhost/ci_panel/assets/img/valid.png"></h5>';
      redirect('profile/dashboard');
    }
    else{  redirect('profile/contactprofile?message=already');}
  }
  }else{
     //If no session, redirect to login page
     redirect('user_ctrl/login', 'refresh');
    }
}


public function edit_contact($id){
 if($this->session->userdata('logged_in')){
     $session_data = $this->session->userdata('logged_in');
     $data['user_email'] = $session_data['user_email'];
     $data['user_number'] =$session_data['user_number'];
     $data['user_id'] =$session_data['user_id'];
     $data['records'] =$this->profile_model->edit_contact_profile($id);
     $data['records4'] = $this->profile_model->company_profile($data['user_id']);
     $this->load->view('admin_seller/edit_contact', $data);
}else{
     //If no session, redirect to login page
     redirect('user_ctrl/login', 'refresh');
    }
 }


public function update_contact($uid){
  if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');
    $data['user_id'] = $session_data['user_id'];
    $data['user_email'] = $session_data['user_email'];
    $data['records4'] = $this->profile_model->company_profile($data['user_id']);
   $id=$this->input->post('uid');
	 list($width,$height) = getimagesize($_FILES['image']['tmp_name']);
        //Upload Location
        $folder = "./assets/file_icon/profile_image/";
   
        //Thumbnail Dimension
        $width2="300";
        $height2=round(($height/$width)*$width2);
        
        //Thumbnail Location
        $thumb_loc = "./assets/file_icon/profile_image/thum/";
          
        //New File Name
        $new_name = $_FILES['image']['name'];

          //call thumbnail creation function and store thumbnail name
          $upload_img = $this->thumb('image',$folder,$new_name,TRUE,$thumb_loc,$width2,$height2);
 if($upload_img !=null){	 
	  $data = array(
       'contact_name'=> $this->input->post('contact_name'),
       'ceo_name'    => $this->input->post('ceo_name'),
       'company_name'=> $this->input->post('company_name'),
       'address'     => $this->input->post('address'),
       'city'       =>  $this->input->post('city'),
       'state'      =>  $this->input->post('state'),
       'postal_code'=>$this->input->post('postal_code'),
       'tele_number'=>  $this->input->post('tele_number'),
       'mobile_number'=>  $this->input->post('mobile_number'),
       'fax_number'=>$this->input->post('fax_number'),
       'email'=>$this->input->post('email'),
       'website'=>$this->input->post('website'),
	   'image' =>$upload_img
       );
move_uploaded_file($_FILES["image"]["tmp_name"],$output_dir.$fileName);	   
 }else{
  $data = array(
       'contact_name'=> $this->input->post('contact_name'),
       'ceo_name'    => $this->input->post('ceo_name'),
       'company_name'=> $this->input->post('company_name'),
       'address'     => $this->input->post('address'),
       'city'       =>  $this->input->post('city'),
       'state'      =>  $this->input->post('state'),
       'postal_code'=>$this->input->post('postal_code'),
       'tele_number'=>  $this->input->post('tele_number'),
       'mobile_number'=>  $this->input->post('mobile_number'),
       'fax_number'=>$this->input->post('fax_number'),
       'email'=>$this->input->post('email'),
       'website'=>$this->input->post('website')
	   );	 
	 
 }	
 
  $data['edit_contact']=$this->profile_model->update_contact_model($id,$data);
 // redirect('profile/dashboard?message=1');
$url = 'profile/dashboard?message=1';
echo'<script>window.location.href = "'.base_url().$url.'";</script>';
  }else{
   redirect('user_ctrl/login', 'refresh');
  }
}

  


public function autocomplete() {
 if($this->session->userdata('logged_in')){
     $session_data = $this->session->userdata('logged_in');
     $data['user_email'] = $session_data['user_email'];
     $data['user_number'] =$session_data['user_number'];
     $data['user_id'] =$session_data['user_id'];
     $data['search_data'] = $this->input->post('search_data');
     $query = $this->search_model->get_autocomplete($data);
     foreach ($query->result() as $row):
     echo '<ul role="listbox" data-role="staticlist" aria-live="polite" id="kUI_automplete_template_listbox" aria-hidden="false" tabindex="-1" unselectable="on" class="k-list k-reset"><a href="'.base_url().'manageCustomers" style="decoration:none;"><li tabindex="-1" role="option" unselectable="on" class="k-item" data-offset-index="0" style="list-style:none;"><div class="k-list-wrapper" style="margin-right:20px;"><span class="k-state-default k-list-wrapper-addon"><i class="fa fa-user"></i></span><span class="k-state-default k-list-wrapper-content"><p>'.$row->customer_person.'</p><span class="uk-text-muted uk-text-small">'.$row->customer_city.'</span></span></div></li></a></ul>';
     endforeach;
    }else{
     //If no session, redirect to login page
     redirect('user_ctrl/login', 'refresh');
   }}

   public function search_records($id)
   {
    if($this->session->userdata('logged_in')){
     $session_data = $this->session->userdata('logged_in');
     $data['user_email'] = $session_data['user_email'];
     $data['user_number'] =$session_data['user_number'];
     $data['user_id'] =$session_data['user_id'];
    $data['records4'] = $this->profile_model->company_profile($data['user_id']);
     $data['records'] = $this->search_model->get_search($id,$data['user_id']);
	 $this->load->view('admin_seller/search_result',$data);
	}else{
     //If no session, redirect to login page
     redirect('user_ctrl/login', 'refresh');
   }   
   }
   
   
	private function thumb($field_name = '', $target_folder = '', $file_name = '', $thumb = FALSE, $thumb_folder = '', $thumb_width = '', $thumb_height = ''){
	    //folder path setup
	    $target_path = $target_folder;
	    $thumb_path = $thumb_folder;
	    
	    //file name setup
	    $filename_err = explode(".",$_FILES[$field_name]['name']);
	    $filename_err_count = count($filename_err);
	    $file_ext = $filename_err[$filename_err_count-1];
	    if($file_name != ''){
	        $fileName = $file_name;
	    }else{
	        $fileName = $_FILES[$field_name]['name'];
	    }
	    
	    //upload image path
	    $upload_image = $target_path.basename($fileName);
	    
	    //upload image
	    if(move_uploaded_file($_FILES[$field_name]['tmp_name'],$upload_image))
	    {
	        //thumbnail creation
	        if($thumb == TRUE)
	        {
	            $thumbnail = $thumb_path.$fileName;
	            list($width,$height) = getimagesize($upload_image);
	            $thumb_create = imagecreatetruecolor($thumb_width,$thumb_height);
	            switch($file_ext){
	                case 'jpg':
	                    $source = imagecreatefromjpeg($upload_image);
	                    break;
	                case 'jpeg':
	                    $source = imagecreatefromjpeg($upload_image);
	                    break;

	                case 'png':
	                    $source = imagecreatefrompng($upload_image);
	                    break;
	                case 'gif':
	                    $source = imagecreatefromgif($upload_image);
	                    break;
	                default:
	                    $source = imagecreatefromjpeg($upload_image);
	            }

	            imagecopyresampled($thumb_create,$source,0,0,0,0,$thumb_width,$thumb_height,$width,$height);
	            switch($file_ext){
	                case 'jpg' || 'jpeg':
	                    imagejpeg($thumb_create,$thumbnail,100);
	                    break;
	                case 'png':
	                    imagepng($thumb_create,$thumbnail,100);
	                    break;

	                case 'gif':
	                    imagegif($thumb_create,$thumbnail,100);
	                    break;
	                default:
	                    imagejpeg($thumb_create,$thumbnail,100);
	            }

	        }

	        return $fileName;
	    }
	    else
	    {
	        return false;
	    }
	}

public function dashboard(){
if($this->session->userdata('logged_in')){
     $session_data = $this->session->userdata('logged_in');
     $data['user_email'] = $session_data['user_email'];
     $data['user_number'] =$session_data['user_number'];
     $data['user_id'] = $session_data['user_id'];
     //$filter_chart = $this->input->post('chart_filter');
	  $filter_chart = $_GET['chart_filter'];
          if(empty($filter_chart)){
              $abc['start']=date("Y")."-01-01";
              $abc['end']=date("Y")."-12-31";
          }else{
               $abc = (array)json_decode($filter_chart);
          }
    
     
     $start_date = $abc['start'];
     $end_date = $abc['end'];
     $data['records'] = $this->profile_model->total_category($data['user_id']);
     $data['records1'] = $this->profile_model->total_product($data['user_id']);
     $data['records2'] = $this->profile_model->bussiness_profile($data['user_id']);
     $data['records3'] = $this->profile_model->about_profile($data['user_id']);
     $data['records4'] = $this->profile_model->company_profile($data['user_id']);
     $data['invoice']  =$this->profile_model->dashboard_count_invoice($data['user_id']);
     $data['account_detail']  =$this->profile_model->profile_detail_account($data['user_id']);
	 $data['total_customers'] =$this->profile_model->total_customers($data['user_id']);
	 $data['order'] = $this->profile_model->list_order_model($data['user_id']);
	 $data['chart'] = $this->profile_model->chart($data['user_id']);
	 $data['chart_record'] = $this->profile_model->chart_record($data['user_id']);
	 $data['calender_record'] = $this->profile_model->calender_record($data['user_id']);
     extract($data);
     $data['filter_chart_record'] = $this->profile_model->filter_chart_records($user_id,$start_date,$end_date);
     $data['filter_princip_order_records'] = $this->profile_model->filter_princip_order_records($user_id,$start_date,$end_date);
     //echo '<pre>'; print_r($data['filter_chart_record']); echo '</pre>';
     $this->load->view('admin_seller/index2', $data);

}else{
redirect('user_ctrl/login', 'refresh');
     }
  }







	
   public function report(){
    if($this->session->userdata('logged_in')){
     $session_data = $this->session->userdata('logged_in');
     $data['user_email'] = $session_data['user_email'];
     $data['user_number'] =$session_data['user_number'];
     $data['user_id'] =$session_data['user_id'];
     $data['records4'] = $this->profile_model->company_profile($data['user_id']);
	 $this->load->view('admin_seller/report',$data);
	}else{
     //If no session, redirect to login page
     redirect('user_ctrl/login', 'refresh');
   }
   }
	

  	
	
	
	
 	
}
?>
