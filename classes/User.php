<?php
    class User extends Model {
        public
            $id,
            $email,
            $password,
            $name,
            $regDate,
            $avatar,
            $messageCount;
        function __construct($args = null){
            parent::__construct($args);
            $this->validInt(array(
                'id',
                'messageCount'
            ));
            $this->validStr(array(
                'email',
                'password',
                'name',
            ));
            if (empty($this->email)){
                $this->errors[] = 'Empty email.';
            }
            if (empty($this->password)){
                $this->errors[] = 'Empty password.';
            }
        }
    }
?>