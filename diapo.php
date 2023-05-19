<? session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
    <style>
        img{
            width:100%;
        }
        body{
            margin-top:5%;
        
            
        }
    </style>
</head>


<body>



    <img name="diapo">
    <script>
        var images=[];
        images[0]="medicine.jpg";
        images[1]="pharma.jpg";
        images[2]="pharmacie.jpg";
        images[3]="istockphoto.jpg";
        var i=0;
        function changeImage(){
            document.diapo.src=images[i];
            if(i<images.length-1){
                    i++;
            }
            else{
                i=0;
            }
            setTimeout("changeImage()",3000)
        }
        window.onload=changeImage;
        function AlertMessage(){
            alert("Bienvenu Chez Pharmacie En Ligne");
        }
        setTimeout("AlertMessage()",3000);
    </script>
</body>
</html>