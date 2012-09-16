<?php
    class Getter {
        protected
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
                return null;
            }
        }
        function getNotes(){
            $sth = $this->dbh->query("select *, notes.id as noteId from notes left join users on notes.userId = users.id");
            $sth->setFetchMode(PDO::FETCH_CLASS, 'Note');
            while ($row = $sth->fetch()){
                $rows[] = $row;
            }
            return $rows;
        }
        function getNoteById($args = null){
            try {
                $sth = $this->dbh->query("
                    select *, notes.id as noteId from notes
                    left join users on notes.userId = users.id
                    where notes.id = {$args['noteId']}
                ");
                $sth->setFetchMode(PDO::FETCH_CLASS, 'Note');
            } catch (PDOException $e) {
                echo 1;
                die($e->getMessage());
            }
            return $sth->fetch();
        }
        function getComments($args = null){
            $sth = $this->dbh->query("select *, comments.id as commentId from comments
                left join users on comments.userId = users.id
                where noteId = {$args['noteId']}
            ");
            if ($sth){
                $sth->setFetchMode(PDO::FETCH_CLASS, 'Comment');
                $rows = array();
                while ($row = $sth->fetch()){
                    $rows[] = $row;
                }
                return $rows;
            } else {
                return null;
            }
        }
        function getUserById($args = null){
            $sth = $this->dbh->query("select * from users where
                id = {$args['userId']}
            ");
            $sth->setFetchMode(PDO::FETCH_CLASS, 'User');
            $row = $sth->fetch();
            return $row;
        }
    }
?>