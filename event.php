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
		            <h1 class="page-header"><?php
            $conn = $pdo->open();
            try{
             $now = date('Y-m-d');
             $stmtp = $conn->prepare("SELECT * FROM events ");
             $stmtp->execute();
             foreach($stmtp as $row){
               $name = $row['name'];
               $start_date = $row['start_date'];
               $end_date = $row['end_date'];
               $sys_date = date("y-m-d");
               $start_date1 = strtotime($start_date);
               $end_date1 = strtotime($end_date);
               $sys_date1 = strtotime($sys_date);
               if (($sys_date1 >= $start_date1) && ($sys_date1 <= $end_date1))
               echo "  
                        $name  
						<p id='demo' class='text-red'></p>

						<script>
// Set the date we're counting down to
var countDownDate = new Date('$end_date').getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id='demo'
  document.getElementById('demo').innerHTML ='End in  ' + days + ':' + hours + ':'
  + minutes + ':' + seconds  + ' !'; 

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById('demo').innerHTML = 'EXPIRED';
  }
}, 1000);
</script>
               ";
             }
           }
           catch(PDOException $e){
             echo $e->getMessage();
           }
            ?></h1>
		       		<?php
		       			
		       			$conn = $pdo->open();
                           try{
                            $now = date('Y-m-d');
                            $stmtp = $conn->prepare("SELECT * FROM events ");
                            $stmtp->execute();
                            foreach($stmtp as $row){
                              $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
                              $start_date = $row['start_date'];
                              $end_date = $row['end_date'];
                              $sys_date = date("y-m-d");
                              $start_date1 = strtotime($start_date);
                              $end_date1 = strtotime($end_date);
                              $sys_date1 = strtotime($sys_date);
                              if (($sys_date1 >= $start_date1) && ($sys_date1 <= $end_date1))
                              echo "  
                
                                    <img src='".$image."' height='350px' width='100%'> 
                                    <br>
                                    <br>
                                    <br>
                                    <br>

                              ";
                            }
                          }
                          catch(PDOException $e){
                            echo $e->getMessage();
                          }
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
	       						if ($product_label == "BON PLAN"){
									   if(($pro_price/2) > $pro_psp_price) 
								    echo "
                                   
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
	       						";}
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