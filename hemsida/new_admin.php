<?php
    $errOrNot = "";
    //check if the event has been saved
    if(isset($_POST['saveAdmin'])) {
        $username = filter_input(INPUT_POST, 'eventName', FILTER_SANITIZE_MAGIC_QUOTES);
        $password = filter_input(INPUT_POST, 'premere', FILTER_SANITIZE_MAGIC_QUOTES);
        $passwordRepeat = filter_input(INPUT_POST, 'director', FILTER_SANITIZE_MAGIC_QUOTES);

        $adminObject = new admin;
        $adminObject->username = $username;
        $adminObject->password = password_hash($password, PASSWORD_DEFAULT);

        $test = $adminObject->check_username();

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


<section class="new_admin">
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
                            <div class="new_admin_form">
                                <label for="email">Email</label>
                                <input id="email" type="email" name="email" onkeyup="validateEmail();checkValidationRegister()" onpaste="validateEmail();checkValidationRegister()" onclick="validateEmail();checkValidationRegister()">
                                <span></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="new_admin_form">
                                <label for="password">Lösenord</label>
                                <input id="password" type="password" name="password" onkeyup="validatePassword();checkValidationRegister()" onpaste="validatePassword();checkValidationRegister()" onclick="validatePassword();checkValidationRegister()">
                                <span></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="new_admin_form">
                                <label for="passwordRepeat">Repitera Lösenord</label>
                                <input id="passwordRepeat" type="password" name="passwordRepeat" onkeyup="validatePasswordRepeat();checkValidationRegister()" onpaste="validatePasswordRepeat();checkValidationRegister()" onclick="validatePasswordRepeat();checkValidationRegister()">
                                <span></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="new_admin_form">
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