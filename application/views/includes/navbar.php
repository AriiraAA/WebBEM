<?php  
  $username = $this->session->userdata('username');
  $nim      = $this->session->userdata('nim');
  $dinas    = $this->session->userdata('user');
?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">BEM KM Fasilkom Unsri</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <?php if (isset($username) || isset($nim) || isset($dinas)): ?>
          <li><a href="<?= base_url('login/anggota') ?>">Beranda</a></li>
          <li class="dropdown">
            <?php if (isset($nim)): ?>
              <?php if (isset($data->nama_lengkap)): ?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $data->nama_lengkap ?> <span class="caret"></span></a>
              <?php else: ?>
                <?php  
                  foreach ($data as $row) {
                    $nama = $row->nama;
                  }
                ?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $nama ?> <span class="caret"></span></a>
              <?php endif; ?>
            <?php else: ?>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
            <?php endif; ?>
            <ul class="dropdown-menu">
              <?php if (isset($nim)): ?>
                <li><a href="<?= base_url('anggota/edit') ?>">Biodata</a></li>
                <li><a href="<?= base_url('anggota/ubah_password') ?>">Ubah Password</a></li>
              <?php else: ?>

              <?php endif; ?>
              <li><a href="#">Something else here</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="<?= site_url('logout') ?>">Logout</a></li>
            </ul>
          </li>
        <?php else: ?>
          <li><a href="<?= site_url('login/anggota') ?>">Login</a></li>
        <?php endif;  ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>