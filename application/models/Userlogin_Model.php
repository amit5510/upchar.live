<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Userlogin_Model extends CI_Model {

function __construct() {
		 parent::__construct();
		 date_default_timezone_set("Asia/Kolkata");


	}
    public function profile()
   {
     $userid =$this->session->userdata('userid');
	$udata=array('FNAME'=>$this->input->post('name'),'GENDER'=>$this->input->post('gender'),'EMAIL'=>$this->input->post('email'),'MOBILE'=>$this->input->post('mobile'),'DOB'=>$this->input->post('dob'));
		$this->db->where('userid',$userid)->update('userlogin',$udata);

    redirect('updateprofile');
		
}

public function updateprofile(){
		
	    $userid =$this->session->userdata('userid');
		$uploadimage=$_FILES['file']['name'];
		$extsign = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
		
		if($uploadimage != '') 
		{	
			$rname=rand(1111111,999999999);
			$date=date('Ymd');
			$uploadimage='pic_'.$rname.$date.'.'.$extsign;
			$config['upload_path']          = $_SERVER['DOCUMENT_ROOT'].'/admin1947/public/assets/upload/';
					$config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
					$config['max_size']             = 0;
					$config['quality'] = '50%';
					$config['file_name']  = $uploadimage;
					$this->load->library('upload', $config);
					
					if (!$this->upload->do_upload('file'))
					{
						$error = $this->upload->display_errors();
					 $flashmsg='<div class="alert alert-danger">
						  <strong>Failed!</strong>'.$error.'
						</div>';
						$this->session->set_flashdata('flashmsg',$flashmsg);
						redirect('profile');
						exit();
						
					}else{
						$udata=array('IMAGE'=>$uploadimage);
						$this->db->where('userid',$userid)->update('userlogin',$udata);
					}
		}
		redirect('index.php');	
	}


function change_password($id)
	{
	  
     $query = $this->db->where(['USERID'=>$id])
                    ->get('userlogin');
       
        return $query->row();
   
	    
	}

  public function updatePassword($new_password, $id)
  {
       $data = array(
      'PASSWORD'=> $new_password
      );
      return $this->db->where('USERID', $id)
                      ->update('userlogin', $data); 
      
  }

   public function c_count()
   {
   $this->db->select('count(*)');
   $query = $this->db->get('userlogin');
   $cnt = $query->row_array();
   return $cnt['count(*)'];
  }
	

}
    

