<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('CI'))
{
	function CI()
	{
		if (!function_exists('get_instance')) return FALSE;
		$CI =& get_instance();
		return $CI;
	}
}



if ( ! function_exists('admin_pagination'))
{
	function admin_pagination($base_uri, $total_rows, $record_per, $uri_segment,$refresh = FALSE)
	{	
		$ci = CI();	
		$ci->load->library('pagination');		
		$config['per_page']			= $record_per;
		$config['num_links']        = 8;			  
		$config['total_rows']		= $total_rows;
		$config['uri_segment']		= $uri_segment;		
		$config ['full_tag_open'] = '<nav><ul class="pagination">';
		$config ['full_tag_close'] = '</ul></nav>';
		$config ['first_tag_open'] = '<li class="arrow">';
		$config ['first_link'] = 'First';
		$config ['first_tag_close'] = '</li>';
		$config ['prev_link'] = 'Previous';
		$config ['prev_tag_open'] = '<li class="arrow">';
		$config ['prev_tag_close'] = '</li>';
		$config ['next_link'] = 'Next';
		$config ['next_tag_open'] = '<li class="arrow">';
		$config ['next_tag_close'] = '</li>';
		$config ['cur_tag_open'] = '<li class="active"><a href="#">';
		$config ['cur_tag_close'] = '</a></li>';
		$config ['num_tag_open'] = '<li>';
		$config ['num_tag_close'] = '</li>';
		$config ['last_tag_open'] = '<li class="arrow">';
		$config ['last_link'] = 'Last';
		$config ['last_tag_close'] = '</li>';			
		$config['page_query_string']	= TRUE;
		$config['base_url']             = $base_uri;
		$ci->pagination->initialize($config);
		$data = $ci->pagination->create_links();		
		return $data;	  
	}
}




function display_record_per_page()
{	
$ci = CI();
$post_per_page =  $ci->input->get_post('pagesize');
$pagesize                = "10";
$adminPageOpt  = array(       
						$pagesize,
						2*$pagesize,
						3*$pagesize,
						4*$pagesize,
						5*$pagesize											
						);
?>

<select name="pagesize" id="pagesize" size="1" class="form-control input-sm"  aria-controls="DataTables_Table_0" onchange="this.form.submit();">
    <?php
    foreach($adminPageOpt as $val)
    {
		
    ?>
    <option value="<?php echo $val;?>" <?php echo $post_per_page==$val ? "selected" : "";?>>
	  <?php echo $val;?></option>
    <?php
    }
    ?>
</select>

<?php
}

if ( ! function_exists('admin_category_breadcrumbs'))
{
	function admin_category_breadcrumbs($catid,$segment='')
	{
		$link_cat=array();	
		$ci = CI();		  
		$sql="SELECT category_name,category_id,parent_id
		FROM tbl_categories WHERE category_id='$catid' AND status='1' ";		 
		$query=$ci->db->query($sql);		
		$num_rows     =  $query->num_rows();
		$segment      = $ci->uri->segment($segment,0);
			 
		  if ($num_rows > 0)
		  {
			 			  
				  foreach( $query->result_array() as $row )
				  {
							 
						if ( has_child( $row['parent_id'] ) )
						{
								
								$condtion_product   =  "AND category_id='".$row['category_id']."'";				
								$product_count      = count_products($condtion_product);
								
								if($product_count>0)
								{
									$link_url = base_url()."adminzone/products/index/".$row['category_id'];
									
								}else
								{							
									$link_url = base_url()."adminzone/category/index/".$row['category_id'];								
								}
								
								if( $segment!='' && ( $row['category_id']==$segment ) )
								{
									
									$link_cat[]='<li>'.$row['category_name'];
									
								}else
								{
									
								  $link_cat[]='<li><a href='.$link_url.'>'.$row['category_name'].'</a></li>';
								  
								}
								
								$link_cat[] = admin_category_breadcrumbs($row['parent_id'],$segment);
							 
						  }else
						  {	
							$link_url = base_url()."adminzone/category/index/".$row['category_id'];				  
							$link_cat[] ='<li><a href='.$link_url.'>'.$row['category_name'].'</a></li>';	
									   
						  }     
					}    
		 }
		else
		 {
			  $link_url = base_url()."adminzone/category";
			  $link_cat[]='<li><a href='.$link_url.'>Category</a></li>';
			
		 }
		 
		 $link_cat = array_reverse($link_cat);
		 $var=implode($link_cat);
		 return $var;
		
	}
	
}

