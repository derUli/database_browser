<?php
$acl = new ACL ();
$table = $_GET ["single"];
if ($acl->hasPermission ( "database_browser" ) and in_array ( $table, Database::getAllTables () )) {
	$fields = Database::getColumnNames ( $table, false );
	$result = Database::selectAll ( $table, array (), "", array (), false );
	?>
<form
	action="<?php echo ModuleHelper::buildAdminURL("database_browser");?>"
	method="get">
	<input type="submit" value="<?php translate("back_to_list");?>">
</form>

<table class="tablesorter">
	<thead>
		<tr>
		<?php foreach($fields as $field){?>
			<th><?php Template::escape($field);?></th>
		<?php }?>
		</tr>
	</thead>
	<tbody>
	<?php
	while ( $row = Database::fetchAssoc ( $result ) ) {
		?>
	<tr style="word-break: break-all;">
	<?php foreach($row as $col){?>
			<td><?php Template::escape($col);?></td>
	<?php }?>
		</tr>
	<?php }?>
	</tbody>
</table>
<?php
} else {
	noperms ();
}
?>