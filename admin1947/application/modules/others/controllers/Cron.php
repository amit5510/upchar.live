<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {

	
	function __construct() {
		 parent::__construct();
		 date_default_timezone_set("Asia/Kolkata");
		 $date=date('Y-m-d h:i:s');
		 //$this->load->model('cronmodel');
	}
	 
	public function index()
	{
		echo '503';
	}
	public function calculateattendance()
	{
		$currentdpr=currentDpr();
		$this->db->join('fddi_trainee_batch','fddi_trainee_registration.id = fddi_trainee_batch.trainee_id');
		$this->db->join('fddi_batch',"fddi_batch.batch_id = fddi_trainee_batch.batch_id AND approval='A' AND assessed='0'");
		$enrolled_not_assessed = $this->db->where('fddi_trainee_registration.dpr',$currentdpr)->get('fddi_trainee_registration');

		foreach($enrolled_not_assessed->result()  as $trainee){
			$center_attendance=0.0;
			$industrial_attendance=0.0;
			//count attendance
			$this->db->select('type,sum(time_duration) as duration');
			$this->db->group_by('trainee_id, type');
			$this->db->where('trainee_id',$trainee->id);
			$atttendance = $this->db->get('fddi_trainee_attendance');
			foreach($atttendance->result() as $att){
				if($att->type=='I')
					$industrial_attendance=$att->duration;
				else if($att->type=='C')
					$center_attendance=$att->duration;
				
			}
			echo $trainee->id.' - '.$center_attendance.' - '.$industrial_attendance.'<br>';
			//update
			$update=array('center_attendance'=>$center_attendance,'industrial_attendance'=>$industrial_attendance);
			$this->db->where('id',$trainee->id);
			$this->db->update('fddi_trainee_registration',$update);
		}
	} 
	//count attendance 
	//trained
	
	
	//controller ends here
}
