<div class="register">
    <form method="post" action="index.php" id="registrationForm" >
        <div class="input-field">
            <input type="hidden" name="page" value="<?php echo $toPage; ?>">
            <input type="hidden" name="register" value="new">
            <span></span>
        </div>
        <div class="input-field">
            <p>
                Ditt användarnamn kommer vara detsamma som din emailadress.
            </p>
        </div>
        <div class="input-field">
            <label for="firstName">Förnamn</label>
            <input id="firstName" type="text" name="firstName" onkeyup="validateFirstName();checkValidationRegister()" onpaste="validateFirstName();checkValidationRegister()" onclick="validateFirstName();checkValidationRegister()">
            <span></span>
        </div>
        <div class="input-field">
            <label for="lastName">Efternamn</label>
            <input id="lastName"  type="text" name="lastName" onkeyup="validateLastName();checkValidationRegister()" onpaste="validateLastName();checkValidationRegister()" onclick="validateLastName();checkValidationRegister()">
            <span></span>
        </div>
        <div class="input-field">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" onkeyup="validateEmail();checkValidationRegister()" onpaste="validateEmail();checkValidationRegister()" onclick="validateEmail();checkValidationRegister()">
            <span></span>
        </div>
        <div class="input-field">
            <label for="password">Lösenord</label>
            <input id="password" type="password" name="password" onkeyup="validatePassword();checkValidationRegister()" onpaste="validatePassword();checkValidationRegister()" onclick="validatePassword();checkValidationRegister()">
            <span></span>
        </div>
        <div class="input-field">
            <label for="passwordRepeat">Repitera Lösenord</label>
            <input id="passwordRepeat" type="password" name="passwordRepeat" onkeyup="validatePasswordRepeat();checkValidationRegister()" onpaste="validatePasswordRepeat();checkValidationRegister()" onclick="validatePasswordRepeat();checkValidationRegister()">
            <span></span>
        </div>
        <div>
            <button id="submit" class="loginButton" disabled onclick="return alertGDPR()">Logga in</button>
        </div>
    </form>
</div>