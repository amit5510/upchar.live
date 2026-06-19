<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2018, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2018, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter FDDI Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Azad Hussain
 */

// ------------------------------------------------------------------------

if ( ! function_exists('getUserId'))
{
	function getUserId(){
		return get_instance()->session->userdata('userid');
	}
}
if ( ! function_exists('getInstitutionId'))
{
	function getInstitutionId(){
		return get_instance()->session->userdata('institution_id');
	}
}

if ( ! function_exists('getUserName'))
{
	function getUserName(){
		return get_instance()->session->userdata('username');
	}
}

if ( ! function_exists('getUserType'))
{
	function getUserType(){
		return get_instance()->session->userdata('code');
	}
}

if ( ! function_exists('getUserIP'))
{
	function getUserIP(){
		return get_instance()->input->ip_address();
	}
}

if ( ! function_exists('getUserAgent'))
{
	function getUserAgent(){
		return get_instance()->input->user_agent();
	}
}

if ( ! function_exists('formateDate'))
{
	
	function formateDate($date){
		return ($date) ? date("d-M-Y", strtotime($date)) : '';
	}
}
if ( ! function_exists('formateTime'))
{
	
	function formateTime($date){
		return ($date) ? date("g:i a", strtotime($date)) : '';
	}
}
if ( ! function_exists('formateDateTime'))
{
	
	function formateDateTime($date){
		return ($date) ? date("d-M-Y g:i a", strtotime($date)) : '';
	}
}
if ( ! function_exists('getFY'))
{
	function getFY($date){
		$d = explode('-',$date);
		$y = $d[0];
		$m = $d[1];
		
		if($m >=4)
			return ($date) ? $y.'-'.($y+1) : '';
		else
			return ($date) ? ($y-1).'-'.$y : ''; 
	}
}


if ( ! function_exists('last_query'))
{
	function last_query(){
		echo get_instance()->db->last_query();
	}
}

/****************************************************/
if ( ! function_exists('getCityName'))
{
	function getCityName($id){
		$res = get_instance()->db->select('name')->get_where('master_city',array('id'=>$id))->row('name');
		return $res;
	}
}
if ( ! function_exists('getlocalityName'))
{ 
	function getlocalityName($id){
		$res = get_instance()->db->select('name')->get_where('master_locality',array('id'=>$id))->row('name');
		return $res;
	}
}

if ( ! function_exists('getQualificationName'))
{
	function getQualificationName($id){
		$res = get_instance()->db->select('name')->get_where('master_degree',array('id'=>$id))->row('name');
		return $res;
	}
}

if ( ! function_exists('getSpecilizationName'))
{
	function getSpecilizationName($id){
		if($id=='')
			return '';
		$res = get_instance()->db->select('name')->get_where('master_specialization',array('id'=>$id))->row('name');
		return $res;
	}
}

if ( ! function_exists('getServicesName'))
{
	function getServicesName($id){
		$res = get_instance()->db->select('name')->get_where('master_services',array('id'=>$id))->row('name');
		return $res;
	}
}

if ( ! function_exists('getDoctorName'))
{
	function getDoctorName($id){
		$res = get_instance()->db->select('fname')->get_where('profile_dr',array('id'=>$id))->row('fname');
		return prefixdr($res);
	}
}

if ( ! function_exists('getInstituteName'))
{
	function getInstituteName($id,$type='H'){
		if($type=='C')
			$table='clinic';
		else
			$table='hospital';
		$res = get_instance()->db->select('name')->get_where($table,array('id'=>$id))->row('name');
		return $res;
	}
}

if ( ! function_exists('admin_url'))
{
	function admin_url(){
		return 'https://www.upchar.shop/admin1947/';
	}
}

if ( ! function_exists('mybase64_decode'))
{
	function mybase64_decode($id){
		
		$decoded_id = base64_decode(strtr($id,array('.' => '+', '-' => '=', '~' => '/')));
		return $decoded_id;
	}
}

if ( ! function_exists('mybase64_encode'))
{
	function mybase64_encode($id){
		
		$encoded_id  = strtr(base64_encode($id), array('+' => '.', '=' => '-', '/' => '~'));
		return $encoded_id;
	}
}

if ( ! function_exists('prefixdr'))
{
	function prefixdr($name){
		
		$prefix  = (strcasecmp(substr($name,0,2),'Dr'))? 'Dr. ' : '';
		return $prefix.$name;
	}
}


if(!function_exists('sendsms'))
{
	function sendsms($msg,$contacts)
	{	
		$api_key = '45C6DA05EDD0DC';
		//$from = 'UPCHAR';
		$from = 'Upcare';
		$sms_text = urlencode($msg);
		//$api_url = "http://bulksms.smsroot.com/app/smsapi/index.php?key=".$api_key."&campaign=0&routeid=13&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text;
		$api_url='http://bulksms.smsroot.com/app/smsapi/index.php?key=45C6DA05EDD0DC&campaign=0&routeid=13&type=text&contacts='. $contacts .'&senderid=UPCARE&msg='. urlencode( $msg ) .'&template_id=1507161519686689997';
		//echo "<pre>"; print_r($api_url); die;
		//$response = file_get_contents( $api_url);
		// Step 1
		$cSession = curl_init(); 
		// Step 2
		curl_setopt($cSession,CURLOPT_URL,$api_url);
		curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($cSession,CURLOPT_HEADER, false); 
		// Step 3
		$result=curl_exec($cSession);
		// Step 4
		curl_close($cSession);
		// Step 5
		return $result;
				//return  $response;
	}	
}



