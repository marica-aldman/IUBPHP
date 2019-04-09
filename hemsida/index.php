<?php
$session = session_start();

include_once "classes.php";

$basketTotalProductTypes = 0 ;
$basket = [];
$i=0;
$singleMovieObject = new Event;
$userObject = new User;
$err_message = "";

if(isset($_POST['register'])) {
        
        $firstName = $_POST['firstName']; //sanitize
        $lastName = $_POST['lastName']; //sanitize
        $email = $_POST['email']; //sanitize
        $password = $_POST['password']; //sanitize

        //check if this email is already in use

        $result = checkUsername($email);

        if(!($row = $result->fetch())) {

        $userObject->username = $email;
        $userObject->firstName = $firstName;
        $userObject->lastName = $lastName;
        $userObject->password = $password;

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
        $username = $_POST['username']; //sanitize
        $password = $_POST['password']; //sanitize

        $userObject->username = $username;
        $userObject->password = $password;

        $success = $userObject->client_login();
        if($success) {
                $_SESSION['userType'] = "Customer";
                $toGet = $userObject->get_customer_login_by_username();
                $result = $toGet->fetch();
                $_SESSION['userID'] = $result['username'];
        } else {
                $err_message = "Inloggning misslyckades. Kontrollera ditt användarnamn och lösenord.";
        }
        unset($_POST['client_login']);
}

if(isset($_POST['admin_login'])) {
        $username = $_POST['username']; // validation done by JS
        $password = $_POST['password']; // validation done by JS

        $userObject->username = $username;
        $userObject->password = $password;

        $success = $userObject->admin_login();
        if($success) {
                $_SESSION['userType'] = "Admin";
                $toGet = $userObject->get_admin_login_by_username();
                $result = $toGet->fetch();
                $_SESSION['userID'] = $result['username'];
        } else {
                $err_message = "Inloggning misslyckades. Kontrollera ditt användarnamn och lösenord.";
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

if(isset($_POST['admin_logout'])) {
        unset($_SESSION['userType']);
        unset($_SESSION['userID']);
        session_destroy();
        session_start();
        $_SESSION['userType'] = "Guest";
        $_SESSION['userID'] = "None";
        unset($_POST['admin_logout']);
}

if(isset($_COOKIE['basketTotalProductTypes'])) {
    $basketTotalProductTypes = $_COOKIE['basketTotalProductTypes'];
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