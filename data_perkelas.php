<?php
include "lib/config.php";
//kolom apa saja yang akan ditampilkan
$columns = array(
	'Kelas',
	'Jumlah',
	'Opsi'
	);

//lakukan query data dari 3 table dengan inner join
	$query = $datatable->get_custom("SELECT Kelas FROM drowing_simple GROUP BY Kelas",$columns);

	//buat inisialisasi array data
	$data = array();

	foreach ($query	as $value) {

	//array sementara data
	$ResultData = array();
	//masukan data ke array sesuai kolom table
	$ResultData[] = $value->Kelas;
	$ResultData[] = $value->Jumlah;

	//bisa juga pake logic misal jika value tertentu maka outputnya

	//kita bisa buat tombol untuk keperluan edit, delete, dll, 
	$ResultData[] = "
		<a data-toggle='tooltip' data-placement='top' title='Detail Data' href='url_edit/".$value->Kelas." class='link'><span class='glyphicon glyphicon-list-alt btn btn-xs btn-success'></span></a>
	";

	//memasukan array ke variable $data

	$data[] = $ResultData;
}

//set data
$datatable->set_data($data);
//create our json
$datatable->create_data();
