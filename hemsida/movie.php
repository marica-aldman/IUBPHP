    <section>

<?php //list the movies 

$movieObject = new event;

if(isset($_POST['showMovie'])) {
    $movieObject->eventID = $_POST['showMovie'];

$result = $movieObject->get_event();

$row = $result->fetch();

?>
        <div>
            <img src="<?php echo $row['picture']; ?>">
        </div>
        <div>
            <h1>
                <?php echo $row['eventName']; ?>
            </h1>
            <p>
                <?php echo $row['info']; ?>
            </p>
            <p>
                <?php echo $row['price']; ?> kr
            </p>
            <div>
                <form method="post" action="index.php">
                    <input type="hidden" name="eventName" id="eventName" value="<?php echo $row['eventName']; ?>">
                    <input type="hidden" name="eventPrice" id="eventPrice" value="<?php echo $row['price']; ?>">
                    <input type="hidden" name="page" value="movie">
                    <input type="hidden" name="showMovie" id="movie" value="<?php echo $row['eventID']; ?>">
                    <input type="number" id="noOfTickets" name="numberOfTickets" value="1" max="10" min="1">
                    <button name="buyTicket" id="buyButton" onclick="return addNewTicket(<?php echo $row['eventID']; ?>)">Köp</button>
                </form>
            </div>
        </div>
    </section>

<?php


} else {
?>

        <p>Something went wrong. Try going back again. If the problem persists contact IT support.</p>
    </section>


<?php
}
?>