<body <?php
    if(isset($_SESSION['userType'])) {
        
    } else {
        $_SESSION['userType'] = "Guest";
        $_SESSION['userID'] = "None";
        echo 'onload="alertCookies()"';
    }

    if(isset($_POST['cartReload'])) {
        echo 'onload=open_cart_window()';
      unset($_POST['cartReload']);  
    } 
?>>
<div>
<?php 

$page = "";
$showMovie = "none";
$mainpage = "client";
$headerImg = "img/logo_red.png";
$toPage = "";

//check for a logg out

if(isset($_POST['showMovieNav'])){
    $showMovie = $_POST['showMovieNav'];
    unset($_POST['showMovieNav']);
} else {
    $showMovie = "none";
}

//make sure someone regestering returns to the page they started on

if(isset($_POST['page'])) {
    $page = $_POST['page'];
    // check if it is one of the admin pages
    if($page == "admin" || $page == "admins" || $page == "addEvent"|| $page == "changeEvent" || $page == "addVenue"|| $page == "changeVenue" || $page == "addTickets"|| $page == "changeTickets" || $page == "validateTicket" || $page == "adminMyProfile" || $page == "adminLogIn" || $page == "changeAdminPassword" || $page == "event" || $page == "venue" || $page == "tickets" || $page == "newAdmin"){ 
        $mainpage = "admin";
        $headerImg = "img/logo_red.png";

    //otherwise it isnt an admin page
    } else {
        //if a specific movie is being shown
        if($page == "movie") {
            $showMovie = $_POST['showMovie'];
        }

        $mainpage = "client";
        $headerImg = "img/logo_red.png";

    }

    if (isset($_POST['toPage'])) {
        if($page == "admin") {
            $page = $_POST['toPage'];
            $mainpage = "admin";
        } else {
            $toPage = $_POST['toPage'];
            $mainpage = "client";
            $headerImg = "img/logo_red.png";
        }
        unset($_POST['toPage']);
    }

    unset($_POST['page']);
} else {
    if (isset($_POST['toPage'])) {
        if($page == "admin") {
            $page = $_POST['toPage'];
            $mainpage = "admin";
        } else {
            $toPage = $_POST['toPage'];
            $page = "client";
            $mainpage = "client";
            $headerImg = "img/logo_red.png";
        }
        unset($_POST['toPage']);
    } else {
        $mainpage = "client";
        $headerImg = "img/logo_red.png";
        $page="client";
    }
}

?>
    <header>
        <form method="post" action="index.php">
            <input type="hidden" name="page" value="client">
            <button>
                <img src="<?php echo $headerImg; ?>">
            </button>
        </form>
