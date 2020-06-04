<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>白給網</title>
    <link rel="stylesheet" href="css/layout.css">
</head>
<body>
    <div class="topnav">
        <?php
            if (isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];
                $result = $database->query("SELECT `id`, `username`, `name`, `permission` FROM `users` WHERE `id` = '$user_id' LIMIT 1");
                try {
                    if ($database->num_rows($result) == 0){
                        throw new Exception('此帳號不存在，發生錯誤');
                    }else{
                        $user = $database->fetch($result);
                    }
                }catch (Exception $e){
                    echo $e->getMessage();
                }
                if ($user['permission'] != "管理員") {
                    echo "
                    <div class='js-logout'>
                        <a class='logout' href='logout.php?logstate=logout'>登出 
                        </a>
                    </div>
                    <div class='dropdown'>
                        <button class='dropbtn'>你好 {$user['name']} ({$user['permission']})
                        <i class='arrow down'></i>
                        </button>
                        <div class='dropdown-content'>
                            <a href='profile.php'>個人資訊</a>
                            <a href='account_manage.php'>帳號管理</a>
                        </div>
                    </div>
                    "; 
                }else {
                    echo "
                    <div class='js-logout'>
                        <a class='logout' href='logout.php?logstate=logout'>登出 
                        </a>
                    </div>
                    <div class='dropdown'>
                        <button class='dropbtn'>你好 {$user['name']} ({$user['permission']})
                         <i class='arrow down'></i>
                        </button>
                        <div class='dropdown-content'>
                            <a href='profile.php'>個人資訊</a>
                            <a href='account_manage.php'>帳號管理</a>
                            <a href='admin_manage.php'>管理員審核</a>
                        </div>
                    </div>
                    "; 
                }
                
            } else {
                echo
                "<div class='js-login'><a class='login' href='login.php'>登入</a></div>
                <div class='js-register'><a class='register' href='register.php'>註冊</a></div>";
            }
        ?>
        <div class="js-about"><a href="about.php">關於我們</a></div>
        <div class="js-index"><a href="index.php">首頁</a></div>
        
        
    </div>
    <div class="header">
        <img class="imgMiddle" src="img/logo.png"> | 白給網 <br>
        <a>使你成為客家人的康莊大道</a>
    </div>
</body>
</html>