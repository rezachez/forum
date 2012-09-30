<? if ($user): ?>
    <? if (isset($this->vars['alert'])): ?>
        <div class="alert alert-info">
            <?
                $this->vars['alert'] = explode(',', $this->vars['alert']);
                foreach ($this->vars['alert'] as $i => $v):
            ?>
                <?= $v ?>
            <? endforeach ?>
        </div>
    <? endif ?>
    <form action="./index.php" method="post" class="form-horizontal well">
        <textarea name="content" id="redactor_content"></textarea><br>
        <button type="submit" name="action" value="publishMessage" class="btn btn-primary">Publish</button>
    </form>
<? endif ?>
<? if ($messages): ?>
    <?
        foreach($messages as $i => $v):
            $datetimeStr = strtotime($v->createDate);
            $datetime = date("jS F Y H:i:s", $datetimeStr);
    ?>
        <div class="well">
            <a href="index.php?page=message&messageId=<?= $v->messageId ?>"><?= $datetime ?></a>
            <p>
                <?= $v->content ?>
            </p>
            <img src="<?= $v->avatar ?>" class="avatar">
            <a href="index.php?page=foreignProfile&userId=<?= $v->userId ?>"><?= $v->name ?></a>
        </div>
    <? endforeach ?>
<? endif ?>