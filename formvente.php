
<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
        <style>
        input{
            width:30%;
        } 
        #for{
            margin-top:-15%;
        }
        option p{
            font-size:10px;
        }
        h1{
            font-family:'Times New Roman', Times, serif;
        }
        h2{
            font-family:'Times New Roman', Times, serif;
            text-align:center;
        }
        #response{
            width:60%;
            margin:auto;
        }
      
        </style>
    </head>
    <body>
    <div id="titre">
   
    <div class="shadow-lg p-3 mb-5 bg-white rounded"> <h1 style="color: SeaGreen;">Enregistrement des Ventes</h1></div>
       
      </div>
      <div id="response"></div>
        <div id="cont">
        
    <div id="container">
    <form id="for" action="" method="POST">
                <h2 style="color: SeaGreen;">Ajouter une Vente</h2>
                <p><label><b>Nom du medicament</b></label>
                <select name="medicament" id='val' onchange="change()">
                <optgroup label='Fatigue'>
                <option value=""><p>Selectionner</p><option>
                
        <?php
          $id=$_SESSION['num_pharmacie'];
       include 'connect_BD.php';
       $req="SELECT* from medicaments join categorie on id_categorie=num_categorie natural join stock where num_pharmacie=$id order by nom";
       $result=$connect->query($req);
       if($result){
           while($row=$result->fetch()){
               if($row['nom_categorie']=='Fatigue'){
                   $nom=$row['nom'];
                   $numero=$row['id_medicament'];
                   echo  "<option value='$numero'><p>$nom</p><option>"; 
                   echo '</optgroup>';
               }
            }
        }
          echo "<optgroup label='Rhume et Etat grippal'>";
                
               $req="SELECT* from medicaments join categorie on id_categorie=num_categorie natural join stock where num_pharmacie=$id order by nom";
               $result=$connect->query($req);
               if($result){
                   while($row=$result->fetch()){
                       if($row['nom_categorie']=='Rhume et Etat grippal'){
                           $nom=$row['nom'];
                           $numero=$row['id_medicament'];
                           echo  "<option  value='$numero'><p>$nom</p><option>"; 
                           echo '</optgroup>';
                       }
                    }
                }
                echo "<optgroup label='Trouble digestif'>";
                       $req="SELECT* from medicaments join categorie on id_categorie=num_categorie natural join stock where num_pharmacie=$id order by nom";
                       $result=$connect->query($req);
                       if($result){
                           while($row=$result->fetch()){
                               if($row['nom_categorie']=='Trouble digestif'){
                                   $nom=$row['nom'];
                                   $numero=$row['id_medicament'];
                                   echo  "<option value='$numero'><p>$nom</p><option>"; 
                                   echo '</optgroup>';
                               }
                            }
                        }
                        echo "<optgroup label='Douleur et Fievre'>";
                               $req="SELECT* from medicaments join categorie on id_categorie=num_categorie natural join stock where num_pharmacie=$id order by nom";
                               $result=$connect->query($req);
                               if($result){
                                   while($row=$result->fetch()){
                                       if($row['nom_categorie']=='Douleur et Fievre'){
                                           $nom=$row['nom'];
                                           $numero=$row['id_medicament'];
                                           echo  "<option value='$numero'><p>$nom</p><option>"; 
                                           echo '</optgroup>';
                                       }
                                    }
                                }
                                echo "<optgroup label='Antiparasitaires'>";
                                       $req="SSELECT* from medicaments join categorie on id_categorie=num_categorie natural join stock where num_pharmacie=$id order by nom";
                                       $result=$connect->query($req);
                                       if($result){
                                           while($row=$result->fetch()){
                                               if($row['nom_categorie']=='Antiparasitaires'){
                                                   $nom=$row['nom'];
                                                   $numero=$row['id_medicament'];
                                                   echo  "<option value='$numero'><p>$nom</p><option>"; 
                                                   echo '</optgroup>';
                                               }
                                            }
                                        }
//                elseif($row['nom_categorie']=='Rhume et Etat grippal'){
//                     $nom=$row['nom']; 
//                     $numero=$row['id_medicament'];
//                     echo"<optgroup label='Rhume et Etat grippal'>";
//                     echo "<option value='$numero' >$nom<option>"; 
//                     echo '</optgroup>';
//                }
//                elseif($row['nom_categorie']=='Trouble digestif'){
//                      $nom=$row['nom']; 
//                      $numero=$row['id_medicament'];
//                      echo "<optgroup label='Trouble digestif'>";
//                     echo "<option value= '$numero'>$nom<option>"; 
//                     echo '</optgroup>';
//            }
//            elseif($row['nom_categorie']=='Douleur et Fievre'){
//                 $nom=$row['nom']; 
//                 $numero=$row['id_medicament'];
//                     echo"<optgroup label='Douleur et Fievre'>";
//                     echo "<option value= '$numero' >$nom<option>"; 
//                     echo '</optgroup>';
//        }
//        else 
//            {
//            $nom=$row['nom']; 
//            $numero=$row['id_medicament'];
//                    echo"<optgroup label='Antiparasitaires'>";
//                     echo "<option value= '$numero'>$nom</option>"; 
//                     echo '</optgroup>';
//    }

//   }
// }

   ?>
            
            <!-- zone de connexion -->
           
                <p><label><b>Quantite</b></label>
                <input type="text" placeholder="Entrer la quantite" id="qte" name="qte"  required></P>
                 <p><label><b>Prix Unitaire</b></label>
                <input type="text" placeholder="Entrer le prix unitaire" name="prixU" id="prixU" readonly required></p>
                <p><label><b>Prix Total</b></label>
                <input type="text" placeholder="Entrer le prix total" name="prixT" id="prixT" readonly required></p>
                <input type="submit" id='submit' value='Enregistrer' >
                <?php
           
       


       if(isset($_GET['erreur'])){
        $err = $_GET['erreur'];
        if($err==1 || $err==2)
            echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
    }


?>
        
             
            </form>
        </div>
</div>

<script src="Ajax.js"></script>
<script src="fonction.js"></script>
<script src="ServeurAjaxControleQte.js"></script>


    </body>
</html>