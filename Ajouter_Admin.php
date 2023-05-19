<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Fancy Contact Form design and html</title>
<meta name="viewport" content="width=device-width"> <meta name="description" content="Fancy Contact Form | Css3Transition " />
<meta name="keywords" content="Contact form design, fancy contact form in html, best contact form, stylish contact form design and html, tutorial">
<meta name="abstract" content="Contact form design, fancy contact form in html, best contact form, stylish contact form design and html, tutorial">
<meta name="author" content="Rahul Yaduvanshi">
<meta name="technologies" content="HTML5, CSS3, HTML, CSS, JQUERY, PHP,photoshop, design">
<meta name="distribution" content="Global">
<meta name="development" content="Rahul Yaduvanshi">
<meta name="robots" content="index, follow">
<meta name="googlebot" content="index, follow">
<meta name="city" content="New Delhi">
<meta name="country" content="india">
<style>
body{background:url(images/pattern.png) repeat left top;}
form{max-width:518px;width:100%;margin:30px auto;background:teal;border-radius:15px;}
form h1{font-size:27px;color:teal;font-style:italic;line-height:normal;text-align:center;background:teal;text-shadow:1px 1px 1px #151515;padding:20px;border-top-right-radius:15px;border-top-left-radius:15px;margin-bottom:0;}
form .innercontent{padding:10px 30px 30px 30px ;}
form .innercontent .inputfield{max-width:100%;transition:all 0.5 ease;}
form .innercontent .inputfield .input-beauty{background:white;color:#205289;border:1px solid #1f5898;box-shadow:0px 4px 0px #1b4380;border-radius:10px;max-width:100%;font-style:italic;width:96%;line-height:40px;margin-top:25px;font-size:15px; padding:0 2%;}
form .innercontent .inputfield .button-beauty{background:teal;color:#ffffff;border:1px solid #074182;box-shadow:0px 4px 0px #091c3e;border-radius:10px;max-width:100%;font-style:normal;width:100%;line-height:40px;margin-top:25px;font-size:18px; font-weight:bold;}


</style>
</head>
<?php
$connect=new PDO("mysql:host=localhost;port=3306;dbname=pharmacieenligne","baye","seck");
if(isset($_POST['prenom'])&&isset($_POST['nom'])&&isset($_POST['adresse'])&&isset($_POST['email'])
 &&isset($_POST['login'])&&isset($_POST['password'])){
   
    $prenom=$_POST['prenom'];
    $nom=$_POST['nom'];
    $adresse=$_POST['adresse'];
    $email=$_POST['email'];
    $login=$_POST['login'];
    $password=$_POST['password'];
    $role='Administrateur';
    

    // echo $_POST['nom']."\t".$_POST['prenom']."\t".$_POST['adresse']."\t".$_POST['email']."\t".$_POST['login']."\t".$_POST['password'];
    $sql="INSERT INTO personnes(prenom,nom,adresse,email,login,password,role)VALUES
    ('$prenom','$nom','$adresse','$email','$login','$password','$role')";
    $result=$connect->query($sql);
    if($result){
        echo"insertion reussi";
    }

}


?>
<body>
<form method="post" action="Ajouter_Admin.php">
<h1>Ajouter Administrateur</h1>
<div class="innercontent">
<div class="inputfield">
<input class="input-beauty" type="text" placeholder="Prenom*" name="prenom" required/>
</div>
<div class="inputfield">
<input class="input-beauty" type="text" placeholder="Nom*" name="nom" required/>
</div>
<div class="inputfield">
<input class="input-beauty" type="text" placeholder="Adresse*" name="adresse" required/>
</div>
<div class="inputfield">
<input class="input-beauty" type="mail" placeholder="Email ID*" name="email" required/>
</div>
<div class="inputfield">
<input class="input-beauty" type="text" placeholder="login" name="login" required/>
</div>
<div class="inputfield">
<input class="input-beauty" type="password" placeholder="password" name="password" required/>
</div>
<div class="inputfield">
<input class="button-beauty" type="submit" value="Submit"/>
</div>
</div>

</form>
</body>
</html>
