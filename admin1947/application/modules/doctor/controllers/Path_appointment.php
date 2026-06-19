<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."/third_party/vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Path_appointment extends CI_Controller 
{
	function __construct()
	{
		 parent::__construct();
		 date_default_timezone_set("Asia/Kolkata");
		 $date=date('Y-m-d h:i:s');
		 $this->load->helper(array('query_string_helper','dbquery_helper','admin_helper'));
		 $this->load->model('path_appointmentmodel');
		 $this->load->library('Pdf');
	}
 
	public function index()
	{	
		$pagesize               =  (int) $this->input->get_post('pagesize');
		$config['limit']	    =  ( $pagesize > 0 ) ? $pagesize : 10;	
		$offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		$data['data'] 			=  $this->path_appointmentmodel->get_booking($config['limit'],$offset);
		$config['total_rows']   =  get_found_rows();
		$data['heading_title'] 	= 'Path Booking List';
		$data['page_links'] 	=  admin_pagination($base_url, $config['total_rows'],$config['limit'],$offset);
	    $data['city']  			=  $this->path_appointmentmodel->get_city(array('status'=>'1'));
	    $this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('path_appointment/path_booking_list',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
	
	public function book_test()
	{
		$pagesize               =  (int) $this->input->get_post('pagesize');
		$config['limit']	    =  ( $pagesize > 0 ) ? $pagesize : 2;	
		$offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		$data['path_test'] 		=  $this->path_appointmentmodel->get_path_test($config['limit'],$offset);
		$config['total_rows']   =  get_found_rows();
		$data['heading_title'] 	=  'Book Test';
		$data['module'] 		=  'Test';
		//$data['page_links'] 	=  admin_pagination($base_url, $config['total_rows'],$config['limit'],$offset);
		
		$this->form_validation->set_rules('patient_name','Patient Name',"trim|required|max_length[255]");
		$this->form_validation->set_rules('patient_mobile','Patient Mobile','trim|required|max_length[12]');
		$this->form_validation->set_rules('patient_email','Patient Email','trim|max_length[50]');
		$this->form_validation->set_rules('pathlab_id','Path Lab','trim|required|max_length[255]');
		$this->form_validation->set_rules('arr_ids[]','Test Name','trim|required|max_length[500]');
		if($this->form_validation->run()==TRUE)
		{	
			
			$test_arr_ids		=	$this->input->post('arr_ids');
			if(is_array($test_arr_ids) && !empty($test_arr_ids))
			{	
				$path_test_total	=	0;
				for($i=0; $i<count($test_arr_ids); $i++)
				{
					$path_test_arr	=	$this->path_appointmentmodel->test_list(array(
																			'path_lab_test.test_id'=>$test_arr_ids[$i],
																			'path_lab_test.path_lab_id'=>$this->input->post('pathlab_id'),
																			));
					
					if(is_array($path_test_arr) && !empty($path_test_arr))
					{
						$path_test_total	= $path_test_total+$path_test_arr[0]['amount'];	
						$path_test[]		= $path_test_arr[0];
					}
				}
			}
			
			$book_data = array(
									'patient_name'		=>$this->input->post('patient_name'),
									'patient_mobile'	=>$this->input->post('patient_mobile'),
									'patient_email'		=>$this->input->post('patient_email'),
									'pathlab_id'		=>$this->input->post('pathlab_id'),
									'total_amount'		=>$path_test_total,
									'book_date'			=>date('Y-m-d'),
								);
			$this->db->insert('path_book',$book_data);
			$booking_id	=	$this->db->insert_id();
			if(is_array($path_test) && !empty($path_test))
			{
				foreach($path_test as $val)
				{
					$test_data = array(
										'booking_id'		=>$booking_id,
										'pathlab_id'		=>$val['path_lab_id'],
										'test_id'			=>$val['test_id'],
										'test_name'			=>$val['test_name'],
										'short_name'		=>$val['short_name'],
										'method'			=>$val['method'],
										'amount'			=>$val['amount'],
									);
					$this->db->insert('path_book_test',$test_data);
				}
			}
			
			$msg="<div class='alert alert-success'><strong>Success!</strong> Booking Successfully Completed</div>";
			$this->session->set_flashdata('flashmsg',$msg);
			redirect('doctor/path_appointment/','');
			//redirect('doctor/path_appointment/book_test/'.$booking_id.'','');
		}
		$data['test_list']		= $this->path_appointmentmodel->test_list(array('path_lab_test.status'=>1));
		$this->load->view('path_appointment/book_test',$data);
	}
	
	public function booking_details()
	{
		$booking_id				=	$this->uri->segment(4);
		$data['booking'] 		=	$this->path_appointmentmodel->get_booking(1,0,array('booking_id'=>$booking_id));
		if(is_object($data['booking']) && !empty($data['booking']))
		{
			$data['booking_test'] 	=	$this->path_appointmentmodel->get_booking_test(array('booking_id'=>$booking_id));
		}
		else
		{
			redirect('doctor/path_appointment/','');
		}
		$this->load->view('path_appointment/booking_details',$data);
	}
	
    public function delete_booking()
    {
		$booking_id		=	$this->uri->segment(4);
		$this->path_appointmentmodel->delete_booking($booking_id);
		redirect(base_url().'doctor/path_appointment/');
    }

   	public function get_locality_by_city_id()
    {   
        $city_id 			=  $this->input->get_post('city_id');
        $locality_list  	=  $this->path_appointmentmodel->get_locality(array('city_id'=>$city_id));
        //print_r($doctor_list); die;
        $output = "<option value=''> Select Locality</option>";
        foreach ($locality_list as $row)
        {
			$output .= "<option value='".$row['id']."'>".$row['name']."</option>"; 
        }
		echo $output;
    }
	
	public function get_pathlab_by_city_id()
    {   
        $city_id 			=  $this->input->get_post('city_id');
        $pathlab_list  		=  $this->path_appointmentmodel->pathlab_list(array('city'=>$city_id));
        $output = "<option value=''> Select Path Lab</option>";
        foreach ($pathlab_list as $row)
        {
			$output .= "<option value='".$row['id']."'>".$row['name']."</option>"; 
        }
		echo $output;
    }
}