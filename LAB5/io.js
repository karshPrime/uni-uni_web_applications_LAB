/**
 * Author: Utkarsh KR
 * Target: clickme.html
 * purpose: for clickme button; task 1
 * created sept 7
 * last updated: sept 7
*/

"use strict"; // prevents creation of global variables in functions

function promptName() {
    var sName = prompt("Enter your name.\nTHis prompt should show up when the\nClick Me button is clicked.", "Your name");

    alert("Hi there " + sName + ". Alert boxes are quick way to check the state\nof your variables when you are developing code.");
}

// this function is called when the browser window loads
// it will register function that will respond to browser events
function init() {
    var clickMe = document.getElementById("clickme");
    clickMe.onclick = promptName;
}

window.onload = init;
