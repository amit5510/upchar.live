<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(0);

class Paysecure extends CI_Controller {


	function __construct()
	{
	parent::__construct();
		$this->load->model('User_Model');
	//$this->load->library('Sm_lib');
	/* 	if(isset($_POST['merchant_id']) && isset($_POST['mlousr']) ){

			$this->session->set_userdata('WEB_USERNAME',base64_decode($_POST['mlousr']));
			$this->session->set_userdata('WEB_PASSWORD','user');
		}


		if($this->session->userdata('WEB_USERNAME')!="" and ( $this->session->userdata('WEB_PASSWORD')!="" || $this->session->userdata('WEB_GID')!="" || $this->session->userdata('WEB_FBID')!="" ))
		{

		}
		else
		{
			redirect(base_url().'login');
		}

	$this->load->library('Mylomart_lib');
	//$this->load->model('adminmodel'); */

	/* if($this->session->userdata('SM_UID')!="" )
		{

		}
		else
		{
			redirect(base_url().'social');
		} */
	}



	public function index(){
		echo 'Server Access Denied !!';

	}
	public function membership_order()
	{

		$data['plans']=$this->db->get_where('membership_plan',array('STATUS'=>'1','PLAN_VALIDTILL >='=> date('Y-m-d'), 'PLAN_TYPE'=>'A'))->result();
		$this->load->view('package',$data);
	}


	public function acheckout()
	{
		$gatewayData=$this->session->userdata('SecurePay');
		//echo "<pre>"; print_r($gatewayData); die;
		$AppointmentCheckout=$this->session->userdata('AppointmentCheckout');
		if(isset($gatewayData) && count($gatewayData))
		{
			$data['gatewayData']=$gatewayData;
			$data['AppointmentCheckout']=$AppointmentCheckout;
			$this->load->view('secure/appointmentcheckout',$data);
		}else
		{
			echo '403 UnAuthorized Access!!';
		}


	}
	public function acheckout_hospital()
	{	
		$gatewayData=$this->session->userdata('SecurePay');
		$AppointmentCheckout=$this->session->userdata('AppointmentCheckout');
		if(isset($gatewayData) && count($gatewayData))
		{
			$data['gatewayData']=$gatewayData;
			$data['AppointmentCheckout']=$AppointmentCheckout;
			$this->load->view('secure/appointmentcheckout_hospital',$data);
		}else
		{
			echo '403 UnAuthorized Access!!';
		}
	}



