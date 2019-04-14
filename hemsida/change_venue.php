<?php
    $errOrNot = "";
    //check if the event has been saved
    if(isset($_POST['saveVenue'])) {
        $theater = filter_input(INPUT_POST, 'theater', FILTER_SANITIZE_MAGIC_QUOTES);
        $size = filter_input(INPUT_POST, 'size', FILTER_SANITIZE_NUMBER_INT);

        $venueObject = new venue;
        $venueObject->venueID = filter_input(INPUT_POST, 'venueID', FILTER_SANITIZE_NUMBER_INT);
        $venueObject->theater = $theater;
        $venueObject->size = $size;
        
        $success = $venueObject->update_venue();
        if($success) {
            $errOrNot = "Klart";
        } else {
            $errOrNot = "Nått gick fel.";
        } 
    }
?>

<section class="add_and_change">
        <div>
            <?php echo $errOrNot; ?>&nbsp;
        </div>
        <table>
            <tbody>
<?php

    $venueObject2 = new venue;
    $venueObject2->venueID = filter_input(INPUT_POST, 'venueID', FILTER_SANITIZE_NUMBER_INT);

    $result = $venueObject2->get_venue();

    while($row = $result->fetch()) {
?>
                <form method="post" action="index.php">
                    <tr>
                        <td>
                            Salongsnamn:
                        </td>
                        <td>
                            <input  class="timeAndText valid" type="text" class="valid" name="theater" id="theater" value="<?php echo $row['theater']; ?>" onkeyup="validateVenue();validateTheater()" onpaste="validateVenue();validateTheater()" onclick="validateVenue();validateTheater()">
                            <span></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Storlek:
                        </td>
                        <td>
                            <input  class="timeAndText valid" type="number" name="size" id="size" value="<?php echo $row['size']; ?>" onkeyup="validateVenue();validateSize()" onpaste="validateVenue();validateSize()" onclick="validateVenue();validateSize()">
                            <span></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7">
                            <input type="hidden" name="page" value="changeVenue">
                            <input type="hidden" name="venueID" value="<?php echo $row['venueID']; ?>">
                            <button class="loginButton" name="saveVenue" value="yes" id="submit">Spara</button>
                        </td>
                    </tr>
                </form>
<?php
    }
?>
            </tbody>
        </table>
    <form method="post" action="index.php">
        <div>
                <button class="generalButton" name="page" value="venue">Tillbaka</button>
        </div>
    </form>
    </section>