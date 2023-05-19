<?php
session_start();
 include "menucli.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Recherche Pharmacie</title>
    <link rel="stylesheet" href="style2ph.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

      <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>
    <!-- <script src="CalculDistanceAjax.js">
    </script> -->
    <style>
      body{
        background-image:url("drug2.jpg");
        background-repeat:no-repeat;
      
      }
    </style>
      
  </head>
  <?php
  $id=$_SESSION['ph'];

  ?>

  <body >
    <div class="wrapper">
      <div class="search-input">
        <a href="" target="_blank" hidden></a>
        <input type="text" id="cont" placeholder="Entre une Region...">
        <div class="autocom-box">
          <!-- here list are inserted from javascript -->
        </div>
        <div class="icon"><i id="icon" class="fas fa-search"></i></div>
      </div>
    </div>
    <div  id="response">
      
</div>

    <script src="js/script.js"></script>
     <script>
      var icon=document.getElementById("icon");
      var cont=document.getElementById("cont");
      cont.addEventListener("keyup",function(){
        var n=cont.value;
        var url="traitergarde.php";
   
     infos='?valeur='+n;
      url+=infos;
      var x=new XMLHttpRequest();
    x.open('GET',url); 
    x.send(null);
    
    x.onreadystatechange=function(){
         if(x.readyState==4){
            // document.write(x.status);
            if(x.status==200){
                // document.write(x.responseText);
                document.querySelector('#response').innerHTML=x.responseText;
            }
        }
};
    
       
      },false);

    </script>
  
  <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

      <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>
     <script src="CalculDistanceAjax.js">
    </script>  
    
  </body>

</html>
