<?php
    class Comment extends Model{
        public
            $id,
            $userId,
            $noteId,
            $content,
            $dateCreation;
        function __construct($args = null){
            parent::__construct($args);
            $this->validInt(array(
                'id',
                'userId',
                'noteId'
            ));
            $this->validStr(array(
                'content'
            ));
            if (empty($this->userId)){
                $this->errors[] = 'Empty userId.';
            }
            if (empty($this->noteId)){
                $this->errors[] = 'Empty noteId.';
            }
            if (empty($this->content)){
                $this->errors[] = 'Empty content.';
            }
        }
    }
?>