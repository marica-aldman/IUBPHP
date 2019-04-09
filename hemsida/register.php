<div class="register">
    <form method="post" action="index.php" id="registrationForm" >
        <div class="input-field">
            <input type="hidden" name="page" value="<?php echo $fromPage; ?>">
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
            <input id="firstName" type="text" name="firstName" onfocusout="validateFirstName();checkValidationRegister()">
            <span></span>
        </div>
        <div class="input-field">
            <label for="lastName">Efternamn</label>
            <input id="lastName"  type="text" name="lastName" onfocusout="validateLastName();checkValidationRegister()">
            <span></span>
        </div>
        <div>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" onfocusout="validateEmail();checkValidationRegister()">
            <span></span>
        </div>
        <div class="input-field">
            <label for="password">Lösenord</label>
            <input id="password" type="password" name="password" onfocusout="validatePassword();checkValidationRegister()">
            <span></span>
        </div>
        <div class="input-field">
            <label for="passwordRepeat">Repitera Lösenord</label>
            <input id="passwordRepeat" type="password" name="passwordRepeat" onfocusout="validatePasswordRepeat();checkValidationRegister()">
            <span></span>
        </div>
        <button id="submit" disabled>Logga in</button>
    </form>
</div>