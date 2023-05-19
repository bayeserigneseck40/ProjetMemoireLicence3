$(document).ready(function() {
            $('#prixU').change(function() {
            //On récupère la DE
            var value = $(this).val();
                    //Index
                    var i = 0;
            //On prépare l'Ajax
            $.ajax({
                    //On indique le fichier ou aller consulter
            url: "traitements.php",
                    //Le type de l'envoi (POST ou GET)
            type: "POST",
                    //On indique que le résultat sera un tableau JSON     
            dataType: "JSON",
            //On lui donne le nom de la DE
                    data: {DE : value},
                success:function(data)
                {
                                //Nécessite d'avoir les informations du tableau dans le
                                //même ordre que les inputs
                                $('input.ajax').each(function(){
                                                $(this).val(data[i]);
                                    i++;
                                });
                }
            });
        });
    });