<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Careermodel extends CI_Model
{       
	public function get_career($limit='10',$offset='0',$param=array())
	{	
		$id			= @$param['id'];
		$keyword 	= $this->db->escape_str($this->input->get('keyword',TRUE));
		if($id!='')
		{
			$this->db->where("career_id",$id);
		}
		if($keyword!='')
		{
			$this->db->where("(name LIKE '%".$keyword."%' )");
		}
		$this->db->order_by('career_id','desc');
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS career.*',FALSE);
		$result = $this->db->get('career')->result_array();
		
		//echo "<pre>"; print_r($result); die;
		$result = ($limit=='1') ? @$result[0]: $result;	
		return $result;
	}  
}