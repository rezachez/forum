<?php
    class Controller {
        public
            $dbh;
        function __construct(){
            if (!isset($_SESSION)){
                session_start();
            }
            $database = new Database();
            $this->dbh = $database->connect();
        }
        function signUp(){
            $user = new User(array(
                'email' => $_POST['email'],
                'password' => $_POST['password']
            ));
            if (isset($user->errors)){
                $alert = implode(',', $user->errors);
                header("location: index.php?page=profile&alert=$alert");
            } else {
                try {
                    $this->dbh->query("
                        insert into users
                        set
                            email = '{$user->email}',
                            password = '{$user->password}',
                            name = 'Anonymous',
                            regDate = now(),
                            avatar = './files/images/avatars/anonymous.png',
                            messageCount = 0
                    ");
                    $sth = $this->dbh->query("
                        select * from users
                        where id = {$this->dbh->lastInsertId()}
                    ");
                    $sth->setFetchMode(PDO::FETCH_CLASS, 'User');
                    $user = $sth->fetch();
                    $_SESSION['user'] = $user;
                    header("location: index.php?page=profile");
                } catch (PDOException $e){
                    echo $e->getMessage();
                    file_put_contents('./errors.txt', date('jS F Y H:i:s') . ' # '. $e->getMessage() . PHP_EOL, FILE_APPEND);
                }
            }
        }
        function logIn(){
            $user = new User(array(
                'email' => $_POST['email'],
                'password' => $_POST['password']
            ));
            if (isset($user->errors)){
                $alert = implode(',', $user->errors);
                header("location: index.php?page=profile&alert=$alert");
            } else {
                try {
                    $sth = $this->dbh->query("
                        select * from users
                        where
                            email = '{$user->email}' and
                            password = '{$user->password}'
                    ");
                    $sth->setFetchMode(PDO::FETCH_CLASS, 'User');
                    $user = $sth->fetch();
                    if (empty($user)){
                        throw new PDOException('E-mail or password errors.');
                    }
                    $_SESSION['user'] = $user;
                    header("location: index.php?page=profile");
                } catch (PDOException $e){
                    echo $e->getMessage();
                    file_put_contents('./errors.txt', date('jS F Y H:i:s') . ' # '. $e->getMessage() . PHP_EOL, FILE_APPEND);
                }
            }
        }
        function publishMessage(){
            $user = $_SESSION['user'];
            $message = new Message(array(
                'userId' => $user->id,
                'content' => $_POST['content']
            ));
            if (isset($message->errors)){
                $alert = implode(',', $message->errors);
                header("location: index.php?page=messages&alert=$alert");
            } else {
                try {
                    $this->dbh->query("
                        insert into messages
                        set
                            userId = $user->id,
                            content = '{$message->content}',
                            createDate = now()
                    ");
                    $message->id = $this->dbh->lastInsertId();
                    $this->dbh->query("
                        update users
                        set messageCount = messageCount + 1
                        where id = {$user->id}
                    ");
                    $getter = new Getter();
                    $_SESSION['user'] = $getter->getUserById(array('userId' => $user->id));
                    header("location: index.php?page=messages");
                } catch (PDOException $e){
                    echo $e->getMessage();
                    file_put_contents('./errors.txt', date('jS F Y H:i:s') . ' # '. $e->getMessage() . PHP_EOL, FILE_APPEND);
                }
            }
        }
        function logOut(){
            unset($_SESSION['user']);
            header("location: index.php?page=profile");
        }
        function updateProfile(){
            $user = $_SESSION['user'];
            $userUpdate = new User(array(
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'name' => $_POST['name'],
                'avatar' => pathinfo($_FILES['avatar']['name'])
            ));
            $userVars = get_object_vars($userUpdate);
            foreach ($userVars as $i => $v){
                if (!empty($v)){
                    if ($i == 'avatar'){
                        $avatarInfo = pathinfo($_FILES['avatar']['name']);
                        $avatarPath = "./files/images/avatars/{$user->id}.{$avatarInfo['extension']}";
                        move_uploaded_file($_FILES['avatar']['tmp_name'], $avatarPath);
                        try {
                            $this->dbh->query("
                                update users
                                set avatar = '{$avatarPath}'
                                where id = $user->id
                            ");
                        } catch(PDOException $e){
                            echo $e->getMessage();
                            file_put_contents('./errors.txt', date('jS F Y H:i:s') . ' # '. $e->getMessage() . PHP_EOL, FILE_APPEND);
                        }
                    } else {
                        try {
                            $this->dbh->query("
                                update users
                                set $i = '{$v}'
                                where id = $user->id
                            ");
                        } catch(PDOException $e){
                            echo $e->getMessage();
                            file_put_contents('./errors.txt', date('jS F Y H:i:s') . ' # '. $e->getMessage() . PHP_EOL, FILE_APPEND);
                        }
                    }
                }
            }
            $getter = new Getter();
            $_SESSION['user'] = $getter->getUserById(array('userId' => $user->id));
            header("location: index.php?page=profile");
        }
    }
?>