if ( ! function_exists('admin_course_breadcrumbs'))
{
	function admin_course_breadcrumbs($catid,$segment='')
	{
		$link_cat=array();
		$ci = CI();
		$sql="SELECT course_name,course_id,parent_id
		FROM tbl_courses WHERE course_id='$catid' AND status='1' ";
		$query=$ci->db->query($sql);
		$num_rows     =  $query->num_rows();
		$segment      = $ci->uri->segment($segment,0);

		  if ($num_rows > 0)
		  {
			 			  
				  foreach( $query->result_array() as $row )
				  {
							 
						if ( has_child( $row['parent_id'] ) )
						{
								
								$condtion_product   =  "AND course_id='".$row['course_id']."'";				
								$product_count      = count_products($condtion_product);
								
								if($product_count>0)
								{
									$link_url = base_url()."adminzone/products/index/".$row['course_id'];
									
								}else
								{							
									$link_url = base_url()."adminzone/course/index/".$row['course_id'];								
								}
								
								if( $segment!='' && ( $row['course_id']==$segment ) )
								{
									
									$link_cat[]='<li>'.$row['course_id'];
									
								}else
								{
									
								  $link_cat[]='<li><a href='.$link_url.'>'.$row['course_name'].'</a></li>';
								  
								}
								
								$link_cat[] = admin_course_breadcrumbs($row['parent_id'],$segment);
							 
						  }else
						  {	
							$link_url = base_url()."adminzone/course/index/".$row['course_id'];				  
							$link_cat[] ='<li><a href='.$link_url.'>'.$row['course_name'].'</a></li>';	
									   
						  }     
					}    
		 }
		else
		 {
			  $link_url = base_url()."adminzone/course";
			  $link_cat[]='<li><a href='.$link_url.'>Course</a></li>';
			
		 }
		 
		 $link_cat = array_reverse($link_cat);
		 $var=implode($link_cat);
		 return $var;
		
	}
	
}

