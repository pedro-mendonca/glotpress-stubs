<?php

class GP_CLI_Add_Admin extends \WP_CLI_Command
{
    /**
     * Give the user admin rights in GlotPress
     *
     * ## OPTIONS
     *
     * <username>...
     * : Username(s) to make an admin
     */
    public function __invoke($args, $assoc_args)
    {
    }
}
class GP_CLI_Branch_Project extends \WP_CLI_Command
{
    /**
     * Branch a project
     *
     * Duplicates an existing project to create a new one.
     *
     * ## OPTIONS
     *
     * <source>
     * : Source project path to duplicate from
     *
     * <destination>
     * : Destination project path to duplicate to (must exist first)
     */
    public function __invoke($args)
    {
    }
}
class GP_CLI_Import_Originals extends \WP_CLI_Command
{
    /**
     * Import originals for a project from a file
     *
     * ## OPTIONS
     *
     * <project>
     * : Project name
     *
     * <file>
     * : File to import from
     *
     * [--format=<format>]
     * : Accepted values: po, mo, android, resx, strings. Default: po
     */
    public function __invoke($args, $assoc_args)
    {
    }
}
class GP_CLI_Regenerate_Paths extends \WP_CLI_Command
{
    public function __invoke()
    {
    }
}
class GP_CLI_Remove_Multiple_Currents extends \WP_CLI_Command
{
    public function __invoke()
    {
    }
}
class GP_CLI_Translation_Set extends \WP_CLI_Command
{
    /**
     * Get a translation set for a project.
     *
     * @param string $project Project path
     * @param string $locale Locale slug
     * @param string $set Set slug
     * @return GP_Translation_Set|WP_Error Translation set if available, error otherwise.
     */
    protected function get_translation_set($project, $locale, $set = 'default')
    {
    }
    /**
     * Export the translation set
     *
     * ## OPTIONS
     *
     * <project>
     * : Project path
     *
     * <locale>
     * : Locale to export
     *
     * [--set=<set>]
     * : Translation set slug; default is "default"
     *
     * [--format=<format>]
     * : Format for output (one of "po", "mo", "android", "resx", "strings"; default is "po")
     *
     * [--search=<search>]
     * : Search term
     *
     * [--status=<status>]
     * : Translation string status; default is "current"
     *
     * [--priority=<priorities>]
     * : Original priorities, comma separated. Possible values are "hidden,low,normal,high"
     */
    public function export($args, $assoc_args)
    {
    }
    /**
     * Import a file into the translation set
     *
     * ## OPTIONS
     *
     * <project>
     * : Project path
     *
     * <locale>
     * : Locale to export
     *
     * <file>
     * : File to import
     *
     * [--set=<set>]
     * : Translation set slug; default is "default"
     *
     * [--status=<status>]
     * : Translation string status; default is "current"
     */
    public function import($args, $assoc_args)
    {
    }
    /**
     * Recheck warnings for the translation set
     *
     * ## OPTIONS
     *
     * <project>
     * : Project path
     *
     * <locale>
     * : Locale to export
     *
     * [--set=<set>]
     * : Translation set slug; default is "default"
     *
     * @subcommand recheck-warnings
     */
    public function recheck_warnings($args, $assoc_args)
    {
    }
}
class GP_CLI_Upgrade_Set_Permissions extends \WP_CLI_Command
{
    public function __invoke()
    {
    }
}
class GP_CLI_Wipe_Permissions extends \WP_CLI_Command
{
    public function __invoke()
    {
    }
}
/**
 * Translation errors API
 *
 * @package GlotPress
 * @since 4.0.0
 */
/**
 * Class used to handle translation errors.
 *
 * @since 4.0.0
 */
class GP_Translation_Errors
{
    /**
     * List of callbacks.
     *
     * @since 4.0.0
     * @access public
     *
     * @var callable[]
     */
    public $callbacks = array();
    /**
     * Adds a callback for a new error.
     *
     * @since 4.0.0
     * @access public
     *
     * @param string   $id       Unique ID of the callback.
     * @param callable $callback The callback.
     */
    public function add($id, $callback)
    {
    }
    /**
     * Removes an existing callback for an error.
     *
     * @since 4.0.0
     * @access public
     *
     * @param string $id Unique ID of the callback.
     */
    public function remove($id)
    {
    }
    /**
     * Checks whether a callback exists for an ID.
     *
     * @since 4.0.0
     * @access public
     *
     * @param string $id Unique ID of the callback.
     * @return bool True if exists, false if not.
     */
    public function has($id)
    {
    }
    /**
     * Checks translations for any error.
     *
     * @since 4.0.0
     * @access public
     *
     * @param GP_Original $gp_original  The original object.
     * @param string[]    $translations The translations.
     * @param GP_Locale   $locale       The locale.
     * @return array|null Null if no issues have been found, otherwise an array
     *                    with errors.
     */
    public function check($gp_original, $translations, $locale)
    {
    }
}
/**
 * Class used to handle translation errors.
 *
 * @since 4.0.0
 */
class GP_Builtin_Translation_Errors
{
    /**
     * Adds an error for adding unexpected percent signs in a sprintf-like string.
     *
     * This is to catch translations for originals like this:
     *  - Original: `<a href="%s">100 percent</a>`
     *  - Submitted translation: `<a href="%s">100%</a>`
     *  - Proper translation: `<a href="%s">100%%</a>`
     *
     * @since 4.0.0
     * @access public
     *
     * @param string $original    The original string.
     * @param string $translation The translated string.
     * @return bool|string
     */
    public function error_unexpected_sprintf_token($original, $translation)
    {
    }
    /**
     * Registers all methods starting with `error_` as built-in errors.
     *
     * @since 4.0.0
     * @access public
     *
     * @param GP_Translation_Errors $translation_errors Instance of GP_Translation_Errors.
     */
    public function add_all($translation_errors)
    {
    }
}
/**
 * GlotPress Format base class. It is supposed to be inherited.
 */
abstract class GP_Format
{
    public $name = '';
    public $extension = '';
    public $alt_extensions = array();
    public $filename_pattern = '%s-%s';
    public abstract function print_exported_file($project, $locale, $translation_set, $entries);
    public abstract function read_originals_from_file($file_name);
    /**
     * Gets the list of supported file extensions.
     *
     * @since 2.0.0
     *
     * @return array Supported file extensions.
     */
    public function get_file_extensions()
    {
    }
    public function read_translations_from_file($file_name, $project = \null)
    {
    }
    /**
     * Create a string that represents the value for the "Language:" header for an export file.
     *
     * @since 2.1.0
     *
     * @param GP_Locale $locale The locale object.
     *
     * @return string|false Returns false if the locale object does not have any iso_639 language code, otherwise returns the shortest possible language code string.
     */
    protected function get_language_code($locale)
    {
    }
}
/**
 * GlotPress Format Android XML class
 *
 * @since 1.0.0
 *
 * @package GlotPress
 */
/**
 * Format class used to support Android XML file format.
 *
 * @since 1.0.0
 */
class GP_Format_Android extends \GP_Format
{
    /**
     * Name of file format, used in file format dropdowns.
     *
     * @since 1.0.0
     *
     * @var string
     */
    public $name = 'Android XML (.xml)';
    /**
     * File extension of the file format, used to autodetect formats and when creating the output file names.
     *
     * @since 1.0.0
     *
     * @var string
     */
    public $extension = 'xml';
    /**
     * Storage for the export file contents while it is being generated.
     *
     * @since 1.0.0
     *
     * @var string
     */
    public $exported = '';
    /**
     * Generates a string the contains the $entries to export in the Android XML file format.
     *
     * @since 1.0.0
     *
     * @param GP_Project         $project         The project the strings are being exported for, not used
     *                                            in this format but part of the scaffold of the parent object.
     * @param GP_Locale          $locale          The locale object the strings are being exported for, not used
     *                                            in this format but part of the scaffold of the parent object.
     * @param GP_Translation_Set $translation_set The locale object the strings are being
     *                                            exported for. not used in this format but part
     *                                            of the scaffold of the parent object.
     * @param GP_Translation     $entries         The entries to export.
     *
     * @return string The exported Android XML string.
     */
    public function print_exported_file($project, $locale, $translation_set, $entries)
    {
    }
    /**
     * Reads a set of original strings from an Android XML file.
     *
     * @since 1.0.0
     *
     * @param string $file_name The name of the uploaded Android XML file.
     *
     * @return Translations|bool The extracted originals on success, false on failure.
     */
    public function read_originals_from_file($file_name)
    {
    }
    /**
     * Escapes a string with c style slashes and html entities as required.
     *
     * @since 1.0.0
     *
     * @param string $string The string to escape.
     *
     * @return string Returns the escaped string.
     */
    protected function escape($string)
    {
    }
}
/**
 * GlotPress Format JSON class
 *
 * @since 2.3.0
 *
 * @package GlotPress
 */
/**
 * Format class used to support JSON file format.
 *
 * @since 2.3.0
 */
class GP_Format_JSON extends \GP_Format
{
    /**
     * Name of file format, used in file format dropdowns.
     *
     * @since 2.3.0
     *
     * @var string
     */
    public $name = 'JSON (.json)';
    /**
     * File extension of the file format, used to autodetect formats and when creating the output file names.
     *
     * @since 2.3.0
     *
     * @var string
     */
    public $extension = 'json';
    /**
     * Generates a string the contains the $entries to export in the JSON file format.
     *
     * @since 2.3.0
     *
     * @param GP_Project         $project         The project the strings are being exported for, not used
     *                                            in this format but part of the scaffold of the parent object.
     * @param GP_Locale          $locale          The locale object the strings are being exported for. not used
     *                                            in this format but part of the scaffold of the parent object.
     * @param GP_Translation_Set $translation_set The locale object the strings are being
     *                                            exported for. not used in this format but part
     *                                            of the scaffold of the parent object.
     * @param GP_Translation     $entries         The entries to export.
     * @return string The exported JSON string.
     */
    public function print_exported_file($project, $locale, $translation_set, $entries)
    {
    }
    /**
     * Reads a set of original strings from a JSON file.
     *
     * @since 2.3.0
     *
     * @param string $file_name The name of the uploaded JSON file.
     * @return Translations|bool The extracted originals on success, false on failure.
     */
    public function read_originals_from_file($file_name)
    {
    }
    /**
     * Reads a set of translations from a JSON file.
     *
     * @since 2.3.0
     *
     * @param string     $file_name The name of the uploaded properties file.
     * @param GP_Project $project   Unused. The project object to read the translations into.
     * @return Translations|bool The extracted translations on success, false on failure.
     */
    public function read_translations_from_file($file_name, $project = \null)
    {
    }
    /**
     * Loads a given JSON file and decodes its content.
     *
     * @since 2.3.0
     *
     * @param string $file_name The name of the JSON file to parse.
     * @return array|false The encoded value or false on failure.
     */
    protected function decode_json_file($file_name)
    {
    }
}
/**
 * GlotPress Format Jed 1.x class
 *
 * @since 2.3.0
 *
 * @package GlotPress
 */
/**
 * Format class used to support Jed 1.x compatible JSON file format.
 *
 * @since 2.3.0
 */
class GP_Format_Jed1x extends \GP_Format_JSON
{
    /**
     * Name of file format, used in file format dropdowns.
     *
     * @since 2.3.0
     *
     * @var string
     */
    public $name = 'Jed 1.x (.json)';
    /**
     * File extension of the file format, used to autodetect formats and when creating the output file names.
     *
     * @since 2.3.0
     *
     * @var string
     */
    public $extension = 'jed.json';
    /**
     * Generates a string the contains the $entries to export in the Jed 1.x compatible JSON file format.
     *
     * @since 2.3.0
     *
     * @param GP_Project         $project         The project the strings are being exported for, not used
     *                                            in this format but part of the scaffold of the parent object.
     * @param GP_Locale          $locale          The locale object the strings are being exported for, not used
     *                                            in this format but part of the scaffold of the parent object.
     * @param GP_Translation_Set $translation_set The locale object the strings are being
     *                                            exported for. not used in this format but part
     *                                            of the scaffold of the parent object.
     * @param GP_Translation     $entries         The entries to export.
     * @return string The exported Jed 1.x compatible JSON string.
     */
    public function print_exported_file($project, $locale, $translation_set, $entries)
    {
    }
    /**
     * Reads a set of original strings from a JSON file.
     *
     * @since 2.3.0
     *
     * @param string $file_name The name of the uploaded JSON file.
     * @return Translations|bool The extracted originals on success, false on failure.
     */
    public function read_originals_from_file($file_name)
    {
    }
    /**
     * Decodes a JSON string and checks for needed array keys.
     *
     * @since 2.3.0
     *
     * @param string $file_name The name of the JSON file to parse.
     * @return array|false The encoded value or false on failure.
     */
    protected function decode_json_file($file_name)
    {
    }
}
/**
 * GlotPress Format NGX Translate class
 *
 * @since 3.0.0
 *
 * @package GlotPress
 */
/**
 * Format class used to support NGX Translate JSON file format.
 *
 * @since 3.0.0
 */
class GP_Format_NGX extends \GP_Format
{
    /**
     * Name of file format, used in file format dropdowns.
     *
     * @since 3.0.0
     *
     * @var string
     */
    public $name = 'NGX-Translate (.json)';
    /**
     * File extension of the file format, used to autodetect formats and when creating the output file names.
     *
     * @since 3.0.0
     *
     * @var string
     */
    public $extension = 'ngx.json';
    /**
     * Generates a string the contains the $entries to export in the JSON file format.
     *
     * @since 3.0.0
     *
     * @param GP_Project         $project         The project the strings are being exported for, not used
     *                                            in this format but part of the scaffold of the parent object.
     * @param GP_Locale          $locale          The locale object the strings are being exported for. not used
     *                                            in this format but part of the scaffold of the parent object.
     * @param GP_Translation_Set $translation_set The locale object the strings are being
     *                                            exported for. not used in this format but part
     *                                            of the scaffold of the parent object.
     * @param GP_Translation     $entries         The entries to export.
     * @return string The exported JSON string.
     */
    public function print_exported_file($project, $locale, $translation_set, $entries)
    {
    }
    /**
     * Reads a set of original strings from a JSON file.
     *
     * @since 3.0.0
     *
     * @param string $file_name The name of the uploaded JSON file.
     * @return Translations|bool The extracted originals on success, false on failure.
     */
    public function read_originals_from_file($file_name)
    {
    }
    /**
     * Decode a JSON file.
     *
     * @since 3.0.0
     *
     * @param string $file_name The name of the JSON file to decode.
     * @return decode JSON file as an array.
     */
    protected function decode_json_file($file_name)
    {
    }
}
/**
 * GlotPress Format PHP class
 *
 * @since 4.0.0
 *
 * @package GlotPress
 */
/**
 * Format class used to support PHP file format.
 *
 * @since 4.0.0
 */
