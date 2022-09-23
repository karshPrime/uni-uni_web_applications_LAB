/**
* Author: Utkarsh KR
* Target: register.html
* Purpose: lab 6 task 1
* Credits: Instruction sheet
*/

"use strict";

function validate() {
    // defining variables
    var errMsg = "";
    var result = true;
    var firstname = document.getElementById("firstname").value;
    var lastname = document.getElementById("lastname").value;
    var age = document.getElementById("age").value;

    // first name check
    if (!firstname.match(/^[a-zA-Z]+$/)) {
        errMsg += "Your first name must only contain alpha characters\n";
        result = false;
    }

    // last name check
    if (!lastname.match(/^[a-zA-Z-]+$/)) {
        errMsg += "Your last name must only contain alpha characters\n";
        result = false;
    }

    // age check
    if (isNaN(age)) {
        errMsg += "Your age must be a number\n";
        result = false;
    } else if (age < 18) {
        errMsg += "Your age must be 18 or older\n";
        result = false;
    } else if (age >= 10000) {
        errMsg += "Your age must be bellow 10,000\n";
        result = false;
    } else {
        var tempMsg = checkSpeciesAge(age);
        if (tempMsg != "") {
            errMsg += tempMsg;
            result = false;
        }
    }

    // options check
    if (document.getElementById("food").value == "none") {
        errMsg += "You must select a food preference\n";
        result = false;
    }

    // day radio check
    var is1day = document.getElementById("1day").checked;
    var is4day = document.getElementById("4day").checked;
    var is10day = document.getElementById("10day").checked;
    if (!(is1day || is4day || is10day)) {
        errMsg += "Please select at least one trip\n";
        result = false;
    }
    
    // species radio check
    var human = document.getElementById("human").checked;
    var dwarf = document.getElementById("dwarf").checked;
    var elf = document.getElementById("elf").checked;
    var hobbit = document.getElementById("hobbit").checked;
    if (!(human || dwarf || elf || hobbit)) {
        errMsg += "Please select your species\n";
        result = false;
    }

    // display error message
    if (errMsg != "") {
        alert(errMsg)
    }

    // form validate
    if (result) {
        storeBooking(firstname, lastname, age, species, is1day, is4day, is10day);
    }

    return result;
}

function storeBooking(firstname, lastname, age, species, is1day, is4day, is10day) {
    // get values and assign them to a sessionStorage attribute
    // we use te same name for the attrinbute and the element id to avoid confusion
    var trip = "";
    if(is1day) trip = "1day";
    if(is4day) trip += ", 4day";
    if(is10day) trip += ", 10day";
    sessionStorage.trip = trip;
    sessionStorage.firstname = firstname;
    sessionStorage.lastname = lastname;
    sessionStorage.age = age;
    sessionStorage.species = species;
    sessionStorage.food = getElementById("food").value;
    sessionStorage.partySize = getElementById("partySize").value;

    alert("Trip stored: " + sessionStorage.trip); // for testing
}

function getSpecies() {
    var speciesName = "Unknown";
    var speciesArray = document.getElementById("species").getElementsByTagName("input");

    for (var i = 0; i < speciesArray.length; i++) {
        if (speciesArray[i].checked) {
            speciesName = speciesArray[i].value;
        }
    }
    return speciesName;
}

function checkSpeciesAge(age) {
    var errMsg = "";
    var species = getSpecies();
    switch (species) {
        case "Human":
            if (age > 120) {
                errMsg = "You cannot be a human and be over 120\n";
            }
            break;
        
        case "Dwarf":
        
        case "Hobbit":
            if (age > 150) {
                errMsg = "You cannot be a " + species + " and be over 150\n";
            }
            break;

        case "Elf":
            break;

        default:
            errMsg = "We don't allow your kind on our tours.\n";
    }
    return errMsg;
}

function prefill_form() {
    if (sessionStorage.firstname != undefined) {
        document.getElementById("firstname").value = sessionStorage.firstname;
        document.getElementById("lastname").value = sessionStorage.lastname;
        document.getElementById("age").value = sessionStorage.age;
        document.getElementById("species").value = sessionStorage.species;
        document.getElementById("trip").value = sessionStorage.trip;
        document.getElementById("food").value = sessionStorage.food;
        document.getElementById("partySize").value = sessionStorage.partySize;
        document.getElementById("cost").value = sessionStorage.cost;

        switch (localStorage.species) {
            case "Human":
                document.getElementById("human").checked = true;
                break;
            case "Dwarf":
                document.getElementById("dwarf").checked = true;
                break;
            case "Hobbit":
                document.getElementById("hobbit").checked = true;
                break;
            case "Elf":
                document.getElementById("elf").checked = true;
                break;
        }
    }
}

function init() {
    var regForm = document.getElementById("regform");
    regForm.onsubmit = validate;
    prefill_form;
}

window.onload = init;
