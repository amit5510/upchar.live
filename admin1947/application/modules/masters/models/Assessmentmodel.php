<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Assessmentmodel extends CI_Model{
	
	
	
	public function validateassessment(){
		$dpr=$this->input->post('dpr');
		$count = $this->db->where('dpr',$dpr)->count_all_results('master_assessment');
		return ($count==0) ? true : false;
		
	}
	public function assessmentinsert($signature)
	{
		$date=date('Y-m-d h:i:s');
		$dpr=$this->input->post('dpr');
		$radio=$this->input->post('radio');
		$assessmentperc=$this->input->post('assessmentperc');
		$checktheortical=$this->input->post('checktheortical');
		if($checktheortical==null)
		{
			$checktheortical=0;
		}
		$checkpractical=$this->input->post('checkpractical');
		if($checkpractical==null)
		{
			$checkpractical=0;
		}
		$checkaggregate=$this->input->post('checkaggregate');
		if($checkaggregate==null)
		{
			$checkaggregate=0;
		}
		$passingper=$this->input->post('passingper');
		$theorymax=$this->input->post('theorymax');
		$practicalmax=$this->input->post('practicalmax');
		$min_ojt=$this->input->post('min_ojt');
		
		
		
		$data=array('dpr'=>$dpr,'radiovalue'=>$radio,'assessmentpercent'=>$assessmentperc,'checktheortical'=>$checktheortical,'checkpractical'=>$checkpractical,'checkaggregate'=>$checkaggregate,'passingper'=>$passingper,'theorymax'=>$theorymax,'practicalmax'=>$practicalmax,'signature'=>$signature,'min_ojt'=>$min_ojt,'time_stamp'=>$date,'ip'=>getUserIP(),'user_agent'=>getUserAgent(),'created_by'=>getUserId());
		$r=$this->db->insert('master_assessment',$data);
		return (!$r) ? false : true;
	}
	
	public function assessmentedit($id,$signature)
	{
		$radio=$this->input->post('radio');
		$dpr=$this->input->post('dpr');
		$assessmentperc=$this->input->post('assessmentperc');
		$checktheortical=$this->input->post('checktheortical');
		if($checktheortical==null)
		{
			$checktheortical=0;
		}
		$checkpractical=$this->input->post('checkpractical');
		if($checkpractical==null)
		{
			$checkpractical=0;
		}
		$checkaggregate=$this->input->post('checkaggregate');
		if($checkaggregate==null)
		{
			$checkaggregate=0;
		}
		$passingper=$this->input->post('passingper');
		$theorymax=$this->input->post('theorymax');
		$practicalmax=$this->input->post('practicalmax');
		$min_ojt=$this->input->post('min_ojt');
		
		if($signature=='')
		{
			$signature=$this->db->get_where('master_assessment',array('assessment_id'=>$id))->row('signature');
		}
		
		$data=array('dpr'=>$dpr,'radiovalue'=>$radio,'assessmentpercent'=>$assessmentperc,'checktheortical'=>$checktheortical,'checkpractical'=>$checkpractical,'checkaggregate'=>$checkaggregate,'passingper'=>$passingper,'theorymax'=>$theorymax,'practicalmax'=>$practicalmax,'signature'=>$signature,'min_ojt'=>$min_ojt);
		$this->db->where('assessment_id',$id);
		$r=$this->db->update('master_assessment',$data);
		return (!$r) ? false : true;
	}
	
	
	public function assessmentdelete($uid)
	{
		$this->db->where('assessment_id',$uid);
		$r=$this->db->delete('master_assessment');
		return (!$r) ? false : true;
	}
	
}