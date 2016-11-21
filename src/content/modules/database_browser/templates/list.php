<?php
$acl = new ACL ();
if ($acl->hasPermission ( "database_browser" )) {
	$tables = Database::getAllTables ();
	?>
<table class="tablesorter">
	<thead>
		<tr>
			<th>
		<?php translate("name");?>
		</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($tables as $table){?>
	<tr>
			<td><a
				href="<?php echo ModuleHelper::buildAdminURL("database_browser", "single=$table")?>"><?php Template::escape($table);?></a></td>
		</tr>
	<?php }?>
	</tbody>
</table>
<?php
} else {
	noperms ();
}
?>