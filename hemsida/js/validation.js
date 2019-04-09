//inputfields by form

//    //register & change customer data both customer and admin
var firstName = document.getElementById("firstName");
var lastName = document.getElementById("lastName");
var email = document.getElementById("email");
var password = document.getElementById("password"); //password on both register and checkout
var passwordRepeat = document.getElementById("passwordRepeat");

//  //navLogin
var username1 = document.getElementById("user_login_username"); //username in nav login
var password1 = document.getElementById("user_login_password"); //password in nav login

//  //checkout login & adminlogin
var username2 = document.getElementById("username"); // username in checkout
// password

//  //add adress & change adress both customer and admin
var streetAdress;
var postalCode;
var postalTown;

//  //change ticket admin
var ticketID;
var eventID;
var eventDateID;
var venueID;
var date;
var time;
var username;
var used;

//  //add event & change

var eventID;
var eventName;
var premere;
var finished;
var director;
var originalLanguage;
var info;
var price;
var picture;

//  //add venue & change
// venueID
var theater;
var size;

//  //add tickets to sell & change
// venueID, eventID, eventDateID, date, time from previous declarations as they dont appear at the same time

//  //change admin data
//username2, password, passwordRepeat


// button

var submitButton = document.getElementById("submit"); //all but nav
var submitButton1 = document.getElementById("submitButton"); // nav login

//validation colours

var red = "#da0000";

//validation functions

//register

function checkValidationRegister() {

    if (firstName.classList.contains("valid") && lastName.classList.contains("valid") && email.classList.contains("valid") && password.classList.contains("valid") && passwordRepeat.classList.contains("valid")) {
        submitButton.disabled = false;
    } else {
        submitButton.disabled = true;
    }
}

function validateFirstName() {
    //check if empty
    if (checkIfEmpty(firstName, 2)) {
        return;
    }
    //check that it only contains letters
    if (!checkIfOnlyLetters(firstName)) {
        return;
    }
}

function validateLastName() {
    //check if empty
    if (checkIfEmpty(lastName, 2)) {
        return;
    }
    //check that it only contains letters
    if (!checkIfOnlyLetters(lastName)) {
        return;
    }
}

function validateEmail() {
    //check if empty
    if (checkIfEmpty(email, 2)) {
        return;
    }
    //check that it is a valid email adress
    if (!containsCharacterSet(email, 4)) {
        return;
    }
}

function validatePassword() {
    //check if empty
    if (checkIfEmpty(password, 2)) {
        return;
    }
    //check that it is long enough, first number is minLength, second is maxLength
    if (!meetsLength(password, 8, 32)) {
        return;
    }
    //check that it contains:
    // 1 - letters
    // 2 - numbers and letters
    // 3 - large, small letters and a number

    if (!containsCharacterSet(password, 3)) {
        return;
    }

    return true;
}

function validatePasswordRepeat() {

    if (password.className === "invalid") {
        setInvalid(passwordRepeat, "Lösenordet måste vara giltigt.");
        return;
    }
    //check that it is the same as Password
    if (password.value !== passwordRepeat.value) {
        setInvalid(passwordRepeat, "Inte samma lösenord.");
        return;
    } else {
        setValid(passwordRepeat);
        return;
    }
    return true;
}

//nav

function validateNavForm() {
    if (username1.classList.contains("valid") && password1.classList.contains("valid")) {
        submitButton1.disabled = false;
    } else {
        submitButton1.disabled = true;
    }
}

function validateNavUsername() {
    //check if empty
    if (checkIfEmpty(username1, 1)) {
        return;
    }
    //check that it is a valid email adress
    if (!containsCharacterSet(username1, 4)) {
        return;
    }
}

function validateNavPassword() {
    //check if empty
    if (checkIfEmpty(password1, 1)) {
        return;
    }
}

//checkout login & admin login

