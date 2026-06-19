var base_url ='https://psdp.fddiindia.com/';
var base_url ='http://localhost/fddi/';
$(document).ready(function(){
    $(".state").change(function(){
			var stateid=this.value; 
			var uri=base_url+"others/other/getdistrict";
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
			var uri=base_url+"others/other/getblock";
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
			var uri=base_url+"others/other/getvillage";
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
    $(".coursemenu").change(function(){
			var courseid=this.value; 
			var dpr=$(".dpr").val(); 
			var subcenterid=$('option:selected', this).attr('data-uid');
			var uri=base_url+"others/other/getagency";
			$.ajax({
			 type:"post", 
			 url: uri,
			 data:{courseid:courseid,subcenterid:subcenterid,dpr:dpr},
			 success: function(result){
				 $("#agency").html(result);
				 autochange("#agency");
			}

			});		
			
	});
});
$(document).ready(function(){
    $(".dpr").change(function(){
			var dprid=this.value; 
			var uri=base_url+"others/other/getassessagency";
			$.ajax({
			 type:"post", 
			 url: uri,
			 data:{dprid:dprid},
			 success: function(result){
			     //console.log(result);
				 $("#assessagency").html(result);
				 autochange("#assessagency");
			}

			});		
			
	});
});

$(document).ready(function(){
    $(".dpr").change(function(){
			var dprid=this.value; 
			var uri=base_url+"others/other/getcenter";
			$.ajax({
			 type:"post", 
			 url: uri,
			 data:{dprid:dprid},
			 success: function(result){
				 //console.log(result);
				 $("#fddicenter").html(result);
				 autochange("#fddicenter");
			}

			});		
			
	});
});
//modified obn 7th july by azad, added dpr in request
$(document).ready(function(){
    $(".fddicenter").change(function(){
			var centerid=this.value; 
			var dpr=$(".dpr").val(); 
			var uri=base_url+"others/other/getsubcenter";
			$.ajax({
			 type:"post", 
			 url: uri,
			 data:{centerid:centerid,dpr:dpr},
			 success: function(result){
				 $("#fddi_subcenter").html(result);
				 autochange("#fddi_subcenter");
			}

			});		
			
	});
});
//modified added dpr
$(document).ready(function(){
    $(".coursemenu").change(function(){
			var courseid=this.value; 
			var dpr=$(".dpr").val(); 
			var subcenterid=$('option:selected', this).attr('data-uid');
			var uri=base_url+"others/other/getfaculty";
			$.ajax({
			 type:"post", 
			 url: uri,
			 data:{courseid:courseid,subcenterid:subcenterid,dpr:dpr},
			 success: function(result){
				// console.log(result);
				$("#faculty").html(result);
				autochange("#faculty");
			}

			});		
			
	});
});

$(document).ready(function(){
    $(".faculty ").change(function(){
		var sdate = $('#sdate').val();
		var edate = $('#enddatepicker').val();
		
		if(sdate!='' && edate!='' ){
			var facultyid=this.value; 
			var facultyname=$('option:selected', this).attr('data-fac');
			var uri=base_url+"others/other/checkfaculty";
			$.ajax({
			 type:"post", 
			 url: uri,
			 data:{facultyid:facultyid,facultyname:facultyname,sdate:sdate,edate:edate},
			 success: function(result){
			    if(result!='N')
			    {
			         alert(result);
					 this.value='';
			    }
			}

			});		
		}else{
			alert('Please Enter batch Start & End Date!');
			this.value='';
		}	
	});
});
//modified added dpr
$(document).ready(function(){
    $(".agency").change(function(){
			var agencyid=this.value; 
			var dpr=$(".dpr").val(); 
			
			var courseid=$('option:selected', this).attr('data-course');
			var uri=base_url+"others/other/getassessee";
			$.ajax({
			 type:"post", 
			 url: uri,
			 data:{agencyid:agencyid,courseid:courseid,dpr:dpr},
			 success: function(result){
				// console.log(result);
				$("#assessee").html(result);
				autochange("#assessee");
			}

			});		
			
	});
});

$(document).ready(function(){
    $(".fddi_subcenter").change(function(){
			var subcenterid=this.value; 
			var dpr=$('#dpr').val();
			var uri=base_url+"others/other/getcourse";
			$.ajax({
			 type:"post", 
			 url: uri,
			 data:{subcenterid:subcenterid,dpr:dpr},
			 success: function(result){
				 //console.log(result);
				 $("#coursemenu").html(result);
				 autochange("#coursemenu");
			}

			});		
			
	});
});

$(document).ready(function(){
    $(".coursemenu").change(function(){
			var courseid=this.value; 
			var dpr=$(".dpr").val(); 
			
			var subid=$('option:selected', this).attr('data-uid');
			var uri=base_url+"others/other/getbatch";
			$.ajax({
			 type:"post", 
			 url: uri,
			 data:{courseid:courseid,subid:subid,dpr:dpr},
			 success: function(result){
				 $(".fddi_batch").html(result);
				 autochange(".fddi_batch");
			}

			});		
			
	});
});

$(document).ready(function(){
    $(".coursemenu").change(function(){
			var courseid=$('#coursemenu').val(); 
			var subcenter=$('#fddi_subcenter').val(); 
			var dpr=$('#dpr').val(); 
			/* if(courseid=='' || subcenter=='' || dpr!=''){
				alert('Please ');
				exit();
			} */
			
			var uri=base_url+"others/other/gettrainee";
			$.ajax({
			 type:"post", 
			 url: uri,
			 data:{courseid:courseid,subcenter:subcenter,dpr:dpr},
			 success: function(result){
				 console.log(result);
				// $("#traineemenu").html(result);
				 $("#trainees").html(result);
				 $('.selectpicker').selectpicker('refresh');
			}

			});		
			
	});
});

$(document).ready(function(){
    $(".fddi_batch.manualattendance").change(function(){
			var courseid=$('#coursemenu').val(); 
			var subcenter=$('#fddi_subcenter').val(); 
			var dpr=$('#dpr').val(); 
			var batch=$('#fddi_batch').val(); 
			/* if(courseid=='' || subcenter=='' || dpr!=''){
				alert('Please ');
				exit();
			} */
			
			var uri=base_url+"others/other/getalltrainee";
			$.ajax({
			 type:"post", 
			 url: uri,
			 data:{courseid:courseid,subcenter:subcenter,dpr:dpr,batch:batch},
			 success: function(result){
				// console.log(result);
				 $("#traineemenu").html(result);
				// $("#trainees").html(result);
				 $('.selectpicker').selectpicker('refresh');
			}

			});		
			
	});
});

$(document).ready(function(){
    $(".fddi_batch.placment").change(function(){
			var courseid=$('#coursemenu').val(); 
			var subcenter=$('#fddi_subcenter').val(); 
			var dpr=$('#dpr').val(); 
			var batch=$('#fddi_batch').val(); 
			/* if(courseid=='' || subcenter=='' || dpr!=''){
				alert('Please ');
				exit();
			} */
			
			var uri=base_url+"others/other/getalltraineeplacment";
			$.ajax({
			 type:"post", 
			 url: uri,
			 data:{courseid:courseid,subcenter:subcenter,dpr:dpr,batch:batch},
			 success: function(result){
				// console.log(result);
				 $("#traineemenu").html(result);
				//$("#trainees").html(result);
				 $('.selectpicker').selectpicker('refresh');
			}

			});		
			
	});
});

$(document).ready(function(){
    $(".dpr").change(function(){
			var dprid=this.value; 
			var uri=base_url+"others/other/gettraineeallotment";
			$.ajax({
			 type:"post", 
			 url: uri,
			 data:{dprid:dprid},
			 success: function(result){
			     //console.log(result);
				 $("#traineeallotment").html(result);
				 $('#mydata').DataTable().draw();
				 //$('#mydata').DataTable().rows.add(result).draw();
						// refreshtable(result);
			}

			});		
			
	});
});

$(document).ready(function(){
    $(".state").change(function(){
			var stateid=this.value; 
			var uri=base_url+"others/other/getdistrict";
			$.ajax({
			 type:"post", 
			 url: uri,
			 data:{stateid:stateid},
			 success: function(result){
				 $("#districtlgd").html(result);
			}

			});		
			
	});
});

$(document).ready(function(){
    $("#districtlgd").change(function(){
			var districtid=this.value; 
			var uri=base_url+"others/other/getblock";
			$.ajax({
			 type:"post", 
			 url: uri,
			 data:{districtid:districtid},
			 success: function(result){
				 $("#blocklgd").html(result);
			}

			});		
			
	});
});

//users

$(document).ready(function(){
    $(".usersdpr").change(function(){
			var dprid=this.value; 
			var uri=base_url+"others/other/getcenter";
			$.ajax({
			 type:"post", 
			 url: uri,
			 data:{dprid:dprid},
			 success: function(result){
				// console.log(result);
				 $("#userscenter").html(result);
				 autochange("#userscenter");
			}
			});		
	});
});

$(document).ready(function(){
    $(".userscenter").change(function(){
			var centerid=this.value; 
			var dpr=$(".usersdpr").val();
			var uri=base_url+"others/other/getsubcenter";
			$.ajax({
			 type:"post", 
			 url: uri,
			 data:{centerid:centerid,dpr:dpr},
			 success: function(result){
				 $("#userssubcenter").html(result);
				 autochange("#userssubcenter");
			}

			});		
			
	});
});

//faculty
$(document).ready(function(){
    $(".facultydpr").change(function(){
			var dprid=this.value; 
			var uri=base_url+"others/other/getcenter";
			$.ajax({
			 type:"post", 
			 url: uri,
			 data:{dprid:dprid},
			 success: function(result){
				 $(".facultycenter").html(result);
				 autochange(".facultycenter");
			}
			});		
	});
});

$(document).ready(function(){
    $(".facultycenter").change(function(){
			var centerid=this.value; 
			var dpr=$(".facultydpr").val();
			var uri=base_url+"others/other/getsubcenter";
			$.ajax({
			 type:"post", 
			 url: uri,
			 data:{centerid:centerid,dpr:dpr},
			 success: function(result){
				 $(".facultysubcenter").html(result);
				 autochange(".facultysubcenter");
			}

			});		
			
	});
});

// get assesse agency 

$(document).ready(function(){
    $(".facultydpr").change(function(){
			var dprid=this.value; 
			var uri=base_url+"others/other/getassagency";
			$.ajax({
			 type:"post", 
			 url: uri,
			 data:{dprid:dprid},
			 success: function(result){
				 $(".assesseagency").html(result);
				 autochange(".assesseagency");
			}
			});		
	});
});

$(document).ready(function(){
    $(".fddicenter").change(function(){
			var centerid=this.value; 
			var dpr=$(".dpr").val();
			
			var uri=base_url+"others/other/getcompany";
			$.ajax({
			 type:"post", 
			 url: uri,
			 data:{centerid:centerid,dpr:dpr},
			 success: function(result){
				 $(".company").html(result);
				 autochange(".company");
			}

			});		
			
	});
});

function autochange(selector){
	var value = $(selector).val();
	if(value !='' && value != null)
		$(selector).change();
}