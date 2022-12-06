<?php
session_start();
var_dump($_SESSION);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Road Map</title>
    <style>#g-path path{fill:none;stroke:#231f20;stroke-miterlimit:10;stroke-width:5px;}</style>
</head>
<body>
  
<svg id="g-path"xmlns="http://www.w3.org/2000/svg" viewBox="0 0 553.21 409.64"><defs></defs>
<path class="back-a" style="stroke:red;" d=""/>
<path class="a" d="m 163.89535,32.193407 171.43976,-1.408586 c 0,0 21.94082,1.081479 21.94079,43.16656 -10e-6,12.501383 0.60607,43.746459 -24.96929,43.746459 H 185.64163 c 0,0 -20.71876,1.15783 -20.71876,43.98135 0,0 0.63416,42.11876 20.71876,42.11876 h 144.82269 c 0,0 26.60287,-2.37443 26.60287,41.74119 0,0 0.32912,38.37673 -26.59083,38.37673 H 185.9828 c 0,0 -20.91945,-0.74672 -20.91945,46.50681 0,0 -0.32512,40.98608 24.57593,40.98608 h 196.31057"/>

</svg>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script>
   $(document).ready(function () {
      $.ajax({
        method: "post",
        url: "./UserData.php",
        data: {"get_user_data":""},
        dataType: "json",
        success: function(data) {
          console.log(data);
        }
      })
   });
   let data=[{
      date:2000,
      goal:"education"
   },{
      date:2002,
      goal:"marriage"
   },{
      date:2004,
      goal:"vacation"
   },{
      date:2005,
      goal:"other"
   },{
      date:2050,
      goal:"retirement"
   },
]
// data.sort((a,b)=>a.date-b.date);
   const goal=document.querySelector("#g-path");
   const g_path=document.querySelector("#g-path .a");
   document.querySelector("#g-path .back-a").setAttribute("d",g_path.getAttribute("d"));
   // console.dir(g_path);
   let start, previousTimeStamp;
   let done = false
   const p_length=g_path.getTotalLength();
   let mid=g_path.getPointAtLength(p_length);
   let steps=g_path.getTotalLength()/data.length;
   // console.log(mid);
   let i=0;
   g_path.style["strokeDasharray"]=p_length
   let g_con=0
   function myLoop() {
      document.querySelector("#g-path .a").style["strokeDashoffset"]=p_length-i;
      if(i==10){
         a=g_path.getPointAtLength(i);
         set_goal(a.x,a.y,`${data[g_con++].date}`);
      }
      if(i%100==0 && data.length-1 > g_con && g_con !=0){
         // a=g_path.getPointAtLength(i);
         // set_goal(a.x,a.y,`${data[g_con++].date}`);
         a=g_path.getPointAtLength(steps);
         steps+=steps;
         set_goal(a.x,a.y,`${data[g_con++].date}`);
         
      }
      if(p_length-100<i && data.length-1 == g_con){
         a=g_path.getPointAtLength(i);
         set_goal(a.x,a.y,`${data[g_con++].date}`);
      }
      
         
      if(p_length<i){
         done=true;
      }
      i+=10;
     
   }
  

function step(timestamp) {
  if (start === undefined) {
    start = timestamp;
    }
  const elapsed = timestamp - start;

  if (previousTimeStamp !== timestamp) {
  
   myLoop()
  }

//   if (elapsed < 10000) { // Stop the animation after 2 seconds
    previousTimeStamp = timestamp;
    if (!done) {
      window.requestAnimationFrame(step);
    }
//   }
}
window.requestAnimationFrame(step);

   function set_goal(x,y,label){
      let c_m=`<circle id="s_goal" cx="${x}" cy="${y}" r="5" stroke="black" stroke-width="3" fill="red" />`;
       c_m +=`<text x="${x}" y="${y}" fill="red">${label}</text>`;
      goal.innerHTML+=c_m;
   }
</script>
</body>
</html>