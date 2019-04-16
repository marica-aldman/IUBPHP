function open_user_window() {
    if (document.getElementById("userLogin").classList.contains("hidden")) {
        document.getElementById("userLogin").classList.remove("hidden");
        document.getElementById("userIcon").classList.add("fa-user-window-show");
        document.getElementById("behind").classList.remove("hidden");
        if (!document.getElementById("shoppingCartWindow").classList.contains("hidden")) {
            document.getElementById("shoppingCartWindow").classList.add("hidden");
            document.getElementById("shoppingCartIcon").classList.remove("fa-shopping-cart-window-show");
        }
    } else {
        document.getElementById("userLogin").classList.add("hidden");
        document.getElementById("userIcon").classList.remove("fa-user-window-show");
        document.getElementById("behind").classList.add("hidden");
    }
}

function open_cart_window() {
    if (document.getElementById("shoppingCartWindow").classList.contains("hidden")) {
        document.getElementById("shoppingCartWindow").classList.remove("hidden");
        document.getElementById("shoppingCartIcon").classList.add("fa-shopping-cart-window-show");
        document.getElementById("behind").classList.remove("hidden");
        if (!document.getElementById("userLogin").classList.contains("hidden")) {
            document.getElementById("userLogin").classList.add("hidden");
            document.getElementById("userIcon").classList.remove("fa-user-window-show");
        }
    } else {
        document.getElementById("shoppingCartWindow").classList.add("hidden");
        document.getElementById("shoppingCartIcon").classList.remove("fa-shopping-cart-window-show");
        document.getElementById("behind").classList.add("hidden");
    }
}

function close_overlay_windows() {

    if (!document.getElementById("shoppingCartWindow").classList.contains("hidden")) {
        document.getElementById("shoppingCartWindow").classList.add("hidden");
        document.getElementById("shoppingCartIcon").classList.remove("fa-shopping-cart-window-show");
        document.getElementById("behind").classList.add("hidden");
    }
    if (!document.getElementById("userLogin").classList.contains("hidden")) {
        document.getElementById("userLogin").classList.add("hidden");
        document.getElementById("userIcon").classList.remove("fa-user-window-show");
        document.getElementById("behind").classList.add("hidden");
    }

}

function add_ticket(numberOfTickets, eventDateID, price, index) {
    var newNumberOfTickets = parseInt(numberOfTickets) + 1;

    if (newNumberOfTickets < 1) {

        delete_ticket(eventDateID);


    } else if (newNumberOfTickets > 10) {
        alert("Du kan endast beställa 10 biljetter per film.");
    } else {

        var addButtonID = "add" + eventDateID;
        var addFunctionText = "add_ticket_checkout(" + newNumberOfTickets + "," + eventDateID + "," + price + "," + index + ");add_ticket(" + newNumberOfTickets + "," + eventDateID + "," + price + "," + index + ")";
        document.getElementById(addButtonID).setAttribute("onclick", addFunctionText);

        var hiddenNoOfTickets = "hidden_noOfTickets" + eventDateID;
        document.getElementById(hiddenNoOfTickets).setAttribute("value", newNumberOfTickets);

        var noOfTickets = "noOfTickets" + eventDateID;
        document.getElementById(noOfTickets).innerHTML = newNumberOfTickets;

        var removeButtonID = "remove" + eventDateID;
        var removeFunctionText = "remove_ticket_checkout(" + newNumberOfTickets + "," + eventDateID + "," + price + "," + index + ");remove_ticket(" + newNumberOfTickets + "," + eventDateID + "," + price + "," + index + ")";
        document.getElementById(removeButtonID).setAttribute("onclick", removeFunctionText);

        var priceID = "price" + eventDateID;
        var newPrice = newNumberOfTickets * price;
        document.getElementById(priceID).innerHTML = newPrice;

        var cookieIDNoOfTickets = "noOfTickets" + index;

        set_cookie(cookieIDNoOfTickets, newNumberOfTickets, 7);

        return false;
    }
}

