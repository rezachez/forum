<? include('templates/header.php'); ?>
<? if (isset($this->vars['currentUser'])): ?>
    <form action="./index.php" method="post" class="form-orizontal well">
        <button name="action" value="logOut" class="btn btn-primary">
            Log out
        </button>
    </form>
    <table class="table table-striped table-bordered table-hover">
        <colgroup>
            <col class="span2">
            <col class="span5">
        </colgroup>
        <tbody>
        <tr>
            <td>
                Id
            </td>
            <td>
                <?= $this->vars['currentUser']->id ?>
            </td>
        </tr>
        <tr>
            <td>
                E-mail
            </td>
            <td>
                <?= $this->vars['currentUser']->email ?>
            </td>
        </tr>
        <tr>
            <td>
                Password
            </td>
            <td>
                <?= $this->vars['currentUser']->password ?>
            </td>
        </tr>
        <tr>
            <td>
                Name
            </td>
            <td>
                <?= $this->vars['currentUser']->name ?>
            </td>
        </tr>
        <tr>
            <td>
                Date registration
            </td>
            <td>
                <?= $this->vars['currentUser']->dateRegistration ?>
            </td>
        </tr>
        <tr>
            <td>
                Avatar
            </td>
            <td>
                <?= $this->vars['currentUser']->avatar ?>
            </td>
        </tr>
        </tbody>
    </table>
<? else: ?>
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
        <fieldset>
            <div class="control-group">
                <label for="email" class="control-label">
                    E-mail
                </label>
                <div class="controls">
                    <input type="text" name="email" id="email">
                </div>
            </div>
            <div class="control-group">
                <label for="password" class="control-label">
                    Password
                </label>
                <div class="controls">
                    <input type="text" name="password" id="password">
                </div>
            </div>
            <div class="form-actions">
                <button name="action" value="logIn" class="btn btn-primary">Log in</button>
                <button name="action" value="signUp" class="btn btn-primary">Sign up</button>
            </div>
        </fieldset>
    </form>
<? endif ?>
<? include('templates/footer.php'); ?>