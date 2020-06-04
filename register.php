<?php 
require("DatabaseObject.php");
require("DatabaseVar.php");

$database = new DatabaseObject($host, $username, $password, $database);



if (!empty($_POST['register-submit'])) {
    $username = $database->clean($_POST['username']);
    $password = $database->clean($_POST['password']);
    $name = $database->clean($_POST['name']);
    $email = $database->clean($_POST['email']);


    // 檢查帳號是否已存在
    $result = $database->query("SELECT * FROM  `users` WHERE username='$username' LIMIT 1");
    $row = mysqli_fetch_row($result);
    try {
        //帳號
        if (strlen($username) < 5) {
            throw new Exception('帳號不能少於5個字元.');
        }

        if (strlen($username) > 50) {
            throw new Exception('帳號不能大於50個字元.');
        }

        //檢查輸入帳號密碼是否有特殊符號
        if (!ctype_alnum($username)) {
            throw new Exception('帳號只能由字母和數字組成.');
        }

        if ($row[1] == $username) {
            throw new Exception('此帳號已存在.');
        }

        //密碼
        if (strlen($password) < 6) {
            throw new Exception('密碼不可少於6個字元.');
        }


        //使用者名稱
        if (strlen($name) < 4){
            throw new Exception('使用者名稱不可小於4個字元.');
        }
        if (strlen($name) > 12) {
            throw new Exception('使用者名稱不能大於12個字元.');
        }

        // md5 訊息摘要演算法 加密密碼
        $password = md5($password);
        $database->query("INSERT INTO `Users` (
                `username`,
                `password`,
                `name`,
                `email`
            ) VALUES (
                '$username',
                '$password',
                '$name',
                '$email'
            )");

            if ($database->affected_rows() > 0){
                echo "帳號創建完成.";
            }


    }catch (Exception $e){
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
        <form class='form-signup' action='./register.php' method='post'>
            <h1>註冊</h1>
            <input type='text' name='username' placeholder='帳號' required /><br>
            <input type='text' name='name' placeholder='使用者名稱' required /><br>
            <input type='email' name='email' placeholder='信箱' required /><br>
            <input type='password' name='password' placeholder='密碼' required /><br>
            <input type='password' name='repsw' placeholder='再次輸入密碼' required /><br>
            <input class='register-submit' type='submit' name='register-submit' value='繼續'><br>
            <a class="gologin" href="./login.php">已經有帳號了?　｜</a>
            <a class="backindex" href="./index.php">　返回首頁</a>
        </form>
    </section>
</div>
