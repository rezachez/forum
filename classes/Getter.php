<?php
    class Getter {
        public
            $dbh;
        function __construct(){
            $database = new Database();
            $this->dbh = $database->connect();
        }
        function getCurrentUser(){
            if (!isset($_SESSION)){
                session_start();
            }
            if (isset($_SESSION['user'])){
                return $_SESSION['user'];
            } else {
                return false;
            }
        }
        function getNotes(){
            try {
                $sth = $this->dbh->query("
                    select
                        *,
                        notes.id as noteId,
                        notes.commentsCount as noteCommentsCount
                    from notes
                    left join users on notes.userId = users.id
                    order by notes.id desc
                ");
                $sth->setFetchMode(PDO::FETCH_CLASS, 'Note');
                while ($row = $sth->fetch()){
                    $rows[] = $row;
                }
            } catch (PDOException $e){
                echo $e->getMessage();
                file_put_contents('./errors.txt', date('jS F Y H:i:s') . ' # '. $e->getMessage() . PHP_EOL, FILE_APPEND);
            }
            if (isset($rows)){
                return $rows;
            } else {
                return false;
            }
        }
        function getNoteById($args = null){
            try {
                $sth = $this->dbh->query("
                    select
                        *,
                        notes.id as noteId,
                        notes.commentsCount as noteCommentsCount
                    from notes
                    left join users on notes.userId = users.id
                    where notes.id = {$args['noteId']}
                ");
                $sth->setFetchMode(PDO::FETCH_CLASS, 'Note');
                $row = $sth->fetch();
            } catch (PDOException $e){
                echo $e->getMessage();
                file_put_contents('./errors.txt', date('jS F Y H:i:s') . ' # '. $e->getMessage() . PHP_EOL, FILE_APPEND);
            }
            if (isset($row)){
                return $row;
            } else {
                return false;
            }
        }
        function getComments($args = null){
            try {
                $sth = $this->dbh->query("
                    select
                        *,
                        comments.id as commentId
                    from comments
                    left join users on comments.userId = users.id
                    where noteId = {$args['noteId']}
                ");
                $sth->setFetchMode(PDO::FETCH_CLASS, 'Comment');
                while ($row = $sth->fetch()){
                    $rows[] = $row;
                }
            } catch (PDOException $e){
                echo $e->getMessage();
                file_put_contents('./errors.txt', date('jS F Y H:i:s') . ' # '. $e->getMessage() . PHP_EOL, FILE_APPEND);
            }
            if (isset($rows)){
                return $rows;
            } else {
                return false;
            }
        }
        function getUserById($args = null){
            try {
                $sth = $this->dbh->query("
                    select * from users
                    where id = {$args['userId']}
                ");
                $sth->setFetchMode(PDO::FETCH_CLASS, 'User');
                $row = $sth->fetch();
            } catch (PDOException $e){
                echo $e->getMessage();
                file_put_contents('./errors.txt', date('jS F Y H:i:s') . ' # '. $e->getMessage() . PHP_EOL, FILE_APPEND);
            }
            if (isset($row)){
                return $row;
            } else {
                return false;
            }
        }
    }
?>