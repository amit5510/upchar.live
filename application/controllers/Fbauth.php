<?php defined('BASEPATH') OR exit('No direct script access allowed');
	ob_start();
class Fbauth extends CI_Controller
{
    function __construct() {
		parent::__construct();
		// Load user model
		$this->load->library('session');
		// Load user model
		$this->load->model('socialmodel');
		$this->load->library('facebook');
	
    }
    
    public function index(){
		ob_start();session_start();
		/* ini_set("display_errors", 1);
ini_set("track_errors", 1);
ini_set("html_errors", 1);
error_reporting(E_ALL); */
	/* 
		// Include the facebook api php libraries
		include_once APPPATH."libraries/facebook-api/facebook.php";
		
		// Facebook API Configuration
		echo $appId = '1808180522731808';
		$appSecret = '40864333037b0e28f934f9d473a6c9c4';
		$redirectUrl = base_url() . 'Fbauth';
		$fbPermissions = 'email';
		
		//Call Facebook API
		$facebook = new Facebook(array(
		  'appId'  => $appId,
		  'secret' => $appSecret
		
		));
		$fbuser = $facebook->getUser(); */
		$fbuser = $this->facebook->is_authenticated();
		
        if ($fbuser) {
			//$userProfile =  $facebook->api('/me?fields=id,first_name,last_name,email,gender,locale,picture');
			$userProfile  = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');
            // Preparing data for database insertion
			$userData['oauth_provider'] = 'facebook';
			$userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['first_name'];
            $userData['last_name'] = $userProfile['last_name'];
            $userData['email'] = $userProfile['email'];
			$userData['gender'] = $userProfile['gender'];
			$userData['locale'] = $userProfile['locale'];
            $userData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
            $userData['picture_url'] = $userProfile['picture']['data']['url'];
			if(strtoupper($userData['gender'])=='MALE')
				$sex='M';
			else
				$sex='F';
			// Insert or update user data
            $userID = $this->socialmodel->checkUser($userData['oauth_uid'],$userData['first_name'],$userData['last_name'],$userData['email'],'FB',$sex,'','');//$userData);
            if(!empty($userID)){
                $data['userData'] = $userData;
				
				$this->session->set_userdata('userid', $userID);
                $this->session->set_userdata('useremail', $userData['email']);
                $this->session->set_userdata('username', $userData['first_name']);
				
				/* $this->session->set_userdata('SM_USEREMAIL',$userData['email']);
                $this->session->set_userdata('SM_FBID',$userData['oauth_uid']);
                $this->session->set_userdata('SM_UID',$userID); 
				
				//$this->socialmodel->checkrpofile($userID);*/
				
                //$this->session->set_userdata('userData',$userData);
				$pagelogin=$this->session->userdata('last_page');  
				//$location=''.base_url().''.$pagelogin.'';	
				$location=''.$pagelogin.'';	
				header('Location: '.$location.'');	
            } 
			else 
			{
               $data['userData'] = array();
			   
			  // $this->socialmodel->checkrpofile($uid);
			   
			   $pagelogin=$this->session->userdata('last_page');  
			
				$location=''.base_url().''.$pagelogin.'';	
				header('Location: '.$location.'');	
            }
        } 
		else 
		{
			$fbuser = '';
            //$location = $facebook->getLoginUrl(array('redirect_uri'=>$redirectUrl,'scope'=>$fbPermissions));
            $location = $this->facebook->login_url();//$facebook->getLoginUrl(array('redirect_uri'=>$redirectUrl,'scope'=>$fbPermissions));
			
			header('Location: '.$location.'');
        }
		//$this->load->view('social/fb',$data);
    }
	
	public function logout() {
		$this->session->unset_userdata('userData');
		$this->session->unset_userdata('SM_FBID');
		$this->session->unset_userdata('SM_UID');
		$this->session->unset_userdata('SM_USEREMAIL');
        $this->session->sess_destroy();
		redirect('/Fbauth');
    }
	
	
}
