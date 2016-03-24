<?php
	// generateRandomString
	function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	$data_peserta 	= [];
	$id_dan_data 	= [];
	$id_kelas_get 	= 6;
	$jml_peserta 	= rand(1,100);
	// echo "Angka Random: ".$rand_num;

	// Membuat ID dan // Membuat Nama dan Kontingen Tiap ID
	for($i=1; $i<=$jml_peserta; $i++){
		$data_peserta['nama'] = generateRandomString(7);
		$data_peserta['kontingen'] = generateRandomString(15);		
		$data_peserta['id_peserta'] = $i;
	    $id_dan_data[$i] = $data_peserta;
	}
	
	// Acak isi array
	shuffle($id_dan_data);
	echo "<br> --- Kode Lain ---- <br>";

	$max_perpool	= 16;
	$bagi			= $jml_peserta / $max_perpool;
	$modulus 		= $jml_peserta % $max_perpool;
	$jml_pool 		= 0;

		// for($i=1; $i <= 5; $i++) {
	 //    ${'file' . $i} = $i;

	// Stored Array = array(pool_no => array(id_peserta,nama, kontingen));

	//Array yang akan masuk ke database
	$arr_inp	= []; 

	$pool_name  = [0,'A','B','C','D','E','F','G','H','I','J'];
	// foreach ($drowing_ar as $id_kelas => $pool_no) {
		
	// }
	if($bagi < 1){
		$jml_pool			= 1;
		$pool_no 			= 1;	

		$pre_data_peserta	= [];	
		$pre_data_peserta 	= $id_dan_data;

		$pre_pool_no 							= [];
		$pre_pool_no[$pool_name[$pool_no]] 		= $pre_data_peserta;

		$arr_inp = serialize($pre_pool_no);

		echo $arr_inp;

		echo "<br> --- Kode Lain ---- <br>";

		//Keluarkan Datanya
		$decode_arr = unserialize($arr_inp);
		echo "<br><br>Jumlah Peserta: ".$jml_peserta."<br>";
		echo "<br><br>Jumlah Pool: ".$jml_pool."<br>";
		foreach ($decode_arr as $pool_name => $data_peserta) {
			echo "Pool : ".$pool_name."<br>";
			echo "Data Peserta : <br>";
			foreach ($data_peserta as $key => $value) {
				echo $value['id_peserta']."- ".$value['nama']."- ".$value['kontingen']."<br>";
			} // Close foreach 2
		} // Close foreach 1
	} // Close if
	else {		
		$jml_pool 	= ceil($bagi);					  // Bulatkan kebawah - Jumlah Pool 
		$tiap_pool	= ceil($jml_peserta / $jml_pool); // Bulatkan kebawah - Banyak Peserta tiap pool
		$opo 		= $jml_pool * $tiap_pool;         // Total Maksimal Peserta yang ditampung di semua pool
		echo "Jml Peserta => Jml Pool => Peserta/pool => Max All Pool <br>";
		echo $jml_peserta." => ".$jml_pool." => ".$tiap_pool." => ".$opo." <br><br>";
		for($i=0; $i<$jml_pool; $i++)
		{
			${pool_no.$i} 			= $i+1;

			${pre_data_peserta.$i}	= [];	

			// Masukkan data ke array ini, ketika sudah max dari hasil bagi dua maka masukkan ke variable selanjutnya
			${pre_data_peserta.$i}	= $id_dan_data;

			$pre_pool_no 							= [];
			$pre_pool_no[$pool_name[$pool_no]] 		= $pre_data_peserta;

			$arr_inp = serialize($pre_pool_no);
		} // Close for



	}
?>

