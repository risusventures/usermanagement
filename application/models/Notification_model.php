<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class notification_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function message($data)
    {
        $query = $this->db->insert('notification', $data);
        return $query;
    }

    public function notification_msg()
    {
        $query = $this->db->query("select id from notification where status='unread'");
        $data = $query->num_rows();
        return $data;
    }


} ?>