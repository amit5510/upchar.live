$(document).ready(function(){
    $(".state").change(function(){
			var stateid=this.value; 
			var uri="http://www.fddi.tk/centers/center/getdistrict";
			$.ajax({
			 type:"post", 
			 url: uri,
			 data:{stateid:stateid},
			 success: function(result){
				 $("#district").html(result);
			}

			});		
			
	});
});

$(document).ready(function(){
    $(".district").change(function(){
			var districtid=this.value; 
			var uri="http://www.fddi.tk/centers/center/getblock";
			$.ajax({
			 type:"post", 
			 url: uri,
			 data:{districtid:districtid},
			 success: function(result){
				 $("#block").html(result);
			}

			});		
			
	});
});

$(document).ready(function(){
    $(".block").change(function(){
			var blockid=this.value; 
			var uri="http://www.fddi.tk/centers/center/getvillage";
			$.ajax({
			 type:"post", 
			 url: uri,
			 data:{blockid:blockid},
			 success: function(result){
				 $("#village").html(result);
			}

			});		
			
	});
});

$(document).ready(function(){
    $(".dpr").change(function(){
			var dprid=this.value; 
			var uri="http://www.fddi.tk/centers/center/getcenter";
			$.ajax({
			 type:"post", 
			 url: uri,
			 data:{dprid:dprid},
			 success: function(result){
				 
				 $("#fddicenter").html(result);
			}

			});		
			
	});
});

$(document).ready(function(){
    $(".fddicenter").change(function(){
			var centerid=this.value; 
			var uri="http://www.fddi.tk/centers/center/getsubcenter";
			$.ajax({
			 type:"post", 
			 url: uri,
			 data:{centerid:centerid},
			 success: function(result){
				 $("#fddi_subcenter").html(result);
			}

			});		
			
	});
});

$(document).ready(function(){
    $(".fddicenter").change(function(){
			var centerid=this.value; 
			var uri="http://www.fddi.tk/centers/center/getfaculty";
			$.ajax({
			 type:"post", 
			 url: uri,
			 data:{centerid:centerid},
			 success: function(result){
				// console.log(result);
				$("#faculty").html(result);
			}

			});		
			
	});
});

$(document).ready(function(){
    $(".fddi_subcenter").change(function(){
			var subcenterid=this.value; 
			var uri="http://www.fddi.tk/centers/center/getcourse";
			$.ajax({
			 type:"post", 
			 url: uri,
			 data:{subcenterid:subcenterid},
			 success: function(result){
				 //console.log(result);
				 $("#coursemenu").html(result);
			}

			});		
			
	});
});

$(document).ready(function(){
    $(".coursemenu").change(function(){
			var courseid=this.value; 
			var subid=$('option:selected', this).attr('data-uid');
			var uri="http://www.fddi.tk/centers/center/getbatch";
			$.ajax({
			 type:"post", 
			 url: uri,
			 data:{courseid:courseid,subid:subid},
			 success: function(result){
				 $(".fddi_batch").html(result);
			}

			});		
			
	});
});

$(document).ready(function(){
    $(".fddi_batch").change(function(){
			var batchid=this.value; 
			var uri="http://www.fddi.tk/centers/center/gettrainee";
			$.ajax({
			 type:"post", 
			 url: uri,
			 data:{batchid:batchid},
			 success: function(result){
				 //console.log(result);
				 $("#traineemenu").html(result);
			}

			});		
			
	});
});
