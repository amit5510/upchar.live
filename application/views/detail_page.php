<head>
     <link rel="icon" href="images/logo.png" type="images/logo.png" sizes="32x32">
</head>
<!-- Mirrored from eyecix.com/html/careplus/team-list.html by --->
<?php include ("includes/header_new.php"); ?>

    <style type="text/css">


input {
  display: none;
}
.add_list1 li i {
    /* padding-right: 7px; */
    color: #fff;
    background: #9bc03c;
    border-radius: 6px;
    font-size: 10px;
    padding: 6px;
}
.hosp_name ul li {
    display: inline-block;
    width: 58px;
    margin-right: 8px;
    margin-top: 10px;
    transition: 0.3s;
}
label {
  display: inline-block;
  margin: 0 0 -1px;
  padding: 15px 25px;
  font-weight: 600;
  text-align: center;
  color: #bbb;
  border: 1px solid transparent;
}
.comntName {
    background: #9bc03c;
    color: white;
    padding: 7px 8px;
    border-radius: 23px;
}
label:before {
  font-family: fontawesome;
  font-weight: normal;
  margin-right: 10px;
}
.add_list li {
    list-style: none;
    text-align: center;
    border-radius: 14px;
    transition: 0.3s;
    background: none;
}
.BookApp {
    background: black;
    color: white;
    font-weight: bold;
    text-align: center;
    border: none;
    width: 100%;
    transition:0.3s;
    margin-top: 27px;    
}
..BookApp:hover{
   background: #ffffff;
}
#doctor_list {
    margin-top: 0px;
}
.doc_nam ul {
    margin-top: 27px;
}
.add_list li i {
    color:#9abf3c;
    font-size: 22px;
}


label[for*='1']:before { content: '\f1cb'; }
label[for*='2']:before { content: '\f17d'; }
label[for*='3']:before { content: '\f16b'; }
label[for*='4']:before { content: '\f1a9'; }

label:hover {
  color: #888;
  cursor: pointer;
}
#searchBTN {
    width: 100%;
    padding: 12px;
    border: none;
    background-color: #9bc03c;
    color: white;
    margin-top: 5px;
    font-size: 16px;
    border-radius: 2px 2px 18px 0px;
}
input:checked + label {
    color: #fff;
    background: #9abf3c;
    border-radius: 6px;
    box-shadow: 0px -2px 5px #757474;
    border: none;
    padding:6px 11px;
}
#tab1:checked ~ #content1,
#tab2:checked ~ #content2,
#tab3:checked ~ #content3,
#tab4:checked ~ #content4 {
  display: block;
}

@media screen and (max-width: 650px) {
  label {
    font-size: 0;
  }
  label:before {
    margin: 0;
    font-size: 18px;
  }
}

@media screen and (max-width: 400px) {
  label {
    padding: 15px;
  }
}

#content2
{display: none;}
#content3
{display: none;}
#content4
{display: none;}
#content1
{display: none;}


.box_sh_bg1 {
    background: white;
    border-radius:0px 25px 0px;
}

.hosp_name span {
    color: #08364b;
    font-size: 16px;
    font-weight: 600;
    font-family: 'Lato', sans-serif;
}
.docimg {
    height: 148px;
    border-radius: 105px;
    overflow: hidden;
}
    </style>
 
<form action='<?=base_url();?>search' method='GET'>
  <div class="box-form">
    <div class="col-sm-3">
      <div class="input-group shadow">
        <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
        <input type="text" class="form-control ui-autocomplete-input" name="location" placeholder="Location" id="hintcity" autocomplete="off">
        <input type="hidden" class="form-control" name="city" id="city">
      </div>
    </div>
    <div class="col-sm-5">
      <div class="input-group shadow">
        <span class="input-group-addon"><i class="fa fa-search"></i></span>
        <input type="text" id="hint" class="form-control ui-autocomplete-input" name="keyword" placeholder="Search Hospitals/Doctors/Clinics etc" autocomplete="off">
      </div> 
    </div>
    <div class="col-sm-3">
      <div class="input-group shadow">
        <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
        <select class="form-control" name="spl">
          <option value="">-Specialization-</option>
          <?php foreach($specialization as $s){ ?>
          <option value='<?=$s->id;?>'><?=$s->name;?></option>
          <?php } ?>                
        </select>
      </div> 
    </div>
    <div class="col-sm-1">
      <button class="careplus-booking-btn careplus-bgcolor-two" id="searchBTN"><i class="fa fa-search" aria-hidden="true"></i></button>
    </div>
    <div class="clearfix"></div>
  </div>
</form>

<div class="careplus-banner">
  <div class="container-fluid">
    <div class="row"></div>
    <div class="clearfix"></div>  
  </div>  
</div>
<div class="careplus-breadcrumb">
  <div class="container">
    <div class="row"> </div>
  </div>
