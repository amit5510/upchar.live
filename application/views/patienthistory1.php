<head>
    <style>
#designforform{
    border-radius: 0px 29px;
    background: white;
    padding: 20px;
    margin-top: 47px;
    box-shadow:0px -2px 8px #173242;
}
.continue2 {
    background: #295771;
    color: white;
    padding: 7px 44px;
    letter-spacing: 2px;
    border: none;
    border-radius: 23px;
}
    </style>
</head>
<!-- Mirrored from eyecix.com/html/careplus/team-list.html by --->
<?php $this->load->view("includes/header.php"); ?>

<div class="container">
  <!-- Modal -->
      <div class="modal-content" style="padding: 23px;margin-top: 22px;">
        <div class="modal-header">

          <h4 class="modal-title">Patient Details </h4>
        </div>
        <div class="modal-body">
         
        <?php foreach($data as $p) { ?>
        <form action ='' method='post'>
           
           <div class="formdiv">

            
               <div class="form-group">
                  <label for="text" class="colorwhite">Appointmet ID</label>
                  <input type="text" class="form-control" id="religion"  name="name" value="<?=$p->appointment_id;?>">
                  
              </div>
     
              <div class="form-group">
                  <label for="text" class="colorwhite">Patient Name</label>
                  <input type="text" class="form-control" id="religion"  name="email" data-validation="required"
                  data-validation-error-msg="This Field is required" value="<?=$p->appointment_name;?>">
                  
              </div>
              <div class="form-group">
                  <label for="text" class="colorwhite">Mobile</label>
                  <input type="text" class="form-control" id="religion"  name="dob" data-validation="required"
                  data-validation-error-msg="This Field is required" value="<?=$p->appointment_mobile;?>">
                  
              </div>
              <div class="form-group">
                  <label for="text" class="colorwhite">Appointment Date</label>
                  <input type="text" class="form-control" id="religion" name="dob" data-validation="required"
                  data-validation-error-msg="This Field is required" value="<?=$p->appointment_date;?>">
                  
              </div>
                 <button class="continue2" type='submit' name='submit'>Continue</button>
              
              

          </div>

      </form>
<?php } ?>
        </div>
        
      </div>
     </div>

    <?php include ('includes/footer.php'); ?>