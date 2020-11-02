<?php
class Businessinsigt extends CI_Controller{
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
        $this->load->model('Businessinsigt_model','Businessinsigt');
        $this->load->model('User_model','User');

        if($this->User->is_logged_in('admin')==false){
            redirect(base_url(), 'refresh');
        }
        $this->page_data['user_role'] = $this->session->userdata('type');
        $this->page_data['user_directory'] = $this->session->userdata('type')."/";
        $this->page_data['directory'] = "businessinsigt";
    }
    public function index()
    {
       
        $this->home();
    }
    public function home()
    {
        $this->page_data['page_name'] = 'add_businessinsigt';

         
      //  print_r( $this->page_data['category']);



          $this->load->view('Index',$this->page_data);


        // $result = $this->Article->select_article();

        // print_r($result);




    }
    ##Article
    public function select()
    {   
       // print_r( $this->Article->select_article($data));
        $json_data=array();
        $j=0;

        $data['delete_status'] = 0;
        $result = $this->Businessinsigt->select_businessinsigt($data);
        
        $result_array=$result->result();

        $json_data['draw']=5;
        $json_data['recordsTotal']=$result->num_rows();
        $json_data['recordsFiltered']=$result->num_rows();
        $array=array();
       
        foreach($result_array as $row):
           // echo($row->id);
            $id=$row->id;
            
            $img='<img style="width:50px;height: 50px;" src="'.base_url().'uploads/businessinsigt/'. $row->businessinsigt_image.'">';
            $title =$row->title;
            $description =$row->description;
            $write_by =$row->write_by;
           // $link =$row->link;
             $pdf='<img style="width:50px;height: 50px;" src="'.base_url().'uploads/businessinsigt/pdf.jpg">';

            $btn_edit='<a style="margin-left: 5px;margin-right: 5px" id="businessinsigt_edit_btn" href="#businessinsigt_edit_modal" data-toggle="modal" class="btn btn-warning m-btn m-btn--icon  m-btn--icon-only  m-btn--pill m-btn--air">
                            <i class="la la-edit"></i>
                        </a>';
            $btn_delete='<a style="margin-left: 5px;margin-right: 5px" id="businessinsigt_delete_btn" href="#businessinsigt_delete_modal" data-toggle="modal" class="btn btn-danger m-btn m-btn--icon  m-btn--icon-only  m-btn--pill m-btn--air">
                            <i class="la la-trash"></i>
                        </a>';
            

            $array[$j][]=$row->id;
            $array[$j][]=$row->id;
           
            $array[$j][]=$img;
            $array[$j][]=$row->title;
            $array[$j][]=$row->description;
            $array[$j][]=$row->write_by;
            $array[$j][]=$pdf;
            $array[$j][]=$row->created_date;


            $array[$j][]=$btn_edit.$btn_delete;
            $j++;
        endforeach;

        $json_data['data']=$array;
        echo json_encode($json_data);  // send data as json format
    }
    public function create()
    {

      
        if ($_FILES['uploaded_file']["size"] > 0) {
            $target_path = "uploads/businessinsigt/";
            $target_path1 = "uploads/businessinsigt/";
            $filename = basename($_FILES['uploaded_file']['name']);

            $target_path = $target_path . $filename;

            while (file_exists($target_path)) {

                $filename = rand(0, 1000) . $filename;
                $target_path = $target_path . $filename;
            }

            if (!move_uploaded_file($_FILES['uploaded_file']["tmp_name"], $target_path1 . $filename)) {

                $imageerror = "An Error Occurred While Trying to Upload Image";
            }
            $data['businessinsigt_image'] = $filename;
        }else{
            $data['businessinsigt_image'] = 'noimage.png';
        }
          $data['title'] = $this->security->xss_clean($this->input->post('title'));
          $data['description'] = $this->security->xss_clean($this->input->post('description'));
          $data['write_by'] = $this->security->xss_clean($this->input->post('write_by'));
         // $data['link'] = $this->security->xss_clean($this->input->post('link'));

            if ($_FILES['uploaded_pdf']["size"] > 0) {
            $target_path = "uploads/businessinsigt/";
            $target_path1 = "uploads/businessinsigt/";
            $filename = basename($_FILES['uploaded_pdf']['name']);

            $target_path = $target_path . $filename;

            while (file_exists($target_path)) {

                $filename = rand(0, 1000) . $filename;
                $target_path = $target_path . $filename;
            }

            if (!move_uploaded_file($_FILES['uploaded_pdf']["tmp_name"], $target_path1 . $filename)) {

                $imageerror = "An Error Occurred While Trying to Upload Image";
            }
            $data['pdf'] = $filename;
        }else{
            $data['pdf'] = 'noimage.pdf';
        }




          $data['created_date'] = date('Y-m-d');

        $result=$this->Businessinsigt->insert_businessinsigt($data);
        if($result==1)
        {
            $flash_data['flashdata_msg'] = 'Businessinsigt Created Successfully!';
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
        redirect(base_url() . $this->page_data['user_directory'].'businessinsigt', 'refresh');
    }
    public function update()
    {

        $data['id'] = $this->security->xss_clean($this->input->post('id'));

        
        if ($_FILES['uploaded_file']["size"] > 0) {
            $target_path = "uploads/businessinsigt/";
            $target_path1 = "uploads/businessinsigt/";
            $filename = basename($_FILES['uploaded_file']['name']);

            $target_path = $target_path . $filename;

            while (file_exists($target_path)) {

                $filename = rand(0, 1000) . $filename;
                $target_path = $target_path . $filename;
            }

            if (!move_uploaded_file($_FILES['uploaded_file']["tmp_name"], $target_path1 . $filename)) {

                $imageerror = "An Error Occurred While Trying to Upload Image";
            }
            $data['businessinsigt_image'] = $filename;
        }
         $data['title'] = $this->security->xss_clean($this->input->post('title'));
         $data['description'] = $this->security->xss_clean($this->input->post('description'));
          $data['write_by'] = $this->security->xss_clean($this->input->post('write_by'));

           if ($_FILES['uploaded_pdf']["size"] > 0) {
            $target_path = "uploads/businessinsigt/";
            $target_path1 = "uploads/businessinsigt/";
            $filename = basename($_FILES['uploaded_pdf']['name']);

            $target_path = $target_path . $filename;

            while (file_exists($target_path)) {

                $filename = rand(0, 1000) . $filename;
                $target_path = $target_path . $filename;
            }

            if (!move_uploaded_file($_FILES['uploaded_pdf']["tmp_name"], $target_path1 . $filename)) {

                $imageerror = "An Error Occurred While Trying to Upload Image";
            }
            $data['pdf'] = $filename;
        }
         // $data['link'] = $this->security->xss_clean($this->input->post('link'));
          $data['created_date'] = date('Y-m-d H:i:s');




        $result=$this->Businessinsigt->update_businessinsigt($data);
        if($result==1)
        {
            $flash_data['flashdata_msg'] = 'Businessinsigt Updated Successfully!';
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
        redirect(base_url() . $this->page_data['user_directory'].'businessinsigt', 'refresh');
    }
    public function delete()
    {
        $data['id'] = $this->security->xss_clean($this->input->post('deleteid'));
        // $data['category'] = $this->security->xss_clean($this->input->post('deleteid'));
        $data['delete_status']=1;
        $result=$this->Businessinsigt->update_businessinsigt($data);
        if($result==1)
        {
            $flash_data['flashdata_msg'] = 'Businessinsigt Updated Successfully!';
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
        redirect(base_url() . $this->page_data['user_directory'].'businessinsigt', 'refresh');
    }
}
