<div class="row" ng-controller="permintaanController">
  <div class="col-md-4">
    <div class="card card-danger">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-plus-square fa-1x" ></i>&nbsp;&nbsp; Input data Permohonan</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form role="form" ng-submit="save()">
          <div class="form-group">
            <label for="noregister" class="col-form-label col-form-label-sm">Nomor Registrasi</label>
            <input type="text" class="form-control  form-control-sm" id="noregister" ng-model="model.noregister" Disabled>
          </div>
          <div class="form-group">
            <label for="namapemohon" class="col-form-label col-form-label-sm">Nama Pemohon</label>
            <input type="text" class="form-control form-control-sm" id="namapemohon" ng-model="model.namapemohon" placeholder="Nama Pemohon">
          </div>
          <div class="form-group">
            <label for="email" class="col-form-label col-form-label-sm">Id Pelanggan</label>
            <select class="form-control form-control-sm select2" ng-options="item as (item.kodepelanggan + ' - ' + item.nama) for item in pelanggans" ng-model="model.pelanggan"></select>
          </div>
          <div class="form-group" ng-show="model.pelanggan">
            <label for="namapelanggan" class="col-form-label col-form-label-sm">Nama Pelanggan</label>
            <input type="text" class="form-control form-control-sm" id="namapelanggan" ng-model="model.pelanggan.nama" disabled>
          </div>
          <!-- <div class="form-group" ng-show="model.pelanggan">
            <label for="paketaktif" class="col-form-label col-form-label-sm">Paket Aktif</label>
            <input type="text" class="form-control form-control-sm" id="paketaktif" ng-model="model.pelanggan.paket" disabled>
          </div> -->
          <div class="form-group">
            <label for="jenispermintaan" class="col-form-label col-form-label-sm">Jenis Permintaan</label>
            <textarea class="form-control form-control-sm" ng-model="model.jenispengajuan"></textarea>
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
    <div class="card card-danger">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-th-list"></i>&nbsp;&nbsp; List Permohonan</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 500px;">
        <table class="table table-sm table-hover table-head-fixed text-nowrap">
          <thead>
            <tr>
              <th>No</th>
              <th>No Registrasi</th>
              <th>Id Pelanggan</th>
              <th>Nama Pemohon</th>
              <th>Tanggal Pengajuan</th>
              <th>Jenis Pengajuan</th>
              <th>Status</th>
              <th><i class="fas fa-cog"></i></th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="item in datas">
              <td>{{$index+1}}</td>
              <td>{{item.noregister}}</td>
              <td>{{item.pelanggan.kodepelanggan}}</td>
              <td>{{item.namapemohon}}</td>
              <td>{{item.tanggal}}</td>
              <td>{{item.jenispengajuan}}</td>
              <td>{{item.status}}</td>
              <td>
                <button type="button" class="btn btn-warning btn-sm" ng-click ="edit(item)"><i class="fas fa-edit"></i></button>
                <button type="button" ng-disabled="item.status=='Success'" ng-class="{'btn btn-info btn-sm': item.status=='Proses'||item.status=='Pending', 'btn btn-success btn-sm': item.status=='Success'}" ng-click ="detail(item)"><i ng-class="{'fas fa-eye': item.status=='Proses'||item.status=='Pending', 'fas fa-check': item.status=='Success'}"></i></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>
