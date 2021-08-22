<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item">
      <a href="<?= site_url() ?>admin/animasi" class="nav-link <?= $this->uri->segment(2) == 'animasi' ? 'active' : '' ?>">
        <i class="nav-icon fa fa-youtube-play"></i>
        <p>Animasi</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="<?= site_url() ?>admin/gedung" class="nav-link <?= $this->uri->segment(2) == 'gedung' ? 'active' : '' ?>">
        <i class="nav-icon fa fa-building"></i>
        <p>Gedung</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="<?= site_url() ?>admin/kegiatan" class="nav-link <?= $this->uri->segment(2) == 'kegiatan' ? 'active' : '' ?>">
        <i class="nav-icon fa fa-tasks"></i>
        <p>Kegiatan</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="<?= site_url() ?>admin/santri" class="nav-link <?= $this->uri->segment(2) == 'santri' ? 'active' : '' ?>">
        <i class="nav-icon fa fa-users"></i>
        <p>Santri</p>
      </a>
    </li>


    <li class="nav-item">
      <a href="<?= site_url() ?>admin/galeri" class="nav-link <?= $this->uri->segment(2) == 'galeri' ? 'active' : '' ?>">
        <i class="nav-icon fa fa-image"></i>
        <p>Galeri</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="<?= site_url() ?>admin/kamar" class="nav-link <?= $this->uri->segment(2) == 'kamar' ? 'active' : '' ?>">
        <i class="nav-icon fa fa-image"></i>
        <p>Kamar</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="<?= site_url() ?>admin/pengurus" class="nav-link <?= $this->uri->segment(2) == 'pengurus' ? 'active' : '' ?>">
        <i class="nav-icon fa fa-user-circle"></i>
        <p>Pengurus</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="<?= site_url() ?>admin/jabatan_pengurus" class="nav-link <?= $this->uri->segment(2) == 'jabatan_pengurus' ? 'active' : '' ?>">
        <i class="nav-icon fa fa-circle"></i>
        <p>Jabatan Pengurus</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="<?= site_url() ?>admin/profil" class="nav-link <?= $this->uri->segment(2) == 'profil' ? 'active' : '' ?>">
        <i class="nav-icon fa fa-address-card"></i>
        <p>Profil Pesantren</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="<?= site_url() ?>admin/users" class="nav-link <?= $this->uri->segment(2) == 'users' ? 'active' : '' ?>">
        <i class="nav-icon fa fa-user-o"></i>
        <p>Users</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="<?= site_url() ?>admin/logout" class="nav-link">
        <i class="nav-icon fa fa-sign-out"></i>
        <p>Logout</p>
      </a>
    </li>

</nav>