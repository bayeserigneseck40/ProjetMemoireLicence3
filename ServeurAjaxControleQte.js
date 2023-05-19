
var qte=document.getElementById("qte");
var val=document.getElementById("val");
qte.addEventListener("blur",function(){
  var n=qte.value;
  var np=val.value;
  var url="ClientAjaxControleQte.php";

infos='?valeur='+n+'&medoc='+np;
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