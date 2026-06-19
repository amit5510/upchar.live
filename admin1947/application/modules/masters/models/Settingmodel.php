<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class settingmodel extends CI_Model{
	
	public function edit()
	{
		$max_batch_faculty=$this->input->post('max_batch_faculty');
		$data=array('value'=>$max_batch_faculty);
		$this->db->where('id','1');
		$r=$this->db->update('setting_master',$data);
		
		$max_batch_assessor=$this->input->post('max_batch_assessor');
		$data=array('value'=>$max_batch_assessor);
		$this->db->where('id','2');
		$r=$this->db->update('setting_master',$data);
		
		return (!$r) ? false : true;
	}
	
	
}