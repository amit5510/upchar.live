<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."/third_party/vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Doctorview extends CI_Controller 
{

	function __construct() 
	{
		parent::__construct(); 
		$this->load->model(array('doctorviewmodel','appointmentmodel'));
		$this->load->helper(array('query_string_helper','dbquery_helper','admin_helper'));
	}
	 
	public function index()
	{
		$pagesize               =  (int) $this->input->get_post('pagesize');
		$config['limit']	    =  ( $pagesize > 0 ) ? $pagesize : 10;	
		$offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		$data['doctor'] 		=  $this->doctorviewmodel->get_doctor($config['limit'],$offset);
		//echo "<pre>"; print_r($data['doctor']); die;
		$config['total_rows']   =  get_found_rows();
		$data['heading_title'] 	=  'Doctor List';
		$data['module'] 		=  'Doctor';
		$data['page_links'] 	=  admin_pagination($base_url, $config['total_rows'],$config['limit'],$offset);
		if( $this->input->post('status_action')!='')
		{
			$this->managementmodel->update_status('profile_dr','id');			
		}
		$data['city']  			=  $this->appointmentmodel->get_city(array('status'=>'1'));
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('doctorview',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	
	}
	
	public function createExcel() 
	{
		$fileName = 'doctor.xlsx';  
		$doctorData = $this->doctorviewmodel->get_doctor_list();
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Doctor ID');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'City');
        $sheet->setCellValue('D1', 'Email');
		$sheet->setCellValue('E1', 'Mobile');
        $sheet->setCellValue('F1', 'Reg. Date');       
        $rows = 2;
        foreach ($doctorData as $val){
            $sheet->setCellValue('A' . $rows, $val['id']);
            $sheet->setCellValue('B' . $rows, $val['fname']);
            $sheet->setCellValue('C' . $rows, getCityName($val['city']));
            $sheet->setCellValue('D' . $rows, $val['email']);
			$sheet->setCellValue('E' . $rows, $val['mobile']);
            $sheet->setCellValue('F' . $rows, $val['creat_date']);
            $rows++;
        } 
        $writer = new Xlsx($spreadsheet);
		$writer->save("public/assets/export/".$fileName);
		header("Content-Type: application/vnd.ms-excel");
        redirect(base_url()."public/assets/export/".$fileName);              
    }    
	
	public function approve()
	{
		$did=$this->input->post('did');
		$current=$this->db->select('approved')->get_where('profile_dr',array('id'=>$did))->row()->approved;
		if($current=='1'){
			$this->db->set('approved','0')->where(array('id'=>$did))->update('profile_dr');
			$response=array('status'=>'0');
		}else if($current=='0'){
			$this->db->set('approved','1')->where(array('id'=>$did))->update('profile_dr');
			$response=array('status'=>'1');
		}
		echo json_encode($response);
	}
	 
	public function verify()
	{
		$did=$this->input->post('did');
		$current=$this->db->select('verified')->get_where('profile_dr',array('id'=>$did))->row()->verified;
		if($current=='1'){
			$this->db->set('verified','0')->where(array('id'=>$did))->update('profile_dr');
			$response=array('status'=>'0');
		}else if($current=='0'){
			$this->db->set('verified','1')->where(array('id'=>$did))->update('profile_dr');
			$response=array('status'=>'1');
		}
		echo json_encode($response);
	}
	
	 
    public function viewdoctor($id)
    {
      //echo"hello i am dharmendra rajput from bareilly";
    	$data['profile_dr']=$this->db->get_where('profile_dr',array('id' =>$id))->row();
		$data['module']='profile_dr';
		$data_spl=$this->db->select('specialization_id')->get_where('dr_specialization',array('user_id'=>$id))->result_array();
		$data['data_spl']= array_map (function($value){
					return $value['specialization_id'];
				} , $data_spl);		
			//	print_r($data['data_spl']);
	//	$did=$this->input->post('id');
		
	//	$this->Doctorregmode->viewdoc($did);
		
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('viewprofile',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');

       // $this->Doctorregmodel->viewdoc();
  
  
      }

	  // update doctor details  10/01/2019
	
         public function updatedoctor()
         { 
            $id=$this->uri->segment(4);
         	$result['profile_dr']=$this->db->get_where('profile_dr',array('id' =>$id))->row();
         	$result['module']='profile_dr';
   
       $data_spl=$this->db->select('specialization_id')->get_where('dr_specialization',array('user_id'=>$id))->result_array();
		$result['data_spl']= array_map (function($value){
					return $value['specialization_id'];
				} , $data_spl);	
				
				     if($_POST['submit']){
				         $this->load->model('doctorregmodel');
                 $this->doctorregmodel->updatedoctor($id);
         
				$msg="<div class='alert alert-success'><strong>success!</strong> success</div>";
				$this->session->set_flashdata('flashmsg',$msg);
				    
				     }
         
     	$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('doctorupdate',$result);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');

          }
          
          public function deletedoctor()
    {
           $id=$this->uri->segment(4);
        	//$this->load->model('doctorregmodel');
           $this->load->model('doctorregmodel');
           	$this->doctorregmodel->deletedoctor($id);
           redirect(base_url().'doctor/doctorview');
         // echo"delete successfully";   
    }  


	public function duplicate()
	{
		$data['traineeview']=$this->db->order_by('id','DESC')->get_where('fddi_trainee_duplicate');
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('traineeviewduplicate',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
	
	public function fetchdata()
	{
		$vid=$this->input->post('vid');
		$type=$this->input->post('type');
		$subcenterid=$this->input->post('subcenterid');
		
		/*$this->db->where('fddi_trainee_batch.trainee_id IS NULL');
		$this->db->join('fddi_trainee_batch','fddi_trainee_registration.id = fddi_trainee_batch.trainee_id','left');
		$traineeview=$this->db->order_by('id','DESC')->get_where('fddi_trainee_registration');*/
		
		$alldata=array();
		$counttot=0;
		
		if($type=='dpr')
		{
			$this->db->where('fddi_trainee_batch.trainee_id IS NULL');
			$this->db->join('fddi_trainee_batch','fddi_trainee_registration.id = fddi_trainee_batch.trainee_id','left');
			$traineeview=$this->db->order_by('id','DESC')->get_where('fddi_trainee_registration',array('dpr'=>$vid));
		}
		else if($type=='center')
		{
			$this->db->where('fddi_trainee_batch.trainee_id IS NULL');
			$this->db->join('fddi_trainee_batch','fddi_trainee_registration.id = fddi_trainee_batch.trainee_id','left');
			$traineeview=$this->db->order_by('id','DESC')->get_where('fddi_trainee_registration',array('center'=>$vid));
		}
		else if($type=='subcenter')
		{
			$this->db->where('fddi_trainee_batch.trainee_id IS NULL');
			$this->db->join('fddi_trainee_batch','fddi_trainee_registration.id = fddi_trainee_batch.trainee_id','left');
			$traineeview=$this->db->order_by('id','DESC')->get_where('fddi_trainee_registration',array('subcenter'=>$vid));
		}
		else if($type=='course')
		{
			$this->db->where('fddi_trainee_batch.trainee_id IS NULL');
			$this->db->join('fddi_trainee_batch','fddi_trainee_registration.id = fddi_trainee_batch.trainee_id','left');
			$traineeview=$this->db->order_by('id','DESC')->get_where('fddi_trainee_registration',array('course'=>$vid,'subcenter'=>$subcenterid));
		}
		
		foreach($traineeview->result() as $traineedata){ 
		/* $dpr=$this->db->get_where('dpr_create',array('dpr_id'=>$traineedata->dpr))->row('dpr_name');
		$center=$this->db->get_where('fddi_center',array('id'=>$traineedata->center))->row('center_name');
		$subcenter=$this->db->get_where('fddi_subcenter',array('subcenter_id'=>$traineedata->subcenter))->row('subcenter_name');
		$course=$this->db->get_where('master_course',array('course_id'=>$traineedata->course))->row('course_name');
		 */
			$alldata['table'][]='<tr>
						<td>'.$traineedata->id.'</td>
						<td>'.$traineedata->t_first_name.' '.$traineedata->t_middle_name.' '.$traineedata->t_last_name.'</td>
						<td>'.$traineedata->f_first_name.' '.$traineedata->f_middle_name.' '.$traineedata->f_last_name.' </td>
						<td>'.formateDate($traineedata->dob).'</td>
						<td>'.$traineedata->address.'</td>
						<td>'.$traineedata->aadhar.'</td>
						<td>'.$dpr.'</td>
						<td>'.$center.'</td>
						<td>'.$subcenter.'</td>
						<td>'.$course.'</td>
					  </tr>';
				$counttot++;
		}
		
		
			
			$alldata['counttot']=$counttot;
			if($counttot==0){$alldata['table'][]='<tr>
								<td colspan="9">No result found</td>
							</tr>';}
		echo json_encode($alldata);
	}

    public function viewgallery()
	{

		$data['doc_gal']=$this->db->select('profile_dr.id,profile_dr.fname,doctorgallery.*')->join('profile_dr','profile_dr.id=doctorgallery.user_id','left')->get_where('doctorgallery')->result_array();
		
		$data['module']='gallery';
		

		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('doctor_gallery',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}

	public function galleryview($id)
	{    
		$data['hosp_gallery']=$this->db->get_where('doctorgallery',array('id'=>$id))->row();
		$data['module']='gallery';
		
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('viewhospital_gallery',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	
	}

	public function updategallery()
	{
		$id=$this->uri->segment(4);
		$data['gallery']=$this->db->get_where('doctorgallery',array('id'=>$id))->row();

		$data['module']='gallery';
		
		    if($_POST['submit']){
		    
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
                $this->doctorregmodel->updatedocgallery($id,$uploadimage);
			    $msg="<div class='alert alert-success'><strong>Success!</strong> Data Added Successfully</div>";
			    $this->session->set_flashdata('flashmsg',$msg);	
			    redirect('doctor/doctorview/updategallery/'.$id.'');
				
			}
					
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('updatedoctor_gallery',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}

	public function delete()
       {
           	$id=$this->input->get('id');
           	$this->load->model('doctorregmodel');
           	$this->doctorregmodel->gallerydocdelete($id);
            redirect(base_url().'doctor/doctorview/viewgallery');

       }
    
  
}
