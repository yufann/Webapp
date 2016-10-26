<?

include("config/config.php");
include("config/dsql.php");
header("Content-type: text/html; charset=utf-8");
$dsql = new DSQL();
//echo $passwd;
 
$SQL = "select * from user where nickname='$nickname' and  passwd= md5('$password')   ";
$dsql->query($SQL);

if($dsql->next_record()){
	session_start();
	if(!session_is_registered('auth')) {session_register('auth');}
	if(!session_is_registered('auth_nickname')) {session_register('auth_nickname');}
    if(!session_is_registered('auth_username')){session_register('auth_username');}
	if(!session_is_registered('auth_id')){session_register('auth_id');}
	if(!session_is_registered('auth_pid')){session_register('auth_pid');}
	if(!session_is_registered('auth_area')){session_register('auth_area');}
	if(!session_is_registered('auth_feeuserid')){session_register('auth_feeuserid');}
	$auth_nickname = $nickname;
	$auth='login';
	    $auth_username= $dsql->f('name');
        $auth_id = $dsql->f('id');
		$auth_pid=$dsql->f('usertype');

		$auth_nickname=$dsql->f('nickname');

		$_SESSION['auth_nickname'] = $auth_nickname;
		$_SESSION['auth'] = $auth;

        if($username=="admin"){		$auth='admin';}

		 
		$_SESSION['auth'] = $auth;
		$_SESSION['auth_area'] = $auth_area;

		if($auth_pid==2){
			Header('Location:index.php');

		}else{
			Header('Location:index.php');
		}
}else{
	$auth = false;
	fallLogin();
}

function go(){
 	Header('Location:index.php');
}

function fallLogin(){
	die('对不起,您的输入有误!!!');
}
  exit;
?>
