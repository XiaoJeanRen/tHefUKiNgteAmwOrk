<?php 
session_start();
ob_start();

require("DatabaseObject.php");
require("DatabaseVar.php");

$database = new DatabaseObject($host, $username, $password, $database);

if (!isset($_SESSION['user_id']) && @$_POST['login-submit']) {
    
    $username = $database->clean($_POST['username']);
    $password = $database->clean($_POST['password']);

    $result = $database->query("SELECT `id` , `username`, `password` FROM `users` WHERE `username` = '$username' LIMIT 1");
    try {
        if ($database->num_rows($result) == 0) {
            throw new Exception('帳號不存在.');
        }

        $user = $database->fetch($result);

        if (md5($password) != $user['password']) {
            throw new Exception('密碼錯誤.');
        }

        if ($database->num_rows($result) != 0 && md5($password) == $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: ./index.php");
        }


    } catch (Exception $e) {
        echo $e->getMessage();
    }

}


$output = ob_get_clean();

echo "<p style='text-align:center;'>". $output ."</p>";

?>
<link rel="stylesheet" href="css/layout.css">
<div class="wrapper-main">
    <img src="img/logo.png">
    <section class="section-default">
        <form class='form-login' action='./login.php' method='post'>
            <h1>登入</h1>
            <input type='text' name='username' placeholder='帳號' required /><br>
            <input type='password' name='password' placeholder='密碼' required /><br>
            <input type='submit' name='login-submit' value='繼續'> <br>
            <a class="goregister" href="./register.php">還沒有帳號嗎?　｜</a>
            <a class="backindex" href="./index.php">　返回首頁</a>
        </form>
    </section>
</div>
