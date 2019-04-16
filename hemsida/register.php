<div class="register">
    <form method="post" action="index.php" id="registrationForm" >
        <div class="inputField">
            <input type="hidden" name="page" value="<?php echo $toPage; ?>">
            <input type="hidden" name="register" value="new">
            <span></span>
        </div>
        <div class="inputField">
            <p>
                Ditt användarnamn kommer vara detsamma som din emailadress.
            </p>
        </div>
        <div class="inputField">
            <label for="firstName">Förnamn</label>
            <input id="firstName" type="text" name="firstName" onkeyup="validate_first_name();check_validation_register()" onpaste="validate_first_name();check_validation_register()" onclick="validate_first_name();check_validation_register()">
            <span></span>
        </div>
        <div class="inputField">
            <label for="lastName">Efternamn</label>
            <input id="lastName"  type="text" name="lastName" onkeyup="validate_last_name();check_validation_register()" onpaste="validate_last_name();check_validation_register()" onclick="validate_last_name();check_validation_register()">
            <span></span>
        </div>
        <div class="inputField">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" onkeyup="validateEmail();check_validation_register()" onpaste="validateEmail();check_validation_register()" onclick="validateEmail();check_validation_register()">
            <span></span>
        </div>
        <div class="inputField">
            <label for="password">Lösenord</label>
            <input id="password" type="password" name="password" onkeyup="validate_password();check_validation_register()" onpaste="validate_password();check_validation_register()" onclick="validate_password();check_validation_register()">
            <span></span>
        </div>
        <div class="inputField">
            <label for="passwordRepeat">Repitera Lösenord</label>
            <input id="passwordRepeat" type="password" name="passwordRepeat" onkeyup="validate_password_repeat();check_validation_register()" onpaste="validate_password_repeat();check_validation_register()" onclick="validate_password_repeat();check_validation_register()">
            <span></span>
        </div>
        <div>
            <button id="submit" class="loginButton" disabled onclick="return alert_GDPR()">Logga in</button>
        </div>
    </form>
</div>