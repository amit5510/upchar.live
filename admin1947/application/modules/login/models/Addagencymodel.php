<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Addagencymodel extends CI_Model{
	
	
	
	public function agencyinsert($signature)
	{
		$date=date('Y-m-d h:i:s');
		$companyname=$this->input->post('companyname');
		$contactperson=$this->input->post('contactperson');
		$companyaddress=$this->input->post('companyaddress');
		$city=$this->input->post('city');
		$state=$this->input->post('state');
		$district=$this->input->post('district');
		$pin=$this->input->post('pin');
		$email=$this->input->post('email');
		$contactnumber=$this->input->post('contactnumber');
		
		$data=array('companyname'=>$companyname,'contactperson'=>$contactperson,'companyaddress'=>$companyaddress,'city'=>$city,'state'=>$state,'district'=>$district,'pin'=>$pin,'email'=>$email,'contactnumber'=>$contactnumber,'status'=>1,'time_stamp'=>$date);
		$this->db->insert('master_addagency',$data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	
	public function agencyedit($id)
	{
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
		$this->db->update('master_addagency',$data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	
	public function agencydelete($uid)
	{
		$this->db->where('agency_id',$uid);
		$this->db->delete('master_addagency');
		
		return ($this->db->affected_rows() != 1) ? false : true;
	}
}