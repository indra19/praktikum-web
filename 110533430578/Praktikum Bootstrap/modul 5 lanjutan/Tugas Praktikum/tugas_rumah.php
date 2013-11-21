<html>
<head>
<title>Tugas Rumah: Sorting Data --> ascending dan descending</title>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
    
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #F5F5F5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
    </style>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
<body>
<table class="table">
<?php 
require_once("koneksi.php");

/*
1. 
*/

$sql="select * from mahasiswa";
// $sort_type=isset($_GET['sort'])?$_GET['sort']:"asc";
if (isset($_GET['type'])&&$_GET['type']=="nama") {
	$type="nama";
}
else
{
	$type="alamat";
}
if (!isset($_GET['sort'])||(isset($_GET['sort'])&&$_GET['sort']=="asc")) {
	$sort_type="asc";
}
elseif (isset($_GET['sort'])&&$_GET['sort']=="desc")
{
	$sort_type="desc";
}
	if($type=="nama"){
	if (isset($_GET['sort']) && $_GET['sort']=='asc') {
			$sort_type="desc";
		}
		else if (isset($_GET['sort']) && $_GET['sort']=='desc') {
			$sort_type="asc";
		}
	}
	else{
		if (isset($_GET['sort']) && $_GET['sort']=='asc') {
			$sort_type="desc";
		}
		else if (isset($_GET['sort']) && $_GET['sort']=='desc') {
			$sort_type="asc";
		}
	}

	$type=isset($_GET['type'])?$_GET['type']:"nama";

	$sql.=" order by ".$type." ".$sort_type." ";
	echo $sql;
$res=mysql_query($sql);
if ($res) {
	if (mysql_num_rows($res)) {
		
		?>

	<table border=1 cellpadding=5 cellspacing=1>
		<tr><th>#</th>
			<th width=100>NIM</th>
			<th width=150><a href="?type=nama&sort=<?php echo $sort_type; ?>">Nama</a></th>
			<th><a href="?type=alamat&sort=<?php echo $sort_type; ?>" >Alamat</a></th>
		</tr>
		<?php


		$i=1;
		while($row=mysql_fetch_row($res)){
			?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $row[0]; ?></td>
				<td><?php echo $row[1]; ?></td>
				<td><?php echo $row[2]; ?></td>
			</tr>
			<?php
			$i++;
		}
		?>
	</table>
	<?php
	}else
	{
		echo "data tidak ditemukan";
	}
	mysql_close();
}
 ?>
</body>
</html>