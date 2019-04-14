
<main>

<?php
    //Main page
    if($page == "home" || $page == "client") {
        //start

        include_once "customer_start.php" ;

    } elseif ($page == "searchMovies") {
        //Movie list

        include_once "movie_list.php" ;
    
    } elseif ($page == "movie") {
        //Single movie

        include_once "movie.php";

    } elseif ($page == "checkout") {
        //checkout

        include_once "checkout.php";

    }  elseif ($page == "confirmation") {
        //confirmation window

        include_once "confirmation.php";

    } elseif ($page == "myTickets") {
        if($_SESSION['userID'] != "None") {
            //My tickets

            include_once "my_tickets.php";
        } else {
            // you shouldn't get to this page without a cookie, something is wrong.
            $toPage = "myTickets";
            include_once "login.php";
        }

    } elseif ($page == "myTicket") {
        if($_SESSION['userID'] != "None") {
            //My tickets

            include_once "my_ticket.php";
        } else {
            // you shouldn't get to this page without a cookie, something is wrong.
            $toPage = "myTicket";
            include_once "login.php";
        }

    } elseif ($page == "customerProfile") {
        if($_SESSION['userID'] != "None") {
            //My profile

            include_once "customer_profile.php";
        } else {
            // you shouldn't get to this page without a cookie, something is wrong.
            $toPage = "customerProfile";
            include_once "login.php";
        }

    } elseif ($page == "changeCustomerPassword") {
        if($_SESSION['userID'] != "None") {
            //change adress

            include_once "change_customer_password.php";
        } else {
            // you shouldn't get to this page without a cookie, something is wrong.
            $toPage = "changeCustomerPassword";
            include_once "login.php";
        }

    }  elseif ($page == "changeDetails") {
        if($_SESSION['userID'] != "None") {
            //change adress

            include_once "change_customer_details.php";
        } else {
            // you shouldn't get to this page without a cookie, something is wrong.
            $toPage = "changeDetails";
            include_once "login.php";
        }

    }  elseif ($page == "register") {
        //register user

        include_once "register.php";

    } 
?>
</main>