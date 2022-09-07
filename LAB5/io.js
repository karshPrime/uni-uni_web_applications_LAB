/**
 * Author: Utkarsh KR
 * Target: clickme.html
 * purpose: for clickme button; task 1
 * created sept 7
 * last updated: sept 7
*/

"use strict"; // prevents creation of global variables in functions

function rewriteParagraph(userName) {
    message.innerHTML = "Hi " + userName + ". If you can see this you have successfully \
    overwritten the content of this paragraph. Congratulations!!";
}

function writeNewMessage() {
    document.getElementById("write_content").textContent = "You have now finished Task 1";
}

function promptName() {
    var sName = prompt("Enter your name.\nTHis prompt should show up when the\nClick Me \
    button is clicked.", "Your name");
    
    alert("Hi there " + sName + ". Alert boxes are quick way to check the state\n\
    of your variables when you are developing code.");

    rewriteParagraph(sName);
}

// this function is called when the browser window loads
// it will register function that will respond to browser events
function init() {
    var clickMe = document.getElementById("clickme");
    clickMe.onclick = promptName;
    
    var heading = document.getElementById("test")
    heading.onclick = writeNewMessage;
}

window.onload = init;
