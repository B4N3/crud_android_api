<?php

//Import File Koneksi Database
require_once('koneksi.php');
$status 	= 500;
$msg 		= "error";
$data 		= array();

//Membuat SQL Query
$sql = "SELECT * FROM tb_pegawai ORDER BY id DESC";

//Mendapatkan Hasil
$r = mysqli_query($con,$sql);


if ($r->num_rows > 0) 
{
	$status 	= 200;
	$msg 		= "ok";

	while($row = mysqli_fetch_array($r))
	{
		//Memasukkan Nama dan ID kedalam Array Kosong yang telah dibuat 
		array_push($data,array(
			"id"		=> $row['id'],
			"nama"		=> $row['nama'], 
			"posisi" 	=> $row['posisi'], 
			"gaji" 		=> $row['gaji']
		));
	}
}

//Menampilkan Array dalam Format JSON
$result 	= array(
				"status" 	=> $status,
				"msg" 		=> $msg, 
				"data" 		=> $data,  
			);
	
echo json_encode($result);

mysqli_close($con);