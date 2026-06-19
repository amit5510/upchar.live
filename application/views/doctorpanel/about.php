<?php include ("assets/includes/header.php"); ?>
<?php include ("assets/includes/leftmenu.php"); ?>
    <div class="pag_cstm">
        <div class="row">
            <div class="col-lg-12">
                <div class="pag_cstm_panel">
                    <div class="pag_cstm_panel_panel_ontent p-t-0">
                        <div class="row paddb40">
                        	<h4 class="PageTitle">Dr. <?=$this->session->userdata('drusername');?></h4>
                            <form action='' method='post' >
                                <div class="col-sm-12 processsstep3">
                                    <p> Please Write Something About Yourself.</p>
                                </div>
                                <div class="col-sm-12 bggrya" style="background:none;"> 
                                    <div class="col-sm-5">
                                        <h4 style="color:white;">Short Detail's of Doctor ( max 350 charaector )</h4>
			                            <textarea rows="8" cols="50" style="color:black" maxlength='350' name='short_about' ><?=$data->short_about;?></textarea>
                                    </div>
                                    <div class="col-sm-7">
                                        <h4 style="color:white;">Detailed Summary</h4>
                                        <textarea rows="4"cols="50" name="about" id='txtEditor'><?=$data->about;?></textarea>
                                    </div> 
                                </div>                           
                                <p>Please write something about yourself, It will be visible to all the user of the website and application under your profile .<br/></p>
                                <div class="col-sm-8 click_step2 mrt30 padding0">
                                    <a class="backiocn" href="<?=base_url();?>profile_step3"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>Back</a>
                                </div>
                                <div class="col-sm-4 click_step2 mrt20 padding0">
                                    <button class="continue2"  name='submit' type='submit'>Continue</button>
                                </div>
                            <form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include ("assets/includes/footer.php"); ?>
<link href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
		<script type="text/javascript">
		
$(document).ready( function() {
	$('#txtEditor').summernote({
                  // set editor height
  minHeight: null,             // set minimum height of editor
  maxHeight: null,             // set maximum height of editor
  focus: true                  // set focus to editable area after initializing summernote
});                 
	                 
});
</script>