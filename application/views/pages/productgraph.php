<h4><?php echo $_POST['itemname']; ?>&nbsp;Price History Graph</h4>
<?php $avgtotal = 0;
			foreach ($graph_row as $graph_rows):
			$total= floatval($_POST['productcost']) * floatval($graph_rows[$_POST['selected_currency']]);
			$avgtotal = floatval($avgtotal) + floatval($total);
			endforeach;
			$avg = floatval($avgtotal) / floatval($rowcount['COUNT(*)']);
			
			if($avg>$_POST['convertedproductcost']){
				echo '<div style="color: red; font-weight: bold;">This product is now selling at a LOWER PRICE than AVERAGE PRICE <br> TIP: BUY NOW</div><br>';
				
			}
			else{
				echo '<div style="color: red; font-weight: bold;">This product is now selling at a HIGHER PRICE than AVERAGE PRICE <br> TIP: BUY LATER</div><br>';
				
			}
		?>
<?php
	echo '<marquee> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Upcoming Holiday Sales :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ';
	foreach($saledays as $saleday):{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[ ",$saleday["saledate"],"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;",$saleday["saleday"]," ] ";
	}endforeach;
	echo ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Prices are expected to drop on these dates !!! &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</marquee>';
?>
<br><br>
<div class="col-sm-8">
	<div id="chartdiv" style="width: 100%; height: 400px; background-color: #222222;" ></div>
</div>
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
						"categoryBalloonDateFormat": "MMM DD YYYY"
					},
					"chartScrollbar": {
						"enabled": true
					},
					"trendLines": [],
					"graphs": [
						{
							"bullet": "round",
							"id": "AmGraph-1",
							"title": "Product Graph",
							"valueField": "column-1"
						},
						
					],
					"guides": [],
					"valueAxes": [
						{
							"id": "ValueAxis-1",
							"title": "Rate <?php echo $_POST['selected_currency'] ?>"
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
							"text": "Price History Graph"
						}
					],
					"dataProvider": [
						// {
						// 	"date": "2014-01-15",
						// 	"column-1": 65
						// },
						
						// {
						// 	"date": "2014-06-10",
						// 	"column-1": 68
						// },
						
						<?php foreach ($graph_row as $graph_rowz): ?>
							<?php echo '{"date":"',$graph_rowz['Date'],'","column-1":',
							$total= floatval($_POST['productcost']) * floatval($graph_rowz[$_POST['selected_currency']]),'},';?>
						<?php endforeach; ?>


					]
				}
			);
		</script>