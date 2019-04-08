<div>
    <form method="post" action="index.php">
        <input type="hidden" name="page" value="<?php echo $fromPage; ?>">
        <input type="hidden" name="register" value="new">
        <label for="username">Användarnamn</label>
        <input id="username" type="text" name="username">
        <label for="firstName">Förnamn</label>
        <input id="firstName" type="text" name="firstName">
        <label for="lastName">Efternamn</label>
        <input id="lastName"  type="text" name="lastName">
        <label for="email">Email</label>
        <input id="email" type="text" name="email">
        <label for="password">Lösenord</label>
        <input id="password" type="text" name="password">
        <div id="passwordCheck" class="hidden">Lösenordet måste vara minst 8 tecken långt</div>
        <label for="passwordRepeat">Repitera Lösenord</label>
        <input id="passwordRepeat" type="text" name="password">
        <div id="repeatPasswordCheck" class="hidden">Lösenorden är inte lika</div>
        <button id="submit" disable>Logga in</button>
    </form>
</div>