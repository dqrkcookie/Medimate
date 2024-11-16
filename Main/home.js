function Menu(){
    document.querySelector(".content-1").style.display = "block";
    document.querySelector(".content-2").style.display = "none";
    document.querySelector(".content-3").style.display = "none";
    document.querySelector(".content-4").style.display = "none";
    document.querySelector(".Sure").style.display = "none";
    pop_down_button()
}

function Sched(){
    document.querySelector(".content-1").style.display = "none";
    document.querySelector(".content-2").style.display = "block";
    document.querySelector(".content-3").style.display = "none";
    document.querySelector(".content-4").style.display = "none";
    document.querySelector(".Sure").style.display = "none";
    pop_down_button()
}

function History(){
    document.querySelector(".content-1").style.display = "none";
    document.querySelector(".content-2").style.display = "none";
    document.querySelector(".content-3").style.display = "block";
    document.querySelector(".content-4").style.display = "none";
    document.querySelector(".Sure").style.display = "none";
    pop_down_button()
}

function Profile(){
    document.querySelector(".content-1").style.display = "none";
    document.querySelector(".content-2").style.display = "none";
    document.querySelector(".content-3").style.display = "none";
    document.querySelector(".content-4").style.display = "block";
    document.querySelector(".Sure").style.display = "none";
    pop_down_button()
}

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("log-out").addEventListener("click", function() {
        document.querySelector(".Sure").style.display = "block";
    });
});
document.getElementById("N").addEventListener("click", function(){
    document.querySelector(".Sure").style.display = "none";
});

document.querySelector("#pass").style.display = "none";
document.querySelector("#edit").addEventListener("click", function(){
    document.querySelector("#edit").style.display = "none";
    document.querySelector("#pass").style.display = "block";
});

document.querySelector("#pass").addEventListener("click", function(){
    document.querySelector("#edit").style.display = "block";
    document.querySelector("#pass").style.display = "none";
});

console.log(document.querySelectorAll("input"));

let inputs = document.querySelectorAll("input");
for(b = 0; b <= inputs.length-1; b++){
    inputs[b].disabled = true;
    inputs[b].style.cursor = "not-allowed";
//INITIALLY DISABLE THE PROFILE FORM
    if(inputs[b] === document.querySelector("#edit") ||  inputs[b] === document.querySelector("#set-time-m") || inputs[b] === document.querySelector("#set-time-n") || inputs[b] === document.querySelector("#set-time-e") || inputs[b] === document.querySelector("#sub-sched")|| inputs[b] === document.querySelector("#Y")){
        inputs[b].disabled = false;
        inputs[b].style.cursor = "pointer";
    }
}

let d = document.querySelector("#up");
let e = document.querySelector("#pic");

d.style.display = "none";
e.style.display = "none";

function editDisable(){
    let form = document.querySelectorAll("input");
    console.log(form);

    let i = 0;
//TO ENABLE THE FORM
    while(i < form.length){
        form[i].disabled = false;
        i+=1;
    }
}

document.querySelector("#edit").addEventListener("click", function(){
    editDisable();

    d.style.display = "block";
    e.style.display = "block";
// THIS IT TO MANIPULATE THE INPUT TYPES TAG
    let inputs = document.querySelectorAll("input");
    for(b = 0; b <= inputs.length-1; b++){
        inputs[b].disabled = false;
        inputs[b].style.cursor = "text";

        if(inputs[b] === document.querySelector("#e")){
            inputs[b].style.cursor = "default";
        }
        if(inputs[b] === document.querySelector("#pass") || inputs[b] === d || inputs[b] === e){
            inputs[b].style.cursor = "pointer";
        }
    }
});

let p = document.querySelector("#pass");

p.addEventListener("click", function(){
    alert("Log in again to save changes");
});

let start = document.querySelector("#sub-sched");

start.addEventListener("click", function(){
    console.log("Click event triggered");
});

let up = document.querySelector("#up");

up.addEventListener("click", function(){
    console.log("Profile updated");
    alert("Re-log to save changes");
});

function currentTime(){
    let today = new Date();
    let hours = today.getHours();
    let minutes = addZero(today.getMinutes());
    let seconds = addZero(today.getSeconds());
    let ampm = hours >= 12 ? "PM" : "AM";

    hours = hours % 12;
    hours = hours ? hours : 12;
    hours = addZero(hours);

    let currentTime = (`${hours}:${minutes}:${seconds} / ${ampm}`);

    let output = document.querySelector("#currentTime");

    output.innerHTML = currentTime;
}

currentTime();
setInterval(currentTime, 1000);


function addZero(num){
    return num < 10 ? `0${num}` : num;
}

