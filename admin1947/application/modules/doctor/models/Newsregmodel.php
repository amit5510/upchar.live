<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Newsregmodel extends CI_Model
{	     
	public function traineereginsert($drimage)
	{		
		$date 			= date('Y-m-d h:i:s');
		$fname			= $this->input->post('name');	
		$video_url		= $this->input->post('video_url');
		$type 			= $this->input->post('type');
		$status 		= $this->input->post('status');
		$approved 		= $this->input->post('approved');
		$description 	= $this->input->post('description');
 
		$data=array('title'			=>$fname,
					'video_url'		=>$video_url,
					'type'			=>$type,
					'description'	=>$description,
					'image'			=>$drimage,
					'status'		=>$status,
					'approved'		=>$approved,
					'creat_date'	=>$date
				   );
			
	    $this->db->insert('news',$data);
	    return ($this->db->affected_rows() != 1) ? false : true;
	}


	
    public function news_duplicacy_check()
	{
		$name=$this->input->post('name');
		$name_count = $this->db->where('title',$name)->count_all_results('news');
		//return 'OK';
		if($name_count ==0)
			return 'OK';
		else if($name_count ==0)
			return 'name';
	}

    public function updatenews($id,$picture)
	{	//echo "<pre>"; print_r($_POST); die;
        $date 			=date('Y-m-d h:i:s');
		$fname			=$this->input->post('name');	
		$video_url		=$this->input->post('video_url');
		$type 			=$this->input->post('type');
		$status 		=$this->input->post('status');
		$approved 		=$this->input->post('approved');
		$description 	=$this->input->post('description');

		$data=array('title'			=>$fname,
					'video_url'		=>$video_url,
					'type'			=>$type,
					'description'	=>$description,
					'image'			=>$picture,
					'status'		=>$status,
					'approved'		=>$approved,
					'creat_date'	=>$date
				   );

        //$qq=$this->db->query("update news SET creat_date='$date',title='$fname',video_url='$video_url',image= '$picture',type='$type',description='$description',status='$status',approved='$approved' where id='".$id."'");
        $this->db->where('id',$id);
		$this->db->update('news',$data);
        return $qq;
	}

   	function newsdelete($id)
    {
        $this->db->query("delete from news where id='".$id."'");
    }
}