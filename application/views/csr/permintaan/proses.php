<div class="row" ng-controller="prosesPermintaanController">
    <div class="col-md-12">
        <div class="card card-warning">
            <form role="form" ng-submit="save()">
                <div class="card-header bg-danger">
                    <h3 class="card-title"><i class="fas fa-plus-square fa-1x"></i>&nbsp;&nbsp; Data Pelanggan</h3>
                    <div class="card-tools">
                        <a href="<?=base_url('csr/permintaan')?>" class="btn btn-secondary btn-sm"><i
                                class="fas fa-long-arrow-alt-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group row">
                                <label for="nik" class="col-sm-3 col-form-label col-form-label-sm">Id Pelanggan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="nik"
                                        ng-model="model.pelanggan.kodepelanggan" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-sm-3 col-form-label col-form-label-sm">Nama
                                    Pelanggan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="nama"
                                        ng-model="model.pelanggan.nama" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kontak" class="col-sm-3 col-form-label col-form-label-sm">Kontak</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="kontak"
                                        ng-model="model.pelanggan.kontak" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-5">
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label col-form-label-sm">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="email"
                                        ng-model="model.pelanggan.email" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="paketaktif" class="col-sm-3 col-form-label col-form-label-sm">Paket
                                    Aktif</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="paketaktif"
                                        ng-model="model.pelanggan.paket" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-3 col-form-label col-form-label-sm">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control form-control-sm" id="alamat" rows="3"
                                        ng-model="model.pelanggan.alamat" disabled></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-header bg-danger">
                    <h3 class="card-title"><i class="fas fa-plus-square fa-1x"></i>&nbsp;&nbsp; Data Permohonan</h3>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group row">
                                <label for="lat" class="col-sm-3 col-form-label col-form-label-sm">Nomor
                                    Register</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="lat"
                                        ng-model="model.noregister" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pemohon" class="col-sm-3 col-form-label col-form-label-sm">Nama
                                    Pemohon</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="pemohon"
                                        ng-model="model.namapemohon" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal" class="col-sm-3 col-form-label col-form-label-sm">Tanggal
                                    Pengajuan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="tanggal"
                                        ng-model="model.tanggal" disabled>
                                </div>
                            </div>
                            <div class="form-group row" ng-show="model.tanggalproses">
                                <label for="tanggalproses" class="col-sm-3 col-form-label col-form-label-sm">Tanggal Proses</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="tanggalproses"
                                        ng-model="model.tanggalproses" disabled>
                                </div>
                            </div>
                            <div class="form-group row" ng-show="model.karyawan">
                                <label for="csr" class="col-sm-3 col-form-label col-form-label-sm">CSR</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="csr"
                                        ng-model="model.karyawan.nama" disabled>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-5">
                            <div class="form-group row">
                                <label for="jenispengajuan" class="col-sm-3 col-form-label col-form-label-sm">Jenis
                                    Permohonan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control form-control-sm" id="jenispengajuan"
                                        ng-model="model.jenispengajuan" disabled rows="3"></textarea>
                                </div>
                            </div>
                            <div class="form-group row" ng-show="model.message">
                                <label for="pesan" class="col-sm-3 col-form-label col-form-label-sm">Pesan Pending</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control form-control-sm" id="pesan"
                                        ng-model="model.message" disabled rows="3"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="statuspermintaan" class="col-sm-3 col-form-label col-form-label-sm">Status Permintaan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="statuspermintaan"
                                        ng-model="model.status" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary btn-sm pull-right">Proses</button>&nbsp;&nbsp;&nbsp;
                    <button ng-show="model.status=='Proses'" type="button" class="btn btn-warning btn-sm pull-right" data-toggle="modal" data-target="#modelId">Pending</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Button trigger modal -->
    
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pesan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form role="form" ng-submit="pending()">
                        <div class="form-group">
                            <label for="message" class="col-form-label col-form-label-sm">Pesan</label>
                            <textarea class="form-control  form-control-sm" id="message" ng-model="model.message" rows="3" placeholder="Tinggalkan Pesan" required></textarea>
                        </div>
                        <div class="form-group d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-sm pull-right">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>