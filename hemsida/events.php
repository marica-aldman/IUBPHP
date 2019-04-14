<section class="list">
    <aside>
        <form method="post" action="index.php">
            <ul class="add_button">
                <li>
                    <button name="page" class="generalButton" value="addEvent">Lägg till ny film</button>
                </li>
            </ul>
        </form>
    </aside>

    
    <section class="event_list">
        <table>
            <thead>
                <tr>
                    <th>
                        Titel
                    </th>
                    <th>
                        Premiär
                    </th>
                    <th>
                        Slutar gå
                    </th>
                    <th>
                        Regisör
                    </th>
                    <th>
                        Orginalspråk
                    </th>
                    <th>
                        Pris
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
            <tbody>
            
<?php //list the movies 
    unset($_POST['eventID']);

    $eventObject = new event;

    $result = $eventObject->get_all_events();

    while($row = $result->fetch()) {

?>
        
                <form method="post" action="index.php">
                    <tr>
                        <td>
                            <?php echo $row['eventName']; ?>
                        </td>
                        <td>
                            <?php echo $row['premere']; ?>
                        </td>
                        <td>
<?php
                            if($row['finished'] == NULL){
                                echo "";
                            } else {
                                echo $row['finished'];
                            }
?>
                        </td>
                        <td>
                            <?php echo $row['director']; ?>
                        </td>
                        <td>
                            <?php echo $row['originalLanguage']; ?>
                        </td>
                        <td>
                            <?php echo $row['price']; ?>
                        </td>
                        <td>
                            <input type="hidden" name="page" value="changeEvent">
                            <input type="hidden" name="eventID" value="<?php echo $row['eventID']; ?>">
                            <button class="generalButton">Ändra</button>
                        </td>
                    </tr>
                </form>

<?php 
    } //end of event list
?>
            </tbody>
        </table>

    </section>
</section>