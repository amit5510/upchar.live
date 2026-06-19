<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
/**
* The global dbquery CI helpers 
* Fixed for PHP 8.0+ compatibility
*/

if ( ! function_exists('custom_result_set'))
{	
    function custom_result_set($sql)
    {	
        $ci = CI();
        $query = $ci->db->query($sql);
                
        if( $query->num_rows() > 0 )
        {			
            return $query->result_array();
        }	
    }
}

if ( ! function_exists('get_db_single_row'))
{
    function get_db_single_row($tablename, $fields = "*", $condition = "1")
    {
        $ci = CI();
        
        $cond = 'WHERE 1';
                
        if( is_array($condition) && !empty($condition) ) 
        {
            foreach($condition as $key => $value)
            {
                $cond .= " AND `$key` = '" . $ci->db->escape_str($value) . "'";  
            }
        } else {
            $cond = $condition; 
        }
                                               
        $query = $ci->db->query("SELECT $fields FROM `$tablename` $cond");
        $row_founds = $query->num_rows();
                
        if( $row_founds > 1)
        {			
            echo "Query returns multiple result set please check: ";
            echo_sql();			   
            
        } elseif($row_founds > 0 ) {
            return $query->row_array();
        }
    }
}

if ( ! function_exists('get_db_field_value'))
{
    function get_db_field_value($tbl_name, $field, $condition = "")
    {    
        $ci = &get_instance();	
        $cond = "WHERE 1";  
        
        if(!empty($condition) && is_array($condition))
        {			  
            foreach($condition as $key => $value)
            {		  		  		  
                $cond .= " AND `$key` = '" . $ci->db->escape_str($value) . "'";				  		
            }
        } else {
            $cond .= $condition; 		
        }
        
        $query = $ci->db->query("SELECT `$field` FROM `$tablename` $cond");
	                        
        if($query->num_rows() > 0)
        {	
            $res = $query->row();	 
            return $res->$field;		 
        }	   
    }
}

if ( !function_exists('count_record') )
{	
    function count_record($table, $condition = "")
    {
        $ci = CI();	
            
        if($table != "" && $condition != "")
        {			
            $ci->db->from($table);
            $ci->db->where($condition);	        
            $num = $ci->db->count_all_results();	
        } else {
            $num = $ci->db->count_all($table);	
        }
                
        return $num;	
    } 
}

if ( !function_exists('get_found_rows') )
{
    function get_found_rows()
    {
        $ci =& get_instance();
        $query = $ci->db->query('SELECT FOUND_ROWS() AS total');
        $row = $query->row();
        return $row->total;
    }
}

if ( !function_exists('get_auto_increment') )
{
    function get_auto_increment($tablename)
    {
        $ci = CI();
        $query = $ci->db->query("SHOW TABLE STATUS LIKE '$tablename'");
        if($query->num_rows() == 1)
        {
            $row = $query->row();
            return $row->Auto_increment;
        }
    }
}

if ( ! function_exists('echo_sql'))
{
    function echo_sql()
    {
        $ci = CI();
        echo "<font color='#ff0000' style='font-size:16px;font-family:verdana'><br />";
        echo wordwrap($ci->db->last_query(), 60, "<br />\n", TRUE);		
        echo "<br /></font>";
    }
}

if ( ! function_exists('cms_page_content')){
    // ✅ FIXED: Required $pageId first, optional $tbl second
    function cms_page_content($pageId, $tbl = "tbl_cms_pages")
    {
        $CI = CI();	
        
        if( $pageId > 0 )
        { 
            $res = $CI->db->get_where($tbl, array('page_id' => $pageId))->row();
            if( is_object($res) )
            {
                return $res;
            }
        }
        return null;  // Added return for empty case
    }
}
?>
