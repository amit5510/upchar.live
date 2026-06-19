<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Documentmodel extends CI_Model{
	
	
	
	public function documentinsert()
	{
		$date=date('Y-m-d h:i:s');
		$eduname=$this->input->post('document');
		$data=array('document_name'=>$eduname,'time_stamp'=>$date);
		$r=$this->db->insert('master_document',$data);
		return (!$r) ? false : true;
	}
	
	public function documentedit($id)
	{
		$eduname=$this->input->post('document');
		$data=array('document_name'=>$eduname);
		$this->db->where('document_id',$id);
		$r=$this->db->update('master_document',$data);
		return (!$r) ? false : true;
	}
	
	public function documentdelete($uid)
	{
		$this->db->where('document_id',$uid);
		$r=$this->db->delete('master_document');
		return (!$r) ? false : true;
	}
	
	public function documentstatus($uid)
	{
		$status=$this->db->get_where('master_document',array('document_id'=>$uid))->row('status');
		if($status==1)
		{
			$data=array('status'=>0);
			$this->db->where('document_id',$uid);
			$this->db->update('master_document',$data);
			echo "Hide";
		}
		else{
			$data=array('status'=>1);
			$this->db->where('document_id',$uid);
			$this->db->update('master_document',$data);
			echo "Show";
		}
		
	}
}