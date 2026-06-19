<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hrcount extends CI_Controller {

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
		 
		 $this->load->model('hrcountmodel');
	}
	 
	public function index()
	{
		$data['dpr']=$this->db->get_where('dpr_create',array('active'=>'1'));
		
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('hrcount',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
	public function create()
	{
		if(isset($_POST['submit'])){
			
			$id=base64_decode($this->input->post('eid'));
			if($id=='')
			{
				
				$centertotal=$this->input->post('centertotal');
				$industrialtotal=$this->input->post('industrialtotal');
				$totalhr=$this->input->post('totalhr');
				$dpr=$this->input->post('dpr');
				$duplicate = $this->db->where('dpr',$dpr)->count_all_results('master_training_duration');
				if(!$duplicate){
					if($totalhr == ($centertotal + $industrialtotal)){
						if($this->hrcountmodel->hrcountinsert())
						{
							$msg="<div class='alert alert-success'><strong>Success!</strong> Data Inserted Successfully</div>";
							$this->session->set_flashdata('flashmsg',$msg);
						}
						else{
							$msg="<div class='alert alert-danger'><strong>Failed!</strong> Something went wrong. Please try again.</div>";
							$this->session->set_flashdata('flashmsg',$msg);
						}
					}else{
						$msg="<div class='alert alert-danger'><strong>Failed!</strong> Total Nos. of Hour should be equal to Sum of Center Total Hr and Industrial total Hr. </div>";
						$this->session->set_flashdata('flashmsg',$msg);
					}
				}else{
						$msg="<div class='alert alert-danger'><strong>Failed!</strong> Entry Already Exsit for the selected DPR </div>";
						$this->session->set_flashdata('flashmsg',$msg);
					}
				
			}
			else
			{
				if($this->hrcountmodel->hrcountedit($id))
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
		redirect(base_url().'masters/hrcount');
	}
	public function view()
	{
		$this->load->view('welcome_message');
		$this->load->view('welcome_message');
	}
	public function edit()
	{
		$id=base64_decode($this->input->post('uid'));
	    //$id=2;
		$alldata=array();
		$data=$this->db->get_where('master_training_duration',array('id'=>$id))->row();
		$dpr=$this->db->get_where('dpr_create',array('dpr_id'=>$data->dpr))->row('dpr_name');
		
		$alldata['id']=base64_encode($data->id);
		$alldata['dpr']=$dpr;
		$alldata['dprid']=$data->dpr;
		$alldata['totalhr']=$data->totalhr;
		$alldata['batchlimit']=$data->batchlimit;
		$alldata['centerperday']=$data->centerperday;
		$alldata['centertotal']=$data->centertotal;
		$alldata['industrialperday']=$data->industrialperday;
		$alldata['industrialtotal']=$data->industrialtotal;
		$alldata['mon']=$data->mon;
		$alldata['tue']=$data->tue;
		$alldata['wed']=$data->wed;
		$alldata['thurs']=$data->thurs;
		$alldata['fri']=$data->fri;
		$alldata['sat']=$data->sat;
		$alldata['sun']=$data->sun;
		
		echo json_encode($alldata);
		
	}
	public function delete()
	{
		$this->load->view('welcome_message');
		$this->load->view('welcome_message');
	}
}
