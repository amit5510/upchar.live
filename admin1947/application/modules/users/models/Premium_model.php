<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Premium_model extends CI_Model
{	    
	public function get_premium($limit='10',$offset='0',$param=array())
	{	
		$premium_id	= @$param['premium_id'];
		$title 		= $this->db->escape_str($this->input->get('keyword',TRUE));
	
		if($premium_id!='')
		{
			$this->db->where("premium_id",$premium_id);
		}
	    if($title!='')
		{
			$this->db->where("(title LIKE '%".$title."%' )");
		}
		$this->db->order_by('premium_id','desc');
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS premium.*',FALSE);
		$result = $this->db->get('premium')->result_array();
		//echo "<pre>"; print_r($result); die;
		$result = ($limit=='1') ? @$result[0]: $result;	
		return $result;
	}
	
	public function premium_insert($drimage='')
	{		
		$date 			= date('Y-m-d h:i:s');
		$title			= $this->input->post('title');
		$price			= $this->input->post('price');		
		$video_url		= $this->input->post('video_url');
		$type 			= $this->input->post('type');
		$status 		= $this->input->post('status');
		$approved 		= $this->input->post('approved');
		$description 	= $this->input->post('description');
 
		$data=array(
					'title'			=>$title,
					'price'			=>$price,
					'video_url'		=>$video_url,
					'description'	=>$description,
					'image'			=>$drimage,
					'status'		=>$status,
					'approved'		=>$approved,
					'creat_date'	=>$date
				   );
			
	    $this->db->insert('premium',$data);
	    return ($this->db->affected_rows() != 1) ? false : true;
	}


	
    public function premium_duplicacy_check()
	{	
		$title			= $this->input->post('title');
		$title_count 	= $this->db->where('title',$title)->count_all_results('premium');
		if($title_count ==0)
			return 'OK';
		else
			return 'title';
	}

    public function update_premium($id,$picture)
	{
        $date 			=date('Y-m-d h:i:s');
		$title			=$this->input->post('title');	
		$price			=$this->input->post('price');	
		$video_url		=$this->input->post('video_url');
		$status 		=$this->input->post('status');
		$approved 		=$this->input->post('approved');
		$description 	=$this->input->post('description');

		$data=array(
					'title'			=>$title,
					'price'			=>$price,
					'video_url'		=>$video_url,
					'description'	=>$description,
					'image'			=>$picture,
					'status'		=>$status,
					'approved'		=>$approved,
					'creat_date'	=>$date
				   );
        $this->db->where('premium_id',$id);
		$this->db->update('premium',$data);
        return $qq;
	}
}