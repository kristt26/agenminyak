<div class="row" ng-controller="pesanController">
  <div class="col-md-12">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-th-list"></i>&nbsp;&nbsp; Daftar Pesan Broadcast</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="table-responsive p-0">

        </div>
        <table datatable="ng" class="table table-sm table-bordered table-head-fixed">
          <thead>
            <tr>
              <th width="5%" class="text-center">No</th>
              <th>Penerima</th>
              <th class="text-center">No. Telepon</th>
              <th class="text-center" width="40%">Pesan</th>
              <th class="text-center">Tanggal Kirim</th>
              <th class="text-center">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="item in datas | orderBy: '-'" ng-class="{'bg-red': item.status=='Tidak terkirim', 'bg-info': item.status=='Terkirim'}">
              <td class="text-center">{{$index+1}}</td>
              <td>{{item.pelanggan}}</td>
              <td class="text-center">{{item.kontak}}</td>
              <td>{{item.pesan | date:'EEEE, dd MMMM y HH.mm.ss'}}</td>
              <td class="text-center">{{item.tanggalkirim}}</td>
              <td>{{item.status}}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>
