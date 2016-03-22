<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Sistem Informasi Pertandingan</a>
    </div>
    <!-- <p class="navbar-text visible-lg">SOLOCUP 2016</p> -->

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="./?<?php echo $link_overall; ?>">Semua Data</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Lihat <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="./?<?php echo $link_count_peserta; ?>">Jumlah Per Kelas</a></li>
            <li><a href="./?<?php echo $link_count_kontingen; ?>">Jumlah Per Kontingen</a></li>            
          </ul>
        </li>
        <li><a href="./?<?php echo $link_drowing; ?>">Drowing</a></li>        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="./?<?php echo $link_manage_kontingen; ?>"><span class="glyphicon glyphicon-cog"></span> Manage kontingen</a></li> 
        <li><a href="./?<?php echo $link_manage_kelas; ?>"><span class="glyphicon glyphicon-cog"></span> Manage Kelas</a></li>      
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-success">Com#1</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Logout</a></li>
            <li class="divider"></li>
            <li><a href="#">Petunjuk</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>