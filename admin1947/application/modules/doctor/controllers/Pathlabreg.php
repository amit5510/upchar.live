<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pathlabreg extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		$date=date('Y-m-d h:i:s');
		$this->load->model('Pathlabregmodel');
	}
	 
	public function index()
	{
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('pathlabreg');
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}



	public function create()
	{
		
		if(isset($_POST['submit'])){
			    
			    $uploadimage='';
             
             $check = $this->Pathlabregmodel->pathlab_duplicacy_check();
			if($check !='OK')
			{
				if($check == 'MOBILE')
					$emsg='Mobile Already Exist';
				else if($check == 'EMAIL')
					$emsg='Email Already Exist';
				else if($check == 'BOTH')
					$emsg='Email and Mobile Already Exist';
				
				$msg="<div class='alert alert-danger'><strong>Failed!</strong> $emsg</div>";
				$this->session->set_flashdata('flashmsg',$msg);
				
				redirect(base_url().'doctor/pathlabreg');
				exit();
			}
			else
			{

				$uploadimage=$_FILES['uploadimage']['name'];
				$extsign = pathinfo($_FILES['uploadimage']['name'],PATHINFO_EXTENSION);
				
				$uploadimage2=$_FILES['idproof']['name'];
				$extsign2 = pathinfo($_FILES['idproof']['name'],PATHINFO_EXTENSION);
				
				$uploadimage3=$_FILES['regproof']['name'];
				$extsign3 = pathinfo($_FILES['regproof']['name'],PATHINFO_EXTENSION);
				
				if($uploadimage != '') 
				{	
					$rname=rand(1111111,999999999);
					$date=date('Y-m-d');
					$uploadimage=$typename.'_profile_pic_'.$rname.$date.'.'.$extsign;
					$rname=rand(1111111,999999999);
					$uploadimage2=$typename.'_id_proof_'.$rname.$date.'.'.$extsign2;
					$rname=rand(1111111,999999999);
					$uploadimage3=$typename.'_reg_proof_'.$rname.$date.'.'.$extsign3;
					
					$config['upload_path']          = './public/assets/upload/';
					$config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
					$config['max_size']             = 2048;
					$config['quality'] = '60%';
					$config['file_name']  = $uploadimage;
					$this->load->library('upload', $config);
					
					if ( ! $this->upload->do_upload('uploadimage'))
					{
						$error = $this->upload->display_errors();
						$flashmsg='<div class="alert alert-danger">
						  <strong>Failed!</strong>'.$error.'
						</div>';
						$this->session->set_flashdata('flashmsg',$flashmsg);
						redirect(base_url().'doctor/pathlabreg');
						exit();
						
					}
					else{
						
					$config['file_name']  = $uploadimage2;
					$this->load->library('upload', $config);
					$this->upload->do_upload('idproof');
					
					$config['file_name']  = $uploadimage3;
					$this->load->library('upload', $config);
					$this->upload->do_upload('regproof');
					
						
						if($this->Pathlabregmodel->traineereginsert($uploadimage,$uploadimage2,$uploadimage3)) 
						{
							$msg="<div class='alert alert-success'><strong>Success!</strong> Data Added Successfully</div>";
							$this->session->set_flashdata('flashmsg',$msg);
							
						
						}
						else{
							$msg="<div class='alert alert-danger'><strong>Failed!</strong> Something went wrong. Please try again.</div>";
							$this->session->set_flashdata('flashmsg',$msg);
						}
						
						
						}
					
				}
				
			
		}
	
     }
		redirect(base_url().'doctor/pathlabreg');
	
	}
	
          
          public function viewpathology()
	{
		$data['pathlab']=$this->db->get_where('pathlab')->result();
		$data['module']='pathlab';
		//print_r($data);
		
		
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('pathlabview',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
		
	}


      public function pathlabapprove()
	{
		$did=$this->input->post('did');
		$current=$this->db->select('approved')->get_where('pathlab',array('id'=>$did))->row()->approved;
		if($current=='1'){
			$this->db->set('approved','0')->where(array('id'=>$did))->update('pathlab');
			$response=array('status'=>'0');
		}else if($current=='0'){
			$this->db->set('approved','1')->where(array('id'=>$did))->update('pathlab');
			$response=array('status'=>'1');
		}
		echo json_encode($response);
	}
	 
	public function pathlabverify()
	{
		$did=$this->input->post('did');
		$current=$this->db->select('verified')->get_where('pathlab',array('id'=>$did))->row()->verified;
		if($current=='1'){
			$this->db->set('verified','0')->where(array('id'=>$did))->update('pathlab');
			$response=array('status'=>'0');
		}else if($current=='0'){
			$this->db->set('verified','1')->where(array('id'=>$did))->update('pathlab');
			$response=array('status'=>'1');
		}
		echo json_encode($response);
	}
	 
	
	
	 public function pathlabview($id)
	      {

		$data['pathlab']=$this->db->get_where('pathlab',array('id'=>$id))->row();
		$data['module']='pathlab';
	
         // print_r($data);

 
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('viewpathlab',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	
      
	}


  public function pathlabupdate($id)
	      {

		$data['pathlab']=$this->db->get_where('pathlab',array('id'=>$id))->row();
		$data['module']='pathlab';
	


          if($_POST['submit']){
				         $this->load->model('pathlabregmodel');
                 $this->pathlabregmodel->updatepathlab($id);
         
				    $msg="<div class='alert alert-success'><strong>Success!</strong> Data Added Successfully</div>";
							$this->session->set_flashdata('flashmsg',$msg);
				     }


         // print_r($data);

 
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('updatepathlab',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	
      
	}


	}