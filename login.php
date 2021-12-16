<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: cart_view.php');
  }
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page skin-blue layout-top-nav">

<div class="login-box">
  	<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p>  
          </div>
        ";
        unset($_SESSION['error']);
      }
      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
  	<div class="login-box-body">
    	<p class="login-box-msg">Sign in to start your session</p>

    	<form action="verify.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="email" class="form-control" name="email" placeholder="Email" required>
        		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" id="login_password" name="password" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <span class="input-group-btn" id="eyeSlash">
              <button class="btn btn-secondary reveal " onclick="visibility3()" type="button"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>
            </span>
            <span class="input-group-btn" id="eyeShow" style="display: none;">
              <button class="btn btn-secondary reveal " onclick="visibility3()" type="button"><i class="fa fa-eye" aria-hidden="true"></i></button>
            </span>
          </div>
          <script>
                                                                                                                    function visibility3() {
                                                                                                                        var x = document.getElementById('login_password');
                                                                                                                        if (x.type === 'password') {
                                                                                                                          x.type = "text";
                                                                                                                          $('#eyeShow').show();
                                                                                                                          $('#eyeSlash').hide();
                                                                                                                        }else {
                                                                                                                          x.type = "password";
                                                                                                                          $('#eyeShow').hide();
                                                                                                                          $('#eyeSlash').show();
                                                                                                                        }
                                                                                                                      }
                                                                                                                    </script>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
        		</div>
      		</div>
    	</form>
      <br>
      <a href="password_forgot.php">I forgot my password</a><br>
      <a href="signup.php" class="text-center">Register a new membership</a><br>
      <a href="index.php"><i class="fa fa-home"></i> Home</a>
  	</div>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>