<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Holidaymaster extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() {
		 parent::__construct();
		 date_default_timezone_set("Asia/Kolkata");
		 $date=date('Y-m-d h:i:s');
		 
		 $this->load->model('holidaymastermodel');
	}
	public function index()
	{
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('holidaymaster');
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
	public function create()
	{
		if(isset($_POST['submit'])){
			$id=base64_decode($this->input->post('eid'));
			$eduname=$this->input->post('holiday');
			$dpr=$this->input->post('dpr');
			if($id=='')
			{
				$count =$this->db->where('holiday_name', $eduname)->where('dpr', $dpr)->count_all_results('master_holiday');
				if($count>0)
    			{
    				$msg="<div class='alert alert-danger'><strong>Failed!</strong> This keyword is already exists.</div>";
    				$this->session->set_flashdata('flashmsg',$msg);
    				redirect(base_url().'masters/holidaymaster');
    				exit();
    			}
				if($this->holidaymastermodel->holidayinsert())
				{
					$msg="<div class='alert alert-success'><strong>Success!</strong> Data Inserted Successfully</div>";
					$this->session->set_flashdata('flashmsg',$msg);
				}
				else{
					$msg="<div class='alert alert-danger'><strong>Failed!</strong> Something went wrong. Please try again.</div>";
					$this->session->set_flashdata('flashmsg',$msg);
				}
			}
			else
			{
				$count =$this->db->where('holiday_name', $eduname)->where('dpr', $dpr)->where_not_in('holiday_id',$id)->count_all_results('master_holiday');
				if($count>0)
    			{
    				$msg="<div class='alert alert-danger'><strong>Failed!</strong> This keyword is already exists.</div>";
    				$this->session->set_flashdata('flashmsg',$msg);
    				redirect(base_url().'masters/holidaymaster');
    				exit();
    			}
				if($this->holidaymastermodel->holidayedit($id))
				{
					$msg="<div class='alert alert-success'><strong>Success!</strong> Data Updated Successfully</div>";
					$this->session->set_flashdata('flashmsg',$msg);
				}
				else{
					$msg="<div class='alert alert-danger'><strong>Failed!</strong> Something went wrong. Please try again.</div>";
					$this->session->set_flashdata('flashmsg',$msg);
				}
				
			}
		}
		redirect(base_url().'masters/holidaymaster');
	}
	
	public function statusupdate()
	{
		$uid=$this->input->post('uid');
		$this->holidaymastermodel->holidaystatus($uid);
		
	}
	
	public function edit()
	{
		$id=base64_decode($this->input->post('uid'));
		$alldata=array();
		$data=$this->db->get_where('master_holiday',array('holiday_id'=>$id))->row();
		
		$alldata['id']=base64_encode($data->holiday_id);
		$alldata['dpr']=$data->dpr;
		$alldata['holiday_name']=$data->holiday_name;
		$alldata['holiday_date']=$data->holiday_date;
		echo json_encode($alldata);
		
	}
}
