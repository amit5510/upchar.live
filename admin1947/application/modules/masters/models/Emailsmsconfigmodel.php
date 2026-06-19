<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Emailsmsconfigmodel extends CI_Model{
	
	
	
	public function editsetting($id)
	{
		$smtpserver=$this->input->post('smtpserver');
		$smtpport=$this->input->post('smtpport');
		$smtpuser=$this->input->post('smtpuser');
		$smtppass=$this->input->post('smtppass');
		$fromemail=$this->input->post('fromemail');
		$smsusername=$this->input->post('smsusername');
		$smspass=$this->input->post('smspass');
		$smssenderid=$this->input->post('smssenderid');
		$smspass=$this->input->post('smspass');
		$smsfeedid=$this->input->post('smsfeedid');
		$smsurl=$this->input->post('smsurl');
		
		$data=array('smtpserver'=>$smtpserver,'smtpport'=>$smtpport,'smtpuser'=>$smtpuser,'smtppass'=>$smtppass,'fromemail'=>$fromemail,'smsusername'=>$smsusername,'smspass'=>$smspass,'smssenderid'=>$smssenderid,'smsfeedid'=>$smsfeedid,'smsurl'=>$smsurl );
		$this->db->where('id','1');
		$r=$this->db->update('setting_smtp',$data);
		return (!$r) ? false : true;
	}
	
}