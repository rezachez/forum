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
                            dateRegistration = now(),
                            avatar = './files/images/avatars/anonymous.png',
                            notesCount = 0,
                            commentsCount = 0
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
        function publishNote(){
            $user = $_SESSION['user'];
            $note = new Note(array(
                'userId' => $user->id,
                'content' => $_POST['content']
            ));
            if (isset($note->errors)){
                $alert = implode(',', $note->errors);
                header("location: index.php?page=notes&alert=$alert");
            } else {
                try {
                    $this->dbh->query("
                        insert into notes
                        set
                            userId = $user->id,
                            content = '{$note->content}',
                            dateCreation = now(),
                            commentsCount = 0
                    ");
                    $note->id = $this->dbh->lastInsertId();
                    $this->dbh->query("
                        update users
                        set notesCount = notesCount + 1
                        where id = {$user->id}
                    ");
                    $getter = new Getter();
                    $_SESSION['user'] = $getter->getUserById(array('userId' => $user->id));
                    header("location: index.php?page=note&noteId=$note->id");
                } catch (PDOException $e){
                    echo $e->getMessage();
                    file_put_contents('./errors.txt', date('jS F Y H:i:s') . ' # '. $e->getMessage() . PHP_EOL, FILE_APPEND);
                }
            }
        }
        function publishComment(){
            $user = $_SESSION['user'];
            $comment = new Comment(array(
                'userId' => $user->id,
                'noteId' => $_POST['noteId'],
                'content' => $_POST['content']
            ));
            if (isset($comment->errors)){
                $alert = implode(',', $comment->errors);
                header("location: index.php?page=note&noteId=$comment->noteId&alert=$alert");
            } else {
                try {
                    $this->dbh->query("
                        insert into comments
                        set
                            userId = $comment->userId,
                            noteId = $comment->noteId,
                            content = '{$comment->content}',
                            dateCreation = now()
                    ");
                    $this->dbh->query("
                        update notes
                        set commentsCount = commentsCount + 1
                        where id = $comment->noteId
                    ");
                    $this->dbh->query("
                        update users
                        set commentsCount = commentsCount + 1
                        where id = {$comment->userId}
                    ");
                    $getter = new Getter();
                    $_SESSION['user'] = $getter->getUserById(array('userId' => $comment->userId));
                    header("location: index.php?page=note&noteId={$comment->noteId}");
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