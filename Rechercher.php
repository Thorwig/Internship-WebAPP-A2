<?php
  include "fonctionbdd.php";
  $recherche = getClients ();
  
  $action = filter_input(INPUT_POST, 'action');
  $ID = filter_input(INPUT_POST, 'ID');
  $raison_sociale = filter_input(INPUT_POST, 'raison_sociale');
  $num_tel = filter_input(INPUT_POST, 'num_tel');
  $adresse = filter_input(INPUT_POST, 'adresse');
  $email = filter_input(INPUT_POST, 'email');
  $activite = filter_input(INPUT_POST, 'activite');
  $secteur_activite = filter_input(INPUT_POST, 'secteur_activite');
  $nom_responsable = filter_input(INPUT_POST, 'nom_responsable');
  if ( $action == 'search') {
          $recherche = searchClients ($raison_sociale, $email, $activite, $secteur_activite,$nom_responsable);   
  }else {
          $recherche = getClients ();  
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
    <script src="plugins/jquery/jquery.min.js">
      $(document).ready(function() {
        $("#bouton").click(function() {
            $("#madiv").css("display", "block");
        });
      });
    </script>
    <script src="dist/js/multip.js"></script>
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">    
    <div style="background: #2B673A">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <img  src="logo.jpg"  height="60" width="200">
            </div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background: #A6CFB1">
              <a class="navbar-brand" href="#"></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item active">
                    <a class="nav-link" href="#">Rechercher un client <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Ajouter.php?action=add">Ajout d'un client</a>
                  </li>
                </ul>
              </div>
            </nav>  
          </div>
        </div>
      </div>
    </div>
    <div class="container" style="margin: 5%">
      
      <div style="overflow:scroll; border-style: double; border-color: green; max-height: 500px; width: 117%">

        <table border="1">
          <thead><!--style="position: sticky;top: 0;"-->
            <tr>
              <th>Raison sociale</th>
              <th>Nom du Responsable</th>
              <th>N° de Tel</th>
              <th>Email</th>
              <th>Adresse</th>
              <th>Qualifier</th>
              <th>Secteur d'activité</th>
            </tr>
          </thead>
          
          <?php foreach ($recherche as $row): ?>
            <tr>
              <td><input type="checkbox" value="<?php $a=$a+1; echo $a?>">
                  <?php  echo $row['Raison sociale']; ?> </td>
              <td><?php  echo $row['Nom du Responsable']; ?> </td>
              <td><?php  echo $row['N° de Tel']; ?> </td>
              <td><?php  echo $row['Email']; ?> </td>
              <td><?php  echo $row['Adresse']; ?> </td>
              <td><?php  echo $row['Qualifier']; ?> </td>
              <td><?php  echo $row["Secteur d'activité"]; ?> </td>
              <td><a href="ajouter.php?action=update&ID=<?php echo $row['ID']; ?>">Modifier</td>
              
              <td><a href="ajouter.php?action=delete&ID=<?php echo $row['ID']; ?>">Supprimer</td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
        
      <button class="btn btn-success" >Tout sélectionner</button>
      <a href="Mailing.php" type="button" class="btn btn-success" style="margin-left: 20%;" >Mailing</a>
      <button id="bouton" class="btn btn-success" style="margin-left: 17%;">Recherche</button>
      <a href="tableau.php" type="button" class="btn btn-success" style="margin-left: 17%;" >Voir tout le tableau</a>
    </div>

    <div id="madiv" style="/*display:none*/margin: 20px; border: double; padding: 10px; border-color: green">
      <form method="POST">
        <input type="hidden" name="action" value="search" />
          <div class="form-group">
            <label for="exampleFormControlInput1">Raison sociale</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="raison_sociale" >
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
            <input type="text" class="form-control" id="exampleFormControlInput1" name="email" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Qualifier</label>
            <select class="form-control" id="exampleFormControlSelect1" >
              <option></option>
              <option>Oui</option>
              <option>Non</option>
              <option></option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Activité</label>
            <input type="name" class="form-control" id="exampleFormControlInput1" name="activite">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Secteur d'activité</label>
            <input type="text" class="form-control" id="exampleFormControlInput1"  name="secteur_activite">
            <input type="button" value="+" id="#">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Certifié</label >
            <select class="form-control" id="exampleFormControlSelect1">
              <option></option>
              <option>Oui</option>
              <option>Non</option>
              <option>En cours</option>
              <option></option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Référence de certificat</label>
            <select class="form-control" id="exampleFormControlSelect1">
              <option></option>
              <option>ISO 9001:2008 </option>
              <option>ISO 9001: 2015</option>
              <option>ISO 27001</option>
              <option>ISO 13485:2003</option>
              <option>ISO 13485:2016</option>
              <option>ISO 14001</option>
              <option>ISO 45001</option>
              <option>OHSAS 18001</option>
              <option>EN 9100</option>
              <option>ISO22000</option>
              <option>déclarer DMP</option>
              <option>ILTIZAM</option>
              <option>NM 08.0.800 relative aux règles islamiques sur les Aliments HALAL</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Nom du Responsable</label >
            <input type="name" class="form-control" id="exampleFormControlInput1" name="nom_responsable">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Déjà client</label>
            <select class="form-control" id="exampleFormControlSelect1">
              <option></option>
              <option>NON </option>
              <option>MULTI-P</option>
              <option>A travers Licorne1</option>
              <option>A travers BVQI</option>
              <option>A travers Centaure</option>
              <option>A travers DNV</option>
              <option>A travers DNV/ECF/VIGICERT</option>
              <option>FORMATION GRATUITE</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Nom campagne</label>
            <select class="form-control" id="exampleFormControlSelect1">
              <option></option>
              <option>texte libre</option>
              <option>Compagnes précédentes (Elements colonnes R, S, T)</option>
              <option>2013 FORMATION INTER ENTREPRISE Session Qualité Spécifique Aéronautique</option>
              <option>2013 FORMATION INTER ENTREPRISE SST</option>
              <option>2014 FORMATION INTER ENTREPRISE Qualité Securité</option>
              <option>2015 Formation inter entreprise session QSE Jan</option>
              <option>2015 Formation inter entreprises Session QSE Mai</option>
              <option>2017 Formation inter entreprise session Qualité Fév</option>
              <option>2021 Formation inter entreprise session Qualité Mars</option>
              <option>Qualité Mars 2021 (Elements colonne U)</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Emailing envoyé le</label>
            <input type="Date" class="form-control" id="exampleFormControlInput1" placeholder="Date de réception de l'email">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">A rappeler</label >
            <select class="form-control" id="exampleFormControlSelect1">
              <option>Oui</option>
              <option>Non</option>
              <option></option>
            </select>
          </div>
          <button style="margin-left: 45%" type="submit" class="btn btn-outline-success">Rechercher</button>
          
      </form>
    </div>
  </body>
</html>
