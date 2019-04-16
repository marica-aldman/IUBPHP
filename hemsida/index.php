<?php
$session = session_start();

include_once "classes.php";

$basketTotalProductTypes = 0 ;
$i=0;
$singleMovieObject = new event;
$venueObject = new venue;
$showingObject = new unsoldTicket;
$userObject = new user;
$adminObject = new admin;
$orderObject = new order;
$ticketObject = new ticket;
$errMessage = "";
$errMessageLogin = "";

if(isset($_POST['register'])) {
        //these are validated via js, sanitize as validation does not sanitize
        $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_MAGIC_QUOTES);
        $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_MAGIC_QUOTES);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];

        //check if this email is already in use

        $result = $userObject->check_username();

        if(!$result) {
                $userObject->username = $email;
                $userObject->firstName = $firstName;
                $userObject->lastName = $lastName;
                $userObject->password = password_hash($password, PASSWORD_DEFAULT);

                $userObject->create_customer();
                $userObject->clientLogin();
                $_SESSION['userType'] = "Customer";
                $toGet = $userObject->get_customer_login_by_username();
                $result = $toGet->fetch();
                $_SESSION['userID'] = $result['username'];
        } else {
                $errMessage = "Denna email adress är redan registrerad. Om det är din email adress, kontakta kundservice.";
        }
        unset($_POST['register']);
}

if(isset($_POST['clientLogin'])) {
        //these are validated via js, sanitize as validation does not sanitize
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_MAGIC_QUOTES); 
        $password = $_POST['password'];

        $userObject->username = $username;

        $user = $userObject->get_customer_login_by_username();
        $result = $user->fetch();
        $success = password_verify($password, $result['password']);
        
         if($success) {
                $_SESSION['userType'] = "Customer";
                $toGet = $userObject->get_customer_login_by_username();
                $result = $toGet->fetch();
                $_SESSION['userID'] = $result['username'];
        } else {
                $errMessageLogin = "Inloggning misslyckades. Kontrollera ditt användarnamn och lösenord.";
        }  
        unset($_POST['clientLogin']);
}

if(isset($_POST['adminLogin'])) {
        //these are validated via js, sanitize as validation does not sanitize
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_MAGIC_QUOTES);
        $password = $_POST['password'];

        $adminObject->username = $username;
        $adminObject->password = $password;
        
        $adminGet = $adminObject->get_admin_by_username();

        $admin = $adminGet->fetch();

        $passwordVerification = password_verify($password, $admin['password']);

        if($passwordVerification) {
                $_SESSION['userType'] = "Admin";
                $toGet = $adminObject->get_admin_by_username();
                $result = $toGet->fetch();
                $_SESSION['userID'] = $result['username'];
        } else {
                $errMessageLogin = "Inloggning misslyckades. Kontrollera ditt användarnamn och lösenord.";
        }

        unset($_POST['adminLogin']);
}

if(isset($_POST['clientLogout'])) {
        unset($_SESSION['userType']);
        unset($_SESSION['userID']);
        session_destroy();
        session_start();
        $_SESSION['userType'] = "Guest";
        $_SESSION['userID'] = "None";
        unset($_POST['clientLogout']);
}

if(isset($_POST['adminLoggedOut'])) {
        unset($_SESSION['userType']);
        unset($_SESSION['userID']);
        session_destroy();
        session_start();
        $_SESSION['userType'] = "Guest";
        $_SESSION['userID'] = "None";
}

if(isset($_COOKIE['basketTotalProductTypes'])) {
    $basketTotalProductTypes = FILTER_INPUT(INPUT_COOKIE, 'basketTotalProductTypes', FILTER_SANITIZE_NUMBER_INT);
}

// if the order has been saved delete all the cookied related to the basket

if(isset($_COOKIE['orderSaved'])) {
        for($i=1; $basketTotalProductTypes >= $i; $i++) {
                $numberTickets = 'noOfTickets' . $i;
                $eventDate = 'eventDateID' . $i;
                setCookie($numberTickets, '', time() - 3600, "/");
                setCookie($eventDate, '', time() - 3600, "/");
        }
        setCookie('basketTotalProductTypes', '', time() - 3600, "/");
        setCookie('orderSaved', '', time() - 3600);
        $basketTotalProductTypes = "0";
}

//check for orders so we dont send the same one twice

if(isset($_POST['order'])) {
        setcookie('orderSaved', '1', time() + 3600);
}

include_once "head.php";
include_once "nav.php";

if($mainpage == "client") {
include_once "main.php";
} else {
include_once "mainadmin.php";
}
include_once "footer.php";

?>