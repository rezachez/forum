<?php
    class Comment extends Model {
        public
            $id,
            $userId,
            $noteId,
            $content,
            $dateCreation;
    }
?>