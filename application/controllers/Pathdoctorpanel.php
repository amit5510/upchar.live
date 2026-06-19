<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pathdoctorpanel extends CI_Controller {

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
		 $this->load->model('Pathdoctor_Model');
		 if(!$this->session->userdata('druserid')){
			 $page=$this->uri->segment('1');
			 $excep_array=array('pathdoctor-login','pathdoctor-signup','pathdoctor-verifymobile','pathdoctor-forgotpassword','pathdoctor-verifymobileforgot');
			 if (!in_array($page, $excep_array))
				redirect('pathdoctor-login');
		 }else{
			 $this->did=$this->db->where('user_id',$this->session->userdata('druserid'))->get('pathdoctor')->row()->id;
		 }
		 
	}
	
	public function index()
	{
		$data['specialization']=$this->db->order_by('name','asc')->where('status','1')->get('master_specialization')->result();
		$this->load->view('home',$data);
	}
	
	public function dashboard()
	
	
	
	{
		$userid =$this->did;
		
		
         $this -> db -> where('doctor_id', $userid);   
        $this -> db -> where('status', '1');   
		 $this -> db -> where('appointment_date', date('Y-m-d'));   
        $query = $this -> db -> get('appointment');
		$data['todayappointment']=$query -> num_rows();
         
        $this -> db -> where('doctor_id', $userid);   
        $this -> db -> where('status', '1');    
        $query = $this -> db -> get('appointment');
		$data['totalappointment']=$query -> num_rows();
		
		
	//	$query =$this->db->select('pathdoctor.*,dr_practice.status as p_status')->join('pathdoctor','pathdoctor.id=dr_practice.user_id')->get_where('dr_practice',array('institution_id'=>$this->did,'type'=>'H'));	
	//	$data['totaldoctor']=$query -> num_rows();
		$this->load->view('pathdoctorpanel/dashboard',$data);
		
	}
	
	public function updateprofile()
	{
	
	$this->load->view('pathdoctorpanel/milestone');    
	}
	
	public function managedoctor()
	{
		
		$data['clinic']=$this->db->select('pathdoctor.*,dr_practice.status as p_status')->join('pathdoctor','pathdoctor.id=dr_practice.user_id')->get_where('dr_practice',array('institution_id'=>$this->did,'type'=>'H'))->result();	
			
		$this->load->view('pathdoctorpanel/managedoctor',$data);
	}
	public function login()
	{
		$this->load->view('pathdoctorpanel/login');
	}
	
	public function signup()
	{
		$this->load->view('pathdoctorpanel/sign_up');
	}
	
	public function forgotpassword()
	{
		$this->load->view('pathdoctorpanel/forgot_password');
	}
	
	public function verifymobile()
	{
		$this->load->view('pathdoctorpanel/otp_send_pass');
	}
	
	/* public function verifymobileforgot()
	{
		$this->load->view('otp_send_pass_forgot');
	} */
	
	
	
	public function progress_profile()
	{
		$this->load->view('pathdoctorpanel/milestone');
	}
	
	public function profile_step11()
	{
		if(isset($_POST['submit']))
			$this->Pathdoctor_Model->profile_step11();
		
		$data['data']=$this->db->get_where('pathdoctor',array('id'=>$this->did))->row();			
		$data_spl=$this->db->select('specialization_id')->get_where('dr_specialization',array('user_id'=>$this->did))->result_array();
		$data['data_spl']= array_map (function($value){
					return $value['specialization_id'];
				} , $data_spl);		
		$this->load->view('pathdoctorpanel/profile_step1',$data);
	}
	
	public function profile_step12()
	{
		if(isset($_POST['submit']))
			$this->Pathdoctor_Model->profile_step12();
		$data['data']=$this->db->get_where('pathdoctor',array('id'=>$this->did))->row();	
		$this->load->view('pathdoctorpanel/profile_step2',$data);
	}
	
	public function profile_step13()
	{
		if(isset($_POST['submit']))
			$this->Pathdoctor_Model->profile_step13();
		$data['data']=$this->db->get_where('pathdoctor',array('id'=>$this->did))->row();	
		$data_qua=$this->db->select('qualification_id')->get_where('dr_qualifications',array('user_id'=>$this->did))->result_array();
		$data['data_qua']= array_map (function($value){
					return $value['qualification_id'];
				} , $data_qua);	
		$this->load->view('pathdoctorpanel/profile_step3',$data);
	}
	
	
	public function profile_about1()
	{
		if(isset($_POST['submit']))
			$this->Pathdoctor_Model->about();
		$data['data']=$this->db->select('about,short_about')->get_where('pathdoctor',array('id'=>$this->did))->row();
		$this->load->view('pathdoctorpanel/about',$data);
	}
	
	public function profile_drpic1()
	{
		if(isset($_POST['submit']))
			$this->Pathdoctor_Model->profile_drpic1();
		$data['src']=$this->db->select('drimage')->get_where('pathdoctor',array('id'=>$this->did))->row('drimage');	
		if($data['src']=='')
			$data['imagerequired']='required';
		$this->load->view('pathdoctorpanel/profile_drpic',$data);
	}

	public function profile_idproof1()
	{
		if(isset($_POST['submit']))
			$this->Pathdoctor_Model->profile_idproof1();
		
		$data['src']=$this->db->select('id_proof')->get_where('pathdoctor',array('id'=>$this->did))->row('id_proof');
		if($data['src']=='')
			$data['imagerequired']='required';
		$this->load->view('pathdoctorpanel/profile_idproof',$data);
	}
	
		public function mci_proof1()
    {
		if(isset($_POST['submit']))
		$this->Pathdoctor_Model->mci_proof1();
		
	    $data['src']=$this->db->select('mic_proof')->get_where('pathdoctor',array('id'=>$this->did))->row('mic_proof');
		if($data['src']=='')
			$data['imagerequired']='required';
		
		$this->load->view('pathdoctorpanel/mci_proof',$data);
	}
	
		public function profile_regproof1()
	{
		if(isset($_POST['submit']))
			$this->Pathdoctor_Model->profile_regproof1();
		
		$data['src']=$this->db->select('med_reg_proof')->get_where('pathdoctor',array('id'=>$this->did))->row('med_reg_proof');
		if($data['src']=='')
			$data['imagerequired']='required';
		$this->load->view('pathdoctorpanel/profile_regproof',$data);
	}

	
	
	public function managepractice1()
	{
		if(isset($_POST['submit']))
			$this->Pathdoctor_Model->profile_step12();
		$data['clinic']=$this->db->select('clinic.*,dr_practice.id as practice_id,fee as practicefee')->join('clinic','clinic.id=dr_practice.institution_id')->get_where('dr_practice',array('user_id'=>$this->did,'type'=>'C'))->result();	
		$data['hospital']=$this->db->select('hospital.*,dr_practice.id as practice_id,fee as practicefee')->join('hospital','hospital.id=dr_practice.institution_id')->get_where('dr_practice',array('user_id'=>$this->did,'type'=>'H'))->result();	
		$this->load->view('pathdoctorpanel/managepractice',$data);
	}
	
	
	
	 public function change_password()
          {
             if($this->input->post('change_pass'))
		{
		$cur_password = md5($this->input->post('password'));
        $new_password = md5($this->input->post('newpass'));
        $conf_password = md5($this->input->post('confpassword'));
        $id=$this->session->userdata('druserid');

        $passwd = $this->Pathdoctor_Model->change_password($id);
        if($passwd->PASSWORD == $cur_password)
        {
            if($new_password == $conf_password)
            {
                if($this->Pathdoctor_Model->updatePassword($new_password, $id))
                {
                    
                   $flashmsg="<div class='alert alert-success'><h4>Password Updated Successfully!</h4></div>";
                    
                    //$flashmsg='Password Updated Successfully!';
						$this->session->set_flashdata('msg',$flashmsg);
                }
                else{
                    $flashmsg="<div class='alert alert-danger'><h4>Failed to Updated Password</h4></div>";
                   
                   // $flashmsg='Failed to Updated Password';
						$this->session->set_flashdata('msg',$flashmsg);
                }
            }
            else{
                 
                 $flashmsg="<div class='alert alert-danger'><h4>Sorry! New Password and Confirm Password not matching</h4></div>";
                //$flashmsg='New Password and Confirm Password not matching';
						$this->session->set_flashdata('msg',$flashmsg);
            }
        }
        else{
           
              $flashmsg="<div class='alert alert-danger'><h4>Sorry! Curent Password is not matching</h4></div>";
              //$flashmsg='Sorry Curent Password is not matching';
						$this->session->set_flashdata('msg',$flashmsg);
       }
     
		}
           $this->load->view('pathdoctorpanel/change_password');
           
       }


	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	 }
