<div class="sidebar">
  <div class="logopanel">
    <div class="logopanel"> 		
      <a href="#"><img src="<?=base_url();?>images/logo.png" type="image/gif" style="width:42px;margin: 38px 39%;"></a>
      <!-- <link rel="icon" href="<?=base_url();?>images/logo.png" type="image/gif" sizes="16x16">-->
    </div>
  </div>
  <div class="sidebar-inner">
    <ul class="nav nav-sidebar">
      <li style="background: #295771;padding: 3px;border-radius:23px 0px 0px 0px;border-bottom: 1px solid #22465a;"><a href="<?=base_url();?>doctor-dashboard"><i class="fa fa-user-md"></i><span>Dashboard</span></a></li>
        <li ><a href="<?=base_url();?>doctorpanel/updateprofile"><i class="fa fa-user-md"></i><span>Update Profile</span></a></li>
    	<li ><a href="<?=base_url();?>profile_step1"><i class="fa fa-user-md"></i><span>Manage Profile</span> </a></li>
    	<li ><a href="<?=base_url();?>manageownclinic"><i class="fa fa-hospital-o" aria-hidden="true"></i><span>Manage Own Clinic</span> </a></li>
    	<li ><a href="<?=base_url();?>managepractice"><i class="fa fa-medkit" aria-hidden="true"></i><span>Manage Practice</span> </a></li>
    	<li ><a href="<?=base_url();?>manageappointment"><i class="fa fa-calendar" aria-hidden="true"></i><span>Manage Appointment</span> </a></li>
      <li class="nav-parent">
        <a href="#"><i class="fa fa-building" aria-hidden="true"></i><span>Gallery Management</span><span class="fa arrow"></span></a>
        <ul class="children collapse">
          <li ><a href="<?=base_url();?>doctorpanel/gallery"><i class="fa fa-calendar" aria-hidden="true"></i><span>Gallery</span> </a></li>
          <li ><a href="<?=base_url();?>doctorpanel/managegallery"><i class="fa fa-calendar" aria-hidden="true"></i><span>Gallery List</span> </a></li>
        </ul>
      </li>
      <li ><a href="<?=base_url();?>doctorpanel/datetime"><i class="fa fa-calendar" aria-hidden="true"></i><span>Date & Time</span> </a></li>
      <li ><a href="<?=base_url();?>doctorpanel/upcharhospital"><i class="fa fa-user-plus" aria-hidden="true"></i><span>Upchar Hospital</span> </a></li>
      <li class="nav-parent">
        <a href="#"><i class="fa fa-building" aria-hidden="true"></i><span>News Management</span><span class="fa arrow"></span></a>
        <ul class="children collapse">
          <li ><a href="<?=base_url();?>doctorpanel/managenews"><i class="fa fa-user-plus" aria-hidden="true"></i><span>Manage News</span> </a></li>
          <li ><a href="<?=base_url();?>doctorpanel/news"><i class="fa fa-calendar" aria-hidden="true"></i><span>News List</span> </a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>