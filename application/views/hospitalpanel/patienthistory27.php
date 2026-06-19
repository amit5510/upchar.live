<head>
    <link rel="icon" href="images/logo.png" type="image/gif" sizes="16x16">
    <style>
        .modal-title{
            color:black;
        }
        .colorwhite{
            color:black;
        }
 .dropbtn {
    background-color: #043d5b;
    color: white;
    padding: 7px 21px 7px 48px;
    font-size: 16px;
    border: none;
    border-radius: 23px;

}
.boxBack{
    background:white;
}
.innerBox {
    background: #e8e7e7;
    padding: 15px 1px;
    margin-bottom: 12px;
    transition:0.3s;
}
.innerBox:hover{
    box-shadow:0px -3px 6px 1px #d6cdcd;
}


.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.dropdown-content a {
    color: #043d5b;
    padding: 10px 16px;
    text-decoration: none;
    display: block;
    font-weight: bold;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}

.Input_radio {
  display: none;
}
.titleBox{
    color: #929292;
    border-bottom: 2px solid #efefef;
    padding: 7px 0px;
}
.preview-img {
    width: 171px;
    height: 174px;
    border-radius: 83px;
    border:2px solid #e2dfdf;
    margin: 20px 2px;
}
.colorBlack {
    color: #676767;
    font-weight: bold;
}
    </style>
</head>

