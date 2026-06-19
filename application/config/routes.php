<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] 			= 'home';
$route['404_override'] 					= '';
$route['translate_uri_dashes'] 			= FALSE;

$route['pathlab-login'] 				= 'pathlabpanel/login';
$route['pathlab-signup'] 				= 'pathlabpanel/signup';
$route['pathlab-verifymobile'] 			= 'pathlabpanel/verifymobile';
$route['pathlab-forgotpassword'] 		= 'pathlabpanel/forgotpassword';
$route['pathlab-verifymobileforgot'] 	= 'pathlabpanel/verifymobileforgot';
$route['pathlab-dashboard'] 			= 'pathlabpanel/dashboard';



$route['pathdoctor-login'] 				= 'pathdoctorpanel/login';
$route['pathdoctor-signup'] 			= 'pathdoctorpanel/signup';
$route['pathdoctor-verifymobile'] 		= 'pathdoctorpanel/verifymobile';
$route['pathdoctor-forgotpassword'] 	= 'pathdoctorpanel/forgotpassword';
$route['pathdoctor-verifymobileforgot'] = 'pathdoctorpanel/verifymobileforgot';
$route['pathdoctor-dashboard'] 			= 'pathdoctorpanel/dashboard';


$route['profile_step11'] 				= 'pathdoctorpanel/profile_step11';
$route['profile_step12'] 				= 'pathdoctorpanel/profile_step12';
$route['profile_step13'] 				= 'pathdoctorpanel/profile_step13';
$route['profile_about1'] 				= 'pathdoctorpanel/profile_about1';
$route['profile_drpic1'] 				= 'pathdoctorpanel/profile_drpic1';
$route['profile_idproof1'] 				= 'pathdoctorpanel/profile_idproof1';
$route['mci_proof1'] 					= 'pathdoctorpanel/mci_proof1';
$route['profile_regproof1'] 			= 'pathdoctorpanel/profile_regproof1';


$route['managepractice1'] 				= 'pathdoctorpanel/managepractice1';

$route['hospital-aindex'] 				= 'hospitalpanel/aindex';
$route['hospital-login'] 				= 'hospitalpanel/login';
$route['hospital-signup'] 				= 'hospitalpanel/signup';
$route['hospital-verifymobile'] 		= 'hospitalpanel/verifymobile';
$route['hospital-forgotpassword'] 		= 'hospitalpanel/forgotpassword';
$route['hospital-verifymobileforgot'] 	= 'hospitalpanel/verifymobileforgot';
$route['hospital-dashboard'] 			= 'hospitalpanel/dashboard';
$route['patient/:any']					= 'hospitalpanel/patient/$1';



$route['doctor-aindex'] 				= 'doctorpanel/aindex';
$route['doctor-login'] 					= 'doctorpanel/login';
$route['doctor-signup'] 				= 'doctorpanel/signup';
$route['doctor-verifymobile'] 			= 'doctorpanel/verifymobile';
$route['doctor-forgotpassword']			= 'doctorpanel/forgotpassword';
$route['doctor-verifymobileforgot'] 	= 'doctorpanel/verifymobileforgot';
$route['doctor-dashboard'] 				= 'doctorpanel/dashboard';




$route['addclinic'] 					= 'doctorpanel/addclinic';
$route['addpractice'] 					= 'doctorpanel/addpractice';
$route['linkpractice'] 					= 'doctorpanel/linkpractice';
$route['profile_consultant_fee/:any'] 	= 'doctorpanel/profile_consultant_fee/$1';

$route['managepractice'] 				= 'doctorpanel/managepractice';
$route['manageownclinic'] 				= 'doctorpanel/manageownclinic';
$route['manageappointment'] 			= 'doctorpanel/manageappointment';

$route['progress_profile'] 				= 'doctorpanel/progress_profile';
$route['progress_profile2'] 			= 'doctorpanel/progress_profile2';
$route['progress_profile3'] 			= 'doctorpanel/progress_profile3';
$route['progress_profile4'] 			= 'doctorpanel/progress_profile4';

