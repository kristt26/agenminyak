<div class="row" ng-controller="karyawanController">
  <div class="col-md-4">
    <div class="card card-bluecolor">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-plus-square fa-1x" ></i>&nbsp;&nbsp; Input Karyawan</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form role="form" ng-submit="save()">
          <div class="form-group">
            <label for="nik" class="col-form-label col-form-label-sm">NIK</label>
            <input type="text" class="form-control  form-control-sm" id="nik" ng-model="model.nik" placeholder="NIK Petugas" required>
          </div>
          <div class="form-group">
            <label for="nama" class="col-form-label col-form-label-sm">Nama</label>
            <input type="text" class="form-control  form-control-sm" id="nama" ng-model="model.nama" placeholder="Nama Petugas" required>
          </div>
          <div class="form-group">
            <label for="jabatan" class="col-form-label col-form-label-sm">Jabatan</label>
            <input type="text" class="form-control  form-control-sm" id="jabatan" ng-model="model.jabatan" placeholder="Jabatan Petugas" required>
          </div>
          <div class="form-group">
            <label for="kategori" class="col-form-label col-form-label-sm">Status</label>
            <select id="kategori" class="form-control  form-control-sm"
              ng-options="item as item for item in status" ng-model="model.status" required></select>
          </div>
          <div class="form-group d-flex justify-content-end">
            <button type="submit" class="btn btn-primary btn-sm pull-right">{{simpan ? 'Simpan': 'Ubah'}}</button>
            <button type="button" ng-show="!simpan" class="btn btn-warning btn-sm pull-right" ng-click="clear()">Clear</button>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
  <div class="col-md-8">
    <div class="card card-bluecolor">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-th-list"></i>&nbsp;&nbsp; List Karyawan</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 200px;">
        <table class="table table-sm table-hover table-head-fixed text-nowrap">
          <thead>
            <tr>
              <th>No</th>
              <th>NIK</th>
              <th>Nama</th>
              <th>Jabatan</th>
              <th>Status</th>
              <th><i class="fas fa-cog"></i></th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="item in datas">
              <td>{{$index+1}}</td>
              <td>{{item.nik}}</td>
              <td>{{item.nama}}</td>
              <td>{{item.jabatan}}</td>
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
