<?php
// TODO
//+1 загрузка фотографий из редактора
//-2 проверка на sql инъекцию текста
//-3 кодировка в базе данных
    function __autoload($name){
        require_once ('classes/' . $name . '.php');
    }
    if (empty($_GET['page']) && empty($_POST['action'])){
        $view = new View();
        $view->vars['page'] = 'notes';
        $view->render();
    }
    if (isset($_GET['page'])){
        $view = new View();
        foreach ($_GET as $i => $v){
            $view->vars[$i] = $v;
        }
        $view->render();
    }
    if (isset($_POST['action'])){
        $controller = new Controller();
        $controller->$_POST['action']();
    }
?>
