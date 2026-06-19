<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Coursefieldmodel extends CI_Model{
	
	public function coursefieldinsert()
	{
		$date=date('Y-m-d h:i:s');
		$eduname=$this->input->post('coursefield');
		$edustatus=$this->input->post('fieldstatus');
		$data=array('course_field_name'=>$eduname,'status'=>$edustatus,'time_stamp'=>$date);
		$r=$this->db->insert('master_course_field',$data);
		return (!$r) ? false : true;
	}
	
	public function coursefieldedit($id)
	{
		$eduname=$this->input->post('coursefield');
		$edustatus=$this->input->post('fieldstatus');
		$data=array('course_field_name'=>$eduname,'status'=>$edustatus);
		$this->db->where('course_field_id',$id);
		$r=$this->db->update('master_course_field',$data);
		return (!$r) ? false : true;
	}
	
	public function coursefielddelete($uid)
	{
		$this->db->where('course_field_id',$uid);
		$r=$this->db->delete('master_course_field');
		return (!$r) ? false : true;
	}
	
	public function coursefieldstatus($uid)
	{
		$status=$this->db->get_where('master_course_field',array('course_field_id'=>$uid))->row('status');
		if($status==1)
		{
			$data=array('status'=>0);
			$this->db->where('course_field_id',$uid);
			$this->db->update('master_course_field',$data);
			echo "Hide";
		}
		else{
			$data=array('status'=>1);
			$this->db->where('course_field_id',$uid);
			$this->db->update('master_course_field',$data);
			echo "Show";
		}
		
	}
}