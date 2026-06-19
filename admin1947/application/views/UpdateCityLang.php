<?php
$this->load->helper('url');
$this->load->helper('form');

$cityLangKey=$this->uri->segment(3);

$language=form_error('lang');
$city=form_error('city');
$imageerror=form_error('image');

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mylomart | <?=$titleinfo?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<!-- Ionicons -->
		<link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
		<!-- DATA TABLES -->
        <link href="<?=base_url();?>css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?=base_url();?>css/AdminLTE.css" rel="stylesheet" type="text/css" />
<style>
.scrollbar
{
	width: 100%;
	background: #F5F5F5;
	overflow-y: scroll;
	margin-bottom: 25px;
}

.force-overflow
{
	max-height: 200px;
}

/*
 *  STYLE 3
 */

#style-3::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	background-color: #F5F5F5;
}

#style-3::-webkit-scrollbar
{
	width: 6px;
	background-color: #F5F5F5;
}

#style-3::-webkit-scrollbar-thumb
{
	background-color: #000000;
}
</style>
    </head>
    <body class="skin-blue">
        <?php include("include/HeaderAdmin.php"); ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
                <?php include("include/side_bar.php"); ?>
            
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1><?=$titleinfo?></h1>
                    
                </section>
                
               <section class="content">
                <!-- general form elements -->
				<div class="box box-primary" >
					<?php if($this->session->userdata('response')!=''){ echo $this->session->userdata('response');}?>
					
						<div class="box-body">
						
						<div style="clear:both;"></div>	
						<!-- form start -->
						<form name="form" method="post" action="<?=base_url();?>setting/CityLangUpdate/<?=$cityLangKey;?>" enctype="multipart/form-data">
						<div style="width:48%;float:left;">
							
							<div class="form-group">
								<label>Language</label>
								<select name="lang" id="lang" class="form-control">
								<option value="">Select Language</option>
								<?php foreach($LangRecord as $rec1){?>
									<option value="<?=$rec1['id']?>" <?php if($LangID==$rec1['id']){?>selected<?php }?> ><?=$rec1['language']?></option>
									<?php }?>
								</select>
								<?=$language?>
							</div>
							
						</div>
										
							<div style="width:48%;float:right;">
							
							<div class="form-group">
								<label>City</label>
								<input type="text"  class="form-control" id="city" name="city" value="<?=$cityname?>">
								<?=$city?>
							</div>
							
							</div>
						
							<div style="clear:both;"></div>
						
						</div><!-- /.box-body -->
						<div class="form-group">
						<img src='<?=base_url();?>admin/city-image/thumb/<?=$imagedb;?>' style='max-height:200px;' >
						</div>
						<div class="form-group">
                                            <label >Square Image (only if youo want to change/update image)</label>
                                            <input type="file" class="form-control" id="image" name="image" value="<?=set_value("image")?>" >
                                            <?=$imageerror?>
                                        </div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Update</button>
						</div>
					</form>
				</div><!-- /.box -->
                </section>
                	
                
                    </div>

            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- Right side column. Contains the navbar and content of the page -->
        
        
        
        
        
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
	<!-- DATA TABES SCRIPT -->
	<script src="<?=base_url();?>js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
	<script src="<?=base_url();?>js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
	<!-- AdminLTE App -->
	<script src="<?=base_url();?>js/AdminLTE/app.js" type="text/javascript"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?=base_url();?>js/AdminLTE/demo.js" type="text/javascript"></script>
	<script src="<?=base_url();?>js/custom-script.js" type="text/javascript"></script>
	<!-- page script -->
	<script type="text/javascript">
		$(function() {
			$("#example1").dataTable();
			$('#example2').dataTable({
				"bPaginate": true,
				"bLengthChange": false,
				"bFilter": false,
				"bSort": true,
				"bInfo": true,
				"bAutoWidth": false
			});
		});
	</script>
        
</body>
</html>
<?php $this->session->unset_userdata('response');?>
