<?php
$pageurl1=$this->uri->segment('1');
$pageurl=$this->uri->segment('2');
$pageurl3=$this->uri->segment('3');

?>
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url();?>public/assets/newpanel/dist/img/user2-160x160.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$this->session->userdata('username')?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
	<?php 
  $user_role = $this->db->get_where('rolewise',array('isStatus'=>'1','level_id'=>$this->session->userdata('code')))->row_array();
  $module = explode(',', $user_role['module']);
  //echo "<pre>"; print_r($module); die;echo "<pre>"; print_r($module); die;
  $section = $this->db->get_where('master_sections',array('isStatus'=>'1'))->result_array();
  ?>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php if($pageurl=='dashboard'){ ?>active<?php }?>"><a href="<?=base_url()?>masters/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>


        <?php if(is_array($section) && !empty($section)){
          for($i=0; $i<count($section); $i++){ 
          $this->db->where_in('module_id',$module);
          $this->db->where(array('isStatus'=>'1','parent_id'=>$section[$i]['section_id']));
          $management = $this->db->get('master_management')->result_array();
          //echo "<pre>"; print_r($management); die;
          $sum=array();
          for($k=0; $k<count($management); $k++)
          {
            $sum[] = $management[$k]['module_controller'];
          }
          if(is_array($management) && !empty($management))
          {
          ?>
          <li class="treeview <?php  if( in_array($pageurl, $sum)){ ?> active <?php }?>">
            <a href="#">
            <i class="<?php echo $section[$i]['section_icon']; ?>"></i>
            <span><?php echo $section[$i]['section_name']; ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
              <?php 
              
              for($j=0; $j<count($management); $j++)
              { 
              ?>
              <li class="<?php 
                if($management[$j]['module_folder']!=$management[$j]['module_controller'])
                  {
                    if($pageurl==$management[$j]['module_controller'] && $pageurl3==$management[$j]['module_action'])
                    { ?>active<?php }
                  }
                  else 
                  {
                    if($pageurl1==$management[$j]['module_controller'] && $pageurl==$management[$j]['module_action'])
                    { ?>active<?php }
                  } ?>">
                <a href="<?=base_url()?><?php if($management[$j]['module_folder']!=$management[$j]['module_controller']){ echo $management[$j]['module_folder'].'/'; } echo $management[$j]['module_controller'].'/'.$management[$j]['module_action'];?>">
                  <i class="<?php echo $management[$j]['module_icon']; ?>"></i> <span><?php echo $management[$j]['module_name']; ?></span>
                </a>
            </li> 
            <?php } ?>
          </ul>
        </li>
        <?php } } } ?>
        <?php 
        //$management = $this->db->get_where('master_management',array('isStatus'=>'1','parent_id'=>'0'))->result_array();
        $this->db->where_in('module_id',$module);
        $this->db->where(array('isStatus'=>'1','parent_id'=>'0'));
        $management = $this->db->get('master_management')->result_array();
        //print_r($management); die;
        if(is_array($management) && !empty($management)){
        for($j=0; $j<count($management); $j++)
        { 
        ?>
        <li class="
            <?php 
            if($management[$j]['module_folder']!=$management[$j]['module_controller'])
            {
              if($pageurl==$management[$j]['module_controller'] && $pageurl3==$management[$j]['module_action'])
              { ?>active<?php }
            }
            else 
            {
              if($pageurl1==$management[$j]['module_controller'] && $pageurl==$management[$j]['module_action'])
              { ?>active<?php }
            } ?>">
            <a href="<?=base_url()?><?php if($management[$j]['module_folder']!=$management[$j]['module_controller']){ echo $management[$j]['module_folder'].'/'; } echo $management[$j]['module_controller'].'/'.$management[$j]['module_action'];?>">
              <i class="<?php echo $management[$j]['module_icon']; ?>"></i> <span><?php echo $management[$j]['module_name']; ?></span>
            </a>
        </li> 
        <?php } }?>
      </ul>
   </section>
    <!-- /.sidebar -->
  </aside>
  
  <style>
  @media (min-width: 1200px) and (max-width: 1400px){
   .main-sidebar,.logo{
    width : 180px;
   }
   .content-wrapper, .main-footer{
    margin-left : 180px;
   }
   .container {
    width: 1120px;
}
  }
  </style>