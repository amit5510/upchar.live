<?php
class Adminmodel extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    




function GenerateEnctryptID($id)
	{
	$this->load->library('encrypt');
	$msg = $id;
	$key = '!@#0978123shoppingincp!@#0978123';

	$encrypted_string = $this->encrypt->encode($msg, $key);	
	$encrypted_string=str_replace('/', '--__--', $encrypted_string);
	return $encrypted_string;
	}

function updatestatus_STA($mer_id,$cur_sta)
  {
  $data = array('STATUS' =>$cur_sta);
  $this->db->where('USER_ID', $mer_id);
  $this->db->update('admin_login', $data);
  $this->db->where('ID', $mer_id);
  $this->db->update('admin_merchant', $data);
  }

//code for decode record id//
function Id_decode($encrypted_string1)
	{
	$encrypted_string=str_replace('--__--', '/', $encrypted_string1);
	$this->load->library('encrypt');
	$key = '!@#0978123shoppingincp!@#0978123';
	$id = $this->encrypt->decode($encrypted_string, $key);
	return $id;
	}

//code to check credential for login//
public function check_credentials()
	{
	$this->db->where('USERNAME',$this->input->post('username'));
	$this->db->where('PASSWORD',md5($this->input->post('password')));
	$this->db->where('RIGHT','A');
	$query = $this->db->get('admin_login');
	if($query->num_rows() == 1)
		{
		return true;
		}
		else
		{
		return false;
		}
	}

//code for add user details to database //
function userfinal($data)
		{
       	$query=$this->db->insert('admin_user',$data);  
		$user_id=$this->db->insert_id();
		$username=$this->input->post('userid');
		$pass=md5($this->input->post('pass'));
		$date=date("Y-m-d H:i:s");
		$data1 = array('USER_ID' => $user_id,'USERNAME' => $username,'PASSWORD' => $pass,'STATUS' => 1,'DATE'=>$date);
		$query1=$this->db->insert('admin_user_login',$data1);
		if($query && $query1)
			{
			return true;
			}
			else
			{
			return false;
			}
		}    

//code for add merchant details to database //
function merchantfinal()
  {
  $date=date("Y-m-d H:i:s");
  // Get default lang//
  $Def_Lang=$this->db->get_where('language',array('default'=>'Y'))->row('id');
  
  if($Def_Lang==$this->input->post('lang'))
   {
   $lang='Y';
   }
   else
   {
   $lang='N';
   }
   
   $this->load->library('Mylomart_lib');
			$shop=$this->input->post('shop_name');
			$mart=$this->mylomart_lib->getMart($this->input->post('mart'));
			$cityname=$this->mylomart_lib->getCity($this->input->post('city'));
			$latlongjson=$this->mylomart_lib->getlatlong( str_replace(" ",'+', $shop.', '. $mart. ', ' . $cityname ) );
			$lat= $latlongjson['lat'];
			$lng= $latlongjson['long'];
   
   $days=$this->input->post('day');
    $times=$this->input->post('time');
	$dayname=array('mon','tue','wed','thu','fri','sat','sun');
    $day=array();
   foreach($dayname as $d){
	   
	   if(isset($days[$d]) && $days[$d]=='1'){
		   $time= explode('-',$times[$d]);
		   $day[$d]['status']='open';
		   $day[$d]['from']= $time[0];
		   $day[$d]['to']= $time[1];
	   }
	   else{
		   $day[$d]['status']='closed';
		   $day[$d]['from']= '9:00';
		   $day[$d]['to']= '20:00';
	   }
   }
   
   $shop_time=serialize($day);
   
  //Setting values for tabel columns //for merchant table entry 
  $data = array('industry' => $this->input->post('industry'),'F_STATUS' => $this->input->post('F_STATUS'),'EMAIL' => $this->input->post('email'),'TXN_EMAIL' => $this->input->post('txnemail'),'TXN_MOBILE' => $this->input->post('txnmobile'),'TIMMINGS' => $shop_time,'WEBSITE' => $this->input->post('web_name'),'KEYWORD' => $this->input->post('keyword'),'MOBILE' => $this->input->post('mobile'),'ZIPCODE' => $this->mylomart_lib->getMartPin($this->input->post('mart')),'fname'=>$this->input->post('fname'),'lname'=>$this->input->post('lname'),'address'=>$this->input->post('address'),'mart'=>$this->input->post('mart'),'city'=>$this->input->post('city'),'state'=>$this->input->post('state'),'LAT'=>$lat,'LNG'=>$lng,'country'=>$this->input->post('country'),'SHOP_DETAIL'=>$this->input->post('shop_details'),'shop'=>$this->input->post('shop_name'),'brand'=>$this->input->post('brand_name'),'BLOCK' => $this->input->post('block'),'SHOPNO' => $this->input->post('shopno'),'location'=>$this->input->post('location'),'M_STATUS' => "N",'A_STATUS' => "N",'E_STATUS' => "N",'P_STATUS' => "N",'WEB_STATUS' => "N",'SHOW' => "N",'default_lang'=>$lang,'STATUS' => 1,'DATE'=>$date,'CATEGORY'=>implode(',',$this->input->post('category'))); 
  $query=$this->db->insert('admin_merchant',$data);
  $user_id=$this->db->insert_id();
  
  //For merchant language data entry.
  $datalanguage = array('merid'=>$user_id,'fname'=>$this->input->post('fname'),'lname'=>$this->input->post('lname'),'address'=>$this->input->post('address'),'city'=>$this->input->post('city'),'state'=>$this->input->post('state'),'country'=>$this->input->post('country'),'shop'=>$this->input->post('shop_name'),'brand'=>$this->input->post('brand_name'),'location'=>$this->input->post('location'),'details'=>$this->input->post('shop_details'),'lang'=>$this->input->post('lang'),'status'=>'1','date'=>$date);
  $this->db->insert('merchant_lang',$datalanguage);
  
  $username=$this->input->post('userid');
  $pass=md5($this->input->post('pass'));
  $date=date("Y-m-d H:i:s");
  // For merchant login table entry//
  $data1 = array('USER_ID' => $user_id,'USERNAME' => $username,'PASSWORD' => $pass,'STATUS' => 1,'RIGHT' => 'M','DATE'=>$date);
  $query1=$this->db->insert('admin_login',$data1);
   
   $this->load->library('Slug_lib');
   if (class_exists('Slug_lib')) 
   {
		$this->slug_lib->mer_slugGen($user_id);
	}

  
  if($query && $query1)
   {
   return true;
   }
   else
   {
   return false;
   }
  }


//code for import merchant details to database via csv//
function import_merchantDB()
 {
	  
	set_time_limit(0);  
	$date=date("Y-m-d H:i:s");
	$Def_Lang=$this->db->get_where('language',array('default'=>'Y'))->row('id');
	if($Def_Lang==$this->input->post('lang'))
		$lang='Y';
	else
		$lang='N';
	
	$this->load->library('Mylomart_lib');
	$stateid=$this->input->post('state');
	$martid=$this->input->post('mart');
	$cityid=$this->input->post('city');
	$mart=$this->mylomart_lib->getMart($martid);
	$cityname=$this->mylomart_lib->getCity($cityid);
	
	
	$csvfilename = $_FILES["csvfile"]["name"];
	//get extention name
	if($csvfilename!='')
	{
		 $ext= pathinfo($csvfilename, PATHINFO_EXTENSION);
		
		if($ext=='csv')	
		{
			//$name = $_FILES['csvfile']['name'];
			$actual_name = pathinfo($csvfilename,PATHINFO_FILENAME);
			$extension = pathinfo($csvfilename, PATHINFO_EXTENSION);

			$i = 1;
			while(file_exists('./upload/sheets'.$actual_name.'.'.$extension))
			{
				$actual_name = (string)$actual_name.''.$i;
				$csvfilename = $actual_name.'.'.$extension;
				$i++;
			}
				
			$target_path = './upload/sheets/';
			$target_pathnew = $target_path.$csvfilename; 
			
			if(move_uploaded_file($_FILES['csvfile']['tmp_name'], $target_pathnew))
			{
				$file = fopen($target_pathnew,'r');
				
				$error=null;
				$success=null;
				$createmicrosite=false;
				
				while(!feof($file))
				{
					$array=fgetcsv($file);
					if(!empty($array))
					{
						if($array[1]=='')
							continue;
						
						$category=$array[6];
						/* $category=explode(',',$category);
						foreach($category as $cat)
						{
							
						} */
						
						
					$userid=trim($array[0]);
					$pass=$array[1];
					$fname=$array[2];
					$lname=$array[3];
					$shop_name=trim(ucwords($array[4]));
					$category=$array[5]; // required action
					$shopno=$array[6];
					$block=$array[7];
					$address=trim($array[8]);
					$location=trim($array[9]);
					$zip=trim($array[10]);
					$email=trim($array[11]);
					$txnemail=trim($array[12]);
					$mobile=str_replace(" ",'',trim($array[13]));
					$txnmobile=str_replace(" ",'',trim($array[14]));
					$web_name=$array[15];
					$brand_name=$array[16];
					$keyword=$array[17];
					$shop_details=$array[18];
					$shop_time=$array[19];
					
					$micrositetitle=$array[20];
					@$imagelogo=$array[21];
					@$sdescription=$array[22];
					@$cuisine=$array[23];
					@$aboutmerchant=$array[24];
					@$merservices=$array[25];
					@$slider1=$array[26];
					@$slider2=$array[27];
					@$slider3=$array[28];
					@$slider4=$array[29];
					@$slider5=$array[30];
					@$slider6=$array[31];
					
					$micrositedetails='';
					
						
					$shop=$this->input->post('shop_name');
					$latlongjson=$this->mylomart_lib->getlatlong( str_replace(" ",'+', $shop.', '. $mart. ', ' . $cityname ) );
					$lat= $latlongjson['lat'];
					$lng= $latlongjson['long'];
					if($lat==null)
						$lat=0.0;
					if($lng==null)
						$lng=0.0;
					
					
				   
					/* $days=$this->input->post('day');
					$times=$this->input->post('time');*/
					$dayname=array('mon','tue','wed','thu','fri','sat','sun');
					$day=array();
				   foreach($dayname as $d){
					   
					   if($shop_time!=''){
						   $time= explode('-',$shop_time);
						   $day[$d]['status']='open';
						   $day[$d]['from']= $time[0];
						   $day[$d]['to']= $time[1];
					   }
					   else{
						   $day[$d]['status']='open';
						   $day[$d]['from']= '9:00';
						   $day[$d]['to']= '20:00';
					   }
				   }
				   
				   $shop_time=serialize($day); 
					
					
					//Setting values for tabel columns //for merchant table entry
					$data = array('industry' => $this->input->post('industry'),'F_STATUS' => $this->input->post('F_STATUS'),'EMAIL' => $email,'TXN_EMAIL' => $txnemail,'TXN_MOBILE' => $txnmobile,'TIMMINGS' => $shop_time,'WEBSITE' => $web_name,'KEYWORD' => $keyword,'MOBILE' => $mobile,'ZIPCODE' =>$this->mylomart_lib->getMartPin($this->input->post('mart')),'fname'=>$fname,'lname'=>$lname,'address'=>$address,'mart'=>$martid,'city'=>$cityid,'state'=>$stateid,'LAT'=>$lat,'LNG'=>$lng,'country'=>'India','SHOP_DETAIL'=>$shop_details,'shop'=>$shop_name,'brand'=>$brand_name,'BLOCK' => $block,'SHOPNO' => $shopno,'location'=>$location,'M_STATUS' => "N",'A_STATUS' => "N",'E_STATUS' => "N",'P_STATUS' => "N",'WEB_STATUS' => "N",'SHOW' => "N",'default_lang'=>$lang,'STATUS' => 1,'DATE'=>$date,'CATEGORY'=>$category); 
				  
				  $query=$this->db->insert('admin_merchant',$data);
				  $user_id=$this->db->insert_id();
				  
				  //For merchant language data entry.
				  $datalanguage = array('merid'=>$user_id,'fname'=>$fname,'lname'=>$lname,'address'=>$address,'city'=>$cityid,'state'=>$stateid,'country'=>'India','shop'=>$shop_name,'brand'=>$brand_name,'location'=>$location,'details'=>$shop_details,'lang'=>$this->input->post('lang'),'status'=>'1','date'=>$date);
				  
				  $this->db->insert('merchant_lang',$datalanguage);
				  
				  $username=$userid;
				  $pass=md5($pass);
				  $date=date("Y-m-d H:i:s");
				  
				  // For merchant login table entry//
				  $data1 = array('USER_ID' => $user_id,'USERNAME' => $username,'PASSWORD' => $pass,'STATUS' => 1,'RIGHT' => 'M','DATE'=>$date);
				  $query1=$this->db->insert('admin_login',$data1);
				   
					   $this->load->library('Slug_lib');
					   $this->slug_lib->mer_slugGen($user_id);
					
					if($imagelogo != '')
					{	$datasliderimg = array('MER_ID' => $user_id,'IMAGE' => 'dlf/'.$imagelogo,'SHOW' => 'Y','FRONT' => 'Y','ADDDATE'=>$date);
						$query1=$this->db->insert('deal_images',$datasliderimg);
					}
					  if($query && $query1)
					   {
					  $createmicrosite= true;
					   }
					   else
					   {
					    $createmicrosite= false;
					   }
					   
					if($createmicrosite && $micrositetitle!='' )
					{
						$finalimgbanner=$finalimg1=$finalimg2=$finalimg3=$facts='';
						
						$datamicrsite1 = array('MER_ID' =>$user_id,'NAME' =>$micrositetitle,'IMAGE' =>$imagelogo,'DETAILS' =>$micrositedetails,'SHOW' => "N",'STATUS' => 1,'DATE'=>$date);
						$query=$this->db->insert('admin_merchant_details',$datamicrsite1); 
						
						$merdata = array('MER_ID' =>$user_id,'SHORT_DESCRIPTION' =>$sdescription,'CUISINE' =>$cuisine,'DESCRIPTION' =>$this->input->post('description'),'BANNER_IMG'=>$finalimgbanner,'ABOUT' =>$aboutmerchant,
						'ABOUT_IMG_1'=>$finalimg1,'ABOUT_IMG_2'=>$finalimg2,'ABOUT_IMG_3'=>$finalimg3,'QUICKFACTS' =>$facts,
						'SERVICES' =>$merservices,'DATE'=>$date, 'lang'=>$this->input->post('lang'), 'SHOW'=>'Y');

						$query1=$this->db->insert('merchant_site',$merdata);
					/* 	
						//slider image 
						$date=date("Y-m-d");
						$dataslider =array();
						for($si=1;$si<=6;$si++){
						if(${"slider$si"}!='')
							array_push($dataslider,array('MER_ID' => $user_id,'IMAGE' => ${"slider$si"},'SHOW' => 'Y','ADDDATE'=>$date););
						}
						
						$query1=$this->db->insert_batch('deal_images',$dataslider); */
				
					}
					
					
					
					
				
					}
				}
				fclose($file);
				echo 'Imported  Successfully';
			}
		    else
			{
			 echo 'UNABLE TO UPLOAD FILE';die;
			}
		}
		else{
			echo 'NOT A CSV FILE';die;
		}
	}
	else 
	{
		echo  'FILE NOT SELECTED'; die;
	}
	
	
	
	
	
  
   
   
  }

  
function updateAccess_Status($mer_id,$cur_st,$col)
		{
		$data = array($col =>$cur_st);
		$this->db->where('USER_ID', $mer_id);
		$this->db->update('admin_login', $data);
		}
  
function updatestatus($mer_id,$cur_st)
		{
		$data = array('M_STATUS' =>$cur_st);
		$this->db->where('ID', $mer_id);
		$this->db->update('admin_merchant', $data);
		}

function logostatus($mer_id,$cur_st)
		{
		$data = array('logoST' =>$cur_st);
		$this->db->where('ID', $mer_id);
		$this->db->update('admin_merchant', $data);
		}

function updatestatus_ADD($mer_id,$cur_st)
		{
		$data = array('A_STATUS' =>$cur_st);
		$this->db->where('ID', $mer_id);
		$this->db->update('admin_merchant', $data);
		}

function updatestatus_MAIL($mer_id,$cur_st)
		{
		$data = array('E_STATUS' =>$cur_st);
		$this->db->where('ID', $mer_id);
		$this->db->update('admin_merchant', $data);
		}

function updatestatus_PERSON($mer_id,$cur_st)
		{
		$data = array('P_STATUS' =>$cur_st);
		$this->db->where('ID', $mer_id);
		$this->db->update('admin_merchant', $data);
		}

function updatestatus_WEB($mer_id,$cur_st)
		{
		$data = array('WEB_STATUS' =>$cur_st);
		$this->db->where('ID', $mer_id);
		$this->db->update('admin_merchant', $data);
		}

function updatestatus_SHOW($mer_id,$cur_st)
		{
		$data = array('SHOW' =>$cur_st);
		$this->db->where('ID', $mer_id);
		$this->db->update('admin_merchant', $data);
		}

function update_user_rec($id)
		{
		$data = array(
		      'F_NAME' =>$this->input->post('fname'),
			  'L_NAME' =>$this->input->post('lname'),
			  'MARITAL_STATUS' =>$this->input->post('mstatus'),
			  'GENDER' =>$this->input->post('gender'),
			  'DOB' =>$this->input->post('dob'),
			  'ADDRESS' =>$this->input->post('address'),
			  'EMAIL' =>$this->input->post('email'),
			  'PHONE' =>$this->input->post('phn'),
			  'MOBILE' =>$this->input->post('mobile'),
			  'CITY' =>$this->input->post('city'),
			  'STATE' =>$this->input->post('state'),
			  'COUNTRY' =>$this->input->post('country'),
			  'ZIPCODE' =>$this->input->post('zip')
			  );
			  
		$this->db->where('ID', $id);
		$this->db->update('admin_user', $data); 
		}
		
		
function reset_user_pass($id,$pass)
		{
		$data = array('PASSWORD' =>$pass);
		$this->db->where('USER_ID', $id);
		$query=$this->db->update('admin_user_login', $data); 
		}		

function reset_merchant_pass($id,$pass)
		{
		$data = array('PASSWORD' =>$pass);
		$this->db->where('USER_ID', $id);
		$this->db->where('RIGHT', 'M');
		$query=$this->db->update('admin_login', $data); 
		}		


function update_subdomain($id,$sd)
		{
		$data = array('subdomain' =>$sd);
		$this->db->where('ID', $id);
		//$this->db->where('RIGHT', 'M');
		$query=$this->db->update('admin_merchant', $data); 
		}		


