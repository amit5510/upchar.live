<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Usercreatemodel extends CI_Model{
	
	
	
	public function checkusername()
	{
			$username=$this->input->post('userid');
			$this->db->where('username',$username);
			$count = $this->db->count_all_results('login');
			return ($count) ?  false : true;
	}
	public function usercreateinsert()
	{
			$date=date('Y-m-d h:i:s');
			
			$username=$this->input->post('username');
			$usermobile=$this->input->post('usermobile');
			$userdob=$this->input->post('userdob');
			$activeradio=$this->input->post('activeradio');
			$useraddress=$this->input->post('useraddress');
			$useremail=$this->input->post('useremail');
			$userrole=$this->input->post('userrole');
			$userid=$this->input->post('userid');
			$pwd=md5($this->input->post('resetpassword'));
			
			$data=array(
						'username'	=>$userid,
						'password'	=>$pwd,
						'role'		=>$userrole,
						'name'		=>$username,
						'address'	=>$useraddress,
						'dob'		=>$userdob,
						'mobile'	=>$usermobile,
						'email'		=>$useremail,
						'status'	=>$activeradio,
						'permisions'=>$date);
			//echo "<pre>";print_r($data);die;
			$this->db->insert('login',$data);
			
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	
	public function usercreateedit($id)
	{		
			$username=$this->input->post('username');
			$usermobile=$this->input->post('usermobile');
			$userdob=$this->input->post('userdob');
			$activeradio=$this->input->post('activeradio');
			$useraddress=$this->input->post('useraddress');
			$useremail=$this->input->post('useremail');
			$userrole=$this->input->post('userrole');
			$userid=$this->input->post('userid');
			
			$pwdtemp=$this->input->post('resetpassword');
			if($pwdtemp=='' || $pwdtemp==null)
			{
				$pwd=$this->db->get_where('login',array('id'=>$id))->row('password');
			}
			else{
				$pwd=md5($this->input->post('resetpassword'));
			}
			
			$data =  array( 'password' 	=>$pwd,
							'role'		=>$userrole,
							'name'		=>$username,
							'address'	=>$useraddress,
							'dob'		=>$userdob,
							'mobile'	=>$usermobile,
							'email'		=>$useremail,
							'status'	=>$activeradio,
							'permisions'=>$date
						);
			//echo "<pre>"; print_r($data); die;
			$this->db->where('id',$id);
			$r=$this->db->update('login',$data);
			return (!$r) ? false : true;
	}
	
	public function usermoddelete($uid)
	{
		$this->db->where('id',$uid);
		$r=$this->db->delete('login');
		return (!$r) ? false : true;
	}
	
	
	
}