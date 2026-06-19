<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	function __construct() 
	{
		 parent::__construct();
		 date_default_timezone_set("Asia/Kolkata");
		 $date=date('Y-m-d h:i:s');
	}
	 
	public function index()
	{	
		$this->load->view('inc/topheaderlink');
		$this->load->view('mlogin');
	}
	
	public function login()
	{	
		$usn=$this->input->post('name');
		$this->input->post('password');
		$pwd=md5($this->input->post('password'));
		
		 $this->db->select('*')
	          ->from('login')
	          ->where('username', $usn)
	          ->where('password', $pwd)
	          ->where('status', '1');
		
		
	 	$count = $this->db->count_all_results();
		
		if($count=='1')
		{
			$this->db->where('username', $usn);
			$this->db->where('password', $pwd);
			$query = $this->db->get('login')->row();
			$data=array('adminuserid'=>$query->id,'username'=>$query->username,'pwd'=>$query->password,'code'=>$query->role,'institution_id'=>$query->id);
			//print_r($data); die;
			$this->session->set_userdata($data);
			redirect(base_url().'masters/dashboard');
			/*switch($query->role){
				case 'A': 	redirect(base_url().'masters/dashboard');
							break;
				case 'C': 	redirect(base_url().'ccenter/dashboard');
							break;
				case 'SC': 	redirect(base_url().'sccenter/dashboard');
							break;
				case 'AG': 	redirect(base_url().'agency/dashboard');
							break;
				case 'NMU':	redirect(base_url().'nmu/dashboard');
							break;
				case 'MIN':	redirect(base_url().'dipp/dashboard');
							break;
				default:	redirect(base_url().'login');
							
			}*/
			
		}
		else{
			$msg="<p style='color:#f71212;font-weight:600;'>Invalid Username or Password </p>";
			$this->session->set_flashdata('flashmsg',$msg);
			redirect(base_url().'login');
		}

	}
	
	
}
