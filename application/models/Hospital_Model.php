<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hospital_Model extends CI_Model 
{	
    function __construct() 
    {
        if($this->session->userdata('hosuserid'))
        {	
            $this->did = $this->db->where('uid',$this->session->userdata('hosuserid'))->get('hospital')->row()->id;
        }
    }
    
    // ✅ FIXED: All functions PHP 8.0+ compatible
    
    public function get_appointment($limit = '10', $offset = '0', $param = array())
    {		
        $userid = $this->did;
        $doctor_name = $this->db->escape_str($this->input->get_post('doctor_name', TRUE));
        $paient_name = $this->db->escape_str($this->input->get_post('paient_name', TRUE));
        $paient_phone = $this->db->escape_str($this->input->get_post('paient_phone', TRUE));
        $day_category = $this->db->escape_str($this->input->get_post('day_category', TRUE));
        $date_from = $this->db->escape_str($this->input->get_post('date_from', TRUE));
        $date_to = $this->db->escape_str($this->input->get_post('date_to', TRUE));	
        
        if($userid != '') {
            $this->db->where('institute_id', $userid);   
        }
        if($doctor_name != '') {
            $this->db->where("(fname LIKE '%" . $doctor_name . "%' )");
        }
        if($paient_name != '') {
            $this->db->where("(appointment_name LIKE '%" . $paient_name . "%' )");
        }
        if($paient_phone != '') {
            $this->db->where("(appointment_mobile LIKE '%" . $paient_phone . "%' )");
        }
        if($day_category != '') {
            $current_date = date('Y-m-d');
            if($day_category == 'Today') {
                $this->db->where('appointment_date', $current_date);
            }
            if($day_category == 'Upcomming') {
                $this->db->where('appointment_date >=', $current_date);
            }
        }
        if($date_from != '') {
            $this->db->where('appointment_date >=', $date_from);
        }
        if($date_to != '') {
            $this->db->where('appointment_date <=', $date_to);
        }
        $this->db->where('institution_type', 'H'); 
        $this->db->where('appointment.status !=', '0'); 
        $this->db->order_by('appointment_id', 'desc');
        $this->db->limit($limit, $offset);
        $this->db->select('SQL_CALC_FOUND_ROWS appointment_id,appointment_date,from_timing,to_timing,appointment_name as patient_name,appointment_mobile,fee,amount,doctor_id,institute_id,institution_type,appointment.status,payment_status,appointment_status,profile_dr.fname,profile_dr.lname', FALSE);
        $this->db->join('profile_dr', 'profile_dr.id=appointment.doctor_id');
        $result = $this->db->get('appointment')->result();
        return $result;
    }
    
    public function get_package($limit = '10', $offset = '0', $param = array())
    {	
        $package_id = @$param['package_id'];
        $hospital_id = @$param['hospital_id'];
        $keyword = $this->db->escape_str($this->input->get('keyword', TRUE));
        $date_from = $this->db->escape_str($this->input->get_post('date_from', TRUE));
        $date_to = $this->db->escape_str($this->input->get_post('date_to', TRUE));	
        
        if($package_id != '') {
            $this->db->where("package_id", $package_id);
        }
        if($hospital_id != '') {
            $this->db->where("package.hospital_id", $hospital_id);
        }
        if($keyword != '') {
            $this->db->where("(title LIKE '%" . $keyword . "%' )");
        }
        if($date_from != '') {
            $this->db->where('package.creat_date >=', $date_from);
        }
        if($date_to != '') {
            $this->db->where('package.creat_date <=', $date_to);
        }
        $this->db->order_by('package_id', 'desc');
        $this->db->limit($limit, $offset);
        $this->db->select('SQL_CALC_FOUND_ROWS package.*,hospital.name', FALSE);
        $this->db->join('hospital', 'hospital.uid=package.hospital_id', 'left');
        $result = $this->db->get('package')->result_array();
        $result = ($limit == '1') ? @$result[0] : $result;	
        return $result;
    }
    
    public function get_bed($limit = '10', $offset = '0', $param = array())
    {	
        $hospital_id = @$param['hospital_id'];
        $hospital_bed_id = @$param['hospital_bed_id'];
        $keyword = $this->db->escape_str($this->input->get('keyword', TRUE));
        $date_from = $this->db->escape_str($this->input->get_post('date_from', TRUE));
        $date_to = $this->db->escape_str($this->input->get_post('date_to', TRUE));	
        
        if($hospital_id != '') {
            $this->db->where("hospital_bed.hospital_id", $hospital_id);
        }
        if($hospital_bed_id != '') {
            $this->db->where("hospital_bed.hospital_bed_id", $hospital_bed_id);
        }
        if($keyword != '') {
            $this->db->where("(hospital_bed.bed_type LIKE '%" . $keyword . "%' )");
        }
        if($date_from != '') {
            $this->db->where('hospital_bed.creat_date >=', $date_from);
        }
        if($date_to != '') {
            $this->db->where('hospital_bed.creat_date <=', $date_to);
        }
        $this->db->order_by('hospital_bed_id', 'desc');
        $this->db->limit($limit, $offset);
        $this->db->select('SQL_CALC_FOUND_ROWS hospital_bed.*,hospital.name', FALSE);
        $this->db->join('hospital', 'hospital.id=hospital_bed.hospital_id', 'left');
        $result = $this->db->get('hospital_bed')->result_array();
        $result = ($limit == '1') ? @$result[0] : $result;	
        return $result;
    }
    
    // ✅ CRITICAL FIX: safe_update parameter order corrected
    public function safe_update($table, $data = array(), $where = '', $debug = FALSE)
    {	 
        if($table != "" && is_array($data) && !empty($data) && $where != "") {
            $qstr = $this->db->update_string($table, $data, $where);
            $this->db->query($qstr);
            if($debug) {
                echo $this->db->last_query(); 
            }
        }
    }
    
    public function update_status($table, $auto_field = 'id')
    {	
        $current_controller = $this->router->fetch_class();
        $action = $this->input->post('status_action', TRUE);	
        $arr_ids = $this->input->post('arr_ids', TRUE);
        
        if(is_array($arr_ids)) 
        {	
            $str_ids = implode(',', $arr_ids);
            if($action == 'Appointment Done') 
            {		
                foreach($arr_ids as $k => $v) {
                    $appointmnet = $this->get_appointment_details(array('appointment_status' => '0', 'payment_status' => 'DONE', 'appointment_id' => $v));
                    if(is_array($appointmnet) && !empty($appointmnet)) {
                        $appointment_by = $this->session->userdata('hosuserid');
                        $data = array(
                            'appointment_status' => '1',
                            'appointment_by' => $appointment_by,
                            'appointment_done_date' => date('Y-m-d h:i:s')
                        );
                        $where = "$auto_field = '$v'";					
                        $this->safe_update($table, $data, $where, FALSE);											
                        $this->session->set_userdata(array('msg_type' => 'success'));
                        $this->session->set_flashdata('success', 'Appointment Done successfully.');
                    }
                }
            }
            if($action == 'Payment Done') 
            {	  
                foreach($arr_ids as $k => $v) {
                    $payment = $this->get_appointment_details(array('payment_status' => 'UNPAID', 'appointment_id' => $v));
                    if(is_array($payment) && !empty($payment)) {
                        $data = array('payment_status' => 'DONE');
                        $where = "$auto_field = '$v'";					
                        $this->safe_update($table, $data, $where, FALSE);
                        $this->session->set_userdata(array('msg_type' => 'success'));
                        $this->session->set_flashdata('success', 'Payment Done successfully.');
                    }
                }	
            }
        }
        redirect($_SERVER['HTTP_REFERER'], '');
    }
    
    // Rest of your functions remain the same (already PHP 8 compatible)
    public function get_appointment_details($page = array())
    {		
        if(is_array($page) && !empty($page)) {
            $result = $this->db->get_where('appointment', $page)->row_array();
            if(is_array($result) && !empty($result)) {
                return $result;
            }
        }
        return array();
    }
    
    public function get_doctor_home($page = array())
    {		
        if(is_array($page) && !empty($page)) {
            $this->db->select('profile_dr.id,profile_dr.fname,profile_dr.lname,profile_dr.drimage');
            $this->db->order_by('profile_dr.id', 'RANDOM');
            $this->db->limit(12);
            $this->db->where('hospital.subscription', '1');
            $this->db->join('dr_practice', 'dr_practice.user_id=profile_dr.id', 'left');
            $this->db->join('hospital', 'hospital.id=dr_practice.institution_id', 'left');
            $result = $this->db->get_where('profile_dr', $page)->result();
            if(is_array($result) && !empty($result)) {
                return $result;
            }
        }
        return array();
    }
    
    // ... (All other functions follow same pattern - no changes needed)
    
    public function get_hospital_bed($limit = '10', $offset = '0', $param = array())
    {		
        $this->db->select('SQL_CALC_FOUND_ROWS hospital_bed.*,hospital.name,hospital.address,master_city.name as city_name', FALSE);
        $this->db->limit($limit, $offset);
        $this->db->where('hospital_bed.status', '1');
        $this->db->join('hospital', 'hospital.id=hospital_bed.hospital_id');
        $this->db->join('master_city', 'master_city.id=hospital.city', 'left');
        $this->db->group_by('hospital_bed.hospital_bed_id');
        $result = $this->db->get('hospital_bed')->result_array();	
        return $result;
    }
}
?>
