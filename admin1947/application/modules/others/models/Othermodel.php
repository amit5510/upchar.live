<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Othermodel extends CI_Model{
	
	
	
	public function centerinsert()
	{
		$date=date('Y-m-d h:i:s');
		$dpr=$this->input->post('dpr');
		$fddicenter=$this->input->post('fddicenter');
		$fddi_subcenter=$this->input->post('fddi_subcenter');
		$course=$this->input->post('course');
		$btname=$this->input->post('btname');
		$btlimit=$this->input->post('btlimit');
		$duration=$this->input->post('duration');
		$cnph=$this->input->post('cnph');
		$cnth=$this->input->post('cnth');
		$inph=$this->input->post('inph');
		$inth=$this->input->post('inth');
		$sdate=$this->input->post('sdate');
		
		$checkauto=$this->input->post('autodate');
		$enddatepicker=$this->input->post('enddatepicker');
		
		$faculty=serialize($this->input->post('faculty'));
		
		$trainees=serialize($this->input->post('trainees'));
		
		$agency=$this->input->post('agency');
		$assessess=$this->input->post('assessess');
		
		$assessdate=$this->input->post('assessdate');
		$remarks=$this->input->post('remarks');
		
		$data=array('dpr'=>$dpr,'center'=>$fddicenter,'subcenter'=>$fddi_subcenter,'course'=>$course,'batchname'=>$btname,'batchlimit'=>$btlimit,'durationweek'=>$duration,'centerperhr'=>$cnph,'centertothr'=>$cnth,'indusperhr'=>$inph,'industothr'=>$inth,'startdate'=>$sdate,'autocheck'=>$checkauto,'enddate'=>$enddatepicker,'faculty'=>$faculty,'trainee'=>$trainees,'agency'=>$agency,'assessee'=>$assessess,'assessmentdate'=>$assessdate,'remarks'=>$remarks,'reg_date'=>$date);
		$this->db->insert('fdd_batch',$data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	
	public function centeredit($id,$signature,$imgvalue)
	{
		$centername=$this->input->post('centername');
		$centeraddress=$this->input->post('centeraddress');
		$state=$this->input->post('state');
		$district=$this->input->post('district');
		$block=$this->input->post('block');
		$village=$this->input->post('village');
		$ownradio=$this->input->post('ownradio');
		$areasq=$this->input->post('areasq');
		$classroom=$this->input->post('classroom');
		$sitting=$this->input->post('sitting');
		$remarks=$this->input->post('remarks');
		$pin=$this->input->post('pin');
		$inchargename=$this->input->post('inchargename');
		$inchargenumber=$this->input->post('inchargenumber');
		$inchargeemail=$this->input->post('inchargeemail');
		$activeradio=$this->input->post('activeradio');
		
		if($signature=='')
		{
			$signature=$this->db->get_where('fddi_center',array('id'=>$id))->row('signature');
		}
		if($imgvalue=='')
		{
			$imgvalue=$this->db->get_where('fddi_center',array('id'=>$id))->row('centerpics');
		}
		$data=array('center_name'=>$centername,'address'=>$centeraddress,'center_state'=>$state,'center_district'=>$district,'center_block'=>$block,'center_village'=>$village,'own_by'=>$ownradio,'areasq'=>$areasq,'classroom'=>$classroom,'sitcapacity'=>$sitting,'centerpics'=>$imgvalue,'remarks'=>$remarks,'pin'=>$pin,'inchargename'=>$inchargename,'contactnumber'=>$inchargenumber,'email'=>$inchargeemail,'signature'=>$signature,'active'=>$activeradio,'status'=>1);
		
		$this->db->where('id',$id);
		$this->db->update('fddi_center',$data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	
	public function centerdelete($uid)
	{
		$this->db->where('id',$uid);
		$this->db->delete('fddi_center');
		
		return ($this->db->affected_rows() != 1) ? false : true;
	}
}