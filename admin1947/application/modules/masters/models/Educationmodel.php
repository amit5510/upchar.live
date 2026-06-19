<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Educationmodel extends CI_Model{
	
	
	
	public function educationinsert()
	{
		$date=date('Y-m-d h:i:s');
		$eduname=$this->input->post('education');
		$data=array('education_name'=>$eduname,'time_stamp'=>$date);
		$r=$this->db->insert('master_education',$data);
		return (!$r) ? false : true;
	}
	
	public function educationedit($id)
	{
		$eduname=$this->input->post('education');
		$data=array('education_name'=>$eduname);
		$this->db->where('education_id',$id);
		$r=$this->db->update('master_education',$data);
		return (!$r) ? false : true;
	}
	
	public function educationdelete($uid)
	{
		$this->db->where('education_id',$uid);
		$r=$this->db->delete('master_education');
		return (!$r) ? false : true;
	}
	
	public function educationstatus($uid)
	{
		$status=$this->db->get_where('master_education',array('education_id'=>$uid))->row('status');
		if($status==1)
		{
			$data=array('status'=>0);
			$this->db->where('education_id',$uid);
			$this->db->update('master_education',$data);
			echo "Hide";
		}
		else{
			$data=array('status'=>1);
			$this->db->where('education_id',$uid);
			$this->db->update('master_education',$data);
			echo "Show";
		}
		
	}
}