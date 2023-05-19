<?php

session_start();
?>
<?php include 'menucli.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Shopping Cart System</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
<style>
     #contenu{
            background-image:url('istockphoto.JPG');
        }
    .jumbotron{
        margin-top:6%;
    }
    #rech{
            margin-left:75%;
           
        }
        #autoc{
          width:18%;
          margin-left:72%;
          background-color:white;
          position:absolute;
          z-index:4;
          top:69%;
       
        }

        #container{
             z-index: 3;
             margin-top:0%;
             vertical-align:top;
             position:relative;
            
        }
h1{
          font-size:60px;
          text-align:center;
          font-weight:bold;
          font-family:'Times New Roman', Times, serif;
        }
     
</style>
</head>

<body>
<div id="contenu">
  <!-- Navbar start -->
  <div class="container" id="container">
            
            <div class="jumbotron">
                <h1  style="color: SeaGreen;">Dalal Ak Diame Ci Sen Pharmacie!</h1>
                <!-- <p>We have the best medicaments for you. No need to hunt around, we have all in one place.</p> -->
                
            </div>
             
        </div>
        <nav class="navbar navbar-expand-sm bg-white navbar-white">
            <form id="rech"  class="form-inline" action="test.php">
            <input class="form-control mr-sm-2" id="cat" name="cat" id="cat" type="hidden" value="Fatigue">
              <input class="form-control mr-sm-2" name="search" type="search" id="search"  required placeholder="Rechercher">
              <button class="btn btn-success" type="submit">cliquez</button>
            </form>
        </nav>
        <div class="shadow-lg p-3 mb-5 bg-white rounded" id="autoc"></div>
  <nav id="navC" class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand" href="#"><i class="fal fa-briefcase-medical"></i>&nbsp;&nbsp;Nos Medicaments</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link active" href="AnnulerCommande.php"><i class="fal fa-briefcase-medical mr-2"></i>commande en cours</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-th-list mr-2"></i></a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="checkout.php"><i class="fas fa-money-check-alt mr-2"></i>regler la commande</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Navbar end -->
  
  <!-- Displaying Products Start -->
  <div class="container">
    <div id="message"></div>
    <div class="row mt-2 pb-3">
      <?php
     if(isset($_SESSION['ph'])){

   
      $id=$_SESSION['ph'];
  			include 'config.php';
  			// $stmt = $connect->query('SELECT * FROM medicaments natural join image');
              $sql="SELECT* FROM (medicaments join categorie on id_categorie=num_categorie)  join stock on medicaments.id_medicament=stock.id_medicament where nom_categorie='Fatigue'and stock.num_pharmacie=$id order by nom";
               $result=$connect->query($sql);
  			// $result = $stmt->get_result();
  			while ($row = $result->fetch()):
                $numero=$row['id_medicament'];
                $nom=$row['nom'];
                $prix=$row['prix'];
                $etat=$row['etat'];

           $reqim="SELECT url from image where id_medicament=$numero";
           $resIn=$connect->query($reqim);
           if($resIn){
           $l=$resIn->fetch();
            $im=$l[0];
         //$ID=$l['id'];
           }
  		?>
      <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
        <div class="card-deck">
          <div class="card p-2 border-secondary mb-2">
          <td><a href='detailsCommande.php?code=<?php echo $numero ?>'><img src="<?= $im?>" class="card-img-top" height="250"></a>
            <div class="card-body p-1">
              <h4 class="card-title text-center text-info"><?= $row['nom'] ?></h4>
              <h5 class="card-text text-center text-danger"><i class="fad fa-sack"></i>&nbsp;&nbsp;<?= number_format($row['prix'],2) ?>fcfa</h5>

            </div>
            <div class="card-footer p-1">
              <form action="" class="form-submit">
                <div class="row p-2">
                  <div class="col-md-6 py-1 pl-4">
                    <b>Quantite : </b>
                  </div>
                  <div class="col-md-6">
                    <input type="number" class="form-control pqty" min="1" value="<?= $row['product_qty'] ?>">
                  </div>
                </div>
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <input type="hidden" class="pname" value="<?= $row['nom'] ?>">
                <input type="hidden" class="pprice" value="<?= $row['prix'] ?>">
                <input type="hidden" class="pimage" value="<?= $im ?>">
                <input type="hidden" class="pcode" value="<?= $row['id_medicament'] ?>">
                <button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Ajouter au panier
                  </button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; 
        }?>
    </div>
  </div>
  <!-- Displaying Products End -->

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Send product details in the server
    $(".addItemBtn").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var pid = $form.find(".pid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pimage = $form.find(".pimage").val();
      var pcode = $form.find(".pcode").val();

      var pqty = $form.find(".pqty").val();

      $.ajax({
        url: 'action.php',
        method: 'post',
        data: {
          pid: pid,
          pname: pname,
          pprice: pprice,
          pqty: pqty,
          pimage: pimage,
          pcode: pcode
        },
        success: function(response) {
          $("#message").html(response);
          window.scrollTo(0, 0);
          load_cart_item_number();
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
  <script src="Autocomplete.js"></script>
  </div>
</body>

</html>