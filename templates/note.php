<? include('header.php'); ?>
<div class="well">
    <?
        $datetimeStr = strtotime($this->vars['note']->dateCreation);
        $datetime = date('jS F Y H:i:s', $datetimeStr);
    ?>
    <?= $datetime ?>
    <div rel="tooltip" title="Count comments" class="pull-right comments"><?= $this->vars['note']->commentCount ?></div>
    <p>
        <?= $this->vars['note']->content ?>
    </p>
    <img src="<?= $this->vars['note']->avatar ?>" class="avatar">
    <a href="index.php?page=foreignProfile&userId=<?= $this->vars['note']->userId ?>"><?= $this->vars['note']->name ?></a>
</div>
<? if (isset($this->vars['comments'])): ?>
    <?
        foreach ($this->vars['comments'] as $i => $v):
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
<? if (isset($this->vars['currentUser'])): ?>
    <form action="./index.php" method="post" class="form-horizontal well">
        <input type="hidden" name="noteId" value="<?= $this->vars['note']->noteId ?>">
        <textarea rows="3" name="content" placeholder="Input comment" class="span5" id="content"></textarea><br><br>
        <button type="submit" name="action" value="publishComment" class="btn btn-primary">Publish comment</button>
    </form>
<? endif ?>
<? include('footer.php'); ?>