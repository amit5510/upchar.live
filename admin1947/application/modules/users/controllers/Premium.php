<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Premium extends CI_Controller 
{
	function __construct() 
	{	 	
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		$date=date('Y-m-d h:i:s');
		$this->load->model(array('premium_model','masters/managementmodel'));
		$this->load->helper(array('query_string_helper','dbquery_helper','admin_helper'));
	}
	
	public function index()
	{	
		$pagesize               =  (int) $this->input->get_post('pagesize');
		$config['limit']	    =  ( $pagesize > 0 ) ? $pagesize : 10;	
		$offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		$data['result'] 		=  $this->premium_model->get_premium($config['limit'],$offset);
		$config['total_rows']   =  get_found_rows();
		$data['heading_title'] 	=  'Premium List';
		$data['module'] 		=  'Premium';
		$data['page_links'] 	=  admin_pagination($base_url, $config['total_rows'],$config['limit'],$offset);
		if( $this->input->post('status_action')!='')
		{
			$this->managementmodel->update_status('premium','premium_id');			
		}
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('premium_list',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
	
	public function add()
	{	
		$data['heading_title'] 	=  'Premium Add';
		$data['module'] 		=  'Premium';
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('premium_add',$data);
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
	     	$check 	= $this->premium_model->premium_duplicacy_check();	
			
			if($check !='OK')
			{
				if($check == 'title')
				{
					$emsg	  = 'Title Already Exist';
					$msg	  = "<div class='alert alert-danger'><strong>Failed! </strong>".$emsg."</div>";
					$this->session->set_flashdata('flashmsg',$msg);
					redirect(base_url().'users/premium/add');
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
					redirect(base_url().'users/premium');
					exit();
				}
				else
				{
					if($this->premium_model->premium_insert($uploadimage)) 
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
				if($this->premium_model->premium_insert()) 
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
		redirect(base_url().'users/premium');
	}
	 
	public function update()
	{	
		$id		=	$this->uri->segment(4);
		$row	=	$this->premium_model->get_premium(1,0,array('premium_id'=>$id));
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
				$this->premium_model->update_premium($id,$uploadimage);
				$msg="<div class='alert alert-success'><strong>Success!</strong> Data Updated Successfully</div>";
				$this->session->set_flashdata('flashmsg',$msg);	
				redirect('users/premium/update/'.$id.'');	
			}	
			$data['module']			=	'Premium';
			$data['heading_title']	=	'Premium Update';
			$data['row']			=	$row;
		}
		else
		{
			redirect('users/premium/','');
		}
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('premium_update',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
}