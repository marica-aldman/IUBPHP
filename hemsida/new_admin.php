<?php
    $errOrNot = "";
    //check if the event has been saved
    if(isset($_POST['saveAdmin'])) {
        $username = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_MAGIC_QUOTES);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_MAGIC_QUOTES);
        $passwordRepeat = filter_input(INPUT_POST, 'passwordRepeat', FILTER_SANITIZE_MAGIC_QUOTES);

        $adminObject = new admin;
        $adminObject->username = $username;
        $adminObject->password = password_hash($password, PASSWORD_DEFAULT);

        $test = $adminObject->check_unique_username();

        if($test) {
            $errOrNot = "Denna email används redan.";
        } else {
            $success = $adminObject->create_admin();

            if($success) {
                $errOrNot = "Klart";
            } else {
                $errOrNot = "Nått gick fel.";
            }
        }
    }
?>


<section class="newAdmin">
        <div>
<?php
        if(isset($_POST['saveAdmin'])) {
            echo $errOrNot;
        }
?>
        </div>
        <table>
            <tbody>
                <!-- template row -->
                <form method="post" action="index.php">
                    <tr>
                        <td>
                            <div class="newAdminForm">
                                <label for="email">Email</label>
                                <input id="email" type="email" name="email" onkeyup="validate_email();check_validation_register_admin()" onpaste="validate_email();check_validation_register_admin()" onclick="validate_email();check_validation_register_admin()">
                                <span></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="newAdminForm">
                                <label for="password">Lösenord</label>
                                <input id="password" type="password" name="password" onkeyup="validate_password();check_validation_register_admin()" onpaste="validate_password();check_validation_register_admin()" onclick="validate_password();check_validation_register_admin()">
                                <span></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="newAdminForm">
                                <label for="passwordRepeat">Repitera Lösenord</label>
                                <input id="passwordRepeat" type="password" name="passwordRepeat" onkeyup="validate_password_repeat();check_validation_register_admin()" onpaste="validate_password_repeat();check_validation_register_admin()" onclick="validate_password_repeat();check_validation_register_admin()">
                                <span></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="newAdminForm">
                                <input type="hidden" name="page" value="newAdmin">
                                <button name="saveAdmin" class="loginButton" value="yes" id="submit" disabled>Spara</button>
                            </div>
                        </td>
                    </tr>
                </form>
            </tbody>
        </table>
    <form method="post" action="index.php">
        <div>
                <button name="page" class="generalButton" value="admins">Tillbaka</button>
        </div>
    </form>
    </section>