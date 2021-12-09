<?php
require_once("../inc/init.inc.php");
//--------------------------------- TRAITEMENTS PHP ---------------------------------//
//--- VERIFICATION ADMIN ---//
if(!internauteEstConnecteEtEstAdmin())
{
	header("location:../connexion.php");
	exit();
}

//--- SUPPRESSION evenement ---//
if(isset($_GET['action']) && $_GET['action'] == "suppression")
{	// $contenu .= $_GET['id_evenement']
	$resultat = executeRequete("SELECT * FROM evenement WHERE id_evenement=$_GET[id_evenement]");
	$evenement_a_supprimer = $resultat->fetch_assoc();
	$chemin_photo_a_supprimer = $_SERVER['DOCUMENT_ROOT'] . $evenement_a_supprimer['photo'];
	if(!empty($evenement_a_supprimer['photo']) && file_exists($chemin_photo_a_supprimer))	unlink($chemin_photo_a_supprimer);
	$contenu .= '<div class="validation">Suppression du evenement : ' . $_GET['id_evenement'] . '</div>';
	executeRequete("DELETE FROM evenement WHERE id_evenement=$_GET[id_evenement]");
	$_GET['action'] = 'affichage';
}
//--- ENREGISTREMENT evenement ---//
if(!empty($_POST))
{	// debug($_POST);
	$photo_bdd = ""; 
	if(isset($_GET['action']) && $_GET['action'] == 'modification')
	{
		$photo_bdd = $_POST['photo_actuelle'];
	}
	if(!empty($_FILES['photo']['name']))
	{	// debug($_FILES);
		$nom_photo = $_POST['reference'] . '_' .$_FILES['photo']['name'];
		$photo_bdd = RACINE_SITE . "photo/$nom_photo";
		$photo_dossier = $_SERVER['DOCUMENT_ROOT'] . RACINE_SITE . "photo/$nom_photo"; 
		copy($_FILES['photo']['tmp_name'],$photo_dossier);
	}
	foreach($_POST as $indice => $valeur)
	{
		$_POST[$indice] = htmlEntities(addSlashes($valeur));
	}
	executeRequete("REPLACE INTO evenement (id_evenement, titre, description, photo) values ('$_POST[id_evenement]', '$_POST[titre]', '$_POST[description]',  '$photo_bdd')");
	$contenu .= '<div class="validation">Le evenement a ete enregistre</div>';
	$_GET['action'] = 'affichage';
}
//--- LIENS evenementS ---//
$contenu .= '<a href="?action=affichage">Affichage des evenements</a><br />';
$contenu .= '<a href="?action=ajout">Ajout d\'un evenement</a><br /><br /><hr /><br />';
//--- AFFICHAGE evenementS ---//
if(isset($_GET['action']) && $_GET['action'] == "affichage")
{
	$resultat = executeRequete("SELECT * FROM evenement");
	
	$contenu .= '<h2> Affichage des evenements </h2>';
	$contenu .= 'Nombre de evenement(s) dans la boutique : ' . $resultat->num_rows;
	$contenu .= '<table border="1" cellpadding="5"><tr>';
	
	while($colonne = $resultat->fetch_field())
	{    
		$contenu .= '<th>' . $colonne->name . '</th>';
	}
	$contenu .= '<th>Modification</th>';
	$contenu .= '<th>Supression</th>';
	$contenu .= '</tr>';

	while ($ligne = $resultat->fetch_assoc())
	{
		$contenu .= '<tr>';
		foreach ($ligne as $indice => $information)
		{
			if($indice == "photo")
			{
				$contenu .= '<td><img src="' . $information . '" width="70" height="70" /></td>';
			}
			else
			{
				$contenu .= '<td>' . $information . '</td>';
			}
		}
		$contenu .= '<td><a href="?action=modification&id_evenement=' . $ligne['id_evenement'] .'"><img src="../inc/img/edit.png" /></a></td>';
		$contenu .= '<td><a href="?action=suppression&id_evenement=' . $ligne['id_evenement'] .'" OnClick="return(confirm(\'En �tes vous certain ?\'));"><img src="../inc/img/delete.png" /></a></td>';
		$contenu .= '</tr>';
	}
	$contenu .= '</table><br /><hr /><br />';
}
//--------------------------------- AFFICHAGE HTML ---------------------------------//
require_once("../inc/haut.inc.php");
echo $contenu;
if(isset($_GET['action']) && ($_GET['action'] == 'ajout' || $_GET['action'] == 'modification'))
{
	if(isset($_GET['id_evenement']))
	{
		$resultat = executeRequete("SELECT * FROM evenement WHERE id_evenement=$_GET[id_evenement]");
		$evenement_actuel = $resultat->fetch_assoc();
	}
	echo '
	<h1> Formulaire evenements </h1>
	<form method="post" enctype="multipart/form-data" action="">
	
		<input type="hidden" id="id_evenement" name="id_evenement" value="'; if(isset($evenement_actuel['id_evenement'])) echo $evenement_actuel['id_evenement']; echo '" />
        
       

		<label for="titre">titre</label><br />
		<input type="text" id="titre" name="titre" placeholder="le titre du evenement" value="'; if(isset($evenement_actuel['titre'])) echo $evenement_actuel['titre']; echo '"  /> <br /><br />

		<label for="description">description</label><br />
		<textarea name="description" id="description" placeholder="la description du evenement">'; if(isset($evenement_actuel['description'])) echo $evenement_actuel['description']; echo '</textarea><br /><br />
		
		<label for="meeting-time">Choisir la date debut de l evenement</label><br/ >
		<input type="datetime-local" id="date_debut" name="date_debut" value="2000-01-01T00:00" min="2000-01-01T00:00" max="2100-12-31T23:59"><br /><br />

		<label for="meeting-time">Choisir la date fin de l evenement</label><br/ >
		<input type="datetime-local" id="date_fin" name="date_fin" value="2000-01-01T00:00" min="2000-01-01T00:00" max="2100-12-31T23:59"><br /><br />

		
		<label for="photo">photo</label><br />
		<input type="file" id="photo" name="photo" /><br /><br />';
		if(isset($evenement_actuel))
		{
			echo '<i>Vous pouvez uplaoder une nouvelle photo si vous souhaitez la changer</i><br />';
			echo '<img src="' . $evenement_actuel['photo'] . '"  width="90" height="90" /><br />';
			echo '<input type="hidden" name="photo_actuelle" value="' . $evenement_actuel['photo'] . '" /><br />';
		}
		
		echo '
		
		
		<input type="submit" value="'; echo ucfirst($_GET['action']) . ' du evenement"/>
	</form>';
}
require_once("../inc/bas.inc.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Basic Bootstrap Template</title> 

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>home</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>