<?php include ("assets/includes/header_hospital.php"); ?>
    <?php include ("assets/includes/leftmenu_hospital.php"); ?>
        <div class="pag_cstm">

            <div class="row">
                <div class="col-lg-12">
                    <div class="pag_cstm_panel">
                        <div class="pag_cstm_panel_panel_ontent p-t-0">
                            <div class="row paddb40">

                            

        <div class="col-md-8 col-md-offset-2 boxBack">
             <h4 class="titleBox">Patient Information</h4>    
            <div class="col-md-4 text-center">
            <img class="preview-img" src="<?=admin_url();?>public/assets/upload/<?=($p->IMAGE)? $p->IMAGE : 'dummydr.jpg';?>" alt="Preview Image" />
         
           </div>
       
        <form action ='' method='post'>
           
           <div class="formdiv">

         
                <div class="col-md-4">
                    
                 <div class="col-md-12 innerBox">
               <div class="form-group text-center">
                  <label for="text" class="colorwhite">Appointmet ID</label>
                  <h5 class="colorBlack"><?=$p->appointment_id;?></h5>
                  
              </div>
             </div>
              </div>
          
            
      <div class="col-md-4">
           <div class="col-md-12 innerBox">
              <div class="form-group text-center">
                  <label for="text" class="colorwhite">Patient Name</label>
                  <h5 class="colorBlack"><?= $p->appointment_name;?></h5>
                  </div> 
              </div>
                </div>
                
                
                
                <div class="col-md-4">
                     <div class="col-md-12 innerBox">
              <div class="form-group text-center">
                  <label for="text" class="colorwhite">Mobile</label>
                 <h5 class="colorBlack"><?= $p->appointment_mobile;?></h5>
                  
              </div>
            </div>
               </div>
               
               
                <div class="col-md-4">
                    <div class="col-md-12 innerBox">  
              <div class="form-group text-center">
                  <label for="text" class="colorwhite">Date Of Birth</label>
                 <h5 class="colorBlack"><?= $p->DOB;?></h5>
                  
              </div>
           </div>
               </div>
               
               
               <div class="col-md-8">
                    <div class="col-md-12 innerBox">
                   <div class="form-group text-center">
                       <label for="text" class="colorwhite">Email</label>
                       <h5 class="colorBlack"><?= $p->EMAIL;?></h5>
                   </div>
               </div>
                </div>
                
              
               
               <div class="col-md-4">
                     <div class="col-md-12 innerBox"> 
                  <div class="form-group text-center">
                  <label for="text" class="colorwhite">Blood Group</label>
                 <h5 class="colorBlack"><?= $p->BGROUP;?></h5>
                  </div>
              </div>
             </div>
             
             <div class="col-md-4">
                  <div class="col-md-12 innerBox">
               <div class="form-group text-center">
                  <label for="text" class="colorwhite">Gender</label>
                  <h5 class="colorBlack"><?= $p->GENDER;?></h5>
                  </div>
              </div>
              </div>
                 
                
               <div class="col-md-4">
                     <div class="col-md-12 innerBox">
              <div class="form-group text-center">
                  <label for="text" class="colorwhite">Height</label>
                  <h5 class="colorBlack"><?php echo $p->HEIGHT;?></h5>
                  </div> 
              </div>
              </div>
              
                <div class="col-md-4">
                      <div class="col-md-12 innerBox">
               <div class="form-group text-center">
                  <label for="text" class="colorwhite">Weight</label>
                  <h5 class="colorBlack"><?= $p->WEIGHT;?> KG</h5>
                   </div> 
              </div>
              </div>
              
               <div class="col-md-4">
                    <div class="col-md-12 innerBox">
               <div class="form-group text-center">
                  <label for="text" class="colorwhite">Doctor Name</label>
                  <h5 class="colorBlack"><?= prefixdr($p->fname);?></h5>
                   </div>
              </div>
              </div>
              
              <div class="col-md-4">
                   <div class="col-md-12 innerBox">
              <div class="form-group text-center">
                  <label for="text" class="colorwhite">Appointment Date</label>
                  <h5 class="colorBlack"><?= $p->appointment_date;?></h5>
                  </div> 
              </div>
              </div>
               <div class="col-md-4">
                     <div class="col-md-12 innerBox">
               <div class="form-group text-center">
                  <label for="text" class="colorwhite">Book Date</label>
                  <h5 class="colorBlack"><?= $p->book_date;?></h5>
                  </div> 
              </div>
              </div>

                  <div class="col-md-4">
                       <div class="col-md-12 innerBox">
               <div class="form-group text-center">
                  <label for="text" class="colorwhite">Order Id</label>
                  <h5 class="colorBlack"><?=$p->orderid;?></h5>
                </div>  
              </div>
              </div>

        <div class="col-md-4">
            <div class="col-md-12 innerBox">
               <div class="form-group text-center">
                  <label for="text" class="colorwhite">Payment Mode</label>
                  <h5 class="colorBlack"><?= $p->paymentmod;?></h5>
                 </div> 
              </div>
              </div>
                 
                  <div class="col-md-4">
                      <div class="col-md-12 innerBox">
               <div class="form-group text-center">
                  <label for="text" class="colorwhite">Card Name</label>
                  <h5 class="colorBlack"><?= $p->cardname;?></h5>
                 </div> 
              </div>
              </div>
                <div class="col-md-4">
                       <div class="col-md-12 innerBox">
               <div class="form-group text-center">
                  <label for="text" class="colorwhite">Amount</label>
                  <h5 class="colorBlack"><?= $p->amount;?></h5>
                 </div> 
              </div>
              </div>
                    <div class="col-md-4">
                         <div class="col-md-12 innerBox">
               <div class="form-group text-center">
                  <label for="text" class="colorwhite">Billing Address</label>
                  <h5 class="colorBlack"><?= $p->billingaddress;?></h5>
                  </div> 
              </div>
              </div>
                  <div class="col-md-4">
                       <div class="col-md-12 innerBox">
               <div class="form-group text-center">
                  <label for="text" class="colorwhite">Billing City</label>
                  <h5 class="colorBlack"><?= $p->billingcity;?></h5>
                  </div>  
              </div>
              </div>
               <div class="col-md-4">
                     <div class="col-md-12 innerBox">
               <div class="form-group text-center">
                  <label for="text" class="colorwhite">Billing State</label>
                  <h5 class="colorBlack"><?= $p->billingstate;?></h5>
                 </div> 
              </div>
              </div>

               <div class="col-md-4">
                     <div class="col-md-12 innerBox">
               <div class="form-group text-center">
                  <label for="text" class="colorwhite">Billing Zip</label>
                  <h5 class="colorBlack"><?= $p->billingzip;?></h5>
                </div>  
              </div>
              </div>

               <div class="col-md-4">
                    <div class="col-md-12 innerBox">
               <div class="form-group text-center">
                  <label for="text" class="colorwhite">Billing Country</label>
                  <h5 class="colorBlack"><?= $p->billingcountry;?></h5>
                  </div> 
              </div>
              </div>
             
             
              
                 
                      <div class="col-md-12">
                       <div class="form-group text-center" >
          <label for="text" class="colorwhite">Payment Mode</label>
          <br>
          
                    
                          <span style="color:white;font-weight:bold;padding:11px 34px 10px 51px;border-radius: 23px;background:#043d5b;"> <input style="width: 32px;margin:  -2px -48px;position: absolute;" type="radio" name="gender" value=""<?php if($p->payment_status=='UNPAID'){echo "checked";} ?>>Pending</span>
  
      <div class="dropdown">
    
          <input style="width: 32px;margin:  -2px 4px;position: absolute;" type="radio" name="gender" value=""<?php if($p->payment_status=='DONE'){echo "checked";} ?>><a style="color:red;" href="<?=base_url();?>paysecure/acheckout" ></a>
          <button class="dropbtn">Paid</button>
          <div class="dropdown-content">
              <a href="#" id="show">Cash On Counter</a>
          </div>
          </div>
         <span style="color:white;font-weight:bold;padding:11px 34px 10px 51px;border-radius: 23px;background:#043d5b;"><input style="width: 32px;margin:-2px -46px;position: absolute;" type="radio" name="gender" value="">Completed</span>
         
        
          </div>
          </div>
       
         
          <br>
                  <input type="input" class="Input_radio" value="<?=$p->fee;?>">
                  
              

                 <button class="continue2" type='submit' name='submit'>Continue</button>
              
              

          </div>

      </form>

        </div>
        
      
    
							

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <?php include ("assets/includes/footer_hospital.php"); ?>
        


     
<script>
$(document).ready(function(){
  $("#show").click(function(){
    $(".Input_radio").show();
  });
});
</script>


