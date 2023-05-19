

             function change(){
              
                 var pn = document.getElementById('val').options[document.getElementById('val').selectedIndex].value;
                pn=encodeURIComponent(pn);
                 var x=new XMLHttpRequest();
                 var url="AjaxControleph.php";

                 infos='?val='+pn;
                  url+=infos;
                  x.open('GET',url); 
                  x.send();
                  x.onreadystatechange=function(){
                     if(x.readyState==4){
                        if(x.status==200){
                       
                        }
                    }
                }
              }