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
$err_message = "";
$err_message_login = "";

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
                $userObject->client_login();
                $_SESSION['userType'] = "Customer";
                $toGet = $userObject->get_customer_login_by_username();
                $result = $toGet->fetch();
                $_SESSION['userID'] = $result['username'];
        } else {
                $err_message = "Denna email adress är redan registrerad. Om det är din email adress, kontakta kundservice.";
        }
        unset($_POST['register']);
}

if(isset($_POST['client_login'])) {
        //these are validated via js, sanitize as validation does not sanitize
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_MAGIC_QUOTES); 
        $password = $_POST['password'];

        $userObject->username = $username;

        $success = $userObject->get_customer_login_by_username();
        $result = $success->fetch();
        //$success = password_verify($password, $result['password']);
        
         if(true) {
                $_SESSION['userType'] = "Customer";
                $toGet = $userObject->get_customer_login_by_username();
                $result = $toGet->fetch();
                $_SESSION['userID'] = $result['username'];
        } else {
                //$err_message_login = $success;
                $err_message_login = "Inloggning misslyckades. Kontrollera ditt användarnamn och lösenord.";
        }  
        unset($_POST['client_login']);
}

if(isset($_POST['admin_login'])) {
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
                $err_message_login = "Inloggning misslyckades. Kontrollera ditt användarnamn och lösenord.";
        }

        unset($_POST['admin_login']);
}

if(isset($_POST['client_logout'])) {
        unset($_SESSION['userType']);
        unset($_SESSION['userID']);
        session_destroy();
        session_start();
        $_SESSION['userType'] = "Guest";
        $_SESSION['userID'] = "None";
        unset($_POST['client_logout']);
}

if(isset($_POST['adminLoggedOut'])) {
        unset($_SESSION['userType']);
        unset($_SESSION['userID']);
        session_destroy();
        session_start();
        $_SESSION['userType'] = "Guest";
        $_SESSION['userID'] = "None";
        unset($_POST['adminLoggedOut']);
}

if(isset($_COOKIE['basketTotalProductTypes'])) {
    $basketTotalProductTypes = FILTER_INPUT(INPUT_COOKIE, 'basketTotalProductTypes', FILTER_SANITIZE_NUMBER_INT);
}

//check for orders so we dont send the same one twice

if(isset($_POST['order'])) {
        setcookie('OrderSaved', '1', time() + 3600);
}

// if the order has been saved delete all the cookied related to the basket

if(isset($_COOKIE['OrderSaved'])) {
        for($i=1; $basketTotalProductTypes >= $i; $i++) {
                setCookie('noOfTickets' . $i, '', time() - 3600);
                setCookie('eventDateID' . $i, '', time() - 3600);
        }
        setCookie('basketTotalProductTypes', '', time() - 3600);
        setCookie('OrderSaved', '', time() - 3600);
        $basketTotalProductTypes = "0";
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