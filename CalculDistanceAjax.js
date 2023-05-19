$(document).ready(function(){
    var lat,lng;
    navigator.geolocation.getCurrentPosition(function(pos){
        lat=pos.coords.latitude;
        lng=pos.coords.longitude;
    });

var d=document.querySelector('#submit');
d=addEventListener('click',function(){
//    alert("BONJOUR");
//    alert('lat:'+lat+'lng:'+lng);
  var url="InsererDistance.php";
//   var n=prompt("nom");
//   var pn=prompt("prenom");
//  n=encodeURIComponent(n);
// pn=encodeURIComponent(pn);
infos='?prenom='+lat+'&nom='+lng;
 url+=infos;
 var x=new XMLHttpRequest();
x.open('GET',url); 
x.send(null);

x.onreadystatechange=function(){
    if(x.readyState==4){
    //    document.write(x.status);
       if(x.status==200){
            // document.write(x.responseText);
        //    document.querySelector('#h1').innerHtML=x.responseText;
       }
   }
}
},false);


  },false);