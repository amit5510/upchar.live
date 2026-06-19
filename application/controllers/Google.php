<?php defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(E_ALL);
		//ini_set('display_errors', 1);
class Google extends CI_Controller
{
    function __construct() {
		parent::__construct();
		$this->load->library('session');
		// Load user model
		$this->load->model('socialmodel');
    }
    
    public function index(){
		// Include the google api php libraries
		include_once APPPATH."libraries/google-api-php-client/Google_Client.php";
		include_once APPPATH."libraries/google-api-php-client/contrib/Google_Oauth2Service.php";
		
		// Google Project API Credentials
		$clientId = '989640585624-rgl4jthic534315ujm2fggfisp622vug.apps.googleusercontent.com';
        $clientSecret = 'HnF6zWHyh9yvTo6keWv3wgXr';
        $redirectUrl = base_url() . 'Google';
		
		// Google Client Configuration
        $gClient = new Google_Client();
        $gClient->setApplicationName('Upcharr');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectUrl);
        $google_oauthV2 = new Google_Oauth2Service($gClient);

        if (isset($_REQUEST['code'])) {
            $gClient->authenticate();
            $this->session->set_userdata('token', $gClient->getAccessToken());
            redirect($redirectUrl);
        }

        $token = $this->session->userdata('token');
        if (!empty($token)) {
            $gClient->setAccessToken($token);
        }

        if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();
            // Preparing data for database insertion
			$userData['oauth_provider'] = 'google';
			$userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['given_name'];
            $userData['last_name'] = $userProfile['family_name'];
            $userData['email'] = $userProfile['email'];
			$userData['gender'] = @$userProfile['gender'];
			$userData['locale'] = $userProfile['locale'];
            $userData['profile_url'] = $userProfile['link'];
            $userData['picture_url'] = $userProfile['picture'];
			if(strtoupper($userData['gender'])=='MALE')
				$sex='M';
			else
				$sex='F';
			
			// Insert or update user data
            $userID = $this->socialmodel->checkUser($userData['oauth_uid'],$userData['first_name'],$userData['last_name'],$userData['email'],'GOOGLE',$sex,'','');//$userData);
            if(!empty($userID))
			{
                $data['userData'] = $userData;
				
				$this->session->set_userdata('userid', $userID);
                $this->session->set_userdata('useremail', $userData['email']);
                $this->session->set_userdata('username', $userData['first_name']);
               
			   /* $this->session->set_userdata('WEB_USERNAME',$userData['email']);
                $this->session->set_userdata('WEB_GID',$userData['oauth_uid']); */
				$pagelogin=$this->session->userdata('last_page');  
				//$location=''.base_url().''.$pagelogin.'';	
				$location=''.$pagelogin.'';	
				header('Location: '.$location.'');	
            } 
			else 
			{
				$location=''.base_url();
               $data['userData'] = array();
			   header('Location: '.$location.'');	
            }
        } 
		else 
		{
            //$data['authUrl'] = $gClient->createAuthUrl();
            $location = $gClient->createAuthUrl();
			header('Location: '.$location.'');
        }
		//$this->load->view('social/index',$data);
		
    }
	
	public function logout() {
		$this->session->unset_userdata('token');
		$this->session->unset_userdata('userData');
        $this->session->sess_destroy();
		redirect('/Google');
    }
}
