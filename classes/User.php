<?php
    class User extends Model {
        public
            $id,
            $email,
            $password,
            $name,
            $dateRegistration,
            $avatar,
            $notesCount,
            $commentsCount;
        function __construct($args = null){
            parent::__construct($args);
            $this->validInt(array(
                'id',
                'notesCount',
                'commentsCount'
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