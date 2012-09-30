<? if ($foreignProfile): ?>
    <table class="table table-striped table-bordered">
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
                    Registration date
                </td>
                <td>
                    <?
                        $datetimeStr = strtotime($foreignProfile->regDate);
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
                    <?= $foreignProfile->messageCount ?>
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