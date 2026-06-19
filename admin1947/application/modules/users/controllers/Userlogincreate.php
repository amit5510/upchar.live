<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userlogincreate extends CI_Controller {

	 function __construct() {
		 parent::__construct();
		 date_default_timezone_set("Asia/Kolkata");
		 $date=date('Y-m-d h:i:s');
		 
		 $this->load->model('user');
	}
	 
	public function index()
	{
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('userlogin');
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
	
	public function create()
	{
		if(isset($_POST['submit'])){
			
					if($this->user->insert())
					{
						$msg="<div class='alert alert-success'><strong>Success!</strong> Data Inserted Successfully</div>";
						$this->session->set_flashdata('flashmsg',$msg);
					}
					else{
						$msg="<div class='alert alert-danger'><strong>Failed!</strong> Something went wrong. Please try again.</div>";
						$this->session->set_flashdata('flashmsg',$msg);
					}
			
		}
		redirect(base_url().'users/userlogincreate');
	}

public function userview()
{
     
    // $userid =$this->session->userdata('userid');
      $data['userlogin']=$this->db->get_where('userlogin', array('status'=>'1'))->result();
     // print_r($data);
   
        $this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('userview',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');


}


    public function delete()
    {
           $id=$this->input->get('USERID');
        	//$this->load->model('doctorregmodel');
           	$this->user->delete($id);
           redirect(base_url().'users/userlogincreate/userview');
          //echo"delete successfully";   
    }

public function gmail()
  {
        
        $data['userlogin']=$this->db->get_where('userlogin',array('GUID !='=>''))->result();
     
        $this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('gmail',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');

}


public function facebook()
{
     
     
      $data['userlogin']=$this->db->get_where('userlogin', array('FBUID !='=>''))->result();
     // print_r($data);
   
        $this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('facebook',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');

}
public function website()
{
      $data['userlogin']=$this->db->get_where('userlogin', array('USERID !='=>''))->result();
        $this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('userwebsite',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');


}


}
