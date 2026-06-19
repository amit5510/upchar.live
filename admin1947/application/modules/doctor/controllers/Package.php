<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Package extends CI_Controller 
{
	function __construct() 
	{	 	
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		$date=date('Y-m-d h:i:s');
		$this->load->model(array('package_model','masters/managementmodel'));
		$this->load->helper(array('query_string_helper','dbquery_helper','admin_helper'));
	}
	
	public function index()
	{	
		$pagesize               =  (int) $this->input->get_post('pagesize');
		$config['limit']	    =  ( $pagesize > 0 ) ? $pagesize : 10;	
		$offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		$data['result'] 		=  $this->package_model->get_package($config['limit'],$offset);
		$config['total_rows']   =  get_found_rows();
		$data['heading_title'] 	=  'Package List';
		$data['module'] 		=  'Package';
		$data['page_links'] 	=  admin_pagination($base_url, $config['total_rows'],$config['limit'],$offset);
		if( $this->input->post('status_action')!='')
		{
			$this->managementmodel->update_status('package','package_id');			
		}
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('package_list',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
	
	public function add()
	{	
		$data['heading_title'] 	=  'Package Add';
		$data['module'] 		=  'Package';
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('package_add',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}

	public function create()
	{ 
		if(isset($_POST['submit']))
		{
		    $uploadimage='';  
	     	$check 	= $this->package_model->package_duplicacy_check();	
			
			if($check !='OK')
			{
				if($check == 'title')
				{
					$emsg	  = 'Title Already Exist';
					$msg	  = "<div class='alert alert-danger'><strong>Failed! </strong>".$emsg."</div>";
					$this->session->set_flashdata('flashmsg',$msg);
					redirect(base_url().'doctor/package/add');
					exit();
				}
			}

			$uploadimage=$_FILES['uploadimage']['name'];
			$extsign = pathinfo($_FILES['uploadimage']['name'],PATHINFO_EXTENSION);
			
			if($uploadimage != '') 
			{	
				$rname 							= rand(1111111,999999999);
				$date 							= date('Y-m-d');
				$uploadimage 					= '_profile_pic_'.$rname.$date.'.'.$extsign;
				$config['upload_path']          = './public/assets/upload/';
				$config['allowed_types'] 		= 'jpg|png|jpeg|JPG|PNG|JPEG';
				$config['max_size']             = 2048;
				$config['quality'] 				= '60%';
				$config['file_name']  			= $uploadimage;
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('uploadimage'))
				{
					$error = $this->upload->display_errors();
					$flashmsg='<div class="alert alert-danger">
					  <strong>Failed!</strong>'.$error.'
					</div>';
					$this->session->set_flashdata('flashmsg',$flashmsg);
					redirect(base_url().'users/package');
					exit();
				}
				else
				{
					if($this->package_model->package_insert($uploadimage)) 
					{
						$msg="<div class='alert alert-success'><strong>Success!</strong> Data Added Successfully</div>";
						$this->session->set_flashdata('flashmsg',$msg);
					}
					else
					{
						$msg="<div class='alert alert-danger'><strong>Failed!</strong> Something went wrong. Please try again.</div>";
						$this->session->set_flashdata('flashmsg',$msg);
					}
				}
			}
			else
			{
				if($this->package_model->package_insert()) 
				{
					$msg="<div class='alert alert-success'><strong>Success!</strong> Data Added Successfully</div>";
					$this->session->set_flashdata('flashmsg',$msg);
				}
				else
				{
					$msg="<div class='alert alert-danger'><strong>Failed!</strong> Something went wrong. Please try again.</div>";
					$this->session->set_flashdata('flashmsg',$msg);
				}
			}
     	}
		redirect(base_url().'users/package');
	}
	
	public function update()
	{	
		$id		=	$this->uri->segment(4);
		$row	=	$this->package_model->get_package(1,0,array('package_id'=>$id));
		//echo "<pre>"; print_r($row); die;
		if(is_array($row) && !empty($row))
		{
			if(isset($_POST['submit']))
			{
				if(!empty($_FILES['uploadimage']['name']))
				{    
					$config['upload_path'] 		= './public/assets/upload/';
					$config['allowed_types'] 	= 'jpg|png|jpeg|JPG|PNG|JPEG';
					$config['max_size']         = 2048;
					$config['quality'] 			= '60%';
					$config['file_name'] 		= $_FILES['uploadimage']['name'];
					
					$this->load->library('upload',$config);
					$this->upload->initialize($config);
					
					if($this->upload->do_upload('uploadimage'))
					{
						$uploadData = $this->upload->data();
						$uploadimage = $uploadData['file_name'];
					}
					else
					{
						$uploadimage = '';
					}
				}
				else
				{
					$uploadimage = $row['image'];
				}  
				//echo "<pre>"; print_r($_POST); die;
				$this->package_model->update_package($id,$uploadimage);
				$msg="<div class='alert alert-success'><strong>Success!</strong> Data Updated Successfully</div>";
				$this->session->set_flashdata('flashmsg',$msg);	
				redirect('doctor/package/update/'.$id.'');	
			}	
			$data['module']			=	'Package';
			$data['heading_title']	=	'Package Update';
			$data['row']			=	$row;
		}
		else
		{
			redirect('users/package/','');
		}
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('package_update',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}

}