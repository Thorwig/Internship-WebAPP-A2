<?php
  include 'functions.php';
  include 'fonctionbdd.php';


  if (isset($_GET['action'])) {
    $action = filter_input(INPUT_GET, 'action');
    $ID = filter_input(INPUT_GET, 'ID');
    if ($action == "update") {
        $row = getClient($ID);
        $raison_sociale = $row['Raison sociale'];
        $num_tel = $row['N° de Tel'];
        $adresse = $row['Adresse'];
        $email = $row['Email'];
    } else {
        $raison_sociale = "";
        $num_tel = "";
        $adresse = "";
        $email = "";
    }
    
    
  } elseif (isset($_POST['action'])) {
    $action = filter_input(INPUT_POST, 'action');
    $ID = filter_input(INPUT_POST, 'ID');
    $raison_sociale = filter_input(INPUT_POST, 'raison_sociale');
    $num_tel = filter_input(INPUT_POST, 'num_tel');
    $adresse = filter_input(INPUT_POST, 'adresse');
    $num_fax = filter_input(INPUT_POST, 'num_fax');
    $activite = filter_input(INPUT_POST, 'activite');
    $secteur_activite = filter_input(INPUT_POST, 'secteur_activite');
    $nom_responsable = filter_input(INPUT_POST, 'nom_responsable');
    $fonction_responsable = filter_input(INPUT_POST, 'fonction_responsable');
    $email = filter_input(INPUT_POST, 'email');

    
  } 
    

  if (isPostRequest() && $action == "add") {

    $result = addClient ($raison_sociale, $num_tel,$num_fax, $adresse, $email,$activite,$secteur_activite,$nom_responsable,$fonction_responsable);
    header('Location: Rechercher.php');
    
  } elseif (isPostRequest() && $action == "update") {
    $result = updateClient ($ID, $raison_sociale, $num_tel, $adresse, $email);
    header('Location: Rechercher.php');
    
  } elseif (isPostRequest() && $action == "delete") {
    $result = deleteClient ($ID);
    header('Location: Rechercher.php');
  }

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Multi-p</title>
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="dist/css/multip.css">
  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="dist/js/multip.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <div style="background: #2B673A">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <img class="animation" src="logo.jpg" height="60" width="200">
          </div>
          <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background: #A6CFB1">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Ajout d'un client<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Rechercher.php">Rechercher un client</a>
                </li>
              </ul>
            </div>
          </nav>  
        </div>
      </div>
    </div>
  </div>

  <div style=" margin: 20px; border: double; padding: 10px; border-color: green">
    <form action="Ajouter.php" method="POST">
      <div style="<?php if ($action == "delete") { echo "display: none";}?>"> 
        <input type="hidden" name="action" value="<?= $action; ?>">
        <input type="hidden" name="ID" value="<?= $ID; ?>">

        <div class="form-group">
          <label for="exampleFormControlInput1">Raison sociale</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nom de l'entreprise" name="raison_sociale" value="<?php echo $raison_sociale;?>">
        </div>
        
        <div class="form-group">
          <label for="exampleFormControlInput1">N° de Tel</label>
          <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="Numéro de télephone de l'entreprise" name="num_tel" value="<?php echo $num_tel;?>">
          <input type="button" value="+" id="#">
        </div>
        
        <div class="form-group">
          <label for="exampleFormControlInput1">N° de Fax</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Numéro Fax de l'entreprise" name="num_fax" >
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Adresse</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Adresse de l'entreprise" name="adresse" value="<?php echo $adresse;?>">
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Ville</label>
          <select class="form-control" id="exampleFormControlSelect1" name="Ville">
            <option value="1">Tanger</option>
            <option value="2">Tétouan</option>
            <option value="3">Al Hoceima</option>
            <option value="4">Fès</option>
            <option value="5">Meknès</option>
            <option value="6">Rabat </option>
            <option value="7">Salé </option>
            <option value="8">Kénitra</option>
            <option value="9">Béni Mellal</option>
            <option value="10">Khénifra</option>
            <option value="11">Casablanca</option>
            <option value="12">Settat</option>
            <option value="13">HAD Soualem</option>
            <option value="14">Bir Jdid</option>
            <option value="15">Marrakech</option>
            <option value="16">Safi</option>
            <option value="17">Errachidia</option>
            <option value="18">Ouarzazat</option>
            <option value="19">Agadir</option>
            <option value="20">Ait melloul</option>
            <option value="21">Inezgane</option>
            <option value="22">Guelmim</option>
            <option value="23">Laayoune</option>
            <option value="24">Dakhla</option>
            <option value="25">Lyon</option>
            <option value="26">Madrid</option>
            <option value="27">Porto</option>
            <option value="28">99 Etranger</option>
          </select>
          <input type="button" value="+" id="#">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Région/Pays</label>
          <select class="form-control" id="exampleFormControlSelect1" name="Region/pays">
            <option value="1">01 Tanger-Tétouan-Al Hoceima</option>
            <option value="2">02 Oriental</option>
            <option value="3">03 Fès-Meknès</option>
            <option value="4">04 Rabat-Salé-Kénitra</option>
            <option value="5">05 Béni Mellal-Khénifra</option>
            <option value="6">06 Casablanca-Settat</option>
            <option value="7">07 Marrakech-Safi</option>
            <option value="8">08 Drâa-Tafilalet (Errachidia, Ouarzazat)</option>
            <option value="9">09 Souss-Massa (Agadir)</option>
            <option value="10">10 Guelmim-Oued Noun</option>
            <option value="11">11 Laayoune-Sakia El Hamra</option>
            <option value="12">12 Dakhla-Oued Ed-Dahab</option>
            <option value="13">20 France</option>
            <option value="14">21 Espagne</option>
            <option value="15">22 Portugal</option>
            <option value="16">99 Etranger</option>
          </select>
      
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Email</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email" value="<?php echo $email;?>">
          <input type="button" value="+" id="#">
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Qualifier</label>
          <select class="form-control" id="exampleFormControlSelect1" required name="Qualifier">
            <option>Oui</option>
            <option>Non</option>
            <option></option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Activité</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Activité de l'entreprise" name="activite">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Secteur d'activité</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Secteur d'activité de l'entreprise" name="secteur_activite">
          <input type="button" value="+" id="#">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Certifié</label >
          <select class="form-control" id="exampleFormControlSelect1">
            <option>Oui</option>
            <option>Non</option>
            <option>En cours</option>
            <option></option>
          </select>
          <input type="button" value="+" id="#">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Référence de certificat</label>
          <select class="form-control" id="exampleFormControlSelect1">
            <option value="1">ISO 9001:2008 </option>
            <option value="2">ISO 9001: 2015</option>
            <option value="3">ISO 27001</option>
            <option value="4">ISO 13485:2003</option>
            <option value="5">ISO 13485:2016</option>
            <option value="6">ISO 14001</option>
            <option value="7">ISO 45001</option>
            <option value="8">OHSAS 18001</option>
            <option value="9">EN 9100</option>
            <option value="10">ISO22000</option>
            <option value="11">déclarer DMP</option>
            <option value="12">ILTIZAM</option>
            <option value="13">NM 08.0.800 relative aux règles islamiques sur les Aliments HALAL</option>
          </select>
          <input type="button" value="+" id="#">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Genre</label >
          <select class="form-control" id="exampleFormControlSelect1">
            <option>Madame</option>
            <option>Monsieur</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Nom du Responsable</label >
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nom du Responsable du projet" name="nom_responsable">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Fonction du Responsable</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Fonction du Responsable du projet" name="fonction_responsable"> 
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Déjà client</label>
          <select class="form-control" id="exampleFormControlSelect1">
            <option value="1">NON </option>
            <option value="2">MULTI-P</option>
            <option value="3">A travers Licorne1</option>
            <option value="4">A travers BVQI</option>
            <option value="5">A travers Centaure</option>
            <option value="6">A travers DNV</option>
            <option value="7">A travers DNV/ECF/VIGICERT</option>
            <option value="8">FORMATION GRATUITE</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Source du contactt</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="A VOIR">
          <input type="button" value="+" id="#">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Nom campagne</label>
          <select class="form-control" id="exampleFormControlSelect1">
            <option value="1">texte libre</option>
            <option value="2">Compagnes précédentes (Elements colonnes R, S, T)</option>
            <option value="3">2013 FORMATION INTER ENTREPRISE Session Qualité Spécifique Aéronautique</option>
            <option value="4">2013 FORMATION INTER ENTREPRISE SST</option>
            <option value="5">2014 FORMATION INTER ENTREPRISE Qualité Securité</option>
            <option value="6">2015 Formation inter entreprise session QSE Jan</option>
            <option value="7">2015 Formation inter entreprises Session QSE Mai</option>
            <option value="8">2017 Formation inter entreprise session Qualité Fév</option>
            <option value="9">2021 Formation inter entreprise session Qualité Mars</option>
            <option value="10">Qualité Mars 2021 (Elements colonne U)</option>
          </select>
          <input type="button" value="+" id="#">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Commentaire campagne</label>
          <select class="form-control" id="exampleFormControlSelect1">
            <option value="1">texte libre</option>
            <option value="2">Historique commentaire compagnes précédentes (R, S, T, U)</option>
            <input type="button" value="+" id="#">
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Emailing envoyé le</label>
          <input type="Date" class="form-control" id="exampleFormControlInput1" placeholder="Date de réception de l'email">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Emailing receptionné</label>
          <select class="form-control" id="exampleFormControlSelect1">
            <option value="1">Oui</option>
            <option value="2">Non</option>
            <option></option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Appel tel le</label >
          <input type="Date" class="form-control" id="exampleFormControlInput1" placeholder="Date de réception de l'email">
          <input type="button" value="+" id="#">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">A rappeler</label >
          <select class="form-control" id="exampleFormControlSelect1">
            <option value="1">Oui</option>
            <option value="2">Non</option>
            <option></option>
          </select>
        </div>
      </div>
      <input type="submit" style="margin-left: 45%" class="btn btn-outline-success" value="<?php if ($action == "add") { echo "Ajouter un client";} elseif ($action == "update") { echo "Modifier le client"; } elseif ($action == "delete") { echo "Supprimer le client";}?>"  name="envoi">
    </form>
    
    <form method="post" action="Ajouter.php" >
          <input type="hidden" name="action" value="delete">
          <input type="hidden" name="ID" value="<?= $ID; ?>">
          <button class="btn glyphicon glyphicon-trash" type="submit"></button>
    </form>
</body>
</html>