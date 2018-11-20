  <div class="container">
		<div class="row">
      <?php foreach ($categories as $category):{        
        $image = $category['categoryimg'];
        $id = $category['categoryid'];?>
        <div class="col-lg-6 portfolio-item">
          <div class="card h-100">
            <form id="form_submit<?php echo $id; ?>" method="post" action="products">
              <input type="hidden" name="categoryid" value="<?php echo $category['categoryid']; ?>">
              <input type="hidden" name="categoryname" value="<?php echo $category['categoryname']; ?>">
                <a onclick="document.getElementById('form_submit<?php echo $id; ?>').submit();">
                  <img class="card-img-top" src="<?php echo $image; ?>">
                    <div class="card-body">
                      <h4 class="card-title" style="color: black;">
                        <strong><?php echo $category['categoryname']; ?></strong>
                      </h4>
                </a>
            </form>
          </div>
        </div>
      </div>
      <?php }endforeach; ?>
		</div>
  </div>