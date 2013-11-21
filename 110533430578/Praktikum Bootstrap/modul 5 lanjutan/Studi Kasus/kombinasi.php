<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title> Tugas Studi Kasus:Limitasi Data dan Paging</title>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
     <link href="assets/css/css-inti.css" rel="stylesheet" media="screen">
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
</head>

<body>
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
		<?php $jum=(isset($_POST['jum'])?$_POST['jum']: 1) ; ?>
		Tampilkan sebanyak : 	<select name="jum">
									<option value="1" <?php echo $jum==1?"selected": ''; ?>>1</option>
									<option value="2" <?php echo $jum==2?"selected": ''; ?>>2</option>
									<option value="5" <?php echo $jum==5?"selected": ''; ?>>5</option>
									<option value="10" <?php echo $jum==10?"selected": ''; ?>>10</option>
									<option value="15" <?php echo $jum==15?"selected": ''; ?>>15</option>
								</select>
		<input type="submit" value="Tampilkan" />
	</form>
<?php 


	require_once("koneksi.php");

$sql="select * from mahasiswa";
$self=$_SERVER['PHP_SELF'];
$page=isset($_GET['page'])?$_GET['page']:0;

// Jumlah Link
$link_num=5;
// record num
$record_num=$jum;

// Item pertama yang ditampilkan
$offset=$page?($page-1)*$record_num:0;

$total_row=mysql_num_rows(mysql_query($sql));
$query=$sql." LIMIT ". $offset.",".$record_num;

$result=mysql_query($query);
$max_page=ceil($total_row/$record_num);

if ($page>$max_page || $page<=0) {
	$page=1;
}


// generate paging
$paging="";
if ($max_page>1) {

	if ($page>1) {
		$paging.="<a href='".$self."?page=".($page-1)."'>prev</a> ";
	}
	else{
		$paging.="prev ";
	}

		for ($counter=1; $counter <=$max_page ; $counter+=$link_num) { 
			if ($page>=$counter) {
				$start=$counter;
			}
		}

	if ($max_page>$link_num) {
		$end=$start+$link_num;
		if ($end>$max_page) {
			$end=$max_page+1;
		}
	
	}
	else{
		$end=$max_page;
	}

		for ($counter=$start; $counter < $end; $counter++) { 
			if ($counter==$page) {
				$paging.=$counter;
			}
			else{
				$paging.=" <a href='".$self."?page=".$counter."'>".$counter."</a> ";
			}
		}

	if ($page<$max_page) {
		$paging.=" <a href='".$self."?page=".($page+1)."'>Next</a>";
	}
	else{
		$paging.=" Next";
	}

}


 ?>

 <table border="1">
<thead>
	<tr>
		<td>No.</td>
		<td>NIM</td>
		<td>Nama</td>
		<td>Alamat</td>
	</tr>
</thead>
<tbody>
	<?php 
	$i=1;
	while ($data=mysql_fetch_row($result)) {
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $data[0]; ?></td>
			<td><?php echo $data[1]; ?></td>
			<td><?php echo $data[2]; ?></td>
		</tr>

		<?php
		$i++;
	}

	 ?>
	 <tr>
	 	<td colspan="4"><?php echo $paging; ?></td>
	 </tr>
</tbody>
</table>
</body>
</html>