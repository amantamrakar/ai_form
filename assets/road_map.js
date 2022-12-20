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
                // console.log("hh",el);
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
const gh=400;
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
            console.log(data[k].year-data[k-1].year);
            data[k].py = data[k - 1].py + 60 + ((data[k].year-data[k-1].year)*data.length);
        }
        console.log(data[k].py);
    }
    putHeight=data[data.length-1].py*3;
    if(putHeight <=gh) putHeight=gh;
    
 //   goal.style.marginTop = (gh - putHeight) / 2 + "px"
    goal.style.height = putHeight +20 +"px"
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
    if (i % 100 == 0 && data.length > g_con) {
        a = g_path.getPointAtLength(data[g_con].py);
        // console.log(a.y,data[g_con].py);
        set_goal(a.y, data[g_con]);
        g_con++;
    }
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


// function viewGoal(g) {
//     let gd=allRes[g];
//     let markup="<table style='width: 100%;'>"
//     if(gd["goal_data"]["currentcost"])markup+=`<tr><td>current cost</td> <td> ${gd["goal_data"]["currentcost"]}</td></tr>`
//     if(gd["goal_data"]["goalname"])markup+=`<tr><td>goal name</td> <td> ${gd["goal_data"]["goalname"]}</td></tr>`
//     if(gd["goal_data"]["futureage"])markup+=`<tr><td>future age</td> <td> ${gd["goal_data"]["futureage"]}</td></tr>`
//     if(gd["goal_data"]["inflation"])markup+=`<tr><td>inflation</td> <td> ${gd["goal_data"]["inflation"]}</td></tr>`
//     if(gd["goal_data"]["ansinputs"])markup+=`<tr><td>investment value</td> <td> ${gd["goal_data"]["ansinputs"]}</td></tr>`
//     if(gd["goal_data"]["sipvalue"])markup+=`<tr><td>sip value</td> <td> ${gd["goal_data"]["sipvalue"]}</td></tr>`
//     markup+="</table>"
//     $("#show-goal .modal-body").html(markup);
//     $("#show-goal").modal("show");
// }

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
    const width= 80;
    const height=42;
    let c_m =`<g id="goal-${text.id}" class="goal-box">`;
    if (ls > 0 ){
        py = mid + (74 * ls);
    }
    else{
        py = mid + (74 * ls) - 80;
    }

    c_m += `<path d="M ${mid},${y} H ${mid+(74*ls)}" class="v-line" />
        <rect  x="${py}" y="${y-20}" style="fill:var(--${text.goal})" ry="6" height="${height}" width="${width}" class="g-box show_btn" data-bs-toggle="modal" data-bs-target="#show-gloal-data" data-gid="${text.id}"/>
        <rect x="${py}" y="${y-20}" ry="6" height="14" width="${width}" class="g-label"></rect>
        <image href="./images/${text.goal}_b.svg" x="${py+width-20}" y="${y-20}" height="14" width="14" />
        <foreignObject x="${py-4}" y="${y-24}" class="box-action" height="50">

        <div class="a-btn">
        <img src="pen-to-square-solid.svg" alt="" class="update_goal" data-bs-toggle="modal" data-bs-target="#show_update_goal" data-gid="${text.id}">
        <img src="xmark-solid.svg" alt="" class="delete_btn" data-gid="${text.id}" data-callback="deleteGoal">
        </div>
    </foreignObject>

    <text class="goal-text">
    <tspan class="road-year" x="${mid + (35*ls)}" y="${y-2}" >${text.year}</tspan>
        <tspan x="${py+20}" style="fill:var(--${text.goal})" y="${y-10}" >${text.goal}</tspan>
        <tspan x="${py+20}" y="${y+8}" style="font-size:6px;">${(+allRes[text.id].goal_data.ansinputs.replace(/,/g,'')).toLocaleString("en-IN", {style:"currency", currency:"INR"})}</tspan>
        </text>
        </g>`;
    goal.insertAdjacentHTML("beforeend",c_m)
    if(innerWidth>700){
        ls = -ls;
    }
}