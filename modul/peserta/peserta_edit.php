<?php
//$uriget in index.php
include "lib/config.php";

$id = $uriget[id_peserta];
$peserta = new Database;

$table 	= "peserta";
$col	= "id_peserta";
$val	= $id;
$q 	    = $peserta->fetch_single_row($table,$col,$val);

  $Nama			      = $q->nama;
  $Kontingen		  = $q->kontingen;
  $Tanggal_Lahir	= $q->tgl_lahir;
  $Waktu_Input    = $q->waktu_input;
  $Perguruan		  = $q->perguruan;
  $Berat_Badan	  = $q->berat_badan;
  $JK             = $q->jk;

  // Konversi id_kelas > isi dansebaliknya
  $kelas_id_conv    = array();
  $kelas_id         = $db->fetch_all("kelas_all");
  foreach($kelas_id as $val){
    // Buat Array dengan id=isi kelas dan value id kelas, untuk konversi saat POST
    $kelas_id_conv[$val->isi] = $val->id_kelas;

    // Buat Array dengan id=idkelas kelas dan value isi, untuk konversi saat POST
    $kelas_val_conv[$val->id_kelas] = $val->isi;
  }
  // -- END KONVERSI

  //Tampilkan kelas
  $Kelas          = $kelas_val_conv[$q->id_kelas];
?>

<div class="container">
    <!-- Heading Row -->
    <div class="row row-centered">
        <h1> <span class="label label-primary">Edit Data Peserta</span></span>  </a><br> <small>Solocup 2016 Database</small> <br></h1>
    </div>
</div>

<form class="form-horizontal" role="form" method="post" action="#">
  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="id_p">ID Peserta / Waktu Input</label>  
    <div class="col-md-6">
    <input id="id_p" name="id_p" type="text" class="form-control input-md" readonly="" value="<?php echo $id; ?> / <?php echo $Waktu_Input; ?>">      
    </div>
  </div>  

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="kontingen_pilih">Kontingen</label>  
    <div class="col-md-6">
    <input id="kontingen_pilih" name="kontingen" type="text" placeholder="Data Tersimpan: <?php echo $Kontingen; ?>" class="form-control input-md" required="" value="<?php echo $Kontingen; ?>">
      
    </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="nama">Nama Peserta</label>  
    <div class="col-md-6">
    <input id="nama" name="nama" type="text" placeholder="Data Tersimpan: <?php echo $Nama; ?>" class="form-control input-md" required="" value="<?php echo $Nama; ?>">
      
    </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="tgl_lahir">Tanggal Lahir</label>  
    <div class="col-md-6">
    <input id="tgl_lahir" name="tgl_lahir" type="text" placeholder="Data Tersimpan: <?php echo $Tanggal_Lahir; ?>" class="form-control input-md" required="" value="<?php echo $Tanggal_Lahir; ?>">
    <span class="help-block">Isi sesuai format</span>  
    </div>
  </div>

  <!-- Appended Input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="berat">Berat Badan</label>
    <div class="col-md-2">
      <div class="input-group">
        <input id="berat" name="berat" class="form-control" placeholder="Data Tersimpan: <?php echo $Berat_Badan; ?>" type="text" required="" value="<?php echo $Berat_Badan; ?>">
        <span class="input-group-addon">Kg</span>
      </div>
      
    </div>
  </div>
  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="perguruan">Asal Perguruan</label>  
    <div class="col-md-6">
    <input id="perguruan" name="perguruan" type="text" placeholder="Data Tersimpan: <?php echo $Perguruan; ?>" class="form-control input-md" required="" value="<?php echo $Perguruan; ?>">
      
    </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="kelas_pilih">Kelas yang diikuti</label>  
    <div class="col-md-6">
    <input id="kelas_pilih" name="kelas_pilih" type="text" placeholder="Data Tersimpan: <?php echo $Kelas; ?>" class="form-control input-md" required="" value="<?php echo $Kelas; ?>">
      
    </div>
  </div>

  <!-- Multiple Radios (inline) -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="jk">Jenis Kelamin</label>
    <div class="col-md-4">
    <?php       
    	if($JK == "Putri")
      {
        $putri_check = "checked";
        $putra_check = "";
      }
      elseif($JK == "Putra"){
        $putra_check = "checked";
        $putri_check = "";
      }
      else
      {
        $putri_check = "";
        $putra_check = "";        
      }
    ?> 
      <label class="radio-inline" for="jk-0">
        <input type="radio" name="jk" id="jk-0" value="Putra" <?php echo $putra_check; ?>>
        Putra (Pa)
      </label> 
      <label class="radio-inline" for="jk-1">
        <input type="radio" name="jk" id="jk-1" value="Putri" <?php echo $putri_check; ?>>
        Putri (Pi)
      </label>
    </div>
  </div>

  <!-- Button (Double) -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="submit"></label>
    <div class="col-md-6">
      <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
      <button onclick="history.back()" id="reset" type="reset" name="reset" class="btn btn-default">Batal</button>
    </div>
  </div>        
</form>  

<!-- autocomplete kelas -->
<script type="text/javascript">
 // Kelas Data Autocomplete
 var kelas_data = [];
 var kontingen_data = [];

 <?php 
  $kelas_sel  = new Database;
  $kelas_q    = "SELECT * FROM kelas_all";
  $exec       = $kelas_sel->custom_query($kelas_q);
  foreach ($exec as $kelas_nama) {
    $kelas_n = $kelas_nama->isi;
?>
  kelas_data.push('<?php echo $kelas_n; ?>');
<?php
    // echo $kelas_n;
  } // close foreach($exec)
?>

 $('#kelas_pilih').typeahead({        
    local: kelas_data
  });

  // kontingen Data Autocomplete
    <?php 
      include_once "lib/config.php";
      $kontingen_sel  = new Database;
      $kontingen_q    = "SELECT * FROM kontingen_all";
      $exec       = $kontingen_sel->custom_query($kontingen_q);
      foreach ($exec as $kontingen_nama) {
        $kontingen_n = $kontingen_nama->isi;
    ?>
      kontingen_data.push('<?php echo $kontingen_n; ?>');
    <?php
        // echo $kelas_n;
      } // close foreach($exec)
    ?>

     $('#kontingen_pilih').typeahead({        
        local: kontingen_data
      });

</script>

<!-- Proses update data -->
<?php
if(isset($_POST[submit])){
	$table_up	= "peserta";
	$data_up	= array(
                        'nama'          => $_POST[nama],
                        'kontingen'     => $_POST[kontingen],                        
                        'berat_badan'   => $_POST[berat], 
                        'tgl_lahir'     => $_POST[tgl_lahir],
                        'perguruan'     => $_POST[perguruan],
                        'jk'            => $_POST[jk],
                        'id_kelas'      => $kelas_id_conv[$_POST[kelas_pilih]]
                         );
	$prim_col	= "id_peserta";
	// $id didefinisikan diatas;

	$peserta 	= new Database;
	$up_peserta = $peserta->update($table_up,$data_up,$prim_col,$id);
	echo "
		<script type='text/javascript'>				
			alert('Data diupdate');
		</script>
		<meta http-equiv='refresh' content='0;url=./?".$link_overall."' />
	";
}

?>

