var content;

var yourFrame = document.getElementById('myframe'); 
    yourFrame.addEventListener("load", function() { 
    content = JSON.parse(yourFrame);
    console.log(content);
});






