

             function change(){
              var q=document.getElementById('qte');
              var prix=document.getElementById('prixU');
              var prT=document.getElementById('prixT');     
              q.value="";
              prix.value="";
              prT.value="";
               var pn = document.getElementById('val').options[document.getElementById('val').selectedIndex].value;
              pn=encodeURIComponent(pn);
               var x=new XMLHttpRequest();
               var url="Ajaxform.php";
               infos='?val='+pn;
                url+=infos;
                x.open('GET',url); 
                x.send();
                x.onreadystatechange=function(){
                   if(x.readyState==4){
                      if(x.status==200){
                        document.getElementById('prixU').value=x.responseText;
                          // document.write(x.responseText);
                      }
                  }
              }
            }