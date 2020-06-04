<?php

/**
 *  建立方法
 */
class DatabaseObject
{
    private $con;

        // 連結到資料庫
    public function __construct($host, $username, $password, $database)
    {
        $this->con = mysqli_connect($host, $username, $password, $database, 3306);
        if (!$this->con) {
            throw new Exception('無法連結到資料庫.');
        }
    }

    public function clean($data)
    {
        // 轉義特殊字符
        return mysqli_real_escape_string($this->con, $data);
    }

    // 錯誤輸出
    public function error($error){
        die($error);
    }

    // 查詢 更新 插入都行
    public function query($query)
    {
        //mysqli_error(connection)

        $result = mysqli_query($this->con, $query) or $this->error($query . '/' . mysqli_error($this->con));
        return $result;
    }
    
    // mysql_fetch_row的索引標籤是使用數值，從0開始
    // mysql_fetch_assoc的索引標籤是欄位名稱
    // 利用while和此方法顯示所有資料
    public function fetch($result){
        return mysqli_fetch_assoc($result);
    }

    // 返回查詢到的數量
    public function num_rows($result)
    {
        return mysqli_num_rows($result);
    }

    // 返回上一個受到SELECT INSERT UPDATE...影響的query
    public function affected_rows()
    {
        return mysqli_affected_rows($this->con);
    }
}