function createMenu($arr_items,$level='top')
{
  $menu_items_count =  count($arr_items);
  if($menu_items_count > 0)
  {
	 foreach($arr_items as $key1=>$val1)
	 {
		 $menu_id = trim(strtolower($key1));
		 ?>
		 <li<?php echo $level=='top' ? ' id="'.$menu_id.'"' : '';?>>
		 <?php
		 if(is_array($val1) && !empty($val1))
		 {
			 
			?>
		   <a class="<?php echo $level;?>"><?php echo $key1; ?></a> <ul><?php createMenu($val1,'parent');?></ul>
		  <?php 
		 }
		 else
		 {
		 ?>
			<a href="<?php echo base_url().$val1; ?>"<?php echo $level=='top' ? ' class="top"' : '';?>><?php echo $key1; ?></a>
			
		 <?php 
		 }
		 ?>
		 </li>
		<?php
	 }
  }
  
  
 if ( ! function_exists('get_leftright'))
{
function get_leftright($gid)
    {
	$ci=CI();
	$all=array();
	$re=$ci->db->query("SELECT * FROM tbl_customers WHERE uid='".$gid."'")->result();
	//print_r($re);die;
	//while($res=mysql_fetch_object($re))
	foreach($re as $res)
	{
		if($res!=''){
		$lll[]=$res->left1;
		$rrr[]=$res->right1;
		}
	}
	$all['left']=countall($lll);
	$all['right']=countall($rrr);
	return $all;
}
}
if ( ! function_exists('countall'))
{
function countall($gid1)
{
    $ci=CI();
	$gt=array();
	$gt2=array();
	if($gid1!='')
	{	
		foreach($gid1 as $gg)
		{
			if($gg!=''){
				$re=$ci->db->query("SELECT * FROM tbl_customers WHERE pid='".$gg."'")->result();
				//while($res=mysql_fetch_object($re))
				foreach($re as $res)
				{
					if($res!=''){
					$lr[]=$res->uid;
					}
				}
			}
		}
	}
	if($gid1!='')
	{
		$gt2=array_merge($gid1,countall($lr));
	}
	return $gt2;
}
}
if ( ! function_exists('gettotalpoint_R'))
{
 function gettotalpoint_R($gid)
{
    $ci=CI();
	$all=array();
	$number=0;
	foreach($gid as $key=>$v)
	{
	$nn=$ci->db->query("SELECT * FROM tbl_buy_now WHERE user_id='".$v."'")->result();
		if($nn !=''){
			$all[]=$nn->topup_date;
		}	
	}
	$coundata=array_count_values($all);
	$i=0;
	foreach($coundata as $key => $value){ 
	if($i==0){
		if($value >=6){
			$number +=6;
		}else{
			$number +=$value;
		}
	}else{
		if($value >=5){
			$number +=5;
		}else{
			$number +=$value;
		}
	}
	$i++;
	}
	return $number;
}
}
if ( ! function_exists('getreferral_amount'))
{
function getreferral_amount($c){
    $ci=CI();
	$re=$ci->db->query("SELECT * FROM tbl_customers WHERE uid='".$c."'")->result();
	$left[]=$re->left1;
	$right[]=$re->right1;
	$total_data=array_merge($left,$right);
	//print_r($total_data);die;
	$total_referral_amount=0;
	for($i=0;$i<count($total_data);$i++){
		$referral_data=$ci->db->query("SELECT tbl_customers.* FROM tbl_customers left join  tbl_buy_now on tbl_customers.uid =tbl_buy_now.user_id WHERE tbl_customers.uid='".$total_data[$i]."' and tbl_customers.pid='".$re->uid."' and tbl_customers.sid='".$re->uid."'  and tbl_buy_now.amount > 0")->result();
		
		if($referral_data!=''){
			$total_referral_amount +=1000;
		}
	}
	//echo $total_referral_amount;
	$re=$ci->db->query("SELECT tbl_customers.* FROM tbl_customers left join  tbl_buy_now on tbl_customers.uid =tbl_buy_now.user_id WHERE tbl_customers.sid='".$re->uid."' and tbl_customers.pid!='".$re->uid."'  and tbl_buy_now.amount > 0")->result();
			//while($res=mysql_fetch_object($re))
			foreach($re as $res)
			{
				if($res !=''){
						$total_referral_amount +=1000;
				}
			}
	
			//$total_referral_amount =1000 * $c;

	return $total_referral_amount;
}
}

if ( ! function_exists('getpair_income'))
{
function getpair_income($l_point,$r_point){
		$left_level_count=$l_point;
		$right_level_count=$r_point;
		$rage_value='1';
	if($left_level_count=='1' || $right_level_count >= $left_level_count){
		$new_right_level_count=$right_level_count - $rage_value;
		$new_left_level_count=$left_level_count;
		for($i=1;$i<=$new_right_level_count;$i++){
			if($i <= $new_left_level_count){
				$level=$i;
			}
		}
	}else{
		$new_right_level_count=$right_level_count;
		$new_left_level_count=$left_level_count - $rage_value;
		for($i=1;$i<=$new_left_level_count;$i++){
			if($i <= $new_right_level_count){
				$level=$i;
			}
		}
	}
	$total_level_incone=$level * 1000;
	return $total_level_incone;
}
}

if ( ! function_exists('today_gettotalpoint_R'))
{
function today_gettotalpoint_R($gid)
{   
    $ci=CI();
    //$gid=1;
	$all=array();
	$number=0;
	foreach($gid as $key => $v)
	{
	$nn=$ci->db->query("SELECT * FROM tbl_buy_now WHERE user_id='".$v."' and topup_date='".date('Y-m-d')."'")->result_array();
	
		if($nn !=''){
			$all[]=$nn->topup_date;
		}	
	}
	$coundata=array_count_values($all);
	//print_r($coundata);
	$i=0;
	foreach($coundata as $key => $value){ 
	if($i==0){
		if($value >=6){
			$number +=6;
		}else{
			$number +=$value;
		}
	}else{
		if($value >=5){
			$number +=5;
		}else{
			$number +=$value;
		}
	}
	$i++;
	}
	//echo $number;
	return $number;
 }
}



  
   
}