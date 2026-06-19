<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Doctor_Model extends CI_Model 
{
   
	function __construct() 
	{
		 //parent::__construct();
		 if($this->session->userdata('druserid')){
			 $this->did= $this->db->where('user_id',$this->session->userdata('druserid'))->get('profile_dr')->row()->id;
		 }
		 
	}
   
	public function update_status($table,$auto_field='id')
	{	//echo "<pre>"; print_r($_POST); die;
		$current_controller    = $this->router->fetch_class();
		$action                = $this->input->post('status_action',TRUE);	
	    $arr_ids               = $this->input->post('arr_ids',TRUE);
	
		if(is_array($arr_ids) )
		{	
			$str_ids = implode(',', $arr_ids);
			if($action=='Request-Accept')
			{		
				foreach($arr_ids as $k=>$v )
				{
					$data 	= array(
									'status'	=>'1',
									);
					$where = "$auto_field ='$v'";					
					$this->Doctor_Model->safe_update($table,$data,$where,FALSE);											
					$this->session->set_userdata(array('msg_type'=>'success'));
					$this->session->set_flashdata('success','Practice Request Accepted successfully.');
				}
			}
			if($action=='Request-Reject')
			{	  
				foreach($arr_ids as $k=>$v )
				{
					$data = array('status'=>'0');
					$where = "$auto_field ='$v'";					
					//$this->Doctor_Model->safe_update($table,$data,$where,FALSE);
					$this->db->delete($table,$where);
					$this->session->set_userdata(array('msg_type'=>'success'));
					$this->session->set_flashdata('success','Practice Request Accepted successfully.');
				}	
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
	
	public function profile_step1()
	{
		$udata=array('fname'=>$this->input->post('name'),'email'=>$this->input->post('email'),'gender'=>$this->input->post('gender'),'city'=>$this->input->post('city'));
		$this->db->where('id',$this->did)->update('profile_dr',$udata);
		
		$this->db->delete('dr_specialization',array('user_id'=>$this->did));
		$specialisation = $this->input->post('specialisation');
			foreach($specialisation as $s){
				$spldata[]=array('user_id'=>$this->did,'specialization_id'=>$s);
			}
		$this->db->insert_batch('dr_specialization',$spldata);
			 $flashmsg='Updated Successfully!';
						$this->session->set_flashdata('flashmsg',$flashmsg);
						
		redirect('profile_step2');
		
	}
	
	public function profile_step2(){
		$udata=array('regd_no'=>$this->input->post('regno'),'regd_council'=>$this->input->post('council'),'regd_year'=>$this->input->post('year'));
		$this->db->where('id',$this->did)->update('profile_dr',$udata);
		
		
		redirect('profile_step3');
		
	}
	
	public function profile_step3(){
		$udata=array('college'=>$this->input->post('college'),'exp'=>$this->input->post('exp'),'year'=>$this->input->post('year'));
		$this->db->where('id',$this->did)->update('profile_dr',$udata);
		
		$this->db->delete('dr_qualifications',array('user_id'=>$this->did));
		$qualification =$this->input->post('qualification');
		foreach($qualification as $q){
			$qualdata[]=array('user_id'=>$this->did,'qualification_id'=>$q);
		}
		$this->db->insert_batch('dr_qualifications',$qualdata);
			
		redirect('profile_about');
		
	}
	
	
	public function about()
	{
		
		$udata=array('about'=>$this->input->post('about'),'short_about'=>$this->input->post('short_about'));
		$this->db->where('id',$this->did)->update('profile_dr',$udata);	    
		redirect('profile_drpic');
	}
	
	public function profile_drpic(){
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
						redirect('profile_drpic');
						exit();
						
					}else{
						$udata=array('drimage'=>$uploadimage);
						$this->db->where('id',$this->did)->update('profile_dr',$udata);
					}
		}
		redirect('profile_idproof');	
	}
	
	public function profile_idproof(){
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
						redirect('profile_idproof');
						exit();
						
					}else{
						$udata=array('id_proof'=>$uploadimage);
						$this->db->where('id',$this->did)->update('profile_dr',$udata);
					}
		}
		redirect('mci_proof');	
	}
	
	public function mci_proof(){
		$uploadimage=$_FILES['images']['name'];
		$extsign = pathinfo($_FILES['images']['name'],PATHINFO_EXTENSION);
		
		if($uploadimage != '') 
		{	
			$rname=rand(1111111,999999999);
			$date=date('Ymd');
			$uploadimage='dr_micidproof_pic_'.$rname.$date.'.'.$extsign;
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
						redirect('mci_proof');
						exit();
						
					}else{
						$udata=array('mic_proof'=>$uploadimage);
						$this->db->where('id',$this->did)->update('profile_dr',$udata);
					}
		}
		redirect('profile_regproof');	
	}
		
	public function profile_regproof(){
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
						redirect('profile_regproof');
						exit();
						
					}else{
						$udata=array('med_reg_proof'=>$uploadimage);
						$this->db->where('id',$this->did)->update('profile_dr',$udata);
					}
		}
		redirect('managepractice');	
	}
	
	
	 
	
	
	public function profile_step4(){
		$udata=array('clinic_type'=>$this->input->post('practicetype'));
		$this->db->where('id',$this->did)->update('profile_dr',$udata);
		
		redirect('profile_step5');
		
	}
	public function addclinic(){
		$clinicname=$this->input->post('clinicname');
		$cliniccity=$this->input->post('cliniccity');
		$cliniclocality=$this->input->post('cliniclocality');
		//search cilinic & suggest if any else save
		$this->db->like('name',$clinicname);
		//$this->db->where('city',$cliniccity);
		//$this->db->where('location',$cliniclocality);
		$clinic = $this->db->get('clinic');
		$suggestedclinic=$clinic->result();
		$countguggestedclinic=$clinic->num_rows();
		if($countguggestedclinic){
			return $suggestedclinic;
		}else{
			//insert or update on hinnden clinic id value
			//$this->db->where('user_id',$this->did)->update('profile_dr',$udata);
			$udata=array('name'=>$clinicname,'city'=>$cliniccity,'location'=>$cliniclocality);
			$this->db->insert('clinic',$udata);
			$clinicid = $this->db->insert_id();
			$udata2=array('clinic_id'=>$clinicid,'did'=>$this->did,'status'=>'P','date'=>date('Y-m-d H:i:s'));
			$this->db->insert('clinic_claimed',$udata2);
			
			redirect('profile_clinicproof/'.mybase64_encode($clinicid));
		}
		
		
	}
	
	public function addpractice(){
		$clinicname=$this->input->post('clinicname');
		$cliniccity=$this->input->post('cliniccity');
		$cliniclocality=$this->input->post('cliniclocality');
		//search cilinic & suggest if any else save
		$this->db->like('name',$clinicname);
		//$this->db->where('city',$cliniccity);
		//$this->db->where('location',$cliniclocality);
		$clinic = $this->db->get('clinic');
		$suggestedclinic=$clinic->result();
		
		$this->db->like('name',$clinicname);
		//$this->db->where('city',$cliniccity);
		//$this->db->where('location',$cliniclocality);
		$hosp = $this->db->get('hospital');
		$suggestedhospital=$hosp->result();
		
		$countguggestedclinic=$clinic->num_rows();
		$countguggestedhospital=$hosp->num_rows();
		if($countguggestedclinic + $countguggestedhospital){
			return array('C'=>$suggestedclinic,'H'=>$suggestedhospital);
		}else{
			//insert or update on hinnden clinic id value
			//$this->db->where('user_id',$this->did)->update('profile_dr',$udata);
			
			//$udata=array('name'=>$clinicname,'city'=>$cliniccity,'location'=>$cliniclocality);
			//$this->db->insert('clinic',$udata);
			//$clinicid = $this->db->insert_id();
			//$udata2=array('clinic_id'=>$clinicid,'did'=>$this->did,'status'=>'P','date'=>date('Y-m-d H:i:s'));
			//$this->db->insert('clinic_claimed',$udata2);
			
			//redirect('progress_profile2');
			return array();
		}
		
		
	}
	
	public function linkpractice(){
		$hospclinicid=$this->input->post('hospclinicid');
		$exp=explode('-',$hospclinicid);
		$type=$exp[0];
		$institution_id=$exp[1];
		$result=$this->db->where(array('type'=>$type,'institution_id'=>$institution_id,'user_id'=>$this->did))->get('dr_practice');
		$count=$result->num_rows();
		if($count){
			$practiceid=$result->row()->id;
		}else{
			$udata=array('institution_id'=>$institution_id,'user_id'=>$this->did,'type'=>$type);
			$this->db->insert('dr_practice',$udata);
			$practiceid=$this->db->insert_id();
		}
		//$udata=array('clinic_type'=>$this->input->post('practicetype'));
		//$this->db->where('user_id',$this->did)->update('profile_dr',$udata);
		//if already ret id else add and ret id
		
		redirect('profile_consultant_fee/'.mybase64_encode($practiceid));
		
	}
	
	public function profile_consultant_fee(){
		$pid=mybase64_decode( $this->uri->segment(2) );//check if loged in 
		$drid=$this->did;
		$fee = $this->input->post('fee');
		$practicetype = $this->input->post('objective');
		$mon = $this->input->post('mon');
		$tue = $this->input->post('tue');
		$wed = $this->input->post('wed');
		$thu = $this->input->post('thu');
		$fri = $this->input->post('fri');
		$sat = $this->input->post('sat');
		$sun = $this->input->post('sun');
			
		$from = $this->input->post('fromtime');
		$to = $this->input->post('totime');
		$max_patient = $this->input->post('max_patient');
		$hiddenday = $this->input->post('hiddenday');
		
		$this->db->where('id',$pid)->set('fee',$fee)->update('dr_practice');
		if($pid)
		$this->db->query("DELETE `timing`,`timing_session` FROM `timing` INNER JOIN `timing_session`  ON timing_session.timing_id=timing.id WHERE practice_id='$pid';");
		for($key2=0;$key2<$hiddenday;$key2++){
			$mon[$key2]=(@$mon[$key2])? 1 : 0;
			$tue[$key2]=(@$tue[$key2])? 1 : 0;
			$wed[$key2]=(@$wed[$key2])? 1 : 0;
			$thu[$key2]=(@$thu[$key2])? 1 : 0;
			$fri[$key2]=(@$fri[$key2])? 1 : 0;
			$sat[$key2]=(@$sat[$key2])? 1 : 0;
			$sun[$key2]=(@$sun[$key2])? 1 : 0;
				
			if(!$mon[$key2] && !$tue[$key2] && !$wed[$key2] && !$thu[$key2] && !$fri[$key2] && !$sat[$key2] && !$sun[$key2] )
				continue;
			
			$timingdata=array('practice_id'=>$pid,'user_id'=>$drid,'M'=>$mon[$key2],'T'=>$tue[$key2],	'W'=>$wed[$key2],'TH'=>$thu[$key2],	'F'=>$fri[$key2],	'SA'=>$sat[$key2],	'S'=>$sun[$key2],	'status'=>'1');
			$this->db->insert('timing',$timingdata);
			
			$sessions=$from[$key2];
			$tid= $this->db->insert_id();
			foreach($sessions as $key3=>$value){
				if($from[$key2][$key3]=='' || $from[$key2][$key3]=='')
					continue;
				$sessiondata = array('timing_id'=>$tid,'from_timing'=>$from[$key2][$key3],'to_timing'=>$to[$key2][$key3],'max_patient'=>$max_patient[$key2][$key3],'status'=>'1');
				$this->db->insert('timing_session',$sessiondata);
						
			}
				
		}
			
		
		
		
		redirect('managepractice');	
	}
	
	public function profile_step6(){
		//$udata=array('clinic_type'=>$this->input->post('practicetype'));
		//$this->db->where('user_id',$this->did)->update('profile_dr',$udata);
		$clinicid=$this->input->post('clinicid');
		$udata2=array('clinic_id'=>$clinicid,'did'=>$this->did,'status'=>'P','date'=>date('Y-m-d H:i:s'));
			$this->db->insert('clinic_claimed',$udata2);
			
		redirect('progress_profile2');
		
	}
	
	public function profile_clinicproof(){
		$clinicid=mybase64_decode($this->uri->segment(2));
		
		$uploadimage=$_FILES['images']['name'];
		$extsign = pathinfo($_FILES['images']['name'],PATHINFO_EXTENSION);
		
		if($uploadimage != '') 
		{	
			$rname=rand(1111111,999999999);
			$date=date('Ymd');
			$uploadimage='clinic_proof_pic_'.$rname.$date.'.'.$extsign;
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
						redirect('profile_clinicproof');
						exit();
						
					}else{
						$udata=array('med_reg_proof'=>$uploadimage);
						$this->db->where('id',$clinicid)->update('clinic',$udata);
					}
		}
		
		redirect('profile_maplocation/'.mybase64_encode($clinicid));	
	}
	
	public function updateclinic(){
		$clinicid=$this->uri->segment(2);
		$udata=array('name'=>$this->input->post('clinicname'),'city'=>$this->input->post('cliniccity'),'location'=>$this->input->post('cliniclocality'));
		$this->db->where('id',mybase64_decode($clinicid))->update('clinic',$udata);
		
	
		redirect('profile_clinicproof/'.($clinicid));	
		//redirect('profile_clinic_timing/'.($clinicid));	 
	}
	public function profile_maplocation(){
		$clinicid=$this->uri->segment(2);
		$udata=array('email'=>$this->input->post('email'),'mobile'=>$this->input->post('mobile'),'address'=>$this->input->post('address'));
		$this->db->where('id',mybase64_decode($clinicid))->update('clinic',$udata);
		
		
		redirect('profile_clinic_timing/'.($clinicid));	
	}
	
	public function profile_clinic_timing(){
		$clinicid=mybase64_decode( $this->uri->segment(2) );//check if loged in 
		$practicetype = $this->input->post('objective');
		$mon = $this->input->post('mon');
		$tue = $this->input->post('tue');
		$wed = $this->input->post('wed');
		$thu = $this->input->post('thu');
		$fri = $this->input->post('fri');
		$sat = $this->input->post('sat');
		$sun = $this->input->post('sun');
			
		$from = $this->input->post('fromtime');
		$to = $this->input->post('totime');
		$hiddenday = $this->input->post('hiddenday');
		
		$this->db->query("DELETE `timing`,`timing_session` FROM `timing` INNER JOIN `timing_session`  ON timing_session.timing_id=timing.id WHERE user_id='$clinicid' AND user_type='C';");
		for($key2=0;$key2<$hiddenday;$key2++){
			$mon[$key2]=(@$mon[$key2])? 1 : 0;
			$tue[$key2]=(@$tue[$key2])? 1 : 0;
			$wed[$key2]=(@$wed[$key2])? 1 : 0;
			$thu[$key2]=(@$thu[$key2])? 1 : 0;
			$fri[$key2]=(@$fri[$key2])? 1 : 0;
			$sat[$key2]=(@$sat[$key2])? 1 : 0;
			$sun[$key2]=(@$sun[$key2])? 1 : 0;
					
			if(!$mon[$key2] && !$tue[$key2] && !$wed[$key2] && !$thu[$key2] && !$fri[$key2] && !$sat[$key2] && !$sun[$key2] )
				continue;
			
			$timingdata=array('user_id'=>$clinicid,'user_type'=>'C','M'=>$mon[$key2],'T'=>$tue[$key2],	'W'=>$wed[$key2],'TH'=>$thu[$key2],	'F'=>$fri[$key2],	'SA'=>$sat[$key2],	'S'=>$sun[$key2],	'status'=>'1');
			$this->db->insert('timing',$timingdata);
			
			$sessions=$from[$key2];
			$tid= $this->db->insert_id();
			foreach($sessions as $key3=>$value){
				if($from[$key2][$key3]=='' || $from[$key2][$key3]=='')
					continue;
				$sessiondata = array('timing_id'=>$tid,'from_timing'=>$from[$key2][$key3],'to_timing'=>$to[$key2][$key3],'status'=>'1');
				$this->db->insert('timing_session',$sessiondata);
						
			}
				
		}
		redirect('manageownclinic');	
		//redirect('profile_consultant_fee/'.($clinicid));	
	}
	
	/*
	
	public function display()
     {
     $id=$this->input->get('user_id');
     $query=$this->db->query("select * from profile_dr where id='".$this->did."' ");
	return $query->result();
    }
*/

   

    function change_password($id)
	{
	  
     $query = $this->db->where(['USERID'=>$id])
                    ->get('doctorlogin');
       
        return $query->row();
   
	    
	}

  public function updatePassword($new_password, $id)
  {
       $data = array(
      'PASSWORD'=> $new_password
      );
      return $this->db->where('USERID', $id)
                      ->update('doctorlogin', $data); 
      
  }
  
    public function gallery($image)
	    {
	        $date=date('Y-m-d h:i:s');
	        $long=$this->input->post('long');
			$shot=$this->input->post('shot');
			//$id=base64_decode($this->input->post('id'));

           //$image=$this->input->post('uploadimage')
			$data=array('shot_description'=>$shot,'long_description'=>$long,'image'=>$image,'date'=>$date,'user_id'=>$this->did);
			
			$qq=$this->db->insert('doctorgallery',$data);
           return $qq;
           $drid= $this->db->insert_id();
		}

	public function add_news($image)
	    {
	        $date=date('Y-m-d h:i:s');
	        $name=$this->input->post('name');
	        $description=$this->input->post('description');
	        $type=$this->input->post('type');
			$video_url=$this->input->post('video_url');
			
			$data=array('title'=>$name,'description'=>$description,'type'=>$type,'image'=>$image,'video_url'=>$video_url,'creat_date'=>$date,'doctor_id'=>$this->did);
			//echo "<pre>";print_r($data); die;
			$qq=$this->db->insert('news',$data);
           return $qq;
           $drid= $this->db->insert_id();
		}
	
  
   }