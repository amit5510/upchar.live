<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
	function __construct() {
		 parent::__construct();
		 date_default_timezone_set("Asia/Kolkata");
		 $date=date('Y-m-d h:i:s');
		 
		 
	}
	public function index()
	{
		
		
		$center_id=getInstitutionId();
		$currentdpr=currentDpr();
		//$data['center'] = $this->db->join('dpr_center',"dpr_center.center_id=fddi_center.id AND dpr_center.dpr_id = '$currentdpr'")->count_all_results('fddi_center');
		$data['subcenter'] = $this->db->join('dpr_subcenter',"dpr_subcenter.subcenter_id=fddi_subcenter.subcenter_id  AND dpr_subcenter.dpr_id = '$currentdpr' AND fddi_subcenter.center_id='$center_id' ")->count_all_results('fddi_subcenter');
		$data['trainee'] = $this->db->where('dpr',$currentdpr)->where('center',$center_id)->count_all_results('fddi_trainee_registration');
		$data['placed'] = $this->db->where('dpr',$currentdpr)->where('center',$center_id)->count_all_results('placement_details');
		$data['faculty'] = $this->db->join('dpr_faculty',"dpr_faculty.faculty_id=fddi_faculty_reg.faculty_id AND dpr_faculty.dpr_id = '$currentdpr'  AND fddi_faculty_reg.center='$center_id' ")->count_all_results('fddi_faculty_reg');
		
		$this->db->join('fddi_trainee_batch','fddi_trainee_registration.id = fddi_trainee_batch.trainee_id');
		$this->db->join('fddi_batch',"fddi_batch.batch_id = fddi_trainee_batch.batch_id AND approval='A'");
		$data['enrolled'] = $this->db->where('fddi_trainee_registration.dpr',$currentdpr)->where('fddi_trainee_registration.center',$center_id)->count_all_results('fddi_trainee_registration');
		
		
		$min_ojt_hr=getMinOJT($currentdpr);
		
		$this->db->where('fddi_trainee_registration.center',$center_id);
		$this->db->where('fddi_trainee_registration.dpr',$currentdpr);
		$this->db->where("fddi_trainee_registration.industrial_attendance >= $min_ojt_hr");
		$this->db->where('placement_details.trainee_id IS NULL');
		$this->db->join('placement_details',"fddi_trainee_registration.id = placement_details.trainee_id",'left');
		$this->db->join('trainee_result',"fddi_trainee_registration.id = trainee_result.trainee_id AND trainee_result.result='PASS'");
		$data['trained']=$this->db->count_all_results('fddi_trainee_registration');
		
		
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('dashboard',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
	
}
