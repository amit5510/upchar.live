<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
 <style>
h5{
    font-weight:bold;
    color: black;

}     
.backImg{
     background: url(images/logo3.png) no-repeat center; 
     background-size:50%;
     background-repeat: no-repeat;
}
.ColorWhite{
    color:black;
    font-weight:bold;
}
.form-control {
    background-color: #ffffff4d;
}

 </style> 
</head>

<?php
$servername = "localhost";
$username = "upcharr";
$password = "Anoop@56921";

try {
    $conn = new PDO("mysql:host=$servername;dbname=upcharr_live", $username, $password);
    // set the PDO error mode to exception
    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$f=$_POST["firstname"];
	$s=$_POST["place"];
	$g=$_POST["gender"];
	
	$q1=$_POST["gender1"];
	$q2=$_POST["gender2"];
	$q3=$_POST["gender3"];
	$q4=$_POST["gender4"];
	$q5=$_POST["gender5"];
	$q6=$post["gender6"];
	$a=$_POST["phno"];
	if($f) {
		
	$sql = "INSERT INTO saurvey (fname,phno,place,gender,Qus1,Qus2,Qus3,Qus4,Qus5,Qus6)
	
    VALUES ('$f','$a','$s','$g','$q1','$q2','$q3','$q4','$q5','YES')";
    $conn->exec($sql);
    //echo "New record created successfully";
		
    // Enter the code you want to execute after the form has been submitted
    // Display Success or Failure message (if any) 
  }
	
	
    } 

catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
<!Doctype html public>
<body>
<div class="col-md-12">


<div class="col-md-6 col-md-offset-3 backImg">
    <div class="col-md-12" style="background:#a9a9a963;color: black;">
    
    <div class="text-center">
    <h3><b>UPCHAR</b> </h3>
           
    </div>

<center><h5 style="background: #5cb85c;padding: 8px 21px;color: white;border-radius: 23px;">                          Healthcare facility survey</h5>
</center>
<table cellpadding="10">
<td>
<form accreateProfile.php" method = "post">
<div class="col-md-6">
<h5>Name:</h5>
<input type="text" class="form-control" name="firstname" />
</div>

<div class="col-md-6">
<h5>Mobile No.</h5>
<input type="text" class="form-control digit" name="phno" />
</div>

<div class="col-md-12">
<h5>Age</h5>
<input type="number" class="form-control" name="place" />

</div>

<div class="col-md-12">
<h5>Place</h5>
<input type="text" class="form-control" name="place" />

</div>

<div class="col-md-12">
<h5>Gender</h5>

<div class="col-md-4">
<input type="radio" name="gender" value="Male" /> <span class="ColorWhite">Male</span>
</div>
<div class="col-md-4">
<input type="radio" name="gender" value="Female" /> <span class="ColorWhite">Female</span>
</div>
</div>




<br/>


<div class="col-md-12">
<h5>1.How often do you visit a doctor in a month ?</h5> 

<div class="col-md-4">	
<input type="radio" name="gender1" value="0-2 times" /> <span class="ColorWhite">0-2 times</span>
</div>
<div class="col-md-4">
<input type="radio" name="gender1" value="3-5 times" />  <span class="ColorWhite">3-5 times</span>
</div>
<div class="col-md-4">
<input type="radio" name="gender1" value="6 or more" />  <span class="ColorWhite">6 or more </span>
</div>
</div>

<div class="col-md-12">
	<h5>2. Do you have to wait for long time when you visit a doctor?</h5> 
<div class="col-md-4">
<input type="radio" name="gender2" value="YES" /> <span class="ColorWhite">YES</span>
</div>
<div class="col-md-4">
<input type="radio" name="gender2" value="NO" /><span class="ColorWhite">NO</span>
</div>
</div>

<div class="col-md-12">
	<h5>3. If we provide good doctor and hospital facility near by you in lower cost, will you prefer it?</h5> 
<div class="col-md-4">
<input type="radio" name="gender3" value="YES" /><span class="ColorWhite">YES</span>
</div>
<div class="col-md-4">
<input type="radio" name="gender3" value="NO" /> <span class="ColorWhite">NO</span>
</div>
</div>

<div class="col-md-12">
	<h5>4-	If we provide Doctor's appointment status tracking online, will it be helpful?    </h5> 
<div class="col-md-4">
<input type="radio" name="gender4" value="YES" /> <span class="ColorWhite">YES</span>
</div>
<div class="col-md-4">
<input type="radio" name="gender4" value="NO" />  <span class="ColorWhite">NO</span>
</div>
</div>

<div class="col-md-12">
	<h5>5. Do you like to have all healthcare need on your phone in one application?</h5> 
<div class="col-md-4">	
<input type="radio" name="gender5" value="YES" /> <span class="ColorWhite">YES</span>
</div>
<div class="col-md-4">
<input type="radio" name="gender5" value="NO" />  <span class="ColorWhite">NO</span>
</div>
</div>

<div class="col-md-12">
	<h5>6.  Do you find difficulty in finding  doctor of your choice?</h5> 


<div class="col-md-4">
<input type="radio" name="gender6" value="YES" /> <span class="ColorWhite">YES</span>
</div>
<div class="col-md-4">
<input type="radio" name="gender6" value="NO" /> <span class="ColorWhite">NO</span>
</div>

</div>

<br>
 <center> <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#myModal" style="margin:19px 10px;">Submit</button>
  </cener><!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-body">
         </br></br></br>
         </br><center><h4 class="modal-title">Thanks For Submitting</h4></center>
        </div>
        
        <center><button type="button" class="btn btn-default" data-dismiss="modal" style="margin: 23px;">Welcome</button>
       </center>
      </div>
      
    </div>
  </div>
  




</form>
</td>
</table>

</body>

</html>