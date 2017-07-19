<?php

class DatabaseBrowser extends Controller
{

    public function getSettingsHeadline()
    {
        if (isset($_GET["single"]) and in_array($_GET["single"], Database::getAllTables())) {
            return get_translation("table_x", array(
                "%x" => Template::getEscape($_GET["single"])
            ));
        } else {
            return get_translation("list_of_tables");
        }
        define("MODULE_ADMIN_REQUIRED_PERMISSION", " database_browser");
    }

    public function getSettingsLinkText()
    {
        return get_translation("show_tables");
    }

    public function settings()
    {
        if (isset($_GET["single"]) and in_array($_GET["single"], Database::getAllTables())) {
            return Template::executeModuleTemplate("database_browser", "single");
        } else {
            return Template::executeModuleTemplate("database_browser", "list");
        }
    }
}