let play = document.querySelector("#play");
function playAlarm(){
    let mp3 = new Audio("sound/alarm(1).mp3");
    mp3.play();
}

let arr = [];  
let hideTheH = document.querySelector(".history");
hideTheH.style.display = "block";
let timeTakenOne = document.querySelector("#one");
let timeTakenTwo = document.querySelector("#two");
let timeTakenThree = document.querySelector("#three");
let li = document.querySelectorAll("li");
// console.log(timeTaken);
for(let i of li){
    i.style.visibility = "hidden";
    console.log(i);
}

let totalClicks = 1;
let msg;
done.onclick = function(){     

        function msgNtime(){
            let date = new Date();
            let month = date.getMonth();
            let day = date.getDate();
            let hr = date.getHours();
            let mins = date.getMinutes();
        
            switch(month){
                case 0:
                    month = "January";
                    break;
                case 1:
                    month = "February";
                    break;
                case 2:
                    month = "March";
                    break;
                case 3:
                    month = "April";
                    break;
                case 4:
                    month = "May";
                    break;
                case 5:
                    month = "June";
                    break;
                case 6:
                    month = "July";
                    break;
                case 7:
                    month = "August";
                    break;
                case 8:
                    month = "September";
                    break;
                case 9:
                    month = "October";
                    break;
                case 10:
                    month = "November";
                    break;
                case 11:
                    month = "December";
                    break;
                default:
                    month = "Error";
                    break;
            }
        
            let ampm = hr < 11 ? "AM" : "PM";
            hr = hr % 12;
            hr = hr ? hr : 12;
        
           msg = `The patient has already taken the medicine today ${month}-${day} ${hr}:${addZero(mins)} ${ampm}`;
        }
       
   
        if(totalClicks === 1){
            timeTakenOne.style.visibility = "visible";
            totalClicks = 2;
            msgNtime()
            if(arr.length !== 3){
                arr.push(msg);
                timeTakenOne.innerHTML = arr[0];
            } else {
                arr.shift();
                arr.push(msg);
            }
        console.log(arr);
            console.log(totalClicks);
            done.onclick = function(){
                if(totalClicks === 2){
                    timeTakenTwo.style.visibility = "visible";
                    totalClicks = 3;
                    msgNtime()
                    if(arr.length !== 3){
                        arr.push(msg);
                        timeTakenTwo.innerHTML = arr[1];
                    } else {
                        arr.shift();
                        arr.push(msg);
                    }
                console.log(arr);
                    console.log(totalClicks);
                    done.onclick = function(){
                        if(totalClicks === 3){
                            timeTakenThree.style.visibility = "visible";
                            msgNtime()
                            if(arr.length !== 3){
                                arr.push(msg);
                                timeTakenThree.innerHTML = arr[2];
                            } else {
                                arr.shift();
                                arr.push(msg);
                            }
                        console.log(arr);
                        }
                    }    
                }
            }
        }   
}

let nav = document.querySelector(".side-bar");
let home = document.querySelector(".content-1");
let set = document.querySelector(".content-2");
let history = document.querySelector(".content-3");
let profile = document.querySelector(".content-4");
let angy = document.querySelector("#angy");

function defaultStats(){
    nav.style.display = "none";
    angy.style.display = "block";
    set.style.display = "block";
    history.style.display = "none";
    profile.style.display = "none"; 
    home.style.display = "none";
}

function pop_down_button(){
    angy.style.display = "block";
    nav.style.display = "none";
    nav.style.zIndex = -1;
}
angy.onclick = function(){
    angy.style.display = "none";
    nav.style.display = "block";
    nav.style.zIndex = 999; 
}

let hm = document.querySelector("#home");
let st = document.querySelector("#set");
let htry = document.querySelector("#history");
let prf = document.querySelector("#profile");
let off = document.querySelector("#log-out");

document.addEventListener('deviceready', function () {
    cordova.plugins.backgroundMode.enable();
}, false);

let chat = document.querySelector("#chat");

chat.onclick = function(){
    window.location.href = "../chatbox/chat.html";
}

document.addEventListener('deviceready', function() {
    // Enable background mode
    cordova.plugins.backgroundMode.enable();

    // Set up periodic background task
    var interval = setInterval(function() {
        if (cordova.plugins.backgroundMode.isActive()) {
            // Perform your background task here
            console.log("Performing background task");

            // Example: Send a network request
            fetch('http://192.168.1.2:8989/Medimobile/Medimate/www/Main/home.php')
                .then(response => response.json())
                .then(data => {
                    console.log('Data received:', data);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    }, 30000); // Run every 30 seconds

    // Clear interval when the app is closed
    document.addEventListener('pause', function() {
        clearInterval(interval);
    }, false);

}, false);
