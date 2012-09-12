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
            $sth = $this->dbh->query("select * from notes");
            $sth->setFetchMode(PDO::FETCH_CLASS, 'Note');
            $rows = array();
            while ($row = $sth->fetch()){
                $rows[] = $row;
            }
            return $rows;
        }
        function getNoteById($args = null){
            $sth = $this->dbh->query("select * from notes where
                id = {$args['noteId']}
            ");
            $sth->setFetchMode(PDO::FETCH_CLASS, 'Note');
            return $sth->fetch();
        }
        function getComments($args = null){
            $sth = $this->dbh->query("select * from comments where
                noteId = '{$args['noteId']}'
            ");
            $sth->setFetchMode(PDO::FETCH_CLASS, 'Comment');
            $rows = array();
            while ($row = $sth->fetch()){
                $rows[] = $row;
            }
            return $rows;
        }
        function getUserById($args = null){
            $sth = $this->dbh->query("select * from users where
                id = {$args['userId']}
            ");
            $sth->setFetchMode(PDO::FETCH_CLASS, 'User');
            $row = $sth->fetch();
            $row->password = null;
            return $row;
        }
    }
?>