$route['profile_step1'] 				= 'doctorpanel/profile_step1';
$route['profile_step2'] 				= 'doctorpanel/profile_step2';
$route['profile_step3'] 				= 'doctorpanel/profile_step3';
$route['profile_step4'] 				= 'doctorpanel/profile_step4';
$route['profile_step5'] 				= 'doctorpanel/profile_step5';
$route['profile_step6'] 				= 'doctorpanel/profile_step6';

$route['profile_about'] 				= 'doctorpanel/profile_about';
$route['profile_drpic'] 				= 'doctorpanel/profile_drpic';
$route['profile_idproof'] 				= 'doctorpanel/profile_idproof';
$route['mci_proof'] 					= 'doctorpanel/mci_proof';
$route['profile_regproof'] 				= 'doctorpanel/profile_regproof';


$route['updateclinic/:any'] 			= 'doctorpanel/updateclinic/$1';
$route['profile_clinicproof/:any'] 		= 'doctorpanel/profile_clinicproof/$1';
$route['profile_maplocation/:any'] 		= 'doctorpanel/profile_maplocation/$1';
$route['profile_clinic_timing/:any'] 	= 'doctorpanel/profile_clinic_timing/$1';



$route['medical-login'] 				= 'medicalpanel/login';
$route['medical-signup'] 				= 'medicalpanel/signup';
$route['medical-verifymobile'] 			= 'medicalpanel/verifymobile';
$route['medical-forgotpassword'] 		= 'medicalpanel/forgotpassword';
$route['medical-verifymobileforgot'] 	= 'medicalpanel/verifymobileforgot';
$route['medical-dashboard'] 			= 'medicalpanel/dashboard';

$route['profile_step21'] 				= 'medicalpanel/profile_step21';
$route['profile_step22'] 				= 'medicalpanel/profile_step22';
$route['profile_step23'] 				= 'medicalpanel/profile_step23';
$route['profile_step24'] 				= 'medicalpanel/profile_step24';
$route['profile_about2'] 				= 'medicalpanel/profile_about2';

$route['profile_drpic2'] 				= 'medicalpanel/profile_drpic2';
$route['profile_idproof2'] 				= 'medicalpanel/profile_idproof2';

$route['profile_regproof2'] 			= 'medicalpanel/profile_regproof2';
$route['managepractice2'] 				= 'medicalpanel/managepractice2';

$route['login'] 	     				= 'home/login';
$route['signup'] 		 				= 'home/signup';
$route['forgotpassword'] 				= 'home/forgotpassword';
$route['verifymobile'] 					= 'home/verifymobile';
$route['verifymobileforgot'] 			= 'home/verifymobileforgot';
$route['hospitallist'] 					= 'home/hospitallist';
$route['hospitals'] 					= 'home/hospitals';
$route['doctors'] 						= 'home/doctors';
$route['doctor/:any'] 					= 'home/doctor/$1';
//$route['patient/:any']				= 'home/patient/$1';
$route['hospital/:any'] 				= 'home/hospital/$1';
$route['newfiles/mystatic/:any'] 		= 'dummy/mystatic/$1';
$route['search'] 						= 'home/search';
$route['gethint'] 						= 'home/gethint';
$route['gethintcity'] 					= 'home/gethintcity';
$route['aboutus'] 						= 'home/aboutus';
$route['news'] 							= 'home/news';
$route['news/:any'] 					= 'home/news_details/$1';
$route['tnc'] 							= 'home/tnc';
$route['profile']						= 'home/profile';
$route['updateprofile']					= 'home/updateprofile';
$route['mytest'] 						= 'home/mytest';
$route['bed-availability'] 				= 'home/bed_availability';

$route['privacy'] 						= 'home/privacy';
$route['refund_cancellation'] 			= 'home/refund_cancellation';
$route['myappointents'] 				= 'home/manageappointment';
$route['processorder'] 					= 'paysecure/processorder';
$route['processordercod'] 				= 'paysecure/processordercod';

