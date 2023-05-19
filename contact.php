<?php
include "menucli.php";


?>
<!DOCTYPE html>
<html>
<head>
	<title>Contact us </title>
<link rel="stylesheet" type="text/css" href="contact.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>
    body{
        margin-top:6%;
    }
    #container{
        border:0px solid red;
        background-image: linear-gradient(-90deg, #1e596b, #54c283); 
        width:100%;
    }
</style>
</head>

<body>
	

<div class="contactus"  >
<div id="cbb">
<h1>Contact Pharmacie</h1>

</div>
</div>
<div id="container">
<div class="container">

<div class="col-md-1"></div>

<div class="col-md-6" >
<form method="post" action="">

<br><br><br>

<input type="text" name="name" title="Your Name" class="name" class="from-control" placeholder="Votre Nom*">
<br>
<br>
<input type="email" name="email"  title="Email Address" class="mail" class="from-control" placeholder="Adresse Email*" style="width:47%;">

&nbsp;&nbsp;<input type="numbers" name="tel" class="mail" title="Number" required class="from-control" placeholder="+221" style="width:50%;">

<br>
<br>

<input type="text" name="message" placeholder="Message" class="message"  title="Message" class="from-control">
<br>
<br>

<br>
<br>
<button type="submit" class="bttn" title="Submit Post"  class="from-control" value="Submit">Submit
</button><br>
</select>

</div>
</form>



<div class="col-md-5"  class="responsive">
<br>
<br>
<br>


<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d883.0604196334008!2d-17.448119170820874!3d14.721870296435409!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTTCsDQzJzE4LjciTiAxN8KwMjYnNTEuMyJX!5e1!3m2!1sfr!2sfr!4v1450346592513" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>




<br>
</div>
</div>
</div>	
<?php
if(isset($_POST['name'])&& isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['message'])){
    $name=$_POST['name']; 
    $email=$_POST['email'];
    $tel=$_POST['tel'];
    $message=$_POST['message'];

    $destination="bayeserigneseck40@gmail.com";
    $sujet="Contacts";
    $message=$message;
    $headers="from:$email";
    mail($destination,$sujet,$message,$headers);   

}


?>

</body>


</html>