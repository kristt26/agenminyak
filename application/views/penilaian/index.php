<div class="row" ng-controller="penilaianController">
  <div class="col-md-12">
    <div class="card card-bluecolor">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-clipboard-list fa-1x"></i>&nbsp;&nbsp; Form Penilaian Karyawan</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form ng-submit="save()">
          <div id="accordion">
            <div class="card card-bluecolor" ng-repeat="item in datas">
              <div class="card-header">
                <h4 class="card-title w-100 d-flex justify-content-between">
                  <a href="javascript:void()" class="d-block w-85" data-toggle="collapse"
                    data-target="#collapseOne{{item.id}}">
                    {{$index+1}}. {{item.nama}}
                  </a>
                </h4>
              </div>
              <div id="collapseOne{{item.id}}" ng-class="{'collapse show': $index==0, 'collapse': $index!=0}"
                data-parent="#accordion">
                <div class="card-body">
                  <div class="col-md-12" ng-repeat="kriteria in item.kriteria">
                    <div class="form-group">
                      <label for="kriteria{{item.id}}{{kriteria.id}}"
                        class="col-form-label col-form-label-sm">{{kriteria.kriteria}}</label>
                      <select name="kriteria{{item.id}}{{kriteria.id}}" id="kriteria{{item.id}}{{kriteria.id}}"
                        class="form-control form-control-sm"
                        ng-options="item as (item.subkriteria + ' | ' + item.indikator) for item in kriteria.subkriteria"
                        ng-model="kriteria.nilai" required>
                        <!-- <option></option> -->
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group d-flex justify-content-end">
            <button type="submit" class="btn btn-primary btn-sm pull-right">Simpan</button>
            <button type="button" class="btn btn-info btn-sm pull-right" ng-click="analisa()">Analisa</button>
            <button type="button" ng-show="!simpan" class="btn btn-warning btn-sm pull-right"
              ng-click="clear()">Clear</button>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="analisa" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header bg-bluecolor" style="color: #fff">
          <h5 class="modal-title">Hasil Analisa SAW</h5>
          <button type="button" class="close" style="color: #fff" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="card card-bluecolor">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-list fa-1x"></i>&nbsp;&nbsp; Matriks Nilai</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive p-0">
                  <table class="table table-sm table-hover text-wrap">
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
                  <table class="table table-sm table-hover text-wrap">
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
                  <table class="table table-sm table-hover text-wrap">
                    <thead>
                      <tr>
                        <th>Alternatif</th>
                        <th>Hasil Perhitungan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr ng-repeat="item in setValue.alternatif | orderBy: '-hasil'" ng-class="{'bg-info':$index==0}">
                        <td>{{item.kode}} | {{item.karyawan}}</td>
                        <td>{{item.hasil}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="alert alert-info">
              <h5>Karyawan terbaik periode {{periode.periode}} adalah: <strong> {{hasilAkhir.karyawan}}</strong></h5>
            </div>



          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>
</div>