function add_ticket_checkout(numberOfTickets, eventDateID, price, index) {
    var newNumberOfTickets = parseInt(numberOfTickets) + 1;

    if (newNumberOfTickets < 1) {

        delete_ticket(eventDateID);


    } else if (newNumberOfTickets > 10) {
        alert("Du kan endast beställa 10 biljetter per film.");
    } else {

        var addButtonID = "addCheckout" + eventDateID;
        var addFunctionText = "add_ticket_checkout(" + newNumberOfTickets + "," + eventDateID + "," + price + "," + index + ");add_ticket(" + newNumberOfTickets + "," + eventDateID + "," + price + "," + index + ")";
        document.getElementById(addButtonID).setAttribute("onclick", addFunctionText);

        var hiddenNoOfTickets = "hidden_noOfTicketsCheckout" + eventDateID;
        document.getElementById(hiddenNoOfTickets).setAttribute("value", newNumberOfTickets);

        var noOfTickets = "noOfTicketsCheckout" + eventDateID;
        document.getElementById(noOfTickets).innerHTML = newNumberOfTickets;

        var removeButtonID = "removeCheckout" + eventDateID;
        var removeFunctionText = "remove_ticket_checkout(" + newNumberOfTickets + "," + eventDateID + "," + price + "," + index + ");remove_ticket(" + newNumberOfTickets + "," + eventDateID + "," + price + "," + index + ")";
        document.getElementById(removeButtonID).setAttribute("onclick", removeFunctionText);

        var priceID = "priceCheckout" + index;
        var newPrice = newNumberOfTickets * price;
        document.getElementById(priceID).innerHTML = newPrice;

        var cookieIDNoOfTickets = "noOfTickets" + index;

        set_cookie(cookieIDNoOfTickets, newNumberOfTickets, 7);

        return false;
    }
}

function remove_ticket(numberOfTickets, eventDateID, price, index) {
    var newNumberOfTickets = parseInt(numberOfTickets) - 1;

    var addButtonID = "add" + eventDateID;
    var addFunctionText = "add_ticket_checkout(" + newNumberOfTickets + "," + eventDateID + "," + price + "," + index + ");add_ticket(" + newNumberOfTickets + "," + eventDateID + "," + price + ")";
    document.getElementById(addButtonID).setAttribute("onclick", addFunctionText);

    var hiddenNoOfTickets = "hidden_noOfTickets" + eventDateID;
    document.getElementById(hiddenNoOfTickets).setAttribute("value", newNumberOfTickets);

    var noOfTickets = "noOfTickets" + eventDateID;
    document.getElementById(noOfTickets).innerHTML = newNumberOfTickets;

    var removeButtonID = "remove" + eventDateID;
    var removeFunctionText = "remove_ticket_checkout(" + newNumberOfTickets + "," + eventDateID + "," + price + "," + index + ");remove_ticket(" + newNumberOfTickets + "," + eventDateID + "," + price + ")";
    document.getElementById(removeButtonID).setAttribute("onclick", removeFunctionText);

    var priceID = "price" + eventDateID;
    var newPrice = newNumberOfTickets * price;
    document.getElementById(priceID).innerHTML = newPrice;

    var cookieIDNoOfTickets = "noOfTickets" + index;

    set_cookie(cookieIDNoOfTickets, newNumberOfTickets, 7);

    return false;
}

function remove_ticket_checkout(numberOfTickets, eventDateID, price, index) {
    var newNumberOfTickets = parseInt(numberOfTickets) - 1;

    var addButtonID = "addCheckout" + eventDateID;
    var addFunctionText = "add_ticket_checkout(" + newNumberOfTickets + "," + eventDateID + "," + price + "," + index + ");add_ticket(" + newNumberOfTickets + "," + eventDateID + "," + price + "," + index + ")";
    document.getElementById(addButtonID).setAttribute("onclick", addFunctionText);

    var hiddenNoOfTickets = "hidden_noOfTicketsCheckout" + eventDateID;
    document.getElementById(hiddenNoOfTickets).setAttribute("value", newNumberOfTickets);

    var noOfTickets = "noOfTicketsCheckout" + eventDateID;
    document.getElementById(noOfTickets).innerHTML = newNumberOfTickets;

    var removeButtonID = "removeCheckout" + eventDateID;
    var removeFunctionText = "remove_ticket_checkout(" + newNumberOfTickets + "," + eventDateID + "," + price + "," + index + ");remove_ticket(" + newNumberOfTickets + "," + eventDateID + "," + price + "," + index + ")";
    document.getElementById(removeButtonID).setAttribute("onclick", removeFunctionText);

    var priceID = "priceCheckout" + index;
    var newPrice = newNumberOfTickets * price;
    document.getElementById(priceID).innerHTML = newPrice;

    var cookieIDNoOfTickets = "noOfTickets" + index;

    set_cookie(cookieIDNoOfTickets, newNumberOfTickets, 7);

    return false;
}

