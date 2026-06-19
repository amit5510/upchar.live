<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Traineeupdatemodel extends CI_Model{
	
	
	
	public function traineeedit($id,$uploadimage)
	{
			$date=date('Y-m-d h:i:s');
			$dpr=$this->input->post('dpr');
			$fddicenter=$this->input->post('fddicenter');
			$fddi_subcenter=$this->input->post('fddi_subcenter');
			$course=$this->input->post('course');
			$t_fname=$this->input->post('t_fname');
			$t_mname=$this->input->post('t_mname');
			$t_lname=$this->input->post('t_lname');
			$f_fname=$this->input->post('f_fname');
			$f_mname=$this->input->post('f_mname');
			$f_lname=$this->input->post('f_lname');
			$f_occupation=$this->input->post('f_occupation');
			$f_contact=$this->input->post('f_contact');
			$aadhar=$this->input->post('aadhar');
			$dob=$this->input->post('dob');
			$gender=$this->input->post('gender');
			$handicaped=$this->input->post('handicaped');
			$category=$this->input->post('category');
			$religion=$this->input->post('religion');
			$marital_status=$this->input->post('marital_status');
			$id_document=$this->input->post('id_document');
			$documentno=$this->input->post('documentno');
			$address=$this->input->post('address');
			$state=$this->input->post('state');
			$district=$this->input->post('district');
			$block=$this->input->post('block');
			
			$village=$this->input->post('village');
			$phone=$this->input->post('phone');
			$pin=$this->input->post('pin');
			$email=$this->input->post('email');
			$mobile=$this->input->post('mobile');
			$active=$this->input->post('active');
			$aadharbank=$this->input->post('aadharbank');
			$education=$this->input->post('education');
			$educationstream=$this->input->post('educationstream');
			$passyear=$this->input->post('passyear');
			$markobtain=$this->input->post('markobtain');
			$institutename=$this->input->post('institutename');
			$skill=$this->input->post('skill');
			$objective=$this->input->post('objective');
			$currentemployment=$this->input->post('currentemployment');
			$companyaddress=$this->input->post('companyaddress');
			$companycontact=$this->input->post('companycontact');
			$companyemail=$this->input->post('companyemail');
			$t_bankname=$this->input->post('t_bankname');
			$t_bankbranch=$this->input->post('t_bankbranch');
			$t_accountno=$this->input->post('t_accountno');
			$t_ifsc=$this->input->post('t_ifsc');
			$bplnumber=$this->input->post('bplcode');
			if($bplnumber==null)
			{
			    $bplnumber=0;
			}
			if($uploadimage=='')
			{
				$uploadimage=$this->db->get_where('fddi_trainee_registration',array('id'=>$id))->row('uploaded_image');
			}
			$data=array('dpr'=>$dpr,'center'=>$fddicenter,'subcenter'=>$fddi_subcenter,'course'=>$course,'t_first_name'=>$t_fname,'t_middle_name'=>$t_mname,'t_last_name'=>$t_lname,'f_first_name'=>$f_fname,'f_middle_name'=>$f_mname,'f_last_name'=>$f_lname,'f_occupation'=>$f_occupation,'f_contactno'=>$f_contact,'aadhar'=>$aadhar,'bplnumber'=>$bplnumber,'dob'=>$dob,'gender'=>$gender,'handicapped'=>$handicaped,'category'=>$category,'religion'=>$religion,'marital_status'=>$marital_status,'id_document'=>$id_document,'document_no'=>$documentno,'address'=>$address,'state'=>$state,'district'=>$district,'block'=>$block,'village'=>$village,'phone'=>$phone,'pin'=>$pin,'email'=>$email,'mobile'=>$mobile,'active'=>$active,'uploaded_image'=>$uploadimage,'aadhar_bank'=>$aadharbank,'education'=>$education,'education_stream'=>$educationstream,'pass_year'=>$passyear,'mark_obtain'=>$markobtain,'institute'=>$institutename,'skill'=>$skill,'objective'=>$objective,'current_employment'=>$currentemployment,'company_address'=>$companyaddress,'company_contact'=>$companycontact,'company_email'=>$companyemail,'t_bankname'=>$t_bankname,'t_bankbranch'=>$t_bankbranch,'t_accountno'=>$t_accountno,'t_ifsccode'=>$t_ifsc,'time_stamp'=>$date);
				
			$this->db->where('id',$id);
			$this->db->update('fddi_trainee_registration',$data);
			
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	
	public function checkTraineeUpdate($id)
	{
			$batch_data =  $this->db
						->select('approval,assessed')
						->where('trainee_id',$id)
						->join('fddi_trainee_batch','fddi_trainee_batch.batch_id=fddi_batch.batch_id')
						->get('fddi_batch');
			$traineecount =  $batch_data->num_rows();
			$batch_data =  $batch_data->row();
			if($traineecount==0)
				return true;		// if trainee not batched
			else{
			$batch_approval=$batch_data->approval;
			$batch_assessed=$batch_data->assessed;
			if($batch_approval=='P')		//if batch not approved
				return true;
			else if($batch_assessed=='0' && getUserType()=='MA')  // if batch approved but not accessed and user is admin
				return true;
			else
				return false;
			}
	}
	
}