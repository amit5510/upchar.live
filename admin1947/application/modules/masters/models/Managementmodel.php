<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Managementmodel extends CI_Model
{
	public function insert()
	{	//echo "<pre>"; print_r($_POST); die;
	
		$data 	= array(
						'added_date'		=> date('Y-m-d h:i:s'),
						'module_name' 		=> $this->input->post('management'),
						'section_id' 		=> $this->input->post('section_id'),
						'parent_id' 		=> $this->input->post('section_id'),
						'module_folder' 	=> $this->input->post('module_folder'),
						'module_controller' => $this->input->post('module_controller'),
						'module_action' 	=> $this->input->post('module_action'),
						'module_icon' 		=> $this->input->post('module_icon'),
						);
		$r=$this->db->insert('master_management',$data);
		return (!$r) ? false : true;
	}
	 
	public function edit($id)
	{
		$data 	= array(
						'modify_date'		=> date('Y-m-d h:i:s'),
						'module_name' 		=> $this->input->post('management'),
						'section_id' 		=> $this->input->post('section_id'),
						'parent_id' 		=> $this->input->post('section_id'),
						'module_folder' 	=> $this->input->post('module_folder'),
						'module_controller' => $this->input->post('module_controller'),
						'module_action' 	=> $this->input->post('module_action'),
						'module_icon' 		=> $this->input->post('module_icon'),
						);
		$this->db->where('module_id',$id);
		$r=$this->db->update('master_management',$data);
		return (!$r) ? false : true;
	}
	
	public function delete($uid)
	{
		$this->db->where('module_id',$uid);
		$r=$this->db->delete('master_management');
		return (!$r) ? false : true;
	}
	
	public function status($uid)
	{
		$status=$this->db->get_where('master_management',array('module_id'=>$uid))->row('isStatus');
		if($status==1)
		{
			$data=array('isStatus'=>0);
			$this->db->where('module_id',$uid);
			$this->db->update('master_management',$data);
			echo "Hide";
		}
		else{
			$data=array('isStatus'=>1);
			$this->db->where('module_id',$uid);
			$this->db->update('master_management',$data);
			echo "Show";
		}
		
	}
	
	public function update_status($table,$auto_field='id')
	{		
		$current_controller    = $this->router->fetch_class();
		$action                = $this->input->post('status_action',TRUE);	
	    $arr_ids               = $this->input->post('arr_ids',TRUE);
		$category_count        = $this->input->post('category_count',TRUE);
		$product_count         = $this->input->post('product_count',TRUE);	
		
		if( is_array($arr_ids) )
		{
			$str_ids = implode(',', $arr_ids);
			if($action=='Activate')
			{				
				
				foreach($arr_ids as $k=>$v )
				{
					$total_category  = ( $category_count!='' ) ?  count_category("AND parent_id='$v' AND status='1'")     : '0';
					$total_product   = ( $product_count!='' )  ?  count_products("AND category_id='$v' AND status='1'")   : '0';
					if( $total_category>0 || $total_product > 0 )
					{
						$this->session->set_userdata(array('msg_type'=>'danger'));
						$this->session->set_flashdata('danger',lang('child_to_deactivate'));

					}
					else
					{
						$data = array('status'=>'1');
						$where = "$auto_field ='$v'";					
						$this->managementmodel->safe_update($table,$data,$where,FALSE);											
						$this->session->set_userdata(array('msg_type'=>'success'));
						$this->session->set_flashdata('success','Record A Successfully');
					}	
				}
			}
			  
			if($action=='Deactivate')
			{	  
				foreach($arr_ids as $k=>$v )
				{
					$total_category  = ( $category_count!='' ) ?  count_category("AND parent_id='$v' AND status='1'")     : '0';
					$total_product   = ( $product_count!='' )  ?  count_products("AND category_id='$v' AND status='1'")   : '0';

					if( $total_category>0 || $total_product > 0 )
					{
						$this->session->set_userdata(array('msg_type'=>'danger'));
						$this->session->set_flashdata('danger',lang('child_to_deactivate'));
					}
					else
					{
						$data = array('status'=>'0');
						$where = "$auto_field ='$v'";					
						$data = $this->managementmodel->safe_update($table,$data,$where,FALSE);
						//echo "<pre>"; print_r($data); die;
						$this->session->set_userdata(array('msg_type'=>'success'));
						$this->session->set_flashdata('success','Record Deactivate Successfully');
				    }
				}	
			}
			  
			if($action=='Delete')
			{
				foreach($arr_ids as $k=>$v )
				{

					$total_category  = ( $category_count!='' ) ?  count_category("AND parent_id='$v' AND status='1'")     : '0';
					$total_product   = ( $product_count!='' )  ?  count_products("AND category_id='$v' AND status='1'")   : '0';
					if( $total_category>0 || $total_product > 0 )
					{
						$this->session->set_userdata(array('msg_type'=>'danger'));
						$this->session->set_flashdata('danger',lang('child_to_delete'));

					}
					else
					{
						$where = array($auto_field=>$v);
						$this->managementmodel->safe_delete($table,$where,TRUE);
						$this->session->set_userdata(array('msg_type'=>'success'));
						$this->session->set_flashdata('success','Record Delete Successfully');

					}
				}	
			}			
			
			if($action=='Tempdelete')
			{	
			  			 
				$data = array('status'=>'2');
				$where = "$auto_field IN ($str_ids)";
				$this->managementmodel->safe_update($table,$data,$where,FALSE);
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',lang('deleted'));	
			}				 			
        }
		redirect($_SERVER['HTTP_REFERER'], '');
	}
	
	public function safe_update($table,$data=array(),$where,$debug=FALSE)
	{	 
		if($table!="" && is_array($data) && !empty($data) && $where!="" )
		{
			$qstr = $this->db->update_string($table, $data, $where);
			$this->db->query($qstr);
			if ( $debug )
			{ 
				echo  $this->db->last_query(); 
				
			}
		}
	}
	public function safe_delete($table,$data=array(),$debug=FALSE)
	{	
		if($table!="" && is_array($data) && !empty($data) )
		{
			$this->db->delete($table,$data);
			if($debug)
			{ 
				$this->db->last_query(); 				
			}
		}
	}

	
}