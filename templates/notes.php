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
        <button type="submit" name="action" value="publishNote" class="btn btn-primary">Publish</button>
    </form>
<? endif ?>
<? if ($notes): ?>
    <?
        foreach($notes as $i => $v):
            $datetimeStr = strtotime($v->dateCreation);
            $datetime = date("jS F Y H:i:s", $datetimeStr);
    ?>
        <div class="well">
            <a href="index.php?page=note&noteId=<?= $v->noteId ?>"><?= $datetime ?></a>
            <div rel="tooltip" title="Count comments" class="pull-right comments"><?= $v->noteCommentsCount ?></div>
            <p>
                <?= $v->content ?>
            </p>
            <img src="<?= $v->avatar ?>" class="avatar">
            <a href="index.php?page=foreignProfile&userId=<?= $v->userId ?>"><?= $v->name ?></a>
        </div>
    <? endforeach ?>
<? endif ?>