<?php
    if($mainpage=="client") {
?>
        <div id="behind" class="behind-overlay-windows hidden" onclick="close_overlay_windows()">
        </div>

        <div class="shopping_cart_icon" id="shopping_cart_icon_div" onclick="open_cart_window()">
            <i class="fas fa-shopping-cart" id="shopping_cart_icon"></i>
        </div>

        <div class="noOfTicketsCircle <?php 
            if(isset($_POST['order'])) {
                    echo "hidden";
            } else {
                if($basketTotalProductTypes==0){
                    echo "hidden";
                }
            }
            ?>" id="noOfTicketsIcon">
            &nbsp;<?php echo $basketTotalProductTypes; ?>
        </div>

        <div class="shopping_cart_window hidden" id="shopping_cart_window">
            <h1>Varukorg</h1>
            <table>
                <thead>
                    <tr>
                        <th>Film
                        </th>
                        <th>Antal
                        </th>
                        <th>Datum
                        </th>
                        <th>Pris
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody id="shoppingBasketTable">
<?php 
                    if(isset($_POST['order'])) {

                    } else {
                        if($basketTotalProductTypes>0) {
                            $i=0;
                            for($i=1; isset($_COOKIE["eventDateID" . $i]); $i++) {
                                $showingObject->eventDateID = $_COOKIE["eventDateID" . $i];
                                $result = $showingObject->get_unsoldtickets_eventDateID();

                                $row = $result->fetch();
                                    
                                $singleMovieObject->eventID = $row['eventID'];
                                $result2 = $singleMovieObject->get_event();
                                $row2 = $result2->fetch();

                                $venueObject->venueID = $row['venueID'];
                                $result3 = $venueObject->get_venue();
                                $row3 = $result3->fetch();

                                $dateAndTime = $row['dateAndTime'];
                                $dateTimeSplit = str_split($dateAndTime, 10);
                                $date = $dateTimeSplit[0];
                                $time = $dateTimeSplit[1];
                    
?>
                    <tr>
                        <td><?php echo $row2['eventName']; ?>
                        </td>
                        <td>
                            <button class="moreOrLess" id="remove<?php
                             echo $i; 
                             ?>" onclick="<?php if($page == "checkout") {?>removeTicketCheckout(<?php echo $_COOKIE['noOfTickets' . $i]; ?>, <?php echo $row['eventDateID']; ?>, <?php echo $row2['price']; ?>, <?php echo $i; ?>);<?php } ?>removeTicket(<?php echo $_COOKIE['noOfTickets' . $i]; ?>, <?php echo $row['eventDateID']; ?>, <?php echo $row2['price']; ?>, <?php echo $i; ?>)"><</button>
                            <input id="hidden_noOfTickets<?php echo $i; ?>" type="hidden" name="numberOfTickets<?php echo $i; ?>" value="<?php echo $_COOKIE["noOfTickets" . $i]; ?>">
                            <div class="basketText noOfTickets" id="noOfTickets<?php echo $i; ?>"><?php echo $_COOKIE["noOfTickets" . $i]; ?></div>
                            <button class="moreOrLess" id="add<?php echo $i; ?>" onclick="<?php if($page == "checkout") {?>addTicketCheckout(<?php echo $_COOKIE['noOfTickets' . $i]; ?>, <?php echo $row['eventDateID']; ?>, <?php echo $row2['price']; ?>, <?php echo $i; ?>);<?php } ?>addTicket(<?php echo $_COOKIE['noOfTickets' . $i]; ?>, <?php echo $row['eventDateID']; ?>, <?php echo $row2['price']; ?>, <?php echo $i; ?>)">></button>
                        </td>
                        <td><?php echo $date; ?>
                        </td>
                        <td ><div class="basketText" id="price<?php echo $i; ?>"><?php $price = (int) $row2['price'] * (int) $_COOKIE["noOfTickets" . $i]; echo $price; ?></div>
                        </td>
                        <td>
                            <form method="post" action="index.php">
                                <input type="hidden" name="page" value="<?php echo $page; ?>">
                                <input type="hidden" name="showMovie" id="movieDelete<?php echo $i; ?>" value="<?php echo $row['eventDateID']; ?>" class="movieIdForCheckout">
                                <input type="hidden" name="cartReload" id="cartReload<?php echo $i; ?>" value="yes">
                                <button class="deleteButton" id="deleteButton<?php echo $i; ?>" onclick="return deleteTicket(<?php echo $i; ?>)">X</button>
                            </form>
                        </td>
                    </tr>


<?php 
                            }
                        }
                    }
                    unset($_POST['buyTicket']);
?>
                </tbody>
            </table>
            
            <form method="post" action="index.php">
                <input type="hidden" name="page" value="checkout">
                <button class="loginButton" <?php if($basketTotalProductTypes <= 0 || $basketTotalProductTypes == null) { echo "disabled"; } else { echo 'return toCheckout()"'; } ?>>Till Kassan</button>
            </form>
        </div>
        
        <div class="user_icon" id="user_icon_div" onclick="open_user_window()">
            <i class="fas fa-user" id="user_icon"></i>
        </div>
        <div class="user_login hidden" id="user_login">
            <form method="post" action="index.php" id="mainLogin">
                <div class="input-field">
                    <input type="hidden" name="page" value="<?php echo $page; ?>">
                    <input type="hidden" name="client_login" value="yes">
                    <span><?php echo $err_message_login . " " . $err_message; ?></span>
                </div>
                <div class="input-field">
                    <label for="username">Användarnamn</label>
                    <input type="text" name="username" id="user_login_username" onkeyup="validateNavUsername();validateNavForm()" onpaste="validateNavUsername();validateNavForm()" onclick="validateNavUsername();validateNavForm()">
                    <span></span>
                </div>
                <div class="input-field">
                    <label for="password">Lösenord</label>
                    <input type="password" name="password" id="user_login_password" onkeyup="validateNavPassword();validateNavForm()" onpaste="validateNavPassword();validateNavForm()" onclick="validateNavPassword();validateNavForm()">
                    <span></span>
                </div>
                <div>
                    <input type="submit" name="customer_login" value="Logga in" class="user_login_button" id="submitButton" disabled>
                </div>
            </form>
            <p class="register_text">
                Om du inte har konto så kan du registrera dig här.
            </p>
            <form method="post" action="index.php">
                <input type="hidden" name="page" value="register">
                <input type="hidden" name="toPage" value="<?php echo $page; ?>">
                <button class="register_button">Registrera dig</button>
            </form>
        </div>
        
<?php }  ?>
    </header>

    <nav>
        <ul>
