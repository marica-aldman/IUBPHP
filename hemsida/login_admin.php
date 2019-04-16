<?php
            if($errMessage != "") {
?>
    <div>
                <?php echo $errMessage; ?>
    </div>
<?php
            }   
?>
    <form method="post" action="index.php">
        <div class="inputField">
            <input type="hidden" name="page" value="<?php echo $toPage; ?>">
            <input type="hidden" name="adminLogin" value="yes">
            <span></span>
        </div>
        <div class="inputField">
            <label for="username">Användarnamn</label>
            <input type="text" name="username" id="username" onkeyup="validate_login_username();validate_login_form()" onpaste="validate_login_username();validate_login_form()" onclick="validate_login_username();validate_login_form()">
            <span></span>
        </div>
        <div class="inputField">
            <label for="password">Lösenord</label>
            <input type="password" name="password" id="password" onkeyup="validate_login_password();validate_login_form()" onpaste="validate_login_password();validate_login_form()" onclick="validate_login_password();validate_login_form()">
            <span></span>
        </div>
        <button id="submit" disabled>Logga in</button>
    </form>
</div>