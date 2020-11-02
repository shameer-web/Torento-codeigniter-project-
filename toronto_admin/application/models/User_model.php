<?php
class User_model extends CI_Model{

    public function is_logged_in()
    {
        // Return true or false based on the presence of user data
        if ($this->session->userdata('user_id') == ""){

            $flash_data['flashdata_msg'] = 'Sorry. Your Session Timed Out or You Have No Access to this Area';
            $flash_data['flashdata_type'] = 'warning';
            $flash_data['alert_type'] = 'warning';
            $flash_data['flashdata_title'] = 'No Access !';
            $this->session->set_flashdata($flash_data);

            return false;
        }else{
            return true;
        }
    }
    public function process_login($data)
    {
        // Run the query
        $query = $this->db->get_where('login',$data);
        return $query;
    }
    public function select_user($data='')
    {
        $this->db->select('*')->from('login');
        if(!empty($data)){
            $this->db->where($data);
        }
        $query = $this->db->get();
        return $query;
    }
    public function update_login($data='')
    {
        $this->db->where('login_id',$data['login_id']);
        $query=$this->db->update('login',$data);
        return $query;
    }
}
/**
 * Created by PhpStorm.
 * User: renju
 * Date: 14-03-2018
 * Time: 02:24 PM
 */