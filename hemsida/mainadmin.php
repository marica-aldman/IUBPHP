
<main class="main_admin">
    
<!-- template card -->
<?php
        if(!isset($_SESSION['userType']) || $_SESSION['userType'] != "Admin") {
            //log in form if not logged in
?>
<div class="adminLoginForm">
<?php
            if($err_message_login !== "") {
?>
    <div>
                <?php echo $err_message_login; ?>
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
            <input type="text" name="username" id="username" onkeyup="validateLoginUsername();validateLoginForm()" onpaste="validateLoginUsername();validateLoginForm()" onclick="validateLoginUsername();validateLoginForm()">
            <span></span>
        </div>
        <div class="input-field">
            <label for="password">Lösenord</label>
            <input type="password" name="password" id="password" onkeyup="validateLoginPassword();validateLoginForm()" onpaste="validateLoginPassword();validateLoginForm()" onclick="validateLoginPassword();validateLoginForm()">
            <span></span>
        </div>
        <div>
            <button id="submit" class="loginButton" disabled>Logga in</button>
        </div>
    </form>
</div>
<?php   
        } else {
            // check which page and get that
            if($page=="addEvent") {
                //add event

                include_once "add_event.php" ;
            } elseif ($page=="changeEvent") {
                //change event

                include_once "change_event.php";
            } elseif ($page=="event") {
                // list of all events

                include_once "events.php";
            }  elseif ($page=="addVenue") {
                //add venue

                include_once "add_venue.php";
            }  elseif ($page=="changeVenue") {
                // list of all venues

                include_once "change_venue.php";
            } elseif ($page=="venue") {
                //change venue

                include_once "venue.php";
            } elseif ($page=="addTickets") {
                //add tickets

                include_once "add_tickets.php";
            } elseif ($page=="changeTickets") {
                //add tickets

                include_once "change_tickets.php";
            } elseif ($page=="tickets") {
                //list of all tickets

                include_once "tickets.php";
            } elseif ($page=="validateTicket") {
                //admin profile

                include_once "ticket_validation.php";
            } elseif ($page=="adminMyProfile") {
                //admin profile

                include_once "admin_profile.php";
            } elseif ($page=="newAdmin") {
                //create new admin

                include_once "new_admin.php";
            } elseif ($page=="admins") {
                //list all admins

                include_once "admins.php";
            } elseif ($page=="changeAdminPassword") {
                //change password

                include_once "change_admin_password.php";
            } else {
                //admin start

                include_once "admin_start.php";
                
            }
        }
?>

</main>