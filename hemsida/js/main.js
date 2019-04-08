function open_user_window() {
    if (document.getElementById("user_login").classList.contains("hidden")) {
        document.getElementById("user_login").classList.remove("hidden");
        document.getElementById("user_icon").classList.add("fa-user-window-show");
        document.getElementById("behind").classList.remove("hidden");
        if (!document.getElementById("shopping_cart_window").classList.contains("hidden")) {
            document.getElementById("shopping_cart_window").classList.add("hidden");
            document.getElementById("shopping_cart_icon").classList.remove("fa-shopping-cart-window-show");
        }
    } else {
        document.getElementById("user_login").classList.add("hidden");
        document.getElementById("user_icon").classList.remove("fa-user-window-show");
        document.getElementById("behind").classList.add("hidden");
    }
}

function open_cart_window() {
    if (document.getElementById("shopping_cart_window").classList.contains("hidden")) {
        document.getElementById("shopping_cart_window").classList.remove("hidden");
        document.getElementById("shopping_cart_icon").classList.add("fa-shopping-cart-window-show");
        document.getElementById("behind").classList.remove("hidden");
        if (!document.getElementById("user_login").classList.contains("hidden")) {
            document.getElementById("user_login").classList.add("hidden");
            document.getElementById("user_icon").classList.remove("fa-user-window-show");
        }
    } else {
        document.getElementById("shopping_cart_window").classList.add("hidden");
        document.getElementById("shopping_cart_icon").classList.remove("fa-shopping-cart-window-show");
        document.getElementById("behind").classList.add("hidden");
    }
}

function close_overlay_windows() {

    if (!document.getElementById("shopping_cart_window").classList.contains("hidden")) {
        document.getElementById("shopping_cart_window").classList.add("hidden");
        document.getElementById("shopping_cart_icon").classList.remove("fa-shopping-cart-window-show");
        document.getElementById("behind").classList.add("hidden");
    }
    if (!document.getElementById("user_login").classList.contains("hidden")) {
        document.getElementById("user_login").classList.add("hidden");
        document.getElementById("user_icon").classList.remove("fa-user-window-show");
        document.getElementById("behind").classList.add("hidden");
    }

}

function addTicket(numberOfTickets, eventID, price, index) {
    var newNumberOfTickets = parseInt(numberOfTickets) + 1;

    if (newNumberOfTickets < 1) {

        deleteTicket(eventID);


    } else if (newNumberOfTickets > 10) {
        alert("Du kan endast beställa 10 biljetter per film.");
    } else {

        var addButtonID = "add" + eventID;
        var addFunctionText = "return addTicket(" + newNumberOfTickets + "," + eventID + "," + price + ")";
        document.getElementById(addButtonID).setAttribute("onclick", addFunctionText);

        var hiddenNoOfTickets = "hidden_noOfTickets" + eventID;
        document.getElementById(hiddenNoOfTickets).setAttribute("value", newNumberOfTickets);

        var noOfTickets = "noOfTickets" + eventID;
        document.getElementById(noOfTickets).innerHTML = newNumberOfTickets;

        var removeButtonID = "remove" + eventID;
        var removeFunctionText = "return removeTicket(" + newNumberOfTickets + "," + eventID + "," + price + ")";
        document.getElementById(removeButtonID).setAttribute("onclick", removeFunctionText);

        var priceID = "price" + eventID;
        var newPrice = newNumberOfTickets * price;
        document.getElementById(priceID).innerHTML = newPrice;

        var cookieIDNoOfTickets = "noOfTickets" + index;

        setCookie(cookieIDNoOfTickets, newNumberOfTickets, 7);

        return false;
    }
}

function removeTicket(numberOfTickets, eventID, price, index) {
    var newNumberOfTickets = parseInt(numberOfTickets) - 1;

    var addButtonID = "add" + eventID;
    var addFunctionText = "return addTicket(" + newNumberOfTickets + "," + eventID + "," + price + ")";
    document.getElementById(addButtonID).setAttribute("onclick", addFunctionText);

    var hiddenNoOfTickets = "hidden_noOfTickets" + eventID;
    document.getElementById(hiddenNoOfTickets).setAttribute("value", newNumberOfTickets);

    var noOfTickets = "noOfTickets" + eventID;
    document.getElementById(noOfTickets).innerHTML = newNumberOfTickets;

    var removeButtonID = "remove" + eventID;
    var removeFunctionText = "return removeTicket(" + newNumberOfTickets + "," + eventID + "," + price + ")";
    document.getElementById(removeButtonID).setAttribute("onclick", removeFunctionText);

    var priceID = "price" + eventID;
    var newPrice = newNumberOfTickets * price;
    document.getElementById(priceID).innerHTML = newPrice;

    var cookieIDNoOfTickets = "noOfTickets" + index;

    setCookie(cookieIDNoOfTickets, newNumberOfTickets, 7);

    return false;
}

