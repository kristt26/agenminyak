<div class="row" ng-controller="laporanPenjualanController">
  <div class="col-md-12">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-th-list"></i>&nbsp;&nbsp; Laporan</h3>
        <div class="card-tools">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="far fa-calendar-alt"></i>
              </span>
            </div>
            <input type="text" class="form-control float-right form-control-sm" ng-model="tanggal" id="reservationtime"
              ng-change="tampil(tanggal)">
            <button class="btn btn-primary btn-sm"><i class="fas fa-print" ng-click="print()"></i></button>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 500px;">
        <div id="print">
          <div class="screen">
            <div class="col-md-12 d-flex justify-content-between">
              <div class="col-md-4">&nbsp;</div>
              <div class="col-md-4 text-center">
                <h4>LAPORAN PENJUALAN</h4>
                <h5>TANGGAL: {{tanggal}}</h5>

              </div>
              <div class="col-md-4">&nbsp;</div>
            </div>
            <hr class="style2" style="margin-bottom:12px"><br>
          </div>
          <div class="card-body">
            <div class="table-responsive p-0">
              <table class="table table-sm table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama Pembeli</th>
                    <th>Harga Beli</th>
                    <th>Jumlah</th>
                    <th>Total Bayar</th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="item in datas.transaksi | orderBy: 'status'">
                    <td>{{$index+1}}</td>
                    <td>{{item.tanggal}}</td>
                    <td>{{item.nama}}</td>
                    <td>{{datas.pembelian.hargajual | currency}}</td>
                    <td class="text-right">{{item.jumlah | number}} Liter</td>
                    <td class="text-right">{{datas.pembelian.hargajual * item.jumlah | currency}}</td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="4"><strong>Total</strong></td>
                    <td class="text-right"><strong>{{totalTerjual | number}} Liter</strong></td>
                    <td class="text-right"><strong>{{totalPenjualan | currency}}</strong></td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>

<style>
  .card-body.p-0 .table tbody>tr>td:last-of-type, .card-body.p-0 .table tbody>tr>th:last-of-type, .card-body.p-0 .table thead>tr>td:last-of-type, .card-body.p-0 .table thead>tr>th:last-of-type {
      padding-right: 0.4rem !important ;
  }
</style>