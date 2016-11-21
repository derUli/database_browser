<?php
if (isset ( $_GET ["single"] ) and in_array ( $_GET ["single"], Database::getAllTables () )) {
	define ( "MODULE_ADMIN_HEADLINE", get_translation ( "table_x", array (
			"%x" => Template::getEscape ( $_GET ["single"] ) 
	) ) );
} else {
	define ( "MODULE_ADMIN_HEADLINE", get_translation ( "list_of_tables" ) );
}
define ( "MODULE_ADMIN_REQUIRED_PERMISSION", " database_browser" );
function database_browser_admin() {
	if (isset ( $_GET ["single"] ) and in_array ( $_GET ["single"], Database::getAllTables () )) {
		echo Template::executeModuleTemplate ( "database_browser", "single" );
	} else {
		echo Template::executeModuleTemplate ( "database_browser", "list" );
	}
}
?>
