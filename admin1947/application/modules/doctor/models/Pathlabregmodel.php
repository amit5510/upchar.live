<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pathlabregmodel extends CI_Model{
	
	     
	 
	
	public function traineereginsert($drimage,$id_proof='',$med_reg_proof='')
	{
			$date=date('Y-m-d h:i:s');
			
			$city=$this->input->post('city');
			$fname=$this->input->post('name');	
			$email=$this->input->post('email');
			$mobile=$this->input->post('mobile');
			$location=$this->input->post('location');
			$address=$this->input->post('address');
			$website=$this->input->post('website');
			$about=$this->input->post('about');
			
			
		$data=array('name'=>$fname,'city'=>$city,'drimage'=>$drimage,'id_proof'=>$id_proof,'med_reg_proof'=>$med_reg_proof,'mobile'=>$mobile,'email'=>$email,'creat_date'=>$date,'location'=>$location,'address'=>$address,'website'=>$website,'about'=>$about);
			
	       $this->db->insert('pathlab',$data);
		//return $query->result();
	      return ($this->db->affected_rows() != 1) ? false : true;
	}


	
     public function pathlab_duplicacy_check()
	{
		$email=$this->input->post('email');
		$mobile=$this->input->post('mobile');
		$mobile_count = $this->db->where('mobile',$mobile)->count_all_results('pathlab');
		$email_count = $this->db->where('email',$email)->count_all_results('pathlab');
		//return 'OK';
		if($mobile_count ==0 && $email_count==0)
			return 'OK';
		else if($mobile_count >0 && $email_count>0)
			return 'BOTH';
		else if($mobile_count ==0)
			return 'MOBILE';
		else if($email_count==0)
			return 'EMAIL';
	}




    public function updatepathlab($id)
       {
      
             
			$date=date('Y-m-d h:i:s');
			
			$city=$this->input->post('city');
			$fname=$this->input->post('name');	
			$email=$this->input->post('email');
			$mobile=$this->input->post('mobile');
			$location=$this->input->post('location');
			$address=$this->input->post('address');
			$website=$this->input->post('website');
			$about=$this->input->post('about');
			
			
		$data=array('name'=>$fname,'city'=>$city,'mobile'=>$mobile,'email'=>$email,'creat_date'=>$date,'location'=>$location,'address'=>$address,'website'=>$website,'about'=>$about);
			
			$this->db->where('id',$id);
	       $this->db->update('pathlab',$data);

       }

      
	}