<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Hospital_bed_model extends CI_Model
{	    
	public function get_hospital_bed($limit='10',$offset='0',$param=array())
	{	
		$hospital_bed_id	= @$param['hospital_bed_id'];
		$title 		= $this->db->escape_str($this->input->get('title',TRUE));
	
		if($hospital_bed_id!='')
		{
			$this->db->where("hospital_bed_id",$hospital_bed_id);
		}
	    if($title!='')
		{
			$this->db->where("(hospital.name LIKE '%".$title."%' )");
		}
		$this->db->order_by('hospital_bed_id','desc');
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS hospital_bed.*,hospital.name',FALSE);
		$this->db->join('hospital','hospital.id=hospital_bed.hospital_id','left');
		$result = $this->db->get('hospital_bed')->result_array();
		$result = ($limit=='1') ? @$result[0]: $result;	
		return $result;
	}
	
	public  function hospital_list($page=array())
	{
		if( is_array($page) && !empty($page) )
		{	
			$this->db->select('id,name');
			$result =  $this->db->get_where('hospital',$page)->result_array();

			if( is_array($result) && !empty($result) )
			{
				return $result;
			}
		}
	}
	
	
	public function hospital_bed_insert()
	{		
		$data=array(
					'hospital_id'	=>$this->input->post('hospital_id'),
					'bed_type'		=>$this->input->post('bed_type'),
					'total_bed'		=>$this->input->post('total_bed'),
					'occupied_bed'	=>$this->input->post('occupied_bed'),
					'comment'		=>$this->input->post('comment'),
					'status'		=>$this->input->post('status'),
					'creat_date'	=>date('Y-m-d h:i:s')
				   );
	    $this->db->insert('hospital_bed',$data);
	    return ($this->db->affected_rows() != 1) ? false : true;
	}


    public function update_package($hospital_bed_id)
	{	
		$data=array(
					'hospital_id'	=>$this->input->post('hospital_id'),
					'bed_type'		=>$this->input->post('bed_type'),
					'total_bed'		=>$this->input->post('total_bed'),
					'occupied_bed'	=>$this->input->post('occupied_bed'),
					'comment'		=>$this->input->post('comment'),
					'status'		=>$this->input->post('status'),
					'modified_date'	=>date('Y-m-d h:i:s')
				   );
        $this->db->where('hospital_bed_id',$hospital_bed_id);
		$this->db->update('hospital_bed',$data);
        return $qq;
	}
}