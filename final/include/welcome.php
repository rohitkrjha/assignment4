<?php
session_start();
?>

                                        <?php
                                        if(isset($_SESSION['need'])
                                        echo"<p>Welcome <b>{$_SESSION['need']}</b></p>"
                                        else
                                        echo "<p>Welcome <b>Guest</b></p>"
                                        ?>

