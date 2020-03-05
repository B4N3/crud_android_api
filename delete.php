<?php

//Mendapatkan Nilai ID
$id = $_GET['id'];
$status 	= 500;
$msg 		= "error";
$data 		= array();

//Import File Koneksi Database
require_once('koneksi.php');

//Membuat SQL Query
$sql = "DELETE FROM tb_pegawai WHERE id=$id;";


//Menghapus Nilai pada Database 
if(mysqli_query($con,$sql))
{
	$status = 200;
	$msg 	= 'Berhasil Menghapus Pegawai';
}else
{
	$msg 	= 'Gagal Menghapus Pegawai';
}

$result 	= array(
				"status" 	=> $status,
				"msg" 		=> $msg, 
				"data" 		=> $data,  
			);
	
echo json_encode($result);

mysqli_close($con);
 