class GP_Format_PHP extends \GP_Format
{
    /**
     * Name of file format, used in file format dropdowns.
     *
     * @since 4.0.0
     *
     * @var string
     */
    public $name = 'PHP (.l10n.php)';
    /**
     * File extension of the file format, used to autodetect formats and when creating the output file names.
     *
     * @since 4.0.0
     *
     * @var string
     */
    public $extension = 'l10n.php';
    /**
     * Generates a string the contains the $entries to export in the PHP file format.
     *
     * @since 4.0.0
     *
     * @param GP_Project         $project         The project the strings are being exported for, not used
     *                                            in this format but part of the scaffold of the parent object.
     * @param GP_Locale          $locale          The locale object the strings are being exported for. not used
     *                                            in this format but part of the scaffold of the parent object.
     * @param GP_Translation_Set $translation_set The locale object the strings are being
     *                                            exported for. not used in this format but part
     *                                            of the scaffold of the parent object.
     * @param GP_Translation     $entries         The entries to export.
     * @return string The exported PHP string.
     */
    public function print_exported_file($project, $locale, $translation_set, $entries)
    {
    }
    /**
     * Reads a set of original strings from a PHP file.
     *
     * @since 4.0.0
     *
     * @param string $file_name The name of the uploaded PHP file.
     * @return false Always returns false, as this is not currently implemented.
     */
    public function read_originals_from_file($file_name)
    {
    }
    /**
     * Reads a set of translations from a PHP file.
     *
     * @since 4.0.0
     *
     * @param string     $file_name The name of the uploaded properties file.
     * @param GP_Project $project   Unused. The project object to read the translations into.
     * @return false Always returns false, as this is not currently implemented.
     */
    public function read_translations_from_file($file_name, $project = \null)
    {
    }
}
class GP_Format_PO extends \GP_Format
{
    public $name = 'Portable Object Message Catalog (.po/.pot)';
    public $extension = 'po';
    public $alt_extensions = array('pot');
    public $class = 'PO';
    public function print_exported_file($project, $locale, $translation_set, $entries)
    {
    }
    public function read_translations_from_file($file_name, $project = \null)
    {
    }
    public function read_originals_from_file($file_name)
    {
    }
    /**
     * Add a header to the selected format, overrideable by child classes.
     *
     * @since 2.1.0
     *
     * @param GP_Format $format The format object to set the header for.
     * @param string    $header The header name to set.
     * @param string    $text   The text to set the header to.
     */
    protected function set_header($format, $header, $text)
    {
    }
    /**
     * Add a comment before the headers for the selected format, overrideable by child classes.
     *
     * @since 2.1.0
     *
     * @param GP_Format $format The format object to set the header for.
     * @param string    $text   The text to add to the comment.
     */
    protected function add_comments_before_headers($format, $text)
    {
    }
}
class GP_Format_MO extends \GP_Format_PO
{
    public $name = 'Machine Object Message Catalog (.mo)';
    public $extension = 'mo';
    public $alt_extensions = array();
    public $class = 'MO';
    /**
     * Override the comments function as PO files do not use it.
     *
     * @since 2.1.0
     *
     * @param GP_Format $format The format object to set the header for.
     * @param string    $text   The text to add to the comment.
     */
    protected function add_comments_before_headers($format, $text)
    {
    }
}
class GP_Format_Properties extends \GP_Format
{
    public $name = 'Java Properties File (.properties)';
    public $extension = 'properties';
    public $filename_pattern = '%s_%s';
    public $exported = '';
    /**
     * Generates a string the contains the $entries to export in the Properties file format.
     *
     * @since 2.0.0
     *
     * @param GP_Project         $project         The project the strings are being exported for, not used
     *                                            in this format but part of the scaffold of the parent object.
     * @param GP_Locale          $locale          The locale object the strings are being exported for. not used
     *                                            in this format but part of the scaffold of the parent object.
     * @param GP_Translation_Set $translation_set The locale object the strings are being
     *                                            exported for. not used in this format but part
     *                                            of the scaffold of the parent object.
     * @param GP_Translation     $entries         The entries to export.
     *
     * @return string
     */
    public function print_exported_file($project, $locale, $translation_set, $entries)
    {
    }
    /**
     * Reads a set of translations from a properties file.
     *
     * @since 2.0.0
     *
     * @param string     $file_name The filename of the uploaded properties file.
     * @param GP_Project $project   The project object to read the translations in to.
     *
     * @return Translations|bool
     */
    public function read_translations_from_file($file_name, $project = \null)
    {
    }
    /**
     * Reads a set of original strings from a properties file.
     *
     * @since 2.0.0
     *
     * @param string $file_name The filename of the uploaded properties file.
     *
     * @return Translations|bool
     */
    public function read_originals_from_file($file_name)
    {
    }
}
class GP_Format_ResX extends \GP_Format
{
    public $name = '.NET Resource (.resx)';
    public $extension = 'resx';
    public $alt_extensions = array('resx.xml');
    public $exported = '';
    public function print_exported_file($project, $locale, $translation_set, $entries)
    {
    }
    public function read_originals_from_file($file_name)
    {
    }
}
/**
 * GlotPress Format Mac OSX / iOS Strings Translate class
 *
 * @since 1.0.0
 *
 * @package GlotPress
 */
/**
 * Format class used to support Mac OS X / iOS Translate strings file format.
 *
 * @since 1.0.0
 */
class GP_Format_Strings extends \GP_Format
{
    /**
     * Name of file format, used in file format dropdowns.
     *
     * @since 1.0.0
     *
     * @var string
     */
    public $name = 'Mac OS X / iOS Strings File (.strings)';
    /**
     * File extension of the file format, used to autodetect formats and when creating the output file names.
     *
     * @since 1.0.0
     *
     * @var string
     */
    public $extension = 'strings';
    /**
     * Generates a string the contains the $entries to export in the strings file format.
     *
     * @since 1.0.0
     *
     * @param GP_Project         $project         The project the strings are being exported for, not used
     *                                            in this format but part of the scaffold of the parent object.
     * @param GP_Locale          $locale          The locale object the strings are being exported for. not used
     *                                            in this format but part of the scaffold of the parent object.
     * @param GP_Translation_Set $translation_set The locale object the strings are being
     *                                            exported for. not used in this format but part
     *                                            of the scaffold of the parent object.
     * @param GP_Translation     $entries         The entries to export.
     * @return string The exported strings string.
     */
    public function print_exported_file($project, $locale, $translation_set, $entries)
    {
    }
    /**
     * Reads a set of original strings from a strings file.
     *
     * @since 1.0.0
     *
     * @param string $file_name The name of the uploaded strings file.
     * @return Translations|bool The extracted originals on success, false on failure.
     */
    public function read_originals_from_file($file_name)
    {
    }
}
/**
 * GP class
 *
 * @package GlotPress
 * @since 1.0.0
 */
/**
 * Core class used to store singleton instances.
 *
 * @since 1.0.0
 */
class GP
{
    /**
     * Model for project.
     *
     * @since 1.0.0
     *
     * @var GP_Project
     */
    public static $project;
    /**
     * Model for transalation set.
     *
     * @since 1.0.0
     *
     * @var GP_Translation_Set
     */
    public static $translation_set;
    /**
     * Model for permission.
     *
     * @since 1.0.0
     *
     * @var GP_Permission
     */
    public static $permission;
    /**
     * Model for validator permission.
     *
     * @since 1.0.0
     *
     * @var GP_Validator_Permission
     */
    public static $validator_permission;
    /**
     * Model for administrator permission.
     *
     * @since 1.0.0
     *
     * @var GP_Administrator_Permission
     */
    public static $administrator_permission;
    /**
     * Model for translation.
     *
     * @since 1.0.0
     *
     * @var GP_Translation
     */
    public static $translation;
    /**
     * Model for original.
     *
     * @since 1.0.0
     *
     * @var GP_Original
     */
    public static $original;
    /**
     * Model for glossary.
     *
     * @since 1.0.0
     *
     * @var GP_Glossary
     */
    public static $glossary;
    /**
     * Model for glossary entry.
     *
     * @since 1.0.0
     *
     * @var GP_Glossary_Entry
     */
    public static $glossary_entry;
    /**
     * Singleton for router.
     *
     * @since 1.0.0
     *
     * @var GP_Router
     */
    public static $router;
    /**
     * Singleton for translation warnings.
     *
     * @since 1.0.0
     *
     * @var GP_Translation_Warnings
     */
    public static $translation_warnings;
    /**
     * Singleton for built-in translation warnings.
     *
     * @since 1.0.0
     *
     * @var GP_Builtin_Translation_Warnings
     */
    public static $builtin_translation_warnings;
    /**
     * Singleton for translation errors.
     *
     * @since 4.0.0
     *
     * @var GP_Translation_Errors
     */
    public static $translation_errors;
    /**
     * Singleton for built-in translation errors.
     *
     * @since 4.0.0
     *
     * @var GP_Builtin_Translation_Errors
     */
    public static $builtin_translation_errors;
    /**
     * Array of notices.
     *
     * @since 1.0.0
     *
     * @var array
     */
    public static $redirect_notices = array();
    /**
     * Holds the current route.
     *
     * @since 1.0.0
     *
     * @var string|null
     */
    public static $current_route = \null;
    /**
     * Array of available formats.
     *
     * @since 1.0.0
     *
     * @var GP_Format[]
     */
    public static $formats;
    /**
     * Array of enqueued style sheets.
     *
     * @since 2.2.0
     *
     * @var array
     */
    public static $styles = array();
    /**
     * Array of enqueued scripts.
     *
     * @since 2.2.0
     *
     * @var array
     */
    public static $scripts = array();
}
/**
 * Base controller class
 */
class GP_Route
{
    public $api = \false;
    public $errors = array();
    public $notices = array();
    var $request_running = \false;
    var $template_path = \null;
    var $fake_request = \false;
    var $exited = \false;
    var $exit_message;
    var $redirected = \false;
    var $redirected_to = \null;
    var $rendered_template = \false;
    var $loaded_template = \null;
    var $template_output = \null;
    var $headers = array();
    var $class_name;
    var $http_status;
    var $last_method_called;
    public function __construct()
    {
    }
    public function die_with_error($message, $status = 500)
    {
    }
    public function before_request()
    {
    }
    public function after_request()
    {
    }
    /**
     * Validates a thing and add its errors to the route's errors.
     *
     * @param object $thing a GP_Thing instance to validate
     * @return bool whether the thing is valid
     */
    public function validate($thing)
    {
    }
    /**
     * Same as validate(), but redirects to $url if the thing isn't valid.
     *
     * Note: this method calls $this->exit_() after the redirect and the code after it won't
     * be executed.
     *
     * @param object $thing a GP_Thing instance to validate
     * @param string $url where to redirect if the thing doesn't validate
     * @return bool whether the thing is valid
     */
    public function invalid_and_redirect($thing, $url = \null)
    {
    }
    /**
     * Checks whether a user is allowed to do an action.
     *
     * @since 2.3.0 Added the `$extra` parameter.
     *
     * @param string      $action      The action.
     * @param string|null $object_type Optional. Type of an object. Default null.
     * @param int|null    $object_id   Optional. ID of an object. Default null.
     * @param array|null  $extra       Optional. Extra information for deciding the outcome.
     * @return bool       The verdict.
     */
    public function can($action, $object_type = \null, $object_id = \null, $extra = \null)
    {
    }
    /**
     * Redirects and exits if the current user isn't allowed to do an action.
     *
     * @since 1.0.0
     *
     * @param string      $action      The action.
     * @param string|null $object_type Optional. Type of an object. Default null.
     * @param int|null    $object_id   Optional. ID of an object. Default null.
     * @param string|null $url         Optional. URL to redirect to. Default: referrer or index page, if referrer is missing.
     * @return bool Whether a redirect happened.
     */
    public function cannot_and_redirect($action, $object_type = \null, $object_id = \null, $url = \null)
    {
    }
    /**
     * Verifies a nonce for a route.
     *
     * @since 2.0.0
     *
     * @param string $action Context for the created nonce.
     * @return bool False if the nonce is invalid, true if valid.
     */
    public function verify_nonce($action)
    {
    }
    /**
     * Verifies a nonce for a route and redirects in case the nonce is invalid.
     *
     * @since 2.0.0
     *
     * @param string      $action Context for the created nonce.
     * @param string|null $url    The URL to redirect. Default: 'null', the referrer.
     * @return bool False if the nonce is valid, true if the redirect has happened.
     */
    public function invalid_nonce_and_redirect($action, $url = \null)
    {
    }
    /**
     * Determines whether a user can perfom an action and redirects in case of a failure.
     *
     * @since 1.0.0
     *
     * @param string      $action      The action.
     * @param string|null $object_type Optional. Type of an object. Default null.
     * @param int|null    $object_id   Optional. ID of an object. Default null.
     * @param string|null $message     Error message in case of a failure.
     *                                 Default: 'You are not allowed to do that!'.
     * @param array|null  $extra       Pass-through parameter to can().
     * @return false
     */
    public function can_or_forbidden($action, $object_type = \null, $object_id = \null, $message = \null, $extra = \null)
    {
    }
    public function logged_in_or_forbidden()
    {
    }
    public function redirect_with_error($message, $url = \null)
    {
    }
    public function redirect($url = \null)
    {
    }
    /**
     * Sets HTTP headers for content download.
     *
     * @param string $filename      The name of the file.
     * @param string $last_modified Optional. Date when the file was last modified. Default: ''.
     */
    public function headers_for_download($filename, $last_modified = '')
    {
    }
    public function set_notices_and_errors()
    {
    }
    /**
     * Loads a template.
     *
     * @param string      $template  Template name to load.
     * @param array       $args      Associative array with arguements, which will be exported in the template PHP file.
     * @param bool|string $honor_api If this is true or 'api' and the route is processing an API request
     *                               the template name will be suffixed with .api. The actual file loaded will be template.api.php.
     */
    public function tmpl($template, $args = array(), $honor_api = \true)
    {
    }
    public function die_with_404($args = array())
    {
    }
    public function exit_($message = 0)
    {
    }
    public function header($string)
    {
    }
    public function status_header($status)
    {
    }
}
class GP_Router
{
    public $api_prefix = 'api';
    public function __construct($urls = array())
    {
    }
    /**
     * Sets the default routes that GlotPress needs.
     */
    public function set_default_routes()
    {
    }
    /**
     * Returns the current request URI path, relative to
     * the application URI and without the query string
     */
    public function request_uri()
    {
    }
    public function request_method()
    {
    }
    public function add($re, $function, $method = 'get')
    {
    }
    public function prepend($re, $function, $method = 'get')
    {
    }
    public function remove($re, $method = 'get')
    {
    }
    public function route()
    {
    }
}
// phpcs:ignore WordPress.Files.FileName.NotHyphenatedLowercase
/**
 * Routes: GP_Route_Main class
 *
 * @package GlotPress
 * @subpackage Routes
 * @since 1.0.0
 */
/**
 * Core class used to implement the main route.
 *
 * @since 1.0.0
 */
class GP_Route_Main extends \GP_Route
{
}
/**
 * Routes: GP_Route_Glossary_Entry class
 *
 * @package GlotPress
 * @subpackage Routes
 * @since 1.0.0
 */
/**
 * Core class used to implement the glossary entry route.
 *
 * @since 1.0.0
 */
class GP_Route_Glossary_Entry extends \GP_Route_Main
{
    public function glossary_entries_get($project_path, $locale_slug, $translation_set_slug)
    {
    }
    public function glossary_entry_add_post($project_path, $locale_slug, $translation_set_slug)
    {
    }
    public function glossary_entries_post($project_path, $locale_slug, $translation_set_slug)
    {
    }
    public function glossary_entry_delete_post()
    {
    }
    public function export_glossary_entries_get($project_path, $locale_slug, $translation_set_slug)
    {
    }
    public function import_glossary_entries_get($project_path, $locale_slug, $translation_set_slug)
    {
    }
    public function import_glossary_entries_post($project_path, $locale_slug, $translation_set_slug)
    {
    }
}
/**
 * Routes: GP_Route_Glossary class
 *
 * @package GlotPress
 * @subpackage Routes
 * @since 1.0.0
 */
/**
 * Core class used to implement the glossary route.
 *
 * @since 1.0.0
 */
class GP_Route_Glossary extends \GP_Route_Main
{
    public function new_get()
    {
    }
    public function new_post()
    {
    }
    public function edit_get($glossary_id)
    {
    }
    public function edit_post($glossary_id)
    {
    }
    /**
     * Displays the delete page for glossaries.
     *
     * @since 2.0.0
     *
     * @param int $glossary_id The id of the glossary to delete.
     */
    public function delete_get($glossary_id)
    {
    }
    /**
     * Delete a glossary.
     *
     * @since 2.0.0
     *
     * @param int $glossary_id The id of the glossary to delete.
     */
    public function delete_post($glossary_id)
    {
    }
}
/**
 * Routes: GP_Route_Index class
 *
 * @package GlotPress
 * @subpackage Routes
 * @since 1.0.0
 */
/**
 * Core class used to implement the index route.
 *
 * @since 1.0.0
 */
class GP_Route_Index extends \GP_Route_Main
{
    public function index()
    {
    }
}
/**
 * Routes: GP_Route_Locale class
 *
 * @package GlotPress
 * @subpackage Routes
 * @since 1.0.0
 */
/**
 * Core class used to implement the locale route.
 *
 * @since 1.0.0
 */
