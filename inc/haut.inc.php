<!Doctype html>
<html>	
    <head>
		
        <title>Mon Site</title>
        <link rel="stylesheet" href="inc/css/style.css" />
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
<body> 
    
        <header>
			<div class="conteneur">                      
				<nav>
					<?php
					if(internauteEstConnecteEtEstAdmin()) // admin
					{ // BackOffice
						echo '<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-top: 60px;background: grey !important;transition: all .5s ease-in-out;">
						<div class="container-fluid">
						  <div class="collapse navbar-collapse" id="navbarNav">
							<ul class="navbar-nav">
							  <li class="nav-item">
								<a class="nav-link" href="' . RACINE_SITE . 'admin/gestion_membre.php">Gestion des membres</a>
							  </li>
							  <li class="nav-item">
								<a class="nav-link" href="' . RACINE_SITE . 'admin/gestion_commande.php">Gestion des commandes</a>
							  </li>
							  <li class="nav-item">
								<a class="nav-link" href="' . RACINE_SITE . 'admin/gestion_boutique.php">Gestion de la promotion</a>
							  </li>
							  <li class="nav-item">
								<a class="nav-link" href="' . RACINE_SITE . 'admin/gestion_evenement.php">Gestion de l evenement</a>
							  </li>
							</ul>
						  </div>
						</div>
					  </nav>';

					}
					if(internauteEstConnecte()) // membre et admin
					{
						echo '<nav class="navbar navbar-expand-lg navbar-dark fixed-top"  style="background-color: #000000;">
        
						<a href="' . RACINE_SITE .'boutique.php"><img src="2021-11-10%20(11).png" class="img-fluid" alt="..." width="500"></a>
				</a>
				<div class="container">
				<div class="container">
					<div class="container">
						<div class="container">
							<div class="container">
								<div class="container">
									<div class="container">
										<div class="container">
											<div class="container">
												<div class="container">
													
															
																
																<li class="nav-item btn   " style="border: #000000;">
																<a class="nav-item nav-link text-white" href=" '. RACINE_SITE .'bonplan.php"><b><div style="font-family:monospace">Bon plan</div></b></a>
																</li>
																
															
														
												</div>
											</div>
										</div>
									</div>
								</div>			
							</div>
						</div>
					</div>
				</div>
			</div>
				
				
				
				
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
				
				
				
				
				
				
					<div class="container-fluid ">
						<form class="d-flex ">
							<div class="input-group">
								 <input  class="form-control" type="search" placeholder="Try iphone 12, Macbook, AirPods... " aria-label="Search"  aria-describedby="btnNavbarSearch" size="300" style="height: 35px;"> 
								  <button class="btn btn-light" id="btnNavbarSearch" type="button" style="height: 35px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
									<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
								  </svg></button>
							</div>
						</form>
					</div>
				
				
				<form class="form-inline my-2 my-lg-0">
					<a class="btn  text-secondary my-2 my-sm-0 " href="' . RACINE_SITE . 'profil.php" type="submit">
					<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person text-light" viewBox="0 0 16 16">
						<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
					</svg>
					</a> 
				</form>
				
				<form class="form-inline my-2 my-lg-0">
					<a class="btn  text-secondary my-2 my-sm-0 " href="' . RACINE_SITE . 'panier.php" type="submit">
					<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bag text-light" viewBox="0 0 16 16">
						<path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
					</svg>
					</a> 
				</form>
				
				</div>
				
				</nav>

				
				<br>
				<br>
				<br>
				';
					}
					else // visiteur
					{
						echo '
						<nav class="navbar navbar-expand-lg navbar-dark fixed-top"  style="background-color: #000000;">
        
						<a href="boutique.php"><img src="2021-11-10%20(11).png" class="img-fluid" alt="..." width="500"></a>
				</a>
					<div class="container">
						<div class="container">
							<div class="container">
								<div class="container">
									<div class="container">
										<div class="container">
											<div class="container">
												<div class="container">
													<div class="container">
														<div class="container">
															<div class="container">
																<div class="container">
																	
																		
																		<li class="nav-item btn   " style="border: #000000;">
																		<a class="nav-item nav-link text-white" href="' . RACINE_SITE . 'bonplan.php"><b><div style="font-family:monospace">Bon plan</div></b></a>
																		</li>
																		
																	
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>			
									</div>
								</div>
							</div>
						</div>
					</div>
				
				
				
				
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
				
				
				
				
				<nav class="navbar navbar-dark ">
				
					<div class="container-fluid ">
						<form class="d-flex ">
							<div class="input-group">
								 <input  class="form-control" type="search" placeholder="Try iphone 12, Macbook, AirPods... " aria-label="Search"  aria-describedby="btnNavbarSearch" size="300" style="height: 35px;"> 
								  <button class="btn btn-light" id="btnNavbarSearch" type="button" style="height: 35px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
									<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
								  </svg></button>
							</div>
						</form>
					</div>
				</nav>
				
				<form class="form-inline my-2 my-lg-0">
					<a class="btn  text-secondary my-2 my-sm-0 " href="' . RACINE_SITE . 'connexion.php" type="submit">
					<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person text-light" viewBox="0 0 16 16">
						<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
					</svg>
					</a> 
				</form>
				
				<form class="form-inline my-2 my-lg-0">
					<a class="btn  text-secondary my-2 my-sm-0 " href="' . RACINE_SITE . 'panier.php" type="submit">
					<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bag text-light" viewBox="0 0 16 16">
						<path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
					</svg>
					</a> 
				</form>
				
				</div>
				
				
				
				</nav>
				<br>
				<br>
				<br>
				';
					}
					// visiteur=4 liens - membre=4 liens - admin=7 liens
					?>
				</nav>
			</div>
        </header>
        <br>     