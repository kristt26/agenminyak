<div class="row" ng-controller="pelangganController">
  <div class="col-md-4">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-plus-square fa-1x" ></i>&nbsp;&nbsp; Input data pelanggan</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form role="form" ng-submit="save()">
          <div class="form-group">
            <label for="nama" class="col-form-label col-form-label-sm">Nama</label>
            <input type="text" class="form-control  form-control-sm" id="nama" ng-model="model.nama" placeholder="Nama Pelanggan">
          </div>
          <div class="form-group">
            <label for="alamat" class="col-form-label col-form-label-sm">Alamat</label>
            <textarea class="form-control  form-control-sm" id="alamat" ng-model="model.alamat" placeholder="Alamat Pelanggan" row="3"></textarea>
          </div>
          <div class="form-group">
            <label for="kontak" class="col-form-label col-form-label-sm">Telepon</label>
            <input type="text" class="form-control  form-control-sm" id="kontak" ng-model="model.kontak" placeholder="No. Telepon">
          </div>
          <div class="form-group">
            <label for="kategori" class="col-form-label col-form-label-sm">Status</label>
            <select id="kategori" class="form-control  form-control-sm"
              ng-options="item as item for item in status" ng-model="model.status" required></select>
          </div>
          <div class="form-group d-flex justify-content-end">
            <button type="submit" class="btn btn-primary btn-sm pull-right">{{simpan ? 'Simpan': 'Ubah'}}</button>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
  <div class="col-md-8">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-th-list"></i>&nbsp;&nbsp; List Pelanggan</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 500px;">
        <table class="table table-sm table-hover table-head-fixed text-nowrap">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Telepon</th>
              <th>Status</th>
              <th><i class="fas fa-cog"></i></th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="item in datas">
              <td>{{$index+1}}</td>
              <td>{{item.nama}}</td>
              <td><span class="tag tag-success">{{item.alamat}}</span></td>
              <td>{{item.kontak}}</td>
              <td>{{item.status}}</td>
              <td>
                <button type="button" class="btn btn-warning btn-sm" ng-click ="edit(item)"><i class="fas fa-edit"></i></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>
