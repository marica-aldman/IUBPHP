//inputfields by form

//    //register & change customer data both customer and admin, change customer password
var firstName = document.getElementById("firstName");
var lastName = document.getElementById("lastName");
var email = document.getElementById("email");
var password = document.getElementById("password"); //password on both register and checkout
var passwordRepeat = document.getElementById("passwordRepeat");
var oldPassword = document.getElementById("oldPassword");

//  //navLogin
var username1 = document.getElementById("userLoginUsername"); //username in nav login
var password1 = document.getElementById("userLoginPassword"); //password in nav login

//  //checkout login & adminlogin
var username2 = document.getElementById("username"); // username in checkout
// password

//  //change ticket admin

var eventID = document.getElementById("eventID");
var eventDateID = document.getElementById("eventDateID");
var venueID = document.getElementById("venueID");
var date = document.getElementById("date");
var time = document.getElementById("time");
var username = document.getElementById("username");

//  //add change tickets

var eventID = document.getElementById("eventID");
var venueID = document.getElementById("venueID");
var date = document.getElementById("date");
var time = document.getElementById("time");

//  //add event & change

var eventName = document.getElementById("eventName");
var premere = document.getElementById("premere");
var finished = document.getElementById("finished");
var director = document.getElementById("director");
var originalLanguage = document.getElementById("originalLanguage");
var info = document.getElementById("info");
var price = document.getElementById("price");
var picture = document.getElementById("pictureLink");

//  //add venue & change
// venueID
var theater = document.getElementById("theater");
var size = document.getElementById("size");

//  //add tickets to sell & change
// venueID, eventID, eventDateID, date, time from previous declarations as they dont appear at the same time

//  //change admin data
//username2, password, passwordRepeat

//  //validate ticket and order

var orderID1 = document.getElementById("orderID1");
var ticketID1 = document.getElementById("ticketID1");
var orderID2 = document.getElementById("orderID2");
var ticketID2 = document.getElementById("ticketID2");

// button

var submitButton = document.getElementById("submit"); //all but nav
var submitButton1 = document.getElementById("submitButton"); // nav login

//validation colours

var red = "#da0000";

//validation functions

//validate tickets and orders

function validate_order() {
    //check if empty
    if (check_if_empty(orderID1, 2)) {
        return;
    }
    //check that it only contains numbers
    if (!contains_character_set(orderID1, 5)) {
        return;
    }
}

function invalidate_order() {
    //check if empty
    if (check_if_empty(orderID2, 2)) {
        return;
    }
    //check that it only contains numbers
    if (!contains_character_set(orderID2, 5)) {
        return;
    }
}

function validate_ticket() {
    //check if empty
    if (check_if_empty(ticketID1, 2)) {
        return;
    }
    //check that it only contains numbers
    if (!contains_character_set(ticketID1, 5)) {
        return;
    }
}

function invalidate_ticket() {
    //check if empty
    if (check_if_empty(ticketID2, 2)) {
        return;
    }
    //check that it only contains numbers
    if (!contains_character_set(ticketID2, 5)) {
        return;
    }
}

// change customer data

function check_validation_customer_details() {

    if (firstName.classList.contains("valid") && lastName.classList.contains("valid") && email.classList.contains("valid")) {
        submitButton.disabled = false;
    } else {
        submitButton.disabled = true;
    }
}

//register

function check_validation_register() {

    if (firstName.classList.contains("valid") && lastName.classList.contains("valid") && email.classList.contains("valid") && password.classList.contains("valid") && passwordRepeat.classList.contains("valid")) {
        submitButton.disabled = false;
    } else {
        submitButton.disabled = true;
    }
}

function check_validation_register_admin() {

    if (email.classList.contains("valid") && password.classList.contains("valid") && passwordRepeat.classList.contains("valid")) {
        submitButton.disabled = false;
    } else {
        submitButton.disabled = true;
    }
}

function validate_first_name() {
    //check if empty
    if (check_if_empty(firstName, 2)) {
        return;
    }
    //check that it only contains letters
    if (!check_if_only_letters(firstName)) {
        return;
    }
}

