   <!-- Page Content -->
<div class="container">
    <!-- Heading Row -->
    <div class="row row-centered">
        <h1> <span class="label label-danger">Semua Data</span> <a href="#" data-toggle="modal" data-target=".modal-peserta-add" title="Tambah Data" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>  </a><br> <small>Solocup 2016 Database</small> <br></h1>        
        <div class="col-md-12">
            <table id="overall" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kontingen</th>
                        <th>Nama</th>
                        <th>Tgl Lahir</th>
                        <th>Berat</th>
                        <th>Perguruan</th>
                        <th>Kelas</th>
                        <th class="hide-print">Opsi</th>
                    </tr>
                </thead>
               <tbody>                 
               </tbody>
            </table>
        </div> <!-- col-md-12 -->
    </div> <!-- row row-centered -->
</div> <!-- container -->

<!-- Modal kelas_add -->
<div class="modal fade modal-peserta-add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Tambah Peserta</h4>
      </div>    
      <div class="modal-body">
        <form class="form-horizontal" role="form" method="post" action="#">
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="kontingen_pilih">Kontingen</label>  
            <div class="col-md-6">
            <input id="kontingen_pilih" name="kontingen" type="text" placeholder="Kontingen Asal" class="form-control input-md" required="">
              
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="nama">Nama Peserta</label>  
            <div class="col-md-6">
            <input id="nama" name="nama" type="text" placeholder="Nama" class="form-control input-md" required="">
              
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="tgl_lahir">Tanggal Lahir</label>  
            <div class="col-md-6">
            <input id="tgl_lahir" name="tgl_lahir" type="text" placeholder="1995-09-24 (Contoh Untuk Format 24 September 1995)" class="form-control input-md" required="">
            <span class="help-block">Isi sesuai format</span>  
            </div>
          </div>

          <!-- Appended Input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="berat">Berat Badan</label>
            <div class="col-md-2">
              <div class="input-group">
                <input id="berat" name="berat" class="form-control" placeholder="0" type="text" required="">
                <span class="input-group-addon">Kg</span>
              </div>
              
            </div>
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="perguruan">Asal Perguruan</label>  
            <div class="col-md-6">
            <input id="perguruan" name="perguruan" type="text" placeholder="Perguruan Asal" class="form-control input-md" required="">
              
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="kelas_pilih">Kelas yang diikuti</label>  
            <div class="col-md-6">
            <input id="kelas_pilih" name="kelas_pilih" type="text" placeholder="Kelas yang diikuti (Ketik kata kuncinya)" class="form-control input-md" required="">
              
            </div>
          </div>

          <!-- Multiple Radios (inline) -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="jk">Jenis Kelamin</label>
            <div class="col-md-4"> 
              <label class="radio-inline" for="jk-0">
                <input type="radio" name="jk" id="jk-0" value="Putra">
                Putra (Pa)
              </label> 
              <label class="radio-inline" for="jk-1">
                <input type="radio" name="jk" id="jk-1" value="Putri">
                Putri (Pi)
              </label>
            </div>
          </div>

          <!-- Button (Double) -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="submit"></label>
            <div class="col-md-6">
              <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
              <button id="reset" type="reset" name="reset" class="btn btn-default">Reset</button>
            </div>
          </div>        
        </form>              
      </div> <!-- modal-body -->
    </div> <!-- modal-content -->
  </div> <!-- modal-dialog -->
</div>

<?php
error_reporting(E_ALL ^ E_NOTICE);
  // Input data Peserta
  include "lib/config.php";

  if($_POST[submit])    
  {

    // Buat Array dengan id=isi kelas dan value id kelas, untuk konversi saat POST
    $kelas_id_conv    = array();
    $kelas_id         = $db->fetch_all("kelas_all");
    foreach($kelas_id as $val){
      $kelas_id_conv[$val->isi] = $val->id_kelas;
    }

    // Proses Input data Peserta
    $peserta    = new Database;
    $table      = 'peserta';
    $val_psrta  = array(
                        'nama'          => $_POST[nama],
                        'kontingen'     => $_POST[kontingen],                        
                        'berat_badan'   => $_POST[berat], 
                        'tgl_lahir'     => $_POST[tgl_lahir],
                        'waktu_input'   => date('Y-m-d h:m:s'),
                        'perguruan'     => $_POST[perguruan],
                        'jk'            => $_POST[jk],
                        'id_kelas'      => $kelas_id_conv[$_POST[kelas_pilih]]
                         );
    $exec     = $peserta->insert($table,$val_psrta);
  } 
?>
<!-- END Modal kelas_add -->

    <!-- let's begin the script || JS Data Table Easy Config -->
    <script type="text/javascript">
     // Kelas Data Autocomplete
     var kelas_data = [];
     var kontingen_data = [];

    <?php 
      include_once "lib/config.php";
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

     // Data table
     $("#overall").dataTable({
           'bProcessing': true,
            'bServerSide': true,

            //disable order dan searching pada tombol aksi
                 "columnDefs": [ {
              "targets": [7],
              "orderable": false,
              "searchable": false

            } ],
            "ajax":{
              url :"data_overall.php",
            type: "post",  // method  , by default get
            //bisa kirim data ke server
            /*data: function ( d ) {
              
                      d.jurusan = "3223";
                  },*/
          error: function (xhr, error, thrown) {
            console.log(xhr);

            }
          },

        });

    </script>

