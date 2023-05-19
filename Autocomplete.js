   var cat=document.getElementById("cat");
  var autoc=document.getElementById('autoc');
     var fatigue=document.getElementById('search');
         autoc.style.visibility='hidden';
     fatigue.addEventListener("keyup",function(e){
     // autoc.innerHtML=nom.value;
       //autoc.style.visibility='visible';
      
       var nt=fatigue.value;
       var ct=cat.value;
       var url="listeproduit.php";
      //  var xhr=new XMLHttpRequest();
       infos='?nom='+nt+'&cat='+ct;
       url+=infos;
       var x=new XMLHttpRequest();
       x.open('GET',url); 
       x.send(null);
      //  var url="listeproduit.php";
      //  xhr.open('POST',url);
      //  xhr.setRequestHeader("Content-Type",

      //  "application/x-www-form-urlencoded");
      //   xhr.send("nom="+nt+"cat="+ct);
        // xhr.send("cat="+ct);
        x.onreadystatechange=function(){
          if(x.readyState==4 && x.status==200);{
          autoc.innerHTML=x.responseText;

          autoc.style.visibility='visible';
          }
        }
        
       
        // var tds=document.querySelectorAll('#autoc td');
        // var n=tds.length;
        // var i=0;
        // for(i=0;i<n;i++){
        //   td=tds[i];
        //   td.addEventListener('click',function(){
        //     this.style.backgroundColor='yellow';
        //   },false);
        // }
        // td.addEventListener('click',function(){
        //   fatigue.value=this.innerHTML ;
        // },false);
     
      


     },false);


    

