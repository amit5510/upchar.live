<?php
$this->load->helper('url');
$this->load->helper('form');

$state=form_error('state');
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
                                <form name="form" method="post" action="<?=base_url();?>setting/AddState" >
                                    <div class="box-body" style="width:80%">
										
										<div class="form-group">
                                            <label >State</label>
                                            <input type="text" class="form-control" id="state" name="state" >
                                            <?=$state?>
                                        </div>
                                        
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->
					
					
					
					
					<div id="success" class="text-green"></div>
					<div id="error" class="text-red"></div>
                    <div class="row">
                        <div class="col-xs-12"><!-- /.box -->

                          <div class="box">
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>State</th>
												<th>Status</th>
                                                <th>Update</th>
                                               <!-- <th>Delete</th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($record as $row){
										$key=$this->adminmodel->GenerateEnctryptID($row['id']);	
										?>
										<tr id="link<?=$row['id'];?>">
											<td><?=$row['name']?></td>
											<td>
											<?php if($row['status']==1){ $status="<span style='color:green;font-weight:700;'>Show</span>"; } else{ $status="<span style='color:red;font-weight:700;'>Hidden</span>"; }?>
												<a style="cursor:pointer" data-uid="<?=$row['id']?>" class="changests" id="chg<?=$row['id']?>"><span style="color:red;"><?=$status?></span></a>
											</td>
											<td>
											<a href="<?=base_url()?>setting/UpdateState/<?=$key?>">Update</a></td>
											<td id="yesno<?=$row['id'];?>" style="cursor:pointer;display:none"><a onClick="option(<?=$row['id'];?>)">Delete</a></td>
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
        <script src="<?=base_url();?>/js/custom-script.js" type="text/javascript"></script>
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
	var a="<?=base_url()?>setting/statestatus/"+id;
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
	document.getElementById("yesno"+rar).innerHTML='<span style="color:red;">are you sure?</span> <a onClick="delstate('+rar+')">yes</a> / <a onClick="yesno('+rar+')">no</a>';
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