function update_merchant_rec($id)
		{
			$this->load->library('Mylomart_lib');
			$shop=$this->input->post('shop_name');
			$mart=$this->mylomart_lib->getMart($this->input->post('mart'));
			$cityname=$this->mylomart_lib->getCity($this->input->post('city'));
			$latlongjson=$this->mylomart_lib->getlatlong( str_replace(" ",'+', $shop.', '. $mart. ', ' . $cityname ) );
			$lat= $latlongjson['lat'];
			$lng= $latlongjson['long'];
			
			
			 $days=$this->input->post('day');
			 $times=$this->input->post('time');
   
			$dayname=array('mon','tue','wed','thu','fri','sat','sun');
			$day=array();
		   foreach($dayname as $d){
			   
			   if(isset($days[$d]) && $days[$d]=='1'){
				   $time= explode('-',$times[$d]);
				   $day[$d]['status']='open';
				   $day[$d]['from']= $time[0];
				   $day[$d]['to']= $time[1];
			   }
			   else{
				   $day[$d]['status']='closed';
				   $day[$d]['from']= '9:00';
				   $day[$d]['to']= '20:00';
			   }
		   }
		   
		   $shop_time=serialize($day);
		$data = array(
		'industry' => $this->input->post('industry'),
		'EMAIL' => $this->input->post('email'),
		'TXN_EMAIL' => $this->input->post('txnemail'),
		'TXN_MOBILE' => $this->input->post('txnmobile'),
		'TIMMINGS' => $shop_time,
		'WEBSITE' => $this->input->post('web_name'),
		'KEYWORD' => $this->input->post('keyword'),
		'MOBILE' => $this->input->post('mobile'),
		'ZIPCODE' => $this->mylomart_lib->getMartPin($this->input->post('mart')),

		'LNAME' => $this->input->post('lname'),
		'FNAME' => $this->input->post('fname'),
		'ADDRESS' => $this->input->post('address'),
		
		'CITY' => $this->input->post('city'),
		'STATE' => $this->input->post('state'),
		'MART' => $this->input->post('mart'),
		
		'LAT' => $lat,
		'LNG' => $lng,
		
		'COUNTRY' => $this->input->post('country'),
		'SHOP' => $this->input->post('shop_name'),
		'BRAND' => $this->input->post('brand_name'),
		'CATEGORY' => implode(',',$this->input->post('category')),
		'BLOCK' => $this->input->post('block'),
		'SHOPNO' => $this->input->post('shopno'),
		'LOCATION' => $this->input->post('location'),
		'SHOP_DETAIL' => $this->input->post('shop_details'),
		'F_STATUS' => $this->input->post('F_STATUS')
		);
	
		$this->db->where('ID', $id);
		$this->db->update('admin_merchant', $data); 
		}

function update_ratelink($id)
	{
		
			
			
		$count= $this->db->where('MER_ID',$id)->count_all_results('merchant_forigen_rating');
		if($count >= 1)
		{
			$data = array(
			'REF_URL' => $this->input->post('url'),
			'REF_SITE' => $this->input->post('site')
			);
			
			$this->db->where('MER_ID', $id);
			$this->db->update('merchant_forigen_rating', $data); 
		}
		else
		{
			$data = array(
			'REF_URL' => $this->input->post('url'),
			'REF_SITE' => $this->input->post('site'),
			'MER_ID' => $id
			);
			$this->db->insert('merchant_forigen_rating',$data); 
		}
		
	}


function catfinal($data)
		{
       	$query=$this->db->insert('admin_addcategory',$data);  
		if($query)
			{
			return true;
			}
			else
			{
			return false;
			}
		}    



function update_cat($id)
		{
		$new_cat=$this->input->post('catname');	
		$data_taable = array('NAME' =>$new_cat);
		
		$data['record'] = $this->db->get_where('admin_addcategory', array('ID' => $id));	
		foreach ($data['record']->result() as $row)
				{
				$old_cat=$row->NAME;	
				}
		
		if($new_cat==$old_cat)
			{
			$this->db->where('ID', $id);
			$this->db->update('admin_addcategory', $data_taable); 	
			return '<div class="alert alert-success alert-dismissable" style="width:78%;">
                  	<i class="fa fa-check"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b>Alert!</b> Category Updated Successfully.
                  </div>';
			}
			else
			{
				
			$this->db->where('NAME', $new_cat);
			$this->db->where('CAT_TYPE', 'SB');
			$count = $this->db->count_all_results('admin_addcategory');
			if($count==0)
				{
				$this->db->where('ID', $id);
				$this->db->update('admin_addcategory', $data_taable);
				return '<div class="alert alert-success alert-dismissable" style="width:78%;">
                  			<i class="fa fa-check"></i>
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    		<b>Alert!</b> Category Updated Successfully.
                  		</div>';
				}
				else
				{
				return '<div class="alert alert-danger alert-dismissable" style="width:78%;">
                  			<i class="fa fa-check"></i>
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    		<b>Alert!</b> This Category already in use. Please Enter Another One.
                  		</div>';
				}
			}
			  
		
		}

function updatestatus_EXP($EXP_id,$cur_st)
		{
		$data = array('APPROVAL' =>$cur_st);
		$this->db->where('ID', $EXP_id);
		$this->db->update('admin_buzz_ex', $data);
		}

//code for update coupon category//
function update_catcoupon($id)
		{
		$new_cat=$this->input->post('catname');	
		$data_taable = array('NAME' =>$new_cat);
		
		$data['record'] = $this->db->get_where('admin_addcategory', array('ID' => $id));	
		foreach ($data['record']->result() as $row)
				{
				$old_cat=$row->NAME;	
				}
		
		if($new_cat==$old_cat)
			{
			$this->db->where('ID', $id);
			$this->db->update('admin_addcategory', $data_taable); 	
			return '<div class="alert alert-success alert-dismissable" style="width:78%;">
                  	<i class="fa fa-check"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b>Alert!</b> Category Updated Successfully.
                  </div>';
			}
			else
			{
				
			$this->db->where('NAME', $new_cat);
			$this->db->where('CAT_TYPE', 'CO');
			$count = $this->db->count_all_results('admin_addcategory');
			if($count==0)
				{
				$this->db->where('ID', $id);
				$this->db->update('admin_addcategory', $data_taable);
				return '<div class="alert alert-success alert-dismissable" style="width:78%;">
                  			<i class="fa fa-check"></i>
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    		<b>Alert!</b> Category Updated Successfully.
                  		</div>';
				}
				else
				{
				return '<div class="alert alert-danger alert-dismissable" style="width:78%;">
                  			<i class="fa fa-check"></i>
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    		<b>Alert!</b> This Category already in use. Please Enter Another One.
                  		</div>';
				}
			}
		}
		
/*		
//code for add merchant details to database //
function addmerdetails($mer_id)
		{
		$date=date("Y-m-d H:i:s");
		$imagenameSESSION = $_SESSION["IMAGE_FINDER_UPDATE"];
		if($imagenameSESSION=='')
			{
			//Setting values for tabel columns
			$data = array('MER_ID' =>$mer_id,'NAME' =>$this->input->post('title'),'DETAILS' =>$this->input->post('details'),'SHOW' => "N",'STATUS' => 1,'DATE'=>$date);
			$query=$this->db->insert('admin_merchant_details',$data);  
			unset($_SESSION["IMAGE_FINDER_UPDATE"]);
			}
			else
			{
			//Setting values for tabel columns
			$data = array('MER_ID' =>$mer_id,'NAME' =>$this->input->post('title'),'IMAGE' =>$imagenameSESSION,'DETAILS' =>$this->input->post('details'),'SHOW' => "N",'STATUS' => 1,'DATE'=>$date);
			$query=$this->db->insert('admin_merchant_details',$data); 
			unset($_SESSION["IMAGE_FINDER_UPDATE"]); 
			}
			
       	if($query)
			{
			return true;
			}
			else
			{
			return false;
			}
		}    
*/		


function addmerdetails($mer_id,$image_name1,$image_name2)
{
	$date=date("Y-m-d H:i:s");
	$imagenameSESSION = $_SESSION["IMAGE_FINDER_UPDATE"];
			if($imagenameSESSION=='')
			{
			//Setting values for tabel columns
			$data = array('MER_ID' =>$mer_id,'NAME' =>$this->input->post('title'),'DETAILS' =>$this->input->post('details'),'SHOW' => "N",'STATUS' => 1,'DATE'=>$date);
			$query=$this->db->insert('admin_merchant_details',$data);  
			unset($_SESSION["IMAGE_FINDER_UPDATE"]);
			}
			else
			{
			//Setting values for tabel columns
			$data = array('MER_ID' =>$mer_id,'NAME' =>$this->input->post('title'),'IMAGE' =>$imagenameSESSION,'DETAILS' =>$this->input->post('details'),'SHOW' => "N",'STATUS' => 1,'DATE'=>$date);
			$query=$this->db->insert('admin_merchant_details',$data); 
			unset($_SESSION["IMAGE_FINDER_UPDATE"]); 
			}
			
			
       	if($query)
			{
				
				/*banner image*/
				$filename = $_FILES["banner"]["name"];
				$finalimgbanner= date('YmdHis').rand(111,999).$filename;	
				$config['upload_path']          = 'merchant_site/banner/';
				$config['file_name']          	=$finalimgbanner;	
				$config['allowed_types']        = 'gif|jpg|png';
				//$config['max_size']             = 100;
				//$config['max_width']            = 1024;
				//$config['max_height']           = 768;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('banner'))
			{
				 $error = array('error' => $this->upload->display_errors());
			}
			else
			{
				$upload_data=$this->upload->data();
			}
			/*********************************************************/	
			
			/*image 1 for about*/
					$filename = $_FILES["img1"]["name"];
			$finalimg1= date('YmdHis').rand(111,999).$filename;
					$config['upload_path']          = 'merchant_site/left/';
				$config['file_name']          = $finalimg1;
				$config['allowed_types']        = 'gif|jpg|png';
				//$config['max_size']             = 100;
				//$config['max_width']            = 1024;
				//$config['max_height']           = 768;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('img1'))
			{
				 $error = array('error' => $this->upload->display_errors());
			}
			else
			{
				$upload_data=$this->upload->data();
			}
			/*********************************************************/	
			
			/*image2 for about*/
			
				$filename = $_FILES["img2"]["name"];
			$finalimg2= date('YmdHis').rand(111,999).$filename;
					$config['upload_path']          = 'merchant_site/righttop/';
				$config['file_name']          = $finalimg2;
				$config['allowed_types']        = 'gif|jpg|png';
				//$config['max_size']             = 100;
				//$config['max_width']            = 1024;
				//$config['max_height']           = 768;

			$this->load->library('upload', $config);
			   $this->upload->initialize($config);
			if ( ! $this->upload->do_upload('img2'))
			{
				 $error = array('error' => $this->upload->display_errors());
			}
			else
			{
				$upload_data=$this->upload->data();
			}
			/*********************************************************/

			/*image 3 for about*/
			
				$filename = $_FILES["img3"]["name"];
				$finalimg3= date('YmdHis').rand(111,999).$filename;
				$config['upload_path']          = 'merchant_site/rightbottom/';
				$config['file_name']          = $finalimg3;
				$config['allowed_types']        = 'gif|jpg|png';
				//$config['max_size']             = 100;
				//$config['max_width']            = 1024;
				//$config['max_height']           = 768;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('img3'))
			{
				 $error = array('error' => $this->upload->display_errors());
			}
			else
			{
				$upload_data=$this->upload->data();
			}
			/*********************************************************/
		
$merdata = array('MER_ID' =>$mer_id,'SHORT_DESCRIPTION' =>$this->input->post('sdescription'),'CUISINE' =>$this->input->post('cuisine'),'DESCRIPTION' =>$this->input->post('description'),'BANNER_IMG'=>$finalimgbanner,'ABOUT' =>$this->input->post('about'),'ABOUT_IMG_1'=>$finalimg1,'ABOUT_IMG_2'=>$finalimg2,'ABOUT_IMG_3'=>$finalimg3,'QUICKFACTS' =>$this->input->post('facts'),'SERVICES' =>$this->input->post('services'),'FB_LINK' =>$this->input->post('facebooklink'),'TW_LINK' =>$this->input->post('twitterlink'),'LN_LINK' =>$this->input->post('linkedinlink'),'INST_LINK' =>$this->input->post('instagramlink'),'GP_LINK' =>$this->input->post('googlepluslink'),'YTUBE_LINK' =>$this->input->post('youtubelink'),'LOGO' =>$image_name1,'FEVICON' =>$image_name2,'DATE'=>$date, 'lang'=>$this->input->post('lang'), 'SHOW'=>'Y');

			$query1=$this->db->insert('merchant_site',$merdata); 			
				
				
			return true;
			}
			else
			{
			return false;
			}
}      

	function updatemerdetails_NOIMAGE($id,$image_name1,$image_name2)
		{
		echo"$image_name1,$image_name2";
		$imagenameSESSION = $_SESSION["IMAGE_FINDER_UPDATE"];
		$date=date('Y-m-d');
		if(isset($_FILES["banner"]["tmp_name"])){
			$filename = $_FILES["banner"]["name"];
			$finalimgbanner= date('YmdHis').rand(111,999).$filename;	
			$config['upload_path']          = 'merchant_site/banner/';
			$config['file_name']          	= $finalimgbanner;	
			$config['allowed_types']        = 'gif|jpg|png';
			//$config['max_size']             = 100;
			//$config['max_width']            = 1024;
			//$config['max_height']           = 768;

			$this->load->library('upload', $config);
			   $this->upload->initialize($config);
			if ( ! $this->upload->do_upload('banner'))
			{
				 $error = array('error' => $this->upload->display_errors());
			}
			else
			{
				$merwebsiteimagedata['BANNER_IMG']=$finalimgbanner;
				$upload_data=$this->upload->data();
			}
			
		}
		
		if(isset($_FILES["img1"]["tmp_name"])){
			$filename = $_FILES["img1"]["name"];
			$finalimg1= date('YmdHis').rand(111,999).$filename;
			$config['upload_path']          = 'merchant_site/left/';
			$config['file_name']          = $finalimg1;
			$config['allowed_types']        = 'gif|jpg|png';
			//$config['max_size']             = 100;
			//$config['max_width']            = 1024;
			//$config['max_height']           = 768;

			$this->load->library('upload', $config);
			   $this->upload->initialize($config);
			if ( ! $this->upload->do_upload('img1'))
			{
				 $error = array('error' => $this->upload->display_errors());
			}
			else
			{
				$merwebsiteimagedata['ABOUT_IMG_1']=$finalimg1;
				$upload_data=$this->upload->data();
			}
		
		}
		
		if(isset($_FILES["img2"]["tmp_name"])){
				$filename = $_FILES["img2"]["name"];
			$finalimg2= date('YmdHis').rand(111,999).$filename;
				$config['upload_path']    = 'merchant_site/righttop/';
				$config['file_name']          = $finalimg2;
				$config['allowed_types']      = 'gif|jpg|png';
				//$config['max_size']         = 100;
				//$config['max_width']        = 1024;
				//$config['max_height']       = 768;

			$this->load->library('upload', $config);
			   $this->upload->initialize($config);
			if ( ! $this->upload->do_upload('img2'))
			{
				 $error = array('error' => $this->upload->display_errors());
			}
			else
			{
				$merwebsiteimagedata['ABOUT_IMG_2']=$finalimg2;
				$upload_data=$this->upload->data();
			}
		
		}
		
		if(isset($_FILES["img3"]["tmp_name"])){
			
			$filename = $_FILES["img3"]["name"];
			$finalimg3= date('YmdHis').rand(111,999).$filename;
			$config['upload_path']          = 'merchant_site/rightbottom/';
			$config['file_name']          = $finalimg3;
			$config['allowed_types']        = 'gif|jpg|png';
			//$config['max_size']             = 100;
			//$config['max_width']            = 1024;
			//$config['max_height']           = 768;

			$this->load->library('upload', $config);
			   $this->upload->initialize($config);
			if ( ! $this->upload->do_upload('img3'))
			{
				 $error = array('error' => $this->upload->display_errors());
			}
			else
			{
				$merwebsiteimagedata['ABOUT_IMG_3']=$finalimg3;
				$upload_data=$this->upload->data();
			}
		
		}
		
		
		
		$data11['MERrecord'] = $this->db->get_where('admin_merchant_details', array('ID' => $id));
			foreach ($data11['MERrecord']->result() as $row)
					{
						
					$merid=$row->MER_ID;
					$langid=$row->lang;
					$old_imageNAME=$row->IMAGE;
					}
		
		if($imagenameSESSION=='')
			{
			$data = array('NAME' =>$this->input->post('title'),'DETAILS' =>$this->input->post('details'),'lang'=>$this->input->post('lang'));
			$this->db->where('ID', $id);
			$this->db->update('admin_merchant_details', $data);
			}
			else
			{
			//Delete Old Image From Folder//
			
			if($old_imageNAME!='')
				{	
				$file1='./upload/original/'.$old_imageNAME.'';	
				$file2='./upload/thumb/'.$old_imageNAME.'';	
				unlink($file1);
				unlink($file2);
				}
			//END//
		
			$data = array('NAME' =>$this->input->post('title'),'IMAGE' =>$imagenameSESSION ,'DETAILS' =>$this->input->post('details'),'lang'=>$this->input->post('lang'));
			$this->db->where('ID', $id);
			$this->db->update('admin_merchant_details', $data);	
			unset($_SESSION["IMAGE_FINDER_UPDATE"]);
			}
			
			$this->db->where('MER_ID', $merid);
			$this->db->where('lang', $langid);
			$countwebsite = $this->db->count_all_results('merchant_site');
			
			if($countwebsite==0)
			{
				$merwebsitedata = array('MER_ID' =>$merid,'SHORT_DESCRIPTION' =>$this->input->post('sdescription'),'CUISINE' =>$this->input->post('cuisine'),'DESCRIPTION' =>$this->input->post('description'),'BANNER_IMG'=>$finalimgbanner,'ABOUT' =>$this->input->post('about'),'ABOUT_IMG_1'=>$finalimg1,'ABOUT_IMG_2'=>$finalimg2,'ABOUT_IMG_3'=>$finalimg3,'QUICKFACTS' =>$this->input->post('facts'),'SERVICES' =>$this->input->post('services'),'DATE'=>$date, 'lang'=>$this->input->post('lang'), 'SHOW'=>'Y');
				
				$this->db->where('MER_ID', $merid);
				$this->db->where('lang', $langid);
				$query1=$this->db->insert('merchant_site',$merwebsitedata);
				
			}
			else
			{
				
				$this->db->where('MER_ID', $merid);
				$this->db->where('lang', $langid);
				$oldwebdata = $this->db->get('merchant_site');
				foreach ($oldwebdata->result() as $row)
				{
						
					$old_imageBANNER=$row->MER_ID;
					$old_imageIMG1=$row->ABOUT_IMG_1;
					$old_imageIMG2=$row->ABOUT_IMG_2;
					$old_imageIMG3=$row->ABOUT_IMG_3;
				}
				
				if($old_imageBANNER!='' && $merwebsiteimagedata['BANNER_IMG']!='')
				{	
				$file1='./merchant_site/banner/'.$old_imageBANNER.'';	
				unlink($file1);
				}
				
				if($old_imageIMG1!='' && $merwebsiteimagedata['ABOUT_IMG_1']!='')
				{	
				$file1='./merchant_site/left/'.$old_imageIMG1.'';	
				unlink($file1);
				}
				
				if($old_imageIMG2!='' && $merwebsiteimagedata['ABOUT_IMG_2']!='')
				{	
				$file1='./merchant_site/righttop/'.$old_imageIMG2.'';	
				unlink($file1);
				}
				
				if($old_imageIMG3!='' && $merwebsiteimagedata['ABOUT_IMG_3']!='')
				{	
				$file1='./merchant_site/rightbottom/'.$old_imageIMG3.'';	
				unlink($file1);
				}
				
				if($image_name1 != '' && $image_name2 != '')
				{
				$fetchtounlink=$this->db->get_where('merchant_site',array('MER_ID'=>$merid))->row();
				
				$filelogo='images/merchantlogo/'.$fetchtounlink->LOGO;	
				$filefevicon='images/merchantlogo/'.$fetchtounlink->FEVICON;	
				if(file_exists($filelogo))
				unlink($filelogo);
				if(file_exists($filefevicon))
				unlink($filefevicon);
			
				$merwebsitedata = array('MER_ID' =>$merid,'SHORT_DESCRIPTION' =>$this->input->post('sdescription'),'CUISINE' =>$this->input->post('cuisine'),'DESCRIPTION' =>$this->input->post('description'),'ABOUT' =>$this->input->post('about'),'QUICKFACTS' =>$this->input->post('facts'),'SERVICES' =>$this->input->post('services'),'FB_LINK' =>$this->input->post('facebooklink'),'TW_LINK' =>$this->input->post('twitterlink'),'LN_LINK' =>$this->input->post('linkedinlink'),'INST_LINK' =>$this->input->post('instagramlink'),'GP_LINK' =>$this->input->post('googlepluslink'),'YTUBE_LINK' =>$this->input->post('youtubelink'),'LOGO' =>$image_name1,'FEVICON' =>$image_name2,'DATE'=>$date, 'lang'=>$this->input->post('lang'));
				}	
				
				if($image_name1 != '' && $image_name2 == '')
				{
				$fetchtounlink=$this->db->get_where('merchant_site',array('MER_ID'=>$merid))->row();
				
				$filelogo='images/merchantlogo/'.$fetchtounlink->LOGO;		
				if(file_exists($filelogo))
				unlink($filelogo);
			
				$merwebsitedata = array('MER_ID' =>$merid,'SHORT_DESCRIPTION' =>$this->input->post('sdescription'),'CUISINE' =>$this->input->post('cuisine'),'DESCRIPTION' =>$this->input->post('description'),'ABOUT' =>$this->input->post('about'),'QUICKFACTS' =>$this->input->post('facts'),'SERVICES' =>$this->input->post('services'),'FB_LINK' =>$this->input->post('facebooklink'),'TW_LINK' =>$this->input->post('twitterlink'),'LN_LINK' =>$this->input->post('linkedinlink'),'INST_LINK' =>$this->input->post('instagramlink'),'GP_LINK' =>$this->input->post('googlepluslink'),'YTUBE_LINK' =>$this->input->post('youtubelink'),'LOGO' =>$image_name1,'DATE'=>$date, 'lang'=>$this->input->post('lang'));
				}
				
				if($image_name1 == '' && $image_name2 != '')
				{
				$fetchtounlink=$this->db->get_where('merchant_site',array('MER_ID'=>$merid))->row();
					
				$filefevicon='images/merchantlogo/'.$fetchtounlink->FEVICON;	
				if(file_exists($filefevicon))
				unlink($filefevicon);
			
				$merwebsitedata = array('MER_ID' =>$merid,'SHORT_DESCRIPTION' =>$this->input->post('sdescription'),'CUISINE' =>$this->input->post('cuisine'),'DESCRIPTION' =>$this->input->post('description'),'ABOUT' =>$this->input->post('about'),'QUICKFACTS' =>$this->input->post('facts'),'SERVICES' =>$this->input->post('services'),'FB_LINK' =>$this->input->post('facebooklink'),'TW_LINK' =>$this->input->post('twitterlink'),'LN_LINK' =>$this->input->post('linkedinlink'),'INST_LINK' =>$this->input->post('instagramlink'),'GP_LINK' =>$this->input->post('googlepluslink'),'YTUBE_LINK' =>$this->input->post('youtubelink'),'FEVICON' =>$image_name2,'DATE'=>$date, 'lang'=>$this->input->post('lang'));
				}
				
				if($image_name1 == '' && $image_name2 == '')
				{
				
				$merwebsitedata = array('MER_ID' =>$merid,'SHORT_DESCRIPTION' =>$this->input->post('sdescription'),'CUISINE' =>$this->input->post('cuisine'),'DESCRIPTION' =>$this->input->post('description'),'ABOUT' =>$this->input->post('about'),'QUICKFACTS' =>$this->input->post('facts'),'SERVICES' =>$this->input->post('services'),'FB_LINK' =>$this->input->post('facebooklink'),'TW_LINK' =>$this->input->post('twitterlink'),'LN_LINK' =>$this->input->post('linkedinlink'),'INST_LINK' =>$this->input->post('instagramlink'),'GP_LINK' =>$this->input->post('googlepluslink'),'YTUBE_LINK' =>$this->input->post('youtubelink'),'DATE'=>$date, 'lang'=>$this->input->post('lang'));
				}
				//print_r($merwebsitedata);die();
				//$merwebsitedata9=array_merge($merwebsiteimagedata,$merwebsitedata);
				$merwebsitedataFinal=array_merge($merwebsiteimagedata,$merwebsitedata);
				$this->db->where('MER_ID', $merid);
				$this->db->where('lang', $langid);
				$query1=$this->db->update('merchant_site',$merwebsitedata); 	
			}
			
			
			
			
			
		}