class GP_Route_Locale extends \GP_Route_Main
{
    public function locales_get()
    {
    }
    public function single($locale_slug, $current_set_slug = 'default')
    {
    }
}
/**
 * Routes: GP_Route_Original class
 *
 * @package GlotPress
 * @subpackage Routes
 * @since 1.0.0
 */
/**
 * Core class used to implement the original route.
 *
 * @since 1.0.0
 */
class GP_Route_Original extends \GP_Route_Main
{
    public function set_priority($original_id)
    {
    }
}
/**
 * Routes: GP_Route_Profile class
 *
 * @package GlotPress
 * @subpackage Routes
 * @since 1.0.0
 */
/**
 * Core class used to implement the profile route.
 *
 * @since 1.0.0
 */
class GP_Route_Profile extends \GP_Route_Main
{
    /**
     * Displays the profile page, requires a user to be logged in.
     */
    public function profile_get()
    {
    }
    /**
     * Displays the profile page for a given user.
     *
     * @param string $user A user nicename.
     */
    public function profile_view($user = '')
    {
    }
}
/**
 * Routes: GP_Route_Project class
 *
 * @package GlotPress
 * @subpackage Routes
 * @since 1.0.0
 */
/**
 * Core class used to implement the project route.
 *
 * @since 1.0.0
 */
class GP_Route_Project extends \GP_Route_Main
{
    public function index()
    {
    }
    public function single($project_path)
    {
    }
    public function personal_options_post($project_path)
    {
    }
    public function import_originals_get($project_path)
    {
    }
    public function import_originals_post($project_path)
    {
    }
    public function edit_get($project_path)
    {
    }
    public function edit_post($project_path)
    {
    }
    /**
     * Deletes a project, including sub projects, glossaries, originals, translations sets and translations.
     *
     * @since 2.0.0
     *
     * @param int $project_path The path of the project to delete.
     */
    public function delete_post($project_path)
    {
    }
    /**
     * Displays the delete page for projects.
     *
     * @since 2.0.0
     *
     * @param string $project_path The path of the project to delete.
     */
    public function delete_get($project_path)
    {
    }
    public function new_get()
    {
    }
    public function new_post()
    {
    }
    public function permissions_get($project_path)
    {
    }
    public function permissions_post($project_path)
    {
    }
    public function permissions_delete($project_path, $permission_id)
    {
    }
    public function mass_create_sets_get($project_path)
    {
    }
    public function mass_create_sets_post($project_path)
    {
    }
    public function mass_create_sets_preview_post($project_path)
    {
    }
    public function branch_project_get($project_path)
    {
    }
    public function branch_project_post($project_path)
    {
    }
}
/**
 * Routes: GP_Route_Settings class
 *
 * @package GlotPress
 * @subpackage Routes
 * @since 2.0.0
 */
/**
 * Core class used to implement the settings route.
 *
 * @since 2.0.0
 */
class GP_Route_Settings extends \GP_Route_Main
{
    /**
     * Displays the settings page, requires a user to be logged in.
     */
    public function settings_get()
    {
    }
    /**
     * Saves settings for a user and redirects back to the settings page.
     *
     * @param int $user_id Optional. A user id, if not provided the id of the currently logged in user will be used.
     */
    public function settings_post($user_id = \null)
    {
    }
}
/**
 * Routes: GP_Route_Translation_Set class
 *
 * @package GlotPress
 * @subpackage Routes
 * @since 1.0.0
 */
/**
 * Core class used to implement the translation set route.
 *
 * @since 1.0.0
 */
class GP_Route_Translation_Set extends \GP_Route_Main
{
    public function new_get()
    {
    }
    public function new_post()
    {
    }
    public function single($set_id)
    {
    }
    public function edit_get($set_id)
    {
    }
    /**
     * Saves settings for a translation set and redirects back to the project locales page.
     *
     * @since 1.0.0
     *
     * @param int $set_id A translation set id to edit the settings of.
     */
    public function edit_post($set_id)
    {
    }
    /**
     * Deletes a translation set.
     *
     * @since 2.0.0
     *
     * @param int $set_id The id of the translation set to delete.
     */
    public function delete_post($set_id)
    {
    }
    /**
     * Displays the delete page for translations sets.
     *
     * @since 2.0.0
     *
     * @param int $set_id The id of the translation set to delete.
     */
    public function delete_get($set_id)
    {
    }
}
/**
 * Routes: GP_Route_Translation class
 *
 * @package GlotPress
 * @subpackage Routes
 * @since 1.0.0
 */
/**
 * Core class used to implement the translation route.
 *
 * @since 1.0.0
 */
class GP_Route_Translation extends \GP_Route_Main
{
    public function import_translations_get($project_path, $locale_slug, $translation_set_slug)
    {
    }
    public function import_translations_post($project_path, $locale_slug, $translation_set_slug)
    {
    }
    public function export_translations_get($project_path, $locale_slug, $translation_set_slug)
    {
    }
    public function translations_get($project_path, $locale_slug, $translation_set_slug)
    {
    }
    public function translations_post($project_path, $locale_slug, $translation_set_slug)
    {
    }
    public function bulk_post($project_path, $locale_slug, $translation_set_slug)
    {
    }
    public function discard_warning($project_path, $locale_slug, $translation_set_slug)
    {
    }
    public function set_status($project_path, $locale_slug, $translation_set_slug)
    {
    }
    /**
     * Get the glossary for the translation set.
     *
     * This also fetches contents from a potential locale glossary, as well as from a parent project.
     *
     * @since 2.3.0
     *
     * @param  GP_Translation_Set $translation_set Translation set for which to retrieve the glossary.
     * @param  GP_Project         $project         Project for finding potential parent projects.
     * @return GP_Glossary Extended glossary.
     */
    protected function get_extended_glossary($translation_set, $project)
    {
    }
}
/**
 * Things: GP_Thing class
 *
 * @package GlotPress
 * @subpackage Things
 * @since 1.0.0
 */
/**
 * Core base class extended to register things.
 *
 * @since 1.0.0
 */
class GP_Thing
{
    var $field_names = array();
    var $non_db_field_names = array();
    var $int_fields = array();
    var $validation_rules = \null;
    var $per_page = 30;
    var $map_results = \true;
    var $static = array();
    public $class;
    public $table_basename;
    public $id;
    public $non_updatable_attributes;
    public $default_conditions;
    public $table = \null;
    public $errors = array();
    static $static_by_class = array();
    static $validation_rules_by_class = array();
    public function __construct($fields = array())
    {
    }
    public function get_static($name, $default = \null)
    {
    }
    public function has_static($name)
    {
    }
    public function set_static($name, $value)
    {
    }
    // CRUD
    /**
     * Retrieves all rows from this table
     */
    public function all($order = \null)
    {
    }
    /**
     * Reloads the object data from the database, based on its id
     *
     * @return GP_Thing Thing object.
     */
    public function reload()
    {
    }
    /**
     * Retrieves one row from the database.
     *
     * @since 1.0.0
     * @since 3.0.0 Added spread operator and require `$query` argument to be set.
     *
     * @see wpdb::get_row()
     * @see wpdb::prepare()
     *
     * @param string $query   Query statement with optional sprintf()-like placeholders.
     * @param mixed  ...$args Optional arguments to pass to the GP_Thing::prepare() function.
     * @return GP_Thing|false Thing object on success, false on failure.
     */
    public function one($query, ...$args)
    {
    }
    /**
     * Retrieves one variable from the database.
     *
     * @since 1.0.0
     * @since 3.0.0 Added spread operator and require `$query` argument to be set.
     *
     * @see wpdb::get_var()
     * @see wpdb::prepare()
     *
     * @param string $query   Query statement with optional sprintf()-like placeholders.
     * @param mixed  ...$args Optional arguments to pass to the GP_Thing::prepare() function.
     * @return string|null Database query result (as string), or false on failure.
     */
    public function value($query, ...$args)
    {
    }
    /**
     * Prepares a SQL query for safe execution. Uses sprintf()-like syntax.
     *
     * @since 1.0.0
     * @since 3.0.0 Added spread operator and require `$query` argument to be set.
     *
     * @see wpdb::prepare()
     *
     * @param string $query   Query statement with optional sprintf()-like placeholders.
     * @param mixed  ...$args Optional arguments to pass to the GP_Thing::prepare() function.
     * @return string Sanitized query string, if there is a query to prepare.
     */
    public function prepare($query, ...$args)
    {
    }
    /**
     * Retrieves an entire result set from the database, mapped to GP_Thing.
     *
     * @since 1.0.0
     * @since 3.0.0 Added spread operator and require `$query` argument to be set.
     *
     * @see wpdb::get_results()
     * @see wpdb::prepare()
     *
     * @param string $query   Query statement with optional sprintf()-like placeholders.
     * @param mixed  ...$args Optional arguments to pass to the GP_Thing::prepare() function.
     * @return GP_Thing[] A list of GP_Thing objects.
     */
    public function many($query, ...$args)
    {
    }
    /**
     * Retrieves an entire result set from the database.
     *
     * @since 1.0.0
     * @since 3.0.0 Added spread operator and require `$query` argument to be set.
     *
     * @see wpdb::get_results()
     * @see wpdb::prepare()
     *
     * @param string $query   Query statement with optional sprintf()-like placeholders.
     * @param mixed  ...$args Optional arguments to pass to the GP_Thing::prepare() function.
     * @return object[] Database query results.
     */
    public function many_no_map($query, ...$args)
    {
    }
    /**
     * [find_many description]
     *
     * @since 1.0.0
     *
     * @param string|array $conditions
     * @param string|array $order Optional.
     * @return mixed
     */
    public function find_many($conditions, $order = \null)
    {
    }
    /**
     * [find_many_no_map description]
     *
     * @since 1.0.0
     *
     * @param string|array $conditions
     * @param string|array $order Optional.
     * @return mixed
     */
    public function find_many_no_map($conditions, $order = \null)
    {
    }
    /**
     * [find_one description]
     *
     * @since 1.0.0
     *
     * @param string|array $conditions
     * @param string|array $order Optional.
     * @return mixed
     */
    public function find_one($conditions, $order = \null)
    {
    }
    /**
     * [find description]
     *
     * @since 1.0.0
     *
     * @param string|array $conditions
     * @param string|array $order Optional.
     * @return mixed
     */
    public function find($conditions, $order = \null)
    {
    }
    /**
     * [find_no_map description]
     *
     * @since 1.0.0
     *
     * @param string|array $conditions
     * @param string|array $order Optional.
     * @return mixed
     */
    public function find_no_map($conditions, $order = \null)
    {
    }
    /**
     * [map_no_map description]
     *
     * @since 1.0.0
     *
     * @param mixed $results The results, unmapped.
     * @return mixed
     */
    public function map_no_map($results)
    {
    }
    /**
     * Maps database results to their GP_Thing presentations.
     *
     * @since 1.0.0
     *
     * @param mixed $results The results from the database.
     * @return GP_Thing[]|object[] If enabled, a list of objects mapped to GP_Thing.
     */
    public function map($results)
    {
    }
    /**
     * Performs a database query.
     *
     * @since 1.0.0
     * @since 3.0.0 Added spread operator and require `$query` argument to be set.
     *
     * @see wpdb::query()
     * @see wpdb::prepare()
     *
     * @param string $query   Database query.
     * @param mixed  ...$args Optional arguments to pass to the prepare method.
     * @return int|bool Number of rows affected/selected or false on error.
     */
    public function query($query, ...$args)
    {
    }
    /**
     * Inserts a new row
     *
     * @param $args array associative array with fields as keys and values as values
     * @return mixed the object corresponding to the inserted row or false on error
     */
    public function create($args)
    {
    }
    /**
     * Inserts a record and then selects it back based on the id
     *
     * @param $args array see create()
     * @return mixed the selected object or false on error
     */
    public function create_and_select($args)
    {
    }
    /**
     * Updates a single row
     *
     * @param $data array associative array with fields as keys and updated values as values
     */
    public function update($data, $where = \null)
    {
    }
    /**
     * Retrieves an existing thing.
     *
     * @since 1.0.0
     *
     * @param GP_Thing|int $thing_or_id ID of a thing or GP_Thing object.
     * @return GP_Thing|false Thing object on success, false on failure.
     */
    public function get($thing_or_id)
    {
    }
    /**
     * Saves an existing thing.
     *
     * @since 1.0.0
     *
     * @param mixed $args Values to update.
     * @return bool|null Null and false on failure, true on success.
     */
    public function save($args = \null)
    {
    }
    /**
     * Deletes a single row
     *
     * @since 1.0.0
     */
    public function delete()
    {
    }
    /**
     * Deletes all or multiple rows
     *
     * @since 1.0.0
     *
     * @param array $where An array of conditions to use to for a SQL "where" clause, if null, not used and all matching rows will be deleted.
     */
    public function delete_all($where = \null)
    {
    }
    /**
     * Deletes multiple rows
     *
     * @since 2.0.0
     *
     * @param array $where An array of conditions to use to for a SQL "where" clause, if not passed, no rows will be deleted.
     */
    public function delete_many(array $where)
    {
    }
    /**
     * Sets fields of the current GP_Thing object.
     *
     * @param array $fields Fields for a GP_Thing object.
     */
    public function set_fields($fields)
    {
    }
    /**
     * Normalizes an array with key-value pairs representing
     * a GP_Thing object.
     *
     * @todo Include default type handling. For example dates 0000-00-00 should be set to null
     *
     * @since 1.0.0
     * @since 3.0.0 Normalizes int fields to be integers.
     *
     * @param array $args Arguments for a GP_Thing object.
     * @return array Normalized arguments for a GP_Thing object.
     */
    public function normalize_fields($args)
    {
    }
    /**
     * Prepares for enetering the database an array with
     * key-value pairs, preresenting a GP_Thing object.
     */
    public function prepare_fields_for_save($args)
    {
    }
    public function now_in_mysql_format()
    {
    }
    public function prepare_fields_for_create($args)
    {
    }
    public function get_db_field_formats($args)
    {
    }
    /**
     * Coerces data to being a thing object.
     *
     * @since 1.0.0
     *
     * @param array|object $thing Data about the thing retrieved from the database.
     * @return GP_Thing|false Thing object on success, false on failure.
     */
    public function coerce($thing)
    {
    }
    // Triggers
    /**
     * Is called after an object is created in the database.
     *
     * This is a placeholder function which should be implemented in the child classes.
     *
     * @return bool
     */
    public function after_create()
    {
    }
    /**
     * Is called after an object is saved to the database.
     *
     * This is a placeholder function which should be implemented in the child classes.
     *
     * @param GP_Thing $thing_before Object before the update.
     * @return bool
     */
    public function after_save($thing_before)
    {
    }
    /**
     * Is called after an object is deleted from the database.
     *
     * This is a placeholder function which should be implemented in the child classes.
     *
     * @return bool
     */
    public function after_delete()
    {
    }
    /**
     * Builds SQL conditions from a PHP value.
     *
     * Examples:
     *   Input: `null`
     *   Output: `IS NULL`
     *
     *   Input: `'foo'`
     *   Output: `= 'foo'`
     *
     *   Input: `1` or `'1'`
     *   Output: `= 1`
     *
     * @since 1.0.0
     *
     * @param mixed $php_value The PHP value to convert to conditions.
     * @return string SQL conditions.
     */
    public function sql_condition_from_php_value($php_value)
    {
    }
    public function sql_from_conditions($conditions)
    {
    }
    public function sql_from_order($order_by, $order_how = '')
    {
    }
    public function select_all_from_conditions_and_order($conditions, $order = \null)
    {
    }
    /**
     * Sets restriction rules for fields.
     *
     * @since 1.0.0
     *
     * @param GP_Validation_Rules $rules The validation rules instance.
     */
    public function restrict_fields($rules)
    {
    }
    public function validate()
    {
    }
    public function force_false_to_null($value)
    {
    }
    public function fields()
    {
    }
    public function sql_limit_for_paging($page, $per_page = \null)
    {
    }
    public function found_rows()
    {
    }
    public function like_escape_printf($s)
    {
    }
    public function apply_default_conditions($conditions_str)
    {
    }
}
/**
 * Things: GP_Permission class
 *
 * @package GlotPress
 * @subpackage Things
 * @since 1.0.0
 */
