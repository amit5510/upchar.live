<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Hrcountmodel extends CI_Model{
	
	
	
	public function hrcountinsert()
	{
		$date=date('Y-m-d h:i:s');
		$dpr=$this->input->post('dpr');
		$totalhr=$this->input->post('totalhr');
		$batchlimit=$this->input->post('batchlimit');
		$mon=$this->input->post('mon');
		if($mon==null)
		{
			$mon=0;
		}
		$tue=$this->input->post('tue');
		if($tue==null)
		{
			$tue=0;
		}
		$wed=$this->input->post('wed');
		if($wed==null)
		{
			$wed=0;
		}
		$thurs=$this->input->post('thurs');
		if($thurs==null)
		{
			$thurs=0;
		}
		$fri=$this->input->post('fri');
		if($fri==null)
		{
			$fri=0;
		}
		$sat=$this->input->post('sat');
		if($sat==null)
		{
			$sat=0;
		}
		$sun=$this->input->post('sun');
		if($sun==null)
		{
			$sun=0;
		}
		$centerperday=$this->input->post('centerperday');
		$centertotal=$this->input->post('centertotal');
		$industrialperday=$this->input->post('industrialperday');
		$industrialtotal=$this->input->post('industrialtotal');
		
		$data=array('dpr'=>$dpr,'totalhr'=>$totalhr,'batchlimit'=>$batchlimit,'centerperday'=>$centerperday,'centertotal'=>$centertotal,'industrialperday'=>$industrialperday,'industrialtotal'=>$industrialtotal,'mon'=>$mon,'tue'=>$tue,'wed'=>$wed,'thurs'=>$thurs,'fri'=>$fri,'sat'=>$sat,'sun'=>$sun,'time_stamp'=>$date);
		$r=$this->db->insert('master_training_duration',$data);
		return (!$r) ? false : true;
	}
	
	public function hrcountedit($id)
	{
		$dpr=$this->input->post('dpr');
		$totalhr=$this->input->post('totalhr');
		$batchlimit=$this->input->post('batchlimit');
		$mon=$this->input->post('mon');
		if($mon==null)
		{
			$mon=0;
		}
		$tue=$this->input->post('tue');
		if($tue==null)
		{
			$tue=0;
		}
		$wed=$this->input->post('wed');
		if($wed==null)
		{
			$wed=0;
		}
		$thurs=$this->input->post('thurs');
		if($thurs==null)
		{
			$thurs=0;
		}
		$fri=$this->input->post('fri');
		if($fri==null)
		{
			$fri=0;
		}
		$sat=$this->input->post('sat');
		if($sat==null)
		{
			$sat=0;
		}
		$sun=$this->input->post('sun');
		if($sun==null)
		{
			$sun=0;
		}
		$centerperday=$this->input->post('centerperday');
		$centertotal=$this->input->post('centertotal');
		$industrialperday=$this->input->post('industrialperday');
		$industrialtotal=$this->input->post('industrialtotal');
		$data=array('dpr'=>$dpr,'totalhr'=>$totalhr,'batchlimit'=>$batchlimit,'centerperday'=>$centerperday,'centertotal'=>$centertotal,'industrialperday'=>$industrialperday,'industrialtotal'=>$industrialtotal,'mon'=>$mon,'tue'=>$tue,'wed'=>$wed,'thurs'=>$thurs,'fri'=>$fri,'sat'=>$sat,'sun'=>$sun);
		$this->db->where('id',$id);
		$r=$this->db->update('master_training_duration',$data);
		return (!$r) ? false : true;
	}
	
	
}