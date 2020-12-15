<link rel="stylesheet" href="css/layout.css">
<?php
session_start();
ob_start();
require("DatabaseObject.php");
require("DatabaseVar.php");
    
$database = new DatabaseObject($host, $username, $password, $database);

$output = ob_get_clean();
require("includes/header.php");

// 修改輸入的資料
if (!empty($_POST['edit-account-submit'])) {
    $user_id = $_SESSION['user_id'];
    $result = $database->query("SELECT * FROM `users` WHERE `id` = '$user_id' LIMIT 1");
    $user = $database->fetch($result);
    $old_password = $database->clean($_POST['old_password']);
    $email = $database->clean($_POST['email']);
    $name = $database->clean($_POST['name']);
    $new_password = $database->clean($_POST['new_password']);
    try {
        if ($database->num_rows($result) == 0){
            throw new Exception('此帳號不存在，發生錯誤');
        }else{
            if (md5($old_password) != $user['password']) {
                throw new Exception('密碼錯誤.');
            }
            //使用者名稱
            if (strlen($name) < 4){
                throw new Exception('使用者名稱不可小於4個字元.');
            }
            if (strlen($name) > 12) {
                throw new Exception('使用者名稱不能大於12個字元.');
            }

            //密碼
            if (!empty($new_password)){
                if (strlen($new_password) < 6) {
                    throw new Exception('密碼不可少於6個字元.');
                }
                $new_password = md5($new_password);
                $database->query("UPDATE `users` SET
                    `name` = '$name',
                    `email` = '$email',
                    `password` = '$new_password'
                    WHERE `id` = $user_id");
            } else {
                $old_password = md5($old_password);
                $database->query("UPDATE `users` SET
                    `name` = '$name',
                    `email` = '$email',
                    `password` = '$old_password'
                    WHERE `id` = $user_id");

            }

            if ($database->affected_rows() > 0) {
                echo "<a>修改完成</a>";
            } else {
                throw new Exception('發生錯誤');
            }
        }
    }catch (Exception $e){
        echo $e->getMessage();
    }
}

if (isset($_SESSION['user_id'])) {
$user_id = $_SESSION['user_id'];
$result = $database->query("SELECT * FROM `users` WHERE `id` = '$user_id' LIMIT 1");
$user = $database->fetch($result);
    try {
        if ($database->num_rows($result) == 0){
            throw new Exception('此帳號不存在，發生錯誤');
        }else{
            echo "<div class='write-wrapper-main'>
                    <section class='write-section-default'>
                        <form class='form-edit-account' action='./account_manage.php' method='post'>
                            <h1>帳號管理</h1>
                            使用者帳號：{$user['username']}<br>
                            使用者權限：{$user['permission']}<br>
                            使用者名稱：<input type='text' name='name' placeholder='使用者名稱' value='{$user['name']}' required /><br>
                            使用者信箱：<input type='email' name='email' placeholder='信箱' value='{$user['email']}' required /><br>
                            更改密碼：<input type='password' name='new_password' placeholder='新密碼' value=''/><br>
                            <h2>請輸入原密碼進行修改帳號</h2>
                            原密碼：<input type='password' name='old_password' placeholder='密碼' required /><br>
                            <input class='edit-account-submit' type='submit' name='edit-account-submit' value='繼續'><br>
                        </form>
                    </section>
                <div>
            ";
        }
    }catch (Exception $e){
        echo $e->getMessage();
    }
}

?>