function updatemerdetails($mer_id,$image_name)
		{
		//Delete Old Image From Folder//	
		$data['MERrecord'] = $this->db->get_where('admin_merchant_details', array('MER_ID' => $mer_id));	
		foreach ($data['MERrecord']->result() as $row)
				{
				$old_imageNAME=$row->IMAGE;
				}
				
		$file1='./upload/original/'.$old_imageNAME.'';	
		$file2='./upload/thumb/'.$old_imageNAME.'';	
			
		unlink($file1);
		unlink($file2);
		//END//
		
		
		$data = array('NAME' =>$this->input->post('title'),'IMAGE' =>$image_name,'DETAILS' =>$this->input->post('details'));
		$this->db->where('MER_ID', $mer_id);
		$this->db->update('admin_merchant_details', $data);
		}


function updatestatus_SHOW_WEB($rec_id,$cur_st)
		{
		$data = array('SHOW' =>$cur_st);
		$this->db->where('ID', $rec_id);
		$this->db->update('admin_merchant_details', $data);
		}

//code for add new buzz details to database //
function addbuzzDB()
		{
       	$date=date("Y-m-d H:i:s");
		if($this->input->post('shop_type')=='A')
			{
			$buzz_type='A';
			$buzz_type_id='1';	
			}
			else if($this->input->post('shop_type')=='M')
			{
			$buzz_type='M';
			$buzz_type_id=$this->input->post('merinfo');		
			}
				
		if($this->input->post('section_type')=='B')
			{
			$section_type='B';
			$datefrom='';	
			$dateto='';	
			}
			else if($this->input->post('section_type')=='E')
			{
			$section_type='E';
			$datefrom=$this->input->post('datefrom');	
			$dateto=$this->input->post('dateto');	
			}	
		
		// Get default lang//
		$Def_Lang=$this->db->get_where('language',array('default'=>'Y'))->row('id');
		
		if($Def_Lang==$this->input->post('language'))
			{
			$lang='Y';
			}
			else
			{
			$lang='N';	
			}
		
		
		$imagenameSESSION = $_SESSION["IMAGE_FINDER_UPDATE"];
		//$content=$this->input->post('details');
		//$contentnew= preg_replace('/server-images/', ''.base_url().'admin/server-images', $content);
		if($imagenameSESSION=='')
		{
		//Setting values for tabel columns
		$data = array('CAT_ID' =>$this->input->post('category'),'BUZZ_TYPE'=>$buzz_type,'BUZZ_TYPE_ID'=>$buzz_type_id,'SECTION_TYPE'=>$section_type,'DATEFROM'=>$datefrom,'DATETO'=>$dateto,'POSTEDON'=>$this->input->post('posted_on'),'SHOW_ST' => "N",'default_lang'=>$lang,'STATUS' => 1,'DATE'=>$date);
		$query=$this->db->insert('admin_addbuzz',$data);
		$buzz_id=$this->db->insert_id();
		unset($_SESSION["IMAGE_FINDER_UPDATE"]);
		}
		else
		{
		//Setting values for tabel columns
		$data = array('CAT_ID' =>$this->input->post('category'),'BUZZ_TYPE'=>$buzz_type,'BUZZ_TYPE_ID'=>$buzz_type_id,'SECTION_TYPE'=>$section_type,'DATEFROM'=>$datefrom,'DATETO'=>$dateto,'IMAGE' =>$imagenameSESSION,'POSTEDON'=>$this->input->post('posted_on'),'SHOW_ST' => "N",'default_lang'=>$lang,'STATUS' => 1,'DATE'=>$date);
		$query=$this->db->insert('admin_addbuzz',$data);
		$buzz_id=$this->db->insert_id();
		unset($_SESSION["IMAGE_FINDER_UPDATE"]);
		}
		
		if($query)
			{
			$LangData=array('buzzid'=>$buzz_id,'title' =>$this->input->post('title'),'heading'=>$this->input->post('heading'),'details' =>$this->input->post('details'),'posted'=>$this->input->post('posted_by'),'lang'=>$this->input->post('language'),'status'=>'1','date'=>$date);
			$this->db->insert('buzz_lang',$LangData);
			return true;
			}
			else
			{
			return false;
			}
		}    

function addbuzzDBnew()
		{
       	$date=date("Y-m-d H:i:s");
		
		$clength=$crdate=$scast=$synopsis=$trailer=$pvr=$img='';
		
		if($this->input->post('shop_type')=='A')
			{
			$buzz_type='A';
			$buzz_type_id='1';	
			}
			else if($this->input->post('shop_type')=='M')
			{
			$buzz_type='M';
			$buzz_type_id=$this->input->post('merinfo');		
			}
				
			
			$this->load->library('upload');

			$image_name=str_replace(" ","",str_replace(" ","",date("YmdHis").rand(111,999)).$_FILES['banner']['name']);
			$config['upload_path']          = 'upload/original/';
			// $config['file_name']          = date('YmdHis').rand(111,999).'.jpg';
			$config['allowed_types']        = 'gif|jpg|png';
			//$config['max_size']             = 100;
			//$config['max_width']            = 1024;
			//$config['max_height']           = 768;
			$config['file_name']  = $image_name;

			$this->upload->initialize($config);
			$this->upload->do_upload('banner');
			$imagenameSESSION=$image_name;
					
				
		if($this->input->post('section_type')=='B')
		{
			$section_type='B';
			$datefrom='';	
			$dateto='';		
			$timing='';	
			$venue='';
			$highlight='';
			$details='';
			$eventimg='';
			$orgby='';
			$entry='';
			$tnc='';
			$description='';
			$img='';
			$this->load->library('upload');

			$files = $_FILES;
			$cpt = count($_FILES['contimg']['name']);
			for($i=0; $i<$cpt; $i++)
			{           
				$_FILES['contimg']['name']= $files['contimg']['name'][$i];
				$_FILES['contimg']['type']= $files['contimg']['type'][$i];
				$_FILES['contimg']['tmp_name']= $files['contimg']['tmp_name'][$i];
				$_FILES['contimg']['error']= $files['contimg']['error'][$i];
				$_FILES['contimg']['size']= $files['contimg']['size'][$i];    

				$image_name=$files['contimg']['name'][$i]=str_replace(" ","",str_replace(" ","",date("YmdHis").rand(111,999)).$_FILES['contimg']['name']);
			
				$config['upload_path']          = 'upload/original/';
				// $config['file_name']          = date('YmdHis').rand(111,999).'.jpg';
				$config['allowed_types']        = 'gif|jpg|png';
				//$config['max_size']             = 100;
				//$config['max_width']            = 1024;
				//$config['max_height']           = 768;
				$config['file_name']  = $image_name;
				
				$this->upload->initialize($config);
				$this->upload->do_upload('contimg');
			}
			

			
			$highlight=$this->input->post('highlight');
			
			$containtarray=array();
			$conttitle=$this->input->post('conttitle');
			$contimg=$files['contimg']['name'];//$this->input->post('contimg');
			$optradio=$this->input->post('optradio');
			$contvid=$this->input->post('contvid');
			$contdesc=$this->input->post('contdesc');
			
			for($i=0;$i<sizeof($conttitle);$i++)
			{
				$containtarray[]=array('title'=>$conttitle[$i],'image'=>$contimg[$i],'type'=>$optradio[$i],'video'=>$contvid[$i],'detail'=>$contdesc[$i]);
			}
			$content=serialize($containtarray);
			
		} //Buzz if end
		else if($this->input->post('section_type')=='E')
		{
			$section_type='E';
			$datefrom=$this->input->post('datefrom');	
			$dateto=$this->input->post('dateto');	
			$timing=$this->input->post('timing');	
			$venue=$this->input->post('venue');	
			$highlight=$this->input->post('highlight');	
			$description=$this->input->post('details');	
			$eventimg=$this->input->post('eventimg');
			$eventimg=serialize($eventimg);
			$orgby=$this->input->post('orgby');	
			$entry=$this->input->post('entry');	
			$tnc=$this->input->post('tnc');	
			$content='';
			
			$this->load->library('upload');

			$files = $_FILES;
			$img=array();
			$cpt = count($_FILES['eventimg']['name']);
			for($i=0; $i<$cpt; $i++)
			{           
				$_FILES['eventimg']['name']= $files['eventimg']['name'][$i];
				$_FILES['eventimg']['type']= $files['eventimg']['type'][$i];
				$_FILES['eventimg']['tmp_name']= $files['eventimg']['tmp_name'][$i];
				$_FILES['eventimg']['error']= $files['eventimg']['error'][$i];
				$_FILES['eventimg']['size']= $files['eventimg']['size'][$i];    
				
				$image_name=$_FILES['eventimg']['name']=str_replace(" ","",str_replace(" ","",date("YmdHis").rand(111,999)).$_FILES['eventimg']['name']);
			
				$config['upload_path']          = 'upload/original/';
				// $config['file_name']          = date('YmdHis').rand(111,999).'.jpg';
				$config['allowed_types']        = 'gif|jpg|png';
				//$config['max_size']             = 100;
				//$config['max_width']            = 1024;
				//$config['max_height']           = 768;
				$config['file_name']  = $image_name;
				
				$this->upload->initialize($config);
				$this->upload->do_upload('eventimg');
				
				$img[]=$_FILES['eventimg']['name'];
			}
			$img=serialize($img);
			
		}	
		else if ($this->input->post('section_type')=='C'){
			$section_type='C';
			$datefrom='';	
			$dateto='';	
			$timing='';	
			$venue='';	
			$highlight='';	
			$description='';	
			$eventimg='';
			$orgby='';	
			$entry='';	
			$tnc='';	
			$content='';
			
			
			$clength=$this->input->post('clength');	
			$crdate=$this->input->post('crdate');	
			$scast=$this->input->post('scast');	
			$synopsis=$this->input->post('synopsis');	
			$trailer=$this->input->post('trailer');	
			
			$pvrarray=array();
			$ctheater=$this->input->post('ctheater');
			$caddress=$this->input->post('caddress');
			$cphone=$this->input->post('cphone');
			$cdate=$this->input->post('cdate');
			$ctiming=$this->input->post('ctiming');
			
			for($i=0;$i<sizeof($ctheater);$i++)
			{
				if($ctheater[$i]=='')
					continue;
				
				$schedulearray=array();
				for($j=0;$j<sizeof($cdate[$i]);$j++)
				{
					if($cdate[$i][$j]=='')
					continue;
					$schedulearray[]=array('date'=>$cdate[$i][$j], 'timing'=>$ctiming[$i][$j]);
				}
				$pvrarray[]=array('theater'=>$ctheater[$i],'address'=>$caddress[$i],'phone'=>$cphone[$i],'schedule'=>$schedulearray);
			}
			$pvr=serialize($pvrarray);
			
			
			
			
			
			
		}
		
		// Get default lang//
		$Def_Lang=$this->db->get_where('language',array('default'=>'Y'))->row('id');
		
		if($Def_Lang==$this->input->post('language'))
			{
			$lang='Y';
			}
			else
			{
			$lang='N';	
			}
		
		
		//$imagenameSESSION = '';//$this->input->post('banner');
		//$content=$this->input->post('details');
		//$contentnew= preg_replace('/server-images/', ''.base_url().'admin/server-images', $content);
		if(0)//$imagenameSESSION=='')
		{
		//Setting values for tabel columns
		$data = array('CAT_ID' =>$this->input->post('category'),'BUZZ_TYPE'=>$buzz_type,'BUZZ_TYPE_ID'=>$buzz_type_id,'SECTION_TYPE'=>$section_type,'DATEFROM'=>$datefrom,'DATETO'=>$dateto,'POSTEDON'=>$this->input->post('posted_on'),'SHOW_ST' => "N",'default_lang'=>$lang,'STATUS' => 1,'DATE'=>$date);
		$query=$this->db->insert('admin_addbuzz',$data);
		$buzz_id=$this->db->insert_id();
		unset($_SESSION["IMAGE_FINDER_UPDATE"]);
		}
		else
		{
		//Setting values for tabel columns
		$data = array('CAT_ID' =>$this->input->post('category'),'BUZZ_TYPE'=>$buzz_type,
					  'BUZZ_TYPE_ID'=>$buzz_type_id,'SECTION_TYPE'=>$section_type,
					  'DATEFROM'=>$datefrom,'DATETO'=>$dateto,'IMAGE' =>$imagenameSESSION,
					  'POSTEDBY'=>$this->input->post('posted_by'),
					  'POSTEDON'=>$this->input->post('posted_on'),
					  'STATE'=>$this->input->post('state'),
					  'CITY'=>$this->input->post('city'),
					  'MART'=>$this->input->post('mart'),
					  'SHOW_ST' => "N",
					  'default_lang'=>$lang,
					  'STATUS' => 1,'DATE'=>$date
		//,	''=>$ , ''=>$ , ''=>$ , ''=>$ , 
		);
		
		$query=$this->db->insert('admin_addbuzz',$data);
		$buzz_id=$this->db->insert_id();
		unset($_SESSION["IMAGE_FINDER_UPDATE"]);
		}
		
		if($query)
			{
			$LangData=array('buzzid'=>$buzz_id,'title' =>$this->input->post('title'),'heading'=>$this->input->post('heading'),'details' =>$this->input->post('details'),'posted'=>$this->input->post('posted_by'),'lang'=>$this->input->post('language'),'status'=>'1','date'=>$date,
			'timing'=>$timing , 'venue'=>$venue , 'highlight'=>$highlight , 
			/* 'details'=>$details ,  */
			'organizer'=>$orgby , 'entry'=>$entry , 'tnc'=>$tnc , 'content'=>$content, 'description'=>$description,'image'=>$img,'rdate'=>$crdate , 'clength'=>$clength , 'starcast'=>$scast , 'synopsis'=>$synopsis, 'ctrailer'=>$trailer,'theater'=>$pvr
			
			);
			$this->db->insert('buzz_lang',$LangData);
			//$clength $crdate $scast $synopsis $trailer $pvr
			return true;
			}
			else
			{
			return false;
			}
		}    

