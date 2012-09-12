<? include('header.php'); ?>
<? if (isset($this->vars['foreignProfile'])): ?>
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
                    <?= $this->vars['foreignProfile']->avatar ?>
                </td>
            </tr>
        </tbody>
    </table>
<? endif; ?>
<? include('footer.php'); ?>