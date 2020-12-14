<link rel="stylesheet" href="css/layout.css">
<?php
session_start();
ob_start();
require("DatabaseObject.php");
require("DatabaseVar.php");
    
$database = new DatabaseObject($host, $username, $password, $database);    
    
$output = ob_get_clean();
require("includes/header.php");
if (!empty($_POST['detail-submit'])) {
    $post_id = $_POST['postid'];
    $post_data_result = $database->query("SELECT * FROM `post_event_confirm_data` WHERE `id` = $post_id LIMIT 1");
    try {
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

                    $tags_result = $database->query("SELECT * FROM `post_tag_relation` WHERE `postId` = $post_id");

                    echo "<div class='detail-wrapper-main'>
                    <section class='detail-section-default'>
                        <h1>{$data['title']}</h1>
                        <div>
                            主辦方：{$data['organizer']}<br>
                            活動開始日期：{$data['start_daily']}<br>
                            活動結束日期：{$data['end_daily']}<br>
                            得獎者：{$data['winner']}<br>
                            原網址：<a href='{$data['original_web']}'>這裡</a><br>
                            發布日期：{$data['organizer']}<br>
                            發布人：{$post_member}<br>
                            是否已審核：{$is_confirm}<br>
                        </div>";
                    echo "<br><div class='tagnav'><a>本文章含有標籤：</a>";
                        while ($tags_data = $database->fetch($tags_result)) {
                            $tagId = $tags_data['tagId'];
                            $tag_result = $database->query("SELECT `tag` FROM `tags` WHERE `id` = $tagId");
                            $tagData = $database->fetch($tag_result);
                            $tagName = $tagData['tag'];
                            echo "
                                <a href='category.php?tag=$tagId'>$tagName</a>
                            ";
                        }
                        echo "</div>";
                    echo "
                    </section>
                  </div>";
                }  
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

?>