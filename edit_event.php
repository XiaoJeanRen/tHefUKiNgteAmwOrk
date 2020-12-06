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
if (!empty($_POST['edit-submit'])) {
    $user_id = $_SESSION['user_id'];
    $result = $database->query("SELECT `id`, `username`, `name`, `permission` FROM `users` WHERE `id` = '$user_id' LIMIT 1");
    $user = $database->fetch($result);
    $post_id = $_POST['postid'];
    
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
            $start_daily = $database->clean($_POST['start_daily']);
            $end_daily = $database->clean($_POST['end_daily']);
            $is_confirm = $database->clean($_POST['is_confirm']);

            $database->query("UPDATE `post_event_confirm_data` SET
            title = '$title',
            descript = '$descript',
            organizer = '$organizer',
            start_daily = '$start_daily',
            end_daily = '$end_daily',
            original_web = '$original_web',
            post_member = '$post_member',
            post_member_id = '$post_member_id',
            is_confirm = '$is_confirm'
            WHERE `id` = $post_id");
        }
        if ($database->affected_rows() > 0) {
            echo "<a>修改完成</a>";
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
$user = $database->fetch($result);
$post_id = $_POST['postid'];
$post_data_result = $database->query("SELECT * FROM `post_event_confirm_data` WHERE `id` = $post_id LIMIT 1");
$poster = $database->fetch($post_data_result);
    if ($user['permission'] == "管理員" or $user['id'] == $poster['post_member_id']) {
        
        try {
                $post_data_result = $database->query("SELECT * FROM `post_event_confirm_data` WHERE `id` = $post_id LIMIT 1");
                if ($database->num_rows($post_data_result) == 0) {
                    throw new Exception('沒有任何資料存在，發生錯誤');
                } else {
                    while ($data = $database->fetch($post_data_result)) {
                        if ($data['is_confirm'] == 1) {
                            $is_confirm = '已審核';
                        } else {
                            $is_confirm = '未審核';
                        }
    
                        if ($data['post_member'] == 'admin_system') {
                            $post_member = '系統';
                        } else {
                            $post_member = $data['post_member'];
                        }
                        
                        echo "<div class='write-wrapper-main'>
                                <section class='write-section-default'>
                                    <form class='form-signup' action='./edit_event.php#{$data['id']}' method='post'>
                                        <h1>修改貼文 文章編號：{$data['id']}</h1>
                                        <input type='hidden' name='postid' value='{$data['id']}'>
                                        標題：<input type='text' name='title' value='{$data['title']}' required /><br>
                                        得獎者：<input type='text' name='winner' placeholder='得獎者' value='{$data['winner']}' required /><br>
                                        主辦方：<input type='text' name='organizer' placeholder='主辦方' value='{$data['organizer']}' required /><br>
                                        原網址：<input type='text' name='original_web' placeholder='原網址' value='{$data['original_web']}' /><br>
                                        描述：<input type='text' name='descript' placeholder='描述' value='{$data['descript']}' required /><br>
                                        活動開始日期：<input type='datetime-local' name='start_daily' placeholder='活動開始日期' value='{$data['start_daily']}' required /><br>
                                        活動結束日期：<input type='datetime-local' name='end_daily' placeholder='活動結束日期' value='{$data['end_daily']}' required /><br>";
                                        if ($data['is_confirm'] == 1) {
                                            echo "審核結果：<input type='radio' name='is_confirm' value='1' checked/>審核通過 
                                            <input type='radio' name='is_confirm' value='0' />審核不通過<br>";
                                        } else {
                                            echo "審核結果：<input type='radio' name='is_confirm' value='1' />審核通過 
                                            <input type='radio' name='is_confirm' value='0' checked/>審核不通過<br>";
                                        }
                                        
                                        echo "<input class='edit-submit' type='submit' name='edit-submit' value='繼續'><br>
                                    </form>
                                </section>
                            </div>";
                    }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    } else {
        echo "
            <a>你不是管理員，無法查看</a>
        ";
    }
}

?>