<?php   if($mainpage=="admin"){
            if(isset($_SESSION['userType']) && $_SESSION['userType'] == "Admin") { ?>
            <form method="post" action="index.php">
                <li>
                    <button class="navbutton" name="page" value="event">Filmer</button>
                </li>
                <li>
                    <button class="navbutton" name="page" value="venue">Salong</button>
                </li>
                <li>
                    <button class="navbutton" name="page" value="tickets">Visningar</button>
                </li>
                <li>
                    <button class="navbutton" name="page" value="validateTicket">Verifiera Biljett</button>
                </li>
                <li>
                    <button class="navbutton" name="page" value="admins">Administratörer</button>
                </li>
                <li>
                    <button class="navbutton" name="page" value="adminMyProfile">Min Profil</button>
                </li>
                <li>
                    <input type="hidden" name="toPage" value="admin">
                    <button class="navbutton" name="adminLoggedOut">Logga Ut</button>
                </li>
            </form>
<?php       } else { ?>
            <form method="post" action="index.php">
                <li>
                    <button class="navbutton" name="page" value="adminLogIn">Logga In</button>
                </li>
            </form>
<?php       }
        }  else {
           if(isset($_SESSION['userType']) && $_SESSION['userType'] == "Customer") {
?>        
            <form method="post" action="index.php">
                <li>
                    <button class="navbutton" name="page" value="home">Hem</button>
                </li>
                <li>
                    <button class="navbutton" name="page" value="searchMovies">Filmer</button>
                </li>
                <li>
                    <button class="navbutton" name="page" value="myTickets">Mina Biljetter</button>
                </li>
                <li>
                    <button class="navbutton" name="page" value="customerProfile">Min profil</button>
                </li>
                <li>
<?php 
    if($page == "movie") {
?>
                    <input type="hidden" name="showMovieNav" value="<?php echo $_POST['showMovie'] ?>">
<?php  
    }
?>
                    <input type="hidden" name="toPage" value="<?php echo $page; ?>">
                    <button class="navbutton" name="client_logout">Logga Ut</button>
                </li>
            </form>
<?php
           } else {
?>
            <form method="post" action="index.php">
                <li>
                    <button class="navbutton" name="page" value="home">Hem</button>
                </li>
                <li>
                    <button class="navbutton" name="page" value="searchMovies">Filmer</button>
                </li>
            </form> 
<?php
            }
        }
?>
        </ul>
    </nav><?php echo $page; ?>