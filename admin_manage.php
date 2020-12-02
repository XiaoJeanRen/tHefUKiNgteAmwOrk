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
        if ($user['permission'] != "管理員") {
            echo "
                <a>你不是管理員，無法查看</a>
            ";
        } else {
            $data_result = $database->query("SELECT * FROM `post_event_confirm_data`");
            try {
                if ($database->num_rows($data_result) == 0) {
                    throw new Exception('沒有任何資料存在，發生錯誤');
                } else {
                    while ($data = $database->fetch($data_result)) {
                        echo "<table class='content-table'>
                                <thead>
                                    <tr>
                                        <th>編號(ID)</th>
                                        <th>標題(title)</th>
                                        <th>主辦方(organizer)</th>
                                        <th>發布人(post_member)</th>
                                        <th>活動開始日期(start_daily)</th>
                                        <th>活動結束日期(end_daily)</th>                                        <th>原網址(original_web)</th>
                                        <th>發布日期(post_daily)</th>
                                        <th>得獎者(winner)</th>
                                        <th>是否已審核(is_confirm)</th>
                                        <th>功能</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class='active-row'>
                                        <td>{$data['id']}</td>
                                        <td>{$data['title']}</td>
                                        <td>{$data['organizer']}</td>
                                        <td>{$data['post_member']}</td>
                                        <td>{$data['start_daily']}</td>
                                        <td>{$data['end_daily']}</td>
                                        <td><a href='{$data['original_web']}'>這裡</a></td>
                                        <td>{$data['post_daily']}</td>
                                        <td>{$data['winner']}</td>
                                        <td>{$data['is_confirm']}</td>
                                        <td>
                                            <form class='form-manage' action='./admin_manage.php' method='post'>
                                                <input type='hidden' name='postid' value='{$data['id']}'>
                                                <input type='submit' name='confirm-sumit' value='審核通過'>
                                                <input type='submit' name='notConfirm-sumit' value='審核不通過'>
                                            </form>
                                            <form class='form-manage' action='./edit_event.php#{$data['id']}' method='post'>
                                                <input type='hidden' name='postid' value='{$data['id']}'>
                                                <input type='submit' name='edit-sumit' value='修改內容'>
                                            </form>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        ";
                    }
                }

                if (!empty($_POST['confirm-sumit']) && $user['permission'] == "管理員" && $_POST['is_confirm'] != 1) {
                    $post_id = $_POST['postid'];
                    $confirm_value = 1;
                    $data_confirm_update = $database->query("UPDATE `post_event_confirm_data` SET is_confirm = '$confirm_value' WHERE `id` = $post_id");
                    
                }
                if (!empty($_POST['notConfirm-sumit']) && $user['permission'] == "管理員" ) {
                    $post_id = $_POST['postid'];
                    $notconfirm_value = 0;
                    $data_notconfirm_update = $database->query("UPDATE `post_event_confirm_data` SET is_confirm = '$notconfirm_value' WHERE `id` = $post_id");
                }
                
            } catch (Exception $e) {
                echo $e->getMessage();
            }    
        }
    } else {
        echo "尚未登入";
    }
?>
