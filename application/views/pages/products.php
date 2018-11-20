
<div class="container">
	<h4 style="display: inline;">
		<strong>
			Category > <?php echo $categoryname; ?>
		</strong>
	</h4>
	<div style="float: right;">
		<label>Select Currency:&nbsp;&nbsp;</label>
			<form name="form_submit" method="post" style="display: inline;">
	  			<select name="select_graph_currency">
			  		<?php foreach (array_slice($currency_col,1) as $currency_colz):{ ?>
						<option value="<?php echo $currency_colz['Field'];?>"><?php echo $currency_colz['Field'];?>
						</option>
					<?php }endforeach; ?>
					<option  selected><?php echo $selected_currency; ?></option>
				</select>&nbsp;&nbsp;
				<input type="submit" name="submit">
				<input type="hidden" name="categoryid" value="<?php echo $categoryid; ?>">
				<input type="hidden" name="categoryname" value="<?php echo $categoryname; ?>">
			</form>
	</div>
</div>
<br>
<hr>
<br>
<?php foreach($products as $product):{?>
<div class="container">
	<div class="row">
				
		<div class="col-sm-4">
			<div id="productCarousel" class="carousel slide" " data-ride="carousel">
			    <!-- Wrapper for slides -->
			    <div class="carousel-inner">
			      <div class="item active">
			        <img src="<?php echo $product['image1'];?>" style="width:100%;">
			      </div>

			      <div class="item">
			        <img src="<?php echo $product['image2'];?>"  style="width:100%;">
			      </div>
			    
			      <div class="item">
			        <img src="<?php echo $product['image3'];?>" style="width:100%;">
			      </div>

			      <div class="item">
			        <img src="<?php echo $product['image4'];?>" style="width:100%;">
			      </div>
			    </div>				    
			</div>
		</div>
		<div class="col-md-6">
			<div class="product-title"><?php echo $product['itemname'];?></div><br>
			<div class="product-desc"><?php echo $product['itemdesc'];?></div><br>
			<div class="product-rating">
				<i class="fa fa-star gold"></i>
				<i class="fa fa-star gold"></i> 
				<i class="fa fa-star gold"></i> 
				<i class="fa fa-star gold"></i> 
				<i class="fa fa-star-o"></i> 
			</div>
			<hr>
			<div class="product-price">$<?php echo $product['cost'];?>  USD</div>
			<hr>
			<br>
			<input type="text" placeholder="Select currency.." value="<?php 
								if(empty($currency_rate)){

								}else{
									$total = floatval($currency_rate[$selected_currency]) * floatval($product['cost']);
              						echo floatval($total),' ',$selected_currency;
								}
              					?>">
              					<form method="post" name="graph" target="print_popup" action="/team4/categories/productgraph" onsubmit="window.open('about:blank', 'print_popup', 'width=628,height=550,top=150,left=450');" style="display: inline;">
            <input type="submit" value="Price History">
            <input type="hidden" name="productcost" value="<?php echo $product['cost'];?>">
            <input type="hidden" name="convertedproductcost" value="<?php if(empty($total)){}else{echo floatval($total);} ?>">
            <input type="hidden" name="categoryid" value="<?php echo $categoryid; ?>">
				<input type="hidden" name="categoryname" value="<?php echo $categoryname; ?>">
				<input type="hidden" name="selected_currency" value="<?php echo $selected_currency; ?>">
				<input type="hidden" name="itemname" value="<?php echo $product['itemname'];?>">
        </form>
			<div class="panel-body">
				<table>
            		<tr class="tp">
            			<td>
              				
              			</td>
              		</tr>
              	</table>
            </div>
		</div>
	</div>
</div>
<br><br>
<?php }endforeach;?>