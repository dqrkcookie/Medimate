const paragraph = document.getElementById("greet");
const text = paragraph.textContent.trim();
paragraph.textContent = "";

for (i = 0; i < text.length; i++){
    const span = document.createElement("span");
    span.textContent = text [i];
    if (text[i] === " "){
        span.classList.add("space");
        span.textContent = "\u00A0";
    }
    paragraph.appendChild(span);
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
