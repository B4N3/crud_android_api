<?php
//Import File Koneksi database
require_once('koneksi.php');

if($_SERVER['REQUEST_METHOD']=='POST')
{		
	// set default 
	$status = 500;
	$msg 	= "error";
	$data 	= array();

	//Mendapatkan Nilai Variable
	$nama 	= $_POST['nama'];
	$posisi = $_POST['posisi'];
	$gaji 	= $_POST['gaji'];
	
	//Pembuatan Syntax SQL
	$sql = "INSERT INTO tb_pegawai (nama, posisi, gaji) VALUES ('$nama','$posisi','$gaji')";
	
	//Eksekusi Query database
	if(mysqli_query($con,$sql))
	{
		$status = 200;
		$msg 	= "Berhasil Menambahkan Pegawai";
	}
	else
	{
		$msg 	= "Gagal Menambahkan Pegawai";
	}

	$result 	= array(
				"status" 	=> $status,
				"msg" 		=> $msg, 
				"data" 		=> $data,  
			);
	
	echo json_encode($result);
	
	mysqli_close($con);
}
