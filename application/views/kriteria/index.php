<div class="row" ng-controller="kriteriaController">
  <div class="col-md-4">
    <div class="card card-bluecolor">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-plus-square fa-1x"></i>&nbsp;&nbsp; Form Input Kriteria</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form role="form" ng-submit="save(model)">
          <div class="form-group">
            <label for="kriteria" class="col-form-label col-form-label-sm">Kriteria</label>
            <input type="text" class="form-control  form-control-sm" id="kriteria" ng-model="model.kriteria"
              placeholder="Kriteria Penilaian">
          </div>
          <div class="form-group">
            <label for="kategori" class="col-form-label col-form-label-sm">Kategori Kriteria</label>
            <select id="kategori" class="form-control  form-control-sm"
              ng-options="item as item for item in kategorikriteria" ng-model="model.kategori"></select>
          </div>
          <div class="form-group">
            <label for="bobot" class="col-form-label col-form-label-sm">Bobot</label>
            <div class="input-group col-md-4">
              <input type="number" class="form-control form-control-sm" ng-model="model.bobot" id="bobot"/>
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-percent"></i></span>
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
    <div class="card card-bluecolor">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-th-list"></i>&nbsp;&nbsp; List Kriteria</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div id="accordion">
          <div class="card card-bluecolor" ng-repeat="item in datas">
            <div class="card-header">
              <h4 class="card-title w-100 d-flex justify-content-between">
                <a href="javascript:void()" class="d-block w-85" data-toggle="collapse" data-target="#collapseOne{{item.id}}">
                  {{item.kriteria}} &nbsp;&nbsp;||&nbsp;&nbsp;Kategori: {{item.kategori}} &nbsp;&nbsp;||&nbsp;&nbsp;Bobot: {{item.bobot}}% 
                </a>
                <div>
                  <a href="#" class="btn btn-primary btn-sm pulll-right" ng-click="addsub(item)"><i class="fas fa-plus"></i></a>
                  <a href="javascript:void()" class="btn btn-warning btn-sm pulll-right" ng-click="edit(item)"><i class="fas fa-edit"></i></a>
                </div>
                
              </h4>
            </div>
            <div id="collapseOne{{item.id}}" ng-class="{'collapse show': $index==0, 'collapse': $index!=0}" data-parent="#accordion">
              <div class="card-body table-responsive p-0">
                <table class="table table-sm table-hover text-wrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Sub Kriteria</th>
                      <th>Bobot</th>
                      <th>Indikator</th>
                      <th><i class="fas fa-cog"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr ng-repeat="sub in item.subkriteria">
                      <td>{{$index+1}}</td>
                      <td>{{sub.subkriteria}}</td>
                      <td>{{sub.nilai}}</td>
                      <td>{{sub.indikator}}</td>
                      <td>
                        <button type="button" class="btn btn-warning btn-sm" ng-click="editsub(sub)"><i
                            class="fas fa-edit"></i></button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        
      </div>
      <!-- /.card-body -->
    </div>
  </div>
  <!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="subkriteria" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-bluecolor">
          <h5 class="modal-title" style="color: #fff">{{titlesub}}</h5>
            <button type="button" class="close" style="color: #fff" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <form role="form" ng-submit="savesub(model)">
            <div class="form-group">
              <label for="subkriteria" class="col-form-label col-form-label-sm">Sub Kriteria</label>
              <input type="text" class="form-control  form-control-sm" id="subkriteria" ng-model="model.subkriteria"
                placeholder="Sub Kriteria">
            </div>
            <div class="form-group">
              <label for="nilai" class="col-form-label col-form-label-sm">Nilai</label>
              <input type="number" class="form-control  form-control-sm" id="nilai" ng-model="model.nilai"
                placeholder="Nilai Sub Kriteria">
            </div>
            <div class="form-group">
              <label for="indikator" class="col-form-label col-form-label-sm">Indikator</label>
              <textarea class="form-control  form-control-sm" id="indikator" rows="5" ng-model="model.indikator" placeholder="Indikator Penilaian"></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning btn-sm pull-right"
                ng-click="close()" >close</button>
              <button type="submit" class="btn btn-primary btn-sm pull-right">{{simpan ? 'Simpan': 'Ubah'}}</button>
            </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>
</div>