function add_new_ticket(eventDateID, page, date) {
    var i = 0;
    var allCookies = document.cookie;
    var ca = allCookies.split(';');
    var noExists = true;
    if (ca.length > 1) {

        for (i = 1; i <= ((ca.length - 1) / 2); i++) {

            var cookieIDEventDateID = "eventDateID" + i;
            var cookieEventDateID = get_cookie(cookieIDEventDateID);
            if (cookieEventDateID == eventDateID) {
                var forCookieIDNoOfTickets = "noOfTickets" + i;
                var forCookieNoOfTickets = parseInt(document.getElementById("noOfTickets").value);
                var newNoOfTickets = parseInt(get_cookie(forCookieIDNoOfTickets)) + forCookieNoOfTickets;
                if (newNoOfTickets > 10) {
                    alert("Du kan endast beställa 10 biljetter per film.");
                    noExists = false;
                } else {
                    set_cookie(forCookieIDNoOfTickets, newNoOfTickets, 7);
                    noExists = false;

                    //add correction of shopping cart
                    change_shopping_cart_row(i, cookieEventDateID, newNoOfTickets);
                }
            }
        }

        if (noExists == true) {
            var index = (ca.length / 2);
            var forCookieIDEventDateID = "eventDateID" + index;
            var forCookieEventDateID = document.getElementById("showing").value;
            var forCookieIDNoOfTickets = "noOfTickets" + index;
            var forCookieNoOfTickets = document.getElementById("noOfTickets").value;

            set_cookie(forCookieIDEventDateID, forCookieEventDateID, 7);
            set_cookie(forCookieIDNoOfTickets, forCookieNoOfTickets, 7);
            set_cookie("basketTotalProductTypes", index, 7);

            create_row_in_shopping_basket(index, forCookieNoOfTickets, forCookieIDEventDateID, page, date);
        }

    } else {
        var forCookieIDEventDateID = "eventDateID1";
        var forCookieEventDateID = document.getElementById("showing").value;
        var forCookieIDNoOfTickets = "noOfTickets1";
        var forCookieNoOfTickets = document.getElementById("noOfTickets").value;

        set_cookie(forCookieIDEventDateID, forCookieEventDateID, 7);
        set_cookie(forCookieIDNoOfTickets, forCookieNoOfTickets, 7);

        create_row_in_shopping_basket(1, forCookieNoOfTickets, forCookieEventDateID, page, date);
        set_cookie("basketTotalProductTypes", 1, 7);
    }

    return true;
}

function to_checkout() {

    //collect event ID and number of tickets with an array function and set cookies then submit the form

    var allTickets = document.getElementsByClassName("movieIdForCheckout");
    var i = 0;
    for (i = 0; i < (allTickets.length - 1); i++) {
        var eventDateIDname = "eventDateID" + (i + 1);
        var eventDateID = allTickets[i].value;
        set_cookie(eventDateIDname, eventDateID, 7);
    }

    var noOfTickets = document.getElementsByClassName("noOfTickets");

    var i = 0;
    for (i = 0; i < (noOfTickets.length - 1); i++) {
        var noOfTicketsIDname = "noOfTickets" + (i + 1);
        var noOfTicketsID = noOfTickets[i].innerHTML;
        set_cookie(noOfTicketsIDname, noOfTicketsID, 7);
    }

    set_cookie("basketTotalProductTypes", i, 7);

    return true;
}

function to_confirm() {

    //collect event ID and number of tickets with an array function and set cookies then submit the form

    var allTickets = document.getElementsByClassName("movieIdForCheckoutInCheckout");
    var i = 0;
    for (i = 1; i <= (allTickets.length - 1); i++) {
        var eventDateIDname = "eventDateID" + (i + 1);
        var eventDateID = allTickets[i].value;
        set_cookie(eventDateIDname, eventDateID, 7);
    }

    var noOfTickets = document.getElementsByClassName("noOfTicketsCheckout");

    var i = 0;
    for (i = 1; i <= (noOfTickets.length - 1); i++) {
        var noOfTicketsIDname = "noOfTickets" + (i + 1);
        var noOfTicketsID = noOfTickets[i].innerHTML;
        set_cookie(noOfTicketsIDname, noOfTicketsID, 7);
    }

    set_cookie("basketTotalProductTypes", i, 7);

    return true;
}

