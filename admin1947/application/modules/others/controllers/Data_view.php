<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_view extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	 // added dpr  in center sub center faculty, agency , 
	 
	function __construct() {
		 parent::__construct();
		 
		  /* Useful $_POST Variables coming from the plugin */
			$this->draw = $this->input->post('draw');//$_POST["draw"];//counter used by DataTables to ensure that the Ajax returns from server-side processing requests are drawn in sequence by DataTables
		 // $orderByColumnIndex  =  $this->input->post('order')[0]['column'];// index of the sorting column (0 index based - i.e. 0 is the first record)
		 //$orderBy =  $this->input->post('columns')[$orderByColumnIndex]['data'];//Get name of the sorting column from its index
		// $orderType =  $this->input->post('order')[0]['dir']; // ASC or DESC
			$this->start  = $this->input->post('start');//$_POST["start"];//Paging first record indicator.
			$this->length = $this->input->post('length');//$_POST['length'];//Number of records that the table can display in the current draw
			$this->search = $this->input->post('search');
		 
		 
	}
	 
	function doctorview()
	{
		$recordsTotal=$this->db->order_by('id','DESC')->count_all_results('profile_dr');
		$this->db->limit($this->length,$this->start);		
		if(!empty($this->search['value']))
		{
			$this->db->group_start();
			$this->db->or_like('id',$this->search['value']);
			$this->db->or_like('email',$this->search['value']);
			$this->db->or_like('fname',$this->search['value']);
			$this->db->or_like('lname',$this->search['value']);
			$this->db->or_like('mobile',$this->search['value']);
			$this->db->group_end();
			
			$getlists=$this->db->order_by('id','DESC')->get_where('profile_dr',array());
			$recordsFiltered = $getlists->num_rows();
		}
		else
		{
			$getlists=$this->db->order_by('id','DESC')->get_where('profile_dr',array());
			$recordsFiltered = $recordsTotal;
		}
		$data=array();
		foreach($getlists->result() as $rowdata)
		{
			$delete="<a href=\"".base_url()."doctor/doctorview/deletedoctor/".$rowdata->id."\" data-upcahr-did=\"".$rowdata->id."\"><span class='glyphicon glyphicon-trash'></span></a> ";
			$update="<a href=\"".base_url()."doctor/doctorview/updatedoctor/".$rowdata->id."\" data-upcahr-did=\"".$rowdata->id."\"><span class='glyphicon glyphicon-edit'></span></a> ";
			$View="<a href=\"".base_url()."doctor/doctorview/viewdoctor/".$rowdata->id."\" data-upcahr-did=\"".$rowdata->id."\"><span class='glyphicon glyphicon-eye-open'></span></a> ";
					
			if($rowdata->approved)
				$approval="<a class='actionapprove' style='color:#097d0d;cursor:pointer;' data-upcahr-did='".$rowdata->id."'>Approved</a> ";
			else
				$approval="<a class='actionapprove' style='color:#f00;cursor:pointer;' data-upcahr-did='".$rowdata->id."'>Not Approved</a>  ";
			if($rowdata->verified)
				$verification="<a class='actionverify' style='color:#097d0d;cursor:pointer;' data-upcahr-did='".$rowdata->id."'>Verified</a> ";
			else
				$verification="<a class='actionverify' style='color:#f00;cursor:pointer;' data-upcahr-did='".$rowdata->id."'>Not Verified</a> ";
			 $action="$update | $verification | $approval | $View | $delete";
				$data[]= array(
				$rowdata->id, $rowdata->fname.' '.$rowdata->lname, getCityName($rowdata->city), $rowdata->email, $rowdata->mobile, formateDate($rowdata->creat_date),$action);
			    $result[]= array(
			    $rowdata->id,$row->fname.''.$rowdata->lname,getCityName($rowdata->city),$row->email,$rowdata->mobile,formatedate($rowdata->creat_date),$action);    
		}
				//print_r($data); die;
		$response = array(
				"draw" => intval($this->draw),
				"recordsTotal" => $recordsTotal,
				"recordsFiltered" => $recordsFiltered,
				"data" => $data
				);

		echo json_encode($response);
	}
	
	function hospitalview()
	{
		
		
		$recordsTotal=$this->db->order_by('id','DESC')->count_all_results('hospital');
		
	
		$this->db->limit($this->length,$this->start);
				
		if(!empty($this->search['value'])){
			
			$this->db->group_start();
			$this->db->or_like('id',$this->search['value']);
			$this->db->or_like('email',$this->search['value']);
			$this->db->or_like('name',$this->search['value']);
			$this->db->or_like('mobile',$this->search['value']);
			$this->db->group_end();
			
			$getlists=$this->db->order_by('id','DESC')->get_where('hospital',array());
			$recordsFiltered = $getlists->num_rows();
			
		}else{
			
			$getlists=$this->db->order_by('id','DESC')->get_where('hospital',array());
			
			$recordsFiltered = $recordsTotal;
		}
		
		
		
			$data=array();
			
				foreach($getlists->result() as $rowdata){
					$update="<a href='".base_url()."doctor/clinicreg/updatehospital/".$rowdata->id."' data-did=\"".$rowdata->id."\"><span class='glyphicon glyphicon-edit'></span></a> ";
					
					//$update="<a href=\"#\" data-upcahr-did=\"".$rowdata->id."\">Update</a> ";
					$View="<a href='".base_url()."doctor/clinicreg/hospitalview/".$rowdata->id."' data-did=\"".$rowdata->id."\"><span class='glyphicon glyphicon-eye-open'></span></a> ";
					$delete="<a href='".base_url()."doctor/clinicreg/deletehospital/".$rowdata->id."' data-did=\"".$rowdata->id."\"><span class='glyphicon glyphicon-trash'></span></a> ";
				
					if($rowdata->approved)
						$approval="<a class='actionapprove' style='color:#097d0d;cursor:pointer;' data-upcahr-did='".$rowdata->id."'>Approved</a> ";
					else
						$approval="<a class='actionapprove' style='color:#f00;cursor:pointer;' data-upcahr-did='".$rowdata->id."'>Not Approved</a>  ";
					
					if($rowdata->verified)
						$verification="<a class='actionverify' style='color:#097d0d;cursor:pointer;' data-upcahr-did='".$rowdata->id."'>Verified</a> ";
					else
						$verification="<a class='actionverify' style='color:#f00;cursor:pointer;' data-upcahr-did='".$rowdata->id."'>Not Verified</a> ";
					
					
					$action="$update | $verification | $approval | $View | $delete";
				
				$data[]= array(
				$rowdata->id, $rowdata->name, getCityName($rowdata->city), $rowdata->email, $rowdata->mobile, formateDate($rowdata->creat_date),$action);
			
			
				
				
			}
			
			 $response = array(
					"draw" => intval($this->draw),
					"recordsTotal" => $recordsTotal,
					"recordsFiltered" => $recordsFiltered,
					"data" => $data
					);

			echo json_encode($response);
		
		
		
		
		
	}

	
	function clinicview(){
		
		/* $dpr=@$this->input->post('dpr');
		$center=@$this->input->post('center');
		$subcenter=@$this->input->post('subcenter');
		$course=@$this->input->post('course');
		
			
		
		
		//if($dpr){
			$this->db->where('dpr',$dpr);
		//}
		if($center){
			$this->db->where('center',$center);
		}
		if($subcenter){
			
			$this->db->where('subcenter',$subcenter);
		}
		if($course){
			
			$this->db->where('course',$course);
		}
		
		 */
		$recordsTotal=$this->db->order_by('id','DESC')->count_all_results('clinic');
		
	
	/* 
		//if($dpr){
			$this->db->where('dpr',$dpr);
		//}
		if($center){
			$this->db->where('center',$center);
		}
		if($subcenter){
			
			$this->db->where('subcenter',$subcenter);
		}
		if($course){
			
			$this->db->where('course',$course);
		} */
		
		$this->db->limit($this->length,$this->start);
				
		if(!empty($this->search['value'])){
			
			$this->db->group_start();
			$this->db->or_like('id',$this->search['value']);
			$this->db->or_like('email',$this->search['value']);
			$this->db->or_like('name',$this->search['value']);
			$this->db->or_like('city',$this->search['value']);
			$this->db->or_like('mobile',$this->search['value']);
			$this->db->group_end();
			
			$getlists=$this->db->order_by('id','DESC')->get_where('clinic',array());
			$recordsFiltered = $getlists->num_rows();
			
		}else{
			
			$getlists=$this->db->order_by('id','DESC')->get_where('clinic',array());
			
			$recordsFiltered = $recordsTotal;
		}
		
		
		
			$data=array();
			
				foreach($getlists->result() as $rowdata){
					$update="<a href='".base_url()."doctor/clinicreg/updateclinic/".$rowdata->id."' data-did=\"".$rowdata->id."\"><span class='glyphicon glyphicon-edit'></span></a> ";
					
					//$update="<a href=\"#\" data-upcahr-did=\"".$rowdata->id."\">Update</a> ";
				//	$View="<a href=\"#\" data-upcahr-did=\"".$rowdata->id."\">View</a> ";
					$View="<a href='".base_url()."doctor/clinicreg/clinicview/".$rowdata->id."' data-did=\"".$rowdata->id."\"><span class='glyphicon glyphicon-eye-open'></span></a>";
					
					if($rowdata->approved)
						$approval="<a class='actionapprove' style='color:#097d0d;cursor:pointer;' data-upcahr-did='".$rowdata->id."'>Approved</a> ";
					else
						$approval="<a class='actionapprove' style='color:#f00;cursor:pointer;' data-upcahr-did='".$rowdata->id."'>Not Approved</a>  ";
					
					if($rowdata->verified)
						$verification="<a class='actionverify' style='color:#097d0d;cursor:pointer;' data-upcahr-did='".$rowdata->id."'>Verified</a> ";
					else
						$verification="<a class='actionverify' style='color:#f00;cursor:pointer;' data-upcahr-did='".$rowdata->id."'>Not Verified</a> ";
					
					
			$action="$update | $verification | $approval | $View";
				
				$data[]= array(
				$rowdata->id, $rowdata->name, getCityName($rowdata->city), $rowdata->email, $rowdata->mobile, formateDate($rowdata->creat_date),$action);
				
				
			}
			
			 $response = array(
					"draw" => intval($this->draw),
					"recordsTotal" => $recordsTotal,
					"recordsFiltered" => $recordsFiltered,
					"data" => $data
					);

			echo json_encode($response);
		
		
		
		
		
	}
	
	
	function pathologyview(){
		
		/* $dpr=@$this->input->post('dpr');
		$center=@$this->input->post('center');
		$subcenter=@$this->input->post('subcenter');
		$course=@$this->input->post('course');
		
		//if($dpr){
			$this->db->where('dpr',$dpr);
		//}
		if($center){
			$this->db->where('center',$center);
		}
		if($subcenter){
			
			$this->db->where('subcenter',$subcenter);
		}
		if($course){
			
			$this->db->where('course',$course);
		}
		
		 */
		$recordsTotal=$this->db->order_by('id','DESC')->count_all_results('pathlab');
		
	
	/* 
		//if($dpr){
			$this->db->where('dpr',$dpr);
		//}
		if($center){
			$this->db->where('center',$center);
		}
		if($subcenter){
			
			$this->db->where('subcenter',$subcenter);
		}
		if($course){
			
			$this->db->where('course',$course);
		} */
		
		$this->db->limit($this->length,$this->start);
				
		if(!empty($this->search['value'])){
			
			$this->db->group_start();
			$this->db->or_like('id',$this->search['value']);
			$this->db->or_like('email',$this->search['value']);
			$this->db->or_like('name',$this->search['value']);
			$this->db->or_like('city',$this->search['value']);
			$this->db->or_like('mobile',$this->search['value']);
			$this->db->group_end();
			
			$getlists=$this->db->order_by('id','DESC')->get_where('pathlab',array());
			$recordsFiltered = $getlists->num_rows();
			
		}else{
			
			$getlists=$this->db->order_by('id','DESC')->get_where('pathlab',array());
			
			$recordsFiltered = $recordsTotal;
		}
		
		
		
			$data=array();
			
				foreach($getlists->result() as $rowdata){
					$update="<a href='".base_url()."doctor/pathlabreg/pathlabupdate/".$rowdata->id."' data-did=\"".$rowdata->id."\"><span class='glyphicon glyphicon-edit'></span></a> ";
					
				//	$update="<a href=\"#\" data-upcahr-did=\"".$rowdata->id."\">Update</a> ";
					//$View="<a href=\"#\" data-upcahr-did=\"".$rowdata->id."\">View</a> ";
					
                          $View="<a href='".base_url()."doctor/pathlabreg/pathlabview/".$rowdata->id."' data-did=\"".$rowdata->id."\"><span class='glyphicon glyphicon-eye-open'></span></a> ";



					if($rowdata->approved)
						$approval="<a class='actionapprove' style='color:#097d0d;cursor:pointer;' data-upcahr-did='".$rowdata->id."'>Approved</a> ";
					else
						$approval="<a class='actionapprove' style='color:#f00;cursor:pointer;' data-upcahr-did='".$rowdata->id."'>Not Approved</a>  ";
					
					if($rowdata->verified)
						$verification="<a class='actionverify' style='color:#097d0d;cursor:pointer;' data-upcahr-did='".$rowdata->id."'>Verified</a> ";
					else
						$verification="<a class='actionverify' style='color:#f00;cursor:pointer;' data-upcahr-did='".$rowdata->id."'>Not Verified</a> ";
					
					
			$action="$update | $verification | $approval | $View";
				
				$data[]= array(
				$rowdata->id, $rowdata->name, getCityName($rowdata->city), $rowdata->email, $rowdata->mobile, formateDate($rowdata->creat_date),$action);
				
				
			}
			
			 $response = array(
					"draw" => intval($this->draw),
					"recordsTotal" => $recordsTotal,
					"recordsFiltered" => $recordsFiltered,
					"data" => $data
					);

			echo json_encode($response);
		
		
		
		
		
	}
	
	
// controller ends here	
}