function addNewTicket(eventID) {
    var i = 0;
    var allCookies = document.cookie;
    var ca = allCookies.split(';');
    var noExists = true;
    if (ca.length > 1) {

        for (i = 1; i <= ((ca.length - 1) / 2); i++) {

            var cookieIDEventID = "eventID" + i;
            var cookieEventID = getCookie(cookieIDEventID);
            if (cookieEventID == eventID) {
                var forCookieIDNoOfTickets = "noOfTickets" + i;
                var forCookieNoOfTickets = parseInt(document.getElementById("noOfTickets").value);
                var newNoOfTickets = parseInt(getCookie(forCookieIDNoOfTickets)) + forCookieNoOfTickets;
                if (newNoOfTickets > 10) {
                    alert("Du kan endast beställa 10 biljetter per film.");
                    noExists = false;
                } else {
                    setCookie(forCookieIDNoOfTickets, newNoOfTickets, 7);
                    noExists = false;

                    //add correction of shopping cart
                    //changeShoppingCartRow(i, cookieEventID, newNoOfTickets);
                }
            }
        }

        if (noExists == true) {
            var index = (ca.length / 2);
            var forCookieIDEventID = "eventID" + index;
            var forCookieEventID = document.getElementById("movie").value;
            console.log(forCookieEventID);
            var forCookieIDNoOfTickets = "noOfTickets" + index;
            var forCookieNoOfTickets = document.getElementById("noOfTickets").value;

            setCookie(forCookieIDEventID, forCookieEventID, 7);
            setCookie(forCookieIDNoOfTickets, forCookieNoOfTickets, 7);
            setCookie("basketTotalProductTypes", index, 7);

            createRowInShoppingBasket(index, forCookieNoOfTickets, forCookieIDEventID);
        }

    } else {
        var forCookieIDEventID = "eventID" + 1;
        var forCookieEventID = document.getElementById("movie").value;
        var forCookieIDNoOfTickets = "noOfTickets" + 1;
        var forCookieNoOfTickets = document.getElementById("noOfTickets").value;

        setCookie(forCookieIDEventID, forCookieEventID, 7);
        setCookie(forCookieIDNoOfTickets, forCookieNoOfTickets, 7);

        createRowInShoppingBasket(1, forCookieNoOfTickets, forCookieEventID);
        setCookie("basketTotalProductTypes", 1, 7);

    }

    return true;
}

function toCheckout() {

    //collect event ID and number of tickets with an array function and set cookies then submit the form

    var allTickets = document.getElementsByClassName("movieIdForCheckout");
    var i = 0;
    for (i = 0; i < allTickets.length; i++) {
        var eventIDname = "eventID" + (i + 1);
        var eventID = allTickets[i].value;
        setCookie(eventIDname, eventID, 7);
    }

    var noOfTickets = document.getElementsByClassName("noOfTickets");

    var i = 0;
    for (i = 0; i < noOfTickets.length; i++) {
        var noOfTicketsIDname = "noOfTickets" + (i + 1);
        var noOfTicketsID = noOfTickets[i].innerHTML;
        console.log(noOfTickets[i]);
        setCookie(noOfTicketsIDname, noOfTicketsID, 7);
    }

    setCookie("basketTotalProductTypes", i, 7);

    return true;
}

function deleteTicket(index) {

    var cookieIDEventID = "eventID" + index;
    var cookieIDNoOfTickets = "noOfTickets" + index;
    var itemsInBasket = getCookie("basketTotalProductTypes");
    var newNoItems = itemsInBasket - 1;

    if (newNoItems > 0) {
        setCookie("basketTotalProductTypes", newNoItems, 7);
    } else {
        unsetCookie("basketTotalProductTypes");
    }
    unsetCookie(cookieIDEventID);
    unsetCookie(cookieIDNoOfTickets);

    return true;

}

function alertCookies() {
    var r = confirm("Denna sida använder cookies och session för sidans funktionalitet.");
    if (r == false) {
        window.location.assign("https://www.google.com");
    }
}

function alertGDPR() {
    var r = confirm(".");
    if (r == false) {

    }
}

function setCookie(name, value, days) {
    var d = new Date();
    d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

function unsetCookie(name) {
    document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
}

function getCookie(name) {
    var cookieName = name + "=";
    var allCookies = document.cookie;
    var ca = allCookies.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(cookieName) == 0) {
            return c.substring(cookieName.length, c.length);
        }
    }
    return "none";

    //if the cookie exists this function returns the value of the cookie with that the given name. No cookies on this site are serialized, encoded or otherwise as both php and js need to be able to read and set them
}

