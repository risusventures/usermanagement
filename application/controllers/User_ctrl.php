<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct Script Access Allowed..');

class User_ctrl extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library(array('form_validation', 'session', 'encrypt', 'email'));
        $this->load->helper(array('url', 'html', 'form'));
        $this->load->helper('url');
    }

    public function register_form()
    {
        $this->load->view('admin_seller/register');
    }

    /*public function register(){
     $email = $this->input->post('email');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_rules('number','Mobile Number','required|regex_match[/^[0-9]{10}$/]');
            $this->form_validation->set_rules('email','email','required|valid_email|is_unique[users.user_email]');
            $this->form_validation->set_rules('password','password','required');
         if($this->form_validation->run() == false){
            $this->load->view('admin_seller/register');
      }else{
      $data=array(
            'user_number'=>$this->input->post('number'),
            'user_password'=>$this->input->post('password'),
            'user_email'=>$this->input->post('email')
              );
      if( $this->user_model->user_register($data) == true){
      $data['message'] = 'Registration Successfully <img src="http://localhost/ci_panel/assets/img/valid.png">';
      $this->load->view('admin_seller/register',$data);
       }
      }
    }*/


    public function register()
    {
        $email = $this->input->post('email');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('number', 'Mobile Number', 'required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[users.user_email]');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin_seller/register');
        } else {
            $data = array(
                'user_number' => $this->input->post('number'),
                'user_password' => $this->input->post('password'),
                'user_email' => $this->input->post('email')
            );
            if ($this->user_model->user_register($data) == true) {
                $email_data = array(
                    'email_to' => $this->input->post('email'),
                    'email_from' => 'FinacBooks <postmaster@finacbooks.com>',
                    'email_reply' => 'info@finacbooks.com',
                    'email_subject' => 'Verify Account',
                    'email_body' => 'Dear User'
                );
                $this->sent_email($email_data);
            }

        }
    }

    public function sent_email($email_data)
    {
        $config = array();
        $config['api_key'] = "key-8d87a9e13ae46f1a857ed46bc4d34e2e";
        $config['api_url'] = "https://api.mailgun.net/v3/mg.finacbooks.com/messages";
        $message = array();
        $message['from'] = $email_data['email_from'];
        $message['to'] = $email_data['email_to'];
        $message['h:Reply-To'] = $email_data['email_reply'];
        $message['subject'] = $email_data['email_subject'];
        //	$message['html'] = file_get_contents("http://dummyimage.com/");
        $message['html'] = '<body>Dear User,<br /><br />Please click on the below activation link to verify your email address.<br /><br />' . site_url() . '/user_ctrl/verify/' . md5($this->input->post('email')) . '<br /><br /><br />Thanks<br />FinacBooks Team</body>';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $config['api_url']);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "api:{$config['api_key']}");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $message);
        $result = curl_exec($ch);
        curl_close($ch);
        redirect('user_ctrl/register_form?emailsent=success');

    }

    function verify($key)
    {
        if ($key) {
            $data = array('status' => 1);
            $this->db->where('md5(user_email)', $key);
            $this->db->update('users', $data);
            redirect('user_ctrl/register_form?email=1');
        } else {
            // error
            redirect('user_ctrl/register_form?email=2');
        }

    }


    public function index()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            redirect('dashboard');
        } else {
            if (isset($_POST['email']) && !empty($_POST['email'])) {
                $data = array(
                    'user_email' => $_POST['email'],
                    'password' => $_POST['password']
                );
                $result = $this->user_model->user_login($data);
                if ($result == TRUE) {
                    $session_result = $this->user_model->session_data($data['user_email']);
                    $sess_array = array(
                        'user_email' => $this->input->post('email'),
                        'user_number' => $session_result[0]['user_number'],
                        'user_id' => $session_result[0]['user_id'],
                        'roleid' => $session_result[0]['roleid'],
                        'menu' => $session_result[0]['menu']
                    );
                    // Add user data in session
                    $this->session->set_userdata('logged_in', $sess_array);

                    $das = site_url() . '/dashboard';
                    redirect($das);
                    die("eddie");
                } else {
                    $data = array(
                        'error_message' => 'Invalid Username or Password'
                    );
                    $data['message1'] = 'Invalid Username And Password';
                    $this->load->view('admin_seller/index', $data);
                }
            } else {
				redirect('dologin');
                //$this->load->view('admin_seller/index');
            }


        }
    }
 public function dologin()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }else{
		$this->load->view('admin_seller/index');
		}
	 
 }

    public function login()
    {
        if ($this->input->post('email') == null) {
            redirect('User_ctrl');
        }


        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin_seller/index');
        } else {
            $data = array(
                'user_email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );
            $result = $this->user_model->user_login($data);
            if ($result == TRUE) {
                $session_result = $this->user_model->session_data($data['user_email']);
                $sess_array = array(
                    'user_email' => $this->input->post('email'),
                    'user_number' => $session_result[0]['user_number'],
                    'user_id' => $session_result[0]['user_id']
                );
                // Add user data in session
                $this->session->set_userdata('logged_in', $sess_array);

                $das = site_url() . '/dashboard';
                redirect($das);
                die("eddie");


            } else {
                $data = array(
                    'error_message' => 'Invalid Username or Password'
                );
                $data['message1'] = 'Invalid Username And Password';
                $this->load->view('admin_seller/index', $data);
            }
        }
    }

    public function logout()
    {
        // Removing session data
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data['message_display'] = '<h4 style="text-align:center;">Successfully Logout</h4>';
        $this->load->view('admin_seller/index', $data);
    }

    public function password_recover()
    {
        $this->load->view('admin_seller/recover_password');
    }


    public function recover_password()
    {
		
		
        $this->form_validation->set_rules('email_reset', 'Email', 'required|trim|xss_clean|callback_validate_credentials');

        //check if email is in the database
        if ($this->user_model->email_exists()) {
			//echo '<pre>';
		 //print_r($this->input->post());
		 //exit;
            if($this->input->post('auth_code')=='1212'){
				
					//$them_pass is the varible to be sent to the user's email 
					$temp_pass = md5(uniqid());
					$email_reset = $this->input->post('email_reset');
					$conf_pass = $this->input->post('conf_pass');
					$password = $this->input->post('password');
					if($this->user_model->update_password_new($conf_pass,$password,$email_reset)){
						//$data['message_display'] = '<h4 style="text-align:center;">Password Reset Successfully !</h4>';
						//redirect('dashboard');
						$data['message_display'] = '<h4 style="text-align:center;">Password Reset Successfully</h4>';
        $this->load->view('admin_seller/index', $data);
					}
					
					
					//send email with #temp_pass as a link
				// echo '<a href="'.site_url() . "/user_ctrl/reset_password/".$temp_pass.'" >Click Here to Change Password</a>';
					// $this->load->library('email', array('mailtype' => 'html'));
					// $this->email->from('info@risusventures.com', "Risus Ventures");
					// $this->email->to($this->input->post('email_reset'));
					// $this->email->subject("Reset your Password");

					// $message = "<p>This email has been sent as a request to reset our password</p>";
					// $message .= "<p><a href='" . site_url() . "/user_ctrl/reset_password/$temp_pass'>Click here </a>if you want to reset your password,
								// if not, then ignore</p>";
					// $data = $this->email->message($message);
					// if ($this->email->send()) {
						// $this->load->model('user_model');
						// if ($this->user_model->temp_reset_password($temp_pass)) {
							 
						// }
					// } else {
						// echo "email was not sent, please contact your administrator";
					// }
			}
        } else {
			$this->load->view('admin_seller/recover_password');
        }
    }

    public function reset_password($temp_pass)
    {
        if ($this->user_model->is_temp_pass_valid($temp_pass)) {
			$data['temp_pass'] = $temp_pass;
		$this->load->view('admin_seller/recover_password', $data);

        } else {
            echo "the key is not valid";
        }

    }

    public function update_password($temp_pass)
    {
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');
        if ($this->form_validation->run()) {
            //echo "passwords match";
			
			
            $password = $this->input->post('password');
			
			if($this->input->post('passtoken')){
				$token = $this->user_model->reset_token($this->input->post('passtoken'));
				
				if ($this->user_model->update_password_frontend($temp_pass, $password, $token->user_id))
                echo "password updated";
				$this->load->view('admin_seller/index');
			}else{
            if ($this->user_model->update_password($temp_pass, $password))
                echo "password updated";
			}
			
        } else {
            echo "passwords do not match";
        }
    }
} ?>