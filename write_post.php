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
            $start_daily = $database->clean($_POST['start_daily']);
            $end_daily = $database->clean($_POST['end_daily']);
            $is_confirm = 0;
            $tags_count = intval($_POST['total_chq']);
            $new_post = $database->query("INSERT INTO `post_event_confirm_data` (
                `title`,
                `descript`,
                `organizer`,
                `start_daily`,
                `end_daily`,
                `original_web`,
                `post_member`,
                `post_member_id`,
                `is_confirm`
                ) VALUES (
                    '$title',
                    '$descript',
                    '$organizer',
                    '$start_daily',
                    '$end_daily',
                    '$original_web',
                    '$post_member',
                    '$post_member_id',
                    '$is_confirm'
                )");
            $post_id = $database->lastInsertId();

            if (!empty($_POST['tags'])){
                $tags = $_POST['tags'];           
                for ($i=0; $i<$tags_count; $i++){
                    #$tags = $tags[$i];
                    $tags_result = $database->query("SELECT `id`, `tag` FROM `tags` WHERE `tag` = '$tags[$i]' LIMIT 1");
                    try {
                        if ($database->num_rows($tags_result) == 0) {
                            $database->query("INSERT INTO `tags`(
                                `tag`
                            ) VALUES (
                                '$tags[$i]'
                            )");

                            $tag_id = $database->lastInsertId();
                            $database->query("INSERT INTO `post_tag_relation`(
                                `postId`,
                                `tagId`
                            ) VALUES (
                                '$post_id',
                                '$tag_id'
                            )");
                        } else {
                            $tagsRelationResult = $database->query("SELECT * FROM `post_tag_relation` WHERE `postId` = $post_id");
                            if ($database->num_rows($tagsRelationResult) == 0) {
                                $tags_result = $database->query("SELECT `id`, `tag` FROM `tags` WHERE `tag` = '$tags[$i]' LIMIT 1");
                                $data = $database->fetch($tags_result);
                                $tag_id = $data['id'];
                                $database->query("INSERT INTO `post_tag_relation`(
                                    `postId`,
                                    `tagId`
                                ) VALUES (
                                    '$post_id',
                                    '$tag_id'
                                )");
                            }

                        }
                    } catch (Exception $e){
                        echo $e->getMessage();
                    }
                }
            }
            
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
            
            if ($user['permission']) {
                echo "<div class='write-wrapper-main'>
                <section class='write-section-default'>
                    <div>
                        <form class='form-signup' action='./write_post.php' method='post'>
                            <h1>Po 一篇送禮文造福大眾吧！</h1>
                            <input type='text' name='title' placeholder='標題' required /><br>
                            <input type='text' name='organizer' placeholder='主辦方' required /><br>
                            <input type='text' name='original_web' placeholder='原網址' required /><br>
                            活動開始日期：<input type='datetime-local' name='start_daily' placeholder='活動開始日期' required /><br>
                            活動結束日期：<input type='datetime-local' name='end_daily' placeholder='活動結束日期' required /><br>
                            <input type='text' name='descript' placeholder='描述' required /><br>
                            <button class='add' type='button'>新增標籤</button>
                            <button class='remove' type='button'>移除標籤</button><br>
                            <div id='new_chq'></div>
                            <input type='hidden' name='total_chq' value='0' id='total_chq'>
                            <input class='write-submit' type='submit' name='write-submit' value='繼續'><br>
                        </form>
                    </div>
                </section>
            </div>";
            }
        }
    }catch (Exception $e){
        echo $e->getMessage();
    }
}

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
$('.add').on('click', add);
$('.remove').on('click', remove);

function add() {
  var new_tag = parseInt($('#total_chq').val()) + 1;
  var new_input = "<input type='text' name='tags[]' id='new_" + new_tag + "' placeholder='標籤'>";
  
  if (new_tag < 6) {
    $('#new_chq').append(new_input);
    $('#total_chq').val(new_tag);
  }
}

function remove() {
  var last_chq_no = $('#total_chq').val();

  if (last_chq_no > 0) {
    $('#new_' + last_chq_no).remove();
    $('#total_chq').val(last_chq_no - 1);
  }
}
</script>
