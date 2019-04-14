<?php

   $adminObject = new admin;
   $doneOrError = "";
    if($_SESSION['userID'] != "None") {
        $adminObject->username = $_SESSION['userID'];

        $result = $adminObject->get_admin_by_username();

        $user = $result->fetch();

        if(isset($_POST['saveDetails'])) {
            if($user['password'] != $_POST['previousPassword']) {
                $doneOrError = "Fel lösenord";
            } else {
                $newPassword = $_POST['newPassword'];
                var_dump($newPassword);
                $adminObject->password = password_hash($newPassword, PASSWORD_DEFAULT);
                var_dump($adminObject->password);
                $adminObject->update_admin_password();
                $doneOrError = "Klart";
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
                <input type="password" name="previousPassword" id="oldPassword" onkeyup="validateOldPassword();validateNewPasswordForm()" onpaste="validateOldPassword();validateNewPasswordForm()" onclick="validateOldPassword();validateNewPasswordForm()">
                <span><?php if($doneOrError != "Klart") { echo $doneOrError; } ?></span>
            </div>
        </div>
        <div>
            <div>
                Nytt lösenord
            </div>
            <div>
                <input type="password" name="newPassword" id="password" onkeyup="validateNewPassword();validateNewPasswordForm()" onpaste="validateNewPassword();validateNewPasswordForm()" onclick="validateNewPassword();validateNewPasswordForm()">
                <span></span>
            </div>
        </div>
        <div>
            <div>
                Repitera nytt lösenord
            </div>
            <div>
                <input type="password" name="checkPassword" id="passwordRepeat" onkeyup="validateRepeatPassword();validateNewPasswordForm() onpaste="validateRepeatPassword();validateNewPasswordForm() onclick="validateRepeatPassword();validateNewPasswordForm()">
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