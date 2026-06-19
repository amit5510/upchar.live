<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Coursemodel extends CI_Model{
	
	public function courseinsert()
	{
		$date=date('Y-m-d h:i:s');
		$eduname=$this->input->post('course');
		$educode=$this->input->post('coursecode');
		$edustatus=$this->input->post('fieldstatus');
		$data=array('course_name'=>$eduname,'course_code'=>$educode,'status'=>$edustatus,'time_stamp'=>$date);
		$r=$this->db->insert('master_course',$data);
		return (!$r) ? false : true;
	}
	
	public function courseedit($id)
	{
		$eduname=$this->input->post('course');
		$edustatus=$this->input->post('fieldstatus');
		$educode=$this->input->post('coursecode');
		$data=array('course_name'=>$eduname,'course_code'=>$educode,'status'=>$edustatus);
		$this->db->where('course_id',$id);
		$r=$this->db->update('master_course',$data);
		return (!$r) ? false : true;
	}
	
	public function coursedelete($uid)
	{
		$this->db->where('course_id',$uid);
		$r=$this->db->delete('master_course');
		return (!$r) ? false : true;
	}
	
	public function coursestatus($uid)
	{
		$status=$this->db->get_where('master_course',array('course_id'=>$uid))->row('status');
		if($status==1)
		{
			$data=array('status'=>0);
			$this->db->where('course_id',$uid);
			$this->db->update('master_course',$data);
			echo "Hide";
		}
		else{
			$data=array('status'=>1);
			$this->db->where('course_id',$uid);
			$this->db->update('master_course',$data);
			echo "Show";
		}
		
	}
}