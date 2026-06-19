<!DOCTYPE html>
<html>
  <style>
    .tabledata{
      border:1px solid #fff!important;
      font-weight:600;
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
     table.dataTable tbody tr {
      background-color: #e5e4f1;
  }
  </style>
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
      background:#605ca8;margin-top:10px;margin-bottom:10px;color:#fff;padding:9px;font-weight:600;
    }
    .mainheadlinefirstrow
    {
      padding:5px;
    }
    .mainheadlinefirst
    {
      background:#605ca8;margin-top:-15px;margin-bottom:15px;color:#fff;padding:9px;font-weight:600;
    }
    .mainhead{font-weight:600;margin-bottom:20px;}
    .formbody{border:1px solid #d6d2d2;padding:10px;border-radius:4px;}
    .note{font-weight:600;margin-top:10px;margin-bottom:20px;}
    #submit{background:#605ca8;padding: 6px 30px;}
    #reset{background:#fff;color:#000;padding: 6px 30px;}
  </style>
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
  </style>
  <link rel="stylesheet" href="<?=base_url();?>public/assets/dist/css/metallic/zebra_datepicker.min.css" type="text/css">
  <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
  <link rel="stylesheet" href="<?=base_url();?>public/assets/dist/css/metallic/zebra_datepicker.min.css" type="text/css">
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <div class="content-wrapper">
        <section class="content">
          <div class="container bg-3 ">  
            <div class="row text-">
				<?php echo form_open("doctor/pathology/index",'class="form-horizontal formbody" id="search_form" method="get"');  ?>
				<div class="row mainheadlinefirstrow">
					<div class="col-md-12 mainheadlinefirst">Basic Filter
					<a  href="<?php echo base_url();?>doctor/pathology/add" class="btn btn-info" style="float:right;" id="submit" >Assign Test</a>
					</div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
					  <label class="control-label col-sm-2 label-name" for="email">Records Per Page</label> 
					  <div class="col-sm-2"><?php echo display_record_per_page();?></div>
                      <label class="control-label col-sm-2 label-name" for="email">Test/Pathology Name </label>
						<div class="col-sm-3">
                        <input type="text" class="form-control input-sm"  name="keyword" value="<?php echo $this->input->get_post('keyword');?>">
						</div>
						<div class="col-sm-3">
						<a  onclick="$('#search_form').submit();" style="padding-top:1px" class="button2 btn-lg btn btn-info" ><span> Search </span></a>
						<?php 
                        if($this->input->get_post('keyword')!='')
                        { 
                            echo anchor("doctor/pathology/index/",'<span>Clear Search</span>');    
                        } 
                        ?>
                    </div>
                    
                    </div>
                  </div>
                </div>
				<?php echo form_close();?>
				<h4 style="font-weight:600;margin-bottom:20px;">Assign Test List</h4>
				<?=$this->session->flashdata('flashmsg');?>
				<div class="table-responsive">
				  <table class="table table-hover table-bordered table-bordered" id='exportTable' style="border:none;">
					<thead>
					  <tr>
						<th class="tableheaddata">ID</th>
						<th class="tableheaddata">Pathology Name</th>
						<th class="tableheaddata">Test Name</th>
						<th class="tableheaddata">Status</th>
						<th class="tableheaddata">Delete</th>
					  </tr>
					</thead>
					<tbody id="tviewtablebody">
					  <?php 
					  //echo "<pre>"; print_R($result); die;
					  foreach($result as $val)
					  {	
						echo"<tr>";
						echo"<td>".$val['id']."</td>";
						echo"<td>".$val['name']."</td>";
						echo"<td>".$val['test_name']."</td>";?>
						<td><?php if($val['status']=='0'){ echo '<span style="color:red;">In-Active</span>'; } else{ echo '<span style="color:green;">Active</span>'; } ?></td>
					   <?php 
						echo "<td><a href=".base_url()."doctor/pathology/assign_test_delete?id=".$val['id']." style=color:red;><span class='glyphicon glyphicon-trash'></span></a></td>";
						echo"</tr>";
					  }
					  ?>
					</tbody>
					<tfoot>
					  <tr>
						<th class="tableheaddata">ID</th>
						<th class="tableheaddata">Pathology Name</th>
						<th class="tableheaddata">Test Name</th>
						<th class="tableheaddata">Status</th>
						<th class="tableheaddata">Delete</th>
					  </tr>
					</tfoot>
				  </table>
				</div>  
					<div class="row">
						<div class="col-md-6">
							
						</div>
						<div class="col-md-6">
							<div class="pagination"><?php echo $page_links; ?></div>
						</div>
					</div>
            </div>
          </div>
        </section>
      </div>
    <div class="control-sidebar-bg"></div>
  </div>
</body>
</html>
<?php $this->load->view('footer');?>
  
