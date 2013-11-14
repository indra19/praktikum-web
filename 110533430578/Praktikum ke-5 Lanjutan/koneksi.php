<?php 
$host="localhost";
$user="root";
$pass="123456";
$db="test";

$cnn=mysql_connect($host, $user, $pass);
	if (!$cnn) {
		exit("Koneksi Gagal");
	}
	$select_db=mysql_select_db($db);
	if(!$select_db)
	{
		exit("Gagal memilih database ".$db);
	}

 ?>