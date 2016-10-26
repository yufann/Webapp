<?


session_start();
if(!$auth) loginFalse();

function loginFalse() {
	Header("Location:index.php");
}

session_destroy();
loginFalse();

?>