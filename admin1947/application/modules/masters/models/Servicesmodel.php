<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Servicesmodel extends CI_Model{
	
	
	
	public function insert()
	{
		$date=date('Y-m-d h:i:s');
		$eduname=$this->input->post('specilization');
		$data=array('name'=>$eduname,'create_date'=>$date);
		$r=$this->db->insert('master_services',$data);
		return (!$r) ? false : true;
	}
	
	public function edit($id)
	{
		$eduname=$this->input->post('specilization');
		$data=array('name'=>$eduname);
		$this->db->where('id',$id);
		$r=$this->db->update('master_services',$data);
		return (!$r) ? false : true;
	}
	
	public function delete($uid)
	{
		$this->db->where('id',$uid);
		$r=$this->db->delete('master_services');
		return (!$r) ? false : true;
	}
	
	public function status($uid)
	{
		$status=$this->db->get_where('master_services',array('id'=>$uid))->row('status');
		if($status==1)
		{
			$data=array('status'=>0);
			$this->db->where('id',$uid);
			$this->db->update('master_services',$data);
			echo "Hide";
		}
		else{
			$data=array('status'=>1);
			$this->db->where('id',$uid);
			$this->db->update('master_services',$data);
			echo "Show";
		}
		
	}
	
	public function get_service($limit='10',$offset='0')
	{	
		
		$keyword 	= $this->db->escape_str($this->input->get('keyword',TRUE));
		$mobile 	= $this->db->escape_str($this->input->get('mobile',TRUE));
		$city_name 	= $this->db->escape_str($this->input->get('city_name',TRUE));
	
		
		
		if($keyword!='')
		{
			$this->db->where("(name LIKE '%".$keyword."%' )");
		}
		if($mobile!='')
		{
			$this->db->where("mobile",$mobile);
		}
		if($city_name!='')
		{
			$this->db->where("city",$city_name);
		}
		$this->db->order_by('id','asc');
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS *',FALSE);
		//$this->db->join('hospitallogin','hospitallogin.USERID = hospital.uid','left');
		$result = $this->db->get('master_services')->result_array();
		$result = ($limit=='1') ? @$result[0]: $result;	
		return $result;
	}
}