<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

public function __construct()
{
    $this->load->model('user_model');
    //$this->load->model('doctor_model');
           
}
public function insert($data)
{
     if($this->db->insert('steetech_tblUser',$data)) return true;
     else return false;

       
}

public function getUser($con)
{
    $this->db->select('*');
    $this->db->from('steetech_tblUser');
    $this->db->where('username',$con['username']);
    $this->db->where('password',$con['password']);
    $qresult = $this->db->get();        
    $result = $qresult->result();
    return $result[0];
}
public function getDoctor(){
    //5.Sql query for create a storedprocedure to get all the doctor information and display in a php page
    $qresult = $this->db->query("CALL GetAllDoctor()");
    $result = $qresult->result();
    return $result;
}
public function getDoctorbyId($id){
        $this->db->select('*');
        $this->db->from('steetech_tblDoctor');
        $this->db->where('id',$id);
        $qresult = $this->db->get();        
        $result = $qresult->result();
        return $result[0];
}
public function getDoctorGallery()
{
     $this->db->select('*');
     $this->db->from('steetech_tblGallery');
     $qresult = $this->db->get();        
     $result = $qresult->result();
     return $result;
}

public function uploadgallery($data)
{
    $this->db->insert('steetech_tblGallery',$data);
}
public function getdoctornamebyid($id){
    $this->db->select('name');
    $this->db->from('steetech_tbldoctor');
    $this->db->where('id',$id);
    $qresult = $this->db->get();        
    $result = $qresult->result();
    return $result[0];

}


public function deletedoctor($id){
    $this->db->set('status',0);
    $this->db->where('id',$id);
    $this->db->update('steetech_tbldoctor');
    
}

public function updatedoctor($data){
        $this->db->set('name',$data['name']);
        $this->db->set('address',$data['address']);
        $this->db->where('id',$data['id']);
        if($this->db->update('steetech_tbldoctor')) return True;
        else return false;
}
}


?>