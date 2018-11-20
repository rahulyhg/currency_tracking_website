
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="panel panel-primary">
            			<div class="panel-heading" >
			              <h3 class="panel-title">View Currency Graph</h3>
			            </div>
			        </div>    
            		<div class="panel-body">
            			
              			<br>
              			<label>Select Currency 1</label>
              			<br>
					
						<?php echo form_open('User/graph');?>
              			<select name="select_graph_currency">
						  <?php foreach (array_slice($currency_col,1) as $currency_colz): ?>
              				<option value="<?php echo $currency_colz['Field'];?>" selected><?php echo $currency_colz['Field'];?></option>
						  <?php endforeach; ?>
						<?php if(empty($selected_currency)){$selected_currency='INR';}?>

						  <option  selected><?php echo $selected_currency; ?></option>
						  </select>
						  <br><br>
						  <label>Select Currency 2</label><br>
						  <select name="select_graph_currency2">
						  <?php foreach (array_slice($currency_col,1) as $currency_colz): ?>
              				<option value="<?php echo $currency_colz['Field'];?>" selected><?php echo $currency_colz['Field'];?></option>
              			
						  <?php endforeach; ?>
						<?php if(empty($selected_currency2)){$selected_currency2='EUR';}?>

						  <option  selected><?php echo $selected_currency2; ?></option>
						  </select>
              			<br>
              			<br>
						  <input type="submit" name="submit" >
						</form>				
            		</div>
				</div>    
				<div class="col-sm-8">
					<div id="chartdiv" style="width: 100%; height: 400px; background-color: #222222;" ></div>
				</div>
				
		    </div>
		</div>
		<footer>
			
		</footer>
		<script type="text/javascript" src="https://www.amcharts.com/lib/3/amcharts.js"></script>
		<script type="text/javascript" src="https://www.amcharts.com/lib/3/serial.js"></script>
		<script type="text/javascript" src="https://www.amcharts.com/lib/3/themes/black.js"></script>
		<script type="text/javascript">
			AmCharts.makeChart("chartdiv",
				{
					"type": "serial",
					"categoryField": "date",
					"dataDateFormat": "YYYY-MM-DD",
					"theme": "black",
					"categoryAxis": {
						"minPeriod": "DD",
						"parseDates": true
					},
					"chartCursor": {
						"enabled": true,
						"categoryBalloonDateFormat": "MMM DD, YYYY"
					},
					"chartScrollbar": {
						"enabled": true
					},
					"trendLines": [],
					"graphs": [
						{
							"bullet": "none",
							"id": "AmGraph-1",
							"title": "<?php echo $selected_currency; ?>",
							"valueField": "column-1"
						},
						{
							"bullet": "none",
							"id": "AmGraph-2",
							"title": "<?php echo $selected_currency2; ?>",
							"valueField": "column-2"
						}
						
					],
					"guides": [],
					"valueAxes": [
						{
							"id": "ValueAxis-1",
							"title": "Rate"
						}
					],
					"allLabels": [],
					"balloon": {},
					"legend": {
						"enabled": true,
						"useGraphSettings": true
					},
					"titles": [
						{
							"id": "Title-1",
							"size": 15,
							"text": "Currency Fluctuations vs USD"
						}
					],
					"dataProvider": [
						// {
						// 	"date": "2014-01-15",
						// 	"column-1": 65
						// },
						
						// {
						// 	"date": "2014-06-10",
						// 	"column-1": 68,
						//	"column-2" : 23
						// },
						
						<?php foreach ($graph_row as $graph_rowz): ?>
							<?php echo '{"date":"',$graph_rowz['Date'],'","column-1":',$graph_rowz[$selected_currency],',"column-2":',$graph_rowz[$selected_currency2],'},';?>

							
				
							
							
							
						<?php endforeach; ?>


					]
				}
			);
		</script>
		
		
		
						

