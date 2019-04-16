<?php

   $adminObject = new admin;
   $doneOrError = "";
    if($_SESSION['userID'] != "None") {
        $adminObject->username = $_SESSION['userID'];

        $result = $adminObject->get_admin_by_username();

        $user = $result->fetch();

        if(isset($_POST['saveDetails'])) {
            $previousPassword = $_POST['previousPassword'];
            $newPassword = $_POST['newPassword'];

            $success = password_verify($previousPassword, $user['password']);

            if($success) {
                $adminObject->password = password_hash($newPassword, PASSWORD_DEFAULT);
                $adminObject->update_admin_password();
                $doneOrError = "Klart";
            } else {
                $doneOrError = "Fel lösenord";
            }
            unset($_POST['saveDetails']); 
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
                <input type="password" name="checkPassword" id="passwordRepeat" onkeyup="validate_repeat_password();validate_new_password_form() onpaste="validate_repeat_password();validate_new_password_form() onclick="validate_repeat_password();validate_new_password_form()">
                <span></span>
            </div>
        </div>
        <div>
            <div>
                <input type="hidden" name="page" value="changeAdminPassword">
                <button class="loginButton" id="submit" name="saveDetails" value="yes" disabled>Spara</button>
            </div>
        </div>
    </form>
    <form method="post" action="index.php">
        <div>
                <button class="generalButton" name="page" value="adminMyProfile">Tillbaka</button>
        </div>
    </form>
</section>

<?php
    }
?>