<?php
//$uriget in index.php
include "lib/config.php";

$id = $uriget[id_kontingen];
$kontingen = new Database;

$table 	= "kontingen_all";
$col	= "id_kontingen";
$val	= $id;
$q 	    = $kontingen->fetch_single_row($table,$col,$val);

$isi	= $q->isi_kontingen;

?>

<div class="container">
    <!-- Heading Row -->
    <div class="row row-centered">
        <h1> <span class="label label-primary">Edit Data kontingen</span></span>  </a><br> <small>Solocup 2016 Database</small> <br></h1>
    </div>
</div>

<form class="form-horizontal" role="form" method="post" action="#">
  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="isi">Nama kontingen</label>  
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
	$table_up	= "kontingen_all";
	$data_up	= array(
                   'isi_kontingen'          => $_POST[isi]
                         );
	$prim_col	= "id_kontingen";
	// $id didefinisikan diatas;

	$kontingen 	= new Database;
	$up_kontingen = $kontingen->update($table_up,$data_up,$prim_col,$id);
	echo "
		<script type='text/javascript'>				
			alert('Data diupdate');
		</script>
		<meta http-equiv='refresh' content='0;url=./?".$link_manage_kontingen."' />
	";
}
  
?>
