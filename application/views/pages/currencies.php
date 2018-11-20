

		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="panel panel-primary">
            			<div class="panel-heading" >
			              <h3 class="panel-title">View Currency Rates</h3>
			            </div>
			        </div>    
            		<div class="panel-body">
									<?php echo form_open('User/currencies'); ?>
            			<label for="Dates">Date<?php 
              				if(isset($_POST['submit'])){
              					echo " ",$_POST['selected_date'];
              				}else{
              					echo " ";
              					echo(date('Y-m-d'));
              				}
              			?></label>
            			<br>
              			<input type="date" name="selected_date" class="fom-control" value="">

              			<br>
              			
              			<br>

										<input type="submit" name="submit" placeholder="Go">
										</form>
              			<br>
              			<br>
              			
            		</div>
				</div>    
				<div class="col-sm-4">
					<div class="table-responsive">
					  <table class="table">
					    <tr>
					    	<th>Rate</th>
						</tr>
							<?php foreach(array_slice($selected_rate,1) as $selected) : ?>
						<tr>
					    	<td><?php echo $selected; ?></td>
					    </tr>
						<?php endforeach; ?>				  
					  </table>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="table-responsive">
					  <table class="table">
					    <tr>
					    	<th>Currency</th>
						</tr>							
							<?php foreach (array_slice($currency_col,1) as $currency_colz): ?>
					    <tr>
					    	<td><?php echo $currency_colz['Field'];?></td>
					    </tr>
						<?php endforeach; ?>				  
					  </table>
					</div>
				</div>
				
		    </div>
		</div>
		

