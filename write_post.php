<link rel="stylesheet" href="css/layout.css">
<?php
session_start();
ob_start();
require("DatabaseObject.php");
require("DatabaseVar.php");
    
$database = new DatabaseObject($host, $username, $password, $database);

$output = ob_get_clean();
require("includes/header.php");

if (!empty($_POST['write-submit'])) {
    $user_id = $_SESSION['user_id'];
    $result = $database->query("SELECT `id`, `username`, `name`, `permission` FROM `users` WHERE `id` = '$user_id' LIMIT 1");
    $user = $database->fetch($result);
    
    try {
        if ($database->num_rows($result) == 0){
            throw new Exception('此帳號不存在，發生錯誤');
        }else{
            $title = $_POST['title'];
            $descript = $database->clean($_POST['descript']);
            $organizer = $database->clean($_POST['organizer']);
            $original_web = $database->clean($_POST['original_web']);
            $post_member = $database->clean($user['name']);      
            $post_member_id = $database->clean($user['id']);
            $is_confirm = 0;

            $database->query("INSERT INTO `post_event_confirm_data` (
            `title`,
            `descript`,
            `organizer`,
            `original_web`,
            `post_member`,
            `post_member_id`,
            `is_confirm`
            ) VALUES (
                '$title',
                '$descript',
                '$organizer',
                '$original_web',
                '$post_member',
                '$post_member_id',
                '$is_confirm'
            )");
        }
        

        if ($database->affected_rows() > 0) {
            echo "<a>發布完成</a>";
        } else {
            throw new Exception('錯誤');
        }
    }catch (Exception $e){
        echo $e->getMessage();
    }
}

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

    if ($user['permission']) {
        echo "<div class='write-wrapper-main'>
        <section class='write-section-default'>
            <form class='form-signup' action='./write_post.php' method='post'>
                <h1>Po 一篇送禮文造福大眾吧！</h1>
                <input type='text' name='title' placeholder='標題' required /><br>
                <input type='text' name='descript' placeholder='描述' required /><br>
                <input type='text' name='organizer' placeholder='主辦方' required /><br>
                <input type='text' name='original_web' placeholder='原網址' required /><br>
                <input class='write-submit' type='submit' name='write-submit' value='繼續'><br>
            </form>
        </section>
    </div>";
    }
}

?>