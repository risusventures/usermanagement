<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->database();
    }

    public function user_register($data)
    {
        $this->db->insert('users', $data);
        return true;

    }

    public function user_login($data)
    {
        $email = $data['user_email'];
        $password = $data['password'];
        $condition = "user_email='" . $email . "' AND user_password='" . $password . "'  AND status='1' ";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function session_data($user_email)
    {
        $condition = "user_email='" . $user_email . "'";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $query2 = $query->result_array();
            return $query2;
        } else {
            return false;
        }
    }


    public function email_exists()
    {
        $email = $this->input->post('email_reset');
        $query = $this->db->query("SELECT user_email, user_password FROM users WHERE user_email='$email'");
        if ($row = $query->row()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function temp_reset_password($temp_pass)
    {
        $data = array(
            'user_email' => $this->input->post('email_reset'),
            'reset_pass' => $temp_pass);
        $email = $data['user_email'];

        if ($data) {
            $this->db->where('user_email', $email);
            $this->db->update('users', $data);
            return TRUE;
        } else {
            return FALSE;
        }

    }

    public function is_temp_pass_valid($temp_pass)
    {
        $this->db->where('reset_pass', $temp_pass);
        $query = $this->db->get('users');
        if ($query->num_rows() == 1) {
            return TRUE;
        } else return FALSE;
    }

    public function update_password($temp_pass, $password)
    {
        $data = array(
			'reset_pass' => NULL,
            'user_password' => $password);
        $this->db->update('users', $data)->where('reset_pass', $temp_pass);
//        $this->db->update('users', $data);
        echo TRUE;
    }
	
	public function update_password_new($conf_pass,$password,$email_reset)
    {
        if($conf_pass==$password){
			
			
			$data = array('reset_pass' => NULL,'user_password' => $password);
			$this->db->where('user_email', $email_reset);
			$query = $this->db->update('users', $data);
			return TRUE;
		}else{
			return FALSE;
		}
    }
	
	public function reset_token($token)
    {
        $query = $this->db->query("SELECT * FROM users WHERE reset_pass='$token'");
        if ($row = $query->row()) {
            return $row;
        } else {
            return FALSE;
        }
    }
	
	public function update_password_frontend($temp_pass, $password, $userid)
    {
		$data = array('reset_pass' => NULL,'user_password' => $password);
		$this->db->where('user_id', $userid);
        $query = $this->db->update('users', $data);
        echo TRUE;
    }


}

?>