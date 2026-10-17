<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

private $databaseLoaded = FALSE;

private function loadDatabase()
{
    if ( ! $this->databaseLoaded)
    {
        $this->load->database();
        $this->databaseLoaded = TRUE;
    }
}
public function insert($data)
{
     $this->loadDatabase();
     if($this->db->insert('tblUser',$data)) return true;
     else return false;

       
}

public function getUser($con)
{
    $this->loadDatabase();
    $this->db->select('*');
    $this->db->from('tblUser');
    $this->db->where('username',$con['username']);
    $this->db->where('password',$con['password']);
    $qresult = $this->db->get();        
    $result = $qresult->result();
    return isset($result[0]) ? $result[0] : NULL;
}
public function getDoctor(){
    $this->loadDatabase();
    //5.Sql query for create a storedprocedure to get all the doctor information and display in a php page
    $qresult = $this->db->query("CALL GetAllDoctor()");
    $result = $qresult->result();
    return $result;
}
public function getDoctorbyId($id){
        $this->loadDatabase();
        $this->db->select('*');
        $this->db->from('tbldoctor');
        $this->db->where('id',$id);
        $qresult = $this->db->get();        
        $result = $qresult->result();
        return isset($result[0]) ? $result[0] : NULL;
}
public function getDoctorGallery()
{
     $this->loadDatabase();
     $this->db->select('*');
     $this->db->from('tblGallery');
     $qresult = $this->db->get();        
     $result = $qresult->result();
     return $result;
}

public function uploadgallery($data)
{
    $this->loadDatabase();
    $this->db->insert('tblGallery',$data);
}
public function getdoctornamebyid($id){
    $this->loadDatabase();
    $this->db->select('name');
    $this->db->from('tbldoctor');
    $this->db->where('id',$id);
    $qresult = $this->db->get();        
    $result = $qresult->result();
    return isset($result[0]) ? $result[0] : NULL;

}


public function deletedoctor($id){
    $this->loadDatabase();
    $this->db->set('status',0);
    $this->db->where('id',$id);
    $this->db->update('tbldoctor');
    
}

public function updatedoctor($data){
        $this->loadDatabase();
        $this->db->set('name',$data['name']);
        $this->db->set('address',$data['address']);
        $this->db->where('id',$data['id']);
        if($this->db->update('tbldoctor')) return True;
        else return false;
}
}


?>