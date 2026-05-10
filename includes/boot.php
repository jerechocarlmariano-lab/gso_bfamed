<?php 
session_start();
date_default_timezone_set("Asia/Manila");
$dateNow = date('Y-m-d H:i:s');
$key = bin2hex(random_bytes(64));
$token = hash_hmac('sha256','This is for private page', $key);

require('staticDir.php');

$pdo = null;
if(!defined('DB_HOST')){
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'gso_bfamed');
define('APP_ROOT', 'http://localhost/gso_bfamed');
// define('APP_ROOT', 'http://192.168.200.5/gsomasterlisting');
}
try {
	$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo 'Connection Failed: ' . $e->getMessage();
	die();
}

$username = '';
$login = '';
if(empty($_SESSION['username']) && !defined('IS_ACCESSIBLE')){
	$login ='0';
	header("location:logout.php");
}else{
	$username = $_SESSION['username'] ?? '';
	$login = $_SESSION['login'] ?? '';
	$role = $_SESSION['role'] ?? '';
	
}

if($login == '1'){
	$_SESSION['login'] = '2';
}else{

}

?>