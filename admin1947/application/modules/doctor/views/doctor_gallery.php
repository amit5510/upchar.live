<!DOCTYPE html>
<html>
<style>
  .tabledata{border:1px solid #fff!important;font-weight:600; }
  .tableheaddata{border:1px solid #fff!important;background:#605CA8;color:#fff;}
  .error valid{color:green!important;}
  .tabledataactive{color:green;}
  .tabledatainactive{ color:red;}
   table.dataTable tbody tr { background-color: #e5e4f1;}
  .label-name{text-align:left!important;margin-top:-5px;}
  .starspan{  color:#e80909; font-size:18px; }
  .mainheadlinerow{ padding:5px;margin-top:10px;margin-bottom:10px;}
  .mainheadline{background:#605ca8;margin-top:10px;margin-bottom:10px;color:#fff;padding:9px;font-weight:600; }
  .mainheadlinefirstrow {   padding:5px; }
  .mainheadlinefirst{background:#605ca8;margin-top:-15px;margin-bottom:15px;color:#fff;padding:9px;font-weight:600; }
  .mainhead{font-weight:600;margin-bottom:20px;}
  .formbody{border:1px solid #d6d2d2;padding:10px;border-radius:4px;}
  .note{font-weight:600;margin-top:10px;margin-bottom:20px;}
  #submit{background:#605ca8;padding: 6px 30px;}
  #reset{background:#fff;color:#000;padding: 6px 30px;}
  </style>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
  		<div class="content-wrapper">
    		<section class="content">
				<div class="container bg-3 ">
  					<div class="row text-">
  						<?=$this->session->flashdata('flashmsg');?>
  						<h4 style="font-weight:600;margin-bottom:20px;">Gallery List</h2>	<br>
  					</div>
  					<div class="table-responsive">
  					<table class="table table-hover table-bordered table-bordered" id='example' style="border:none;">
    					<thead>
					      	<tr>
						        <th class="tableheaddata"><?=$module;?> ID</th>
						        <th class="tableheaddata">uid</th>
						        <th class="tableheaddata">Short Description</th>
						        <th class="tableheaddata">Long Description</th>
						        <th class="tableheaddata">Date</th>
						        <th class="tableheaddata">Status</th>
						        <th class="tableheaddata">Action</th>
						        <th class="tableheaddata">Delete</th>
					      	</tr>
					    </thead>
					    <tbody id="tviewtablebody">
					 		<?php 
					   			foreach($doc_gal as $p)
					   			{
									echo"<tr>";
									echo"<td>".$p['id']."</td>";
									echo"<td>".$p['fname']."</td>";
									echo"<td>".$p['shot_description']."</td>";
									echo"<td>".$p['long_description']."</td>";

									echo"<td>".formatedate($p['date'])."</td>";
									if($p['status']=='A'){
									echo"<td>".'<font color="green">Approved</font>'."</td>";
									}else{echo"<td>".'<font color="red">Not Approved</font>'."</td>";}
									echo "<td>
									<a href='galleryview/".$p['id']."' style=color:red;>View</a>
									&nbsp;| <a href='updategallery/".$p['id']."' style=color:red;>Edit</a>
									</td>";

									 echo "<td><a href='delete?id=".$p['id']."' style=color:red;>Delete</a></td>";
									        echo"</tr>";

									echo"</tr>";
					   			} ?>
					    </tbody>
					    <tfoot>
					      	<tr>
					        	<th class="tableheaddata"><?=$module;?> ID</th>
						        <th class="tableheaddata">uid</th>
						        <th class="tableheaddata">Short Description</th>
						        <th class="tableheaddata">Long Description</th>
						        <th class="tableheaddata">Date</th>
						        <th class="tableheaddata">Status</th>
						        <th class="tableheaddata">Action</th>
						        <th class="tableheaddata">Delete</th>
					      	</tr>
					    </tfoot>
					</table>
					</div>
  				</div>
				<!-- </div> -->
    		</section>
  		</div>
	  	<div class="control-sidebar-bg"></div>
	  	<?php $this->load->view('footer');?>
	</div>
<!-- ./wrapper -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
    	$('#example').DataTable();
		} );
  	</script> 
</body>
</html>