function delete_ticket(index) {

    var cookieIDEventDateID = "eventDateID" + index;
    var cookieIDNoOfTickets = "noOfTickets" + index;
    var itemsInBasket = get_cookie("basketTotalProductTypes");
    var newNoItems = itemsInBasket - 1;

    if (newNoItems > 0) {
        set_cookie("basketTotalProductTypes", newNoItems, 7);
    } else {
        unset_cookie("basketTotalProductTypes");
    }
    unset_cookie(cookieIDEventDateID);
    unset_cookie(cookieIDNoOfTickets);

    return true;

}

function alert_cookies() {
    var r = confirm("Denna sida använder cookies och session för sidans funktionalitet.");
    if (r == false) {
        window.location.assign("https://www.google.com");
    }
}

function alert_GDPR() {
    var r = confirm("När du skapar ett konto hos oss så sparas den data du gett oss i en databas. Du har full rätt att stänga av ditt konto i enlighet med GDPR när du önskar. Var dock medveten att alla köp kräver ett konto och att du inte kommer kunna komma åt dina köp utan konto.");
    if (r == false) {
        return false;
    } else {
        return true;
    }
}

function set_cookie(name, value, days) {
    var date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    var expires = "expires=" + date.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

function unset_cookie(name) {
    document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
}

function get_cookie(name) {
    var cookieName = name + "=";
    var allCookies = document.cookie;
    var cookieArray = allCookies.split(';');
    for (var i = 0; i < cookieArray.length; i++) {
        var separateCookie = cookieArray[i];
        while (separateCookie.charAt(0) == ' ') {
            separateCookie = separateCookie.substring(1);
        }
        if (separateCookie.indexOf(cookieName) == 0) {
            return separateCookie.substring(cookieName.length, c.length);
        }
    }
    return "none";

    //if the cookie exists this function returns the value of the cookie with that the given name. No cookies on this site are serialized, encoded or otherwise as both php and js need to be able to read and set them
}

function create_row_in_shopping_basket(index, noOfTickets, eventDateID, page, date) {
    var createTR = document.createElement("tr");

    var createTD1 = document.createElement("td");
    var textTD1 = document.getElementById("eventName").value;
    createTD1.innerHTML = textTD1;

    var createTD2 = document.createElement("td");

    var eventPrice = document.getElementById("eventPrice").value;

    var removeButtonTD2 = document.createElement("button");
    removeButtonTD2.setAttribute("id", "remove" + index);
    var onclickStringREMOVE = "return remove_ticket(" + noOfTickets + ", " + eventDateID + "," + eventPrice + ", " + index + ")";
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
    var onclickStringADD = "return add_ticket(" + noOfTickets + ", " + eventDateID + "," + eventPrice + ", " + index + ")";
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
    var onclickStringDEL = "return delete_ticket(" + index + ")";
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

function change_shopping_cart_row(index, eventDateID, price, noOfTickets) {

    var eventPrice = document.getElementById("eventPrice").value;
    var price = parseInt(noOfTickets) * parseInt(eventPrice);

    var addText = "add_ticket_checkout(" + noOfTickets + "," + eventDateID + "," + price + "," + index + ");add_ticket(" + noOfTickets + "," + eventDateID + "," + price + "," + index + ")";
    document.getElementById("add" + index).setAttribute("onclick", addText);
    var removeText = "remove_ticket_checkout(" + noOfTickets + "," + eventDateID + "," + price + "," + index + ");remove_ticket(" + noOfTickets + "," + eventDateID + "," + price + "," + index + ")";
    document.getElementById("remove" + index).setAttribute("onclick", removeText);
    document.getElementById("hidden_noOfTickets" + index).value = noOfTickets;
    document.getElementById("noOfTickets" + index).innerHTML = noOfTickets;
    document.getElementById("price" + index).innerHTML = price;
}