</div>
</div>
<section id="doctor_list">
  <div class="container">
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8 box_sh_bg1">
        <div class="col-sm-3 paddl0"><img class="docimg" src="<?=admin_url();?>public/assets/upload/<?=$d->drimage;?>" alt="<?=$d->fname.' '.$d->lname;?>"> </div>
        <div class="col-sm-6 paddl0">
          <div class="doc_nam1">
            <span><i class="fa fa-user-md" aria-hidden="true"></i><?=$d->fname.' '.$d->lname;?></span>
            <ul>
              <li><?php $quastring='';										$qu=$this->db->get_where('dr_qualifications',array('user_id'=>$d->id));										foreach(@$qu->result() as $q)											$quastring.=getQualificationName($q->qualification_id).', ';										echo $quastring=rtrim($quastring,', ');										  ?>
              </li>
              <li><?php $splstring=''; $sp=$this->db->get_where('dr_specialization',array('user_id'=>$d->id))->result();										foreach($sp as $s)											$splstring.=getSpecilizationName($s->specialization_id).', ';										echo $splstring=rtrim($splstring,', ');										 ?>,										<?=$d->exp;?> Years Experience
              </li>
            </ul>
          </div>                               
          <ul class="add_list1">
            <li><h6><i class="fa fa-check" aria-hidden="true"></i> Medical Registration Verified</h6></li>
            <li><h6><i class="fa fa-check" aria-hidden="true"></i> <b> 100 %</b>(11 votes)</h6></li>
          </ul>
          <p class="doc_nam2"><?=$d->about;?></p>
          <ul class="star">
            <li><b>Reviews</b></li><br>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
          </ul>  
        </div>
        <div class="col-md-3">
          <p class="text-center" style="color:#295771;font-weight:bold;"><i class="fa fa-clock-o" style="font-size:32px;padding: 16px;color: #9abf3c;"></i><br> 30 mins or less wait time assured</p>
          <a href="#" class="btn BookApp getappointment" data-upchar-did='<?=$d->id;?>' data-toggle="modal" data-target="#myModal">Book Appointment</a>
        </div>
        <div class="row">
          <div class="col-md-9">
            <input id="tab1" type="radio" name="tabs" checked>
            <label for="tab1">Info</label>
            <input id="tab2" type="radio" name="tabs">
            <label for="tab2">Feedback</label>
            <input id="tab3" type="radio" name="tabs">
            <label for="tab3">Consult Q&A</label>
            <input id="tab4" type="radio" name="tabs">
            <label for="tab4">Healthfeed</label>
            <section id="content1">
							<?php $practdata=$this->db->get_where('dr_practice',array('user_id'=>$d->id,'status'=>'1'));							$practcount=$practdata->num_rows(); 							$practs=$practdata->result();				foreach($practs as $pract){														if($pract->type=='C')								$institution_table='clinic';							else if($pract->type=='H')								$institution_table='hospital';														$institutiondata=$this->db->get_where($institution_table, array('id'=>$pract->institution_id,'status'=>'1'));							$institutioncount=$institutiondata->num_rows();							$institution=$institutiondata->row();														?>
              <div class="">
                <div class="col-sm-12 doc_nam">
                  <div class="hosp_name">  
                    <h5 style="text-transform:uppercase;font-size:15px;"><i class="fa fa-hospital-o" aria-hidden="true"></i> <a href="#"><?=$institution->name;?></a></h5> 
                    <h6 style="text-transform:capitalize;font-size:15px;"><i class="fa fa-map-marker" aria-hidden="true"></i> <?=$institution->address;?></h6>                          
                  </div>
                </div>
              </div>				<?php } ?>
            </section>
            <section class="col-md-12" id="content2">
              <div class="col-md-12">
                <span style="font-weight:bold;"><i class="fa fa-user comntName" aria-hidden="true">
                  </i> Danish Aktar</span>
                  <p>Your Treatment is good </p>    
              </div>
            </section>
            <section class="col-md-12" id="content3">  <p>Hello</p>    </section>
            <section class="col-md-12" id="content4">  <p>Hello</p> </section>
          </div>
          <div class="col-md-3">
            <ul class="add_list">
              <li><span style="color: #9abf3c;"><i class="fa fa-calendar-check-o" aria-hidden="true"></i><br>Mon - Sat</span></li>
              <li><span style="color: #9abf3c;"><i class="fa fa-clock-o" aria-hidden="true"></i><br> 10:00 AM - 2:00 PM</span></li>
              <li><span style="color: #9abf3c;"><i class="fa fa-money"></i><br>
              <?=$pract->fee;?></span></li>
            </ul> 
          </div>    
        </div>
      </div>    
      <div class="col-sm-2"></div>  
    </div>
  </div>
</section>

<?php include ('includes/footer.php'); ?>