function validateLoginForm() {
    if (username2.classList.contains("valid") && password.classList.contains("valid")) {
        submitButton.disabled = false;
    } else {
        submitButton.disabled = true;
    }
}

function validateLoginUsername() {
    //check if empty
    if (checkIfEmpty(username2, 1)) {
        return;
    }
    //check that it is a valid email adress
    if (!containsCharacterSet(username2, 4)) {
        return;
    }
}

function validateLoginPassword() {
    //check if empty
    if (checkIfEmpty(password, 1)) {
        return;
    }
}

// change ticket admin

function validateTicketForm() {
    if (ticketID.classList.contains("valid") && eventID.classList.contains("valid") && eventDateID.classList.contains("valid") && venueID.classList.contains("valid") && date.classList.contains("valid") && time.classList.contains("valid") && username.classList.contains("valid") && used.classList.contains("valid")) {
        submitButton.disabled = false;
    } else {
        submitButton.disabled = true;
    }
}

function validateTicketID() {
    //check if empty
    if (checkIfEmpty(ticketID, 2)) {
        return;
    }
}

function validateEventID() {
    //check if empty
    if (checkIfEmpty(eventID, 2)) {
        return;
    }
}

function validateEventDateID() {
    //check if empty
    if (checkIfEmpty(eventDateID, 2)) {
        return;
    }
}

function validateVenueID() {
    //check if empty
    if (checkIfEmpty(venueID, 2)) {
        return;
    }
}

function validateDate() {
    //check if empty
    if (checkIfEmpty(date, 2)) {
        return;
    }
}

function validateTime() {
    //check if empty
    if (checkIfEmpty(time, 2)) {
        return;
    }
}

function validateUsed() {
    //check if empty
    if (checkIfEmpty(used, 2)) {
        return;
    }
}

function validateUsername() {
    //check if empty
    if (checkIfEmpty(username, 2)) {
        return;
    }

    //check that it is an email
    if (!containsCharacterSet(username, 4)) {
        return;
    }
}

//add & change adress both customer and admin

function validateAddAdressForm() {
    if (streetAdress.classList.contains("valid") && postalCode.classList.contains("valid") && postalTown.classList.contains("valid")) {
        submitButton.disabled = false;
    } else {
        submitButton.disabled = true;
    }
}

function validateAddAdressStreetAdress() {
    //check if empty
    if (checkIfEmpty(streetAdress, 2)) {
        return;
    }
}

function validateAddAdressPostalCode() {
    //check if empty
    if (checkIfEmpty(postalCode, 2)) {
        return;
    }
}

function validateAddAdressPostalTown() {
    //check if empty
    if (checkIfEmpty(postalTown, 2)) {
        return;
    }
}

//add & change event

function validateEvent() {
    if (eventID.classList.contains("valid") && eventName.classList.contains("valid") && premere.classList.contains("valid") && finished.classList.contains("valid") && director.classList.contains("valid") && originalLanguage.classList.contains("valid") && info.classList.contains("valid") && price.classList.contains("valid") && picture.classList.contains("valid")) {
        submitButton.disabled = false;
    } else {
        submitButton.disabled = true;
    }
}

function validateEventName() {
    //check if empty
    if (checkIfEmpty(eventName, 2)) {
        return;
    }
}

function validatePremere() {
    //check if empty
    if (checkIfEmpty(premere, 2)) {
        return;
    }
}

function validateFinished() {
    //check if empty
    if (checkIfEmpty(finished, 2)) {
        return;
    }
}

function validateDirector() {
    //check if empty
    if (checkIfEmpty(director, 2)) {
        return;
    }
}

function validateOriginalLanguage() {
    //check if empty
    if (checkIfEmpty(originalLanguage, 2)) {
        return;
    }
}

function validateInfo() {
    //check if empty
    if (checkIfEmpty(info, 2)) {
        return;
    }
}

function validatePrice() {
    //check if empty
    if (checkIfEmpty(price, 2)) {
        return;
    }
}

