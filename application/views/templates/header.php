
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
                    <div class="col-sm-6" style="color:white; text-align:right; font-size: 16px;">
                    Welcome,&nbsp;
                    <?php echo $_SESSION['username']; ?>
                    <br>
                        <a href="<?php echo base_url(); 

                        if($_SESSION['is_admin']==1){
                            echo 'User/currency';
                        }
                        else{
                            echo '';
                        }?>
                        " style="text-decoration:underline; color: white;"><?php if($_SESSION['is_admin']==1){
                            echo '[ Dashboard ]';
                        }
                        else{
                            echo '';
                        } ?></a>
                        &nbsp;
                        <a href="<?= base_url('logout') ?>" style="text-decoration:underline; color: white;">[ Logout ]</a>
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
		              <li><a href="<?php echo base_url(); ?>pages/homepage">Home</a></li>	
		              <li><a href="<?php echo base_url(); ?>Categories/view">Categories</a></li>
		              <li><a href="<?php echo base_url(); ?>User/currencies">Currencies</a></li>
		              <li><a href="<?php echo base_url(); ?>User/graph">Graphs</a></li>
		              <li><a href="<?php echo base_url(); ?>Converter/view">Converter</a></li>
		              
		            </ul>  
		        </div>
		    </div>
		</nav>