function updateBUZZdetails_NOIMAGEnew($rec_id)
		{
       	$date=date("Y-m-d H:i:s");
		
		$clength=$crdate=$scast=$synopsis=$trailer=$pvr=$img='';
		
		if($this->input->post('shop_type')=='A')
			{
			$buzz_type='A';
			$buzz_type_id='1';	
			}
			else if($this->input->post('shop_type')=='M')
			{
			$buzz_type='M';
			$buzz_type_id=$this->input->post('merinfo');		
			}
				
			
			if(file_exists($_FILES['banner']['tmp_name'])){
			$this->load->library('upload');
			$image_name=str_replace(" ","",str_replace(" ","",date("YmdHis").rand(111,999)).$_FILES['banner']['name']);
			$config['upload_path']          = 'upload/original/';
			// $config['file_name']          = date('YmdHis').rand(111,999).'.jpg';
			$config['allowed_types']        = 'gif|jpg|png';
			//$config['max_size']             = 100;
			//$config['max_width']            = 1024;
			//$config['max_height']           = 768;
			$config['file_name']  = $image_name;

			$this->upload->initialize($config);
			$this->upload->do_upload('banner');
			$imagenameSESSION=$image_name;
			}
			else{
				$imagenameSESSION=$this->input->post('hidden_banner');
			}
					
				
		if($this->input->post('section_type')=='B')
		{
			$section_type='B';
			$datefrom='';	
			$dateto='';		
			$timing='';	
			$venue='';
			$highlight='';
			$details='';
			$eventimg='';
			$orgby='';
			$entry='';
			$tnc='';
			$description='';
			$img='';
			
			$this->load->library('upload');
			$files = $_FILES;
			$hidbuzzimg=$this->input->post('hidden_contimg');
			$cpt = count($_FILES['contimg']['name']);
			for($i=0; $i<$cpt; $i++)
			{          
				
				if(file_exists($files['contimg']['tmp_name'][$i])){
					
				$_FILES['contimg']['name']= $files['contimg']['name'][$i];
				$_FILES['contimg']['type']= $files['contimg']['type'][$i];
				$_FILES['contimg']['tmp_name']= $files['contimg']['tmp_name'][$i];
				$_FILES['contimg']['error']= $files['contimg']['error'][$i];
				$_FILES['contimg']['size']= $files['contimg']['size'][$i];    

				$image_name=$files['contimg']['name'][$i]=str_replace(" ","",str_replace(" ","",date("YmdHis").rand(111,999)).$_FILES['contimg']['name']);
			
				$config['upload_path']          = 'upload/original/';
				// $config['file_name']          = date('YmdHis').rand(111,999).'.jpg';
				$config['allowed_types']        = 'gif|jpg|png';
				//$config['max_size']             = 100;
				//$config['max_width']            = 1024;
				//$config['max_height']           = 768;
				$config['file_name']  = $image_name;
				
				$this->upload->initialize($config);
				$this->upload->do_upload('contimg');
				}
				else {
				$files['contimg']['name'][$i]=$hidbuzzimg[$i];
				}
			}
			

			
			$highlight=$this->input->post('highlight');
			
			$containtarray=array();
			$conttitle=$this->input->post('conttitle');
			$contimg=$files['contimg']['name'];//$this->input->post('contimg');
			$optradio=$this->input->post('optradio');
			$contvid=$this->input->post('contvid');
			$contdesc=$this->input->post('contdesc');
			
			for($i=0;$i<sizeof($conttitle);$i++)
			{
				$containtarray[]=array('title'=>$conttitle[$i],'image'=>$contimg[$i],'type'=>$optradio[$i],'video'=>$contvid[$i],'detail'=>$contdesc[$i]);
			}
			$content=serialize($containtarray);
			
		} //Buzz if end
		else if($this->input->post('section_type')=='E')
		{
			$section_type='E';
			$datefrom=$this->input->post('datefrom');	
			$dateto=$this->input->post('dateto');	
			$timing=$this->input->post('timing');	
			$venue=$this->input->post('venue');	
			$highlight=$this->input->post('highlight');	
			$description=$this->input->post('details');	
			$eventimg=$this->input->post('eventimg');
			$eventimg=serialize($eventimg);
			$orgby=$this->input->post('orgby');	
			$entry=$this->input->post('entry');	
			$tnc=$this->input->post('tnc');	
			$content='';
			
			$this->load->library('upload');

			$files = $_FILES;
			$img=array();
			$cpt = count($_FILES['eventimg']['name']);
			for($i=0; $i<$cpt; $i++)
			{

				//echo $files['eventimg']['tmp_name'][$i];
				$hideventimg=$this->input->post('hidden_eventimg');
			
				if(file_exists($files['eventimg']['tmp_name'][$i])){
				
				$_FILES['eventimg']['name']= $files['eventimg']['name'][$i];
				$_FILES['eventimg']['type']= $files['eventimg']['type'][$i];
				$_FILES['eventimg']['tmp_name']= $files['eventimg']['tmp_name'][$i];
				$_FILES['eventimg']['error']= $files['eventimg']['error'][$i];
				$_FILES['eventimg']['size']= $files['eventimg']['size'][$i];    
				
				$image_name=$_FILES['eventimg']['name']=str_replace(" ","",str_replace(" ","",date("YmdHis").rand(111,999)).$_FILES['eventimg']['name']);
			
				$config['upload_path']          = 'upload/original/';
				// $config['file_name']          = date('YmdHis').rand(111,999).'.jpg';
				$config['allowed_types']        = 'gif|jpg|png';
				//$config['max_size']             = 100;
				//$config['max_width']            = 1024;
				//$config['max_height']           = 768;
				$config['file_name']  = $image_name;
				
				$this->upload->initialize($config);
				$this->upload->do_upload('eventimg');
				
				$img[]=$_FILES['eventimg']['name'];
				}else{
				$img[]=$hideventimg[$i];
				}
			}
			$img=serialize($img);
			
		}	
		else if ($this->input->post('section_type')=='C'){
			$section_type='C';
			$datefrom='';	
			$dateto='';	
			$timing='';	
			$venue='';	
			$highlight='';	
			$description='';	
			$eventimg='';
			$orgby='';	
			$entry='';	
			$tnc='';	
			$content='';
			
			
			$clength=$this->input->post('clength');	
			$crdate=$this->input->post('crdate');	
			$scast=$this->input->post('scast');	
			$synopsis=$this->input->post('synopsis');	
			$trailer=$this->input->post('trailer');	
			
			$pvrarray=array();
			$ctheater=$this->input->post('ctheater');
			$caddress=$this->input->post('caddress');
			$cphone=$this->input->post('cphone');
			$cdate=$this->input->post('cdate');
			$ctiming=$this->input->post('ctiming');
			
			for($i=0;$i<sizeof($ctheater);$i++)
			{
				if($ctheater[$i]=='')
					continue;
				
				$schedulearray=array();
				for($j=0;$j<sizeof($cdate[$i]);$j++)
				{
					if($cdate[$i][$j]=='')
					continue;
					$schedulearray[]=array('date'=>$cdate[$i][$j], 'timing'=>$ctiming[$i][$j]);
				}
				$pvrarray[]=array('theater'=>$ctheater[$i],'address'=>$caddress[$i],'phone'=>$cphone[$i],'schedule'=>$schedulearray);
			}
			$pvr=serialize($pvrarray);
			
			
			
			
			
			
		}
		
		// Get default lang//
		$Def_Lang=$this->db->get_where('language',array('default'=>'Y'))->row('id');
		
		if($Def_Lang==$this->input->post('language'))
			{
			$lang='Y';
			}
			else
			{
			$lang='N';	
			}
		
		
	
		//Setting values for tabel columns
		$data = array('CAT_ID' =>$this->input->post('category'),'BUZZ_TYPE'=>$buzz_type,
					  'BUZZ_TYPE_ID'=>$buzz_type_id,'SECTION_TYPE'=>$section_type,
					  'DATEFROM'=>$datefrom,'DATETO'=>$dateto,'IMAGE' =>$imagenameSESSION,
					  'POSTEDBY'=>$this->input->post('posted_by'),
					  'POSTEDON'=>$this->input->post('posted_on'),
					  'STATE'=>$this->input->post('state'),
					  'CITY'=>$this->input->post('city'),
					  'MART'=>$this->input->post('mart'),
	//	,'SHOW_ST' => "N",'default_lang'=>$lang,'STATUS' => 1
						'DATE'=>$date
		//,	''=>$ , ''=>$ , ''=>$ , ''=>$ , 
		);
		
		$this->db->where('ID', $rec_id);
		$query=$this->db->update('admin_addbuzz',$data);
		//$buzz_id=$this->db->insert_id();
		//echo $this->db->last_query();
		unset($_SESSION["IMAGE_FINDER_UPDATE"]);
		
		
		if($query)
			{
			$LangData=array('title' =>$this->input->post('title'),'heading'=>$this->input->post('heading'),'details' =>$this->input->post('details'),'posted'=>$this->input->post('posted_by'),'lang'=>$this->input->post('language'),'timing'=>$timing , 'venue'=>$venue , 'highlight'=>$highlight , 
			/* 'details'=>$details ,  */
			'organizer'=>$orgby , 'entry'=>$entry , 'tnc'=>$tnc , 'content'=>$content, 'description'=>$description,'image'=>$img,'rdate'=>$crdate , 'clength'=>$clength , 'starcast'=>$scast , 'synopsis'=>$synopsis, 'ctrailer'=>$trailer,'theater'=>$pvr
			
			);
			$this->db->where('buzzid', $rec_id);
			$this->db->update('buzz_lang',$LangData);
			//echo $this->db->last_query();die;
			//$clength $crdate $scast $synopsis $trailer $pvr
			return true;
			}
			else
			{
			return false;
			}
		}    

function updatestatus_WEB_BUZZ($rec_id,$cur_st)
		{
		$data = array('SHOW_ST' =>$cur_st);
		$this->db->where('ID', $rec_id);
		$this->db->update('admin_addbuzz', $data);
		}


function updateBUZZdetails_NOIMAGE($rec_id)
		{
		$section_type=$this->input->post('section_type');
		if($this->input->post('shop_type')=='A')
			{
			$buzz_type='A';
			$buzz_type_id='1';	
			}
			else if($this->input->post('shop_type')=='M')
			{
			$buzz_type='M';
			$buzz_type_id=$this->input->post('merinfo');		
			}
		
		$imagenameSESSION = $_SESSION["IMAGE_FINDER_UPDATE"];
		if($imagenameSESSION=='')
			{
			//Setting values for tabel columns
			$data = array('CAT_ID' =>$this->input->post('category'),'NAME' =>$this->input->post('title'),'BUZZ_TYPE'=>$buzz_type,'BUZZ_TYPE_ID'=>$buzz_type_id,'SECTION_TYPE'=>$section_type,'HEADING'=>$this->input->post('heading'),'DETAILS' =>$this->input->post('details'),'DATEFROM'=>$this->input->post('datefrom'),'DATETO'=>$this->input->post('dateto'),'POSTEDBY'=>$this->input->post('posted_by'),'POSTEDON'=>$this->input->post('posted_on'));
			
			$this->db->where('ID', $rec_id);
			$this->db->update('admin_addbuzz', $data);	
			}
			else
			{
			//Delete Old Image From Folder//	
			$data['BUZZrecord'] = $this->db->get_where('admin_addbuzz', array('ID' => $rec_id));	
			foreach ($data['BUZZrecord']->result() as $row)
				{
				$old_imageNAME=$row->IMAGE;
				}
			$file1='./upload/original/'.$old_imageNAME.'';	
			$file2='./upload/thumb/'.$old_imageNAME.'';	
			if($old_imageNAME!='')
				{
				unlink($file1);
				unlink($file2);
				}
			//END//
			
			//Setting values for tabel columns
			$data = array('CAT_ID' =>$this->input->post('category'),'NAME' =>$this->input->post('title'),'BUZZ_TYPE'=>$buzz_type,'BUZZ_TYPE_ID'=>$buzz_type_id,'SECTION_TYPE'=>$section_type,'IMAGE'=>$imagenameSESSION,'HEADING'=>$this->input->post('heading'),'DETAILS' =>$this->input->post('details'),'DATEFROM'=>$this->input->post('datefrom'),'DATETO'=>$this->input->post('dateto'),'POSTEDBY'=>$this->input->post('posted_by'),'POSTEDON'=>$this->input->post('posted_on'));
			
			$this->db->where('ID', $rec_id);
			$this->db->update('admin_addbuzz', $data);	
			unset($_SESSION["IMAGE_FINDER_UPDATE"]);
			}
		}


function updateBUZZdetails_IMAGE($rec_id,$image_name)
		{
		//Delete Old Image From Folder//	
		$data['BUZZrecord'] = $this->db->get_where('admin_addbuzz', array('ID' => $rec_id));	
		foreach ($data['BUZZrecord']->result() as $row)
				{
				$old_imageNAME=$row->IMAGE;
				}
		$file1='./upload/original/'.$old_imageNAME.'';	
		$file2='./upload/thumb/'.$old_imageNAME.'';	
			
		unlink($file1);
		unlink($file2);
		//END//
		$section_type=$this->input->post('section_type');
		if($this->input->post('shop_type')=='A')
			{
			$buzz_type='A';
			$buzz_type_id='1';	
			}
			else if($this->input->post('shop_type')=='M')
			{
			$buzz_type='M';
			$buzz_type_id=$this->input->post('merinfo');		
			}
						
			//Setting values for tabel columns
			$data = array('CAT_ID' =>$this->input->post('category'),'NAME' =>$this->input->post('title'),'BUZZ_TYPE'=>$buzz_type,'BUZZ_TYPE_ID'=>$buzz_type_id,'SECTION_TYPE'=>$section_type,'IMAGE'=>$image_name,'HEADING'=>$this->input->post('heading'),'DETAILS' =>$this->input->post('details'),'POSTEDBY'=>$this->input->post('posted_by'),'POSTEDON'=>$this->input->post('posted_on'));
		
		$this->db->where('ID', $rec_id);
		$this->db->update('admin_addbuzz', $data);
		}


//code for add new coupon details to database //
function addcouponDB()
		{
		$date=date("Y-m-d H:i:s");
		if($this->input->post('coupon_type')=='A')
			{
			$coupon_type='A';
			$coupon_type_id='1';	
			}
			else if($this->input->post('coupon_type')=='M')
			{
			$coupon_type='M';
			$coupon_type_id=$this->input->post('merinfo');		
			}
			
			//FOR SMS,EMAIL AND PRINT
			($this->input->post('sms')=="Y") ? $sms=$this->input->post('sms') : $sms="N";
			($this->input->post('email')=="Y") ? $email=$this->input->post('email') : $email="N";	
			($this->input->post('print')=="Y") ? $print=$this->input->post('print') : $print="N";	
			
			
			//FOR COUPON CODE//
			$this->load->helper('string');
			$coupon_code= strtoupper(random_string('alnum',15));
			
       	
			$imagenameSESSION = $_SESSION["IMAGE_FINDER_UPDATE"];
			// Get default lang//
			$Def_Lang=$this->db->get_where('language',array('default'=>'Y'))->row('id');
			
			if($Def_Lang==$this->input->post('language'))
				{
				$lang='Y';
				}
				else
				{
				$lang='N';
				}
			
			if($imagenameSESSION=='')
				{
				//Setting values for tabel columns
				$data = array('PL' =>$this->input->post('pl'),'CATEGORY_ID' =>$this->input->post('category'),'COUPON_TYPE'=>$coupon_type,'COUPON_TYPE_ID'=>$coupon_type_id,'EXPIRE_DATE'=>$this->input->post('exp_date'),'COUPON_CODE'=>$coupon_code,'SMS'=>$sms,'EMAIL'=>$email,'PRINT'=>$print,'SHOW' => 'N','STATUS' => 1,'HOME_STATUS'=>'N','FRONT_STATUS'=>'N','default_lang'=>$lang,'DATE'=>$date);	
				$query=$this->db->insert('admin_coupon',$data);  
				$coupon_id=$this->db->insert_id();
				$Noti = array('TYPE'=>'coupon','REF_ID'=>$coupon_id,'DATE'=>date('Y-m-d'),'SEEN_BY'=>'~');
				$this->db->insert('notify',$Noti);
				unset($_SESSION["IMAGE_FINDER_UPDATE"]);
				}
				else
				{
				//Setting values for tabel columns
				$data = array('PL' =>$this->input->post('pl'),'CATEGORY_ID' =>$this->input->post('category'),'COUPON_TYPE'=>$coupon_type,'COUPON_TYPE_ID'=>$coupon_type_id,'IMAGE'=>$imagenameSESSION,'EXPIRE_DATE'=>$this->input->post('exp_date'),'COUPON_CODE'=>$coupon_code,'SMS'=>$sms,'EMAIL'=>$email,'PRINT'=>$print,'SHOW' => 'N','STATUS' => 1,'HOME_STATUS'=>'N','FRONT_STATUS'=>'N','default_lang'=>$lang,'DATE'=>$date);	
				$query=$this->db->insert('admin_coupon',$data); 
				$coupon_id=$this->db->insert_id();
				
		
				$Noti = array('TYPE'=>'coupon','REF_ID'=>$coupon_id,'DATE'=>date('Y-m-d'),'SEEN_BY'=>'~');
				$this->db->insert('notify',$Noti);
				
				unset($_SESSION["IMAGE_FINDER_UPDATE"]); 
				}
		
		if($query)
			{
			$LangData=array('couponid'=>$coupon_id,'home_title' =>$this->input->post('home_title'),'heading' =>$this->input->post('heading'),'shortdetails'=>$this->input->post('short_details'),'smsdetails' =>$this->input->post('sms_details'),'merchantdetails'=>$this->input->post('merdetails'),'otherdetails'=>$this->input->post('otherdetails'),'term'=>$this->input->post('t_c'),'lang'=>$this->input->post('language'),'status'=>'1','date'=>$date);
			$this->db->insert('coupon_lang',$LangData);
			return true;
			}
			else
			{
			return false;
			}
		}    


