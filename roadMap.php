<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>road map</title>
    <style>
        .road-map {
            display: flex;
            justify-content: center;
        }

        #g-path {
            min-width: 945px;
        }

        .goal-box {
            cursor: pointer;
            position: relative;
            transform-origin: center;
            animation: box 1s ease-in 1;
        }
        @keyframes box{
            0%{
                transform: scaleX(0);
            }
            100%{
                transform: scaleX(1);
            }
        }
        #g-path rect {
            fill: transparent;
            stroke-width: 2;
            stroke: #4949ff;
            stroke-opacity: 1;
            width: 80px;
            height: 42px;
        }

        #g-path rect:hover {
            stroke-width: 3;
            fill: #eeeeff;
        }

        #g-path #h-line {
            fill: none;
            stroke: #000000;
            stroke-width: 2.5;
            stroke-linecap: butt;
            stroke-linejoin: miter;
            stroke-opacity: 1;
            stroke-miterlimit: 4;
        }

        #g-path .v-line {
            fill: none;
            stroke: #000000;
            stroke-width: 2.5;
            stroke-linecap: butt;
            stroke-linejoin: miter;
            stroke-opacity: 1;
            stroke-miterlimit: 4;
            stroke-dasharray: none
        }

        #g-path text {
            pointer-events: none;
            text-transform: capitalize;
            font-size: 10.5833px;
            line-height: 1.25;
            font-family: sans-serif;
            fill: #970000;
            fill-opacity: 1;
            stroke: none;
            stroke-width: 0.264583;
            stroke-opacity: 1
        }

        #cybox {
            width: 100%;
            height: 50px;
            text-align: center;
        }

        #cybox #current-year {
            color: #ffffff;
            background-color: #6868ff;
        }

        .box-action {
            width: 20px;
        }

        .a-btn {
            display: flex;
    flex-wrap: nowrap;
    height: 100%;
    flex-direction: column;
    justify-content: space-between;
        }

        .box-action img {
            box-sizing: content-box;
            vertical-align: baseline;
            width: 10px;
            height: 10px;
            background-color: white;
            border: 2px solid #4949ff;
            border-radius: 25px;
            padding: 10%;
        }

        .box-action img:hover {
            background-color: pink;
        }
    </style>
</head>

