<?php
    class Database {
        function connect(){
            $connect1 = array(
                'host' => 'localhost',
                'login' => 'root',
                'password' => '',
                'name' => 'forum'
            );
            $connect2 = array(
                'host' => 'mysql.hostinger.ru',
                'login' => 'u545076651_root',
                'password' => '123456',
                'name' => 'u545076651_sticka'
            );
            $c = $connect1;
            try {
                $dbh = new PDO(
                    "mysql:host={$c['host']};dbname={$c['name']}",
                    $c['login'],
                    $c['password']
                );
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //$dbh->query("set character_set_connection = 'utf-8'");
                //$dbh->query("set character_set_client = 'utf-8'");
                //$dbh->query("set character_set_results = 'utf-8'");
            } catch(PDOException $e) {
                echo $e->getMessage();
                file_put_contents('./errors.txt', date('jS F Y H:i:s') . ' # '. $e->getMessage() . PHP_EOL, FILE_APPEND);
            }
            return $dbh;
        }
    }
?>