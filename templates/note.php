<? include('header.php'); ?>
<div class="well">
    <?= $this->vars['note']->id ?>
    <?= $this->vars['note']->userId ?>
    <?= $this->vars['note']->dateCreation ?>
    <p>
        <?= $this->vars['note']->content ?>
    </p>
</div>
<? if (isset($this->vars['comments'])): ?>
    <? foreach ($this->vars['comments'] as $i => $v): ?>
        <div class="well">
            <?= $v->userId ?>
            <?= $v->dateCreation ?>
            <p>
                <?= $v->content ?>
            </p>
        </div>
    <? endforeach ?>
<? endif ?>
<? if (isset($this->vars['currentUser'])): ?>
    <form action="./index.php" method="post" class="form-horizontal">
        <fieldset>
            <div class="control-group">
                <label for="comment" class="control-label">Comment</label>
                <div class="controls">
                    <textarea rows="5" id="comment"></textarea>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" name="action" value="publishComment" class="btn btn-primary">Publish comment</button>
            </div>
        </fieldset>
    </form>
<? endif ?>
<? include('footer.php'); ?>