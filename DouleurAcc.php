
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
</style>
</head>

<body>
<div id="contenu">
  
  <div class="container mt-4 shadow-lg">
    <div id="message"></div>
    <div class="row mt-2 pb-3">
      <?php
       if(isset($_SESSION['ph'])){
        $num=$_SESSION['ph'];
      
  			// include '../config.php';
        $connect=new PDO("mysql:host=localhost;port=3306;dbname=pharmacieenligne","baye","seck");
  			// $stmt = $connect->query('SELECT * FROM medicaments natural join image');
              $sql="SELECT* FROM (medicaments join categorie on id_categorie=num_categorie)  join stock on medicaments.id_medicament=stock.id_medicament where nom_categorie='Douleur et Fievre' and stock.num_pharmacie=$num order by nom limit 4";
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
              <h3 class="card-title text-center text-info"><?= $row['nom'] ?></h3>
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
                <button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;<h3>Ajouter au panier
          </h3></button>
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
  </div>
</body>

</html>