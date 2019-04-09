<?php

?>
        <footer>
            <hr>
            <div class="footer_column">
                <p>Something</p>
            </div>
            <div class="footer_column">
<?php   if($mainpage == "admin"){ ?>
                <form method="post" action="index.php">
                    <button name="page" value="client">Huvudsida</button>
                </form>
            </div>
<?php   

        } else { ?>
                <form method="post" action="index.php">
                    <button name="page" value="admin">Admin sidor</button>
                </form>
            </div>
<?php   } ?>

        </footer>
        </div>
        <script src="js/validation.js"></script>
        
    </body>
</html>