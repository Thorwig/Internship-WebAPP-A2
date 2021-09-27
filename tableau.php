<?php
  include "fonctionbdd.php";
  $recherche = getClients ();

?>
<!DOCTYPE html>
<html>
    <table border="1">
        <thead><!--style="position: sticky;top: 0;"-->
        <tr>
            <th>ID</th>        
            <th>Raison sociale</th> 
            <th>N° de Tel</th>
            <th>N° de Fax</th>
            <th>Adresse</th>
            <th>ville</th>
            <th>Région/ Pays</th>
            <th>Email</th>
            <th>Qualifier</th>
            <th>Activité</th>
            <th>Secteur d'activité</th>           
            <th>Certifié</th>            
            <th>Référence de certificat</th>
            <th>Genre</th>  
            <th>Nom du Responsable</th>
            <th>Fonction du Responsable</th>
            <th>Déjà client</th>
            <th>Historique commentaire compagnes précédentes</th>
            <th>Historique commentaire compagnes actuel</th>
            <th>Historique commentaire compagnes précédentes mars2021</th> 
            <th>Commentaire compagnes : "Webinair 13485 Mai 2021"</th> 
            <th>EMAILING ENVOYE LE</th> 
            <th>EMAILING RECEPTIONE</th> 
            <th>Appel Tel le</th> 
            <th>A rappeler</th> 
        </tr>
        </thead>
        
        <?php foreach ($recherche as $row): ?>
        <tr>
            <td><?php  echo $row['ID']; ?> </td>
            <td><?php  echo $row['Raison sociale']; ?> </td>
            <td><?php  echo $row['N° de Tel']; ?> </td>
            <td><?php  echo $row['N° de Fax']; ?> </td>
            <td><?php  echo $row['Adresse']; ?> </td>
            <td><?php  echo $row['ville']; ?> </td>
            <td><?php  echo $row['Région/ Pays']; ?> </td>
            <td><?php  echo $row['Email']; ?> </td>
            <td><?php  echo $row['Qualifier']; ?> </td>
            <td><?php  echo $row['Activité']; ?> </td>
            <td><?php  echo $row["Secteur d'activité"]; ?> </td>
            <td><?php  echo $row['Certifié']; ?> </td>
            <td><?php  echo $row['Référence de certificat']; ?> </td>
            <td><?php  echo $row['Genre']; ?> </td>
            <td><?php  echo $row['Nom du Responsable']; ?> </td>
            <td><?php  echo $row['Fonction du Responsable']; ?> </td>
            <td><?php  echo $row['Déjà client']; ?> </td>
            <td><?php  echo $row['Historique commentaire compagnes précédentes']; ?> </td>
            <td><?php  echo $row['Historique commentaire compagnes actuel']; ?> </td>
            <td><?php  echo $row['Historique commentaire compagnes précédentes mars2021']; ?> </td>
            <td><?php  echo $row['Commentaire compagnes : "Webinair 13485 Mai 2021"']; ?> </td>
            <td><?php  echo $row['EMAILING ENVOYE LE']; ?> </td>
            <td><?php  echo $row['EMAILING RECEPTIONE']; ?> </td>
            <td><?php  echo $row['Appel Tel le']; ?> </td>
            <td><?php  echo $row["A rappeler"]; ?> </td>
            
            <td><a href="ajouter.php?action=update&ID=<?php echo $row['ID']; ?>">Modifier</td>
            
            <td><a href="ajouter.php?action=delete&ID=<?php echo $row['ID']; ?>">Supprimer</td>
        </tr>
        <?php endforeach; ?>
    </table>
</html>