<?php 
define('IS_ACCESSIBLE', true);
require ('includes/boot.php');

$username = strtolower($_POST['user']);
$password = $_POST['pass'];
$result = "";
if (!isset($_SESSION['attempt'])) {
    $_SESSION['attempt'] = 0;
}
if(empty($username) && empty($password)){
	$result = array("result" => "empty");
}else{
$selectAccount = $pdo->query("SELECT password, role, id FROM access WHERE LOWER(username)='$username' AND is_active = 1 ");
$count = $selectAccount->rowCount();
if($count == 1){
	$res = $selectAccount->fetch();
	$hpass = $res['password'];
	$role = $res['role'];
	if(password_verify($password, $hpass)){
		$_SESSION['username'] = $username;
		$_SESSION['role'] = $role;
		$result = array("result" => "success", "role" => $role);
	}else{
		$_SESSION['attempt'] += 1;
		$result = array("result" => "error");
	}
}else{
	$result = array("result" => "account not exist");
}

}
header('Content-Type: application/json; charset=utf-8');
echo json_encode($result);

?>