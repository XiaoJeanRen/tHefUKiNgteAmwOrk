<link rel="stylesheet" href="css/layout.css">
<?php
session_start();
ob_start();
require("DatabaseObject.php");
require("DatabaseVar.php");
    
$database = new DatabaseObject($host, $username, $password, $database);    
    
$output = ob_get_clean();
require("includes/header.php");
?>

<div class="header">
    <img class="imgMiddle" src="img/haka.png"><br>
</div>