<form action="<?php echo url_for('@user_register'); ?>" method="post">
    <table>
        <?php echo $user; ?>
        <?php echo $tag; ?>

        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="submit" value="Submit" /></td>
        </tr>
    </table>
</form>