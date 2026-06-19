<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Pathlab_Model extends CI_Model 
{
    function __construct() 
	{
		 //parent::__construct();
		 if($this->session->userdata('pathuserid')){
			 $this->did=$this->db->where('id',$this->session->userdata('pathuserid'))->get('pathlab')->row()->id;
		 }
	}
   
	public function profile_step1()
	{
		$udata=array('fname'=>$this->input->post('name'),'gender'=>$this->input->post('gender'),'city'=>$this->input->post('city'));
		$this->db->where('user_id',$this->did)->update('profile_dr',$udata);
		
		$this->db->delete('dr_specialization',array('user_id'=>$this->did));
		$specialisation = $this->input->post('specialisation');
			foreach($specialisation as $s){
				$spldata[]=array('user_id'=>$this->did,'specialization_id'=>$s);
			}
		$this->db->insert_batch('dr_specialization',$spldata);
			
		redirect('profile_step2');
		
	}
 
 
 
 function change_password($id)
	{
	  
     $query = $this->db->where(['USERID'=>$id])
                    ->get('pathlogin');
       
        return $query->row();
   
	    
	}

  public function updatePassword($new_password, $id)
  {
       $data = array(
      'PASSWORD'=> $new_password
      );
      return $this->db->where('USERID', $id)
                      ->update('pathlogin', $data); 
      
  }
   

    public function updateprofile(){
		$clinicname=$this->input->post('clinicname');
		$cliniccity=$this->input->post('cliniccity');
		$cliniclocality=$this->input->post('cliniclocality');
		$address=$this->input->post('address');
		$udata=array('name'=>$clinicname,'city'=>$cliniccity,'location'=>$cliniclocality,'address'=>$address);
			$this->db->where('id',$this->did)->update('pathlab',$udata);
			redirect('pathlabpanel/profile_clinicproof');
		}
    
    public function profile_clinicproof(){
		
		$uploadimage=$_FILES['images']['name'];
		$extsign = pathinfo($_FILES['images']['name'],PATHINFO_EXTENSION);
		
		if($uploadimage != '') 
		{	
			$rname=rand(1111111,999999999);
			$date=date('Ymd');
			$uploadimage='pathlab_proof_pic_'.$rname.$date.'.'.$extsign;
			$config['upload_path']          = $_SERVER['DOCUMENT_ROOT'].'/admin1947/public/assets/upload/';
					$config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
					$config['max_size']             = 0;
					$config['quality'] = '50%';
					$config['file_name']  = $uploadimage;
					$this->load->library('upload', $config);
					
					if (! $this->upload->do_upload('images'))
					{
						$error = $this->upload->display_errors();
						echo $flashmsg='<div class="alert alert-danger">
						  <strong>Failed!</strong>'.$error.'
						</div>';
						$this->session->set_flashdata('flashmsg',$flashmsg);
						redirect('pathlabpanel/profile_clinicproof');
						exit();
						
					}else{
						$udata=array('drimage'=>$uploadimage);
						$this->db->where('id',$this->did)->update('pathlab',$udata);
					}
		}
		
		redirect('pathlabpanel/profile_drpic');	
	}
    
    public function profile_drpic(){
		
		$uploadimage=$_FILES['images']['name'];
		$extsign = pathinfo($_FILES['images']['name'],PATHINFO_EXTENSION);
		
		if($uploadimage != '') 
		{	
			$rname=rand(1111111,999999999);
			$date=date('Ymd');
			$uploadimage='pathlab_proof_pic_'.$rname.$date.'.'.$extsign;
			$config['upload_path']          = $_SERVER['DOCUMENT_ROOT'].'/admin1947/public/assets/upload/';
					$config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
					$config['max_size']             = 0;
					$config['quality'] = '50%';
					$config['file_name']  = $uploadimage;
					$this->load->library('upload', $config);
					
					if (! $this->upload->do_upload('images'))
					{
						$error = $this->upload->display_errors();
						echo $flashmsg='<div class="alert alert-danger">
						  <strong>Failed!</strong>'.$error.'
						</div>';
						$this->session->set_flashdata('flashmsg',$flashmsg);
						redirect('pathlabpanel/profile_drpic');
						exit();
						
					}else{
						$udata=array('id_proof'=>$uploadimage);
						$this->db->where('id',$this->did)->update('pathlab',$udata);
					}
		}
		
		redirect('pathlabpanel/profile_regproof');	
	}
    
    public function profile_regproof(){
		
		$uploadimage=$_FILES['images']['name'];
		$extsign = pathinfo($_FILES['images']['name'],PATHINFO_EXTENSION);
		
		if($uploadimage != '') 
		{	
			$rname=rand(1111111,999999999);
			$date=date('Ymd');
			$uploadimage='pathlab_proof_pic_'.$rname.$date.'.'.$extsign;
			$config['upload_path']          = $_SERVER['DOCUMENT_ROOT'].'/admin1947/public/assets/upload/';
					$config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
					$config['max_size']             = 0;
					$config['quality'] = '50%';
					$config['file_name']  = $uploadimage;
					$this->load->library('upload', $config);
					
					if (! $this->upload->do_upload('images'))
					{
						$error = $this->upload->display_errors();
						echo $flashmsg='<div class="alert alert-danger">
						  <strong>Failed!</strong>'.$error.'
						</div>';
						$this->session->set_flashdata('flashmsg',$flashmsg);
						redirect('pathlabpanel/profile_clinicproof');
						exit();
						
					}else{
						$udata=array('med_reg_proof'=>$uploadimage);
						$this->db->where('id',$this->did)->update('pathlab',$udata);
					}
		}
		
		redirect('pathlabpanel/dashboard');	
	}

    public function get_pathtest($limit='10',$offset='0',$param=array())
	{	
		$id				= @$param['id'];
		$path_lab_id 	= @$param['path_lab_id'];
		$keyword 		= $this->db->escape_str($this->input->get('keyword',TRUE));
		$date_from 		= $this->db->escape_str($this->input->get_post('date_from',TRUE));
		$date_to 		= $this->db->escape_str($this->input->get_post('date_to',TRUE));	
		
		if($id!='')
		{
			$this->db->where("id",$id);
		}
		if($path_lab_id!='')
		{
			$this->db->where("path_lab_test.path_lab_id",$path_lab_id);
		}
	    if($keyword!='')
		{
			$this->db->where("(pathtest.test_name LIKE '%".$keyword."%' )");
		}
		if($date_from!='')
		{
			$this->db->where('pathtest.creat_date >=', $date_from);
		}
		if($date_to!='')
		{
			$this->db->where('pathtest.creat_date <=', $date_to);
		}
		$this->db->order_by('path_lab_test.id','desc');
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS pathtest.*,path_lab_test.*,path_category.category_name',FALSE);
		$this->db->join('pathtest','pathtest.test_id=path_lab_test.test_id','left');
		$this->db->join('path_category','path_category.category_id=pathtest.category_id','left');
		$this->db->group_by('pathtest.test_id');
		$result = $this->db->get('path_lab_test')->result_array();
		$result = ($limit=='1') ? @$result[0]: $result;	
		return $result;
	}
	
	public  function master_test($page=array())
	{		
		if( is_array($page) && !empty($page) )
		{	
			$this->db->select('pathtest.*,path_category.category_name');
			$this->db->join('path_category','path_category.category_id=pathtest.category_id','left');
			$result =  $this->db->get_where('pathtest',$page)->result_array();
			if( is_array($result) && !empty($result) )
			{
				return $result;
			}
		}
	}
	public function test_insert()
	{	
		$data=array(
					'path_lab_id'		=>$this->did,
					'test_id'			=>$this->input->post('test_id'),
					'lab_price'			=>$this->input->post('lab_price'),
					'status'			=>$this->input->post('status'),
					'created_date'		=>date('Y-m-d h:i:s')
				   );
	    $this->db->insert('path_lab_test',$data);
	    return ($this->db->affected_rows() != 1) ? false : true;
	}
	
	public function update_test($id)
	{	
		$data=array(
					'lab_price'			=>$this->input->post('lab_price'),
					'status'			=>$this->input->post('status'),
					'updated_date'		=>date('Y-m-d h:i:s')
				   );
        $this->db->where('id',$id);
		$this->db->update('path_lab_test',$data);
		//print_r($data); die;
        return 1;
	}
    
	public function get_booking($limit='10',$offset='0',$param=array())
	{		
		$booking_id 		= @$param['booking_id'];
		$pathlab_id 		= @$param['pathlab_id'];
	
		$date_from 			= $this->db->escape_str($this->input->get_post('date_from',TRUE));
		$date_to 			= $this->db->escape_str($this->input->get_post('date_to',TRUE));	
		$keyword 		= $this->db->escape_str($this->input->get_post('keyword',TRUE));
		
		if($keyword!='')
		{
			$this->db->where("(path_book.patient_name LIKE '%".$keyword."%' )");
		}
	    if($booking_id!='')
		{
			$this->db->where("booking_id",$booking_id);
		}
		if($pathlab_id!='')
		{
			$this->db->where("path_book.pathlab_id",$pathlab_id);
		}
		if($date_from!='')
		{
			$this->db->where('book_date >=', $date_from);
		}
		if($date_to!='')
		{
			$this->db->where('book_date <=', $date_to);
		}
		$this->db->order_by('booking_id','desc');
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS path_book.*,pathlab.name as pathlab_name,master_city.name as city_name',FALSE);
		$this->db->join('pathlab','pathlab.id=path_book.pathlab_id','left');
		$this->db->join('master_city','master_city.id=pathlab.city','left');
		$result = $this->db->get('path_book')->result_array();
		$result = ($limit=='1') ? @$result[0]: $result;	
		return $result;
	}
	
	public function get_path_test($limit='10',$offset='0',$param=array())
	{	
		$keyword 			= $this->db->escape_str($this->input->get('keyword',TRUE));
		$city_name 			= $this->db->escape_str($this->input->get('city_name',TRUE));
		$pathlab_id 		= @$param['pathlab_id'];
		if($pathlab_id!='')
		{
			$this->db->where("path_lab_test.path_lab_id",$pathlab_id);
		
			if($keyword!='')
			{
				$this->db->where("(pathtest.test_name LIKE '%".$keyword."%' )");
			}
			$this->db->order_by('pathtest.test_id','desc');
			$this->db->select('SQL_CALC_FOUND_ROWS pathtest.*',FALSE);
			$this->db->join('path_lab_test','path_lab_test.test_id = pathtest.test_id');
			$this->db->group_by('pathtest.test_id');
			$result = $this->db->get('pathtest')->result_array();
			$result = ($limit=='1') ? @$result[0]: $result;	
			return $result;
		}
		else
		{
			return array();
		}
	}
	
	public  function test_list($page=array())
	{
		if( is_array($page) && !empty($page) )
		{	
			$this->db->select('path_lab_test.*,pathtest.test_name,pathtest.short_name,pathtest.method,pathtest.amount');
			$this->db->group_by('path_lab_test.test_id'); 
			$this->db->join('pathtest','pathtest.test_id=path_lab_test.test_id');
   			$result = $this->db->get_where('path_lab_test',$page)->result_array();
			if( is_array($result) && !empty($result) )
			{
				return $result;
			}
		}
	}
	
	public  function get_booking_test($page=array())
	{
		if( is_array($page) && !empty($page) )
		{	
			$this->db->select('path_book_test.*');
			$result =  $this->db->get_where('path_book_test',$page)->result_array();

			if( is_array($result) && !empty($result) )
			{
				return $result;
			}
		}
	}
}

