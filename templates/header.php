<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="./libs/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="./libs/bootstrap/css/bootstrap-responsive.css">
        <link rel="stylesheet" href="./libs/redactor803/redactor/redactor.css">
        <link rel="stylesheet" href="./css/style.css">
        <script src="./libs/jquery-1.8.1.js"></script>
        <script src="./libs/bootstrap/js/bootstrap.js"></script>
        <script src="./libs/redactor803/redactor/redactor.js"></script>
        <script src="./js/interactive.js"></script>
        <meta charset="utf-8">
        <title>
            Наклейки форум
        </title>
    </head>
    <body>
        <div class="container">
            <header>
                <h1>
                    Mагазин<a href="http://sticka.su/" title="Магазин"> sticka.su</a>
                </h1>
            </header>
            <div class="row">
                <div class="span2">
                    <nav>
                        <ul class="nav nav-pills nav-stacked">
                            <li <? if ($this->vars['page'] == 'profile'): ?> class="active" <? endif ?> >
                                <a href="index.php?page=profile">Profile</a>
                            </li>
                            <li <? if ($this->vars['page'] == 'messages'): ?> class="active" <?endif?> >
                                <a href="index.php?page=messages">Messages</a>
                            </li>
                            <li>
                                <a href="index.php?page=vision">Vision</a>
                            </li>
                        </ul>
                    </nav>
<!-- Yandex.Metrika informer --><a href="http://metrika.yandex.ru/stat/?id=17282965&amp;from=informer" target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/17282965/3_1_FFFFFFFF_FFFFFFFF_0_pageviews" style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:17282965,type:0,lang:'ru'});return false}catch(e){}"/></a><!-- /Yandex.Metrika informer --><!-- Yandex.Metrika counter --><script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter17282965 = new Ya.Metrika({id:17282965, enableAll: true, webvisor:true}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/17282965" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->
                </div>
                <div class="span7">