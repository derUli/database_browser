<?php
$acl = new ACL ();
$table = $_GET ["single"];
if ($acl->hasPermission ( "database_browser" ) and in_array ( $table, Database::getAllTables () )) {
	$query = Database::selectAll ( $table, array (), "", array (), false );
	?>
<form action="index.php#field_<?php Template::escape($table);?>" method="get">
	<input type="hidden" name="action" value="module_settings"> <input
		type="hidden" name="module" value="database_browser"> <input
		type="submit" value="<?php translate("back_to_list");?>">
</form>
<div style="overflow: auto; width: 98%; height: 400px; margin: auto; margin-top:20px;">
<?php
	if ($query !== false and $query !== true) {
		$fields_num = db_num_fields ( $query );
		if ($fields_num) {
			echo "<table class=\"tablesorter\"><thead><tr>";
			// printing table headers
			for($i = 0; $i < $fields_num; $i ++) {
				$field = db_fetch_field ( $query );
				echo "<th>{$field->name}</th>";
			}
			echo "</tr></thead><tbody>";
			// printing table rows
			while ( $row = db_fetch_row ( $query ) ) {
				echo "<tr>";

				// $row is array... foreach( .. ) puts every element
				// of $row to $cell variable
				foreach ( $row as $cell ) {
					$txt = htmlspecialchars ( $cell, ENT_COMPAT, "UTF-8" );
					$txt = nl2br ( $txt );
					echo "<td>$txt</td>";
				}

				echo "</tr>
";
			}

			echo "</tbody></table></div>";
		}
	}
	?>
</div>
<?php
} else {
	noperms ();
}
?>
