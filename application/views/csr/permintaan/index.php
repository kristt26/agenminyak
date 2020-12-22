<div class="row" ng-controller="permintaanController">
  <div class="col-md-12">
    <div class="card card-danger">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-th-list"></i>&nbsp;&nbsp; List Petugas</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 500px;">
        <table datatable="ng" class="table table-sm table-hover table-head-fixed text-nowrap">
          <thead>
            <tr>
              <th>No</th>
              <th>No Registrasi</th>
              <th>Nama Pemohon</th>
              <th>Tanggal Pengajuan</th>
              <th>Jenis Pengajuan</th>
              <th>Paket Pilihan</th>
              <th>Status</th>
              <th><i class="fas fa-cog"></i></th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="item in datas | orderBy: 'status'">
              <td>{{$index+1}}</td>
              <td>{{item.noregister}}</td>
              <td>{{item.namapemohon}}</td>
              <td>{{item.tanggal}}</td>
              <td>{{item.jenispengajuan}}</td>
              <td>{{item.paket}}</td>
              <td>{{item.status}}</td>
              <td>
                <button type="button" ng-disabled="item.status=='Success'" ng-class="{'btn btn-info btn-sm': item.status=='Proses', 'btn btn-success btn-sm': item.status=='Success'}" ng-click ="detail(item)"><i ng-class="{'fas fa-eye': item.status=='Proses', 'fas fa-check': item.status=='Success'}"></i></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>
