<?php include ("assets/includes/header_hospital.php"); ?>
<?php include ("assets/includes/leftmenu_hospital.php"); ?>
<style>
.docimg {
	margin-bottom: 30px;
	height: 134px;
	border-radius: 14px;
	box-shadow: 0px -5px 4px -1px #848181;
	width: 122px;
}
.doc_nam_inf ul li {
	font-size: 13px;
	/*color: #868686;
	 letter-spacing: 0.8px; */
	list-style: none;
	line-height: 20px;
}
.right_box {
	padding: 13px 0px;
	margin-top: 10px;
	margin-bottom: 10px;
	border-bottom: 1px solid #e8e8e8;
}
								
.right_box img {
border-radius: 8px;
}
.doc_nam_inf span {
	font-size: 12px;
	color: #9bc03c;
	letter-spacing: 0.8px;
	font-size: 16px;
	font-weight: 600;
	font-family: 'Lato', sans-serif;
}
.doc_nam_inf ul {
	margin-top: 4px;
}
</style>
<div class="pag_cstm">
    <div class="row">
		<div class="col-lg-12">
            <div class="pag_cstm_panel" style="background:#295771;">
                <div class="pag_cstm_panel_panel_ontent p-t-0">
					<div class="row paddb40">
						<h4 class="colorwhite" style="font-weight:bold;padding:4px 17px">Package Details</h4>
                        <?php echo form_open_multipart("hospitalpanel/addpackage", 'class="form-horizontal form-label-left" id="form"');?>
						<div class="col-sm-6 ">
							<?=$this->session->flashdata('flashmsg');?>
							<div class="col-sm-12" style="padding: 0px;">
								<label class="colorwhite">Title</label>
								<input type="text" id='title' name="title" class="form-control2" value="<?php echo set_value('title'); ?>"  placeholder="Package Title">
								<span style="color:red;"><?php echo form_error('title');?></span>
							</div>
							<hr>
							<div class="col-sm-12 padding0">                    
								<label class="colorwhite">Amount</label>
								<input type="text" name="amount"  id='amount' placeholder="Package Amount" value="<?php echo set_value('amount'); ?>" class="form-control">	
								<span style="color:red;"><?php echo form_error('amount');?></span>
							</div>
							<div class="col-sm-12 padding0"  >
								<label class="colorwhite">Description</label>
								<textarea class="form-control input-sm" id="description" placeholder="Package Description"  name="description"  ><?php echo set_value('description'); ?></textarea>
								<span style="color:red;"><?php echo form_error('description');?></span>
							</div>
							<div class="col-sm-12 padding0"  >
								<label class="colorwhite">Image</label>
								<input type="file" class="form-control input-sm" id="uploadimage" name="uploadimage"  >
								<span style="color:red;"><?php echo form_error('uploadimage');?></span>
							</div>
							<div class="col-sm-12 padding0"  >
								<label class="colorwhite">Video</label>
								<input type="text" name="video_url" id="video_url"  placeholder="Youtube Video Url" class="form-control input-sm" value="<?php echo set_value('video_url');?>" maxlength="60" />
								<span style="color:red;"><?php echo form_error('video_url');?></span>
							</div>
							<div class="col-sm-12 padding0"  >
								<label class="colorwhite">Premium Status</label>
								<select name="status" class="form-control">
									<option value='1' <?php if(set_value('status')=='1'){ echo "selected"; } ?>>Active</option>
									<option value='0' <?php if(set_value('status')=='0'){ echo "selected"; } ?>>Inactive</option>
								</select>
								<span style="color:red;"><?php echo form_error('status');?></span>
							</div>
							<div class="col-lg-12  mrt20" style="padding: 0px;"> 
								<button type="submit"  id='app_conf_submit' class="continue2  btn-lg common-btn con_done">Add Package </button>
							</div>  
						</div>
						<div class="col-sm-6"></div>	
						<?php echo form_close(); ?> 
                    </div>  
				</div>  
			</div>
		</div>
	</div>
</div>
<?php include ("assets/includes/footer_hospital.php"); ?>