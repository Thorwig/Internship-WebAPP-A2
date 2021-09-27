<?php
    include "connexion_bdd.php";
    
    function getClients () {
        global $bdd;
        $results = [];
        $stmt = $bdd->prepare("SELECT * FROM multip ORDER BY id");

        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {  
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
        }
        
        return ($results);
    }

    function addClient ($raison_sociale, $num_tel,$num_fax, $adresse, $email,$activite,$secteur_activite,$nom_responsable,$fonction_responsable) {
        global $bdd;
        $results = "Une erreur a été détecté";

        $stmt = $bdd->prepare("INSERT INTO multip (`Raison sociale`, `N° de Tel`,`N° de Fax`, `Adresse`, `Email`, `Activité`, `Secteur d'activité`, `Nom du Responsable`, `Fonction du Responsable`) VALUES (:raison_sociale, :num_tel, :num_fax, :adresse, :email, :activite, :secteur_activite, :nom_responsable, :fonction_responsable)");

        $binds = array(
            ":raison_sociale" => $raison_sociale,
            ":num_tel" => $num_tel,
            ":num_fax" => $num_fax,
            ":adresse" => $adresse,
            ":email" => $email,
            ":activite" => $activite,
            ":secteur_activite" => $secteur_activite,
            ":nom_responsable" => $nom_responsable,
            ":fonction_responsable" => $fonction_responsable
        );
        
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = 'Client ajouté avec succès';
        }
        
        return ($results);
    }

    function updateClient ($ID, $raison_sociale, $num_tel, $adresse, $email) {
        global $bdd;

        $results = "";
        
        $stmt = $bdd->prepare("UPDATE multip SET `Raison sociale` = :raison_sociale, `N° de Tel` = :num_tel, `Adresse` = :adresse, `Email` = :email WHERE `ID`=:ID");
        
        $stmt->bindValue(':ID', $ID);
        $stmt->bindValue(':raison_sociale', $raison_sociale);
        $stmt->bindValue(':num_tel', $num_tel);
        $stmt->bindValue(':adresse', $adresse);
        $stmt->bindValue(':email', $email);

      
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Client modifié avec succès';
        }
        
        return ($results);
    }

    function deleteClient ($ID) {
        global $bdd;

        $results = "";
        
        $stmt = $bdd->prepare("DELETE FROM multip WHERE ID=:ID");
        
        $stmt->bindValue(':ID', $ID);
      
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Client supprimé';
            echo 'client supprimé';
        }
        
        return ($results);
    }

    function getClient ($ID) {
        global $bdd;
       
       $result = [];
       
       $stmt = $bdd->prepare("SELECT * FROM multip WHERE ID=:ID");
       $stmt->bindValue(':ID', $ID);
      
       if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                       
        }
        
        return ($result);
   }

   function searchClients ( $raison_sociale, $email, $activite, $secteur_activite,$nom_responsable) {
    global $bdd;
    $binds = array();

    $sql =  "SELECT * FROM  multip WHERE 0=0";
    if ($raison_sociale != "") {
        $sql .= " AND `Raison sociale` LIKE :raison_sociale";
        $binds['raison_sociale'] = '%'.$raison_sociale.'%';
    }

    if ($email != "") {
        $sql .= " AND `Email` LIKE :email";
        $binds['email'] = '%'.$email.'%';
    }
       
    if ($activite != "") {
        $sql .= " AND `Activité` LIKE :activite";
        $binds['activite'] = '%'.$activite.'%';
    }

    if ($secteur_activite != "") {
        $sql .= " AND `Secteur d'activité` LIKE :secteur_activite";
        $binds['secteur_activite'] = '%'.$secteur_activite.'%';
    }

    if ($nom_responsable != "") {
        $sql .= " AND `Nom du Responsable` LIKE :nom_responsable";
        $binds['nom_responsable'] = '%'.$nom_responsable.'%';
    }
    
    $results = array();
    $stmt = $bdd->prepare($sql);
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
     
     return ($results);
}
