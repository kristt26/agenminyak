<div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <!-- <div class="image">
            <img src="<?=base_url()?>favicon.ico" class="img-circle elevation-2" alt="User Image">
          </div> -->
          <div class="info">
            <a href="#" class="d-block"><?= $this->session->userdata('nama');?></a>
            <h5 style="color: white"><?= $this->session->userdata('role');?></h5>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?=base_url('home')?>" ng-class="{'nav-link active': header=='Home', 'nav-link': header!='Home'}">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Home
                </p>
              </a>
            </li>
            <li ng-class="{'nav-item menu-open': header=='Petugas' || header=='Periode' || header=='Kriteria', 'nav-item': header!='Petugas' || header!='Periode' || header!='Kriteria'}">
              <a href="#" ng-class="{'nav-link active': header=='Petugas' || header=='Periode' || header=='Kriteria', 'nav-link': header!='Petugas' || header!='Periode' || header!='Kriteria'}">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Master Data
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?=base_url('karyawan')?>" ng-class="{'nav-link active': header=='Petugas', 'nav-link': header!='Petugas'}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Karyawan
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?=base_url('periode')?>" ng-class="{'nav-link active': header=='Periode', 'nav-link': header!='Periode'}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Periode
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?=base_url('kriteria')?>" ng-class="{'nav-link active': header=='Kriteria', 'nav-link': header!='Kriteria'}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Kriteria
                    </p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="<?=base_url('penilaian')?>" ng-class="{'nav-link active': header=='Penilaian', 'nav-link': header!='Penilaian'}">
                <i class="nav-icon fas fa-clipboard-list"></i>
                <p>
                  Penilaian
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url('laporan')?>" ng-class="{'nav-link active': header=='Laporan', 'nav-link': header!='Laporan'}">
                <i class="nav-icon fas fa-file"></i>
                <p>
                  Laporan
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>