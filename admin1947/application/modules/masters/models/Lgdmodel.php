<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lgdmodel extends CI_Model{
	
	public function stateinsert()
	{
		$date=date('Y-m-d h:i:s');
		$state=$this->input->post('state');
		$type=$this->input->post('type');
		$sc="SELECT MAX(state_code) AS code FROM lgd_states";
		$code=$this->db->query($sc)->row('code');
		$code=$code+1;
		
		$sn="SELECT MAX(sno) AS ssno FROM lgd_states";
		$sno=$this->db->query($sn)->row('ssno');
		$sno=$sno+1;
		$data=array('sno'=>$sno,'state_name'=>$state,'state_code'=>$code,'state_ut'=>$type);
		$r=$this->db->insert('lgd_states',$data);
		return (!$r) ? false : true;
	}
	
	public function districtinsert()
	{
		$date=date('Y-m-d h:i:s');
		$statecode=$this->input->post('state');
		$statename=$this->db->get_where('lgd_states',array('state_code'=>$statecode))->row('state_name');
		$district=$this->input->post('district');
		$d="SELECT MAX(district_code) AS code FROM lgd_districts";
		$code=$this->db->query($d)->row('code');
		$districtcode=$code+1;
		
		
		$data=array('district_code'=>$districtcode,'district_name'=>$district,'state_code'=>$statecode,'state_name'=>$statename);
		$r=$this->db->insert('lgd_districts',$data);
		return (!$r) ? false : true;
	}
	
	public function blockinsert()
	{
		$date=date('Y-m-d h:i:s');
		//$statecode=$this->input->post('state');
		//$statename=$this->db->get_where('lgd_states',array('state_code'=>$statecode))->row('state_name');
		
		$districtcode=$this->input->post('district');
		//$districtname=$this->db->get_where('lgd_districts',array('district_code'=>$districtcode))->row('district_name');
		
		$blockname=$this->input->post('block');
		
		$b="SELECT MAX(block_code) AS blockc FROM lgd_block";
		$code=$this->db->query($b)->row('blockc');
		$blockcode=$code+1;
		
		//$villagename=$this->input->post('village');
		
		//$v="SELECT MAX(village_code) AS villagec FROM lgd_block_villages";
		//$code=$this->db->query($v)->row('villagec');
		//$villagecode=$code+1;
		
		
		$data=array('district_code'=>$districtcode,'block_code'=>$blockcode,'block_name'=>$blockname);
		$r=$this->db->insert('lgd_block',$data);
		return (!$r) ? false : true;
	}
	
	public function villageinsert()
	{
		$date=date('Y-m-d h:i:s');
		//$statecode=$this->input->post('state');
		//$statename=$this->db->get_where('lgd_states',array('state_code'=>$statecode))->row('state_name');
		
		$districtcode=$this->input->post('district');
		//$districtname=$this->db->get_where('lgd_districts',array('district_code'=>$districtcode))->row('district_name');
		
		$blockcode=$this->input->post('block');
		//$blockname=$this->db->get_where('lgd_block_villages',array('block_code'=>$blockcode))->row('block_name');
		
		$villagename=$this->input->post('village');
		
		$v="SELECT MAX(village_code) AS villagec FROM lgd_vilages";
		$code=$this->db->query($v)->row('villagec');
		$villagecode=$code+1;
		
		
		$data=array('block_code'=>$blockcode,'village_code'=>$villagecode,'village_name'=>$villagename);
		$r=$this->db->insert('lgd_villages',$data);
		return (!$r) ? false : true;
	}
	
	
}