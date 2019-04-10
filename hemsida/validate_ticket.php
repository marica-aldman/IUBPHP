<section>
    <form method="post" action="index.php">
        <div>
<?php
            if(isset($_POST['validateTicketButton'])) {
                echo $err_message; 
            }
?>
            <input type="hidden" name="page" value="validateTicket">
        </div>
        <div>
            <label for="ticketID">Biljettnummer</label>
            <input type="text" name="ticketID">
        </div>
        <button name="validateTicketButton">Validera biljett</button>
    </form>
</section>

<section>
    <form method="post" action="index.php">
        <div>
<?php
            if(isset($_POST['invalidateTicketButton'])) {
                echo $err_message; 
            }
?>
            <input type="hidden" name="page" value="validateTicket">
        </div>
        <div>
            <label for="ticketID2">Biljettnummer</label>
            <input type="text" name="ticketID2">
        </div>
        <button name="invalidateTicketButton">Avvalidera biljett</button>
    </form>
</section>

<section>
    <form method="post" action="index.php">
        <div>
<?php
            if(isset($_POST['validateOrderButton'])) {
                echo $err_message; 
            }
?>
            <input type="hidden" name="page" value="validateTicket">
        </div>
        <div>
            <label for="orderID">Ordernummer</label>
            <input type="text" name="orderID">
        </div>
        <button name="validateOrderButton">Validera Order</button>
    </form>
</section>

<section>
    <form method="post" action="index.php">
        <div>
<?php
            if(isset($_POST['invalidateOrderButton'])) {
                echo $err_message; 
            }
?>
            <input type="hidden" name="page" value="validateTicket">
        </div>
        <div>
            <label for="orderID2">Ordernummer</label>
            <input type="text" name="orderID2">
        </div>
        <button name="invalidateOrderButton">Avvalidera Order</button>
    </form>
</section>