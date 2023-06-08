<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class search_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_autocomplete($data)
    {
        extract($data);
        /*$this->db->select('*');
        $this->db->like('product_name', $search_data);
        return $this->db->get('add_products',5);*/
        $result = $this->db->query('SELECT * FROM  customers WHERE seller_id="' . $user_id . '" and customer_person LIKE "%' . $search_data . '%" ');
        return $result;
    }

    public function get_search($id)
    {
        $query = $this->db->query("select * from add_products where id='$id'");
        $data = $query->result_array();
        return $data;
    }

}

?>