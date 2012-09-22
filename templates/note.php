<? if ($note): ?>
    <div class="well">
        <?
            $datetimeStr = strtotime($note->dateCreation);
            $datetime = date('jS F Y H:i:s', $datetimeStr);
        ?>
        <?= $datetime ?>
        <div rel="tooltip" title="Count comments" class="pull-right comments"><?= $note->noteCommentsCount ?></div>
        <p>
            <?= $note->content ?>
        </p>
        <img src="<?= $note->avatar ?>" class="avatar">
        <a href="index.php?page=foreignProfile&userId=<?= $note->userId ?>"><?= $note->name ?></a>
    </div>
<? endif ?>
<? if ($comments): ?>
    <?
        foreach ($comments as $i => $v):
            $datetimeStr = strtotime($v->dateCreation);
            $datetime = date('jS F Y H:i:s', $datetimeStr);
    ?>

        <div class="well">
            <?= $datetime ?>
            <p>
                <p>
                    <?= $v->content ?>
                </p>
            </p>
            <img src="<?= $v->avatar ?>" class="avatar">
            <a href="index.php?page=foreignProfile&userId=<?= $v->userId ?>"><?= $v->name ?></a>
        </div>
    <? endforeach ?>
<? endif ?>
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
        <input type="hidden" name="noteId" value="<?= $note->noteId ?>">
        <textarea rows="3" name="content" placeholder="Input comment" class="span5" id="content"></textarea><br><br>
        <button type="submit" name="action" value="publishComment" class="btn btn-primary">Publish comment</button>
    </form>
<? endif ?>