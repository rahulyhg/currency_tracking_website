<title>Login Home</title>
<div class="container">
		<div class="row">
			
			<div class="col-sm-8">
				  
				 <div id="myCarousel" class="carousel slide" " data-ride="carousel">
				    <!-- Indicators -->
				    <ol class="carousel-indicators">
				      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				      <li data-target="#myCarousel" data-slide-to="1"></li>
				      <li data-target="#myCarousel" data-slide-to="2"></li>
				    </ol>

				    <!-- Wrapper for slides -->
				    <div class="carousel-inner">
				      <div class="item active">
				        <img src="/team4/assets/images/home1.jpg" alt="Los Angeles" style="width:100%;">
				      </div>

				      <div class="item">
				        <img src="/team4/assets/images/home2.jpg" alt="Chicago" style="width:100%;">
				      </div>
				    
				      <div class="item">
				        <img src="/team4/assets/images/home3.jpg" alt="New york" style="width:100%;">
				      </div>
				    </div>

				    <!-- Left and right controls -->
				    
				 </div>
			</div>
			<div class="col-sm-4">
				<div class="">
				
					<h3><i class="fa fa-shield"></i> Register now</h3>
						<hr>
					<?php  
					
					echo form_open('User/register'); ?>	
					<div class="form-group">
						
					  <label class="control-label" for="">Username</label>
					  <?php echo form_error('usernamereg'); ?>
					  <input type="text" class="form-control" placeholder="Username" name="usernamereg">
					</div>	
					<div class="form-group">
						
					  <label class="control-label" for="">Email Address</label><?php echo form_error('emailreg'); ?>
					  <input type="text" class="form-control" placeholder="Email Address" name="emailreg">
					</div>

					<div class="form-group">
						
					  <label class="control-label" for="">Password</label><?php echo form_error('passwordreg'); ?>
					  <input type="password" class="form-control" placeholder="Password" name="passwordreg">
					</div>

					<div class="form-group">
						
					  <label class="control-label" for="">Repeat Password</label><?php echo form_error('password_confirm'); ?>
					  <input type="password" class="form-control" placeholder="Repeat Password" name="password_confirm">
					</div>

				
				</div>
		      
					 
				<div style="height:10px;"></div>
				<div class="form-group">
				  <label class="control-label" for=""></label>
				  <input type="submit" name="submit" value="Sign Up" class="btn-default">
				</div>	 
				</form>
			</div>
				
		</div>
</div>