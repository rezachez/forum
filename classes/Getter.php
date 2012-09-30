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
        function getMessages(){
            try {
                $sth = $this->dbh->query("
                    select
                        *,
                        messages.id as messageId
                    from messages
                    left join users on messages.userId = users.id
                    order by messages.id desc
                ");
                $sth->setFetchMode(PDO::FETCH_CLASS, 'Message');
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
        function getMessageById($args = null){
            try {
                $sth = $this->dbh->query("
                    select
                        *,
                        messages.id as messageId
                    from messages
                    left join users on messages.userId = users.id
                    where messages.id = {$args['messageId']}
                ");
                $sth->setFetchMode(PDO::FETCH_CLASS, 'Message');
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