/**
 * Core class used to implement the permissions.
 *
 * @since 1.0.0
 */
class GP_Permission extends \GP_Thing
{
    var $table_basename = 'gp_permissions';
    var $field_names = array('id', 'user_id', 'action', 'object_type', 'object_id');
    var $int_fields = array('id', 'user_id');
    var $non_updatable_attributes = array('id');
    public $id;
    public $user_id;
    public $action;
    public $object_type;
    public $object_id;
    /**
     * Normalizes an array with key-value pairs representing
     * a GP_Permission object.
     *
     * @since 1.0.0
     *
     * @param array $args Arguments for a GP_Permission object.
     * @return array Normalized arguments for a GP_Permission object.
     */
    public function normalize_fields($args)
    {
    }
    /**
     * Determines whether the current user can do $action on the instance of $object_type with id $object_id.
     *
     * Example: GP::$permission->current_user_can( 'read', 'translation-set', 11 );
     *
     * @param string $action
     * @param string $object_type
     * @param int    $object_id
     * @param mixed  $extra
     */
    public function current_user_can($action, $object_type = \null, $object_id = \null, $extra = \null)
    {
    }
    /**
     * Determines whether the user can do $action on the instance of $object_type with id $object_id.
     *
     * Example: GP::$permission->user_can( $user, 'read', 'translation-set', 11 );
     *
     * @param int|object $user
     * @param string     $action
     * @param string     $object_type
     * @param int        $object_id
     * @param mixed      $extra
     */
    public function user_can($user, $action, $object_type = \null, $object_id = \null, $extra = \null)
    {
    }
}
/**
 * Things: GP_Administrator_Permission class
 *
 * @package GlotPress
 * @subpackage Things
 * @since 2.0.0
 */
/**
 * Core class used to implement the administrator permissions.
 *
 * @since 2.0.0
 */
class GP_Administrator_Permission extends \GP_Permission
{
    var $table_basename = 'gp_permissions';
    var $field_names = array('id', 'user_id', 'action', 'object_type', 'object_id');
    var $non_db_field_names = array();
    var $non_updatable_attributes = array('id');
    /**
     * Sets restriction rules for fields.
     *
     * @since 2.0.0
     *
     * @param GP_Validation_Rules $rules The validation rules instance.
     */
    public function restrict_fields($rules)
    {
    }
}
/**
 * Things: GP_Glossary_Entry class
 *
 * @package GlotPress
 * @subpackage Things
 * @since 1.0.0
 */
/**
 * Core class used to implement the glossary entries.
 *
 * @since 1.0.0
 */
class GP_Glossary_Entry extends \GP_Thing
{
    var $table_basename = 'gp_glossary_entries';
    var $field_names = array('id', 'glossary_id', 'term', 'part_of_speech', 'comment', 'translation', 'date_modified', 'last_edited_by');
    var $int_fields = array('id', 'glossary_id', 'last_edited_by');
    var $non_updatable_attributes = array('id');
    public $parts_of_speech = array();
    public $id;
    public $glossary_id;
    public $term;
    public $part_of_speech;
    public $comment;
    public $translation;
    public $date_modified;
    public $last_edited_by;
    public function __construct($fields = array())
    {
    }
    /**
     * A determinate key for hash lookups.
     *
     * @since 2.3.0
     *
     * @return string The key
     */
    public function key()
    {
    }
    /**
     * Sets restriction rules for fields.
     *
     * @since 1.0.0
     *
     * @param GP_Validation_Rules $rules The validation rules instance.
     */
    public function restrict_fields($rules)
    {
    }
    public function by_glossary_id($glossary_id)
    {
    }
    /**
     * Retrieves the last modified date of a entry in a glossary.
     *
     * @since 1.0.0
     *
     * @param GP_Glossary $glossary The glossary to retrieve the last modified date.
     * @return string The last modified date on success, empty string on failure.
     */
    public function last_modified($glossary)
    {
    }
}
/**
 * Things: GP_Glossary class
 *
 * @package GlotPress
 * @subpackage Things
 * @since 1.0.0
 */
/**
 * Core class used to implement the glossaries.
 *
 * @since 1.0.0
 */
class GP_Glossary extends \GP_Thing
{
    var $table_basename = 'gp_glossaries';
    var $field_names = array('id', 'translation_set_id', 'description');
    var $int_fields = array('id', 'translation_set_id');
    var $non_updatable_attributes = array('id');
    public $id;
    public $translation_set_id;
    public $description;
    /**
     * Sets restriction rules for fields.
     *
     * @since 1.0.0
     *
     * @param GP_Validation_Rules $rules The validation rules instance.
     */
    public function restrict_fields($rules)
    {
    }
    /**
     * Get the path to the glossary.
     *
     * @return string
     */
    public function path()
    {
    }
    /**
     * Get the glossary by set/project.
     * If there's no glossary for this specific project, get the nearest parent glossary
     *
     * @param GP_Project         $project
     * @param GP_Translation_Set $translation_set
     *
     * @return GP_Glossary|bool
     */
    public function by_set_or_parent_project($translation_set, $project)
    {
    }
    public function by_set_id($set_id)
    {
    }
    /**
     * Merges entries of a glossary with another one.
     *
     * @since 2.3.0
     *
     * @param GP_Glossary $merge The Glossary to merge into the current one.
     * @return array Array of Glossary_Entry.
     */
    public function merge_with_glossary(\GP_Glossary $merge)
    {
    }
    /**
     * Retrieves entries and cache them.
     *
     * @since 2.3.0
     *
     * @return array Array of Glossary_Entry.
     */
    public function get_entries()
    {
    }
    /**
     * Copies glossary items from a glossary to the current one
     * This function does not merge then, just copies unconditionally. If a translation already exists, it will be duplicated.
     *
     * @param int $source_glossary_id
     *
     * @return mixed
     */
    public function copy_glossary_items_from($source_glossary_id)
    {
    }
    /**
     * Deletes a glossary and all of it's entries.
     *
     * @since 2.0.0
     *
     * @return bool
     */
    public function delete()
    {
    }
    /**
     * Get the virtual Locale Glossary project
     *
     * @since 2.3.0
     *
     * @return GP_Project The project
     */
    public function get_locale_glossary_project()
    {
    }
}
/**
 * Things: GP_Original class
 *
 * @package GlotPress
 * @subpackage Things
 * @since 1.0.0
 */
/**
 * Core class used to implement the originals.
 *
 * @since 1.0.0
 */
class GP_Original extends \GP_Thing
{
    var $table_basename = 'gp_originals';
    var $field_names = array('id', 'project_id', 'context', 'singular', 'plural', 'references', 'comment', 'status', 'priority', 'date_added');
    var $int_fields = array('id', 'project_id', 'priority');
    var $non_updatable_attributes = array('id', 'path');
    public $id;
    public $project_id;
    public $context;
    public $singular;
    public $plural;
    public $references;
    public $comment;
    public $status;
    public $priority;
    public $date_added;
    static $priorities = array('-2' => 'hidden', '-1' => 'low', '0' => 'normal', '1' => 'high');
    static $count_cache_group = 'active_originals_count_by_project_id';
    /**
     * Sets restriction rules for fields.
     *
     * @since 1.0.0
     *
     * @param GP_Validation_Rules $rules The validation rules instance.
     */
    public function restrict_fields($rules)
    {
    }
    /**
     * Normalizes an array with key-value pairs representing
     * a GP_Original object.
     *
     * @since 1.0.0
     *
     * @param array $args Arguments for a GP_Original object.
     * @return array Normalized arguments for a GP_Original object.
     */
    public function normalize_fields($args)
    {
    }
    public function by_project_id($project_id)
    {
    }
    /**
     * Retrieves the number of originals for a project.
     *
     * @since 1.0.0
     * @since 2.1.0 Added the `$type` parameter.
     *
     * @param int    $project_id The ID of a project.
     * @param string $type       The return type. 'total' for public and hidden counts, 'hidden'
     *                           for hidden count, 'public' for public count, 'all' for all three
     *                           values. Default 'total'.
     * @return object|int Object when `$type` is 'all', non-negative integer in all other cases.
     */
    public function count_by_project_id($project_id, $type = 'total')
    {
    }
    public function by_project_id_and_entry($project_id, $entry, $status = \null)
    {
    }
    public function import_for_project($project, $translations)
    {
    }
    public function set_translations_for_original_to_fuzzy($original_id)
    {
    }
    public function is_different_from($data, $original = \null)
    {
    }
    public function priority_by_name($name)
    {
    }
    public function closest_original($input, $other_strings)
    {
    }
    public function get_matching_originals_in_other_projects()
    {
    }
    /**
     * Deletes an original and all of its translations.
     *
     * @since 3.0.0
     *
     * @return bool
     */
    public function delete()
    {
    }
    // Triggers
    /**
     * Executes after creating an original.
     *
     * @since 1.0.0
     *
     * @return bool
     */
    public function after_create()
    {
    }
    /**
     * Executes after saving an original.
     *
     * @since 2.0.0
     * @since 3.0.0 Added the `$original_before` parameter.
     *
     * @param GP_Original $original_before Original before the update.
     * @return bool
     */
    public function after_save($original_before)
    {
    }
    /**
     * Executes after deleting an original.
     *
     * @since 2.0.0
     *
     * @return bool
     */
    public function after_delete()
    {
    }
}
/**
 * Things: GP_Project class
 *
 * @package GlotPress
 * @subpackage Things
 * @since 1.0.0
 */
/**
 * Core class used to implement the projects.
 *
 * @since 1.0.0
 */
class GP_Project extends \GP_Thing
{
    var $table_basename = 'gp_projects';
    var $field_names = array('id', 'name', 'slug', 'path', 'description', 'parent_project_id', 'source_url_template', 'active');
    var $int_fields = array('id', 'parent_project_id', 'active');
    var $non_updatable_attributes = array('id');
    public $id;
    public $name;
    public $slug;
    public $path;
    public $description;
    public $parent_project_id;
    public $source_url_template;
    public $active;
    public $user_source_url_template;
    /**
     * Sets restriction rules for fields.
     *
     * @since 1.0.0
     *
     * @param GP_Validation_Rules $rules The validation rules instance.
     */
    public function restrict_fields($rules)
    {
    }
    // Additional queries
    public function by_path($path)
    {
    }
    /**
     * Fetches the project by ID or object.
     *
     * @since 2.3.0
     *
     * @param int|object $thing_or_id A project or the ID.
     * @return GP_Project|false The project on success or false on failure.
     */
    public function get($thing_or_id)
    {
    }
    /**
     * Retrieves the sub projects
     *
     * @return array Array of GP_Project
     */
    public function sub_projects()
    {
    }
    public function top_level()
    {
    }
    // Triggers
    /**
     * Executes after creating a project.
     *
     * @since 1.0.0
     *
     * @return bool
     */
    public function after_create()
    {
    }
    /**
     * Executes after saving a project.
     *
     * @since 1.0.0
     * @since 3.0.0 Added the `$project_before` parameter.
     *
     * @param GP_Project $project_before Project before the update.
     * @return bool
     */
    public function after_save($project_before)
    {
    }
    /**
     * Executes after deleting a project.
     *
     * @since 2.0.0
     *
     * @return bool
     */
    public function after_delete()
    {
    }
    /**
     * Normalizes an array with key-value pairs representing
     * a GP_Project object.
     *
     * @since 1.0.0
     *
     * @param array $args Arguments for a GP_Project object.
     * @return array Normalized arguments for a GP_Project object.
     */
    public function normalize_fields($args)
    {
    }
    // Helpers
    /**
     * Updates this project's and its children's paths, according to its current slug.
     */
    public function update_path()
    {
    }
    /**
     * Regenerate the paths of all projects from its parents slugs
     */
    public function regenerate_paths($parent_project_id = \null)
    {
    }
    public function source_url($file, $line)
    {
    }
    public function source_url_template()
    {
    }
    /**
     * Gives an array of project objects starting from the current project
     * then its parent, its parent and up to the root.
     *
     * @todo Cache the results. Invalidation is tricky, because on each project update we need to invalidate the cache
     * for all of its children.
     *
     * @return array
     */
    public function path_to_root()
    {
    }
    public function set_difference_from($other_project)
    {
    }
    public function _compare_set_item($set, $this_set)
    {
    }
    public function copy_sets_and_translations_from($source_project_id)
    {
    }
    public function copy_originals_from($source_project_id)
    {
    }
    /**
     * Gives an array of project objects starting from the current project children
     * then its grand children etc.
     *
     * @return array
     */
    public function inclusive_sub_projects()
    {
    }
    public function duplicate_project_contents_from($source_project)
    {
    }
    /**
     * Deletes a project and all of sub projects, translations, translation sets, originals and glossaries.
     *
     * @since 2.0.0
     *
     * @return bool
     */
    public function delete()
    {
    }
}
/**
 * Things: GP_Translation_Set class
 *
 * @package GlotPress
 * @subpackage Things
 * @since 1.0.0
 */
/**
 * Core class used to implement the translation sets.
 *
 * @since 1.0.0
 */
class GP_Translation_Set extends \GP_Thing
{
    var $table_basename = 'gp_translation_sets';
    var $field_names = array('id', 'name', 'slug', 'project_id', 'locale');
    var $non_db_field_names = array('current_count', 'untranslated_count', 'waiting_count', 'fuzzy_count', 'all_count', 'warnings_count', 'percent_translated', 'wp_locale', 'last_modified');
    var $int_fields = array('id', 'project_id');
    var $non_updatable_attributes = array('id');
    /**
     * ID of the translation set.
     *
     * @var int
     */
    public $id;
    /**
     * Name of the translation set.
     *
     * @var string
     */
    public $name;
    /**
     * Slug of the translation set.
     *
     * @var string
     */
    public $slug;
    /**
     * Project ID of the translation set.
     *
     * @var int
     */
    public $project_id;
    /**
     * Locale of the translation set.
     *
     * @var string
     */
    public $locale;
    /**
     * GP project of the translation set.
     *
     * @var GP_Project
     */
    public $project;
    /**
     * Number of waiting translations.
     *
     * @var int
     */
    public $waiting_count;
    /**
     * Number of changed requested translations.
     *
     * @var int
     */
    public $changesrequested_count;
    /**
     * Number of fuzzy translations.
     *
     * @var int
     */
    public $fuzzy_count;
    /**
     * Number of untranslated originals.
     *
     * @var int
     */
    public $untranslated_count;
    /**
     * Number of current translations.
     *
     * @var int
     */
    public $current_count;
    /**
     * Number of translations with warnings.
     *
     * @var int
     */
    public $warnings_count;
    /**
     * Number of rejected translations.
     *
     * @var int
     */
    public $rejected_count;
    /**
     * Number of old translations.
     *
     * @var int
     */
    public $old_count;
    /**
     * Number of all originals.
     *
     * @var int
     */
    public $all_count;
    /**
     * The percent translated.
     *
     * @var int
     */
    public $percent_translated;
    /**
     * The English name of the locale.
     *
     * @var string
     */
    public $name_with_locale;
    /**
     * The WP locale.
     *
     * @var string
     */
    public $wp_locale;
    /**
     * Sets restriction rules for fields.
     *
     * @since 1.0.0
     *
     * @param GP_Validation_Rules $rules The validation rules instance.
     */
    public function restrict_fields($rules)
    {
    }
    /**
     * Normalizes an array with key-value pairs representing
     * a GP_Translation_Set object.
     *
     * @since 1.0.0
     *
     * @param array $args Arguments for a GP_Translation_Set object.
     * @return array Normalized arguments for a GP_Translation_Set object.
     */
    public function normalize_fields($args)
    {
    }
    /**
     * Returns the English name of a locale.
     *
     * If the slug of the locale is not 'default' then the name of the
     * current translation sets gets added as a suffix.
     *
     * @since 1.0.0
     *
     * @param  string $separator Separator, in case the slug is not 'default'. Default: '&rarr;'.
     * @return string The English name of a locale.
     */
    public function name_with_locale($separator = '&rarr;')
    {
    }
    public function by_project_id_slug_and_locale($project_id, $slug, $locale_slug)
    {
    }
    public function by_locale($locale_slug)
    {
    }
    public function existing_locales()
    {
    }
    public function existing_slugs()
    {
    }
    public function by_project_id($project_id)
    {
    }
    /**
     * Import translations from a Translations object.
     *
     * @param  Translations $translations   the translations to be imported to this translation-set.
     * @param  string       $desired_status 'current', 'waiting' or 'fuzzy'.
     * @return boolean or void
     */
    public function import($translations, $desired_status = 'current')
    {
    }
    /**
     * Retrieves the number of waiting translations.
     *
     * @return int Number of waiting translations.
     */
    public function waiting_count()
    {
    }
    /**
     * Retrieves the number of "changes requested" translations.
     *
     * @return int Number of "changes requested" translations.
     */
    public function changesrequested_count()
    {
    }
    /**
     * Retrieves the number of untranslated originals.
     *
     * @return int Number of untranslated originals.
     */
    public function untranslated_count()
    {
    }
    /**
     * Retrieves the number of fuzzy translations.
     *
     * @return int Number of fuzzy translations.
     */
    public function fuzzy_count()
    {
    }
    /**
     * Retrieves the number of current translations.
     *
     * @return int Number of current translations.
     */
    public function current_count()
    {
    }
    /**
     * Retrieves the number of translations with warnings.
     *
     * @return int Number of translations with warnings.
     */
    public function warnings_count()
    {
    }
    /**
     * Retrieves the number of all originals.
     *
     * @return int Number of all originals.
     */
    public function all_count()
    {
    }
    /**
     * Populates the count properties.
     */
    public function update_status_breakdown()
    {
    }
    /**
     * Copies translations from a translation set to the current one
     *
     * This function doesn't merge then, just copies unconditionally. If a translation already exists, it will be duplicated.
     * When copying translations from another project, it will search to find the original first.
     */
    public function copy_translations_from($source_translation_set_id)
    {
    }
    public function percent_translated()
    {
    }
    /**
     * Retrieves the last modified date of a translation in this translation set.
     *
     * @since 1.0.0
     *
     * @return string|false The last modified date on success, false on failure.
     */
    public function last_modified()
    {
    }
    /**
     * Deletes a translation set and all of its translations and glossaries.
     *
     * @since 2.0.0
     *
     * @return bool
     */
    public function delete()
    {
    }
    /**
     * Executes after creating a translation set.
     *
     * @since 3.0.0
     *
     * @return bool
     */
    public function after_create()
    {
    }
    /**
     * Executes after saving a translation set.
     *
     * @since 3.0.0
     *
     * @param GP_Translation_Set $translation_set_before Translation set before the update.
     * @return bool
     */
    public function after_save($translation_set_before)
    {
    }
    /**
     * Executes after deleting a translation set.
     *
     * @since 3.0.0
     *
     * @return bool
     */
    public function after_delete()
    {
    }
}
/**
 * Things: GP_Translation class
 *
 * @package GlotPress
 * @subpackage Things
 * @since 1.0.0
 */
