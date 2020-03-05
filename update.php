<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
	//import file koneksi database 
	require_once('koneksi.php');
		
	$status 	= 500;
	$msg 		= "error";
	$data 		= array();

	//MEndapatkan Nilai Dari Variable 
	$id 		= $_POST['id'];
	$nama 		= $_POST['name'];
	$posisi 	= $_POST['position'];
	$gaji 		= $_POST['salary'];
	
	
	//Membuat SQL Query
	$sql = "UPDATE tb_pegawai SET nama = '$nama', posisi = '$posisi', gaji = '$gaji' WHERE id = $id;";
	
	//Meng-update Database 
	if(mysqli_query($con,$sql))
	{
		$status = 200;
		$msg 	= 'Berhasil Update Data Pegawai';
	}else
	{
		$msg 	= 'Gagal Update Data Pegawai';
	}

	$result 	= array(
				"status" 	=> $status,
				"msg" 		=> $msg, 
				"data" 		=> $data,  
			);
	
	echo json_encode($result);
	
	mysqli_close($con);
}