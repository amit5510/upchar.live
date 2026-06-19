<?php 
session_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller {
	
function __construct()
	{
	parent::__construct();
	$this->load->model('adminmodel');
	}	
/*
	//function use to redirect on the page with data when check login status//
	public function RedirectToPageWithData($view,$data)
		{
		if($this->session->userdata('ADMIN_USER')!="" and $this->session->userdata('ADMIN_PASS')!="")
			{
			$this->load->view($view,$data);
			//redirect($this->load->view($view,$data));
			}
			else
			{
			$this->load->view('login');
			}
		}
	
	//function use to redirect on the page when check login status//
	public function RedirectToPage($view)
		{
		if($this->session->userdata('ADMIN_USER')!="" and $this->session->userdata('ADMIN_PASS')!="")
			{
			$this->load->view($view);
			}
			else
			{
			$this->load->view('login');
			}
		}
	
	function checklogin()
		{
		if($this->session->userdata('ADMIN_USER')!="" and $this->session->userdata('ADMIN_PASS')!="")
			{
			$user=$this->session->userdata('ADMIN_USER');
			$pass=md5($this->session->userdata('ADMIN_PASS'));
			$passWithOutMD5=$this->session->userdata('ADMIN_PASS');
			$userid=$this->db->get_where('admin_login',array('USERNAME'=>$user,'STATUS'=>'1'))->row()->USER_ID;
			$passDB=$this->db->get_where('admin_login',array('USERNAME'=>$user,'USER_ID'=>$userid,'STATUS'=>'1'))->row()->PASSWORD;
			if($passDB==$pass)
				{
				$this->db->where('USER_ID',$userid);
				$this->db->where('USERNAME',$user);
				$this->db->where('PASSWORD',$pass);
				$user_count=$this->db->count_all_results('admin_login');
				if($user_count==1)
					{
					$data = array(
					'ADMIN_USER' => $user,
					'ADMIN_PASS' => $passWithOutMD5);
				
					$this->session->set_userdata($data);		
					}
					else
					{
					$this->session->sess_destroy();
					redirect(base_url().'admin/index','refresh');
					}
				}
				else
				{
				$this->session->sess_destroy();
				redirect(base_url().'admin/index','refresh');
				}
			}
			else
			{
			$this->session->sess_destroy();
			redirect(base_url().'admin/index','refresh');
			}
		}
		
function CheckLoginAjax()
	{
	if($this->session->userdata('ADMIN_USER')!="" and $this->session->userdata('ADMIN_PASS')!="")
		{
		$user=$this->session->userdata('ADMIN_USER');
		$pass=md5($this->session->userdata('ADMIN_PASS'));
		$passWithOutMD5=$this->session->userdata('ADMIN_PASS');
		$userid=$this->db->get_where('admin_login',array('USERNAME'=>$user,'STATUS'=>'1'))->row()->USER_ID;
		$passDB=$this->db->get_where('admin_login',array('USERNAME'=>$user,'USER_ID'=>$userid,'STATUS'=>'1'))->row()->PASSWORD;
		if($passDB==$pass)
			{
			$this->db->where('USER_ID',$userid);
			$this->db->where('USERNAME',$user);
			$this->db->where('PASSWORD',$pass);
			$user_count=$this->db->count_all_results('admin_login');
			if($user_count==1)
				{
				return true;
				}
				else
				{
				return false;
				}
			}
			else
			{
			return false;
			}
		}
		else
		{
		return false;
		}
	}		
		
//redirect to admin pass change page// 
public function pass()
	{
	$data_pass['passMSG'] = '';
	
	$data['record']= array($data_pass['passMSG']);
	$this->RedirectToPageWithData('pass',$data);
	}
	
//Code for update cat for coupon//
public	function changepassadmin()
	{
	//Including validation library
	$this->load->library('form_validation');
	$this->form_validation->set_error_delimiters('<p class="text-red">', '</p>');
	//Validating Name Field
	$this->form_validation->set_rules('oldpass', 'Old Password',  'required|callback_validate_oldpass');
	$this->form_validation->set_rules('newpass', 'New Password',  'required');
	if ($this->form_validation->run() == FALSE)
		{	
		$data_pass['passMSG'] = '';
	
		$data['record']= array($data_pass['passMSG']);
		$this->RedirectToPageWithData('pass',$data);
		}
		else
		{
		$this->load->model('adminmodel');
		$this->adminmodel->update_adminPASS();
		
		//Loading View 
		$data_pass['passMSG'] = '<br><div class="alert alert-success alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Your Password Updated Successfully.</div>';
	
		$data['record']= array($data_pass['passMSG']);
		$this->RedirectToPageWithData('pass',$data);
		}
	}	
		
	
//function for check old pass of admin//
public function validate_oldpass()
	{
	$this->load->model('adminmodel');
	if($this->adminmodel->check_oldpass())
		{
		return true;
		}
		else
		   {
			$this->form_validation->set_message('validate_oldpass','Your Old Password Is Not Correct');
			return false;
			}
			
	}

*/
function state()
	{
	$data['record']=$this->db->get_where('state',array('country_id'=>'1'))->result_array();
	$data['title']='Manage application state';
	$view='state';
	$this->RedirectToPageWithData($view,$data);
	}
	
	function statestatus()
	{
		$stateid=$this->uri->segment(3);
		$status=$this->db->get_where('state',array('id'=>$stateid))->row('status');
		
		if($status==0)
		{
			$data=array('status'=>'1');
			$this->db->where('id',$stateid);
			$this->db->update('state',$data);
			echo "<span style='color:green;font-weight:700;'>Show</span>";
		}
		else{
			$data=array('status'=>'0');
			$this->db->where('id',$stateid);
			$this->db->update('state',$data);
			echo "<span style='color:red;font-weight:700;'>Hidden</span>";
		}
	}
	
function city()
	{
	$this->db->select('id,name');
	$this->db->order_by('name','asc');
	$data['state']=$this->db->get_where('state',array('country_id'=>'1','status'=>'1'))->result_array();
	$data['city']=$this->db->get_where('city')->result_array();
	$data['title']='Manage application City';
	$view='city';
	$data['language']=$this->db->get_where('language',array('show_status'=>'Y'))->result_array();
	$this->RedirectToPageWithData($view,$data);
	}		

function citystatus()
	{
		$stateid=$this->uri->segment(3);
		$status=$this->db->get_where('city',array('id'=>$stateid))->row('status');
		
		if($status==0)
		{
			$data=array('status'=>'1');
			$this->db->where('id',$stateid);
			$this->db->update('city',$data);
			echo "<span style='color:green;font-weight:700;'>Show</span>";
		}
		else{
			$data=array('status'=>'0');
			$this->db->where('id',$stateid);
			$this->db->update('city',$data);
			echo "<span style='color:red;font-weight:700;'>Hidden</span>";
		}
	}	
	
function mart()
	{
	$this->db->select('city.id,name');
	$this->db->order_by('name','asc');
	$data['city']=$this->db->join('citylang','citylang.city_id=city.id')->get_where('city',array('city.status'=>'1'))->result_array();
	$data['mart']=$this->db->get_where('mart')->result_array();
	$data['title']='Manage application Mart';
	$view='mart';
	$data['language']=$this->db->get_where('language',array('show_status'=>'Y'))->result_array();
	$this->RedirectToPageWithData($view,$data);
	}				

	function martstatus()
	{
		$stateid=$this->uri->segment(3);
		$status=$this->db->get_where('mart',array('id'=>$stateid))->row('status');
		
		if($status==0)
		{
			$data=array('status'=>'1');
			$this->db->where('id',$stateid);
			$this->db->update('mart',$data);
			echo "<span style='color:green;font-weight:700;'>Show</span>";
		}
		else{
			$data=array('status'=>'0');
			$this->db->where('id',$stateid);
			$this->db->update('mart',$data);
			echo "<span style='color:red;font-weight:700;'>Hidden</span>";
		}
	}
	
function delstate()
	{
	$id=$this->input->post('id');
	$login=$this->CheckLoginAjax();
	
	if($login)
		{
		//Delete State
		$this->db->where('id',$id);
		$this->db->delete('state');
		
		$json = array('login'=>true,'message' => 'State Delete Successfully');
		}
		else
		{
		$json = array('login'=>false,'message' => 'You are not autherised user.');
		}
	
	$output = json_encode( $json );
	echo $output;
	die();
	}
	
	
function delcity()
	{
	$id=$this->input->post('id');
	$login=$this->CheckLoginAjax();
	
	if($login)
		{
		//Delete city
		$this->db->where('id',$id);
		$this->db->delete('city');
		
		//Delete city lang content
		$this->db->delete('citylang',array('city_id'=>$id));
		
		$json = array('login'=>true,'message' => 'City Delete Successfully');
		}
		else
		{
		$json = array('login'=>false,'message' => 'You are not autherised user.');
		}
	
	$output = json_encode( $json );
	echo $output;
	die();
	}				
	
function delmart()
	{
	$id=$this->input->post('id');
	$login=$this->CheckLoginAjax();
	
	if($login)
		{
		//Delete city
		$this->db->where('id',$id);
		$this->db->delete('mart');
		
		//Delete city lang content
		$this->db->delete('martlang',array('mart_id'=>$id));
		
		$json = array('login'=>true,'message' => 'Mart Delete Successfully');
		}
		else
		{
		$json = array('login'=>false,'message' => 'You are not autherised user.');
		}
	
	$output = json_encode( $json );
	echo $output;
	die();
	}				

//code for add state//
public function AddState()
	{
	//Including validation library
	$this->load->library('form_validation');
	$this->form_validation->set_error_delimiters('<p class="text-red">', '</p>');
	//Validating Name Field
	$this->form_validation->set_rules('state', 'State', 'required|is_unique[state.name]');
	if ($this->form_validation->run() == FALSE)
		{	
		$this->state();
		}
		else
		{
		$date=date("Y-m-d H:i:s");
		
		$value=array('country_id'=>'1','name'=>$this->input->post('state'),'status'=>'1','date'=>$date);
		$this->db->insert('state',$value);
		
		$msg='<span style="color:green;padding:10px;">State added successfully.</span>';
		$this->session->set_userdata('response',$msg);
		redirect(''.base_url().'setting/state');
		}
	}

//code for Add City//
public function AddCity()
	{
	//Including validation library
	$this->load->library('form_validation');
	$this->form_validation->set_error_delimiters('<p class="text-red">', '</p>');
	//Validating Name Field
	$this->form_validation->set_rules('lang', 'Language', 'required');
	$this->form_validation->set_rules('state', 'State', 'required');
	$this->form_validation->set_rules('image', 'Image', '');
	$this->form_validation->set_rules('city', 'City', 'required|callback_ValidateCity');
	if ($this->form_validation->run() == FALSE)
		{
		$this->city();
		}
		else
		{
		$date=date("Y-m-d H:i:s");
		
		$state=$this->input->post('state');
		$city=$this->input->post('city');
		$local_lang=$this->input->post('local_lang');
		
		
		//Get default language ID//
		$Def_Lang=$this->db->get_where('language',array('default'=>'Y'))->row('id');
		
		//Get local language string //
		$lang_str=$Def_Lang.',';
		if(!empty($local_lang))
			{
			foreach($local_lang as $rec)
				{
				$lang_str.=$rec.',';
				}
			}
			
		$lang_str=rtrim($lang_str,',');
		
		$value=array('state_id'=>$this->input->post('state'),'local_language'=>$lang_str,'status'=>'1','date'=>$date);
		
		$imgreturn=$this->uploadimg();
		
		if($imgreturn!=''){
			$value['image']=$imgreturn;
		}
		
		
		
		//For main table entry
		//$value=array('state_id'=>$this->input->post('state'),'local_language'=>$lang_str,'status'=>'1','date'=>$date);
		$this->db->insert('city',$value);
		$cityID=$this->db->insert_id();
		
		//For lang table entry
		$Langvalue=array('state_id'=>$this->input->post('state'),'city_id'=>$cityID,'name'=>$this->input->post('city'),'lang'=>$this->input->post('lang'),'status'=>'1','date'=>$date);
		$this->db->insert('citylang',$Langvalue);
		
		$msg='<span style="padding:10px;" class="text-green">City added successfully.</span>';
		$this->session->set_userdata('response',$msg);
		redirect(''.base_url().'setting/city');
		}
	}
//code for Add mart//
public function AddMart()
	{
	//Including validation library
	$this->load->library('form_validation');
	$this->form_validation->set_error_delimiters('<p class="text-red">', '</p>');
	//Validating Name Field
	$this->form_validation->set_rules('lang', 'Language', 'required');
	$this->form_validation->set_rules('city', 'City', 'required');
	$this->form_validation->set_rules('mart', 'MArket', 'required|callback_ValidateCity');
	if ($this->form_validation->run() == FALSE)
		{
		$this->mart();
		}
		else
		{
		$date=date("Y-m-d H:i:s");
		
		$city=$this->input->post('city');
		$mart=$this->input->post('mart');
		$pincode=$this->input->post('pincode');
		
		$cityname=$this->db->select('name')->from('citylang')->where('city_id',$city)->get()->row()->name;
		
		$imgreturn=$this->uploadimg();
		$this->load->library('Mylomart_lib');
		$latlongjson=$this->mylomart_lib->getlatlong( str_replace(" ",'+', $mart. ' ,' . $cityname ) );
		$lat= $latlongjson['lat'];
		$long= $latlongjson['long'];
		//For main table entry
		$value=array('city_id'=>$city,'pin'=>$pincode,'lat'=>$lat,'lng'=>$long,'status'=>'1','date'=>$date);
		
		if($imgreturn!=''){
			$value['image']=$imgreturn;
		}
		
		
		$this->db->insert('mart',$value);
		$martID=$this->db->insert_id();
		
		//For lang table entry
		$Langvalue=array('city_id'=>$this->input->post('city'),'mart_id'=>$martID,'name'=>$this->input->post('mart'),'lang'=>$this->input->post('lang'),'status'=>'1','date'=>$date);
		$this->db->insert('martlang',$Langvalue);
		
		$msg='<span style="padding:10px;" class="text-green">Market added successfully.</span>';
		$this->session->set_userdata('response',$msg);
		redirect(''.base_url().'setting/mart');
		}
	}
	
function UpdateState()
	{
	$encrypted_string=$this->uri->segment(3);
	$id=$this->adminmodel->Id_decode($encrypted_string);	
	if(is_numeric($id))
		{
		$state=$this->db->get_where('state',array('id'=>$id))->row('name');
		$data['title']='Update State ('.$state.')';
		$data['state']=$state;
		$view='updatestate';
		$this->RedirectToPageWithData($view,$data);
		}
		else
		{
		redirect(''.base_url().'setting/state');
		}
	}	
	
function Update_State()
	{
	$encrypted_string=$this->uri->segment(3);	
	$id=$this->adminmodel->Id_decode($encrypted_string);	
	
	if(is_numeric($id))
		{
		//Including validation library
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="text-red">', '</p>');
		//Validating Name Field
		$this->form_validation->set_rules('state', 'State', 'required|callback_ValidateState');
		if ($this->form_validation->run() == FALSE)
			{
			$this->UpdateState();
			}
			else
			{
			$date=date("Y-m-d H:i:s");
			
			$value=array('name'=>$this->input->post('state'));
			$this->db->where('id',$id);
			$this->db->update('state',$value);
			
			$msg='<span style="color:green;padding:10px;">State updated successfully.</span>';
			$this->session->set_userdata('response',$msg);
			redirect(''.base_url().'setting/state');
			}
		}
		else
		{
		$msg='<span class="text-red">You are not autherised user.</span>';
		$this->session->set_userdata('response',$msg);
		redirect(''.base_url().'setting/state');
		}	
	}
	
//function for validate state//
public function ValidateState()
	{
	$encrypted_string=$this->uri->segment(3);	
	$id=$this->adminmodel->Id_decode($encrypted_string);	
	
	$state=$this->input->post('state');
	$stateOLD=$this->db->get_where('state',array('id'=>$id))->row('name');
	
	if($stateOLD==$state)
		{
		return true;
		}
		else
		{
		// get count same state name
		$this->db->where('name',$state);
		$count=$this->db->count_all_results('state');
		
		if($count==0)
			{
			return true;
			}
			else
			{
			$this->form_validation->set_message('ValidateState','This state name is already in use.');
			return false;	
			}
		}
	}
	
	
//function for validate city//
public function ValidateCity()
	{
	$lang=$this->input->post('lang');
	$city=$this->input->post('city');
	$state=$this->input->post('state');
	
	// get count same state name
	$this->db->where('state_id',$state);
	$this->db->where('name',$city);
	$this->db->where('lang',$lang);
	$count=$this->db->count_all_results('citylang');
	
	if($count==0)
		{
		return true;
		}
		else
		{
		$this->form_validation->set_message('ValidateCity','This city name is already in use with selected <b>language</b> and <b>state</b>.');
		return false;
		}
	}
	
function UpdateCity()
	{
	$encrypted_string=$this->uri->segment(3);
	$Cityid=$this->adminmodel->Id_decode($encrypted_string);	
		
	$data['titleinfo']='Update city in multi-language';	
	$data['LangRecord'] = $this->db->get_where('language', array('show_status'=>'Y'))->result_array();
	$data['CityRec'] = $this->db->get_where('citylang', array('city_id'=>$Cityid,'status'=>'1'))->result_array();
	
	$this->RedirectToPageWithData('UpdateCity',$data);
	}
	
//function for validate city//
public function ValidateMart()
	{
	$lang=$this->input->post('lang');
	$city=$this->input->post('city');
	$state=$this->input->post('state');
	
	// get count same state name
	$this->db->where('state_id',$state);
	$this->db->where('name',$city);
	$this->db->where('lang',$lang);
	$count=$this->db->count_all_results('citylang');
	
	if($count==0)
		{
		return true;
		}
		else
		{
		$this->form_validation->set_message('ValidateMart','This mart name is already in use with selected <b>language</b> and <b>City</b>.');
		return false;
		}
	}
	
function UpdateMart()
	{
	$encrypted_string=$this->uri->segment(3);
	$Martid=$this->adminmodel->Id_decode($encrypted_string);	
		
	$data['titleinfo']='Update Mart in multi-language';	
	$data['LangRecord'] = $this->db->get_where('language', array('show_status'=>'Y'))->result_array();
	$data['CityRec'] = $this->db->get_where('martlang', array('mart_id'=>$Martid,'status'=>'1'))->result_array();
	
	$this->RedirectToPageWithData('UpdateMart',$data);
	}
	
function DelStoreLang()
	{
	$login=$this->CheckLoginAjax();
	
	if($login)
		{
		$CityKey=$this->input->post('city');
		$CityID=$this->adminmodel->Id_decode($CityKey);
		
		$this->db->delete('store_meta',array('store_id'=>$StoreID,'lang'=>$LangID));
		$json = array('login'=>true,'message' => 'Store content deleted successfully.','link'=>$LangID);
		}
		else
		{
		$json = array('login'=>false,'message' => 'You are not autherised user.');
		}
	
	$output = json_encode($json);
	echo $output;
	die();	
	}		

function DelCityLang()
	{
	$login=$this->CheckLoginAjax();
	
	if($login)
		{
		$CityKey=$this->input->post('city');
		$CityLangID=$this->adminmodel->Id_decode($CityKey);
		$CityID=$this->db->get_where('citylang',array('id'=>$CityLangID))->row('city_id');
		
		$this->db->where(array('city_id'=>$CityID));
		$count = $this->db->count_all_results('citylang');
		
		$this->db->delete('citylang',array('id'=>$CityLangID));
		$json = array('login'=>true,'message' => 'City content deleted successfully.','link'=>$CityLangID);
		
		if($count==1)
			{
			$this->db->delete('city',array('id'=>$CityID));
			$json = array('login'=>true,'message' => 'City content deleted successfully.','link'=>$CityLangID,'city'=>'D');
			}
		}
		else
		{
		$json = array('login'=>false,'message' => 'You are not autherised user.');
		}
	
	$output = json_encode($json);
	echo $output;
	die();
	}		


function DelMartLang()
	{
	$login=$this->CheckLoginAjax();
	
	if($login)
		{
		$CityKey=$this->input->post('city');
		$CityLangID=$this->adminmodel->Id_decode($CityKey);
		$CityID=$this->db->get_where('martlang',array('id'=>$CityLangID))->row('mart_id');
		
		$this->db->where(array('mart_id'=>$CityID));
		$count = $this->db->count_all_results('martlang');
		
		$this->db->delete('martlang',array('id'=>$CityLangID));
		$json = array('login'=>true,'message' => 'City content deleted successfully.','link'=>$CityLangID);
		
		if($count==1)
			{
			$this->db->delete('mart',array('id'=>$CityID));
			$json = array('login'=>true,'message' => 'Market content deleted successfully.','link'=>$CityLangID,'city'=>'D');
			}
		}
		else
		{
		$json = array('login'=>false,'message' => 'You are not autherised user.');
		}
	
	$output = json_encode($json);
	echo $output;
	die();
	}		


function AddCityLang()
	{
	$encrypted_string=$this->uri->segment(3);
	$city_id=$this->adminmodel->Id_decode($encrypted_string);
	
	//Including validation library
	$this->load->library('form_validation');
	$this->form_validation->set_error_delimiters('<p class="text-red">', '</p>');
	//Validating Name Field
	$this->form_validation->set_rules('lang','Language','required');
	$this->form_validation->set_rules('city','City Name','required|callback_ValidateCityLang['.$city_id.']');
	
	if ($this->form_validation->run() == FALSE)
		{	
		$this->UpdateCity();
		}
		else
		{
		$date=date("Y-m-d H:i:s");
		
		$state_id=$this->db->get_where('city',array('id'=>$city_id))->row('state_id');
		$data=array('city_id'=>$city_id,'name'=>$this->input->post('city'),'lang'=>$this->input->post('lang'),'state_id'=>$state_id,'status'=>'1','date'=>$date);
		$this->db->insert('citylang',$data);
		
		$msg='<span style="color:green;padding-left:10px;">City language content added successfully.</span>';
		$this->session->set_userdata('response',$msg);
		redirect(''.base_url().'setting/UpdateCity/'.$encrypted_string.'');
		}
	}

function AddMartLang()
	{
	$encrypted_string=$this->uri->segment(3);
	$mart_id=$this->adminmodel->Id_decode($encrypted_string);
	
	//Including validation library
	$this->load->library('form_validation');
	$this->form_validation->set_error_delimiters('<p class="text-red">', '</p>');
	//Validating Name Field
	$this->form_validation->set_rules('lang','Language','required');
	$this->form_validation->set_rules('mart','Market Name','required|callback_ValidateMartLang['.$mart_id.']');
	
	if ($this->form_validation->run() == FALSE)
		{	
		$this->UpdateMart();
		}
		else
		{
		$date=date("Y-m-d H:i:s");
		
		$state_id=$this->db->get_where('mart',array('id'=>$mart_id))->row('city_id');
		$data=array('mart_id'=>$mart_id,'name'=>$this->input->post('mart'),'lang'=>$this->input->post('lang'),'city_id'=>$state_id,'status'=>'1','date'=>$date);
		$this->db->insert('martlang',$data);
		
		$msg='<span style="color:green;padding-left:10px;">Market language content added successfully.</span>';
		$this->session->set_userdata('response',$msg);
		redirect(''.base_url().'setting/UpdateMart/'.$encrypted_string.'');
		}
	}

//function for validate city//
public function ValidateCityLang($city,$city_id)
	{
	$lang=$this->input->post('lang');
	
	// get count same state name
	$this->db->where('city_id',$city_id);
	$this->db->where('lang',$lang);
	$count=$this->db->count_all_results('citylang');
	
	if($count==0)
		{
		return true;
		}
		else
		{
		$this->form_validation->set_message('ValidateCityLang','Content against selected language is already exists.');
		return false;
		}
	}
//function for validate city//
public function ValidateMartLang($city_id)
	{
	$lang=$this->input->post('lang');
	
	// get count same state name
	$this->db->where('mart_id',$city_id);
	$this->db->where('lang',$lang);
	$count=$this->db->count_all_results('martlang');
	
	if($count==0)
		{
		return true;
		}
		else
		{
		$this->form_validation->set_message('ValidateMartLang','Content against selected language is already exists.');
		return false;
		}
	}

function UpdateCityLang()
	{
	$CityKey=$this->uri->segment(3);
	
	$CityLangID=$this->adminmodel->Id_decode($CityKey);
	$query=$this->db->get_where('citylang',array('id'=>$CityLangID));
	$name=$query->row('name');
	$langid=$query->row('lang');
	$city_id=$query->row('city_id');
	$query=$this->db->get_where('city',array('id'=>$city_id));
	$image=$query->row('image');
	
	
	$data['titleinfo']='Update city language content ('.$name.')';
	$data['LangRecord'] = $this->db->get_where('language', array('show_status'=>'Y'))->result_array();
	$data['cityname']=$name;
	$data['LangID']=$langid;
	$data['imagedb']=$image;
		
	$this->RedirectToPageWithData('UpdateCityLang',$data);
	}

function UpdateMartLang()
	{
	$CityKey=$this->uri->segment(3);
	
	$CityLangID=$this->adminmodel->Id_decode($CityKey);
	$query=$this->db->get_where('martlang',array('id'=>$CityLangID));
	$name=$query->row('name');
	$langid=$query->row('lang');
	$city_id=$query->row('mart_id');
	$query=$this->db->get_where('mart',array('id'=>$city_id));
	$image=$query->row('image');
	$pincode=$query->row('pin');
	
	
	$data['titleinfo']='Update Market language content ('.$name.')';
	$data['LangRecord'] = $this->db->get_where('language', array('show_status'=>'Y'))->result_array();
	$data['cityname']=$name;
	$data['LangID']=$langid;
	$data['imagedb']=$image;
	$data['pin']=$pincode;
		
	$this->RedirectToPageWithData('UpdateMartLang',$data);
	}

function CityLangUpdate()
	{
	$cityLangKey=$this->uri->segment(3);
	$cityLangID=$this->adminmodel->Id_decode($cityLangKey);
	
	//Including validation library
	$this->load->library('form_validation');
	$this->form_validation->set_error_delimiters('<p class="text-red">', '</p>');
	//Validating Name Field
	$this->form_validation->set_rules('lang','Language','required');
	$this->form_validation->set_rules('city','City Name','required|callback_ValidateCityLangUpdate['.$cityLangID.']');
	
	if ($this->form_validation->run() == FALSE)
		{
		$this->UpdateCityLang();
		}
		else
		{
		$date=date("Y-m-d H:i:s");
		
		$data=array('name'=>$this->input->post('city'),'lang'=>$this->input->post('lang'));
		$this->db->where('id',$cityLangID);
		$this->db->update('citylang',$data);
		
		 $query=$this->db->where('id',$cityLangID)->get('citylang');
		//echo  $this->db->last_query();
		$city_id=$query->row('city_id'); 
		
		$imgreturn=$this->uploadimg();
		if($imgreturn!=''){
			
			$data=array('image'=>$imgreturn);
			$this->db->where('id',$city_id);
			$this->db->update('city',$data);
		}
		
		
		$msg='<span style="color:green;padding-left:10px;">City content updated successfully.</span>';
		$this->session->set_userdata('response',$msg);
		redirect(''.base_url().'setting/UpdateCityLang/'.$cityLangKey.'');
		}
	}

function MartLangUpdate()
	{
	$cityLangKey=$this->uri->segment(3);
	$cityLangID=$this->adminmodel->Id_decode($cityLangKey);
	
	//Including validation library
	$this->load->library('form_validation');
	$this->form_validation->set_error_delimiters('<p class="text-red">', '</p>');
	//Validating Name Field
	$this->form_validation->set_rules('lang','Language','required');
	$this->form_validation->set_rules('city','MArket Name','required|callback_ValidateMartLangUpdate['.$cityLangID.']');
	
	if ($this->form_validation->run() == FALSE)
		{
		$this->UpdateCityLang();
		}
		else
		{
		$date=date("Y-m-d H:i:s");
		
		$data=array('name'=>$this->input->post('city'),'lang'=>$this->input->post('lang'));
		$this->db->where('id',$cityLangID);
		$this->db->update('martlang',$data);
		
		 $query=$this->db->where('id',$cityLangID)->get('martlang');
		//echo  $this->db->last_query();
		$mart_id=$query->row('mart_id'); 
		
		$imgreturn=$this->uploadimg();
		if($imgreturn!=''){
			
			$data=array('image'=>$imgreturn,'pin'=>$this->input->post('pincode'));
			$this->db->where('id',$mart_id);
			$this->db->update('mart',$data);
		}
		else{
			$data=array('pin'=>$this->input->post('pincode'));
			$this->db->where('id',$mart_id);
			$this->db->update('mart',$data);
		}
		
		
		$msg='<span style="color:green;padding-left:10px;">Mart content updated successfully.</span>';
		$this->session->set_userdata('response',$msg);
		redirect(''.base_url().'setting/UpdateMartLang/'.$cityLangKey.'');
		}
	}

//function for validate city//
public function ValidateCityLangUpdate($city,$citylangID)
	{
	$lang=$this->input->post('lang');
	$query=$this->db->get_where('citylang',array('id'=>$citylangID));
	$cityold=$query->row('name');
	$langold=$query->row('lang');
	$cityID=$query->row('city_id');
	
	if($langold==$lang)
		{
		return true;
		}
		else
		{
		// get count same state name
		$this->db->where('city_id',$cityID);
		$this->db->where('lang',$lang);
		$count=$this->db->count_all_results('citylang');
		
		if($count==0)
			{
			return true;
			}
			else
			{
			$this->form_validation->set_message('ValidateCityLangUpdate','Content against selected language is already exists.');
			return false;
			}
		}
	}
	

//function for validate city//
public function ValidateMartLangUpdate($city,$citylangID)
	{
	$lang=$this->input->post('lang');
	$query=$this->db->get_where('martlang',array('id'=>$citylangID));
	$cityold=$query->row('name');
	$langold=$query->row('lang');
	$cityID=$query->row('mart_id');
	
	if($langold==$lang)
		{
		return true;
		}
		else
		{
		// get count same state name
		$this->db->where('mart_id',$cityID);
		$this->db->where('lang',$lang);
		$count=$this->db->count_all_results('martlang');
		
		if($count==0)
			{
			return true;
			}
			else
			{
			$this->form_validation->set_message('ValidateMartLangUpdate','Content against selected language is already exists.');
			return false;
			}
		}
	}
	
	
function UpdateLocalLang()
	{
	$CityKey=$this->uri->segment(3);
	$CityID=$this->adminmodel->Id_decode($CityKey);
	$local_lang=$this->input->post('local_lang');
	
	//Get default language ID//
	$Def_Lang=$this->db->get_where('language',array('default'=>'Y'))->row('id');
		
	//Get local language string //
	$lang_str=$Def_Lang.',';
	if(!empty($local_lang))
		{
		foreach($local_lang as $rec)
			{
			$lang_str.=$rec.',';
			}
		}
		
	$lang_str=rtrim($lang_str,',');
	
	$data=array('local_language'=>$lang_str);
	$this->db->where('id',$CityID);
	$this->db->update('city',$data);
	
	redirect(base_url().'setting/UpdateCity/'.$CityKey);
	}
	
function uploadimg(){
	
			$ErrorMedium=null;
			$ErrorSmall=null;	
			$error=null;	
			$FileCount = count($_FILES["image"]["name"]);
			if($FileCount==0){
			//redirect(base_url().'admin/proimg/'.$rec_id.'');
			}
			$filename = $_FILES["image"]["name"];
			$files = $_FILES["image"];
			
			$this->load->library('image_lib');
			$this->load->library('upload');
			$i=0;
			/* foreach($filename as $aa){  */
			$name = $files['name'];
			$explode_image = explode(".",$name);
			$image_name = str_replace(".","",str_replace(" ","",date("YmdHis").microtime())).".".$explode_image[1];
			
			$_FILES['image']['name'] = $files['name'];
			$_FILES['image']['type'] = $files['type'];
			$_FILES['image']['tmp_name'] = $files['tmp_name'];
			$_FILES['image']['error'] = $files['error'];
			$_FILES['image']['size'] = $files['size'];
			
			$config['upload_path'] = './admin/city-image/original/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '1024';
			$config['max_width']  = '2048';
			$config['max_height']  = '2048';
			$config['file_name']  = $image_name;
			
			$this->upload->initialize($config);
			$UploadOG=$this->upload->do_upload('image');
			if(!$UploadOG){ echo $ErrorOG = $this->upload->display_errors(); }
			
			list($widthOG, $heightOG, $typeOG, $attrOG) = getimagesize('./upload/original/'.$image_name.'');
			
			if($UploadOG)
				{
				//upload medium image//	
				$config3['image_library'] = 'GD2';
				$config3['source_image'] ='./admin/city-image/original/'.$image_name.'';
				$config3['new_image']='./admin/city-image/thumb/'.$image_name.'';
				$config3['allowed_types'] = 'gif|jpg|png|jpeg';
				$config3['create_thumb'] = TRUE;
				$config3['maintain_ratio'] = TRUE;
				$config3['thumb_marker'] ='';
				//$config3['master_dim'] ='height';
				$config3['width']= 320;
				$config3['height']= 415;
				$dim3 = (intval($widthOG) / intval($heightOG)) - ($config3['width'] / $config3['height']);
				$config3['master_dim'] = ($dim3 < 0)? "height" : "width";
				
				$this->image_lib->initialize($config3);
				$UploadMedium=$this->image_lib->resize();
				if(!$UploadMedium){ echo $ErrorMedium = $this->image_lib->display_errors(); }
				//$this->image_lib->clear();
				//END HERE//
				}
			
			if($UploadOG)
				{
				//upload small image//	
				$config2['image_library'] = 'GD2';
				$config2['source_image'] ='./admin/city-image/original/'.$image_name.'';
				$config2['new_image']='./admin/city-image/small/'.$image_name.'';
				$config2['allowed_types'] = 'gif|jpg|png|jpeg';
				$config2['create_thumb'] = TRUE;
				$config2['maintain_ratio'] = TRUE;
				$config2['thumb_marker'] ='';
				//$config2['master_dim'] ='height';
				$config2['width']= 66;
				$config2['height']= 43;
				$dim2 = (intval($widthOG) / intval($heightOG)) - ($config2['width'] / $config2['height']);
				$config2['master_dim'] = ($dim2 < 0)? "height" : "width";
				
				$this->image_lib->initialize($config2);
				$Uploadsmall=$this->image_lib->resize();
				if(!$Uploadsmall){ echo $ErrorSmall = $this->image_lib->display_errors(); }
				//$this->image_lib->clear();
				//END HERE//
				}
			
			if(!$UploadOG or !$UploadMedium or !$Uploadsmall)
				{
				$error = $ErrorOG.$ErrorMedium.$ErrorSmall;
				$data_image['imagemsg']='<br><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$error.'</div>';
				
				$fileOG='./admin/city-image/original/'.$image_name.'';	
				$fileMedium='./admin/city-image/thumb/'.$image_name.'';	
				$fileSmall='./admin/city-image/small/'.$image_name.'';	
				if($image_name!='')
					{
					if(file_exists($fileOG))
						{
						unlink($fileOG);
						}			
					
					if(file_exists($fileMedium))
						{
						unlink($fileMedium);
						}
						
					if(file_exists($fileSmall))
						{
						unlink($fileSmall);
						}	
					}
					return '';
				}
				else
				{
				return $image_name;
					
				}
}

}
/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