/**
 * Core class used to implement the translations.
 *
 * @since 1.0.0
 */
class GP_Translation extends \GP_Thing
{
    /**
     * Number of translations per page.
     *
     * @var int $per_page
     */
    public $per_page = 15;
    /**
     * Name of the database table.
     *
     * @var string $table_basename
     */
    public $table_basename = 'gp_translations';
    /**
     * List of field names for a translation.
     *
     * @var array $field_names
     */
    public $field_names = array('id', 'original_id', 'translation_set_id', 'translation_0', 'translation_1', 'translation_2', 'translation_3', 'translation_4', 'translation_5', 'user_id', 'user_id_last_modified', 'status', 'date_added', 'date_modified', 'warnings');
    /**
     * List of field names which have an integer value.
     *
     * @var array $int_fields
     */
    public $int_fields = array('id', 'original_id', 'translation_set_id', 'user_id', 'user_id_last_modified');
    /**
     * List of field names which cannot be updated.
     *
     * @var array $non_updatable_attributes
     */
    public $non_updatable_attributes = array('id');
    /**
     * ID of the translation.
     *
     * @var int $id
     */
    public $id;
    /**
     * ID of the original.
     *
     * @var int $original_id
     */
    public $original_id;
    /**
     * ID of the translation set.
     *
     * @var int $translation_set_id
     */
    public $translation_set_id;
    /**
     * Translation for a singular form.
     *
     * @var string $translation_1
     */
    public $translation_0;
    /**
     * Translation for a plural form.
     *
     * @var string $translation_1
     */
    public $translation_1;
    /**
     * Translation for a second plural form.
     *
     * @var string $translation_2
     */
    public $translation_2;
    /**
     * Translation for a third plural form.
     *
     * @var string $translation_3
     */
    public $translation_3;
    /**
     * Translation for a fourth plural form.
     *
     * @var string $translation_4
     */
    public $translation_4;
    /**
     * Translation for a fifth plural form.
     *
     * @var string $translation_5
     */
    public $translation_5;
    /**
     * ID of a user who submitted the translation.
     *
     * @var int $user_id
     */
    public $user_id;
    /**
     * ID of a user (validator) who last changed the status of the translation.
     *
     * @since 2.1.0
     *
     * @var int $user_id_last_modified
     */
    public $user_id_last_modified;
    /**
     * Status of the translation.
     *
     * @var string $status
     */
    public $status;
    /**
     * Date when the translation was added.
     *
     * @var string $date_added
     */
    public $date_added;
    /**
     * Date when the translation was modified.
     *
     * @var string $date_added
     */
    public $date_modified;
    /**
     * List of warnings when translation isn't correct.
     *
     * @var array $warnings
     */
    public $warnings;
    /**
     * Number of found results.
     *
     * @var int $found_rows
     */
    public $found_rows;
    /**
     * List of valid statuses.
     *
     * @var array $statuses
     * @static
     */
    public static $statuses = array('current', 'waiting', 'rejected', 'fuzzy', 'old', 'changesrequested');
    /**
     * Number of supported translations per original.
     *
     * @var int $number_of_plural_translations
     * @static
     */
    public static $number_of_plural_translations = 6;
    public function create($args)
    {
    }
    /**
     * Normalizes an array with key-value pairs representing
     * a GP_Translation object.
     *
     * @since 1.0.0
     *
     * @param array $args Arguments for a GP_Translation object.
     * @return array Normalized arguments for a GP_Translation object.
     */
    public function normalize_fields($args)
    {
    }
    public function prepare_fields_for_save($args)
    {
    }
    /**
     * Sets restriction rules for fields.
     *
     * @since 1.0.0
     *
     * @param GP_Validation_Rules $rules The validation rules instance.
     */
    public function restrict_fields($rules)
    {
    }
    /**
     * Sets fields of the current GP_Thing object.
     *
     * @param array $fields Fields for a GP_Thing object.
     */
    public function set_fields($fields)
    {
    }
    public function for_export($project, $translation_set, $filters = \null)
    {
    }
    public function for_translation($project, $translation_set, $page, $filters = array(), $sort = array())
    {
    }
    public function set_as_current()
    {
    }
    /**
     * Sets as old the other changesrequested translations for the same original and user,
     * setting the current one as changesrequested.
     *
     * @return bool|null
     */
    public function set_as_changesrequested() : ?bool
    {
    }
    /**
     * Sets as old the other changesrequested translations for the same original and user,
     * setting the current one as waiting.
     *
     * @return bool|null
     */
    public function set_as_waiting() : ?bool
    {
    }
    public function reject()
    {
    }
    /**
     * Decides whether the status of a translation can be changed to a desired status.
     *
     * @since 2.3.0
     *
     * @param string $desired_status The desired status.
     * @return bool Whether the status can be set.
     */
    public function can_set_status($desired_status)
    {
    }
    /**
     * Changes the status of a translation if possible.
     *
     * @since 2.3.0
     *
     * @param string $status The status to be set.
     * @return bool Whether the setting of status was successful.
     */
    public function set_status($status)
    {
    }
    public function translations()
    {
    }
    /**
     * Retrieves the last modified date of a translation in a translation set.
     *
     * @since 1.0.0
     *
     * @param GP_Translation_Set $translation_set The translation set to retrieve the last modified date.
     * @return string|false The last modified date on success, false on failure.
     */
    public function last_modified($translation_set)
    {
    }
    // Triggers
    /**
     * Executes after creating a translation.
     *
     * @since 1.0.0
     *
     * @return bool
     */
    public function after_create()
    {
    }
    /**
     * Executes after saving a translation.
     *
     * @since 1.0.0
     * @since 3.0.0 Added the `$original_before` parameter.
     *
     * @param GP_Translation $translation_before Translation before the update.
     * @return bool
     */
    public function after_save($translation_before)
    {
    }
    /**
     * Executes after deleting a translation.
     *
     * @since 2.0.0
     *
     * @return bool
     */
    public function after_delete()
    {
    }
}
/**
 * Things: GP_Validator_Permission class
 *
 * @package GlotPress
 * @subpackage Things
 * @since 1.0.0
 */
/**
 * Core class used to implement the validator permissions.
 *
 * @since 1.0.0
 */
class GP_Validator_Permission extends \GP_Permission
{
    var $table_basename = 'gp_permissions';
    var $field_names = array('id', 'user_id', 'action', 'object_type', 'object_id');
    var $non_db_field_names = array('project_id', 'locale_slug', 'set_slug');
    var $non_updatable_attributes = array('id');
    public $object_type;
    public $project_id;
    public $locale_slug;
    public $set_slug;
    /**
     * Sets restriction rules for fields.
     *
     * @since 1.0.0
     *
     * @param GP_Validation_Rules $rules The validation rules instance.
     */
    public function restrict_fields($rules)
    {
    }
    /**
     * Sets fields of the current GP_Thing object.
     *
     * @param array $fields Fields for a GP_Thing object.
     */
    public function set_fields($fields)
    {
    }
    public function prepare_fields_for_save($args)
    {
    }
    public function project_id_locale_slug_set_slug($object_id)
    {
    }
    public function object_id($project_id, $locale_slug, $set_slug = 'default')
    {
    }
    public function by_project_id($project_id)
    {
    }
}
/**
 * Translation Validation API
 *
 * @package GlotPress
 * @since 1.0.0
 */
/**
 * Core class to handle validation of translations.
 *
 * Uses magic methods in the format of [field]_[rule].
 *
 * The below is a list of all magic methods called.
 * Note that once a method has been defined from one file it will not be redefine in subsequent file sections.
 *
 * From gp_includes/things/administrative-permissions.php:
 *
 *     @method bool user_id_should_not_be( string $name, array $args = null )
 *     @method bool action_should_not_be( string $name, array $args = null )
 *     @method bool object_type_should_be( string $name, array $args = null )
 *     @method bool object_id_should_be( string $name, array $args = null )
 *
 * From gp_includes/things/glossary-entry.php:
 *
 *     @method bool term_should_not_be( string $name, array $args = null )
 *     @method bool part_of_speech_should_not_be( string $name, array $args = null )
 *     @method bool glossary_id_should_be( string $name, array $args = null )
 *     @method bool last_edited_by_should_be( string $name, array $args = null )
 *
 * From gp_includes/things/original.php:
 *
 *     @method bool singular_should_not_be( string $name, array $args = null )
 *     @method bool status_should_not_be( string $name, array $args = null )
 *     @method bool project_id_should_be( string $name, array $args = null )
 *     @method bool priority_should_be( string $name, array $args = null )
 *
 * From gp_includes/things/translation.php:
 *
 *     @method bool translation_0_should_not_be( string $name, array $args = null )
 *     @method bool original_id_should_be( string $name, array $args = null )
 *     @method bool translation_set_id_should_be( string $name, array $args = null )
 *     @method bool user_id_should_be( string $name, array $args = null )
 *     @method bool user_id_last_modified_should_not_be( string $name, array $args = null )
 *
 * From gp_includes/things/glossary.php:
 *
 *     @method bool translation_set_id_should_not_be( string $name, array $args = null )
 *
 * From gp_includes/things/project.php:
 *
 *     @method bool name_should_not_be( string $name, array $args = null )
 *     @method bool slug_should_not_be( string $name, array $args = null )
 *
 * From gp_includes/things/translation-set.php:
 *
 *     @method bool locale_should_not_be( string $name, array $args = null )
 *     @method bool project_id_should_not_be( string $name, array $args = null )
 *
 * From gp_includes/things/validator-permission.php:
 *
 *     @method bool locale_slug_should_not_be( string $name, array $args = null )
 *     @method bool user_id_should_not_be( string $name, array $args = null )
 *     @method bool action_should_not_be( string $name, array $args = null )
 *     @method bool set_slug_should_not_be( string $name, array $args = null )
 */
class GP_Validation_Rules
{
    var $rules = array();
    public $errors = array();
    public $field_names;
    static $positive_suffices = array('should_be', 'should', 'can', 'can_be');
    static $negative_suffices = array('should_not_be', 'should_not', 'cant', 'cant_be');
    public function __construct($field_names)
    {
    }
    public function __call($name, $args)
    {
    }
    public function run($thing)
    {
    }
    public function run_on_single_field($field, $value)
    {
    }
    public function construct_error_message($rule)
    {
    }
}
class GP_Validators
{
    static $callbacks = array();
    public static function register($key, $callback, $negative_callback = \null)
    {
    }
    public static function unregister($key)
    {
    }
    public static function get($key)
    {
    }
}
/**
 * Translation warnings API
 *
 * @package GlotPress
 * @since 1.0.0
 */
/**
 * Class used to handle translation warnings.
 *
 * @since 1.0.0
 */
class GP_Translation_Warnings
{
    /**
     * List of callbacks.
     *
     * @since 1.0.0
     * @access public
     *
     * @var callable[]
     */
    public $callbacks = array();
    /**
     * Adds a callback for a new warning.
     *
     * @since 1.0.0
     * @access public
     *
     * @param string   $id       Unique ID of the callback.
     * @param callable $callback The callback.
     */
    public function add($id, $callback)
    {
    }
    /**
     * Removes an existing callback for a warning.
     *
     * @since 1.0.0
     * @access public
     *
     * @param string $id Unique ID of the callback.
     */
    public function remove($id)
    {
    }
    /**
     * Checks whether a callback exists for an ID.
     *
     * @since 1.0.0
     * @access public
     *
     * @param string $id Unique ID of the callback.
     * @return bool True if exists, false if not.
     */
    public function has($id)
    {
    }
    /**
     * Checks translations for any issues/warnings.
     *
     * @since 1.0.0
     * @access public
     *
     * @param string    $singular     The singular form of an original string.
     * @param string    $plural       The plural form of an original string.
     * @param string[]  $translations An array of translations for an original.
     * @param GP_Locale $locale       The locale of the translations.
     * @return array|null Null if no issues have been found, otherwise an array
     *                    with warnings.
     */
    public function check($singular, $plural, $translations, $locale)
    {
    }
}
/**
 * Class used to register built-in translation warnings.
 *
 * @since 1.0.0
 */
