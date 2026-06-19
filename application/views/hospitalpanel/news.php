<?php include ("assets/includes/header_hospital.php"); ?>
    <?php include ("assets/includes/leftmenu_hospital.php"); ?>
        <div class="pag_cstm">
          <div class="row">
            <div class="col-lg-12">
              <div class="pag_cstm_panel" style="background: #295771;color:white;">
                <div class="pag_cstm_panel_panel_ontent p-t-0">
                  <div id="formdiv">
                    <?=$this->session->flashdata('flashmsg');?>
                    <form action="<?=base_url()?>hospitalpanel/news" method="post" id="myform"  enctype="multipart/form-data">
                      <div class="formheader">
                        <h3> News Management</h3>
                      </div>
                      <div class="formdiv">
                        <div class="form-group">
                          <label for="text">Title: </label>
                          <input type="text" class="form-control" id="religion" placeholder="Enter Title" name="name" data-validation="required"
                         data-validation-error-msg="This Field is required">
                        </div>
                        <div class="form-group">
                          <label for="text">Description:</label>
                          <input type="text" class="form-control" id="religion" placeholder="Enter Description" name="description" data-validation="required"
                         data-validation-error-msg="This Field is required">
                        </div>
                        <div class="form-group">
                          <label for="text">Type:</label>
                          <select name="type" class="form-control input-sm" id="type" onchange="mytype()" data-validation="required"
                          data-validation-error-msg="This Field is required">
                            <option value="">Select</option>
                            <option value="1" <?php if(set_value('type')=='1'){ echo "selected";}?>>Image</option>
                            <option value="2" <?php if(set_value('type')=='2'){ echo "selected";}?>>Video</option>
                          </select>
                        </div>
                        <!-- <div class="col-md-12">
                        <div class="form-group" id="image" style="display: none;">
                          <label class="control-label col-sm-2 label-name" for="file-upload">Image<span class="starspan">*</span></label>
                          <div class="col-sm-7">
                              <label class="filecss">Choose Photo
                            <input type="file" class="custom-file-input" id="uploadimage" name="uploadimage">
                          </label>
                        </div>
                      </div>
                    </div> -->
                      <div class="form-group" id="image" style="display: none;">
                        <label for="text">Photo</label><br>
                        <label for="file-upload" class="custom-file-upload">Choose Photo</label>
                        <input type="file" class=" custom-file-input" id="file-upload" name="uploadimage">
                      </div>
                      <div class="form-group" id="video" style="display: none;">
                        <label for="text">Video:</label>
                        <input type="text" class="form-control" id="religion" placeholder="Enter Description" name="video_url" data-validation="required"
                        data-validation-error-msg="This Field is required">
                      </div>

                        <br>   <br>   
                        <button type="submit" id="submit" class="btn btn-info" name="submit">Add
                        </button>
                        <button type="reset"  id="reset" class="btn btn-info">Reset</button>
                        <hr>
                        <span style="text-align:center;color: white;letter-spacing: 1px; padding: 7px 23px;background: #214458;"><b>Note:</b> Please Don't Insert Duplicate Value
                        </span>
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
  function mytype() {
  
  var type = document.getElementById('type').value;   
  if(type==1)
  {
   document.getElementById("image").style.display = "block";
   document.getElementById("video").style.display = "none";;
  }
  else if(type==2)
  {
   
    document.getElementById("video").style.display = "block";
    document.getElementById("image").style.display = "none";;
  }
  else
  {
   document.getElementById("image").style.display = "none";
   document.getElementById("video").style.display = "none";
  }  
  
}

</script>

         <style>
  .tabledata{
      border:1px solid #fff!important;
      font-weight:600;
  }
  .custom-file-input::-webkit-file-upload-button {
  visibility: hidden;
}
input[type="file"] {
    display: none;
}
.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}

.custom-file-input::before {
  content: 'Select some files';
  display: inline-block;
  background: linear-gradient(top, #f9f9f9, #e3e3e3);
  border: 1px solid #999;
  border-radius: 3px;
  padding: 5px 8px;
  outline: none;
  white-space: nowrap;
  -webkit-user-select: none;
  cursor: pointer;
  text-shadow: 1px 1px #fff;
  font-weight: 700;
  font-size: 10pt;
}
.custom-file-input:hover::before {
  border-color: black;
}
.custom-file-input:active::before {
  background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
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
      padding:10px;color:#fff;font-size:16px;
  }
  #submit{background:#27a707;padding: 6px 30px;}
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