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
  						<h4 style="font-weight:600;margin-bottom:20px;">News List</h2>	<br>
  					</div>
  					<div class="table-responsive">
  					<table class="table table-hover table-bordered table-bordered" id='example' style="border:none;">
    					<thead>
					      	<tr>
						        <th class="tableheaddata"><?=$module;?> ID</th>
						        <th class="tableheaddata">Title</th>
						        <th class="tableheaddata">Hospitals / Doctor</th>
						        <th class="tableheaddata">Date</th>
						        <th class="tableheaddata">Status</th>
						         <th class="tableheaddata">Approved</th>
						        <th class="tableheaddata">Preview</th>
						        <th class="tableheaddata">Action</th>
						        <th class="tableheaddata">Delete</th>
					      	</tr>
					    </thead>
					    <tbody id="tviewtablebody">
					 		<?php 
					   			foreach($news as $p)
					   			{
									echo"<tr>";
									echo"<td>".$p['id']."</td>";
									echo"<td>".$p['title']."</td>"; ?>
									<td><?php if($p['name']!=''){ echo $p['name']; }else{ echo $p['fname']; }  ?></td>
									<?php
									echo"<td>".formatedate($p['creat_date'])."</td>";
									if($p['status']=='1'){
									echo"<td>".'<font color="green">Active</font>'."</td>";
									}else{echo"<td>".'<font color="red">In Active</font>'."</td>";}
									if($p['approved']=='1'){
									echo"<td>".'<font color="green">Yes</font>'."</td>";
									}else{echo"<td>".'<font color="red">No</font>'."</td>";}
									echo "<td>
									<a href='newsview/".$p['id']."' style=color:red;>View</a>
									</td>";
									echo "<td>
									<a href='newsupdate/".$p['id']."' style=color:red;>Edit</a>
									</td>";
									echo "<td><a href='deletenews/".$p['id']."' style=color:red;>Delete</a></td>";
									        echo"</tr>";
									echo"</tr>";
					   			} ?>
					    </tbody>
					    <tfoot>
					      	<tr>
					        	<th class="tableheaddata"><?=$module;?> ID</th>
						        <th class="tableheaddata">Title</th>
						        <th class="tableheaddata">Hospitals / Doctor</th>
						        <th class="tableheaddata">Date</th>
						        <th class="tableheaddata">Status</th>
						         <th class="tableheaddata">Approved</th>
						        <th class="tableheaddata">Preview</th>
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
