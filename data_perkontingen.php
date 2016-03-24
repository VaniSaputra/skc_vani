<?php
include "lib/config.php";
//kolom apa saja yang akan ditampilkan
$columns = array(
	'isi_kontingen',
	'jumlah', // Ini yang bikin ngebug, harus nama tabel yang sesuai di DB ga boleh AS
	);

//lakukan query data dari 3 table dengan inner join
	$query = $datatable->get_custom("SELECT kontingen_all.isi_kontingen, COUNT(peserta.id_peserta) AS jumlah FROM peserta 
									INNER JOIN kontingen_all
									ON peserta.id_kontingen=kontingen_all.id_kontingen
									GROUP BY peserta.id_kontingen",$columns); // Kalo dikasih GROUP BY, Lag

	//buat inisialisasi array data
	$data = array();

	foreach ($query	as $value) {

	//array sementara data
	$ResultData = array();
	//masukan data ke array sesuai kolom table
	$ResultData[] = $value->isi_kontingen;
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
