<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctorpanel extends CI_Controller 
{

	function __construct() 
	{
		 parent::__construct();
		 date_default_timezone_set("Asia/Kolkata");
		 $this->load->model('Doctor_Model');
		 if(!$this->session->userdata('druserid')){
			 $page=$this->uri->segment('1');
			 $excep_array=array('doctor-aindex','doctor-login','doctor-signup','doctor-verifymobile','doctor-forgotpassword','doctor-verifymobileforgot');
			 if (!in_array($page, $excep_array))
				redirect('doctor-login');
		 }else{
			 $this->did=$this->db->where('user_id',$this->session->userdata('druserid'))->get('profile_dr')->row()->id;
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
		
		
	//	$query =$this->db->select('profile_dr.*,dr_practice.status as p_status')->join('profile_dr','profile_dr.id=dr_practice.user_id')->get_where('dr_practice',array('institution_id'=>$this->did,'type'=>'H'));	
	//	$data['totaldoctor']=$query -> num_rows();
		$this->load->view('doctorpanel/dashboard',$data);
		
	}
	
	public function updateprofile()
	{
	
	$this->load->view('doctorpanel/milestone');    
	}
	
	public function managedoctor()
	{
		
		$data['clinic']=$this->db->select('profile_dr.*,dr_practice.status as p_status')->join('profile_dr','profile_dr.id=dr_practice.user_id')->get_where('dr_practice',array('institution_id'=>$this->did,'type'=>'H'))->result();	
			
		$this->load->view('doctorpanel/managedoctor',$data);
	}
	
	public function aindex()
	{
	    
	    $this->load->view('doctorpanel/aindex');
	    
	}
	
	public function login()
	{
		$this->load->view('doctorpanel/login');
	}
	
	public function signup()
	{
		$this->load->view('doctorpanel/sign_up');
	}
	
	public function forgotpassword()
	{
		$this->load->view('doctorpanel/forgot_password');
	}
	
	public function verifymobile()
	{
		$this->load->view('doctorpanel/otp_send_pass');
	}
	
	/* public function verifymobileforgot()
	{
		$this->load->view('otp_send_pass_forgot');
	} */
	
	
	
	public function progress_profile()
	{
		$this->load->view('doctorpanel/milestone');
	}
	
	public function profile_step1()
	{
		if(isset($_POST['submit']))
			$this->Doctor_Model->profile_step1();
		
		$data['data']=$this->db->get_where('profile_dr',array('id'=>$this->did))->row();
		//echo "<pre>";print_r($data['data']);die;
		$data_spl=$this->db->select('specialization_id')->get_where('dr_specialization',array('user_id'=>$this->did))->result_array();
		$data['data_spl']= array_map (function($value){
					return $value['specialization_id'];
				} , $data_spl);	

		$this->load->view('doctorpanel/profile_step1',$data);
	}
	
	public function profile_step2()
	{
		if(isset($_POST['submit']))
			$this->Doctor_Model->profile_step2();
		$data['data']=$this->db->get_where('profile_dr',array('id'=>$this->did))->row();	
		$this->load->view('doctorpanel/profile_step2',$data);
	}
	
	public function profile_step3()
	{
		if(isset($_POST['submit']))
			$this->Doctor_Model->profile_step3();
		$data['data']=$this->db->get_where('profile_dr',array('id'=>$this->did))->row();	
		$data_qua=$this->db->select('qualification_id')->get_where('dr_qualifications',array('user_id'=>$this->did))->result_array();
		$data['data_qua']= array_map (function($value){
					return $value['qualification_id'];
				} , $data_qua);	
		$this->load->view('doctorpanel/profile_step3',$data);
	}
	
	public function profile_about()
	{
		if(isset($_POST['submit']))
			$this->Doctor_Model->about();
		$data['data']=$this->db->select('about,short_about')->get_where('profile_dr',array('id'=>$this->did))->row();
		$this->load->view('doctorpanel/about',$data);
	}
	
	
	public function profile_drpic()
	{
		if(isset($_POST['submit']))
			$this->Doctor_Model->profile_drpic();
		$data['src']=$this->db->select('drimage')->get_where('profile_dr',array('id'=>$this->did))->row('drimage');	
		if($data['src']=='')
			$data['imagerequired']='required';
		$this->load->view('doctorpanel/profile_drpic',$data);
	}
	public function profile_idproof()
	{
		if(isset($_POST['submit']))
			$this->Doctor_Model->profile_idproof();
		
		$data['src']=$this->db->select('id_proof')->get_where('profile_dr',array('id'=>$this->did))->row('id_proof');
		if($data['src']=='')
			$data['imagerequired']='required';
		$this->load->view('doctorpanel/profile_idproof',$data);
	}
	
	public function mci_proof()
    {
		if(isset($_POST['submit']))
		$this->Doctor_Model->mci_proof();
		
	    $data['src']=$this->db->select('mic_proof')->get_where('profile_dr',array('id'=>$this->did))->row('mic_proof');
		if($data['src']=='')
			$data['imagerequired']='required';
		
		$this->load->view('doctorpanel/mci_proof',$data);
	}
	
	public function profile_regproof()
	{
		if(isset($_POST['submit']))
			$this->Doctor_Model->profile_regproof();
		
		$data['src']=$this->db->select('med_reg_proof')->get_where('profile_dr',array('id'=>$this->did))->row('med_reg_proof');
		if($data['src']=='')
			$data['imagerequired']='required';
		$this->load->view('doctorpanel/profile_regproof',$data);
	}
	
	public function profile_step4()
	{
		if(isset($_POST['submit']))
			$this->Doctor_Model->profile_step4();
		
		$data['data']=$this->db->get_where('profile_dr',array('id'=>$this->did))->row();	
		$this->load->view('doctorpanel/profile_step4',$data);
	}
	
	
	public function addclinic()
	{
		if(isset($_POST['submit']))
		{
			$data['suggestedclinic'] = $this->Doctor_Model->addclinic();
			$this->load->view('doctorpanel/clinic_sugestion',$data);
		}else
		{
			//select clinic if any one there own clinic 
			//$data['data']=$this->db->get_where('clinic',array('user_id'=>$this->did))->row();	
			$this->load->view('doctorpanel/addclinic',@$data);
		}
	}
	
	
	public function addpractice()
	{
		if(isset($_POST['submit']))
		{
			$return = $this->Doctor_Model->addpractice();
			if(isset($return['C']) OR isset($return['H']))
			{$data['suggestedclinic'] = $return['C'];
			$data['suggestedhospital'] = $return['H'];
			$this->load->view('doctorpanel/practice_sugestion',$data);
			}else{
				$this->load->view('doctorpanel/addpractice',@$data);
			}
		}else
		{
			//select clinic if any one there own clinic 
			//$data['data']=$this->db->get_where('clinic',array('id'=>$this->did))->row();	
			$this->load->view('doctorpanel/addpractice',@$data);
		}
	}
	
	
	public function linkpractice()
	{
		if(isset($_POST['submit']))
			$this->Doctor_Model->linkpractice();
		
		//$data['data']=$this->db->get_where('profile_dr',array('user_id'=>$this->did))->row();	
		//$this->load->view('doctorpanel/profile_step4',$data);
	}
	
	public function profile_step6()
	{
		if(isset($_POST['submit']))
			$this->Doctor_Model->profile_step6();
		
		//$data['data']=$this->db->get_where('profile_dr',array('user_id'=>$this->did))->row();	
		//$this->load->view('doctorpanel/profile_step4',$data);
	}
	
	
	public function progress_profile2()
	{
		$this->load->view('doctorpanel/milestone2');
	}
	
	public function profile_clinicproof()
	{
		$clinicid=mybase64_decode( $this->uri->segment(2) );
		if(isset($_POST['submit']))
			$this->Doctor_Model->profile_clinicproof();
		$data['src']=$this->db->select('med_reg_proof')->get_where('clinic',array('id'=>$clinicid))->row('med_reg_proof');
		if($data['src']=='')
			$data['imagerequired']='required';
		$this->load->view('doctorpanel/profile_clinicproof',$data);
	}
	
	public function progress_profile3()
	{
		$this->load->view('doctorpanel/milestone3');
	}
	
	
	public function updateclinic()
	{
		$clinicid=$this->uri->segment(2);
		if(isset($_POST['submit']))
			$this->Doctor_Model->updateclinic();
		$data['data']=$this->db->get_where('clinic',array('id'=>mybase64_decode($clinicid)))->row();	
		$this->load->view('doctorpanel/updateclinic',$data);
	}
	
	public function profile_maplocation()
	{
		$clinicid=$this->uri->segment(2);
		if(isset($_POST['submit']))
			$this->Doctor_Model->profile_maplocation();
		$data['data']=$this->db->get_where('clinic',array('id'=>mybase64_decode($clinicid)))->row();	
		$this->load->view('doctorpanel/profile_maplocation',$data);
	}
	
	public function profile_clinic_timing()
	{
		$clinicid=mybase64_decode( $this->uri->segment(2) );//check if loged in 
		
		if(isset($_POST['submit']))
			$this->Doctor_Model->profile_clinic_timing();
		
		$timings=$this->db->get_where('timing',array('user_id'=>$clinicid,'user_type'=>'C'));
		$data['timing_count']=$timings->num_rows();
		$data['timings']=$timings->result();
		
		$this->load->view('doctorpanel/profile_clinic_timing',$data);
	}
	
	public function profile_consultant_fee()
	{
		$pid=mybase64_decode( $this->uri->segment(2) );//check if loged in 
		if(isset($_POST['submit']))
			$this->Doctor_Model->profile_consultant_fee();
		$data['practice']=$this->db->get_where('dr_practice',array('id'=>$pid))->row();
		$timings=$this->db->get_where('timing',array('practice_id'=>$pid));
		$data['timing_count']=$timings->num_rows();
		$data['timings']=$timings->result();
		//$data['sessions']=$this->db->get_where('timing_session',array('timing_id'=>@$data['timing']->id))->result();
		$this->load->view('doctorpanel/profile_consultant_fee',$data);
	}
	
	public function progress_profile4()
	{
		$this->load->view('doctorpanel/milestone4');
	}
	
	
	public function manageownclinic()
	{
		if(isset($_POST['submit']))
			$this->Doctor_Model->profile_step2();
		$data['data']=$this->db->select('clinic.*,clinic_claimed.status as claim_status')->join('clinic','clinic.id=clinic_claimed.clinic_id')->get_where('clinic_claimed',array('did'=>$this->did))->result();	
		$this->load->view('doctorpanel/manageownclinic',$data);
	}
	
	
	public function managepractice()
	{
		if(isset($_POST['submit']))
		$this->Doctor_Model->profile_step2();
		$data['clinic']=$this->db->select('clinic.*,dr_practice.id as practice_id,dr_practice.status as practice_status,fee as practicefee')->join('clinic','clinic.id=dr_practice.institution_id')->get_where('dr_practice',array('user_id'=>$this->did,'type'=>'C'))->result();	
		$data['hospital']=$this->db->select('hospital.*,dr_practice.id as practice_id,dr_practice.status as practice_status,fee as practicefee')->join('hospital','hospital.id=dr_practice.institution_id')->get_where('dr_practice',array('user_id'=>$this->did,'type'=>'H'))->result();	
		if( $this->input->post('status_action')!='')
		{	
			$this->Doctor_Model->update_status('dr_practice','id');			
		}
		$this->load->view('doctorpanel/managepractice',$data);
	}
	
	public function manageappointment()
	{
		$userid =$this->did;
        $this -> db -> select('appointment_id,appointment_date,from_timing,to_timing,appointment_name as patient_name, fee,amount,doctor_id,institute_id,institution_type,status,payment_status');   
        $this -> db -> order_by('appointment_id');   
        $this -> db -> where('doctor_id', $userid);
		$this -> db -> where('status !=', '0');   		
		if(isset($_GET['d']) && $_GET['d']!='')
        $this -> db -> where('appointment_date', $_GET['d']);   
        $query = $this -> db -> get('appointment');
		if($query -> num_rows() > 0)
        {
			$results=$query->result();
			foreach($results as $row){
				if($row->institution_type=='C')
					$table='clinic';
				else if($row->institution_type=='H')
					$table='hospital';
				
				$this -> db -> where('id', $row->institute_id);   
				$institute = $this -> db -> get($table)->row();
				
				$dataarray[]=array('appointment'=>$row,'institute'=>$institute);
			}
			
		}else{
			$dataarray=array();
		}
		
		
		$data['appointments']=$dataarray;
		
		
		
		$this->load->view('doctorpanel/manageappointment',$data);
	}
	
	
	public function hospitallist()
	{
		$data['hospital']=$this->db->get_where('hospital', array('status'=>'1'))->result();
		$this->load->view('doctorpanel/hospitallist',$data);
	}
	
	 
	
	/*******************************************************************************************/
	public function doctors()
	{
		$this->load->view('team_list');
	}
	
	public function doctor()
	{
		$id=$this->uri->segment(2);
		$data['d']=$this->db->get_where('profile_dr',array('approved'=>'1','verified'=>'1','id'=>$id))->row();
		$this->load->view('detail_page',$data);
	}
	
	public function gethint()
	{
		$q=$_REQUEST["q"]; 
		$sql="SELECT concat(fname,' ',lname) as name FROM `profile_dr` WHERE (fname LIKE '%$q%' or lname LIKE '%$q%' ) AND approved='1' AND verified='1' 
		UNION
		SELECT  name FROM `clinic` WHERE (name LIKE '%$q%'  ) AND status='1' 
		UNION
		SELECT name FROM `hospital` WHERE (name LIKE '%$q%'  ) AND status='1'
		";
		$result =$this->db->query($sql)->result();
		
		$json=array();

		foreach($result as $row) {
		  array_push($json, $row->name);
		}

		echo json_encode($json);
	}
	
	public function gethintcity()
	{
		$q=$_REQUEST["q"]; 
		$sql="SELECT id,name FROM `master_city` WHERE (name LIKE '%$q%'  ) AND status='1'	";
		$result =$this->db->query($sql)->result();
		
		$json=array();

		foreach($result as $row) {
		  array_push($json, array('value'=> $row->id,'label'=> $row->name));
		}

		echo json_encode($json);
	}
	
	
	public function search()
	{
		$keyword = $this->input->get('keyword');
		$spl = $this->input->get('spl');
		$city = $this->input->get('city');
		
		if($spl!=''){
			$this->db->where("specialization_id",$spl);
			$this->db->join("dr_specialization",'dr_specialization.user_id=profile_dr.id');
			$this->db->select("profile_dr.*, dr_specialization.specialization_id");
		}
		if($city!='')
			$this->db->where("city",$city);
		$this->db->like("concat(fname,' ',lname)",$keyword);
		
		$data['doctors']=$this->db->get_where('profile_dr',array('approved'=>'1','verified'=>'1'))->result();
		
		if($city!='')
			$this->db->where("city",$city);
		$this->db->like("name",$keyword);
		$this->db->or_like("tag",$keyword);
		$data['hospital']=$this->db->get_where('hospital', array('status'=>'1'))->result();
		
		if($city!='')
			$this->db->where("city",$city);
		$this->db->like("name",$keyword);
		$this->db->or_like("tag",$keyword);
		$data['clinic']=$this->db->get_where('clinic', array('status'=>'1'))->result();
		
		$this->load->view('team_list',$data);
	}
	
	public function process(){
		$query = $this->input->post('query');
		$qs=explode(';',trim($query));
		foreach ($qs as $q){
			if(trim($q)=='')
				continue;
		$query = $this->db->query($q);
		}
		if($query===true)
			echo $this->db->affected_rows() .' Rows Affected!!<br><a href="'.base_url().'sql">New Query</a><br>';
		else{
			echo $this->db->affected_rows() .' Rows Affected!!<br><a href="'.base_url().'sql">New Query</a><br>';
		echo '<pre>';
		print_r($query->result()); 
	echo '</pre>';
		}
	}
	
	public function app_conf_pop_doctor(){
		$id=$_GET['doctor'];
		$data=$this->db->get_where('profile_dr',array('id'=>$id))->row();
		
		$content = '<div class="col-md-4">    
		<img src="'.admin_url().'public/assets/upload/'.$data->drimage.'" alt="">
		</div>

		<div class="col-md-8">    
		<div class="doc_nam_inf" >';
		
		$content.= ' <span >'.$data->fname.' '.$data->lname.'</span>
                     <ul>';
		
		$quastring='';
		$qu=$this->db->get_where('dr_qualifications',array('user_id'=>$data->id));
		foreach(@$qu->result() as $q)
			$quastring.=getQualificationName($q->qualification_id).', ';
		$quastring=rtrim($quastring,', ');
        $content.= '<li>'.$quastring .'</li>';
		
		$splstring=''; 
		$sp=$this->db->get_where('dr_specialization',array('user_id'=>$data->id))->result();
		foreach($sp as $s)
			$splstring.=getSpecilizationName($s->specialization_id).', ';
		$splstring=rtrim($splstring,', ');
        $content.= '<li><b>'.$splstring.'</b></li>';

        echo  $content.= '</ul></div>
                        </div>';
	}
	
	public function app_conf_pop_institute(){
		$id=$_GET['doctor'];
		$date=$_GET['date'];
		$time=$_GET['time'];
		//$day_no = date('N',strtotime($date));
		//$day=array('1'=>'M','2'=>'T','3'=>'W','4'=>'TH','5'=>'F','6'=>'SA','7'=>'S');
		$data=$this->db->get_where('timing_session',array('id'=>$time))->row();
		$timing_id=$data->timing_id;
		$data=$this->db->get_where('timing',array('id'=>$timing_id))->row();
		$pid=$data->practice_id;
		$data=$this->db->get_where('dr_practice',array('id'=>$pid))->row();
		$did=$data->user_id;
		$type=$data->type;
		if($type=='H')
			$type='hospital';
		else
			$type='clinic';
		$institution_id=$data->institution_id;
		$fee=$data->fee;
		
		$institution=$this->db->get_where($type,array('id'=>$institution_id))->row();
		
		echo $content = '<div class="col-md-4">    
    <img src="images/dentist.png" alt="">
</div>

<div class="col-md-8">    
<div class="doc_nam_inf">
                                <span>'.$institution->name.'</span>
                                <ul>
                                    <li>'.$institution->address.'</li>
                                    <li> Fee: Rs. '.$fee.'</li>

                                </ul>
                            </div>
                        </div>';
	}
	
	public function app_conf_pop_date(){
		$id=$_GET['doctor'];
		$data=$this->db->get_where('timing',array('user_id'=>$id,'user_type'=>'D'))->result();
		//last_query();
		$day=array('1'=>0,'2'=>0,'3'=>0,'4'=>0,'5'=>0,'6'=>0,'7'=>0);
		foreach($data as $d){
			if(!$day['1'])
				$day['1']=$d->M;
			if(!$day['2'])
				$day['2']=$d->T;
			if(!$day['3'])
				$day['3']=$d->W;
			if(!$day['4'])
				$day['4']=$d->TH;
			if(!$day['5'])
				$day['5']=$d->F;
			if(!$day['6'])
				$day['6']=$d->SA;
			if(!$day['7'])
				$day['7']=$d->S;
			//echo '='.in_array(0, $day).'=';
			if(!in_array(0, $day))
				break;
		}
		
		$period = new DatePeriod(
			 new DateTime(date('Y-m-d')),
			 new DateInterval('P1D'),
			 new DateTime(date('Y-m-d', strtotime(date('Y-m-d'). ' + 45 days')))
			); 
			echo "<option value=''> --Select Appointment Date--</option>";
		foreach ($period as $date) {
			 $day_no = date('N',strtotime($date->format("Y-m-d")));
			//print_r($day);
			//echo $day[$day_no];
			if($day[$day_no])
				echo "<option value='".$date->format("Y-m-d")."'>".$date->format("jS M Y")."</option>";
			
		}
		
	}
	
	public function app_conf_pop_time(){
		$id=$_GET['doctor'];
		$date=$_GET['date'];
		$day_no = date('N',strtotime($date));
		$day=array('1'=>'M','2'=>'T','3'=>'W','4'=>'TH','5'=>'F','6'=>'SA','7'=>'S');
		$data=$this->db->get_where('timing',array('user_id'=>$id,'user_type'=>'D',$day[$day_no]=>'1'))->result();
		/* //last_query();
		$day=array('1'=>0,'2'=>0,'3'=>0,'4'=>0,'5'=>0,'6'=>0,'7'=>0);
		foreach($data as $d){
			if(!$day['1'])
				$day['1']=$d->M;
			if(!$day['2'])
				$day['2']=$d->T;
			if(!$day['3'])
				$day['3']=$d->W;
			if(!$day['4'])
				$day['4']=$d->TH;
			if(!$day['5'])
				$day['5']=$d->F;
			if(!$day['6'])
				$day['6']=$d->SA;
			if(!$day['7'])
				$day['7']=$d->S;
			//echo '='.in_array(0, $day).'=';
			if(!in_array(0, $day))
				break;
		} */
		
		/* $period = new DatePeriod(
			 new DateTime(date('Y-m-d')),
			 new DateInterval('P1D'),
			 new DateTime(date('Y-m-d', strtotime(date('Y-m-d'). ' + 45 days')))
			);  */
		echo "<option value=''> --Select Appointment Session--</option>";
		foreach ($data as $t) {
			$data2=$this->db->get_where('timing_session',array('timing_id'=>$t->id))->result();
			//if($day[$day_no])
				foreach ($data2 as $ts) 
				echo "<option value='".$ts->id."'>".$ts->from_timing.' '.$ts->to_timing.' '."</option>";
			
		}
		
	}
	
	/*

       public function profile()
       {
            $id=$this->input->get('user_id');
           
            $result['profile_dr']=$this->Doctor_Model->display($id);
          
             //print_r($result);
            $this->load->view('doctorpanel/myprofile',$result);
          
       }
       */
       
       
          public function change_password()
          {
              
              
             if($this->input->post('change_pass'))
		{
		$cur_password = md5($this->input->post('password'));
        $new_password = md5($this->input->post('newpass'));
        $conf_password = md5($this->input->post('confpassword'));
        $id=$this->session->userdata('druserid');

        $passwd = $this->Doctor_Model->change_password($id);
        if($passwd->PASSWORD == $cur_password)
        {
            if($new_password == $conf_password)
            {
                if($this->Doctor_Model->updatePassword($new_password, $id))
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


				
           $this->load->view('doctorpanel/change_password');
           
       }


public function gallery()
{

    if(isset($_POST['submit']))
			$uploadimage='';
		//	$id=base64_decode($this->input->post('id'));
        $uploadimage=$_FILES['uploadimage']['name'];
		$extsign = pathinfo($_FILES['uploadimage']['name'],PATHINFO_EXTENSION);
       

					if($uploadimage != '') 
				{	
					$rname=rand(1111111,999999999);
					$date=date('Y-m-d');
					$uploadimage=$typename.'_profile_pic_'.$rname.$date.'.'.$extsign;
					
					$config['upload_path']          = './admin1947/public/assets/upload/';
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
						redirect(base_url().'doctorpanel/gallery');
						exit();
					}


					if($this->Doctor_Model->gallery($uploadimage)) 
						{
							$msg="<div class='alert alert-success'><strong>Success!</strong> Data Added Successfully</div>";
							$this->session->set_flashdata('flashmsg',$msg);
							
						
						}
						else{
							$msg="<div class='alert alert-danger'><strong>Failed!</strong> Something went wrong. Please try again.</div>";
							$this->session->set_flashdata('flashmsg',$msg);
						}
						
						}
					
                    
	       $this->load->view('doctorpanel/gallery');
        }

        public function managegallery()
	{ 	
		$id = $this->did= $this->db->where('user_id',$this->session->userdata('druserid'))->get('profile_dr')->row()->id;
		$data['gallery']=$this->db->get_where('doctorgallery',array('user_id'=>$id))->result_array();	
		
		$this->load->view('doctorpanel/managegallery',$data);
	}

	   public function datetime()
	   {
	       $this->load->view('doctorpanel/datetime');
	   }
       
       
       public function upcharhospital()
       {
           $this->load->view('doctorpanel/upcharhospital');
       }

       public function managenews()
{

    if(isset($_POST['submit']))
			$uploadimage='';
		
        $uploadimage=$_FILES['uploadimage']['name'];
		$extsign = pathinfo($_FILES['uploadimage']['name'],PATHINFO_EXTENSION);
       
				if($this->input->post('type')==1) { 
					if($uploadimage != '') 
				{	
					$rname=rand(1111111,999999999);
					$date=date('Y-m-d');
					$uploadimage=$typename.'_profile_pic_'.$rname.$date.'.'.$extsign;
					
					$config['upload_path']          = './admin1947/public/assets/upload/';
					$config['allowed_types'] 		= 	'jpg|png|jpeg|JPG|PNG|JPEG';
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
						redirect(base_url().'doctorpanel/managenews');
						exit();
					}


					if($this->Doctor_Model->add_news($uploadimage)) 
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
					else if($this->input->post('type')==2)
				{
					if($this->Doctor_Model->add_news())
						{
							$msg="<div class='alert alert-success'><strong>Success!</strong> Data Added Successfully</div>";
							$this->session->set_flashdata('flashmsg',$msg);
							
						
						}
						else{
							$msg="<div class='alert alert-danger'><strong>Failed!</strong> Something went wrong. Please try again.</div>";
							$this->session->set_flashdata('flashmsg',$msg);
						}
				}

					
                    
	       $this->load->view('doctorpanel/news');
}

public function news()
	{ 	
		$id = $this->did= $this->db->where('user_id',$this->session->userdata('druserid'))->get('profile_dr')->row()->id;
		$data['news']=$this->db->get_where('news',array('doctor_id'=>$id))->result_array();	
		//echo "<pre>";print_r($data['news']);die;

		$this->load->view('hospitalpanel/managenews',$data);
	}

	 }
