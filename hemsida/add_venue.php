<?php
    $errOrNot = "";
    //check if the event has been saved
    if(isset($_POST['saveVenue'])) {
        $theater = filter_input(INPUT_POST, 'theater', FILTER_SANITIZE_MAGIC_QUOTES);
        $size = filter_input(INPUT_POST, 'size', FILTER_SANITIZE_NUMBER_INT);

        $venueObject = new venue;
        $venueObject->venueID = $venueObject->get_new_venueID();
        $venueObject->theater = $theater;
        $venueObject->size = $size;

        $success = $venueObject->create_venue();
        if($success) {
            $errOrNot = "Klart";
        } else {
            $errOrNot = "Nått gick fel.";
        }
    }
?>

<section class="add_and_change">
        <div>
<?php
        if(isset($_POST['saveVenue'])) {
            echo $errOrNot;
        }
?>&nbsp;
        </div>
        <form method="post" action="index.php">
            <table>
                <tbody>
                    <tr>
                        <td>
                            Salongsnamn:
                        </td>
                        <td>
                            <input type="text" name="theater" id="theater" value="<?php
                            if(isset($_POST['theater'])) {
                                echo $_POST['theater'];
                            }
                            ?>" onkeyup="validateVenue();validateTheater()" onpaste="validateVenue();validateTheater()" onclick="validateVenue();validateTheater()">
                            <span></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Storlek:
                        </td>
                        <td>
                            <input type="number" name="size" id="size" value="<?php
                            if(isset($_POST['size'])) {
                                echo $_POST['size'];
                            }
                            ?>" onkeyup="validateVenue();validateSize()" onpaste="validateVenue();validateSize()" onclick="validateVenue();validateSize()">
                            <span></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="page" value="addVenue">
                            <button class="loginButton" name="saveVenue" value="yes" id="submit" disabled>Spara</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    <form method="post" action="index.php">
        <div>
                <button class="generalButton" name="page" value="venue">Tillbaka</button>
        </div>
    </form>
    </section>