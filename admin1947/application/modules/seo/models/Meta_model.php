<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Meta_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
   
	public function get_meta($limit='10',$offset='0',$param=array())
	{		
		$meta_id 		= $this->db->escape_str($this->input->get_post('meta_id',TRUE));
		$meta_title 	= $this->db->escape_str($this->input->get_post('meta_title',TRUE));
		
		if($meta_title!='')
		{
			$this->db->where("(meta_title LIKE '%".$meta_title."%' )");
		}
		
		$this->db->order_by('meta_id','desc');
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS meta_tags.*',FALSE);
		$result = $this->db->get_where('meta_tags', array('meta_id'))->result();
		return $result;
	}
	
	public function get_meta_by_id($faq_id)
	{
		$this->db->select('*');
		$this->db->from('meta_tags');
		$this->db->where('faq_id',$faq_id);
		$result =$this->db->get()->result_rows();
		return $result;
	}
}
// model end here