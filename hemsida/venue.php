<section class="list">
    <aside>
        <form method="post" action="index.php">
            <ul class="addButton">
                <li>
                    <button class="generalButton" name="page" value="addVenue">Lägg till ny salong</button>
                </li>
            </ul>
        </form>
    </aside>

    
    <section class="eventList">
        <table>
            <thead>
                <tr>
                    <th>
                        Namn
                    </th>
                    <th>
                        Storlek
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
            <tbody>
            
<?php //list the movies 

    $venueObject = new venue;

    $result = $venueObject->get_all_venues();

    while($row = $result->fetch()) {

?>
        
                <form method="post" action="index.php">
                    <tr>
                        <td>
                            <?php echo $row['theater']; ?>
                        </td>
                        <td>
                            <?php echo $row['size']; ?>
                        </td>
                        <td>
                            <input type="hidden" name="page" value="changeVenue">
                            <input type="hidden" name="venueID" value="<?php echo $row['venueID']; ?>">
                            <button class="generalButton">Ändra</button>
                        </td>
                    </tr>

<?php 
    } //end of event list
?>
                </form>
            </tbody>
        </table>

    </section>
</section>