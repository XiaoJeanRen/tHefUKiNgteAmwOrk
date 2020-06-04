<?php
    session_start();
    
    if (isset($_REQUEST['logstate'])) {
        session_destroy();
        header("Location: ./login.php");
    }
?>