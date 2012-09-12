<?php
    class Controller {
        protected
            $dbh;
        function __construct(){
            session_start();
            $database = new Database();
            $this->dbh = $database->connect();
        }
        function signUp(){
            $vars['hasErrors'] = false;
            if (empty($_POST['email'])){
                $vars['alert'][] =  View::EmE;
                $vars['hasErrors'] = true;
            }
            if (empty($_POST['password'])){
                $vars['alert'][] = View::EmP;
                $vars['hasErrors'] = true;
            }
            if ($vars['hasErrors']){
                $vars['alert'] = implode(',', $vars['alert']);
                header("location: index.php?page=profile&alert={$vars['alert']}");
            } else {
                $sth = $this->dbh->query("select * from users where
                    email = '{$_POST['email']}'
                ");
                $sth->setFetchMode(PDO::FETCH_CLASS, 'User');
                $row = $sth->fetch();
                if (isset($row->id)){
                    $vars['alert'] = View::ExU;
                    header("location: index.php?page=profile&{$vars['alert']}");
                } else {
                    $sth = $this->dbh->prepare("insert into users values (
                        null,
                        '{$_POST['email']}',
                        '{$_POST['password']}',
                        null,
                        now(),
                        null
                    )");
                    $sth->execute();
                    $sth = $this->dbh->query("select * from users where
                        id = {$this->dbh->lastInsertId()}
                    ");
                    $sth->setFetchMode(PDO::FETCH_CLASS, 'User');
                    $user = $sth->fetch();
                    $_SESSION['user'] = $user;
                    header("location: index.php?page=profile");
                }
            }
        }
        function logIn(){
            $vars['hasErrors'] = false;
            if (empty($_POST['email'])){
                $vars['alert'][] = View::EmE;
                $vars['hasErrors'] = true;
            }
            if (empty($_POST['password'])){
                $vars['alert'][] = View::EmP;
                $vars['hasErrors'] = true;
            }
            if ($vars['hasErrors']){
                $vars['alert'] = implode(',', $vars['alert']);
                header("location: index.php?page=profile&alert={$vars['alert']}");
            } else {
                $sth = $this->dbh->query("select * from users where
                    email = '{$_POST['email']}' and
                    password = '{$_POST['password']}'
                ");
                $sth->setFetchMode(PDO::FETCH_CLASS, 'User');
                $row = $sth->fetch();
                if ($row->id){
                    $_SESSION['user'] = $row;
                    header("location: index.php?page=profile");
                } else {
                    $vars['alert'] = View::DbE;
                    header("location: index.php?page=profile&alert={$vars['alert']}");
                }
            }
        }
        function publishNote(){
            $getter = new Getter();
            $user = $getter->getCurrentUser();
            if ($user->id){
                $sth = $this->dbh->prepare("insert into notes values (
                    null,
                    {$user->id},
                    '{$_POST['content']}',
                    now()
                )");
                $sth->execute();
                $vars['noteId'] = $this->dbh->lastInsertId();
                header("location: index.php?page=note&noteId={$vars['noteId']}");
            } else {
                $vars['alert'] = View::AuU;
                header("location: index.php?page=profile&alert={$vars['alert']}");
            }
        }
        function publishComment(){
            $getter = new Getter();
            $user = $getter->getCurrentUser();
            if ($user->id){
                $sth = $this->dbh->prepare("insert into comments values (
                    null,
                    {$user->id},
                    {$_POST['noteId']},
                    '{$_POST['content']}',
                    now()
                )");
                $sth->execute();
                header("location: index.php?page=note");
            } else {
                $vars['alert'] = View::AuU;
                header("location: index.php?page=profile&alert={$vars['alert']}");
            }
        }
        function logOut(){
            unset($_SESSION['user']);
            header("location: index.php?page=profile");
        }
    }
?>