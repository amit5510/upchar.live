<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Upcharr</b> Admin</span>
      <!-- logo for regular state and mobile devices -->
     <span class="logo-lg"><b></b> Upcharr</span>
     <!-- <span class="logo-lg"><img src="http://fddi.tk/public/assets/fddilogo.png" class="img-responsive" style="height: 45px; margin: auto;margin-top: 4px;"></span>-->
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- Notifications: style can be found in dropdown.less -->
        
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url();?>public/assets/newpanel/dist/img/user2-160x160.png" class="user-image" alt="User Image">
              <?php //if($this->session->userdata('code')=='1'){ ?>
				<span class="hidden-xs">Logedin as  <?php echo getRoleName($this->session->userdata('code')); ?></span>
			 <?php /* } else if($this->session->userdata('code')=='C'){ $cenname=$this->db->get_where('fddi_center',array('id'=>$this->session->userdata('institution_id')))->row('center_name');?>
			 <span class="hidden-xs">Logedin as Center(<?=$cenname?>)</span>
			 <?php } else if($this->session->userdata('code')=='SC'){ $subnname=$this->db->get_where('fddi_subcenter',array('subcenter_id'=>$this->session->userdata('institution_id')))->row('subcenter_name') ?>
			  <span class="hidden-xs">Logedin as Sub Center(<?=$subnname?>)</span>
			 <?php } else if($this->session->userdata('code')=='AG'){ $subnname=getAgencyName( $this->session->userdata('institution_id') ); ?>
			  <span class="hidden-xs">Logedin as Assessment Agency(<?=$subnname?>)</span>
			 <?php } */ ?>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url();?>public/assets/newpanel/dist/img/user2-160x160.png" class="img-circle" alt="User Image">
                <p>
                 <?=$this->session->userdata('username');?>
                  <!--<small>Member since Nov. 2018</small>-->
                </p>
              </li>
              
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="<?=base_url()?>others/other/signout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <div id="myloader">  <div id="loader"></div></div>