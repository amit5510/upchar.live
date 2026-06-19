<head>
    <style>
#designforform{
    border-radius: 0px 29px;
    background:white;
    padding: 20px;
    margin-top: 47px;
    box-shadow:0px -2px 8px #173242;
}
.colorblack{
    color:black;
}
    </style>
</head>
<?php include ("assets/includes/header_medical.php"); ?>
<?php include ("assets/includes/leftmenu_medical.php"); ?>
        <div class="pag_cstm">
         
          <div class="row">
		   <div class="col-lg-12">
              <div class="pag_cstm_panel">
                <div class="pag_cstm_panel_panel_ontent p-t-0">
                  <div class="row paddb40">
                
				
		
<div class="row">
      <div class="col-md-4"></div>
      
    <div class="col-md-4" id="designforform">
        
        <form method="post" action='' class="designforform">
            	<h3 style="color:#295771;text-align:center;">Change Password</h3>
            	<?=$this->session->flashdata('msg');?>

		<h5 style="color:black;">Old Password </h5>
		<input type="password" name="password" id="name" placeholder="Old Pass"/>
		<h5 style="color:black;">New Password </h5>
		<input type="password" class="form-control" name="newpass" id="password" placeholder="New Password"/>

		<h5 style="color:black;">Confirm Password </h5>
		<input type="password" name="confpassword" class="form-control" id="password" placeholder="Confirm Password"/>
		
		<input type="submit" value="SAVE" name="change_pass" style="
    background: #204356;
    color:;
    color: white;
    border: none;
        border-radius: 0px 12px;
        margin-top: 20px;
">

</form>
    </div>
  <div class="col-md-4"></div>
  
      
  </div>
</div>
                        </div>  
						 </div>  
				   </div>
                </div>
              </div>
            </div>
        
         
          			<?php include ("assets/includes/footer.php"); ?>