<?php
    function __autoload($name){
        require_once ('classes/' . $name . '.php');
    }
    if (empty($_GET['page']) && empty($_POST['action'])){
        $view = new View();
        $view->vars['page'] = 'messages';
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
