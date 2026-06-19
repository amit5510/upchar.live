<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Rolewiseregmodel extends CI_Model{
	
	    
	
	public function traineereginsert()
	{
		
		$data  =	array(
							'level_name'	=>	$this->input->post('name'),
							'module'		=>	implode(",",$this->input->post('module')),
							'added_date'	=>	date('Y-m-d h:i:s'),
							'isStatus'		=>	$this->input->post('status')
						);
	    $this->db->insert('rolewise',$data);
	    return ($this->db->affected_rows() != 1) ? false : true;
	}


	
     public function rolewise_duplicacy_check()
	{
		$email=$this->input->post('email');
		$mobile=$this->input->post('mobile');
		$mobile_count = $this->db->where('mobile',$mobile)->count_all_results('rolewise');
		$email_count = $this->db->where('email',$email)->count_all_results('rolewise');
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




    public function updaterolewise($id)
       {
      
             
			$date=date('Y-m-d h:i:s');
			
			$fname=$this->input->post('name');
			$status=$this->input->post('status');	
			
		$data=array('level_name'=>$fname,'added_date'=>$date,'isStatus'=>$status);
			
			$this->db->where('level_id',$id);
	       $this->db->update('rolewise',$data);

       }

       function roledelete($id)
    {
        $this->db->query("delete from rolewise where level_id='".$id."'");
    }

      
	}