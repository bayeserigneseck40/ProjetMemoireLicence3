<!DOCTYPE html>
<html lang="en">

<head>
    <title>Light & Dark Themes on Toggle</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        li a{
            font-style:italic;
        }
        a:hover{
                     font-size:20px;
                     font-style:italic;
                     background-color:SeaGreen;

        }
        h3{
            
            font-style:italic;
        }
        h1{
            font-style:italic;
        }
        nav{
            position:fixed;
            background-color:SeaGreen;
        }
    </style>
</head>

<body style="background-color: #18d26e;">

  <nav  class="navbar navbar-expand-sm navbar-light bg-light">
   <h2  style="background-color: SeaGreen;font-style:italic;">Pharmacie En Ligne</h2>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapseNavbarid"
    aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapseNavbarid">
      <ul class="navbar-nav mr-auto mt-2 w-50 d-flex justify-content-around">
        <li class="nav-item active">
          <a class="nav-link font-weight-bold" href="menuprincipal.php">Accueil<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link font-weight-bold" href="inscript.php">Inscription</a>
        </li>
        <li class="nav-item">
          <a class="nav-link font-weight-bold" href="login.php">Connexion</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link font-weight-bold" href="#">Help</a>
        </li> -->
      </ul>
<!-- 
    <div class="custom-control custom-switch mr-5">
      <input type="checkbox" class="custom-control-input" id="selector">
       <label class="custom-control-label" for="selector">Dark Mode</label>
    </div> -->
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search..">
      <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Search</button>
    </form>

    </div>
  </nav>
<?php
include "carrous.html";


?>
  


<script>

   $(document).ready(function(){
      $("#selector").change(function(){
        $("body").toggleClass("bg-secondary");
        $("nav").toggleClass("navbar-dark bg-dark");
        $(".custom-control-label").toggleClass("text-white");
        $("h1").toggleClass("text-white");
        $("h5").toggleClass("text-white");
      });
   });
</script>







</body>

</html>
