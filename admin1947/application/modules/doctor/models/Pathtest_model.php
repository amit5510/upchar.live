<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pathtest_model extends CI_Model
{ 
	public function get_path_category($limit='10',$offset='0',$param=array())
	{		
		$category_id			=   @$param['category_id'];
		
		$keyword 		= $this->db->escape_str($this->input->get_post('keyword',TRUE));
		if($category_id!='')
		{	
			$this->db->where("path_category.category_id",$category_id);
		}
		if($keyword!='')
		{
			$this->db->where("(category_name LIKE '%".$keyword."%' )");
		}
		$this->db->order_by('category_id','desc');
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS path_category.*',FALSE);
		$result = $this->db->get('path_category')->result();
		$result = ($limit=='1') ? @$result[0]: $result;	
		return $result;
	}
	
	function deleterecord($id)
	{
		$this->db->query("delete from path_category where category_id='".$id."'");
	}
	
	public function categoryinsert()
	{
		$data	=	array(
						'category_name'		=>$this->input->post('category_name'),
						'creat_date'		=>date('Y-m-d h:i:s'),
						'created_by'		=>getUserId(),
						);
		$this->db->insert('path_category',$data);
		$category_id = $this->db->insert_id();
		return $category_id;
	}
	public function updatecategory($category_id)
	{	
		$data	=array(
						'category_name'	=>$this->input->post('category_name'),
						'status'		=>$this->input->post('status'),
						'creat_date'	=>date('Y-m-d h:i:s'),
						'created_by'	=>getUserId(),
					);
		$this->db->where('category_id',$category_id);
		$this->db->update('path_category',$data);
		return $category_id;
	}
	
	public function get_path_unit($limit='10',$offset='0',$param=array())
	{		
		$unit_id			=   @$param['unit_id'];
		
		$keyword 		= $this->db->escape_str($this->input->get_post('keyword',TRUE));
		if($unit_id!='')
		{	
			$this->db->where("path_unit.unit_id",$unit_id);
		}
		if($keyword!='')
		{
			$this->db->where("(unit_name LIKE '%".$keyword."%' )");
		}
		$this->db->order_by('unit_id','desc');
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS path_unit.*',FALSE);
		$result = $this->db->get('path_unit')->result();
		$result = ($limit=='1') ? @$result[0]: $result;	
		return $result;
	}
	
	function unitrecord($id)
	{
		$this->db->query("delete from path_unit where unit_id='".$id."'");
	}
	
	public function unitinsert()
	{
		$data	=	array(
						'unit_name'		=>$this->input->post('unit_name'),
						'creat_date'		=>date('Y-m-d h:i:s'),
						'created_by'		=>getUserId(),
						);
		$this->db->insert('path_unit',$data);
		$unit_id = $this->db->insert_id();
		return $unit_id;
	}
	public function updateunit($unit_id)
	{	
		$data	=array(
						'unit_name'		=>$this->input->post('unit_name'),
						'status'		=>$this->input->post('status'),
						'creat_date'	=>date('Y-m-d h:i:s'),
						'created_by'	=>getUserId(),
					);
		$this->db->where('unit_id',$unit_id);
		$this->db->update('path_unit',$data);
		return $unit_id;
	}
	
	public function get_test($limit='10',$offset='0',$param=array())
	{	
		$test_id	= @$param['test_id'];
		$title 		= $this->db->escape_str($this->input->get('title',TRUE));
	
		if($test_id!='')
		{
			$this->db->where("test_id",$test_id);
		}
	    if($title!='')
		{
			$this->db->where("(title LIKE '%".$title."%' )");
		}
		$this->db->order_by('test_id','desc');
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS pathtest.*,pathlab.name as pathlab_name,path_category.category_name',FALSE);
		$this->db->join('pathlab','pathlab.id=pathtest.path_id','left');
		$this->db->join('path_category','path_category.category_id=pathtest.category_id','left');
		$result = $this->db->get('pathtest')->result_array();
		$result = ($limit=='1') ? @$result[0]: $result;	
		return $result;
	}
	
	public function get_test_parameter($limit='10',$offset='0',$param=array())
	{		
		$test_id					= @$param['test_id'];
		$test_parameter_id			= @$param['test_parameter_id'];
		$keyword 			= $this->db->escape_str($this->input->get_post('keyword',TRUE));
		if($test_id!='')
		{	
			$this->db->where("path_test_parameter.test_id",$test_id);
		}
		if($test_parameter_id!='')
		{	
			$this->db->where("path_test_parameter.test_parameter_id",$test_parameter_id);
		}
		if($keyword!='')
		{
			$this->db->where("(parameter_name LIKE '%".$keyword."%' )");
		}
		$this->db->order_by('test_parameter_id','desc');
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS path_test_parameter.*,path_parameter.*,path_unit.unit_name',FALSE);
		$this->db->join('path_parameter','path_parameter.parameter_id=path_test_parameter.parameter_id','left');
		$this->db->join('path_unit','path_unit.unit_id=path_parameter.unit_id','left');
		$result = $this->db->get('path_test_parameter')->result();
		$result = ($limit=='1') ? @$result[0]: $result;	
		return $result;
	}
	
	public function insert_test_parameter($test_id)
	{	
		$data	=array(
						'test_id'			=>$test_id,
						'parameter_id'		=>$this->input->post('parameter_id'),
						'status'			=>'1',
						'creat_date'		=>date('Y-m-d h:i:s'),
						'created_by'		=>getUserId(),
					);
		$test_parameter_id = $this->db->insert('path_test_parameter',$data);
		return $test_parameter_id;
	}
	
	function test_parameter_delete($id)
	{
		$this->db->query("delete from path_test_parameter where test_parameter_id='".$id."'");
	}
	
	public  function path_category($page=array())
	{		
		if( is_array($page) && !empty($page) )
		{	
			$this->db->select('category_id,category_name');
			$result =  $this->db->get_where('path_category',$page)->result_array();
			if( is_array($result) && !empty($result) )
			{
				return $result;
			}
		}
	}
	
	public  function get_paramete_row($page=array())
	{		
		if( is_array($page) && !empty($page) )
		{	
			$this->db->select('path_parameter.*,path_unit.unit_name');
			$this->db->join('path_unit','path_unit.unit_id=path_parameter.unit_id','left');
			$result =  $this->db->get_where('path_parameter',$page)->result_array();
			if( is_array($result) && !empty($result) )
			{
				return $result;
			}
		}
	}

	public  function path_parameter_all($page=array())
	{		
		if( is_array($page) && !empty($page) )
		{	
			$this->db->select('*');
				
			$result =  $this->db->get_where('path_parameter',$page)->result_array();
			if( is_array($result) && !empty($result) )
			{
				return $result;
			}
		}
	}
	
	public  function get_pathlab($page=array())
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
	
	public function test_insert()
	{
		$data	=	array(
						'category_id'		=>$this->input->post('category_id'),
						'path_id'			=>$this->input->post('path_id'),
						'test_name'			=>$this->input->post('test_name'),
						'short_name'		=>$this->input->post('short_name'),
						'test_type'			=>$this->input->post('test_type'),
						'sub_category'		=>$this->input->post('sub_category'),
						'method'			=>$this->input->post('method'),
						'report_day'		=>$this->input->post('report_day'),
						'charge_category'	=>$this->input->post('charge_category'),
						'code'				=>$this->input->post('code'),
						'amount'			=>$this->input->post('amount'),
						'status'			=>$this->input->post('status'),
						'approved'			=>$this->input->post('approved'),
						'creat_date'		=>date('Y-m-d h:i:s'),
						);
		$this->db->insert('pathtest',$data);
		$test_id = $this->db->insert_id();
		return $test_id;
	}
	
	public function update($test_id)
	{	
		$data	=array(
						'category_id'		=>$this->input->post('category_id'),
						'path_id'			=>$this->input->post('path_id'),
						'test_name'			=>$this->input->post('test_name'),
						'short_name'		=>$this->input->post('short_name'),
						'test_type'			=>$this->input->post('test_type'),
						'sub_category'		=>$this->input->post('sub_category'),
						'method'			=>$this->input->post('method'),
						'report_day'		=>$this->input->post('report_day'),
						'charge_category'	=>$this->input->post('charge_category'),
						'code'				=>$this->input->post('code'),
						'amount'			=>$this->input->post('amount'),
						'status'			=>$this->input->post('status'),
						'approved'			=>$this->input->post('approved'),
						'creat_date'		=>date('Y-m-d h:i:s'),
					);
		$this->db->where('test_id',$test_id);
		$this->db->update('pathtest',$data);
		return $test_id;
	}
	
	public  function get_unit_all($page=array())
	{		
		if( is_array($page) && !empty($page) )
		{
			$this->db->select('unit_id,unit_name');
			$result =  $this->db->get_where('path_unit',$page)->result_array();
			if( is_array($result) && !empty($result) )
			{
				return $result;
			}
		}
	}
	
	public function get_path_parameter($limit='10',$offset='0',$param=array())
	{		
		$parameter_id			=   @$param['parameter_id'];
		
		$keyword 		= $this->db->escape_str($this->input->get_post('keyword',TRUE));
		if($parameter_id!='')
		{	
			$this->db->where("path_parameter.parameter_id",$parameter_id);
		}
		if($keyword!='')
		{
			$this->db->where("(parameter_name LIKE '%".$keyword."%' )");
		}
		$this->db->order_by('parameter_id','desc');
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS path_parameter.*,path_unit.unit_name',FALSE);
		$this->db->join('path_unit','path_unit.unit_id=path_parameter.unit_id','left');
		$result = $this->db->get('path_parameter')->result();
		$result = ($limit=='1') ? @$result[0]: $result;	
		return $result;
	}
	
	function parameterrecord($id)
	{
		$this->db->query("delete from path_parameter where parameter_id='".$id."'");
	}
	
	public function parameterinsert()
	{
		$data	=	array(
						'parameter_name'			=>$this->input->post('parameter_name'),
						'reference_range'			=>$this->input->post('reference_range'),
						'unit_id'					=>$this->input->post('unit_id'),
						'description'				=>$this->input->post('description'),
						'creat_date'				=>date('Y-m-d h:i:s'),
						'created_by'				=>getUserId(),
						);
		$this->db->insert('path_parameter',$data);
		$parameter_id = $this->db->insert_id();
		return $parameter_id;
	}
	public function updateparameter($unit_id)
	{	
		$data	=array(
						'parameter_name'			=>$this->input->post('parameter_name'),
						'reference_range'			=>$this->input->post('reference_range'),
						'unit_id'					=>$this->input->post('unit_id'),
						'description'				=>$this->input->post('description'),
						'status'					=>$this->input->post('status'),
						'creat_date'				=>date('Y-m-d h:i:s'),
						'created_by'				=>getUserId(),
					);
		$this->db->where('parameter_id',$parameter_id);
		$this->db->update('path_parameter',$data);
		return $parameter_id;
	}
	
}