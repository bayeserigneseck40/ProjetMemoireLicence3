<html>
    <head>
       <meta charset="utf-8">
       <style>
          
       </style>
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style2.css" media="screen" type="text/css" />
    </head>
    <body>
        <div id="cont">
        <div id="container">
            <!-- zone de connexion -->
            
            <form action="" method="POST" enctype="multipart/form-data">
                <h1></h1>
                <p><label><b>Nom</b></label>
                <input type="text" placeholder="Entrer le nom du medicament" name="nom" required></p>
                <p><label><b>description</b></label>
                <input type="text" placeholder="Entrer la description" name="des" required></P>
                <p><label><b>posologie</b></label>
                <input type="text" placeholder="Entrer la posologie" name="pos" required></p>
               <p> <label><b>id_categorie</b></label>
                <input type="number" placeholder="Entrer la categorie" name="cat" required></p>
               <p> <label><b>prix</b></label>
                <input type="decimal" placeholder="Entrer le prix" name="prix" required></p>
                <p> <label><b>Quantite</b></label>
                <input type="number" placeholder="Entrer la quantite" name="qte" required></p>
               <p> <label><b>Photo</b></label>
                <input type="file"  name="photo[]" placeholder="Entrer une image" multiple required>
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