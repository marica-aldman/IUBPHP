<?php

    //get user

    $adminObject = new admin;
    
    if($_SESSION['userID'] != "None") {
        $adminObject->username = $_SESSION['userID'];

        $result = $adminObject->get_admin_by_username();

        while($row = $result->fetch()) {
    
?>

<section class="list">
    <div>
        <div>
            <?php echo $errMessage; ?>
        </div>
    </div>
    <div>
        <div>
            Användarnamn
        </div>
        <div>
            <?php echo $row['username']; ?>
        </div>
    </div>
    <div class="movieList">
        <form method="post" action="index.php">
            <input type="hidden" name="username" value="<?php echo $row['username']; ?>">
            <button class="generalButton" name="page" value="changeAdminPassword">Ändra lösenord</button>
        </form>
    </div>
</section>
<?php 

        } //selected data
    } // if logged in
?>