class GP_Builtin_Translation_Warnings
{
    /**
     * Lower bound for length checks.
     *
     * @since 1.0.0
     * @access public
     *
     * @var float
     */
    public $length_lower_bound = 0.2;
    /**
     * Upper bound for length checks.
     *
     * @since 1.0.0
     * @access public
     *
     * @var float
     */
    public $length_upper_bound = 5.0;
    /**
     * List of locales which are excluded from length checks.
     *
     * @since 1.0.0
     * @access public
     *
     * @var array
     */
    public $length_exclude_languages = array('art-xemoji', 'ja', 'ko', 'zh', 'zh-hk', 'zh-cn', 'zh-sg', 'zh-tw');
    /**
     * List of domains with allowed changes to their own subdomains
     *
     * @since 3.0.0
     * @access public
     *
     * @var array
     */
    public $allowed_domain_changes = array(
        // Allow links to wordpress.org to be changed to a subdomain.
        'wordpress.org' => '[^.]+\\.wordpress\\.org',
        // Allow links to wordpress.com to be changed to a subdomain.
        'wordpress.com' => '[^.]+\\.wordpress\\.com',
        // Allow links to gravatar.org to be changed to a subdomain.
        'en.gravatar.com' => '[^.]+\\.gravatar\\.com',
        // Allow links to wikipedia.org to be changed to a subdomain.
        'en.wikipedia.org' => '[^.]+\\.wikipedia\\.org',
    );
    /**
     * List of languages without italics
     *
     * @since 3.0.0
     * @access public
     *
     * @var array
     */
    public $languages_without_italics = array('ja', 'ko', 'zh', 'zh-hk', 'zh-cn', 'zh-sg', 'zh-tw');
    /**
     * Checks whether lengths of source and translation differ too much.
     *
     * @since 1.0.0
     * @access public
     *
     * @param string    $original    The source string.
     * @param string    $translation The translation.
     * @param GP_Locale $locale      The locale of the translation.
     * @return string|true True if check is OK, otherwise warning message.
     */
    public function warning_length($original, $translation, $locale)
    {
    }
    /**
     * Checks whether HTML tags are missing or have been added.
     *
     * @todo Validate if the HTML is in the same order in function of the language. Validate nesting of HTML is same.
     *
     * @since 1.0.0
     * @access public
     *
     * @param string    $original    The source string.
     * @param string    $translation The translation.
     * @param GP_Locale $locale      The locale of the translation.
     * @return string|true True if check is OK, otherwise warning message.
     */
    public function warning_tags($original, $translation, $locale)
    {
    }
    /**
     * Checks whether PHP placeholders are missing or have been added.
     *
     * The default regular expression:
     * bcdefgosuxEFGX are standard printf placeholders.
     * % is included to allow/expect %%.
     * l is included for wp_sprintf_l()'s custom %l format.
     * @ is included for Swift (as used for iOS mobile app) %@ string format.
     *
     * @since 1.0.0
     * @access public
     *
     * @param string    $original    The source string.
     * @param string    $translation The translation.
     * @param GP_Locale $locale      The locale of the translation.
     * @return string|true True if check is OK, otherwise warning message.
     */
    public function warning_placeholders($original, $translation, $locale)
    {
    }
    /**
     * Checks whether a translation does begin on newline.
     *
     * @since 1.0.0
     * @access public
     *
     * @param string    $original    The source string.
     * @param string    $translation The translation.
     * @param GP_Locale $locale      The locale of the translation.
     * @return string|true True if check is OK, otherwise warning message.
     */
    public function warning_should_begin_on_newline($original, $translation, $locale)
    {
    }
    /**
     * Checks whether a translation doesn't begin on newline.
     *
     * @since 1.0.0
     * @access public
     *
     * @param string    $original    The source string.
     * @param string    $translation The translation.
     * @param GP_Locale $locale      The locale of the translation.
     * @return string|true True if check is OK, otherwise warning message.
     */
    public function warning_should_not_begin_on_newline($original, $translation, $locale)
    {
    }
    /**
     * Checks whether a translation does end on newline.
     *
     * @since 1.0.0
     * @access public
     *
     * @param string    $original    The source string.
     * @param string    $translation The translation.
     * @param GP_Locale $locale      The locale of the translation.
     * @return string|true True if check is OK, otherwise warning message.
     */
    public function warning_should_end_on_newline($original, $translation, $locale)
    {
    }
    /**
     * Checks whether a translation doesn't end on newline.
     *
     * @since 1.0.0
     * @access public
     *
     * @param string    $original    The source string.
     * @param string    $translation The translation.
     * @param GP_Locale $locale      The locale of the translation.
     * @return string|true True if check is OK, otherwise warning message.
     */
    public function warning_should_not_end_on_newline($original, $translation, $locale)
    {
    }
    /**
     * Adds a warning for changing plain-text URLs.
     *
     * This allows for the scheme to change, and for some domains to change to a subdomain.
     *
     * @since 3.0.0
     * @access public
     *
     * @param string $original    The original string.
     * @param string $translation The translated string.
     * @return string|true True if check is OK, otherwise warning message.
     */
    public function warning_mismatching_urls($original, $translation)
    {
    }
    /**
     * Registers all methods starting with `warning_` as built-in warnings.
     *
     * @param GP_Translation_Warnings $translation_warnings Instance of GP_Translation_Warnings.
     */
    public function add_all($translation_warnings)
    {
    }
    /**
     * Adds a warning for changing placeholders.
     *
     * This only supports placeholders in the format of '###[A-Za-z_-]+###'.
     *
     * @todo Check that the number of each type of placeholders are the same in the original and in the translation
     *
     * @since 3.0.0
     * @access public
     *
     * @param string $original    The original string.
     * @param string $translation The translated string.
     * @return string|true
     */
    public function warning_named_placeholders(string $original, string $translation)
    {
    }
    /**
     * Adds a warning for added or removed spaces at the beginning or at the end of the translation.
     *
     * @since 4.0.0
     * @access public
     *
     * @param string $original    The original string.
     * @param string $translation The translated string.
     *
     * @return string|true True if check is OK, otherwise warning message.
     */
    public function warning_unexpected_start_end_space(string $original, string $translation)
    {
    }
    /**
     * Checks the missing uppercase in the beginning of the translations.
     *
     * @since 4.0.0
     * @access public
     *
     * @param string $original    The source string.
     * @param string $translation The translation.
     *
     * @return string|true True if check is OK, otherwise warning message.
     */
    public function warning_missing_uppercase_beginning(string $original, string $translation)
    {
    }
}
class GP_Locale
{
    public $english_name;
    public $native_name;
    public $text_direction = 'ltr';
    public $lang_code_iso_639_1 = \null;
    public $lang_code_iso_639_2 = \null;
    public $lang_code_iso_639_3 = \null;
    public $country_code;
    public $wp_locale;
    // This should only be set for locales that are officially supported on translate.wordpress.org.
    public $slug;
    public $nplurals = 2;
    public $plural_expression = 'n != 1';
    public $google_code = \null;
    public $preferred_sans_serif_font_family = \null;
    public $facebook_locale = \null;
    public $alphabet = 'latin';
    public $word_count_type = 'words';
    public function __construct($args = array())
    {
    }
    public static function __set_state($state)
    {
    }
    /**
     * Make deprecated properties checkable for backwards compatibility.
     *
     * @param string $name Property to check if set.
     * @return bool Whether the property is set.
     */
    public function __isset($name)
    {
    }
    /**
     * Make deprecated properties readable for backwards compatibility.
     *
     * @param string $name Property to get.
     * @return mixed Property.
     */
    public function __get($name)
    {
    }
    public function combined_name()
    {
    }
    public function numbers_for_index($index, $how_many = 3, $test_up_to = 1000)
    {
    }
    public function index_for_number($number)
    {
    }
    /**
     * When converting the object to a string, the combined name is returned.
     *
     * @since 3.0.0
     *
     * @return string Combined name of locale.
     */
    public function __toString()
    {
    }
}
class GP_Locales
{
    public $locales = array();
    public function __construct()
    {
    }
    public static function &instance()
    {
    }
    public static function locales()
    {
    }
    public static function exists($slug)
    {
    }
    public static function by_slug($slug)
    {
    }
    public static function by_field($field_name, $field_value)
    {
    }
}
/**
 * Plugin Name: GlotPress
 * Plugin URI: https://wordpress.org/plugins/glotpress/
 * Description: GlotPress is a tool to help translators collaborate.
 * Version: 4.0.0-beta.1
 * Requires at least: 4.6
 * Tested up to: 5.9
 * Requires PHP: 7.4
 * Author: the GlotPress team
 * Author URI: https://glotpress.blog
 * License: GPLv2 or later
 * Text Domain: glotpress
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 *
 * @package GlotPress
 */
\define('GP_VERSION', '4.0.0-beta.1');
\define('GP_DB_VERSION', '980');
\define('GP_CACHE_VERSION', '3.0');
\define('GP_ROUTING', \true);
\define('GP_PLUGIN_FILE', __FILE__);
\define('GP_PATH', __DIR__ . '/');
\define('GP_INC', 'gp-includes/');
\define('GP_WP_REQUIRED_VERSION', '4.6');
\define('GP_PHP_REQUIRED_VERSION', '7.4');
\define('GP_SCRIPT_DEBUG', \true);
/**
 * Displays an admin notice on the plugins page that GlotPress has been disabled and why..
 *
 * @param string $short_notice The message to display on the first line of the notice beside "GlotPress Disabled".
 * @param string $long_notice The message to display below the "GlotPress Disabled" line.
 *
 * @since 2.0.0
 */
function gp_display_disabled_admin_notice($short_notice, $long_notice)
{
}
/**
 * Adds a message if the required minimum PHP version is not detected.
 *
 * Message is only displayed on the plugin screen.
 *
 * @since 2.0.0
 */
function gp_unsupported_php_version_notice()
{
}
/**
 * Adds a message if an incompatible version of WordPress is running.
 *
 * Message is only displayed on the plugin screen.
 *
 * @since 1.0.0
 */
function gp_unsupported_version_admin_notice()
{
}
/**
 * Adds a message if no permalink structure is detected .
 *
 * Message is only displayed on the plugin screen.
 *
 * @since 2.0.0
 */
function gp_unsupported_permalink_structure_admin_notice()
{
}
/**
 * Perform necessary actions on activation.
 *
 * @since 1.0.0
 */
function gp_activate_plugin()
{
}
/**
 * Run the plugin de-activation code.
 *
 * @since 1.0.0
 *
 * @param bool $network_wide Whether the plugin is deactivated for all sites in the network
 *                           or just the current site.
 */
function gp_deactivate_plugin($network_wide)
{
}
/**
 * Filter for can_user, which tries if the user
 * has permissions on project parents
 */
function gp_recurse_project_permissions($verdict, $args)
{
}
function gp_recurse_validator_permission($verdict, $args)
{
}
function gp_route_translation_set_permissions_to_validator_permissions($verdict, $args)
{
}
function gp_allow_everyone_to_translate($verdict, $args)
{
}
/**
 * Maps the translation check to the translation-set.
 *
 * @since 2.3.0
 *
 * @param string|bool $verdict Previous decision whether the user can do this.
 * @param array       $args    Permission details.
 * @return string|bool New decision whether the user can do this.
 */
function gp_allow_approving_translations_with_validator_permissions($verdict, $args)
{
}
/**
 * Defines default styles and scripts.
 *
 * @package GlotPress
 * @since 1.0.0
 */
/**
 * Registers the GlotPress styles and loads the base style sheet.
 */
function gp_register_default_styles()
{
}
/**
 * Register the GlotPress scripts.
 */
function gp_register_default_scripts()
{
}
/**
 * Enqueue one or more styles.
 *
 * @since 2.2.0
 *
 * @param string|array $handles A single style handle to enqueue or an array or style handles to enqueue.
 */
function gp_enqueue_styles($handles)
{
}
/**
 * Enqueue one or more styles.
 *
 * @since 1.0.0
 *
 * @param string $handle A single style handle to enqueue.
 */
function gp_enqueue_style($handle)
{
}
/**
 * Enqueue one or more scripts.
 *
 * @since 2.2.0
 *
 * @param string|array $handles A single script handle to enqueue or an array of enqueue handles to enqueue.
 */
function gp_enqueue_scripts($handles)
{
}
/**
 * Enqueue one or more scripts.
 *
 * @since 1.0.0
 *
 * @param string $handle A single script handle to enqueue.
 */
function gp_enqueue_script($handle)
{
}
/**
 * Print the styles that have been enqueued.
 *
 * Only output the styles that GlotPress has registered, otherwise we'd be sending any style that the WordPress theme or plugins may have enqueued.
 *
 * @since 2.2.0
 */
function gp_print_styles()
{
}
/**
 * Print the scripts that have been enqueued.
 *
 * Only output the scripts that GlotPress has registered, otherwise we'd be sending any scripts that the WordPress theme or plugins may have enqueued.
 *
 * @since 2.2.0
 */
function gp_print_scripts()
{
}
function gp_cli_register()
{
}
/**
 * Install/Upgrade routines for the database.
 *
 * @package GlotPress
 * @since 1.0.0
 */
/**
 * Runs the install/upgrade of the database.
 *
 * @since 1.0.0
 */
function gp_upgrade_db()
{
}
/**
 * Updates existing data in the database during an upgrade.
 *
 * @since 1.0.0
 *
 * @param int $db_version The current version of the database before the upgrade.
 */
function gp_upgrade_data($db_version)
{
}
/**
 * Functions for retrieving and manipulating metadata of various GlotPress object types.
 *
 * @package GlotPress
 * @subpackage Meta
 */
/**
 * Sanitizes a key name to be used to store meta data in to the database.
 *
 * @since 1.0.0
 *
 * @param string $key Metadata key.
 *
 * @return string
 */
function gp_sanitize_meta_key($key)
{
}
/**
 * Retrieves and returns a meta value from the database.
 *
 * @since 1.0.0
 *
 * @param string      $object_type The object type.
 * @param int         $object_id   ID of the object metadata is for.
 * @param string|null $meta_key    Optional. Metadata key. Default null.
 *
 * @return mixed|false Metadata or false.
 */
function gp_get_meta($object_type, $object_id, $meta_key = \null)
{
}
/**
 * Adds and updates meta data in the database
 *
 * @since 1.0.0
 *
 * @param int    $object_id  ID of the object metadata is for.
 * @param string $meta_key   Metadata key.
 * @param mixed  $meta_value The value to store.
 * @param string $type       The object type.
 * @param bool   $global     Overrides the requirement of $object_id to be a number OR not empty.
 *
 * @return bool|int True if meta updated, false if there is an error and the id of the inserted row otherwise.
 */
function gp_update_meta($object_id, $meta_key, $meta_value, $type, $global = \false)
{
}
/**
 * Deletes meta data from the database.
 *
 * @since 1.0.0
 *
 * @param int    $object_id  ID of the object metadata is for.
 * @param string $meta_key   Metadata key.
 * @param mixed  $meta_value The value to store.
 * @param string $type       The object type.
 * @param bool   $global     Overrides the requirement of $object_id to be a number OR not empty.
 *
 * @return bool
 */
function gp_delete_meta($object_id, $meta_key, $meta_value, $type, $global = \false)
{
}
/**
 * Retrieves a value from $_POST.
 *
 * @param string       $key     Name of post value.
 * @param string|array $default Optional. Value to return if `$_POST[ $key ]` doesn't exist. Default empty.
 * @return string|array Value of `$_POST[ $key ]` if exists or `$default`.
 */
function gp_post($key, $default = '')
{
}
/**
 * Retrieves a value from $_GET.
 *
 * @param string       $key     Name of get value.
 * @param string|array $default Optional. Value to return if `$_GET[ $key ]` doesn't exist. Default empty.
 * @return string|array Value of `$_GET[ $key ]` if exists or `$default`.
 */
function gp_get($key, $default = '')
{
}
/**
 * Prints a nonce hidden field for route actions.
 *
 * @since 2.0.0
 *
 * @see wp_nonce_field()
 *
 * @param int|string $action Action name.
 * @param bool       $echo   Optional. Whether to display or return hidden form field. Default true.
 * @return string Nonce field HTML markup.
 */
function gp_route_nonce_field($action, $echo = \true)
{
}
/**
 * Retrieves a URL with a nonce added to URL query for route actions.
 *
 * @since 2.0.0
 *
 * @see wp_nonce_url()
 *
 * @param string     $url    URL to add nonce action.
 * @param int|string $action Action name.
 * @return string Escaped URL with nonce action added.
 */
function gp_route_nonce_url($url, $action)
{
}
/**
 * Retrieves a value from $array
 *
 * @param array  $array
 * @param string $key name of array value
 * @param mixed  $default value to return if $array[$key] doesn't exist. Default is ''
 * @return mixed $array[$key] if exists or $default
 */
function gp_array_get($array, $key, $default = '')
{
}
function gp_const_get($name, $default = '')
{
}
function gp_const_set($name, $value)
{
}
function gp_member_get($object, $key, $default = '')
{
}
/**
 * Makes from an array of arrays a flat array.
 *
 * @param array $array the arra to flatten
 * @return array flattenned array
 */
function gp_array_flatten($array)
{
}
/**
 * Passes the message set through the next redirect.
 *
 * Works best for edit requests, which want to pass error message or notice back to the listing page.
 *
 * @param string $message The message to be passed.
 * @param string $key     Optional. Key for the message. You can pass several messages under different keys.
 *                        A key has one message. The default is 'notice'.
 */
