<?php
include "lib/config.php";
include "modul/enkripsi/function.php";
//kolom apa saja yang akan ditampilkan
$columns = array(
	'isi_kelas',
	'Jumlah', // Ini yang bikin ngebug, harus nama tabel yang sesuai di DB ga boleh AS

	);

//lakukan query data dari 3 table dengan inner join
	$query = $datatable->get_custom("SELECT kelas_all.*, COUNT(peserta.nama) AS Jumlah 
									FROM kelas_all INNER JOIN peserta 
									ON kelas_all.id_kelas=peserta.id_kelas 									 
									GROUP BY isi_kelas",$columns); // Kalo dikasih GROUP BY, Lag
									// WHERE kelas_all.isi LIKE 'Kumite%'

	//buat inisialisasi array data
	$data = array();

	foreach ($query	as $value) {

	//array sementara data
	$ResultData = array();
	//masukan data ke array sesuai kolom table
	$ResultData[] = $value->isi_kelas;
	$ResultData[] = $value->Jumlah;

	//bisa juga pake logic misal jika value tertentu maka outputnya

	//kita bisa buat tombol untuk keperluan edit, delete, dll, 
	$view = paramEncrypt("uri=drowing/drowing_view&id_kelas=".$value->id_kelas);
	$crud_uri = array(
						"view" 		=> $view						
					);
	$ResultData[] = "
		<span class='hide-print'>
		<a title='Lihat Drowing' href='./?".$crud_uri[view]."' class=' btn btn-xs btn-success'><span class='glyphicon glyphicon-th-list'></span> Lihat Drowing</a>
		</span>
	";
	//memasukan array ke variable $data

	$data[] = $ResultData;
}

//set data
$datatable->set_data($data);
//create our json
$datatable->create_data();
