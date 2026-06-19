<?php  defined('BASEPATH') OR exit('No direct script access allowed');  
class UserAuth {// extends CI_Controller {  

private $CI;

    function __construct()
    {
        $this->CI =& get_instance();
		$this->CI->load->config('access');
        
    }

	
public function accessCheck()  
    {  
	
		$access_admin_module =  $this->CI->config->item('access_admin_module');
		$access_center_module =  $this->CI->config->item('access_center_module');
		$access_subcenter_module =  $this->CI->config->item('access_subcenter_module');
		$access_agency_module =  $this->CI->config->item('access_agency_module');
		
		$access_admin_controller =  $this->CI->config->item('access_admin_controller');
		$access_center_controller =  $this->CI->config->item('access_center_controller');
		$access_subcenter_controller =  $this->CI->config->item('access_subcenter_controller');
		$access_agency_controller =  $this->CI->config->item('access_agency_controller');
		
		$access_public_controller =  $this->CI->config->item('access_public_controller');
		
		$usertype = $this->CI->session->userdata('code');
		
		$module     =  $this->CI->router->fetch_module();
		$controller =  $this->CI->router->fetch_class();
		$method     =  $this->CI->router->fetch_method();
		
		$msg="<div class='alert alert-danger'><strong>Access Denied!</strong>You Do not have sufficient previlage to view the requested page.You can Navigate from here.</div>";
		
		if($usertype == ''){
			if(  !in_array($controller,$access_public_controller)  )
				redirect(base_url().'login');
			
			
		}else if($usertype == 'A'){
			
			if( !in_array($controller,$access_admin_controller) && !in_array($controller,$access_public_controller) && !in_array($module,$access_admin_module)  ){
			
				$this->CI->session->set_flashdata('flashmsg',$msg);
				redirect(base_url().'masters/dashboard');
			}
			
		}else if($usertype == 'C'){
			
			if( !in_array($controller,$access_center_controller) && !in_array($controller,$access_public_controller)  && !in_array($module,$access_center_module)  ){
				
				$this->CI->session->set_flashdata('flashmsg',$msg);
				redirect(base_url().'ccenter/dashboard');
			}
			
		}else if($usertype == 'SC'){
			
			if( !in_array($controller,$access_subcenter_controller) && !in_array($controller,$access_public_controller)  && !in_array($module,$access_subcenter_module)  ){
				
				$this->CI->session->set_flashdata('flashmsg',$msg);
				redirect(base_url().'sccenter/dashboard');
			}
			
		}else if($usertype == 'AG'){
			
			if( !in_array($controller,$access_subcenter_controller) && !in_array($controller,$access_public_controller)  && !in_array($module,$access_agency_module)  ){
				
				$this->CI->session->set_flashdata('flashmsg',$msg);
				redirect(base_url().'agency/dashboard');
			}
		}
		

    }  
	
	
}