<body>
    <div class="road-map">
        <svg id="g-path" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 400" preserveAspectRatio="xMidYMin meet">
            <foreignObject id="cybox">

                    <div href='#' id="current-year"></div>
            </foreignObject>
            <g id="goals">
                <path d="M 26,26 V 500" id="h-line" />

            </g>
        </svg>
    </div>
    <button type="button">Next</button>
    <div class="modal fade" id="show-goal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="./bootstrap.min.js"></script>
    <script>
        const data = []
        let allRes={};
        const date = new Date();
        const goal = document.querySelector("#g-path");
        let g_path = document.querySelector("#g-path #h-line");
        let mid = 250;
        let p_length;
        $(document).ready(function() {
            $.ajax({
                method: "post",
                url: "./UserData.php",
                data: {
                    "get_user_data": "all"
                },
                dataType: "json",
                success: function(res) {
                    res = res
                    let toYear = date.getFullYear();
                    res.forEach(el => {
                        allRes[el.id]=el;
                        let year = toYear + (+el["goal_data"]["futureage"] || +el["goal_data"]["rateretire"])
                        data.push({
                            year: year,
                            goal: el["goal"],
                            id: el["id"]
                        })
                    })
                    data.sort((a, b) => a.year - b.year);
                    init()
                   

                }
            });
        });
        
        let steps;
        const gh=goal.clientHeight;
        let start, previousTimeStamp;
        let done = false;
        let i = 0;
        let g_con = 0
        let ls = 1;
        let goalGap=30
        function init() {
            // goal.clientHeight=gh
            done = false;
            i = 0;
            g_con = 0
            // let putHeight = data.length * 180
            
            $(".goal-box").remove();
            document.querySelector("#current-year").innerHTML = `<tspan x="${mid}" y="14"  text-anchor="middle">${date.getFullYear()}</tspan>`;
            // g_path.getTotalLength()
            if(innerWidth<700){
                mid=150;
                ls=1
                goalGap=50
            }else{
                mid=250;
            }
            data[0].py = 30
            for (let k = 1; k < data.length; k++) {
                if (data[k].year == data[k - 1].year) {
                    data[k].py = data[k - 1].py + goalGap;
                } else {
                    console.log((data[k].year-data[k-1].year)*1);
                    data[k].py = data[k - 1].py + 60 + ((data[k].year-data[k-1].year)*data.length);
                }
            }
            putHeight=data[data.length-1].py*4;
            if(putHeight <=gh) putHeight=gh;
            
         //   goal.style.marginTop = (gh - putHeight) / 2 + "px"
            goal.style.height = putHeight  +"px"
            const hLine = `<path d="M ${mid},25 V ${putHeight}" id="h-line" />`
            document.querySelector("#goals").innerHTML = hLine;
            g_path =document.querySelector("#g-path #h-line")
            p_length=g_path.getTotalLength()
            steps = p_length / data.length;
            g_path.style["strokeDasharray"] = p_length
            window.requestAnimationFrame(step);
        }
        // console.dir(g_path);
        

        function myLoop() {
            document.querySelector("#g-path #h-line").style["strokeDashoffset"] = p_length - i;
            // if (i == 10) {
            //     a = g_path.getPointAtLength(i);
            //     set_goal(a.y, data[g_con++]);
            // }
            if (i % 100 == 0 && data.length > g_con) {
                a = g_path.getPointAtLength(data[g_con].py);
                // console.log(a.y,data[g_con].py);
                set_goal(a.y, data[g_con]);
                // document.querySelector(`#g-path .goal-box#goal-${data[g_con].id}`).classList.add("active");
                // setInterval(()=>{
                // },1000)
                g_con++;
            }
            // $(`.goal-box`).css(`transform:scaleX(0.${g_con})`);
            if (p_length-6 <= i) {
                
                done = true;
            }
            i += 10;
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
        

        function viewGoal(g) {
            let gd=allRes[g];
            // console.log(g,gd);
            let markup="<table style='width: 100%;'>"
            // for(let el in gd["goal_data"]){
            //     markup+=`<tr><td>${el}</td> <td> ${gd["goal_data"][el]}</td></tr>`
            // }
            if(gd["goal_data"]["currentcost"])markup+=`<tr><td>current cost</td> <td> ${gd["goal_data"]["currentcost"]}</td></tr>`
            if(gd["goal_data"]["goalname"])markup+=`<tr><td>goal name</td> <td> ${gd["goal_data"]["goalname"]}</td></tr>`
            if(gd["goal_data"]["futureage"])markup+=`<tr><td>future age</td> <td> ${gd["goal_data"]["futureage"]}</td></tr>`
            if(gd["goal_data"]["inflation"])markup+=`<tr><td>inflation</td> <td> ${gd["goal_data"]["inflation"]}</td></tr>`
            if(gd["goal_data"]["ansinputs"])markup+=`<tr><td>investment value</td> <td> ${gd["goal_data"]["ansinputs"]}</td></tr>`
            if(gd["goal_data"]["sipvalue"])markup+=`<tr><td>sip value</td> <td> ${gd["goal_data"]["sipvalue"]}</td></tr>`
            markup+="</table>"
            $("#show-goal .modal-body").html(markup);
            $("#show-goal").modal("show");
        }

        function editGoal(g) {

        }
        function deleteGoal(g) {
            $(`#goal-${g}`).remove();
            delete allRes[g];
            data.indexOf(g)
            data.splice(data.findIndex(e=>e.id==g),1);
            init()
        }

        function set_goal(y, text) {
            let c_m =`<g id="goal-${text.id}" class="goal-box">`;
            if (ls > 0 ){
                // c_m +=``
                py = mid + (74 * ls);
            }
            else{
                py = mid + (74 * ls) - 80;
                // c_m +=`<g id="goal-${text.id}" class="goal-box actol">`
            }

            c_m += `<path d="M ${mid},${y} H ${mid+(74*ls)}" class="v-line" />
                <rect  x="${py}" y="${y-20}" ry="6.3933463" height="50"/>
                <foreignObject x="${py-4}" y="${y-24}" class="box-action" height="50">

                <body xmlns="http://www.w3.org/1999/xhtml">
                <div class="a-btn">
                <img src="eye-solid.svg" alt="" onclick="viewGoal('${text.id}')">
                <img src="xmark-solid.svg" alt="" onclick="deleteGoal('${text.id}')">
                </div>
                </body>
            </foreignObject>

                <text>
                <tspan x="${py+20}" y="${y-7}" >${text.year}</tspan>
                <tspan x="${py+20}" y="${y+4}" >${text.goal}</tspan>
                <tspan x="${py+20}" y="${y+16}" >${(+allRes[text.id].goal_data.ansinputs.replace(/,/g,'')).toLocaleString("en-IN", {style:"currency", currency:"INR"})}</tspan>
                </text>
                </g>`;
                // <tspan x="${py+40}" y="${y-6}" text-anchor="middle">${text.year}</tspan>
            //    c_m +=`<text x="${x}" y="${y}" fill="red">${label}</text>`;
            goal.insertAdjacentHTML("beforeend",c_m)
            // goal.innerHTML += c_m;
            if(innerWidth>700){
                ls = -ls;
            }
        }
        window.addEventListener("resize",init)
    </script>

</body>

</html>