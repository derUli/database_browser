<?php
define ( "MODULE_ADMIN_HEADLINE", get_translation ( " database_browser" ) );
define ( "MODULE_ADMIN_REQUIRED_PERMISSION", " database_browser" );
function database_browser_admin() {
	if (isset ( $_GET ["single"] ) and in_array ( $_GET ["single"], Database::getAllTables () )) {
		echo Template::executeModuleTemplate ( "database_browser", "single" );
	} else {
		echo Template::executeModuleTemplate ( "database_browser", "list" );
	}
}
?>
