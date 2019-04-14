<?php

   $userObject = new user;
   $doneOrError = "";
    if($_SESSION['userID'] != "None") {
        $userObject->username = $_SESSION['userID'];

        $result = $userObject->get_customer_login_by_username();

        $user = $result->fetch();

        if(isset($_POST['saveDetails'])) {
            if($user['password'] != $_POST['previousPassword']) {
                $doneOrError = "Fel lösenord";
            } else {
                $newPassword = $_POST['newPassword'];
                $userObject->password = password_hash($newPassword, PASSWORD_DEFAULT);
                $userObject->change_password();
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
                <input type="password" name="checkPassword" id="passwordRepeat" onkeyup="validateRepeatPassword();validateNewPasswordForm()" onpaste="validateRepeatPassword();validateNewPasswordForm()" onclick="validateRepeatPassword();validateNewPasswordForm()">
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