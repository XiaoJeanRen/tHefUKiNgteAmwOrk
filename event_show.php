<link rel="stylesheet" href="css/layout.css">
<?php
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $result = $database->query("SELECT `id`, `permission` FROM `users` WHERE `id` = '$user_id' LIMIT 1");
        $user = $database->fetch($result);
        if ($user['permission'] == "管理員") { #管理員區
            $notConfirm_result = $database->query("SELECT * FROM `post_event_confirm_data` WHERE is_confirm = 0");
            $confirm_result = $database->query("SELECT * FROM `post_event_confirm_data` WHERE is_confirm = 1");
            $member_post_result = $database->query("SELECT * FROM `post_event_confirm_data` WHERE `post_member_id` = '{$user_id}' LIMIT 1");

            #顯示未審核貼文
            echo "<div class='all-container'><div class='notconfirm-container'><a class='unconfirm-a'><h2>你好管理員，以下是未審核的貼文</h2></a>";
            try {
                if ($database->num_rows($notConfirm_result) == 0) {
                    echo "<br><a>opps! 沒有資料!</a>";
                } else {
                    while ($notConfirmdata = $database->fetch($notConfirm_result)){
                        echo "<div class='post-notconfirm'>
                            <table class='unconfirm-content-table'>
                                <thead>
                                    <tr>
                                        <th>標題</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class='active-row'>
                                        <td>{$notConfirmdata['title']}</td>
                                    </tr>
                                    <tr class='active-row'>
                                        <td>
                                            <form class='form-signup' action='./detail.php#{$notConfirmdata['id']}' method='post'>
                                                <input type='hidden' name='postid' value='{$notConfirmdata['id']}'>
                                                <input class='detail-submit' type='submit' name='detail-submit' value='查看詳細資料'><br>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>";
                    }
                }      
                echo "</div>";
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            
            #顯示審核貼文

            echo "<div class='confirm-container'><a class='confirm-a'><h2>你好管理員，以下是已審核的貼文</h2></a>";
            try {
                if ($database->num_rows($confirm_result) == 0) {
                    echo "<br><a>opps! 沒有資料!</a>";
                } else {
                    while ($confirmdata = $database->fetch($confirm_result)){
                        echo "<div class='post-confirm'>
                            <table class='confirm-content-table'>
                                <thead>
                                    <tr>
                                        <th>標題</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class='active-row'>
                                        <td>{$confirmdata['title']}</td>
                                    </tr>
                                    <tr class='active-row'>
                                        <td>
                                            <form class='form-signup' action='./detail.php#{$confirmdata['id']}' method='post'>
                                                <input type='hidden' name='postid' value='{$confirmdata['id']}'>
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

            #顯示登入會員的貼文

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
                                        <th>標題</th>
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
            
        } else { #會員區
        
            $notConfirm_result = $database->query("SELECT * FROM `post_event_confirm_data` WHERE `is_confirm` = 0");
            $confirm_result = $database->query("SELECT * FROM `post_event_confirm_data` WHERE `is_confirm` = 1");
            $member_post_result = $database->query("SELECT * FROM `post_event_confirm_data` WHERE `post_member_id` = '{$user_id}' LIMIT 1");

            #顯示未審核貼文
            echo "<div class='all-container'><div class='notconfirm-container'><a class='unconfirm-a'><h2>未審核的貼文</h2></a>";
            try {
                if ($database->num_rows($notConfirm_result) == 0) {
                    echo "<br><a>opps! 沒有資料!</a>";
                } else {
                    while ($notConfirmdata = $database->fetch($notConfirm_result)){
                        echo "<div class='post-notconfirm'>
                            <table class='unconfirm-content-table'>
                                <thead>
                                    <tr>
                                        <th>標題</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class='active-row'>
                                        <td>{$notConfirmdata['title']}</td>
                                    </tr>
                                    <tr class='active-row'>
                                        <td>
                                            <form class='form-signup' action='./detail.php#{$notConfirmdata['id']}' method='post'>
                                                <input type='hidden' name='postid' value='{$notConfirmdata['id']}'>
                                                <input class='detail-submit' type='submit' name='detail-submit' value='查看詳細資料'><br>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>";
                    }
                }      
                echo "</div>";
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            
            #顯示審核貼文

            echo "<div class='confirm-container'><a class='confirm-a'><h2>已審核的貼文</h2></a>";
            try {
                if ($database->num_rows($confirm_result) == 0) {
                    echo "<br><a>opps! 沒有資料!</a>";
                } else {
                    while ($confirmdata = $database->fetch($confirm_result)){
                        echo "<div class='post-confirm'>
                            <table class='confirm-content-table'>
                                <thead>
                                    <tr>
                                        <th>標題</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class='active-row'>
                                        <td>{$confirmdata['title']}</td>
                                    </tr>
                                    <tr class='active-row'>
                                        <td>
                                            <form class='form-signup' action='./detail.php#{$confirmdata['id']}' method='post'>
                                                <input type='hidden' name='postid' value='{$confirmdata['id']}'>
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

            #顯示登入會員的貼文

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
                                        <th>標題</th>
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
    } else {
        $notConfirm_result = $database->query("SELECT * FROM `post_event_confirm_data` WHERE is_confirm = 0");
            $confirm_result = $database->query("SELECT * FROM `post_event_confirm_data` WHERE is_confirm = 1");
            #顯示未審核貼文
            echo "<div class='all-container'><div class='notconfirm-container'><a class='unconfirm-a'><h2>未審核的貼文</h2></a>";
            try {
                if ($database->num_rows($notConfirm_result) == 0) {
                    echo "<br><a>opps! 沒有資料!</a>";
                } else {
                    while ($notConfirmdata = $database->fetch($notConfirm_result)){
                        echo "<div class='post-notconfirm'>
                            <table class='unconfirm-content-table'>
                                <thead>
                                    <tr>
                                        <th>標題</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class='active-row'>
                                        <td>{$notConfirmdata['title']}</td>
                                    </tr>
                                    <tr class='active-row'>
                                        <td>
                                            <form class='form-signup' action='./detail.php#{$notConfirmdata['id']}' method='post'>
                                                <input type='hidden' name='postid' value='{$notConfirmdata['id']}'>
                                                <input class='detail-submit' type='submit' name='detail-submit' value='查看詳細資料'><br>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>";
                    }
                }      
                echo "</div>";
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            
            #顯示審核貼文

            echo "<div class='confirm-container'><a class='confirm-a'><h2>已審核的貼文</h2></a>";
            try {
                if ($database->num_rows($confirm_result) == 0) {
                    echo "<br><a>opps! 沒有資料!</a>";
                } else {
                    while ($confirmdata = $database->fetch($confirm_result)){
                        echo "<div class='post-confirm'>
                            <table class='confirm-content-table'>
                                <thead>
                                    <tr>
                                        <th>標題</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class='active-row'>
                                        <td>{$confirmdata['title']}</td>
                                    </tr>
                                    <tr class='active-row'>
                                        <td>
                                            <form class='form-signup' action='./detail.php#{$confirmdata['id']}' method='post'>
                                                <input type='hidden' name='postid' value='{$confirmdata['id']}'>
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
?>

