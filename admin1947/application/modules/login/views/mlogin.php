<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Upchar | Log in</title>
  
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
      <center>Upchar Admin</center>
    <!--<a href="#"><b style="font-weight: 600!important;font-size: 26px!important;">Master Admin</b></a>-->
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
	<?=$this->session->flashdata('flashmsg');?>
    <form action="<?=base_url()?>login/login/login" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="name" placeholder="Username" required="true">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password" required="true">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    
    <!-- /.social-auth-links -->
	<br>
    <a href="#" class='hide'>I forgot my password</a><br>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

</body>
</html>
