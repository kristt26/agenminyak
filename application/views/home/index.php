<div class="row" ng-controller="homeController">
  <div class="col-lg-4 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h4><?= number_format($totalpelanggan->totalpelanggan,0,",",".") . " Pelanggan"?></h4>

        <p>Total Pelanggan</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-6">
    <!-- small box -->
    <div class="small-box bg-secondary">
      <div class="inner">
        <h4><?= number_format($totalbeli,0,",",".") . " Liter"?></h4>

        <p>Total Beli</p>
      </div>
      <div class="icon">
        <i class="fas fa-oil-can"></i>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h4><?= number_format($totaljual,0,",",".") . " Liter"?></h4>

        <p>Total Terjual</p>
      </div>
      <div class="icon">
        <i class="fas fa-oil-can"></i>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h4><?= number_format($stokakhir,0,",",".") . " Liter"?></h4>

        <p>Stok Akhir</p>
      </div>
      <div class="icon">
        <i class="fas fa-oil-can"></i>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h4><?= "Rp. " . number_format($totalpembelian,2,",",".")?></h4>

        <p>Total Pembelian</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h4><?= "Rp. " . number_format($totalpenjualan,2,",",".")?></h4>

        <p>Total Penjualan</p>
      </div>
      <div class="icon">
        <i class="ion ion-cash"></i>
      </div>
    </div>
  </div>
  
</div>