<?php

class User {
    public $id;

    public $username;
    public $name;
    public $password;
    public $email;

    private $database;

    public function __construct($user_id, $database)
    {
        $this-> $database = (int)$user_id;
        $user_id = (int)$user_id;

        $result = $this->database->query("SELECT * FROM `users` WHERE `id`='$user_id' LIMIT 1");
        if ($this->database->num_rows($result) < 1){
            throw new Exception("使用者不存在");
        }

        $user = $this->database->fetch($result);

        $this->id = $user['id'];

        $this->username = $user['username'];
        
        $this->name = $user['name'];
        $this->password = $user['password'];
        $this->eamil = $user['email'];
    }

    public function update(){
        $this->database->query("UPDATE `users` SET
            `name` = '{$this->name}',
            `password` = '{$this->password}'
        WHERE `id`='{$this->id}' LIMIT 1");
    }
}

?>