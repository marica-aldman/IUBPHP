<?php

   $userObject = new user;
   $doneOrError = "";
    if($_SESSION['userID'] != "None") {
        if(isset($_POST['saveDetails'])) {
            $userObject->username = $_SESSION['userID'];
            $previousPassword = $_POST['previousPassword'];
            $newPassword = $_POST['newPassword'];

            $user = $userObject->get_customer_login_by_username();
            $result = $user->fetch();
            $success = password_verify($previousPassword, $result['password']);

            if($success) {
                $userObject->password = password_hash($newPassword, PASSWORD_DEFAULT);
                $userObject->change_password();
                $doneOrError = "Klart";
            } else {
                $doneOrError = "Fel lösenord";
            }           
        }
    
?>

<section class="changeForm">
        <div>
            <?php if($doneOrError == "Klart") { echo $doneOrError; } ?>
        </div>
    <form method="post" action="index.php">
        <div>
            <div>
                Nuvarande lösenord
            </div>
            <div>
                <input type="password" name="previousPassword" id="oldPassword" onkeyup="validate_old_password();validate_new_password_form()" onpaste="validate_old_password();validate_new_password_form()" onclick="validate_old_password();validate_new_password_form()">
                <span><?php if($doneOrError != "Klart") { echo $doneOrError; } ?></span>
            </div>
        </div>
        <div>
            <div>
                Nytt lösenord
            </div>
            <div>
                <input type="password" name="newPassword" id="password" onkeyup="validate_new_password();validate_new_password_form()" onpaste="validate_new_password();validate_new_password_form()" onclick="validate_new_password();validate_new_password_form()">
                <span></span>
            </div>
        </div>
        <div>
            <div>
                Repitera nytt lösenord
            </div>
            <div>
                <input type="password" name="checkPassword" id="passwordRepeat" onkeyup="validate_repeat_password();validate_new_password_form()" onpaste="validate_repeat_password();validate_new_password_form()" onclick="validate_repeat_password();validate_new_password_form()">
                <span></span>
            </div>
        </div>
        <div>
            <div>
                <input type="hidden" name="page" value="changeCustomerPassword">
                <button name="saveDetails" class="loginButton" id="submit" value="yes" disabled>Spara</button>
            </div>
        </div>
    </form>
    <form method="post" action="index.php">
        <div class="backButton">
                <button name="page" class="generalButton" value="customerProfile">Tillbaka</button>
        </div>
    </form>
</section>

<?php
    }
?>