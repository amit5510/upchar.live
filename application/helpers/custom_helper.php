<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2017, British Columbia Institute of Technology
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
 * @copyright	Copyright (c) 2014 - 2017, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter URL Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/helpers/url_helper.html
 */

// ------------------------------------------------------------------------

if ( ! function_exists('is_loggedin'))
{
	
	function is_loggedin()
	{
		$uid=get_instance()->session->userdata('userid');
        //get_instance()->session->set_userdata('useremail', $row->EMAIL);				           
		//get_instance()->session->set_userdata('username', $row->FNAME);
		if($uid!=''){
			return true;
		}else{
			return false;
		}
		//return get_instance()->config->site_url($uri, $protocol);
	}
}

if ( ! function_exists('get_userid'))
{
	
	function get_userid()
	{
		$uid=get_instance()->session->userdata('userid');
        
		return $uid;
		//return get_instance()->config->site_url($uri, $protocol);
	}
}
if ( ! function_exists('formateDate'))
{
	function formateDate($date)
	{
		return $date;
	}
}
if( ! function_exists('getMeta'))
{
	function getMeta()
	{
		$CI = get_instance();
		$uri_page = $CI->uri->uri_string!='' ? $CI->uri->uri_string : "home";	
		if($_SERVER['QUERY_STRING']!='')
		{
			 $uri_page.="?".$_SERVER['QUERY_STRING'];
		}
		
		$res=$CI->db->query("SELECT * FROM meta_tags WHERE page_url='".$uri_page."' ")->row();
		
		if( is_object($res) )
		{
			return array(
			
				"meta_title"=>$res->meta_title,
				"meta_keyword"=>$res->meta_keyword,
				"meta_description"=>$res->meta_description
			 );
									
									
		}else
		{			
				  return array("meta_title"=>"Welcome to Upchaar",
				  "meta_keyword"=>"Welcome to Upchaar",
				   "meta_description"=>"Welcome to Upchaar",
				   'dynamic_meta'=>TRUE 
				);
		}
	}	
}
