<form action="<?php echo url_for('@user_register?key=' . $user->getObject()->getRfidTag()); ?>" enctype="multipart/form-data" method="post">
    <table>
        <?php echo $user; ?>

        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="submit" value="Submit" /></td>
        </tr>
    </table>
</form>