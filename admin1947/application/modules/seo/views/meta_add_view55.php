<?php $this->load->view('backoffice/template/view_header'); ?>
<div class="main-content">
	<div class="main-content-inner">
		<div class="main-content-inner">
			<div class="breadcrumbs ace-save-state" id="breadcrumbs">
				<ul class="breadcrumb">
					<li>
						<i class="ace-icon fa fa-home home-icon"></i>
						<a href="<?php echo base_url();?>backoffice">Home</a>
					</li>
					<li class="active"><?php echo $heading_title; ?></li>
				</ul>
			</div>
			<div class="page-content">
				<div class="page-header">
					<h1>
						<?php echo anchor('backoffice/meta','Back to List'); ?>
						<small>
							<i class="ace-icon fa fa-angle-double-right"></i>
							<?php echo $heading_title; ?>
						</small>
					</h1>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
						<?php 
						//validation_message();
						error_message();
						?>
						<?php echo form_open('backoffice/meta/add/','class="form-horizontal form-label-left" id="form"');?>  
						<div class="form-group" >
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">URL :  <span style="color:red;" class="required">*</span> </label>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" value="<?php echo base_url();?>" class="form-control"  readonly="readonly" size="38"/>			
							</div>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" name="page_url" size="40" class="form-control" value="<?php echo set_value('page_url');?>">
								<span style="color:red;"><?php echo form_error('page_url');?></span>
							</div>
						</div>
						<div class="form-group" >
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Title: <span style="color:red;" class="required">*</span> </label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<textarea name="meta_title" rows="5" class="form-control" id="title" ><?php echo set_value('meta_title');?></textarea>		
								<span style="color:red;"><?php echo form_error('meta_title');?></span>
							</div>
						</div>
						<div class="form-group" >
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Keywords: <span style="color:red;" class="required">*</span> </label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<textarea name="meta_keyword" rows="5" class="form-control" id="keyword" ><?php echo set_value('meta_keyword');?></textarea>
								<span style="color:red;"><?php echo form_error('meta_keyword');?></span>
							</div>
						</div>
						<div class="form-group" >
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Description: <span style="color:red;" class="required">*</span> </label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<textarea name="meta_description" rows="5" class="form-control" id="description" ><?php echo set_value('meta_description');?></textarea>
								<span style="color:red;"><?php echo form_error('meta_description');?></span>
							</div>
						</div>
						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<input type="submit" name="sub" class="btn btn-sm btn-success" value="Add"  />
								<input type="hidden" name="action" value="add" />
							</div>
						</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php $this->load->view('backoffice/template/view_footer'); ?>