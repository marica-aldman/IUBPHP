
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
        //My tickets

        include_once "my_tickets.php";

    } elseif ($page == "myProfile" || $page == "changeAdress") {
        //My profile

        include_once "customer_profile.php";

    }  elseif ($page == "register") {
        //register user

        include_once "register.php";

    }
?>
</main>