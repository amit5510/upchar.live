<head>
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button {
    box-sizing: border-box;
    display: inline-block;
    min-width: 1.5em;
    padding: 0.5em 1em;
    margin-left: 2px;
    text-align: center;
    text-decoration: none !important;
    cursor: pointer;
    *cursor: hand;
    color: #333 !important;
    border: 1px solid transparent;
    border-radius: 2px;
    background: white !important;
}
    </style>
</head>
<?php include ("assets/includes/header_hospital.php"); ?>
    <?php include ("assets/includes/leftmenu_hospital.php"); ?>
        <div class="pag_cstm">

            <div class="row">
                <div class="col-lg-12">
                    <div class="pag_cstm_panel" style="background: #295771;">
                        <div class="pag_cstm_panel_panel_ontent p-t-0">
                            <div class="row paddb40">
                            <div class="col-sm-12 processsstep2">
                            <h4>Manage Doctors </h4><br>
                           

                            </div>

                                <div class="col-sm-12 processsstep2">

                     <table id="datatable" class="display" style="width:100%">
                                <thead style="color:white;">
                                    <tr>
                                        <th> Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Report</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                               <?php 
   foreach($clinic as $p)
   {

      echo"<tr>";
      echo"<td>".$p->fname."</td>";
      
      echo"<td>".$p->mobile."</td>";
      echo"<td>".$p->email."</td>";
      echo "<td><a href='data?id=".$p->id."' style=color:red;>Report</a></td>";
       	echo"</tr>";

 

   }
  ?>
                                </tbody>
                    </table>


                                </div>


                               <!-- <div class="col-sm-5 hoslist_he mrgt30">

                                        <p>
                                            This information helps us perform critical checks to ensure that only licensed and genuine medical practitioners are listed on Upchaar . Your profile will get a “Verified” badge on verification. Doctors with verified profiles get 95% more patient views on Upchaar.</p>

                                </div>-->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include ("assets/includes/footer_hospital.php"); ?>
        <link rel="stylesheet" type="text/css"  href='https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css'>
        <script src='https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>
        <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        } );
        </script>
