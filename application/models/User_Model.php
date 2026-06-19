<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends CI_Model {
    
    public function changepass($userid){
		$this -> db -> select(' * ');
        $this -> db -> from('userlogin');
        $this -> db -> where('USERID', $userid);        
		//$this -> db -> or_where('MOBILE', $mobile);
        $this -> db -> where('STATUS', '1');
        $this -> db -> where('APPROVED', '1');
        $this -> db -> limit(1);
        $query = $this -> db -> get();
		if($query -> num_rows() > 0)
        {			
			$row = $query->row();
			if($row->STATUS==1){
			$newpass=$this->input->post('pass');
				$this->db->where('USERID',$userid)->set('PASSWORD',md5($newpass))->update('userlogin');
				return 'SUCCESS';
			}
			else {
				return 'FAILED';
			}
        }
        else
        {
            return 'INVALID';
        }
	}
	
    public function forgotpass($mobile){
		$this -> db -> select(' * ');
        $this -> db -> from('userlogin');
        $this -> db -> where('EMAIL', $mobile);        
		$this -> db -> or_where('MOBILE', $mobile);
        //$this -> db -> where('STATUS', '1');
       // $this -> db -> where('APPROVED', '1');
        $this -> db -> limit(1);
        $query = $this -> db -> get();//echo  $this->db->last_query();
		if($query -> num_rows() > 0)
        {			
			$row = $query->row();
			//if($row->STATUS==1)
			//{
                
			
			
				$otp=rand(100000,999999);
				$this->db->where('USERID',$row->USERID)->set('OTP',$otp)->update('userlogin');
				$this->session->set_userdata('forgotuserid', $row->USERID);
				//$msg="Dear ".$row->FNAME.",OTP to change password is $otp UPCHAR";
				$msg="Your One Time Password is $otp WWW.UPCHARR.COM";
				sendsms($msg,$row->MOBILE);
				return 'SUCCESS';
			/*}
			else 
			{
				return 'FAILED';
			}*/
        }
        else
        {
            return 'INVALID';
        }
	}
	
	public function resendotp($mobile)
	{
		$this -> db -> select(' * ');
        $this -> db -> from('userlogin');
		$this->db->group_start();
        $this -> db -> where('EMAIL', $mobile);        
		$this -> db -> or_where('MOBILE', $mobile);
		$this -> db -> group_end();
       // $this -> db -> where('STATUS', '1');
        $this -> db -> where('APPROVED', '1');
        $this -> db -> limit(1);
        $query = $this -> db -> get();//echo  $this->db->last_query();
		if($query -> num_rows() > 0)
        {			
			$row = $query->row();//echo $row->OTP;
			if($row->OTP!= null ||$row->OTP!= ''){
                
			
			
				$otp=$row->OTP;
				//$otp=rand(100000,999999);
				//$this->db->where('USERID',$row->USERID)->set('OTP',$otp)->update('userlogin');
				//$this->session->set_userdata('forgotuserid', $row->USERID);
				//$msg="Dear ".$row->FNAME.",Your One Time Password is $otp UPCHAR";
				$msg="Your One Time Password is $otp WWW.UPCHARR.COM";
				sendsms($msg,$row->MOBILE);
				return 'SUCCESS';
			}
			else {
				return 'FAILED';
			}
        }
        else
        {
            return 'INVALID';
        }
	}
	 
    public function login($email,$password){
		$this -> db -> select(' * ');
        $this -> db -> from('userlogin');
        $this -> db -> where('EMAIL', $email);        
		$this -> db -> or_where('MOBILE', $email);
        $this -> db -> where('PASSWORD', $password);
       // $this -> db -> where('STATUS', '1');
        $this -> db -> where('APPROVED', '1');
        $this -> db -> limit(1);
        $query = $this -> db -> get();//echo  $this->db->last_query();
		if($query -> num_rows() > 0)
        {			
			$row = $query->row();
            if($row->STATUS==1){
                $this->session->set_userdata('userid', $row->USERID);
                $this->session->set_userdata('useremail', $row->EMAIL);				           
				$this->session->set_userdata('username', $row->FNAME);
           
			if($row->CART!=''){
				$cartArray = unserialize($row->CART);
				$this->cart->insert($cartArray);
			}
			$this->load->model('Cart_Model');
			$this->Cart_Model->update_cart_db();
			return 'SUCCESS';
			}
			else if($row->STATUS==0){
				$otp=rand(100000,999999);
				$this->db->where('USERID',$row->USERID)->set('OTP',$otp)->update('userlogin');
				$this->session->set_userdata('signupuserid', $row->USERID);
				//$msg="Dear ".$name[0].",Thank you for registration, Verification OTP is $otp UPCHAR";
				$msg="Your One Time Password is $otp WWW.UPCHARR.COM";
				sendsms($msg,$row->MOBILE);
				return 'OTP';
			}
			else if($row->STATUS==2){
				return 'BLOCKED';
			}
        }
        else
        {
            return 'FAILED';
        }
	}
	
	public function verifysignupotp($userid,$otp){
		$this -> db -> select(' * ');
        $this -> db -> from('userlogin');
        $this -> db -> where('USERID', $userid);        
		$this -> db -> where('OTP', $otp);
		$this -> db -> where('STATUS', '0');
       // $this -> db -> where('APPROVED', '1');
        $this -> db -> limit(1);
        $query = $this -> db -> get();//echo  $this->db->last_query();
		if($query -> num_rows() > 0)
        {			
			$row = $query->row();
            if($row->OTP==$otp){
				$this->db->where('USERID',$userid)->set('STATUS','1')->set('OTP',null)->update('userlogin');
                $this->session->set_userdata('userid', $row->USERID);
                $this->session->set_userdata('useremail', $row->EMAIL);				           
				$this->session->set_userdata('username', $row->FNAME);
           
			if($row->CART!=''){
				$cartArray = unserialize($row->CART);
				$this->cart->insert($cartArray);
			}
			$this->load->model('Cart_Model');
			$this->Cart_Model->update_cart_db();
			return 'SUCCESS';
			}
			else {
				return 'FAILED';
			}
        }
        else
        {
            return 'FAILED';
        }
	}
	
	public function verifyforgototp($userid,$otp){
		$this -> db -> select(' * ');
        $this -> db -> from('userlogin');
        $this -> db -> where('USERID', $userid);        
		$this -> db -> where('OTP', $otp);
		//$this -> db -> where('STATUS', '0');
       // $this -> db -> where('APPROVED', '1');
        $this -> db -> limit(1);
        $query = $this -> db -> get();//echo  $this->db->last_query();
		if($query -> num_rows() > 0)
        {			
			$row = $query->row();
            if($row->OTP==$otp){
				$this->db->where('USERID',$userid)->set('STATUS','1')->update('userlogin');
               /*  $this->session->set_userdata('userid', $row->USERID);
                $this->session->set_userdata('useremail', $row->EMAIL);				           
				$this->session->set_userdata('username', $row->FNAME); */
           
			/* if($row->CART!=''){
				$cartArray = unserialize($row->CART);
				$this->cart->insert($cartArray);
			}
			$this->load->model('Cart_Model');
			$this->Cart_Model->update_cart_db(); */
			return 'SUCCESS';
			}
			else {
				return 'FAILED';
			}
        }
        else
        {
            return 'FAILED';
        }
	}
	
	public function register(){
		$email=strtolower(trim($this->input->post('email')));
		
		$mobile=trim($this->input->post('mobile'));
		$countemail=$this->db->where('EMAIL',$email)->count_all_results('userlogin');
		$countmobile=$this->db->where('MOBILE',$mobile)->count_all_results('userlogin');
		if($countemail > 0  && $email!='')
		{
			$response=array('status'=>'failed','msg'=>'Email Id Already Registered, Reset Your Password if You Forgotten ! ');
		}
		else if($countmobile > 0 && $mobile!='')
		{
			$response=array('status'=>'failed','msg'=>'Mobile No. Already Registered, Reset Your Password if You Forgotten ! ');
		}
		else if($mobile!='' || $email!='')
		{
			$pass=md5($this->input->post('password'));
			$name=$this->input->post('name');
			$name=explode(' ',ucwords($name));
			$fname=$name[0];
			$lname=@$name[1];
			$otp=rand(100000,999999);
			//$msg="Dear ".$name[0].",Thank you for registration, Verification OTP is $otp UPCHAR";
			$msg="Your One Time Password is $otp WWW.UPCHARR.COM";
			sendsms($msg,$mobile);
			$udata=array(
					'PASSWORD'=>$pass,
					'FNAME'=>$fname,
					'LNAME'=>$lname,
					
					'STATUS'=>'0',
					'APPROVED'=>'1',
					'OTP'=>$otp,
					'REG_DATE'=>date('Y-m-d'),
					'GENDER'=>'M'
					); 
			if($email)
			$udata['EMAIL']=$email;
			if($mobile)
			$udata['MOBILE']=$mobile;
			if($this->db->insert('userlogin',$udata))
			{   
				$thisid = $this->db->insert_id();
				$this->session->set_userdata('signupuserid', $thisid);
			
				$response=array('status'=>'success','msg'=>'Registration Successful, Please Verify Email!');
			}
			else
			{
				$response=array('status'=>'failed','msg'=>'Something Went Wrong, Please Retry! ');
			}
		}else{
				$response=array('status'=>'failed','msg'=>'Please Enter atleast any one either Email id or Mobile');
		}
		return $response;
	}
	
	function logout(){
		$this->cart->destroy();
		$this->session->sess_destroy();
	}
	
	public function get_appointment_details($appointment_id)
	{				
	    if($appointment_id!='')
		{
			$this->db->where("appointment_id",$appointment_id);
		}
		$this->db->select('profile_dr.fname,profile_dr.email as dr_email,hospital.name,appointment.*');
		$this->db->join('profile_dr','profile_dr.id=appointment.doctor_id');
		$this->db->join('hospital','hospital.uid=appointment.institute_id');
		$result = $this->db->get_where('appointment', array('appointment_id'))->row_array();
		return $result;
	}
	
    public function update_profile($userid){
		$this -> db -> select(' * ');
        $this -> db -> from('userlogin');
        $this -> db -> where('USERID', $userid);        
		$this -> db -> where('STATUS', '1');
        $this -> db -> where('APPROVED', '1');
        $this -> db -> limit(1);
        $query = $this -> db -> get();//echo  $this->db->last_query();
		if($query -> num_rows() > 0)
        {	
			
			$name=$this->input->post('name');
			$mobile=$this->input->post('mobile');
			$email=$this->input->post('email');
			$dob=$this->input->post('dob');
			$gender=$this->input->post('gender');
			$bgroup=$this->input->post('bgroup');
			$height=$this->input->post('height');
			$weight=$this->input->post('weight');
			$imagename=$this->input->post('imagename');
			$imagestring=$this->input->post('imagestring');

			if($email){	
					$this -> db -> where('USERID !=', $userid); 
					$this -> db -> where('EMAIL', $email);	
					$query2 = $this -> db -> get('userlogin');
					$countemail=$query2 -> num_rows();
					if($countemail)
						return 'EMAIL';
			}
			if($mobile){	
					$this -> db -> where('USERID !=', $userid); 
					$this -> db -> where('MOBILE', $mobile);	
					$query3 = $this -> db -> get('userlogin');
					$countmobile=$query3 -> num_rows();
					if($countmobile)
						return 'MOBILE';
			}
                
			

				if($mobile)		
					$this -> db -> set('MOBILE', $mobile);
				if($email)		
					$this -> db -> set('EMAIL', $email);
				if($gender)		
					$this -> db -> set('GENDER', $gender);
				if($dob)		
					$this -> db -> set('DOB', $dob);
				if($bgroup)		
					$this -> db -> set('BGROUP', $bgroup);
				if($height)		
					$this -> db -> set('HEIGHT', $height);
				if($weight)		
					$this -> db -> set('WEIGHT', $weight);
				if($name){		
					$this -> db -> set('FNAME', $name);
					$this -> db -> set('LNAME', '');
				}
				if($imagestring !='' )
				{	
					$binary = base64_decode($imagestring);
					$uploads_dir='assets/userimages/';
					$finalimagename   = date('YmdHis') . rand(10, 99) . $imagename;
					file_put_contents($uploads_dir . $finalimagename, $binary);
					$this -> db -> set('PROFILEIMG', $finalimagename);
				}
				
				$res=$this->db->where('USERID',$userid)->update('userlogin');
				last_query();
				if($res)		
					return 'SUCCESS';
				else
					return 'FAILED';
			
        }
        else
        {
            return 'INVALID';
        }
	}
	

	
	
}