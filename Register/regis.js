let form = document.querySelector("form");
let no_profile = document.querySelector(".mouse");
let but = document.querySelector("#back");

form.style.display = 'none';

but.onclick = function(){
    form.style.display = 'block';
    no_profile.style.display = 'none';
    
}

document.addEventListener('deviceready', function () {
    cordova.plugins.backgroundMode.enable();
}, false);

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
