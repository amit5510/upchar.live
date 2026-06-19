<style>
 #temp {
    float: left;
    height: 350px;
    width: 100%;
}
#temp > .front {
    background: #224152;
    height: 350px;
    width: 92%;
    color: white;
    text-align: center;
    position: absolute;
    backface-visibility: hidden;
    transform: perspective(600px) rotateY(0deg);
    transition: all 1s ease;
    padding: 20px;
    border-radius: 23px;
    box-shadow: 0px -6px 5px -1px #1c3441;
}

#temp > .back {
    background: #224152;
    height: 350px;
    width: 92%;
    color: white;
    position: absolute;
    text-align: center;
    backface-visibility: hidden;
    transform: perspective(600px) rotateY(180deg);
    transition: all 1s ease;
    padding: 47px;
    border-radius: 23px;
}

		#temp:hover > .front{transform:perspective(600px) rotateY(-180deg);}
	#temp:hover > .back{transform:perspective(600px) rotateY(0deg);}

.backpage {
    position: fixed;
    bottom: 63px;
    left: 18px;
}

.backpagebtn {
    background: #109e14;
    color: #ffffff;
    padding: 10px 22px;
    margin: 4px;
    border-radius: 23px;
    font-weight: bold;
}
.backpagebtn:hover{
    background:green;
    color:white;
}
.add_list li {
    list-style: none;
    margin: 13px;
    font-size: 17px;
}
</style>
<?php include ("assets/includes/header.php"); ?>
<?php include ("assets/includes/leftmenu.php"); ?>
        <div class="pag_cstm">
         
          <div class="row">
		   <div class="col-lg-12">
              <div class="pag_cstm_panel">
                <div class="pag_cstm_panel_panel_ontent p-t-0">
                  <div class="row paddb40">
                
				
				
					      
    <div class="col-sm-4"  style="margin-bottom:12px">
          <div class="col-sm-12" id="temp">
              
        
	<div class="front">
	     <img src="https://www.upchar.shop/images/logo.png" class="img-circle" alt="upchar Hospital" style="height: 159px;">
	    <h3>St. Stiphan</h3>
        <p>MBBS</p>
        <p>2 years experience</p>
        <p>Physician</p>
	</div>
	
		<div class="back">
		    
		    <ul class="add_list">
                                <li><i class="fa fa-thumbs-o-up"></i>
                                    <span><b>93%</b> (15 votes)</span></li>
                                <li><i class="fa fa-map-marker"></i>
                                    <span>Rahpura jageer</span></li>
                                <li><i class="fa fa-money"></i>
                                    <span>1</span> Paid</li>
                                <li><i class="fa fa-clock-o"></i>
                                    <span>Available Today</span></li>
                            </ul>
                            
             
             <div class="backpage text-center">
             <a href="#" class="backpagebtn">Join Hopital </a>
            <a href="#" class="backpagebtn">View Hopital </a>
             </div>               
		</div>
    </div>
 </div>
    


					      
    <div class="col-sm-4"  style="margin-bottom:12px">
          <div class="col-sm-12" id="temp">
              
        
	<div class="front">
	     <img src="https://www.upchar.shop/images/logo.png" class="img-circle" alt="upchar Hospital" style="height: 159px;">
	    <h3>St. Stiphan</h3>
        <p>MBBS</p>
        <p>2 years experience</p>
        <p>Physician</p>
	</div>
	
		<div class="back">
		    
		    <ul class="add_list">
                                <li><i class="fa fa-thumbs-o-up"></i>
                                    <span><b>93%</b> (15 votes)</span></li>
                                <li><i class="fa fa-map-marker"></i>
                                    <span>Rahpura jageer</span></li>
                                <li><i class="fa fa-money"></i>
                                    <span>1</span> Paid</li>
                                <li><i class="fa fa-clock-o"></i>
                                    <span>Available Today</span></li>
                            </ul>
                            
             
             <div class="backpage text-center">
             <a href="#" class="backpagebtn">Join Hopital </a>
            <a href="#" class="backpagebtn">View Hopital </a>
             </div>               
		</div>
    </div>
 </div>
    
    					      
    <div class="col-sm-4" style="margin-bottom:12px">
          <div class="col-sm-12" id="temp">
              
        
	<div class="front">
	     <img src="https://www.upchar.shop/images/logo.png" class="img-circle" alt="upchar Hospital" style="height: 159px;">
	    <h3>St. Stiphan</h3>
        <p>MBBS</p>
        <p>2 years experience</p>
        <p>Physician</p>
	</div>
	
		<div class="back">
		    
		    <ul class="add_list">
                                <li><i class="fa fa-thumbs-o-up"></i>
                                    <span><b>93%</b> (15 votes)</span></li>
                                <li><i class="fa fa-map-marker"></i>
                                    <span>Rahpura jageer</span></li>
                                <li><i class="fa fa-money"></i>
                                    <span>1</span> Paid</li>
                                <li><i class="fa fa-clock-o"></i>
                                    <span>Available Today</span></li>
                            </ul>
                            
             
             <div class="backpage text-center">
             <a href="#" class="backpagebtn">Join Hopital </a>
            <a href="#" class="backpagebtn">View Hopital </a>
             </div>               
		</div>
    </div>
 </div>
    

					

            
            
		      
                                
                           

                        </div>  
						 </div>  
				   </div>
                </div>
              </div>
            </div>
        
         
          			<?php include ("assets/includes/footer.php"); ?>
