<div class="login">
    <form method="post" action="index.php" id="mainLogin">
        <div class="input-field">
            <input type="hidden" name="page" value="<?php echo $fromPage; ?>">
            <input type="hidden" name="client_login" value="yes">
        <span></span>
        </div>
        <div class="input-field">
            <label for="username">Användarnamn</label>
            <input type="text" name="username" id="user_login_username" onkeyup="validateNavUsername();validateNavForm()" onpaste="validateNavUsername();validateNavForm()" onclick="validateNavUsername();validateNavForm()">
        <span></span>
        </div>
        <div class="input-field">
            <label for="password">Lösenord</label>
            <input type="text" name="password" id="user_login_password" onkeyup="validateNavPassword();validateNavForm()" onpaste="validateNavPassword();validateNavForm()" onclick="validateNavPassword();validateNavForm()">
            <span></span>
        </div>
        <input type="submit" name="customer_login" value="Logga in" class="user_login_button" id="submitButton" disabled>
    </form>
    <p>
        Om du inte har konto så kan du registrera dig här.
    </p>
    <form method="post" action="index.php">
        <input type="hidden" name="page" value="register">
        <input type="hidden" name="toPage" value="<?php echo $toPage; ?>">
        <button class="user_login_button">Registrera dig</button>
    </form>
</div>