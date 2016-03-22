   <!-- Page Content -->
<div class="container">
    <!-- Heading Row -->
    <div class="row row-centered">
        <h1> <span class="label label-danger">Manage Kelas</span> <a href="#" data-toggle="modal" data-target=".modal-kelas-add" title="Tambah Data" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>  </a><br> <small>Solocup 2016 Database</small> <br></h1>
        <div class="col-md-12">
            <table id="kelas_view" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Kelas</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
               <tbody>                 
               </tbody>
            </table>
        </div> <!-- col-md-12 -->
    </div> <!-- row row-centered -->
</div> <!-- container -->

<!-- Modal kelas_add -->
<div class="modal fade modal-kelas-add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Tambah Kelas Pertandingan</h4>
      </div>    
      <div class="modal-body">
        <form method="post" action="#">
          <!-- Text input-->
          <div class="form-group row">
            <label class="col-md-4 control-label" for="isi_kelas">Kelas Pertandingan</label>  
            <div class="col-md-4">
            <input id="isi_kelas" name="isi_kelas" type="text" placeholder="Kelas" class="form-control input-md" required="">
              
            </div>
          </div>
          
          <!-- Button (Double) -->
          <div class="form-group row">
            <label class="col-md-4 control-label" for="button1idsubmit"></label>
            <div class="col-md-4">
              <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
              <button type="reset" id="reset" name="reset" class="btn btn-default">Reset</button>
            </div>
          </div>      
        </form>              
      </div>
    </div>
  </div>
</div>

<?php
  include "lib/config.php";

  if($_POST[submit])
  {
    $kelas    = new Database;
    $table    = 'kelas_all';
    $kelas_isi  = array(
              'isi'=>$_POST[isi_kelas]
               );

    $exec     = $kelas->insert($table,$kelas_isi);
  } 
?>
<!-- END Modal kelas_add -->

    <!-- let's begin the script || JS Data Table Easy Config -->
    <script type="text/javascript">
     $("#kelas_view").dataTable({
           'bProcessing': true,
            'bServerSide': true,

            //disable order dan searching pada tombol aksi
                 "columnDefs": [ {
              "targets": [2],
              "orderable": false,
              "searchable": false

            } ],
            "ajax":{
              url :"data_kelas_view.php",
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

    <!-- BS-3 Type Ahead | AutoComplete -->
    <script type="text/javascript" src="assets/js/bootstrap3-typeahead.min.js"></script>