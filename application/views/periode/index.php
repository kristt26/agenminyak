<div class="row" ng-controller="periodeController">
  <div class="col-md-4">
    <div class="card card-bluecolor">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-plus-square fa-1x"></i>&nbsp;&nbsp; Input Periode</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form role="form" ng-submit="save(model)">
          <div class="form-group">
            <label for="nik" class="col-form-label col-form-label-sm">Periode</label>
            <input type="text" class="form-control  form-control-sm" id="nik" ng-model="model.periode"
              placeholder="Periode Penilaian">
          </div>
          <div class="form-group">
            <label for="keterangan" class="col-form-label col-form-label-sm">Keterangan</label>
            <textarea class="form-control  form-control-sm" id="keterangan" rows="4" ng-model="model.keterangan"
              placeholder="Keterangan"></textarea>
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
        <h3 class="card-title"><i class="fas fa-th-list"></i>&nbsp;&nbsp; List Periode</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 200px;">
        <table class="table table-sm table-hover table-head-fixed text-nowrap">
          <thead>
            <tr>
              <th width="5%">No</th>
              <th>Periode</th>
              <th>Keterangan</th>
              <th>Status</th>
              <th><i class="fas fa-cog"></i></th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="item in datas">
              <td>{{$index+1}}</td>
              <td>{{item.periode}}</td>
              <td>{{item.keterangan}}</td>
              <td>
                <div class="custom-control custom-switch" ng-show="item.setstatus">
                  <input type="checkbox" class="custom-control-input" id="{{item.id}}" ng-model="item.setstatus"
                    ng-change="save(item)">
                  <label class="custom-control-label" for="{{item.id}}"></label>
                </div>
              </td>
              <td>
                <button type="button" class="btn btn-warning btn-sm" ng-click="edit(item)"><i
                    class="fas fa-edit"></i></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>