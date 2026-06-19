<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."/third_party/vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Appointment extends CI_Controller 
{
	function __construct()
	{
		 parent::__construct();
		 date_default_timezone_set("Asia/Kolkata");
		 $date=date('Y-m-d h:i:s');
		 $this->load->helper(array('query_string_helper','dbquery_helper','admin_helper'));
		 $this->load->model('appointmentmodel');
		 $this->load->library('Pdf');
	}
 
	public function create()
	{
  		 if(isset($_POST['submit']))
   	
		$uploadimage='';
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
				redirect(base_url().'doctor/appointment/create');
				exit();
			}

			if($this->pathlabregmodel->add_appointment($uploadimage)) 
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

		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('appointment');
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');	
	}
	
	public function addappointment()
	{
		
		$data['hospital']		= $this->appointmentmodel->hospital_list(array('status'=>1));
		$data['specialization']	= $this->appointmentmodel->specialization_list(array('status'=>1));
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('addappointment',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
	
	public function doctorappointment()
	{
	 	
       $data['data']=$this->db->select('profile_dr.*,hospital.*,appointment.*')->join('profile_dr','profile_dr.id=appointment.doctor_id')->join('hospital','hospital.uid=appointment.institute_id')->get_where('appointment',array('doctor_id'))->result();	

        $this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('doctorappointment',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
     
	public function app_conf_hospital_institute()
	{
		$id=$_GET['doctor'];
		$date=$_GET['date'];
		$time=$_GET['time'];
		//$day_no = date('N',strtotime($date));
		//$day=array('1'=>'M','2'=>'T','3'=>'W','4'=>'TH','5'=>'F','6'=>'SA','7'=>'S');
		$data=$this->db->get_where('timing_session',array('id'=>$time))->row();
		//echo "<pre>"; print_r($data); die;
		if(is_object($data) && !empty($data))
		{
			$timing_id=$data->timing_id;
			$max_opd=$data->max_patient;
			$consultation_fee = $data->consultation_fee; 
			$booked=$this->db->where(array('time_id'=>$time,'appointment_date'=>$date,'status'=>'1'))->count_all_results('appointment');
			$opd=$max_opd-$booked;
			$opd=($opd)? $opd: 'Not Available';
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
			if($consultation_fee=='0')
			{
				$fee=$data->fee;
			}
			else
			{
				$fee= $consultation_fee;
			}
			$institution=$this->db->get_where($type,array('id'=>$institution_id))->row();
			//echo "<pre>"; print_r($institution);
			echo $content = '<div class="col-md-6">
				<img class="docimg" src="'.base_url().'public/assets/upload/'.$institution->drimage.'" style="width: 116px;
			height: 100px;" alt="">
			</div>
			<div class="col-md-6">
				<div class="doc_nam_inf">
					<span>'.@$institution->name.'</span>
					<ul>
						<li>'.@$institution->address.'</li>
						<li> Fee: Rs. '.$fee.'</li>
						<li> Available Number of OPD: '.$opd.'</li>

					</ul>
				</div>
			</div>';
		}
	}
	
	public function app_conf_pop_otpgen()
	{
		$otp=rand(100000,999999);
		$mobile=$this->input->post('mobile');
		$this->session->set_userdata('app_otp',$otp);
		$msg="Your One Time Password is $otp
		WWW.upchar.shop";
			sendsms($msg,$mobile);
			echo 'OK';
	}
	
	public function app_conf_hospital_doctor()
	{
		$id=$_GET['doctor'];
		if($id!='')
		{
			$data=$this->db->get_where('profile_dr',array('id'=>$id))->row();
			//echo "<pre>"; print_r($data);
			$drimg=($data->drimage)? $data->drimage :'dummydr.jpg';
			$content = '<div class="col-md-6">
			<img class="docimg" src="'.base_url().'public/assets/upload/'.$drimg.'" style="width: 116px; height: 100px;"alt="">
			</div>

			<div class="col-md-6">
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
	}
	
	public function app_conf_pop_date(){
		$id=$_GET['doctor'];
		$this->db->select('timing.*');
		$this->db->join('dr_practice','dr_practice.user_id=timing.user_id AND dr_practice.status=\'1\'');
		$data=$this->db->get_where('timing',array('timing.user_id'=>$id,'user_type'=>'D'))->result();
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
	
	public function app_conf_pop_time()
	{
		$id=$_GET['doctor'];
		$date=$_GET['date'];
		$day_no = date('N',strtotime($date));
		$this->db->select('timing.*');
		$this->db->group_by('timing.id');
		$this->db->join('dr_practice','dr_practice.user_id=timing.user_id AND dr_practice.status=\'1\'');
		$day=array('1'=>'M','2'=>'T','3'=>'W','4'=>'TH','5'=>'F','6'=>'SA','7'=>'S');
		$data=$this->db->get_where('timing',array('timing.user_id'=>$id,'user_type'=>'D',$day[$day_no]=>'1'))->result();
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

	public function bookappointment_admin()
	{	
		$mobile	=	$this->input->post('app_mobile');
		$date	=	$this->input->post('app_date');
		$time	=	$this->input->post('app_time');
		$doctor	=	$this->input->post('app_doctor');
		$name	=	$this->input->post('app_name');
		$email	=	$this->input->post('app_email');
		$age	=	$this->input->post('app_age');
		//$otp	=	$this->input->post('app_otp');
	
		if($this->session->userdata('userid')=='')
		{		
			/*if($this->session->userdata('app_otp')==$otp)
			{*/	
				$userdata=$this->db->where('MOBILE',$mobile)->get('userlogin');
				$countmobile=$userdata->num_rows();

				if(!$countmobile)
				{	
					$name2=explode(' ',ucwords($name));
					$fname=$name2[0];
					$lname=@$name2[1];
					$udata=array(
								'FNAME'=>$fname,
								'LNAME'=>$lname,
								'STATUS'=>'1',
								'APPROVED'=>'1',
								'REG_DATE'=>date('Y-m-d'),
								'GENDER'=>'M'
								);
					if($email)
					$udata['EMAIL']=$email;
					if($mobile)
					$udata['MOBILE']=$mobile;
					$this->db->insert('userlogin',$udata);
					$userid=$this->db->insert_id();
					//$this->session->set_userdata('userid', $userid);
					//$this->session->set_userdata('useremail', $email);				           
					//$this->session->set_userdata('username', $fname);
				}
				else
				{	
					$row=$userdata->row();
					$userid=$row->USERID;
					//$this->session->set_userdata('userid', $row->USERID);
					//$this->session->set_userdata('useremail', $row->EMAIL);				           
					//$this->session->set_userdata('username', $row->FNAME);
				}
			/*}
			else
			{
				echo 'FAILED';die;
			}*/
		}
		else
		{		
			$userid=$this->session->userdata('userid');
		}
		
		$data=$this->db->get_where('timing_session',array('id'=>$time))->row();
		$timing_id=$data->timing_id;
		$max_opd=$data->max_patient;
		$consultation_fee=$data->consultation_fee;
		$from_timing=$data->from_timing;
		$to_timing=$data->to_timing;
		$data=$this->db->get_where('timing',array('id'=>$timing_id))->row();
		$pid=$data->practice_id;
		$data=$this->db->get_where('dr_practice',array('id'=>$pid))->row();
		$did=$data->user_id;
		$type=$data->type;
		$booked=$this->db->where(array('time_id'=>$time,'appointment_date'=>$date,'status'=>'1'))->count_all_results('appointment');
		$opd=$max_opd-$booked;
		
		if($opd <1)
		{
			echo 'Not Available';die;
		}
		
		$institution_id	=	$data->institution_id;
		if($consultation_fee=='0')
		{
			$fee	=	$data->fee;
		}
		else
		{
			$fee	=  $consultation_fee;
		}
		
		$idata		=	array('appointment_date'=>$date,'time_id'=>$time,'to_timing'=>$to_timing,'from_timing'=>$from_timing,'date_id'=>$timing_id,'practice_id'=>$pid,'appointment_name'=>$name,'appointment_mobile'=>$mobile,'appointment_email'=>$email,'age'=>$age,'doctor_id'=>$doctor,'institute_id'=>$institution_id,'institution_type'=>$type,'fee'=>$fee,'amount'=>$fee,'user_id'=>$userid,'payment_mode'=>'NA','payment_status'=>'NA','status'=>'0');
		$this->db->insert('appointment',$idata);
		$aid=$this->db->insert_id();
		
		$price=$taxable=$disc=$tax=0.0;
		$price=$fee;
		$taxable = $price - $disc;
		$subtotal=$total= round($taxable + $tax);
		//Register Order with temp order id &  request type

		$tempoid=date('YmdHis').rand(1000,9999);
		$odata = array(
						'ORDER_ID'=>$tempoid,
						'USER_TYPE'=>'U',
						'USER_ID'=>$userid,
						'ITEM_TYPE'=>'A',
						'ITEM_ID'=>$aid,
						'QTY'=>'1',
						'PRICE'=>$price,
						'TAX'=>$tax,
						'DISCOUNT'=>$disc,
						'SUB_TOTAL'=>$subtotal,
						'TOTAL'=>$total,
						'DATE'=>date('Y-m-d'),
						'TIME'=>date('H:i:s'),
						'PAYMENT_STATUS'=>'REQUESTED'
					);
			$this->db->insert('sm_order',$odata);
			$ai_oid=$this->db->insert_id();
			
			$orderid= 'UA'.str_pad($ai_oid,10,"0",STR_PAD_LEFT);

			// update final order id
			$updatedata=array('ORDER_ID'=>$orderid);
			$this->db->where('ID',$ai_oid);
			$this->db->update('sm_order',$updatedata);

			 //CODE FOR PAYMENT GATEWAY//
			$Redirect_Url = base_url()."processorder";
			$cancel_Url = base_url()."processorder";
			//$Merchant_Id = base64_decode(CC_MERID);
			$Amount = $total;
			//$Amount = '1';
			$Order_Id = $orderid;

			//$cust=$this->db->join('userprofile','userlogin.USERID = userprofile.userid')->get_where('userlogin',array('userlogin.USERID'=>$uid))->row();

			$billing_cust_name=$name ;
			$billing_cust_address='';
			$billing_cust_state='';
			$billing_cust_country='India';
			$billing_cust_tel=$mobile;
			$billing_cust_email=$email;
			$billing_city = '';
			$billing_zip = '';

			$delivery_cust_name=$name ;
			$delivery_cust_address='$cust->address';
			$delivery_cust_state = '$cust->city';
			$delivery_cust_country = 'India';
			$delivery_cust_tel= $mobile;
			$delivery_city = '$cust->city';
			$delivery_zip = '111111';
			$delivery_cust_notes= "";
			$Merchant_Param="";
			$merchant_param1='';//$uid;

			$gatewayData= compact('Merchant_Id','Order_Id','Amount','Redirect_Url','cancel_Url',
							'billing_cust_name','billing_cust_address','billing_city','billing_cust_state',
							'billing_zip','billing_cust_tel','billing_cust_email','delivery_cust_name',
							'delivery_cust_address','delivery_city','delivery_cust_state','delivery_zip',
							'delivery_cust_tel','merchant_param1');

			$this->session->unset_userdata('SecurePay');
			$this->session->unset_userdata('AppointmentCheckout');
			$this->session->set_userdata('SecurePay',$gatewayData);
			$this->session->set_userdata('AppointmentCheckout',$aid);
			echo 'OK';
	}
	
	public function acheckout_admin()
	{	
		$gatewayData=$this->session->userdata('SecurePay');
		$AppointmentCheckout=$this->session->userdata('AppointmentCheckout');
		if(isset($gatewayData) && count($gatewayData))
		{
			$data['gatewayData']=$gatewayData;
			$data['AppointmentCheckout']=$AppointmentCheckout;
			$this->load->view('inc/topheaderlink');
			$this->load->view('inc/topheader');
			//$this->load->view('addappointment',$data);
			$this->load->view('appointmentcheckout',$data);
			$this->load->view('sidebar');
			$this->load->view('inc/headersetting');
			$this->load->view('inc/footerlink');
			$this->load->view('inc/table_footer');
			
		}else
		{
			echo '403 UnAuthorized Access!!';
		}
	}
	public function processordercod_admin()
	{	
		$gatewayData=$this->session->userdata('SecurePay');
		$AppointmentCheckout=$this->session->userdata('AppointmentCheckout');
		
		$OrderId= $gatewayData['Order_Id'];
		$order=$this->db->where(array('ORDER_ID'=>$OrderId))->get('sm_order')->row();
		$aid=$order->ITEM_ID;
		$paystatus=$order->PAYMENT_STATUS; //cross check
		$ordertotal=$order->TOTAL;// compare total with the amount recieved

		$appointment_data=$this->db->where(array('appointment_id'=>$aid))->get('appointment')->row();
		$mobile=$appointment_data->appointment_mobile;

		$msg="Your Appointment booked successfully! Appointment# $aid
			Please Pay the Fee Rs. $ordertotal at Counter,  Request# $OrderId
			WWW.upchar.shop";
			sendsms($msg,$mobile);

		$updatedata=array('PAYMENT_STATUS'=>'COC');
		$this->db->where('ORDER_ID',$OrderId);
		$this->db->update('sm_order',$updatedata);

		$updateuserdata=array('checkout_id'=>'0','payment_status'=>'UNPAID','payment_mode'=>'COC','status'=>'1');
		$this->db->where('appointment_id',$aid);
		$this->db->update('appointment',$updateuserdata);
		
		$user	=	$this->appointmentmodel->get_appointment_details($aid);
		
		$this->load->library('azad_lib');
		/*Admin Email Start */
		$body="Hello upchar <BR> You have new booking  by ".$user['appointment_name']."  to ".$user['name']." for ".$user['fname'].", <BR>Timing - ".$user['from_timing']." to ".$user['to_timing']." ,Date - ".$user['appointment_date']." ,<BR>fee - ".$user['fee']." paid ".$user['payment_mode']." ,appointment no - ".$user['appointment_id'].".<BR>Thank You  <BR>Email: info@upchar.shop ";
		$this->azad_lib->sendMail_admin('info@upchar.shop','New Appointment Booking ',$body);
		/*Admin Email End */
		
		/*User Email Start */
		if(!empty($user['appointment_email']))
		{
			$body=" Dear ".$user['appointment_name']."<BR>
					Thank you for using upchar servies.<BR>
					Your appointment no is ".$user['appointment_id'].",".$user['name']." for ".$user['fname'].",<BR>
					Timing - ".$user['from_timing']." to ".$user['to_timing']." ,Date - ".$user['appointment_date'].",fee - ".$user['fee']." paid ".$user['payment_mode'].".<BR>

					If you want to confirm your Priority appointment  paid online by your account.<BR>
					Feel free to call any time on 8448449603 to our customer care will help you.<BR>
					Thank You  <BR>Email: info@upchar.shop <BR>WWW.upchar.shop";
			$this->azad_lib->sendMail_admin($user['appointment_email'],'Thanks for book appointment ',$body);
		}
		/*User Email End */
		
		/*Doctor  Email Start */
		$body=" Dear dr ".$user['fname']."<BR>
				You have new appointment  in ".$user['name'].", Patient name ".$user['appointment_name']." appointment No ".$user['appointment_id']." date of booking ".$user['book_date']." and date of appointment ".$user['appointment_date'].".<BR>
				Thank your for Beining partner with upchar on e place of healthcare.<BR>

				Feel free to contact if any problem will happen with upchar.<BR>
				Thank you<BR>
				Upchar<BR>
				8448440603<BR>
				partner@upchar.shop<BR>";
		$this->azad_lib->sendMail_admin($user['dr_email'],'Upcharr Appointment Booking',$body);
		/*Doctor Email End */
		
		$this->session->unset_userdata('SecurePay');
		$this->session->unset_userdata('AppointmentCheckout');
		$this->session->set_flashdata('flashmsg', '<h4 style="color:green;">Thank you! The Appointment detail has been sent to the registered  mobile no.</h4>');
		redirect('/doctor/appointment/addappointment');
	}
	
	
    public function delete()
    {
           	$id=$this->input->get('appointment_id');
           	$this->load->model('doctorregmodel');
           	$this->doctorregmodel->deleterecord($id);
            redirect(base_url().'doctor/appointment/doctorappointment');

    }

    public function data()
    {

    	
	    $id=$this->input->get('appointment_id');
	   	$data['data']=$this->db->select('profile_dr.*,hospital.*,appointment.*')->join('profile_dr','profile_dr.id=appointment.doctor_id')->join('hospital','hospital.uid=appointment.institute_id')->get_where('appointment', array('appointment_id'=>$id))->result();
	   
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('userview',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');  
	}
    


  	public function hospitalappointment()
  	{

       	$data['data'] = $this->db->get_where('hospital',array('uid'))->result();
  	   	$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('hospitalappointment',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');	
    }
          
    public function deletehospital()
    {      
        $id=$this->input->get('appointment_id');
        $this->load->model('doctorregmodel');
        $this->doctorregmodel->deletehospital($id);
        redirect(base_url().'doctor/appointment/hospitalappointment');
    }
          
          
    public function todayappointment()
    {
		$pagesize               =  (int) $this->input->get_post('pagesize');
		$config['limit']	    =  ( $pagesize > 0 ) ? $pagesize : 10;	
		$offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		$data['data'] 			=  $this->appointmentmodel->get_today($config['limit'],$offset);
		$config['total_rows']   =  get_found_rows();
		$data['heading_title'] 	=  'Appointment List';
		$data['page_links'] 	=  admin_pagination($base_url, $config['total_rows'],$config['limit'],$offset);
 	    //$data['data']=$this->db->select('profile_dr.*,hospital.*,appointment.*')->join('profile_dr','profile_dr.id=appointment.doctor_id')->join('hospital','hospital.uid=appointment.institute_id')->get_where('appointment',array('appointment_date'=>date('Y-m-d')))->result();	
        
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('todayappointment',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
		
    }
	
	public function upcomming()
    {
 	    $pagesize               =  (int) $this->input->get_post('pagesize');
		$config['limit']	    =  ( $pagesize > 0 ) ? $pagesize : 10;	
		$offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		$data['data'] 			=  $this->appointmentmodel->get_upcomming($config['limit'],$offset);
		$config['total_rows']   =  get_found_rows();
		$data['heading_title'] 	= 'Appointment List';
		$data['page_links'] 	=  admin_pagination($base_url, $config['total_rows'],$config['limit'],$offset);
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('upcomming',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
    }

    public function user()
	{	
		$pagesize               =  (int) $this->input->get_post('pagesize');
		$config['limit']	    =  ( $pagesize > 0 ) ? $pagesize : 10;	
		$offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		$data['data'] 			=  $this->appointmentmodel->get_appointment($config['limit'],$offset);
		$config['total_rows']   =  get_found_rows();
		$data['heading_title'] 	= 'Appointment List';
		$data['page_links'] 	=  admin_pagination($base_url, $config['total_rows'],$config['limit'],$offset);
	    $data['city']  			=  $this->appointmentmodel->get_city(array('status'=>'1'));
	    //$data['data']  =  $this->appointmentmodel->get_appointment();
	    $this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('users',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
	
	 // generate PDF File
         public function generatePDFFile() 
		 {	//echo "hi"; die;
            $data = array();            
            $htmlContent='';
			
			$pagesize               =  (int) $this->input->get_post('pagesize');
			$config['limit']	    =  ( $pagesize > 0 ) ? $pagesize : 10;	
		$offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
            //$data['getInfo'] 	= $this->createpdf->getContent();
			$data['data'] 		= $this->appointmentmodel->get_appointment();
			
			$data['heading_title'] 	= 'Appointment List';
			$data['page_links'] 	=  '';
			$data['city']  			=  $this->appointmentmodel->get_city(array('status'=>'1'));
			$htmlContent = $this->load->view('users',$data,TRUE);
			echo "<pre>"; print_r($htmlContent); die;
            //$htmlContent = $this->load->view('pdf/file', $data, TRUE);
			
            $createPDFFile = time().'.pdf';
			$path = APPPATH.'uploads/';
            $this->createPDF($path.$createPDFFile, $htmlContent);
            redirect(base_url()."application/uploads/".$createPDFFile);
         }
 
        // create pdf file 
        public function createPDF($fileName,$html) 
		{
            ob_start(); 
            // Include the main TCPDF library (search for installation path).
            $this->load->library('Pdf');
            // create new PDF document
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            // set document information
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('TechArise');
            $pdf->SetTitle('TechArise');
            $pdf->SetSubject('TechArise');
            $pdf->SetKeywords('TechArise');
 
            // set default header data
            $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
 
            // set header and footer fonts
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            
            $pdf->SetPrintHeader(false);
            $pdf->SetPrintFooter(false);
 
            // set default monospaced font
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
 
            // set margins
            $pdf->SetMargins(PDF_MARGIN_LEFT, 0, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(0);
            $pdf->SetFooterMargin(0);
 
            // set auto page breaks
            //$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
            $pdf->SetAutoPageBreak(TRUE, 0);
 
            // set image scale factor
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 
            // set some language-dependent strings (optional)
            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }       
 
            // set font
            $pdf->SetFont('dejavusans', '', 10);
 
            // add a page
            $pdf->AddPage();
 
            // output the HTML content
            $pdf->writeHTML($html, true, false, true, false, '');
 
            // reset pointer to the last page
            $pdf->lastPage();       
            ob_end_clean();
            //Close and output PDF document
            $pdf->Output($fileName, 'F');        
        }
		
	public function createHistoryExcel() 
	{	
		$fileName 			= 'appointment.xlsx';  
		$appointmentData 	= $this->appointmentmodel->get_appointment_list();
		//echo "<pre>"; print_r($appointmentData); die;
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Date');
        $sheet->setCellValue('C1', 'Name');
        $sheet->setCellValue('D1', 'Email'); 
		$sheet->setCellValue('E1', 'Mobile');
		$sheet->setCellValue('F1', 'Hospital Name');
        $sheet->setCellValue('G1', 'Doctor Name'); 
		$sheet->setCellValue('H1', 'Payment Status');
		$sheet->setCellValue('I1', 'Appointment Status');
        $rows = 2;
        foreach ($appointmentData as $val){
			//$appointment_status ='hi';
			if($val['appointment_status']=='0'){ $appointment_status ='Pending'; } else{ $appointment_status ='Done'; }	
            $sheet->setCellValue('A' . $rows, $val['appointment_id']);
            $sheet->setCellValue('B' . $rows, $val['appointment_date']);
            $sheet->setCellValue('C' . $rows, $val['appointment_name']);
            $sheet->setCellValue('D' . $rows, $val['appointment_email']);
			$sheet->setCellValue('E' . $rows, $val['appointment_mobile']);
			$sheet->setCellValue('F' . $rows, $val['name']);
			$sheet->setCellValue('G' . $rows, $val['fname']);
            $sheet->setCellValue('H' . $rows, $val['payment_status']);
			$sheet->setCellValue('I' . $rows, $appointment_status);
            $rows++;
        } 
        $writer = new Xlsx($spreadsheet);
		$writer->save("public/assets/export/".$fileName);
		header("Content-Type: application/vnd.ms-excel");
        redirect(base_url()."public/assets/export/".$fileName);              
    }    
	
	public function deletehistory()
    {
              
        $id=$this->input->get('appointment_id');
        $this->load->model('doctorregmodel');
        $this->doctorregmodel->deletehistory($id);
        redirect(base_url().'doctor/appointment/user');
    }
	
	
	
	
   	public function account()
   	{
   		$data['hospital_list']  	=  $this->appointmentmodel->hospital_list(array('status'=>'1'));
    	$data['hospital_account']  	=  $this->appointmentmodel->get_account();
    	$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('account',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
   	}
   	public function get_locality_by_city_id()
    {   
        $city_id 			=  $this->input->get_post('city_id');
        $locality_list  	=  $this->appointmentmodel->get_locality(array('city_id'=>$city_id));
        //print_r($doctor_list); die;
        $output = "<option value=''> Select Locality</option>";
        foreach ($locality_list as $row)
        {
			$output .= "<option value='".$row['id']."'>".$row['name']."</option>"; 
        }
		echo $output;
    }
	
	public function get_hospital_by_city_id()
    {   
        $city_id 				=  $this->input->get_post('city_id');
        $hospital_list  	=  $this->appointmentmodel->hospital_list(array('city'=>$city_id));
        //print_r($doctor_list); die;
        $output = "<option value=''> Select Hospital</option>";
        foreach ($hospital_list as $row)
        {
			$output .= "<option value='".$row['id']."'>".$row['name']."</option>"; 
        }
		echo $output;
    }
	
	public function get_hospital_by_locality_id()
    {   
        $city_id 				=  $this->input->get_post('city_id');
		$locality_id 			=  $this->input->get_post('locality_id');
        $hospital_list  	=  $this->appointmentmodel->hospital_list(array('location'=>$locality_id));
        //print_r($doctor_list); die;
        $output = "<option value=''> Select Hospital</option>";
        foreach ($hospital_list as $row)
        {
			$output .= "<option value='".$row['id']."'>".$row['name']."</option>"; 
        }
		echo $output;
    }
	
	public function get_doctor_by_specialization_id()
    {   
        $specialization_id 	=	$this->input->get_post('specialization_id');
        $doctor_list  		=  $this->appointmentmodel->specialization_doctor_list(array('dr_specialization.specialization_id'=>$specialization_id));
        //print_r($doctor_list); die;
        $output = "<option value=''> Select Doctor</option>";
        foreach ($doctor_list as $row)
        {
			$output .= "<option value='".$row['id']."'>".$row['fname']."</option>"; 
        }
		echo $output;
    }
	
	public function get_doctor_by_hospital_id()
    {   
        $hospital_id 	=	$this->input->get_post('hospital_id');
        $doctor_list  		=  $this->appointmentmodel->doctor_list(array('type'=>'H','institution_id'=>$hospital_id));
        //print_r($doctor_list); die;
        $output = "<option value=''> Select Doctor</option>";
        foreach ($doctor_list as $row)
        {
			$output .= "<option value='".$row['id']."'>".$row['fname']."</option>"; 
        }
		echo $output;
    }
	
    public function account_appointment()
    {	$data['hospital_list']  	=  $this->appointmentmodel->hospital_list(array('status'=>'1'));
	   	$data['appointment']  		=  $this->appointmentmodel->get_account_appointment();
	   	//echo "<pre>"; print_r($data['appointment']); die;
       	$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('account_appointment',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
    }

   public function doctordata()
   {
   		$data['city']  		=  $this->appointmentmodel->get_city(array('status'=>'1'));
     	$data['clinic']		= $this->appointmentmodel->get_dr_hospital_id();	
	    $this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('data',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
    }

   	public function calculate()
   	{
        if(isset($_POST['submit']))
        {
      		$this->load->model('doctorregmodel');
       		$data['data']    =   $this->doctorregmodel->calculate();
        	redirect(base_url().'doctor/appointment/totalamount'); 
    	}
    }
                
    public function totalamount()
    {   
       	$data['data']= $this->db->get_where('account',array('id'))->result();   
       	$this->load->view('inc/topheaderlink');
       	$this->load->view('inc/topheader');
       	$this->load->view('totalamount',$data);
       	$this->load->view('sidebar');
       	$this->load->view('inc/headersetting');
       	$this->load->view('inc/footerlink');
      	$this->load->view('inc/table_footer');   
    }
	
	
    
    public function doctorwise()
    {
        $data['city']  		=  $this->appointmentmodel->get_city(array('status'=>'1'));
    	$data['doctor']  	=  $this->appointmentmodel->get_profile_dr();
        $this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('doctorwise',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
    }

   	public function patient()
    {
	   	$data['appointment']  	=  $this->appointmentmodel->get_appointment_by_droctor_id();
       	$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('patient',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
    }
}
