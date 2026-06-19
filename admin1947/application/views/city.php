<?php
$this->load->helper('url');
$this->load->helper('form');

$imageerror=form_error('image');
$cityerror=form_error('city');
$staterror=form_error('state');
$langerror=form_error('lang');
$local_lang=form_error('local_lang');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mylomart | <?=$title;?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<!-- Ionicons -->
		<link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
		<!-- DATA TABLES -->
        <link href="<?=base_url();?>/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?=base_url();?>/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <?php include("include/HeaderAdmin.php");?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
                <?php include("include/side_bar.php"); ?>
            
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?=$title?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Data tables</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
					
					<div class="box box-primary" >
                                <!-- form start -->
                                <?php if($this->session->userdata('response')!=''){ echo $this->session->userdata('response');}?>
                                <form name="form" method="post" action="<?=base_url();?>setting/AddCity" enctype="multipart/form-data">
                                    <div class="box-body" style="width:80%">
										
										<div class="form-group">
                                            <label >Language</label></br>
                                            <select name="lang" id="lang" class="form-control" >
                                            <option value="">SELECT LANGUAGE</option>
                                            <?php foreach($language as $row){?>
                                            <option <?php if(set_value("lang")==$row['id']){?> selected <?php }?> value="<?=$row['id']?>"><?=$row['language']?></option>
                                            <?php }?>
                                            </select>
                                            <?=$langerror?>
                                        </div>
										
										<div class="form-group">
                                            <label >Select State</label></br>
                                            <select name="state" id="state" class="form-control" >
                                            <option value="">SELECT STATE</option>
                                            <?php foreach($state as $rec){?>
                                            <option <?php if(set_value("state")==$rec['id']){?> selected <?php }?> value="<?=$rec['id']?>"><?=$rec['name']?></option>
                                            <?php }?>
                                            </select>
                                            <?=$staterror?>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label >City</label>
                                            <input type="text" class="form-control" id="city" name="city" value="<?=set_value("city")?>" >
                                            <?=$cityerror?>
                                        </div>
                                         
                                        <div class="form-group">
                                            <label >Image 1:1</label>
                                            <input type="file" class="form-control" id="image" name="image" value="<?=set_value("image")?>" >
                                            <?=$imageerror?>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label >Local Language</label>
                                            <div style="clear:both;"></div>
                                            <?php foreach($language as $rec1){
											if($rec1['default']=='Y')
												{
												$default='<span class="text-blue">(Default)</span>';
												}
												else
												{
												$default='';	
												}
											?>
											<div style="text-align:center;float:left;margin-right:5px;width:70px;height-max:45px;border:1px solid #FFA500;"> 
											<input type="checkbox" name="local_lang[]" value="<?=$rec1['id']?>" <?php if($rec1['default']=='Y'){?> disabled checked<?php }?> /></br>
											<?=$rec1['language']?></br><?=$default?>
											</div>	
											<?php }?>	
                                            <?=$local_lang?>
                                        </div>
                                        
                                    </div><!-- /.box-body -->
									
									<div style="clear:both;"></div>
									
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->
					
					<div class="row">
                        <div class="col-xs-12"><!-- /.box -->

                          <div class="box">
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>City</th>
                                                <th>State</th>
												<th>Status</th>
                                                <th>Update</th>
                                                <th style="display:none;">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($city as $row){
										$statename=$this->db->get_where('state',array('id'=>$row['state_id']))->row('name');
										$key=$this->adminmodel->GenerateEnctryptID($row['id']);	
										$cityname=$this->adminmodel->GetCity($row['id']);
										?>
										<tr id="link<?=$row['id'];?>">
											<td><?=$cityname?></td>
											<td><?=$statename?></td>
											<td>
											<?php if($row['status']==1){ $status="<span style='color:green;font-weight:700;'>Show</span>"; } else{ $status="<span style='color:red;font-weight:700;'>Hidden</span>"; }?>
											<a style="cursor:pointer" data-uid="<?=$row['id']?>" class="changests" id="chg<?=$row['id']?>"><span style="color:red;"><?=$status?></span></a>
											</td>
											<td><a href="<?=base_url()?>setting/UpdateCity/<?=$key?>">Language</a></td>
											<!--<td id="yesno<?=$row['id'];?>" style="cursor:pointer;"><a onClick="option(<?=$row['id'];?>)">Delete</a></td>-->
										</tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
		
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
		<!-- DATA TABES SCRIPT -->
        <script src="<?=base_url();?>/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?=base_url();?>/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?=base_url();?>/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?=base_url();?>/js/AdminLTE/demo.js" type="text/javascript"></script>
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
        
<script>
$(".changests").click(function(){
	var id=$(this).attr('data-uid');
	var a="<?=base_url()?>setting/citystatus/"+id;
    $.ajax(
	{
		url: a, 
		success: function(result){
        $('#chg'+id).html(result);
    }});
});
</script>

<script>
function option(rar)
	{
	document.getElementById("yesno"+rar).innerHTML='<span style="color:red;">are you sure?</span> <a onClick="delcity('+rar+')">yes</a> / <a onClick="yesno('+rar+')">no</a>';
	}
</script>

<script>
function yesno(rar)
	{
	document.getElementById("yesno"+rar).innerHTML='<a onClick="option('+rar+')" >Delete</a>';
	}
</script>


    </body>
</html>
<?php $this->session->unset_userdata('response');?>
