<? if ($foreignProfile): ?>
    <table class="table table-striped table-bordered table-hover">
        <tbody>
            <tr>
                <td class="span2">
                    Id
                </td>
                <td class="span5">
                    <?= $foreignProfile->id ?>
                </td>
            </tr>
            <tr>
                <td>
                    E-mail
                </td>
                <td>
                    <?= $foreignProfile->email ?>
                </td>
            </tr>
            <tr>
                <td>
                    Name
                </td>
                <td>
                    <?= $foreignProfile->name ?>
                </td>
            </tr>
            <tr>
                <td>
                    Date registration
                </td>
                <td>
                    <?= $foreignProfile->dateRegistration ?>
                </td>
            </tr>
            <tr>
                <td>
                    Notes count
                </td>
                <td>
                    <?= $foreignProfile->notesCount ?>
                </td>
            </tr>
            <tr>
                <td>
                    Comments count
                </td>
                <td>
                    <?= $foreignProfile->commentsCount ?>
                </td>
            </tr>
            <tr>
                <td>
                    Avatar
                </td>
                <td>
                    <img src="<?= $foreignProfile->avatar ?>" class="avatar">
                </td>
            </tr>
        </tbody>
    </table>
<? endif; ?>