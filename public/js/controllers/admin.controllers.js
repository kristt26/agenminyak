angular.module('adminctrl', [])
    .controller('homeController', homeController)
    .controller('loginController', loginController)
    .controller('profileController', profileController)
    .controller('karyawanController', karyawanController)
    .controller('pelangganController', pelangganController)
    .controller('permintaanController', permintaanController)
    .controller('prosesPermintaanController', prosesPermintaanController)
    .controller('laporanController', laporanController)
    .controller('periodeController', periodeController)
    .controller('kriteriaController', kriteriaController)
    .controller('penilaianController', penilaianController)
    ;
function homeController($scope, HomeServices, PenilaianServices, KriteriaServices, AnalisaServices) {
    $scope.itemHeader = { title: "Home", breadcrumb: "Home", header: "Home" };
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.datas = [];
    $scope.datass = [];
    $scope.model = {};
    $scope.simpan = true;
    $scope.hasilAkhir = {};
    $scope.hasilAkhir.hasil = 0;
    $scope.periode = {};
    $scope.setValue;
    PenilaianServices.get().then(x => {
        x.forEach(element => {
            element.kriteria.forEach(kriteria => {
                if (kriteria.penilaian) {
                    kriteria.nilai = kriteria.subkriteria.find(x => x.id == kriteria.penilaian.subkriteriaid);
                }
            });
        });
        $scope.datas = x;
        HomeServices.get().then(x => {
            $scope.datass = x;
            $scope.analisa();
            $.LoadingOverlay("hide");
        })
    })
    $scope.analisa = () => {
        var data = {};
            data.alternatif = [];
            data.kriterias = [];
            KriteriaServices.get().then(kriterias => {
                data.kriterias = kriterias
                data.kriterias.map(function (x, key) {
                    x.kode = "C" + (key + 1);
                })
                $scope.datas.forEach((karyawan, value) => {
                    var itemKaryawan = {};
                    itemKaryawan.karyawan = karyawan.nama;
                    itemKaryawan.kode = "A" + (value + 1);
                    itemKaryawan.kriteria = []
                    // console.log(karyawan.nama);
                    karyawan.kriteria.forEach(function (kriteria, key) {
                        var itemKritria = { kode: 'C' + (key + 1), nilai: parseFloat(kriteria.penilaian.nilai) };
                        itemKaryawan.kriteria.push(angular.copy(itemKritria));
                    });
                    data.alternatif.push(angular.copy(itemKaryawan));
                });
                $scope.setValue = AnalisaServices.analisa(data);
                $scope.setValue.alternatif.forEach((itemNormal, value) => {
                    itemNormal.hasil = $scope.setValue.bobotPreferensi[value];
                    $scope.hasilAkhir
                    itemNormal.kriteria.forEach((itemKriteria, valueItem) => {
                        itemKriteria.nilaiNormal = $scope.setValue.normalMatriks[valueItem][value];
                    });

                    if ($scope.hasilAkhir.hasil < itemNormal.hasil) {
                        $scope.hasilAkhir = itemNormal;
                    }
                });
            })
        // console.log(data);
    }
    
    
}
function loginController($scope, AuthService, helperServices) {
    $scope.model = {};

    AuthService.login($scope.modal).then(x => {
        $.LoadingOverlay("hide");
        location.href = helperServices.url + "/home";
    })

}
function profileController($scope) {
    $scope.title = "Profile Header";
    $.LoadingOverlay("hide");
}

function karyawanController($scope, helperServices, PetugasServices) {
    $scope.itemHeader = { title: "Petugas", breadcrumb: "Petugas", header: "Petugas" };
    $scope.sexs = helperServices.sex;
    $scope.status = helperServices.status;
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.datas = [];
    $scope.model = {};
    $scope.simpan = true;
    PetugasServices.get().then(x => {
        $scope.datas = x;
        $.LoadingOverlay("hide");
    })
    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
        $scope.simpan = false;
    }
    $scope.clear = () => {
        $scope.simpan = true;
        $scope.model = {};
    }
    $scope.save = () => {
        $.LoadingOverlay("show");
        if ($scope.model.id) {
            PetugasServices.put($scope.model).then(result => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Proses Berhasil'
                })
                $scope.model = {};
                $scope.simpan = true;
                $.LoadingOverlay("hide");
            })
        } else {
            $scope.model.roles = helperServices.roles;
            PetugasServices.post($scope.model).then(result => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Proses Berhasil'
                })
                $scope.model = {};
                $.LoadingOverlay("hide");
            })
        }
    }
}

