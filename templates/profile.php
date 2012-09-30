<? if ($user): ?>
    <form action="./index.php" method="post" class="form-orizontal well">
        <button name="action" value="logOut" class="btn btn-primary">
            Log out
        </button>
    </form>
    <table class="table table-striped table-bordered">
        <tbody>
            <tr>
                <td class="span2">
                    Id
                </td>
                <td class="span5">
                    <?= $user->id ?>
                </td>
            </tr>
            <tr>
                <td>
                    E-mail
                </td>
                <td>
                    <?= $user->email ?>
                </td>
            </tr>
            <tr>
                <td>
                    Password
                </td>
                <td>
                    <?= $user->password ?>
                </td>
            </tr>
            <tr>
                <td>
                    Name
                </td>
                <td>
                    <?= $user->name ?>
                </td>
            </tr>
            <tr>
                <td>
                    Registration date
                </td>
                <td>
                    <?
                        $datetimeStr = strtotime($user->regDate);
                        $regDate = date('jS F Y H:i:s', $datetimeStr);
                    ?>
                    <?= $regDate ?>
                </td>
            </tr>
            <tr>
                <td>
                    Message count
                </td>
                <td>
                    <?= $user->messageCount ?>
                </td>
            </tr>
            <tr>
                <td>
                    Avatar
                </td>
                <td>
                    <img src="<?= $user->avatar ?>" class="avatar">
                </td>
            </tr>
        </tbody>
    </table>
    <form action="./index.php" method="post" enctype="multipart/form-data" class="form-horizontal well">
        <fieldset>
            <div class="control-group">
                <label for="emailProfile" class="control-label">E-mail</label>
                <div class="controls">
                    <input type="text" name="email" id="emailProfile">
                </div>
            </div>
            <div class="control-group">
                <label for="passwordProfile" class="control-label">Password</label>
                <div class="controls">
                    <input type="text" name="password" id="passwordProfile">
                </div>
            </div>
            <div class="control-group">
                <label for="name" class="control-label">Name</label>
                <div class="controls">
                    <input type="text" name="name" id="name">
                </div>
            </div>
            <div class="control-group">
                <label for="avatar" class="control-label">Avatar</label>
                <div class="controls">
                    <input type="file" name="avatar" id="avatar">
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" name="action" value="updateProfile" class="btn btn-primary">Update profile</button>
            </div>
        </fieldset>
    </form>
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