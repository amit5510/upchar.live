<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Holidaymastermodel extends CI_Model{
	
	
	
	public function holidayinsert()
	{
		$date=date('Y-m-d h:i:s');
		$eduname=$this->input->post('holiday');
		$dpr=$this->input->post('dpr');
		$holidaydate=$this->input->post('holidaydate');
		$data=array('dpr'=>$dpr,'holiday_name'=>$eduname,'holiday_date'=>$holidaydate,'time_stamp'=>$date);
		$r=$this->db->insert('master_holiday',$data);
		return (!$r) ? false : true;
	}
	
	public function holidayedit($id)
	{
		$eduname=$this->input->post('holiday');
		$dpr=$this->input->post('dpr');
		$holidaydate=$this->input->post('holidaydate');
		$data=array('dpr'=>$dpr,'holiday_name'=>$eduname,'holiday_date'=>$holidaydate);
		$this->db->where('holiday_id',$id);
		$r=$this->db->update('master_holiday',$data);
		return (!$r) ? false : true;
	}
	
}