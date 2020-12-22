angular.module('services', [])
    .factory('UserServices', UserServices)
    .factory('PetugasServices', PetugasServices)
    .factory('PeriodeServices', PeriodeServices)
    .factory('PelangganServices', PelangganServices)
    .factory('PermintaanServices', PermintaanServices)
    .factory('LaporanServices', LaporanServices)
    .factory('HomeServices', HomeServices)
    .factory('KriteriaServices', KriteriaServices)
    .factory('PenilaianServices', PenilaianServices)
    .factory('AnalisaServices', AnalisaServices)
    ;

function UserServices($http, $q, helperServices) {
    var controller = helperServices.url + 'users';
    var service = {};
    service.data = [];
    service.instance = false;
    return {
        get: get, post: post, put: put
    };

    function get() {
        var def = $q.defer();
        if (service.instance) {
            def.resolve(service.data);
        } else {
            $http({
                method: 'get',
                url: controller,
                headers: AuthService.getHeader()
            }).then(
                (res) => {
                    service.instance = true;
                    service.data = res.data;
                    def.resolve(res.data);
                },
                (err) => {
                    def.reject(err);
                    message.error(err);
                }
            );
        }
        return def.promise;
    }
    function post(param) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: helperServices.url + 'administrator/createuser/' + param.roles,
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data.push(res.data);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }
    function put(param) {
        var def = $q.defer();
        $http({
            method: 'put',
            url: helperServices.url + 'administrator/updateuser/' + param.id,
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var data = service.data.find(x => x.id == param.id);
                if (data) {
                    data.firstName = param.firstName;
                    data.lastName = param.lastName;
                    data.userName = param.userName;
                    data.email = param.email;
                }
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }

}
function PetugasServices($http, $q, helperServices, AuthService) {
    var controller = helperServices.url + '/karyawan/';
    var service = {};
    service.data = [];
    service.instance = false;
    return {
        get: get, post: post, put: put, hapus: hapus
    };

    function get() {
        var def = $q.defer();
        if (service.instance) {
            def.resolve(service.data);
        } else {
            $http({
                method: 'get',
                url: controller + 'get',
                headers: AuthService.getHeader()
            }).then(
                (res) => {
                    service.instance = true;
                    service.data = res.data;
                    def.resolve(res.data);
                },
                (err) => {
                    console.log(err.data);
                    def.reject(err);

                }
            );
        }
        return def.promise;
    }
    function post(param) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: controller + 'add',
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data.push(res.data);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }

    function put(param) {
        var def = $q.defer();
        $http({
            method: 'put',
            url: controller + 'update',
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var data = service.data.find(x => x.id == param.id);
                if (data) {
                    data.nik = param.nik;
                    data.nama = param.nama;
                    data.jabatan = param.jabatan;
                    data.status = param.status;
                }
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }

    function hapus(param) {
        var def = $q.defer();
        $http({
            method: 'delete',
            url: helperServices.url + 'delete/' + param.id,
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var index = service.data.indexOf(param)
                service.data.splice(index, 1);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
            }
        );
        return def.promise;
    }

}
function PeriodeServices($http, $q, helperServices, AuthService) {
    var controller = helperServices.url + '/periode/';
    var service = {};
    service.data = [];
    service.instance = false;
    return {
        get: get, post: post, put: put, hapus: hapus, periodeActive, periodeActive
    };

    function get() {
        var def = $q.defer();
        if (service.instance) {
            def.resolve(service.data);
        } else {
            $http({
                method: 'get',
                url: controller + 'get',
                headers: AuthService.getHeader()
            }).then(
                (res) => {
                    service.instance = true;
                    service.data = res.data;
                    def.resolve(res.data);
                },
                (err) => {
                    console.log(err.data);
                    def.reject(err);

                }
            );
        }
        return def.promise;
    }
    function periodeActive() {
        var def = $q.defer();
        $http({
            method: 'get',
            url: controller + 'getactive',
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.instance = true;
                service.data = res.data;
                def.resolve(res.data);
            },
            (err) => {
                console.log(err.data);
                def.reject(err);

            }
        );
        return def.promise;
    }
    function post(param) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: controller + 'add',
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data.push(res.data);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }

    function put(param) {
        var def = $q.defer();
        $http({
            method: 'put',
            url: controller + 'update',
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var data = service.data.find(x => x.id == param.id);
                if (data) {
                    data.periode = param.periode;
                    data.keterangan = param.keterangan;
                    data.status = param.status;
                    data.setstatus = param.setstatus;
                }
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }

    function hapus(param) {
        var def = $q.defer();
        $http({
            method: 'delete',
            url: helperServices.url + 'delete/' + param.id,
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var index = service.data.indexOf(param)
                service.data.splice(index, 1);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
            }
        );
        return def.promise;
    }

}
function PelangganServices($http, $q, helperServices, AuthService) {
    var controller = helperServices.url + '/csr/pelanggan/';
    var service = {};
    service.data = [];
    service.instance = false;
    return {
        get: get, post: post, put: put, getDetail: getDetail
    };

    function get() {
        var def = $q.defer();
        if (service.instance) {
            def.resolve(service.data);
        } else {
            $http({
                method: 'get',
                url: controller + 'get',
                headers: AuthService.getHeader()
            }).then(
                (res) => {
                    service.instance = true;
                    service.data = res.data;
                    def.resolve(res.data);
                },
                (err) => {
                    console.log(err.data);
                    def.reject(err);

                }
            );
        }
        return def.promise;
    }
    function getDetail(id) {
        var def = $q.defer();
        $http({
            method: 'get',
            url: controller + 'get/' + id,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                def.resolve(res.data);
            },
            (err) => {
                console.log(err.data);
                def.reject(err);

            }
        );
        return def.promise;
    }
    function post(param) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: controller + 'add',
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data.push(res.data);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }

    function put(param) {
        var def = $q.defer();
        $http({
            method: 'put',
            url: controller + 'update',
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var data = service.data.find(x => x.id == param.id);
                if (data) {
                    data.kodepelanggan = param.kodepelanggan;
                    data.nama = param.nama;
                    data.kontak = param.kontak;
                    data.alamat = param.alamat;
                    data.email = param.email;
                }
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: err.data
                })
            }
        );
        return def.promise;
    }

}
function PermintaanServices($http, $q, helperServices, AuthService) {
    var controller = helperServices.url + '/csr/permintaan/';
    var service = {};
    service.data = [];
    service.instance = false;
    return {
        get: get, post: post, put: put, getDetail: getDetail, proses:proses, pending:pending
    };

    function get() {
        var def = $q.defer();
        if (service.instance) {
            def.resolve(service.data);
        } else {
            $http({
                method: 'get',
                url: controller + 'get',
                headers: AuthService.getHeader()
            }).then(
                (res) => {
                    service.instance = true;
                    service.data = res.data;
                    def.resolve(res.data);
                },
                (err) => {
                    console.log(err.data);
                    def.reject(err);

                }
            );
        }
        return def.promise;
    }
    function getDetail() {
        var def = $q.defer();
        id = helperServices.absUrl.split('/');
		id = id[id.length - 1];
        $http({
            method: 'get',
            url: controller + 'get/' + id,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: err.data
                })
            }
        );
        return def.promise;
    }
    function post(param) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: controller + 'add',
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data.push(res.data);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: err.data
                })
            }
        );
        return def.promise;
    }
    function proses(param) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: controller + 'proses',
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: err.data
                })
            }
        );
        return def.promise;
    }
    function pending(param) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: controller + 'pending',
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: err.data
                })
            }
        );
        return def.promise;
    }

    function put(param) {
        var def = $q.defer();
        $http({
            method: 'put',
            url: controller + 'update',
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var data = service.data.find(x => x.id == param.id);
                if (data) {
                    data.firstName = param.firstName;
                    data.lastName = param.lastName;
                    data.userName = param.userName;
                    data.email = param.email;
                }
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }

}
function LaporanServices($http, $q, helperServices, AuthService) {
    var controller = helperServices.url + '/laporan/';
    var service = {};
    service.data = [];
    service.instance = false;
    return {
        get: get
    };

    function get(item) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: controller + 'get',
            data: item,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                def.resolve(res.data);
            },
            (err) => {
                console.log(err.data);
                def.reject(err.data);
            }
        );
        return def.promise;
    }

}
function HomeServices($http, $q, helperServices, AuthService) {
    var controller = helperServices.url + '/home/';
    var service = {};
    service.data = [];
    service.instance = false;
    return {
        get: get
    };

    function get(item) {
        var def = $q.defer();
        $http({
            method: 'get',
            url: controller + 'get',
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                def.resolve(res.data);
            },
            (err) => {
                console.log(err.data);
                def.reject(err.data);
                $.LoadingOverlay("hide");
            }
        );
        return def.promise;
    }

}
function KriteriaServices($http, $q, helperServices, AuthService) {
    var controller = helperServices.url + '/kriteria/';
    var service = {};
    service.data = [];
    service.instance = false;
    return {
        get: get, post: post, put: put, hapus: hapus, postsub:postsub, putsub:putsub
    };

    function get() {
        var def = $q.defer();
        if (service.instance) {
            def.resolve(service.data);
        } else {
            $http({
                method: 'get',
                url: controller + 'get',
                headers: AuthService.getHeader()
            }).then(
                (res) => {
                    service.instance = true;
                    service.data = res.data;
                    def.resolve(res.data);
                },
                (err) => {
                    console.log(err.data);
                    def.reject(err);

                }
            );
        }
        return def.promise;
    }
    function post(param) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: controller + 'add',
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data.push(res.data);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }
    function postsub(param) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: controller + 'addsub',
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var data = service.data.find(x => x.id == param.kriteriaid);
                data.subkriteria.push(res.data);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }

    function put(param) {
        var def = $q.defer();
        $http({
            method: 'put',
            url: controller + 'update',
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var data = service.data.find(x => x.id == param.id);
                if (data) {
                    data.kriteria = param.kriteria;
                    data.kategori = param.ketegori;
                    data.bobot = param.bobot;
                }
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }
    function putsub(param) {
        var def = $q.defer();
        $http({
            method: 'put',
            url: controller + 'updatesub',
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var data = service.data.find(x => x.id == param.kriteriaid);
                if (data) {
                    var subkriteria = data.subkriteria.find(x=>x.id==param.id);
                    if(subkriteria){
                        subkriteria.subkriteria = param.subkriteria;
                        subkriteria.indikator = param.indikator;
                        subkriteria.nilai = param.nilai;
                    }
                }
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }

    function hapus(param) {
        var def = $q.defer();
        $http({
            method: 'delete',
            url: helperServices.url + 'delete/' + param.id,
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var index = service.data.indexOf(param)
                service.data.splice(index, 1);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
            }
        );
        return def.promise;
    }

}
function PenilaianServices($http, $q, helperServices, AuthService) {
    var controller = helperServices.url + '/penilaian/';
    var service = {};
    service.data = [];
    service.instance = false;
    return {
        get: get, post: post, put: put, hapus: hapus, getByPeriode:getByPeriode
    };

    function get() {
        var def = $q.defer();
        if (service.instance) {
            def.resolve(service.data);
        } else {
            $http({
                method: 'get',
                url: controller + 'get',
                headers: AuthService.getHeader()
            }).then(
                (res) => {
                    def.resolve(res.data);
                },
                (err) => {
                    console.log(err.data);
                    def.reject(err);
                }
            );
        }
        return def.promise;
    }
    function getByPeriode(id) {
        var def = $q.defer();
        $http({
            method: 'get',
            url: controller + 'getbyperiode/' + id,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                def.resolve(res.data);
            },
            (err) => {
                console.log(err.data);
                def.reject(err);
            }
        );
        return def.promise;
    }
    function post(param) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: controller + 'add',
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data.push(res.data);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }

    function put(param) {
        var def = $q.defer();
        $http({
            method: 'put',
            url: controller + 'update',
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var data = service.data.find(x => x.id == param.id);
                if (data) {
                    data.nik = param.nik;
                    data.nama = param.nama;
                    data.jabatan = param.jabatan;
                    data.status = param.status;
                }
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }

    function hapus(param) {
        var def = $q.defer();
        $http({
            method: 'delete',
            url: helperServices.url + 'delete/' + param.id,
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var index = service.data.indexOf(param)
                service.data.splice(index, 1);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
            }
        );
        return def.promise;
    }

}
function AnalisaServices($http, $q, helperServices, AuthService) {
    var controller = helperServices.url + '/penilaian/';
    var service = {};
    service.data = [];

    service.analisa=(param)=> {
        var datas = param;
        datas.bobotPreferensi=[];
        datas.matriksNormal = [];
        datas.normalMatriks = [];
        datas.bobot = [];
        datas.matriks = [];
        datas.kriterias.forEach(item => {
            datas.bobot.push(parseFloat(item.bobot)/100);
            var criteria = {};
            criteria.code = item.kode;
            criteria.kategori = item.kategori;
            criteria.nilai = []
            datas.alternatif.forEach(element => {
                criteria.nilai.push(element.kriteria.find(x=>x.kode==item.kode).nilai);
            });
            datas.matriks.push(angular.copy(criteria));
        });
        datas.matriksNormal = angular.copy(datas.matriks);
        datas.matriksNormal.forEach(element => {
            var repoNilai = [];
            var nilaiBagi = element.kategori == "Benefit" ? Math.max(...element.nilai): Math.min(...element.nilai);
            element.nilai.forEach(itemNilai => {
                repoNilai.push(element.kategori == "Benefit" ? itemNilai / nilaiBagi : nilaiBagi/itemNilai);
                
                // console.log(itemNilai);
            });
            element.nilai = repoNilai;
            datas.normalMatriks.push(repoNilai);
        });
        datas.bobotPreferensi = bobotPreferansi(datas.bobot, datas.normalMatriks, datas.alternatif)

        return datas;
    }
    function bobotPreferansi(bobot, nilai, alternatif) {
        var item = [];
        for (let index1 = 0; index1 < alternatif.length; index1++) {
            var a = 0;
            bobot.forEach((elementBobot, keyBobot) => {
                a += nilai[keyBobot][index1]*elementBobot;
                // nilai.forEach((elementNilai, keyNilai) => {
                     
                // });
            });
            item.push(a);
        }
        return item;
    }
    return service;
    
}

