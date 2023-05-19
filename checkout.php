<?php
	require 'config.php';
  include 'menucli.php';

	$grand_total = 0;
	$allItems = '';
	$items = [];

	$sql = "SELECT CONCAT(product_name, '(',qty,')') AS ItemQty, total_price FROM cart";
	$stmt = $connect->query($sql);
	// $stmt->execute();
	// $result = $stmt->get_result();
	while ($row = $stmt->fetch()) {
	  $grand_total += $row['total_price'];
	  $items[] = $row['ItemQty'];
	}
	$allItems = implode(', ', $items);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Checkout</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
<style>
  #com{
    margin-top:7%;
  }
  body{
  /* background-image:url("medicine.jpg"); */
  background-image: linear-gradient(-90deg, #18d26e, #54c283); 
}
</style>

</head>

<body>
  <nav id="com" class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#"><i class="fal fa-briefcase-medical"></i>&nbsp;&nbsp;Nos Medicaments </a>
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link active" href="#"><i class="fal fa-briefcase-medical"></i>medicaments</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-th-list mr-2"></i></a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="checkout.php"><i class="fas fa-money-check-alt mr-2"></i>Regler la commande</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 px-4 pb-4" id="order">
        <h4 class="text-center text-info p-2">Completer votre commande!</h4>
        <div class="jumbotron p-3 mb-2 text-center">
          <h6 class="lead"><b>medicament(s) : </b><?= $allItems; ?></h6>
          <h6 class="lead"><b> frais de Livraison : </b>gratuit</h6>
          <h5><b>Montant total a payer : </b><?= number_format($grand_total,2) ?>fcfa</h5>
        </div>
        <form action="action.php" method="post"  enctype="multipart/form-data" id="placeOrder">
          <input type="hidden" name="products" value="<?= $allItems; ?>">
          <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Entrer Nom" required>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Entrer E-Mail" required>
          </div>
          <div class="form-group">
            <input type="tel" name="phone" class="form-control" placeholder="Entrer le numero de telephone" required>
          </div>
         <div class="form-group">
            <input type="file" name="photo[]"  class="form-control" multiple>
          </div>
          <div class="form-group">
            <textarea name="address" class="form-control" rows="3" cols="10" placeholder="Enter l'adresse de livraison"></textarea>
          </div>
          <h6 class="text-center lead">Selectionner Le Mode de Payement</h6>
          <div class="form-group">
            <select name="pmode" class="form-control">
              <option value="" selected disabled>-Selectionner Le Mode de Payement-</option>
              <option value="orange Money">Orange Money</option>
              <option value="Tigo cash">Tigo Cash</option>
              <option value="livraison">A la Livraison</option>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" value="Placer la commande" class="btn btn-success btn-block">
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Envoi des données du formulaire au serveur
    // $("#placeOrder").submit(function(e) {
    //   e.preventDefault();
    //   $.ajax({
    //     url: 'action.php',
    //     method: 'post',
    //     data: $('form').serialize() + "&action=order",
    //     success: function(response) {
    //       $("#order").html(response);
    //     }
    //   });
    // });

    
     //Charger le nombre total d'articles ajoutés dans le panier et afficher dans la barre de navigation
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
  <?php
   include 'footer.php';
   ?>
</body>

</html>
