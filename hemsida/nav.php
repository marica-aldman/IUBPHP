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
$headerImg = "#";


//check for a logg out

if (isset($_POST['toPage'])) {
    $page = $_POST['toPage'];
    if(isset($_POST['showMovieNav'])){
        $showMovie = $_POST['showMovieNav'];
    } else {
    $showMovie = "none";
    }
    $mainpage = "client";
}
//make sure someone regestering returns to the page they started on

if (isset($_POST['fromPage'])) {
    $fromPage = $_POST['fromPage'];
}
if(isset($_POST['page'])) {
    // check if it is one of the admin pages
    if($_POST['page'] == "admin" || $_POST['page'] == "addEvent" || $_POST['page'] == "addVenue" || $_POST['page'] == "addTickets" || $_POST['page'] == "validateTicket" || $_POST['page'] == "adminMyProfile" || $_POST['page'] == "adminLoggedOut" || $_POST['page'] == "adminLogIn"){ echo $_SESSION['userType'];
        // check wich admin page
        switch($_POST['page']) {
            case "addEvent":
                $page = "addEvent";
                break;
            case "addVenue":
                $page = "addVenue";
                break;
            case "addTickets":
                $page = "addTickets";
                break;
            case "validateTicket":
                $page = "validateTicket";
                break;
            case "adminMyProfile":
                $page = "adminMyProfile";
                break;
            case "adminLoggedOut":
                $page = "adminLoggedOut";
                break;
            case "adminLogIn":
                $page = "adminLogIn";
                break;
            default:
                $page = "admin";
        }
        $mainpage = "admin";
        $headerImg = "#";

        if($page == "adminLoggedOut") {
            //logout and
            $page="admin";
        }

    //otherwise it isnt an admin page
    } else {
        //check which page
        switch($_POST['page']) {
            case "home":
                $page = "home";
                break;
            case "searchMovies":
                $page = "searchMovies";
                break;
            case "movie":
                $showMovie = $_POST['showMovie'];
                $page = "movie";
                break;
            case "checkout":
                $page = "checkout";
                break;
            case "confirmation":
                $page = "confirmation";
                break;
            case "myTickets":
                $page = "myTickets";
                break;
            case "myTicket":
                $page = "myTicket";
                break;
            case "customerProfile":
                $page = "customerProfile";
                break;
            case "logIn":
                $page = "logIn";
                break;
            case "register":
                $page = "register";
                break;
            default:
                $page = "client";
        }

        $mainpage = "client";
        $headerImg = "#";

        if($page == "loggedOut") {
            //logout and
            $page="client";
        }

    }
} else {
        $mainpage = "client";
        $headerImg = "#";
        $page="client";
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

        <div class="noOfTicketsCircle <?php if($basketTotalProductTypes==0){ echo "hidden";} ?>" id="noOfTicketsIcon">
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
                        <th>Pris
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody id="shoppingBasketTable">
<?php 
                    if($basketTotalProductTypes>0) {
                        $i=0;
                        for($i=1; isset($_COOKIE["eventID" . $i]); $i++) {
                            $singleMovieObject->eventID = $_COOKIE["eventID" . $i];
                            $result = $singleMovieObject->get_event();
                            $row = $result->fetch();
                        
?>
                    <tr>
                        <td><?php echo $row['eventName']; ?>
                        </td>
                        <td>
                            <button id="remove<?php echo $i; ?>" onclick="return removeTicket(<?php echo $_COOKIE['noOfTickets' . $i]; ?>, <?php echo $row['eventID']; ?>, <?php echo $row['price']; ?>, <?php echo $i; ?>)"><</button>
                            <input id="hidden_noOfTickets<?php echo $i; ?>" type="hidden" name="numberOfTickets<?php echo $row['eventID']; ?>" value="<?php echo $_COOKIE["noOfTickets" . $i]; ?>">
                            <div class="basketText noOfTickets" id="noOfTickets<?php echo $i; ?>"><?php echo $_COOKIE["noOfTickets" . $i]; ?></div>
                            <button id="add<?php echo $i; ?>" onclick="return addTicket(<?php echo $_COOKIE["noOfTickets" . $i]; ?>, <?php echo $row['eventID']; ?>, <?php echo $row['price']; ?>, <?php echo $i; ?>)">></button>
                        </td>
                        <td ><div class="basketText" id="price<?php echo $i; ?>"><?php $price = (int) $row['price'] * (int) $_COOKIE["noOfTickets" . $i]; echo $price; ?></div>
                        </td>
                        <td>
                            <form method="post" action="index.php">
                                <input type="hidden" name="page" value="movie">
                                <input type="hidden" name="showMovie" id="movieDelete" value="<?php echo $row['eventID']; ?>" class="movieIdForCheckout">
                                <input type="hidden" name="cartReload" id="cartReload" value="yes">
                                <button id="deleteButton<?php echo $i; ?>" onclick="return deleteTicket(<?php echo $i; ?>)">X</button>
                            </form>
                        </td>
                    </tr>


<?php 
                        }
                    }
?>
                    <tr>
                        <td colspan=3>
                            <form method="post" action="index.php">
                                <input type="hidden" name="page" value="checkout">
                                <button onclick="return toCheckout()">Till Kassan</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="user_icon" id="user_icon_div" onclick="open_user_window()">
            <i class="fas fa-user" id="user_icon"></i>
        </div>
        <div class="user_login hidden" id="user_login">
            <form method="post" action="index.php" id="mainLogin">
                <div class="input-field">
                    <input type="hidden" name="page" value="<?php echo $page; ?>">
                    <input type="hidden" name="client_login" value="yes">
                <span></span>
                </div>
                <div class="input-field">
                    <label for="username">Användarnamn</label>
                    <input type="text" name="username" id="user_login_username" onfocusout="validateNavUsername();validateNavForm()">
                <span></span>
                </div>
                <div class="input-field">
                    <label for="password">Lösenord</label>
                    <input type="text" name="password" id="user_login_password" onfocusout="validateNavPassword();validateNavForm()">
                    <span></span>
                </div>
                <input type="submit" name="customer_login" value="Logga in" class="user_login_button" id="submitButton" disabled>
            </form>
            <p>
                Om du inte har konto så kan du registrera dig här.
            </p>
            <form method="post" action="index.php">
                <input type="hidden" name="page" value="register">
                <input type="hidden" name="fromPage" value="<?php echo $page; ?>">
                <button class="user_login_button">Registrera dig</button>
            </form>
        </div>
        
<?php } echo $_SESSION['userType']; ?>
    </header>
