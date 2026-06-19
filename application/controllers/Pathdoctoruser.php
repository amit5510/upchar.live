<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*  error_reporting(E_ALL);
ini_set('display_errors', 1);  */
class Pathdoctoruser extends CI_Controller {

	
	public function __construct(){
		parent::__construct();
		$this->load->model('Pathdoctoruser_Model');
		//$this->load->library('Sm_lib');
	}
	
	public function index()
	{
		$this->load->view('login',@$data);
	}
	
	public function login()
	{
		$email = strtolower($this->input->post('email'));
		$password = md5($this->input->post('password'));
        $login = $this->Pathdoctoruser_Model->login($email,$password);
		if($login=='SUCCESS'){
			$response=array('status'=>'success','msg'=>'Logged in Successfully');
		}else if($login=='OTP'){
			$response=array('status'=>'otp','msg'=>'Please Verify Mobile no');
		}else if($login=='BLOCKED'){
			$response=array('status'=>'failed','msg'=>'User Blocked by Administrator!');
		}else {
			$response=array('status'=>'failed','msg'=>'Incorrect Email or Password');
		}
		echo json_encode($response);
	}
	
	public function verifysignupotp()
	{
		$userid = $this->session->userdata('drsignupuserid');
		$otp = ($this->input->post('otp'));
        $login = $this->Pathdoctoruser_Model->verifysignupotp($userid,$otp);
		if($login=='SUCCESS'){
			$response=array('status'=>'success','msg'=>'Logged in Successfully');
		}else {
			$response=array('status'=>'failed','msg'=>'Incorrect OTP');
		}
		echo json_encode($response);
	}
	
	
	public function verifyforgototp()
	{
		$userid = $this->session->userdata('drforgotuserid');
		$otp = ($this->input->post('otp'));
        $login = $this->Pathdoctoruser_Model->verifyforgototp($userid,$otp);
		if($login=='SUCCESS'){
			$response=array('status'=>'success','msg'=>'Logged in Successfully');
		}else {
			$response=array('status'=>'failed','msg'=>'Incorrect OTP');
		}
		echo json_encode($response);
	}
	
	public function resendsignupotp()
	{
		$userid = $this->session->userdata('drsignupuserid');
		//$otp = ($this->input->post('otp'));
		$this -> db -> select(' MOBILE ');
        $this -> db -> from('pathdoctorlogin');
        $this -> db -> where('USERID', $userid);       
        $this -> db -> limit(1);
        $mobile = $this -> db -> get()->row('MOBILE');
        $login = $this->Pathdoctoruser_Model->resendotp($mobile);
		if($login=='SUCCESS'){
			$response=array('status'=>'success','msg'=>'OTP Sent Successfully');
		}else {
			$response=array('status'=>'failed','msg'=>'Failed to send OTP');
		}
		echo json_encode($response);
	}
	
	public function resendforgetotp()
	{
		$userid = $this->session->userdata('drforgotuserid');
		//$otp = ($this->input->post('otp'));
		$this -> db -> select(' MOBILE ');
        $this -> db -> from('pathdoctorlogin');
        $this -> db -> where('USERID', $userid);       
        $this -> db -> limit(1);
        $mobile = $this -> db -> get()->row('MOBILE');
        $login = $this->Pathdoctoruser_Model->resendotp($mobile);
		if($login=='SUCCESS'){
			$response=array('status'=>'success','msg'=>'OTP Sent Successfully');
		}else {
			$response=array('status'=>'failed','msg'=>'Failed to send OTP');
		}
		echo json_encode($response);
	}
	
	
	public function setnewpass()
	{
		$userid = $this->session->userdata('drforgotuserid');
		//$otp = ($this->input->post('otp'));
        $login = $this->Pathdoctoruser_Model->changepass($userid);
		if($login=='SUCCESS'){
			$response=array('status'=>'success','msg'=>'Logged in Successfully');
		}else {
			$response=array('status'=>'failed','msg'=>'Failed');
		}
		echo json_encode($response);
	}
	
	
	public function register()
    {
		$response = $this->Pathdoctoruser_Model->register();
		echo json_encode($response);
	}
	
	public function forgotpass(){
		$mobile =$this->input->post('mobile');
		$login = $this->Pathdoctoruser_Model->forgotpass($mobile);
		if($login=='SUCCESS'){
			$response=array('status'=>'success','msg'=>'OTP Sent To Registered Mobile and Email');
		}else if($login=='INVALID'){
			$response=array('status'=>'invalid','msg'=>'Invalid Mobile or Email');
		}else if($login=='FAILED'){
			$response=array('status'=>'failed','msg'=>'Something went wrong');
		}else {
			$response=array('status'=>'failed','msg'=>'Something went wrong');
		}
		echo json_encode($response);
	}
	
	public function logout()
    {
        $this->session->sess_destroy();
        redirect('/pathdoctor-login');
    }
}