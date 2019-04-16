<div class="login">
    <form method="post" action="index.php" id="mainLogin">
        <div class="inputField">
            <input type="hidden" name="page" value="<?php echo $fromPage; ?>">
            <input type="hidden" name="clientLogin" value="yes">
        <span></span>
        </div>
        <div class="inputField">
            <label for="username">Användarnamn</label>
            <input type="text" name="username" id="userLoginUsername" onkeyup="validate_nav_username();validate_nav_form()" onpaste="validate_nav_username();validate_nav_form()" onclick="validate_nav_username();validate_nav_form()">
        <span></span>
        </div>
        <div class="inputField">
            <label for="password">Lösenord</label>
            <input type="text" name="password" id="userLoginPassword" onkeyup="validate_nav_password();validate_nav_form()" onpaste="validate_nav_password();validate_nav_form()" onclick="validate_nav_password();validate_nav_form()">
            <span></span>
        </div>
        <input type="submit" name="customerLogin" value="Logga in" class="userLoginButton" id="submitButton" disabled>
    </form>
    <p>
        Om du inte har konto så kan du registrera dig här.
    </p>
    <form method="post" action="index.php">
        <input type="hidden" name="page" value="register">
        <input type="hidden" name="toPage" value="<?php echo $toPage; ?>">
        <button class="userLoginButton">Registrera dig</button>
    </form>
</div>