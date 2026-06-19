<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Medical_Model extends CI_Model {
   
   function __construct() {
		 //parent::__construct();
		 if($this->session->userdata('medicaluserid')){
			 $this->did= $this->db->where('user_id',$this->session->userdata('medicaluserid'))->get('profile_chem')->row()->id;
		 }
		 
	}
	
	
	
	   public function profile_step21(){
		$udata=array('fname'=>$this->input->post('name'),'email'=>$this->input->post('email'),'gender'=>$this->input->post('gender'),'city'=>$this->input->post('city'));
		$this->db->where('id',$this->did)->update('profile_chem',$udata);
		
		$this->db->delete('dr_specialization',array('user_id'=>$this->did));
		$specialisation = $this->input->post('specialisation');
			foreach($specialisation as $s){
				$spldata[]=array('user_id'=>$this->did,'specialization_id'=>$s);
			}
		$this->db->insert_batch('dr_specialization',$spldata);
			 $flashmsg='Updated Successfully!';
						$this->session->set_flashdata('flashmsg',$flashmsg);
						
		redirect('profile_step22');
		
	}
	
	public function profile_step22(){
		$udata=array('regd_no'=>$this->input->post('regno'),'regd_council'=>$this->input->post('council'),'regd_year'=>$this->input->post('year'));
		$this->db->where('id',$this->did)->update('profile_chem',$udata);
		
		
		redirect('profile_step23');
		
	}
	
	
	
	   public function profile_step23(){
		$udata=array('college'=>$this->input->post('college'),'exp'=>$this->input->post('exp'),'year'=>$this->input->post('year'));
		$this->db->where('id',$this->did)->update('profile_chem',$udata);
		
		$this->db->delete('dr_qualifications',array('user_id'=>$this->did));
		$qualification =$this->input->post('qualification');
		foreach($qualification as $q){
			$qualdata[]=array('user_id'=>$this->did,'qualification_id'=>$q);
		}
		$this->db->insert_batch('dr_qualifications',$qualdata);
			
		redirect('profile_about2');
		
	}
	       
	       
	       public function about2()
	{
		$udata=array('about'=>$this->input->post('about'),'short_about'=>$this->input->post('short_about'));
		$this->db->where('id',$this->did)->update('profile_chem',$udata);	    
		redirect('profile_drpic2');
	}
	
	 	public function profile_drpic2(){
		//print_r($_FILES);
		//print_r($_POST);
		$uploadimage=$_FILES['images']['name'];
		$extsign = pathinfo($_FILES['images']['name'],PATHINFO_EXTENSION);
		
		if($uploadimage != '') 
		{	
			$rname=rand(1111111,999999999);
			$date=date('Ymd');
			$uploadimage='dr_profile_pic_'.$rname.$date.'.'.$extsign;
			$config['upload_path']          = $_SERVER['DOCUMENT_ROOT'].'/admin1947/public/assets/upload/';
					$config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG|';
					$config['max_size']             = 0;
					$config['quality'] = '50%';
					$config['file_name']  = $uploadimage;
					$this->load->library('upload', $config);
					
					if ( ! $this->upload->do_upload('images'))
					{
						$error = $this->upload->display_errors();
						echo $flashmsg='<div class="alert alert-danger">
						  <strong>Failed!</strong>'.$error.'
						</div>';
						$this->session->set_flashdata('flashmsg',$flashmsg);
						redirect('profile_drpic2');
						exit();
						
					}else{
						$udata=array('drimage'=>$uploadimage);
						$this->db->where('id',$this->did)->update('profile_chem',$udata);
					}
		}
		redirect('profile_idproof2');	
	}
	
	public function profile_idproof2(){
		$uploadimage=$_FILES['images']['name'];
		$extsign = pathinfo($_FILES['images']['name'],PATHINFO_EXTENSION);
		
		if($uploadimage != '') 
		{	
			$rname=rand(1111111,999999999);
			$date=date('Ymd');
			$uploadimage='dr_idproof_pic_'.$rname.$date.'.'.$extsign;
			$config['upload_path']          = $_SERVER['DOCUMENT_ROOT'].'/admin1947/public/assets/upload/';
					$config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
					$config['max_size']             = 0;
					$config['quality'] = '50%';
					$config['file_name']  = $uploadimage;
					$this->load->library('upload', $config);
					
					if ( ! $this->upload->do_upload('images'))
					{
						$error = $this->upload->display_errors();
						echo $flashmsg='<div class="alert alert-danger">
						  <strong>Failed!</strong>'.$error.'
						</div>';
						$this->session->set_flashdata('flashmsg',$flashmsg);
						redirect('profile_idproof2');
						exit();
						
					}else{
						$udata=array('id_proof'=>$uploadimage);
						$this->db->where('id',$this->did)->update('profile_chem',$udata);
					}
		}
		redirect('profile_regproof2');	
	}
	
	  
		
	public function profile_regproof2(){
		$uploadimage=$_FILES['images']['name'];
		$extsign = pathinfo($_FILES['images']['name'],PATHINFO_EXTENSION);
		
		if($uploadimage != '') 
		{	
			$rname=rand(1111111,999999999);
			$date=date('Ymd');
			$uploadimage='dr_regproof_pic_'.$rname.$date.'.'.$extsign;
			$config['upload_path']          = $_SERVER['DOCUMENT_ROOT'].'/admin1947/public/assets/upload/';
					$config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
					$config['max_size']             = 0;
					$config['quality'] = '50%';
					$config['file_name']  = $uploadimage;
					$this->load->library('upload', $config);
					
					if ( ! $this->upload->do_upload('images'))
					{
						$error = $this->upload->display_errors();
						echo $flashmsg='<div class="alert alert-danger">
						  <strong>Failed!</strong>'.$error.'
						</div>';
						$this->session->set_flashdata('flashmsg',$flashmsg);
						redirect('profile_regproof2');
						exit();
						
					}else{
						$udata=array('med_reg_proof'=>$uploadimage);
						$this->db->where('id',$this->did)->update('profile_chem',$udata);
					}
		}
		redirect('managepractice2');	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
    function change_password($id)
	{
	  
     $query = $this->db->where(['USERID'=>$id])
                    ->get('chemistlogin');
       
        return $query->row();
	}

  public function updatePassword($new_password, $id)
  {
       $data = array(
      'PASSWORD'=> $new_password
      );
      return $this->db->where('USERID', $id)
                      ->update('chemistlogin', $data); 
      
  }
  
  public function gallery($image)
	    {
	        $date=date('Y-m-d h:i:s');
	        $long=$this->input->post('long');
			$shot=$this->input->post('shot');
			//$id=base64_decode($this->input->post('id'));

           //$image=$this->input->post('uploadimage')
			$data=array('shot_description'=>$shot,'long_description'=>$long,'image'=>$image,'date'=>$date,'user_id'=>$this->did);
			
			$qq=$this->db->insert('medicalgallery',$data);
           return $qq;
           $drid= $this->db->insert_id();
		}
  
  
  
    }