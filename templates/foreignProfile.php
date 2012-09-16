<? include('header.php'); ?>
<? if (isset($this->vars['foreignProfile'])): ?>
    <table class="table table-striped table-bordered table-hover">
        <tbody>
            <tr>
                <td class="span2">
                    Id
                </td>
                <td class="span5">
                    <?= $this->vars['foreignProfile']->id ?>
                </td>
            </tr>
            <tr>
                <td>
                    E-mail
                </td>
                <td>
                    <?= $this->vars['foreignProfile']->email ?>
                </td>
            </tr>
            <tr>
                <td>
                    Name
                </td>
                <td>
                    <?= $this->vars['foreignProfile']->name ?>
                </td>
            </tr>
            <tr>
                <td>
                    Date registration
                </td>
                <td>
                    <?= $this->vars['foreignProfile']->dateRegistration ?>
                </td>
            </tr>
            <tr>
                <td>
                    Avatar
                </td>
                <td>
                    <img src="<?= $this->vars['foreignProfile']->avatar ?>">
                </td>
            </tr>
        </tbody>
    </table>
<? endif; ?>
<? include('footer.php'); ?>