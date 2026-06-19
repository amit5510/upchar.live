<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Addassessemodel extends CI_Model{
	
	public function addassessinsert()
	{
			$date=date('Y-m-d h:i:s');
			$courses=$this->input->post('course');
			$course=implode(',',$courses);
			$agency=$this->input->post('agency');
			$dpr=$this->input->post('dpr');
			$name=$this->input->post('name');
			$aadhar=$this->input->post('aadhar');
			$fathername=$this->input->post('fathername');;
			$dob=$this->input->post('dob');
			$gender=$this->input->post('gender');
			$category=$this->input->post('category');
			$religion=$this->input->post('religion');
			$education=$this->input->post('education');
			$address=$this->input->post('address');
			$state=$this->input->post('state');
			$district=$this->input->post('district');
			$block=$this->input->post('block');
			$village=$this->input->post('village');;
			$pin=$this->input->post('pin');
			$email=$this->input->post('email');
			$phone=$this->input->post('phone');
			$mobile=$this->input->post('mobile');
			$active=$this->input->post('active');
			$programname=$this->input->post('programname');
			$institute=$this->input->post('institute');
			$passingyear=$this->input->post('passingyear');
			$specialization=$this->input->post('specialization');
			$year=$this->input->post('year');
			$lassessor=$this->input->post('lassessor');
			if($lassessor==null)
			{
				$lassessor=0;
			}
			$assessor=$this->input->post('assessor');
			if($assessor==null)
			{
				$assessor=0;
			}
			
			$data=array('agency'=>$agency,'name'=>$name,'course'=>$course,'aadharnumber'=>$aadhar,'fathername'=>$fathername,'dob'=>$dob,'gender'=>$gender,'category'=>$category,'religion'=>$religion,'education'=>$education,'address'=>$address,'state'=>$state,'district'=>$district,'block'=>$block,'village'=>$village,'pin'=>$pin,'email'=>$email,'phone'=>$phone,'mobile'=>$mobile,'active'=>$active,'leadassessor'=>$lassessor,'assessor'=>$assessor,'program_name'=>$programname,'institute'=>$institute,'passing_year'=>$passingyear,'specialization'=>$specialization,'year'=>$year,'time_stamp'=>$date,'ip'=>getUserIP(),'user_agent'=>getUserAgent(),'created_by'=>getUserId());
			
			$r=$this->db->insert('master_add_assessee',$data);
			
				
			$assessee_id=$this->db->insert_id();
			$dpr_assessee = array('assessee_id'=>$assessee_id,'dpr_id'=>$dpr,'ip'=>getUserIP(),'user_agent'=>getUserAgent(),'created_by'=>getUserId());
			$this->db->insert('dpr_assessee',$dpr_assessee);
			
			return (!$r) ? false : true;
	}
	
	public function addassessedit($id)
	{
			$courses=$this->input->post('course');
			$course=implode(',',$courses);
			$agency=$this->input->post('agency');
			$dpr=$this->input->post('dpr');
			$name=$this->input->post('name');
			$aadhar=$this->input->post('aadhar');
			$fathername=$this->input->post('fathername');;
			$dob=$this->input->post('dob');
			$gender=$this->input->post('gender');
			$category=$this->input->post('category');
			$religion=$this->input->post('religion');
			$education=$this->input->post('education');
			$address=$this->input->post('address');
			$state=$this->input->post('state');
			$district=$this->input->post('district');
			$block=$this->input->post('block');
			$village=$this->input->post('village');;
			$pin=$this->input->post('pin');
			$email=$this->input->post('email');
			$phone=$this->input->post('phone');
			$mobile=$this->input->post('mobile');
			$active=$this->input->post('active');
			$programname=$this->input->post('programname');
			$institute=$this->input->post('institute');
			$passingyear=$this->input->post('passingyear');
			$specialization=$this->input->post('specialization');
			$year=$this->input->post('year');
			$lassessor=$this->input->post('lassessor');
			if($lassessor==null)
			{
				$lassessor=0;
			}
			$assessor=$this->input->post('assessor');
			if($assessor==null)
			{
				$assessor=0;
			}
			
			$data=array('agency'=>$agency,'dpr'=>$dpr,'name'=>$name,'course'=>$course,'aadharnumber'=>$aadhar,'fathername'=>$fathername,'dob'=>$dob,'gender'=>$gender,'category'=>$category,'religion'=>$religion,'education'=>$education,'address'=>$address,'state'=>$state,'district'=>$district,'block'=>$block,'village'=>$village,'pin'=>$pin,'email'=>$email,'phone'=>$phone,'mobile'=>$mobile,'active'=>$active,'leadassessor'=>$lassessor,'assessor'=>$assessor,'program_name'=>$programname,'institute'=>$institute,'passing_year'=>$passingyear,'specialization'=>$specialization,'year'=>$year);
			
			$this->db->where('id',$id);
			$r=$this->db->update('master_add_assessee',$data);
			
			return (!$r) ? false : true;
	}
	
	public function addassessedelete($uid)
	{
		$this->db->where('id',$uid);
		$r=$this->db->delete('master_add_assessee');
		
		return (!$r) ? false : true;
	}
	
}