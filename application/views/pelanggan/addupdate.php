<div class="row" ng-controller="contentWajibPajakController" ng-init="Init()">
    <div class="col-md-12">
        <div class="card card-warning">
            <form role="form" ng-submit="save()">
                <div class="card-header bg-warning">
                    <h3 class="card-title"><i class="fas fa-plus-square fa-1x"></i>&nbsp;&nbsp; Data Wajib Pajak</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group row">
                                <label for="nik" class="col-sm-3 col-form-label col-form-label-sm">No Induk KTP</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="nik" ng-model="model.nik" placeholder="No Induk KTP">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nowajibpajak" class="col-sm-3 col-form-label col-form-label-sm">No Wajib Pajak</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="nowajibpajak" ng-model="model.nowajibpajak" placeholder="No Wajib Pajak">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-sm-3 col-form-label col-form-label-sm">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="nama" ng-model="model.nama" placeholder="Nama Wajib Pajak">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jk" class="col-sm-3 col-form-label col-form-label-sm">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2 form-control-sm" ng-options="item as item for item in sexs" ng-model="model.jk" style="width: 100%;">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-5">
                            <div class="form-group row">
                                <label for="kontak" class="col-sm-3 col-form-label col-form-label-sm">Kontak</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="kontak" ng-model="model.kontak" placeholder="No Telepon">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label col-form-label-sm">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="email" ng-model="model.email" placeholder="Email Aktif">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-3 col-form-label col-form-label-sm">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control form-control-sm" id="alamat" rows="3" ng-model="model.alamat" placeholder="Alamat Lengkap"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-header bg-warning">
                    <h3 class="card-title"><i class="fas fa-plus-square fa-1x"></i>&nbsp;&nbsp; Data Usaha Wajib Pajak</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-info btn-sm" ng-click="showMap()">Set Koordinate</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group row">
                                <label for="lat" class="col-sm-3 col-form-label col-form-label-sm">Lat</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="lat" ng-model="model.usaha.lat" placeholder="Latitude" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="long" class="col-sm-3 col-form-label col-form-label-sm">Long</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="long" ng-model="model.usaha.long" placeholder="Longitudinal" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kategori" class="col-sm-3 col-form-label col-form-label-sm">Kategori Usaha</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2 form-control-sm" id="kategori" ng-options="item as item.kategori for item in kategoris" ng-model="model.usaha.kategori" ng-change="model.usaha.kategoriid=model.usaha.kategori.id">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jenisbangunan" class="col-sm-3 col-form-label col-form-label-sm">Jenis Bangunan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="jenisbangunan" ng-model="model.usaha.jenisbangunan" placeholder="Jenis Bangunan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="statususaha" class="col-sm-3 col-form-label col-form-label-sm">Status Usaha</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="statususaha" ng-model="model.usaha.statustempatusaha" placeholder="Status tempat usaha">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-5">
                            <div class="form-group row">
                                <label for="luas" class="col-sm-3 col-form-label col-form-label-sm">Luas</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="luas" ng-model="model.usaha.luas" placeholder="Luas tempat usaha">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jumlahpegawai" class="col-sm-3 col-form-label col-form-label-sm">Jumlah Pegawai</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="jumlahpegawai" ng-model="model.usaha.jumlahpegawai" placeholder="Jumlah pegawai">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamatusaha" class="col-sm-3 col-form-label col-form-label-sm">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control form-control-sm" id="alamatusaha" rows="3" ng-model="model.usaha.alamat" placeholder="Alamat Tempat Usaha"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="distrik" class="col-sm-3 col-form-label col-form-label-sm">Distrik</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2 form-control-sm" id="distrik" ng-options="item as item for item in distriks" ng-model="model.usaha.distrik">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group d-flex justify-content-end">
                    <button type="submit"
                        class="btn btn-primary btn-sm pull-right">{{simpan ? 'Simpan': 'Ubah'}}</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="modal-map">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Large Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div id="map-panel">
                <input id="pac-input" class="controls" type="text" placeholder="Search Box"/>
                <div id="map"></div>
                <div id="directions-panel"></div>
            </div>
            </div>
          </div>
        </div>
      </div>
</div>

<style>
    #map-panel {
        height: auto;
        justify-content: space-between;
        align-items: stretch;
    }

    #map-panel>#map {
        width: 100%;
        background-color: red;
        min-height: 700px;
        height: 100%;
    }

    #map-panel>#directions-panel {
        max-width: 300px;
        height: 100%;
    }
    .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
      #target {
        width: 345px;
    }
</style>