//code for add new deal details to database //
function adddealDB()
		{
		$date=date("Y-m-d");
		$time=date("H:i:s");
		$mid=$this->input->post('merchant');
		$LangData=array('MER_ID' =>$mid,'CATEGORY_ID' =>$this->input->post('category'),'EXPIRE_DATE' =>$this->input->post('expire_date'),
						'HOME_TITLE' =>$this->input->post('home_title'),'WHAT_YOU_GET' =>$this->input->post('what_you_get'),
						'VALID_FROM'=>$this->input->post('valid_from'),'VALID_TO' =>$this->input->post('valid_to'),
						'VALID_FOR'=>$this->input->post('valid_for'),'VALID_ON'=>$this->input->post('valid_on'),
						'PRICE'=>$this->input->post('price'),'VALUE'=>$this->input->post('value'),
						'UNLIMITED'=>$this->input->post('unlimited'),'DESCRIPTION'=>$this->input->post('desc'),
						'SHOW'=>'N','DATE'=>$date,'TIME'=>$time);
		$this->db->insert('admin_deals',$LangData);
		$insert_id = $this->db->insert_id();

		
		$Noti = array('TYPE'=>'deal','REF_ID'=>$insert_id,'DATE'=>$date,'SEEN_BY'=>'~');
		$this->db->insert('notify',$Noti);
		
		$this->db->where('MER_ID', $mid);
		$count = $this->db->count_all_results('admin_deal_other_info');
		if($count>0)	
		{
		 $OthereData=array('CUISINE' =>$this->input->post('cusine'),'HOW_TO_USE' =>$this->input->post('how_to_use'),'THINGS_TO_REM' =>$this->input->post('things_to_remember'),'ABOUT_US'=>$this->input->post('about_us'),'FACILITES' =>$this->input->post('facilities'),'CANCELLATION_POLICY'=>$this->input->post('cancellation_policy'));
		 $this->db->set($OthereData); 
         $this->db->where("MER_ID", $mid);
		 $this->db->update('admin_deal_other_info',$OthereData);
		}
		else
		{
		 $OthereData=array('MER_ID' =>$mid,'CUISINE' =>$this->input->post('cusine'),'HOW_TO_USE' =>$this->input->post('how_to_use'),'THINGS_TO_REM' =>$this->input->post('things_to_remember'),'ABOUT_US'=>$this->input->post('about_us'),'FACILITES' =>$this->input->post('facilities'),'CANCELLATION_POLICY'=>$this->input->post('cancellation_policy'));
		$this->db->insert('admin_deal_other_info',$OthereData);
		
		}
		return $insert_id;
	
		}    


//code for add new deal details to database //
function updatedealDB($rec_id)
		{
		$date=date("Y-m-d");
		$time=date("H:i:s");
		
		$LangData=array('MER_ID' =>$this->input->post('merchant'),'CATEGORY_ID' =>$this->input->post('category'),
						'EXPIRE_DATE' =>$this->input->post('expire_date'),'HOME_TITLE' =>$this->input->post('home_title'),
						'WHAT_YOU_GET' =>$this->input->post('what_you_get'),'VALID_FROM'=>$this->input->post('valid_from'),
						'VALID_TO' =>$this->input->post('valid_to'),'VALID_FOR'=>$this->input->post('valid_for'),
						'VALID_ON'=>$this->input->post('valid_on'),'PRICE'=>$this->input->post('price'),
						'VALUE'=>$this->input->post('value'),'DESCRIPTION'=>$this->input->post('desc'),
						'UNLIMITED'=>$this->input->post('unlimited'));
		 $this->db->set($LangData); 
         $this->db->where("ID", $rec_id); 
        $this->db->update('admin_deals',$LangData);
		
		$this->db->where('MER_ID', $this->input->post('merchant'));
		$count = $this->db->count_all_results('admin_deal_other_info');
		if($count>0)	
		{
		 $OthereData=array('CUISINE' =>$this->input->post('cusine'),'HOW_TO_USE' =>$this->input->post('how_to_use'),'THINGS_TO_REM' =>$this->input->post('things_to_remember'),'ABOUT_US'=>$this->input->post('about_us'),'FACILITES' =>$this->input->post('facilities'),'CANCELLATION_POLICY'=>$this->input->post('cancellation_policy'));
		 $this->db->set($OthereData); 
         $this->db->where("MER_ID", $this->input->post('merchant'));
		 $this->db->update('admin_deal_other_info',$OthereData);
		}
		else
		{
		 $OthereData=array('MER_ID' =>$this->input->post('merchant'),'CUISINE' =>$this->input->post('cusine'),'HOW_TO_USE' =>$this->input->post('how_to_use'),'THINGS_TO_REM' =>$this->input->post('things_to_remember'),'ABOUT_US'=>$this->input->post('about_us'),'FACILITES' =>$this->input->post('facilities'),'CANCELLATION_POLICY'=>$this->input->post('cancellation_policy'));
		$this->db->insert('admin_deal_other_info',$OthereData);
		
		}
		
	
		}    

function updatesms($rec_id,$cur_st)
		{
		$data = array('SMS' =>$cur_st);
		$this->db->where('ID', $rec_id);
		$this->db->update('admin_coupon', $data);
		}

function updateemail($rec_id,$cur_st)
		{
		$data = array('EMAIL' =>$cur_st);
		$this->db->where('ID', $rec_id);
		$this->db->update('admin_coupon', $data);
		}

function updateprint($rec_id,$cur_st)
		{
		$data = array('PRINT' =>$cur_st);
		$this->db->where('ID', $rec_id);
		$this->db->update('admin_coupon', $data);
		}

function updateshow($rec_id,$cur_st)
		{
		$data = array('SHOW' =>$cur_st);
		$this->db->where('ID', $rec_id);
		$this->db->update('admin_coupon', $data);
		}

function updateshowDeal($rec_id,$cur_st)
		{
		$data = array('SHOW' =>$cur_st);
		$this->db->where('ID', $rec_id);
		$this->db->update('admin_deals', $data);
		}

function updateshowMerRev($rec_id,$cur_st)
		{
		$data = array('STATUS' =>$cur_st);
		$this->db->where('ID', $rec_id);
		$this->db->update('review', $data);
		}

function updateshowVco($rec_id,$cur_st)
		{
		$data = array('SHOW' =>$cur_st);
		$this->db->where('ID', $rec_id);
		$this->db->update('admin_cvoffer', $data);
		}

function updatehome($rec_id,$cur_st)
		{
		$data = array('HOME_STATUS' =>$cur_st);
		$this->db->where('ID', $rec_id);
		$this->db->update('admin_coupon', $data);
		}

function updatefront($rec_id,$cur_st)
		{
		$data = array('FRONT_STATUS' =>$cur_st);
		$this->db->where('ID', $rec_id);
		$this->db->update('admin_coupon', $data);
		}

function updateCOUPONdetails_NOIMAGE($rec_id)
		{
		if($this->input->post('coupon_type')=='A')
			{
			$coupon_type='A';
			$conpon_type_id='1';	
			}
			else if($this->input->post('coupon_type')=='M')
			{
			$coupon_type='M';
			$conpon_type_id=$this->input->post('merinfo');		
			}
			
			
		//FOR SMS,EMAIL AND PRINT
		($this->input->post('sms')=="Y") ? $sms=$this->input->post('sms') : $sms="N";
		($this->input->post('email')=="Y") ? $email=$this->input->post('email') : $email="N";	
		($this->input->post('print')=="Y") ? $print=$this->input->post('print') : $print="N";
			
		$imagenameSESSION = $_SESSION["IMAGE_FINDER_UPDATE"];
		if($imagenameSESSION=='')
			{
			//Setting values for tabel columns
			$data = array('PL' =>$this->input->post('pl'),'CATEGORY_ID' =>$this->input->post('category'),'COUPON_TYPE'=>$coupon_type,'COUPON_TYPE_ID'=>$conpon_type_id,'EXPIRE_DATE'=>$this->input->post('exp_date'),'SMS'=>$sms,'EMAIL'=>$email,'PRINT'=>$print);	
			$this->db->where('ID', $rec_id);
			$this->db->update('admin_coupon', $data);
			unset($_SESSION["IMAGE_FINDER_UPDATE"]); 
			}
			else
			{
			//Delete Old Image From Folder//	
			$data['COUPONrecord'] = $this->db->get_where('admin_coupon', array('ID' => $rec_id));	
			foreach ($data['COUPONrecord']->result() as $row)
					{
					$old_imageNAME=$row->IMAGE;
					}
			$file1='./upload/original/'.$old_imageNAME.'';	
			$file2='./upload/thumb/'.$old_imageNAME.'';	
		
			if($old_imageNAME!="")
				{	
				unlink($file1);
				unlink($file2);
				}
			//END//
		
			//Setting values for tabel columns
			$data = array('PL' =>$this->input->post('pl'),'CATEGORY_ID' =>$this->input->post('category'),'COUPON_TYPE'=>$coupon_type,'COUPON_TYPE_ID'=>$conpon_type_id,'IMAGE'=>$imagenameSESSION,'EXPIRE_DATE'=>$this->input->post('exp_date'),'SMS'=>$sms,'EMAIL'=>$email,'PRINT'=>$print);	
			$this->db->where('ID', $rec_id);
			$this->db->update('admin_coupon', $data);
			unset($_SESSION["IMAGE_FINDER_UPDATE"]); 
			}
		}


function updateCOUPONdetails_IMAGE($rec_id,$image_name)
		{
		//Delete Old Image From Folder//	
		$data['COUPONrecord'] = $this->db->get_where('admin_coupon', array('ID' => $rec_id));	
		foreach ($data['COUPONrecord']->result() as $row)
				{
				$old_imageNAME=$row->IMAGE;
				}
		$file1='./upload/original/'.$old_imageNAME.'';	
		$file2='./upload/thumb/'.$old_imageNAME.'';	
		
		if($old_imageNAME!="")
			{	
			unlink($file1);
			unlink($file2);
			}
		//END//
		
		if($this->input->post('coupon_type')=='A')
			{
			$coupon_type='A';
			$coupon_type_id='1';	
			}
			else if($this->input->post('coupon_type')=='M')
			{
			$coupon_type='M';
			$coupon_type_id=$this->input->post('couponinfo');		
			}
			
			
		//FOR SMS,EMAIL AND PRINT
		($this->input->post('sms')=="Y") ? $sms=$this->input->post('sms') : $sms="N";
		($this->input->post('email')=="Y") ? $email=$this->input->post('email') : $email="N";	
		($this->input->post('print')=="Y") ? $print=$this->input->post('print') : $print="N";
			
							
		//Setting values for tabel columns
		$data = array('CATEGORY_ID' =>$this->input->post('category'),'HEADING' =>$this->input->post('heading'),'COUPON_TYPE'=>$coupon_type,'COUPON_TYPE_ID'=>$coupon_type_id,'DETAILS'=>$this->input->post('short_details'),'SMSDETAILS'=>$this->input->post('sms_details'),'IMAGE'=>$image_name,'EXPIRE_DATE'=>$this->input->post('exp_date'),'OTHER_DETAILS' =>$this->input->post('otherdetails'),'TERM_CON'=>$this->input->post('t_c'),'MERCHANT'=>$this->input->post('merdetails'),'SMS'=>$sms,'EMAIL'=>$email,'PRINT'=>$print,'SHOW' => 'N','HOME_STATUS'=>'N','FRONT_STATUS'=>'N');
		
		$this->db->where('ID', $rec_id);
		$this->db->update('admin_coupon', $data);
		}
	

//code for update offer category//
function update_catoffer($id)
		{
		$new_cat=$this->input->post('catname');	
		$data_table = array('NAME' =>$new_cat);
		
		$data['record'] = $this->db->get_where('admin_addcategory', array('ID' => $id));	
		foreach ($data['record']->result() as $row)
				{
				$old_cat=$row->NAME;	
				}
		
		if($new_cat==$old_cat)
			{
			$this->db->where('ID', $id);
			$this->db->update('admin_addcategory', $data_table); 	
			return '<div class="alert alert-success alert-dismissable" style="width:78%;">
                  	<i class="fa fa-check"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b>Alert!</b> Category Updated Successfully.
                  </div>';
			}
			else
			{
			$this->db->where('NAME', $new_cat);
			$this->db->where('CAT_TYPE', 'SD');
			$count = $this->db->count_all_results('admin_addcategory');
			if($count==0)
				{
				$this->db->where('ID', $id);
				$this->db->update('admin_addcategory', $data_table);
				return '<div class="alert alert-success alert-dismissable" style="width:78%;">
                  			<i class="fa fa-check"></i>
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    		<b>Alert!</b> Category Updated Successfully.
                  		</div>';
				}
				else
				{
				return '<div class="alert alert-danger alert-dismissable" style="width:78%;">
                  			<i class="fa fa-check"></i>
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    		<b>Alert!</b> This Category already in use. Please Enter Another One.
                  		</div>';
				}
			}
		}


//code for add new offer details to database //
//code for add new offer details to database //
function addofferDB()
		{
       	
		$date=date("Y-m-d H:i:s");
		if($this->input->post('offer_type')=='A')
			{
			$offer_type='A';
			$offer_type_id='1';	
			}
			else if($this->input->post('offer_type')=='M')
			{
			$offer_type='M';
			$offer_type_id=$this->input->post('merinfo');		
			}
		
		// Get default lang//
		$Def_Lang=$this->db->get_where('language',array('default'=>'Y'))->row('id');
		
		if($Def_Lang==$this->input->post('language'))
			{
			$lang='Y';
			}
			else
			{
			$lang='N';
			}
				
		$imagenameSESSION = $_SESSION["IMAGE_FINDER_UPDATE"];
		if($imagenameSESSION=='')
			{
			//Setting values for tabel columns
			$data = array('PL' =>$this->input->post('pl'),'CATEGORY_ID' =>$this->input->post('category'),'SD_TYPE'=>$offer_type,'SD_TYPE_ID'=>$offer_type_id,'PRIZE'=>$this->input->post('price'),'DISCOUNT' =>$this->input->post('discount'),'LDATE' => $this->input->post('offer_validity'),'OFFER_VALIDITY' => $this->input->post('offer_validity'),'PRO_STATUS'=>1,'HOME_STATUS'=>'Y','SHOW'=>'Y','STATUS'=>1,'FRONT_STATUS'=>'Y','default_lang'=>$lang,'DATE'=>$date);
			$query=$this->db->insert('admin_sdiscount',$data);  
			$offerID=$this->db->insert_id();
			unset($_SESSION["IMAGE_FINDER_UPDATE"]);
			}
			else
			{
			//Setting values for tabel columns
			$data = array('PL' =>$this->input->post('pl'),'CATEGORY_ID' =>$this->input->post('category'),'SD_TYPE'=>$offer_type,'SD_TYPE_ID'=>$offer_type_id,'PRIZE'=>$this->input->post('price'),'DISCOUNT' =>$this->input->post('discount'),'IMAGE'=>$imagenameSESSION,'LDATE' => $this->input->post('offer_validity'),'OFFER_VALIDITY' => $this->input->post('offer_validity'),'PRO_STATUS'=>1,'HOME_STATUS'=>'Y','SHOW'=>'Y','STATUS'=>1,'FRONT_STATUS'=>'Y','default_lang'=>$lang,'DATE'=>$date);
			$query=$this->db->insert('admin_sdiscount',$data);
			$offerID=$this->db->insert_id();
			unset($_SESSION["IMAGE_FINDER_UPDATE"]);
			}
		
		if($query)
			{
			$LangData=array('offerid'=>$offerID,'name'=>$this->input->post('offername'),'venue'=>$this->input->post('venue'),'comdetails'=>$this->input->post('com_details'),'offerdetails'=>$this->input->post('details'),'lang'=>$this->input->post('language'),'status'=>'1','date'=>$date);
			$this->db->insert('offer_lang',$LangData);
			return true;
			}
			else
			{
			return false;
			}
		}    


