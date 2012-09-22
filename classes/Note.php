<?php
    class Note extends Model {
        public
            $id,
            $userId,
            $content,
            $dateCreation,
            $commentsCount;
        function __construct($args = null){
            parent::__construct($args);
            $this->validInt(array(
                'id',
                'userId',
                'commentsCount'
            ));
            if (empty($this->userId)){
                $this->errors[] = 'Empty userId.';
            }
            if (empty($this->content)){
                $this->errors[] = 'Empty content.';
            }
        }
    }
?>