<?php include ("assets/includes/header.php"); ?>
    <?php include ("assets/includes/leftmenu.php"); ?>
        <div class="pag_cstm">

            <div class="row">
                <div class="col-lg-12">
                    <div class="pag_cstm_panel">
                        <div class="pag_cstm_panel_panel_ontent p-t-0">
                            <div class="row paddb40">
                            <form action='' method='post' >
                                <div class="col-sm-12 processsstep3">
                                    <h4 style="
    background: #043d5b;
    color: white;
    padding: 20px;border-radius: 0px 15px;
">About Yourself</h4>
                                    <p style="background: #ed3237;color: white;padding: 5px 22px;width: 321px;box-shadow: 0px -2px 5px 0px #8a8282;text-transform: capitalize;text-shadow: 0px -2px 6px #a96363;font-weight: bold;font-size: 21px;">Dr. <?=$this->session->userdata('drusername');?></p>
                                </div>

                                <div class="col-sm-11 id_proof">

                                    <div class="col-sm-12 bggrya" style="background:#043d5b;"> 
			<h4 style="color:white;">Short Summary(max:150char):</h4>
			<textarea rows="4" style="width:100%; color:black;" cols="150" maxlength='100' name='short_about' ><?=$data->short_about;?></textarea>
            <h4 style="color:white;">Detailed Summary</h4>
           <textarea rows="4" cols="40" name="about" id='txtEditor'><?=$data->about;?></textarea>

                                    </div>
<p>Please write something about yourself, It will be visible to all the user of the website and application under your profile .<br/></p>

                                   
                                  <div class="col-sm-8 click_step2 mrt30 padding0">
                                        <a class="backiocn" href="<?=base_url();?>profile_step3"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>Back</a>
                                    </div>
                                    <div class="col-sm-4 click_step2 mrt20 padding0">
                                        
                                            <button class="continue2"  name='submit' type='submit'>Continue</button>
                                        

                                    </div>

                                </div>

                                

                                    </div>
                                </div>
                                <form>
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
  height: 500,                 // set editor height
  minHeight: null,             // set minimum height of editor
  maxHeight: null,             // set maximum height of editor
  focus: true                  // set focus to editable area after initializing summernote
});                 
	                 
});
</script>