<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Socialmodel extends CI_Model{
	
	function __construct() {
		parent::__construct();
		//$this->load->library('Sm_lib');
		$this->col = 'GUID';
	}
	
	public function checkUser($suid,$fname,$lname,$email,$social,$sex='M',$profile='',$image='')
	{
		if(is_null ( $image ))
		{
			$image='';
		}
		
		
		if($social=='GOOGLE')
		{
			$this->col = 'GUID';
			$sos='GOOGLE';
		}
		else if($social=='FB')
		{	
			$this->col = 'FBUID';
			$sos='FACEBOOK';
		}
		else if($social=='LINKEDIN')
		{	
			$this->col = 'LUID';
			$sos='LINKEDIN';
		}
		
		$this->db->where($this->col,$suid);
		$countsuser=$this->db->count_all_results('userlogin');
		
		if ($countsuser==0) 
		{
			// if new fb user to mycp. 
			$this->db->where('EMAIL',$email);
			$countsuser=$this->db->count_all_results('userlogin');
			if ($countsuser==0) 
			{
				// if new fb 
				$udata=array($this->col=>$suid,'FNAME'=>$fname,'LNAME'=>$lname,'EMAIL'=>$email,'STATUS'=>'1','REG_DATE'=>date('Y-m-d'),'GENDER'=>$sex);      /*  print_r($udata); */   
				if($social == 'LINKEDIN')
				{	
					$udata['PROFILEIMG']=$image;
					$udata['LPROFILE']=$profile;
				}
				$this->db->insert('userlogin',$udata);
				$sm_uid = $this->db->insert_id();
				//$this->mail_registration($email,$fname,$sm_uid);
				
				/* ---------$mycp_uid = $this->db->insert_id();
				
				$ulogindata=array('USER_ID'=>$mycp_uid,$this->col=>$suid,'USERNAME'=>$email,'STATUS'=>'1','DATE'=>date('Y-m-d'));            
				$this->db->insert('admin_user_login',$ulogindata);
				
				$this->mail_registration($sos);------------- */
				
				
			}
			else
			{
				// if new fb user but existing mycp user. 
				$ulogindata=array($this->col=>$suid,'STATUS'=>'1');   
				if($social == 'LINKEDIN')
				{	
					$ulogindata['PROFILEIMG']=$image;
					$ulogindata['LPROFILE']=$profile;
				}				
				$this->db->where('EMAIL',$email);
				$this->db->update('userlogin',$ulogindata);
				
				$sm_uid=$this->db->select('USERID')->where('EMAIL',$email)->get_where('userlogin',array('STATUS'=>'1'))->row('USERID');
				
			}
		} 
		else 
		{
			
			
				if($social == 'LINKEDIN')
				{	
					$ulogindata['PROFILEIMG']=$image;
					$ulogindata['LPROFILE']=$profile;
					$this->db->where('EMAIL',$email);
				$this->db->update('userlogin',$ulogindata);
				}				
				
				
			$sm_uid=$this->db->select('USERID')->where('EMAIL',$email)->get_where('userlogin',array('STATUS'=>'1'))->row('USERID');
			// If Returned user . update the user record		
			//$query = "UPDATE admin_user SET F_NAME='$ffname', EMAIL='$femail' where Fuid='$fuid'";
			//mysql_query($query);
			
		}
		$userID=$sm_uid;
		return $userID?$userID:FALSE;
    }
	
	
	public function checkrpofile($uid){
		$already=$this->db->where('userid',$uid)->count_all_results('userprofile');
		if($already == 0 )
			redirect('registration');
			
		
	}
	
/* 	public	function mail_registration($email,$name,$id)
		{
			
				$subject='Welcome to TheSoulMates';
		
				$Tvariables = array();
				$Tvariables['USER'] = $name;
				$Tvariables['LOGO'] = base_url() .'assets/images/newlogo.png';
				$Tvariables['base_url'] = base_url();
				$Tvariables['register'] = base_url().'load/registration/'.$this->sm_lib->getUserToken($id);
				$Tvariables['LUNCH_URL'] = 'http://www.thesoulmates.in/lunchevent';
				$Tvariables['CONTACTS'] = SM_CONTACTS ;
				$Tvariables['COMPANY_URL'] = SM_COMPANY_URL ;
				$Tvariables['COMPANY_NAME'] = SM_COMPANY_NAME ;
				$Tvariables['UNSUBSCRIBE'] = 'http://www.thesoulmates.in/unsubscribe/'.base64_encode('U').'/'.base64_encode($id);
				
				
				$this->load->library('Netcore_lib');
				$this->netcore_lib->sendEmail($email,$subject,$Tvariables,'EMAIL_AFTER_SOCIALLOGIN');
			
		} */
	
	
}
