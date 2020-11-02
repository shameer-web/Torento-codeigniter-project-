<?php
class Admin_login extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->initial();
    }
    public function initial()
    {
        ini_set('max_execution_time', 5000);
        ini_set("memory_limit", "-1");
        date_default_timezone_set('Asia/Kolkata');
        $this->load->model('User_model','User');
    }
    public function index()
    {
        $this->load->view('login');
    }
    public function process()
    {
        $data['username'] = $this->security->xss_clean($this->input->post('email'));
        $data['password'] = $this->security->xss_clean($this->input->post('password'));

        // Load the model
        $result=$this->User->process_login($data);

        // Let's check if there are any results
        
       
        if($result->num_rows() == '1')
        {
            // If there is a user,
            $row = $result->row();


                $data = array(
                    'user_id' => $row->login_id,
                    'user_name' => $row->username,
                    'name' => $row->adm_name,
                    'type' => $row->user_role,
                    'validated' => true
                );
                $this->session->set_userdata($data);


                redirect(base_url().'admin/gallery', 'refresh');

        }else{
            
            $flash_data['flashdata_msg'] = 'Incorect username or password';
            $flash_data['flashdata_type'] = 'danger';
            $flash_data['alert_type'] = 'danger';
            $flash_data['flashdata_title'] = 'Invalid Login !';
            redirect(base_url(), 'refresh');
        }
    }
    function logout() {
        $array_items = array('user_id','validated');
        $this->session->sess_destroy();
        $this->session->unset_userdata($array_items);
        $this->session->set_flashdata('logout_notification', 'logged_out');

        redirect(base_url().'admin_login', 'refresh');
    }

}
/**
 * Created by PhpStorm.
 * User: renju
 * Date: 14-03-2018
 * Time: 02:08 PM
 */