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
                'login' => 'u230301915_root',
                'password' => '123456',
                'name' => 'u230301915_photowal'
            );
            $c = $connect1;
            try {
                $dbh = new PDO(
                    "mysql:host={$c['host']};dbname={$c['name']}",
                    $c['login'],
                    $c['password']
                );
                return $dbh;
            } catch(PDOException $e) {
            }
        }
    }
?>