function gp_notice_set($message, $key = 'notice')
{
}
/**
 * Retrieves a notice message, set by {@link gp_notice()}
 *
 * @param string $key Optional. Message key. The default is 'notice'
 */
function gp_notice($key = 'notice')
{
}
function gp_populate_notices()
{
}
/**
 * Returns an array of arrays, where the i-th array contains the i-th element from
 * each of the argument arrays. The returned array is truncated in length to the length
 * of the shortest argument array.
 *
 * Previously this function was documented as:
 *
 *      The function works only with numerical arrays.
 *
 * However this was incorrect, this function would only return an array of arrays with
 * numeric basic indexes, but would process any array whether it was numeric or reference
 * based, using the order in which the array was created as the index value to return.
 *
 * For example:
 *
 *      $first_array[] = "First"
 *      $first_array[] = "Second"
 *      $first_array[] = "Third"
 *
 *      $second_array[0]    = "Fourth"
 *      $second_array[test] = "Fifth"
 *      $second_array[1]    = "Sixth"
 *
 *      $result = gp_array_zip( $first_array, $second_array );
 *
 * Would produce:
 *
 *      $result[0][0] = "First"
 *      $result[0][1] = "Fourth"
 *      $result[1][0] = "Second"
 *      $result[1][1] = "Fifth"
 *      $result[2][0] = "Third"
 *      $result[2][1] = "Sixth"
 *
 * Instead of either failing (which is probably what should have happened) or something like:
 *
 *      $result[0][0] = "First"
 *      $result[0][1] = "Fourth"
 *      $result[1][0] = "Second"
 *      $result[1][1] = "Sixth"
 *
 * Or some other random result.
 *
 * @param array ...$args Array arguments.
 * @return array|false Array on success, false on failure.
 */
function gp_array_zip(...$args)
{
}
function gp_array_any($callback, $array, $arg = \null)
{
}
function gp_array_all($callback, $array)
{
}
function gp_error_log_dump($value)
{
}
function gp_object_has_var($object, $var_name)
{
}
/**
 * Has this translation been updated since the passed timestamp?
 *
 * @param GP_Translation_Set $translation_set Translation to check
 * @param int                $timestamp Optional; unix timestamp to compare against. Defaults to HTTP_IF_MODIFIED_SINCE if set.
 * @return bool
 */
function gp_has_translation_been_updated($translation_set, $timestamp = 0)
{
}
/**
 * Delete translation set counts cache.
 *
 * @global bool $_wp_suspend_cache_invalidation
 *
 * @param int $id Translation set ID.
 */
function gp_clean_translation_set_cache($id)
{
}
/**
 * Delete counts cache for all translation sets of a project
 *
 * @param int $project_id project ID
 */
function gp_clean_translation_sets_cache($project_id)
{
}
/**
 * Checks if the passed value is empty.
 *
 * @param string $value The value you want to check.
 * @return bool
 */
function gp_is_empty($value)
{
}
/**
 * Checks if the passed value is an empty string.
 *
 * @param string $value The value you want to check.
 * @return bool
 */
function gp_is_empty_string($value)
{
}
/**
 * Checks if the passed value isn't an empty string.
 *
 * @param string $value The value you want to check.
 * @return bool
 */
function gp_is_not_empty_string($value)
{
}
/**
 * Checks if the passed value is a positive integer.
 *
 * @param int $value The value you want to check.
 * @return bool
 */
function gp_is_positive_int($value)
{
}
/**
 * Checks if the passed value is an integer.
 *
 * @param int|string $value The value you want to check.
 * @return bool
 */
function gp_is_int($value)
{
}
/**
 * Checks if the passed value is null.
 *
 * @param string $value The value you want to check.
 * @return bool
 */
function gp_is_null($value)
{
}
/**
 * Checks if the passed value is not null.
 *
 * @param string $value The value you want to check.
 * @return bool
 */
function gp_is_not_null($value)
{
}
/**
 * Checks if the passed value is between the start and end value or is the same.
 *
 * @param string $value The value you want to check.
 * @param string $value The lower value you want to check against.
 * @param string $value The upper value you want to check against.
 * @return bool
 */
function gp_is_between($value, $start, $end)
{
}
/**
 * Checks if the passed value is between the start and end value.
 *
 * @param string $value The value you want to check.
 * @return bool
 */
function gp_is_between_exclusive($value, $start, $end)
{
}
/**
 * Checks if the passed value is one of the values in the list.
 *
 * @since 3.0.0
 *
 * @param string $value The value you want to check.
 * @param array  $list  The list of values you want to check against.
 * @return bool
 */
function gp_is_one_of($value, $list)
{
}
/**
 * Checks if the passed value has only ASCII characters.
 *
 * @since 3.0.0
 *
 * @param string $value The value you want to check.
 * @return bool
 */
function gp_is_ascii_string($value)
{
}
/**
 * Checks if the passed value starts and ends with a word character.
 *
 * @since 3.0.0
 *
 * @param string $value The value you want to check.
 * @return bool
 */
function gp_is_starting_and_ending_with_a_word_character($value)
{
}
/**
 * Acts the same as core PHP setcookie() but its arguments are run through the gp_set_cookie filter.
 *
 * If the filter returns false, setcookie() isn't called.
 *
 * @param string $name    The name of the cookie.
 * @param mixed  ...$args Additional arguments to be passed to setcookie().
 */
function gp_set_cookie($name, ...$args)
{
}
/**
 * Converts a string represented time/date to a utime int, adding a GMT offset if not found.
 *
 * @since 1.0.0
 *
 * @param string $string The string representation of the time to convert.
 * @return int
 */
function gp_gmt_strtotime($string)
{
}
/**
 * Determines the format to use based on the selected format type or by auto detection based on the file name.
 *
 * Used during import of translations and originals.
 *
 * @param string $selected_format The format that the user selected on the import page.
 * @param string $filename The filname that was uploaded by the user.
 * @return object|null A GP_Format child object or null if not found.
 */
function gp_get_import_file_format($selected_format, $filename)
{
}
/**
 * Gets the list of format extensions prefixed with leading delimiters "." ( eg.: '.po' ).
 *
 * @since 4.0.0
 *
 * @return array   Supported format file extensions.
 */
function gp_get_format_extensions()
{
}
/**
 * Displays the GlotPress administrator option in the user profile screen for WordPress administrators.
 *
 * @since 2.0.0
 *
 * @param WP_User $user The WP_User object to display the profile for.
 */
function gp_wp_profile_options($user)
{
}
/**
 * Saves the settings for the GlotPress administrator option in the user profile screen for WordPress administrators.
 *
 * @since 2.0.0
 *
 * @param int $user_id The WordPress user id to save the setting for.
 */
function gp_wp_profile_options_update($user_id)
{
}
/**
 * Returns a multi-dimensional array with the sort by types, descriptions and SQL query for each.
 *
 * @since 2.1.0
 *
 * @return array An array of sort by field types.
 */
function gp_get_sort_by_fields()
{
}
/**
 * Sets the maximum memory limit available for translations imports.
 *
 * @since 3.0.0
 *
 * @return string The maximum memory limit.
 */
function gp_set_translations_import_max_memory_limit()
{
}
/**
 * Defines GlotPress rewrite rules and query vars.
 *
 * @package GlotPress
 * @subpackage Rewrite
 */
/**
 * Generate the WP rewrite rules.
 *
 * @since 1.0.0
 *
 * @param string|bool $gp_base Optional. The base of all GlotPress URLs.
 *                             Defaults to the `GP_URL_BASE` constant.
 * @return array Rewrite rules that transform the URL structure
 *               to a set of query vars
 */
function gp_generate_rewrite_rules($gp_base = \false)
{
}
/**
 * Add WP rewrite rules to avoid WP thinking that GP pages are 404.
 *
 * @since 1.0.0
 */
function gp_rewrite_rules()
{
}
/**
 * Query vars for GP rewrite rules
 *
 * @since 1.0.0
 */
function gp_query_vars($query_vars)
{
}
/**
 * GP run route
 *
 * @since 1.0.0
 */
function gp_run_route()
{
}
/**
 * Determine if the page requested is handled by GlotPress.
 *
 * @since 1.0.0
 *
 * @return bool Whether the request is handled by GlotPress.
 */
function is_glotpress()
{
}
/**
 * Sets `WP_Query->is_home` to false during GlotPress requests.
 *
 * @since 1.0.0
 *
 * @param WP_Query $query The WP_Query instance.
 */
function gp_set_is_home_false($query)
{
}
/**
 * Includes the database schema definitions and comments
 */
function gp_schema_get()
{
}
/**
 * Functions, which make work with strings easier
 */
function gp_startswith($haystack, $needle)
{
}
function gp_endswith($haystack, $needle)
{
}
function gp_in($needle, $haystack)
{
}
/**
 * Escaping for HTML attributes.
 *
 * Similar to esc_attr(), but double encode entities.
 *
 * @since 1.0.0
 *
 * @param string $text The text prior to being escaped.
 * @return string The text after it has been escaped.
 */
function gp_esc_attr_with_entities($text)
{
}
/**
 * Escapes translations for HTML blocks.
 *
 * Similar to esc_html(), but double encode entities.
 *
 * @since 1.0.0
 *
 * @param string $text The text prior to being escaped.
 * @return string The text after it has been escaped.
 */
function esc_translation($text)
{
}
function gp_string_similarity($str1, $str2)
{
}
/*
	PHP native implementation of levensthein is limited to 255 bytes, so let's extend that
	Source: https://github.com/wikimedia/mediawiki-extensions-Translate/blob/master/ttmserver/TTMServer.php#L90
*/
function gp_levenshtein($str1, $str2, $length1, $length2)
{
}
/**
 * Sanitizes a string for use as a slug, replacing whitespace and a few other characters with dashes.
 *
 * Limits the output to alphanumeric characters, underscore (_), periods (.) and dash (-).
 * Whitespace becomes a dash.
 *
 * @since 2.1.0
 *
 * @param string $slug The string to be sanitized for use as a slug.
 *
 * @return string The sanitized title.
 */
function gp_sanitize_slug($slug)
{
}
/**
 * Makes all key/value pairs in $vars global variables
 */
function gp_set_globals($vars)
{
}
/**
 * Initializes rewrite rules and provides the 'gp_init' action.
 *
 * @since 1.0.0
 */
function gp_init()
{
}
/**
 * Fires during the WP parse_request hook to check to see if we're on a GlotPress page, if so
 * we can abort the main WP_Query logic as we won't need it in GlotPress.
 * a matching page.
 *
 * @since 1.0.0
 */
function gp_parse_request()
{
}
/**
 * Prevents executing WP_Query's default queries on GlotPress requests.
 *
 * The following code effectively avoid running the main WP_Query queries by setting values before
 * they are run.
 *
 * @link http://wordpress.stackexchange.com/a/145386/40969 Original source.
 *
 * @since 1.0.0
 *
 * @param array    $sql  The complete SQL query.
 * @param WP_Query $wp_query The WP_Query instance (passed by reference).
 * @return string|false False if GlotPress request, SQL query if not.
 */
function gp_abort_main_wp_query($sql, \WP_Query $wp_query)
{
}
/**
 * Deletes user's permissions when they are deleted from WordPress
 * via WP's 'deleted_user' action.
 *
 * @since 1.0.0
 */
function gp_delete_user_permissions($user_id)
{
}
/**
 * Link Template Functions
 *
 * @package GlotPress
 * @subpackage Template
 */
/**
 * Creates a HTML link.
 *
 * @since 1.0.0
 *
 * @param string $url   The URL to link to.
 * @param string $text  The text to use for the link.
 * @param array  $attrs Optional. Additional attributes to use
 *                      to determine the classes for the link.
 * @return string The HTML link.
 */
function gp_link_get($url, $text, $attrs = array())
{
}
/**
 * Creates a HTML link.
 *
 * @since 1.0.0
 *
 * @see gp_link_get()
 *
 * @param string $url   The URL to link to.
 * @param string $text  The text to use for the link.
 * @param array  $attrs Optional. Additional attributes to use
 *                      to determine the classes for the link.
 */
function gp_link($url, $text, $attrs = array())
{
}
/**
 * Creates a HTML link with a confirmation request.
 *
 * Uses the `window.confirm()` method to display a modal dialog for confirmation.
 *
 * @since 1.0.0
 *
 * @param string $url   The URL to link to.
 * @param string $text  The text to use for the link.
 * @param array  $attrs Optional. Additional attributes to use
 *                      to determine the classes for the link.
 * @return string The HTML link.
 */
function gp_link_with_ays_get($url, $text, $attrs = array())
{
}
/**
 * Creates a HTML link with a confirmation request.
 *
 * Uses the `window.confirm()` method to display a modal dialog for confirmation.
 *
 * @since 1.0.0
 *
 * @see gp_link_with_ays_get()
 *
 * @param string $url   The URL to link to.
 * @param string $text  The text to use for the link.
 * @param array  $attrs Optional. Additional attributes to use
 *                      to determine the classes for the link.
 */
function gp_link_with_ays($url, $text, $attrs = array())
{
}
/**
 * Creates a HTML link to the page of a project.
 *
 * @since 1.0.0
 *
 * @param GP_Project|string $project_or_path The project to link to.
 * @param string            $text            The text to use for the link.
 * @param array             $attrs           Optional. Additional attributes to use
 *                                           to determine the classes for the link.
 * @return string The HTML link.
 */
function gp_link_project_get($project_or_path, $text, $attrs = array())
{
}
/**
 * Outputs a HTML link to the page of a project.
 *
 * @since 1.0.0
 *
 * @see gp_link_project_get()
 *
 * @param GP_Project|string $project_or_path The project to link to.
 * @param string            $text            The text to use for the link.
 * @param array             $attrs           Optional. Additional attributes to use
 *                                           to determine the classes for the link.
 */
function gp_link_project($project_or_path, $text, $attrs = array())
{
}
/**
 * Creates a HTML link to the edit page for projects.
 *
 * @since 1.0.0
 *
 * @param GP_Project $project The project to link to.
 * @param string     $text    Optional. The text to use for the link. Default 'Edit'.
 * @param array      $attrs   Optional. Additional attributes to use to determine the classes for the link.
 * @return string The HTML link.
 */
function gp_link_project_edit_get($project, $text = '', $attrs = array())
{
}
/**
 * Outputs a HTML link to the edit page for projects.
 *
 * @since 1.0.0
 *
 * @see gp_link_project_edit_get()
 *
 * @param GP_Project $project The project to link to.
 * @param string     $text    Optional. The text to use for the link. Default 'Edit'.
 * @param array      $attrs   Optional. Additional attributes to use to determine the classes for the link.
 */
function gp_link_project_edit($project, $text = '', $attrs = array())
{
}
/**
 * Creates a HTML link to the delete page for projects.
 *
 * @since 1.0.0
 *
 * @param GP_Project $project The project to link to.
 * @param string     $text    Optional. The text to use for the link. Default 'Delete'.
 * @param array      $attrs   Optional. Additional attributes to use to determine the classes for the link.
 * @return string The HTML link.
 */
function gp_link_project_delete_get($project, $text = '', $attrs = array())
{
}
/**
 * Outputs a HTML link to the delete page for projects.
 *
 * @since 1.0.0
 *
 * @see gp_link_project_delete_get()
 *
 * @param GP_Project $project The project to link to.
 * @param string     $text    Optional. The text to use for the link.
 * @param array      $attrs   Optional. Additional attributes to use to determine the classes for the link.
 */
function gp_link_project_delete($project, $text = '', $attrs = array())
{
}
/**
 * Creates a HTML link to the home page of GlotPress.
 *
 * @since 1.0.0
 *
 * @return string The HTML link.
 */
function gp_link_home_get()
{
}
/**
 * Outputs a HTML link to the home page of GlotPress.
 *
 * @since 1.0.0
 *
 * @see gp_link_home_get()
 */
