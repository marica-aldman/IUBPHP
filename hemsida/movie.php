    <section>

<?php //list the movies 

$movieObject = new event;

if(isset($_POST['showMovie'])) {
    $movieObject->eventID = filter_input(INPUT_POST, 'showMovie', FILTER_SANITIZE_NUMBER_INT);

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
            <div>
                <form method="post" action="index.php">
                    <input type="hidden" name="page" value="movie">
                    <input type="hidden" name="showMovie" value="<?php echo $row['eventID']; ?>">
                    <input type="number" id="noOfTickets" name="numberOfTickets" value="1" max="10" min="1"> 
                    <button name="buyTicket" id="buyButton">Köp</button>
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