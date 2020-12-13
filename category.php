<link rel="stylesheet" href="css/layout.css">
<?php
session_start();
ob_start();
require("DatabaseObject.php");
require("DatabaseVar.php");
    
$database = new DatabaseObject($host, $username, $password, $database);    
    
$output = ob_get_clean();
require("includes/header.php");
if (!empty($_GET['tag'])) {
    try {
        $tagId = $_GET['tag'];
        $tag_result = $database->query("SELECT `tag` FROM `tags` WHERE `id`  = $tagId");
        $tagData = $database->fetch($tag_result);
        $tagName = $tagData['tag'];
        echo "<div class='header'>
                <a>已為您列出含有： {$tagName} 標籤的文章</a>
            </div>";
        $postIdResult = $database->query("SELECT `postId` FROM `post_tag_relation` WHERE `tagId` = $tagId");
        echo "<div class='all-container'><div class='notconfirm-container'><a class='unconfirm-a'><h2>含有 {$tagName} 的文章</h2></a>";
        while ($postIdData = $database->fetch($postIdResult)) {
            $postId = $postIdData['postId'];
            $postTagResult = $database->query("SELECT * FROM `post_event_confirm_data` WHERE `id` = $postId");
            print($postId);
            try {
                if ($database->num_rows($postTagResult) == 0) {
                    echo "<br><a>opps! 沒有資料!</a>";
                } else {
                    while ($postTagData = $database->fetch($postTagResult)){
                        echo "<div class='post-notconfirm'>
                            <table class='unconfirm-content-table'>
                                <thead>
                                    <tr>
                                        <th>標題</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class='active-row'>
                                        <td>{$postTagData['title']}</td>
                                    </tr>
                                    <tr class='active-row'>
                                        <td>
                                            <form class='form-signup' action='./detail.php#{$postTagData['id']}' method='post'>
                                                <input type='hidden' name='postid' value='{$postTagData['id']}'>
                                                <input class='detail-submit' type='submit' name='detail-submit' value='查看詳細資料'><br>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>";
                    }
                }      
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
            echo "</div>";
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

?>