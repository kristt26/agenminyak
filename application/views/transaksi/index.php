<div class="row" ng-controller="transaksiController">
  <div class="col-md-4">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-plus-square fa-1x"></i>&nbsp;&nbsp; Input Transaksi Penjualan</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="alert alert-info">
          <marquee behavior="alternate">
            <h4 style="margin-top: 12px">Sisa Stok Minyak: {{datas.pembelian.stok - datas.pembelian.totaltransaksi}} Liter</h4>
          </marquee>
        </div>
        <form role="form" ng-submit="save(model)">
          <div class="form-group row">
            <label for="tanggal" class="col-sm-3 col-form-label col-form-label-sm">Tanggal</label>
            <label for="tanggal" class="col-sm-1 col-form-label col-form-label-sm text-right">: </label>
            <div class="col-sm-8">
                <input type="text" readonly class="form-control  form-control-sm" id="tanggal" ng-model="model.tanggal">
            </div>
          </div>
          <div class="form-group row">
            <label for="pelanggan" class="col-sm-3 col-form-label col-form-label-sm">Pelanggan</label>
            <label for="pelanggan" class="col-sm-1 col-form-label col-form-label-sm text-right">: </label>
            <div class="col-sm-8">
              <div class="input-group input-group-sm" ng-show="simpan">
                <select id="pelanggan" class="form-control  form-control-sm select2" ng-options="item as item.nama for item in datas.pelanggan" ng-model="model.pelanggan" required>
                  <option></option>
                </select>
              </div>
              <div class="input-group input-group-sm" ng-show="!simpan" >
                <input type="text" readonly class="form-control form-control-sm" id="pelanggann" ng-model="model.pelanggan.nama">
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="jumlah" class="col-sm-3 col-form-label col-form-label-sm">Jumlah</label>
            <label for="jumlah" class="col-sm-1 col-form-label col-form-label-sm text-right">: </label>
            <div class="col-sm-8">
              <div class="input-group input-group-sm">
                <input type="number" class="form-control form-control-sm" id="jumlah" ng-model="model.jumlah" ng-change="hitung()" required>
                <div class="input-group-prepend">
                  <span class="input-group-text">Liter</span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="hargasatuan" class="col-sm-3 col-form-label col-form-label-sm">Harga Satuan </label>
            <label for="hargasatuan" class="col-sm-1 col-form-label col-form-label-sm text-right">: </label>
            <div class="col-sm-8">
              <input type="text" readonly class="form-control form-control-sm" id="hargasatuan" ng-model="datas.pembelian.hargajual" ui-money-mask="2">
            </div>
          </div>
          <div class="form-group row">
            <label for="TotalHarga" class="col-sm-3 col-form-label col-form-label-sm">Total Harga </label>
            <label for="TotalHarga" class="col-sm-1 col-form-label col-form-label-sm text-right">: </label>
            <div class="col-sm-8">
              <input type="text" readonly class="form-control form-control-sm" id="TotalHarga" ng-model="model.totalharga" ui-money-mask="0">
            </div>
          </div>
          <div class="form-group row" ng-show = "simpan">
            <label for="TotalBayar" class="col-sm-3 col-form-label col-form-label-sm">Total Bayar </label>
            <label for="hargasatuan" class="col-sm-1 col-form-label col-form-label-sm text-right">: </label>
            <div class="col-sm-8">
              <div class="input-group input-group-sm">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Rp. </span>
                  </div>
                  <input type="text" class="form-control form-control-sm" id="TotalBayar" ng-model="model.totalbayar" ui-number-mask="0" ng-change="hitung()" required>
              </div>
              
            </div>
          </div>
          <div class="form-group row" ng-show = "simpan">
            <label for="kembalian" class="col-sm-3 col-form-label col-form-label-sm">Kembalian </label>
            <label for="" class="col-sm-1 col-form-label col-form-label-sm text-right">: </label>
            <div class="col-sm-8">
              <div class="input-group input-group-sm">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Rp. </span>
                  </div>
                  <input type="text" readonly class="form-control form-control-sm" id="kembalian" ng-model="model.kembalian" ui-number-mask="2">
              </div>
              
            </div>
          </div>
          <div class="form-group d-flex justify-content-end">
            <button type="submit" class="btn btn-primary btn-sm pull-right">{{simpan ? 'Simpan': 'Ubah'}}</button>
            <button type="button" ng-show="!simpan" class="btn btn-warning btn-sm pull-right"
              ng-click="clear()">Clear</button>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
  <div class="col-md-8">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-th-list"></i>&nbsp;&nbsp; Daftar Penjualan</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="table-responsive p-0">
          <table datatable="ng" class="table table-sm table-bordered table-hover">
            <thead>
              <tr>
                <th width="7%">No</th>
                <th>Tanggal Beli</th>
                <th>Nama Pelanggan</th>
                <th>Jumlah Beli</th>
                <th>Harga Beli</th>
                <th>Total Harga</th>
                <th><i class="fas fa-cog"></i></th>
              </tr>
            </thead>
            <tbody>
              <tr ng-repeat="item in datas.transaksi">
                <td>{{$index+1}}</td>
                <td>{{item.tanggal | date: 'EEEE, dd MMMM y'}}</td>
                <td>{{item.nama}}</td>
                <td>{{item.jumlah | number}} Liter</td>
                <td>{{datas.pembelian.hargajual | currency}}</td>
                <td>{{datas.pembelian.hargajual * item.jumlah | currency}}</td>
                <td>
                  <button type="button" class="btn btn-warning btn-sm" ng-click="edit(item)"><i
                      class="fas fa-edit"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>