
<main class="main_admin">
    
<!-- template card -->
<?php
        if(!isset($_SESSION['userType']) || $_SESSION['userType'] != "Admin") {
            //log in form if not logged in
?>

<div class="loginForm">
<?php
            if($err_message !== "") {
?>
    <div>
                <?php echo $err_message; ?>
    </div>
<?php
            }   
?>
    <form method="post" action="index.php">
        <div class="input-field">
            <input type="hidden" name="page" value="adminLogIn">
            <input type="hidden" name="admin_login" value="yes">
            <span></span>
        </div>
        <div class="input-field">
            <label for="username">Användarnamn</label>
            <input type="text" name="username" id="username" onfocusout="validateLoginUsername();validateLoginForm()">
            <span></span>
        </div>
        <div class="input-field">
            <label for="password">Lösenord</label>
            <input type="text" name="password" id="password" onfocusout="validateLoginPassword();validateLoginForm()">
            <span></span>
        </div>
        <button id="submit" disabled>Logga in</button>
    </form>
</div>
<?php   
        } else {
            //if logged in check which page and get that
            if($page=="addEvent") {
                //add event

                include_once "add_event.php" ;
            } elseif ($page=="addVenue") {
                //add venue

                include_once "add_venue.php";
                
            } elseif ($page=="addTickets") {
                //add tickets

                include_once "add_tickets.php";
            } elseif ($page=="validateTicket") {
                //admin profile

                include_once "ticket_validation.php";
            } elseif ($page=="adminMyProfile") {
                //admin profile

                include_once "admin_profile.php";
            } else {
                //admin start

                include_once "admin_start.php";
                
            }
        }
?>

</main>