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

function addTicket(numberOfTickets, eventDateID, price, index) {
    var newNumberOfTickets = parseInt(numberOfTickets) + 1;

    if (newNumberOfTickets < 1) {

        deleteTicket(eventDateID);


    } else if (newNumberOfTickets > 10) {
        alert("Du kan endast beställa 10 biljetter per film.");
    } else {

        var addButtonID = "add" + eventDateID;
        var addFunctionText = "addTicketCheckout(" + newNumberOfTickets + "," + eventDateID + "," + price + "," + index + ");addTicket(" + newNumberOfTickets + "," + eventDateID + "," + price + "," + index + ")";
        document.getElementById(addButtonID).setAttribute("onclick", addFunctionText);

        var hiddenNoOfTickets = "hidden_noOfTickets" + eventDateID;
        document.getElementById(hiddenNoOfTickets).setAttribute("value", newNumberOfTickets);

        var noOfTickets = "noOfTickets" + eventDateID;
        document.getElementById(noOfTickets).innerHTML = newNumberOfTickets;

        var removeButtonID = "remove" + eventDateID;
        var removeFunctionText = "removeTicketCheckout(" + newNumberOfTickets + "," + eventDateID + "," + price + "," + index + ");removeTicket(" + newNumberOfTickets + "," + eventDateID + "," + price + "," + index + ")";
        document.getElementById(removeButtonID).setAttribute("onclick", removeFunctionText);

        var priceID = "price" + eventDateID;
        var newPrice = newNumberOfTickets * price;
        document.getElementById(priceID).innerHTML = newPrice;

        var cookieIDNoOfTickets = "noOfTickets" + index;

        setCookie(cookieIDNoOfTickets, newNumberOfTickets, 7);

        return false;
    }
}
function addTicketCheckout(numberOfTickets, eventDateID, price, index) {
    var newNumberOfTickets = parseInt(numberOfTickets) + 1;

    if (newNumberOfTickets < 1) {

        deleteTicket(eventDateID);


    } else if (newNumberOfTickets > 10) {
        alert("Du kan endast beställa 10 biljetter per film.");
    } else {

        var addButtonID = "addCheckout" + eventDateID;
        var addFunctionText = "addTicketCheckout(" + newNumberOfTickets + "," + eventDateID + "," + price + "," + index + ");addTicket(" + newNumberOfTickets + "," + eventDateID + "," + price + "," + index + ")";
        document.getElementById(addButtonID).setAttribute("onclick", addFunctionText);

        var hiddenNoOfTickets = "hidden_noOfTicketsCheckout" + eventDateID;
        document.getElementById(hiddenNoOfTickets).setAttribute("value", newNumberOfTickets);

        var noOfTickets = "noOfTicketsCheckout" + eventDateID;
        document.getElementById(noOfTickets).innerHTML = newNumberOfTickets;

        var removeButtonID = "removeCheckout" + eventDateID;
        var removeFunctionText = "removeTicketCheckout(" + newNumberOfTickets + "," + eventDateID + "," + price + "," + index + ");removeTicket(" + newNumberOfTickets + "," + eventDateID + "," + price + "," + index + ")";
        document.getElementById(removeButtonID).setAttribute("onclick", removeFunctionText);

        var priceID = "priceCheckout" + index;
        var newPrice = newNumberOfTickets * price;
        document.getElementById(priceID).innerHTML = newPrice;

        var cookieIDNoOfTickets = "noOfTickets" + index;

        setCookie(cookieIDNoOfTickets, newNumberOfTickets, 7);

        return false;
    }
}

function removeTicket(numberOfTickets, eventDateID, price, index) {
    var newNumberOfTickets = parseInt(numberOfTickets) - 1;

    var addButtonID = "add" + eventDateID;
    var addFunctionText = "addTicketCheckout(" + newNumberOfTickets + "," + eventDateID + "," + price + "," + index + ");addTicket(" + newNumberOfTickets + "," + eventDateID + "," + price + ")";
    document.getElementById(addButtonID).setAttribute("onclick", addFunctionText);

    var hiddenNoOfTickets = "hidden_noOfTickets" + eventDateID;
    document.getElementById(hiddenNoOfTickets).setAttribute("value", newNumberOfTickets);

    var noOfTickets = "noOfTickets" + eventDateID;
    document.getElementById(noOfTickets).innerHTML = newNumberOfTickets;

    var removeButtonID = "remove" + eventDateID;
    var removeFunctionText = "removeTicketCheckout(" + newNumberOfTickets + "," + eventDateID + "," + price + "," + index + ");removeTicket(" + newNumberOfTickets + "," + eventDateID + "," + price + ")";
    document.getElementById(removeButtonID).setAttribute("onclick", removeFunctionText);

    var priceID = "price" + eventDateID;
    var newPrice = newNumberOfTickets * price;
    document.getElementById(priceID).innerHTML = newPrice;

    var cookieIDNoOfTickets = "noOfTickets" + index;

    setCookie(cookieIDNoOfTickets, newNumberOfTickets, 7);

    return false;
}

