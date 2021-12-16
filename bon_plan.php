<?php include 'includes/session.php'; ?>

<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
		            <h1 class="page-header">Bon Plan</h1>
		       		<?php
		       			
		       			$conn = $pdo->open();

		       			try{
		       			 	$inc = 3;	
						    $stmt = $conn->prepare("SELECT * FROM products ");
						    $stmt->execute();
						    foreach ($stmt as $row) {
						    	$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
												$pro_price = $row['price'];
												$pro_label = $row['product_label'];
												$pro_psp_price = $row['product_psp_price'];

												if($pro_label == "BON PLAN"){	
													$inc = ($inc == 3) ? 1 : $inc + 1;												
												$product_price = "<del> $$pro_price </del>";
												$product_psp_price = "| $$pro_psp_price";
												}
												else{
												$product_psp_price = "";
												$product_price = "$$pro_price";
												}
												if($pro_label == ""){
													$product_label = " 
												<br>
												";
												}
												else{
												$product_label = $pro_label;
												}
												
	       						if($inc == 1)  echo "<div class='row'>";
	       						if ($product_label == "BON PLAN") echo "
	       							<div class='col-sm-4'>
	       								<div class='box box-solid'>
										   <div class='badge bg-dark text-white position-absolute' style='top: 0.5rem; right: 0.5rem'>$product_label</div>
		       								<div class='box-body prod-body'>
		       									<img src='".$image."' width='100%' height='230px' class='thumbnail'>
		       									<h5><a href='product.php?product=".$row['slug']."'>".$row['name']."</a></h5>
		       								</div>																		   										
											   
		       							<div class='box-footer'>
		       									<b>$product_price $product_psp_price</b>
											
												   </div>
	       								</div> 
										   
	       							</div>
	       						";
	       						if($inc == 3) echo "</div>";
						    }
						    if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
							if($inc == 2) echo "<div class='col-sm-4'></div></div>";
						}
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

						$pdo->close();

		       		?> 
	        	</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>