function validatePicture() {
    //check if empty
    if (checkIfEmpty(picture, 2)) {
        return;
    }
}
//add & change venue

function validateVenue() {
    if (venueID.classList.contains("valid") && theater.classList.contains("valid") && size.classList.contains("valid")) {
        submitButton.disabled = false;
    } else {
        submitButton.disabled = true;
    }
}

function validateTheater() {
    //check if empty
    if (checkIfEmpty(theater, 2)) {
        return;
    }
}

function validateSize() {
    //check if empty
    if (checkIfEmpty(size, 2)) {
        return;
    }
}
//add & change tickets to sell

function validateTicketsToSell() {
    if (eventID.classList.contains("valid") && eventDateID.classList.contains("valid") && venueID.classList.contains("valid") && date.classList.contains("valid") && time.classList.contains("valid")) {
        submitButton.disabled = false;
    } else {
        submitButton.disabled = true;
    }
}

// change admin data

function validateAdminData() {
    if (username2.classList.contains("valid") && password.classList.contains("valid") && passwordRepeat.classList.contains("valid")) {
        submitButton.disabled = false;
    } else {
        submitButton.disabled = true;
    }
}

//utility functions

function checkIfEmpty(field, needed) {
    if (isEmpty(field.value.trim())) {
        //set field invalid
        if (needed == 1) {
            // case = 1, if a person chooses to not log in dont ask for input in the field
            setInvalid(field, "");
            return true;
        } else {
            // case = 2, for all required fields in forms
            setInvalid(field, "Fältet kan inte vara tomt");
            return true;
        }
    } else {
        //set field to valid
        setValid(field);
        return false;
    }
}

function isEmpty(value) {
    if (value === "") {
        return true;
    } else {
        return false;
    }
}

function setInvalid(field, message) {
    field.classList.add("invalid");
    field.classList.remove("valid");
    field.nextElementSibling.innerHTML = message;
    field.nextElementSibling.style.color = red;
}

function setValid(field) {
    field.classList.remove("invalid");
    field.classList.add("valid");
    field.nextElementSibling.innerHTML = '';
}

function checkIfOnlyLetters(field) {
    if (/^[a-zA-Z ]+$/.test(field.value)) {
        setValid(field);
        return true;
    } else {
        setInvalid(field, "Fältet kan bara innehålla bokstäver");
        return false;
    }
}

function meetsLength(field, minLength, maxLength) {
    if (field.value.length >= minLength && field.value.length <= maxLength) {
        setValid(field);
        return true;
    } else if (field.value.length < minLength) {
        setInvalid(field, "The password has to be atleast " + minLength + " characters long.")
        return false;
    } else if (field.value.length > maxLength) {
        setInvalid(field, "The password can't be longer than " + maxLength + " characters.")
        return false;
    }
    return false;
}

function containsCharacterSet(field, characterSetNumber) {
    var regEx;
    switch (characterSetNumber) {
        case 1:
            // letters
            regEx = /(?=.*[a-zA-Z])/;
            message = "Fältet måste innehålla minst en bokstav.";
            return matchWithRegEx(regEx, field, message);
        case 2:
            // letters and numbers
            regEx = /(?=.*\d)(?=.*[a-zA-Z])/;
            message = "Fältet måste innehålla både bokstäver och siffror.";
            return matchWithRegEx(regEx, field, message);
        case 3:
            // large and small letters and a number
            regEx = regEx = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/;
            message = "Fältet måste innehålla minst en stor och en liten bokstav samt en siffra.";
            return matchWithRegEx(regEx, field, message);
        case 4:
            // contains email pattern
            regEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            message = "Inte en giltig emailadress.";
            return matchWithRegEx(regEx, field, message);
        default:
            return false;
    }
}

function matchWithRegEx(regEx, field, message) {
    if (field.value.match(regEx)) {
        setValid(field);
        return true;
    } else {
        setInvalid(field, message);
        return false;
    }
}