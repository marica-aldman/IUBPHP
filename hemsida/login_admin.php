<?php
            if($err_message !== "") {
?>
    <div>
                <?php echo $err_message; ?>
    </div>
<?php
            }   
?>
    <form method="post" action="index.php">
        <div class="input-field">
            <input type="hidden" name="page" value="<?php echo $toPage; ?>">
            <input type="hidden" name="admin_login" value="yes">
            <span></span>
        </div>
        <div class="input-field">
            <label for="username">Användarnamn</label>
            <input type="text" name="username" id="username" onkeyup="validateLoginUsername();validateLoginForm()" onpaste="validateLoginUsername();validateLoginForm()" onclick="validateLoginUsername();validateLoginForm()">
            <span></span>
        </div>
        <div class="input-field">
            <label for="password">Lösenord</label>
            <input type="password" name="password" id="password" onkeyup="validateLoginPassword();validateLoginForm()" onpaste="validateLoginPassword();validateLoginForm()" onclick="validateLoginPassword();validateLoginForm()">
            <span></span>
        </div>
        <button id="submit" disabled>Logga in</button>
    </form>
</div>