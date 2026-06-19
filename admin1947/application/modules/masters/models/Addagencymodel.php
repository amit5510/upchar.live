<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Addagencymodel extends CI_Model{
	
	
	
	public function agencyinsert($signature)
	{
		$date=date('Y-m-d h:i:s');
		$dpr=$this->input->post('dpr');
		$companyname=$this->input->post('companyname');
		$contactperson=$this->input->post('contactperson');
		$companyaddress=$this->input->post('companyaddress');
		$city=$this->input->post('city');
		$state=$this->input->post('state');
		$district=$this->input->post('district');
		$pin=$this->input->post('pin');
		$email=$this->input->post('email');
		$contactnumber=$this->input->post('contactnumber');
		
		$data=array('companyname'=>$companyname,'contactperson'=>$contactperson,'companyaddress'=>$companyaddress,'city'=>$city,'state'=>$state,'district'=>$district,'pin'=>$pin,'email'=>$email,'contactnumber'=>$contactnumber,'status'=>1,'time_stamp'=>$date,'ip'=>getUserIP(),'user_agent'=>getUserAgent(),'created_by'=>getUserId());
		$r=$this->db->insert('master_addagency',$data);
		
		$agency_id=$this->db->insert_id();
		$dpragency = array('agency_id'=>$agency_id,'dpr_id'=>$dpr,'ip'=>getUserIP(),'user_agent'=>getUserAgent(),'created_by'=>getUserId());
		$this->db->insert('dpr_agency',$dpragency);
		
		return (!$r) ? false : true;
	}
	
	public function agencyedit($id)
	{
		$dpr=$this->input->post('dpr');
		$companyname=$this->input->post('companyname');
		$contactperson=$this->input->post('contactperson');
		$companyaddress=$this->input->post('companyaddress');
		$city=$this->input->post('city');
		$state=$this->input->post('state');
		$district=$this->input->post('district');
		$pin=$this->input->post('pin');
		$email=$this->input->post('email');
		$contactnumber=$this->input->post('contactnumber');
		
		$data=array('companyname'=>$companyname,'contactperson'=>$contactperson,'companyaddress'=>$companyaddress,'city'=>$city,'state'=>$state,'district'=>$district,'pin'=>$pin,'email'=>$email,'contactnumber'=>$contactnumber);
		$this->db->where('agency_id',$id);
		$r=$this->db->update('master_addagency',$data);
		return (!$r) ? false : true;
	}
	
	public function agencydelete($uid)
	{
		$this->db->where('agency_id',$uid);
		$r=$this->db->delete('master_addagency');
		return (!$r) ? false : true;
	}
}