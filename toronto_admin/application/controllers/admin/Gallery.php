<?php
class Gallery extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->initial();
    }
    public function initial()
    {
        ini_set('max_execution_time', 5000);
        ini_set("memory_limit", "-1");
        date_default_timezone_set('Asia/Kolkata');
        $this->load->model('Gallery_model','Gallery');
        $this->load->model('User_model','User');

        if($this->User->is_logged_in('admin')==false){
            redirect(base_url(), 'refresh');
        }
        $this->page_data['user_role'] = $this->session->userdata('type');
        $this->page_data['user_directory'] = $this->session->userdata('type')."/";
        $this->page_data['directory'] = "gallery";
    }
    public function index()
    {
       
        $this->home();
    }
    public function home()
    {
        $this->page_data['page_name'] = 'add_gallery';

         
      //  print_r( $this->page_data['category']);



          $this->load->view('Index',$this->page_data);


        // $result = $this->Gallery->select_gallery();

        // print_r($result);




    }
    ##GALLERY
    public function select()
    {   
       // print_r( $this->Gallery->select_gallery($data));
        $json_data=array();
        $j=0;

        $data['delete_status'] = 0;
        $result	= $this->Gallery->select_gallery($data);
        
        $result_array=$result->result();

        $json_data['draw']=5;
        $json_data['recordsTotal']=$result->num_rows();
        $json_data['recordsFiltered']=$result->num_rows();
        $array=array();
       
        foreach($result_array as $row):
           // echo($row->gallery_id);
            $id=$row->gallery_id;
            
            $img='<img style="width:50px;height: 50px;" src="'.base_url().'uploads/gallery/'. $row->gallery_image.'">';
            $title =$row->title;
              $description =$row->description;

            $btn_edit='<a style="margin-left: 5px;margin-right: 5px" id="gallery_edit_btn" href="#gallery_edit_modal" data-toggle="modal" class="btn btn-warning m-btn m-btn--icon  m-btn--icon-only  m-btn--pill m-btn--air">
                            <i class="la la-edit"></i>
                        </a>';
            $btn_delete='<a style="margin-left: 5px;margin-right: 5px" id="gallery_delete_btn" href="#gallery_delete_modal" data-toggle="modal" class="btn btn-danger m-btn m-btn--icon  m-btn--icon-only  m-btn--pill m-btn--air">
                            <i class="la la-trash"></i>
                        </a>';
            

            $array[$j][]=$row->gallery_id;
            $array[$j][]=$row->gallery_id;
           
            $array[$j][]=$img;
            $array[$j][]=$row->title;
            $array[$j][]=$row->description;
            $array[$j][]=$btn_edit.$btn_delete;
            $j++;
        endforeach;

        $json_data['data']=$array;
        echo json_encode($json_data);  // send data as json format
    }
    public function create()
    {

      
        if ($_FILES['uploaded_file']["size"] > 0) {
            $target_path = "uploads/gallery/";
            $target_path1 = "uploads/gallery/";
            $filename = basename($_FILES['uploaded_file']['name']);

            $target_path = $target_path . $filename;

            while (file_exists($target_path)) {

                $filename = rand(0, 1000) . $filename;
                $target_path = $target_path . $filename;
            }

            if (!move_uploaded_file($_FILES['uploaded_file']["tmp_name"], $target_path1 . $filename)) {

                $imageerror = "An Error Occurred While Trying to Upload Image";
            }
            $data['gallery_image'] = $filename;
        }else{
            $data['gallery_image'] = 'noimage.png';
        }
          $data['title'] = $this->security->xss_clean($this->input->post('title'));
           $data['description'] = $this->security->xss_clean($this->input->post('description'));

        $result=$this->Gallery->insert_gallery($data);
        if($result==1)
        {
            $flash_data['flashdata_msg'] = 'Gallery Created Successfully!';
            $flash_data['flashdata_type'] = 'info';
            $flash_data['alert_type'] = 'info';
            $flash_data['flashdata_title'] = 'Success !';
        } else {
            $flash_data['flashdata_msg'] = 'Sorry.. There Have been Some Error Occurred. Please Try Again!';
            $flash_data['flashdata_type'] = 'error';
            $flash_data['alert_type'] = 'danger';
            $flash_data['flashdata_title'] = 'Error !!';
        }
        $this->session->set_flashdata($flash_data);
        redirect(base_url() . $this->page_data['user_directory'].'gallery', 'refresh');
    }
    public function update()
    {

        $data['gallery_id'] = $this->security->xss_clean($this->input->post('gallery_id'));

        
        if ($_FILES['uploaded_file']["size"] > 0) {
            $target_path = "uploads/gallery/";
            $target_path1 = "uploads/gallery/";
            $filename = basename($_FILES['uploaded_file']['name']);

            $target_path = $target_path . $filename;

            while (file_exists($target_path)) {

                $filename = rand(0, 1000) . $filename;
                $target_path = $target_path . $filename;
            }

            if (!move_uploaded_file($_FILES['uploaded_file']["tmp_name"], $target_path1 . $filename)) {

                $imageerror = "An Error Occurred While Trying to Upload Image";
            }
            $data['gallery_image'] = $filename;
        }
         $data['title'] = $this->security->xss_clean($this->input->post('title'));
         $data['description'] = $this->security->xss_clean($this->input->post('description'));



        $result=$this->Gallery->update_gallery($data);
        if($result==1)
        {
            $flash_data['flashdata_msg'] = 'Gallery Updated Successfully!';
            $flash_data['flashdata_type'] = 'info';
            $flash_data['alert_type'] = 'info';
            $flash_data['flashdata_title'] = 'Success !';
        } else {
            $flash_data['flashdata_msg'] = 'Sorry.. There Have been Some Error Occurred. Please Try Again!';
            $flash_data['flashdata_type'] = 'error';
            $flash_data['alert_type'] = 'danger';
            $flash_data['flashdata_title'] = 'Error !!';
        }
        $this->session->set_flashdata($flash_data);
        redirect(base_url() . $this->page_data['user_directory'].'gallery', 'refresh');
    }
    public function delete()
    {
        $data['gallery_id'] = $this->security->xss_clean($this->input->post('deleteid'));
        // $data['category'] = $this->security->xss_clean($this->input->post('deleteid'));
        $data['delete_status']=1;
        $result=$this->Gallery->update_gallery($data);
        if($result==1)
        {
            $flash_data['flashdata_msg'] = 'Gallery Updated Successfully!';
            $flash_data['flashdata_type'] = 'error';
            $flash_data['alert_type'] = 'danger';
            $flash_data['flashdata_title'] = 'Error !';
        } else {
            $flash_data['flashdata_msg'] = 'Sorry.. There Have been Some Error Occurred. Please Try Again!';
            $flash_data['flashdata_type'] = 'error';
            $flash_data['alert_type'] = 'danger';
            $flash_data['flashdata_title'] = 'Error !!';
        }
        $this->session->set_flashdata($flash_data);
        redirect(base_url() . $this->page_data['user_directory'].'gallery', 'refresh');
    }
}
/**
 * Created by PhpStorm.
 * User: renju
 * Date: 15-03-2018
 * Time: 10:49 AM
 */