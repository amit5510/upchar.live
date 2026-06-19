<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Model{
	
	
	
	public function insert()
	{
	    $date=date('Y-m-d h:i:s');
	    $fname=$this->input->post('fname');
	    $lname=$this->input->post('lname');
	    $pwd=md5($this->input->post('password'));
	    $email=$this->input->post('email');
	   // $address=$this->input->post('address');
	    $gender=$this->input->post('activeradio');
	    $dob=$this->input->post('dob');
	    $height=$this->input->post('height');
	    $weight=$this->input->post('weight');
	    $blood=$this->input->post('blood');
	    $mobile=$this->input->post('mobile');
	    
	    
	    $data=array('MOBILE'=>$mobile,'FNAME'=>$fname,'LNAME'=>$lname,'PASSWORD'=>$pwd,'EMAIL'=>$email,'DOB'=>$dob,'MOBILE'=>$mobile,'REG_DATE'=>$date,'GENDER'=>$gender,'BGROUP'=>$blood,'HEIGHT'=>$height,'WEIGHT'=>$weight,'BGROUP'=>$blood);
	   
	    $this->db->insert('userlogin',$data);
	}

     function delete($id)
      {
        $this->db->query("delete from userlogin where USERID='".$id."'");
    }
    
    
}