function validate_last_name() {
    //check if empty
    if (check_if_empty(lastName, 2)) {
        return;
    }
    //check that it only contains letters
    if (!check_if_only_letters(lastName)) {
        return;
    }
}

function validate_email() {
    //check if empty
    if (check_if_empty(email, 2)) {
        return;
    }
    //check that it is a valid email adress
    if (!contains_character_set(email, 4)) {
        return;
    }
}

function validate_password() {
    //check if empty
    if (check_if_empty(password, 2)) {
        return;
    }
    //check that it is long enough, first number is minLength, second is maxLength
    if (!meets_length(password, 8, 32)) {
        return;
    }
    //check that it contains:
    // 1 - letters
    // 2 - numbers and letters
    // 3 - large, small letters and a number
    // 4 - contains email pattern
    // 5 - numbers
    if (!contains_character_set(password, 3)) {
        return;
    }

    return true;
}

function validate_password_repeat() {

    if (password.className === "invalid") {
        set_invalid(passwordRepeat, "Lösenordet måste vara giltigt.");
        return;
    }
    //check that it is the same as Password
    if (password.value !== passwordRepeat.value) {
        set_invalid(passwordRepeat, "Inte samma lösenord.");
        return;
    } else {
        set_valid(passwordRepeat);
        return;
    }
    return true;
}

//nav

function validate_nav_form() {
    if (username1.classList.contains("valid") && password1.classList.contains("valid")) {
        submitButton1.disabled = false;
    } else {
        submitButton1.disabled = true;
    }
}

function validate_nav_username() {
    //check if empty
    if (check_if_empty(username1, 1)) {
        return;
    }
    //check that it is a valid email adress
    if (!contains_character_set(username1, 4)) {
        return;
    }
}

function validate_nav_password() {
    //check if empty
    if (check_if_empty(password1, 1)) {
        return;
    }
}

//checkout login & admin login

function validate_login_form() {
    if (username2.classList.contains("valid") && password.classList.contains("valid")) {
        submitButton.disabled = false;
    } else {
        submitButton.disabled = true;
    }
}

function validate_login_username() {
    //check if empty
    if (check_if_empty(username2, 1)) {
        return;
    }
    //check that it is a valid email adress
    if (!contains_character_set(username2, 4)) {
        return;
    }
}

function validate_login_password() {
    //check if empty
    if (check_if_empty(password, 1)) {
        return;
    }
}

//change password

function validate_new_password_form() {
    if (oldPassword.classList.contains("valid") && password.classList.contains("valid")) {
        submitButton.disabled = false;
    } else {
        submitButton.disabled = true;
    }
}

function validate_old_password() {
    //check if empty
    if (check_if_empty(oldPassword, 1)) {
        return;
    }
}

function validate_new_password() {
    //check if empty
    if (check_if_empty(password, 2)) {
        return;
    }
    //check that it is long enough, first number is minLength, second is maxLength
    if (!meets_length(password, 8, 32)) {
        return;
    }
    //check containts
    if (!contains_character_set(password, 3)) {
        return;
    }
}

function validate_repeat_password() {
    if (password.className === "invalid") {
        set_invalid(passwordRepeat, "Lösenordet måste vara giltigt.");
        return;
    }
    //check that it is the same as Password
    if (password.value !== passwordRepeat.value) {
        set_invalid(passwordRepeat, "Inte samma lösenord.");
        return;
    } else {
        set_valid(passwordRepeat);
        return;
    }
    return true;
}

//add & change event

function validate_add_event() {
    if (eventName.classList.contains("valid") && director.classList.contains("valid") && originalLanguage.classList.contains("valid") && info.classList.contains("valid") && price.classList.contains("valid")) {
        submitButton.disabled = false;
    } else {
        submitButton.disabled = true;
    }
}

function validate_change_event() {
    if (eventName.classList.contains("valid") && director.classList.contains("valid") && originalLanguage.classList.contains("valid") && info.classList.contains("valid") && price.classList.contains("valid")) {
        submitButton.disabled = false;
    } else {
        submitButton.disabled = true;
    }
}

function validate_event_name() {
    //check if empty
    if (check_if_empty(eventName, 2)) {
        return;
    }
}

