<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Coursetypemodel extends CI_Model{
	
	
	
	public function coursetypeinsert()
	{
		$date=date('Y-m-d h:i:s');
		$eduname=$this->input->post('coursetype');
		$data=array('course_type_name'=>$eduname,'time_stamp'=>$date);
		$r=$this->db->insert('master_course_type',$data);
		return (!$r) ? false : true;
	}
	
	public function coursetypeedit($id)
	{
		$eduname=$this->input->post('coursetype');
		$data=array('course_type_name'=>$eduname);
		$this->db->where('course_type_id',$id);
		$r=$this->db->update('master_course_type',$data);
		return (!$r) ? false : true;
	}
	
	public function coursetypedelete($uid)
	{
		$this->db->where('course_type_id',$uid);
		$r=$this->db->delete('master_course_type');
		return (!$r) ? false : true;
	}
	
	public function coursetypestatus($uid)
	{
		$status=$this->db->get_where('master_course_type',array('course_type_id'=>$uid))->row('status');
		if($status==1)
		{
			$data=array('status'=>0);
			$this->db->where('course_type_id',$uid);
			$this->db->update('master_course_type',$data);
			echo "Hide";
		}
		else{
			$data=array('status'=>1);
			$this->db->where('course_type_id',$uid);
			$this->db->update('master_course_type',$data);
			echo "Show";
		}
		
	}
}