function updateshow_OFFER($rec_id,$cur_st)
		{
		$data = array('SHOW' =>$cur_st);
		$this->db->where('ID', $rec_id);
		$this->db->update('admin_sdiscount', $data);
		}

	
	function updateOFFERdetails_WITHIMAGE($rec_id)
		{
		if($this->input->post('offer_type')=='A')
			{
			$offer_type='A';
			$offer_type_id='1';	
			}
			else if($this->input->post('offer_type')=='M')
			{
			$offer_type='M';
			$offer_type_id=$this->input->post('merinfo');		
			}
			
			
		$imagenameSESSION = $_SESSION["IMAGE_FINDER_UPDATE"];
		if($imagenameSESSION=='')
			{
			//Setting values for tabel columns
			$data = array('PL' =>$this->input->post('pl'),'CATEGORY_ID' =>$this->input->post('category'),'SD_TYPE'=>$offer_type,'SD_TYPE_ID'=>$offer_type_id,'PRIZE'=>$this->input->post('price'),'DISCOUNT' =>$this->input->post('discount'),'LDATE' => $this->input->post('offer_validity'),'OFFER_VALIDITY' => $this->input->post('offer_validity'));	
			$this->db->where('ID', $rec_id);
			$this->db->update('admin_sdiscount', $data);
			unset($_SESSION["IMAGE_FINDER_UPDATE"]); 
			}
			else
			{
			//Delete Old Image From Folder//	
			$data['OFFERrecord'] = $this->db->get_where('admin_sdiscount', array('ID' => $rec_id));	
			foreach ($data['OFFERrecord']->result() as $row)
					{
					$old_imageNAME=$row->IMAGE;
					}
			$file1='./upload/original/'.$old_imageNAME.'';	
			$file2='./upload/thumb/'.$old_imageNAME.'';	
			
			
			if($old_imageNAME!="")
				{
				if(file_exists($file1))
					{
   					unlink($file1);
					}			
				
				if(file_exists($file2))
					{
   					unlink($file2);
					}
				}
			//END//
		
			//Setting values for tabel columns
			$data = array('PL' =>$this->input->post('pl') ,'CATEGORY_ID' =>$this->input->post('category'),'SD_TYPE'=>$offer_type,'SD_TYPE_ID'=>$offer_type_id,'PRIZE'=>$this->input->post('price'),'DISCOUNT' =>$this->input->post('discount'),'IMAGE'=>$imagenameSESSION,'LDATE' => $this->input->post('offer_validity'),'OFFER_VALIDITY' => $this->input->post('offer_validity'));
			$this->db->where('ID', $rec_id);
			$this->db->update('admin_sdiscount', $data);
			unset($_SESSION["IMAGE_FINDER_UPDATE"]); 
			}
		}


	//code for update image Upload category//
	function update_catimage($id)
		{
		$new_cat=$this->input->post('catname');	
		$data_table = array('NAME' =>$new_cat);
		
		$data['record'] = $this->db->get_where('admin_addcategory', array('ID' => $id));	
		foreach ($data['record']->result() as $row)
				{
				$old_cat=$row->NAME;	
				}
		
		if($new_cat==$old_cat)
			{
			$this->db->where('ID', $id);
			$this->db->update('admin_addcategory', $data_table); 	
			return '<div class="alert alert-success alert-dismissable" style="width:78%;">
                  	<i class="fa fa-check"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b>Alert!</b> Category Updated Successfully.
                  </div>';
			}
			else
			{
			$this->db->where('NAME', $new_cat);
			$this->db->where('CAT_TYPE', 'SI');
			$count = $this->db->count_all_results('admin_addcategory');
			if($count==0)
				{
				$this->db->where('ID', $id);
				$this->db->update('admin_addcategory', $data_table);
				return '<div class="alert alert-success alert-dismissable" style="width:78%;">
                  			<i class="fa fa-check"></i>
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    		<b>Alert!</b> Category Updated Successfully.
                  		</div>';
				}
				else
				{
				return '<div class="alert alert-danger alert-dismissable" style="width:78%;">
                  			<i class="fa fa-check"></i>
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    		<b>Alert!</b> This Category already in use. Please Enter Another One.
                  		</div>';
				}
			}
		}


	function uploadfinal($data)
			{
			$query=$this->db->insert('admin_server_images',$data);  
			if($query)
				{
				return true;
				}
				else
				{
				return false;
				}
			}
		
	function uploadproimage($rec_id,$name,$image_name)
			{
			$date=date("Y-m-d H:i:s");	
			
			$this->db->where('pro_id', $rec_id);
			$this->db->where('color_name', $this->input->post('color'));
			$countcolor = $this->db->count_all_results('admin_pro_color');
			
			//check this is first color or not
			$Firstcolor = $this->db->where('pro_id', $rec_id)->count_all_results('admin_pro_color');
			
			if($Firstcolor==0)
				{
				$status='1';
				}
				else
				{
				$status='2';	
				}
			
			if($countcolor==0){
			//Setting values for tabel columns [admin_pro_color]
			$datacolor = array('pro_id'=>$rec_id,'color_name'=>$this->input->post('color'),'status' => $status,'date'=>$date);	
			$querycolor=$this->db->insert('admin_pro_color',$datacolor);
			$color_id=$this->db->insert_id();
			}
			else if($countcolor>0)
			{
			$this->db->limit('1');
			$color_id = $this->db->get_where('admin_pro_color', array('pro_id' => $rec_id,'color_name' => $this->input->post('color')))->row('id');	
			}
			
			//Setting values for tabel columns [product image]
			$data = array('color_id'=>$color_id,'pro_id'=>$rec_id,'name'=>$name,'image'=>$image_name,'main_image'=>'N','status' => '1','date'=>$date);	
			$query=$this->db->insert('product_images',$data);
			
			}		    

//code to check old pass of login//
public function check_oldpass()
	{
	$oldpass=$this->input->post('oldpass');
	$loginuser=$this->session->userdata('ADMIN_USER');
	$loginpass=$this->session->userdata('ADMIN_PASS');
	
	if($oldpass==$loginpass)
		{
		return true;
		}
		else
		{
		return false;
		}
	}


function update_adminPASS()
	{
	$loginuser=$this->session->userdata('ADMIN_USER');
	$loginpass=md5($this->session->userdata('ADMIN_PASS'));	

	$loginuserID = $this->db->get_where('admin_login', array('USERNAME' => $loginuser,'PASSWORD'=>$loginpass))->row()->USER_ID;	
	$newpass=md5($this->input->post('newpass'));

	$data = array('PASSWORD' =>$newpass);
	$this->db->where('USER_ID', $loginuserID);
	$query=$this->db->update('admin_login', $data); 
	
	$dataArray = array('ADMIN_PASS' => $this->input->post('newpass'));
				
	$this->session->set_userdata($dataArray);	
			
	}


//code for add merchant details to database //
function addmerimage($mer_id,$uploadedFileName)
	{
	$date=date("Y-m-d H:i:s");
	$type=$this->input->post('type');
	$alt=$this->input->post('alt');
	$title=$this->input->post('title');
	if($type=='M' or $type=='B')
		{
		$lang=$this->input->post('language');
		}
		else
		{
		$lang='';	
		}
		
	if($uploadedFileName!='')
		{
		//Setting values for tabel columns
		$data = array('MER_ID' =>$mer_id,'image_type'=>$type,'lang'=>$lang,'ALT_TAG'=>$alt,'TITLE'=>$title,'IMAGE' =>$uploadedFileName,'STATUS' => 1,'DATE'=>$date);
		$query=$this->db->insert('admin_merchant_photo',$data); 
		}
		
	if($query)
		{
		return true;
		}
		else
		{
		return false;
		}
	
	}    

	function catSOfinal()
		{
		$date=date("Y-m-d H:i:s");	
		// Get default lang//
		$Def_Lang=$this->db->get_where('language',array('default'=>'Y'))->row('id');
		
		if($Def_Lang==$this->input->post('lang'))
			{
			$lang='Y';
			}
			else
			{
			$lang='N';
			}
			
		//Setting values for tabel columns
		$data = array('SUBCAT_STATUS'=>'0','POSITION'=>'0','LEFT_CAT_POS'=>'0','SHOW_STATUS'=>'Y','default_lang'=>$lang,'STATUS' => '1','DATE'=>$date);
				
       	$query=$this->db->insert('admin_web_cat',$data);
       	$catID=$this->db->insert_id();
       		
		if($query)
			{
			$langdata = array('cat_id'=>$catID,'name'=>$this->input->post('catname'),'lang'=>$this->input->post('lang'),'status' => '1','date'=>$date);
			$this->db->insert('cat_lang',$langdata);
			return true;
			}
			else
			{
			return false;
			}
		}
		
	function addindustry($data)
		{
       	$query=$this->db->insert('industry',$data);  
		if($query)
			{
			return true;
			}
			else
			{
			return false;
			}
		}	    

	function subcatSOfinal()
		{
		$date=date("Y-m-d H:i:s");
		// Get default lang//
		$Def_Lang=$this->db->get_where('language',array('default'=>'Y'))->row('id');
		
		if($Def_Lang==$this->input->post('lang'))
			{
			$lang='Y';
			}
			else
			{
			$lang='N';
			}
			
		//Setting values for tabel columns
		$data = array('SUPER_CAT'=>$this->input->post('category'),'SUBCAT_STATUS'=>'0','default_lang'=>$lang,'STATUS' => '1','DATE'=>$date);	
       	$query=$this->db->insert('admin_web_sub_cat',$data);  
       	$catID=$this->db->insert_id();
       	if($query)
			{
			$langdata = array('sub_cat_id'=>$catID,'name'=>$this->input->post('catname'),'lang'=>$this->input->post('lang'),'status' => '1','date'=>$date);
			$this->db->insert('sub_cat_lang',$langdata);	
			return true;
			}
			else
			{
			return false;
			}
		}


	function sscatSOfinal()
		{
		$date=date("Y-m-d H:i:s");
		// Get default lang//
		$Def_Lang=$this->db->get_where('language',array('default'=>'Y'))->row('id');
		
		if($Def_Lang==$this->input->post('lang'))
			{
			$lang='Y';
			}
			else
			{
			$lang='N';
			}
			
		//Setting values for tabel columns
		$data = array('SUPER_CAT'=>$this->input->post('subcategory'),'default_lang'=>$lang,'STATUS' => '1','DATE'=>$date);	
		
       	$query=$this->db->insert('admin_web_sub2_cat',$data);  
       	$catID=$this->db->insert_id();
       	
		if($query)
			{
			$langdata = array('super_cat_id'=>$catID,'name'=>$this->input->post('catname'),'lang'=>$this->input->post('lang'),'status' => '1','date'=>$date);
			$this->db->insert('super_cat_lang',$langdata);		
			return true;
			}
			else
			{
			return false;
			}
		}
	

	function addmaincatfinal()
		{
			$date=date("Y-m-d H:i:s");
		
		
			$langdata = array('MAIN_CATEGORY'=>$this->input->post('industry'),'CATEGORY'=>$this->input->post('catname'),'ADD_BY'=>'Admin','STATUS' => '1','ADD_DATE'=>$date);
			$this->db->insert('main_categories',$langdata);		
			return true;
			
		}
	
	function addmsubcatfinal()
		{
			$date=date("Y-m-d H:i:s");
		
		
			$langdata = array('CATEGORY'=>$this->input->post('category'),'SUB_CATEGORY'=>$this->input->post('catname'),'ADD_BY'=>'Admin','STATUS' => '1','ADD_DATE'=>$date);
			$this->db->insert('main_subcategories',$langdata);		
			return true;
			
		}
	
	function addmsupersubcatfinal()
		{
			$date=date("Y-m-d H:i:s");
		
		
			$langdata = array('CATEGORY'=>$this->input->post('category'),'SUB_CATEGORY'=>$this->input->post('subcategory'),'SUPERSUB_CATEGORY'=>$this->input->post('catname'),'ADD_BY'=>'Admin','STATUS' => '1','ADD_DATE'=>$date);
			$this->db->insert('main_supersubcategories',$langdata);		
			return true;
			
		}
	
	function updatestatus_SO_CAT($rec_id,$cur_st)
		{
		$data = array('SHOW_STATUS' =>$cur_st);
		$this->db->where('ID', $rec_id);
		$this->db->update('admin_web_cat', $data);
		}
		
	function updatestatus_SO_SCAT($rec_id,$cur_st)
		{
		$data = array('STATUS' =>$cur_st);
		$this->db->where('ID', $rec_id);
		$this->db->update('admin_web_sub_cat', $data);
		}
		
	function updatestatus_MAINCAT($rec_id,$cur_st)
		{
		$data = array('STATUS' =>$cur_st);
		$this->db->where('ID', $rec_id);
		$this->db->update('main_categories',$data);
		}
			
	function updatestatus_SUBCAT($rec_id,$cur_st)
		{
		$data = array('STATUS' =>$cur_st);
		$this->db->where('ID', $rec_id);
		$this->db->update('main_subcategories',$data);
		}
			
	function updatestatus_SUPERSUBCAT($rec_id,$cur_st)
		{
		$data = array('STATUS' =>$cur_st);
		$this->db->where('ID', $rec_id);
		$this->db->update('main_supersubcategories',$data);
		}
		
	function updatestatus_SO_SSCAT($rec_id,$cur_st)
		{
		$data = array('STATUS' =>$cur_st);
		$this->db->where('ID', $rec_id);
		$this->db->update('admin_web_sub2_cat', $data);
		}		
		
	function update_catSO($id)
		{
		$new_cat=$this->input->post('catname');	
		$data_taable = array('CAT_NAME' =>$new_cat);
		
		$old_cat = $this->db->get_where('admin_web_cat', array('ID' => $id))->row()->CAT_NAME;	
		
		if($new_cat==$old_cat)
			{
			$this->db->where('ID', $id);
			$this->db->update('admin_web_cat', $data_taable); 	
			return '<div class="alert alert-success alert-dismissable" style="width:78%;">
                  	<i class="fa fa-check"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b>Alert!</b>Shop Online Category Updated Successfully.
                  </div>';
			}
			else
			{
				
			$this->db->where('CAT_NAME', $new_cat);
			$count = $this->db->count_all_results('admin_web_cat');
			if($count==0)
				{
				$this->db->where('ID', $id);
				$this->db->update('admin_web_cat', $data_taable);
				return '<div class="alert alert-success alert-dismissable" style="width:78%;">
                  			<i class="fa fa-check"></i>
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    		<b>Alert!</b>Shop Online Category Updated Successfully.
                  		</div>';
				}
				else
				{
				return '<div class="alert alert-danger alert-dismissable" style="width:78%;">
                  			<i class="fa fa-check"></i>
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    		<b>Alert!</b> This Category already in use. Please Enter Another One.
                  		</div>';
				}
			}
			  
		
		}


function update_subcatSO($id)
		{
		$new_cat=$this->input->post('catname');
		$data_taable = array('CAT_NAME' =>$new_cat);
		
		$super_cat=$this->db->get_where('admin_web_sub_cat', array('ID' => $id))->row()->SUPER_CAT;	
		$old_cat = $this->db->get_where('admin_web_sub_cat', array('ID' => $id))->row()->CAT_NAME;	
		
		if($new_cat==$old_cat)
			{
			$this->db->where('ID', $id);
			$this->db->update('admin_web_sub_cat', $data_taable); 	
			return '<br/><div class="alert alert-success alert-dismissable" style="width:78%;">
                  	<i class="fa fa-check"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b>Alert!</b>Shop Online Sub Category Updated Successfully.
                  </div>';
			}
			else
			{
				
			$this->db->where('CAT_NAME', $new_cat);
			$this->db->where('SUPER_CAT', $super_cat);
			$count = $this->db->count_all_results('admin_web_sub_cat');
			if($count==0)
				{
				$this->db->where('ID', $id);
				$this->db->update('admin_web_sub_cat', $data_taable);
				return '<br/><div class="alert alert-success alert-dismissable" style="width:78%;">
                  			<i class="fa fa-check"></i>
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    		<b>Alert!</b>Shop Online Sub Category Updated Successfully.
                  		</div>';
				}
				else
				{
				return '<br/><div class="alert alert-danger alert-dismissable" style="width:78%;">
                  			<i class="fa fa-check"></i>
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    		<b>Alert!</b> This Category already in use. Please Enter Another One.
                  		</div>';
				}
			}
			  
		
		}


	function update_ssubcatSO($id)
		{
		$new_cat=$this->input->post('catname');
		$data_taable = array('CAT_NAME' =>$new_cat);
		
		$super_cat=$this->db->get_where('admin_web_sub2_cat', array('ID' => $id))->row()->SUPER_CAT;	
		$old_cat = $this->db->get_where('admin_web_sub2_cat', array('ID' => $id))->row()->CAT_NAME;
		
		if($new_cat==$old_cat)
			{
			$this->db->where('ID', $id);
			$this->db->update('admin_web_sub2_cat', $data_taable); 	
			return '<br/><div class="alert alert-success alert-dismissable" style="width:78%;">
                  	<i class="fa fa-check"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b>Alert!</b>Shop Online Super Sub Category Updated Successfully.
                  </div>';
			}
			else
			{
				
			$this->db->where('CAT_NAME', $new_cat);
			$this->db->where('SUPER_CAT', $super_cat);
			$count = $this->db->count_all_results('admin_web_sub2_cat');
			if($count==0)
				{
				$this->db->where('ID', $id);
				$this->db->update('admin_web_sub2_cat', $data_taable);
				return '<br/><div class="alert alert-success alert-dismissable" style="width:78%;">
                  			<i class="fa fa-check"></i>
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    		<b>Alert!</b>Shop Online Super Sub Category Updated Successfully.
                  		</div>';
				}
				else
				{
				return '<br/><div class="alert alert-danger alert-dismissable" style="width:78%;">
                  			<i class="fa fa-check"></i>
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    		<b>Alert!</b> This Category Already In Use. Please Enter Another One.
                  		</div>';
				}
			}
			  
		
		}

//code for add new Product details to database //
function addproDB($keynew,$image_name1)
		{
		$date=date("Y-m-d H:i:s");
		
		//SHOP TYPE CONDITION//
		if($this->input->post('shop_type')=='A')
			{
			$shop_type='A';
			$shop_type_id='1';	
			}
			else if($this->input->post('shop_type')=='M')
			{
			$shop_type='M';
			$shop_type_id=$this->input->post('merinfo');		
			}
		//END HERE//		
		
		// Get default lang//
		$Def_Lang=$this->db->get_where('language',array('default'=>'Y'))->row('id');
		
		if($Def_Lang==$this->input->post('language'))
			{
			$lang='Y';
			}
			else
			{
			$lang='N';
			}
		
		//Setting values for tabel columns
		$data = array('CATEGORY_ID'=>$this->input->post('category'),'SUB_CAT'=>$this->input->post('subcategory'),'SUPER_SUB_CAT'=>$this->input->post('ssubcategory'),'SKU'=>$this->input->post('sku'),'SO_TYPE'=>$shop_type,'SO_TYPE_ID'=>$shop_type_id,'PRIZE'=>$this->input->post('price'),'QUANTITY'=>$this->input->post('quantity'),'DISCOUNT_TYPE'=>$this->input->post('disType'),'DISCOUNT'=>$this->input->post('discount'),'keyword'=>$this->input->post('key'),'modify_key'=>$keynew,'PRO_STATUS'=>'N','HOME_STATUS'=>'N','SHOW'=>'N','STOCK'=>'N','default_lang'=>$lang,'STATUS' => 1,'DATE'=>$date);
		$query=$this->db->insert('admin_product',$data); 
		$proID=$this->db->insert_id();
		
		if($query)
		{
			$LangData=array('proid'=>$proID,'name'=>$this->input->post('pro_name'),'deliverydetails'=>$this->input->post('delivery'),'shortdetails'=>$this->input->post('short_details'),'prodetails'=>$this->input->post('details'),'lang'=>$this->input->post('language'),'status'=>'1','date'=>$date);
			$this->db->insert('product_lang',$LangData);	
			
		}
		
		$pro_colordata=array('pro_id'=>$proID,'color_name'=>$this->input->post('color'),'status'=>'1','date'=>$date);
		$this->db->insert('admin_pro_color',$pro_colordata);
		$colid=$this->db->insert_id();
		
		$pro_image=array('color_id'=>$colid,'pro_id'=>$proID,'name'=>$image_name1,'image'=>$image_name1,'main_image'=>'Y','head'=>'Y','status'=>'1','date'=>$date);
		$this->db->insert('product_images',$pro_image);
		
		if($this->db->affected_rows()>0)
		{
			$upadmin=array('IMAGE'=>$image_name1);
			$this->db->where('ID',$proID);
			$this->db->update('admin_product',$upadmin);
			$getprosize=trim($this->input->post('size'));
			if(!empty($getprosize)){
			$prosizes=explode(',',$getprosize);
			
				foreach($prosizes as $prosize)
				{
					$datasize=array('pro_id'=>$proID,'size'=>$prosize,'status'=>'1','date'=>$date);
					$this->db->insert('product_size',$datasize);
					$datasizeid=$this->db->insert_id();
					
					$colorsizedata=array('pro_id'=>$proID,'color_id'=>$colid,'size_id'=>$datasizeid,'status'=>'1','date'=>$date);
					$this->db->insert('admin_colorsize',$colorsizedata);
					
				}
			}
		}
				
}
function update_proST_SO($pro_id,$cur_st)
		{
		$data = array('PRO_STATUS' =>$cur_st);
		$this->db->where('ID', $pro_id);
		$this->db->update('admin_product', $data);
		}

