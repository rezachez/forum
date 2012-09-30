<? if ($message): ?>
    <div class="well">
        <?
            $datetimeStr = strtotime($message->createDate);
            $datetime = date('jS F Y H:i:s', $datetimeStr);
        ?>
        <?= $datetime ?>
        <p>
            <?= $message->content ?>
        </p>
        <img src="<?= $message->avatar ?>" class="avatar">
        <a href="index.php?page=foreignProfile&userId=<?= $message->userId ?>"><?= $message->name ?></a>
    </div>
<? endif ?>
