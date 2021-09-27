
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Multi-p</title>
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="dist/css/multip.css">
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    

    <div style="background: #2B673A">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <img src="logo.jpg" height="60" width="200">
            </div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background: #A6CFB1">
              <a class="navbar-brand" href="#"></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item active">
                    <a class="nav-link" href="#">Mailing<span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Ajouter.php?action=add">Ajout d'un client</a>
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
        
    <?php 
      include "connexion_bdd.php";
    ?>
    <div style="margin: 20px; border: double; padding: 10px; border-color: green">
      <section class="content">
        <div class="container-fluid">
          <form action="envoi.php" method="POST">
            <div class="card card-success card-outline">
              <div class="card-header">
                <h3 class="card-title">Mailing</h3>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <input type="email" name="email" placeholder="Envoyé à :"
                    class="form-control" value=""> 
                </div>
                <div class="form-group">
                  <input type="text" name="name" class="form-control" placeholder="Objet:">
                </div>
                <div class="form-group">
                    <textarea rows="10" name="message" placeholder="Votre message" class="form-control" style="height: 300px"></textarea>
                </div>
                <div class="form-group">
                  <div class="btn btn-default btn-file">
                    <i class="fas fa-paperclip"></i> Joindre un fichier
                    <input type="file" name="attachment">
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="float-right">
                  <button type="submit" class="btn btn-success"><i class="far fa-envelope"></i>Envoyer</button>
                </div>
                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i>Annuler</button>
              </div>
            </div>
          </form>
        </div>
      </section>
    </div>          

    <script src="plugins/jquery/jquery.min.js"></script>
  </body>
</html>

