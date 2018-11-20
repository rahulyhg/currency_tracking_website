<div class="container">
			<div class="row">
				<div class="col-sm-5">
					<div class="panel panel-primary">
            			<div class="panel-heading" >
			              <h3 class="panel-title">Configure Currency 1</h3>
			            </div>
			        </div>    
            		<div class="panel-body">
            			<form name="converter_form" method="post">
              			<label>Select Input Currency:&nbsp;&nbsp;</label>
                    <br>
                        <select name="input_currency">
                          <?php foreach (array_slice($currency_col,1) as $currency_colz):{ ?>
                          <option value="<?php echo $currency_colz['Field'];?>"><?php echo $currency_colz['Field'];?>
                          </option>
                        <?php }endforeach; ?>
                        <option selected value="<?php echo $input_currency; ?>"><?php echo $input_currency; ?></option>
                      </select>&nbsp;&nbsp;<br><br>
                      <label for="currencies">Enter amount to convert:</label><br>
                    <input type="number" class="fom-control" name="input_amount" value="<?php echo $input_amount; ?>">
                    <br>
              			<br>
              			<br>
            		</div>
				</div> 
				<div class="col-sm-2">
					<input type="submit" name="submit" value="Convert">
				</div>   
				<div class="col-sm-5">
					<div class="panel panel-primary">
            			<div class="panel-heading" >
			              <h3 class="panel-title">Configure Currency 2</h3>
			            </div>
			        </div>    
            		<div class="panel-body">
            			<label>Select Output Currency:&nbsp;&nbsp;</label>
                    <br>
                        <select name="output_currency">
                          <?php foreach (array_slice($currency_col,1) as $currency_colz):{ ?>
                          <option value="<?php echo $currency_colz['Field'];?>"><?php echo $currency_colz['Field'];?>
                          </option>
                        <?php }endforeach; ?>
                        <option selected value="<?php echo $output_currency; ?>"><?php echo $output_currency; ?></option>
                      </select>&nbsp;&nbsp;<br><br>
                      <label for="currencies">Output:</label><br>
                      <input type="number" class="fom-control" name="output" value="<?php echo $converter_data; ?>">  
                    </form>
              			<br>
              			<br>
            		</div>
				</div>
				
		    </div>
		</div>