function removeTicketCheckout(numberOfTickets, eventDateID, price, index) {
    var newNumberOfTickets = parseInt(numberOfTickets) - 1;

    var addButtonID = "addCheckout" + eventDateID;
    var addFunctionText = "addTicketCheckout(" + newNumberOfTickets + "," + eventDateID + "," + price + "," + index + ");addTicket(" + newNumberOfTickets + "," + eventDateID + "," + price + "," + index + ")";
    document.getElementById(addButtonID).setAttribute("onclick", addFunctionText);

    var hiddenNoOfTickets = "hidden_noOfTicketsCheckout" + eventDateID;
    document.getElementById(hiddenNoOfTickets).setAttribute("value", newNumberOfTickets);

    var noOfTickets = "noOfTicketsCheckout" + eventDateID;
    document.getElementById(noOfTickets).innerHTML = newNumberOfTickets;

    var removeButtonID = "removeCheckout" + eventDateID;
    var removeFunctionText = "removeTicketCheckout(" + newNumberOfTickets + "," + eventDateID + "," + price + "," + index + ");removeTicket(" + newNumberOfTickets + "," + eventDateID + "," + price + "," + index + ")";
    document.getElementById(removeButtonID).setAttribute("onclick", removeFunctionText);

    var priceID = "priceCheckout" + index;
    var newPrice = newNumberOfTickets * price;
    document.getElementById(priceID).innerHTML = newPrice;

    var cookieIDNoOfTickets = "noOfTickets" + index;

    setCookie(cookieIDNoOfTickets, newNumberOfTickets, 7);

    return false;
}

function addNewTicket(eventDateID, page, date) {
    var i = 0;
    var allCookies = document.cookie;
    var ca = allCookies.split(';');
    var noExists = true;
    if (ca.length > 1) {

        for (i = 1; i <= ((ca.length - 1) / 2); i++) {

            var cookieIDEventDateID = "eventDateID" + i;
            var cookieEventDateID = getCookie(cookieIDEventDateID);
            if (cookieEventDateID == eventDateID) {
                console.log("here");
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
                    changeShoppingCartRow(i, cookieEventDateID, newNoOfTickets);
                }
            }
        }

        if (noExists == true) {
            var index = (ca.length / 2);
            var forCookieIDEventDateID = "eventDateID" + index;
            var forCookieEventDateID = document.getElementById("showing").value;
            var forCookieIDNoOfTickets = "noOfTickets" + index;
            var forCookieNoOfTickets = document.getElementById("noOfTickets").value;

            setCookie(forCookieIDEventDateID, forCookieEventDateID, 7);
            setCookie(forCookieIDNoOfTickets, forCookieNoOfTickets, 7);
            setCookie("basketTotalProductTypes", index, 7);

            createRowInShoppingBasket(index, forCookieNoOfTickets, forCookieIDEventDateID, page, date);
        }

    } else {
        var forCookieIDEventDateID = "eventDateID1";
        var forCookieEventDateID = document.getElementById("showing").value;
        var forCookieIDNoOfTickets = "noOfTickets1";
        var forCookieNoOfTickets = document.getElementById("noOfTickets").value;

        setCookie(forCookieIDEventDateID, forCookieEventDateID, 7);
        setCookie(forCookieIDNoOfTickets, forCookieNoOfTickets, 7);

        createRowInShoppingBasket(1, forCookieNoOfTickets, forCookieEventDateID, page, date);
        setCookie("basketTotalProductTypes", 1, 7);
    }

    return true;
}

function toCheckout() {

    //collect event ID and number of tickets with an array function and set cookies then submit the form

    var allTickets = document.getElementsByClassName("movieIdForCheckout");
    var i = 0;
    for (i = 0; i < (allTickets.length - 1); i++) {
        var eventDateIDname = "eventDateID" + (i + 1);
        var eventDateID = allTickets[i].value;
        setCookie(eventDateIDname, eventDateID, 7);
    }

    var noOfTickets = document.getElementsByClassName("noOfTickets");

    var i = 0;
    for (i = 0; i < (noOfTickets.length - 1); i++) {
        var noOfTicketsIDname = "noOfTickets" + (i + 1);
        var noOfTicketsID = noOfTickets[i].innerHTML;
        setCookie(noOfTicketsIDname, noOfTicketsID, 7);
    }

    setCookie("basketTotalProductTypes", (i + 1), 7);

    return true;
}

