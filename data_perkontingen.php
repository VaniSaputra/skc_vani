<?php
include "lib/config.php";
//kolom apa saja yang akan ditampilkan
$columns = array(
	'Kontingen',
	'Jumlah', // Ini yang bikin ngebug, harus nama tabel yang sesuai di DB ga boleh AS
	);

//lakukan query data dari 3 table dengan inner join
	$query = $datatable->get_custom("SELECT kontingen, COUNT(*) AS jumlah FROM peserta GROUP BY kontingen",$columns); // Kalo dikasih GROUP BY, Lag

	//buat inisialisasi array data
	$data = array();

	foreach ($query	as $value) {

	//array sementara data
	$ResultData = array();
	//masukan data ke array sesuai kolom table
	$ResultData[] = $value->kontingen;
	$ResultData[] = $value->jumlah;

	//bisa juga pake logic misal jika value tertentu maka outputnya

	//kita bisa buat tombol untuk keperluan edit, delete, dll, 

	//memasukan array ke variable $data

	$data[] = $ResultData;
}

//set data
$datatable->set_data($data);
//create our json
$datatable->create_data();
