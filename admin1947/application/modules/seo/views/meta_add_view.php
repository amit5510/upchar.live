<?php //echo "<pre>"; print_r($clinic); die;?>
<!DOCTYPE html>
<html>
  <style>
  .label-name{
	  text-align:left!important;
	  margin-top:-5px;
  }
  .starspan
  {
	  color:#e80909;
	  font-size:18px;
  }
  .mainheadlinerow
  {
	  padding:5px;margin-top:10px;margin-bottom:10px;
  }
  .mainheadline
  {
	  background:#3c8dbc;margin-top:10px;margin-bottom:10px;color:#fff;padding:9px;font-weight:600;
  }
  .mainheadlinefirstrow
  {
	  padding:5px;
  }
  .mainheadlinefirst
  {
	  background:#3c8dbc;margin-top:-15px;margin-bottom:15px;color:#fff;padding:9px;font-weight:600;
  }
  .othernote{
      font-weight:600;font-size:13px;color:#d20c0c;
  }
  .mainhead{font-weight:600;margin-bottom:20px;}
  .formbody{border:1px solid #d6d2d2;padding:10px;border-radius:4px;}
  .note{font-weight:600;margin-top:10px;margin-bottom:20px;}
  
  #reset{background:#fff;color:#000;padding: 6px 30px;}
  .docimg {
    margin-bottom: 30px;
    height: 134px;
    border-radius: 14px;
    box-shadow: 0px -5px 4px -1px #848181;
    width: 122px;
}
  .doc_nam_inf span {
    font-size: 12px;
    color: #9bc03c;
    letter-spacing: 0.8px;
    font-size: 16px;
    font-weight: 600;
    font-family: 'Lato', sans-serif;
}
ol, ul {
    margin: 0;
    padding: 0;
    border: 0;
    font-size: 100%;
    font: inherit;
    vertical-align: baseline;
}
ul {
    display: block;
    list-style-type: disc;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    padding-inline-start: 40px;
}
  </style>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<!--there was sidebar -->
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<!-- Main content -->
			<section class="content">
				<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
				<link rel="stylesheet" href="<?=base_url();?>public/assets/dist/css/metallic/zebra_datepicker.min.css" type="text/css">
				<div class="container bg-3 ">  
					<div class="row text-">
						<div class="container">
							<h4 class="mainhead">Add Meta</h4>
							<?=$this->session->flashdata('flashmsg');?>
							<form class="form-horizontal formbody" id='app_conf_form' action="<?=base_url()?>seo/meta/add"  method="POST">
								<!--Basic Details-->
								<div class="row mainheadlinefirstrow">
									<div class="col-md-12 mainheadlinefirst">Meta's Details</div>
								</div>
								<div class="row">
									<div class="col-md-8">
										<div class="form-group">
											<label class="control-label col-sm-4 label-name" for="email">Page Url<span class="starspan">*</span></label>
											<div class="col-sm-4">
												<input type="text"  class="form-control" value='https://www.upchar.shop' readonly  placeholder="Page Url">
											</div>
											<div class="col-sm-4">
												<input type="text" id='page_url' name="page_url" class="form-control" value='<?php echo set_value('page_url');?>'  placeholder="Page Url">
												<span style="color:red;"><?php echo form_error('page_url');?></span>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-sm-4 label-name" for="email">Meta Title<span class="starspan">*</span></label>
											<div class="col-sm-8">
												<input type="text" name="meta_title"  id='meta_title' class="form-control" value='<?php echo set_value('meta_title');?>' placeholder="Meta Title">
												<span style="color:red;"><?php echo form_error('meta_title');?></span>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-sm-4 label-name" for="email">Meta Description<span class="starspan">*</span></label>
											<div class="col-sm-8">
												<input type="text" name="meta_description" class="form-control" value='<?php echo set_value('meta_description');?>'  placeholder="Meta Description">
												<span style="color:red;"><?php echo form_error('meta_description');?></span>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-sm-4 label-name" for="email">Meta Keyword<span class="starspan">*</span></label>
											<div class="col-sm-8">
												<input type="text" name="meta_keyword" class="form-control" value='<?php echo set_value('meta_keyword');?>' placeholder="Meta Keyword">
												<span style="color:red;"><?php echo form_error('meta_keyword');?></span>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">        
											<div class="col-sm-9">
												<button type="submit"  id='app_conf_submit' class="continue2  btn-lg common-btn con_done">Add</button>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		<?=$this->load->view('inc/footer');?>
		<div class="control-sidebar-bg"></div>
	</div>
<!-- ./wrapper -->
</body>
</html>