function gp_link_home()
{
}
/**
 * Creates a HTML link to the delete page for translations sets.
 *
 * @since 1.0.0
 *
 * @param GP_Translation_Set $set     The translation set to link to.
 * @param GP_Project         $project The project the translation set belongs to.
 * @param string             $text    Optional. The text to use for the link. Default 'Edit'.
 * @param array              $attrs   Optional. Additional attributes to use to determine the classes for the link.
 * @return string The HTML link.
 */
function gp_link_set_edit_get($set, $project, $text = '', $attrs = array())
{
}
/**
 * Outputs a HTML link to the edit page for translations sets.
 *
 * @since 1.0.0
 *
 * @see gp_link_set_edit_get()
 *
 * @param GP_Translation_Set $set     The translation set to link to.
 * @param GP_Project         $project The project the translation set belongs to.
 * @param string             $text    Optional. The text to use for the link. Default 'Edit'.
 * @param array              $attrs   Optional. Additional attributes to use to determine the classes for the link.
 */
function gp_link_set_edit($set, $project, $text = '', $attrs = array())
{
}
/**
 * Creates a HTML link to the delete page for translations sets.
 *
 * @since 2.0.0
 *
 * @param GP_Translation_Set $set     The translation set to link to.
 * @param GP_Project         $project The project the translation set belongs to.
 * @param string             $text    Optional. The text to use for the link. Default 'Delete'.
 * @param array              $attrs   Optional. Additional attributes to use to determine the classes for the link.
 * @return string The HTML link.
 */
function gp_link_set_delete_get($set, $project, $text = '', $attrs = array())
{
}
/**
 * Outputs a HTML link to the delete page for translations sets.
 *
 * @since 2.0.0
 *
 * @see gp_link_set_delete_get()
 *
 * @param GP_Translation_Set $set     The translation set to link to.
 * @param GP_Project         $project The project the translation set belongs to.
 * @param string             $text    Optional. The text to use for the link. Default 'Delete'.
 * @param array              $attrs   Optional. Additional attributes to use to determine the classes for the link.
 */
function gp_link_set_delete($set, $project, $text = '', $attrs = array())
{
}
/**
 * Creates a HTML link to the edit page for glossaries.
 *
 * @since 1.0.0
 *
 * @param GP_Glossary        $glossary The glossary to link to.
 * @param GP_Translation_Set $set      The translation set the glossary is for.
 * @param string             $text     Optional. The text to use for the link. Default 'Edit'.
 * @param array              $attrs    Optional. Additional attributes to use to determine the classes for the link.
 * @return string The HTML link.
 */
function gp_link_glossary_edit_get($glossary, $set, $text = '', $attrs = array())
{
}
/**
 * Outputs a HTML link to the edit page for glossaries.
 *
 * @since 1.0.0
 *
 * @see gp_link_glossary_edit_get()
 *
 * @param GP_Glossary        $glossary The glossary to link to.
 * @param GP_Translation_Set $set      The translation set the glossary is for.
 * @param string             $text     Optional. The text to use for the link. Default 'Edit'.
 * @param array              $attrs    Optional. Additional attributes to use to determine the classes for the link.
 */
function gp_link_glossary_edit($glossary, $set, $text = '', $attrs = array())
{
}
/**
 * Creates a HTML link to the delete page for glossaries.
 *
 * @since 2.0.0
 *
 * @param GP_Glossary        $glossary The glossary to link to.
 * @param GP_Translation_Set $set      The translation set the glossary is for.
 * @param string             $text     Optional. The text to use for the link. Default 'Delete'.
 * @param array              $attrs    Optional. Additional attributes to use to determine the classes for the link.
 * @return string The HTML link.
 */
function gp_link_glossary_delete_get($glossary, $set, $text = '', $attrs = array())
{
}
/**
 * Outputs a HTML link to the delete page for glossaries.
 *
 * @since 2.0.0
 *
 * @see gp_link_glossary_delete_get()
 *
 * @param GP_Glossary        $glossary The glossary to link to.
 * @param GP_Translation_Set $set      The translation set the glossary is for.
 * @param string             $text     Optional. The text to use for the link. Default 'Delete'.
 * @param array              $attrs    Optional. Additional attributes to use to determine the classes for the link.
 */
function gp_link_glossary_delete($glossary, $set, $text = '', $attrs = array())
{
}
/**
 * Outputs a HTML link to a user profile page.
 *
 * @since 2.1.0
 *
 * @param WP_User $user A WP_User user object.
 */
function gp_link_user($user)
{
}
function gp_tmpl_load($template, $args = array(), $template_path = \null)
{
}
/**
 * Retrieves content of a template via output buffering.
 *
 * @since 1.0.0
 *
 * @see gp_tmpl_load()
 *
 * @param mixed ...$args Arguments to be passed to gp_tmpl_load().
 * @return string|false
 */
function gp_tmpl_get_output(...$args)
{
}
function gp_tmpl_header($args = array())
{
}
function gp_tmpl_footer($args = array())
{
}
function gp_head()
{
}
function gp_footer()
{
}
function gp_nav_menu($location = 'main')
{
}
function gp_nav_menu_items($location = 'main')
{
}
function gp_tmpl_filter_args($args)
{
}
function gp_tmpl_404($args = array())
{
}
function gp_title($title = \null)
{
}
function gp_breadcrumb($breadcrumb = \null, $args = array())
{
}
function gp_project_names_from_root($leaf_project)
{
}
function gp_project_links_from_root($leaf_project)
{
}
function gp_breadcrumb_project($project)
{
}
function gp_js_focus_on($html_id)
{
}
function gp_select($name_and_id, $options, $selected_key, $attrs = array())
{
}
function gp_radio_buttons($name, $radio_buttons, $checked_key)
{
}
function gp_pagination($page, $per_page, $objects)
{
}
function gp_html_attributes($attrs)
{
}
function gp_attrs_add_class($attrs, $class_name)
{
}
/**
 * Returns HTML markup for a select element for all locales of a project.
 *
 * @since 1.0.0
 *
 * @param int    $project_id    ID of a project.
 * @param string $name_and_id   Name and ID of the select element.
 * @param string $selected_slug Slug of the current selected locale.
 * @param array  $attrs         Extra attributes.
 *
 * @return string HTML markup for a select element.
 */
function gp_locales_by_project_dropdown($project_id, $name_and_id, $selected_slug = \null, $attrs = array())
{
}
/**
 * Returns HTML markup for a select element for all locales.
 *
 * @since 1.0.0
 *
 * @param string $name_and_id   Name and ID of the select element.
 * @param string $selected_slug Slug of the current selected locale.
 * @param array  $attrs         Extra attributes.
 *
 * @return string HTML markup for a select element.
 */
function gp_locales_dropdown($name_and_id, $selected_slug = \null, $attrs = array())
{
}
/**
 * Returns HTML markup for a select element for projects.
 *
 * @since 1.0.0
 *
 * @param string $name_and_id         Name and ID of the select element.
 * @param string $selected_project_id The project id to mark as the currently selected.
 * @param array  $attrs               Extra attributes.
 * @param array  $exclude             An array of project IDs to exclude from the list.
 * @param array  $exclude_no_parent   Exclude the "No Parent" option from the list of projects.
 *
 * @return string HTML markup for a select element.
 */
function gp_projects_dropdown($name_and_id, $selected_project_id = \null, $attrs = array(), $exclude = array(), $exclude_no_parent = \false)
{
}
function gp_array_of_things_to_json($array)
{
}
function gp_array_of_array_of_things_to_json($array)
{
}
function things_to_fields($data)
{
}
function gp_preferred_sans_serif_style_tag($locale)
{
}
function gp_html_excerpt($str, $count, $ellipsis = '&hellip;')
{
}
function gp_checked($checked)
{
}
function gp_project_actions($project, $translation_sets)
{
}
function gp_project_options_form($project)
{
}
function gp_entry_actions($seperator = ' &bull; ')
{
}
/**
 * Generates a list of classes to be added to the translation row, based on translation entry properties.
 *
 * @since 2.2.0
 *
 * @param Translation_Entry $translation The translation entry object for the row.
 *
 * @return array
 */
function gp_get_translation_row_classes($translation)
{
}
/**
 * Outputs space separated list of classes for the translation row, based on translation entry properties.
 *
 * @since 2.2.0
 *
 * @param Translation_Entry $translation The translation entry object for the row.
 *
 * @return void
 */
function gp_translation_row_classes($translation)
{
}
/**
 * Functions, which deal with URLs: manipulation, generation
 */
/**
 * Returns the path of an URL.
 *
 * @since 1.0.0
 *
 * @param string $url Optional. The URL to parse. Defaults to GlotPress URL.
 * @return string Path of the URL. Empty string if no path was parsed.
 */
function gp_url_path($url = \null)
{
}
/**
 * Joins paths, and takes care of slashes between them.
 *
 * Example: gp_url_join( '/project', array( 'wp', 'dev) ) -> '/project/wp/dev'
 *
 * The function will keep leading and trailing slashes of the whole URL, but won't
 * allow more than consecutive slash inside.
 *
 * @param mixed ...$components Arbitrary number of string or path components.
 * @return string URL, built of all the components, separated with /.
 */
function gp_url_join(...$components)
{
}
/**
 * Builds a URL relative to the GlotPress' domain root.
 *
 * @param mixed $path string path or array of path components
 * @param array $query associative array of query arguments (optional)
 */
function gp_url($path = '/', $query = \null)
{
}
function gp_url_add_path_and_query($base, $path, $query)
{
}
/**
 * Retrieves the URL for the GlotPress root page.
 *
 * @since 1.0.0
 *
 * @return string GlotPress root page URL.
 */
function gp_url_public_root()
{
}
/**
 * Constructs URL for a project and locale.
 * /<project-path>/<locale>/<path>/<page>
 */
function gp_url_project_locale($project_or_path, $locale, $path = '', $query = \null)
{
}
/**
 * Get the URL for an image file
 *
 * @param string $file Image filename
 *
 * @return string
 */
function gp_url_img($file)
{
}
/**
 * The URL of the current page
 */
function gp_url_current()
{
}
/**
 * Get the URL for a project
 *
 * A leading double-slash will avoid prepending /projects/ to the path.
 *
 * @param GP_Project|string $project_or_path Project path or object.
 * @param string|array      $path            Addition path to append to the base path.
 * @param array             $query           Optional. Associative array of query arguments.
 *
 * @return string
 */
function gp_url_project($project_or_path = '', $path = '', $query = \null)
{
}
function gp_url_profile($user_nicename = '')
{
}
function gp_url_base_path()
{
}
function gp_plugin_url($path = '')
{
}
\define('GP_LOCALES_PATH', \GP_PATH . 'locales/');
\define('DATE_MYSQL', 'Y-m-d H:i:s');
\define('GP_TESTS_PATH', \GP_PATH . 't/');
\define('GP_TMPL_PATH', \GP_PATH . 'gp-templates/');
/**
 * Filter a glossary description.
 *
 * @since 3.0.0
 *
 * @param string      $description Glossary description.
 * @param GP_Glossary $project     The current glossary.
 */
$glossary_description = \apply_filters('gp_glossary_description', $glossary->description, $glossary);
/**
 * Defines helper functions used by GlotPress.
 *
 * @package GlotPress
 * @since 1.0.0
 */
/**
 * Prepare an original string to be printed out in a translation row by adding encoding special
 * characters, adding glossary entires and other markup.
 *
 * @param string $text A single style handle to enqueue or an array or style handles to enqueue.
 *
 * @return string The prepared string for output.
 */
function prepare_original($text)
{
}
/**
 * Prepares a translation string to be printed out in a translation row by adding an 'extra' return/newline if
 * it starts with one.
 *
 * @since 3.0.0
 *
 * @param string $text A single style handle to enqueue or an array or style handles to enqueue.
 * @return string The prepared string for output.
 */
function gp_prepare_translation_textarea($text)
{
}
/**
 * Adds suffixes for use in map_glossary_entries_to_translation_originals().
 *
 * @param array $glossary_entries An array of glossary entries to sort.
 *
 * @return array The suffixed entries.
 */
function gp_glossary_add_suffixes($glossary_entries)
{
}
/**
 * Add markup to a translation original to identify the glossary terms.
 *
 * @param GP_Translation $translation            A GP Translation object.
 * @param GP_Glossary    $glossary               A GP Glossary object.
 *
 * @return obj The marked up translation entry.
 */
function map_glossary_entries_to_translation_originals($translation, $glossary)
{
}
function textareas($entry, $permissions, $index = 0)
{
}
function display_status($status)
{
}
function references($project, $entry)
{
}
/**
 * Output the bulk actions toolbar in the translations page.
 *
 * @param string $bulk_action     The URL to submit the form to.
 * @param string $can_write       Can the current user write translations to the database.
 * @param string $translation_set The current translation set.
 * @param string $location        The location of this toolbar, used to make id's unique for each instance on a page.
 */
function gp_translations_bulk_actions_toolbar($bulk_action, $can_write, $translation_set, $location = 'top')
{
}
/**
 * Determine if the current chunk should be skipped.
 *
 * @since 4.0.0
 *
 * @param string $chunk The current chunk.
 *
 * @return bool
 */
function should_skip_chunk(string $chunk)
{
}
/**
 * Filter a project description.
 *
 * @since 1.0.0
 *
 * @param string     $description Project description.
 * @param GP_Project $project     The current project.
 */
// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
$project_description = \apply_filters('gp_project_description', $project->description, $project);
/**
 * The user settings block
 *
 * A single table that contains all of the user settings, which is included as part of gp-templates/settings.php.
 *
 * @link http://glotpress.org
 *
 * @package GlotPress
 * @since 2.0.0
 */
$gp_per_page = (int) \get_user_option('gp_per_page');
/**
 * Template for the meta section of the editor row in a translation set display
 *
 * @package    GlotPress
 * @subpackage Templates
 */
$more_links = array();
/**
 * Allows to modify the more links in the translation editor.
 *
 * @since 2.3.0
 *
 * @param array $more_links The links to be output.
 * @param GP_Project $project Project object.
 * @param GP_Locale $locale Locale object.
 * @param GP_Translation_Set $translation_set Translation Set object.
 * @param GP_Translation $translation Translation object.
 */
$more_links = \apply_filters('gp_translation_row_template_more_links', $more_links, $project, $locale, $translation_set, $translation);
/**
 * Template for the editor part of a single translation row in a translation set display
 *
 * @package    GlotPress
 * @subpackage Templates
 */
/**
 * Filter to update colspan of editor. Decrease to add an extra column
 * with action 'gp_translation_row_editor_columns'.
 *
 * @since 3.0.0
 *
 * @param int $colspan The colspan of editor column.
 */
$colspan = \apply_filters('gp_translation_row_editor_colspan', $can_approve ? 5 : 4);
/**
 * Template for the preview part of a single translation row in a translation set display
 *
 * @package    GlotPress
 * @subpackage Templates
 */
$priority_char = array('-2' => array('&times;', 'transparent', '#ccc'), '-1' => array('&darr;', 'transparent', 'blue'), '0' => array('', 'transparent', 'white'), '1' => array('&uarr;', 'transparent', 'green'));
/**
 * Template for a single translation row in a translation set display
 *
 * @package GlotPress
 * @subpackage Templates
 */
$user = \wp_get_current_user();
/**
 * Check to see if a term or user login has been added to the filter or one of the other filter options, if so,
 * we don't want to match the standard filter links.
 *
 * Note: Don't check for the warnings filter here otherwise we won't be able to use this value during the check
 * to see if the warnings filter link entry is the currently selected filter.
 */
$additional_filters = \array_key_exists('term', $filters_and_sort) || \array_key_exists('user_login', $filters_and_sort) || \array_key_exists('with_comment', $filters_and_sort) || \array_key_exists('case_sensitive', $filters_and_sort) || \array_key_exists('with_plural', $filters_and_sort) || \array_key_exists('with_context', $filters_and_sort);
/**
 * Filter footer links in translations.
 *
 * @since 1.0.0
 *
 * @param array              $footer_links    Default links.
 * @param GP_Project         $project         The current project.
 * @param GP_Locale          $locale          The current locale.
 * @param GP_Translation_Set $translation_set The current translation set.
 */
$footer_links = \apply_filters('gp_translations_footer_links', $footer_links, $project, $locale, $translation_set);