<div class="row" ng-controller="pembelianController">
  <div class="col-md-4">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-plus-square fa-1x"></i>&nbsp;&nbsp; Input Pembelian</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form role="form" ng-submit="save(model)">
          <div class="form-group">
            <label for="tanggal" class="col-form-label col-form-label-sm">Tanggal Beli</label>
            <input type="date" class="form-control  form-control-sm" id="tanggal" ng-model="model.tanggal"
              placeholder="Tanggal Beli">
          </div>
          <div class="form-group">
            <label for="stok" class="col-form-label col-form-label-sm">Jumlah Pembelian</label>
            <input type="text" class="form-control  form-control-sm" id="stok" ng-model="model.stok"
              placeholder="Jumlah pembelian dalam liter" ui-number-mask="0">
          </div>
          <div class="form-group">
            <label for="hargabeli" class="col-form-label col-form-label-sm">Harga Beli</label>
            <input type="text" class="form-control  form-control-sm" id="hargabeli" ng-model="model.hargabeli"
              placeholder="Harga beli dalam satuan liter" ui-money-mask="0">
          </div>
          <div class="form-group">
            <label for="hargajual" class="col-form-label col-form-label-sm">Harga Jual</label>
            <input type="text" class="form-control  form-control-sm" id="hargajual" ng-model="model.hargajual"
              placeholder="Harga jual dalam satuan liter" ui-money-mask="0">
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
        <h3 class="card-title"><i class="fas fa-th-list"></i>&nbsp;&nbsp; List Periode</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="table-responsive p-0">
          <table datatable="ng" class="table table-sm table-bordered table-hover">
            <thead>
              <tr>
                <th width="7%">No</th>
                <th>Tanggal Beli</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Jumlah</th>
                <th><i class="fas fa-cog"></i></th>
              </tr>
            </thead>
            <tbody>
              <tr ng-repeat="item in datas">
                <td>{{$index+1}}</td>
                <td>{{item.tanggal | date: 'EEEE, dd MMMM y'}}</td>
                <td>{{item.hargabeli | currency}}</td>
                <td>{{item.hargajual | currency}}</td>
                <td class="text-right">{{item.stok | number}} Liter</td>
                <td>
                  <button type="button" class="btn btn-warning btn-sm" ng-click="edit(item)"><i
                      class="fas fa-edit"></i></button>
                </td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                  <td colspan="4"><strong>Stok Akhir Minyak Tanah</strong></td>
                  <td class="text-right">{{totalStok | number}} Liter</td>
                  <td></td>
                </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>