<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script typee="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    </head>
    <body>
        <div id="container">
            <!-- zone de connexion -->
            
            <form action="" method="POST" enctype="multipart/form-data">
                <h4>poursuivez votre inscription</h4>
                <p><label><b>nom</b></label>
                <input type="text" placeholder="Entrer le nom de la pharmacie" name="nom" required/></p>
                <p><label><b>Adresse</b></label>
                <input type="text" placeholder="Entrer l' adresse de la pharmacie" name="adr" required></P>
                <p><label><b>ville</b></label>
                <input type="text" placeholder="Entrer votre departement" name="depart" required></P>
                <p><label><b>Description</b></label>
                <textarea  placeholder="Entrer une description de la pharmacie" name="desc" required></textarea></P>
                <p><label><b>photo</b></label>
                <input type="file"  name="photo[]" multiple  required/></P>
                <input type="submit" id="submit" value="Enregistrer" />
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
            </form>
            <script src="testmapajax.js"></script>
        </div>
    </body>
</html>