<?php ?>

    <nav>
        <ul>
<?php   if($mainpage=="admin"){   echo $_SESSION['userType'];
            if(isset($_SESSION['userType']) && $_SESSION['userType'] == "Admin") { ?>
            <form method="post" action="index.php">
                <li>
                    <button class="navbutton" name="page" value="addEvent">Lägg till Event</button>
                </li>
                <li>
                    <button class="navbutton" name="page" value="addVenue">Lägg till Salong</button>
                </li>
                <li>
                    <button class="navbutton" name="page" value="addTickets">Lägg till Biljetter</button>
                </li>
                <li>
                    <button class="navbutton" name="page" value="validateTicket">Verifiera Biljett</button>
                </li>
                <li>
                    <button class="navbutton" name="page" value="adminMyProfile">Min Profil</button>
                </li>
                <li id="login">
                    <button class="navbutton" name="page" value="adminLoggedOut">Logga Ut</button>
                </li>
            </form>
<?php       } else { ?>
            <form method="post" action="index.php">
                <li id="logout">
                    <button class="navbutton" name="page" value="adminLogIn"><?php echo $_SESSION['userType']; ?> Logga In</button>
                </li>
            </form>
<?php       }
        }  else {
           if(isset($_SESSION['userType']) && $_SESSION['userType'] = "Customer") {
?>        
            <form method="post" action="index.php">
                <li>
                    <button class="navbutton" name="page" value="home"><?php echo $_SESSION['userType']; ?>Hem</button>
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
                <li id="logout">
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
    </nav>