	function getRSA()
	{
	    $this->input->post('order_id');

	    set_time_limit(0);
        //$time = date('y-m-d h:i:s');
        $url = "https://secure.ccavenue.com/transaction/getRSAKey";
        $fields = array(
                'access_code'=>base64_decode('QVZPVTgzR0IyM0FCMjJVT0JB'),
                 'order_id'=>$_REQUEST['order_id']
               // 'order_id'=>substr(md5(uniqid(mt_rand(), true)), 0, 6)
        );
        //print_r($fields);
        $postvars='';
        $sep='';
        foreach($fields as $key=>$value)
        {
                $postvars.= $sep.urlencode($key).'='.urlencode($value);
                $sep='&';
        }

        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,count($fields));
        //curl_setopt($ch, CURLOPT_CAINFO, 'cacert.pem');
        curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);


        $result = curl_exec($ch);
        curl_close($ch);
        echo json_encode(['rsa'=>$result]);
	}

	function securePay()
	{	
	$this->output->set_header("HTTP/1.0 200 OK");
	$this->output->set_header("HTTP/1.1 200 OK");
	$this->output->set_header('Last-Modified: '.gmdate('D, d M Y H:i:s', $last_update).' GMT');
	$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
	$this->output->set_header("Cache-Control: post-check=0, pre-check=0");
	$this->output->set_header("Pragma: no-cache");
	$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

	$data=$this->session->userdata('SecurePay');
	$oid=$this->session->userdata('SecurePay')['Order_Id'];
	$this->db->where('orderid',$oid);
	$c1=$this->db->count_all_results('sm_checkout');
	echo "<pre>"; print_r($c1); die;

	$count=$c1;

		if($data && $count==0)
		{
			$this->load->view('secure/securePayment',$data);
		}
		else
		{
			redirect(base_url());
			//redirect('package');
		}
	//$this->session->unset_userdata('SecurePay');
	}

	

	public function processordercod()
	{	
		$gatewayData=$this->session->userdata('SecurePay');
		//echo "<pre>"; print_r($gatewayData); die;
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
			WWW.UPCHARR.COM";
			sendsms($msg,$mobile);

		$updatedata=array('PAYMENT_STATUS'=>'COC');
		$this->db->where('ORDER_ID',$OrderId);
		$this->db->update('sm_order',$updatedata);

		$updateuserdata=array('checkout_id'=>'0','payment_status'=>'UNPAID','payment_mode'=>'COC','status'=>'1');
		$this->db->where('appointment_id',$aid);
		$this->db->update('appointment',$updateuserdata);
			
		$user	=	$this->User_Model->get_appointment_details($aid);
		$this->load->library('azad_lib');
		/*Admin Email Start */
		$body="Hello upchar <BR> You have new booking  by ".$user['appointment_name']."  to ".$user['name']." for ".$user['fname'].", <BR>Timing - ".$user['from_timing']." to ".$user['to_timing']." ,Date - ".$user['appointment_date']." ,<BR>fee - ".$user['fee']." paid ".$user['payment_mode']." ,appointment no - ".$user['appointment_id'].".<BR>Thank You  <BR>Email: info@upcharr.com ";
		$this->azad_lib->sendMail('info@upcharr.com','New Appointment Booking',$body);
		/*Admin Email End */
		
		/*User Email Start */
		if(!empty($user['appointment_email']))
		{
			$body=" Dear ".$user['appointment_name']."<BR>
					Thank you for using upchar servies.<BR>
					Your appointment no is ".$user['appointment_id'].",".$user['name']." for ".$user['fname'].",<BR>Timing - ".$user['from_timing']." to ".$user['to_timing']." ,Date - ".$user['appointment_date'].",fee - ".$user['fee']." paid ".$user['payment_mode'].".<BR>
					If you want to confirm your Priority appointment  paid online by your account.<BR>
					Feel free to call any time on 8448449603 to our customer care will help you.<BR>
					Thank You  <BR>Email: info@upcharr.com <BR>WWW.UPCHARR.COM";
			$this->azad_lib->sendMail($user['appointment_email'],'Thanks for book appointment ',$body);
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
				partner@upcharr.com<BR>";
		$this->azad_lib->sendMail($user['dr_email'],'Upcharr Appointment Booking',$body);
		/*Doctor Email End */
		
		$this->session->unset_userdata('SecurePay');
		$this->session->unset_userdata('AppointmentCheckout');
		$this->session->set_flashdata('pgresponse', 'Thank you! The Appointment detail has been sent to the registered  mobile no.');
		redirect('/myappointents');
	}
	
	public function processordercod_hospital()
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
			WWW.UPCHARR.COM";
			sendsms($msg,$mobile);

		$updatedata=array('PAYMENT_STATUS'=>'COC');
		$this->db->where('ORDER_ID',$OrderId);
		$this->db->update('sm_order',$updatedata);

		$updateuserdata=array('checkout_id'=>'0','payment_status'=>'UNPAID','payment_mode'=>'COC','status'=>'1');
		$this->db->where('appointment_id',$aid);
		$this->db->update('appointment',$updateuserdata);
			
		$user	=	$this->User_Model->get_appointment_details($aid);
		$this->load->library('azad_lib');
		/*Admin Email Start */
		$body="Hello upchar <BR> You have new booking  by ".$user['appointment_name']."  to ".$user['name']." for ".$user['fname'].", <BR>Timing - ".$user['from_timing']." to ".$user['to_timing']." ,Date - ".$user['appointment_date']." ,<BR>fee - ".$user['fee']." paid ".$user['payment_mode']." ,appointment no - ".$user['appointment_id'].".<BR>Thank You  <BR>Email: info@upcharr.com ";
		$this->azad_lib->sendMail('info@upcharr.com','New Appointment Booking',$body);
		/*Admin Email End */
		
		/*User Email Start */
		if(!empty($user['appointment_email']))
		{
			$body=" Dear ".$user['appointment_name']."<BR>
					Thank you for using upchar servies.<BR>
					Your appointment no is ".$user['appointment_id'].",".$user['name']." for ".$user['fname'].",<BR>Timing - ".$user['from_timing']." to ".$user['to_timing']." ,Date - ".$user['appointment_date'].",fee - ".$user['fee']." paid ".$user['payment_mode'].".<BR>
					If you want to confirm your Priority appointment  paid online by your account.<BR>
					Feel free to call any time on 8448449603 to our customer care will help you.<BR>
					Thank You  <BR>Email: info@upcharr.com <BR>WWW.UPCHARR.COM";
			$this->azad_lib->sendMail($user['appointment_email'],'Thanks for book appointment ',$body);
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
				partner@upcharr.com<BR>";
		$this->azad_lib->sendMail($user['dr_email'],'Upcharr Appointment Booking',$body);
		/*Doctor Email End */
		
		$this->session->unset_userdata('SecurePay');
		$this->session->unset_userdata('AppointmentCheckout');
		$this->session->set_flashdata('pgresponse', 'Thank you! The Appointment detail has been sent to the registered  mobile no.');
		redirect('/hospitalpanel/manageappointment');
	}
	public function processorder()
		{

		$workingKey = base64_decode(CC_WORKING_KEY) ;	//Working Key should be provided here.
		$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
		$rcvdString=$this->decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
		$order_status="";
		$decryptValues=explode('&', $rcvdString);
		$dataSize=sizeof($decryptValues);
		$uid=$this->session->userdata('userid');

		for($i = 0; $i < $dataSize; $i++)
		{
			$information=explode('=',$decryptValues[$i]);
			if($i==3)	$order_status=$information[1];
		}

		$Info_OrderId=explode('=',$decryptValues[0]);
		$OrderId=$Info_OrderId[1];

		$Info_TrackingId=explode('=',$decryptValues[1]);
		$TrakingId=$Info_TrackingId[1];

		$Info_BankRefNo=explode('=',$decryptValues[2]);
		$BankRefNo=$Info_BankRefNo[1];

		$Info_OrderStatus=explode('=',$decryptValues[3]);
		$OrderStatus=$Info_OrderStatus[1];

		$Info_FailureMessage=explode('=',$decryptValues[4]);
		$FailureMessage=$Info_FailureMessage[1];

		$Info_PaymentMod=explode('=',$decryptValues[5]);
		$PaymentMod=$Info_PaymentMod[1];

		$Info_CardName=explode('=',$decryptValues[6]);
		$CardName=$Info_CardName[1];

		$Info_StatusCode=explode('=',$decryptValues[7]);
		$StatusCode=$Info_StatusCode[1];

		$Info_StatusMessage=explode('=',$decryptValues[8]);
		 $StatusMessage=$Info_StatusMessage[1];

		$Info_Currency=explode('=',$decryptValues[9]);
		 $Currency=$Info_Currency[1];

		$Info_Amount=explode('=',$decryptValues[10]);
		 $Amount=$Info_Amount[1];

		$Info_BillingName=explode('=',$decryptValues[11]);
		$BillingName=$Info_BillingName[1];

		$Info_BillingAddress=explode('=',$decryptValues[12]);
		$BillingAddress=$Info_BillingAddress[1];

		$Info_BillingCity=explode('=',$decryptValues[13]);
		$BillingCity=$Info_BillingCity[1];

		$Info_BillingState=explode('=',$decryptValues[14]);
		$BillingState=$Info_BillingState[1];

		$Info_BillingZip=explode('=',$decryptValues[15]);
		$BillingZip=$Info_BillingZip[1];

		$Info_BillingCountry=explode('=',$decryptValues[16]);
		$BillingCountry=$Info_BillingCountry[1];

		$Info_BillingTel=explode('=',$decryptValues[17]);
		$BillingTel=$Info_BillingTel[1];

		$Info_BillingEmail=explode('=',$decryptValues[18]);
		$BillingEmail=$Info_BillingEmail[1];

		$Info_DeliveryName=explode('=',$decryptValues[19]);
		$DeliveryName=$Info_DeliveryName[1];

		$Info_DeliveryAddress=explode('=',$decryptValues[20]);
		$DeliveryAddress=$Info_DeliveryAddress[1];

		$Info_DeliveryCity=explode('=',$decryptValues[21]);
		$DeliveryCity=$Info_DeliveryCity[1];

		$Info_DeliveryState=explode('=',$decryptValues[22]);
		$DeliveryState=$Info_DeliveryState[1];

		$Info_DeliveryZip=explode('=',$decryptValues[23]);
		$DeliveryZip=$Info_DeliveryZip[1];

		$Info_DeliveryCountry=explode('=',$decryptValues[24]);
		$DeliveryCountry=$Info_DeliveryCountry[1];


		$Info_DeliveryTel=explode('=',$decryptValues[25]);
		$DeliveryTel=$Info_DeliveryTel[1];

                $date=date("Y-m-d H:i:s");

		$Info_Merchant_Param1=explode('=',$decryptValues[26]);
        //$userid=$UserId=$Info_Merchant_Param1[1];
         $userid=$UserId=$uid;

		  if($OrderId===null){
			$this->session->set_flashdata('pgresponse', 'Security Error. Illegal access detected.');
		  }else if($order_status==="Success")
			{
			$paymentdata=array('userid'=>$userid,'checkoutid'=>'0','orderid'=>$OrderId,'trakingid'=>$TrakingId,'bankrefno'=>$BankRefNo,'orderstatus'=>$OrderStatus,'failurestatus'=>$FailureMessage,'paymentmod'=>$PaymentMod,'cardname'=>$CardName,'statuscode'=>$StatusCode,'statusmessage'=>$StatusMessage,'currency'=>$Currency,'amount'=>$Amount,'billingname'=>$BillingName,'billingaddress'=>$BillingAddress,'billingcity'=>$BillingCity,'billingstate'=>$BillingState,'billingzip'=>$BillingZip,'billingcountry'=>$BillingCountry,'billingtel'=>$BillingTel,'billingemail'=>$BillingEmail,'deliveryname'=>$DeliveryName,'deliveryaddress'=>$DeliveryAddress,'deliverycity'=>$DeliveryCity,'deliverystate'=>$DeliveryState,'deliveryzip'=>$DeliveryZip,'deliverycountry'=>$DeliveryCountry,'deliverytel'=>$DeliveryTel,'status'=>'1','date'=>$date);
			$this->db->insert('sm_checkout',$paymentdata);
			$checkout_id=$this->db->insert_id();

			$this->session->unset_userdata('SecurePay');
			$this->session->unset_userdata('AppointmentCheckout');

			$order=$this->db->where(array('ORDER_ID'=>$OrderId))->get('sm_order')->row();

			$aid=$order->ITEM_ID;
			$paystatus=$order->PAYMENT_STATUS; //cross check
			$ordertotal=$order->TOTAL;// compare total with the amount recieved



		$appointment_data=$this->db->where(array('appointment_id'=>$aid))->get('appointment')->row();
		$mobile=$appointment_data->appointment_mobile;

			$msg="Your Appointment booked successfully! Appointment# $aid
			Payment of Rs $Amount Received Successfully vied Order# $OrderId
			WWW.UPCHARR.COM";
			sendsms($msg,$mobile);
			
			
			
			

			//--------------------START code for the delivery and entry of codes-----------------------------------





//--------------------Mailing and Messaging part is here

//Email Thanks you with order id & member ship details
//sms the same
//email invoice attached



//--------------------------------------

		$updatedata=array('PAYMENT_STATUS'=>'DONE');
		$this->db->where('ORDER_ID',$OrderId);
		$this->db->update('sm_order',$updatedata);

		$updateuserdata=array('checkout_id'=>$checkout_id,'payment_status'=>'DONE','payment_mode'=>'ONLINE','status'=>'1','pay_date'=>$date);
		$this->db->where('appointment_id',$aid);
		$this->db->update('appointment',$updateuserdata);

          $this->load->library('azad_lib');
			$body="Thank You  <BR>   Email: info@upcharr.com  ";
			$this->azad_lib->sendMail('info@upcharr.com','Thanks for book appointment ',$body); 
    
		$this->session->set_flashdata('pgresponse', 'Thank you! Payment Successful The Appointment detail has been sent to the registered  mobile no.');

			//-------------------------End code for delivery and entry of codes -----------------------------



			}
			else if($order_status==="Aborted")
			{
				$paymentdata=array('userid'=>$userid,'checkoutid'=>'1','orderid'=>$OrderId,'trakingid'=>$TrakingId,'bankrefno'=>$BankRefNo,'orderstatus'=>$OrderStatus,'failurestatus'=>$FailureMessage,'paymentmod'=>$PaymentMod,'cardname'=>$CardName,'statuscode'=>$StatusCode,'statusmessage'=>$StatusMessage,'currency'=>$Currency,'amount'=>$Amount,'billingname'=>$BillingName,'billingaddress'=>$BillingAddress,'billingcity'=>$BillingCity,'billingstate'=>$BillingState,'billingzip'=>$BillingZip,'billingcountry'=>$BillingCountry,'billingtel'=>$BillingTel,'billingemail'=>$BillingEmail,'deliveryname'=>$DeliveryName,'deliveryaddress'=>$DeliveryAddress,'deliverycity'=>$DeliveryCity,'deliverystate'=>$DeliveryState,'deliveryzip'=>$DeliveryZip,'deliverycountry'=>$DeliveryCountry,'deliverytel'=>$DeliveryTel,'status'=>'1','date'=>$date);
			$this->db->insert('sm_checkout',$paymentdata);
			$this->session->set_flashdata('pgresponse', 'The following items prevent your check-out. There was an issue with your payment');


			}
			else if($order_status==="Failure")
			{
				$paymentdata=array('userid'=>$userid,'checkoutid'=>'2','orderid'=>$OrderId,'trakingid'=>$TrakingId,'bankrefno'=>$BankRefNo,'orderstatus'=>$OrderStatus,'failurestatus'=>$FailureMessage,'paymentmod'=>$PaymentMod,'cardname'=>$CardName,'statuscode'=>$StatusCode,'statusmessage'=>$StatusMessage,'currency'=>$Currency,'amount'=>$Amount,'billingname'=>$BillingName,'billingaddress'=>$BillingAddress,'billingcity'=>$BillingCity,'billingstate'=>$BillingState,'billingzip'=>$BillingZip,'billingcountry'=>$BillingCountry,'billingtel'=>$BillingTel,'billingemail'=>$BillingEmail,'deliveryname'=>$DeliveryName,'deliveryaddress'=>$DeliveryAddress,'deliverycity'=>$DeliveryCity,'deliverystate'=>$DeliveryState,'deliveryzip'=>$DeliveryZip,'deliverycountry'=>$DeliveryCountry,'deliverytel'=>$DeliveryTel,'status'=>'1','date'=>$date);
			$this->db->insert('sm_checkout',$paymentdata);
			$this->session->set_flashdata('pgresponse', 'OPPS! Transaction has been declined.');


			}
			else
			{
				$paymentdata=array('userid'=>$userid,'checkoutid'=>'3','orderid'=>$OrderId,'trakingid'=>$TrakingId,'bankrefno'=>$BankRefNo,'orderstatus'=>$OrderStatus,'failurestatus'=>$FailureMessage,'paymentmod'=>$PaymentMod,'cardname'=>$CardName,'statuscode'=>$StatusCode,'statusmessage'=>$StatusMessage,'currency'=>$Currency,'amount'=>$Amount,'billingname'=>$BillingName,'billingaddress'=>$BillingAddress,'billingcity'=>$BillingCity,'billingstate'=>$BillingState,'billingzip'=>$BillingZip,'billingcountry'=>$BillingCountry,'billingtel'=>$BillingTel,'billingemail'=>$BillingEmail,'deliveryname'=>$DeliveryName,'deliveryaddress'=>$DeliveryAddress,'deliverycity'=>$DeliveryCity,'deliverystate'=>$DeliveryState,'deliveryzip'=>$DeliveryZip,'deliverycountry'=>$DeliveryCountry,'deliverytel'=>$DeliveryTel,'status'=>'1','date'=>$date);
				$this->db->insert('sm_checkout',$paymentdata);

			$this->session->set_flashdata('pgresponse', 'Security Error. Illegal access detected.');

			}
;
		redirect('/myappointents');

		}

		public function secureprocessappoinment()
		{

		$workingKey = base64_decode(CC_WORKING_KEY) ;	//Working Key should be provided here.
		$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
		$rcvdString=$this->decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
		$order_status="";
		$decryptValues=explode('&', $rcvdString);
		$dataSize=sizeof($decryptValues);
		$uid=$this->uri->segment(3);

		for($i = 0; $i < $dataSize; $i++)
		{
			$information=explode('=',$decryptValues[$i]);
			if($i==3)	$order_status=$information[1];
		}

		$Info_OrderId=explode('=',$decryptValues[0]);
		$OrderId=$Info_OrderId[1];

		$Info_TrackingId=explode('=',$decryptValues[1]);
		$TrakingId=$Info_TrackingId[1];

		$Info_BankRefNo=explode('=',$decryptValues[2]);
		$BankRefNo=$Info_BankRefNo[1];

		$Info_OrderStatus=explode('=',$decryptValues[3]);
		$OrderStatus=$Info_OrderStatus[1];

		$Info_FailureMessage=explode('=',$decryptValues[4]);
		$FailureMessage=$Info_FailureMessage[1];

		$Info_PaymentMod=explode('=',$decryptValues[5]);
		$PaymentMod=$Info_PaymentMod[1];

		$Info_CardName=explode('=',$decryptValues[6]);
		$CardName=$Info_CardName[1];

		$Info_StatusCode=explode('=',$decryptValues[7]);
		$StatusCode=$Info_StatusCode[1];

		$Info_StatusMessage=explode('=',$decryptValues[8]);
		 $StatusMessage=$Info_StatusMessage[1];

		$Info_Currency=explode('=',$decryptValues[9]);
		 $Currency=$Info_Currency[1];

		$Info_Amount=explode('=',$decryptValues[10]);
		 $Amount=$Info_Amount[1];

		$Info_BillingName=explode('=',$decryptValues[11]);
		$BillingName=$Info_BillingName[1];

		$Info_BillingAddress=explode('=',$decryptValues[12]);
		$BillingAddress=$Info_BillingAddress[1];

		$Info_BillingCity=explode('=',$decryptValues[13]);
		$BillingCity=$Info_BillingCity[1];

		$Info_BillingState=explode('=',$decryptValues[14]);
		$BillingState=$Info_BillingState[1];

		$Info_BillingZip=explode('=',$decryptValues[15]);
		$BillingZip=$Info_BillingZip[1];

		$Info_BillingCountry=explode('=',$decryptValues[16]);
		$BillingCountry=$Info_BillingCountry[1];

		$Info_BillingTel=explode('=',$decryptValues[17]);
		$BillingTel=$Info_BillingTel[1];

		$Info_BillingEmail=explode('=',$decryptValues[18]);
		$BillingEmail=$Info_BillingEmail[1];

		$Info_DeliveryName=explode('=',$decryptValues[19]);
		$DeliveryName=$Info_DeliveryName[1];

		$Info_DeliveryAddress=explode('=',$decryptValues[20]);
		$DeliveryAddress=$Info_DeliveryAddress[1];

		$Info_DeliveryCity=explode('=',$decryptValues[21]);
		$DeliveryCity=$Info_DeliveryCity[1];

		$Info_DeliveryState=explode('=',$decryptValues[22]);
		$DeliveryState=$Info_DeliveryState[1];

		$Info_DeliveryZip=explode('=',$decryptValues[23]);
		$DeliveryZip=$Info_DeliveryZip[1];

		$Info_DeliveryCountry=explode('=',$decryptValues[24]);
		$DeliveryCountry=$Info_DeliveryCountry[1];


		$Info_DeliveryTel=explode('=',$decryptValues[25]);
		$DeliveryTel=$Info_DeliveryTel[1];

                $date=date("Y-m-d H:i:s");

		$Info_Merchant_Param1=explode('=',$decryptValues[26]);
        //$userid=$UserId=$Info_Merchant_Param1[1];
         $userid=$UserId=$uid;


        if($OrderId===null){
			echo   json_encode(['status'=>'Illegal']);die;
		}else if($order_status==="Success")
			{
			$paymentdata=array('userid'=>$userid,'checkoutid'=>'0','orderid'=>$OrderId,'trakingid'=>$TrakingId,'bankrefno'=>$BankRefNo,'orderstatus'=>$OrderStatus,'failurestatus'=>$FailureMessage,'paymentmod'=>$PaymentMod,'cardname'=>$CardName,'statuscode'=>$StatusCode,'statusmessage'=>$StatusMessage,'currency'=>$Currency,'amount'=>$Amount,'billingname'=>$BillingName,'billingaddress'=>$BillingAddress,'billingcity'=>$BillingCity,'billingstate'=>$BillingState,'billingzip'=>$BillingZip,'billingcountry'=>$BillingCountry,'billingtel'=>$BillingTel,'billingemail'=>$BillingEmail,'deliveryname'=>$DeliveryName,'deliveryaddress'=>$DeliveryAddress,'deliverycity'=>$DeliveryCity,'deliverystate'=>$DeliveryState,'deliveryzip'=>$DeliveryZip,'deliverycountry'=>$DeliveryCountry,'deliverytel'=>$DeliveryTel,'status'=>'1','date'=>$date);
			$this->db->insert('sm_checkout',$paymentdata);
			$checkout_id=$this->db->insert_id();

			$this->session->unset_userdata('SecurePay');
			$this->session->unset_userdata('AppointmentCheckout');

			$order=$this->db->where(array('ORDER_ID'=>$OrderId))->get('sm_order')->row();

			$aid=$order->ITEM_ID;
			$paystatus=$order->PAYMENT_STATUS; //cross check
			$ordertotal=$order->TOTAL;// compare total with the amount recieved



		$appointment_data=$this->db->where(array('appointment_id'=>$aid))->get('appointment')->row();
		$mobile=$appointment_data->appointment_mobile;

			$msg="Your Appointment booked successfully! Appointment# $aid
			Payment of Rs $Amount Received Successfully vied Order# $OrderId
			WWW.UPCHARR.COM";
			sendsms($msg,$mobile);

			//--------------------START code for the delivery and entry of codes-----------------------------------





//--------------------Mailing and Messaging part is here

//Email Thanks you with order id & member ship details
//sms the same
//email invoice attached



//--------------------------------------

		$updatedata=array('PAYMENT_STATUS'=>'DONE');
		$this->db->where('ORDER_ID',$OrderId);
		$this->db->update('sm_order',$updatedata);

		$updateuserdata=array('checkout_id'=>$checkout_id,'payment_status'=>'DONE','payment_mode'=>'ONLINE','status'=>'1','pay_date'=>$date);
		$this->db->where('appointment_id',$aid);
		$this->db->update('appointment',$updateuserdata);
 
          $this->load->library('azad_lib');
			$body="Thank You  <BR>   Email: info@upcharr.com  ";
			$this->azad_lib->sendMail('info@upcharr.com','Thanks for book appointment ',$body);
		//$this->session->set_flashdata('pgresponse', 'Thank you! Payment Successful The Appointment detail has been sent to the registered  mobile no.');

			//-------------------------End code for delivery and entry of codes -----------------------------



			}
			else if($order_status==="Aborted")
			{
				$paymentdata=array('userid'=>$userid,'checkoutid'=>'1','orderid'=>$OrderId,'trakingid'=>$TrakingId,'bankrefno'=>$BankRefNo,'orderstatus'=>$OrderStatus,'failurestatus'=>$FailureMessage,'paymentmod'=>$PaymentMod,'cardname'=>$CardName,'statuscode'=>$StatusCode,'statusmessage'=>$StatusMessage,'currency'=>$Currency,'amount'=>$Amount,'billingname'=>$BillingName,'billingaddress'=>$BillingAddress,'billingcity'=>$BillingCity,'billingstate'=>$BillingState,'billingzip'=>$BillingZip,'billingcountry'=>$BillingCountry,'billingtel'=>$BillingTel,'billingemail'=>$BillingEmail,'deliveryname'=>$DeliveryName,'deliveryaddress'=>$DeliveryAddress,'deliverycity'=>$DeliveryCity,'deliverystate'=>$DeliveryState,'deliveryzip'=>$DeliveryZip,'deliverycountry'=>$DeliveryCountry,'deliverytel'=>$DeliveryTel,'status'=>'1','date'=>$date);
			$this->db->insert('sm_checkout',$paymentdata);
			//$this->session->set_flashdata('pgresponse', 'The following items prevent your check-out. There was an issue with your payment');


			}
			else if($order_status==="Failure")
			{
				$paymentdata=array('userid'=>$userid,'checkoutid'=>'2','orderid'=>$OrderId,'trakingid'=>$TrakingId,'bankrefno'=>$BankRefNo,'orderstatus'=>$OrderStatus,'failurestatus'=>$FailureMessage,'paymentmod'=>$PaymentMod,'cardname'=>$CardName,'statuscode'=>$StatusCode,'statusmessage'=>$StatusMessage,'currency'=>$Currency,'amount'=>$Amount,'billingname'=>$BillingName,'billingaddress'=>$BillingAddress,'billingcity'=>$BillingCity,'billingstate'=>$BillingState,'billingzip'=>$BillingZip,'billingcountry'=>$BillingCountry,'billingtel'=>$BillingTel,'billingemail'=>$BillingEmail,'deliveryname'=>$DeliveryName,'deliveryaddress'=>$DeliveryAddress,'deliverycity'=>$DeliveryCity,'deliverystate'=>$DeliveryState,'deliveryzip'=>$DeliveryZip,'deliverycountry'=>$DeliveryCountry,'deliverytel'=>$DeliveryTel,'status'=>'1','date'=>$date);
			$this->db->insert('sm_checkout',$paymentdata);
			//$this->session->set_flashdata('pgresponse', 'OPPS! Transaction has been declined.');


			}
			else
			{
				$paymentdata=array('userid'=>$userid,'checkoutid'=>'3','orderid'=>$OrderId,'trakingid'=>$TrakingId,'bankrefno'=>$BankRefNo,'orderstatus'=>$OrderStatus,'failurestatus'=>$FailureMessage,'paymentmod'=>$PaymentMod,'cardname'=>$CardName,'statuscode'=>$StatusCode,'statusmessage'=>$StatusMessage,'currency'=>$Currency,'amount'=>$Amount,'billingname'=>$BillingName,'billingaddress'=>$BillingAddress,'billingcity'=>$BillingCity,'billingstate'=>$BillingState,'billingzip'=>$BillingZip,'billingcountry'=>$BillingCountry,'billingtel'=>$BillingTel,'billingemail'=>$BillingEmail,'deliveryname'=>$DeliveryName,'deliveryaddress'=>$DeliveryAddress,'deliverycity'=>$DeliveryCity,'deliverystate'=>$DeliveryState,'deliveryzip'=>$DeliveryZip,'deliverycountry'=>$DeliveryCountry,'deliverytel'=>$DeliveryTel,'status'=>'1','date'=>$date);
				$this->db->insert('sm_checkout',$paymentdata);
			echo 'Illegal';
			//$this->session->set_flashdata('pgresponse', 'Security Error. Illegal access detected.');

			}
echo json_encode(['status'=>$order_status]);
		//redirect('/myappointents');

		}




	//--------------Lunch Order Processing-----------------

	public function placeorderlunch(){


		$uid=$this->session->userdata('SM_UID');
		$plan=$this->input->post('luncheventid');
		$plandateid=$this->input->post('luncheventdateid');
		$plandates=$this->input->post('eventdate');
		$plandata=$this->db->get_where('lunch_event',array('id'=>$plan,'STATUS'=>'1'))->row();

		if($plan!='' && count($plandata)!=0 & $uid!=''){

			$price=$taxable=$disc=0.0;
			$price = $plandata->price;


			if ($plandata->disc_type == 'P'){

				$disc = ($plandata->price * $plandata->discount )/100;
			}
			else if($plandata->disc_type=='F') {

				$disc = $plandata->discount;
			}

			$taxable = $price - $disc;

			if ($plandata->tax_type == 'P'){

				$tax = ($taxable * $plandata->tax )/100;
			}
			else if($plandata->tax_type=='F') {

				$tax = $plandata->tax;
			}


			$subtotal=$total= $taxable + $tax;

			//Register Order with temp order id &  request type

			$tempoid=date('YmdHis').rand(1000,9999);
			$odata = array(
					'ORDER_ID'=>$tempoid,
					'USER_TYPE'=>'U',
					'USER_ID'=>$uid,
					'ITEM_TYPE'=>'L',
					'ITEM_ID'=>$plandateid,
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
			$orderid= 'SML'.str_pad($ai_oid,10,"0",STR_PAD_LEFT);

			// update final order id
			$updatedata=array('ORDER_ID'=>$orderid);
			$this->db->where('ID',$ai_oid);
			$this->db->update('sm_order',$updatedata);


			//CODE FOR PAYMENT GATEWAY//
			$Redirect_Url = base_url()."processorderlunch";
			$cancel_Url = base_url()."processorderlunch";
			$Merchant_Id = base64_decode(CC_MERID);
			$Amount = $total;
			//$Amount = '1';
			$Order_Id = $orderid;

			$cust=$this->db->join('userprofile','userlogin.USERID = userprofile.userid')->get_where('userlogin',array('userlogin.USERID'=>$uid))->row();

			$billing_cust_name=$cust->FNAME . ' '.$cust->LNAME ;
			$billing_cust_address=$cust->address;
			$billing_cust_state=$cust->city;
			$billing_cust_country='India';
			$billing_cust_tel=$cust->MOBILE;
			$billing_cust_email=$cust->EMAIL;
			$billing_city = $cust->city;
			$billing_zip = '111111';

			$delivery_cust_name=$cust->FNAME . ' '.$cust->LNAME ;
			$delivery_cust_address=$cust->address;
			$delivery_cust_state = $cust->city;
			$delivery_cust_country = 'India';
			$delivery_cust_tel= $cust->MOBILE;;
			$delivery_city = $cust->city;
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
			$this->session->set_userdata('SecurePay',$gatewayData);
			echo 'OK';

		 }
		 else {
			 echo 'FAILED';
		 }
	}


	function securePayLunch()
{
$this->output->set_header("HTTP/1.0 200 OK");
$this->output->set_header("HTTP/1.1 200 OK");
$this->output->set_header('Last-Modified: '.gmdate('D, d M Y H:i:s', $last_update).' GMT');
$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
$this->output->set_header("Cache-Control: post-check=0, pre-check=0");
$this->output->set_header("Pragma: no-cache");
$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

$data=$this->session->userdata('SecurePay');
$oid=$this->session->userdata('SecurePay')['Order_Id'];
$this->db->where('orderid',$oid);
$c1=$this->db->count_all_results('sm_checkout');


$count=$c1;

	if($data && $count==0)
	{
		$this->load->view('secure/securePayment',$data);
	}
	else
	{
		redirect('lunchevent');
	}
//$this->session->unset_userdata('SecurePay');
}


	public function processorderlunch()
		{

		$workingKey = CC_WORKING_KEY ;		//Working Key should be provided here.
		$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
		$rcvdString=$this->decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
		$order_status="";
		$decryptValues=explode('&', $rcvdString);
		$dataSize=sizeof($decryptValues);
		$uid=$this->session->userdata('SM_UID');

		for($i = 0; $i < $dataSize; $i++)
		{
			$information=explode('=',$decryptValues[$i]);
			if($i==3)	$order_status=$information[1];
		}

		$Info_OrderId=explode('=',$decryptValues[0]);
		$OrderId=$Info_OrderId[1];

		$Info_TrackingId=explode('=',$decryptValues[1]);
		$TrakingId=$Info_TrackingId[1];

		$Info_BankRefNo=explode('=',$decryptValues[2]);
		$BankRefNo=$Info_BankRefNo[1];

		$Info_OrderStatus=explode('=',$decryptValues[3]);
		$OrderStatus=$Info_OrderStatus[1];

		$Info_FailureMessage=explode('=',$decryptValues[4]);
		$FailureMessage=$Info_FailureMessage[1];

		$Info_PaymentMod=explode('=',$decryptValues[5]);
		$PaymentMod=$Info_PaymentMod[1];

		$Info_CardName=explode('=',$decryptValues[6]);
		$CardName=$Info_CardName[1];

		$Info_StatusCode=explode('=',$decryptValues[7]);
		$StatusCode=$Info_StatusCode[1];

		$Info_StatusMessage=explode('=',$decryptValues[8]);
		 $StatusMessage=$Info_StatusMessage[1];

		$Info_Currency=explode('=',$decryptValues[9]);
		 $Currency=$Info_Currency[1];

		$Info_Amount=explode('=',$decryptValues[10]);
		 $Amount=$Info_Amount[1];

		$Info_BillingName=explode('=',$decryptValues[11]);
		$BillingName=$Info_BillingName[1];

		$Info_BillingAddress=explode('=',$decryptValues[12]);
		$BillingAddress=$Info_BillingAddress[1];

		$Info_BillingCity=explode('=',$decryptValues[13]);
		$BillingCity=$Info_BillingCity[1];

		$Info_BillingState=explode('=',$decryptValues[14]);
		$BillingState=$Info_BillingState[1];

		$Info_BillingZip=explode('=',$decryptValues[15]);
		$BillingZip=$Info_BillingZip[1];

		$Info_BillingCountry=explode('=',$decryptValues[16]);
		$BillingCountry=$Info_BillingCountry[1];

		$Info_BillingTel=explode('=',$decryptValues[17]);
		$BillingTel=$Info_BillingTel[1];

		$Info_BillingEmail=explode('=',$decryptValues[18]);
		$BillingEmail=$Info_BillingEmail[1];

		$Info_DeliveryName=explode('=',$decryptValues[19]);
		$DeliveryName=$Info_DeliveryName[1];

		$Info_DeliveryAddress=explode('=',$decryptValues[20]);
		$DeliveryAddress=$Info_DeliveryAddress[1];

		$Info_DeliveryCity=explode('=',$decryptValues[21]);
		$DeliveryCity=$Info_DeliveryCity[1];

		$Info_DeliveryState=explode('=',$decryptValues[22]);
		$DeliveryState=$Info_DeliveryState[1];

		$Info_DeliveryZip=explode('=',$decryptValues[23]);
		$DeliveryZip=$Info_DeliveryZip[1];

		$Info_DeliveryCountry=explode('=',$decryptValues[24]);
		$DeliveryCountry=$Info_DeliveryCountry[1];


		$Info_DeliveryTel=explode('=',$decryptValues[25]);
		$DeliveryTel=$Info_DeliveryTel[1];

                $date=date("Y-m-d H:i:s");

		$Info_Merchant_Param1=explode('=',$decryptValues[26]);
        //$userid=$UserId=$Info_Merchant_Param1[1];
         $userid=$UserId=$uid;


            if($order_status==="Success")
			{
			$paymentdata=array('userid'=>$userid,'checkoutid'=>'0','orderid'=>$OrderId,'trakingid'=>$TrakingId,'bankrefno'=>$BankRefNo,'orderstatus'=>$OrderStatus,'failurestatus'=>$FailureMessage,'paymentmod'=>$PaymentMod,'cardname'=>$CardName,'statuscode'=>$StatusCode,'statusmessage'=>$StatusMessage,'currency'=>$Currency,'amount'=>$Amount,'billingname'=>$BillingName,'billingaddress'=>$BillingAddress,'billingcity'=>$BillingCity,'billingstate'=>$BillingState,'billingzip'=>$BillingZip,'billingcountry'=>$BillingCountry,'billingtel'=>$BillingTel,'billingemail'=>$BillingEmail,'deliveryname'=>$DeliveryName,'deliveryaddress'=>$DeliveryAddress,'deliverycity'=>$DeliveryCity,'deliverystate'=>$DeliveryState,'deliveryzip'=>$DeliveryZip,'deliverycountry'=>$DeliveryCountry,'deliverytel'=>$DeliveryTel,'status'=>'1','date'=>$date);
			$this->db->insert('sm_checkout',$paymentdata);

			$order=$this->db->where(array('ORDER_ID'=>$OrderId))->get('sm_order')->row();

			$plan=$order->ITEM_ID;
			$orddate=$order->DATE;
			$ordtime=$order->TIME;
			$paystatus=$order->PAYMENT_STATUS; //cross check
			$ordertotal=$order->TOTAL;// compare total with the amount recieved

			/*$membership_plan=$this->db->where(array('PLAN_ID'=>$plan))->get('membership_plan')->row();
			$planmonth=$membership_plan->VALID_MONTH;*/

			$lunrequest=$this->db->where(array('id'=>$plan))->get('lunch_event_date')->row();
			$luneventdate=$lunrequest->event_date;
			$luneventid=$lunrequest->event_id;

			$luneventtable=$this->db->where(array('id'=>$luneventid))->get('lunch_event')->row();
			$lunnameevent=$luneventtable->event_venue;
			$lunplaceevent==$luneventtable->address;

			$userdata=$this->db->where(array('USERID'=>$userid))->get('userlogin')->row();
			$fname=$userdata->FNAME;
			$mobile=$userdata->MOBILE;
			//$email=$userdata->EMAIL;
			$email=$this->sm_lib->getEmail($userid);


			//--------------------START code for the delivery and entry of codes-----------------------------------


			/*$expiry= date('Y-m-d', strtotime("+$planmonth months", strtotime("NOW")));
			$subscriptiondata=array('USER_ID'=>$userid,'USER_TYPE'=>'U','ORDER_ID'=>$OrderId, 'PLAN'=>$plan,'SUBSCRIPTION_TYPE'=>'MONTH','EXPIRY'=>$expiry, 'STATUS'=>'1','DATE'=>date('Y-m-d'),'TIME'=>date('H:i:s'));
			$this->db->insert('subscriptions',$subscriptiondata);*/


//--------------------Mailing and Messaging part is here

//Email Thanks you with order id & member ship details
//sms the same
//email invoice attached





			if($mobile!=''){
				$Tvariables = array();
				$Tvariables['ORDER_ID'] = $OrderId;
				$Tvariables['USER'] = $fname;
				$Tvariables['AMOUNT'] = $ordertotal;
				$Tvariables['EVENTURL'] = base_url().'events';

				$this->load->library('Netcore_lib');
				if (class_exists('Netcore_lib'))
					echo $this->netcore_lib->sendSms($mobile,$Tvariables,'SMS_AFTER_LUNCH');
			}




	$subject="Soulmate Cafe Successfull Order# $OrderId.";

				$Tvariables = array();
				$Tvariables['ORDER_ID'] = $OrderId;
				$Tvariables['USER'] = $fname;
				$Tvariables['AMOUNT'] = $ordertotal;
				$Tvariables['VENUE'] = $lunnameevent;
				$Tvariables['LUNCH_DATE'] = $luneventdate;
				$Tvariables['EVENTURL'] = base_url().'events';
				$Tvariables['TIMESTAMP'] = date('Y-m-d H:i:s');
				$Tvariables['EVENTNAME'] = $lunnameevent;
				$Tvariables['EVENTPLACE'] = $lunplaceevent;
				$Tvariables['MONTH'] = $planmonth;
				$Tvariables['LOGO'] = base_url() .'assets/images/newlogo.png';
				$Tvariables['CONTACTS'] = SM_CONTACTS ;
				$Tvariables['COMPANY_URL'] = SM_COMPANY_URL ;
				$Tvariables['COMPANY_NAME'] = SM_COMPANY_NAME ;



	 $this->netcore_lib->sendEmail($email,$subject,$Tvariables,'EMAIL_AFTER_LUNCH');


//--------------------------------------

		$updatedata=array('PAYMENT_STATUS'=>'DONE');
		$this->db->where('ORDER_ID',$OrderId);
		$this->db->update('sm_order',$updatedata);

		$updateuserdata=array('USER_TYPE'=>'U','USER_ID'=>$userid,'ORDER_ID'=>$OrderId,'DATE'=>$orddate,'TIME'=>$ordtime,'EVENT_ID'=>$luneventid,'EVENT_DATE_ID'=>$plan);
		$this->db->insert('lunch_event_request',$updateuserdata);

		/*$updateuserdata=array('SUBSCRIPTION_EXPIRY'=>$expiry,'PLAN'=>$plan,'MEMBERSHIP'=>'1');
		$this->db->where('USERID',$userid);
		$this->db->update('userlogin',$updateuserdata);*/

		$this->session->set_flashdata('pgresponse', 'Thank you! Payment Successful for thesoulmate Lunch detail has been sent to the registered email id and mobile no.');

			//-------------------------End code for delivery and entry of codes -----------------------------



			}
			else if($order_status==="Aborted")
			{
				$paymentdata=array('userid'=>$userid,'checkoutid'=>'1','orderid'=>$OrderId,'trakingid'=>$TrakingId,'bankrefno'=>$BankRefNo,'orderstatus'=>$OrderStatus,'failurestatus'=>$FailureMessage,'paymentmod'=>$PaymentMod,'cardname'=>$CardName,'statuscode'=>$StatusCode,'statusmessage'=>$StatusMessage,'currency'=>$Currency,'amount'=>$Amount,'billingname'=>$BillingName,'billingaddress'=>$BillingAddress,'billingcity'=>$BillingCity,'billingstate'=>$BillingState,'billingzip'=>$BillingZip,'billingcountry'=>$BillingCountry,'billingtel'=>$BillingTel,'billingemail'=>$BillingEmail,'deliveryname'=>$DeliveryName,'deliveryaddress'=>$DeliveryAddress,'deliverycity'=>$DeliveryCity,'deliverystate'=>$DeliveryState,'deliveryzip'=>$DeliveryZip,'deliverycountry'=>$DeliveryCountry,'deliverytel'=>$DeliveryTel,'status'=>'1','date'=>$date);
			$this->db->insert('sm_checkout',$paymentdata);
			$this->session->set_flashdata('pgresponse', 'The following items prevent your check-out. There was an issue with your payment');


			}
			else if($order_status==="Failure")
			{
				$paymentdata=array('userid'=>$userid,'checkoutid'=>'2','orderid'=>$OrderId,'trakingid'=>$TrakingId,'bankrefno'=>$BankRefNo,'orderstatus'=>$OrderStatus,'failurestatus'=>$FailureMessage,'paymentmod'=>$PaymentMod,'cardname'=>$CardName,'statuscode'=>$StatusCode,'statusmessage'=>$StatusMessage,'currency'=>$Currency,'amount'=>$Amount,'billingname'=>$BillingName,'billingaddress'=>$BillingAddress,'billingcity'=>$BillingCity,'billingstate'=>$BillingState,'billingzip'=>$BillingZip,'billingcountry'=>$BillingCountry,'billingtel'=>$BillingTel,'billingemail'=>$BillingEmail,'deliveryname'=>$DeliveryName,'deliveryaddress'=>$DeliveryAddress,'deliverycity'=>$DeliveryCity,'deliverystate'=>$DeliveryState,'deliveryzip'=>$DeliveryZip,'deliverycountry'=>$DeliveryCountry,'deliverytel'=>$DeliveryTel,'status'=>'1','date'=>$date);
			$this->db->insert('sm_checkout',$paymentdata);
			$this->session->set_flashdata('pgresponse', 'OPPS! Transaction has been declined.');


			}
			else
			{
				$paymentdata=array('userid'=>$userid,'checkoutid'=>'3','orderid'=>$OrderId,'trakingid'=>$TrakingId,'bankrefno'=>$BankRefNo,'orderstatus'=>$OrderStatus,'failurestatus'=>$FailureMessage,'paymentmod'=>$PaymentMod,'cardname'=>$CardName,'statuscode'=>$StatusCode,'statusmessage'=>$StatusMessage,'currency'=>$Currency,'amount'=>$Amount,'billingname'=>$BillingName,'billingaddress'=>$BillingAddress,'billingcity'=>$BillingCity,'billingstate'=>$BillingState,'billingzip'=>$BillingZip,'billingcountry'=>$BillingCountry,'billingtel'=>$BillingTel,'billingemail'=>$BillingEmail,'deliveryname'=>$DeliveryName,'deliveryaddress'=>$DeliveryAddress,'deliverycity'=>$DeliveryCity,'deliverystate'=>$DeliveryState,'deliveryzip'=>$DeliveryZip,'deliverycountry'=>$DeliveryCountry,'deliverytel'=>$DeliveryTel,'status'=>'1','date'=>$date);
				$this->db->insert('sm_checkout',$paymentdata);

			$this->session->set_flashdata('pgresponse', 'Security Error. Illegal access detected.');

			}


		//$rurl=$this->session->userdata('AFTERDEALPAY');
		redirect('/lunchevent');

		}


	//--------------Lunch Event End---------------------




	//--------------Events Book Processing-----------------

	public function placeorderevents(){

		$uid=$this->session->userdata('SM_UID');
		$plan=$this->input->post('eventsid');
		$plandateid=$this->input->post('eventsdateid');
		$plandates=$this->input->post('eventsdate');
		$plandata=$this->db->get_where('events',array('eventid'=>$plan,'STATUS'=>'1'))->row();

		if($plan!='' && count($plandata)!=0 & $uid!=''){

			$event_charge=$taxable=$disc=0.0;
			$event_charge = $plandata->event_charge;


			if ($plandata->discount_type == 'P'){

				$disc = ($plandata->event_charge * $plandata->discount )/100;
			}
			else if($plandata->discount_type=='F') {

				$disc = $plandata->discount;
			}

			$taxable = $event_charge - $disc;

			if ($plandata->tax_type == 'P'){

				$tax = ($taxable * $plandata->gst )/100;
			}
			else if($plandata->tax_type=='F') {

				$tax = $plandata->gst;
			}


			$subtotal=$total= $taxable + $tax;

			//Register Order with temp order id &  request type

			$tempoid=date('YmdHis').rand(1000,9999);
			$odata = array(
					'ORDER_ID'=>$tempoid,
					'USER_TYPE'=>'U',
					'USER_ID'=>$uid,
					'ITEM_TYPE'=>'E',
					'ITEM_ID'=>$plandateid,
					'QTY'=>'1',
					'PRICE'=>$event_charge,
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
			$orderid= 'SME'.str_pad($ai_oid,10,"0",STR_PAD_LEFT);

			// update final order id
			$updatedata=array('ORDER_ID'=>$orderid);
			$this->db->where('ID',$ai_oid);
			$this->db->update('sm_order',$updatedata);


			//CODE FOR PAYMENT GATEWAY//
			$Redirect_Url = base_url()."processorderevents";
			$cancel_Url = base_url()."processorderevents";
			$Merchant_Id = base64_decode(CC_MERID);
			$Amount = $total;
			//$Amount = '1';
			$Order_Id = $orderid;

			$cust=$this->db->join('userprofile','userlogin.USERID = userprofile.userid')->get_where('userlogin',array('userlogin.USERID'=>$uid))->row();

			$billing_cust_name=$cust->FNAME . ' '.$cust->LNAME ;
			$billing_cust_address=$cust->address;
			$billing_cust_state=$cust->city;
			$billing_cust_country='India';
			$billing_cust_tel=$cust->MOBILE;
			$billing_cust_email=$cust->EMAIL;
			$billing_city = $cust->city;
			$billing_zip = '111111';

			$delivery_cust_name=$cust->FNAME . ' '.$cust->LNAME ;
			$delivery_cust_address=$cust->address;
			$delivery_cust_state = $cust->city;
			$delivery_cust_country = 'India';
			$delivery_cust_tel= $cust->MOBILE;;
			$delivery_city = $cust->city;
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
			$this->session->set_userdata('SecurePay',$gatewayData);
			echo 'OK';

		 }
		 else {
			 echo 'FAILED';
		 }
	}


	function securePayEvents()
{
$this->output->set_header("HTTP/1.0 200 OK");
$this->output->set_header("HTTP/1.1 200 OK");
$this->output->set_header('Last-Modified: '.gmdate('D, d M Y H:i:s', $last_update).' GMT');
$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
$this->output->set_header("Cache-Control: post-check=0, pre-check=0");
$this->output->set_header("Pragma: no-cache");
$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

$data=$this->session->userdata('SecurePay');
$oid=$this->session->userdata('SecurePay')['Order_Id'];
$this->db->where('orderid',$oid);
$c1=$this->db->count_all_results('sm_checkout');


$count=$c1;

	if($data && $count==0)
	{
		$this->load->view('secure/securePayment',$data);
	}
	else
	{
		redirect('eventsdetail');
	}
//$this->session->unset_userdata('SecurePay');
}


	public function processorderevents()
		{

		$workingKey = CC_WORKING_KEY ;		//Working Key should be provided here.
		$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
		$rcvdString=$this->decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
		$order_status="";
		$decryptValues=explode('&', $rcvdString);
		$dataSize=sizeof($decryptValues);
		$uid=$this->session->userdata('SM_UID');

		for($i = 0; $i < $dataSize; $i++)
		{
			$information=explode('=',$decryptValues[$i]);
			if($i==3)	$order_status=$information[1];
		}

		$Info_OrderId=explode('=',$decryptValues[0]);
		$OrderId=$Info_OrderId[1];

		$Info_TrackingId=explode('=',$decryptValues[1]);
		$TrakingId=$Info_TrackingId[1];

		$Info_BankRefNo=explode('=',$decryptValues[2]);
		$BankRefNo=$Info_BankRefNo[1];

		$Info_OrderStatus=explode('=',$decryptValues[3]);
		$OrderStatus=$Info_OrderStatus[1];

		$Info_FailureMessage=explode('=',$decryptValues[4]);
		$FailureMessage=$Info_FailureMessage[1];

		$Info_PaymentMod=explode('=',$decryptValues[5]);
		$PaymentMod=$Info_PaymentMod[1];

		$Info_CardName=explode('=',$decryptValues[6]);
		$CardName=$Info_CardName[1];

		$Info_StatusCode=explode('=',$decryptValues[7]);
		$StatusCode=$Info_StatusCode[1];

		$Info_StatusMessage=explode('=',$decryptValues[8]);
		 $StatusMessage=$Info_StatusMessage[1];

		$Info_Currency=explode('=',$decryptValues[9]);
		 $Currency=$Info_Currency[1];

		$Info_Amount=explode('=',$decryptValues[10]);
		 $Amount=$Info_Amount[1];

		$Info_BillingName=explode('=',$decryptValues[11]);
		$BillingName=$Info_BillingName[1];

		$Info_BillingAddress=explode('=',$decryptValues[12]);
		$BillingAddress=$Info_BillingAddress[1];

		$Info_BillingCity=explode('=',$decryptValues[13]);
		$BillingCity=$Info_BillingCity[1];

		$Info_BillingState=explode('=',$decryptValues[14]);
		$BillingState=$Info_BillingState[1];

		$Info_BillingZip=explode('=',$decryptValues[15]);
		$BillingZip=$Info_BillingZip[1];

		$Info_BillingCountry=explode('=',$decryptValues[16]);
		$BillingCountry=$Info_BillingCountry[1];

		$Info_BillingTel=explode('=',$decryptValues[17]);
		$BillingTel=$Info_BillingTel[1];

		$Info_BillingEmail=explode('=',$decryptValues[18]);
		$BillingEmail=$Info_BillingEmail[1];

		$Info_DeliveryName=explode('=',$decryptValues[19]);
		$DeliveryName=$Info_DeliveryName[1];

		$Info_DeliveryAddress=explode('=',$decryptValues[20]);
		$DeliveryAddress=$Info_DeliveryAddress[1];

		$Info_DeliveryCity=explode('=',$decryptValues[21]);
		$DeliveryCity=$Info_DeliveryCity[1];

		$Info_DeliveryState=explode('=',$decryptValues[22]);
		$DeliveryState=$Info_DeliveryState[1];

		$Info_DeliveryZip=explode('=',$decryptValues[23]);
		$DeliveryZip=$Info_DeliveryZip[1];

		$Info_DeliveryCountry=explode('=',$decryptValues[24]);
		$DeliveryCountry=$Info_DeliveryCountry[1];


		$Info_DeliveryTel=explode('=',$decryptValues[25]);
		$DeliveryTel=$Info_DeliveryTel[1];

                $date=date("Y-m-d H:i:s");

		$Info_Merchant_Param1=explode('=',$decryptValues[26]);
        //$userid=$UserId=$Info_Merchant_Param1[1];
         $userid=$UserId=$uid;


            if($order_status==="Success")
			{
			$paymentdata=array('userid'=>$userid,'checkoutid'=>'0','orderid'=>$OrderId,'trakingid'=>$TrakingId,'bankrefno'=>$BankRefNo,'orderstatus'=>$OrderStatus,'failurestatus'=>$FailureMessage,'paymentmod'=>$PaymentMod,'cardname'=>$CardName,'statuscode'=>$StatusCode,'statusmessage'=>$StatusMessage,'currency'=>$Currency,'amount'=>$Amount,'billingname'=>$BillingName,'billingaddress'=>$BillingAddress,'billingcity'=>$BillingCity,'billingstate'=>$BillingState,'billingzip'=>$BillingZip,'billingcountry'=>$BillingCountry,'billingtel'=>$BillingTel,'billingemail'=>$BillingEmail,'deliveryname'=>$DeliveryName,'deliveryaddress'=>$DeliveryAddress,'deliverycity'=>$DeliveryCity,'deliverystate'=>$DeliveryState,'deliveryzip'=>$DeliveryZip,'deliverycountry'=>$DeliveryCountry,'deliverytel'=>$DeliveryTel,'status'=>'1','date'=>$date);
			$this->db->insert('sm_checkout',$paymentdata);

			$order=$this->db->where(array('ORDER_ID'=>$OrderId))->get('sm_order')->row();

			$plan=$order->ITEM_ID;
			$orddate=$order->DATE;
			$ordtime=$order->TIME;
			$paystatus=$order->PAYMENT_STATUS; //cross check
			$ordertotal=$order->TOTAL;// compare total with the amount recieved

			/*$membership_plan=$this->db->where(array('PLAN_ID'=>$plan))->get('membership_plan')->row();
			$planmonth=$membership_plan->VALID_MONTH;*/

			$lunrequest=$this->db->where(array('id'=>$plan))->get('lunch_event_date')->row();
			$luneventdate=$lunrequest->event_date;
			$luneventid=$lunrequest->event_id;

			$luneventtable=$this->db->where(array('id'=>$luneventid))->get('lunch_event')->row();
			$lunnameevent=$luneventtable->event_venue;
			$lunplaceevent==$luneventtable->address;

			$userdata=$this->db->where(array('USERID'=>$userid))->get('userlogin')->row();
			$fname=$userdata->FNAME;
			$mobile=$userdata->MOBILE;
			//$email=$userdata->EMAIL;
			$email=$this->sm_lib->getEmail($userid);


			//--------------------START code for the delivery and entry of codes-----------------------------------


			/*$expiry= date('Y-m-d', strtotime("+$planmonth months", strtotime("NOW")));
			$subscriptiondata=array('USER_ID'=>$userid,'USER_TYPE'=>'U','ORDER_ID'=>$OrderId, 'PLAN'=>$plan,'SUBSCRIPTION_TYPE'=>'MONTH','EXPIRY'=>$expiry, 'STATUS'=>'1','DATE'=>date('Y-m-d'),'TIME'=>date('H:i:s'));
			$this->db->insert('subscriptions',$subscriptiondata);*/


//--------------------Mailing and Messaging part is here

//Email Thanks you with order id & member ship details
//sms the same
//email invoice attached





			if($mobile!=''){
				$Tvariables = array();
				$Tvariables['ORDER_ID'] = $OrderId;
				$Tvariables['USER'] = $fname;
				$Tvariables['AMOUNT'] = $ordertotal;
				$Tvariables['EVENTURL'] = base_url().'events';

				$this->load->library('Netcore_lib');
				if (class_exists('Netcore_lib'))
					echo $this->netcore_lib->sendSms($mobile,$Tvariables,'SMS_AFTER_LUNCH');
			}




	$subject="Soulmate Cafe Successfull Order# $OrderId.";

				$Tvariables = array();
				$Tvariables['ORDER_ID'] = $OrderId;
				$Tvariables['USER'] = $fname;
				$Tvariables['AMOUNT'] = $ordertotal;
				$Tvariables['VENUE'] = $lunnameevent;
				$Tvariables['LUNCH_DATE'] = $luneventdate;
				$Tvariables['EVENTURL'] = base_url().'events';
				$Tvariables['TIMESTAMP'] = date('Y-m-d H:i:s');
				$Tvariables['EVENTNAME'] = $lunnameevent;
				$Tvariables['EVENTPLACE'] = $lunplaceevent;
				$Tvariables['MONTH'] = $planmonth;
				$Tvariables['LOGO'] = base_url() .'assets/images/newlogo.png';
				$Tvariables['CONTACTS'] = SM_CONTACTS ;
				$Tvariables['COMPANY_URL'] = SM_COMPANY_URL ;
				$Tvariables['COMPANY_NAME'] = SM_COMPANY_NAME ;



	 $this->netcore_lib->sendEmail($email,$subject,$Tvariables,'EMAIL_AFTER_LUNCH');


//--------------------------------------

		$updatedata=array('PAYMENT_STATUS'=>'DONE');
		$this->db->where('ORDER_ID',$OrderId);
		$this->db->update('sm_order',$updatedata);

		$updateuserdata=array('USER_TYPE'=>'U','USER_ID'=>$userid,'ORDER_ID'=>$OrderId,'DATE'=>$orddate,'TIME'=>$ordtime,'EVENT_ID'=>$luneventid,'EVENT_DATE_ID'=>$plan);
		$this->db->insert('events_request',$updateuserdata);

		/*$updateuserdata=array('SUBSCRIPTION_EXPIRY'=>$expiry,'PLAN'=>$plan,'MEMBERSHIP'=>'1');
		$this->db->where('USERID',$userid);
		$this->db->update('userlogin',$updateuserdata);*/

		$this->session->set_flashdata('pgresponse', 'Thank you! Payment Successful for thesoulmate Event detail has been sent to the registered email id and mobile no.');

			//-------------------------End code for delivery and entry of codes -----------------------------



			}
			else if($order_status==="Aborted")
			{
				$paymentdata=array('userid'=>$userid,'checkoutid'=>'1','orderid'=>$OrderId,'trakingid'=>$TrakingId,'bankrefno'=>$BankRefNo,'orderstatus'=>$OrderStatus,'failurestatus'=>$FailureMessage,'paymentmod'=>$PaymentMod,'cardname'=>$CardName,'statuscode'=>$StatusCode,'statusmessage'=>$StatusMessage,'currency'=>$Currency,'amount'=>$Amount,'billingname'=>$BillingName,'billingaddress'=>$BillingAddress,'billingcity'=>$BillingCity,'billingstate'=>$BillingState,'billingzip'=>$BillingZip,'billingcountry'=>$BillingCountry,'billingtel'=>$BillingTel,'billingemail'=>$BillingEmail,'deliveryname'=>$DeliveryName,'deliveryaddress'=>$DeliveryAddress,'deliverycity'=>$DeliveryCity,'deliverystate'=>$DeliveryState,'deliveryzip'=>$DeliveryZip,'deliverycountry'=>$DeliveryCountry,'deliverytel'=>$DeliveryTel,'status'=>'1','date'=>$date);
			$this->db->insert('sm_checkout',$paymentdata);
			$this->session->set_flashdata('pgresponse', 'The following items prevent your check-out. There was an issue with your payment');


			}
			else if($order_status==="Failure")
			{
				$paymentdata=array('userid'=>$userid,'checkoutid'=>'2','orderid'=>$OrderId,'trakingid'=>$TrakingId,'bankrefno'=>$BankRefNo,'orderstatus'=>$OrderStatus,'failurestatus'=>$FailureMessage,'paymentmod'=>$PaymentMod,'cardname'=>$CardName,'statuscode'=>$StatusCode,'statusmessage'=>$StatusMessage,'currency'=>$Currency,'amount'=>$Amount,'billingname'=>$BillingName,'billingaddress'=>$BillingAddress,'billingcity'=>$BillingCity,'billingstate'=>$BillingState,'billingzip'=>$BillingZip,'billingcountry'=>$BillingCountry,'billingtel'=>$BillingTel,'billingemail'=>$BillingEmail,'deliveryname'=>$DeliveryName,'deliveryaddress'=>$DeliveryAddress,'deliverycity'=>$DeliveryCity,'deliverystate'=>$DeliveryState,'deliveryzip'=>$DeliveryZip,'deliverycountry'=>$DeliveryCountry,'deliverytel'=>$DeliveryTel,'status'=>'1','date'=>$date);
			$this->db->insert('sm_checkout',$paymentdata);
			$this->session->set_flashdata('pgresponse', 'OPPS! Transaction has been declined.');


			}
			else
			{
				$paymentdata=array('userid'=>$userid,'checkoutid'=>'3','orderid'=>$OrderId,'trakingid'=>$TrakingId,'bankrefno'=>$BankRefNo,'orderstatus'=>$OrderStatus,'failurestatus'=>$FailureMessage,'paymentmod'=>$PaymentMod,'cardname'=>$CardName,'statuscode'=>$StatusCode,'statusmessage'=>$StatusMessage,'currency'=>$Currency,'amount'=>$Amount,'billingname'=>$BillingName,'billingaddress'=>$BillingAddress,'billingcity'=>$BillingCity,'billingstate'=>$BillingState,'billingzip'=>$BillingZip,'billingcountry'=>$BillingCountry,'billingtel'=>$BillingTel,'billingemail'=>$BillingEmail,'deliveryname'=>$DeliveryName,'deliveryaddress'=>$DeliveryAddress,'deliverycity'=>$DeliveryCity,'deliverystate'=>$DeliveryState,'deliveryzip'=>$DeliveryZip,'deliverycountry'=>$DeliveryCountry,'deliverytel'=>$DeliveryTel,'status'=>'1','date'=>$date);
				$this->db->insert('sm_checkout',$paymentdata);

			$this->session->set_flashdata('pgresponse', 'Security Error. Illegal access detected.');

			}


		//$rurl=$this->session->userdata('AFTERDEALPAY');
		redirect('/events');

		}


	//--------------Events Booking Process End---------------------




	public function dealorder()
	{
		//$rec_id=$this->uri->segment(2);
		if(isset($_POST['merchant_id']))
		{
			$txtqty = $this->input->post('txtqty');
			$order_id = $this->deal_order_id();
			$username	= $this->session->userdata('WEB_USERNAME');
			$this->load->library('session');
			//adding data to session
			$this->session->set_userdata('DEAL_CART',$order_id);
			$uid=$this->db->get_where('admin_user_login',array('USERNAME'=>$username))->row('USER_ID');
			$mid	= $this->input->post('merchant_id');
			$amount = 0;

			for($i=0;$i<$txtqty;$i++)
			{
				$did = $this->input->post('deal'.$i.'id');
				$qty = $this->input->post('deal'.$i.'qty');
				if($qty>0)
				{

				$price=$this->db->get_where('admin_deals',array('ID'=>$did))->row('PRICE');
				$amount=$amount+($qty*$price);
				$data = array(
					'USER_ID'=>$uid,
					'MER_ID'=>$mid,
					'DEAL_ID'=>$did,
					'ORDER_ID'=>$order_id,
					'QTY'=>$qty,
					'PRICE'=>$price,
					'SUB_TOTAL'=>$qty*$price,
					'DATE'=>date('Y-m-d'),
					'TIME'=>date('H:i:s'),
					'PAYMENT_STATUS'=>'REQUESTED'
					);

				$this->db->insert('admin_deal_order',$data);
				} //Inserted the selected deal for purchase

			}// closing of for loop for each deal entry

			$this->db->where('user_id',$uid);
		$this->db->where('default_address','Y');
		$address_count=$this->db->count_all_results('admin_user_address');

		if($address_count==1 and $address_count>0)
		{
			$data=array();
			$this->load->view('mylomart/deal_prepay',$data);
		}
		else
		{
			redirect(base_url().'addaddresspay_deal/'.$uid);
		}


		} //closing of if from submit chk
		else
		{
			$ses_dealcart=$this->session->userdata('DEAL_CART');
			$ses_prelogin_post=$this->session->userdata('DEAL_CART_PRELOGIN');

			if($ses_dealcart!='')
			{
					$username	= $this->session->userdata('WEB_USERNAME');
					$uid=$this->db->get_where('admin_user_login',array('USERNAME'=>$username))->row('USER_ID');
					$this->db->where('user_id',$uid);
					$this->db->where('default_address','Y');
					$address_count=$this->db->count_all_results('admin_user_address');

					if($address_count==1 and $address_count>0)
					{
						$data=array();
						$this->load->view('mylomart/deal_prepay',$data);
					}
					else
					{
						redirect(base_url().'addaddresspay_deal/'.$uid);
					}
			}
			else if($ses_prelogin_post['txtqty']!='')
			{
				$ses_prelogin_post;
				$this->session->unset_userdata('DEAL_CART_PRELOGIN');
				$txtqty = $ses_prelogin_post['txtqty'];
				$order_id = $this->deal_order_id();
				$username	= $this->session->userdata('WEB_USERNAME');
				$this->load->library('session');
				//adding data to session
				$this->session->set_userdata('DEAL_CART',$order_id);
				$uid=$this->db->get_where('admin_user_login',array('USERNAME'=>$username))->row('USER_ID');
				$mid	= $ses_prelogin_post['merchant_id'];
				$amount = 0;

				for($i=0;$i<$txtqty;$i++)
				{
					$did = $ses_prelogin_post['deal'.$i.'id'];
					$qty = $ses_prelogin_post['deal'.$i.'qty'];
					if($qty>0)
					{

					$price=$this->db->get_where('admin_deals',array('ID'=>$did))->row('PRICE');
					$amount=$amount+($qty*$price);
					$data = array(
						'USER_ID'=>$uid,
						'MER_ID'=>$mid,
						'DEAL_ID'=>$did,
						'ORDER_ID'=>$order_id,
						'QTY'=>$qty,
						'PRICE'=>$price,
						'SUB_TOTAL'=>$qty*$price,
						'DATE'=>date('Y-m-d'),
						'TIME'=>date('H:i:s'),
						'PAYMENT_STATUS'=>'REQUESTED'
						);

					$this->db->insert('admin_deal_order',$data);
					} //Inserted the selected deal for purchase

				}// closing of for loop for each deal entry

				$this->db->where('user_id',$uid);
				$this->db->where('default_address','Y');
				$address_count=$this->db->count_all_results('admin_user_address');

				if($address_count==1 and $address_count>0)
				{
					$data=array();
					$this->load->view('mylomart/deal_prepay',$data);
				}
				else
				{
					redirect(base_url().'addaddresspay_deal/'.$uid);
				}



			}
			else
			{

			$location=base_url().'deal';
			header('Location: '.$location.'');
			}
		} //if  not comming from form submition redirect to deal page

		/*$data1['record']=array($order_id,$uid,$amount);
			//$this->load->view('dealorder',$data1);
			//$this->load->view('dealorder/$order_id',$data1);
			$location=base_url().'dealorder/'.$order_id;
			header('Location: '.$location.'');	*/
	}

		function addaddresspay_deal()
		{
		$userid=$this->uri->segment(2);
		$data['record']=array($userid);
		$this->load->view('mylomart/addaddresspay_deal',$data);
		}


	function addnewpay_deal()
		{
		$userid=$this->uri->segment(2);
		//$res=$this->checklogin($userid);
		//Including validation library
		$this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="text-red">', '</p>');
		//Validating Name Field
		$this->form_validation->set_rules('name', 'Name',  'required|max_length[200]');
		$this->form_validation->set_rules('pin', 'Pincode',  'required|max_length[6]|min_length[6]|numeric');
		$this->form_validation->set_rules('contact', 'Mobile',  'required|max_length[10]|min_length[10]|numeric');
		$this->form_validation->set_rules('address', 'Address',  'required');
		$this->form_validation->set_rules('city', 'City',  'required');
		$this->form_validation->set_rules('state', 'State',  'required');
		if($this->form_validation->run() == FALSE)
			{
			$userid=$this->uri->segment(2);
			$data['record']=array($userid);
			$this->load->view('mylomart/addaddresspay_deal',$data);
			}
			else
			{
			$this->load->model('homemodel');
			$this->homemodel->addnew($userid);

			redirect(base_url().'dealorder/'.$userid.'');
			}
		}

	function addresspay_deal()
		{
		$userid=$this->uri->segment(2);
		//$res=$this->checklogin($userid);
		$address=$this->db->get_where('admin_user_address',array('user_id'=>$userid,'STATUS'=>'1'));
		$data['record']=array($address);
		$this->load->view('mylomart/addresspay_deal',$data);
		}


	function order_id()
		{
		$this->load->helper('string');
		$orderid="MYLOOS".date('YmdHis').strtoupper(random_string('alnum',10));
		$count=$this->db->where('ORDER_ID',$orderid)->count_all_results('admin_manage_cart');
		if($count>0)
			{
			$this->order_id();
			}
			else
			{
			return $orderid;
			}

		}

	function deal_order_id()
		{
		$this->load->helper('string');
		$orderid="MYLODL".date('YmdHis').strtoupper(random_string('alnum',10));
		$count=$this->db->where('ORDER_ID',$orderid)->count_all_results('admin_deal_order');
		if($count>0)
			{
			$this->deal_order_id();
			}
			else
			{
			return $orderid;
			}

		}
	public function mail_deal_mer($data)
	{
		extract($data);



			$subject="Deal sale Details | MYCP Order# $order_id.";
				$Tvariables = array();
				$Tvariables['order_id'] = $order_id;
				$Tvariables['what_you_get'] = $what_you_get;
				$Tvariables['valid_till'] = date("d-m-Y",strtotime($valid_till));
				$Tvariables['code'] = $code;
				$Tvariables['valid_on'] = $valid_on;
				$Tvariables['f_name'] = ucfirst($f_name);
				$Tvariables['to_email'] = $to_email;
				$Tvariables['ddt'] = $ddt;
				$Tvariables['merchant_details'] = $merchant_details;
				$Tvariables['how_to_use'] = $how_to_use;
				$Tvariables['thing_to_rem'] = $thing_to_rem;
				$Tvariables['PLATFORM'] = 'Website';
				$Tvariables['CONTACT'] = '011-41327328';
				if(ENVIRONMENT == 'production' )
	if($mer_email!='' && $mer_email!='na@gmail.com' && $mer_email!='na@mail.com'  ){
	$this->load->library('Netcore_lib');
	$this->netcore_lib->sendEmail($mer_email,$subject,$Tvariables,'EMAIL_DEAL_MER');
	}

	/* 		$from="MyLoMart <support@MyLoMart.com>";
			$dev="azadhussain16@yahoo.in";
			$admin="vedshukla@gmail.com";

			$header = 'MIME-Version: 1.0' . "\r\n";
			$header .= "Content-type:text/html; charset=iso-8859-1\r\n";
			$header .= "".'From:'." ".$from."\r\n";
			$header .= "".'Cc:'." ".$admin."\r\n";
			$header .= "".'BCc:'." ".$dev."\r\n";
			$header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";

		mail($mer_email, $subject, $mailbody, $header); */
		//mail('azadhussain16@yahoo.in', "DEAL COPY:-".$subject, $mailbody, $header);
	//	mail('vedshukla@gmail.com', "DEAL Admin Copy:-".$subject, $mailbody, $header);

	}




	function encrypt($plainText,$key)
		{
		error_reporting(0);
		$secretKey = $this->hextobin(md5($key));
		$initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
	  	$openMode = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '','cbc', '');
	  	$blockSize = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, 'cbc');
		$plainPad = $this->pkcs5_pad($plainText, $blockSize);
	  	if (mcrypt_generic_init($openMode, $secretKey, $initVector) != -1)
		{
		      $encryptedText = mcrypt_generic($openMode, $plainPad);
	      	      mcrypt_generic_deinit($openMode);

		}
		return bin2hex($encryptedText);
		}

	function decrypt($encryptedText,$key)
		{
		$secretKey = $this->hextobin(md5($key));
		$initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
		$encryptedText=$this->hextobin($encryptedText);
	  	$openMode = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '','cbc', '');
		mcrypt_generic_init($openMode, $secretKey, $initVector);
		$decryptedText = mdecrypt_generic($openMode, $encryptedText);
		$decryptedText = rtrim($decryptedText, "\0");
	 	mcrypt_generic_deinit($openMode);
		return $decryptedText;

		}

	//*********** Padding Function *********************

	 function pkcs5_pad ($plainText, $blockSize)
		{
		$pad = $blockSize - (strlen($plainText) % $blockSize);
		return $plainText . str_repeat(chr($pad), $pad);
		}

	//********** Hexadecimal to Binary function for php 4.0 version ********

	function hextobin($hexString)
   	 	{
        	$length = strlen($hexString);
        	$binString="";
        	$count=0;
        	while($count<$length)
        	{
        	    $subString =substr($hexString,$count,2);
        	    $packedString = pack("H*",$subString);
        	    if ($count==0)
		    {
			$binString=$packedString;
		    }

		    else
		    {
			$binString.=$packedString;
		    }

		    $count+=2;
        	}
  	        return $binString;
    	  	}

}
