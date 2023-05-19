
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <!-- CDN Bootstrap CSS V5.0 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
    <style>
        img{
            width:10%;
        }
    </style>
</head>
<body  style="background-color: #18d26e; color: gray;">
<?php
include 'connect_BD.php';
   $sql="select* from medicaments natural join image ";
   $stmt=$connect->query($sql);
   if(isset($_POST['search'])){
       $result=$_POST['search'];
    //    $stmt->execute(array(
    //    'nom'=>$result));
       echo "<table>";

    }



    ?>
   

       <p id="counter"></p>

                <!-- <table class="table" style="color: #fff;"> -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Description</th>
                            <th scope="col">Posologie</th>
                            <th scope="col">Categorie</th>
                            <th scope="col">prix</th>
                            <th scope="col">photo</th>
                            <th scope="col">Ajouter a la commande</th>
                        </tr>
                    </thead>
                    <tbody id="kota">
       <?php
         while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
              
            if(($_POST['search']==$row['nom'])){
                $numero=$row['id_medicament'];
                $nom=$row['nom'];
                $description=$row['description'];
                $posologie=$row['posologie'];
                $categorie=$row['id_categorie'];
                $prix=$row['prix'];
                $im=$row['url'];


echo"<tr class='table-primary'>";
      
echo"<td>$nom</td>";
echo" <td>$description</td>";
echo"<td>$posologie</td>";
echo"<td>$categorie</td>";
echo" <td>$prix</td>";
echo"<td><a href='detail.php?code=$numero'><img src='$im'/></td>";
//    echo"<td><form method='post' action=''>";
//    echo "<input type='hidden' name='ajout' value='$numero' />";
//    echo "<input type='submit' name='ajouter' id='btn1' value='accepter'/>";
//   echo "</form></td>";
echo"<div class='container'>";
echo'<td><input class="btn btn-primary" type="submit" value="Ajouter au panier"></td>';
echo" </div>";
echo"</tr>";

}
}
?>

             </tbody>
         </table>
     </div>
 </div>
</div>


</div>
</body>
</html>