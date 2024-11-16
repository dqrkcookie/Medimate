function addZero(num){
    return num < 10 ? `0${num}` : num;
}

let exit = document.querySelector(".amNotify");
let exitM = document.querySelector("#amMessage").innerHTML;
let button = document.querySelector("#exit");
let done = document.querySelector("#done");

button.addEventListener("click", function(){
    exit.style.display = "none";
});

done.addEventListener("click", function(){
    exit.style.display = "none";
});

console.log(exitM);
exit.style.display ="none";

let counter = 0;

function sendGmail(){
    let btnState = 1;
    done.addEventListener("click", function(){
        btnState = 0;
    });

    if(btnState === 1){
        let countInterval = setInterval(function count(){
            console.log(counter++);
            if(btnState !== 1){
                clearInterval(countInterval);
                counter = 0;
                return;
            }
        }, 1000);
    
        setTimeout(function() { 
            if(btnState === 1){
                autoSender()
                exit.style.display = "none";
            }   
            clearInterval(countInterval);
            counter = 0;
        }, 15000);
    } 

}

function timeChecker(){
    let today = new Date();
    let hours = today.getHours();
    let minutes = today.getMinutes();
    let seconds = today.getSeconds();
    let currTime = `${addZero(hours)}:${addZero(minutes)}:${addZero(seconds)}`;
    let am = document.querySelector("#set-time-m").value;
    let nn = document.querySelector("#set-time-n").value;
    let pm = document.querySelector("#set-time-e").value;
    let audio = new Audio("sound/alarm(1).mp3");  
    
    if(`${am}:00` == currTime || `${nn}:00` == currTime || `${pm}:00` == currTime){
            audio.play()
            exit.style.display = "block";
            sendGmail()
    }
    
    if(currTime == pm){
        console.log("Yes");
    } else {
        // console.log("No");
    }
}

setInterval(timeChecker, 1000);

function autoSender(){
    fetch("message.php")
      .then(response => response.text())
      .then(data => {
          console.log(data);
      })
      .catch(error => {
          console.error('Error:', error);
      });
}

document.addEventListener('deviceready', function () {
    // Enable background mode
    cordova.plugins.backgroundMode.enable();

    // Customize notification title
    cordova.plugins.backgroundMode.configure({
        title: 'My App is running in background',
        text: 'Doing important tasks.'
    });

    // Handle when app enters background
    cordova.plugins.backgroundMode.on('activate', function () {
        // Perform tasks when the app is in the background
    });
}, false);

