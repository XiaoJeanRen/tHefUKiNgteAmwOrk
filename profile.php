<?php
    session_start();
    ob_start();
    require("DatabaseObject.php");
    require("DatabaseVar.php");

    $database = new DatabaseObject($host, $username, $password, $database);


    $output = ob_get_clean();
    require("includes/header.php");

    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $result = $database->query("SELECT `id`, `permission` FROM `users` WHERE `id` = '$user_id' LIMIT 1");
        $user = $database->fetch($result);
        $member_post_result = $database->query("SELECT * FROM `post_event_confirm_data` WHERE `post_member_id` = '{$user_id}' LIMIT 1");
        if ($user['permission']) {
            echo "<div class='member-container'><a class='confirm-a'><h2>你的貼文</h2></a>";
            try {
                if ($database->num_rows($member_post_result) == 0) {
                    echo "<br><a>opps! 沒有資料!</a>";
                } else {
                    while ($postMemberData = $database->fetch($member_post_result)){
                        echo "<div class='post-confirm'>
                            <table class='member-content-table'>
                                <thead>
                                    <tr>
                                        <th>
                                            <form class='form-manage' action='./edit_event.php#{$postMemberData['id']}' method='post'>
                                                    <input type='hidden' name='postid' value='{$postMemberData['id']}'>
                                                    <input type='submit' name='edit-sumit' value='修改內容'>
                                            </form>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class='active-row'>
                                        <td>{$postMemberData['title']}</td>
                                    </tr>
                                    <tr class='active-row'>
                                        <td>
                                            <form class='form-signup' action='./detail.php#{$postMemberData['id']}' method='post'>
                                                <input type='hidden' name='postid' value='{$postMemberData['id']}'>
                                                <input class='detail-submit' type='submit' name='detail-submit' value='查看詳細資料'><br>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    ";
                    }
                }
                echo "</div></div>";
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
?>