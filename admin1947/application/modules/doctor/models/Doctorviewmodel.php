<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Doctorviewmodel extends CI_Model
{
	public function updatedoctor($id)
	{
	   $date=date('Y-m-d h:i:s');
		
		$city=$this->input->post('city');
		$fname=$this->input->post('t_fname');
		$lname=$this->input->post('t_lname');
		$gender=$this->input->post('gender');
		$regno=$this->input->post('regno');
		$council=$this->input->post('council');
		$year=$this->input->post('year');
		$exp=$this->input->post('exprience');
		$achievement=$this->input->post('achievement');
		$about=$this->input->post('about');
		$package=$this->input->post('package');
		
		$email=$this->input->post('email');
		$mobile=$this->input->post('mobile');
		$status=$this->input->post('status');
	
	
			
		$data=array('fname'=>$fname,'lname'=>$lname,'gender'=>$gender,'city'=>$city,'regd_no'=>$regno,'regd_council'=>$council,'regd_year'=>$year,'exp'=>$exp,'achievement'=>$achievement,'mobile'=>$mobile,'email'=>$email,'about'=>$about,'subscription'=>$package,'approved'=>'1','verified'=>'1','status'=>$status,'creat_date'=>$date,'created_by'=>getUserId(),'source'=>'A');
		$this->db->where('id');
		$this->db->update('profile_dr',$data);
	}
				
	public function get_doctor($limit='10',$offset='0',$param=array())
	{	
		$id			= @$param['id'];
		$keyword 	= $this->db->escape_str($this->input->get('keyword',TRUE));
		$mobile 	= $this->db->escape_str($this->input->get('mobile',TRUE));
		$city_name 	= $this->db->escape_str($this->input->get('city_name',TRUE));
	
		if($id!='')
		{
			$this->db->where("id",$id);
		}
		
		if($keyword!='')
		{
			$this->db->where("(fname LIKE '%".$keyword."%' )");
		}
		if($mobile!='')
		{
			$this->db->where("mobile",$mobile);
		}
		if($city_name!='')
		{
			$this->db->where("city",$city_name);
		}
		$this->db->order_by('id','desc');
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS profile_dr.*',FALSE);
		//$this->db->join('hospitallogin','hospitallogin.USERID = hospital.uid','left');
		$result = $this->db->get('profile_dr')->result_array();
		$result = ($limit=='1') ? @$result[0]: $result;	
		return $result;
	}
	
	public function get_doctor_list($param=array())
	{	
		$id			= @$param['id'];
		$keyword 	= $this->db->escape_str($this->input->get('keyword',TRUE));
		$mobile 	= $this->db->escape_str($this->input->get('mobile',TRUE));
		$city_name 	= $this->db->escape_str($this->input->get('city_name',TRUE));
	
		if($id!='')
		{
			$this->db->where("id",$id);
		}
		
		if($keyword!='')
		{
			$this->db->where("(fname LIKE '%".$keyword."%' )");
		}
		if($mobile!='')
		{
			$this->db->where("mobile",$mobile);
		}
		if($city_name!='')
		{
			$this->db->where("city",$city_name);
		}
		$this->db->order_by('id','desc');
		$this->db->select('SQL_CALC_FOUND_ROWS profile_dr.*',FALSE);
		$result = $this->db->get('profile_dr')->result_array();
		return $result;
	}

    public function deletedoctor($id)
	{
		return $this->db->query("
		 DELETE t1.*, t2.*
		  FROM profile_dr t1, doctorlogin t2 
		   WHERE t1.user_id = t2.USERID 
				AND t1.id = '".$id."'");

	}
}