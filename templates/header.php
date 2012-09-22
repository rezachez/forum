<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./libs/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="./libs/bootstrap/css/bootstrap-responsive.css">
        <link rel="stylesheet" href="./libs/redactor803/redactor/redactor.css">
        <link rel="stylesheet" href="./css/style.css">
        <script src="./libs/jquery-1.8.1.js"></script>
        <script src="./libs/bootstrap/js/bootstrap.js"></script>
        <script src="./libs/redactor803/redactor/redactor.js"></script>
        <script src="./js/interactive.js"></script>
    </head>
    <body>
        <div class="span10 offset4">
            <h1>Forum 228</h1>
            <p class="lead">14/88</p>
            <div class="row">
                <div class="span2">
                    <ul class="nav nav-pills nav-stacked">
                        <li <? if ($this->vars['page'] == 'profile'): ?> class="active" <? endif ?> >
                            <a href="index.php?page=profile">Profile</a>
                        </li>
                        <li <? if ($this->vars['page'] == 'notes'): ?> class="active" <?endif?> >
                            <a href="index.php?page=notes">Forum</a>
                        </li>
                    </ul>
                </div>
                <div class="span7">