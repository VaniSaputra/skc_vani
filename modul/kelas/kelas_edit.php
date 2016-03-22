<?php
//$uriget in index.php
include "lib/config.php";

$id = $uriget[id_kelas];
$kelas = new Database;

$table 	= "kelas_all";
$col	= "id_kelas";
$val	= $id;
$q 	    = $kelas->fetch_single_row($table,$col,$val);

$isi	= $q->isi;

?>

<div class="container">
    <!-- Heading Row -->
    <div class="row row-centered">
        <h1> <span class="label label-primary">Edit Data Kelas</span></span>  </a><br> <small>Solocup 2016 Database</small> <br></h1>
    </div>
</div>

<form class="form-horizontal" role="form" method="post" action="#">
  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="isi">Nama Kelas</label>  
    <div class="col-md-6">
    <input id="isi" name="isi" type="text" placeholder="Data Tersimpan: <?php echo $isi; ?>" class="form-control input-md" required="" value="<?php echo $isi; ?>">
      
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

<?php
if(isset($_POST[submit])){
	$table_up	= "kelas_all";
	$data_up	= array(
                        'isi'          => $_POST[isi]
                         );
	$prim_col	= "id_kelas";
	// $id didefinisikan diatas;

	$kelas 	= new Database;
	$up_kelas = $kelas->update($table_up,$data_up,$prim_col,$id);
	echo "
		<script type='text/javascript'>				
			alert('Data diupdate');
		</script>
		<meta http-equiv='refresh' content='0;url=./?".$link_manage_kelas."' />
	";
}

?>