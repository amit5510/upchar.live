<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Doctorregmodel extends CI_Model
{
	public function traineereginsert($drimage,$idproof='',$regproof='')
	{
		$date		=date('Y-m-d h:i:s');
		$city		=$this->input->post('city');
		$fname		=$this->input->post('t_fname');
		$lname		=$this->input->post('t_lname');
		$gender		=$this->input->post('gender');
		$regno		=$this->input->post('regno');
		$council	=$this->input->post('council');
		$year		=$this->input->post('year');
		$exp		=$this->input->post('exprience');
		$achievement=$this->input->post('achievement');
		$about		=$this->input->post('about');
		$package	=$this->input->post('package');
		$email		=$this->input->post('email');
		$mobile		=$this->input->post('mobile');
		$password	=md5($this->input->post('password'));
		$status		=$this->input->post('status');

		$udata=array(
					'FNAME'		=>$fname,
					'LNAME'		=>$lname,
					'PASSWORD'	=>$password,
					'STATUS'	=>'1',
					'APPROVED'	=>'1',
					'REG_DATE'	=>date('Y-m-d'),
					'GENDER'	=>$gender
					); 
			if($email)
			$udata['EMAIL']=$email;
			if($mobile)
			$udata['MOBILE']=$mobile;
			if($this->db->insert('doctorlogin',$udata))
			{
				$thisid = $this->db->insert_id();
				$data	=array('user_id'	=>$thisid,
								'fname'		=>$fname,
								'lname'		=>$lname,
								'gender'	=>$gender,
								'city'		=>$city,
								'regd_no'	=>$regno,
								'regd_council'=>$council,
								'regd_year'	=>$year,
								'exp'		=>$exp,
								'achievement'=>$achievement,
								'id_proof'	=>$idproof,
								'med_reg_proof'=>$regproof,
								'drimage'	=>$drimage,
								'mobile'	=>$mobile,	
								'email'		=>$email,
								'about'		=>$about,
								'subscription'=>$package,
								'approved'	=>'1',
								'verified'	=>'1',
								'status'	=>$status,
								'creat_date'=>$date,
								'created_by'=>getUserId(),
								'source'=>'A');
				$this->db->insert('profile_dr',$data);
				$drid= $this->db->insert_id();
				//$qualification = explode(',',$this->input->post('qualification'));
				$qualification =$this->input->post('qualification');
				foreach($qualification as $q)
				{
					$qualdata[]=array('user_id'=>$drid,'qualification_id'=>$q);
				}
			}
			$this->db->insert_batch('dr_qualifications',$qualdata);
			//$specialisation = explode(',',$this->input->post('specialisation'));
			$specialisation = $this->input->post('specialisation');
			foreach($specialisation as $s)
			{
				$spldata[]=array('user_id'=>$drid,'specialization_id'=>$s);
			}
			$this->db->insert_batch('dr_specialization',$spldata);
			$practice = $this->input->post('clinic');
			$fees = $this->input->post('fee');
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
			foreach($practice as $key=>$p){
				if($p=='')
					continue;
				$type=$practicetype[$key];
				$fee=$fees[$key];
				$practicedata=array('user_id'=>$drid,'type'=>$type,'institution_id'=>$p,'fee'=>$fee);
				$this->db->insert('dr_practice',$practicedata);
				$pid= $this->db->insert_id();
				
				$timings=$mon[$key];
				//foreach($timings as $key2=>$value){
				for($key2=0;$key2<$hiddenday[$key];$key2++){
					$mon[$key][$key2]=($mon[$key][$key2])? 1 : 0;
					$tue[$key][$key2]=($tue[$key][$key2])? 1 : 0;
					$wed[$key][$key2]=($wed[$key][$key2])? 1 : 0;
					$thu[$key][$key2]=($thu[$key][$key2])? 1 : 0;
					$fri[$key][$key2]=($fri[$key][$key2])? 1 : 0;
					$sat[$key][$key2]=($sat[$key][$key2])? 1 : 0;
					$sun[$key][$key2]=($sun[$key][$key2])? 1 : 0;
					
					$timingdata=array('practice_id'=>$pid,'user_id'=>$drid,'M'=>$mon[$key][$key2],'T'=>$tue[$key][$key2],	'W'=>$wed[$key][$key2],'TH'=>$thu[$key][$key2],	'F'=>$fri[$key][$key2],	'SA'=>$sat[$key][$key2],	'S'=>$sun[$key][$key2],	'status'=>'1');
					$this->db->insert('timing',$timingdata);
					$sessions=$from[$key][$key2];
					$tid= $this->db->insert_id();
					foreach($sessions as $key3=>$value){
						if($from[$key][$key2][$key3]=='' || $from[$key][$key2][$key3]=='')
							continue;
						$sessiondata = array('timing_id'=>$tid,'from_timing'=>$from[$key][$key2][$key3],'to_timing'=>$to[$key][$key2][$key3],'status'=>'1');
						$this->db->insert('timing_session',$sessiondata);
						
					}
				
				}
			}
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	
	public function doctor_duplicacy_check()
	{
		$email=$this->input->post('email');
		$mobile=$this->input->post('mobile');
		$mobile_count = $this->db->where('mobile',$mobile)->count_all_results('profile_dr');
		$email_count = $this->db->where('email',$email)->count_all_results('profile_dr');
		//return 'OK';
		if($mobile_count ==0 && $email_count==0)
			return 'OK';
		else if($mobile_count >0 && $email_count>0)
			return 'BOTH';
		else if($mobile_count ==0)
			return 'MOBILE';
		else if($email_count==0)
			return 'EMAIL';
	}
	public  function check_hospital($page=array())
	{		
		if( is_array($page) && !empty($page) )
		{
			$result =  $this->db->get_where('hospitallogin',$page)->result_array();

			if( is_array($result) && !empty($result) )
			{
				return $result;
			}

		}
	}
	public  function check_doctor($page=array())
	{		
		if( is_array($page) && !empty($page) )
		{
			$result =  $this->db->get_where('doctorlogin',$page)->result_array();

			if( is_array($result) && !empty($result) )
			{
				return $result;
			}

		}
	}
	public function clinic_duplicacy_check($typename)
	{
		$email=$this->input->post('email');
		$mobile=$this->input->post('mobile');
		$mobile_count = $this->db->where('mobile',$mobile)->count_all_results($typename);
		$email_count = $this->db->where('email',$email)->count_all_results($typename);
		//echo "<pre>"; print_r($email_count); die;
		if($mobile_count ==0 && $email_count==0)
			return 'OK';
		else if($mobile_count >0 && $email_count>0)
			return 'BOTH';
		else if($mobile_count >0)
			return 'MOBILE';
		else if($email_count >0)
			return 'EMAIL';
	}
	
	public function clinicinsert($drimage,$idproof='',$regproof='')
	{
		$date			= date('Y-m-d h:i:s');
		$objective		= $this->input->post('objective');
		if($objective=='H')
		{
			$typename='hospital';
		}
		else if($objective=='C')
		{
			$typename='clinic';
		}
		$city			= $this->input->post('city');
		$name			= $this->input->post('name');
		$location		= $this->input->post('location');
		$address		= $this->input->post('address');
		$tags			= $this->input->post('tags');
		$about			= $this->input->post('about');
		$package		= $this->input->post('package');
		$services		= $this->input->post('services');
		$email			= $this->input->post('email');
		$mobile			= $this->input->post('mobile');
		$password		= md5($this->input->post('password'));
		$website		= $this->input->post('website');
		$status			= $this->input->post('status');
		
		//$fullname=$this->input->post('name');
		//$name=explode(' ',ucwords($fullname));
		//$fname=$name[0];
		//$lname=@$name[1];
		
		$udata		=		array(
								'FNAME'		=>$name,
								'STATUS'	=>'1',
								'APPROVED'	=>'1',
								'PASSWORD'	=>$password,
								'REG_DATE'	=>date('Y-m-d'),
								'GENDER'	=>'M'
								); 
		if($email)
		$udata['EMAIL']		=	$email;
		if($mobile)
		$udata['MOBILE']	=	$mobile;
	
		if($this->db->insert('hospitallogin',$udata))
		{   
			$thisid = $this->db->insert_id();
			$data=		array(
							 'name'				=>$name,
							 'city'				=>$city,
							 'location'			=>$location,
							 'address'			=>$address,
							 'tag'				=>$tags,
							 'website'			=>$website,
							 'id_proof'			=>$idproof,
							 'med_reg_proof'	=>$regproof,
							 'drimage'			=>$drimage,
							 'mobile'			=>$mobile,	
							 'email'			=>$email,
							 'about'			=>$about,
							 'subscription'		=>$package,
							 'services'			=>$services,
							 'approved'			=>'1',
							 'verified'			=>'1',
							 'status'			=>$status,
							 'uid'				=>$thisid,
							 'creat_date'		=>$date,
							 'created_by'		=>getUserId());
			$this->db->insert($typename,$data);
			$institution_id		= $this->db->insert_id();
			$services 			= $this->input->post('services');
			if(is_array($services) && !empty($services))
			{
				foreach($services as $q)
				{
					$qualdata[]	=	array(
										  'institution_type'	=>$objective,
										  'institution_id'		=>$institution_id,
										  'services_id'			=>$q
										  );
				}
				$this->db->insert_batch('instition_services',$qualdata);
			}
			$msg="Welcome to Upchar , Thanks for joining Upchar Team
			WWW.upchar.shop";
			sendsms($msg,$mobile);
			/*Admin Email Start */
			$this->load->library('azad_lib');
			$body="Welcome to Upchar <BR> Thans for joining Upchar Team <BR>Email: info@upchar.shop ";
			$this->azad_lib->sendMail_admin($email,'Welcome Upchar Hospital',$body);
			/*Admin Email End */
		}
		
		return 1;	
		
		//-----------------
		$mon 		= $this->input->post('mon');
		$tue 		= $this->input->post('tue');
		$wed 		= $this->input->post('wed');
		$thu 		= $this->input->post('thu');
		$fri 		= $this->input->post('fri');
		$sat 		= $this->input->post('sat');
		$sun 		= $this->input->post('sun');
		$from 		= $this->input->post('fromtime');
		$to 		= $this->input->post('totime');
		
		/*if(is_array($mon) && !empty($mon))
		{
			$key		= 0;
			$timings	= $mon[$key];
			//echo "<pre>"; print_r($mon); die;
			for($key2=0;$key2<7;$key2++)
			{	
				$timingdata=array(
								  'user_type'	=>$objective,
								  'user_id'		=>$institution_id,
								  'M'			=>$mon[$key][$key2],
								  'T'			=>$tue[$key][$key2],	
								  'W'			=>$wed[$key][$key2],
								  'TH'			=>$thu[$key][$key2],	
								  'F'			=>$fri[$key][$key2],	
								  'SA'			=>$sat[$key][$key2],	
								  'S'			=>$sun[$key][$key2],	
								  'status'		=>'1'
								  );
								  
				$this->db->insert('timing',$timingdata);
				$sessions=$from[$key][$key2];
				$tid= $this->db->insert_id();
				foreach($sessions as $key3=>$value)
				{
					if($from[$key][$key2][$key3]=='' || $from[$key][$key2][$key3]=='')
					continue;
					$sessiondata = array(
										'timing_id'		=>$tid,
										'from_timing'	=>$from[$key][$key2][$key3],
										'to_timing'		=>$to[$key][$key2][$key3],
										'status'		=>'1'
										);
					$this->db->insert('timing_session',$sessiondata);
				}	
			}
		}*/
		//return ($this->db->affected_rows() != 1) ? false : true;
	}
	
	
	      //10/01/2019
	     // update doctor function
	
	
	public function updatedoctor($id)
	{
		$date			=date('Y-m-d h:i:s');
		$city			=$this->input->post('city');
		$fname			=$this->input->post('t_fname');
		$lname			=$this->input->post('t_lname');
		$gender			=$this->input->post('gender');
		$regno			=$this->input->post('regno');
		$council		=$this->input->post('council');
		$year			=$this->input->post('year');
		$exp			=$this->input->post('exprience');
		$achievement	=$this->input->post('achievement');
		$about			=$this->input->post('about');
		$package		=$this->input->post('package');
		
		$email			=$this->input->post('email');
		$mobile			=$this->input->post('mobile');
		$status			=$this->input->post('status');
	
		$data	=array(
						'fname'			=>$fname,
						'lname'			=>$lname,
						'gender'		=>$gender,
						'city'			=>$city,
						'regd_no'		=>$regno,
						'regd_council'	=>$council,
						'regd_year'		=>$year,
						'exp'			=>$exp,
						'achievement'	=>$achievement,
						'mobile'		=>$mobile,
						'email'			=>$email,
						'about'			=>$about,
						'subscription'	=>$package,
						'approved'		=>'1',
						'verified'		=>'1',
						'status'		=>$status,
						'creat_date'	=>$date,
						'created_by'	=>getUserId(),
						'source'		=>'A'
					);
		$this->db->where('id');
		$this->db->update('profile_dr',$data);
		
			//$data=array('fname'=>$fname,'lname'=>$lname,'gender'=>$gender,'city'=>$city,'regd_no'=>$regno,'regd_council'=>$council,'regd_year'=>$year,'exp'=>$exp,'achievement'=>$achievement,'mobile'=>$mobile,'email'=>$email,'about'=>$about,'subscription'=>$package,'approved'=>'1','verified'=>'1','status'=>$status,'creat_date'=>$date,'created_by'=>getUserId(),'source'=>'A');
				//$this->db->where('id');
				//$this->db->update('profile_dr',$data);    
	
	}
		
	public function get_doctor_fee_time($limit='10',$offset='0',$param=array())
	{	
		$id					= @$param['id'];
		$practice_id 		= $this->db->escape_str($this->uri->segment(4));
		$keyword 			= $this->db->escape_str($this->input->get('keyword',TRUE));
	
		if($id!='')
		{
			$this->db->where("id",$id);
		}
		if($practice_id!='')
		{
			$this->db->where("timing.practice_id",$practice_id);
		}
		if($keyword!='')
		{
			$this->db->where("(profile_dr.fname LIKE '%".$keyword."%' )");
		}
		$this->db->order_by('timing.id','desc');
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS timing.*,timing_session.*,profile_dr.fname,profile_dr.lname,profile_dr.email,profile_dr.mobile,hospital.name,hospital.city',FALSE);
		$this->db->join('dr_practice','dr_practice.id = timing.practice_id','left');
		$this->db->join('profile_dr','profile_dr.id = dr_practice.user_id','left');
		$this->db->join('hospital','hospital.id = dr_practice.institution_id','left');
		$this->db->join('timing_session','timing_session.timing_id = timing.id','left');
		$result = $this->db->get('timing')->result_array();
		
		//echo "<pre>"; print_r($result); die;
		$result = ($limit=='1') ? @$result[0]: $result;	
		return $result;
	}
	
	public function get_doctor($limit='10',$offset='0',$param=array())
	{	
		$id					= @$param['id'];
		$institution_id 	= $this->db->escape_str($this->uri->segment(4));
		//echo "<pre>"; print_r($institution_id); die;
		$keyword 			= $this->db->escape_str($this->input->get('keyword',TRUE));
		$type 				= $this->db->escape_str($this->input->get('type',TRUE));
	
		if($id!='')
		{
			$this->db->where("id",$id);
		}
		if($institution_id!='')
		{
			$this->db->where("dr_practice.institution_id",$institution_id);
		}
		if($keyword!='')
		{
			$this->db->where("(profile_dr.fname LIKE '%".$keyword."%' )");
		}
		if($type!='')
		{
			$this->db->where("TYPE",$type);
		}
		$this->db->order_by('dr_practice.id','desc');
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS dr_practice.*,profile_dr.fname,profile_dr.lname,profile_dr.email,profile_dr.mobile,hospital.name,hospital.city',FALSE);
		$this->db->join('profile_dr','profile_dr.id = dr_practice.user_id','left');
		$this->db->join('hospital','hospital.id = dr_practice.institution_id','left');
		$result = $this->db->get('dr_practice')->result_array();
		
		//echo "<pre>"; print_r($result); die;
		$result = ($limit=='1') ? @$result[0]: $result;	
		return $result;
	}
	
	public function get_hospital($limit='10',$offset='0',$param=array())
	{	
		$id				= @$param['id'];
		$keyword 		= $this->db->escape_str($this->input->get('keyword',TRUE));
		$type 			= $this->db->escape_str($this->input->get('type',TRUE));
		$subscription 	= $this->db->escape_str($this->input->get('subscription',TRUE));
	
		if($id!='')
		{
			$this->db->where("id",$id);
		}
		if($keyword!='')
		{
			$this->db->where("(name LIKE '%".$keyword."%' )");
		}
		if($type!='')
		{
			$this->db->where("TYPE",$type);
		}
		if($subscription!='')
		{
			$this->db->where("subscription",$subscription);
		}
		$this->db->order_by('id','desc');
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS hospital.*,hospitallogin.TYPE',FALSE);
		$this->db->join('hospitallogin','hospitallogin.USERID = hospital.uid','left');
		$result = $this->db->get('hospital')->result_array();
		
		//echo "<pre>"; print_r($result); die;
		$result = ($limit=='1') ? @$result[0]: $result;	
		return $result;
	}
	
	public function get_hospital_list($param=array())
	{	
		$id			= @$param['id'];
		$keyword 	= $this->db->escape_str($this->input->get('keyword',TRUE));
		$type 		= $this->db->escape_str($this->input->get('type',TRUE));
	
		if($id!='')
		{
			$this->db->where("id",$id);
		}
		
		if($keyword!='')
		{
			$this->db->where("(name LIKE '%".$keyword."%' )");
		}
		if($type!='')
		{
			$this->db->where("TYPE",$type);
		}
		$this->db->order_by('id','desc');
		//$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS hospital.*,hospitallogin.TYPE',FALSE);
		$this->db->join('hospitallogin','hospitallogin.USERID = hospital.uid','left');
		$result = $this->db->get('hospital')->result_array();
		//$result = ($limit=='1') ? @$result[0]: $result;	
		return $result;
	}
	
	public function get_clinic($limit='10',$offset='0',$param=array())
	{	
		$id			= @$param['id'];
		$keyword 	= $this->db->escape_str($this->input->get('keyword',TRUE));
		$type 		= $this->db->escape_str($this->input->get('type',TRUE));
	
		if($id!='')
		{
			$this->db->where("id",$id);
		}
		
		if($keyword!='')
		{
			$this->db->where("(name LIKE '%".$keyword."%' )");
		}
		if($type!='')
		{
			$this->db->where("TYPE",$type);
		}
		$this->db->order_by('id','desc');
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS clinic.*',FALSE);
		//$this->db->join('hospitallogin','hospitallogin.USERID = hospital.uid','left');
		$result = $this->db->get('clinic')->result_array();
		
		//echo "<pre>"; print_r($result); die;
		$result = ($limit=='1') ? @$result[0]: $result;	
		return $result;
	}

    public function updatehospital($drimage='',$idproof='',$regproof='',$id,$user_id)
    {	
		$date			=	date('Y-m-d h:i:s');
		$type			=	$this->input->post('type');
		$name			=	$this->input->post('name');
		$website		=	$this->input->post('website');
		$city			=   $this->input->post('city');
		$location		=	$this->input->post('location');
		$address		=	$this->input->post('address');
		$tags			=	$this->input->post('tags');
		$services		=	$this->input->post('services');
		$about			=	$this->input->post('about');
		$email			=	$this->input->post('email');
		$mobile			=	$this->input->post('mobile');
		$status			=	$this->input->post('status');
		$package		=	$this->input->post('package');
		
		$udata	=	array(
						'FNAME'		=>$name,
						'EMAIL'		=>$email,
						'MOBILE'	=>$mobile,
						'STATUS'	=>'0',
						'APPROVED'	=>'1',
						'REG_DATE'	=>date('Y-m-d'),
						'GENDER'	=>'M',
						'TYPE'		=>$type,
						); 
		$this->db->where('USERID',$user_id);
		if($this->db->update('hospitallogin',$udata))
		{
			$data	=	array(
							'name'			=>$name,
							'website'		=>$website,
							'city'			=>$city,
							'location'		=>$location,
							'address'		=>$address,
							//'tags'			=>$tags,
							'services'		=>$services,
							'about'			=>$about,
							'mobile'		=>$mobile,
							'email'			=>$email,
							'drimage'		=>$drimage,
							'id_proof'		=>$idproof,
							'med_reg_proof'	=>$regproof,
							'subscription'	=>$package,
							'status'		=>$status,
							'modified_date'	=>$date,
							'modified_by'	=>getUserId(),
							);
			$this->db->where('id',$id);
			$qq= $this->db->update('hospital',$data);
			return $qq;
		}
    }

    public function updategallery($id,$picture)
	{
		$date=date('Y-m-d h:i:s');
		// $image=$this->input->post('image');
		$shot_description=$this->input->post('shot_description');
		$long_description=$this->input->post('long_description');
		$status=$this->input->post('status');
		//echo "<pre>";print_r($shot_description);die;
		$qq=$this->db->query("update hospitalgallery SET date='$date',shot_description='$shot_description',long_description='$long_description',image= '$picture',status='$status' where id='".$id."'");
		return $qq;
	}

	public function updatedocgallery($id,$picture)
	{
		$date=date('Y-m-d h:i:s');
		$shot_description=$this->input->post('shot_description');
		$long_description=$this->input->post('long_description');
		$status=$this->input->post('status');
		$qq=$this->db->query("update doctorgallery SET date='$date',shot_description='$shot_description',long_description='$long_description',image= '$picture',status='$status' where id='".$id."'");
		//echo "<pre>";print_r($qq);die;
		return $qq;
	}


	public function updateclinic($id)
	{
		$date=date('Y-m-d h:i:s');
		$city=$this->input->post('city');
		$name=$this->input->post('name');
		$location=$this->input->post('location');
		$address=$this->input->post('address');
		$tags=$this->input->post('tags');
		$services=$this->input->post('services');
		$about=$this->input->post('about');
		$email=$this->input->post('email');
		$mobile=$this->input->post('mobile');
		$website=$this->input->post('website');
		$status=$this->input->post('status');
		$qq=$this->db->query("update clinic SET name='$name',creat_date='$date',website='$website',location='$location',address='$address',tag='$tags', about='$about',email='$email', mobile='$mobile',services='$services',city='$city',status='$status' where id='".$id."'");
		return $qq;
    }

    public function gallery($image)
	{
		$date=date('Y-m-d h:i:s');
		$long=$this->input->post('long');
		$shot=$this->input->post('shot');
		//$id=base64_decode($this->input->post('id'));

	   //$image=$this->input->post('uploadimage')
		$data=array('shot_description'=>$shot,'long_description'=>$long,'image'=>$image,'date'=>$date,);
		
		$qq=$this->db->insert('gallery',$data);
	   return $qq;
	   $drid= $this->db->insert_id();
	}

	public function add_appointment()
	{
		
		 //$drid= $this->db->insert_id();
		//$date=date('Y-m-d h:i:s');
		$appointment_name	=$this->input->post('appointment_name');
		$appointment_mobile =$this->input->post('appointment_mobile');
		$institute_id 		=$this->input->post('institute_id');
		$appointment_email  =$this->input->post('appointment_email');
		$amount 			=$this->input->post('amount');
		$doctor_id  		=$this->input->post('doctor_id');
		//echo "<pre>";print_r($appointment_name);die;
		$data=array('appointment_name'=>$appointment_name,'appointment_mobile'=>$appointment_mobile,'institute_id'=>$institute_id,'appointment_email'=>$appointment_email,'amount'=>$amount,'doctor_id'=>$doctor_id);

		$query=$this->db->insert('appointment',$data);
		return $query;
	}
		
	public function biomedicalmachine($image)
	{
		
		 //$drid= $this->db->insert_id();
		$date=date('Y-m-d h:i:s');
		$short=$this->input->post('short');
		$long=$this->input->post('long');
		$price=$this->input->post('price');
		$mrpprice=$this->input->post('mrp_price');
		$discount=$this->input->post('discount');
		$company=$this->input->post('company_name');
		$distributor=$this->input->post('distributor_name');
		$distributor_mobile=$this->input->post('distributor_mobile');
		$distributor_email=$this->input->post('distributor_email');
		$equipment=$this->input->post('equipment');

		$data=array('short_desc'=>$short,'long_desc'=>$long,'price'=>$price,'image'=>$image,'date'=>$date,'company_name'=>$company,'distributor_name'=>$distributor,'mrp_price'=>$mrpprice,'discount_price'=>$discount,'distributor_email'=>$distributor_email,'distributor_mobile'=>$distributor_mobile,'equipment'=>$equipment);
		$query=$this->db->insert('biomedical',$data);
		return $query;
	}
		
	function deleterecord($id)
	{
		$this->db->query("delete from appointment where appointment_id='".$id."'");
	}
      
    function deletehospital($id)
    {
       $this->db->query("delete from appointment where appointment_id='".$id."'");
    }
	
    function deletehistory($id)
    {
       $this->db->query("delete from appointment where appointment_id='".$id."'");
    }
	
    function gallerydelete($id)
    {
       $this->db->query("delete from hospitalgallery where id='".$id."'");
    }

    function gallerydocdelete($id)
    {
        $this->db->query("delete from doctorgallery where id='".$id."'");
    }
 
    public function deletedoctor($id)
    {
        //$this->db->query("delete from profile_dr where id='".$id."'");

      //  $this->db->join("profile_dr", "doctorlogin.USERID = profile_dr.user_id")->where("profile_dr.user_id",$id)->delete("doctorlogin");
      
          return $this->db->query("
             DELETE t1.*, t2.*
              FROM profile_dr t1, doctorlogin t2 
               WHERE t1.user_id = t2.USERID 
                    AND t1.id = '".$id."'");

    }
     
     
    public function hospitaldelete($id)
    {
        return $this->db->query("
        DELETE t1.*, t2.*
        FROM hospital t1 , hospitallogin t2
        WHERE t1.uid = t2.USERID
        AND t1.id = '".$id."'
        "); 
    }
	
	public function clinic_delete($id)
    {
		return $this->db->query("delete from clinic where id='".$id."'");
        /*return $this->db->query("
        DELETE t1.*, t2.*
        FROM clinic t1 , hospitallogin t2
        WHERE t1.uid = t2.USERID
        AND t1.id = '".$id."'
        "); */
    }

	public function calculate()
	{
		$fee=$this->input->post('fee');
		$per=$this->input->post('per');
		//$rr=$fee*$per;
		$total=($fee * $per)/100;
		//$total=($rr*$per)/100;
		$data=array('fee'=>$fee,'percent'=>$per,'total'=>$total);
		$qq=$this->db->insert('account',$data);
	   return $qq;
	}
  
	public function advertisment($image)
	{
		$date=date('Y-m-d h:i:s');
		$short=$this->input->post('short');
		$long=$this->input->post('long');
		$page=$this->input->post('page');
		$active=$this->input->post('activeradio');
		$data=array('short_description'=>$short,'long_description'=>$long,'page'=>$page,'image'=>$image,'status'=>$active,'creat_date'=>$date);
		$query=$this->db->insert('advertisement',$data);
		return $query;
	}  
}
