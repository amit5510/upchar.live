<?php include ("assets/includes/header_pathlab.php"); ?>
<?php include ("assets/includes/leftmenu_pathlab.php"); ?>
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
						<h4 class="colorwhite" style="font-weight:bold;padding:4px 17px">Test Details</h4>
                        <?php echo form_open_multipart(current_url_query_string(), 'class="form-horizontal form-label-left" id="form"');?>
						<div class="col-sm-12 ">
							<?=$this->session->flashdata('flashmsg');?>
						</div>
						<div class="col-sm-6 ">
							<div class="col-sm-12" style="padding: 0px;">
								<label class="colorwhite">Category</label> <label style="color:red;"> *</label>
								<input type="text" readonly id='category_name' readonly name="category_name" class="form-control2" value="<?php echo set_value('category_name',$package['category_name']); ?>"  >
								<span style="color:red;"><?php echo form_error('category_name');?></span>
							</div>
							<div class="col-sm-12" style="padding: 0px;">
								<label class="colorwhite">Test Name</label> <label style="color:red;"> *</label>
								<input type="text" id='test_name' name="test_name" readonly class="form-control2" value="<?php echo set_value('test_name',$package['test_name']); ?>"  >
								<span style="color:red;"><?php echo form_error('test_name');?></span>
							</div>
							<div class="col-sm-12" style="padding: 0px;">
								<label class="colorwhite">Short Name</label> <label style="color:red;"> *</label>
								<input type="text" id='short_name' name="short_name" readonly class="form-control2" value="<?php echo set_value('short_name',$package['short_name']); ?>"  >
								<span style="color:red;"><?php echo form_error('short_name');?></span>
							</div>
							<div class="col-sm-12" style="padding: 0px;">
								<label class="colorwhite">Test Type</label> <label style="color:red;"> *</label>
								<input type="text" id='test_type' name="test_type" readonly class="form-control2" value="<?php echo set_value('test_type',$package['test_type']); ?>"  >
								<span style="color:red;"><?php echo form_error('test_type');?></span>
							</div>
							<div class="col-sm-12" style="padding: 0px;">
								<label class="colorwhite">Sub Category</label> <label style="color:red;"> *</label>
								<input type="text" id='sub_category' name="sub_category" readonly class="form-control2" value="<?php echo set_value('sub_category',$package['sub_category']); ?>"  >
								<span style="color:red;"><?php echo form_error('sub_category');?></span>
							</div>
							<div class="col-sm-12" style="padding: 0px;">
								<label class="colorwhite">Method</label>
								<input type="text" id='method' name="method" readonly class="form-control2" value="<?php echo set_value('method',$package['method']); ?>"  >
								<span style="color:red;"><?php echo form_error('method');?></span>
							</div>
						</div>
						<div class="col-sm-6 ">
							<div class="col-sm-12 padding0"  >
								<label class="colorwhite">Report Day</label>
								<input type="text" id='report_day' name="report_day" readonly class="form-control2" value="<?php echo set_value('report_day',$package['report_day']); ?>"  >
								<span style="color:red;"><?php echo form_error('report_day');?></span>
							</div>
							<div class="col-sm-12 padding0"  >
								<label class="colorwhite">Charge Category</label> <label style="color:red;"> *</label>
								<input type="text" id='charge_category' readonly name="charge_category" class="form-control2" value="<?php echo set_value('charge_category',$package['charge_category']); ?>"  >
								<span style="color:red;"><?php echo form_error('charge_category');?></span>
							</div>
							<div class="col-sm-12 padding0"  >
								<label class="colorwhite">Code</label> <label style="color:red;"> *</label>
								<input type="text" id='code' name="code" readonly class="form-control2" value="<?php echo set_value('code',$package['code']); ?>"  >
								<span style="color:red;"><?php echo form_error('code');?></span>
							</div>
							<hr>
							<div class="col-sm-12 padding0">                    
								<label class="colorwhite">Standard Charge</label> <label style="color:red;"> *</label>
								<input type="text" name="amount"  id='amount' readonly  value="<?php echo set_value('amount',$package['amount']); ?>" class="form-control">	
								<span style="color:red;"><?php echo form_error('amount');?></span>
							</div>
							<div class="col-sm-12 padding0">                    
								<label class="colorwhite">Your Price</label> <label style="color:red;"> *</label>
								<input type="text" name="lab_price"  id='lab_price'  value="<?php echo set_value('lab_price',$package['lab_price']); ?>" class="form-control">	
								<span style="color:red;"><?php echo form_error('lab_price');?></span>
							</div>
							<div class="col-sm-12 padding0"  >
								<label class="colorwhite">Premium Status</label>
								<select name="status" class="form-control">
									<option value='1' <?php if(set_value('status',$package['status'])=='1'){ echo "selected"; } ?>>Active</option>
									<option value='0' <?php if(set_value('status',$package['status'])=='0'){ echo "selected"; } ?>>Inactive</option>
								</select>
								<span style="color:red;"><?php echo form_error('status');?></span>
							</div>
							<div class="col-lg-12  mrt20" style="padding: 0px;"> 
								<button type="submit"  id='app_conf_submit' class="continue2  btn-lg common-btn con_done">Update Test </button>
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