function update_homeST_SO($pro_id,$cur_st)
		{
		$data = array('HOME_STATUS' =>$cur_st);
		$this->db->where('ID', $pro_id);
		$this->db->update('admin_product', $data);
		}

function update_showST_SO($pro_id,$cur_st)
		{
		$data = array('SHOW' =>$cur_st);
		$this->db->where('ID', $pro_id);
		$this->db->update('admin_product', $data);
		}

function update_stockST_SO($pro_id,$cur_st)
		{
		$data = array('STOCK' =>$cur_st);
		$this->db->where('ID', $pro_id);
		$this->db->update('admin_product', $data);
		}


function updatePROdetails($rec_id,$keynew)
		{
		if($this->input->post('shop_type')=='A')
			{
			$shop_type='A';
			$shop_type_id='1';	
			}
			else if($this->input->post('shop_type')=='M')
			{
			$shop_type='M';
			$shop_type_id=$this->input->post('merinfo');		
			}
		
		//Setting values for tabel columns
		$data = array('CATEGORY_ID'=>$this->input->post('category'),'SUB_CAT'=>$this->input->post('subcategory'),'SUPER_SUB_CAT'=>$this->input->post('ssubcategory'),'SKU'=>$this->input->post('sku'),'SO_TYPE'=>$shop_type,'SO_TYPE_ID'=>$shop_type_id,'PRIZE'=>$this->input->post('price'),'DISCOUNT'=>$this->input->post('discount'),'DISCOUNT_TYPE'=>$this->input->post('disType'),'QUANTITY'=>$this->input->post('quantity'),'keyword'=>$this->input->post('key'),'modify_key'=>$keynew);
		$this->db->where('ID', $rec_id);
		$this->db->update('admin_product', $data);
		}

	function updatecheckout($checkout_id,$cur_st)
		{
		$data = array('pay_st' =>$cur_st);
		$this->db->where('id', $checkout_id);
		$this->db->update('admin_checkout', $data);
		}

	function updatevccheckout($checkout_id,$cur_st)
		{
		$data = array('PAY_STATUS' =>$cur_st);
		$this->db->where('ID', $checkout_id);
		$this->db->update('cardvalue_order', $data);
		}


	function uploadlogo($data,$mer_id)
		{
       	$oldImage=$this->db->get_where('admin_merchant',array('ID'=>''.$mer_id.''))->row()->LOGO;
		
		if($oldImage!='')
			{
			$file1='./admin/merchant-logo/'.$oldImage.'';	
			if(file_exists($file1))
				{
   				unlink($file1);
				}
			}
		
		$this->db->where('id', $mer_id);
		$this->db->update('admin_merchant', $data);
		}    

	//code to check credential for login//
	public function check_sku()
	{
	$sku=$this->input->post('sku');
	$this->db->where('SKU',$sku);
	$query = $this->db->get('admin_product');
	if($query->num_rows() == 0)
		{
		return true;
		}
		else
		{
		return false;
		}
	}
	
	//code to check credential for login//
	public function check_code()
	{
	$code=$this->input->post('code');
	$this->db->where('cpn_code',$code);
	$query = $this->db->get('product_coupon');
	if($query->num_rows() == 0)
		{
		return true;
		}
		else
		{
		return false;
		}
	}
	
//code for add new Product details to database //
function procpn($rec_id)
		{
		$date=date("Y-m-d H:i:s");
		//COUPON TYPE CONDITION//
		if($this->input->post('cpn_type')=='P')
			{
			$cpn_type='P';
			$cpn_per=$this->input->post('cpnper');
			$cpn_fix='';
			}
			else if($this->input->post('cpn_type')=='F')
			{
			$cpn_type='F';
			$cpn_per='';
			$cpn_fix=$this->input->post('cpnfix');
			}
		//END HERE//		
		
		$daterange=$this->input->post('cpnvalidity');
		
		$DateArray=explode(' - ',$daterange);
		$Datefrom=$DateArray[0];
		$Dateto=$DateArray[1];
		
		//Setting values for tabel columns
		$data = array('pro_id'=>$rec_id,'cpn_code'=>$this->input->post('code'),'cpn_type'=>$cpn_type,'cpn_per'=>$cpn_per,'cpn_fix'=>$cpn_fix,'cpn_min_amt'=>$this->input->post('minamt'),'cpn_user_limit'=>$this->input->post('cpnlimit'),'cpn_from'=>$Datefrom,'cpn_to'=>$Dateto,'cpn_time_from'=>$this->input->post('time_from'),'cpn_time_to'=>$this->input->post('time_to'),'cpn_max_amt'=>$this->input->post('cpnmaxamt'),'STATUS'=>1,'DATE'=>$date);
		$query=$this->db->insert('product_coupon',$data);  
		
		if($query)
			{
			return true;
			}
			else
			{
			return false;
			}
		}
		
		
	//code for add new Product details to database //
	function updatecpn($rec_id)
		{
		//COUPON TYPE CONDITION//
		if($this->input->post('cpn_type')=='P')
			{
			$cpn_type='P';
			$cpn_per=$this->input->post('cpnper');
			$cpn_fix='';
			}
			else if($this->input->post('cpn_type')=='F')
			{
			$cpn_type='F';
			$cpn_per='';
			$cpn_fix=$this->input->post('cpnfix');
			}
		//END HERE//		
		
		$daterange=$this->input->post('cpnvalidity');
		
		$DateArray=explode(' - ',$daterange);
		$Datefrom=$DateArray[0];
		$Dateto=$DateArray[1];
		
		//Setting values for tabel columns
		$data = array('cpn_code'=>$this->input->post('code'),'cpn_type'=>$cpn_type,'cpn_per'=>$cpn_per,'cpn_fix'=>$cpn_fix,'cpn_min_amt'=>$this->input->post('minamt'),'cpn_user_limit'=>$this->input->post('cpnlimit'),'cpn_from'=>$Datefrom,'cpn_to'=>$Dateto,'cpn_time_from'=>$this->input->post('time_from'),'cpn_time_to'=>$this->input->post('time_to'),'cpn_max_amt'=>$this->input->post('cpnmaxamt'));
		$this->db->where('id',$rec_id);  
		$query=$this->db->update('product_coupon',$data);  
		
		if($query)
			{
			return true;
			}
			else
			{
			return false;
			}
		}	

	//code for add new Product details to database //
	function prosize($rec_id)
		{
		$date=date("Y-m-d H:i:s");
		
		//Setting values for tabel columns
		$data = array('pro_id'=>$rec_id,'size'=>$this->input->post('size'),'STATUS' => 1,'DATE'=>$date);
		$query=$this->db->insert('product_size',$data); 
		$size_id=$this->db->insert_id();
		
		if($query)
			{
			//get color count
			$this->db->where('pro_id', $rec_id);
			$this->db->where('status', 1);
			$countcolor = $this->db->count_all_results('product_images');
			
			//get color all color of product
			$color=$this->db->get_where('admin_pro_color',array('pro_id'=>$rec_id,'status'=>1));
		
			foreach($color->result() as $colrec)
				{
				$data = array('pro_id' =>$rec_id,'color_id' =>$colrec->id,'size_id' =>$size_id,'status' => 1,'date'=>$date);
				$query=$this->db->insert('admin_colorsize',$data);  	
				}	
			
			return true;
			}
			else
			{
			return false;
			}
		}

	function moreimage($rec_id,$name,$image_name)
		{
		$date=date("Y-m-d H:i:s");
		
		$pro_id=$this->db->get_where('admin_pro_color',array('id'=>$rec_id))->row('pro_id');
		
		//Setting values for tabel columns [product image]
		$data = array('color_id'=>$rec_id,'pro_id'=>$pro_id,'name'=>$name,'image'=>$image_name,'main_image'=>'N','status' => '1','date'=>$date);	
		$query=$this->db->insert('product_images',$data);	
		}

	function colorstatus($colorid,$cur_st)
		{
		$data = array('status' =>$cur_st);
		$this->db->where('id', $colorid);
		$this->db->update('admin_pro_color', $data);
		}
		
	function SetMain($ImageName,$proid,$imageid)
		{
		
		//update product [image colom]//
		$datapro = array('IMAGE' =>$ImageName);
		$this->db->where('ID', $proid);
		$this->db->update('admin_product', $datapro);
		//end here//
		
		//update product image table FOR NO STATUS//
		$dataimage = array('main_image' =>'N');
		$this->db->where('pro_id', $proid);
		$this->db->update('product_images', $dataimage);
		//end here//
		
		//update product image table FOR YES STATUS//
		$dataimage1 = array('main_image' =>'Y');
		$this->db->where('pro_id', $proid);
		$this->db->where('id', $imageid);
		$this->db->update('product_images', $dataimage1);
		//end here//
		
		}
	
function checklogin()
		{
		if($this->session->userdata('ADMIN_USER')!="" and $this->session->userdata('ADMIN_PASS')!="")
			{
			$user=$this->session->userdata('ADMIN_USER');
			$pass=md5($this->session->userdata('ADMIN_PASS'));
			$passWithOutMD5=$this->session->userdata('ADMIN_PASS');
			$userid=$this->db->get_where('admin_login',array('USERNAME'=>$user,'STATUS'=>'1'))->row()->USER_ID;
			$passDB=$this->db->get_where('admin_login',array('USERNAME'=>$user,'USER_ID'=>$userid,'STATUS'=>'1'))->row()->PASSWORD;
			if($passDB==$pass)
				{
				$this->db->where('USER_ID',$userid);
				$this->db->where('USERNAME',$user);
				$this->db->where('PASSWORD',$pass);
				$user_count=$this->db->count_all_results('admin_login');
				if($user_count==1)
					{
					$data = array(
					'ADMIN_USER' => $user,
					'ADMIN_PASS' => $passWithOutMD5);
					
					//$this->session->set_userdata($data);		
					}
					else
					{
					$this->session->sess_destroy();
					redirect(base_url().'admin/index','refresh');
					}
				}
				else
				{
				$this->session->sess_destroy();
				redirect(base_url().'admin/index','refresh');
				}
			}
			else
			{
			$this->session->sess_destroy();
			redirect(base_url().'admin/index','refresh');
			}
		}

function GetBuzzTitle($buzzID)
	{
	//~ get default language//
	$default_lang=$this->db->get_where('language',array('default'=>'Y'))->row('id');
	
	//~ count default language entry//
	$this->db->where('lang', $default_lang);
	$this->db->where('buzzid', $buzzID);
	$count=$this->db->count_all_results('buzz_lang');
	
	if($count==1)
		{
		$title=$this->db->get_where('buzz_lang',array('buzzid'=>$buzzID,'lang'=>$default_lang))->row('title');
		}
		else
		{
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$title=$this->db->get_where('buzz_lang',array('buzzid'=>$buzzID))->row('title');
		}
	return $title;
	}

function GetBuzzDefaultLangArray($buzzID)
	{
	//~ get default language//
	$default_lang=$this->db->get_where('language',array('default'=>'Y'))->row('id');
	
	//~ count default language entry//
	$this->db->where('lang', $default_lang);
	$this->db->where('buzzid', $buzzID);
	$count=$this->db->count_all_results('buzz_lang');
	
	if($count==1)
		{
		$BuzzLangArray=$this->db->get_where('buzz_lang',array('buzzid'=>$buzzID,'lang'=>$default_lang))->result_array();
		}
		else
		{
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$BuzzLangArray=$this->db->get_where('buzz_lang',array('buzzid'=>$buzzID))->result_array();
		}
	return $BuzzLangArray;
	}

function GetCouponHeading($couponID)
	{
	//~ get default language//
	$default_lang=$this->db->get_where('language',array('default'=>'Y'))->row('id');
	
	//~ count default language entry//
	$this->db->where('lang', $default_lang);
	$this->db->where('couponid', $couponID);
	$count=$this->db->count_all_results('coupon_lang');
	
	if($count==1)
		{
		$heading=$this->db->get_where('coupon_lang',array('couponid'=>$couponID,'lang'=>$default_lang))->row('heading');
		}
		else
		{
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$heading=$this->db->get_where('coupon_lang',array('couponid'=>$couponID))->row('heading');
		}
	return $heading;
	}

function GetCouponDefaultLangArray($couponID)
	{
	//~ get default language//
	$default_lang=$this->db->get_where('language',array('default'=>'Y'))->row('id');
	
	//~ count default language entry//
	$this->db->where('lang', $default_lang);
	$this->db->where('couponid', $couponID);
	$count=$this->db->count_all_results('coupon_lang');
	
	if($count==1)
		{
		$CouponLangArray=$this->db->get_where('coupon_lang',array('couponid'=>$couponID,'lang'=>$default_lang))->result_array();
		}
		else
		{
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$CouponLangArray=$this->db->get_where('coupon_lang',array('couponid'=>$couponID))->result_array();
		}
	
	return $CouponLangArray;
	}
	
function GetOfferName($offerID)
	{
	//~ get default language//
	$default_lang=$this->db->get_where('language',array('default'=>'Y'))->row('id');
	
	//~ count default language entry//
	$this->db->where('lang', $default_lang);
	$this->db->where('offerid', $offerID);
	$count=$this->db->count_all_results('offer_lang');
	
	if($count==1)
		{
		$name=$this->db->get_where('offer_lang',array('offerid'=>$offerID,'lang'=>$default_lang))->row('name');
		}
		else
		{
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$name=$this->db->get_where('offer_lang',array('offerid'=>$offerID))->row('name');
		}
	return $name;
	}

function GetOfferDefaultLangArray($offerID)
	{
	
	//~ get default language//
	$default_lang=$this->db->get_where('language',array('default'=>'Y'))->row('id');
	
	//~ count default language entry//
	$this->db->where('lang', $default_lang);
	$this->db->where('offerid', $offerID);
	$count=$this->db->count_all_results('offer_lang');
	
	if($count==1)
		{
		$OfferLangArray=$this->db->get_where('offer_lang',array('offerid'=>$offerID,'lang'=>$default_lang))->result_array();
		}
		else
		{
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$OfferLangArray=$this->db->get_where('offer_lang',array('offerid'=>$offerID))->result_array();
		}
	
	return $OfferLangArray;
	}	
	
function GetProductName($productID)
	{
	//~ get default language//
	$default_lang=$this->db->get_where('language',array('default'=>'Y'))->row('id');
	
	//~ count default language entry//
	$this->db->where('lang', $default_lang);
	$this->db->where('proid', $productID);
	$count=$this->db->count_all_results('product_lang');
	
	if($count==1)
		{
		$name=$this->db->get_where('product_lang',array('proid'=>$productID,'lang'=>$default_lang))->row('name');
		}
		else
		{
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$name=$this->db->get_where('product_lang',array('proid'=>$productID))->row('name');
		}
	return $name;
	}

function GetProductDefaultLangArray($productID)
	{
	//~ get default language//
	$default_lang=$this->db->get_where('language',array('default'=>'Y'))->row('id');
	
	//~ count default language entry//
	$this->db->where('lang', $default_lang);
	$this->db->where('proid', $productID);
	$count=$this->db->count_all_results('product_lang');
	
	if($count==1)
		{
		$ProductLangArray=$this->db->get_where('product_lang',array('proid'=>$productID,'lang'=>$default_lang))->result_array();
		}
		else
		{
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$ProductLangArray=$this->db->get_where('product_lang',array('proid'=>$productID))->result_array();
		}
	
	return $ProductLangArray;
	}

function updateindustryfinal($id)
	{
	$name=$this->input->post('name');	
	$data_taable = array('name' =>$name);
	
	$old_name = $this->db->get_where('industry', array('id' => $id))->row('name');
	
	if($name==$old_name)
		{
		$this->db->where('id', $id);
		$this->db->update('industry', $data_taable); 	
		return '<div class="alert alert-success alert-dismissable" style="width:78%;">
				<i class="fa fa-check"></i>
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<b>Alert!</b>Merchant Industry Updated Successfully.
			  </div>';
		}
		else
		{
			
		$this->db->where('name', $name);
		$count = $this->db->count_all_results('industry');
		if($count==0)
			{
			$this->db->where('id', $id);
			$this->db->update('industry', $data_taable);
			return '<div class="alert alert-success alert-dismissable" style="width:78%;">
						<i class="fa fa-check"></i>
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<b>Alert!</b>Merchant Industry Updated Successfully.
					</div>';
			}
			else
			{
			return '<div class="alert alert-danger alert-dismissable" style="width:78%;">
						<i class="fa fa-check"></i>
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<b>Alert!</b> This Industry already in use. Please Enter Another One.
					</div>';
			}
		}
	}


function GetCatName($catID)
	{
	//~ get default language//
	$default_lang=$this->db->get_where('language',array('default'=>'Y'))->row('id');
	
	//~ count default language entry//
	$this->db->where('lang', $default_lang);
	$this->db->where('cat_id', $catID);
	$count=$this->db->count_all_results('cat_lang');
	
	if($count==1)
		{
		$name=$this->db->get_where('cat_lang',array('cat_id'=>$catID,'lang'=>$default_lang))->row('name');
		}
		else
		{
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$name=$this->db->get_where('cat_lang',array('cat_id'=>$catID))->row('name');
		}
	
	if($count==0)
		{
		$name='';
		}
		
	return $name;
	}

function GetCatDefaultLangArray($catID)
	{
	//~ get default language//
	$default_lang=$this->db->get_where('language',array('default'=>'Y'))->row('id');
	
	//~ count default language entry//
	$this->db->where('lang', $default_lang);
	$this->db->where('cat_id', $catID);
	$count=$this->db->count_all_results('cat_lang');
	
	if($count==1)
		{
		$CatLangArray=$this->db->get_where('cat_lang',array('cat_id'=>$catID,'lang'=>$default_lang))->result_array();
		}
		else
		{
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$CatLangArray=$this->db->get_where('cat_lang',array('cat_id'=>$catID))->result_array();
		}
	return $CatLangArray;
	}


