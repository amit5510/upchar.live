<?php include ("assets/includes/header_medical.php"); ?>
    <?php include ("assets/includes/leftmenu_medical.php"); ?>
        <div class="pag_cstm">

            <div class="row">
                <div class="col-lg-12">
                    <div class="pag_cstm_panel" style="background: #295771;color:white;">
                        <div class="pag_cstm_panel_panel_ontent p-t-0">
                    <div class="form-group col-md-6" id="formdiv">
    <?=$this->session->flashdata('flashmsg');?>
    <form action="<?=base_url()?>medicalpanel/gallery" method="post" id="myform"  enctype="multipart/form-data">
    <div class="formheader">
      Medical Gallery
    </div>
    <div class="formdiv">
        <div class="form-group">
          <label for="text">Shot Description:</label>
          <input type="text" class="form-control" id="religion" placeholder="Enter Shot Description" name="shot" data-validation="required"
         data-validation-error-msg="This Field is required">
         
          <!--<p style="color:#ef0909;font-weight:600;">Please insert value in filled</p>-->
        </div>

<div class="form-group">
          <label for="text">Long Description:</label>
          <input type="text" class="form-control" id="religion" placeholder="Enter Long Description" name="long" data-validation="required"
         data-validation-error-msg="This Field is required">
         
          <!--<p style="color:#ef0909;font-weight:600;">Please insert value in filled</p>-->
        </div>
       
    

        <div class="form-group">
                  <label  for="email" >Image </label>
                  
                    <input type="file" class="form-control input-sm" id="uploadimage" name="uploadimage">
                
                </div>
        <button type="submit" id="submit" class="btn btn-info" name="submit">Add</button>
        <button type="reset"  id="reset" class="btn btn-info">Reset</button>
        <hr>
        <span style="text-align:center">Note: Please Don't insert duplicate value</span>
    </form>
    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include ("assets/includes/footer_hospital.php"); ?>

         <style>
  .tabledata{
      border:1px solid #fff!important;
      font-weight:600;
  }
  .tableheaddata{
      border:1px solid #fff!important;
      background:#605CA8;
      color:#fff;
  }
  .error valid{
      color:green!important;
  }
  .tabledataactive{
      color:green;
  }
  .tabledatainactive{
      color:red;
  }
   .formdiv{
      border:1px solid #d2cbcb;padding:25px; border-bottom-left-radius: 4px;; border-bottom-right-radius: 4px;
  }
  .formheader{
      background:#605CA8;padding:10px;color:#fff;font-size:16px;
  }
  #submit{background:#605ca8;padding: 6px 30px;}
  #reset{background:#fff;color:#000;padding: 6px 30px;}
  
  @media only screen and (min-width: 1350px) and (max-width: 1442px) {
    #mydata_wrapper {
        max-width:85%!important;
        margin-left:7%!important;
    }
    
  }
  @media only screen and (min-width: 1300px) and (max-width: 1349px) {
    #mydata_wrapper {
        max-width:85%!important;
        margin-left:3%!important;
    }
    #formdiv{
        margin-left:-55px;
    }
  }
  @media only screen and (min-width: 1200px) and (max-width: 1299px) {
    #mydata_wrapper {
        max-width:78%;
        margin-left:3%!important;
    }
    #formdiv{
        margin-left:-85px;
    }
  }
  @media only screen and (min-width: 1065px) and (max-width: 1199px) {
    #mydata_wrapper {
        max-width:80%;
        margin-left:3%!important;
    }
    #formdiv{
        margin-left:-85px;
    }
  }
  
  @media only screen and (min-width: 1000px) and (max-width: 1064px) {
    #mydata_wrapper {
        max-width:75%;
        margin-left:2%!important;
    }
    #formdiv{
        margin-left:-105px;
    }
  }
  </style>