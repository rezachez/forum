<? include('header.php'); ?>
<? if (isset($this->vars['currentUser'])): ?>
    <form action="./index.php" method="post" class="form-horizontal well">
        <textarea id="redactor_content" name="content"></textarea>
        <div class="form-actions">
            <button type="submit" name="action" value="publishNote" class="btn btn-primary">Publish</button>
        </div>
    </form>
<? endif ?>
<? foreach($this->vars['notes'] as $i => $v): ?>
    <div class="well">
        <b><?= $v->id ?></b>
        <a href="index.php?page=foreignProfile&userId=<?= $v->userId ?>"><?= $v->userId ?></a>
        <?= $v->dateCreation ?>
        <?= $v->content ?>
    </div>
<? endforeach ?>
<? include('footer.php'); ?>