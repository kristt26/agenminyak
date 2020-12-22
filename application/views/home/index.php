<div class="row" ng-controller="homeController">
  <div class="col-lg-4 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h4>{{datass.karyawan.length}}</h4>

        <p>Total Karyawan Aktif</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h4>{{datass.periode ? datass.periode.periode : 'Periode tidak ditemuka'}}</h4>

        <p>Periode Aktif</p>
      </div>
      <div class="icon">
        <i class="ion ion-android-calendar"></i>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h4>{{hasilAkhir.hasil==0 ? 'Analisa Belum dilakukan' : hasilAkhir.karyawan}}</h4>

        <p>Karyawan Terbaik Periode Aktif</p>
      </div>
      <div class="icon">
        <i class="ion ion-clipboard"></i>
      </div>
    </div>
  </div>
  
</div>