<div class="row" ng-controller="laporanController">
  <div class="col-md-12">
    <div class="card card-bluecolor">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-th-list"></i>&nbsp;&nbsp; Laporan</h3>
        <div class="card-tools">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="far fa-calendar-alt"></i>
              </span>
            </div>
            <select class="form-control float-right form-control-sm" ng-model="periode"
              ng-options="item as item.periode for item in periodes" ng-change="showReport(periode)">
              <option value="">---Pilih Periode---</option>
            </select>
            <!-- <input type="text" class="form-control float-right form-control-sm" ng-model="tanggal" id="reservationtime"
              ng-change="tampil(tanggal)"> -->
            <button class="btn btn-primary btn-sm"><i class="fas fa-print" ng-click="print()"></i></button>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body" ng-show="laporan">
        <div class="card-body">
          <div class="container-fluid">
            <div class="card card-bluecolor">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-list fa-1x"></i>&nbsp;&nbsp; Matriks Nilai</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive p-0">
                  <table class="table table-sm table-bordered text-wrap">
                    <thead>
                      <tr>
                        <th>Alternatif</th>
                        <th ng-repeat="item in setValue.kriterias">{{item.kode}}</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr ng-repeat="item in setValue.alternatif">
                        <td>{{item.kode}} | {{item.karyawan}}</td>
                        <td ng-repeat="nilai in item.kriteria">{{nilai.nilai}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="card card-bluecolor">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-list fa-1x"></i>&nbsp;&nbsp; Normaliasi Matriks</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive p-0">
                  <table class="table table-sm table-bordered text-wrap">
                    <thead>
                      <tr>
                        <th>Alternatif</th>
                        <th ng-repeat="item in setValue.kriterias">{{item.kode}}</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr ng-repeat="item in setValue.alternatif">
                        <td>{{item.kode}} | {{item.karyawan}}</td>
                        <td ng-repeat="nilai in item.kriteria">{{nilai.nilaiNormal}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="card card-bluecolor">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-list fa-1x"></i>&nbsp;&nbsp; Bobot Preferensi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive p-0">
                  <table class="table table-sm table-bordered text-wrap">
                    <thead>
                      <tr>
                        <th>Alternatif</th>
                        <th>Hasil Perhitungan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr ng-repeat="item in setValue.alternatif | orderBy: '-hasil'">
                        <td>{{item.kode}} | {{item.karyawan}}</td>
                        <td>{{item.hasil}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <div id="print">
              <div class="screen">
                <div class="col-md-12 d-flex justify-content-between">
                  <div class="col-md-3"><img src="<?=base_url('public/img/logoprint.png');?>" width="120px"></div>
                  <div class="col-md-6 text-center">
                    <h4>LAPORAN HASIL ANALISA</h4>
                    <h5>PERIODE: {{periode.periode | uppercase}}</h5>

                  </div>
                  <div class="col-md-3">&nbsp;</div>
                </div>
                <hr class="style2" style="margin-bottom:12px"><br>
                <div class="table-responsive p-0">
                  <table class="table table-sm table-bordered text-wrap">
                    <thead>
                      <tr>
                        <th>Alternatif</th>
                        <th>Hasil Perhitungan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr ng-repeat="item in setValue.alternatif | orderBy: '-hasil'">
                        <td>{{item.karyawan}}</td>
                        <td>{{item.hasil}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <br>
                <table width="100%">
                  <tr height="30px">
                    <th width="75%"></th>
                    <th class="justify-content-between"><center>Kepala HRD</center></th>
                  </tr>
                  <tr height="30px">
                    <th width="75%"></th>
                    <th></th>
                  </tr>
                  <tr height="30px">
                    <th width="75%"></th>
                    <th></th>
                  </tr>
                  <tr height="30px">
                    <th width="75%"></th>
                    <th></th>
                  </tr>
                  <tr>
                    <th width="75%"></th>
                    <th class="justify-content-between"><center>Nama Sapa Saja</center></th>
                  </tr>
                </table>
              </div>
            </div>
            <div class="alert alert-info">
              <h5>Karyawan terbaik periode {{periode.periode}} adalah: <strong> {{hasilAkhir.karyawan}}</strong></h5>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>