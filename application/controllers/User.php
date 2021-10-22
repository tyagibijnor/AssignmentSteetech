<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation','session');
        $data = array();
        $sdata=array();
        $this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn'); 
        }
    public function index() {
        //1.A bootstrap Login page  with session and display values into index page (design with bootstrap)
        if($this->isUserLoggedIn){ 
            $data['title'] = 'Steetech';
            $data['doctor'] = $this->user_model->getDoctor();
            $data['header'] = $this->load->view('doctor/header',$data,TRUE);
            $data['sidebar'] = $this->load->view('doctor/sidebar',$data,TRUE);
            $data['content'] = $this->load->view('doctor/index',$data,TRUE);
            $data['footer'] = $this->load->view('doctor/footer',$data,TRUE);
            $this->load->view('home',$data); }
        else{ 
            $this->login();  } 
    }
    
    public function login(){
        $data['title'] = 'Login';
        $data['header'] = $this->load->view('user/header',$data,TRUE);
        $data['content'] = $this->load->view('user/login',$data,TRUE);
        $data['footer'] = $this->load->view('user/footer',$data,TRUE);
        $this->load->view('home',$data);
    }
    
    public function checkuser() {
        $data['username'] = $this->input->post('username');
        $data['password'] = md5($this->input->post('pass'));
        $getUser = $this->user_model->getUser($data);
        if($getUser) {
            $this->session->set_userdata('isUserLoggedIn', TRUE); 
            $this->session->set_userdata('userId', $getUser->id);
            $this->session->set_userdata('userName', $getUser->username);
            $this->session->set_userdata('email', $getUser->email);
            $this->session->set_userdata('roleid', $getUser->roleid);
            redirect('user/index'); }
        else{
            $sdata['msg'] = '<span style="color:Red">Wrong username or password, please try again.</span>';
            $this->session->set_flashdata($sdata);
            redirect('user/login'); }                            
    }

    public function signup(){  
        $data['title'] = 'SignUp';
        $data['header'] = $this->load->view('user/header',$data,TRUE);
        $data['content'] = $this->load->view('user/signup',$data,TRUE);
        $data['footer'] = $this->load->view('user/footer',$data,TRUE);
        $this->load->view('home',$data);
    }

    public function registration(){
            if($this->input->post('signupSubmit')){ 
            $this->form_validation->set_rules('username', 'Username', 'required|is_unique[steetech_tblUser.username]'); 
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[steetech_tblUser.email]'); 
            $this->form_validation->set_rules('password', 'password', 'required'); 
            $this->form_validation->set_rules('confirmpassword', 'confirm password', 'required|matches[password]');  
            $userData = array( 
                'username' => strip_tags($this->input->post('username')), 
                'email' => strip_tags($this->input->post('email')), 
                'password' => md5($this->input->post('password'))
                );  
            if($this->form_validation->run() == true){ 
                $insert = $this->user_model->insert($userData); 
                if($insert){ 
                    $sdata['msg'] = '<span style="color:Green">Registration has been successful. Please login.</span>';
                    $this->session->set_flashdata($sdata);
                    redirect('user/login');}
                else{ 
                    $sdata['msg'] = '<span style="color:Red">Some problems occured, please try again.</span>';
                    $this->session->set_flashdata($sdata);
                    redirect('user/signup'); } 
                }
            else{ 
                $err = validation_errors();
                $sdata['msg'] = '<span style="color:Red">Error '.$err.'.</span>';
                $this->session->set_flashdata($sdata);
                redirect('user/signup'); } 
            }
    }

    public function logout(){ 
        $this->session->unset_userdata('isUserLoggedIn'); 
        $this->session->unset_userdata('userId'); 
        $this->session->sess_destroy(); 
        redirect('user/login/');  } 
    
    public function deletedoctor($id){
        $this->user_model->deletedoctor($id);
        redirect("user/index");
    }

    public function editdoctor($id){
        $data['title'] = 'Edit Record - '.$id;
        $data['doctor'] = $this->user_model->getDoctorbyId($id);
        $data['content'] = $this->load->view('doctor/edit',$data,TRUE);
        $this->load->view('home',$data);
        
    }
    public function updatedoctor()
    {
         $data['id'] = $this->input->post('id');
         $data['name'] = $this->input->post('name');
         $data['address'] = $this->input->post('address');
         $update = $this->user_model->updatedoctor($data); 
         if($update){ 
             $sdata['msg'] = '<span style="color:Green">Record has been update successful.</span>';
             $this->session->set_flashdata($sdata);
             redirect('user/index');}
         else{ 
             $sdata['msg'] = '<span style="color:Red">Some problems occured, please try again.</span>';
             $this->session->set_flashdata($sdata);
             redirect('user/index'); } 
    }

    public function showgallery($id){
        if( ($id == 1) && ($this->isUserLoggedIn)){

            $data['title'] = 'Gallery';
            $data['doctor'] = $this->user_model->getDoctorGallery();
            $data['header'] = $this->load->view('doctor/header',$data,TRUE);
            $data['sidebar'] = $this->load->view('doctor/sidebar',$data,TRUE);
            $data['content'] = $this->load->view('doctor/gallery',$data,TRUE);
            $data['footer'] = $this->load->view('doctor/footer',$data,TRUE);
            $this->load->view('home',$data); }        
        else{
             die('Invalid request');   
        }
    }

    public function addgallery(){
                $data['title'] = 'Gallery';
                $data['doctorlist'] = $this->user_model->getDoctor();
                $data['content'] = $this->load->view('doctor/addgallery',$data,TRUE);
                $this->load->view('home',$data); }
    public function galleryadd(){
        $data['did'] = $this->input->post('did');
            $id = $data['did'];
            $data['imagepath'] = time()."_".$_FILES["newimagepath"]['name'];
            $config['file_name'] = $data['imagepath'];
            $config['encrypt_name'] = false;
            $config['allowed_types'] = 'png|jpg|jpeg';
            $config['upload_path'] = './uploads/';
            $this->load->library('upload', $config);
               if(!$this->upload->do_upload('newimagepath') || empty($id))
                   {
                    $err = $this->upload->display_errors();
                    $sdata=array();
                    $sdata['msg'] = '<span style="color:red">Field is missing or '.$err.'</span>';
                    $this->session->set_flashdata($sdata);
                    redirect("user/showgallery/1");
                    }
                else {
                    $this->upload->do_upload('newimagepath');
                    $this->user_model->uploadgallery($data);
                    $sdata=array();
                    $sdata['msg'] = '<span style="color:green">Updated Succesfully</span>';
                    $this->session->set_flashdata($sdata);
                    redirect("user/showgallery/1");
                    }
                }
    }
