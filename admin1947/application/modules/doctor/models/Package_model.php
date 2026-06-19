<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Package_model extends CI_Model
{	    
	public function get_package($limit='10',$offset='0',$param=array())
	{	
		$package_id	= @$param['package_id'];
		$title 		= $this->db->escape_str($this->input->get('title',TRUE));
	
		if($package_id!='')
		{
			$this->db->where("package_id",$package_id);
		}
	    if($title!='')
		{
			$this->db->where("(title LIKE '%".$title."%' )");
		}
		$this->db->order_by('package_id','desc');
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS package.*,hospital.name',FALSE);
		$this->db->join('hospital','hospital.id=package.hospital_id','left');
		$result = $this->db->get('package')->result_array();
		//echo "<pre>"; print_r($result); die;
		$result = ($limit=='1') ? @$result[0]: $result;	
		return $result;
	}
	
	public function package_insert($drimage='')
	{		
		$date 			= date('Y-m-d h:i:s');
		$title			= $this->input->post('title');	
		$video_url		= $this->input->post('video_url');
		$type 			= $this->input->post('type');
		$status 		= $this->input->post('status');
		$approved 		= $this->input->post('approved');
		$description 	= $this->input->post('description');
 
		$data=array(
					'title'			=>$title,
					'video_url'		=>$video_url,
					'description'	=>$description,
					'image'			=>$drimage,
					'status'		=>$status,
					'approved'		=>$approved,
					'creat_date'	=>$date
				   );
			
	    $this->db->insert('package',$data);
	    return ($this->db->affected_rows() != 1) ? false : true;
	}


	
    public function package_duplicacy_check()
	{	
		$title			= $this->input->post('title');
		$title_count 	= $this->db->where('title',$title)->count_all_results('package');
		if($title_count ==0)
			return 'OK';
		else
			return 'title';
	}

    public function update_package($id,$picture)
	{
        $date 			=date('Y-m-d h:i:s');
		$title			=$this->input->post('title');	
		$amount			=$this->input->post('amount');	
		$video_url		=$this->input->post('video_url');
		$status 		=$this->input->post('status');
		$approved 		=$this->input->post('approved');
		$description 	=$this->input->post('description');

		$data=array(
					'title'			=>$title,
					'amount'		=>$amount,
					'video_url'		=>$video_url,
					'description'	=>$description,
					'image'			=>$picture,
					'status'		=>$status,
					'approved'		=>$approved,
					'creat_date'	=>$date
				   );
        $this->db->where('package_id',$id);
		$this->db->update('package',$data);
        return $qq;
	}
}