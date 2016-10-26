<?
@session_start();
//error_reporting(0);
$_GET = array_map('trim', $_GET);
$_POST = array_map('trim', $_POST);
$_COOKIE = array_map('trim', $_COOKIE);
$_REQUEST = array_map('trim', $_REQUEST);
 

if(get_magic_quotes_gpc()):
					$_GET = array_map('stripslashes', $_GET);
					$_POST = array_map('stripslashes', $_POST);
                    $_COOKIE = array_map('stripslashes', $_COOKIE);
                        $_REQUEST = array_map('stripslashes', $_REQUEST);
						  
                        endif;
                        $_GET = array_map('strip_tags', $_GET);
                        $_POST = array_map('strip_tags', $_POST);
                        $_COOKIE = array_map('strip_tags', $_COOKIE);
                        $_REQUEST = array_map('strip_tags', $_REQUEST);
$_GET = array_map('htmlspecialchars', $_GET);

$_POST = array_map('htmlspecialchars', $_POST);
$_COOKIE = array_map('htmlspecialchars', $_COOKIE);
$_REQUEST = array_map('htmlspecialchars', $_REQUEST);

foreach ($_COOKIE as $key=>$value)
{
        ${$key}=htmlspecialchars($value);
//      if( strpos( $value£¬ '\'' ) ) exit ( "$value is an invalid value for variety!" ); 
}


foreach ($_GET as $key=>$value)
{
        ${$key}=htmlspecialchars($value);
//      if( strpos( $value£¬ '\'' ) ) exit( "$value is an invalid value for variety!" ); 

}
foreach ($_POST as $key=>$value)
{
        ${$key}=htmlspecialchars($value);
//      if( strpos( $value£¬ '\'' ) ) exit( "$value is an invalid value for variety!" ); 
}

foreach ($_REQUEST as $key=>$value)
{
        ${$key}=htmlspecialchars($value);
//      if( strpos( $value£¬ '\'' ) ) exit( "$value is an invalid value for variety!" ); 
}
foreach ($_SESSION as $key=>$value)
{
        ${$key}=$value;
		 
}

$global_vars = array(

"DB_HOST"               =>      "localhost",
"DB_NAME"               =>      "project",
"DB_USER"               =>      "root",
"DB_PWD"                =>      "root",
); 
/* 

  $GLOBALS['config']['db']['db_host'] = '211.139.123.184';
        $GLOBALS['config']['db']['db_port'] = '23306';
//      $GLOBALS['config']['db']['db_host'] = '211.139.127.70';
        $GLOBALS['config']['db']['db_user'] = 'pp3';
        $GLOBALS['config']['db']['db_password'] = 'ppdontsay';
        $GLOBALS['config']['db']['db_name'] = 'pp';
);
*/
// Globalize everything for later use
while (list($key, $value) = each($global_vars)) {
  define($key, $value);
} 
 
function fix_session_register(){ 
    function session_register(){ 
        $args = func_get_args(); 
        foreach ($args as $key){ 
            $_SESSION[$key]=$GLOBALS[$key]; 
        } 
    } 
    function session_is_registered($key){ 
        return isset($_SESSION[$key]); 
    } 
    function session_unregister($key){ 
        unset($_SESSION[$key]); 
    } 
} 
if (!function_exists('session_register')) fix_session_register(); 



?>