function toConfirm() {

    //collect event ID and number of tickets with an array function and set cookies then submit the form

    var allTickets = document.getElementsByClassName("movieIdForCheckout");
    var i = 0;
    console.log(allTickets.length);
    for (i = 0; i < (allTickets.length - 1); i++) {
        var eventDateIDname = "eventDateID" + (i + 1);
        var eventDateID = allTickets[i].value;
        setCookie(eventDateIDname, eventDateID, 7);
    }

    var noOfTickets = document.getElementsByClassName("noOfTickets");

    var i = 0;
    for (i = 0; i < (noOfTickets.length - 1); i++) {
        var noOfTicketsIDname = "noOfTickets" + (i + 1);
        var noOfTicketsID = noOfTickets[i].innerHTML;
        setCookie(noOfTicketsIDname, noOfTicketsID, 7);
    }

    setCookie("basketTotalProductTypes", (i + 1), 7);

    return true;
}

function deleteTicket(index) {

    var cookieIDEventDateID = "eventDateID" + index;
    var cookieIDNoOfTickets = "noOfTickets" + index;
    var itemsInBasket = getCookie("basketTotalProductTypes");
    var newNoItems = itemsInBasket - 1;

    if (newNoItems > 0) {
        setCookie("basketTotalProductTypes", newNoItems, 7);
    } else {
        unsetCookie("basketTotalProductTypes");
    }
    unsetCookie(cookieIDEventDateID);
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
    var r = confirm("När du skapar ett konto hos oss så sparas den data du gett oss i en databas. Du har full rätt att stänga av ditt konto i enlighet med GDPR när du önskar. Var dock medveten att alla köp kräver ett konto och att du inte kommer kunna komma åt dina köp utan konto.");
    if (r == false) {
        return false;
    } else {
        return true;
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

function createRowInShoppingBasket(index, noOfTickets, eventDateID, page, date) {
    var createTR = document.createElement("tr");

    var createTD1 = document.createElement("td");
    var textTD1 = document.getElementById("eventName").value;
    createTD1.innerHTML = textTD1;

    var createTD2 = document.createElement("td");

    var eventPrice = document.getElementById("eventPrice").value;

    var removeButtonTD2 = document.createElement("button");
    removeButtonTD2.setAttribute("id", "remove" + index);
    var onclickStringREMOVE = "return removeTicket(" + noOfTickets + ", " + eventDateID + "," + eventPrice + ", " + index + ")";
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
    var onclickStringADD = "return addTicket(" + noOfTickets + ", " + eventDateID + "," + eventPrice + ", " + index + ")";
    addButtonTD2.setAttribute("onclick", onclickStringADD);
    addButtonTD2.innerHTML = ">";

    createTD2.appendChild(addButtonTD2);

    var createTD4 = document.createElement("td");
    var createTD4div = document.createElement("div");
    createTD4div.classList.add("basketText");
    createTD4div.innerHTML = date;

    createTD4.appendChild(createTD4div);

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
    hiddenInput1TD4.value = page;

    var hiddenInput1TD4 = document.createElement("input");
    hiddenInput1TD4.setAttribute("type", "hidden");
    hiddenInput1TD4.setAttribute("name", "showMovie");
    hiddenInput1TD4.setAttribute("id", "movieDelete" + index);
    hiddenInput1TD4.classList.add("movieIdForCheckout");
    hiddenInput1TD4.value = eventDateID;

    var hiddenInput1TD4 = document.createElement("input");
    hiddenInput1TD4.setAttribute("type", "hidden");
    hiddenInput1TD4.setAttribute("name", "cartReload");
    hiddenInput1TD4.setAttribute("id", "cartReload" + index);
    hiddenInput1TD4.value = "yes";

    var deleteButton = document.createElement("button");
    deleteButton.setAttribute("id", "deleteButton" + index);
    var onclickStringDEL = "return deleteTicket(" + index + ")";
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

function changeShoppingCartRow(index, eventDateID, noOfTickets) {

    var eventPrice = document.getElementById("eventPrice").value;
    var price = parseInt(noOfTickets) * parseInt(eventPrice);

    var addText = "return addTicket(" + noOfTickets + ", " + eventDateID + ", " + eventPrice + ", " + index + ")";
    document.getElementById("add" + index).setAttribute("onclick", addText);
    var removeText = "return removeTicket(" + noOfTickets + ", " + eventDateID + ", " + eventPrice + ", " + index + ")";
    document.getElementById("remove" + index).setAttribute("onclick", removeText);
    document.getElementById("hidden_noOfTickets" + index).value = noOfTickets;
    document.getElementById("noOfTickets" + index).innerHTML = noOfTickets;
    document.getElementById("price" + index).innerHTML = price;
}