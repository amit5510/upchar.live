<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."/third_party/vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Clinicreg extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		$date=date('Y-m-d h:i:s');
		$this->load->model(array('doctorregmodel','masters/managementmodel'));
		$this->load->helper(array('query_string_helper','dbquery_helper','admin_helper'));
	}
	
	public function viewhospital()
	{	
		$pagesize               =  (int) $this->input->get_post('pagesize');
		$config['limit']	    =  ( $pagesize > 0 ) ? $pagesize : 10;	
		$offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		$data['hospital'] 		=  $this->doctorregmodel->get_hospital($config['limit'],$offset);
		$config['total_rows']   =  get_found_rows();
		$data['heading_title'] 	=  'Hospital List';
		$data['module'] 		=  'Hospital';
		$data['page_links'] 	=  admin_pagination($base_url, $config['total_rows'],$config['limit'],$offset);
		if( $this->input->post('status_action')!='')
		{
			$this->managementmodel->update_status('hospital','premium_id');			
		}
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('hospital_view',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
	
	public function hospital_doctor()
	{	
		$pagesize               =  (int) $this->input->get_post('pagesize');
		$config['limit']	    =  ( $pagesize > 0 ) ? $pagesize : 10;	
		$offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		$data['doctor'] 		=  $this->doctorregmodel->get_doctor($config['limit'],$offset);
		$config['total_rows']   =  get_found_rows();
		$data['heading_title'] 	=  'Practice List';
		$data['module'] 		=  'Practice';
		$data['page_links'] 	=  admin_pagination($base_url, $config['total_rows'],$config['limit'],$offset);
		if( $this->input->post('status_action')!='')
		{	
			$this->managementmodel->update_status('dr_practice','id');			
		}
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('hospital_doctor_view',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
	
	public function doctor_fee_time()
	{	
		$pagesize               =  (int) $this->input->get_post('pagesize');
		$config['limit']	    =  ( $pagesize > 0 ) ? $pagesize : 10;	
		$offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		$data['doctor'] 		=  $this->doctorregmodel->get_doctor_fee_time($config['limit'],$offset);
		$config['total_rows']   =  get_found_rows();
		$data['heading_title'] 	=  'Doctor Fee & Time';
		$data['module'] 		=  'Doctor Fee & Time';
		$data['page_links'] 	=  admin_pagination($base_url, $config['total_rows'],$config['limit'],$offset);
		if( $this->input->post('status_action')!='')
		{	
			$this->managementmodel->update_status('dr_practice','id');			
		}
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('hospital_doctor_fee_time_view',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
	public function createHospitalExcel() 
	{	
		$fileName = 'hospital.xlsx';  
		$doctorData = $this->doctorregmodel->get_hospital_list();
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Type');
        $sheet->setCellValue('D1', 'City'); 
		$sheet->setCellValue('E1', 'Email');
		$sheet->setCellValue('F1', 'Mobile');
        $sheet->setCellValue('G1', 'Reg. Date');       
        $rows = 2;
        foreach ($doctorData as $val){
			if($val['TYPE']=='1'){ $type ="Private Hospital"; }else{ $type ="Government Hospital"; }
            $sheet->setCellValue('A' . $rows, $val['id']);
            $sheet->setCellValue('B' . $rows, $val['name']);
            $sheet->setCellValue('C' . $rows, $type);
            $sheet->setCellValue('D' . $rows, getCityName($val['city']));
			$sheet->setCellValue('E' . $rows, $val['email']);
			$sheet->setCellValue('F' . $rows, $val['mobile']);
            $sheet->setCellValue('G' . $rows, $val['creat_date']);
            $rows++;
        } 
        $writer = new Xlsx($spreadsheet);
		$writer->save("public/assets/export/".$fileName);
		header("Content-Type: application/vnd.ms-excel");
        redirect(base_url()."public/assets/export/".$fileName);              
    }    
	
	public function viewclinic()
	{
		$pagesize               =  (int) $this->input->get_post('pagesize');
		$config['limit']	    =  ( $pagesize > 0 ) ? $pagesize : 10;	
		$offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		$data['clinic'] 		=  $this->doctorregmodel->get_clinic($config['limit'],$offset);
		$config['total_rows']   =  get_found_rows();
		$data['heading_title'] 	=  'Clinic List';
		$data['module'] 		=  'Clinic';
		$data['page_links'] 	=  admin_pagination($base_url, $config['total_rows'],$config['limit'],$offset);
		if( $this->input->post('status_action')!='')
		{
			$this->managementmodel->update_status('clinic','id');			
		}
		
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('clinicview',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
	
	function validate_member($str)
	{	
	   $field_value = $str; //this is redundant, but it's to show you how
	   //the content of the fields gets automatically passed to the method
	   $hospital = $this->doctorregmodel->check_hospital(array('EMAIL'=>$field_value));
	   if(is_array($hospital) && !empty($hospital))
	   {
			$this->form_validation->set_message('validate_member','Email Id is alredy Exist!');
			return FALSE ;
	   }
	   else
	   {
			return TRUE;
	   }
	}
	
	public function add()
	{	
		$data['heading_title'] 	=  'Hospital Add';
		$data['module'] 		=  'Clinic/Hospital';
		$this->form_validation->set_rules('objective','Type','trim|required|max_length[100]');
		$this->form_validation->set_rules('type','Hospital Type','trim|required|max_length[100]');
		$this->form_validation->set_rules('name','Name','trim|required|max_length[255]');
		$this->form_validation->set_rules('website','Website','trim|max_length[100]');
		$this->form_validation->set_rules('city','City','trim|required|max_length[100]');
		$this->form_validation->set_rules('location','Location','trim|max_length[100]');
		$this->form_validation->set_rules('address','Address','trim|max_length[255]');
		$this->form_validation->set_rules('mobile','Mobile No',"trim|numeric|required|max_length[255]|is_unique[hospitallogin.MOBILE='".$this->db->escape_str($this->input->post('mobile'))."' AND status!='2']");
		$this->form_validation->set_rules('email', '"Email Address"','trim|required|valid_email|callback_validate_member');
		$this->form_validation->set_rules('password','Password','trim|max_length[50]');
		$this->form_validation->set_rules('about','About','trim|max_length[255]');
		$this->form_validation->set_rules('tags','Tags','trim|max_length[100]');
		$this->form_validation->set_rules('services[]','Services','trim|required|max_length[255]');
		$this->form_validation->set_rules('package','Package','trim|required|max_length[255]');
		if($this->form_validation->run()==TRUE)
		{	
			$uploadimage='';
			$id=base64_decode($this->input->post('eid'));
			$type= $this->input->post('objective');			
			if($type=='H')
			{
				$typename='hospital';
			}
			else if($type=='C')
			{
				$typename='clinic';
			}
				$uploadimage=$_FILES['uploadimage']['name'];
				$extsign = pathinfo($_FILES['uploadimage']['name'],PATHINFO_EXTENSION);
				
				$uploadimage2=$_FILES['idproof']['name'];
				$extsign2 = pathinfo($_FILES['idproof']['name'],PATHINFO_EXTENSION);
				
				$uploadimage3=$_FILES['regproof']['name'];
				$extsign3 = pathinfo($_FILES['regproof']['name'],PATHINFO_EXTENSION);
				
				if($uploadimage!='') 
				{	
					$rname=rand(1111111,999999999);
					$date=date('Y-m-d');
					$uploadimage=$typename.'_profile_pic_'.$rname.$date.'.'.$extsign;
					$rname=rand(1111111,999999999);
					$uploadimage2=$typename.'_id_proof_'.$rname.$date.'.'.$extsign;
					$rname=rand(1111111,999999999);
					$uploadimage3=$typename.'_reg_proof_'.$rname.$date.'.'.$extsign;
					
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
						redirect(base_url().'doctor/clinicreg/add');
						exit();
						
					}
					else
					{
						
						$config['file_name']  = $uploadimage2;
						$this->load->library('upload', $config);
						$this->upload->do_upload('idproof');
						
						$config['file_name']  = $uploadimage3;
						$this->load->library('upload', $config);
						$this->upload->do_upload('regproof');
						
						if($this->doctorregmodel->clinicinsert($uploadimage,$uploadimage2,$uploadimage3)) 
						{
							$msg="<div class='alert alert-success'><strong>Success!</strong> Data Added Successfully</div>";
							$this->session->set_flashdata('flashmsg',$msg);
							redirect(base_url().'doctor/clinicreg/add');
						
						}
						else
						{
							$msg="<div class='alert alert-danger'><strong>Failed!</strong> Something went wrong. Please try again.</div>";
							$this->session->set_flashdata('flashmsg',$msg);
							redirect(base_url().'doctor/clinicreg/add');
						}
					}
				}
			//}	
		}
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('clinicreg',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
	
	/***************************************/
	
	public function updatehospital()
	{
		$id			=	$this->uri->segment(4);
		$hospital	= 	$this->db->get_where('hospital',array('id'=>$id))->row();
		if(is_object($hospital) && !empty($hospital))
		{
			
			$hospital_login	= $this->db->get_where('hospitallogin',array('USERID'=>$hospital->uid))->row();
			if(is_object($hospital_login) && !empty($hospital_login))
			{
				$data['hospital']		= $hospital;
				$data['hospital_login']	= $hospital_login;
				$data['heading_title'] 	= 'Hospital Update';
				$data['module'] 		= 'Hospital';
				
				//$this->form_validation->set_rules('objective','Type','trim|required|max_length[30]');
				$this->form_validation->set_rules('type','Hospital Type','trim|required|max_length[30]');
				$this->form_validation->set_rules('name','Name','trim|required|max_length[155]');
				$this->form_validation->set_rules('website','Website','trim|max_length[100]');
				$this->form_validation->set_rules('city','City','trim|required|max_length[30]');
				$this->form_validation->set_rules('location','Location','trim|max_length[30]');
				$this->form_validation->set_rules('address','Address','trim|max_length[255]');
				//$this->form_validation->set_rules('mobile','Mobile No',"trim|required|max_length[255]|is_unique[hospitallogin.MOBILE='".$this->db->escape_str($this->input->post('mobile'))."' AND USERID!='".$hospital_login->USERID."']");
				//$this->form_validation->set_rules('email','Email',"trim|required|max_length[255]|is_unique[hospitallogin.EMAIL='".$this->db->escape_str($this->input->post('email'))."' AND status!='2']");
				$this->form_validation->set_rules('about','About','trim|max_length[500]');
				$this->form_validation->set_rules('tags','Tags','trim|max_length[30]');
				$this->form_validation->set_rules('services','Services','trim|required|max_length[30]');
				$this->form_validation->set_rules('package','Package','trim|required|max_length[255]');
				if($this->form_validation->run()==TRUE)
				{	//echo "<pre>"; print_r($_POST); die;
					$config['upload_path']          = './public/assets/upload/';
					$config['allowed_types'] 		= 'jpg|png|jpeg|JPG|PNG|JPEG';
					$config['max_size']             = 2048;
					$config['quality'] 				= '60%';
					$typename 						= 'hospital';
					$uploadimage		= $hospital->drimage;
					$unlink_image 		= array('source_file'=>$hospital->drimage);
					if($_FILES['uploadimage']['name']) 
					{	
						$uploadimage=$_FILES['uploadimage']['name'];
						$extsign = pathinfo($_FILES['uploadimage']['name'],PATHINFO_EXTENSION);
						$rname=rand(1111111,999999999);
						$date=date('Y-m-d');
						$uploadimage=$typename.'_profile_pic_'.$rname.$date.'.'.$extsign;
						$config['file_name']  			= $uploadimage;
						//echo "<pre>"; print_r($config['file_name']); die;
						$this->load->library('upload', $config);
						$this->upload->do_upload('uploadimage');
						removeImage($unlink_image);
					}	
					$uploadimage2		= $hospital->id_proof;
					$unlink_image2 		= array('source_file'=>$hospital->id_proof);
					if($_FILES['idproof']['name']) 
					{
						$uploadimage2=$_FILES['idproof']['name'];
						$extsign2 = pathinfo($_FILES['idproof']['name'],PATHINFO_EXTENSION);
						$rname=rand(1111111,999999999);
						$date=date('Y-m-d');
						$uploadimage2=$typename.'_id_proof_'.$rname.$date.'.'.$extsign2;
						$config['file_name']  = $uploadimage2;
						$this->load->library('upload', $config);
						$this->upload->do_upload('idproof');
						removeImage($unlink_image2);
					}
					
					$uploadimage3		= $hospital->med_reg_proof;
					$unlink_image3 		= array('source_file'=>$hospital->med_reg_proof);
					if($_FILES['regproof']['name']) 
					{
						$uploadimage3=$_FILES['regproof']['name'];
						$extsign3 = pathinfo($_FILES['regproof']['name'],PATHINFO_EXTENSION);
						
						$rname=rand(1111111,999999999);
						$date=date('Y-m-d');
						$uploadimage3	=$typename.'_reg_proof_'.$rname.$date.'.'.$extsign3;
						
						$config['file_name']  = $uploadimage3;
						$this->load->library('upload', $config);
						$this->upload->do_upload('regproof');
						removeImage($unlink_image3);
					}
					if($this->doctorregmodel->updatehospital($uploadimage,$uploadimage2,$uploadimage3,$id,$hospital->uid)) 
					{
						$msg="<div class='alert alert-success'><strong>Success!</strong> Data Updated Successfully</div>";
						$this->session->set_flashdata('flashmsg',$msg);
						redirect(base_url().'doctor/clinicreg/updatehospital/'.$id);
					
					}
					else
					{
						$msg="<div class='alert alert-danger'><strong>Failed!</strong> Something went wrong. Please try again.</div>";
						$this->session->set_flashdata('flashmsg',$msg);
						redirect(base_url().'doctor/clinicreg/updatehospital/'.$id);
					}
					
				}
			}
			else
			{
				redirect('doctor/clinicreg/viewhospital','');
			}
		}
		else
		{
			redirect('doctor/clinicreg/viewhospital','');
		}
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('updatehospital',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
	
	public function viewgallery()
	{

		$data['hosp_gal']=$this->db->select('hospital.id,hospital.name,hospitalgallery.*')->join('hospital','hospital.id=hospitalgallery.uid','left')->get_where('hospitalgallery')->result_array();

		$data['module']='gallery';
		
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('hospital_gallery',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}

	public function updategallery()
	{
		$id=$this->uri->segment(4);
		$data['gallery']=$this->db->get_where('hospitalgallery',array('id'=>$id))->row();
		$data['module']='gallery';
		if(!empty($_POST['submit']))
		{
			if(!empty($_FILES['uploadimage']['name']))
			{
                $config['upload_path'] 		= './public/assets/upload/';
                $config['allowed_types'] 	= 'jpg|png|jpeg|JPG|PNG|JPEG';
                $config['max_size']         = 2048;
				$config['quality'] 			= '60%';
                $config['file_name'] 		= $_FILES['uploadimage']['name'];
                //Load upload library and initialize configuration
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
                $uploadimage = $data['gallery']->image;
            }  
			$this->load->model('doctorregmodel');
			$this->doctorregmodel->updategallery($id,$uploadimage);
			$msg="<div class='alert alert-success'><strong>Success!</strong> Data Added Successfully</div>";
			$this->session->set_flashdata('flashmsg',$msg);	
			redirect('doctor/clinicreg/updategallery/'.$id.'');
		}
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('updatehospital_gallery',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}

	public function galleryview($id)
	{    
		$data['hosp_gallery']=$this->db->get_where('hospitalgallery',array('id'=>$id))->row();
		$data['module']='gallery';
		
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('viewhospital_gallery',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	
	}

	public function delete()
	{
		$id=$this->input->get('id');
		$this->load->model('doctorregmodel');
		$this->doctorregmodel->gallerydelete($id);
		redirect(base_url().'doctor/clinicreg/viewgallery');
	}

	/*
	public function deletegallery()
    {
       $id=$this->uri->segment(4);
        $this->load->model('doctorregmodel');
       $this->doctorregmodel->gallerydelete($id);
        redirect(base_url().'doctor/clinicreg/viewgallery');
    } */
	
	public function clinicapprove()
	{
		$did=$this->input->post('did');
		$current=$this->db->select('approved')->get_where('clinic',array('id'=>$did))->row()->approved;
		if($current=='1'){
			$this->db->set('approved','0')->where(array('id'=>$did))->update('clinic');
			$response=array('status'=>'0');
		}else if($current=='0'){
			$this->db->set('approved','1')->where(array('id'=>$did))->update('clinic');
			$response=array('status'=>'1');
		}
		echo json_encode($response);
	}
	 
	public function clinicverify()
	{
		$did=$this->input->post('did');
		$current=$this->db->select('verified')->get_where('clinic',array('id'=>$did))->row()->verified;
		if($current=='1'){
			$this->db->set('verified','0')->where(array('id'=>$did))->update('clinic');
			$response=array('status'=>'0');
		}else if($current=='0'){
			$this->db->set('verified','1')->where(array('id'=>$did))->update('clinic');
			$response=array('status'=>'1');
		}
		echo json_encode($response);
	}
	 
	public function hospitalapprove()
	{
		$did=$this->input->post('did');
		$current=$this->db->select('approved')->get_where('hospital',array('id'=>$did))->row()->approved;
		if($current=='1'){
			$this->db->set('approved','0')->where(array('id'=>$did))->update('hospital');
			$response=array('status'=>'0');
		}else if($current=='0'){
			$this->db->set('approved','1')->where(array('id'=>$did))->update('hospital');
			$response=array('status'=>'1');
		}
		echo json_encode($response);
	}
	 
	public function hospitalverify()
	{
		$did=$this->input->post('did');
		$current=$this->db->select('verified')->get_where('hospital',array('id'=>$did))->row()->verified;
		if($current=='1'){
			$this->db->set('verified','0')->where(array('id'=>$did))->update('hospital');
			$response=array('status'=>'0');
		}else if($current=='0'){
			$this->db->set('verified','1')->where(array('id'=>$did))->update('hospital');
			$response=array('status'=>'1');
		}
		echo json_encode($response);
	}
	 
	 
	public function updateclinic($id)
	{
		$data['clinic']=$this->db->get_where('clinic',array('id'=>$id))->row();
		$data['module']='clinic';
		
		if($_POST['submit']){
				         $this->load->model('doctorregmodel');
                 $this->doctorregmodel->updateclinic($id);
         
				    $msg="<div class='alert alert-success'><strong>Success!</strong> Data Added Successfully</div>";
							$this->session->set_flashdata('flashmsg',$msg);
				     }
		
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('updateclinic',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
	 
	public function clinicview($id)
	{
		$data['clinic']=$this->db->get_where('clinic',array('id'=>$id))->row();
		$data['module']='clinic';		     
         // print_r($data);
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('viewclinic',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
	 
	 
	
	
	public function hospitalview($id)
	{    
		$data['hospital']=$this->db->get_where('hospital',array('id'=>$id))->row();
		$data['module']='hospital';
		
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('viewhospital',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	
	}

	
	public function delete_clinic()
    {
        $id=$this->uri->segment(4);
        $this->load->model('doctorregmodel');
        $this->doctorregmodel->clinic_delete($id);
        redirect(base_url().'doctor/clinicreg/viewclinic');   
    }  
	
	public function deletehospital()
    {
        $id=$this->uri->segment(4);
        $this->load->model('doctorregmodel');
        $this->doctorregmodel->hospitaldelete($id);
        redirect(base_url().'doctor/clinicreg/viewhospital');   
    }  
	
	public function insert()
	{
		if(isset($_POST['submit']))
		{
			$uploadimage='';
			//$id=base64_decode($this->input->post('id'));
			$uploadimage=$_FILES['uploadimage']['name'];
			$extsign = pathinfo($_FILES['uploadimage']['name'],PATHINFO_EXTENSION);
       
			if($uploadimage != '') 
			{	
				$rname=rand(1111111,999999999);
				$date=date('Y-m-d');
				$uploadimage=$typename.'_profile_pic_'.$rname.$date.'.'.$extsign;
				
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
					redirect(base_url().'doctor/clinicreg/insert');
					exit();
				}

				if($this->doctorregmodel->gallery($uploadimage)) 
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
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('gallery');
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
    }
	
    public function biomedicalmachine()
	{
		if(isset($_POST['submit']))
		{
			$uploadimage='';
			//$id=base64_decode($this->input->post('id'));
			$uploadimage=$_FILES['uploadimage']['name'];
			$extsign = pathinfo($_FILES['uploadimage']['name'],PATHINFO_EXTENSION);
			if($uploadimage != '') 
			{	
				$rname=rand(1111111,999999999);
				$date=date('Y-m-d');
				$uploadimage=$typename.'_profile_pic_'.$rname.$date.'.'.$extsign;
				
				$config['upload_path']          = './public/assets/upload/';
				$config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG|PDF|pdf';
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
					redirect(base_url().'doctor/clinicreg/biomedicalmachine');
					exit();
				}

				if($this->doctorregmodel->biomedicalmachine($uploadimage)) 
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
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('equepment');
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}

         
    public function advertisment()
	{
		if(isset($_POST['submit']))
		{
			$id=base64_decode($this->input->post('eid'));
			if($id=='')
			{
				$uploadimage='';
				//$id=base64_decode($this->input->post('id'));
				$uploadimage=$_FILES['uploadimage']['name'];
				$extsign = pathinfo($_FILES['uploadimage']['name'],PATHINFO_EXTENSION);
      	
				if($uploadimage != '') 
				{	
					$rname=rand(1111111,999999999);
					$date=date('Y-m-d');
					$uploadimage=$typename.'_profile_pic_'.$rname.$date.'.'.$extsign;
					
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
						redirect(base_url().'doctor/clinicreg/advertisment');
						exit();
					}

					if($this->doctorregmodel->advertisment($uploadimage)) 
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
		}		
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('advertisment');
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
    }
}
