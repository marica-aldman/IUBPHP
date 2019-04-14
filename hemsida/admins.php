<section class="list">
    <aside>
        <form method="post" action="index.php">
            <ul class="add_button">
                <li>
                    <button class="generalButton" name="page" value="newAdmin">Lägg till ny administratör</button>
                </li>
            </ul>
        </form>
    </aside>

    
    <section class="movie_list">
        <table>
            <thead>
                <tr>
                    <th>
                        Användarnamn
                    </th>
                </tr>
            </thead>
            <tbody>
            
<?php //list the movies 

    $adminObject = new admin;

    $result = $adminObject->get_all_admins();

    while($row = $result->fetch()) {

?>
        
                <form method="post" action="index.php">
                    <tr>
                        <td>
                            <?php echo $row['username']; ?>
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