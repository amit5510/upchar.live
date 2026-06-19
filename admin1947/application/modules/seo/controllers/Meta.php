<?php
class Meta extends CI_Controller
{
	function __construct() 
	{
		 parent::__construct();
		 date_default_timezone_set("Asia/Kolkata");
		 $date=date('Y-m-d h:i:s');
		 $this->load->helper(array('query_string_helper','dbquery_helper','admin_helper'));
		 $this->load->model('meta_model');
	}
	
	public function index()
	{	
		$pagesize               =  (int) $this->input->get_post('pagesize');
		$config['limit']	    =  ( $pagesize > 0 ) ? $pagesize : 10;	
		$offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		$data['data'] 			=  $this->meta_model->get_meta($config['limit'],$offset);
		$config['total_rows']   =  get_found_rows();
		$data['heading_title'] 	= 'Meta Tag List';
		$data['page_links'] 	=  admin_pagination($base_url, $config['total_rows'],$config['limit'],$offset);
	    $this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('meta_list_view',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
	
	public function add()
	{
		$url_posted=str_replace(base_url(),"",$this->input->post('page_url'));
		$data['heading_title'] = 'Add Meta Tag';						
		$this->form_validation->set_rules('page_url','URL',"trim|required|is_unique[tbl_meta_tags.page_url='".$url_posted."'] ");
		$this->form_validation->set_rules('meta_title','Title','trim|required|max_length[80]');
		$this->form_validation->set_rules('meta_keyword','Keyword','trim|required|max_length[160]');
		$this->form_validation->set_rules('meta_description','Description','trim|required|max_length[160]');
	
		if($this->form_validation->run()==TRUE)
		{
							
			$page_url = $this->input->post('page_url');
							
			$posted_data = array(
								'page_url' 			=>$page_url,
								'meta_title' 		=>$this->input->post('meta_title',TRUE),
								'meta_keyword' 		=>$this->input->post('meta_keyword',TRUE),
								'meta_description'	=>$this->input->post('meta_description',TRUE),
								'meta_date_added'	=>date('Y-m-d h:i:s'),				
								);
			//$this->meta_model->safe_insert('tbl_meta_tags',$posted_data,FALSE);	
			$this->db->insert('meta_tags',$posted_data);
			$this->session->set_userdata('msg_type',"success" ); 
			$this->session->set_flashdata('success','Record Successfully Submited'); 
			redirect('seo/meta', '');
		}   
		
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('meta_add_view',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
	
	public function edit()
	{
	    $data['heading_title'] = 'Edit Meta Tag';			
		$Id        = (int) $this->uri->segment(4);	
		$condtion  = "meta_id ='$Id' ";	
		$res       =   $this->meta_model->get_meta(0,1,$condtion);
		echo "<pre>"; print_r($res); die;
		if(is_array($res) && !empty($res) )
		{ 
			$res       = $res[0];
		 	$url_posted=str_replace(base_url(),"",$this->input->post('page_url'));
			$this->form_validation->set_rules('page_url','URL',"trim|required|unique[tbl_meta_tags.page_url='".$url_posted."' AND meta_id!='".$this->db->escape_str($res['meta_id'])."']");
			$this->form_validation->set_rules('meta_title','Title','trim|required|max_length[80]');
			$this->form_validation->set_rules('meta_keyword','Keyword','trim|required|max_length[160]');
			$this->form_validation->set_rules('meta_description','Description','trim|required|max_length[160]');
			if($this->form_validation->run()==TRUE)
			{
				$page_url = $this->input->post('page_url');
				
				$posted_data = array(
									'page_url' 			=>$page_url,
									'meta_title' 		=>$this->input->post('meta_title',TRUE),
									'meta_keyword' 		=>$this->input->post('meta_keyword',TRUE),
									'meta_description' 	=>$this->input->post('meta_description',TRUE)
									);
				$where = "meta_id = '".$res['meta_id']."'"; 						
				$this->meta_model->safe_update('tbl_meta_tags',$posted_data,$where,FALSE);	
				$this->session->set_userdata('msg_type',"success" ); 
				$this->session->set_flashdata('success','Record Successfully Updated'); 
				redirect('backoffice/meta/'.query_string(), ''); 	
			}
			$data['res']=$res;
			$this->load->view('backoffice/metatag/meta_edit_view',$data);
		}
		else
		{
			redirect('backoffice/meta', ''); 	 
		}
	}  
}
//controllet end