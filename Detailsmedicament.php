<?php
include "menucli.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<style >
	#side{
    width: 344px;
		height: 500px;
	}


	body{
    display: flex;
    justify-content: center;
    margin-top: 100px;

		background-image: linear-gradient(-90deg, #1e596b, #54c283);

	}
	#form-div{
		padding: 50px;
		background-color: #fff;
		height: 500px;
		width: 342px;

	}
	h1{
		text-align: center;
		font-family: Freestyle Script;
		color:#555;
		letter-spacing: 1px;
		font-size: 100px;
	}
	#btn{
		width: 230px;
		color: 
	}

	#main{
    height: 500px;
    width: 50%;
    
  }
  img{
      width:90%;
  }
</style>
<body>
    <?php



include 'connect_BD.php';
if(isset($_GET['code'])){
    $voir=$_GET['code'];
    $sql1="SELECT* from medicaments Natural join image where id_medicament=39";
    $stmt=$connect->prepare($sql1);
    $stmt->bindParam(':coder',$voir);
    $stmt->execute();
       while($row=$stmt->fetch()){

               $a=$row['url'];
               $e=$row['description'];
             


       
?>
  <div  id ="main">
	   <div class="row">
	     <div  id="side">
          <div id="demo" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="<?php echo $a  ?>">
              </div>
               <div class="carousel-item">
                 <img src="<?php echo $a  ?>" >
              </div>
              <div class="carousel-item">
                <img src="<?php echo $a  ?>" >
              </div> 
            </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
          </div>
        </div>


      	<!-- <div  id="form-div">
          <h1>Artistic</h1>
          <form >
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
              <label for="pwd">Password</label>
              <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
            </div>
            <div class="form-group form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember"> Remember me
              </label>
            </div>
            <center>
            	<button type="submit" class="btn btn-primary" id="btn">Submit</button>
          	</center>
          </form>
        </div>
    </div>
</div> -->
<?php
}
}
?>

</body>
</html>
