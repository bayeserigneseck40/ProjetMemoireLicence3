<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body>

    <?php
    include "connect_BD.php";
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit_state = true;
    
    $result = $connect->query("SELECT * FROM personnes WHERE id_personne=$id");

        $ligne=$result->fetch();

        
      $nom = $ligne['nom'];
      $prenom = $ligne['prenom'];
      $adresse=$ligne['adresse'];
      $email = $ligne['email'];
      $login = $ligne['login'];
    }






?>
        <div id="cont">
        <div id="container">
            <!-- zone de connexion -->
            
            <form action="" method="POST">
                <h4>Ajouter un Agent</h4>
                <p><label><b>Prenom</b></label>
                <input type="text" placeholder="Entrer le prenom" name="prenom" required value="<?php echo $prenom ?>"></p>
                <p><label><b>Nom</b></label>
                <input type="text" placeholder="Entrer le nom" name="nom" required  value="<?php echo $nom ?>"></P>
                <p><label><b>Adresse</b></label>
                <input type="text" placeholder="Entrer l'addresse du L'agent" name="Adr" required  value="<?php echo $adresse ?>"></p>
               <p> <label><b>Gmail</b></label>
                <input type="mail" placeholder="Entrer le mail de l'agent" name="gmail" required  value="<?php echo $email ?>"></p>
               <p> <label><b>Login</b></label>
                <input type="text" placeholder="Entrer le login"  name="login" required  value="<?php echo $login ?>"></p>
               <p><label><b>Password</b></label>
                <input type="password"  name="password" id="code" placeholder="Entrer le mot de pass"  required></p>
                <input type="hidden"  name="role"  required value="Agent">
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
    </body>
</html>