function validate_director() {
    //check if empty
    if (check_if_empty(director, 2)) {
        return;
    }
}

function validate_original_language() {
    //check if empty
    if (check_if_empty(originalLanguage, 2)) {
        return;
    }
}

function validate_info() {
    //check if empty
    if (check_if_empty(info, 2)) {
        return;
    }
}

function validate_price() {
    //check if empty
    if (check_if_empty(price, 2)) {
        return;
    }
}

//add & change venue

function validate_venue() {
    if (theater.classList.contains("valid") && size.classList.contains("valid")) {
        submitButton.disabled = false;
    } else {
        submitButton.disabled = true;
    }
}

function validate_theater() {
    //check if empty
    if (check_if_empty(theater, 2)) {
        return;
    }
}

function validate_size() {
    //check if empty
    if (check_if_empty(size, 2)) {
        return;
    }
}

//add & change tickets to sell

function validate_add_tickets() {
    if (time.classList.contains("valid")) {
        submitButton.disabled = false;
    } else {
        submitButton.disabled = true;
    }
}

function validate_time() {
    //check if empty
    if (check_if_empty(time, 2)) {
        return;
    }
}

//utility functions

function check_if_empty(field, needed) {
    if (is_empty(field.value.trim())) {
        //set field invalid
        if (needed == 1) {
            // case = 1, if a person chooses to not log in dont ask for input in the field
            set_invalid(field, "");
            return true;
        } else {
            // case = 2, for all required fields in forms
            set_invalid(field, "Fältet kan inte vara tomt");
            return true;
        }
    } else {
        //set field to valid
        set_valid(field);
        return false;
    }
}

function is_empty(value) {
    if (value === "") {
        return true;
    } else {
        return false;
    }
}

function set_invalid(field, message) {
    field.classList.add("invalid");
    field.classList.remove("valid");
    field.nextElementSibling.innerHTML = message;
    field.nextElementSibling.style.color = red;
}

function set_valid(field) {
    field.classList.remove("invalid");
    field.classList.add("valid");
    field.nextElementSibling.innerHTML = '';
}

function check_if_only_letters(field) {
    if (/^[a-zA-Z ]+$/.test(field.value)) {
        set_valid(field);
        return true;
    } else {
        set_invalid(field, "Fältet kan bara innehålla bokstäver");
        return false;
    }
}

function meets_length(field, minLength, maxLength) {
    if (field.value.length >= minLength && field.value.length <= maxLength) {
        set_valid(field);
        return true;
    } else if (field.value.length < minLength) {
        set_invalid(field, "The password has to be atleast " + minLength + " characters long.")
        return false;
    } else if (field.value.length > maxLength) {
        set_invalid(field, "The password can't be longer than " + maxLength + " characters.")
        return false;
    }
    return false;
}

function contains_character_set(field, characterSetNumber) {
    var regEx;
    switch (characterSetNumber) {
        case 1:
            // letters
            regEx = /(?=.*[a-zA-Z])/;
            message = "Fältet måste innehålla minst en bokstav.";
            return match_with_reg_ex(regEx, field, message);
        case 2:
            // letters and numbers
            regEx = /(?=.*\d)(?=.*[a-zA-Z])/;
            message = "Fältet måste innehålla både bokstäver och siffror.";
            return match_with_reg_ex(regEx, field, message);
        case 3:
            // large and small letters and a number
            regEx = regEx = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/;
            message = "Fältet måste innehålla minst en stor och en liten bokstav samt en siffra.";
            return match_with_reg_ex(regEx, field, message);
        case 4:
            // contains email pattern
            regEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            message = "Inte en giltig emailadress.";
            return match_with_reg_ex(regEx, field, message);
        case 5:
            // numbers
            regEx = /(?=.*\d)/;
            message = "Fältet kan endast innehålla siffror.";
            return match_with_reg_ex(regEx, field, message);
        default:
            return false;
    }
}

function match_with_reg_ex(regEx, field, message) {
    if (field.value.match(regEx)) {
        set_valid(field);
        return true;
    } else {
        set_invalid(field, message);
        return false;
    }
}