<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pathdoctoruser_Model extends CI_Model {
    
    public function changepass($userid){
		$this -> db -> select(' * ');
        $this -> db -> from('pathdoctorlogin');
        $this -> db -> where('USERID', $userid);        
		//$this -> db -> or_where('MOBILE', $mobile);
        $this -> db -> where('STATUS', '1');
        $this -> db -> where('APPROVED', '1');
        $this -> db -> limit(1);
        $query = $this -> db -> get();//echo  $this->db->last_query();
		if($query -> num_rows() > 0)
        {			
			$row = $query->row();
			if($row->STATUS==1){
                
			
			$newpass=$this->input->post('pass');
				$this->db->where('USERID',$userid)->set('PASSWORD',md5($newpass))->update('pathdoctorlogin');
				//$this->session->set_userdata('drforgotuserid', $row->USERID);
				
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
        $this -> db -> from('pathdoctorlogin');
        $this -> db -> where('EMAIL', $mobile);        
		$this -> db -> or_where('MOBILE', $mobile);
        //$this -> db -> where('STATUS', '1');
       // $this -> db -> where('APPROVED', '1');
        $this -> db -> limit(1);
        $query = $this -> db -> get();//echo  $this->db->last_query();
		if($query -> num_rows() > 0)
        {			
			$row = $query->row();
			if($row->STATUS==1){
                
			
			
				$otp=rand(100000,999999);
				$this->db->where('USERID',$row->USERID)->set('OTP',$otp)->update('pathdoctorlogin');
				$this->session->set_userdata('drforgotuserid', $row->USERID);
				$msg="Dear ".$row->FNAME.",
	 OTP to change password is $otp
	UPCHARR";
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
	
	public function resendotp($mobile){
		$this -> db -> select(' * ');
        $this -> db -> from('pathdoctorlogin');
        $this -> db -> where('EMAIL', $mobile);        
		$this -> db -> or_where('MOBILE', $mobile);
       // $this -> db -> where('STATUS', '1');
        $this -> db -> where('APPROVED', '1');
        $this -> db -> limit(1);
        $query = $this -> db -> get();//echo  $this->db->last_query();
		if($query -> num_rows() > 0)
        {			
			$row = $query->row();
			if($row->OTP!= null ||$row->OTP!= ''){
                
			
			
				$otp=$row->OTP;
				//$otp=rand(100000,999999);
				//$this->db->where('USERID',$row->USERID)->set('OTP',$otp)->update('pathdoctorlogin');
				//$this->session->set_userdata('drforgotuserid', $row->USERID);
				$msg="Dear ".$row->FNAME.",
	 Your One Time Password is $otp
	UPCHARR";
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
        $this -> db -> from('pathdoctorlogin');
        $this -> db -> where('EMAIL', $email);        $this -> db -> or_where('MOBILE', $email);
        $this -> db -> where('PASSWORD', $password);
       // $this -> db -> where('STATUS', '1');
        $this -> db -> where('APPROVED', '1');
        $this -> db -> limit(1);
        $query = $this -> db -> get();//echo  $this->db->last_query();
		if($query -> num_rows() > 0)
        {			
			$row = $query->row();
            if($row->STATUS==1){
                $this->session->set_userdata('druserid', $row->USERID);
                $this->session->set_userdata('druseremail', $row->EMAIL);				           
				$this->session->set_userdata('drusername', $row->FNAME);
           
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
				$this->db->where('USERID',$row->USERID)->set('OTP',$otp)->update('pathdoctorlogin');
				$this->session->set_userdata('drsignupuserid', $row->USERID);
				$msg="Wecome to Upchar medical solutions. Your otp is $otp
thank you for being a part of Upchar.";
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
        $this -> db -> from('pathdoctorlogin');
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
				$this->db->where('USERID',$userid)->set('STATUS','1')->set('OTP',null)->update('pathdoctorlogin');//last_query();die;
                $this->session->set_userdata('druserid', $row->USERID);
                $this->session->set_userdata('druseremail', $row->EMAIL);				           
				$this->session->set_userdata('drusername', $row->FNAME);
           
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
        $this -> db -> from('pathdoctorlogin');
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
				$this->db->where('USERID',$userid)->set('OTP',null)->set('STATUS','1')->update('pathdoctorlogin');
               /*  $this->session->set_userdata('druserid', $row->USERID);
                $this->session->set_userdata('druseremail', $row->EMAIL);				           
				$this->session->set_userdata('drusername', $row->FNAME); */
           
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
		$countemail=$this->db->where('EMAIL',$email)->count_all_results('pathdoctorlogin');
		$countmobile=$this->db->where('MOBILE',$mobile)->count_all_results('pathdoctorlogin');
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
			$fullname=$this->input->post('name');
			$name=explode(' ',ucwords($fullname));
			$fname=$name[0];
			$lname=@$name[1];
			$otp=rand(100000,999999);
			$msg="Dear ".$name[0].", Wecome to Upcharr medical solutions. Your otp is $otp
thank you for being a part of Upchar.";
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
			if($this->db->insert('pathdoctorlogin',$udata))
			{  
				$thisid = $this->db->insert_id();
				
				$this->db->insert('pathdoctor',array('user_id'=>$thisid,'fname'=>$fullname,'email'=>$email,'mobile'=>$mobile,'verified'=>'0','approved'=>'0','status'=>'0'));//last_query();die;
				$this->session->set_userdata('drsignupuserid', $thisid);
			
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
}