function GetSubCatName($catID)
	{
	//~ get default language//
	$default_lang=$this->db->get_where('language',array('default'=>'Y'))->row('id');
	
	//~ count default language entry//
	$this->db->where('lang', $default_lang);
	$this->db->where('sub_cat_id', $catID);
	$count=$this->db->count_all_results('sub_cat_lang');
	
	if($count==1)
		{
		$name=$this->db->get_where('sub_cat_lang',array('sub_cat_id'=>$catID,'lang'=>$default_lang))->row('name');
		}
		else
		{
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$name=$this->db->get_where('sub_cat_lang',array('sub_cat_id'=>$catID))->row('name');
		}
	
	if($count==0)
		{
		$name='';
		}	
		
	return $name;
	}

function GetSubCatDefaultLangArray($catID)
	{
	//~ get default language//
	$default_lang=$this->db->get_where('language',array('default'=>'Y'))->row('id');
	
	//~ count default language entry//
	$this->db->where('lang', $default_lang);
	$this->db->where('sub_cat_id', $catID);
	$count=$this->db->count_all_results('sub_cat_lang');
	
	if($count==1)
		{
		$CatLangArray=$this->db->get_where('sub_cat_lang',array('sub_cat_id'=>$catID,'lang'=>$default_lang))->result_array();
		}
		else
		{
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$CatLangArray=$this->db->get_where('sub_cat_lang',array('sub_cat_id'=>$catID))->result_array();
		}
	return $CatLangArray;
	}



function GetSuperCatName($catID)
	{
	//~ get default language//
	$default_lang=$this->db->get_where('language',array('default'=>'Y'))->row('id');
	
	//~ count default language entry//
	$this->db->where('lang', $default_lang);
	$this->db->where('super_cat_id', $catID);
	$count=$this->db->count_all_results('super_cat_lang');
	
	if($count==1)
		{
		$name=$this->db->get_where('super_cat_lang',array('super_cat_id'=>$catID,'lang'=>$default_lang))->row('name');
		}
		else
		{
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$name=$this->db->get_where('super_cat_lang',array('super_cat_id'=>$catID))->row('name');
		}
		
	if($count==0)
		{
		$name='';
		}	
		
	return $name;
	}

function GetSuperCatDefaultLangArray($catID)
	{
	//~ get default language//
	$default_lang=$this->db->get_where('language',array('default'=>'Y'))->row('id');
	
	//~ count default language entry//
	$this->db->where('lang', $default_lang);
	$this->db->where('super_cat_id', $catID);
	$count=$this->db->count_all_results('super_cat_lang');
	
	if($count==1)
		{
		$CatLangArray=$this->db->get_where('super_cat_lang',array('super_cat_id'=>$catID,'lang'=>$default_lang))->result_array();
		}
		else
		{
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$CatLangArray=$this->db->get_where('super_cat_lang',array('super_cat_id'=>$catID))->result_array();
		}
	return $CatLangArray;
	}

function GetMerShop($merID)
	{
	//~ get default language//
	$default_lang=$this->db->get_where('language',array('default'=>'Y'))->row('id');
	
	//~ count default language entry//
	$this->db->where('lang', $default_lang);
	$this->db->where('merid', $merID);
	$count=$this->db->count_all_results('merchant_lang');
	
	if($count==1)
		{
		$name=$this->db->get_where('merchant_lang',array('merid'=>$merID,'lang'=>$default_lang))->row('shop');
		}
		else
		{
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$name=$this->db->get_where('merchant_lang',array('merid'=>$merID))->row('shop');
		}
	
	if($count==0)
		{
		$name='';
		}
		
	return $name;
	}
	
function GetMerName($merID)
	{
	//~ get default language//
	$default_lang=$this->db->get_where('language',array('default'=>'Y'))->row('id');
	
	//~ count default language entry//
	$this->db->where('lang', $default_lang);
	$this->db->where('merid', $merID);
	$count=$this->db->count_all_results('merchant_lang');
	
	if($count==1)
		{
		$fname=$this->db->get_where('merchant_lang',array('merid'=>$merID,'lang'=>$default_lang))->row('fname');
		$lname=$this->db->get_where('merchant_lang',array('merid'=>$merID,'lang'=>$default_lang))->row('lname');
		$name=$fname.' '.$lname;
		}
		else
		{
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$fname=$this->db->get_where('merchant_lang',array('merid'=>$merID))->row('fname');
		
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$lname=$this->db->get_where('merchant_lang',array('merid'=>$merID))->row('lname');
		
		$name=$fname.' '.$lname;
		}
	
	if($count==0)
		{
		$name='';
		}
		
	return $name;
	}	

function GetMerDefaultLangArray($merID)
	{
	//~ get default language//
	$default_lang=$this->db->get_where('language',array('default'=>'Y'))->row('id');
	
	//~ count default language entry//
	$this->db->where('lang', $default_lang);
	$this->db->where('merid', $merID);
	$count=$this->db->count_all_results('merchant_lang');
	
	if($count==1)
		{
		$MerLangArray=$this->db->get_where('merchant_lang',array('merid'=>$merID,'lang'=>$default_lang))->result_array();
		}
		else
		{
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$MerLangArray=$this->db->get_where('merchant_lang',array('merid'=>$merID))->result_array();
		}
	return $MerLangArray;
	}

//function to move deleted data to zdel tables
function move_to_recycle_bin($table_name,$cond_array)
{
	$tbl_ex=$this->db->table_exists('zdel_'.$table_name);
	
	if (empty($tbl_ex)) 
	{
		$this->db->query("CREATE TABLE zdel_$table_name SELECT * FROM $table_name LIMIT 0");
		$this->db->query("ALTER TABLE `zdel_$table_name` ADD `pk` INT NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`pk`)");
		$this->db->query("ALTER TABLE `zdel_$table_name` ADD `delete_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ");
	}
	
	$result=$this->db->get_where($table_name,$cond_array)->result();
	foreach($result as $row)		
		$this->db->insert('zdel_'.$table_name,$row);
	
	$this->db->delete($table_name, $cond_array);		
}

function delmultiuser()
{
	$countId=count($this->input->POST('usr'));
	for($i=0; $i< $countId; $i++)
	{
		$id=$this->input->POST('usr')[$i];
		$uname=$this->db->get_where('admin_user_login',array('USER_ID' => $id))->row('USERNAME');
		
		$this->move_to_recycle_bin('admin_user_login', array('USER_ID' => $id));
		$this->move_to_recycle_bin('admin_user', array('ID' => $id));
		$this->move_to_recycle_bin('admin_user_address', array('user_id' => $id));
		//$this->move_to_recycle_bin('admin_checkout', array('user_id' => $id));
		//$this->move_to_recycle_bin('admin_coupon_email', array('user_id' => $id));
		//$this->move_to_recycle_bin('admin_deal_codes', array('USER_ID' => $id));
		//$this->move_to_recycle_bin('admin_deal_order', array('USER_ID' => $id));
		//$this->move_to_recycle_bin('admin_manage_cart', array('USER_ID' => $id));
		//$this->move_to_recycle_bin('admin_shipping', array('USER_ID' => $id));
		//$this->move_to_recycle_bin('admin_smscoupon', array('USERID' => $id));
		//$this->move_to_recycle_bin('cardvalue_order', array('USER_ID' => $id));
		//$this->move_to_recycle_bin('coupon_used', array('user_id' => $id));
		//$this->move_to_recycle_bin('po_checkout', array('userid' => $id));
		//$this->move_to_recycle_bin('po_cv_checkout', array('userid' => $id));
		//$this->move_to_recycle_bin('po_deal_checkout', array('userid' => $id));
	}
	$this->session->set_flashdata('msg',"All the records of <strong>$countId</strong> user(s) has been permanently deleted!");		
return "DONE";	
}

function delmultimer()
{
	echo $countId=count($this->input->POST('mer'));
	for($i=0; $i< $countId; $i++)
	{
		$id=$this->input->POST('mer')[$i];
		$mname=$this->db->get_where('admin_login',array('USER_ID' => $id,'RIGHT'=>'M'))->row('USERNAME');
		
		//$this->move_to_recycle_bin('admin_cvoffer', array('MER_ID' => $id));
		$this->move_to_recycle_bin('admin_deals', array('MER_ID' => $id));
		//$this->move_to_recycle_bin('admin_deal_codes', array('MER_ID' => $id));
		//$this->move_to_recycle_bin('admin_deal_order', array('MER_ID' => $id));
		$this->move_to_recycle_bin('admin_deal_other_info', array('MER_ID' => $id));
		$this->move_to_recycle_bin('admin_login', array('USER_ID' => $id,'RIGHT'=>'M'));
		$this->move_to_recycle_bin('admin_merchant', array('ID' => $id));
		$this->move_to_recycle_bin('admin_merchant_category', array('MER_ID' => $id));
		$this->move_to_recycle_bin('admin_merchant_details', array('MER_ID' => $id));
		$this->move_to_recycle_bin('admin_merchant_photo', array('MER_ID' => $id));
		$this->move_to_recycle_bin('merchant_lang', array('merid' => $id));
		
	}	
$this->session->set_flashdata('msg',"All the records of <strong>$countId</strong>  merchant(s) has been permanently deleted!");
	
return "DONE";	
}

function delmultiorder()
{
	$countId=count($this->input->POST('ord'));
	for($i=0; $i< $countId; $i++)
	{
		$id=$this->input->POST('ord')[$i];
		
		//$this->move_to_recycle_bin('admin_checkout', array('id' => $id));
		//$this->move_to_recycle_bin('admin_manage_cart', array('CHECKOUT_ID' => $id));
		//$this->move_to_recycle_bin('po_checkout', array('checkoutid' => $id));
		
	}	
$this->session->set_flashdata('msg',"All the records of <strong>$countId</strong>  Order(s) has been permanently deleted!");
	
return "DONE";	
}

function delmultivcorder()
{
	$countId=count($this->input->POST('ord'));
	for($i=0; $i< $countId; $i++)
	{
		$id=$this->input->POST('ord')[$i];
		
		//$this->move_to_recycle_bin('cardvalue_order', array('ID' => $id));
		//$this->move_to_recycle_bin('po_cv_checkout', array('checkoutid' => $id));
		
	}	
$this->session->set_flashdata('msg',"All the records of <strong>$countId</strong> Value Order(s) has been permanently deleted!");
	
return "DONE";	
}

function delmultideal()
{
	$countId=count($this->input->POST('deal'));
	for($i=0; $i< $countId; $i++)
	{
		$id=$this->input->POST('deal')[$i];
		
		$this->move_to_recycle_bin('admin_deals', array('ID' => $id));
		//$this->move_to_recycle_bin('admin_deal_codes', array('DEAL_ID' => $id));
		//$this->move_to_recycle_bin('admin_deal_order', array('DEAL_ID' => $id));
		
	}	
$this->session->set_flashdata('msg',"All the records of <strong>$countId</strong> deal(s) has been permanently deleted!");
	
return "DONE";	
}

function delmultireview()
{
	$countId=count($this->input->POST('rev'));
	for($i=0; $i< $countId; $i++)
	{
		$id=$this->input->POST('rev')[$i];
		
		$this->move_to_recycle_bin('review', array('ID' => $id));
		
	}	
$this->session->set_flashdata('msg',"Records of <strong>$countId</strong> Review(s) has been permanently deleted!");
	
return "DONE";	
}
function expiredealcode()
{
	$today=date('Y-m-d');
	$data = array('admin_deal_codes.STATUS ' => 'Expired');


$this->db->where('admin_deal_codes.STATUS ', 'Active');
$this->db->where('admin_deals.VALID_TO <', $today);
$this->db->update('admin_deal_codes join admin_deals on admin_deals.ID=admin_deal_codes.DEAL_ID', $data);
//echo $this->db->last_query();
}

function slideradd()
{
					
	$config['upload_path']          = 'newtheme/images/';
	// $config['file_name']          = date('YmdHis').rand(111,999).'.jpg';
	$config['allowed_types']        = 'gif|jpg|png';
    //$config['max_size']             = 100;
    //$config['max_width']            = 1024;
	//$config['max_height']           = 768;

$this->load->library('upload', $config);
if ( ! $this->upload->do_upload('imagetoupload'))
{
     $error = array('error' => $this->upload->display_errors());
}
else
{
	$upload_data=$this->upload->data();
}
	
$date=date("Y-m-d H:i:s");
				
				$filename=$upload_data['file_name'];
				$t=$this->input->POST('title1');
				$data=array( 'TITLE' => $t,
							 'SLIDER_IMAGE'  =>  $filename,
							 'POSITION'=>$this->input->POST('position'), 
							 'URL'=>$this->input->POST('url'), 
							 'FROM_DATE'=>$this->input->POST('fdate'),
							 'TO_DATE'=>$this->input->POST('tdate'),
							 'ADD_DATE'=>$date,
							 'SHOW'=>'Y');
				
	$query=$this->db->insert('home_slider',$data);  
	
	
}
function updateshowslider($id,$currentstatus)
		{
		$data = array('SHOW' =>$currentstatus);
		$this->db->where('ID', $id);
		$this->db->update('home_slider', $data);
		}


function updatesliderDb($id){
 
 $t=$this->input->POST('title1');
    $data=array( 'TITLE' => $t,
        
        'POSITION'=>$this->input->POST('position'), 
        'URL'=>$this->input->POST('url'), 
        'FROM_DATE'=>$this->input->POST('fdate'),
        'TO_DATE'=>$this->input->POST('tdate'),
       ); 
      
 $this->db->where('ID',$id);   
 $query=$this->db->update('home_slider',$data); 
 }
 
 function dealimageupload($did){
	
	
	 $imagenameSESSION = $_SESSION["IMAGE_FINDER_UPDATE"];
		if($imagenameSESSION!='')
			{
				 $date=date("Y-m-d");
				$data1 = array('MER_ID' => $did,'IMAGE' => $imagenameSESSION,'SHOW' => 'Y','ADDDATE'=>$date);
				$query1=$this->db->insert('deal_images',$data1);
				//echo $this->db->last_query();
			unset($_SESSION["IMAGE_FINDER_UPDATE"]);
			}
	/*$ErrorMedium=null;
	$ErrorSmall=null;	
	$error=null;	
			
	$FileCount = count($_FILES["userfile"]["name"]);
	if($FileCount==0){
		//redirect(base_url().'admin/proimg/'.$rec_id.'');
	}
	else
	{
		echo $did;
		echo $filename = $_FILES["userfile"]["name"];
		$files = $_FILES["userfile"];
		
		$this->load->library('image_lib');
		$this->load->library('upload');
		$i=0;
		foreach($filename as $aa)
		{
			$name = $files['name'][$i];
			$explode_image = explode(".",$name);
			echo $image_name = str_replace(".","",str_replace(" ","",date("YmdHis").microtime())).".".$explode_image[1];
			
			$_FILES['userfile']['name'] = $files['name'][$i];
			$_FILES['userfile']['type'] = $files['type'][$i];
			$_FILES['userfile']['tmp_name'] = $files['tmp_name'][$i];
			$_FILES['userfile']['error'] = $files['error'][$i];
			$_FILES['userfile']['size'] = $files['size'][$i];
			
			$config['upload_path'] = './upload/original/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '5000';
			$config['max_width']  = '4096';
			$config['max_height']  = '4096';
			$config['file_name']  = $image_name;
			
			$this->upload->initialize($config);
			$UploadOG=$this->upload->do_upload();
			if(!$UploadOG){ echo $ErrorOG = $this->upload->display_errors(); }
			
			list($widthOG, $heightOG, $typeOG, $attrOG) = getimagesize('./upload/original/'.$image_name.'');
			
			if($UploadOG)
				{
				//upload medium image//	
				$config3['image_library'] = 'GD2';
				$config3['source_image'] ='./upload/original/'.$image_name.'';
				$config3['new_image']='./upload/medium/'.$image_name.'';
				$config3['allowed_types'] = 'gif|jpg|png|jpeg';
				$config3['create_thumb'] = TRUE;
				$config3['maintain_ratio'] = TRUE;
				$config3['thumb_marker'] ='';
				//$config3['master_dim'] ='height';
				$config3['width']= 320;
				$config3['height']= 415;
				$dim3 = (intval($widthOG) / intval($heightOG)) - ($config3['width'] / $config3['height']);
				$config3['master_dim'] = ($dim3 < 0)? "height" : "width";
				
				$this->image_lib->initialize($config3);
				$UploadMedium=$this->image_lib->resize();
				if(!$UploadMedium){ echo $ErrorMedium = $this->image_lib->display_errors(); }
				//$this->image_lib->clear();
				//END HERE//
				
				$date=date("Y-m-d");
				$data1 = array('DEAL_ID' => $did,'IMAGE' => $image_name,'SHOW' => 'Y','ADDDATE'=>$date);
				$query1=$this->db->insert('deal_images',$data1);
				}
			
			
			$i++;
	
		}
	
	}//else upload close

*/
	
	}//fun close

	
	function GetCity($cityID)
	{
	//~ get default language//
	$default_lang=$this->db->get_where('language',array('default'=>'Y'))->row('id');
	
	//~ count default language entry//
	$this->db->where('lang', $default_lang);
	$this->db->where('city_id', $cityID);
	$count=$this->db->count_all_results('citylang');
	
	if($count==1)
		{
		$name=$this->db->get_where('citylang',array('lang'=>$default_lang,'city_id'=>$cityID))->row('name');
		}
		else
		{
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$name=$this->db->get_where('citylang',array('city_id'=>$cityID))->row('name');
		}
	
	return $name;
	}

	
	function GetMart($martID)
	{
	//~ get default language//
	$default_lang=$this->db->get_where('language',array('default'=>'Y'))->row('id');
	
	//~ count default language entry//
	$this->db->where('lang', $default_lang);
	$this->db->where('mart_id', $martID);
	$count=$this->db->count_all_results('martlang');
	
	if($count==1)
		{
		$name=$this->db->get_where('martlang',array('lang'=>$default_lang,'mart_id'=>$martID))->row('name');
		}
		else
		{
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$name=$this->db->get_where('martlang',array('mart_id'=>$martID))->row('name');
		}
	
	return $name;
	}
	
function getShopName($merid)
 {
 
  $name=$this->db->get_where('admin_merchant',array('ID'=>$merid))->row('SHOP');
 
 return $name;
 }
function updateshow_OFFER_ADM($rec_id,$cur_st)
		{
		$data = array('SHOW' =>$cur_st);
		$this->db->where('ID', $rec_id);
		$this->db->update('showcase_product', $data);
		}
		
	function updateshow_CAT_ADM($rec_id,$cur_st)
		{
		$data = array('STATUS' =>$cur_st);
		$this->db->where('ID', $rec_id);
		$this->db->update('admin_addcategory', $data);
		}	
	
}
?>
