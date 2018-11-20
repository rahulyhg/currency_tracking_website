<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="/team4/assets/scripts/jquery.js"></script>
	    <script src="/team4/assets/scripts/bootstrap.min.js"></script>
	  	<link rel="stylesheet" type="text/css" href="/team4/assets/css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="/team4/assets/css/index.css" >
	    <link rel="stylesheet" type="text/css" href="/team4/assets/css/dashboard.css" >
	    <link href="/team4/assets/css/bootstrap-theme.min.css" rel="stylesheet">
	    <link rel="stylesheet" type="text/css" href="/team4/assets/css/vb.css" >
	    <link rel="shortcut icon" href="/team4/assets/images/favicon.ico" />
  	</head>
  	<body>
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  		<header>
	
		    <div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="logo">
							<img src="/team4/assets/images/logo.jpg" alt="Logo" width="170" height="50">
						</div>
					</div>
					<div class="col-sm-6 hidden-xs">
						<div class="row">
							<?php
							echo form_open('User/login'); ?>
							<input type="hidden" name="formlogin" value="login">
							<?php if (isset($error)) : ?>
							
							<?php echo("<script> alert('Wrong Username or Password');</script>"); 
							redirect('/'); ?>

					<?php endif; ?>
				</div>
							<div class="col-sm-5">
								  <div class="form-group">
								  	<?php echo form_error('username'); ?>
								    <input type="text" class="form-control" placeholder="Username" name="username">
								    <div class="login-bottom-text checkbox hidden-sm">
									    <!-- <label>
									      <input type="checkbox" id="">
									      Keep me signed in
									    </label> -->
									</div>
								  </div>
							</div>	
							<div class="col-sm-5">
								 <div class="form-group">
								 	<?php echo form_error('password'); ?>
								    <input type="password" class="form-control" placeholder="Password" name="password">
								    <!-- <div class="login-bottom-text hidden-sm"> Forgot your password?  </div> -->
								 </div>
							</div>
							<div class="col-sm-2">
								 <div class="form-group">
								    <input type="submit" name="submit" value="Login" class="btn btn-default btn-header-login">
								  </div>
							</div>
						</form>
						</div>	
					</div>
				</div>
			</div>
		</header>

		<nav class="navbar navbar-inverse" role="navigation">
		    <div class="container">
		          
		        <div class="navbar-header">
		            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			              <span class="sr-only">Toggle navigation</span>
			              <span class="icon-bar"></span>
			              <span class="icon-bar"></span>
			              <span class="icon-bar"></span>
		            </button>
		            <a class="navbar-brand visible-xs-inline-block nav-logo" href="/"></a>
		        </div>

		          
		        <div class="collapse navbar-collapse navbar-ex1-collapse">
		            <ul class="nav navbar-nav js-nav-add-active-class">
		              <li><a href="<?php echo base_url(); ?>">Home</a></li>	
		              <li><a href="<?php  echo base_url(); ?>" onclick="return alert_user(this);">Categories</a></li>
		              <li><a href="<?php echo base_url(); ?>" onclick="return alert_user(this);">Currencies</a></li>
		              <li><a href="<?php echo base_url(); ?>" onclick="return alert_user(this);">Graphs</a></li>
		              <li><a href="<?php echo base_url(); ?>" onclick="return alert_user(this);">Converter</a></li>
		              
		            </ul>  
		        </div>
		    </div>
		</nav>
		<script type="text/javascript">
			function alert_user(node){
				return alert("Please login first");
			}
		</script>
