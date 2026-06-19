<?php
/*
| -------------------------------------------------------------------
|  Access Controll Configuration
| -------------------------------------------------------------------
|
| To be  modify to grant access to User on the specific
| Module Controller and Action
|
|  access_admin_module               array   Module accessible to Admin.
|  access_admin_controller           array   Controller accessible to Admin.
|  access_admin_action           	 array   Action accessible to Admin.
*/

$config['access_public_module']          	= array('others');
$config['access_public_controller']      	= array('login','other','data_view','sql','cron');
$config['access_public_action']          	= array();

//super admin
$config['access_admin_module']          	= array('masters','doctor','centers','subcenters',
													'faculty','trainee','batches','attendance',											'results','users','placements');
$config['access_admin_controller']      	= array('dashboard','changepassword');
$config['access_admin_action']          	= array();

//admin
$config['access_center_module']          	= array('ccenter','faculty','trainee','batches','placements','results');
$config['access_center_controller']      	= array('changepassword','center','industrial');
$config['access_center_action']          	= array();

//bd
$config['access_subcenter_module']          = array('sccenter','trainee','batches','results');
$config['access_subcenter_controller']      = array('changepassword','center','industrial');
$config['access_subcenter_action']          = array();


//account
$config['access_agency_module']          	= array('agency','results');
$config['access_agency_controller']      	= array('changepassword');
$config['access_agency_action']          	= array();

//Advertising
$config['access_nmu_module']          	= array('nmu');
$config['access_nmu_controller']      	= array('changepassword');
$config['access_nmu_action']          	= array();


$config['access_dipp_module']          	= array('dipp');
$config['access_dipp_controller']      	= array('changepassword');
$config['access_dipp_action']          	= array();
