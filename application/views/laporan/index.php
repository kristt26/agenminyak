<div class="row" ng-controller="laporanController">
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
              <div class="col-md-4"><img src="<?=base_url('public/img/logo.png');?>" width="100px"></div>
              <div class="col-md-4 text-center">
                <h2>LAPORAN</h2><h5>TANGGAL: {{tanggal}}</h5>

              </div>
              <div class="col-md-4">&nbsp;</div>
            </div>
            <hr class="style2" style="margin-bottom:12px"><br>
          </div>
          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>No Registrasi</th>
                <th>Nama Pemohon</th>
                <th>Tanggal Pengajuan</th>
                <th>Jenis Pengajuan</th>
                <th>Status</th>
                <th>Tanggal Proses</th>
                <th>Pesan</th>
                <th>CSR</th>
              </tr>
            </thead>
            <tbody>
              <tr ng-repeat="item in datas | orderBy: 'status'">
                <td>{{$index+1}}</td>
                <td>{{item.noregister}}</td>
                <td>{{item.namapemohon}}</td>
                <td>{{item.tanggal}}</td>
                <td>{{item.jenispengajuan}}</td>
                <td>{{item.status}}</td>
                <td>{{item.tanggalproses}}</td>
                <td>{{item.message}}</td>
                <td>{{item.nama}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>