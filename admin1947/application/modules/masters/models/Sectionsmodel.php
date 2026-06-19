<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sectionsmodel extends CI_Model 
{
	public function insert()
	{
		$date=date('Y-m-d h:i:s');

		$data =array(
					'section_name'	=>$this->input->post('section'),
					'section_icon'	=>$this->input->post('section_icon'),
					'added_date'	=>date('Y-m-d h:i:s'),
					);
		//echo "<pre>"; print_r($data); die;
		$r=$this->db->insert('master_sections',$data);
		return (!$r) ? false : true;
	}
	
	public function edit($id)
	{
		$data =array(
					'section_name'	=>$this->input->post('section'),
					'section_icon'	=>$this->input->post('section_icon'),
					'modify_date'	=>date('Y-m-d h:i:s'),
					);
		$this->db->where('section_id',$id);
		$r=$this->db->update('master_sections',$data);
		return (!$r) ? false : true;
	}
	
	public function delete($uid)
	{
		$this->db->where('section_id',$uid);
		$r=$this->db->delete('master_sections');
		return (!$r) ? false : true;
	}
	
	public function status($uid)
	{
		$status=$this->db->get_where('master_sections',array('section_id'=>$uid))->row('isStatus');
		if($status==1)
		{
			$data=array('isStatus'=>0);
			$this->db->where('section_id',$uid);
			$this->db->update('master_sections',$data);
			echo "Hide";
		}
		else{
			$data=array('isStatus'=>1);
			$this->db->where('section_id',$uid);
			$this->db->update('master_sections',$data);
			echo "Show";
		}
		
	}
}