
<?php
session_start();
if(isset($_GET['val'])){
    $n=$_GET['val'];
    $_SESSION['ph']=$n;
}
// echo "<br/>";
// $connect=new PDO("mysql:host=localhost;port=3306;dbname=pharmacieenligne","baye","seck");
// if($connect){
   
//     $req="Select prix from medicaments where id_medicament='$n'  ";
//     $res=$connect->query($req);
//     if($res){
//         if($row=$res->fetch()) {
//             $pr=$row['prix'];
//             // echo '<input type="text" value="'.$row["prix"].'" disabled>';
//             // header("location:Vente.php?pr=$pr");
//            echo $pr;
//         }
        
//     }
// }

?>