function pelangganController($scope, helperServices, PelangganServices) {
    $scope.itemHeader = { title: "Pelanggan", breadcrumb: "Pelanggan", header: "Pelanggan" };
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.datas = [];
    $scope.model = {};
    $scope.simpan = true;
    PelangganServices.get().then(x => {
        $scope.datas = x;
        $.LoadingOverlay("hide");
    })
    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
        $scope.simpan = false;
    }
    $scope.save = () => {
        $.LoadingOverlay("show");
        // $scope.model.roles = helperServices.roles;
        if ($scope.model.id) {
            PelangganServices.put($scope.model).then(result => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Proses Berhasil'
                })
                $scope.model = {};
                $.LoadingOverlay("hide");
            })
        } else {
            PelangganServices.post($scope.model).then(result => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Proses Berhasil'
                })
                $scope.model = {};
                $.LoadingOverlay("hide");
            })
        }
    }
}
function permintaanController($scope, helperServices, PermintaanServices, PelangganServices) {
    $scope.itemHeader = { title: "Permohonan", breadcrumb: "Permohonan", header: "Permohonan" };
    $scope.distriks = helperServices.distrik;
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.datas = [];
    $scope.pelanggans = [];
    $scope.model = {};
    $scope.items = helperServices;
    $scope.model.noregister = $scope.items.randid();
    $scope.simpan = true;
    PermintaanServices.get().then(x => {
        $scope.datas = x;
        PelangganServices.get().then(pelanggan => {
            $scope.pelanggans = pelanggan;
            $.LoadingOverlay("hide");
        })
    })
    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
        $scope.simpan = false;
    }
    $scope.save = () => {
        $.LoadingOverlay("show");
        if ($scope.model.id) {
            PermintaanServices.put($scope.model).then(result => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Proses Berhasil'
                })
                $scope.model = {};
                $.LoadingOverlay("hide");
            })
        } else {
            $scope.model.karyawan = null;
            $scope.model.karyawanid = null;
            PermintaanServices.post($scope.model).then(result => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Proses Berhasil'
                })
                $scope.model = {};
                $.LoadingOverlay("hide");
            })
        }
    }
    $scope.detail = (item) => {
        if (item.status == 'Proses' || item.status == 'Pending')
            location.href = helperServices.url + "/csr/proses/index/" + item.id;
    }

}
function prosesPermintaanController($scope, helperServices, PermintaanServices) {
    $scope.itemHeader = { title: "Proses Permohonan", breadcrumb: "Proses Permohonan", header: "Proses Permohonan" };
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.model = {};
    PermintaanServices.getDetail().then(x => {
        $scope.model = x;
        $.LoadingOverlay("hide");
    })
    $scope.save = () => {
        $.LoadingOverlay("show");
        PermintaanServices.proses($scope.model).then(x => {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Proses Berhasil'
            })
            location.href = helperServices.url + "/csr/permintaan";
        })
    }
    $scope.message = () => {
        $('#pesan').modal('show');
    }
    $scope.pending = () => {
        $.LoadingOverlay("show");
        PermintaanServices.pending($scope.model).then(x => {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Proses Berhasil'
            })
            location.href = helperServices.url + "/csr/permintaan";
        })
    }
}
function laporanController($scope, helperServices, PenilaianServices, KriteriaServices, AnalisaServices, PeriodeServices) {
    $scope.itemHeader = { title: "Laporan", breadcrumb: "Laporan", header: "Laporan" };
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.model = {};
    $scope.datas = [];
    $scope.periodes = [];
    $scope.hasilAkhir = {};
    $scope.hasilAkhir.hasil = 0;
    $scope.periode = {};
    $scope.setValue;
    $scope.laporan = false;
    PeriodeServices.get().then(itemperiode => {
        $scope.periodes = itemperiode
        $.LoadingOverlay("hide");
    })
    $scope.showReport = (item) => {
        $.LoadingOverlay("show");
        PenilaianServices.getByPeriode(item.id).then(x => {
            x.forEach(element => {
                element.kriteria.forEach(kriteria => {
                    if (kriteria.penilaian) {
                        kriteria.nilai = kriteria.subkriteria.find(x => x.id == kriteria.penilaian.subkriteriaid);
                    }
                });
            });
            $scope.datas = x;
            var data = {};
            data.alternatif = [];
            data.kriterias = [];
            KriteriaServices.get().then(kriterias => {
                data.kriterias = kriterias
                data.kriterias.map(function (x, key) {
                    x.kode = "C" + (key + 1);
                });
                $scope.datas.forEach((karyawan, value) => {
                    var itemKaryawan = {};
                    itemKaryawan.karyawan = karyawan.nama;
                    itemKaryawan.kode = "A" + (value + 1);
                    itemKaryawan.kriteria = [];
                    // console.log(karyawan.nama);
                    karyawan.kriteria.forEach(function (kriteria, key) {
                        var itemKritria = { kode: 'C' + (key + 1), nilai: parseFloat(kriteria.penilaian.nilai) };
                        itemKaryawan.kriteria.push(angular.copy(itemKritria));
                    });
                    data.alternatif.push(angular.copy(itemKaryawan));
                });
                $scope.setValue = AnalisaServices.analisa(data);
                $scope.setValue.alternatif.forEach((itemNormal, value) => {
                    itemNormal.hasil = $scope.setValue.bobotPreferensi[value];
                    $scope.hasilAkhir
                    itemNormal.kriteria.forEach((itemKriteria, valueItem) => {
                        itemKriteria.nilaiNormal = $scope.setValue.normalMatriks[valueItem][value];
                    });

                    if ($scope.hasilAkhir.hasil < itemNormal.hasil) {
                        $scope.hasilAkhir = itemNormal;
                    }
                });
                console.log($scope.hasilAkhir);
                $scope.laporan = true;
                $.LoadingOverlay("hide");
                console.log($scope.setValue);
            })
        })

    }
    $scope.getData = (id) => {

    }
    $scope.print = () => {
        $("#print").printArea();
    }
}
function periodeController($scope, helperServices, PeriodeServices) {
    $scope.itemHeader = { title: "Periode", breadcrumb: "Periode", header: "Periode" };
    $scope.sexs = helperServices.sex;
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.datas = [];
    $scope.model = {};
    $scope.simpan = true;
    PeriodeServices.get().then(x => {
        $scope.datas = x;
        $.LoadingOverlay("hide");
    })
    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
        $scope.simpan = false;
    }
    $scope.clear = () => {
        $scope.simpan = true;
        $scope.model = {};
    }
    $scope.save = (item) => {
        $.LoadingOverlay("show");
        if (item.id) {
            item.status = item.setstatus ? "Aktif" : "Tidak Aktif";
            PeriodeServices.put(item).then(result => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Proses Berhasil'
                })
                $scope.model = {};
                $scope.simpan = true;
                $.LoadingOverlay("hide");
            })
        } else {
            item.status = "Aktif";
            PeriodeServices.post(item).then(result => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Proses Berhasil'
                })
                $scope.model = {};
                $.LoadingOverlay("hide");
            })
        }
    }
}
function kriteriaController($scope, helperServices, KriteriaServices) {
    $scope.itemHeader = { title: "Kriteria", breadcrumb: "Kriteria", header: "Kriteria" };
    $scope.kategorikriteria = helperServices.kategorikriteria;
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.datas = [];
    $scope.model = {};
    $scope.simpan = true;
    $scope.titlesub = "Sub Kriteria";
    KriteriaServices.get().then(x => {
        $scope.datas = x;
        $.LoadingOverlay("hide");
    })
    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
        $scope.model.bobot = parseInt($scope.model.bobot);
        $scope.simpan = false;

    }
    $scope.addsub = (item) => {
        $scope.model.kriteriaid = item.id;
        $scope.titlesub = "Tambah " + item.kriteria + " " + item.kriteria;
        $("#subkriteria").modal('show');
    }
    $scope.editsub = (item) => {
        $scope.model = angular.copy(item);
        $scope.model.nilai = parseInt($scope.model.nilai);
        $scope.titlesub = "Ubah " + $scope.titlesub;
        // $scope.titlesub = item.kriteria;
        $("#subkriteria").modal('show');
    }
    $scope.clear = () => {
        $scope.simpan = true;
        $scope.model = {};
    }
    $scope.save = (item) => {
        $.LoadingOverlay("show");
        if (item.id) {
            KriteriaServices.put(item).then(result => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Proses Berhasil'
                })
                $scope.model = {};
                $scope.simpan = true;
                $.LoadingOverlay("hide");
            })
        } else {
            KriteriaServices.post(item).then(result => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Proses Berhasil'
                })
                $scope.model = {};
                $.LoadingOverlay("hide");
            })
        }
    }
    $scope.savesub = (item) => {
        if (item.id) {
            KriteriaServices.putsub(item).then(result => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Proses Berhasil'
                })
                $scope.model = {};
                $.LoadingOverlay("hide");
                $("#subkriteria").modal('hide');
            })
        } else {
            KriteriaServices.postsub(item).then(result => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Proses Berhasil'
                })
                $scope.model = {};
                $.LoadingOverlay("hide");
                $("#subkriteria").modal('hide');
            })
        }

    }
    $scope.close = () => {
        $scope.model = {};
        $scope.titlesub = 'Sub Kriteria';
        $('#subkriteria').modal('hide');
        $("#subkriteria").modal('hide');
    }
}
function penilaianController($scope, helperServices, PenilaianServices, KriteriaServices, AnalisaServices, PeriodeServices) {
    $scope.itemHeader = { title: "Penilaian", breadcrumb: "Penilaian", header: "Penilaian" };
    $scope.sexs = helperServices.sex;
    $scope.status = helperServices.status;
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.datas = [];
    $scope.model = {};
    $scope.simpan = true;
    $scope.hasilAkhir = {};
    $scope.hasilAkhir.hasil = 0;
    $scope.periode = {};
    $scope.setValue;
    PenilaianServices.get().then(x => {
        if (x !== "null") {
            x.forEach(element => {
                element.kriteria.forEach(kriteria => {
                    if (kriteria.penilaian) {
                        kriteria.nilai = kriteria.subkriteria.find(x => x.id == kriteria.penilaian.subkriteriaid);
                    }
                });
            });
            $scope.datas = x;
            PeriodeServices.periodeActive().then(itemperiode => {
                $scope.periode = itemperiode
                $.LoadingOverlay("hide");
            })
        } else {
            $.LoadingOverlay("hide");
            Swal.fire({
                title: 'Information',
                text: "Periode aktif tidak ditemukan!!!",
                icon: 'info',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    document.location.href = helperServices.url + "/periode";
                }
            })
        }
    })
    $scope.analisa = () => {
        $.LoadingOverlay("show");
        if ($scope.setValue) {
            $("#analisa").modal("show");
            $.LoadingOverlay("hide");
        } else {

            var data = {};
            data.alternatif = [];
            data.kriterias = [];
            KriteriaServices.get().then(kriterias => {
                data.kriterias = kriterias
                data.kriterias.map(function (x, key) {
                    x.kode = "C" + (key + 1);
                })
                $scope.datas.forEach((karyawan, value) => {
                    var itemKaryawan = {};
                    itemKaryawan.karyawan = karyawan.nama;
                    itemKaryawan.kode = "A" + (value + 1);
                    itemKaryawan.kriteria = []
                    // console.log(karyawan.nama);
                    karyawan.kriteria.forEach(function (kriteria, key) {
                        var itemKritria = { kode: 'C' + (key + 1), nilai: parseFloat(kriteria.penilaian.nilai) };
                        itemKaryawan.kriteria.push(angular.copy(itemKritria));
                    });
                    data.alternatif.push(angular.copy(itemKaryawan));
                });
                $scope.setValue = AnalisaServices.analisa(data);
                $scope.setValue.alternatif.forEach((itemNormal, value) => {
                    itemNormal.hasil = $scope.setValue.bobotPreferensi[value];
                    $scope.hasilAkhir
                    itemNormal.kriteria.forEach((itemKriteria, valueItem) => {
                        itemKriteria.nilaiNormal = $scope.setValue.normalMatriks[valueItem][value];
                    });

                    if ($scope.hasilAkhir.hasil < itemNormal.hasil) {
                        $scope.hasilAkhir = itemNormal;
                    }
                });
                console.log($scope.hasilAkhir);
                $("#analisa").modal("show");
                $.LoadingOverlay("hide");
                console.log($scope.setValue);
            })
        }
        // console.log(data);
    }
    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
        $scope.simpan = false;
    }
    $scope.clear = () => {
        $scope.simpan = true;
        $scope.model = {};
    }
    $scope.save = () => {
        $.LoadingOverlay("show");
        if ($scope.model.id) {
            PenilaianServices.put($scope.datas).then(result => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Proses Berhasil'
                })
                $scope.model = {};
                $scope.simpan = true;
                $.LoadingOverlay("hide");
            })
        } else {
            PenilaianServices.post($scope.datas).then(result => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Proses Berhasil'
                })
                $scope.model = {};
                $.LoadingOverlay("hide");
            })
        }
    }
}