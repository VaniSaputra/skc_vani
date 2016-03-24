<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
ini_set( "display_errors", true );
define( "DB_DSN", "mysql:host=localhost;dbname=skc_solocup" );
define( "DB_USERNAME", "root" );
define( "DB_PASSWORD", "" );
define('DB_CHARACSET', 'utf8');

require_once ('lib/Database.php');
require_once ('lib/Dtable.php');

$db=new Database();
$datatable=New Dtable();

if(!function_exists('handleException'))
{
	function handleException( $exception ) {
	  echo  $exception->getMessage();
	}
}

set_exception_handler( 'handleException' );
?>
