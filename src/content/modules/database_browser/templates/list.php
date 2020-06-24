<?php
$acl = new ACL();
if ($acl->hasPermission("database_browser")) {
    $tables = Database::getAllTables();
    ?>
    <table class="tablesorter">
        <thead>
            <tr>
                <th>
                    <?php translate("name"); ?>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tables as $table) { ?>
                <tr>
                    <td>
                        <a name="field_<?php Template::escape($table); ?>"></a><a
                            href="<?php echo ModuleHelper::buildAdminURL("database_browser", "single=$table") ?>"
                            class="btn btn-default"><i class="fa fa-table" aria-hidden="true"></i> <?php Template::escape($table); ?></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php
} else {
    noperms();
}
?>
