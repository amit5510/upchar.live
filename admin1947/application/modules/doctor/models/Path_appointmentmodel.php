<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Path_appointmentmodel extends CI_Model
{ 
	public function get_path_test($limit='10',$offset='0',$param=array())
	{	
		$keyword 			= $this->db->escape_str($this->input->get('keyword',TRUE));
		$city_name 			= $this->db->escape_str($this->input->get('city_name',TRUE));
		$pathlab_id 		= $this->db->escape_str($this->input->get('pathlab_id',TRUE));
		
		if($pathlab_id!='')
		{
			$this->db->where("path_lab_test.path_lab_id",$pathlab_id);
		
			if($keyword!='')
			{
				$this->db->where("(pathtest.test_name LIKE '%".$keyword."%' )");
			}
			$this->db->order_by('pathtest.test_id','desc');
			$this->db->select('SQL_CALC_FOUND_ROWS pathtest.*',FALSE);
			$this->db->join('path_lab_test','path_lab_test.test_id = pathtest.test_id');
			$this->db->group_by('pathtest.test_id');
			$result = $this->db->get('pathtest')->result_array();
			$result = ($limit=='1') ? @$result[0]: $result;	
			return $result;
		}
		else
		{
			return array();
		}
	}
	
	public function get_booking($limit='10',$offset='0',$param=array())
	{		
		$booking_id 		= @$param['booking_id'];
		//echo "<pre>"; print_r($booking_id); die;
		$date_from 			= $this->db->escape_str($this->input->get_post('date_from',TRUE));
		$date_to 			= $this->db->escape_str($this->input->get_post('date_to',TRUE));	
		$paient_name 		= $this->db->escape_str($this->input->get_post('paient_name',TRUE));
		
		if($paient_name!='')
		{
			$this->db->where("(path_book.patient_name LIKE '%".$paient_name."%' )");
		}
	    if($booking_id!='')
		{
			$this->db->where("booking_id",$booking_id);
		}
		
		if($date_from!='')
		{
			$this->db->where('book_date >=', $date_from);
		}
		if($date_to!='')
		{
			$this->db->where('book_date <=', $date_to);
		}
		$this->db->order_by('booking_id','desc');
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS path_book.*,pathlab.name as pathlab_name,master_city.name as city_name',FALSE);
		$this->db->join('pathlab','pathlab.id=path_book.pathlab_id','left');
		$this->db->join('master_city','master_city.id=pathlab.city','left');
		$result = $this->db->get('path_book')->result();
		$result = ($limit=='1') ? @$result[0]: $result;	
		return $result;
	}
	
	public  function get_booking_test($page=array())
	{
		if( is_array($page) && !empty($page) )
		{	
			$this->db->select('path_book_test.*');
			$result =  $this->db->get_where('path_book_test',$page)->result_array();

			if( is_array($result) && !empty($result) )
			{
				return $result;
			}
		}
	}
	
	public  function pathlab_list($page=array())
	{
		if( is_array($page) && !empty($page) )
		{	
			$this->db->select('id,name');
			$result =  $this->db->get_where('pathlab',$page)->result_array();

			if( is_array($result) && !empty($result) )
			{
				return $result;
			}
		}
	}
	
	public  function test_list($page=array())
	{
		if( is_array($page) && !empty($page) )
		{	
			$this->db->select('path_lab_test.*,pathtest.test_name,pathtest.short_name,pathtest.method,pathtest.amount');
			$this->db->group_by('path_lab_test.test_id'); 
			$this->db->join('pathtest','pathtest.test_id=path_lab_test.test_id');
   			$result = $this->db->get_where('path_lab_test',$page)->result_array();
			if( is_array($result) && !empty($result) )
			{
				return $result;
			}
		}
	}
	
	public  function get_city($page=array())
	{		
		if( is_array($page) && !empty($page) )
		{	
			$this->db->select('id,name');
			$result =  $this->db->get_where('master_city',$page)->result_array();

			if( is_array($result) && !empty($result) )
			{
				return $result;
			}
		}
	}
	function delete_booking($booking_id)
    {
       $this->db->query("delete from path_book where booking_id='".$booking_id."'");
	   $this->db->query("delete from path_book_test where booking_id='".$booking_id."'");
    }
	public  function get_locality($page=array())
	{		
		if( is_array($page) && !empty($page) )
		{	
			$this->db->select('id,city_id,name');
			$result =  $this->db->get_where('master_locality',$page)->result_array();

			if( is_array($result) && !empty($result) )
			{
				return $result;
			}
		}
	}


	
}