function createRowInShoppingBasket(index, noOfTickets, eventID) {
    var createTR = document.createElement("tr");

    var createTD1 = document.createElement("td");
    var textTD1 = document.getElementById("eventName").value;
    createTD1.innerHTML = textTD1;

    var createTD2 = document.createElement("td");

    var eventPrice = document.getElementById("eventPrice").value;

    var removeButtonTD2 = document.createElement("button");
    removeButtonTD2.setAttribute("id", "remove" + index);
    var onclickStringREMOVE = "return removeTicket(" + noOfTickets + ", " + eventID + "," + eventPrice + ", " + index + ")";
    removeButtonTD2.setAttribute("onclick", onclickStringREMOVE);
    removeButtonTD2.innerHTML = "<";

    createTD2.appendChild(removeButtonTD2);

    var hiddenInputTD2 = document.createElement("input");
    hiddenInputTD2.setAttribute("id", "hidden_noOfTickets" + index);
    hiddenInputTD2.setAttribute("type", "hidden");
    hiddenInputTD2.setAttribute("name", "numberOfTickets" + index);
    hiddenInputTD2.value = noOfTickets;

    createTD2.appendChild(hiddenInputTD2);

    var divTD2 = document.createElement("div");
    divTD2.classList.add("basketText");
    divTD2.classList.add("noOfTickets");
    divTD2.setAttribute("id", "noOfTickets" + index);
    divTD2.innerHTML = noOfTickets;

    createTD2.appendChild(divTD2);

    var addButtonTD2 = document.createElement("button");
    addButtonTD2.setAttribute("id", "add1");
    var onclickStringADD = "return addTicket(" + noOfTickets + ", " + eventID + "," + eventPrice + ", " + index + ")";
    addButtonTD2.setAttribute("onclick", onclickStringADD);
    addButtonTD2.innerHTML = ">";

    createTD2.appendChild(addButtonTD2);

    var createTD3 = document.createElement("td");
    var createTD3div = document.createElement("div");
    createTD3div.classList.add("basketText");
    createTD3div.setAttribute("id", "price" + index);
    var price = parseInt(noOfTickets) * parseInt(eventPrice);
    createTD3div.innerHTML = price;

    createTD3.appendChild(createTD3div);

    var createTD4 = document.createElement("td");

    var formTD4 = document.createElement("form");
    formTD4.setAttribute("method", "post");
    formTD4.setAttribute("action", "index.php");

    var hiddenInput1TD4 = document.createElement("input");
    hiddenInput1TD4.setAttribute("type", "hidden");
    hiddenInput1TD4.setAttribute("name", "page");
    hiddenInput1TD4.value = "movie";

    var hiddenInput1TD4 = document.createElement("input");
    hiddenInput1TD4.setAttribute("type", "hidden");
    hiddenInput1TD4.setAttribute("name", "showMovie");
    hiddenInput1TD4.setAttribute("id", "movieDelete");
    hiddenInput1TD4.classList.add("movieIdForCheckout");
    hiddenInput1TD4.value = eventID;

    var hiddenInput1TD4 = document.createElement("input");
    hiddenInput1TD4.setAttribute("type", "hidden");
    hiddenInput1TD4.setAttribute("name", "cartReload");
    hiddenInput1TD4.setAttribute("id", "cartReload");
    hiddenInput1TD4.value = "yes";

    var deleteButton = document.createElement("button");
    deleteButton.setAttribute("id", "deleteButton" + index);
    var onclickStringDEL = "return deleteTicket(" + eventID + ")";
    deleteButton.setAttribute("onclick", onclickStringDEL);
    deleteButton.innerHTML = "X";

    formTD4.appendChild(deleteButton);
    createTD4.appendChild(formTD4);

    createTR.appendChild(createTD1);
    createTR.appendChild(createTD2);
    createTR.appendChild(createTD3);
    createTR.appendChild(createTD4);

    document.getElementById("shoppingBasketTable").appendChild(createTR);
}

function changeShoppingCartRow(index, eventID, noOfTickets) {

    var eventPrice = document.getElementById("eventPrice").value;
    var price = parseInt(noOfTickets) * parseInt(eventPrice);

    var addText = "return addTicket(" + noOfTickets + ", " + eventID + ", " + eventPrice + ", " + index + ")";
    document.getElementById("add" + index).setAttribute("onclick", addText);
    var removeText = "return removeTicket(" + noOfTickets + ", " + eventID + ", " + eventPrice + ", " + index + ")";
    document.getElementById("remove" + index).setAttribute("onclick", removeText);
    document.getElementById("hidden_noOfTickets" + index).value = noOfTickets;
    document.getElementById("noOfTickets" + index).innerHTML = noOfTickets;
    document.getElementById("price" + index).innerHTML = price;
}