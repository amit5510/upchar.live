<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Categorymodel extends CI_Model{
	
	
	
	public function categoryinsert()
	{
		$date=date('Y-m-d h:i:s');
		$eduname=$this->input->post('category');
		$data=array('category_name'=>$eduname,'time_stamp'=>$date);
		$r=$this->db->insert('master_category',$data);
		return (!$r) ? false : true;
	}
	
	public function categoryedit($id)
	{
		$eduname=$this->input->post('category');
		$data=array('category_name'=>$eduname);
		$this->db->where('category_id',$id);
		$r=$this->db->update('master_category',$data);
		return (!$r) ? false : true;
	}
	
	public function categorydelete($uid)
	{
		$this->db->where('category_id',$uid);
		$r=$this->db->delete('master_category');
		return (!$r) ? false : true;
	}
	
	public function categorystatus($uid)
	{
		$status=$this->db->get_where('master_category',array('category_id'=>$uid))->row('status');
		if($status==1)
		{
			$data=array('status'=>0);
			$this->db->where('category_id',$uid);
			$this->db->update('master_category',$data);
			echo "Hide";
		}
		else{
			$data=array('status'=>1);
			$this->db->where('category_id',$uid);
			$this->db->update('master_category',$data);
			echo "Show";
		}
		
	}
}