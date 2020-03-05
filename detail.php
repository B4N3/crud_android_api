<?php

//Import File Koneksi Database
require_once('koneksi.php');

//Mendapatkan Nilai Dari Variable ID Pegawai yang ingin ditampilkan
$id 		= $_GET['id'];
$status 	= 500;
$msg 		= "error";
$data 		= array();

//Importing database
require_once('koneksi.php');

//Membuat SQL Query dengan pegawai yang ditentukan secara spesifik sesuai ID
$sql = "SELECT * FROM tb_pegawai WHERE id=$id";

//Mendapatkan Hasil 
$r = mysqli_query($con,$sql);

//Memasukkan Hasil Kedalam Array
if ($r->num_rows > 0) 
{
	$status = 200;
	$msg 	= "ok";

	$row = mysqli_fetch_array($r);
	array_push($data,array(
			"id"		=>$row['id'],
			"nama"		=>$row['nama'],
			"posisi"	=>$row['posisi'],
			"gaji"		=>$row['gaji']
		));
}

$result 	= array(
				"status" 	=> $status,
				"msg" 		=> $msg, 
				"data" 		=> $data,  
			);
	
echo json_encode($result);

mysqli_close($con);