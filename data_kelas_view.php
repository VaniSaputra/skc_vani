<?php
include "lib/config.php";
include "modul/enkripsi/function.php";
//kolom apa saja yang akan ditampilkan
$columns = array(
	'id_kelas',
	'isi'
	);

//lakukan query data dari 3 table dengan inner join
	$query = $datatable->get_custom("SELECT * FROM kelas_all",$columns);

	//buat inisialisasi array data
	$data = array();

	foreach ($query	as $value) {

	//array sementara data
	$ResultData = array();
	//masukan data ke array sesuai kolom table
	$ResultData[] = $value->id_kelas;
	$ResultData[] = $value->isi;

	//bisa juga pake logic misal jika value tertentu maka outputnya

	//kita bisa buat tombol untuk keperluan edit, delete, dll, 
	$edit = paramEncrypt("uri=kelas/kelas_edit&id_kelas=".$value->id_kelas);
	$del = paramEncrypt("uri=kelas/kelas_delete&id_kelas=".$value->id_kelas);
	$crud_uri = array(
						"edit" 		=> $edit,
						"delete"	=> $del,
						"del_msg"	=> "confirm return('Hapus Data ".$value->isi."? ')"

					);
	$ResultData[] = "
		<a title='Ubah Data' href='./?".$crud_uri[edit]."' class='link'><span class='glyphicon glyphicon-pencil btn btn-xs btn-default'></span></a>
		<a title='Hapus Data' onClick='".$crud_uri[del_msg]."' href='./?".$crud_uri[delete]."' class='link'><span class='glyphicon glyphicon-trash btn btn-xs btn-danger'></span></a>
	";

	//memasukan array ke variable $data

	$data[] = $ResultData;
}

//set data
$datatable->set_data($data);
//create our json
$datatable->create_data();
