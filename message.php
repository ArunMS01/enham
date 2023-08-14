<?php
if(isset($_SESSION['message'])){
    echo "<div style='border-radius:2px; margin-bottom:4px; padding:5px;' class='alert alert-primary' role='alert'>" .$_SESSION['message']. "</div>";

    unset($_SESSION['message']);
}
?>